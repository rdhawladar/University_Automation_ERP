<?php
/*
*      Robo Gallery     
*      Version: 1.0
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

class roboGallery extends roboGalleryUtils{

 	public $id = 0;
 	public $options_id = 0;
 	public $real_id = 0;

 	public $returnHtml = '';
 	public $options = array();
 	
 	public $rbsBoxStyle = '';
	public $rbsBoxHoverStyle = '';

	public $rbsOverlayStyle = '';

	public $rbsImageLoadingStyle = '';

	public $rbsLinkIconStyle = '';
	public $rbsLinkIconHoverStyle = '';

	public $rbsZoomIconStyle = '';
	public $rbsZoomIconHoverStyle = '';


	public $rbsTitleStyle = '';
	public $rbsTitleHoverStyle = '';

	public $rbsDescStyle = '';
	public $rbsDescHoverStyle = '';

	public $rbsLightboxStyle = '';
	public $rbsTextLightboxStyle = '';

	public $rbsTitleLightboxStyle = '';

	public $rbsCounterLightboxStyle = '';
	public $rbsCloseLightboxStyle = '';
	public $rbsArrowLightboxStyle = '';

	public $rbsMainDivStyle = '';


 	public $javaScript = '';
 	public $javaScriptStyle = '';

 	public $galleryId = '';
 	public $helper = '';

 	public $hover 		= 0;
 	public $linkIcon 	= '';
	public $zoomIcon 	= '';
	public $titleHover 	= '';
	public $descHover 	= '';
	public $templateHover = '';

 	public $selectImages = null;
 	
 	public $orderby = 'categoryD';
 	public $thumbsource = 'medium';

 	public $styleList = array();
 	public $scriptList = array();

 	public $thumbClick = 0;

 	public $touch = 0;
 	
 	public $debug = 0;
 	
 	function updateCountView(){
 		if(!$this->id) return ;
 		$count_key = 'gallery_views_count';
		$countView = (int) get_post_meta($this->id, $count_key, true);
		if( !$countView){
		    $countView = 0;
		    delete_post_meta($this->id, $count_key);
		    add_post_meta($this->id, $count_key, '0');
		}
		$countView++;
		update_post_meta($this->id, $count_key, $countView);
 	}

 	function __construct($attr){
 		$this->helper 		= new rbsHelper();
 		$this->galleryId 	= 'rbs_gallery_'.uniqid();
 		
 		if( isset($attr) && isset($attr['id']) ){

			$this->id = $attr['id'];
			
			$this->updateCountView();

			$options_id = (int) get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'options', true );
			if($options_id){
				$this->real_id = $this->id;
				$this->options_id = $options_id;
				$this->id = $options_id;
			}
			$this->helper->setId( $this->id );
 		}

 		$this->debug = get_option( ROBO_GALLERY_PREFIX.'debugEnable', 0 );
 	}
 	
 	function robo_gallery_styles() {
 		if( get_option( ROBO_GALLERY_PREFIX.'jqueryVersion', 'build' )=='forced' ){
 			$this->styleList[] = ROBO_GALLERY_URL.'gallery/css/magnific.css';
 			$this->styleList[] = ROBO_GALLERY_URL.'gallery/css/gallery.css';
 			$this->styleList[] = ROBO_GALLERY_URL.'gallery/css/gallery.utils.css';
 			$this->styleList[] = ROBO_GALLERY_URL.'css/style.css';
 			$this->styleList[] = ROBO_GALLERY_URL.'addons/button/buttons.css';
 		} else {
			wp_enqueue_style( 'robo-gallery-magnific', 	ROBO_GALLERY_URL.'gallery/css/magnific.css', 	array(), ROBO_GALLERY_VERSION, 'all' );
			wp_enqueue_style( 'robo-gallery-gallery', 	ROBO_GALLERY_URL.'gallery/css/gallery.css', 	array(), ROBO_GALLERY_VERSION, 'all' );
			wp_enqueue_style( 'robo-gallery-utils', 	ROBO_GALLERY_URL.'gallery/css/gallery.utils.css',array(), ROBO_GALLERY_VERSION, 'all' );
			wp_enqueue_style( 'robo-gallery-rbs-style', ROBO_GALLERY_URL.'css/style.css', 				array(), ROBO_GALLERY_VERSION, 'all' );
			wp_enqueue_style( 'robo-gallery-rbs-button',ROBO_GALLERY_URL.'addons/button/buttons.css', 	array(), ROBO_GALLERY_VERSION, 'all' );
		}
	}

	function robo_gallery_scripts() { 
		
		

		if(  get_option( ROBO_GALLERY_PREFIX.'jqueryVersion', 'build' )=='build'  ){
		
			wp_enqueue_script( 'jquery', false, array(), false, true);
			wp_enqueue_script( 'robo-gallery-evemb', 	ROBO_GALLERY_URL.'gallery/js/jquery.evemb.min.js', 			array( 'jquery' ), ROBO_GALLERY_VERSION );
			wp_enqueue_script( 'robo-gallery-utils',  	ROBO_GALLERY_URL.'gallery/js/jquery.utils.min.js', 			array( 'jquery' ), ROBO_GALLERY_VERSION );
			wp_enqueue_script( 'robo-gallery-magnific', ROBO_GALLERY_URL.'gallery/js/jquery.magnific.min.js', 		array( 'jquery' ), ROBO_GALLERY_VERSION );
			
			if($this->touch){
				wp_enqueue_script( 'robo-gallery-touch', 	ROBO_GALLERY_URL.'gallery/js/jquery.touch.min.js', 		array( 'robo-gallery-magnific' ), ROBO_GALLERY_VERSION );	
			} 

			wp_enqueue_script( 'robo-gallery-collage',  ROBO_GALLERY_URL.'gallery/js/jquery.collagePlus.min.js', 	array( 'jquery' ), ROBO_GALLERY_VERSION );   
			wp_enqueue_script( 'robo-gallery-script',  	ROBO_GALLERY_URL.'js/script.js', 							array( 'jquery' ), ROBO_GALLERY_VERSION );   
		} else if(get_option( ROBO_GALLERY_PREFIX.'jqueryVersion', 'build' )=='forced') {
			$this->scriptList[] = ROBO_GALLERY_URL.'gallery/js/alt/rbjquer.min.js';
			$this->scriptList[] = ROBO_GALLERY_URL.'gallery/js/alt/jquery.evemb.min.js';
			$this->scriptList[] = ROBO_GALLERY_URL.'gallery/js/alt/jquery.utils.min.js';
			$this->scriptList[] = ROBO_GALLERY_URL.'gallery/js/alt/jquery.magnific.min.js';

			if($this->touch){
				$this->scriptList[] = ROBO_GALLERY_URL.'gallery/js/alt/jquery.touch.min.js';
			}

			$this->scriptList[] = ROBO_GALLERY_URL.'gallery/js/alt/jquery.collagePlus.min.js';
			$this->scriptList[] = ROBO_GALLERY_URL.'js/alt/script.js';

		} else {
			wp_enqueue_script( 'robo-gallery-rbjquer', 	ROBO_GALLERY_URL.'gallery/js/alt/rbjquer.min.js', 			array( ), 						 ROBO_GALLERY_VERSION );
			wp_enqueue_script( 'robo-gallery-evemb', 	ROBO_GALLERY_URL.'gallery/js/alt/jquery.evemb.min.js', 		array( 'robo-gallery-rbjquer' ), ROBO_GALLERY_VERSION );
			wp_enqueue_script( 'robo-gallery-utils',  	ROBO_GALLERY_URL.'gallery/js/alt/jquery.utils.min.js', 		array( 'robo-gallery-rbjquer' ), ROBO_GALLERY_VERSION );
			wp_enqueue_script( 'robo-gallery-magnific', ROBO_GALLERY_URL.'gallery/js/alt/jquery.magnific.min.js', 	array( 'robo-gallery-rbjquer' ), ROBO_GALLERY_VERSION );
			
			if($this->touch){
				wp_enqueue_script( 'robo-gallery-touch', ROBO_GALLERY_URL.'gallery/js/alt/jquery.touch.min.js', 	array( 'robo-gallery-magnific' ), ROBO_GALLERY_VERSION );
			}

			wp_enqueue_script( 'robo-gallery-collage',  ROBO_GALLERY_URL.'gallery/js/alt/jquery.collagePlus.min.js',array( 'robo-gallery-rbjquer' ), ROBO_GALLERY_VERSION );   
			wp_enqueue_script( 'robo-gallery-script',  	ROBO_GALLERY_URL.'js/alt/script.js', 						array( 'robo-gallery-rbjquer' ), ROBO_GALLERY_VERSION );
		}
		
		if(	$this->debug){
			wp_enqueue_script( 'robo-gallery-debug',  			ROBO_GALLERY_URL.'includes/extensions/debug/js/script.js', 	array( ), 	ROBO_GALLERY_VERSION );
			wp_enqueue_style( 'robo-gallery-debug',				ROBO_GALLERY_URL.'includes/extensions/debug/css/debug.css', array(), 	ROBO_GALLERY_VERSION, 'all' );
		}
	
	}	

	/*
		$hover - 	0   - hover style
					1  	+ hover style
					2   - mainID
	*/
	public function addJavaScriptStyle($styleValue, $styleName = '', $hover='1'){
		if(isset($this->{$styleValue.'Style'}) && $this->{$styleValue.'Style'} ){
			$this->javaScriptStyle.= ($hover!=2?'#'.$this->galleryId.' ':'').$styleName.'{'.$this->{$styleValue.'Style'}.'}';
		}
		if( $hover==1 && isset($this->{$styleValue.'HoverStyle'}) && $this->{$styleValue.'HoverStyle'} ){
			$this->javaScriptStyle.= '#'.$this->galleryId.' '.$styleName.':hover{'.$this->{$styleValue.'HoverStyle'}.'}';
		}
	}

 	

 	public function addBorder($nameOptions = ''){
 		$borderStyle = '';
 		$border = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.$nameOptions, true );
		if( isset($border['width'])){
			$borderStyle.= (int) $border['width'].'px ';
			if($nameOptions=='border-options'){
				$this->helper->setValue( 'borderSize',  (int) $border['width'] );
			}
		}
		if( isset($border['style'])) $borderStyle.=  $border['style'].' ';
		if( isset($border['color'])) $borderStyle.=  $border['color'].' ';
		if( $borderStyle ) return 'border: '.$borderStyle.';';
			else return '';
 	}

 	

 	public function getGallery( ){
 		if( !$this->id ) return ''; 

 		//$galleryImages = get_post_meta( $this->options_id && $this->real_id ? $this->real_id : $this->id, ROBO_GALLERY_PREFIX.'galleryImages', true );;
 		//if( !$galleryImages || !is_array( $galleryImages ) || !count($galleryImages) || !(int)$galleryImages[0] ) return '';

 		$this->helper->setValue( 'filterContainer',  '#'.$this->galleryId.'filter', 'string' );

		
		$sizeType 	= get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'sizeType', true );

		/* ver 2 + */
		$this->touch 	= get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxSwipe', true );
		if($this->touch){
			$this->helper->setValue( 'touch',  1, 'raw' );
		}
		/* ver 2 - */


		$width = 240;  $height = 140;

		$size 		= get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'thumb-size-options', true );
		if( count($size) ){
			if( isset($size['width'])  ) 	$width = (int) 	$size['width']; 	else $width = 240;
			if( isset($size['height']) ) 	$height = (int) $size['height']; 	else $height = 140;
		}

		/* robo_gallery */
		if($this->pro){
			$this->getOrderBy($size);
			$this->getSource($size);
		}
		
		/* robo_gallery */
		if($this->pro){ 
			$this->setColumns();
		} else {
			$colums = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'colums', true );
			if(count($colums)){
				$columns = $this->addWidth($colums, 3);
				if( $columns ){
					$columns .= ', {"columnWidth": "auto" , "columns":2 , "maxWidth": 650}, {"columnWidth": "auto" , "columns":3 , "maxWidth": 960}';
					$this->helper->setValue( 'resolutions',  '[ '.$columns .']', 'raw' );
				}
			}
		}

		if(get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxMobile', true )){
			$this->helper->setValue( 'lightboxOptions',  '{ image: { verticalFit: true }, mainClass: "my-mfp-slide-bottom mfp-img-mobile" }', 'raw' );
		}
		
		if(get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxSourceButton', true )){
			$this->helper->setValue( 'hideSourceImage',  'true', 'raw' );
		}	

		$radius = (int) get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'radius', true );
		$this->rbsBoxStyle .= ' -webkit-border-radius: '.$radius.'px; -moz-border-radius: '.$radius.'px; border-radius: '.$radius.'px;';

		if( get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'border', true ) ){
			$this->rbsBoxStyle .= $this->addBorder('border-options');
			/* robo_gallery */
			if( $this->pro && get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'hover-border', true ) ){
				$this->rbsBoxHoverStyle .= $this->getHoverBorder();
			}
		}

		if( get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'shadow', true ) ){
			$this->rbsBoxStyle .=$this->addShadow('shadow-options');
			/* robo_gallery */
			if ( $this->pro && get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'hover-shadow', true ) ){
				$this->rbsBoxHoverStyle .= $this->getHoverShadown();
			}
		}

		$this->thumbClick = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'thumbClick', true );

		
		if($this->options_id){
			$this->id = $this->real_id;
		}
		$this->selectImages = new roboGalleryImages($this->id, $this->options_id);
		if($this->options_id){
			$this->id = $this->options_id;
		}


		$this->selectImages->setSize( $width , $height, $this->thumbsource, $this->orderby );

		/* robo_gallery */
		if ( $this->pro ) $this->setCCL();

		$this->selectImages->getImages();

		$this->helper->setOption( 'overlayEffect', 'string');
		$this->helper->setOption( 'boxesToLoadStart', 'int');
		$this->helper->setOption( 'boxesToLoad', 'int');
		$this->helper->setOption( 'lazyLoad', 'bool');
		$this->helper->setOption( 'waitUntilThumbLoads', 'bool');
		$this->helper->setOption( 'waitForAllThumbsNoMatterWhat', 'bool');
		$this->helper->setOption( 'deepLinking', 'bool');
		$this->helper->setOption( 'LoadingWord', 'string');
		$this->helper->setOption( 'loadMoreWord', 'string');

		$loadingBgColor = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'loadingBgColor', true );
		if($loadingBgColor) $this->rbsImageLoadingStyle .=  'background-color: '.$loadingBgColor.';';

		$this->helper->setValue( 'loadMoreClass',  $this->getButtonStyle('button') );

		$this->helper->setOption( 'noMoreEntriesWord', 'string');

		$this->helper->setOption( 'horizontalSpaceBetweenBoxes', 'int');
		$this->helper->setOption( 'verticalSpaceBetweenBoxes', 'int');	

		/* robo_gallery */
		if ( $this->pro ) $this->rbsOverlayStyle .= $this->getOverlayBg();
			else $this->rbsOverlayStyle .= 'background: rgba(7, 7, 7, 0.5);';

		$polaroidOn = get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'polaroidOn', true );
		if($polaroidOn){
			$polaroidBackground = get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'polaroidBackground', true );
			$polaroidAlign = get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'polaroidAlign', true );
			$polaroidStyle = 'text-align:'.$polaroidAlign.'; background: '.$polaroidBackground.';';
		}
		
		$menu = get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'menu', true );

		$polaroid_template = '';
		$polaroidSource = get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'polaroidSource', true );
		switch ($polaroidSource) {
			case 'desc':
					$polaroid_template = '@DESC@';
				break;
			case 'caption':
					$polaroid_template = '@CAPTION@';
				break;
			case 'title':
			default:
					$polaroid_template = '@TITLE@';
				break;
		}

		$hover_template = '';
		$desc_template = '';

		if( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'hover', true ) ) $this->hover = 1;
		
		/* robo_gallery */
		if ( $this->pro ) $this->setHoverType();

		$this->linkIcon 	= $this->getTemplateItem( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'linkIcon', true ), 'rbsLinkIcon', 1 );
		$this->zoomIcon 	= $this->getTemplateItem( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'zoomIcon', true ), 'rbsZoomIcon', 1 , ($this->thumbClick?' rbs-lightbox':'') ); //, ' rbs-lightbox'
		$this->titleHover 	= $this->getTemplateItem( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'showTitle', true ), 'rbsTitle', '@TITLE@' );
		
		/* robo_gallery */
		if ( $this->pro ) 	$this->setDescHover();

		if( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'lightboxSocial', true ) ){
			$this->helper->setValue( 'facebook',  	'true', 'raw' );
			$this->helper->setValue( 'twitter',  	'true', 'raw' );
			$this->helper->setValue( 'googleplus',  'true', 'raw' );
			$this->helper->setValue( 'pinterest',  	'true', 'raw' );
		}

		/* robo_gallery */
		if ( $this->pro && method_exists( $this ,'setLightboxBg') ){
			$this->setLightboxBg();
		}
		
		/* v 1.0.2 */
		$lightboxColor = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxColor', true );
		if($lightboxColor) $this->rbsTextLightboxStyle .=  'color: '.$lightboxColor.';';

		if(!get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxTitle', true )){
			$this->helper->setValue( 'hideTitle',  'true' );
		} 
		

		if(!get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxCounter', true )){
			$this->rbsCounterLightboxStyle = 'display:none;';
			$this->addJavaScriptStyle('rbsCounterLightbox','.mfp-container .mfp-counter',2);
		}

		if(!get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxClose', true )){
			$this->rbsCloseLightboxStyle = 'display:none;';
			$this->addJavaScriptStyle('rbsCloseLightbox','.mfp-container .mfp-close',2);
		}

		if(!get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxArrow', true )){
			$this->rbsArrowLightboxStyle = 'display:none;';
			$this->addJavaScriptStyle('rbsArrowLightbox','.mfp-container .mfp-arrow',2);
		}

		
		
		if(get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxDescPanel', true )){
			$this->helper->setValue( 'descBox',  'true' );
			$this->helper->setValue( 'descBoxClass',  'rbs_desc_panel_'.get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxDescClass', true ) );
		}
		
		

		$this->addJavaScriptStyle('rbsBox', '.rbs-img-container');
		$this->addJavaScriptStyle('rbsTitle','.rbsTitle',1);
		$this->addJavaScriptStyle('rbsDesc','.rbsDesc',1);
		$this->addJavaScriptStyle('rbsOverlay','.thumbnail-overlay',0);
		$this->addJavaScriptStyle('rbsLinkIcon','.rbsLinkIcon',1);
		$this->addJavaScriptStyle('rbsZoomIcon','.rbsZoomIcon',1);
		$this->addJavaScriptStyle('rbsImageLoading','.image-with-dimensions',0);

		//$this->addJavaScriptStyle('rbsTitleLightbox','body .mfp-title',2);
		$this->addJavaScriptStyle('rbsTextLightbox','body .mfp-title, body .mfp-counter',2);

		$widthSize 		= get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'width-size', true );
		$widthSizeValue = '';
		if( count($widthSize) ){
			if( isset($widthSize['width'])  ){
				$widthSizeValue = (int) $widthSize['width'];
				if($widthSizeValue){
					if( isset($widthSize['widthType']) && $widthSize['widthType'] ) $widthSizeValue .= 'px';
						else $widthSizeValue .= '%';
				}
			} 	 
		}
		if(!$widthSizeValue) $widthSizeValue = '100%;';

		$this->rbsMainDivStyle = 'width:'.$widthSizeValue.';';

		switch( get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'align', true ) ){
			case 'left':  	$this->rbsMainDivStyle .= 'float: left;'; 	break;
			case 'right':  	$this->rbsMainDivStyle .= 'float: right;'; 	break;
			case 'center':  $this->rbsMainDivStyle .= 'margin: 0 auto;'; break;
			case '': default: 
		}

		$paddingCustom = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'paddingCustom', true );
		if( isset($paddingCustom['left']) 	&& $paddingCustom['left'] ) 	$this->rbsMainDivStyle .= 'padding-left:'.	$this->getCorrectSize($paddingCustom['left']).';';
		if( isset($paddingCustom['top']) 	&& $paddingCustom['top'] ) 		$this->rbsMainDivStyle .= 'padding-top:'.	$this->getCorrectSize($paddingCustom['top']).';';
		if( isset($paddingCustom['right']) 	&& $paddingCustom['right'] ) 	$this->rbsMainDivStyle .= 'padding-right:'.	$this->getCorrectSize($paddingCustom['right']).';';
		if( isset($paddingCustom['bottom']) && $paddingCustom['bottom'] ) 	$this->rbsMainDivStyle .= 'padding-bottom:'.$this->getCorrectSize($paddingCustom['bottom']).';';

		$pretext = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'pretext', true );
		$aftertext = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'aftertext', true );

		if(count($this->selectImages->imgArray)){

			if( get_option( ROBO_GALLERY_PREFIX.'jqueryVersion', 'build' )=='forced' ){
				$this->robo_gallery_styles();
				$this->robo_gallery_scripts();
			} else {
				add_action( 'get_footer', array($this, 'robo_gallery_styles') );
				add_action( 'get_footer', array($this, 'robo_gallery_scripts') );
			}

			for ($i=0; $i<count($this->selectImages->imgArray); $i++) {
				
				if(!isset($this->selectImages->imgArray[$i]) || !is_array($this->selectImages->imgArray[$i]) ) continue ;

				$img = $this->selectImages->imgArray[$i];

				$descBoxData=''; 

				if(get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxDescPanel', true )){

					switch(get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxDescSource', true )){
						case 'caption': 
							$descBoxData = $img['data']->post_excerpt;
							break;

						case 'desc': 
							$descBoxData = $img['data']->post_content;
							break;

						default:
						case 'title':
							$descBoxData = $img['data']->post_title;
							break;
					}

					if($descBoxData) $descBoxData = ' data-descbox="'.$descBoxData.'" ';
				}

				$polaroidDesc =  str_replace( 
					array('@TITLE@','@CAPTION@','@DESC@', '@LINK@'), 
					array( 
						$img['data']->post_title,
						$img['data']->post_excerpt,
						$img['data']->post_content,
						$img['link']
					), 
					$polaroid_template
				);

				$link = $img['image'];

				if( $img['link'] && ( !$this->hover || ( $this->hover == 1 && !$this->linkIcon && !$this->zoomIcon  ) )  ){
					$link = $img['link'].'" data-type="'.($img['typelink']?'blank':'').'link';
				} elseif( $img['videolink'] ) {
					$link = $img['videolink'].'" data-type="iframe';
				}

				$lightboxText = '';

				switch ( get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'lightboxSource', true ) ) {
					case 'title':
							$lightboxText = $img['data']->post_title;
						break;
					case 'desc':
							$lightboxText = $img['data']->post_content;
						break;
					case 'caption':
							$lightboxText = $img['data']->post_excerpt;
						break;
				}

				$lightboxCaption = '';
				
				$newLine='';
				$lineBrake='';
				if($this->debug){
					$newLine = "\t";
					$lineBrake="\n";
				}

				$this->returnHtml .= 
					'<div class="rbs-img category'.$img['catid'].'" '.( isset($img['col']) && $img['col'] ?' data-columns="'.$img['col'].'" ' :'').'>'.$lineBrake.$newLine
			            .'<div class="rbs-img-image '.(!$this->thumbClick?' rbs-lightbox':'').'" '.$descBoxData.' '.( isset($img['effect']) && $img['effect'] ?' data-overlay-effect="'.$img['effect'].'" ' :'').' >'.$lineBrake.$newLine.$newLine
			                .'<div data-thumbnail="'.$img['thumb'].'" title="'.$lightboxText.'" data-width="'.( $sizeType ? $width : $img['sizeW'] ).'" data-height="'.($sizeType?$height:$img['sizeH']).'" ></div>'.$lineBrake.$newLine.$newLine
							.'<div data-popup="'.$link.'"  title="'.$lightboxText.'" '.($lightboxCaption?'data-caption="'.$lightboxCaption.'"':'').'></div>'.$lineBrake.$newLine.$newLine
							.$this->getHover($img).$lineBrake.$newLine
			            .'</div>'.$lineBrake.$newLine
						.($polaroidDesc && $polaroidOn?'<div class="rbs-img-content" '.($polaroidStyle?' style="'.$polaroidStyle.'" ':'').'>'.$polaroidDesc.'</div>':'').$lineBrake
			        .'</div>'.$lineBrake;
			}
		}
		if( $this->returnHtml ){
			$this->returnHtml = 
				'<div style="'.$this->rbsMainDivStyle.'">'
					.($pretext?'<div>'.$pretext.'</div>':'')
					.($menu?$this->getMenu():'').
					'<div id="'.$this->galleryId.'" data-options="'.$this->galleryId.'" style="width:100%;" class="robo_gallery">'
						. $this->returnHtml
					.'</div>'
					.($aftertext?'<div>'.$aftertext.'</div>':'')
				.'</div>'
				.'<script>'.$this->compileJavaScript().'</script>';

				if(count($this->scriptList)){
					for($i=0;$i<count($this->scriptList);$i++){
						$this->returnHtml .= ' <script type="text/javascript" src="'.$this->scriptList[$i].'"></script>';
					}
				}
				if(count($this->styleList)){
					for($i=0;$i<count($this->styleList);$i++){
						$this->returnHtml .= '<link rel="stylesheet" type="text/css" href="'.$this->styleList[$i].'">';
					}
				}
		} 
		return $this->returnHtml;
 	}


 	function getHover( $img ){
			$hoverHTML = '';
			if(!$this->hover) return $hoverHTML;
			if($this->hover == 1){
				$hoverHTML .= $this->titleHover;
				if( $this->linkIcon || $this->zoomIcon ){
					$hoverHTML .= '<div class="rbsIcons">';
					if($this->linkIcon && $img['link']) $hoverHTML .= '<a href="@LINK@" '.($img['typelink']?'target="_blank"':'').' title="@TITLE@">'.$this->linkIcon.'</a>';
					if($this->zoomIcon) $hoverHTML .= $this->zoomIcon;
					$hoverHTML .= '</div>';
				}
				$hoverHTML .= $this->descHover;
			}

			/* robo_gallery check in class */
			if($this->templateHover) $hoverHTML = $this->templateHover; 

			if($hoverHTML){				
				$hoverHTML =  str_replace( 
					array('@TITLE@','@CAPTION@','@DESC@', '@LINK@', '@VIDEOLINK@'), 
					array( 
						$img['data']->post_title,
						$img['data']->post_excerpt,
						$img['data']->post_content,
						$img['link'],
						$img['videolink'],
					), 
					$hoverHTML
				);
			}
			$hoverHTML = '<div class="thumbnail-overlay">'.$hoverHTML.'</div>'; //.( !$this->zoomIcon ?'rbs-lightbox':'')
			return $hoverHTML;
		}

 	function getMenu(){
 		$retHtml = '';
 		$align = get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'buttonAlign', true );
 		if($align) $align = ' rbs_gallery_align_'.$align;
 		$retHtml .= '<div class="rbs_gallery_button'.$align.'"  id="'.$this->galleryId.'filter">';

 		$paddingLeft = (int)get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'paddingLeft', true );
 		$paddingBottom = (int)get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'paddingBottom', true );
 		$style = '';
 		$style .= 'margin-right:'.$paddingLeft.'px;';
 		$style .= 'margin-bottom:'.$paddingBottom.'px;';
 		
 		$class = $this->getButtonStyle('button');

		if( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'menuRoot', true ) ){
			$retHtml .= '<a class="button '.$class.' active" '.($style?'style="'.$style.'"':'').' href="#" data-filter="*">'.get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.'menuRootLabel', true ).'</a>';
		}
 		
 		for ($i=0; $i < count($this->selectImages->catArray); $i++) { 
 			$category = $this->selectImages->catArray[$i];
 			$retHtml .= '<a href="#" '
 								.' data-filter=".category'.$category['id'].'"'
 								.' class="button '.$class.'"'
 								.' '.($style?'style="'.$style.'"':'')
 							.'>'
 								.esc_attr($category['title'])
 							.'</a>';
 		}
 		$retHtml .= '</div>';
 		return $retHtml;
 	}

 	function getButtonStyle($optionName){
 		$class = '';

 		/* robo_gallery */
 		if ( $this->pro ) $class .= $this->getMenuButton($optionName);
 				else $class = 'button-border-caution ';

 		switch ( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.$optionName.'Type', true ) ) {
 			case 'rounded': $class .= 'button-rounded ';break;
 			case 'pill': 	$class .= 'button-pill '; 	break;
 			case 'circle': 	$class .= 'button-circle '; break;
 			case 'normal': default: 					break;
 		}

 		switch ( get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.$optionName.'Size', true ) ) {
 			case 'jumbo': $class .= 'button-jumbo '; 	break;
 			case 'large': $class .= 'button-large '; 	break;
 			case 'small': $class .= 'button-small '; 	break;
 			case 'tiny': $class .= 'button-tiny '; 		break;
 			case 'normal': default: 					break;
 		}
 		
 		return $class;
 	}
 } 