<?php

class BWGViewGalleryBox {
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
  public function display() {
    global $WD_BWG_UPLOAD_DIR;
    require_once(WD_BWG_DIR . '/framework/WDWLibraryEmbed.php');
    $tag_id = (isset($_GET['tag_id']) ? esc_html($_GET['tag_id']) : 0);
    $gallery_id = WDWLibrary::esc_script('get', 'gallery_id', 0, 'int');
    $bwg = (isset($_GET['current_view']) ? esc_html($_GET['current_view']) : 0);
    $current_image_id = WDWLibrary::esc_script('get', 'image_id', 0, 'int');
    $theme_id = (isset($_GET['theme_id']) ? esc_html($_GET['theme_id']) : 1);
    $thumb_width = (isset($_GET['thumb_width']) ? esc_html($_GET['thumb_width']) : 120);
    $thumb_height = (isset($_GET['thumb_height']) ? esc_html($_GET['thumb_height']) : 90);
    $open_with_fullscreen = WDWLibrary::esc_script('get', 'open_with_fullscreen', 0, 'int');
    $open_with_autoplay = WDWLibrary::esc_script('get', 'open_with_autoplay', 0, 'int');
    $image_width = WDWLibrary::esc_script('get', 'image_width', 800, 'int');
    $image_height = WDWLibrary::esc_script('get', 'image_height', 500, 'int');
    $image_effect = WDWLibrary::esc_script('get', 'image_effect', 'fade');
    $sort_by = (isset($_GET['wd_sor']) ? esc_html($_GET['wd_sor']) : 'order');
    $order_by = (isset($_GET['wd_ord']) ? esc_html($_GET['wd_ord']) : 'asc');
    $enable_image_filmstrip = FALSE;
    $enable_image_fullscreen = (isset($_GET['enable_image_fullscreen']) ? esc_html($_GET['enable_image_fullscreen']) : 0);
    $popup_enable_info = (isset($_GET['popup_enable_info']) ? esc_html($_GET['popup_enable_info']) : 1);
    $popup_info_always_show = (isset($_GET['popup_info_always_show']) ? esc_html($_GET['popup_info_always_show']) : 0);
    $popup_info_full_width = (isset($_GET['popup_info_full_width']) ? esc_html($_GET['popup_info_full_width']) : 0);
    $popup_enable_rate = WDWLibrary::esc_script('get', 'popup_enable_rate', 0, 'int');
    $popup_hit_counter = (isset($_GET['popup_hit_counter']) ? esc_html($_GET['popup_hit_counter']) : 0);
    $slideshow_effect_duration = (isset($_GET['slideshow_effect_duration']) ? (int) $_GET['slideshow_effect_duration'] : 1);


    $slideshow_interval = (isset($_GET['slideshow_interval']) ? (int) $_GET['slideshow_interval'] : 5);
    $enable_image_ctrl_btn = (isset($_GET['enable_image_ctrl_btn']) ? esc_html($_GET['enable_image_ctrl_btn']) : 0);
    $enable_comment_social = FALSE;
    $enable_image_facebook = FALSE;
    $enable_image_twitter = FALSE;
    $enable_image_google = FALSE;
    $enable_image_pinterest = FALSE;
    $enable_image_tumblr = FALSE;

    $watermark_type = (isset($_GET['watermark_type']) ? esc_html($_GET['watermark_type']) : 'none');
    $watermark_text = (isset($_GET['watermark_text']) ? esc_html($_GET['watermark_text']) : '');
    $watermark_font_size = (isset($_GET['watermark_font_size']) ? esc_html($_GET['watermark_font_size']) : 12);
    $watermark_font = (isset($_GET['watermark_font']) ? esc_html($_GET['watermark_font']) : 'Arial');
    $watermark_color = (isset($_GET['watermark_color']) ? esc_html($_GET['watermark_color']) : 'FFFFFF');
    $watermark_opacity = (isset($_GET['watermark_opacity']) ? esc_html($_GET['watermark_opacity']) : 30);
    $watermark_position = explode('-', (isset($_GET['watermark_position']) ? esc_html($_GET['watermark_position']) : 'bottom-right'));
    $watermark_link = (isset($_GET['watermark_link']) ? esc_html($_GET['watermark_link']) : '');
    $watermark_url = (isset($_GET['watermark_url']) ? esc_html($_GET['watermark_url']) : '');
    $watermark_width = (isset($_GET['watermark_width']) ? esc_html($_GET['watermark_width']) : 90);
    $watermark_height = (isset($_GET['watermark_height']) ? esc_html($_GET['watermark_height']) : 90);

    $theme_row = $this->model->get_theme_row_data($theme_id);
    $option_row = $this->model->get_option_row_data();
    $image_right_click = $option_row->image_right_click;
    $image_filmstrip_height = 0;
    $image_filmstrip_width = 0;	

    if ($tag_id != 0) {
      $image_rows = $this->model->get_image_rows_data_tag($tag_id, $sort_by, $order_by);
    }
    else {
      $image_rows = $this->model->get_image_rows_data($gallery_id, $bwg, $sort_by, $order_by);
    }
    $image_id = (isset($_POST['image_id']) ? (int) $_POST['image_id'] : $current_image_id);
    $filmstrip_thumb_margin = $theme_row->lightbox_filmstrip_thumb_margin;
    $margins_split = explode(" ", $filmstrip_thumb_margin);
    $filmstrip_thumb_margin_right = 0;
    $filmstrip_thumb_margin_left = 0;
    if (isset($margins_split[1])) {
      $filmstrip_thumb_margin_right = (int) $margins_split[1];
      if (isset($margins_split[3])) {
        $filmstrip_thumb_margin_left = (int) $margins_split[3];
      }
      else {
        $filmstrip_thumb_margin_left = $filmstrip_thumb_margin_right;
      }
    }
    elseif (isset($margins_split[0])) {
      $filmstrip_thumb_margin_right = (int) $margins_split[0];
      $filmstrip_thumb_margin_left = $filmstrip_thumb_margin_right;
    }
    $filmstrip_thumb_margin_hor = $filmstrip_thumb_margin_right + $filmstrip_thumb_margin_left;
    $rgb_bwg_image_info_bg_color = WDWLibrary::spider_hex2rgb($theme_row->lightbox_info_bg_color);
    $rgb_bwg_image_hit_bg_color = WDWLibrary::spider_hex2rgb($theme_row->lightbox_hit_bg_color);
    $rgb_lightbox_ctrl_cont_bg_color = WDWLibrary::spider_hex2rgb($theme_row->lightbox_ctrl_cont_bg_color);
    $lightbox_bg_transparent = (isset($theme_row->lightbox_bg_transparent)) ? $theme_row->lightbox_bg_transparent : 100;
    $lightbox_bg_color = WDWLibrary::spider_hex2rgb($theme_row->lightbox_bg_color); 

    $current_filename = '';

    ?>
    <style>
      .spider_popup_wrap * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }
      .spider_popup_wrap {
        background-color: rgba(<?php echo $lightbox_bg_color['red']; ?>, <?php echo $lightbox_bg_color['green']; ?>, <?php echo $lightbox_bg_color['blue']; ?>, <?php echo number_format($lightbox_bg_transparent/ 100, 2, ".", ""); ?>);
        display: inline-block;
        left: 50%;
        outline: medium none;
        position: fixed;
        text-align: center;
        top: 50%;
        z-index: 100000;
      }
      .bwg_popup_image {
        max-width: <?php echo $image_width; ?>px;
        max-height: <?php echo $image_height - $image_filmstrip_height; ?>px;
        vertical-align: middle;
        display: inline-block;
      }
      .bwg_popup_embed {
        width: <?php echo $image_width; ?>px;
        height: <?php echo $image_height - $image_filmstrip_height; ?>px;
        vertical-align: middle;
        text-align: center;
        display: inline-block;
      }
      .bwg_ctrl_btn {
        color: #<?php echo $theme_row->lightbox_ctrl_btn_color; ?>;
        font-size: <?php echo $theme_row->lightbox_ctrl_btn_height; ?>px;
        margin: <?php echo $theme_row->lightbox_ctrl_btn_margin_top; ?>px <?php echo $theme_row->lightbox_ctrl_btn_margin_left; ?>px;
        opacity: <?php echo  number_format($theme_row->lightbox_ctrl_btn_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_ctrl_btn_transparent; ?>);
      }
      .bwg_toggle_btn {
        color: #<?php echo $theme_row->lightbox_ctrl_btn_color; ?>;
        font-size: <?php echo $theme_row->lightbox_toggle_btn_height; ?>px;
        margin: 0;
        opacity: <?php echo number_format($theme_row->lightbox_ctrl_btn_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_ctrl_btn_transparent; ?>);
        padding: 0;
      }
      .bwg_btn_container {
        bottom: 0;
        left: 0;
        overflow: hidden;
        position: absolute;
        right: 0;
        top: 0;
      }
      .bwg_ctrl_btn_container {
        background-color: rgba(<?php echo $rgb_lightbox_ctrl_cont_bg_color['red']; ?>, <?php echo $rgb_lightbox_ctrl_cont_bg_color['green']; ?>, <?php echo $rgb_lightbox_ctrl_cont_bg_color['blue']; ?>, <?php echo number_format($theme_row->lightbox_ctrl_cont_transparent / 100, 2, ".", ""); ?>);
        /*background: none repeat scroll 0 0 #<?php echo $theme_row->lightbox_ctrl_cont_bg_color; ?>;*/
        <?php
        if ($theme_row->lightbox_ctrl_btn_pos == 'top') {
          ?>
          border-bottom-left-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          border-bottom-right-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          <?php
        }
        else {
          ?>
          bottom: 0;
          border-top-left-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          border-top-right-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          <?php
        }?>
        height: <?php echo $theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top; ?>px;
        position: absolute;
        text-align: <?php echo $theme_row->lightbox_ctrl_btn_align; ?>;
        width: 100%;
        z-index: 10150;
      }
      .bwg_toggle_container {
        background: none repeat scroll 0 0 #<?php echo $theme_row->lightbox_ctrl_cont_bg_color; ?>;
        <?php
        if ($theme_row->lightbox_ctrl_btn_pos == 'top') {
          ?>
          border-bottom-left-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          border-bottom-right-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          /*top: <?php echo $theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top; ?>px;*/
          <?php
        }
        else {
          ?>
          border-top-left-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          border-top-right-radius: <?php echo $theme_row->lightbox_ctrl_cont_border_radius; ?>px;
          /*bottom: <?php echo $theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top; ?>px;*/
          <?php
        }?>
        cursor: pointer;
        left: 50%;
        line-height: 0;
        margin-left: -<?php echo $theme_row->lightbox_toggle_btn_width / 2; ?>px;
        opacity: <?php echo number_format($theme_row->lightbox_ctrl_cont_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_ctrl_cont_transparent; ?>);
        position: absolute;
        text-align: center;
        width: <?php echo $theme_row->lightbox_toggle_btn_width; ?>px;
        z-index: 10150;
      }
      .bwg_close_btn {
        opacity: <?php echo number_format($theme_row->lightbox_close_btn_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_close_btn_transparent; ?>);
      }
      .spider_popup_close {
        background-color: #<?php echo $theme_row->lightbox_close_btn_bg_color; ?>;
        border-radius: <?php echo $theme_row->lightbox_close_btn_border_radius; ?>;
        border: <?php echo $theme_row->lightbox_close_btn_border_width; ?>px <?php echo $theme_row->lightbox_close_btn_border_style; ?> #<?php echo $theme_row->lightbox_close_btn_border_color; ?>;
        box-shadow: <?php echo $theme_row->lightbox_close_btn_box_shadow; ?>;
        color: #<?php echo $theme_row->lightbox_close_btn_color; ?>;
        height: <?php echo $theme_row->lightbox_close_btn_height; ?>px;
        font-size: <?php echo $theme_row->lightbox_close_btn_size; ?>px;
        right: <?php echo $theme_row->lightbox_close_btn_right; ?>px;
        top: <?php echo $theme_row->lightbox_close_btn_top; ?>px;
        width: <?php echo $theme_row->lightbox_close_btn_width; ?>px;
      }
      .spider_popup_close_fullscreen {
        color: #<?php echo $theme_row->lightbox_close_btn_full_color; ?>;
        font-size: <?php echo $theme_row->lightbox_close_btn_size; ?>px;
        right: 15px;
      }
      .spider_popup_close span,
      #spider_popup_left-ico span,
      #spider_popup_right-ico span {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
      }
      #spider_popup_left-ico,
      #spider_popup_right-ico {
        background-color: #<?php echo $theme_row->lightbox_rl_btn_bg_color; ?>;
        border-radius: <?php echo $theme_row->lightbox_rl_btn_border_radius; ?>;
        border: <?php echo $theme_row->lightbox_rl_btn_border_width; ?>px <?php echo $theme_row->lightbox_rl_btn_border_style; ?> #<?php echo $theme_row->lightbox_rl_btn_border_color; ?>;
        box-shadow: <?php echo $theme_row->lightbox_rl_btn_box_shadow; ?>;
        color: #<?php echo $theme_row->lightbox_rl_btn_color; ?>;
        height: <?php echo $theme_row->lightbox_rl_btn_height; ?>px;
        font-size: <?php echo $theme_row->lightbox_rl_btn_size; ?>px;
        width: <?php echo $theme_row->lightbox_rl_btn_width; ?>px;
        opacity: <?php echo number_format($theme_row->lightbox_rl_btn_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_rl_btn_transparent; ?>);
      }
      <?php
      if($option_row->autohide_lightbox_navigation){?>
      #spider_popup_left-ico{
        left: -9999px;
      }
      #spider_popup_right-ico{
        left: -9999px;
      }      
      <?php }
      else { ?>
        #spider_popup_left-ico {
        left: 20px;
        }
        #spider_popup_right-ico {
          left: auto;
          right: 20px;
        }
      <?php } ?>
      .bwg_ctrl_btn:hover,
      .bwg_toggle_btn:hover,
      .spider_popup_close:hover,
      .spider_popup_close_fullscreen:hover,
      #spider_popup_left-ico:hover,
      #spider_popup_right-ico:hover {
        color: #<?php echo $theme_row->lightbox_close_rl_btn_hover_color; ?>;
        cursor: pointer;
      }
      .bwg_image_wrap {
        height: inherit;
        display: table;
        position: absolute;
        text-align: center;
        width: inherit;
      }
      .bwg_image_wrap * {
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .bwg_comment_wrap {
        bottom: 0;
        left: 0;
        overflow: hidden;
        position: absolute;
        right: 0;
        top: 0;
        z-index: -1;
      }
      .bwg_comment_container {
        -moz-box-sizing: border-box;
        background-color: #<?php echo $theme_row->lightbox_comment_bg_color; ?>;
        color: #<?php echo $theme_row->lightbox_comment_font_color; ?>;
        font-size: <?php echo $theme_row->lightbox_comment_font_size; ?>px;
        font-family: <?php echo $theme_row->lightbox_comment_font_style; ?>;
        height: 100%;
        overflow: hidden;
        position: absolute;
        <?php echo $theme_row->lightbox_comment_pos; ?>: -<?php echo $theme_row->lightbox_comment_width; ?>px;
        top: 0;
        width: <?php echo $theme_row->lightbox_comment_width; ?>px;
        z-index: 10103;
      }
      .bwg_comments {
        bottom: 0;
        font-size: <?php echo $theme_row->lightbox_comment_font_size; ?>px;
        font-family: <?php echo $theme_row->lightbox_comment_font_style; ?>;
        height: 100%;
        left: 0;
        overflow-x: hidden;
        overflow-y: auto;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 10101;
      }
      .bwg_comments p,
      .bwg_comment_body_p {
        margin: 5px !important;
        text-align: left;
        word-wrap: break-word;
        word-break: break-word;
      }
      .bwg_comments input[type="submit"] {
        background: none repeat scroll 0 0 #<?php echo $theme_row->lightbox_comment_button_bg_color; ?>;
        border: <?php echo $theme_row->lightbox_comment_button_border_width; ?>px <?php echo $theme_row->lightbox_comment_button_border_style; ?> #<?php echo $theme_row->lightbox_comment_button_border_color; ?>;
        border-radius: <?php echo $theme_row->lightbox_comment_button_border_radius; ?>;
        color: #<?php echo $theme_row->lightbox_comment_font_color; ?>;
        cursor: pointer;
        padding: <?php echo $theme_row->lightbox_comment_button_padding; ?>;
      }
      .bwg_comments input[type="text"],
      .bwg_comments textarea {
        background: none repeat scroll 0 0 #<?php echo $theme_row->lightbox_comment_input_bg_color; ?>;
        border: <?php echo $theme_row->lightbox_comment_input_border_width; ?>px <?php echo $theme_row->lightbox_comment_input_border_style; ?> #<?php echo $theme_row->lightbox_comment_input_border_color; ?>;
        border-radius: <?php echo $theme_row->lightbox_comment_input_border_radius; ?>;
        color: #<?php echo $theme_row->lightbox_comment_font_color; ?>;
        padding: <?php echo $theme_row->lightbox_comment_input_padding; ?>;
        width: 100%;
      }
      .bwg_comments textarea {
        resize: vertical;
      }
      .bwg_comment_header_p {
        border-top: <?php echo $theme_row->lightbox_comment_separator_width; ?>px <?php echo $theme_row->lightbox_comment_separator_style; ?> #<?php echo $theme_row->lightbox_comment_separator_color; ?>;
      }
      .bwg_comment_header {
        color: #<?php echo $theme_row->lightbox_comment_font_color; ?>;
        font-size: <?php echo $theme_row->lightbox_comment_author_font_size; ?>px;
      }
      .bwg_comment_date {
        color: #<?php echo $theme_row->lightbox_comment_font_color; ?>;
        float: right;
        font-size: <?php echo $theme_row->lightbox_comment_date_font_size; ?>px;
      }
      .bwg_comment_body {
        color: #<?php echo $theme_row->lightbox_comment_font_color; ?>;
        font-size: <?php echo $theme_row->lightbox_comment_body_font_size; ?>px;
      }
      .bwg_comment_delete_btn {
        color: #FFFFFF;
        cursor: pointer;
        float: right;
        font-size: 14px;
        margin: 2px;
      }
      .bwg_comments_close {
        cursor: pointer;
        line-height: 0;
        position: relative;
        font-size: 13px;
        text-align: <?php echo (($theme_row->lightbox_comment_pos == 'left') ? 'right' : 'left'); ?>;
        margin: 5px;
        z-index: 10150;
      }
      .bwg_comment_textarea::-webkit-scrollbar {
        width: 4px;
      }
      .bwg_comment_textarea::-webkit-scrollbar-track {
      }
      .bwg_comment_textarea::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.55);
        border-radius: 2px;
      }  
      .bwg_comment_textarea::-webkit-scrollbar-thumb:hover {
        background-color: #D9D9D9;
      }
      .bwg_ctrl_btn_container a,
      .bwg_ctrl_btn_container a:hover {
        text-decoration: none;
      }
      .bwg_rate:hover {
        color: #<?php echo $theme_row->lightbox_rate_color; ?>;
      }
      .bwg_facebook:hover {
        color: #3B5998;
      }
      .bwg_twitter:hover {
        color: #4099FB;
      }
      .bwg_google:hover {
        color: #DD4B39;
      }
      .bwg_pinterest:hover {
        color: #cb2027;
      }
      .bwg_tumblr:hover {
        color: #2F5070;
      }
      .bwg_facebook,
      .bwg_twitter,
      .bwg_google,
      .bwg_pinterest,
      .bwg_tumblr {
        color: #<?php echo $theme_row->lightbox_comment_share_button_color; ?>;
      }
      .bwg_image_container {
        display: table;
        position: absolute;
        text-align: center;
        <?php echo $theme_row->lightbox_filmstrip_pos; ?>: <?php echo $image_filmstrip_height; ?>px;
        vertical-align: middle;
        width: 100%;
      }      
      .bwg_filmstrip_container {
        display: table;
        height: <?php echo $image_filmstrip_height; ?>px;
        position: absolute;
        width: <?php echo $image_width; ?>px;
        z-index: 10150;
        <?php echo $theme_row->lightbox_filmstrip_pos; ?>: 0;
      }
      .bwg_filmstrip {
        left: 20px;
        overflow: hidden;
        position: absolute;
        width: <?php echo $image_width - 40; ?>px;
        z-index: 10106;
      }
      .bwg_filmstrip_thumbnails {
        height: <?php echo $image_filmstrip_height; ?>px;
        left: 0px;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
        width: <?php echo ($image_filmstrip_width + $filmstrip_thumb_margin_hor) * count($image_rows); ?>px;
      }
      .bwg_filmstrip_thumbnail {
        position: relative;
        background: none;
        border: <?php echo $theme_row->lightbox_filmstrip_thumb_border_width; ?>px <?php echo $theme_row->lightbox_filmstrip_thumb_border_style; ?> #<?php echo $theme_row->lightbox_filmstrip_thumb_border_color; ?>;
        border-radius: <?php echo $theme_row->lightbox_filmstrip_thumb_border_radius; ?>;
        cursor: pointer;
        float: left;
        height: <?php echo $image_filmstrip_height; ?>px;
        margin: <?php echo $theme_row->lightbox_filmstrip_thumb_margin; ?>;
        width: <?php echo $image_filmstrip_width; ?>px;
        overflow: hidden;
      }
      .bwg_thumb_active {
        opacity: 1;
        filter: Alpha(opacity=100);
        border: <?php echo $theme_row->lightbox_filmstrip_thumb_active_border_width; ?>px solid #<?php echo $theme_row->lightbox_filmstrip_thumb_active_border_color; ?>;
      }
      .bwg_thumb_deactive {
        opacity: <?php echo number_format($theme_row->lightbox_filmstrip_thumb_deactive_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_filmstrip_thumb_deactive_transparent; ?>);
      }
      .bwg_filmstrip_thumbnail_img {
        display: block;
        opacity: 1;
        filter: Alpha(opacity=100);
      }
      .bwg_filmstrip_left {
        background-color: #<?php echo $theme_row->lightbox_filmstrip_rl_bg_color; ?>;
        cursor: pointer;
        display: table-cell;
        vertical-align: middle;
        width: 20px;
        z-index: 10106;
        left: 0;
      }
      .bwg_filmstrip_right {
        background-color: #<?php echo $theme_row->lightbox_filmstrip_rl_bg_color; ?>;
        cursor: pointer;
        right: 0;
        width: 20px;
        display: table-cell;
        vertical-align: middle;
        z-index: 10106;
      }
      .bwg_filmstrip_left i,
      .bwg_filmstrip_right i {
        color: #<?php echo $theme_row->lightbox_filmstrip_rl_btn_color; ?>;
        font-size: <?php echo $theme_row->lightbox_filmstrip_rl_btn_size; ?>px;
      }
      .bwg_none_selectable {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .bwg_watermark_container {
        display: table-cell;
        margin: 0 auto;
        position: relative;
        vertical-align: middle;
      }
      .bwg_watermark_spun {
        display: table-cell;
        overflow: hidden;
        position: relative;
        text-align: <?php echo $watermark_position[1]; ?>;
        vertical-align: <?php echo $watermark_position[0]; ?>;
        /*z-index: 10140;*/
      }
      .bwg_watermark_image {
        margin: 4px;
        max-height: <?php echo $watermark_height; ?>px;
        max-width: <?php echo $watermark_width; ?>px;
        opacity: <?php echo number_format($watermark_opacity / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $watermark_opacity; ?>);
        position: relative;
        z-index: 10141;
      }
      .bwg_watermark_text,
      .bwg_watermark_text:hover {
        text-decoration: none;
        margin: 4px;
        font-size: <?php echo $watermark_font_size; ?>px;
        font-family: <?php echo $watermark_font; ?>;
        color: #<?php echo $watermark_color; ?> !important;
        opacity: <?php echo number_format($watermark_opacity / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $watermark_opacity; ?>);
        position: relative;
        z-index: 10141;
      }
      .bwg_slide_container {
        display: table-cell;
        position: absolute;
        vertical-align: middle;
        width: 100%;
        height: 100%;
      }
      .bwg_slide_bg {
        margin: 0 auto;
        width: inherit;
        height: inherit;
      }
      .bwg_slider {
        height: inherit;
        width: inherit;
      }
      .bwg_popup_image_spun {
        height: inherit;
        display: table-cell;
        filter: Alpha(opacity=100);
        opacity: 1;
        position: absolute;
        vertical-align: middle;
        width: inherit;
        z-index: 2;
      }
      .bwg_popup_image_second_spun {
        width: inherit;
        height: inherit;
        display: table-cell;
        filter: Alpha(opacity=0);
        opacity: 0;
        position: absolute;
        vertical-align: middle;
        z-index: 1;
      }
      .bwg_grid {
        display: none;
        height: 100%;
        overflow: hidden;
        position: absolute;
        width: 100%;
      }
      .bwg_gridlet {
        opacity: 1;
        filter: Alpha(opacity=100);
        position: absolute;
      }
      .bwg_image_info_container1 {
        display: <?php echo $popup_info_always_show ? 'table-cell' : 'none'; ?>;
      }
      .bwg_image_hit_container1 {
        display: <?php echo $popup_hit_counter ? 'table-cell' : 'none'; ?>;;
      }
      .bwg_image_info_spun {
        text-align: <?php echo $theme_row->lightbox_info_align; ?>;
        vertical-align: <?php echo $theme_row->lightbox_info_pos; ?>;
      }
      .bwg_image_hit_spun {
        text-align: <?php echo $theme_row->lightbox_hit_align; ?>;
        vertical-align: <?php echo $theme_row->lightbox_hit_pos; ?>;
      }
      .bwg_image_hit {
        background: rgba(<?php echo $rgb_bwg_image_hit_bg_color['red']; ?>, <?php echo $rgb_bwg_image_hit_bg_color['green']; ?>, <?php echo $rgb_bwg_image_hit_bg_color['blue']; ?>, <?php echo number_format($theme_row->lightbox_hit_bg_transparent / 100, 2, ".", ""); ?>);
        border: <?php echo $theme_row->lightbox_hit_border_width; ?>px <?php echo $theme_row->lightbox_hit_border_style; ?> #<?php echo $theme_row->lightbox_hit_border_color; ?>;
        border-radius: <?php echo $theme_row->lightbox_info_border_radius; ?>;
        <?php echo ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'bottom') && $theme_row->lightbox_ctrl_btn_pos == 'bottom' && $theme_row->lightbox_hit_pos == 'bottom') ? 'bottom: ' . ($theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top) . 'px;' : '' ?>
        margin: <?php echo $theme_row->lightbox_hit_margin; ?>;
        padding: <?php echo $theme_row->lightbox_hit_padding; ?>;
        <?php echo ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'top') && $theme_row->lightbox_ctrl_btn_pos == 'top' && $theme_row->lightbox_hit_pos == 'top') ? 'top: ' . ($theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top) . 'px;' : '' ?>
      }
      .bwg_image_hits,
      .bwg_image_hits * {
        color: #<?php echo $theme_row->lightbox_hit_color; ?> !important;
        font-family: <?php echo $theme_row->lightbox_hit_font_style; ?>;
        font-size: <?php echo $theme_row->lightbox_hit_font_size; ?>px;
        font-weight: <?php echo $theme_row->lightbox_hit_font_weight; ?>;
      }
      .bwg_image_info {
        background: rgba(<?php echo $rgb_bwg_image_info_bg_color['red']; ?>, <?php echo $rgb_bwg_image_info_bg_color['green']; ?>, <?php echo $rgb_bwg_image_info_bg_color['blue']; ?>, <?php echo number_format($theme_row->lightbox_info_bg_transparent / 100, 2, ".", ""); ?>);
        border: <?php echo $theme_row->lightbox_info_border_width; ?>px <?php echo $theme_row->lightbox_info_border_style; ?> #<?php echo $theme_row->lightbox_info_border_color; ?>;
        border-radius: <?php echo $theme_row->lightbox_info_border_radius; ?>;
        <?php echo ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'bottom') && $theme_row->lightbox_ctrl_btn_pos == 'bottom' && $theme_row->lightbox_info_pos == 'bottom') ? 'bottom: ' . ($theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top) . 'px;' : '' ?>
        <?php if ($popup_info_full_width) { ?>
        width: 100%;
        <?php } else { ?>
        width: 33%;
        margin: <?php echo $theme_row->lightbox_info_margin; ?>;
        <?php } ?>
        padding: <?php echo $theme_row->lightbox_info_padding; ?>;
        <?php echo ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'top') && $theme_row->lightbox_ctrl_btn_pos == 'top' && $theme_row->lightbox_info_pos == 'top') ? 'top: ' . ($theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top) . 'px;' : '' ?>
      }
      .bwg_image_title,
      .bwg_image_title * {
        color: #<?php echo $theme_row->lightbox_title_color; ?> !important;
        font-family: <?php echo $theme_row->lightbox_title_font_style; ?>;
        font-size: <?php echo $theme_row->lightbox_title_font_size; ?>px;
        font-weight: <?php echo $theme_row->lightbox_title_font_weight; ?>;
      }
      .bwg_image_description,
      .bwg_image_description * {
        color: #<?php echo $theme_row->lightbox_description_color; ?> !important;
        font-family: <?php echo $theme_row->lightbox_description_font_style; ?>;
        font-size: <?php echo $theme_row->lightbox_description_font_size; ?>px;
        font-weight: <?php echo $theme_row->lightbox_description_font_weight; ?>;
      }
      .bwg_image_rate_spun {
        text-align: <?php echo $theme_row->lightbox_rate_align; ?>;
        vertical-align: <?php echo $theme_row->lightbox_rate_pos; ?>;
      }
      .bwg_image_rate {
        <?php echo ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'bottom') && $theme_row->lightbox_ctrl_btn_pos == 'bottom' && $theme_row->lightbox_rate_pos == 'bottom') ? 'bottom: ' . ($theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top) . 'px;' : '' ?>
        padding: <?php echo $theme_row->lightbox_rate_padding; ?>;
        <?php echo ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'top') && $theme_row->lightbox_ctrl_btn_pos == 'top' && $theme_row->lightbox_rate_pos == 'top') ? 'top: ' . ($theme_row->lightbox_ctrl_btn_height + 2 * $theme_row->lightbox_ctrl_btn_margin_top) . 'px;' : '' ?>
      }
      #bwg_rate_form .bwg_hint,
      #bwg_rate_form .fa-<?php echo $theme_row->lightbox_rate_icon; ?>,
      #bwg_rate_form .fa-<?php echo $theme_row->lightbox_rate_icon; ?>-half-o,
      #bwg_rate_form .fa-<?php echo $theme_row->lightbox_rate_icon; ?>-o,
      #bwg_rate_form .fa-minus-square-o {
        color: #<?php echo $theme_row->lightbox_rate_color; ?>;
        font-size: <?php echo $theme_row->lightbox_rate_size; ?>px;
      }
      #bwg_rate_form .bwg_hint {
        margin: 0 5px;
        display: none;
      }
      .bwg_rate_hover {
        color: #<?php echo $theme_row->lightbox_rate_hover_color; ?> !important;
      }
      .bwg_star {
        display: inline-block;
      }
      .bwg_rated {
        color: #<?php echo $theme_row->lightbox_rate_color; ?>;
        display: none;
        font-size: <?php echo $theme_row->lightbox_rate_size - 2; ?>px;
      }
			@media (max-width: 480px) {
				.bwg_image_count_container {
					display: none;
				}
        .bwg_image_title,
        .bwg_image_title * {
					font-size: 12px;
				}
        .bwg_image_description,
        .bwg_image_description * {
					font-size: 10px;
				}
			}
      .bwg_image_count_container {
        left: 0;
        line-height: 1;
        position: absolute;
        vertical-align: middle;
      }
    </style>
    <script>
      var data = [];
      var event_stack = [];
      <?php
      $image_id_exist = FALSE;
      foreach ($image_rows as $key => $image_row) {
        if ($image_row->id == $image_id) {
          $current_avg_rating = $image_row->avg_rating;
          $current_rate = $image_row->rate;
          $current_rate_count = $image_row->rate_count;
          $current_image_key = $key;
        }
        if ($image_row->id == $current_image_id) {
          $current_image_alt = $image_row->alt;
          $current_image_hit_count = $image_row->hit_count;
          $current_image_description = str_replace(array("\r\n", "\n", "\r"), esc_html('<br />'), $image_row->description);
          $current_image_url = $image_row->image_url;
          $current_thumb_url = $image_row->thumb_url;
          $current_filetype = $image_row->filetype;
          $current_filename = $image_row->filename;
          $image_id_exist = TRUE;
        }
        ?>
        data["<?php echo $key; ?>"] = [];
        data["<?php echo $key; ?>"]["number"] = <?php echo $key + 1; ?>;
        data["<?php echo $key; ?>"]["id"] = "<?php echo $image_row->id; ?>";
        data["<?php echo $key; ?>"]["alt"] = "<?php echo str_replace(array("\r\n", "\n", "\r"), esc_html('<br />'), $image_row->alt); ?>";
        data["<?php echo $key; ?>"]["description"] = "<?php echo str_replace(array("\r\n", "\n", "\r"), esc_html('<br />'), $image_row->description); ?>";
        <?php
        $image_resolution = explode(' x ', $image_row->resolution);
        if (is_array($image_resolution)) {
          $instagram_post_width = $image_resolution[0];
          $instagram_post_height = explode(' ', $image_resolution[1]);
          $instagram_post_height = $instagram_post_height[0];
        }
        ?>
        data["<?php echo $key; ?>"]["image_width"] = "<?php echo $instagram_post_width; ?>";
        data["<?php echo $key; ?>"]["image_height"] = "<?php echo $instagram_post_height; ?>";
        data["<?php echo $key; ?>"]["image_url"] = "<?php echo $image_row->image_url; ?>";
        data["<?php echo $key; ?>"]["thumb_url"] = "<?php echo $image_row->thumb_url; ?>";
        data["<?php echo $key; ?>"]["date"] = "<?php echo $image_row->date; ?>";
        data["<?php echo $key; ?>"]["comment_count"] = "<?php echo $image_row->comment_count; ?>";
        data["<?php echo $key; ?>"]["filetype"] = "<?php echo $image_row->filetype; ?>";
        data["<?php echo $key; ?>"]["filename"] = "<?php echo $image_row->filename; ?>";
        data["<?php echo $key; ?>"]["avg_rating"] = "<?php echo $image_row->avg_rating; ?>";
        data["<?php echo $key; ?>"]["rate"] = "<?php echo $image_row->rate; ?>";
        data["<?php echo $key; ?>"]["rate_count"] = "<?php echo $image_row->rate_count; ?>";
        data["<?php echo $key; ?>"]["hit_count"] = "<?php echo $image_row->hit_count; ?>";
        <?php
      }
      ?>
    </script>
    <?php
    if (!$image_id_exist) {
      echo WDWLibrary::message(__('The image has been deleted.', 'bwg'), 'error');
      die();
    }
    ?>
    <div class="bwg_image_wrap">
      <?php
      if ($enable_image_ctrl_btn) {
      ?>
      <div class="bwg_btn_container">
        <div class="bwg_ctrl_btn_container">
					<?php
          if ($option_row->show_image_counts) {
            ?>
            <span class="bwg_image_count_container bwg_ctrl_btn">
              <span class="bwg_image_count"><?php echo $current_image_key + 1; ?></span> / 
              <span><?php echo count($image_rows); ?></span>
            </span>
            <?php
          }
					?>
          <i title="<?php echo __('Play', 'bwg'); ?>" class="bwg_ctrl_btn bwg_play_pause fa fa-play"></i>
          <?php if ($enable_image_fullscreen) {
                  if (!$open_with_fullscreen) {
          ?>
          <i title="<?php echo __('Maximize', 'bwg'); ?>" class="bwg_ctrl_btn bwg_resize-full fa fa-resize-full "></i>
          <?php
          }
          ?>
          <i title="<?php echo __('Fullscreen', 'bwg'); ?>" class="bwg_ctrl_btn bwg_fullscreen fa fa-fullscreen"></i>
          <?php } if ($popup_enable_info) { ?>
          <i title="<?php echo __('Show info', 'bwg'); ?>" class="bwg_ctrl_btn bwg_info fa fa-info"></i>
          <?php }
          $is_embed = preg_match('/EMBED/', $current_filetype) == 1 ? TRUE : FALSE;
          if ($option_row->popup_enable_fullsize_image) {
            ?>
            <a id="bwg_fullsize_image" href="<?php echo !$is_embed ? site_url() . '/' . $WD_BWG_UPLOAD_DIR . $current_image_url : $current_image_url; ?>" target="_blank">
              <i title="<?php echo __('Open image in original size.', 'bwg'); ?>" class="bwg_ctrl_btn fa fa-external-link"></i>
            </a>
            <?php
          }
          if ($option_row->popup_enable_download) {
            $style = 'none';
            $current_image_arr = explode('/', $current_image_url);
            if (!$is_embed) {
              $download_href = site_url() . '/' . $WD_BWG_UPLOAD_DIR . $current_image_url;
              $style = 'inline-block';
            }
            elseif (preg_match('/FLICKR/', $current_filetype) == 1) {
              $download_href = $current_filename;
              $style = 'inline-block';
            }
            elseif (preg_match('/INSTAGRAM/', $current_filetype) == 1) {
              $download_href = substr_replace($current_thumb_url, 'l', -1);
              $style = 'inline-block';
            }
            ?>
            <a id="bwg_download" href="<?php echo $download_href; ?>" target="_blank" download="<?php echo end($current_image_arr); ?>" style="display: <?php echo $style; ?>;">
              <i title="<?php echo __('Download original image', 'bwg'); ?>" class="bwg_ctrl_btn fa fa-download"></i>
            </a>
            <?php
          }
          ?>
        </div>
        <div class="bwg_toggle_container">
          <i class="bwg_toggle_btn fa <?php echo (($theme_row->lightbox_ctrl_btn_pos == 'top') ? 'fa-angle-up' : 'fa-angle-down'); ?>"></i>
        </div>
      </div>
      <?php
      }
      $current_pos = 0;
      ?>
      <?php
      if ($watermark_type != 'none') {
      ?>
      <div class="bwg_image_container">
        <div class="bwg_watermark_container">
          <div style="display:table; margin:0 auto;">
            <span class="bwg_watermark_spun" id="bwg_watermark_container">
              <?php
              if ($watermark_type == 'image') {
              ?>
              <a href="<?php echo urldecode($watermark_link); ?>" target="_blank">
                <img class="bwg_watermark_image bwg_watermark" src="<?php echo $watermark_url; ?>" />
              </a>
              <?php
              }
              elseif ($watermark_type == 'text') {
              ?>
              <a class="bwg_none_selectable bwg_watermark_text bwg_watermark" target="_blank" href="<?php echo $watermark_link; ?>"><?php echo stripslashes($watermark_text); ?></a>
              <?php
              }
              ?>
            </span>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
      <div id="bwg_image_container" class="bwg_image_container">
        <div class="bwg_image_info_container1">
          <div class="bwg_image_info_container2">
            <span class="bwg_image_info_spun">
              <div class="bwg_image_info" <?php if(trim($current_image_alt) == '' && trim($current_image_description) == '') { echo 'style="background:none;"'; } ?>>
                <div class="bwg_image_title"><?php echo html_entity_decode($current_image_alt); ?></div>
                <div class="bwg_image_description"><?php echo html_entity_decode($current_image_description); ?></div>
              </div>
            </span>
          </div>
        </div>
        <div class="bwg_slide_container">
          <div class="bwg_slide_bg">
            <div class="bwg_slider">
          <?php
          $current_key = -6;
          foreach ($image_rows as $key => $image_row) {
            $is_embed = preg_match('/EMBED/',$image_row->filetype)==1 ? true :false;
            $is_embed_instagram_post = preg_match('/INSTAGRAM_POST/',$image_row->filetype)==1 ? true :false;
            if ($image_row->id == $current_image_id) {
              $current_key = $key;
              ?>
              <span class="bwg_popup_image_spun" id="bwg_popup_image" image_id="<?php echo $image_row->id; ?>">
                <span class="bwg_popup_image_spun1" style="display: table; width: inherit; height: inherit;">
                  <span class="bwg_popup_image_spun2" style="display: table-cell; vertical-align: middle; text-align: center;">
                    <?php 
                      if (!$is_embed) {
                      ?>
                      <img class="bwg_popup_image bwg_popup_watermark" src="<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR . $image_row->image_url; ?>" alt="<?php echo $image_row->alt; ?>" />
                      <?php 
                      }
                      else {  /*$is_embed*/ ?>
                        <span class="bwg_popup_embed bwg_popup_watermark" style="diplay: table; table-layout: fixed;">
                        <?php
                        if ($is_embed_instagram_post) {
                          $post_width = $image_width;
                          $post_height = $image_height;
                          if ($post_height < $post_width + 88) {
                            $post_width = $post_height - 88;
                          }
                          else {
                           $post_height = $post_width + 88;
                          }

                          $instagram_post_width = $post_width;
                          $instagram_post_height = $post_height;
                          $image_resolution = explode(' x ', $image_row->resolution);
                          if (is_array($image_resolution)) {
                            $instagram_post_width = $image_resolution[0];
                            $instagram_post_height = explode(' ', $image_resolution[1]);
                            $instagram_post_height = $instagram_post_height[0];
                          }
                          
                          WDWLibraryEmbed::display_embed($image_row->filetype, $image_row->filename, array('class' => "bwg_embed_frame", 'data-width' => $instagram_post_width, 'data-height' => $instagram_post_height, 'frameborder' => "0", 'style' => "width:" . $post_width . "px; height:" . $post_height . "px; vertical-align:middle; display:inline-block; position:relative;"));
                        }
                        else{
                        WDWLibraryEmbed::display_embed($image_row->filetype, $image_row->filename, array('class'=>"bwg_embed_frame", 'frameborder'=>"0", 'allowfullscreen'=>"allowfullscreen", 'style'=>"width:inherit; height:inherit; vertical-align:middle; display:table-cell;"));
                        }
                        ?>
                      </span>
                      <?php
                      }
                    ?>                    
                  </span>
                </span>
              </span>
              <span class="bwg_popup_image_second_spun">                
              </span>
              <input type="hidden" id="bwg_current_image_key" value="<?php echo $key; ?>" />
              <?php
              break;
            }
	  }
          ?>
            </div>
          </div>
        </div>
        <a id="spider_popup_left" <?php echo ($option_row->enable_loop == 0 && $current_key == 0) ? 'style="display: none;"' : ''; ?>><span id="spider_popup_left-ico"><span><i class="bwg_prev_btn fa <?php echo $theme_row->lightbox_rl_btn_style; ?>-left"></i></span></span></a>
        <a id="spider_popup_right" <?php echo ($option_row->enable_loop == 0 && $current_key == count($image_rows) - 1) ? 'style="display: none;"' : ''; ?>><span id="spider_popup_right-ico"><span><i class="bwg_next_btn fa <?php echo $theme_row->lightbox_rl_btn_style; ?>-right"></i></span></span></a>
      </div>
    </div>
    <a class="spider_popup_close" onclick="spider_destroypopup(1000); return false;" ontouchend="spider_destroypopup(1000); return false;"><span><i class="bwg_close_btn fa fa-times"></i></span></a>
    <script language="javascript" type="text/javascript" src="<?php echo WD_BWG_URL . '/js/bwg_embed.js?ver='.wd_bwg_version(); ?>"></script>
    <script>
      var bwg_trans_in_progress = false;
      var bwg_transition_duration = <?php echo (($slideshow_interval < 4) && ($slideshow_interval != 0)) ? ($slideshow_interval * 1000) / 4 : ($slideshow_effect_duration * 1000); ?>;
      var bwg_playInterval;
      if ((jQuery("#spider_popup_wrap").width() >= jQuery(window).width()) || (jQuery("#spider_popup_wrap").height() >= jQuery(window).height())) {
        jQuery(".spider_popup_close").attr("class", "bwg_ctrl_btn spider_popup_close_fullscreen");
      }
      /* Stop autoplay.*/
      window.clearInterval(bwg_playInterval);
      /* Set watermark container size.*/
      function bwg_change_watermark_container() {
        jQuery(".bwg_slider").children().each(function() {
          if (jQuery(this).css("zIndex") == 2) {
            /* This may be neither img nor iframe.*/
            var bwg_current_image_span = jQuery(this).find("img");
            if (!bwg_current_image_span.length) {
              bwg_current_image_span = jQuery(this).find("iframe");
            }
            if (!bwg_current_image_span.length) {
              bwg_current_image_span = jQuery(this).find("video");
            }
            /*set timeout for video to get size according to style, and then put watermark*/
            setTimeout(function () {
              var width = bwg_current_image_span.width();
              var height = bwg_current_image_span.height();
          

              jQuery(".bwg_watermark_spun").width(width);
              jQuery(".bwg_watermark_spun").height(height);
              jQuery(".bwg_watermark").css({display: ''});
              /* Set watermark image size.*/
              var comment_container_width = 0;
              if (jQuery(".bwg_comment_container").hasClass("bwg_open")) {
                comment_container_width = <?php echo $theme_row->lightbox_comment_width; ?>;
               }
              if (width <= (jQuery(window).width() - comment_container_width)) {
                jQuery(".bwg_watermark_image").css({
                  width: ((jQuery(".spider_popup_wrap").width() - comment_container_width) * <?php echo $watermark_width / $image_width; ?>)
                });
                jQuery(".bwg_watermark_text, .bwg_watermark_text:hover").css({
                  fontSize: ((jQuery(".spider_popup_wrap").width() - comment_container_width) * <?php echo $watermark_font_size / $image_width; ?>)
                });
              }
            }, 800);
          }
        });
      }
      var bwg_current_key = '<?php echo $current_key; ?>';
      var bwg_current_filmstrip_pos = <?php echo $current_pos; ?>;
      /* Set filmstrip initial position.*/
      function bwg_set_filmstrip_pos(filmStripWidth) {
        var selectedImagePos = -bwg_current_filmstrip_pos - (jQuery(".bwg_filmstrip_thumbnail").outerWidth(true)) / 2;
        var imagesContainerLeft = Math.min(0, Math.max(filmStripWidth - jQuery(".bwg_filmstrip_thumbnails").width(), selectedImagePos + filmStripWidth / 2));
        jQuery(".bwg_filmstrip_thumbnails").animate({
            left: imagesContainerLeft
          }, {
            duration: 500,
            complete: function () { bwg_filmstrip_arrows(); }
          });
      }
      function bwg_move_filmstrip() {
        var image_left = jQuery(".bwg_thumb_active").position().left;
        var image_right = jQuery(".bwg_thumb_active").position().left + jQuery(".bwg_thumb_active").outerWidth(true);
        var bwg_filmstrip_width = jQuery(".bwg_filmstrip").outerWidth(true);
        var bwg_filmstrip_thumbnails_width = jQuery(".bwg_filmstrip_thumbnails").outerWidth(true);
        var long_filmstrip_cont_left = jQuery(".bwg_filmstrip_thumbnails").position().left;
        var long_filmstrip_cont_right = Math.abs(jQuery(".bwg_filmstrip_thumbnails").position().left) + bwg_filmstrip_width;
        if (bwg_filmstrip_width > bwg_filmstrip_thumbnails_width) {
          return;
        }
        if (image_left < Math.abs(long_filmstrip_cont_left)) {
          jQuery(".bwg_filmstrip_thumbnails").animate({
            left: -image_left
          }, {
            duration: 500,
            complete: function () { bwg_filmstrip_arrows(); }
          });
        }
        else if (image_right > long_filmstrip_cont_right) {
          jQuery(".bwg_filmstrip_thumbnails").animate({
            left: -(image_right - bwg_filmstrip_width)
          }, {
            duration: 500,
            complete: function () { bwg_filmstrip_arrows(); }
          });
        }
      }
      /* Show/hide filmstrip arrows.*/
      function bwg_filmstrip_arrows() {
        if (jQuery(".bwg_filmstrip_thumbnails").width() < jQuery(".bwg_filmstrip").width()) {
          jQuery(".bwg_filmstrip_left").hide();
          jQuery(".bwg_filmstrip_right").hide();
        }
        else {
          jQuery(".bwg_filmstrip_left").show();
          jQuery(".bwg_filmstrip_right").show();
        }
      }
      function bwg_testBrowser_cssTransitions() {
        return bwg_testDom('Transition');
      }
      function bwg_testBrowser_cssTransforms3d() {
        return bwg_testDom('Perspective');
      }
      function bwg_testDom(prop) {
        /* Browser vendor CSS prefixes.*/
        var browserVendors = ['', '-webkit-', '-moz-', '-ms-', '-o-', '-khtml-'];
        /* Browser vendor DOM prefixes.*/
        var domPrefixes = ['', 'Webkit', 'Moz', 'ms', 'O', 'Khtml'];
        var i = domPrefixes.length;
        while (i--) {
          if (typeof document.body.style[domPrefixes[i] + prop] !== 'undefined') {
            return true;
          }
        }
        return false;
      }
      function bwg_cube(tz, ntx, nty, nrx, nry, wrx, wry, current_image_class, next_image_class, direction) {
        /* If browser does not support 3d transforms/CSS transitions.*/
        if (!bwg_testBrowser_cssTransitions()) {
          return bwg_fallback(current_image_class, next_image_class, direction);
        }
        if (!bwg_testBrowser_cssTransforms3d()) {
          return bwg_fallback3d(current_image_class, next_image_class, direction);
        }
        bwg_trans_in_progress = true;
        /* Set active thumbnail.*/
        jQuery(".bwg_filmstrip_thumbnail").removeClass("bwg_thumb_active").addClass("bwg_thumb_deactive");
        jQuery("#bwg_filmstrip_thumbnail_" + bwg_current_key).removeClass("bwg_thumb_deactive").addClass("bwg_thumb_active");
        jQuery(".bwg_slide_bg").css('perspective', 1000);
        jQuery(current_image_class).css({
          transform : 'translateZ(' + tz + 'px)',
          backfaceVisibility : 'hidden'
        });
        jQuery(next_image_class).css({
          opacity : 1,
          filter: 'Alpha(opacity=100)',
          backfaceVisibility : 'hidden',
          transform : 'translateY(' + nty + 'px) translateX(' + ntx + 'px) rotateY('+ nry +'deg) rotateX('+ nrx +'deg)'
        });
        jQuery(".bwg_slider").css({
          transform: 'translateZ(-' + tz + 'px)',
          transformStyle: 'preserve-3d'
        });
        /* Execution steps.*/
        setTimeout(function () {
          jQuery(".bwg_slider").css({
            transition: 'all ' + bwg_transition_duration + 'ms ease-in-out',
            transform: 'translateZ(-' + tz + 'px) rotateX('+ wrx +'deg) rotateY('+ wry +'deg)'
          });
        }, 20);
        /* After transition.*/
        jQuery(".bwg_slider").one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(bwg_after_trans));
        function bwg_after_trans() {
          jQuery(current_image_class).removeAttr('style');
          jQuery(next_image_class).removeAttr('style');
          jQuery(".bwg_slider").removeAttr('style');
          jQuery(current_image_class).css({'opacity' : 0, filter: 'Alpha(opacity=0)', 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, filter: 'Alpha(opacity=100)', 'z-index' : 2});
          
          bwg_trans_in_progress = false;
          jQuery(current_image_class).html('');
          if (typeof event_stack !== 'undefined') {
            if (event_stack.length > 0) {
              key = event_stack[0].split("-");
              event_stack.shift();
              bwg_change_image(key[0], key[1], data, true);
            }
          }
          bwg_change_watermark_container();
        }
      }
      function bwg_cubeH(current_image_class, next_image_class, direction) {
        /* Set to half of image width.*/
        var dimension = jQuery(current_image_class).width() / 2;
        if (direction == 'right') {
          bwg_cube(dimension, dimension, 0, 0, 90, 0, -90, current_image_class, next_image_class, direction);
        }
        else if (direction == 'left') {
          bwg_cube(dimension, -dimension, 0, 0, -90, 0, 90, current_image_class, next_image_class, direction);
        }
      }
      /* For browsers that does not support transitions.*/
      function bwg_fallback(current_image_class, next_image_class, direction) {
        bwg_fade(current_image_class, next_image_class, direction);
      }
      /* For browsers that support transitions, but not 3d transforms (only used if primary transition makes use of 3d-transforms).*/
      function bwg_fallback3d(current_image_class, next_image_class, direction) {
        bwg_sliceV(current_image_class, next_image_class, direction);
      }
      function bwg_none(current_image_class, next_image_class, direction) {
        jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
        jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
        /* Set active thumbnail.*/
        jQuery(".bwg_filmstrip_thumbnail").removeClass("bwg_thumb_active").addClass("bwg_thumb_deactive");
        jQuery("#bwg_filmstrip_thumbnail_" + bwg_current_key).removeClass("bwg_thumb_deactive").addClass("bwg_thumb_active");
        bwg_trans_in_progress = false; 
        jQuery(current_image_class).html('');
        bwg_change_watermark_container();
      }
      function bwg_fade(current_image_class, next_image_class, direction) {
        /* Set active thumbnail.*/
        jQuery(".bwg_filmstrip_thumbnail").removeClass("bwg_thumb_active").addClass("bwg_thumb_deactive");
        jQuery("#bwg_filmstrip_thumbnail_" + bwg_current_key).removeClass("bwg_thumb_deactive").addClass("bwg_thumb_active");
        if (bwg_testBrowser_cssTransitions()) {
          jQuery(next_image_class).css('transition', 'opacity ' + bwg_transition_duration + 'ms linear');
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
          bwg_change_watermark_container();
        }
        else {
          jQuery(current_image_class).animate({'opacity' : 0, 'z-index' : 1}, bwg_transition_duration);
          jQuery(next_image_class).animate({
              'opacity' : 1,
              'z-index': 2
            }, {
              duration: bwg_transition_duration,
              complete: function () { 

                bwg_trans_in_progress = false;  
                jQuery(current_image_class).html('');
                bwg_change_watermark_container(); }
            });
          /* For IE.*/
          jQuery(current_image_class).fadeTo(bwg_transition_duration, 0);
          jQuery(next_image_class).fadeTo(bwg_transition_duration, 1);
        }
      }
      function bwg_grid(cols, rows, ro, tx, ty, sc, op, current_image_class, next_image_class, direction) {
        /* If browser does not support CSS transitions.*/
        if (!bwg_testBrowser_cssTransitions()) {
          return bwg_fallback(current_image_class, next_image_class, direction);
        }
        bwg_trans_in_progress = true;
        /* Set active thumbnail.*/
        jQuery(".bwg_filmstrip_thumbnail").removeClass("bwg_thumb_active").addClass("bwg_thumb_deactive");
        jQuery("#bwg_filmstrip_thumbnail_" + bwg_current_key).removeClass("bwg_thumb_deactive").addClass("bwg_thumb_active");
        /* The time (in ms) added to/subtracted from the delay total for each new gridlet.*/
        var count = (bwg_transition_duration) / (cols + rows);
        /* Gridlet creator (divisions of the image grid, positioned with background-images to replicate the look of an entire slide image when assembled)*/
        function bwg_gridlet(width, height, top, img_top, left, img_left, src, imgWidth, imgHeight, c, r) {
          var delay = (c + r) * count;
          /* Return a gridlet elem with styles for specific transition.*/
          return jQuery('<span class="bwg_gridlet" />').css({
            display : "block",
            width : width,
            height : height,
            top : top,
            left : left,
            backgroundImage : 'url("' + src + '")',
            backgroundColor: jQuery(".spider_popup_wrap").css("background-color"),
            /*backgroundColor: 'rgba(0, 0, 0, 0)',*/
            backgroundRepeat: 'no-repeat',
            backgroundPosition : img_left + 'px ' + img_top + 'px',
            backgroundSize : imgWidth + 'px ' + imgHeight + 'px',
            transition : 'all ' + bwg_transition_duration + 'ms ease-in-out ' + delay + 'ms',
            transform : 'none'
          });
        }
        /* Get the current slide's image.*/
        var cur_img = jQuery(current_image_class).find('img');
        /* Create a grid to hold the gridlets.*/
        var grid = jQuery('<span style="display: block;" />').addClass('bwg_grid');
        /* Prepend the grid to the next slide (i.e. so it's above the slide image).*/
        jQuery(current_image_class).prepend(grid);
        /* Vars to calculate positioning/size of gridlets.*/
        var cont = jQuery(".bwg_slide_bg");
        var imgWidth = cur_img.width();
        var imgHeight = cur_img.height();
        var contWidth = cont.width(),
            contHeight = cont.height(),
            colWidth = Math.floor(contWidth / cols),
            rowHeight = Math.floor(contHeight / rows),
            colRemainder = contWidth - (cols * colWidth),
            colAdd = Math.ceil(colRemainder / cols),
            rowRemainder = contHeight - (rows * rowHeight),
            rowAdd = Math.ceil(rowRemainder / rows),
            leftDist = 0,
            img_leftDist = Math.ceil((jQuery(".bwg_slide_bg").width() - cur_img.width()) / 2);
	var imgSrc = typeof cur_img.attr('src')=='undefined' ? '' :cur_img.attr('src');
        /* tx/ty args can be passed as 'auto'/'min-auto' (meaning use slide width/height or negative slide width/height).*/
        tx = tx === 'auto' ? contWidth : tx;
        tx = tx === 'min-auto' ? - contWidth : tx;
        ty = ty === 'auto' ? contHeight : ty;
        ty = ty === 'min-auto' ? - contHeight : ty;
        /* Loop through cols.*/
        for (var i = 0; i < cols; i++) {
          var topDist = 0,
              img_topDst = Math.floor((jQuery(".bwg_slide_bg").height() - cur_img.height()) / 2),
              newColWidth = colWidth;
          /* If imgWidth (px) does not divide cleanly into the specified number of cols, adjust individual col widths to create correct total.*/
          if (colRemainder > 0) {
            var add = colRemainder >= colAdd ? colAdd : colRemainder;
            newColWidth += add;
            colRemainder -= add;
          }
          /* Nested loop to create row gridlets for each col.*/
          for (var j = 0; j < rows; j++)  {
            var newRowHeight = rowHeight,
                newRowRemainder = rowRemainder;
            /* If contHeight (px) does not divide cleanly into the specified number of rows, adjust individual row heights to create correct total.*/
            if (newRowRemainder > 0) {
              add = newRowRemainder >= rowAdd ? rowAdd : rowRemainder;
              newRowHeight += add;
              newRowRemainder -= add;
            }
            /* Create & append gridlet to grid.*/
            grid.append(bwg_gridlet(newColWidth, newRowHeight, topDist, img_topDst, leftDist, img_leftDist, imgSrc, imgWidth, imgHeight, i, j));
            topDist += newRowHeight;
            img_topDst -= newRowHeight;
          }
          img_leftDist -= newColWidth;
          leftDist += newColWidth;
        }
        /* Set event listener on last gridlet to finish transitioning.*/
        var last_gridlet = grid.children().last();
        /* Show grid & hide the image it replaces.*/
        grid.show();
        cur_img.css('opacity', 0);
        /* Add identifying classes to corner gridlets (useful if applying border radius).*/
        grid.children().first().addClass('rs-top-left');
        grid.children().last().addClass('rs-bottom-right');
        grid.children().eq(rows - 1).addClass('rs-bottom-left');
        grid.children().eq(- rows).addClass('rs-top-right');
        /* Execution steps.*/
        setTimeout(function () {
          grid.children().css({
            opacity: op,
            transform: 'rotate('+ ro +'deg) translateX('+ tx +'px) translateY('+ ty +'px) scale('+ sc +')'
          });
        }, 1);
        jQuery(next_image_class).css('opacity', 1);
        /* After transition.*/
        jQuery(last_gridlet).one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(bwg_after_trans));
        function bwg_after_trans() {
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
          cur_img.css('opacity', 1);
          grid.remove();
          bwg_trans_in_progress = false;
          jQuery(current_image_class).html('');
          if (typeof event_stack !== 'undefined') {
            if (event_stack.length > 0) {
              key = event_stack[0].split("-");
              event_stack.shift();
              bwg_change_image(key[0], key[1], data, true);
            }
          }
          bwg_change_watermark_container();
        }
      }
      function bwg_sliceV(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateY = 'min-auto';
        }
        else if (direction == 'left') {
          var translateY = 'auto';
        }
        bwg_grid(10, 1, 0, 0, translateY, 1, 0, current_image_class, next_image_class, direction);
      }
      function bwg_scaleOut(current_image_class, next_image_class, direction) {
        bwg_grid(1, 1, 0, 0, 0, 1.5, 0, current_image_class, next_image_class, direction);
      }
      function bwg_blindH(current_image_class, next_image_class, direction) {
        bwg_grid(10, 1, 0, 0, 0, .7, 0, current_image_class, next_image_class);
      }
      function bwg_change_image(current_key, key, data, from_effect) {
        jQuery("#spider_popup_left").show();
        jQuery("#spider_popup_right").show();
        if (<?php echo $option_row->enable_loop; ?> == 0) {
          if (key == (parseInt(data.length) - 1)) {
            jQuery("#spider_popup_right").hide();
          }
          if (key == 0) {
            jQuery("#spider_popup_left").hide();
          }
        }
        /* Pause videos.*/
        jQuery("#bwg_image_container").find("iframe").each(function () {
          jQuery(this)[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
          jQuery(this)[0].contentWindow.postMessage('{ "method": "pause" }', "*");
          jQuery(this)[0].contentWindow.postMessage('pause', '*');
        });
        if (typeof data[key] != 'undefined') {
          if (typeof data[current_key] != 'undefined') {
            if (jQuery(".bwg_play_pause").length && !jQuery(".bwg_play_pause").hasClass("fa-play")) {
              bwg_play();
            }
            if (!from_effect) {
              /* Change image key.*/
              jQuery("#bwg_current_image_key").val(key);
              /*if (current_key == '-1') {
                current_key = jQuery(".bwg_thumb_active").children("img").attr("image_key");
              }*/
            }
            if (bwg_trans_in_progress) {
              event_stack.push(current_key + '-' + key);
              return;
            }
            var direction = 'right';
            if (bwg_current_key > key) {
              var direction = 'left';
            }
            else if (bwg_current_key == key) {
              return;
            }
            /*jQuery("#spider_popup_left").hover().css({"display": "inline"});
            jQuery("#spider_popup_right").hover().css({"display": "inline"});*/
            jQuery(".bwg_image_count").html(data[key]["number"]);
            /* Set filmstrip initial position.*/
            jQuery(".bwg_watermark").css({display: 'none'});
            /* Set active thumbnail position.*/
            bwg_current_filmstrip_pos = key * (jQuery(".bwg_filmstrip_thumbnail").width() + 2 + 2 * <?php echo $theme_row->lightbox_filmstrip_thumb_border_width; ?>);
            bwg_current_key = key;
            /* Change image id.*/
            jQuery("#bwg_popup_image").attr('image_id', data[key]["id"]);
            /* Change image title, description.*/
            jQuery(".bwg_image_title").html(jQuery('<span style="display: block;" />').html(data[key]["alt"]).text());
            jQuery(".bwg_image_description").html(jQuery('<span style="display: block;" />').html(data[key]["description"]).text());
            jQuery(".bwg_image_info").removeAttr("style");
            if (data[key]["alt"].trim() == "") {
              if (data[key]["description"].trim() == "") {
                      jQuery(".bwg_image_info").css("background", "none");
              }
            }
          if (jQuery(".bwg_image_info_container1").css("display") != 'none') {
            jQuery(".bwg_image_info_container1").css("display", "table-cell");
          }
          else {
            jQuery(".bwg_image_info_container1").css("display", "none");
          }
          var current_image_class = jQuery(".bwg_popup_image_spun").css("zIndex") == 2 ? ".bwg_popup_image_spun" : ".bwg_popup_image_second_spun";
          var next_image_class = current_image_class == ".bwg_popup_image_second_spun" ? ".bwg_popup_image_spun" : ".bwg_popup_image_second_spun";
          
          var is_embed = data[key]['filetype'].indexOf("EMBED_") > -1 ? true : false;
          var is_embed_instagram_post = data[key]['filetype'].indexOf('INSTAGRAM_POST') > -1 ? true :false;
          var cur_height = jQuery(current_image_class).height();
          var cur_width = jQuery(current_image_class).width();
          var innhtml = '<span class="bwg_popup_image_spun1" style="display: table; width: inherit; height: inherit;"><span class="bwg_popup_image_spun2" style="display: table-cell; vertical-align: middle; text-align: center;">';
          if (!is_embed) {
              innhtml += '<img style="max-height: ' + cur_height + 'px; max-width: ' + cur_width + 'px;" class="bwg_popup_image bwg_popup_watermark" src="<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR; ?>' + jQuery('<span style="display: block;" />').html(data[key]["image_url"]).text() + '" alt="' + data[key]["alt"] + '" />';
          }
          else { /*is_embed*/

            innhtml += '<span style="height: ' + cur_height + 'px; width: ' + cur_width + 'px;" class="bwg_popup_embed bwg_popup_watermark">';
            if (is_embed_instagram_post) {
              var post_width = 0;
              var post_height = 0;
              if (cur_height < cur_width + 88) {
                post_height = cur_height;
                post_width = post_height - 88;
              }
              else {
                post_width = cur_width;
                post_height = post_width + 88;
              }
              innhtml += spider_display_embed(data[key]['filetype'], data[key]['filename'], {class:"bwg_embed_frame", 'data-width': data[key]['image_width'], 'data-height': data[key]['image_height'], frameborder: "0", allowfullscreen: "allowfullscreen", style: "width:" + post_width + "px; height:" + post_height + "px; vertical-align:middle; display:inline-block; position:relative;"});
            }
            else{
              innhtml += spider_display_embed(data[key]['filetype'], data[key]['filename'], {class:"bwg_embed_frame", frameborder:"0", allowfullscreen:"allowfullscreen", style:"width:inherit; height:inherit; vertical-align:middle; display:table-cell;" });
            }
            innhtml += "</span>";
          }
          innhtml += '</span></span>';
          jQuery(next_image_class).html(innhtml);
          
          function bwg_afterload() {
            <?php
            if ($option_row->preload_images) {
              echo 'bwg_preload_images(key);';
            }
            ?>
            bwg_<?php echo $image_effect; ?>(current_image_class, next_image_class, direction);
            jQuery("#bwg_download").show();
            if (!is_embed) {
              jQuery("#bwg_fullsize_image").attr("href", "<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR; ?>" + data[key]['image_url']);
              jQuery("#bwg_download").attr("href", "<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR; ?>" + data[key]['image_url']);
            }
            else {
              jQuery("#bwg_fullsize_image").attr("href", data[key]['image_url']);
              if (data[key]['filetype'].indexOf("FLICKR_") > -1) {
                jQuery("#bwg_download").attr("href", data[key]['filename']);
              }
              else if (data[key]['filetype'].indexOf("INSTAGRAM_") > -1) {
                jQuery("#bwg_download").attr("href", data[key]['thumb_url'].substring(0, data[key]['thumb_url'].length - 1) + 'l');
              }
              else {
               jQuery("#bwg_download").hide();
              }
            }
            var image_arr = data[key]['image_url'].split("/");
            jQuery("#bwg_download").attr("download", image_arr[image_arr.length - 1]);
            /* Load comments.*/
            if (jQuery(".bwg_comment_container").hasClass("bwg_open")) {
              if (data[key]["comment_count"] == 0) {
                jQuery("#bwg_added_comments").hide();
              }
              else {
                jQuery("#bwg_added_comments").show();
                spider_set_input_value('ajax_task', 'display');
                spider_set_input_value('image_id', jQuery('#bwg_popup_image').attr('image_id'));
                spider_ajax_save('bwg_comment_form');
              }
            }
            /* Update custom scroll.*/
              if (typeof jQuery().mCustomScrollbar !== 'undefined') {
                if (jQuery.isFunction(jQuery().mCustomScrollbar)) {
                  jQuery(".bwg_comments").mCustomScrollbar({
                    advanced:{
                      updateOnContentResize: true
                    }
                  });
                }
              }
            jQuery(".mCSB_scrollTools").hide();
            <?php
            if ($enable_image_filmstrip) {
              ?>
              bwg_move_filmstrip();
              <?php
            }
            ?>
            bwg_resize_instagram_post();
          }
          if (!is_embed) {
            var cur_img = jQuery(next_image_class).find('img');
            cur_img.one('load', function() {
              bwg_afterload();
            }).each(function() {
              if(this.complete) jQuery(this).load();
            });
          }
          else {
            bwg_afterload();
            }
          }
        }
      }
      jQuery(document).on('keydown', function (e) {
        if (jQuery("#bwg_name").is(":focus") || jQuery("#bwg_email").is(":focus") || jQuery("#bwg_comment").is(":focus") || jQuery("#bwg_captcha_input").is(":focus")) {
          return;
        }
        if (e.keyCode === 39) { /* Right arrow.*/
          bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), parseInt(jQuery('#bwg_current_image_key').val()) + 1, data)
        }
        else if (e.keyCode === 37) { /* Left arrow.*/
          bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), parseInt(jQuery('#bwg_current_image_key').val()) - 1, data)
        }
        else if (e.keyCode === 27) { /* Esc.*/
          spider_destroypopup(1000);
        }
        else if (e.keyCode === 32) { /* Space.*/
          jQuery(".bwg_play_pause").trigger('click');
        }
      });
      function bwg_preload_images(key) {
        count = <?php echo (int) $option_row->preload_images_count / 2; ?>;
        var count_all = data.length;
        if (count_all < <?php echo $option_row->preload_images_count; ?>) {
          count = 0;
        }
        if (count != 0) {
          for (var i = key - count; i < key + count; i++) {
            var index = parseInt((i + count_all) % count_all);
            var is_embed = data[index]['filetype'].indexOf("EMBED_") > -1 ? true : false;
            if (typeof data[index] != "undefined") {
              if (!is_embed) {
                jQuery("<img/>").attr("src", '<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR; ?>' + jQuery('<span style="display: block;" />').html(data[index]["image_url"]).text());
              }
            }
          }
        }
        else {
          for (var i = 0; i < data.length; i++) {
            var is_embed = data[i]['filetype'].indexOf("EMBED_") > -1 ? true : false;
            if (typeof data[index] != "undefined") {
              if (!is_embed) {
                jQuery("<img/>").attr("src", '<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR; ?>' + jQuery('<span style="display: block;" />').html(data[i]["image_url"]).text());
              }
            }
          }
        }
      }
      function bwg_popup_resize() {
        if (typeof jQuery().fullscreen !== 'undefined') {
          if (jQuery.isFunction(jQuery().fullscreen)) {
            if (!jQuery.fullscreen.isFullScreen()) {
              jQuery(".bwg_resize-full").show();
              jQuery(".bwg_resize-full").attr("class", "bwg_ctrl_btn bwg_resize-full fa fa-resize-full");
              jQuery(".bwg_resize-full").attr("title", "<?php echo __('Maximize', 'bwg'); ?>");
              jQuery(".bwg_fullscreen").attr("class", "bwg_ctrl_btn bwg_fullscreen fa fa-fullscreen");
              jQuery(".bwg_fullscreen").attr("title", "<?php echo __('Fullscreen', 'bwg'); ?>");
            }
          }
        }
        var comment_container_width = 0;
        if (jQuery(".bwg_comment_container").hasClass("bwg_open")) {
          comment_container_width = <?php echo $theme_row->lightbox_comment_width; ?>;
        }
        if (comment_container_width > jQuery(window).width()) {
          comment_container_width = jQuery(window).width();
          jQuery(".bwg_comment_container").css({
            width: comment_container_width
          });
          jQuery(".spider_popup_close_fullscreen").hide();
        }
        else {
          jQuery(".spider_popup_close_fullscreen").show();
        }
        if (!(!(jQuery(window).height() > <?php echo $image_height; ?>) || !(<?php echo $open_with_fullscreen; ?> != 1))) {
          jQuery("#spider_popup_wrap").css({
            height: <?php echo $image_height; ?>,
            top: '50%',
            marginTop: -<?php echo $image_height / 2; ?>,
            zIndex: 100000
          });
          jQuery(".bwg_image_container").css({height: (<?php echo $image_height - $image_filmstrip_height; ?>)});
          jQuery(".bwg_popup_image").css({
            maxHeight: <?php echo $image_height - $image_filmstrip_height; ?>
          });
          jQuery(".bwg_popup_embed").css({
            height: <?php echo $image_height - $image_filmstrip_height; ?>
          });
          bwg_popup_current_height = <?php echo $image_height; ?>;
        }
        else {
          jQuery("#spider_popup_wrap").css({
            height: jQuery(window).height(),
            top: 0,
            marginTop: 0,
            zIndex: 100000
          });
          jQuery(".bwg_image_container").css({height: (jQuery(window).height() - <?php echo $image_filmstrip_height; ?>)});
          jQuery(".bwg_popup_image").css({
            maxHeight: jQuery(window).height() - <?php echo $image_filmstrip_height; ?>
          });
          jQuery(".bwg_popup_embed").css({
            height: jQuery(window).height() - <?php echo $image_filmstrip_height; ?>
          });
          bwg_popup_current_height = jQuery(window).height();
        }
        if (!(!(jQuery(window).width() >= <?php echo $image_width; ?>) || !(<?php echo $open_with_fullscreen; ?> != 1))) {
          jQuery("#spider_popup_wrap").css({
            width: <?php echo $image_width; ?>,
            left: '50%',
            marginLeft: -<?php echo $image_width / 2; ?>,
            zIndex: 100000
          });
          jQuery(".bwg_image_wrap").css({width: <?php echo $image_width; ?> - comment_container_width});
          jQuery(".bwg_image_container").css({width: <?php echo $image_width; ?> - comment_container_width});
          jQuery(".bwg_popup_image").css({
            maxWidth: <?php echo $image_width; ?> - comment_container_width
          });
          jQuery(".bwg_popup_embed").css({
            width: <?php echo $image_width; ?> - comment_container_width
          });
          jQuery(".bwg_filmstrip_container").css({width: <?php echo $image_width; ?> - comment_container_width});
          jQuery(".bwg_filmstrip").css({width: (<?php echo $image_width; ?>  - comment_container_width- 40)});
          bwg_popup_current_width = <?php echo $image_width; ?>;
        }
        else {
          jQuery("#spider_popup_wrap").css({
            width: jQuery(window).width(),
            left: 0,
            marginLeft: 0,
            zIndex: 100000
          });
          jQuery(".bwg_image_wrap").css({width: (jQuery(window).width() - comment_container_width)});
          jQuery(".bwg_image_container").css({width: jQuery(window).width() - comment_container_width});
          jQuery(".bwg_popup_image").css({
            maxWidth: jQuery(window).width() - comment_container_width
          });
          jQuery(".bwg_popup_embed").css({
            width: jQuery(window).width() - comment_container_width
          });
          jQuery(".bwg_filmstrip_container").css({width: (jQuery(window).width() - comment_container_width)});
          jQuery(".bwg_filmstrip").css({width: (jQuery(window).width() - comment_container_width - 40)});
          bwg_popup_current_width = jQuery(window).width();
        }
        /* Set watermark container size.*/
        bwg_resize_instagram_post();
        bwg_change_watermark_container();
        if (!(!(jQuery(window).height() > <?php echo $image_height - 2 * $theme_row->lightbox_close_btn_top; ?>) || !(jQuery(window).width() >= <?php echo $image_width - 2 * $theme_row->lightbox_close_btn_right; ?>) || !(<?php echo $open_with_fullscreen; ?> != 1))) {
          jQuery(".spider_popup_close_fullscreen").attr("class", "spider_popup_close");
        }
        else {
          if (!(!(jQuery("#spider_popup_wrap").width() < jQuery(window).width()) || !(jQuery("#spider_popup_wrap").height() < jQuery(window).height()))) {
            jQuery(".spider_popup_close").attr("class", "bwg_ctrl_btn spider_popup_close_fullscreen");
          }
        }
        if ( "<?php echo $theme_row->lightbox_ctrl_btn_pos ;?>" == 'bottom') {
          jQuery(".bwg_toggle_container").css("bottom", jQuery(".bwg_ctrl_btn_container").height() + "px");
        }
        if ( "<?php echo $theme_row->lightbox_ctrl_btn_pos ;?>" == 'top') {
          jQuery(".bwg_toggle_container").css("top", jQuery(".bwg_ctrl_btn_container").height() + "px");
        }
      }
      jQuery(window).resize(function() {
        if (typeof jQuery().fullscreen !== 'undefined') {
          if (jQuery.isFunction(jQuery().fullscreen)) {
            if (!jQuery.fullscreen.isFullScreen()) {
              bwg_popup_resize();
            }
          }
        }
      });
      /* Popup current width/height.*/
      var bwg_popup_current_width = <?php echo $image_width; ?>;
      var bwg_popup_current_height = <?php echo $image_height; ?>;
      /* Open/close comments.*/
      function bwg_comment() {
        jQuery(".bwg_watermark").css({display: 'none'});
        if (jQuery(".bwg_comment_container").hasClass("bwg_open")) {
          /* Close comment.*/
          var border_width = parseInt(jQuery(".bwg_comment_container").css('borderRightWidth'));
          if (!border_width) {
            border_width = 0;
          }
          jQuery(".bwg_comment_container").animate({<?php echo $theme_row->lightbox_comment_pos; ?>: -jQuery(".bwg_comment_container").width() - border_width}, 500);
          jQuery(".bwg_image_wrap").animate({
            <?php echo $theme_row->lightbox_comment_pos; ?>: 0,
            width: jQuery("#spider_popup_wrap").width()
          }, 500);
          jQuery(".bwg_popup_image").animate({
              maxWidth: jQuery("#spider_popup_wrap").width()
            }, {
              duration: 500,
              complete: function () { bwg_change_watermark_container(); }
            });
          jQuery(".bwg_popup_embed").animate({
              width: jQuery("#spider_popup_wrap").width()
            }, {
              duration: 500,
              complete: function () { 
                bwg_resize_instagram_post();
                bwg_change_watermark_container(); }
            });
          jQuery(".bwg_filmstrip_container").animate({width: jQuery(".spider_popup_wrap").width()}, 500);
          jQuery(".bwg_filmstrip").animate({width: jQuery(".spider_popup_wrap").width() - 40}, 500);
          /* Set filmstrip initial position.*/
          bwg_set_filmstrip_pos(jQuery(".spider_popup_wrap").width() - 40);
          jQuery(".bwg_comment_container").attr("class", "bwg_comment_container bwg_close");
          jQuery(".bwg_comment").attr("title", "<?php echo __('Show Comments', 'bwg'); ?>");
          jQuery(".spider_popup_close_fullscreen").show();
        }
        else {
          /* Open comment.*/
          var comment_container_width = <?php echo $theme_row->lightbox_comment_width; ?>;
          if (comment_container_width > jQuery(window).width()) {
            comment_container_width = jQuery(window).width();
            jQuery(".bwg_comment_container").css({
              width: comment_container_width
            });
            jQuery(".spider_popup_close_fullscreen").hide();
            if (jQuery(".bwg_ctrl_btn").hasClass("fa-pause")) {
              var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
              jQuery(".bwg_play_pause").trigger(isMobile ? 'touchend' : 'click');
            }
          }
          else {
            jQuery(".spider_popup_close_fullscreen").show();
          }
          jQuery(".bwg_comment_container").animate({<?php echo $theme_row->lightbox_comment_pos; ?>: 0}, 500);
          jQuery(".bwg_image_wrap").animate({
            <?php echo $theme_row->lightbox_comment_pos; ?>: jQuery(".bwg_comment_container").width(),
            width: jQuery("#spider_popup_wrap").width() - jQuery(".bwg_comment_container").width()}, 500);
          jQuery(".bwg_popup_image").animate({
              maxWidth: jQuery("#spider_popup_wrap").width() - jQuery(".bwg_comment_container").width()
            }, {
              duration: 500,
              complete: function () { bwg_change_watermark_container(); }
            });
          jQuery(".bwg_popup_embed").animate({
              width: jQuery("#spider_popup_wrap").width() - jQuery(".bwg_comment_container").width()
            }, {
              duration: 500,
              complete: function () { 
                bwg_resize_instagram_post();
                bwg_change_watermark_container(); }
            });
          jQuery(".bwg_filmstrip_container").css({width: jQuery("#spider_popup_wrap").width() - jQuery(".bwg_comment_container").width()});
          jQuery(".bwg_filmstrip").animate({width: jQuery(".bwg_filmstrip_container").width() - 40}, 500);
          /* Set filmstrip initial position.*/
          bwg_set_filmstrip_pos(jQuery(".bwg_filmstrip_container").width() - 40);
          jQuery(".bwg_comment_container").attr("class", "bwg_comment_container bwg_open");
          jQuery(".bwg_comment").attr("title", "<?php echo __('Hide Comments', 'bwg'); ?>");
          /* Load comments.*/
          var cur_image_key = parseInt(jQuery("#bwg_current_image_key").val());
          if (data[cur_image_key]["comment_count"] != 0) {
            jQuery("#bwg_added_comments").show();
            spider_set_input_value('ajax_task', 'display');
            spider_set_input_value('image_id', jQuery('#bwg_popup_image').attr('image_id'));
            spider_ajax_save('bwg_comment_form');
          }
        }
      }
      function bwg_reset_zoom() {
        var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
        var viewportmeta = document.querySelector('meta[name="viewport"]');
        if (isMobile) {
          if (viewportmeta) {
            viewportmeta.content = 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0';
          }
        }
      }
      /* jQuery(document).ready(function () { */
      	<?php
        if ($image_right_click) {
          ?>
          /* Disable right click.*/
          jQuery(".bwg_image_wrap").bind("contextmenu", function (e) {
            return false;
          });
           jQuery(".bwg_image_wrap").css('webkitTouchCallout','none');
          <?php
        }
        ?>
        if (typeof jQuery().swiperight !== 'undefined') {
          if (jQuery.isFunction(jQuery().swiperight)) {
            jQuery('#spider_popup_wrap').swiperight(function () {
            bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + data.length - 1) % data.length, data);
              return false;
            });
          }
        }
        if (typeof jQuery().swipeleft !== 'undefined') {
          if (jQuery.isFunction(jQuery().swipeleft)) {
            jQuery('#spider_popup_wrap').swipeleft(function () {
            bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + 1) % data.length, data);
              return false;
            });
          }
        }

        bwg_reset_zoom();
        var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
        var bwg_click = isMobile ? 'touchend' : 'click';
        jQuery("#spider_popup_left").on(bwg_click, function () {
          bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + data.length - 1) % data.length, data);
          return false;
        });
        jQuery("#spider_popup_right").on(bwg_click, function () {
          bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + 1) % data.length, data);
          return false;
        });
        if (navigator.appVersion.indexOf("MSIE 10") != -1 || navigator.appVersion.indexOf("MSIE 9") != -1) {
          setTimeout(function () {
            bwg_popup_resize();
          }, 1);
        }
        else {
          bwg_popup_resize();
        }
        jQuery(".bwg_watermark").css({display: 'none'});
        setTimeout(function () {
          bwg_change_watermark_container();
        }, 500);
        /* If browser doesn't support Fullscreen API.*/
        if (typeof jQuery().fullscreen !== 'undefined') {
          if (jQuery.isFunction(jQuery().fullscreen)) {
            if (!jQuery.fullscreen.isNativelySupported()) {
              jQuery(".bwg_fullscreen").hide();
            }
          }
        }
        /* Set image container height.*/
        jQuery(".bwg_image_container").height(jQuery(".bwg_image_wrap").height() - <?php echo $image_filmstrip_height; ?>);
        /* Change default scrollbar in comments.*/
        if (typeof jQuery().mCustomScrollbar !== 'undefined') {
          if (jQuery.isFunction(jQuery().mCustomScrollbar)) {
            jQuery(".bwg_comments").mCustomScrollbar({scrollInertia: 150});
          }
        }
        var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel" /*FF doesn't recognize mousewheel as of FF3.x*/
        jQuery('.bwg_filmstrip').on(mousewheelevt, function(e) {
          var evt = window.event || e; /* Equalize event object.*/
          evt = evt.originalEvent ? evt.originalEvent : evt; /* Convert to originalEvent if possible.*/
          var delta = evt.detail ? evt.detail*(-40) : evt.wheelDelta; /* Check for detail first, because it is used by Opera and FF.*/
          var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
          if (delta > 0) {
            /* Scroll up.*/
            jQuery(".bwg_filmstrip_left").trigger(isMobile ? 'touchend' : 'click');
          }
          else {
            /* Scroll down.*/
            jQuery(".bwg_filmstrip_right").trigger(isMobile ? 'touchend' : 'click');
          }
        });
        jQuery(".bwg_filmstrip_right").on(bwg_click, function () {
          jQuery( ".bwg_filmstrip_thumbnails" ).stop(true, false);
          if (jQuery(".bwg_filmstrip_thumbnails").position().left >= -(jQuery(".bwg_filmstrip_thumbnails").width() - jQuery(".bwg_filmstrip").width())) {
            jQuery(".bwg_filmstrip_left").css({opacity: 1, filter: "Alpha(opacity=100)"});
            if (jQuery(".bwg_filmstrip_thumbnails").position().left < -(jQuery(".bwg_filmstrip_thumbnails").width() - jQuery(".bwg_filmstrip").width() - <?php echo $filmstrip_thumb_margin_hor + $image_filmstrip_width; ?>)) {
              jQuery(".bwg_filmstrip_thumbnails").animate({left: -(jQuery(".bwg_filmstrip_thumbnails").width() - jQuery(".bwg_filmstrip").width())}, 500, 'linear');
            }
            else {
              jQuery(".bwg_filmstrip_thumbnails").animate({left: (jQuery(".bwg_filmstrip_thumbnails").position().left - <?php echo $filmstrip_thumb_margin_hor + $image_filmstrip_width; ?>)}, 500, 'linear');
            }
          }
          /* Disable right arrow.*/
          window.setTimeout(function(){
            if (jQuery(".bwg_filmstrip_thumbnails").position().left == -(jQuery(".bwg_filmstrip_thumbnails").width() - jQuery(".bwg_filmstrip").width())) {
              jQuery(".bwg_filmstrip_right").css({opacity: 0.3, filter: "Alpha(opacity=30)"});
            }
          }, 500);
        });
        jQuery(".bwg_filmstrip_left").on(bwg_click, function () {
          jQuery( ".bwg_filmstrip_thumbnails" ).stop(true, false);
          if (jQuery(".bwg_filmstrip_thumbnails").position().left < 0) {
            jQuery(".bwg_filmstrip_right").css({opacity: 1, filter: "Alpha(opacity=100)"});
            if (jQuery(".bwg_filmstrip_thumbnails").position().left > - <?php echo $filmstrip_thumb_margin_hor + $image_filmstrip_width; ?>) {
              jQuery(".bwg_filmstrip_thumbnails").animate({left: 0}, 500, 'linear');
            }
            else {
              jQuery(".bwg_filmstrip_thumbnails").animate({left: (jQuery(".bwg_filmstrip_thumbnails").position().left + <?php echo $image_filmstrip_width + $filmstrip_thumb_margin_hor; ?>)}, 500, 'linear');
            }
          }
          /* Disable left arrow.*/
          window.setTimeout(function(){
            if (jQuery(".bwg_filmstrip_thumbnails").position().left == 0) {
              jQuery(".bwg_filmstrip_left").css({opacity: 0.3, filter: "Alpha(opacity=30)"});
            }
          }, 500);
        });
        /* Set filmstrip initial position.*/
        bwg_set_filmstrip_pos(jQuery(".bwg_filmstrip").width());
        /* Show/hide image title/description.*/
        jQuery(".bwg_info").on(bwg_click, function() {
          if (jQuery(".bwg_image_info_container1").css("display") == 'none') {
            jQuery(".bwg_image_info_container1").css("display", "table-cell");
            jQuery(".bwg_info").attr("title", "<?php echo __('Hide info', 'bwg'); ?>");
          }
          else {
            jQuery(".bwg_image_info_container1").css("display", "none");
            jQuery(".bwg_info").attr("title", "<?php echo __('Show info', 'bwg'); ?>");
          }
        });
        /* Open/close comments.*/
        jQuery(".bwg_comment, .bwg_comments_close_btn").on(bwg_click, function() { bwg_comment()});
        /* Open/close control buttons.*/
        jQuery(".bwg_toggle_container").on(bwg_click, function () {
          var bwg_open_toggle_btn_class = "<?php echo ($theme_row->lightbox_ctrl_btn_pos == 'top') ? 'fa-angle-up' : 'fa-angle-down'; ?>";
          var bwg_close_toggle_btn_class = "<?php echo ($theme_row->lightbox_ctrl_btn_pos == 'top') ? 'fa-angle-down' : 'fa-angle-up'; ?>";
          if (jQuery(".bwg_toggle_container i").hasClass(bwg_open_toggle_btn_class)) {
            /* Close controll buttons.*/
            <?php
              if ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'bottom') && $theme_row->lightbox_ctrl_btn_pos == 'bottom' && $theme_row->lightbox_info_pos == 'bottom') {
                ?>
                jQuery(".bwg_image_info").animate({bottom: 0}, 500);
                <?php
              }
              elseif ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'top') && $theme_row->lightbox_ctrl_btn_pos == 'top' && $theme_row->lightbox_info_pos == 'top') {
                ?>
                jQuery(".bwg_image_info").animate({top: 0}, 500);
                <?php
              }
            ?>
            jQuery(".bwg_ctrl_btn_container").animate({<?php echo $theme_row->lightbox_ctrl_btn_pos; ?>: '-' + jQuery(".bwg_ctrl_btn_container").height()}, 500);
            jQuery(".bwg_toggle_container").animate({
                <?php echo $theme_row->lightbox_ctrl_btn_pos; ?>: 0
              }, {
                duration: 500,
                complete: function () { jQuery(".bwg_toggle_container i").attr("class", "bwg_toggle_btn fa " + bwg_close_toggle_btn_class) }
              });
          }
          else {
            /* Open controll buttons.*/
            <?php
              if ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'bottom') && $theme_row->lightbox_ctrl_btn_pos == 'bottom' && $theme_row->lightbox_info_pos == 'bottom') {
                ?>
                jQuery(".bwg_image_info").animate({bottom: jQuery(".bwg_ctrl_btn_container").height()}, 500);
                <?php
              }
              elseif ((!$enable_image_filmstrip || $theme_row->lightbox_filmstrip_pos != 'top') && $theme_row->lightbox_ctrl_btn_pos == 'top' && $theme_row->lightbox_info_pos == 'top') {
                ?>
                jQuery(".bwg_image_info").animate({top: jQuery(".bwg_ctrl_btn_container").height()}, 500);
                <?php
              }
            ?>
            jQuery(".bwg_ctrl_btn_container").animate({<?php echo $theme_row->lightbox_ctrl_btn_pos; ?>: 0}, 500);
            jQuery(".bwg_toggle_container").animate({
                <?php echo $theme_row->lightbox_ctrl_btn_pos; ?>: jQuery(".bwg_ctrl_btn_container").height()
              }, {
                duration: 500,
                complete: function () { jQuery(".bwg_toggle_container i").attr("class", "bwg_toggle_btn fa " + bwg_open_toggle_btn_class) }
              });
          }
        });
        /* Maximize/minimize.*/
        jQuery(".bwg_resize-full").on(bwg_click, function () {
          jQuery(".bwg_watermark").css({display: 'none'});
          var comment_container_width = 0;
          if (jQuery(".bwg_comment_container").hasClass("bwg_open")) {
            comment_container_width = jQuery(".bwg_comment_container").width();
          }
          if (jQuery(".bwg_resize-full").hasClass("fa-resize-small")) {
            if (jQuery(window).width() > <?php echo $image_width; ?>) {
              bwg_popup_current_width = <?php echo $image_width; ?>;
            }
            if (jQuery(window).height() > <?php echo $image_height; ?>) {
              bwg_popup_current_height = <?php echo $image_height; ?>;
            }
            /* Minimize.*/
            jQuery("#spider_popup_wrap").animate({
              width: bwg_popup_current_width,
              height: bwg_popup_current_height,
              left: '50%',
              top: '50%',
              marginLeft: -bwg_popup_current_width / 2,
              marginTop: -bwg_popup_current_height / 2,
              zIndex: 100000
            }, 500);
            jQuery(".bwg_image_wrap").animate({width: bwg_popup_current_width - comment_container_width}, 500);
            jQuery(".bwg_image_container").animate({height: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>, width: bwg_popup_current_width - comment_container_width}, 500);
            jQuery(".bwg_popup_image").animate({
                maxWidth: bwg_popup_current_width - comment_container_width,
                maxHeight: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>
              }, {
                duration: 500,
                complete: function () {
                  bwg_change_watermark_container();
                  if ((jQuery("#spider_popup_wrap").width() < jQuery(window).width())) {
                    if (jQuery("#spider_popup_wrap").height() < jQuery(window).height()) {
                      jQuery(".spider_popup_close_fullscreen").attr("class", "spider_popup_close");
                    }
                  }
                }
              });
            jQuery(".bwg_popup_embed").animate({
                width: bwg_popup_current_width - comment_container_width,
                height: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>
              }, {
                duration: 500,
                complete: function () {
                  bwg_resize_instagram_post();
                  bwg_change_watermark_container();
                  if (jQuery("#spider_popup_wrap").width() < jQuery(window).width()) {
                    if (jQuery("#spider_popup_wrap").height() < jQuery(window).height()) {
                      jQuery(".spider_popup_close_fullscreen").attr("class", "spider_popup_close");
                    }
                  }
                }
              });
            jQuery(".bwg_filmstrip_container").animate({width: bwg_popup_current_width - comment_container_width}, 500);
            jQuery(".bwg_filmstrip").animate({width: bwg_popup_current_width - comment_container_width - 40}, 500);
            /* Set filmstrip initial position.*/
            bwg_set_filmstrip_pos(bwg_popup_current_width - 40);
            jQuery(".bwg_resize-full").attr("class", "bwg_ctrl_btn bwg_resize-full fa fa-resize-full");
            jQuery(".bwg_resize-full").attr("title", "<?php echo __('Maximize', 'bwg'); ?>");
          }
          else {
            bwg_popup_current_width = jQuery(window).width();
            bwg_popup_current_height = jQuery(window).height();
            /* Maximize.*/
            jQuery("#spider_popup_wrap").animate({
              width: jQuery(window).width(),
              height: jQuery(window).height(),
              left: 0,
              top: 0,
              margin: 0,
              zIndex: 100000
            }, 500);
            jQuery(".bwg_image_wrap").animate({width: (jQuery(window).width() - comment_container_width)}, 500);
            jQuery(".bwg_image_container").animate({height: (bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>), width: bwg_popup_current_width - comment_container_width}, 500);
            jQuery(".bwg_popup_image").animate({
                maxWidth: jQuery(window).width() - comment_container_width,
                maxHeight: jQuery(window).height() - <?php echo $image_filmstrip_height; ?>
              }, {
                duration: 500,
                complete: function () { bwg_change_watermark_container(); }
              });
            jQuery(".bwg_popup_embed").animate({
                width: jQuery(window).width() - comment_container_width,
                height: jQuery(window).height() - <?php echo $image_filmstrip_height; ?>
              }, {
                duration: 500,
                complete: function () { 
                  bwg_resize_instagram_post();
                  bwg_change_watermark_container(); }
              });
            jQuery(".bwg_filmstrip_container").animate({width: jQuery(window).width() - comment_container_width}, 500);
            jQuery(".bwg_filmstrip").animate({width: jQuery(window).width() - comment_container_width - 40}, 500);
            /* Set filmstrip initial position.*/
            bwg_set_filmstrip_pos(jQuery(window).width() - comment_container_width - 40);
            jQuery(".bwg_resize-full").attr("class", "bwg_ctrl_btn bwg_resize-full fa fa-resize-small");
            jQuery(".bwg_resize-full").attr("title", "<?php echo __('Restore', 'bwg'); ?>");
            jQuery(".spider_popup_close").attr("class", "bwg_ctrl_btn spider_popup_close_fullscreen");
          }
        });
        /* Fullscreen.*/
        /*Toggle with mouse click*/
        jQuery(".bwg_fullscreen").on(bwg_click, function () {
          jQuery(".bwg_watermark").css({display: 'none'});
          var comment_container_width = 0;
          if (jQuery(".bwg_comment_container").hasClass("bwg_open")) {
            comment_container_width = jQuery(".bwg_comment_container").width();
          }
          function bwg_exit_fullscreen() {
            if (jQuery(window).width() > <?php echo $image_width; ?>) {
              bwg_popup_current_width = <?php echo $image_width; ?>;
            }
            if (jQuery(window).height() > <?php echo $image_height; ?>) {
              bwg_popup_current_height = <?php echo $image_height; ?>;
            }
            <?php
            /* "Full width lightbox" sets yes.*/
            if ($open_with_fullscreen) {
              ?>
            bwg_popup_current_width = jQuery(window).width();
            bwg_popup_current_height = jQuery(window).height();
              <?php
            }
            ?>
            jQuery("#spider_popup_wrap").on("fscreenclose", function() {
              jQuery("#spider_popup_wrap").css({
                width: bwg_popup_current_width,
                height: bwg_popup_current_height,
                left: '50%',
                top: '50%',
                marginLeft: -bwg_popup_current_width / 2,
                marginTop: -bwg_popup_current_height / 2,
                zIndex: 100000
              });
              jQuery(".bwg_image_wrap").css({width: bwg_popup_current_width - comment_container_width});
              jQuery(".bwg_image_container").css({height: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>, width: bwg_popup_current_width - comment_container_width});
              /*jQuery(".bwg_slide_bg").css({height: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>});
              jQuery(".bwg_popup_image_spun1").css({height: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>});*/
              jQuery(".bwg_popup_image").css({
                maxWidth: bwg_popup_current_width - comment_container_width,
                maxHeight: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>
              });
              jQuery(".bwg_popup_embed").css({
                width: bwg_popup_current_width - comment_container_width,
                height: bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>
              });
              bwg_resize_instagram_post();
              /* Set watermark container size.*/
              bwg_change_watermark_container();
              jQuery(".bwg_filmstrip_container").css({width: bwg_popup_current_width - comment_container_width});
              jQuery(".bwg_filmstrip").css({width: bwg_popup_current_width - comment_container_width- 40});
              /* Set filmstrip initial position.*/
              bwg_set_filmstrip_pos(bwg_popup_current_width - 40);
              jQuery(".bwg_resize-full").show();
              jQuery(".bwg_resize-full").attr("class", "bwg_ctrl_btn bwg_resize-full fa fa-resize-full");
              jQuery(".bwg_resize-full").attr("title", "<?php echo __('Maximize', 'bwg'); ?>");
              jQuery(".bwg_fullscreen").attr("class", "bwg_ctrl_btn bwg_fullscreen fa fa-fullscreen");
              jQuery(".bwg_fullscreen").attr("title", "<?php echo __('Fullscreen', 'bwg'); ?>");
              if (jQuery("#spider_popup_wrap").width() < jQuery(window).width()) {
                if (jQuery("#spider_popup_wrap").height() < jQuery(window).height()) {
                  jQuery(".spider_popup_close_fullscreen").attr("class", "spider_popup_close");
                }
              }
            });
          }
          if (typeof jQuery().fullscreen !== 'undefined') {
            if (jQuery.isFunction(jQuery().fullscreen)) {
            if (jQuery.fullscreen.isFullScreen()) {
              /* Exit Fullscreen.*/
              jQuery.fullscreen.exit();
              bwg_exit_fullscreen();
            }
            else {
              /* Fullscreen.*/
              jQuery("#spider_popup_wrap").fullscreen();
              /*jQuery("#spider_popup_wrap").on("fscreenopen", function() {
              if (jQuery.fullscreen.isFullScreen()) {*/
                var screen_width = screen.width;
                var screen_height = screen.height;
                jQuery("#spider_popup_wrap").css({
                  width: screen_width,
                  height: screen_height,
                  left: 0,
                  top: 0,
                  margin: 0,
                  zIndex: 100000
                });
                jQuery(".bwg_image_wrap").css({width: screen_width - comment_container_width});
                jQuery(".bwg_image_container").css({height: (screen_height - <?php echo $image_filmstrip_height; ?>), width: screen_width - comment_container_width});
                /* jQuery(".bwg_slide_bg").css({height: screen_height - <?php echo $image_filmstrip_height; ?>});*/
                jQuery(".bwg_popup_image").css({
                  maxWidth: (screen_width - comment_container_width),
                  maxHeight: (screen_height - <?php echo $image_filmstrip_height; ?>)
                });
                jQuery(".bwg_popup_embed").css({
                  width: (screen_width - comment_container_width),
                  height: (screen_height - <?php echo $image_filmstrip_height; ?>)
                });
                bwg_resize_instagram_post();
                /* Set watermark container size.*/
                bwg_change_watermark_container();
                jQuery(".bwg_filmstrip_container").css({width: (screen_width - comment_container_width)});
                jQuery(".bwg_filmstrip").css({width: (screen_width - comment_container_width - 40)});
                /* Set filmstrip initial position.*/
                bwg_set_filmstrip_pos(screen_width - comment_container_width - 40);
                jQuery(".bwg_resize-full").hide();
                jQuery(".bwg_fullscreen").attr("class", "bwg_ctrl_btn bwg_fullscreen fa fa-resize-small");
                jQuery(".bwg_fullscreen").attr("title", "<?php echo __('Exit Fullscreen', 'bwg'); ?>");
                jQuery(".spider_popup_close").attr("class", "bwg_ctrl_btn spider_popup_close_fullscreen");
              /*});
              }*/
              }
            }
          }
          return false;
        });
        /* Play/pause.*/
        jQuery(".bwg_play_pause, .bwg_popup_image").on(bwg_click, function () {
          if (jQuery(".bwg_play_pause").length && jQuery(".bwg_play_pause").hasClass("fa-play")) {
            /* Play.*/
            bwg_play();
            jQuery(".bwg_play_pause").attr("title", "<?php echo __('Pause', 'bwg'); ?>");
            jQuery(".bwg_play_pause").attr("class", "bwg_ctrl_btn bwg_play_pause fa fa-pause");
          }
          else {
            /* Pause.*/
            window.clearInterval(bwg_playInterval);
            jQuery(".bwg_play_pause").attr("title", "<?php echo __('Play', 'bwg'); ?>");
            jQuery(".bwg_play_pause").attr("class", "bwg_ctrl_btn bwg_play_pause fa fa-play");
          }
        });
        /* Open with autoplay.*/
        <?php
        if ($open_with_autoplay) {
          ?>
          bwg_play();
          jQuery(".bwg_play_pause").attr("title", "<?php echo __('Pause', 'bwg'); ?>");
          jQuery(".bwg_play_pause").attr("class", "bwg_ctrl_btn bwg_play_pause fa fa-pause");
          <?php
        }
        ?>
        /* Open with fullscreen.*/
        <?php
        if ($open_with_fullscreen) {
          ?>
          bwg_open_with_fullscreen();
          <?php
        }
        ?>
        <?php
        if ($option_row->preload_images) {
          echo "bwg_preload_images(parseInt(jQuery('#bwg_current_image_key').val()));";
        }
        ?>
        jQuery(".bwg_popup_image").removeAttr("width");
        jQuery(".bwg_popup_image").removeAttr("height");
     /*  }); */
      /* Open with fullscreen.*/
      function bwg_open_with_fullscreen() {
        jQuery(".bwg_watermark").css({display: 'none'});
        var comment_container_width = 0;
        if (jQuery(".bwg_comment_container").hasClass("bwg_open")) {
          comment_container_width = jQuery(".bwg_comment_container").width();
        }
        bwg_popup_current_width = jQuery(window).width();
        bwg_popup_current_height = jQuery(window).height();
        jQuery("#spider_popup_wrap").css({
          width: jQuery(window).width(),
          height: jQuery(window).height(),
          left: 0,
          top: 0,
          margin: 0,
          zIndex: 100000
        });
        jQuery(".bwg_image_wrap").css({width: (jQuery(window).width() - comment_container_width)});
        jQuery(".bwg_image_container").css({height: (bwg_popup_current_height - <?php echo $image_filmstrip_height; ?>)});
        jQuery(".bwg_popup_image").css({
         maxWidth: jQuery(window).width() - comment_container_width,
         maxHeight: jQuery(window).height() - <?php echo $image_filmstrip_height; ?>
        },  {
          complete: function () { bwg_change_watermark_container(); }
         });
        jQuery(".bwg_popup_embed").css({
         width: jQuery(window).width() - comment_container_width,
         height: jQuery(window).height() - <?php echo $image_filmstrip_height; ?>
        },  {
          complete: function () { 
            bwg_resize_instagram_post();
            bwg_change_watermark_container(); }
         });
        jQuery(".bwg_filmstrip_container").css({width: jQuery(window).width() - comment_container_width});
        jQuery(".bwg_filmstrip").css({width: jQuery(window).width() - comment_container_width - 40});
        /* Set filmstrip initial position.*/
        bwg_set_filmstrip_pos(jQuery(window).width() - comment_container_width - 40);

        jQuery(".bwg_resize-full").attr("class", "bwg_ctrl_btn bwg_resize-full fa fa-resize-small");
        jQuery(".bwg_resize-full").attr("title", "<?php echo __('Restore', 'bwg'); ?>");
        jQuery(".spider_popup_close").attr("class", "bwg_ctrl_btn spider_popup_close_fullscreen");         
      }

      function bwg_resize_instagram_post() {
        if (jQuery('.inner_instagram_iframe_bwg_embed_frame').length) {
          var post_width = jQuery(".bwg_image_container").width();
          var post_height = jQuery(".bwg_image_container").height();
          
          jQuery('.inner_instagram_iframe_bwg_embed_frame').each(function() {
            var parent_container = jQuery(this).parent();
            if (post_height / (parseInt(parent_container.attr('data-height')) + 96) < post_width / parseInt(parent_container.attr('data-width'))) {
              parent_container.height(post_height);
              parent_container.width((parent_container.height() - 96) * parent_container.attr('data-width') / parent_container.attr('data-height') + 16);
            }
            else {
              parent_container.width(post_width);
              parent_container.height((parent_container.width() - 16) * parent_container.attr('data-height') / parent_container.attr('data-width') + 96);
            }
            parent_container.css({top: 0.5 * (post_height - parent_container.height())});
          });
          bwg_change_watermark_container();
        }
      }

      function bwg_play() {
        window.clearInterval(bwg_playInterval);
        bwg_playInterval = setInterval(function () {
          if (!data[parseInt(jQuery('#bwg_current_image_key').val()) + 1]) {
            if (<?php echo $option_row->enable_loop; ?> == 1) {
              /* Wrap around.*/
              bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), 0, data);
            }
            return;
          }
          bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), parseInt(jQuery('#bwg_current_image_key').val()) + 1, data)
        }, '<?php echo $slideshow_interval * 1000; ?>');
      }
      jQuery(window).focus(function() {
        /* event_stack = [];*/
          if (jQuery(".bwg_play_pause").length && !jQuery(".bwg_play_pause").hasClass("fa-play")) {
            bwg_play();
          }
        /*var i = 0;
        jQuery(".bwg_slider").children("span").each(function () {
          if (jQuery(this).css('opacity') == 1) {
            jQuery("#bwg_current_image_key").val(i);
          }
          i++;
        });*/
      });
      jQuery(window).blur(function() {
        event_stack = [];
        window.clearInterval(bwg_playInterval);
      });
    </script>
    <?php
    die();
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