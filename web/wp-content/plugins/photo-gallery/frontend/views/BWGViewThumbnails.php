<?php

class BWGViewThumbnails {
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

    if (!isset($params['image_title'])) {
      $params['image_title'] = 'none';
    }
    if (!isset($params['popup_fullscreen'])) {
      $params['popup_fullscreen'] = 0;
    }
    if (!isset($params['popup_autoplay'])) {
      $params['popup_autoplay'] = 0;
    }
    if (!isset($params['order_by'])) {
      $params['order_by'] = ' asc ';
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
    if (!isset($params['show_sort_images'])) {
      $params['show_sort_images'] = 0;
    }
    if (!isset($params['image_enable_page'])) {
      $params['image_enable_page'] = 1;
    }
    if (!isset($params['show_tag_box'])) {
      $params['show_tag_box'] = 0;
    }
    $from = (isset($params['from']) ? esc_html($params['from']) : 0);
    $sort_direction = ' ' . $params['order_by'] . ' ';
    $options_row = $this->model->get_options_row_data();
    $placeholder = isset($options_row->placeholder) ? $options_row->placeholder : '';
    $play_icon = $options_row->play_icon;
    if ($from) {
      $params['gallery_id'] = $params['id'];
      $params['images_per_page'] = $params['count'];
      $params['sort_by'] = (($params['show'] == 'random') ? 'RAND()' : 'order');
      if ($params['show'] == 'last') {
        $sort_direction = ' DESC ';
      }
      elseif ($params['show'] == 'first') {
        $sort_direction = ' ASC ';
      }	  
      $params['image_enable_page'] = 0;
      $params['image_title'] = $options_row->image_title_show_hover;
      $params['thumb_height'] = $params['height'];
      $params['thumb_width'] = $params['width'];
      $params['image_column_number'] = $params['count'];
      $params['popup_fullscreen'] = $options_row->popup_fullscreen;
      $params['popup_autoplay'] = $options_row->popup_autoplay;
      $params['popup_width'] = $options_row->popup_width;
      $params['popup_height'] = $options_row->popup_height;
      $params['popup_effect'] = $options_row->popup_type;
      $params['popup_enable_filmstrip'] = $options_row->popup_enable_filmstrip;
      $params['popup_filmstrip_height'] = $options_row->popup_filmstrip_height;
      $params['popup_enable_ctrl_btn'] = $options_row->popup_enable_ctrl_btn;
      $params['popup_enable_fullscreen'] = $options_row->popup_enable_fullscreen;
      $params['popup_enable_info'] = $options_row->popup_enable_info;
      $params['popup_info_always_show'] = $options_row->popup_info_always_show;
      $params['popup_info_full_width'] = $options_row->popup_info_full_width;
      $params['popup_hit_counter'] = $options_row->popup_hit_counter;
      $params['popup_enable_rate'] = $options_row->popup_enable_rate;
      $params['popup_interval'] = $options_row->popup_interval;
      $params['popup_enable_comment'] = $options_row->popup_enable_comment;
      $params['popup_enable_facebook'] = $options_row->popup_enable_facebook;
      $params['popup_enable_twitter'] = $options_row->popup_enable_twitter;
      $params['popup_enable_google'] = $options_row->popup_enable_google;
      $params['popup_enable_pinterest'] = $options_row->popup_enable_pinterest;
      $params['popup_enable_tumblr'] = $options_row->popup_enable_tumblr;
      $params['watermark_type'] = $options_row->watermark_type;
      $params['watermark_link'] = urlencode($options_row->watermark_link);
      $params['watermark_opacity'] = $options_row->watermark_opacity;
      $params['watermark_position'] = $options_row->watermark_position;
      $params['watermark_text'] = $options_row->watermark_text;
      $params['watermark_font_size'] = $options_row->watermark_font_size;
      $params['watermark_font'] = $options_row->watermark_font;
      $params['watermark_color'] = $options_row->watermark_color;
      $params['watermark_url'] = urlencode($options_row->watermark_url);
      $params['watermark_width'] = $options_row->watermark_width;
      $params['watermark_height'] = $options_row->watermark_height;
      $params['thumb_click_action'] = $options_row->thumb_click_action;
      $params['thumb_link_target'] = $options_row->thumb_link_target;
      $params['popup_effect_duration'] = isset($options_row->popup_effect_duration) ? $options_row->popup_effect_duration : 1;
    }
    if (isset($_POST['sortImagesByValue_' . $bwg])) {
			$sort_by = esc_html($_POST['sortImagesByValue_' . $bwg]);
			if ($sort_by == 'random') {
				$params['sort_by'] = 'RAND()';
			}
			else if ($sort_by == 'default')  {
				$params['sort_by'] = $params['sort_by'];
			}
			else {
				$params['sort_by'] = $sort_by;
			}
		}
    $theme_row = $this->model->get_theme_row_data($params['theme_id']);
    if (!$theme_row) {
      echo WDWLibrary::message(__('There is no theme selected or the theme was deleted.', 'bwg'), 'error');
      return;
    }
    if (isset($params['type'])) {
      $type = $params['type'];
    }
    else {
      $type = "";
    }
    $gallery_row = $this->model->get_gallery_row_data($params['gallery_id']);
    if (!$gallery_row && ($type == '')) {
      echo WDWLibrary::message(__('There is no gallery selected or the gallery was deleted.', 'bwg'), 'error');
      return;
    }
    $params['load_more_image_count'] = (isset($params['load_more_image_count']) && ($params['image_enable_page'] == 2)) ? $params['load_more_image_count'] : $params['images_per_page'];
    $items_per_page = array('images_per_page' => $params['images_per_page'], 'load_more_image_count' => $params['load_more_image_count']);
    $image_rows = $this->model->get_image_rows_data($params, $bwg, $type, $sort_direction);
    $images_count = count($image_rows); 
    if (!$image_rows) {
      echo WDWLibrary::message(__('There are no images in this gallery.', 'bwg'), 'error');
    }
    if ($params['image_enable_page'] && $params['images_per_page']) {
      $page_nav = $this->model->page_nav($params['gallery_id'], $bwg, $type);
    }
    $rgb_page_nav_font_color = WDWLibrary::spider_hex2rgb($theme_row->page_nav_font_color);
    $rgb_thumbs_bg_color = WDWLibrary::spider_hex2rgb($theme_row->thumbs_bg_color);
    $tags_rows = $this->model->get_tags_rows_data($params['gallery_id']);
    $image_right_click = $options_row->image_right_click;
    ?>
    <style>
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumbnails_<?php echo $bwg; ?> * {
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun1_<?php echo $bwg; ?> {
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        background-color: #<?php echo $theme_row->thumb_bg_color; ?>;
        display: inline-block;
        height: <?php echo $params['thumb_height']; ?>px;
        margin: <?php echo $theme_row->thumb_margin; ?>px;
        padding: <?php echo $theme_row->thumb_padding; ?>px;
        opacity: <?php echo number_format($theme_row->thumb_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->thumb_transparent; ?>);
        text-align: center;
        vertical-align: middle;
        <?php echo ($theme_row->thumb_transition) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
        width: <?php echo $params['thumb_width']; ?>px;
        z-index: 100;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun1_<?php echo $bwg; ?>:hover {
        -ms-transform: <?php echo $theme_row->thumb_hover_effect; ?>(<?php echo $theme_row->thumb_hover_effect_value; ?>);
        -webkit-transform: <?php echo $theme_row->thumb_hover_effect; ?>(<?php echo $theme_row->thumb_hover_effect_value; ?>);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        opacity: 1;
        filter: Alpha(opacity=100);
        transform: <?php echo $theme_row->thumb_hover_effect; ?>(<?php echo $theme_row->thumb_hover_effect_value; ?>);
        z-index: 102;
        position: relative;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun2_<?php echo $bwg; ?> {
        border: <?php echo $theme_row->thumb_border_width; ?>px <?php echo $theme_row->thumb_border_style; ?> #<?php echo $theme_row->thumb_border_color; ?>;
        border-radius: <?php echo $theme_row->thumb_border_radius; ?>;
        box-shadow: <?php echo $theme_row->thumb_box_shadow; ?>;
        display: inline-block;
        height: <?php echo $params['thumb_height']; ?>px;
        overflow: hidden;
        width: <?php echo $params['thumb_width']; ?>px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumbnails_<?php echo $bwg; ?> {
        background-color: rgba(<?php echo $rgb_thumbs_bg_color['red']; ?>, <?php echo $rgb_thumbs_bg_color['green']; ?>, <?php echo $rgb_thumbs_bg_color['blue']; ?>, <?php echo number_format($theme_row->thumb_bg_transparent / 100, 2, ".", ""); ?>);
        display: inline-block;
        font-size: 0;
        max-width: <?php echo $params['image_column_number'] * ($params['thumb_width'] + 2 * (2 + $theme_row->thumb_margin + $theme_row->thumb_padding + $theme_row->thumb_border_width)); ?>px;
        text-align: <?php echo $theme_row->thumb_align; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_<?php echo $bwg; ?> {
        display: inline-block;
        text-align: center;
      }
      <?php
      if ($params['image_title'] == 'show') { /* Show image title at the bottom.*/
        ?>
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_title_spun1_<?php echo $bwg; ?> {
          display: block;
          margin: 0 auto;
          opacity: 1;
          filter: Alpha(opacity=100);
          text-align: center;
          width: <?php echo $params['thumb_width']; ?>px;
        }
        <?php
      }
      elseif ($params['image_title'] == 'hover') { /* Show image title on hover.*/
        ?>
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_title_spun1_<?php echo $bwg; ?> {
          display: table;
          height: inherit;
          left: -3000px;
          opacity: 0;
          filter: Alpha(opacity=0);
          position: absolute;
          top: 0px;
          width: inherit;
        }
        <?php
      }
      ?>
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun1_<?php echo $bwg; ?>:hover .bwg_title_spun1_<?php echo $bwg; ?> {
        left: <?php echo $theme_row->thumb_padding; ?>px;
        top: <?php echo $theme_row->thumb_padding; ?>px;
        opacity: 1;
        filter: Alpha(opacity=100);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_title_spun2_<?php echo $bwg; ?> {
        color: #<?php echo $theme_row->thumb_title_font_color; ?>;
        display: table-cell;
        font-family: <?php echo $theme_row->thumb_title_font_style; ?>;
        font-size: <?php echo $theme_row->thumb_title_font_size; ?>px;
        font-weight: <?php echo $theme_row->thumb_title_font_weight; ?>;
        height: inherit;
        padding: <?php echo $theme_row->thumb_title_margin; ?>;
        text-shadow: <?php echo $theme_row->thumb_title_shadow; ?>;
        vertical-align: middle;
        width: inherit;
        word-wrap: break-word;
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
      @media only screen and (max-width : 320px) {
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .displaying-num_<?php echo $bwg; ?> {
          display: none;
        }
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .displaying-num_<?php echo $bwg; ?> {
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        margin-right: 10px;
        vertical-align: middle;
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
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a {
        cursor: pointer;
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        text-decoration: none;
        padding: <?php echo $theme_row->page_nav_padding; ?>;
        margin: <?php echo $theme_row->page_nav_margin; ?>;
        border-radius: <?php echo $theme_row->page_nav_border_radius; ?>;
        border-style: <?php echo $theme_row->page_nav_border_style; ?>;
        border-width: <?php echo $theme_row->page_nav_border_width; ?>px;
        border-color: #<?php echo $theme_row->page_nav_border_color; ?>;
        background-color: #<?php echo $theme_row->page_nav_button_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->page_nav_button_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->page_nav_button_bg_transparent; ?>);
        box-shadow: <?php echo $theme_row->page_nav_box_shadow; ?>;
        <?php echo ($theme_row->page_nav_button_transition ) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_back_<?php echo $bwg; ?> {
        background-color: rgba(0, 0, 0, 0);
        color: #<?php echo $theme_row->album_compact_back_font_color; ?> !important;
        cursor: pointer;
        display: block;
        font-family: <?php echo $theme_row->album_compact_back_font_style; ?>;
        font-size: <?php echo $theme_row->album_compact_back_font_size; ?>px;
        font-weight: <?php echo $theme_row->album_compact_back_font_weight; ?>;
        text-decoration: none;
        padding: <?php echo $theme_row->album_compact_back_padding; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_popup_overlay_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->lightbox_overlay_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->lightbox_overlay_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_overlay_bg_transparent; ?>);
      }
     .bwg_play_icon_spun_<?php echo $bwg; ?> {
        width: inherit;
        height: inherit;
        display: table;
        position: absolute;
      }	 
     .bwg_play_icon_<?php echo $bwg; ?> {
        color: #<?php echo $theme_row->thumb_title_font_color; ?>;
        font-size: <?php echo 2 * $theme_row->thumb_title_font_size; ?>px;
        vertical-align: middle;
        display: table-cell !important;
        z-index: 1;
        text-align: center;
        margin: 0 auto;
      }
    </style>
    <div id="bwg_container1_<?php echo $bwg; ?>">
      <div id="bwg_container2_<?php echo $bwg; ?>">
        <form id="gal_front_form_<?php echo $bwg; ?>" method="post" action="#">
          <?php
          if ($params['show_search_box']) {
            WDWLibrary::ajax_html_frontend_search_box('gal_front_form_' . $bwg, $bwg, 'bwg_standart_thumbnails_' . $bwg, $images_count, $params['search_box_width'], $placeholder);
          }
          if (isset($params['show_sort_images']) && $params['show_sort_images']) {
            WDWLibrary::ajax_html_frontend_sort_box('gal_front_form_' . $bwg, $bwg, 'bwg_standart_thumbnails_' . $bwg, $params['sort_by'], $params['search_box_width']);
          }
          if (isset($params['show_tag_box']) && $params['show_tag_box']) {
              WDWLibrary::ajax_html_frontend_search_tags('gal_front_form_' . $bwg, $bwg, 'bwg_standart_thumbnails_' . $bwg, $images_count,$tags_rows);
          }
          ?>
          <div class="bwg_back_<?php echo $bwg; ?>"><?php echo $options_row->showthumbs_name ? $gallery_row->name : ''; ?></div>
          <div style="background-color:rgba(0, 0, 0, 0); text-align: <?php echo $theme_row->thumb_align; ?>; width:100%; position: relative;">
            <div id="ajax_loading_<?php echo $bwg; ?>" style="position:absolute;width: 100%; z-index: 115; text-align: center; height: 100%; vertical-align: middle; display:none;">
              <div style="display: table; vertical-align: middle; width: 100%; height: 100%; background-color: #FFFFFF; opacity: 0.7; filter: Alpha(opacity=70);">
                <div style="display: table-cell; text-align: center; position: relative; vertical-align: middle;" >
                  <div id="loading_div_<?php echo $bwg; ?>" class="spider_ajax_loading" style="display: inline-block; text-align:center; position:relative; vertical-align:middle; background-image:url(<?php echo WD_BWG_URL . '/images/ajax_loader.png'; ?>); float: none; width:50px;height:50px;background-size:50px 50px;">
                  </div>
                </div>
              </div>
            </div>
            <?php
            if ($params['image_enable_page']  && $params['images_per_page'] && ($theme_row->page_nav_position == 'top')) {
              WDWLibrary::ajax_html_frontend_page_nav($theme_row, $page_nav['total'], $page_nav['limit'], 'gal_front_form_' . $bwg, $items_per_page, $bwg, 'bwg_standart_thumbnails_' . $bwg, 0, 'album', $options_row->enable_seo, $params['image_enable_page']);
            }
            ?>
            <div id="bwg_standart_thumbnails_<?php echo $bwg; ?>" class="bwg_standart_thumbnails_<?php echo $bwg; ?>">
              <?php
              foreach ($image_rows as $image_row) {
                $is_embed = preg_match('/EMBED/',$image_row->filetype)==1 ? true :false;
                $is_embed_video = preg_match('/VIDEO/',$image_row->filetype)==1 ? true :false;
                $is_embed_instagram = preg_match('/EMBED_OEMBED_INSTAGRAM/',$image_row->filetype)==1 ? true : false;
                if (!$is_embed) {
                  list($image_thumb_width, $image_thumb_height) = getimagesize(htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $image_row->thumb_url, ENT_COMPAT | ENT_QUOTES));
                }
                else {
                  $image_thumb_width = $params['thumb_width'];
                  if($image_row->resolution != ''){
                    if (!$is_embed_instagram) {
                      $resolution_arr = explode(" ", $image_row->resolution);
                      $resolution_w = intval($resolution_arr[0]);
                      $resolution_h = intval($resolution_arr[2]);
                      if($resolution_w != 0 && $resolution_h != 0){
                        $scale = $scale = max($params['thumb_width'] / $resolution_w, $params['thumb_height'] / $resolution_h);
                        $image_thumb_width = $resolution_w * $scale;
                        $image_thumb_height = $resolution_h * $scale;
                      }
                      else{
                        $image_thumb_width = $params['thumb_width'];
                        $image_thumb_height = $params['thumb_height'];
                      }
                    }
                    else {
                      // this will be ok while instagram thumbnails width and height are the same
                      $image_thumb_width = min($params['thumb_width'], $params['thumb_height']);
                      $image_thumb_height = $image_thumb_width;
                    }
                  }
                  else{
                    $image_thumb_width = $params['thumb_width'];
                    $image_thumb_height = $params['thumb_height'];
                  }
                }
                $scale = max($params['thumb_width'] / $image_thumb_width, $params['thumb_height'] / $image_thumb_height);
                $image_thumb_width *= $scale;
                $image_thumb_height *= $scale;
                $thumb_left = ($params['thumb_width'] - $image_thumb_width) / 2;
                $thumb_top = ($params['thumb_height'] - $image_thumb_height) / 2;
                ?>
                <a <?php echo ($params['thumb_click_action'] == 'open_lightbox' ? (' class="bwg_lightbox_' . $bwg . '"' . ($options_row->enable_seo ? ' href="' . ($is_embed ? $image_row->thumb_url : site_url() . '/' . $WD_BWG_UPLOAD_DIR . $image_row->image_url) . '"' : '') . ' data-image-id="' . $image_row->id . '"') : ($params['thumb_click_action'] == 'redirect_to_url' && $image_row->redirect_url ? 'href="' . $image_row->redirect_url . '" target="' .  ($params['thumb_link_target'] ? '_blank' : '')  . '"' : '')) ?>>
                  <span class="bwg_standart_thumb_<?php echo $bwg; ?>">
                    <?php
                    if ($params['image_title'] == 'show' and $theme_row->thumb_title_pos == 'top') {
                      ?>
                      <span class="bwg_title_spun1_<?php echo $bwg; ?>">
                        <span class="bwg_title_spun2_<?php echo $bwg; ?>">
                          <?php echo $image_row->alt; ?>
                        </span>
                      </span>
                      <?php
                    }
                    ?>
                    <span class="bwg_standart_thumb_spun1_<?php echo $bwg; ?>">
                      <span class="bwg_standart_thumb_spun2_<?php echo $bwg; ?>">
                        <?php
                        if ($play_icon && $is_embed_video) {
                          ?>
                        <span class="bwg_play_icon_spun_<?php echo $bwg; ?>">
                           <i title="<?php echo __('Play', 'bwg'); ?>"  class="fa fa-play bwg_play_icon_<?php echo $bwg; ?>"></i>
                        </span>
                          <?php
                        }
                        if ($params['image_title'] == 'hover') {
                          ?>
                          <span class="bwg_title_spun1_<?php echo $bwg; ?>">
                            <span class="bwg_title_spun2_<?php echo $bwg; ?>">
                              <?php echo $image_row->alt; ?>
                            </span>
                          </span>
                          <?php
                        }
                        ?>
                        <img class="bwg_standart_thumb_img_<?php echo $bwg; ?> bwg_img_clear bwg_img_custom" style="width:<?php echo $image_thumb_width; ?>px; height:<?php echo $image_thumb_height; ?>px; margin-left: <?php echo $thumb_left; ?>px; margin-top: <?php echo $thumb_top; ?>px;" id="<?php echo $image_row->id; ?>" src="<?php echo ($is_embed ? "" : site_url() . '/' . $WD_BWG_UPLOAD_DIR) . $image_row->thumb_url; ?>" alt="<?php echo $image_row->alt; ?>" />
                      </span>
                    </span>
                    <?php
                    if ($params['image_title'] == 'show' and $theme_row->thumb_title_pos == 'bottom') {
                      ?>
                      <span class="bwg_title_spun1_<?php echo $bwg; ?>">
                        <span class="bwg_title_spun2_<?php echo $bwg; ?>">
                          <?php echo $image_row->alt; ?>
                        </span>
                      </span>
                      <?php
                    }
                    ?>
                  </span>
                </a>
                <?php
              }
              ?>
            </div>
            <?php
            if ($params['image_enable_page']  && $params['images_per_page'] && ($theme_row->page_nav_position == 'bottom')) {
              WDWLibrary::ajax_html_frontend_page_nav($theme_row, $page_nav['total'], $page_nav['limit'], 'gal_front_form_' . $bwg, $items_per_page, $bwg, 'bwg_standart_thumbnails_' . $bwg, 0, 'album', $options_row->enable_seo, $params['image_enable_page']);
            }
            ?>
          </div>
        </form>
        <div id="spider_popup_loading_<?php echo $bwg; ?>" class="spider_popup_loading"></div>
        <div id="spider_popup_overlay_<?php echo $bwg; ?>" class="spider_popup_overlay" onclick="spider_destroypopup(1000)"></div>
      </div>
    </div>
    <script>
      <?php
        $params_array = array(
          'tag_id' => (isset($params['type']) ? $params['gallery_id'] : 0),
          'action' => 'GalleryBox',
          'current_view' => $bwg,
          'gallery_id' => $params['gallery_id'],
          'theme_id' => $params['theme_id'],
          'thumb_width' => $params['thumb_width'],
          'thumb_height' => $params['thumb_height'],
          'open_with_fullscreen' => $params['popup_fullscreen'],
          'open_with_autoplay' => $params['popup_autoplay'],
          'image_width' => $params['popup_width'],
          'image_height' => $params['popup_height'],
          'image_effect' => $params['popup_effect'],
          'wd_sor' => (isset($params['type']) ? 'date' : (($params['sort_by'] == 'RAND()') ? 'order' : $params['sort_by'])),
          'wd_ord' => $sort_direction,
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
        if ($params['watermark_type'] != 'none') {
          $params_array['watermark_link'] = urlencode($params['watermark_link']);
          $params_array['watermark_opacity'] = $params['watermark_opacity'];
          $params_array['watermark_position'] = $params['watermark_position'];
        }
        if ($params['watermark_type'] == 'text') {
          $params_array['watermark_text'] = $params['watermark_text'];
          $params_array['watermark_font_size'] = $params['watermark_font_size'];
          $params_array['watermark_font'] = $params['watermark_font'];
          $params_array['watermark_color'] = $params['watermark_color'];
        }
        elseif ($params['watermark_type'] == 'image') {
          $params_array['watermark_url'] = urlencode($params['watermark_url']);
          $params_array['watermark_width'] = $params['watermark_width'];
          $params_array['watermark_height'] = $params['watermark_height'];
        }
      ?>
      function bwg_gallery_box_<?php echo $bwg; ?>(image_id) {
        var filterTags = jQuery("#bwg_tags_id_bwg_standart_thumbnails_<?php echo $bwg; ?>" ).val() ? jQuery("#bwg_tags_id_bwg_standart_thumbnails_<?php echo $bwg; ?>" ).val() : 0;
        var filtersearchname = jQuery("#bwg_search_input_<?php echo $bwg; ?>" ).val() ? jQuery("#bwg_search_input_<?php echo $bwg; ?>" ).val() : '';
        spider_createpopup('<?php echo addslashes(add_query_arg($params_array, admin_url('admin-ajax.php'))); ?>&image_id=' + image_id + "&filter_tag_<?php echo $bwg; ?>=" +  filterTags + "&filter_search_name_<?php echo $bwg; ?>=" +  filtersearchname, '<?php echo $bwg; ?>', '<?php echo $params['popup_width']; ?>', '<?php echo $params['popup_height']; ?>', 1, 'testpopup', 5, "<?php echo $theme_row->lightbox_ctrl_btn_pos ;?>");
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
         <?php 
        if ($image_right_click) {
          ?>
          /* Disable right click.*/
          jQuery('div[id^="bwg_container"]').bind("contextmenu", function () {
            return false;
          });
          jQuery('div[id^="bwg_container"]').css('webkitTouchCallout','none');
          <?php
        }
        ?>
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