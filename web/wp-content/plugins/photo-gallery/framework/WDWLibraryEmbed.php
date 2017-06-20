<?php

/**
 * Class for handling embedded media in gallery
 *
 */

class WDWLibraryEmbed {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct() {
  }


  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function get_provider($oembed, $url, $args = '') {
		$provider = false;
		if (!isset($args['discover'])) {
			$args['discover'] = true;
    }
		foreach ($oembed->providers as $matchmask => $data ) {
			list( $providerurl, $regex ) = $data;
			// Turn the asterisk-type provider URLs into regex
			if ( !$regex ) {
				$matchmask = '#' . str_replace( '___wildcard___', '(.+)', preg_quote( str_replace( '*', '___wildcard___', $matchmask ), '#' ) ) . '#i';
				$matchmask = preg_replace( '|^#http\\\://|', '#https?\://', $matchmask );
			}
			if ( preg_match( $matchmask, $url ) ) {
				$provider = str_replace( '{format}', 'json', $providerurl ); // JSON is easier to deal with than XML
				break;
			}
		}
		if ( !$provider && $args['discover'] ) {
			$provider = $oembed->discover($url);
    }
		return $provider;
	}

/** 
 * check host and get data for a given url
 * @return encode_json(associative array of data) on success
 * @return encode_json(array[false, "error message"]) on failure
 *
 * EMBED TYPES
 *
 *  EMBED_OEMBED_YOUTUBE_VIDEO
 *  EMBED_OEMBED_VIMEO_VIDEO
 *  EMBED_OEMBED_DAILYMOTION_VIDEO
 *  EMBED_OEMBED_INSTAGRAM_IMAGE
 *  EMBED_OEMBED_INSTAGRAM_VIDEO
 *  EMBED_OEMBED_INSTAGRAM_POST
 *  EMBED_OEMBED_FLICKR_IMAGE
 *
 *  RULES FOR NEW TYPES
 *
 *  1. begin type name with EMBED_
 *  2. if using WP native OEMBED class, add _OEMBED then
 *  3. add provider name
 *  4. add _VIDEO, _IMAGE FOR embedded media containing only video or image
 *  5. add _DIRECT_URL from static URL of image (not implemented yet)
 *
 */

