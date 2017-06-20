<?php

class BWGControllerOptions_bwg {
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
  public function execute() {
    $task = ((isset($_POST['task'])) ? esc_html(stripslashes($_POST['task'])) : '');
    $id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    
    if($task != ''){
      if(!WDWLibrary::verify_nonce('options_bwg')){
        die('Sorry, your nonce did not verify.');
      }
    }

    if (method_exists($this, $task)) {
      $this->$task($id);
    }
    else {
      $this->display();
    }
  }

  public function display() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelOptions_bwg.php";
    $model = new BWGModelOptions_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewOptions_bwg.php";
    $view = new BWGViewOptions_bwg($model);
    $view->display();
  }
  
  public function reset() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelOptions_bwg.php";
    $model = new BWGModelOptions_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewOptions_bwg.php";
    $view = new BWGViewOptions_bwg($model);
    echo WDWLibrary::message('Changes must be saved.', 'error');
    $view->display(true);
  }

  public function save() {
    $this->save_db();
    $this->display();
  }
  
  public function save_db() {
    global $wpdb;
    $id = 1;    
    if (isset($_POST['old_images_directory'])) {
      $old_images_directory = esc_html(stripslashes($_POST['old_images_directory']));
    }
    if (isset($_POST['images_directory'])) {
      $images_directory = esc_html(stripslashes($_POST['images_directory']));
      if (!is_dir(ABSPATH . $images_directory)) {
        echo WDWLibrary::message('Uploads directory doesn\'t exist. Old value is restored.', 'error');
        if ($old_images_directory) {
          $images_directory = $old_images_directory;
        }
        else {
          $upload_dir = wp_upload_dir();
          if (!is_dir($upload_dir['basedir'] . '/photo-gallery')) {
            mkdir($upload_dir['basedir'] . '/photo-gallery', 0777);
          }
          $images_directory = str_replace(ABSPATH, '', $upload_dir['basedir']);
        }
      }
    }
    else {
      $upload_dir = wp_upload_dir();
      if (!is_dir($upload_dir['basedir'] . '/photo-gallery')) {
        mkdir($upload_dir['basedir'] . '/photo-gallery', 0777);
      }
      $images_directory = str_replace(ABSPATH, '', $upload_dir['basedir']);
    }
    $resize_image = (isset($_POST['resize_image']) ? esc_html(stripslashes($_POST['resize_image'])) : 1);

    $masonry = (isset($_POST['masonry']) ? esc_html(stripslashes($_POST['masonry'])) : 'vertical');
    $mosaic = (isset($_POST['mosaic']) ? esc_html(stripslashes($_POST['mosaic'])) : 'vertical');
    $resizable_mosaic = (isset($_POST['resizable_mosaic']) ? esc_html(stripslashes($_POST['resizable_mosaic'])) : 0);
    $mosaic_total_width = (isset($_POST['mosaic_total_width']) ? esc_html(stripslashes($_POST['mosaic_total_width'])) : 100);

    $image_column_number = (isset($_POST['image_column_number']) ? esc_html(stripslashes($_POST['image_column_number'])) : 5);
    $images_per_page = (isset($_POST['images_per_page']) ? esc_html(stripslashes($_POST['images_per_page'])) : 30);
    $thumb_width = (isset($_POST['thumb_width']) ? esc_html(stripslashes($_POST['thumb_width'])) : 120);
    $thumb_height = (isset($_POST['thumb_height']) ? esc_html(stripslashes($_POST['thumb_height'])) : 90);
    $upload_thumb_width = (isset($_POST['upload_thumb_width']) ? esc_html(stripslashes($_POST['upload_thumb_width'])) : 300);
    $upload_thumb_height = (isset($_POST['upload_thumb_height']) ? esc_html(stripslashes($_POST['upload_thumb_height'])) : 300);
	  $upload_img_width = (isset($_POST['upload_img_width']) ? esc_html(stripslashes($_POST['upload_img_width'])) : 1200);
    $upload_img_height = (isset($_POST['upload_img_height']) ? esc_html(stripslashes($_POST['upload_img_height'])) : 1200);	
    $image_enable_page = (isset($_POST['image_enable_page']) ? esc_html(stripslashes($_POST['image_enable_page'])) : 1);
    $image_title_show_hover = (isset($_POST['image_title_show_hover']) ? esc_html(stripslashes($_POST['image_title_show_hover'])) : 'none');
    $album_column_number = (isset($_POST['album_column_number']) ? esc_html(stripslashes($_POST['album_column_number'])) : 5);
    $albums_per_page = (isset($_POST['albums_per_page']) ? esc_html(stripslashes($_POST['albums_per_page'])) : 30);
    $album_title_show_hover = (isset($_POST['album_title_show_hover']) ? esc_html(stripslashes($_POST['album_title_show_hover'])) : 'hover');
    $album_thumb_width = (isset($_POST['album_thumb_width']) ? esc_html(stripslashes($_POST['album_thumb_width'])) : 120);
    $album_thumb_height = (isset($_POST['album_thumb_height']) ? esc_html(stripslashes($_POST['album_thumb_height'])) : 90);
    $album_enable_page = (isset($_POST['album_enable_page']) ? esc_html(stripslashes($_POST['album_enable_page'])) : 1);
    $extended_album_height = (isset($_POST['extended_album_height']) ? esc_html(stripslashes($_POST['extended_album_height'])) : 150);
    $extended_album_description_enable = (isset($_POST['extended_album_description_enable']) ? esc_html(stripslashes($_POST['extended_album_description_enable'])) : 1);
    $image_browser_width = (isset($_POST['image_browser_width']) ? esc_html(stripslashes($_POST['image_browser_width'])) : 800);
    $image_browser_title_enable = (isset($_POST['image_browser_title_enable']) ? esc_html(stripslashes($_POST['image_browser_title_enable'])) : 1);
    $image_browser_description_enable = (isset($_POST['image_browser_description_enable']) ? esc_html(stripslashes($_POST['image_browser_description_enable'])) : 1);
    $blog_style_width = (isset($_POST['blog_style_width']) ? esc_html(stripslashes($_POST['blog_style_width'])) : 800);
    $blog_style_title_enable = (isset($_POST['blog_style_title_enable']) ? esc_html(stripslashes($_POST['blog_style_title_enable'])) : 1);
    $blog_style_images_per_page = (isset($_POST['blog_style_images_per_page']) ? esc_html(stripslashes($_POST['blog_style_images_per_page'])) : 5);
    $blog_style_enable_page = (isset($_POST['blog_style_enable_page']) ? esc_html(stripslashes($_POST['blog_style_enable_page'])) : 1);
    $slideshow_type = (isset($_POST['slideshow_type']) ? esc_html(stripslashes($_POST['slideshow_type'])) : 'fade');
    $slideshow_interval = (isset($_POST['slideshow_interval']) ? esc_html(stripslashes($_POST['slideshow_interval'])) : 5);
    $slideshow_width = (isset($_POST['slideshow_width']) ? esc_html(stripslashes($_POST['slideshow_width'])) : 800);
    $slideshow_height = (isset($_POST['slideshow_height']) ? esc_html(stripslashes($_POST['slideshow_height'])) : 600);
    $slideshow_enable_autoplay = (isset($_POST['slideshow_enable_autoplay']) ? esc_html(stripslashes($_POST['slideshow_enable_autoplay'])) : 1);
    $slideshow_enable_shuffle = (isset($_POST['slideshow_enable_shuffle']) ? esc_html(stripslashes($_POST['slideshow_enable_shuffle'])) : 1);
    $slideshow_enable_ctrl = (isset($_POST['slideshow_enable_ctrl']) ? esc_html(stripslashes($_POST['slideshow_enable_ctrl'])) : 1);
    $slideshow_enable_filmstrip = (isset($_POST['slideshow_enable_filmstrip']) ? esc_html(stripslashes($_POST['slideshow_enable_filmstrip'])) : 1);
    $slideshow_filmstrip_height = (isset($_POST['slideshow_filmstrip_height']) ? esc_html(stripslashes($_POST['slideshow_filmstrip_height'])) : 70);
    $slideshow_enable_title = (isset($_POST['slideshow_enable_title']) ? esc_html(stripslashes($_POST['slideshow_enable_title'])) : 0);
    $slideshow_title_position = (isset($_POST['slideshow_title_position']) ? esc_html(stripslashes($_POST['slideshow_title_position'])) : 'top-right');
    $slideshow_title_full_width = (isset($_POST['slideshow_title_full_width']) ? esc_html(stripslashes($_POST['slideshow_title_full_width'])) : 0);
    $slideshow_enable_description = (isset($_POST['slideshow_enable_description']) ? esc_html(stripslashes($_POST['slideshow_enable_description'])) : 1);
    $slideshow_description_position = (isset($_POST['slideshow_description_position']) ? esc_html(stripslashes($_POST['slideshow_description_position'])) : 'bottom-right');
    $slideshow_enable_music = (isset($_POST['slideshow_enable_music']) ? esc_html(stripslashes($_POST['slideshow_enable_music'])) : 0);
    $slideshow_audio_url = (isset($_POST['slideshow_audio_url']) ? esc_html(stripslashes($_POST['slideshow_audio_url'])) : '');
    $popup_width = (isset($_POST['popup_width']) ? esc_html(stripslashes($_POST['popup_width'])) : 800);
    $popup_height = (isset($_POST['popup_height']) ? esc_html(stripslashes($_POST['popup_height'])) : 600);
    $popup_type = (isset($_POST['popup_type']) ? esc_html(stripslashes($_POST['popup_type'])) : 'fade');
    $popup_interval = (isset($_POST['popup_interval']) ? esc_html(stripslashes($_POST['popup_interval'])) : 5);
    $popup_enable_filmstrip = (isset($_POST['popup_enable_filmstrip']) ? esc_html(stripslashes($_POST['popup_enable_filmstrip'])) : 1);
    $popup_filmstrip_height = (isset($_POST['popup_filmstrip_height']) ? esc_html(stripslashes($_POST['popup_filmstrip_height'])) : 50);
    $popup_enable_ctrl_btn = (isset($_POST['popup_enable_ctrl_btn']) ? esc_html(stripslashes($_POST['popup_enable_ctrl_btn'])) : 1);
    $popup_enable_fullscreen = (isset($_POST['popup_enable_fullscreen']) ? esc_html(stripslashes($_POST['popup_enable_fullscreen'])) : 1);
    $popup_enable_comment = (isset($_POST['popup_enable_comment']) ? esc_html(stripslashes($_POST['popup_enable_comment'])) : 1);
    $popup_enable_email = (isset($_POST['popup_enable_email']) ? esc_html(stripslashes($_POST['popup_enable_email'])) : 0);
    $popup_enable_captcha = (isset($_POST['popup_enable_captcha']) ? esc_html(stripslashes($_POST['popup_enable_captcha'])) : 0);
    $popup_enable_download = (isset($_POST['popup_enable_download']) ? esc_html(stripslashes($_POST['popup_enable_download'])) : 0);
    $popup_enable_fullsize_image = (isset($_POST['popup_enable_fullsize_image']) ? esc_html(stripslashes($_POST['popup_enable_fullsize_image'])) : 0);
    $popup_enable_facebook = (isset($_POST['popup_enable_facebook']) ? esc_html(stripslashes($_POST['popup_enable_facebook'])) : 1);
    $popup_enable_twitter = (isset($_POST['popup_enable_twitter']) ? esc_html(stripslashes($_POST['popup_enable_twitter'])) : 1);
    $popup_enable_google = (isset($_POST['popup_enable_google']) ? esc_html(stripslashes($_POST['popup_enable_google'])) : 1);
    $popup_enable_pinterest = (isset($_POST['popup_enable_pinterest']) ? esc_html(stripslashes($_POST['popup_enable_pinterest'])) : 0);
    $popup_enable_tumblr = (isset($_POST['popup_enable_tumblr']) ? esc_html(stripslashes($_POST['popup_enable_tumblr'])) : 0);
    $watermark_type = (isset($_POST['watermark_type']) ? esc_html(stripslashes($_POST['watermark_type'])) : 'none');
    $watermark_position = (isset($_POST['watermark_position']) ? esc_html(stripslashes($_POST['watermark_position'])) : 'bottom-right');
    $watermark_width = (isset($_POST['watermark_width']) ? esc_html(stripslashes($_POST['watermark_width'])) : 600);
    $watermark_height = (isset($_POST['watermark_height']) ? esc_html(stripslashes($_POST['watermark_height'])) : 600);
    $watermark_url = (isset($_POST['watermark_url']) ? esc_html(stripslashes($_POST['watermark_url'])) : WD_BWG_URL . '/images/watermark.png');
    $watermark_text = (isset($_POST['watermark_text']) ? esc_html(stripslashes($_POST['watermark_text'])) : 'web-dorado.com');
    $watermark_link = (isset($_POST['watermark_link']) ? esc_html(stripslashes($_POST['watermark_link'])) : 'http://www.web-dorado.com');
    $watermark_opacity = (isset($_POST['watermark_opacity']) ? esc_html(stripslashes($_POST['watermark_opacity'])) : 30);
    $watermark_font_size = (isset($_POST['watermark_font_size']) ? esc_html(stripslashes($_POST['watermark_font_size'])) : 20);
    $watermark_font = (isset($_POST['watermark_font']) ? esc_html(stripslashes($_POST['watermark_font'])) : '');
    $watermark_color = (isset($_POST['watermark_color']) ? esc_html(stripslashes($_POST['watermark_color'])) : '');    
    $built_in_watermark_type = (isset($_POST['built_in_watermark_type']) ? esc_html(stripslashes($_POST['built_in_watermark_type'])) : 'none');
    $built_in_watermark_position = (isset($_POST['built_in_watermark_position']) ? esc_html(stripslashes($_POST['built_in_watermark_position'])) : 'middle-center');
    $built_in_watermark_size = (isset($_POST['built_in_watermark_size']) ? esc_html(stripslashes($_POST['built_in_watermark_size'])) : 15);
    $built_in_watermark_url = (isset($_POST['built_in_watermark_url']) ? esc_html(stripslashes($_POST['built_in_watermark_url'])) : WD_BWG_URL . '/images/watermark.png');
    $built_in_watermark_text = (isset($_POST['built_in_watermark_text']) ? esc_html(stripslashes($_POST['built_in_watermark_text'])) : 'web-dorado.com');
    $built_in_watermark_opacity = (isset($_POST['built_in_watermark_opacity']) ? esc_html(stripslashes($_POST['built_in_watermark_opacity'])) : 30);
    $built_in_watermark_font_size = (isset($_POST['built_in_watermark_font_size']) ? esc_html(stripslashes($_POST['built_in_watermark_font_size'])) : 20);
    $built_in_watermark_font = (isset($_POST['built_in_watermark_font']) ? esc_html(stripslashes($_POST['built_in_watermark_font'])) : '');
    $built_in_watermark_color = (isset($_POST['built_in_watermark_color']) ? esc_html(stripslashes($_POST['built_in_watermark_color'])) : '');
    $gallery_role = (isset($_POST['gallery_role']) ? esc_html(stripslashes($_POST['gallery_role'])) : 0);
    $image_right_click = (isset($_POST['image_right_click']) ? esc_html(stripslashes($_POST['image_right_click'])) : 0);
    $popup_fullscreen = (isset($_POST['popup_fullscreen']) ? esc_html(stripslashes($_POST['popup_fullscreen'])) : 0);
    $album_role = (isset($_POST['album_role']) ? esc_html(stripslashes($_POST['album_role'])) : 0);
    $image_role = (isset($_POST['image_role']) ? esc_html(stripslashes($_POST['image_role'])) : 0);
    $popup_autoplay = (isset($_POST['popup_autoplay']) ? esc_html(stripslashes($_POST['popup_autoplay'])) : 0);
    $album_view_type = (isset($_POST['album_view_type']) ? esc_html(stripslashes($_POST['album_view_type'])) : 'thumbnail');
    $show_search_box = (isset($_POST['show_search_box']) ? esc_html(stripslashes($_POST['show_search_box'])) : 0);
    $search_box_width = (isset($_POST['search_box_width']) ? esc_html(stripslashes($_POST['search_box_width'])) : 180);
    $preload_images = (isset($_POST['preload_images']) ? esc_html(stripslashes($_POST['preload_images'])) : 1);
    $preload_images_count = (isset($_POST['preload_images_count']) ? esc_html(stripslashes($_POST['preload_images_count'])) : 10);
    $popup_enable_info = (isset($_POST['popup_enable_info']) ? esc_html(stripslashes($_POST['popup_enable_info'])) : 1);
    $popup_info_always_show = (isset($_POST['popup_info_always_show']) ? esc_html(stripslashes($_POST['popup_info_always_show'])) : 0);
    $popup_enable_rate = (isset($_POST['popup_enable_rate']) ? esc_html(stripslashes($_POST['popup_enable_rate'])) : 0);
    $thumb_click_action = (isset($_POST['thumb_click_action']) ? esc_html(stripslashes($_POST['thumb_click_action'])) : 'open_lightbox');
    $thumb_link_target = (isset($_POST['thumb_link_target']) ? esc_html(stripslashes($_POST['thumb_link_target'])) : 1);
    $comment_moderation = (isset($_POST['comment_moderation']) ? esc_html(stripslashes($_POST['comment_moderation'])) : 0);
    $popup_hit_counter = (isset($_POST['popup_hit_counter']) ? esc_html(stripslashes($_POST['popup_hit_counter'])) : 0);
    $enable_ML_import = (isset($_POST['enable_ML_import']) ? esc_html(stripslashes($_POST['enable_ML_import'])) : 0);
    $autoupdate_interval = (isset($_POST['autoupdate_interval_hour']) && isset($_POST['autoupdate_interval_min']) ? ((int) $_POST['autoupdate_interval_hour'] * 60 + (int) $_POST['autoupdate_interval_min']) : 30);
    /*minimum autoupdate interval is 1 min*/
    $autoupdate_interval = ($autoupdate_interval >= 1 ? $autoupdate_interval : 1 );
    $instagram_access_token = (isset($_POST['instagram_access_token']) ? esc_html(stripslashes($_POST['instagram_access_token'])) : '');
    $showthumbs_name = (isset($_POST['thumb_name']) ? esc_html(stripslashes($_POST['thumb_name'])) : 1);
    $show_album_name = (isset($_POST['show_album_name_enable']) ? esc_html(stripslashes($_POST['show_album_name_enable'])) : 1);
    $show_image_counts = (isset($_POST['show_image_counts']) ? esc_html(stripslashes($_POST['show_image_counts'])) : 0);
    $play_icon = (isset($_POST['play_icon']) ? esc_html(stripslashes($_POST['play_icon'])) : 1);
    $show_masonry_thumb_description = (isset($_POST['show_masonry_thumb_description']) ? esc_html(stripslashes($_POST['show_masonry_thumb_description'])) : 0);
    $popup_info_full_width = (isset($_POST['popup_info_full_width']) ? esc_html(stripslashes($_POST['popup_info_full_width'])) : 0);
		$show_sort_images = (isset($_POST['show_sort_images']) ? esc_html(stripslashes($_POST['show_sort_images'])) : 0);
		$enable_seo = (isset($_POST['enable_seo']) ? esc_html(stripslashes($_POST['enable_seo'])) : 1);
    $autohide_lightbox_navigation = (isset($_POST['autohide_lightbox_navigation']) ? esc_html(stripslashes($_POST['autohide_lightbox_navigation'])) : 1);
    $autohide_slideshow_navigation = (isset($_POST['autohide_slideshow_navigation']) ? esc_html(stripslashes($_POST['autohide_slideshow_navigation'])) : 1);
    $read_metadata = (isset($_POST['read_metadata']) ? esc_html(stripslashes($_POST['read_metadata'])) : 0);
    $enable_loop = (isset($_POST['enable_loop']) ? esc_html(stripslashes($_POST['enable_loop'])) : 1);
    $enable_addthis = (isset($_POST['enable_addthis']) ? esc_html(stripslashes($_POST['enable_addthis'])) : 0);
    $addthis_profile_id = (isset($_POST['addthis_profile_id']) ? esc_html(stripslashes($_POST['addthis_profile_id'])) : '');

    $carousel_interval = (isset($_POST['carousel_interval']) ? esc_html(stripslashes($_POST['carousel_interval'])) : 5);
    $carousel_width = (isset($_POST['carousel_width']) ? esc_html(stripslashes($_POST['carousel_width'])) : 300);
    $carousel_height = (isset($_POST['carousel_height']) ? esc_html(stripslashes($_POST['carousel_height'])) : 300);      
    $carousel_image_par = (isset($_POST['carousel_image_par']) ? esc_html(stripslashes($_POST['carousel_image_par'])) : 0.75);
	  $carousel_image_column_number = (isset($_POST['carousel_image_column_number']) ? esc_html(stripslashes($_POST['carousel_image_column_number'])) : 5);
    $carousel_enable_title = (isset($_POST['carousel_enable_title']) ? esc_html(stripslashes($_POST['carousel_enable_title'])) : 0);  
   	$carousel_enable_autoplay = (isset($_POST['carousel_enable_autoplay']) ? esc_html(stripslashes($_POST['carousel_enable_autoplay'])) : 0);
    $carousel_r_width = (isset($_POST['carousel_r_width']) ? esc_html(stripslashes($_POST['carousel_r_width'])) : 800);
    $carousel_fit_containerWidth = (isset($_POST['carousel_fit_containerWidth']) ? esc_html(stripslashes($_POST['carousel_fit_containerWidth'])) : 1);
    $carousel_prev_next_butt = (isset($_POST['carousel_prev_next_butt']) ? esc_html(stripslashes($_POST['carousel_prev_next_butt'])) : 1);
    $carousel_play_pause_butt = (isset($_POST['carousel_play_pause_butt']) ? esc_html(stripslashes($_POST['carousel_play_pause_butt'])) : 1);
    $bwg_permissions = (isset($_POST['permissions']) ? esc_html(stripslashes($_POST['permissions'])) : 'manage_options');
    $facebook_app_id = (isset($_POST['facebook_app_id']) ? esc_html(stripslashes($_POST['facebook_app_id'])) : '');
    $facebook_app_secret = (isset($_POST['facebook_app_secret']) ? esc_html(stripslashes($_POST['facebook_app_secret'])) : '');
    $show_tag_box = (isset($_POST['show_tag_box']) ? esc_html(stripslashes($_POST['show_tag_box'])) : 0);
    $show_hide_custom_post = (isset($_POST['show_hide_custom_post']) ? esc_html(stripslashes($_POST['show_hide_custom_post'])) : 0);
    $show_hide_post_meta = (isset($_POST['show_hide_post_meta']) ? esc_html(stripslashes($_POST['show_hide_post_meta'])) : 0);
    $placeholder = (isset($_POST['placeholder']) ? esc_html(stripslashes($_POST['placeholder'])) : '');
    $slideshow_effect_duration = (isset($_POST['slideshow_effect_duration']) ? esc_html(stripslashes($_POST['slideshow_effect_duration'])) : 1);
    $popup_effect_duration = (isset($_POST['popup_effect_duration']) ? esc_html(stripslashes($_POST['popup_effect_duration'])) : 1);

    $save = $wpdb->update($wpdb->prefix . 'bwg_option', array(
      'images_directory' => $images_directory,
      'masonry' => $masonry,
      'mosaic' => $mosaic,
      'resizable_mosaic' => $resizable_mosaic,
      'mosaic_total_width'=> $mosaic_total_width,
      'image_column_number' => $image_column_number,
      'images_per_page' => $images_per_page,
      'thumb_width' => $thumb_width,
      'thumb_height' => $thumb_height,
      'upload_thumb_width' => $upload_thumb_width,
      'upload_thumb_height' => $upload_thumb_height,
      'upload_img_width' => $upload_img_width, 
      'upload_img_height' => $upload_img_height,
      'image_enable_page' => $image_enable_page,
      'image_title_show_hover' => $image_title_show_hover,
      'album_column_number' => $album_column_number,
      'albums_per_page' => $albums_per_page,
      'album_title_show_hover' => $album_title_show_hover,
      'album_thumb_width' => $album_thumb_width,
      'album_thumb_height' => $album_thumb_height,
      'album_enable_page' => $album_enable_page,
      'extended_album_height' => $extended_album_height,
      'extended_album_description_enable' => $extended_album_description_enable,
      'image_browser_width' => $image_browser_width,
      'image_browser_title_enable' => $image_browser_title_enable,
      'image_browser_description_enable' => $image_browser_description_enable,
      'blog_style_width' => $blog_style_width,
      'blog_style_title_enable' => $blog_style_title_enable,
      'blog_style_images_per_page' => $blog_style_images_per_page,
      'blog_style_enable_page' => $blog_style_enable_page,
      'slideshow_type' => $slideshow_type,
      'slideshow_interval' => $slideshow_interval,
      'slideshow_width' => $slideshow_width,
      'slideshow_height' => $slideshow_height,
      'slideshow_enable_autoplay' => $slideshow_enable_autoplay,
      'slideshow_enable_shuffle' => $slideshow_enable_shuffle,
      'slideshow_enable_ctrl' => $slideshow_enable_ctrl,
      'slideshow_enable_filmstrip' => $slideshow_enable_filmstrip,
      'slideshow_filmstrip_height' => $slideshow_filmstrip_height,
      'slideshow_enable_title' => $slideshow_enable_title,
      'slideshow_title_position' => $slideshow_title_position,
      'slideshow_title_full_width' => $slideshow_title_full_width,
      'slideshow_enable_description' => $slideshow_enable_description,
      'slideshow_description_position' => $slideshow_description_position,
      'slideshow_enable_music' => $slideshow_enable_music,
      'slideshow_audio_url' => $slideshow_audio_url,
      'popup_width' => $popup_width,
      'popup_height' => $popup_height,
      'popup_type' => $popup_type,
      'popup_interval' => $popup_interval,
      'popup_enable_filmstrip' => $popup_enable_filmstrip,
      'popup_filmstrip_height' => $popup_filmstrip_height,
      'popup_enable_ctrl_btn' => $popup_enable_ctrl_btn,
      'popup_enable_fullscreen' => $popup_enable_fullscreen,
      'popup_enable_comment' => $popup_enable_comment,
      'popup_enable_email' => $popup_enable_email,
      'popup_enable_captcha' => $popup_enable_captcha,
      'popup_enable_download' => $popup_enable_download,
      'popup_enable_fullsize_image' => $popup_enable_fullsize_image,
      'popup_enable_facebook' => $popup_enable_facebook,
      'popup_enable_twitter' => $popup_enable_twitter,
      'popup_enable_google' => $popup_enable_google,
      'popup_enable_pinterest' => $popup_enable_pinterest,
      'popup_enable_tumblr' => $popup_enable_tumblr,
      'watermark_type' => $watermark_type,
      'watermark_position' => $watermark_position,
      'watermark_width' => $watermark_width,
      'watermark_height' => $watermark_height,
      'watermark_url' => $watermark_url,
      'watermark_text' => $watermark_text,
      'watermark_link' => $watermark_link,
      'watermark_font_size' => $watermark_font_size,
      'watermark_font' => $watermark_font,
      'watermark_color' => $watermark_color,
      'watermark_opacity' => $watermark_opacity,    
      'built_in_watermark_type' => $built_in_watermark_type,
      'built_in_watermark_position' => $built_in_watermark_position,
      'built_in_watermark_size' => $built_in_watermark_size,
      'built_in_watermark_url' => $built_in_watermark_url,
      'built_in_watermark_text' => $built_in_watermark_text,
      'built_in_watermark_font_size' => $built_in_watermark_font_size,
      'built_in_watermark_font' => $built_in_watermark_font,
      'built_in_watermark_color' => $built_in_watermark_color,
      'built_in_watermark_opacity' => $built_in_watermark_opacity,          
      'gallery_role' => $gallery_role,
      'image_right_click' => $image_right_click,
      'popup_fullscreen' => $popup_fullscreen,
      'album_role' => $album_role,
      'image_role' => $image_role,
      'popup_autoplay' => $popup_autoplay,
      'album_view_type' => $album_view_type,
      'show_search_box' => $show_search_box,
      'search_box_width' => $search_box_width,
      'preload_images' => $preload_images,
      'preload_images_count' => $preload_images_count,
      'popup_enable_info' => $popup_enable_info,
      'popup_info_always_show' => $popup_info_always_show,
      'popup_enable_rate' => $popup_enable_rate,
      'thumb_click_action' => $thumb_click_action,
      'thumb_link_target' => $thumb_link_target,
      'comment_moderation' => $comment_moderation,
      'popup_hit_counter' => $popup_hit_counter,
      'enable_ML_import' => $enable_ML_import,
      'autoupdate_interval' => $autoupdate_interval,
      'instagram_access_token' => $instagram_access_token,
      'showthumbs_name' => $showthumbs_name,
      'show_album_name' => $show_album_name,
      'show_image_counts' => $show_image_counts,
      'play_icon' => $play_icon,
      'show_masonry_thumb_description' => $show_masonry_thumb_description,
      'popup_info_full_width' => $popup_info_full_width,
      'show_sort_images' => $show_sort_images,
      'enable_seo' => $enable_seo,
      'autohide_lightbox_navigation' => $autohide_lightbox_navigation,
      'autohide_slideshow_navigation' => $autohide_slideshow_navigation,
      'read_metadata' => $read_metadata,
      'enable_loop' => $enable_loop,
      'enable_addthis' => $enable_addthis,
      'addthis_profile_id' => $addthis_profile_id,

      'carousel_interval' => $carousel_interval,
      'carousel_width' => $carousel_width,
      'carousel_height' => $carousel_height,
	    'carousel_image_column_number' => $carousel_image_column_number,
      'carousel_image_par' => $carousel_image_par,
      'carousel_enable_title' => $carousel_enable_title,
	    'carousel_enable_autoplay' => $carousel_enable_autoplay,
      'carousel_r_width' => $carousel_r_width,
      'carousel_fit_containerWidth' => $carousel_fit_containerWidth,
      'carousel_prev_next_butt' => $carousel_prev_next_butt,
      'carousel_play_pause_butt' => $carousel_play_pause_butt,
      'permissions' => $bwg_permissions,
      'facebook_app_id' => $facebook_app_id,
      'facebook_app_secret' => $facebook_app_secret,
      'show_tag_box' => $show_tag_box,
      'show_hide_custom_post' => $show_hide_custom_post,
      'show_hide_post_meta' => $show_hide_post_meta,
      'placeholder' => $placeholder,
      'slideshow_effect_duration' => $slideshow_effect_duration,
      'popup_effect_duration' => $popup_effect_duration,
    ), array('id' => 1));      
    if (isset($_POST['watermark']) && $_POST['watermark'] == "image_set_watermark") {
      $this->image_set_watermark();
    }

    if ($save !== FALSE) {
      if ($old_images_directory && $old_images_directory != $images_directory) {
        rename(ABSPATH . $old_images_directory . '/photo-gallery', ABSPATH . $images_directory . '/photo-gallery');
      }
      if (!is_dir(ABSPATH . $images_directory . '/photo-gallery')) {
        mkdir(ABSPATH . $images_directory . '/photo-gallery', 0777);
      }
      if (isset($_POST['recreate']) && $_POST['recreate'] == "resize_image_thumb") {
        $this->resize_image_thumb();
        echo WDWLibrary::message(__('All thumbnails are successfully recreated.', 'bwg_back'), 'updated');
      }
      else {
        echo WDWLibrary::message(__('Item Succesfully Saved.', 'bwg_back'), 'updated');
      }
    }
    else {
      echo WDWLibrary::message('Error. Please install plugin again.', 'error');
    }
  }
  
  function bwg_hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    if (strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    }
    else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    return $rgb;
  }
  
  function bwg_imagettfbboxdimensions($font_size, $font_angle, $font, $text) {
    $box = @ImageTTFBBox($font_size, $font_angle, $font, $text) or die;
    $max_x = max(array($box[0], $box[2], $box[4], $box[6]));
    $max_y = max(array($box[1], $box[3], $box[5], $box[7]));
    $min_x = min(array($box[0], $box[2], $box[4], $box[6]));
    $min_y = min(array($box[1], $box[3], $box[5], $box[7]));
    return array(
      "width"  => ($max_x - $min_x),
      "height" => ($max_y - $min_y)
    );
  }

  public function image_set_watermark() {
    global $wpdb;
    global $WD_BWG_UPLOAD_DIR;
    $options = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id=1');
    $images = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'bwg_image');
    switch ($options->built_in_watermark_type) {
      case 'text':
        foreach ($images as $image) {
            $this->set_text_watermark(ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, $options->built_in_watermark_text, $options->built_in_watermark_font, $options->built_in_watermark_font_size, '#' . $options->built_in_watermark_color, $options->built_in_watermark_opacity, $options->built_in_watermark_position);
        }
        break;
      case 'image':
        $watermark_path = str_replace(site_url() . '/', ABSPATH, $options->built_in_watermark_url);
        foreach ($images as $image) {
          $this->set_image_watermark(ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, $watermark_path, $options->built_in_watermark_size, $options->built_in_watermark_size, $options->built_in_watermark_position);
        }
        break;
    }
  }

  function set_text_watermark($original_filename, $dest_filename, $watermark_text, $watermark_font, $watermark_font_size, $watermark_color, $watermark_transparency, $watermark_position) {
    if (!file_exists($original_filename)) {
      return;
    }
    $original_filename = htmlspecialchars_decode($original_filename, ENT_COMPAT | ENT_QUOTES);
    $dest_filename = htmlspecialchars_decode($dest_filename, ENT_COMPAT | ENT_QUOTES);

    $watermark_transparency = 127 - ($watermark_transparency * 1.27);
    list($width, $height, $type) = getimagesize($original_filename);
    $watermark_image = imagecreatetruecolor($width, $height);
    $watermark_color = $this->bwg_hex2rgb($watermark_color);
    $watermark_color = imagecolorallocatealpha($watermark_image, $watermark_color[0], $watermark_color[1], $watermark_color[2], $watermark_transparency);
    $watermark_font = WD_BWG_DIR . '/fonts/' . $watermark_font;
    $watermark_font_size = $height * $watermark_font_size / 500;
    $watermark_position = explode('-', $watermark_position);
    $watermark_sizes = $this->bwg_imagettfbboxdimensions($watermark_font_size, 0, $watermark_font, $watermark_text);

    $top = $height - 5;
    $left = $width - $watermark_sizes['width'] - 5;
    switch ($watermark_position[0]) {
      case 'top':
        $top = $watermark_sizes['height'] + 5;
        break;
      case 'middle':
        $top = ($height + $watermark_sizes['height']) / 2;
        break;
    }
    switch ($watermark_position[1]) {
      case 'left':
        $left = 5;
        break;
      case 'center':
        $left = ($width - $watermark_sizes['width']) / 2;
        break;
    }
    @ini_set('memory_limit', '-1');
    if ($type == 2) {
      $image = imagecreatefromjpeg($original_filename);
      imagettftext($image, $watermark_font_size, 0, $left, $top, $watermark_color, $watermark_font, $watermark_text);
      imagejpeg ($image, $dest_filename, 100);
      imagedestroy($image);  
    }
    elseif ($type == 3) {
      $image = imagecreatefrompng($original_filename);
      imagettftext($image, $watermark_font_size, 0, $left, $top, $watermark_color, $watermark_font, $watermark_text);
      imageColorAllocateAlpha($image, 0, 0, 0, 127);
      imagealphablending($image, FALSE);
      imagesavealpha($image, TRUE);
      imagepng($image, $dest_filename, 9);
      imagedestroy($image);
    }
    elseif ($type == 1) {
      $image = imagecreatefromgif($original_filename);
      imageColorAllocateAlpha($watermark_image, 0, 0, 0, 127);
      imagecopy($watermark_image, $image, 0, 0, 0, 0, $width, $height);
      imagettftext($watermark_image, $watermark_font_size, 0, $left, $top, $watermark_color, $watermark_font, $watermark_text);
      imagealphablending($watermark_image, FALSE);
      imagesavealpha($watermark_image, TRUE);
      imagegif($watermark_image, $dest_filename);
      imagedestroy($image);
    }
    imagedestroy($watermark_image);
    @ini_restore('memory_limit');
  }

  function set_image_watermark($original_filename, $dest_filename, $watermark_url, $watermark_height, $watermark_width, $watermark_position) {
    if (!file_exists($original_filename)) {
      return;
    }
    $original_filename = htmlspecialchars_decode($original_filename, ENT_COMPAT | ENT_QUOTES);
    $dest_filename = htmlspecialchars_decode($dest_filename, ENT_COMPAT | ENT_QUOTES);
    $watermark_url = htmlspecialchars_decode($watermark_url, ENT_COMPAT | ENT_QUOTES);
  
    list($width, $height, $type) = getimagesize($original_filename);
    list($width_watermark, $height_watermark, $type_watermark) = getimagesize($watermark_url);
    $watermark_width = $width * $watermark_width / 100;
    $watermark_height = $height_watermark * $watermark_width / $width_watermark;
     
    $watermark_position = explode('-', $watermark_position);
    $top = $height - $watermark_height - 5;
    $left = $width - $watermark_width - 5;
    switch ($watermark_position[0]) {
      case 'top':
        $top = 5;
        break;
      case 'middle':
        $top = ($height - $watermark_height) / 2;
        break;
    }
    switch ($watermark_position[1]) {
      case 'left':
        $left = 5;
        break;
      case 'center':
        $left = ($width - $watermark_width) / 2;
        break;
    }
    @ini_set('memory_limit', '-1');
    if ($type_watermark == 2) {
      $watermark_image = imagecreatefromjpeg($watermark_url);        
    }
    elseif ($type_watermark == 3) {
      $watermark_image = imagecreatefrompng($watermark_url);
    }
    elseif ($type_watermark == 1) {
      $watermark_image = imagecreatefromgif($watermark_url);      
    }
    else {
      return false;
    }
    
    $watermark_image_resized = imagecreatetruecolor($watermark_width, $watermark_height);
    imagecolorallocatealpha($watermark_image_resized, 255, 255, 255, 127);
    imagealphablending($watermark_image_resized, FALSE);
    imagesavealpha($watermark_image_resized, TRUE);
    imagecopyresampled ($watermark_image_resized, $watermark_image, 0, 0, 0, 0, $watermark_width, $watermark_height, $width_watermark, $height_watermark);
        
    if ($type == 2) {
      $image = imagecreatefromjpeg($original_filename);
      imagecopy($image, $watermark_image_resized, $left, $top, 0, 0, $watermark_width, $watermark_height);
      if ($dest_filename <> '') {
        imagejpeg ($image, $dest_filename, 100); 
      } else {
        header('Content-Type: image/jpeg');
        imagejpeg($image, null, 100);
      };
      imagedestroy($image);  
    }
    elseif ($type == 3) {
      $image = imagecreatefrompng($original_filename);
      imagecopy($image, $watermark_image_resized, $left, $top, 0, 0, $watermark_width, $watermark_height);
      imagealphablending($image, FALSE);
      imagesavealpha($image, TRUE);
      imagepng($image, $dest_filename, 9);
      imagedestroy($image);
    }
    elseif ($type == 1) {
      $image = imagecreatefromgif($original_filename);
      $tempimage = imagecreatetruecolor($width, $height);
      imagecopy($tempimage, $image, 0, 0, 0, 0, $width, $height);
      imagecopy($tempimage, $watermark_image_resized, $left, $top, 0, 0, $watermark_width, $watermark_height);
      imagegif($tempimage, $dest_filename);
      imagedestroy($image);
      imagedestroy($tempimage);
    }
    imagedestroy($watermark_image);
    @ini_restore('memory_limit');
  }
  
  
  public function image_recover_all() {
    global $wpdb;
    $options = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id=1');
    $thumb_width = $options->upload_thumb_width;
    $thumb_height = $options->upload_thumb_height;    
    $image_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_image');
    foreach ($image_ids_col as $image_id) {
        $this->recover_image($image_id, $thumb_width, $thumb_height);
    }
    $this->display();
  }
  
  public function recover_image($id, $thumb_width, $thumb_height) {
    global $WD_BWG_UPLOAD_DIR;
    global $wpdb;
    $image_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_image WHERE id="%d"', $id));
    $filename = htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $image_data->image_url, ENT_COMPAT | ENT_QUOTES);
    $thumb_filename = htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $image_data->thumb_url, ENT_COMPAT | ENT_QUOTES);
   
    if (file_exists($filename) && file_exists($thumb_filename)) {
      copy(str_replace('/thumb/', '/.original/', $thumb_filename), $filename);
      list($width_orig, $height_orig, $type_orig) = getimagesize($filename);
      $percent = $width_orig / $thumb_width;
      $thumb_height = $height_orig / $percent;
      @ini_set('memory_limit', '-1');
      if ($type_orig == 2) {
        $img_r = imagecreatefromjpeg($filename);
        $dst_r = ImageCreateTrueColor($thumb_width, $thumb_height);
        imagecopyresampled($dst_r, $img_r, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
        imagejpeg($dst_r, $thumb_filename, 100);
        imagedestroy($img_r);
        imagedestroy($dst_r);
      }
      elseif ($type_orig == 3) {
        $img_r = imagecreatefrompng($filename);
        $dst_r = ImageCreateTrueColor($thumb_width, $thumb_height);
        imageColorAllocateAlpha($dst_r, 0, 0, 0, 127);
        imagealphablending($dst_r, FALSE);
        imagesavealpha($dst_r, TRUE);
        imagecopyresampled($dst_r, $img_r, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
        imagealphablending($dst_r, FALSE);
        imagesavealpha($dst_r, TRUE);
        imagepng($dst_r, $thumb_filename, 9);
        imagedestroy($img_r);
        imagedestroy($dst_r);
      }
      elseif ($type_orig == 1) {
        $img_r = imagecreatefromgif($filename);
        $dst_r = ImageCreateTrueColor($thumb_width, $thumb_height);
        imageColorAllocateAlpha($dst_r, 0, 0, 0, 127);
        imagealphablending($dst_r, FALSE);
        imagesavealpha($dst_r, TRUE);
        imagecopyresampled($dst_r, $img_r, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
        imagealphablending($dst_r, FALSE);
        imagesavealpha($dst_r, TRUE);
        imagegif($dst_r, $thumb_filename);
        imagedestroy($img_r);
        imagedestroy($dst_r);
      }
      @ini_restore('memory_limit');
    }
  }

   public function resize_image_thumb() {
    global $WD_BWG_UPLOAD_DIR;
    global $wpdb;
    $img_ids = $wpdb->get_results('SELECT id, thumb_url FROM ' . $wpdb->prefix . 'bwg_image');
    $options = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_option');
    foreach ($img_ids as $img_id) {
        $file_path = str_replace("thumb", ".original", htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $img_id->thumb_url, ENT_COMPAT | ENT_QUOTES));
	      $new_file_path = htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $img_id->thumb_url, ENT_COMPAT | ENT_QUOTES);
        list($img_width, $img_height, $type) = @getimagesize(htmlspecialchars_decode($file_path, ENT_COMPAT | ENT_QUOTES));
        if (!$img_width || !$img_height) {
          continue;
        }
        $max_width = $options->upload_thumb_width;
        $max_height = $options->upload_thumb_height;
        $scale = min(
          $max_width / $img_width,
          $max_height / $img_height
        );
        @ini_set('memory_limit', '-1');
        if (!function_exists('imagecreatetruecolor')) {
          error_log('Function not found: imagecreatetruecolor');
          return FALSE;
        }
        $new_width = $img_width * $scale;
        $new_height = $img_height * $scale;
        $dst_x = 0;
        $dst_y = 0;
        $new_img = @imagecreatetruecolor($new_width, $new_height);
        switch ($type) {
          case 2:
            $src_img = @imagecreatefromjpeg($file_path);
            $write_image = 'imagejpeg';
            $image_quality = isset($options->jpeg_quality) ? $options->jpeg_quality : 75;
            break;
          case 1:
            @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
            $src_img = @imagecreatefromgif($file_path);
            $write_image = 'imagegif';
            $image_quality = null;
            break;
          case 3:
            @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
            @imagealphablending($new_img, false);
            @imagesavealpha($new_img, true);
            $src_img = @imagecreatefrompng($file_path);
            $write_image = 'imagepng';
            $image_quality = isset($options->png_quality) ? $options->png_quality : 9;
            break;
          default:
            $src_img = null;
            break;
        }
        $success = $src_img && @imagecopyresampled(
          $new_img,
          $src_img,
          $dst_x,
          $dst_y,
          0,
          0,
          $new_width,
          $new_height,
          $img_width,
          $img_height
        ) && $write_image($new_img, $new_file_path, $image_quality);
        // Free up memory (imagedestroy does not delete files):
        @imagedestroy($src_img);
        @imagedestroy($new_img);
        @ini_restore('memory_limit');
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