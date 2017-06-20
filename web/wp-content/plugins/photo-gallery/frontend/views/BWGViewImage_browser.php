<?php

class BWGViewImage_browser {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;


  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function display($params, $from_shortcode = 0, $bwg = 0) {
    global $WD_BWG_UPLOAD_DIR;
    require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
    require_once(WD_BWG_DIR . '/framework/WDWLibraryEmbed.php');
    $theme_row = $this->model->get_theme_row_data($params['theme_id']);
    if (!isset($params['order_by'])) {
      $order_by = 'asc';
    }
    else {
      $order_by = $params['order_by'];
    }
    if (!isset($params['popup_enable_pinterest'])) {
      $params['popup_enable_pinterest'] = 0;
    }
    if (!isset($params['popup_enable_tumblr'])) {
      $params['popup_enable_tumblr'] = 0;
    }
    if (!isset($params['show_search_box'])) {
      $params['show_search_box'] = 0;
    }
    if (!isset($params['search_box_width'])) {
      $params['search_box_width'] = 180;
    }
    if (!isset($params['popup_enable_info'])) {
      $params['popup_enable_info'] = 1;
    }
    if (!isset($params['popup_info_always_show'])) {
      $params['popup_info_always_show'] = 0;
    }
    if (!isset($params['popup_info_full_width'])) {
      $params['popup_info_full_width'] = 0;
    }
    if (!isset($params['popup_enable_rate'])) {
      $params['popup_enable_rate'] = 0;
    }
    if (!isset($params['thumb_click_action']) || $params['thumb_click_action'] == 'undefined') {
      $params['thumb_click_action'] = 'open_lightbox';
    }
    if (!isset($params['thumb_link_target'])) {
      $params['thumb_link_target'] = 1;
    }
    if (!isset($params['popup_hit_counter'])) {
      $params['popup_hit_counter'] = 0;
    }
    if (!$theme_row) {
      echo WDWLibrary::message(__('There is no theme selected or the theme was deleted.', 'bwg'), 'error');
      return;
    }
    $gallery_row = $this->model->get_gallery_row_data($params['gallery_id']);
    if (!$gallery_row) {
      echo WDWLibrary::message(__('There is no gallery selected or the gallery was deleted.', 'bwg'), 'error');
      return;
    }
    $image_rows = $this->model->get_image_rows_data($params['gallery_id'], 1, $params['sort_by'], $order_by, $bwg);
    $images_count = count($image_rows); 
    if (!$image_rows) {
      echo WDWLibrary::message(__('There are no images in this gallery.', 'bwg'), 'error');
    }
    $page_nav = $this->model->page_nav($params['gallery_id'], 1, $bwg);
    $rgb_page_nav_font_color = WDWLibrary::spider_hex2rgb($theme_row->page_nav_font_color);
    $image_browser_images_conteiner = WDWLibrary::spider_hex2rgb($theme_row->image_browser_full_bg_color);
    $bwg_image_browser_image = WDWLibrary::spider_hex2rgb($theme_row->image_browser_bg_color);
    $image_title = $params['image_browser_title_enable'];
    $enable_image_description = $params['image_browser_description_enable'];
    $option_row = $this->model->get_option_row_data();
    $placeholder = isset($option_row->placeholder) ? $option_row->placeholder : '';
    $image_right_click = $option_row->image_right_click;
    if (!isset($params['popup_fullscreen'])) {
      $params['popup_fullscreen'] = 0;
    }
    if (!isset($params['popup_autoplay'])) {
      $params['popup_autoplay'] = 0;
    }
    $params_array = array(
      'action' => 'GalleryBox',
      'current_view' => $bwg,
      'gallery_id' => $params['gallery_id'],
      'theme_id' => $params['theme_id'],
      'open_with_fullscreen' => $params['popup_fullscreen'],
      'open_with_autoplay' => $params['popup_autoplay'],
      'image_width' => $params['popup_width'],
      'image_height' => $params['popup_height'],
      'image_effect' => $params['popup_effect'],
      'wd_sor' => $params['sort_by'],
      'wd_ord' => $order_by,
      'enable_image_filmstrip' => $params['popup_enable_filmstrip'],
      'image_filmstrip_height' => $params['popup_filmstrip_height'],
      'enable_image_ctrl_btn' => $params['popup_enable_ctrl_btn'],
      'enable_image_fullscreen' => $params['popup_enable_fullscreen'],
      'popup_enable_info' => $params['popup_enable_info'],
      'popup_info_always_show' => $params['popup_info_always_show'],
      'popup_info_full_width' => $params['popup_info_full_width'],
      'popup_hit_counter' => $params['popup_hit_counter'],
      'popup_enable_rate' => $params['popup_enable_rate'],
      'slideshow_interval' => $params['popup_interval'],
      'enable_comment_social' => $params['popup_enable_comment'],
      'enable_image_facebook' => $params['popup_enable_facebook'],
      'enable_image_twitter' => $params['popup_enable_twitter'],
      'enable_image_google' => $params['popup_enable_google'],
      'enable_image_pinterest' => $params['popup_enable_pinterest'],
      'enable_image_tumblr' => $params['popup_enable_tumblr'],
      'watermark_type' => $params['watermark_type'],
      'slideshow_effect_duration' => isset($params['popup_effect_duration']) ? $params['popup_effect_duration'] : 1
    );
    $items_per_page = array('images_per_page' => 1, 'load_more_image_count' => 1);
    if ($params['watermark_type'] == 'none') {
      $params_array['watermark_font'] = '';
      $params_array['watermark_color'] = '';
      $params_array['watermark_font_size'] = '';
      $params_array['watermark_opacity'] = '';
      $text_align = '';
      $vertical_align = '';
      $params_array['watermark_width'] = '';
      $show_watermark = FALSE;
    }
    if ($params['watermark_type'] != 'none') {
      $params_array['watermark_link'] = urlencode($params['watermark_link']);
      $params_array['watermark_opacity'] = $params['watermark_opacity'];
      $params_array['watermark_position'] =(($params['watermark_position'] != 'undefined') ? $params['watermark_position'] : 'top-center');
			$position = explode('-', $params_array['watermark_position']);
			$vertical_align = $position[0];
			$text_align = $position[1];
    }
    if ($params['watermark_type'] == 'text') {
      $show_watermark = TRUE;
      $watermark_text_image = TRUE;
      $params_array['watermark_text'] = $params['watermark_text'];
      $params_array['watermark_font_size'] = $params['watermark_font_size'];
      $params_array['watermark_font'] = $params['watermark_font'];
      $params_array['watermark_color'] = $params['watermark_color'];
			$params_array['watermark_width'] = '';
			$watermark_image_or_text = $params_array['watermark_text'];
			$watermark_a = 'bwg_watermark_text_' . $bwg;
			$watermark_div = 'class="bwg_image_browser_watermark_text_' . $bwg . '"';
    }
    elseif ($params['watermark_type'] == 'image') {
      $show_watermark = TRUE;
      $watermark_text_image = FALSE;
      $params_array['watermark_url'] = urlencode($params['watermark_url']);
      $params_array['watermark_width'] = $params['watermark_width'];
      $params_array['watermark_height'] = $params['watermark_height'];
			$watermark_image_or_text = '<img class="bwg_image_browser_watermark_img_' . $bwg . '" src="' . $params_array['watermark_url'] . '" />';
			$watermark_a = '';
			$watermark_div = 'class="bwg_image_browser_watermark_' . $bwg . '"';
      $params_array['watermark_font'] = '';
      $params_array['watermark_color'] = '';
       $params_array['watermark_font_size'] = ''; 
    }
    ?>
    <style>
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .image_browser_images_conteiner_<?php echo $bwg; ?> * {
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .image_browser_images_conteiner_<?php echo $bwg; ?>{
				background-color: rgba(<?php echo $image_browser_images_conteiner['red']; ?>, <?php echo $image_browser_images_conteiner['green']; ?>, <?php echo $image_browser_images_conteiner['blue']; ?>, <?php echo number_format($theme_row->image_browser_full_transparent / 100, 2, ".", ""); ?>);
				text-align: center;
				width: 100%;
				border-style: <?php echo $theme_row->image_browser_full_border_style;?>;
				border-width: <?php echo $theme_row->image_browser_full_border_width;?>px;
				border-color: #<?php echo $theme_row->image_browser_full_border_color;?>;
				padding: <?php echo $theme_row->image_browser_full_padding; ?>;
				border-radius: <?php echo $theme_row->image_browser_full_border_radius; ?>;
				position:relative;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .image_browser_images_<?php echo $bwg; ?> {
				display: inline-block;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				font-size: 0;
				text-align: center;
				max-width: 100%;
				width: <?php echo $params['image_browser_width']; ?>px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .image_browser_image_buttons_conteiner_<?php echo $bwg; ?> {
				text-align: <?php echo $theme_row->image_browser_align; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .image_browser_image_buttons_<?php echo $bwg; ?> {
				display: inline-block;
				width:100%;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_image_<?php echo $bwg; ?> {
        background-color: rgba(<?php echo $bwg_image_browser_image['red']; ?>, <?php echo $bwg_image_browser_image['green']; ?>, <?php echo $bwg_image_browser_image['blue']; ?>, <?php echo number_format($theme_row->image_browser_transparent / 100, 2, ".", ""); ?>);
				text-align: center;
				/*display: inline-block;*/
				vertical-align: middle;
				margin: <?php echo $theme_row->image_browser_margin; ?>;
				padding: <?php echo $theme_row->image_browser_padding; ?>;
				border-radius: <?php echo $theme_row->image_browser_border_radius; ?>;
				border: <?php echo $theme_row->image_browser_border_width; ?>px <?php echo $theme_row->image_browser_border_style; ?> #<?php echo $theme_row->image_browser_border_color; ?>;
				box-shadow: <?php echo $theme_row->image_browser_box_shadow; ?>;
				/*z-index: 100;*/
				position: relative;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_alt_<?php echo $bwg; ?>{
				display: table;
				width: 100%;
				font-size: <?php echo $theme_row->image_browser_img_font_size; ?>px;
				font-family: <?php echo $theme_row->image_browser_img_font_family; ?>;
				color: #<?php echo $theme_row->image_browser_img_font_color; ?>;
				text-align:<?php echo $theme_row->image_browser_image_description_align; ?>;
				padding-left: 8px;
        word-break: break-word;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_img_<?php echo $bwg; ?> {
        padding: 0 !important;
				max-width: 100% !important;
				height: inherit !important;
				width: 100%;				
      }
      @media only screen and (max-width : 320px) {
				#bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .displaying-num_<?php echo $bwg; ?> {
				  display: none;
				}
				#bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_alt_<?php echo $bwg; ?> {
				  font-size: 10px !important;
				}
				#bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_watermark_text_<?php echo $bwg; ?>,
				#bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_watermark_text_<?php echo $bwg; ?>:hover {
				  font-size: 10px !important;
				  text-decoration: none;
				  margin: 4px;
				  font-family: <?php echo $params_array['watermark_font']; ?>;
				  color: #<?php echo $params_array['watermark_color']; ?> !important;
				  opacity: <?php echo number_format($params_array['watermark_opacity'] / 100, 2, ".", ""); ?>;
			  	filter: Alpha(opacity=<?php echo $params_array['watermark_opacity']; ?>);
          text-decoration: none;
				  position: relative;
				  z-index: 10141;
				}
				#bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_image_description_<?php echo $bwg; ?> {
          color: #<?php echo $theme_row->image_browser_img_font_color; ?>;
				  display: table;
				  width: 100%;
				  text-align: left;
				  font-size: 8px !important;
				  font-family: <?php echo $theme_row->image_browser_img_font_family; ?>;
				  padding: <?php echo $theme_row->image_browser_image_description_padding; ?>;
				  /*word-break: break-all;*/
				  border-style: <?php echo $theme_row->image_browser_image_description_border_style; ?>;
				  background-color: #<?php echo $theme_row->image_browser_image_description_bg_color; ?>;
				  border-radius: <?php echo $theme_row->image_browser_image_description_border_radius; ?>;
				  border-width: <?php echo $theme_row->image_browser_image_description_border_width; ?>px;
				}
        
				#bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a {
				  font-size: 10px !important;
				}				
      }
      /*pagination styles*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> {
				text-align: <?php echo $theme_row->page_nav_align; ?>;
				font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
				font-family: <?php echo $theme_row->page_nav_font_style; ?>;
				font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
				color: #<?php echo $theme_row->page_nav_font_color; ?>;
				margin: 6px 0 4px;
				display: block;
				height: 30px;
				line-height: 30px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .displaying-num_<?php echo $bwg; ?> {
				font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
				font-family: <?php echo $theme_row->page_nav_font_style; ?>;
				font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
				color: #<?php echo $theme_row->page_nav_font_color; ?>;
				margin-right: 10px;
				vertical-align: middle;
				display: none;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .paging-input_<?php echo $bwg; ?> {
				font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
				font-family: <?php echo $theme_row->page_nav_font_style; ?>;
				font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
				color: #<?php echo $theme_row->page_nav_font_color; ?>;
				vertical-align: middle;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled:hover,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled:focus {
				cursor: default;
				color: rgba(<?php echo $rgb_page_nav_font_color['red']; ?>, <?php echo $rgb_page_nav_font_color['green']; ?>, <?php echo $rgb_page_nav_font_color['blue']; ?>, 0.5);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.next-page:hover,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.prev-page:hover {
        color: #000000;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a {
				cursor: pointer;
				font-size: 15px;
				font-family: <?php echo $theme_row->page_nav_font_style; ?>;
				font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
				color: #<?php echo $theme_row->page_nav_font_color; ?>;
				text-decoration: none;
				padding: 0% 7%;
				margin: <?php echo $theme_row->page_nav_margin; ?>;
				border-radius: <?php echo $theme_row->page_nav_border_radius; ?>;
				border-style: none;
				border-width: <?php echo $theme_row->page_nav_border_width; ?>px;
				border-color: #<?php echo $theme_row->page_nav_border_color; ?>;
				background-color: #<?php echo $theme_row->page_nav_button_bg_color; ?>;
				opacity: <?php echo number_format($theme_row->page_nav_button_bg_transparent / 100, 2, ".", ""); ?>;
				filter: Alpha(opacity=<?php echo $theme_row->page_nav_button_bg_transparent; ?>);
				<?php echo ($theme_row->page_nav_button_transition ) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> .first-page,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> .last-page {
        padding: 0% 7%; 		        
      }
	    #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> .next-page {
        margin: 0% 4% 0% 0%; 		        
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> .prev-page {
        margin: 0% 0% 0% 4%; 		        
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_popup_overlay_<?php echo $bwg; ?> {
				background-color: #<?php echo $theme_row->lightbox_overlay_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->lightbox_overlay_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_overlay_bg_transparent; ?>);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_image_desp_<?php echo $bwg; ?> {
				display: table;
				clear: both;
				text-align: center;
        padding: <?php echo $theme_row->image_browser_image_description_margin; ?>;
				width: 100%;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_image_description_<?php echo $bwg; ?> {
        color: #<?php echo $theme_row->image_browser_img_font_color; ?>;
				display: table;
				width: 100%;
				text-align: left;
				font-size: <?php echo $theme_row->image_browser_img_font_size; ?>px;
				font-family: <?php echo $theme_row->image_browser_img_font_family; ?>;
				padding: <?php echo $theme_row->image_browser_image_description_padding; ?>;
				word-break: break-word;
				border-style: <?php echo $theme_row->image_browser_image_description_border_style; ?>;
				background-color: #<?php echo $theme_row->image_browser_image_description_bg_color; ?>;
				border-radius: <?php echo $theme_row->image_browser_image_description_border_radius; ?>;
				border-width: <?php echo $theme_row->image_browser_image_description_border_width; ?>px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_image_alt_<?php echo $bwg; ?> {
      	display:table;
        clear: both;
        text-align: center;
        padding: 8px;
        width: 100%;
      }
      /*watermark*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_watermark_text_<?php echo $bwg; ?>,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_watermark_text_<?php echo $bwg; ?>:hover {
				text-decoration: none;
				margin: 4px;
				font-size: <?php echo $params_array['watermark_font_size']; ?>px;
				font-family: <?php echo $params_array['watermark_font']; ?>;
				color: #<?php echo $params_array['watermark_color']; ?> !important;
				opacity: <?php echo number_format($params_array['watermark_opacity'] / 100, 2, ".", ""); ?>;
				filter: Alpha(opacity=<?php echo $params_array['watermark_opacity']; ?>);
				position: relative;
				z-index: 10141;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_image_contain_<?php echo $bwg; ?>{
				position: absolute;
				text-align: center;
				vertical-align: middle;
				width: 100%;
				height: 100%;
				cursor: pointer;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_watermark_contain_<?php echo $bwg; ?>{
        display: table;
				vertical-align: middle;
				width: 100%;
				height: 100%;
      }	 
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_watermark_cont_<?php echo $bwg; ?>{
        display: table-cell;
				text-align: <?php echo $text_align; ?>;
				position: relative;
				vertical-align: <?php echo $vertical_align; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_watermark_<?php echo $bwg; ?>{
				display: inline-block;
				overflow: hidden;
				position: relative;
				vertical-align: middle;
				z-index: 10140;
				width: <?php echo $params_array['watermark_width'];?>px;
				max-width: <?php echo (($params_array['watermark_width']) / ($params['image_browser_width'])) * 100 ; ?>%;
				margin: 10px 10px 10px 10px ;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_watermark_text_<?php echo $bwg; ?>{
        display: inline-block;
				overflow: hidden;
				position: relative;
				vertical-align: middle;
				z-index: 10140;
				margin: 10px 10px 10px 10px ;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_browser_watermark_img_<?php echo $bwg; ?>{
				max-width: 100%;
				opacity: <?php echo number_format($params_array['watermark_opacity'] / 100, 2, ".", ""); ?>;
				filter: Alpha(opacity=<?php echo $params_array['watermark_opacity']; ?>);
				position: relative;
				z-index: 10141;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_none_selectable {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
    </style>
    <div id="bwg_container1_<?php echo $bwg; ?>">
      <div id="bwg_container2_<?php echo $bwg; ?>">
        <form id="gal_front_form_<?php echo $bwg; ?>" method="post" action="#">
          <?php
          if ($params['show_search_box']) {
            WDWLibrary::ajax_html_frontend_search_box('gal_front_form_' . $bwg, $bwg, 'bwg_standart_thumbnails_' . $bwg, $images_count, $params['search_box_width'], $placeholder);
          }
          ?>
          <div class="image_browser_images_conteiner_<?php echo $bwg; ?>">
            <div id="ajax_loading_<?php echo $bwg; ?>" style="position:absolute;width: 100%; z-index: 115; text-align: center; height: 100%; vertical-align: middle; display:none;">
              <div style="display: table; vertical-align: middle; width: 100%; height: 100%; background-color: #FFFFFF; opacity: 0.7; filter: Alpha(opacity=70);">
                <div style="display: table-cell; text-align: center; position: relative; vertical-align: middle;" >
                  <div id="loading_div_<?php echo $bwg; ?>" class="spider_ajax_loading" style="display: inline-block; text-align:center; position:relative; vertical-align:middle; background-image:url(<?php echo WD_BWG_URL . '/images/ajax_loader.png'; ?>); float: none; width:50px;height:50px;background-size:50px 50px;">
                  </div>
                </div>
              </div>
            </div>
            <div class="image_browser_images_<?php echo $bwg; ?>" id="bwg_standart_thumbnails_<?php echo $bwg; ?>" >
              <?php
              if ( $theme_row->page_nav_position == 'top') {
                WDWLibrary::ajax_html_frontend_page_nav($theme_row, $page_nav['total'], $page_nav['limit'], 'gal_front_form_' . $bwg, $items_per_page, $bwg, 'bwg_standart_thumbnails_' . $bwg, 0, 'album', $option_row->enable_seo);
              }
              foreach ($image_rows as $image_row) {
                $params_array['image_id'] = (isset($_POST['image_id']) ? esc_html($_POST['image_id']) : $image_row->id);
                $is_embed = preg_match('/EMBED/',$image_row->filetype)==1 ? true :false;
                $is_embed_16x9 = ((preg_match('/EMBED/',$image_row->filetype)==1 ? true : false) && (preg_match('/VIDEO/',$image_row->filetype)==1 ? true : false) && !(preg_match('/INSTAGRAM/',$image_row->filetype)==1 ? true :false));
                $is_embed_instagram_post = preg_match('/INSTAGRAM_POST/',$image_row->filetype)==1 ? true :false;
                ?>  
                <div class="image_browser_image_buttons_conteiner_<?php echo $bwg; ?>">
                  <div class="image_browser_image_buttons_<?php echo $bwg;?>">
                    <div class="bwg_image_browser_image_alt_<?php echo $bwg; ?>">
                      <?php
                      if ($image_title) {
                        ?>
                        <div class="bwg_image_alt_<?php echo $bwg; ?>" id="alt<?php echo $image_row->id; ?>">
                          <?php echo html_entity_decode($image_row->alt); ?>
                        </div>
                      <?php
                      }
                      ?>
                    </div> 
                    <div class="bwg_image_browser_image_<?php echo $bwg; ?>">
                      <?php
                      if ($show_watermark) {
                        ?>
                        <div class="bwg_image_browser_image_contain_<?php echo $bwg; ?>" id="bwg_image_browser_image_contain_<?php echo $image_row->id ?>">
                          <div class="bwg_image_browser_watermark_contain_<?php echo $bwg; ?>">
                            <div class="bwg_image_browser_watermark_cont_<?php echo $bwg; ?>">
                              <div <?php echo $watermark_div; ?> >
                                <a class="bwg_none_selectable <?php echo $watermark_a; ?>" id="watermark_a<?php echo $image_row->id; ?>" href="<?php echo urldecode($params_array['watermark_link']); ?>" target="_blank">
                                  <?php echo $watermark_image_or_text; ?>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                      if (!$is_embed) {
                      ?>
                        <a style="position:relative;" <?php echo ($params['thumb_click_action'] == 'open_lightbox' ? (' class="bwg_lightbox_' . $bwg . '" data-image-id="' . $image_row->id . '"') : ($params['thumb_click_action'] == 'redirect_to_url' && $image_row->redirect_url ? 'href="' . $image_row->redirect_url . '" target="' .  ($params['thumb_link_target'] ? '_blank' : '')  . '"' : '')) ?>>
                          <img class="bwg_image_browser_img_<?php echo $bwg; ?>" src="<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR . $image_row->image_url; ?>" alt="<?php echo $image_row->alt; ?>" />
                        </a>
                      <?php 
                      }
                      else{ /*$is_embed*/

                        if($is_embed_16x9){
                          WDWLibraryEmbed::display_embed($image_row->filetype, $image_row->filename, array('id'=>"bwg_embed_frame_16x9_".$bwg,'width'=>$params['image_browser_width'], 'height'=>$params['image_browser_width']*0.5625, 'frameborder'=>"0", 'allowfullscreen'=>"allowfullscreen", 'style'=>"position: relative; margin:0;"));          
                        }
                        else if($is_embed_instagram_post) {
                          $instagram_post_width = $params['image_browser_width'];
                          $instagram_post_height = $params['image_browser_width'];
                          $image_resolution = explode(' x ', $image_row->resolution);
                          if (is_array($image_resolution)) {
                            $instagram_post_width = $image_resolution[0];
                            $instagram_post_height = explode(' ', $image_resolution[1]);
                            $instagram_post_height = $instagram_post_height[0];
                          }
                          WDWLibraryEmbed::display_embed($image_row->filetype, $image_row->filename, array('class' => "bwg_embed_frame_instapost_" . $bwg, 'data-width' => $instagram_post_width, 'data-height' => $instagram_post_height, 'frameborder' => "0", 'allowfullscreen' => "allowfullscreen", 'style' => "position: relative; margin:0;"));          
                        }
                        else{/*for instagram image, video and flickr enable lightbox onclick*/
                          ?>
                          <a style="position:relative;" <?php echo ($params['thumb_click_action'] == 'open_lightbox' ? (' class="bwg_lightbox_' . $bwg . '" data-image-id="' . $image_row->id . '"') : ($image_row->redirect_url ? 'href="' . $image_row->redirect_url . '" target="' .  ($params['thumb_link_target'] ? '_blank' : '')  . '"' : '')) ?>>
                            <?php
                            WDWLibraryEmbed::display_embed($image_row->filetype, $image_row->filename, array('id'=>"bwg_embed_frame_".$bwg,'width'=>$params['image_browser_width'], 'height'=>'auto', 'frameborder'=>"0", 'allowfullscreen'=>"allowfullscreen", 'style'=>"position: relative; margin:0;"));          
                          ?>
                          </a>

                        <?php
                        } 
                      }
                      ?>
                      <script>
                      function bwg_image_browser_<?php echo $bwg; ?>() {
                        jQuery('#bwg_embed_frame_16x9_<?php echo $bwg; ?>').width(jQuery('#bwg_embed_frame_16x9_<?php echo $bwg; ?>').parent().width());
                        jQuery('#bwg_embed_frame_16x9_<?php echo $bwg; ?>').height(jQuery('#bwg_embed_frame_16x9_<?php echo $bwg; ?>').width() * 0.5625);
                        jQuery('#bwg_embed_frame_instapost_<?php echo $bwg; ?>').width(jQuery('#bwg_embed_frame_16x9_<?php echo $bwg; ?>').parent().width());
                        /* 16 is 2*padding inside iframe */
                        /* 96 is 2*padding(top) + 1*padding(bottom) + 40(footer) + 32(header) */
                        jQuery('.bwg_embed_frame_instapost_<?php echo $bwg; ?>').height((jQuery('.bwg_embed_frame_instapost_<?php echo $bwg; ?>').width() - 16) * jQuery('.bwg_embed_frame_instapost_<?php echo $bwg; ?>').attr('data-height') / jQuery('.bwg_embed_frame_instapost_<?php echo $bwg; ?>').attr('data-width') + 96);

                        var bwg_image_browser_width = jQuery('.image_browser_images_<?php echo $bwg; ?>').width();
                        if (bwg_image_browser_width <= 108) {
                          jQuery('.paging-input_<?php echo $bwg; ?>').css('display', 'none');
                        }
                        else if (bwg_image_browser_width <= 200) {
                          jQuery('.paging-input_<?php echo $bwg; ?>').css('margin', '0% 0% 0% 0%');
                          jQuery('.paging-input_<?php echo $bwg; ?>').css('display', 'inline');
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> .next-page').css('margin', '0% 0% 0% 0%');
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> .prev-page').css('margin', '0% 0% 0% 0%');
                        }
                        else if (bwg_image_browser_width <= 580) {
                          jQuery('.paging-input_<?php echo $bwg; ?>').css('display', 'inline');
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> a').css('font-size', '13px');
                          jQuery('.paging-input_<?php echo $bwg; ?>').css('margin', '0% 7% 0% 7%');
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> .next-page').css('margin', '0% 0% 0% 0%');
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> .prev-page').css('margin', '0% 0% 0% 0%');
                        }
                        else {
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> a').css('font-size', '15px');
                          jQuery('.paging-input_<?php echo $bwg; ?>').css('margin', '0%  14% 0%  14%');
                          jQuery('.paging-input_<?php echo $bwg; ?>').css('display', 'inline');
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> .next-page').css('margin', '0% 0% 0% 0%');
                          jQuery('.tablenav-pages_<?php echo $bwg; ?> .prev-page').css('margin', '0% 0% 0% 0%');
                        }
                      }
                      setTimeout(function() {
                        bwg_image_browser_<?php echo $bwg; ?>();
                      }, 3);
                      </script>
                    </div>
                      <?php
                      if ($enable_image_description && ($image_row->description != "")) {
                        ?>
                      <div class="bwg_image_browser_image_desp_<?php echo $bwg; ?>">                    
                        <div class="bwg_image_browser_image_description_<?php echo $bwg; ?>" id="alt<?php echo $image_row->id; ?>">
                          <?php echo html_entity_decode($image_row->description); ?>
                        </div>                  
                      </div>
                        <?php
                      }
                      ?>
                  </div>
                </div>
                <?php
              }
              if ( $theme_row->page_nav_position == 'bottom') {
                WDWLibrary::ajax_html_frontend_page_nav($theme_row, $page_nav['total'], $page_nav['limit'], 'gal_front_form_' . $bwg, $items_per_page, $bwg, 'bwg_standart_thumbnails_' . $bwg, 0, 'album', $option_row->enable_seo);
              }
              ?>
            </div>
          </div>
        </form>
        <div id="spider_popup_loading_<?php echo $bwg; ?>" class="spider_popup_loading"></div>
        <div id="spider_popup_overlay_<?php echo $bwg; ?>" class="spider_popup_overlay" onclick="spider_destroypopup(1000)"></div>
      </div>
    </div>
    <script>
      jQuery(window).load(function () {
        <?php
        if ($image_right_click) {
          ?>
          /* Disable right click.*/
          jQuery('div[id^="bwg_container"]').bind("contextmenu", function (e) {
            return false;
          });
          jQuery('div[id^="bwg_container"]').css('webkitTouchCallout','none');
          <?php
        }
        ?>
      });
      jQuery(window).resize(function() {
        bwg_image_browser_<?php echo $bwg; ?>();
      });
      function bwg_gallery_box_<?php echo $bwg; ?>(image_id) {
        var filtersearchname = jQuery("#bwg_search_input_<?php echo $bwg; ?>" ).val() ? jQuery("#bwg_search_input_<?php echo $bwg; ?>" ).val() : '';
        spider_createpopup('<?php echo addslashes(add_query_arg($params_array, admin_url('admin-ajax.php'))); ?>&image_id=' + image_id + "&filter_search_name_<?php echo $bwg; ?>=" +  filtersearchname, '<?php echo $bwg; ?>', '<?php echo $params['popup_width']; ?>', '<?php echo $params['popup_height']; ?>', 1, 'testpopup', 5, "<?php echo $theme_row->lightbox_ctrl_btn_pos ;?>");
      }
      function bwg_document_ready_<?php echo $bwg; ?>() {
        var bwg_touch_flag = false;
        jQuery(".bwg_lightbox_<?php echo $bwg; ?>").on("click", function () {
          if (!bwg_touch_flag) {
            bwg_touch_flag = true;
            setTimeout(function(){ bwg_touch_flag = false; }, 100);
            bwg_gallery_box_<?php echo $bwg; ?>(jQuery(this).attr("data-image-id"));
            return false;
          }
        });
      }
      jQuery(document).ready(function () {
        bwg_document_ready_<?php echo $bwg; ?>();
      });
    </script>
    <?php
    if ($from_shortcode) {
      return;
    }
    else {
      die();
    }
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}