  public static function add_embed($url) {

    $url = sanitize_text_field(urldecode($url));


    $embed_type = '';
    $host = '';
    /*returns this array*/
    $embedData = array(
      'name' => '',
      'description' => '',
      'filename' => '',
      'url' => '',
      'reliative_url' => '',
      'thumb_url' => '',
      'thumb' => '',
      'size' => '',
      'filetype' => '',
      'date_modified' => '',
      'resolution' => '',
      'redirect_url' => '');

    $accepted_oembeds = array(
      'YOUTUBE' => '/youtube/',
      'VIMEO' => '/vimeo/',
      'FLICKR' => '/flickr/',
      'INSTAGRAM' => '/instagram/',
      'DAILYMOTION' => '/dailymotion/'
      );
    
    /*check if we can embed this using wordpress class WP_oEmbed */
    if ( !function_exists( '_wp_oembed_get_object' ) )
      include( ABSPATH . WPINC . '/class-oembed.php' );
    // get an oembed object
    $oembed = _wp_oembed_get_object();
    if (method_exists($oembed, 'get_provider')) {
      // Since 4.0.0
      $provider = $oembed->get_provider($url);
    }
    else {
      $provider = self::get_provider($oembed, $url);
    }
    foreach ($accepted_oembeds as $oembed_provider => $regex) {
      if(preg_match($regex, $provider)==1){
        $host = $oembed_provider;
      }
    }
    /*return json_encode($host); for test*/

    /*handling oembed cases*/    
    if($host){
      /*instagram is exception*/
      /*standard oembed fetching does not return thumbnail_url! so we do it manually*/
      if($host == 'INSTAGRAM' && substr($url,-4)!='post' && substr($url,-4!='POST')){
        $embed_type = 'EMBED_OEMBED_INSTAGRAM';

        $insta_host_and_id= strtok($url, '/')."/".strtok('/')."/".strtok('/')."/".strtok('/');
        $insta_host= strtok($url, '/')."/".strtok('/')."/".strtok('/')."/";
        $filename = str_replace($insta_host, "", $insta_host_and_id);
        
        $get_embed_data = wp_remote_get("http://api.instagram.com/oembed?url=http://instagram.com/p/".$filename); 
        if ( is_wp_error( $get_embed_data ) ) {
          return json_encode(array("error", "cannot get Instagram data"));
        }
        $result  = json_decode(wp_remote_retrieve_body($get_embed_data));
        if(empty($result)){
          return json_encode(array("error", wp_remote_retrieve_body($get_embed_data)));
        }              
        list($img_width, $img_height) = @getimagesize('https://instagram.com/p/' . $filename . '/media/?size=l');
        $embedData = array(
          'name' => htmlspecialchars($result->title),
          'description' => htmlspecialchars($result->title),
          'filename' => $filename,
          'url' => $url,
          'reliative_url' => $url,
          'thumb_url' => 'https://instagram.com/p/' . $filename . '/media/?size=t',
          'thumb' => 'https://instagram.com/p/' . $filename . '/media/?size=t',
          'size' => '',
          'filetype' => $embed_type,
          'date_modified' => date('d F Y, H:i'),
          'resolution' => $img_width . " x " . $img_height . " px",
          'redirect_url' => ''
          );
        
        /*get instagram post html page, parse its DOM to find video URL*/
        $DOM = new DOMDocument;
        libxml_use_internal_errors(true);
        $html_code = wp_remote_get($url);
        if ( is_wp_error( $html_code ) ) {
          return json_encode(array("error", "cannot get Instagram data"));
        }
        $html_body = wp_remote_retrieve_body($html_code);
        if(empty($html_body)){
          return json_encode(array("error", wp_remote_retrieve_body($html_code)));
        }    
        
        $DOM->loadHTML($html_body);  
        $finder = new DomXPath($DOM);              
        $query = "//meta[@property='og:video']";                            
        $nodes = $finder->query($query);
        $node = $nodes->item(0);              
        if($node){
          $length = $node->attributes->length;
          
            for ($i = 0; $i < $length; ++$i) {
              $name = $node->attributes->item($i)->name;
              $value = $node->attributes->item($i)->value;
   
              if($name == 'content'){
                $filename = $value;
              }
          }
          $embedData['filename'] = $filename;
          $embedData['filetype'] .= '_VIDEO';
        }
        else{
          $embedData['filetype'] .= '_IMAGE'; 
        }
        
        return json_encode($embedData);
      }
      if($host == 'INSTAGRAM' && (substr($url,-4)=='post'||substr($url,-4)=='POST')){
        /*check if instagram post*/
        $url = substr($url,0,-4);
        $embed_type = 'EMBED_OEMBED_INSTAGRAM_POST';  
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        $matches = array();
        $filename = '';
        $regex = "/^.*?instagram\.com\/p\/(.*?)[\/]?$/";
        if(preg_match($regex, $url, $matches)){
          $filename = $matches[1];
        }
        $get_embed_data = wp_remote_get("http://api.instagram.com/oembed?url=http://instagram.com/p/".$filename); 
        if ( is_wp_error( $get_embed_data ) ) {
          return json_encode(array("error", "cannot get Instagram data"));
        }
        $result  = json_decode(wp_remote_retrieve_body($get_embed_data));
        if(empty($result)){
          return json_encode(array("error", wp_remote_retrieve_body($get_embed_data)));
        }
        list($img_width, $img_height) = @getimagesize('https://instagram.com/p/' . $filename . '/media/?size=l');
        $embedData = array(
          'name' => htmlspecialchars($result->title),
          'description' => htmlspecialchars($result->title),
          'filename' => $filename,
          'url' => $url,
          'reliative_url' => $url,
          'thumb_url' => 'https://instagram.com/p/' . $filename . '/media/?size=t',
          'thumb' => 'https://instagram.com/p/' . $filename . '/media/?size=t',
          'size' => '',
          'filetype' => $embed_type,
          'date_modified' => date('d F Y, H:i'),
          'resolution' => $img_width . " x " . $img_height . " px",
          'redirect_url' => '');
 
        return json_encode($embedData);      
      }

      $result = $oembed->fetch( $provider, $url);
      /*no data fetched for a known provider*/
      if(!$result){
          return json_encode(array("error", "please enter ". $host . " correct single media URL"));
      }
      else{/*one of known oembed types*/
        $embed_type = 'EMBED_OEMBED_'.$host;
        switch ($embed_type) {
          case 'EMBED_OEMBED_YOUTUBE':
            $youtube_regex = "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#";
            $matches = array();
            preg_match($youtube_regex , $url , $matches);
            $filename = $matches[0];

            $embedData = array(
              'name' => htmlspecialchars($result->title),
              'description' => htmlspecialchars($result->title),
              'filename' => $filename,
              'url' => $url,
              'reliative_url' => $url,
              'thumb_url' => $result->thumbnail_url,
              'thumb' => $result->thumbnail_url,
              'size' => '',
              'filetype' => $embed_type."_VIDEO",
              'date_modified' => date('d F Y, H:i'),
              'resolution' => $result->width." x ".$result->height." px",
              'redirect_url' => '');

            return json_encode($embedData);
            
            break;
          case 'EMBED_OEMBED_VIMEO':
            
            $embedData = array(
              'name' => htmlspecialchars($result->title),
              'description' => htmlspecialchars($result->title),
              'filename' => $result->video_id,
              'url' => $url,
              'reliative_url' => $url,
              'thumb_url' => $result->thumbnail_url,
              'thumb' => $result->thumbnail_url,
              'size' => '',
              'filetype' => $embed_type."_VIDEO",
              'date_modified' => date('d F Y, H:i'),
              'resolution' => $result->width." x ".$result->height." px",
              'redirect_url' => '');

            return json_encode($embedData);
            
            break;
          case 'EMBED_OEMBED_FLICKR':
            $matches = preg_match('~^.+/(\d+)~',$url,$matches);
            $filename = $matches[1];
            /*if($result->type =='photo')
              $embed_type .= '_IMAGE';
            if($result->type =='video')
              $embed_type .= '_VIDEO';*/
              /*flickr video type not implemented yet*/
              $embed_type .= '_IMAGE';
                         
            $embedData = array(
              'name' => htmlspecialchars($result->title),
              'description' => htmlspecialchars($result->title),
              'filename' =>substr($result->thumbnail_url, 0, -5)."b.jpg", 
              'url' => $url,
              'reliative_url' => $url,
              'thumb_url' => $result->thumbnail_url,
              'thumb' => $result->thumbnail_url,
              'size' => '',
              'filetype' => $embed_type,
              'date_modified' => date('d F Y, H:i'),
              'resolution' => $result->width." x ".$result->height." px",
              'redirect_url' => '');

            return json_encode($embedData);
            break;
          
          case 'EMBED_OEMBED_DAILYMOTION':
            $filename = strtok(basename($url), '_');

            $embedData = array(
              'name' => htmlspecialchars($result->title),
              'description' => htmlspecialchars($result->title),
              'filename' => $filename,
              'url' => $url,
              'reliative_url' => $url,
              'thumb_url' => $result->thumbnail_url,
              'thumb' => $result->thumbnail_url,
              'size' => '',
              'filetype' => $embed_type."_VIDEO",
              'date_modified' => date('d F Y, H:i'),
              'resolution' => $result->width." x ".$result->height." px",
              'redirect_url' => '');

            return json_encode($embedData);
            
            break;
          case 'EMBED_OEMBED_GETTYIMAGES':
          /*not working yet*/
            $filename = strtok(basename($url), '_');
            
            $embedData = array(
              'name' => htmlspecialchars($result->title),
              'description' => htmlspecialchars($result->title),
              'filename' => $filename,
              'url' => $url,
              'reliative_url' => $url,
              'thumb_url' => $result->thumbnail_url,
              'thumb' => $result->thumbnail_url,
              'size' => '',
              'filetype' => $embed_type,
              'date_modified' => date('d F Y, H:i'),
              'resolution' => $result->width." x ".$result->height." px",
              'redirect_url' => '');

            return json_encode($embedData);
         
          default:
            return json_encode(array("error", "unknown URL host"));
            break;
        }
      }
    }/*end of oembed cases*/
    else {
      /*check for direct image url*/
      /*check if something else*/
      /*not implemented yet*/
      return json_encode(array("error", "unknown URL"));
    }
    return json_encode(array("error", "unknown URL"));
  }


/** 
 * client side analogue is function spider_display_embed in bwg_embed.js
 *
 * @param embed_type: string , one of predefined accepted types
 * @param embed_id: string, id of media in corresponding host, or url if no unique id system is defined for host
 * @param attrs: associative array with html attributes and values format e.g. array('width'=>"100px", 'style'=>"display:inline;")
 * 
 */

  public static function display_embed($embed_type, $embed_id='', $attrs = array()) {
    $html_to_insert = '';

    switch ($embed_type) {
      case 'EMBED_OEMBED_YOUTUBE_VIDEO':
        $oembed_youtube_html ='<iframe ';
        if($embed_id!=''){
          $oembed_youtube_html .= ' src="' . '//www.youtube.com/embed/'. $embed_id . '?enablejsapi=1&wmode=transparent"';
        }
        foreach ($attrs as $attr => $value) {
          if(preg_match('/src/i', $attr)===0){
            if($attr != '' && $value != ''){
              $oembed_youtube_html .= ' '. $attr . '="'. $value . '"';
            }
          }
        }
        $oembed_youtube_html .= " ></iframe>";
        $html_to_insert .= $oembed_youtube_html;
        break;
      case 'EMBED_OEMBED_VIMEO_VIDEO':
        $oembed_vimeo_html ='<iframe ';
        if($embed_id!=''){
          $oembed_vimeo_html .= ' src="' . '//player.vimeo.com/video/'. $embed_id . '?enablejsapi=1"';
        }
        foreach ($attrs as $attr => $value) {
          if(preg_match('/src/i', $attr)===0){
            if($attr != '' && $value != ''){
              $oembed_vimeo_html .= ' '. $attr . '="'. $value . '"';
            }
          }
        }
        $oembed_vimeo_html .= " ></iframe>";
        $html_to_insert .= $oembed_vimeo_html;
        break;
      case 'EMBED_OEMBED_FLICKR_IMAGE':
         $oembed_flickr_html ='<div ';
        foreach ($attrs as $attr => $value) {
          if(preg_match('/src/i', $attr)===0){
            if($attr != '' && $value != ''){
              $oembed_flickr_html .= ' '. $attr . '="'. $value . '"';
            }
          }
        }
        $oembed_flickr_html .= " >";
        if($embed_id!=''){
        $oembed_flickr_html .= '<img src="'.$embed_id.'"'. 
        ' style="'.
        'max-width:'.'100%'." !important".
        '; max-height:'.'100%'." !important".
        '; width:'.'auto !important'.
        '; height:'. 'auto !important' . 
        ';">';      
        }
        $oembed_flickr_html .="</div>";

        $html_to_insert .= $oembed_flickr_html;
        break;
      case 'EMBED_OEMBED_FLICKR_VIDEO':
        # code...not implemented yet
        break;  
      case 'EMBED_OEMBED_INSTAGRAM_VIDEO':
        $oembed_instagram_html ='<div ';
        foreach ($attrs as $attr => $value) {
          if(preg_match('/src/i', $attr)===0){
            if($attr != '' && $value != ''){
              $oembed_instagram_html .= ' '. $attr . '="'. $value . '"';
            }
          }
        }
        $oembed_instagram_html .= " >";
        if($embed_id!=''){
        $oembed_instagram_html .= '<video style="width:auto !important; height:auto !important; max-width:100% !important; max-height:100% !important; margin:0 !important;" controls>'.
        '<source src="'. $embed_id .
        '" type="video/mp4"> Your browser does not support the video tag. </video>'; 
        }
        $oembed_instagram_html .="</div>";
        $html_to_insert .= $oembed_instagram_html;
        break;
      case 'EMBED_OEMBED_INSTAGRAM_IMAGE':
        $oembed_instagram_html ='<div ';
        foreach ($attrs as $attr => $value) {
          if(preg_match('/src/i', $attr)===0){
            if($attr != '' && $value != ''){
              $oembed_instagram_html .= ' '. $attr . '="'. $value . '"';
            }
          }
        }
        $oembed_instagram_html .= " >";
        if($embed_id!=''){
        $oembed_instagram_html .= '<img src="//instagram.com/p/'.$embed_id.'/media/?size=l"'. 
        ' style="'.
        'max-width:'.'100%'." !important".
        '; max-height:'.'100%'." !important".
        '; width:'.'auto !important'.
        '; height:'. 'auto !important' . 
        ';">';
        }
        $oembed_instagram_html .="</div>";
        $html_to_insert .= $oembed_instagram_html;
        break;
      case 'EMBED_OEMBED_INSTAGRAM_POST':
        $oembed_instagram_html ='<div ';
        $id = '';
        foreach ($attrs as $attr => $value) {
          if(preg_match('/src/i', $attr)===0){
            if($attr != '' && $value != ''){
              $oembed_instagram_html .= ' '. $attr . '="'. $value . '"';
              if(strtolower($attr) == 'class') {
                $class = $value;
              }
            }
          }
        }
        $oembed_instagram_html .= " >";       
        if($embed_id!=''){
        $oembed_instagram_html .= '<iframe class="inner_instagram_iframe_'.$class.'" src="//instagr.am/p/'.$embed_id.'/embed/?enablejsapi=1"'. 
        ' style="'.
        'max-width:'.'100%'." !important".
        '; max-height:'.'100%'." !important".
        '; width:'.'100%'.
        '; height:'. '100%' .
        '; margin:0'.
        '; display:table-cell; vertical-align:middle;"'.
        'frameborder="0" scrolling="no" allowtransparency="false" allowfullscreen'. 
        '></iframe>';
        }
        $oembed_instagram_html .="</div>";
        $html_to_insert .= $oembed_instagram_html;
        break;
      case 'EMBED_OEMBED_DAILYMOTION_VIDEO':
        $oembed_dailymotion_html ='<iframe ';
        if($embed_id!=''){
          $oembed_dailymotion_html .= ' src="' . '//www.dailymotion.com/embed/video/'. $embed_id . '?api=postMessage"';
        }
        foreach ($attrs as $attr => $value) {
          if(preg_match('/src/i', $attr)===0){
            if($attr != '' && $value != ''){
              $oembed_dailymotion_html .= ' '. $attr . '="'. $value . '"';
            }
          }
        }
        $oembed_dailymotion_html .= " ></iframe>";
        $html_to_insert .= $oembed_dailymotion_html;
        break;
      default:
        # code...
        break;
    }

    echo $html_to_insert;

  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}