<?php

/**
 * Plugin Name: Photo Gallery
 * Plugin URI: https://web-dorado.com/products/wordpress-photo-gallery-plugin.html
 * Description: This plugin is a fully responsive gallery plugin with advanced functionality.  It allows having different image galleries for your posts and pages. You can create unlimited number of galleries, combine them into albums, and provide descriptions and tags.
 * Version: 1.2.107
 * Author: WebDorado
 * Author URI: https://web-dorado.com/
 * License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

define('WD_BWG_DIR', WP_PLUGIN_DIR . "/" . plugin_basename(dirname(__FILE__)));
define('WD_BWG_URL', plugins_url(plugin_basename(dirname(__FILE__))));
define('WD_BWG_NAME', plugin_basename(dirname(__FILE__)));
define('WD_BWG_PRO', false);
define('WD_BWG_VERSION', get_option('wd_bwg_version'));

function bwg_use_home_url() {
  $home_url = str_replace("http://", "", home_url());
  $home_url = str_replace("https://", "", $home_url);
  $pos = strpos($home_url, "/");
  if ($pos) {
    $home_url = substr($home_url, 0, $pos);
  }
  
  $site_url = str_replace("http://", "", WD_BWG_URL);
  $site_url = str_replace("https://", "", $site_url);
  $pos = strpos($site_url, "/");
  if ($pos) {
    $site_url = substr($site_url, 0, $pos);
  }
  return $site_url != $home_url;
}

if (bwg_use_home_url()) {
  define('WD_BWG_FRONT_URL', home_url("wp-content/plugins/" . plugin_basename(dirname(__FILE__))));
}
else {
  define('WD_BWG_FRONT_URL', WD_BWG_URL);
}

global $wpdb;
if ($wpdb->query("SHOW TABLES LIKE '" . $wpdb->prefix . "bwg_option'")) {
  $WD_BWG_UPLOAD_DIR = $wpdb->get_var($wpdb->prepare('SELECT images_directory FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1)) . '/photo-gallery';
}
else {
  $upload_dir = wp_upload_dir();
  $WD_BWG_UPLOAD_DIR = str_replace(ABSPATH, '', $upload_dir['basedir']) . '/photo-gallery';
}

// Plugin menu.
function bwg_options_panel() {
  $galleries_page = add_menu_page('Photo Gallery', 'Photo Gallery', 'manage_options', 'galleries_bwg', 'bwg_gallery', WD_BWG_URL . '/images/best-wordpress-gallery.png');

  $galleries_page = add_submenu_page('galleries_bwg', __('Add Galleries/Images', 'bwg_back'), __('Add Galleries/Images', 'bwg_back'), 'manage_options', 'galleries_bwg', 'bwg_gallery');
  add_action('admin_print_styles-' . $galleries_page, 'bwg_styles');
  add_action('admin_print_scripts-' . $galleries_page, 'bwg_scripts');
  add_action('load-' . $galleries_page, 'bwg_add_galleries_per_page_option');

  $albums_page = add_submenu_page('galleries_bwg', __('Albums', 'bwg_back'), __('Albums', 'bwg_back'), 'manage_options', 'albums_bwg', 'bwg_gallery');
  add_action('admin_print_styles-' . $albums_page, 'bwg_styles');
  add_action('admin_print_scripts-' . $albums_page, 'bwg_scripts');
  add_action('load-' . $albums_page, 'bwg_add_albums_per_page_option');

  $tags_page = add_submenu_page('galleries_bwg', __('Tags', 'bwg_back'), __('Tags', 'bwg_back'), 'manage_options', 'tags_bwg', 'bwg_gallery');
  add_action('admin_print_styles-' . $tags_page, 'bwg_styles');
  add_action('admin_print_scripts-' . $tags_page, 'bwg_scripts');
  add_action('load-' . $tags_page, 'bwg_add_tags_per_page_option');

  $options_page = add_submenu_page('galleries_bwg', __('Options', 'bwg_back'), __('Options', 'bwg_back'), 'manage_options', 'options_bwg', 'bwg_gallery');
  add_action('admin_print_styles-' . $options_page, 'bwg_styles');
  add_action('admin_print_scripts-' . $options_page, 'bwg_options_scripts');

  $themes_page = add_submenu_page('galleries_bwg', __('Themes', 'bwg_back'), __('Themes', 'bwg_back'), 'manage_options', 'themes_bwg', 'bwg_gallery');
  add_action('admin_print_styles-' . $themes_page, 'bwg_styles');
  add_action('admin_print_scripts-' . $themes_page, 'bwg_options_scripts');
  add_action('load-' . $themes_page, 'bwg_add_themes_per_page_option');

  add_submenu_page('galleries_bwg', __('Generate Shortcode', 'bwg_back'), __('Generate Shortcode', 'bwg_back'), 'manage_options', 'BWGShortcode', 'bwg_gallery');
  
  $licensing_plugins_page = add_submenu_page('galleries_bwg', __('Get Pro', 'bwg_back'), __('Get Pro', 'bwg_back'), 'manage_options', 'licensing_bwg', 'bwg_gallery');
  add_action('admin_print_styles-' . $licensing_plugins_page, 'bwg_licensing_styles');

  add_submenu_page('galleries_bwg', __('Featured Plugins', 'bwg_back'), __('Featured Plugins', 'bwg_back'), 'manage_options', 'featured_plugins_bwg', 'bwg_featured');
  add_submenu_page('galleries_bwg', __('Featured Themes', 'bwg_back'), __('Featured Themes', 'bwg_back'), 'manage_options', 'featured_themes_bwg', 'bwg_featured_themes'); 

  $uninstall_page = add_submenu_page('galleries_bwg', __('Uninstall', 'bwg_back'), __('Uninstall', 'bwg_back'), 'manage_options', 'uninstall_bwg', 'bwg_gallery');
  add_action('admin_print_styles-' . $uninstall_page, 'bwg_styles');
  add_action('admin_print_scripts-' . $uninstall_page, 'bwg_options_scripts');

  add_menu_page('Photo Gallery Add-ons', 'Photo Gallery Add-ons', 'manage_options', 'addons_bwg', 'bwg_addons', WD_BWG_URL . '/addons/images/add-ons-icon.png');
}
add_action('admin_menu', 'bwg_options_panel');

function bwg_gallery() {
  global $wpdb;
  require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
  $page = WDWLibrary::get('page');
  if (($page != '') && (($page == 'galleries_bwg') || ($page == 'albums_bwg') || ($page == 'tags_bwg') || ($page == 'options_bwg') || ($page == 'themes_bwg') || ($page == 'licensing_bwg') || ($page == 'uninstall_bwg') || ($page == 'BWGShortcode'))) {
    require_once(WD_BWG_DIR . '/admin/controllers/BWGController' . (($page == 'BWGShortcode') ? $page : ucfirst(strtolower($page))) . '.php');
    $controller_class = 'BWGController' . ucfirst(strtolower($page));
    $controller = new $controller_class();
    $controller->execute();
  }
}

function bwg_featured() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  require_once(WD_BWG_DIR . '/featured/featured.php');
  wp_register_style('bwg_featured', WD_BWG_URL . '/featured/style.css', array(), wd_bwg_version());
  wp_print_styles('bwg_featured');
  spider_featured('photo-gallery');
}

function bwg_featured_themes() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  require_once(WD_BWG_DIR . '/featured/featured_themes.php');
  wp_register_style('bwg_featured_themes', WD_BWG_URL . '/featured/themes_style.css', array(), wd_bwg_version());
  wp_print_styles('bwg_featured_themes');
  spider_featured_themes('photo-gallery');
}

function bwg_addons() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  require_once(WD_BWG_DIR . '/addons/addons.php');
  wp_register_style('bwg_addons', WD_BWG_URL . '/addons/style.css', array(), wd_bwg_version());
  wp_print_styles('bwg_addons');
  bwg_addons_display();
}

function bwg_ajax_frontend() {
  require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
  $page = WDWLibrary::get('action');
  if (($page != '') && ($page == 'GalleryBox')) {
    require_once(WD_BWG_DIR . '/frontend/controllers/BWGController' . ucfirst($page) . '.php');
    $controller_class = 'BWGController' . ucfirst($page);
    $controller = new $controller_class();
    $controller->execute();
  }
}

add_action('wp_ajax_bwg_UploadHandler', 'bwg_UploadHandler');
add_action('wp_ajax_addAlbumsGalleries', 'bwg_ajax');
add_action('wp_ajax_addImages', 'bwg_filemanager_ajax');
add_action('wp_ajax_addMusic', 'bwg_filemanager_ajax');
add_action('wp_ajax_addEmbed', 'bwg_add_embed_ajax');
add_action('wp_ajax_editThumb', 'bwg_ajax');
add_action('wp_ajax_addTags', 'bwg_ajax');
add_action('wp_ajax_bwg_edit_tag', 'bwg_edit_tag');
add_action('wp_ajax_GalleryBox', 'bwg_ajax_frontend');
add_action('wp_ajax_bwg_captcha', 'bwg_captcha');

add_action('wp_ajax_nopriv_GalleryBox', 'bwg_ajax_frontend');
add_action('wp_ajax_nopriv_bwg_captcha', 'bwg_captcha');

// Upload.
function bwg_UploadHandler() {
  require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
  if(!WDWLibrary::verify_nonce('bwg_UploadHandler')){
      die('Sorry, your nonce did not verify.');
  }
  require_once(WD_BWG_DIR . '/filemanager/UploadHandler.php');
}

function bwg_filemanager_ajax() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  global $wpdb;
  require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
  $page = WDWLibrary::get('action');
  if (($page != '') && (($page == 'addImages') || ($page == 'addMusic'))) {
    
    if(!WDWLibrary::verify_nonce($page)){
      die('Sorry, your nonce did not verify.');
    }
    require_once(WD_BWG_DIR . '/filemanager/controller.php');
    $controller_class = 'FilemanagerController';
    $controller = new $controller_class();
    $controller->execute();
  }
}
function bwg_add_embed_ajax() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  
  require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
  if(!WDWLibrary::verify_nonce('')){
    die(WDWLibrary::delimit_wd_output(json_encode(array("error", "Sorry, your nonce did not verify."))));
  }
  
  require_once(WD_BWG_DIR . '/framework/WDWLibraryEmbed.php');
  $embed_action = WDWLibrary::get('action');

  if (($embed_action != '') && ($embed_action == 'addEmbed')) {
    $url_to_embed = WDWLibrary::get('URL_to_embed');

    $data = WDWLibraryEmbed::add_embed($url_to_embed);

    echo WDWLibrary::delimit_wd_output($data);
    wp_die();
  }
  die('Nothing to add');
}

function bwg_edit_tag() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
  if(!WDWLibrary::verify_nonce('')){
      die('Sorry, your nonce did not verify.');
  }
  require_once(WD_BWG_DIR . '/admin/controllers/BWGControllerTags_bwg.php');
  $controller_class = 'BWGControllerTags_bwg';
  $controller = new $controller_class();
  $controller->edit_tag();
}

function bwg_ajax() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  global $wpdb;
  require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
  $page = WDWLibrary::get('action');
  if ($page != '' && (($page == 'BWGShortcode') || ($page == 'addAlbumsGalleries') || ($page == 'editThumb') || ($page == 'addTags'))) {
    if(!WDWLibrary::verify_nonce($page) && ($page != 'BWGShortcode') ){
      die('Sorry, your nonce did not verify.');
    }

    require_once(WD_BWG_DIR . '/admin/controllers/BWGController' . ucfirst($page) . '.php');
    $controller_class = 'BWGController' . ucfirst($page);
    $controller = new $controller_class();
    $controller->execute();
  }
}

function bwg_create_taxonomy() {
  register_taxonomy('bwg_tag', 'post', array(
    'public' => TRUE,
    'show_ui' => FALSE,
    'show_in_nav_menus' => FALSE,
    'show_tagcloud' => TRUE,
    'hierarchical' => FALSE,
    'label' => 'Photo Gallery',
    'query_var' => TRUE,
    'rewrite' => TRUE));
}
add_action('init', 'bwg_create_taxonomy', 0);

function photo_gallery($id) {
  echo bwg_shortcode(array('id' => $id));
}

function bwg_shortcode($params) {
  if (isset($params['id'])) {
    global $wpdb;
    $shortcode = $wpdb->get_var($wpdb->prepare("SELECT tagtext FROM " . $wpdb->prefix . "bwg_shortcode WHERE id='%d'", $params['id']));
    if ($shortcode) {
      $shortcode_params = explode('" ', $shortcode);
      foreach ($shortcode_params as $shortcode_param) {
        $shortcode_param = str_replace('"', '', $shortcode_param);
        $shortcode_elem = explode('=', $shortcode_param);
        $params[str_replace(' ', '', $shortcode_elem[0])] = $shortcode_elem[1];
      }
    }
    else {
      die();
    }
  }
  shortcode_atts(array(
    'gallery_type' => 'thumbnails',
    'theme_id' => 1,
  ), $params);
  switch ($params['gallery_type']) {
    case 'thumbnails': {
      shortcode_atts(array(
        'gallery_id' => 1,
        'sort_by' => 'order',
        'order_by' => 'asc',
        'show_search_box' => 0,
        'search_box_width' => 180,
        'image_column_number' => 3,
        'images_per_page' => 15,
        'image_title' => 'none',
        'image_enable_page' => 1,
        'thumb_width' => 120,
        'thumb_height' => 90,
        'image_width' => 800,
        'image_height' => 600,
        'image_effect' => 'fade',
        'enable_image_filmstrip' => 0,
        'image_filmstrip_height' => 50,
        'enable_image_ctrl_btn' => 1,
        'enable_image_fullscreen' => 1,
        'enable_comment_social' => 1,
        'enable_image_facebook' => 1,
        'enable_image_twitter' => 1,
        'enable_image_google' => 1,
        'watermark_type' => 'none',
        'load_more_image_count' => 15,
        'show_tag_box' => 0
      ), $params);
      break;

    }
    
    case 'slideshow': {
      shortcode_atts(array(
        'gallery_id' => 1,
        'sort_by' => 'order',
        'order_by' => 'asc',
        'slideshow_effect' => 'fade',
        'slideshow_interval' => 5,
        'slideshow_width' => 800,
        'slideshow_height' => 600,
        'enable_slideshow_autoplay' => 0,
        'enable_slideshow_shuffle' => 0,
        'enable_slideshow_ctrl' => 1,
        'enable_slideshow_filmstrip' => 1,
        'slideshow_filmstrip_height' => 70,
        'slideshow_enable_title' => 0,
        'slideshow_title_full_width' => 0,
        'slideshow_title_position' => 'top-right',
        'slideshow_enable_description' => 0,
        'slideshow_description_position' => 'bottom-right',
        'enable_slideshow_music' => 0,
        'slideshow_music_url' => '',
        'slideshow_effect_duration' => 1,
      ), $params);
      break;

    }
    case 'image_browser': {
      shortcode_atts(array(
        'gallery_id' => 1,
        'sort_by' => 'order',
        'order_by' => 'asc',
        'show_search_box' => 0,
        'search_box_width' => 180,
        'image_browser_width' => 800,
        'image_browser_title_enable' => 1,
        'image_browser_description_enable' => 1,
        'watermark_type' => 'none'
      ), $params);
      break;

    }
    case 'album_compact_preview': {
      shortcode_atts(array(
        'album_id' => 1,
        'sort_by' => 'order',
        'show_search_box' => 0,
        'search_box_width' => 180,
        'compuct_album_column_number' => 3,
        'compuct_albums_per_page' => 15,
        'compuct_album_title' => 'hover',
        'compuct_album_view_type' => 'thumbnail',
        'compuct_album_thumb_width' => 120,
        'compuct_album_thumb_height' => 90,
        'compuct_album_image_column_number' => 3,
        'compuct_album_images_per_page' => 15,
        'compuct_album_image_title' => 'none',
        'compuct_album_image_thumb_width' => 120,
        'compuct_album_image_thumb_height' => 120,
        'compuct_album_enable_page' => 1,
        'watermark_type' => 'none',
        'compuct_album_load_more_image_count' => 15,
        'compuct_albums_per_page_load_more' => 15
      ), $params);
      break;

    }
    case 'album_extended_preview': {
      shortcode_atts(array(
        'album_id' => 1,
        'sort_by' => 'order',
        'show_search_box' => 0,
        'search_box_width' => 180,
        'extended_albums_per_page' => 15,
        'extended_album_height' => 150,
        'extended_album_description_enable' => 1,
        'extended_album_view_type' => 'thumbnail',
        'extended_album_thumb_width' => 120,
        'extended_album_thumb_height' => 90,
        'extended_album_image_column_number' => 3,
        'extended_album_images_per_page' => 15,
        'extended_album_image_title' => 'none',
        'extended_album_image_thumb_width' => 120,
        'extended_album_image_thumb_height' => 90,
        'extended_album_enable_page' => 1,
        'watermark_type' => 'none',
        'extended_album_load_more_image_count' => 15,
        'extended_albums_per_page_load_more' => 15
      ), $params);
      break;

    }

    default: {
      die();
    }
  }

  if ($params['gallery_type'] != 'slideshow') {
    shortcode_atts(array(
        'popup_fullscreen' => 0,
        'popup_autoplay' => 0,
        'popup_width' => 800,
        'popup_height' => 600,
        'popup_effect' => 'fade',
        'popup_interval' => 5,
        'popup_enable_filmstrip' => 0,
        'popup_filmstrip_height' => 70,
        'popup_enable_ctrl_btn' => 1,
        'popup_enable_fullscreen' => 1,
        'popup_enable_info' => 1,
        'popup_info_full_width' => 0,
        'popup_info_always_show' => 0,
        'popup_hit_counter' => 0,
        'popup_enable_rate' => 0,
        'popup_enable_comment' => 1,
        'popup_enable_facebook' => 1,
        'popup_enable_twitter' => 1,
        'popup_enable_google' => 1,
        'popup_enable_pinterest' => 0,
        'popup_enable_tumblr' => 0,
        'watermark_type' => 'none',
        'popup_effect_duration' => 1,
      ), $params);
  }

  switch ($params['watermark_type']) {
    case 'text': {
      shortcode_atts(array(
        'watermark_link' => '',
        'watermark_text' => '',
        'watermark_font_size' => 12,
        'watermark_font' => 'Arial',
        'watermark_color' => 'FFFFFF',
        'watermark_opacity' => 30,
        'watermark_position' => 'bottom-right',
      ), $params);
      break;

    }
    case 'image': {
      shortcode_atts(array(
        'watermark_link' => '',
        'watermark_url' => '',
        'watermark_width' => 120,
        'watermark_height' => 90,
        'watermark_opacity' => 30,
        'watermark_position' => 'bottom-right',
      ), $params);
      break;

    }
    default: {
      $params['watermark_type'] = 'none';
      break;
    }
  }
  foreach ($params as $key => $param) {
    if (empty($param[$key]) == FALSE) {
      $param[$key] = esc_html(addslashes($param[$key]));
    }
  }
  ob_start();
  bwg_front_end($params);
  return str_replace(array("\r\n", "\n", "\r"), '', ob_get_clean());
  // return ob_get_clean();
}
add_shortcode('Best_Wordpress_Gallery', 'bwg_shortcode');

$bwg = 0;
function bwg_front_end($params) {
  require_once(WD_BWG_DIR . '/frontend/controllers/BWGController' . ucfirst($params['gallery_type']) . '.php');
  $controller_class = 'BWGController' . ucfirst($params['gallery_type']) . '';
  $controller = new $controller_class();
  global $bwg;
  $controller->execute($params, 1, $bwg);
  $bwg++;
  return;
}

// Add the Photo Gallery button.
function bwg_add_button($buttons) {
  array_push($buttons, "bwg_mce");
  return $buttons;
}

// Register Photo Gallery button.
function bwg_register($plugin_array) {
  $url = WD_BWG_URL . '/js/bwg_editor_button.js';
  $plugin_array["bwg_mce"] = $url;
  return $plugin_array;
}

function bwg_admin_ajax() {
  ?>
  <script>
    var bwg_admin_ajax = '<?php echo add_query_arg(array('action' => 'BWGShortcode'), admin_url('admin-ajax.php')); ?>';
    var bwg_plugin_url = '<?php echo WD_BWG_URL; ?>';
  </script>
  <?php
}
add_action('admin_head', 'bwg_admin_ajax');

// Add the Photo Gallery button to editor.
add_action('wp_ajax_BWGShortcode', 'bwg_ajax');
add_filter('mce_external_plugins', 'bwg_register');
add_filter('mce_buttons', 'bwg_add_button', 0);

// Photo Gallery Widget.
if (class_exists('WP_Widget')) {
  require_once(WD_BWG_DIR . '/admin/controllers/BWGControllerWidget.php');
  add_action('widgets_init', create_function('', 'return register_widget("BWGControllerWidget");'));
  require_once(WD_BWG_DIR . '/admin/controllers/BWGControllerWidgetSlideshow.php');
  add_action('widgets_init', create_function('', 'return register_widget("BWGControllerWidgetSlideshow");'));
}
// Intro tour
function bwg_pointer_init() {
    include_once (WD_BWG_DIR .'/includes/bwg_pointers.php');
    new BWG_pointers();
}
add_action('admin_init', 'bwg_pointer_init');

// Activate plugin.
function bwg_activate() {
  global $wpdb;
  $bwg_shortcode = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_shortcode` (
    `id` bigint(20) NOT NULL,
    `tagtext` mediumtext NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_shortcode);
  $bwg_gallery = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_gallery` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `description` mediumtext NOT NULL,
    `page_link` mediumtext NOT NULL,
    `preview_image` mediumtext NOT NULL,
    `random_preview_image` mediumtext NOT NULL,
    `order` bigint(20) NOT NULL,
    `author` bigint(20) NOT NULL,
    `published` tinyint(1) NOT NULL,
    `gallery_type` varchar(32) NOT NULL,
    `gallery_source` varchar(256) NOT NULL,
    `autogallery_image_number` int(4) NOT NULL,
    `update_flag` varchar(32) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_gallery);
  $bwg_album = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_album` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `description` mediumtext NOT NULL,
    `preview_image` mediumtext NOT NULL,
    `random_preview_image` mediumtext NOT NULL,
    `order` bigint(20) NOT NULL,
    `author` bigint(20) NOT NULL,
    `published` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_album);
  $bwg_album_gallery = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_album_gallery` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `album_id` bigint(20) NOT NULL,
    `is_album` tinyint(1) NOT NULL,
    `alb_gal_id` bigint(20) NOT NULL,
    `order` bigint(20) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_album_gallery);
  $bwg_image = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_image` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `gallery_id` bigint(20) NOT NULL,
    `slug` longtext NOT NULL,
    `filename` varchar(255) NOT NULL,
    `image_url` mediumtext NOT NULL,
    `thumb_url` mediumtext NOT NULL,
    `description` mediumtext NOT NULL,
    `alt` mediumtext NOT NULL,
    `date` varchar(128) NOT NULL,
    `size` varchar(128) NOT NULL,
    `filetype` varchar(128) NOT NULL,
    `resolution` varchar(128) NOT NULL,
    `author` bigint(20) NOT NULL,
    `order` bigint(20) NOT NULL,
    `published` tinyint(1) NOT NULL,
    `comment_count` bigint(20) NOT NULL,
    `avg_rating` float(20) NOT NULL,
    `rate_count` bigint(20) NOT NULL,
    `hit_count` bigint(20) NOT NULL,
    `redirect_url` varchar(255) NOT NULL,
    `pricelist_id` bigint(20) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_image);
  $bwg_image_tag = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_image_tag` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `tag_id` bigint(20) NOT NULL,
    `image_id` bigint(20) NOT NULL,
    `gallery_id` bigint(20) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_image_tag);
  $bwg_option = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_option` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `images_directory` mediumtext NOT NULL,

    `masonry` varchar(255) NOT NULL,

    `mosaic` varchar(255) NOT NULL,
    `resizable_mosaic` tinyint(1) NOT NULL,
    `mosaic_total_width` int(4) NOT NULL,
    `image_column_number` int(4) NOT NULL,
    `images_per_page` int(4) NOT NULL,
    `thumb_width` int(4) NOT NULL,
    `thumb_height` int(4) NOT NULL,
    `upload_thumb_width` int(4) NOT NULL,
    `upload_thumb_height` int(4) NOT NULL,
    `image_enable_page` tinyint(1) NOT NULL,
    `image_title_show_hover` varchar(20) NOT NULL,
    `ecommerce_icon_show_hover` varchar(20) NOT NULL,
    `album_column_number` int(4) NOT NULL,
    `albums_per_page` int(4) NOT NULL,
    `album_title_show_hover` varchar(8) NOT NULL,
    `album_thumb_width` int(4) NOT NULL,
    `album_thumb_height` int(4) NOT NULL,
    `album_enable_page` tinyint(1) NOT NULL,
    `extended_album_height` int(4) NOT NULL,
    `extended_album_description_enable` tinyint(1) NOT NULL,

    `image_browser_width` int(4) NOT NULL,
    `image_browser_title_enable` tinyint(1) NOT NULL,
    `image_browser_description_enable` tinyint(1) NOT NULL,

    `blog_style_width` int(4) NOT NULL,
    `blog_style_title_enable` tinyint(1) NOT NULL,
    `blog_style_images_per_page` int(4) NOT NULL,
    `blog_style_enable_page` tinyint(1) NOT NULL,

    `slideshow_type` varchar(16) NOT NULL,
    `slideshow_interval` int(4) NOT NULL,
    `slideshow_width` int(4) NOT NULL,
    `slideshow_height` int(4) NOT NULL,
    `slideshow_enable_autoplay` tinyint(1) NOT NULL,
    `slideshow_enable_shuffle` tinyint(1) NOT NULL,
    `slideshow_enable_ctrl` tinyint(1) NOT NULL,
    `slideshow_enable_filmstrip` tinyint(1) NOT NULL,
    `slideshow_filmstrip_height` int(4) NOT NULL,
    `slideshow_enable_title` tinyint(1) NOT NULL,
    `slideshow_title_position` varchar(16) NOT NULL,
    `slideshow_enable_description` tinyint(1) NOT NULL,
    `slideshow_description_position` varchar(16) NOT NULL,
    `slideshow_enable_music` tinyint(1) NOT NULL,
    `slideshow_audio_url` varchar(255) NOT NULL,
    `slideshow_effect_duration` int(4) NOT NULL,

    `popup_width` int(4) NOT NULL,
    `popup_height` int(4) NOT NULL,
    `popup_type` varchar(16) NOT NULL,
    `popup_interval` int(4) NOT NULL,
    `popup_enable_filmstrip` tinyint(1) NOT NULL,
    `popup_filmstrip_height` int(4) NOT NULL,
    `popup_enable_ctrl_btn` tinyint(1) NOT NULL,
    `popup_enable_fullscreen` tinyint(1) NOT NULL,
    `popup_enable_info` tinyint(1) NOT NULL,
    `popup_info_always_show` tinyint(1) NOT NULL,
    `popup_enable_rate` tinyint(1) NOT NULL,
    `popup_enable_comment` tinyint(1) NOT NULL,
    `popup_enable_email` tinyint(1) NOT NULL,
    `popup_enable_captcha` tinyint(1) NOT NULL,
    `popup_enable_download` tinyint(1) NOT NULL,
    `popup_enable_fullsize_image` tinyint(1) NOT NULL,
    `popup_enable_facebook` tinyint(1) NOT NULL,
    `popup_enable_twitter` tinyint(1) NOT NULL,
    `popup_enable_google` tinyint(1) NOT NULL,
    `popup_enable_ecommerce` tinyint(1) NOT NULL,
    `popup_effect_duration` int(4) NOT NULL,
    
    `watermark_type` varchar(8) NOT NULL,
    `watermark_position` varchar(16) NOT NULL,
    `watermark_width` int(4) NOT NULL,
    `watermark_height` int(4) NOT NULL,
    `watermark_url` mediumtext NOT NULL,
    `watermark_text` mediumtext NOT NULL,
    `watermark_link` mediumtext NOT NULL,
    `watermark_font_size` int(4) NOT NULL,
    `watermark_font` varchar(16) NOT NULL,
    `watermark_color` varchar(8) NOT NULL,
    `watermark_opacity` int(4) NOT NULL,
    
    `built_in_watermark_type` varchar(16) NOT NULL,
    `built_in_watermark_position` varchar(16) NOT NULL,
    `built_in_watermark_size` int(4) NOT NULL,
    `built_in_watermark_url` mediumtext NOT NULL,
    `built_in_watermark_text` mediumtext NOT NULL,
    `built_in_watermark_font_size` int(4) NOT NULL,
    `built_in_watermark_font` varchar(16) NOT NULL,
    `built_in_watermark_color` varchar(8) NOT NULL,
    `built_in_watermark_opacity` int(4) NOT NULL,

    `image_right_click` tinyint(1) NOT NULL,
    `popup_fullscreen` tinyint(1) NOT NULL,
    `gallery_role` tinyint(1) NOT NULL,
    `album_role` tinyint(1) NOT NULL,
    `image_role` tinyint(1) NOT NULL,
    `popup_autoplay` tinyint(1) NOT NULL,
    `album_view_type` varchar(16) NOT NULL,
    `popup_enable_pinterest` tinyint(1) NOT NULL,
    `popup_enable_tumblr` tinyint(1) NOT NULL,
    `show_search_box` tinyint(1) NOT NULL,
    `search_box_width` int(4) NOT NULL,
    `preload_images` tinyint(1) NOT NULL,
    `preload_images_count` int(4) NOT NULL,
    `thumb_click_action` varchar(16) NOT NULL,
    `thumb_link_target` tinyint(1) NOT NULL,
    `comment_moderation` tinyint(1) NOT NULL,
    `popup_hit_counter` tinyint(1) NOT NULL,
    `enable_ML_import` tinyint(1) NOT NULL,
    `showthumbs_name` tinyint(1) NOT NULL,
    `show_album_name` tinyint(1) NOT NULL,
    `show_image_counts` tinyint(1) NOT NULL,
    `upload_img_width` int(4) NOT NULL,
    `upload_img_height` int(4) NOT NULL,
    `play_icon` tinyint(1) NOT NULL,
    `show_masonry_thumb_description` tinyint(1) NOT NULL,
    `slideshow_title_full_width` tinyint(1) NOT NULL,
    `popup_info_full_width` tinyint(1) NOT NULL,
    `show_sort_images` tinyint(1) NOT NULL,
    `autoupdate_interval` int(4) NOT NULL,
    `instagram_access_token` varchar(128) NOT NULL,
    `description_tb` tinyint(1) NOT NULL,
    `enable_seo` tinyint(1) NOT NULL,
    `autohide_lightbox_navigation` tinyint(1) NOT NULL,
    `autohide_slideshow_navigation` tinyint(1) NOT NULL,
    `read_metadata` tinyint(1) NOT NULL,
    `enable_loop` tinyint(1) NOT NULL,
    `enable_addthis` tinyint(1) NOT NULL,
    `addthis_profile_id` varchar(66) NOT NULL,
    `carousel_interval` int(4) NOT NULL,
    `carousel_width` int(4) NOT NULL,
    `carousel_height` int(4) NOT NULL,
    `carousel_image_column_number` int(4) NOT NULL,
    `carousel_image_par` varchar(32) NOT NULL,
    `carousel_enable_title` tinyint(1) NOT NULL,
    `carousel_enable_autoplay` tinyint(1) NOT NULL,
    `carousel_r_width` int(4) NOT NULL,
    `carousel_fit_containerWidth` tinyint(1) NOT NULL,
    `carousel_prev_next_butt` tinyint(1) NOT NULL,
    `carousel_play_pause_butt` tinyint(1) NOT NULL,
    `permissions` varchar(20) NOT NULL,
    `facebook_app_id` varchar(64) NOT NULL,
    `facebook_app_secret` varchar(64) NOT NULL,
    `show_tag_box` tinyint(1) NOT NULL,
    `show_hide_custom_post` tinyint(1) NOT NULL,
    `show_hide_post_meta` tinyint(1) NOT NULL,
    `placeholder` varchar(32) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_option);
  $bwg_theme = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_theme` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `options` longtext NOT NULL,
    `default_theme` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_theme);
  $bwg_image_comment = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_image_comment` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `image_id` bigint(20) NOT NULL,
    `name` varchar(255) NOT NULL,
    `date` varchar(64) NOT NULL,
    `comment` mediumtext NOT NULL,
    `url` mediumtext NOT NULL,
    `mail` mediumtext NOT NULL,
    `published` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_image_comment);

  $bwg_image_rate = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "bwg_image_rate` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `image_id` bigint(20) NOT NULL,
    `rate` float(16) NOT NULL,
    `ip` varchar(64) NOT NULL,
    `date` varchar(64) NOT NULL,
    PRIMARY KEY (`id`)
  ) DEFAULT CHARSET=utf8;";
  $wpdb->query($bwg_image_rate);

  $upload_dir = wp_upload_dir();
  if (!is_dir($upload_dir['basedir'] . '/' . plugin_basename(dirname(__FILE__)))) {
    mkdir($upload_dir['basedir'] . '/' . plugin_basename(dirname(__FILE__)), 0777);
  }
  $exists_default = $wpdb->get_var('SELECT count(id) FROM ' . $wpdb->prefix . 'bwg_option');
  if (!$exists_default) {
    $save = $wpdb->insert($wpdb->prefix . 'bwg_option', array(
      'id' => 1,
      'images_directory' => str_replace(ABSPATH, '', $upload_dir['basedir']),

      'masonry' => 'vertical',
      'mosaic' => 'vertical',
      'resizable_mosaic' => 0,
      'mosaic_total_width'=> 100,
      'image_column_number' => 5,
      'images_per_page' => 30,
      'thumb_width' => 180,
      'thumb_height' => 90,
      'upload_thumb_width' => 300,
      'upload_thumb_height' => 300,
      'image_enable_page' => 1,
      'image_title_show_hover' => 'none',

      'album_column_number' => 5,
      'albums_per_page' => 30,
      'album_title_show_hover' => 'hover',
      'album_thumb_width' => 120,
      'album_thumb_height' => 90,
      'album_enable_page' => 1,
      'extended_album_height' => 150,
      'extended_album_description_enable' => 1,

      'image_browser_width' => 800,
      'image_browser_title_enable' => 1,
      'image_browser_description_enable' => 1,

      'blog_style_width' => 800,
      'blog_style_title_enable' => 1,
      'blog_style_images_per_page' => 5,
      'blog_style_enable_page' => 1,

      'slideshow_type' => 'fade',
      'slideshow_interval' => 5,
      'slideshow_width' => 800,
      'slideshow_height' => 500,
      'slideshow_enable_autoplay' => 0,
      'slideshow_enable_shuffle' => 0,
      'slideshow_enable_ctrl' => 1,
      'slideshow_enable_filmstrip' => 1,
      'slideshow_filmstrip_height' => 90,
      'slideshow_enable_title' => 0,
      'slideshow_title_position' => 'top-right',
      'slideshow_enable_description' => 0,
      'slideshow_description_position' => 'bottom-right',
      'slideshow_enable_music' => 0,
      'slideshow_audio_url' => '',
      'slideshow_effect_duration' => 1,

      'popup_width' => 800,
      'popup_height' => 500,
      'popup_type' => 'fade',
      'popup_interval' => 5,
      'popup_enable_filmstrip' => 1,
      'popup_filmstrip_height' => 70,
      'popup_enable_ctrl_btn' => 1,
      'popup_enable_fullscreen' => 1,
      'popup_enable_comment' => 1,
      'popup_enable_email' => 0,
      'popup_enable_captcha' => 0,
      'popup_enable_download' => 0,
      'popup_enable_fullsize_image' => 0,
      'popup_enable_facebook' => 1,
      'popup_enable_twitter' => 1,
      'popup_enable_google' => 1,
      'popup_effect_duration' => 1,

      'watermark_type' => 'none',
      'watermark_position' => 'bottom-left',
      'watermark_width' => 90,
      'watermark_height' => 90,
      'watermark_url' => WD_BWG_URL . '/images/watermark.png',
      'watermark_text' => 'web-dorado.com',
      'watermark_link' => 'https://web-dorado.com',
      'watermark_font_size' => 20,
      'watermark_font' => 'arial',
      'watermark_color' => 'FFFFFF',
      'watermark_opacity' => 30,

      'built_in_watermark_type' => 'none',
      'built_in_watermark_position' => 'middle-center',
      'built_in_watermark_size' => 15,
      'built_in_watermark_url' => WD_BWG_URL . '/images/watermark.png',
      'built_in_watermark_text' => 'web-dorado.com',
      'built_in_watermark_font_size' => 20,
      'built_in_watermark_font' => 'arial',
      'built_in_watermark_color' => 'FFFFFF',
      'built_in_watermark_opacity' => 30,

      'image_right_click' => 0,
      'popup_fullscreen' => 0,
      'gallery_role' => 0,
      'album_role' => 0,
      'image_role' => 0,
      'popup_autoplay' => 0,
      'album_view_type' => 'thumbnail',
      'popup_enable_pinterest' => 0,
      'popup_enable_tumblr' => 0,
      'show_search_box' => 0,
      'search_box_width' => 180,
      'preload_images' => 0,
      'preload_images_count' => 10,
      'popup_enable_info' => 1,
      'popup_enable_rate' => 0,
      'thumb_click_action' => 'open_lightbox',
      'thumb_link_target' => 1,
      'comment_moderation' => 0,
      'popup_info_always_show' => 0,
      'popup_hit_counter' => 0,
      'enable_ML_import' => 0,
      'showthumbs_name'=> 0,
      'show_album_name'=> 0,
      'show_image_counts'=> 0,
      'upload_img_width' => 1200,
      'upload_img_height' => 1200,
      'play_icon'=> 1,
      'show_masonry_thumb_description' => 0,
      'slideshow_title_full_width' => 0,
      'popup_info_full_width' => 0,
      'show_sort_images' => 0,
      'autoupdate_interval' => 30,
      'instagram_access_token' => '',
      'description_tb' => 0,
      'enable_seo' => 1,
      'autohide_lightbox_navigation' => 1,
      'autohide_slideshow_navigation' => 1,
      'read_metadata' => 1,
      'enable_loop'=> 1,
      'enable_addthis'=> 0,
      'addthis_profile_id'=> '',
      'carousel_interval' => 5,
      'carousel_width' => 300,
      'carousel_height' => 300,
      'carousel_image_column_number' => 5,
      'carousel_image_par' => '0.75',
      'carousel_enable_title' => 0,
      'carousel_enable_autoplay' => 0,
      'carousel_r_width' => 800,
      'carousel_fit_containerWidth' => 1,
      'carousel_prev_next_butt' => 1,
      'carousel_play_pause_butt' => 1,
      'permissions' => 'manage_options',
      'facebook_app_id' => '',
      'facebook_app_secret' => '',
      'show_tag_box' => 0,
      'show_hide_custom_post' => 0,
      'show_hide_post_meta' => 0,
      'placeholder' => '',
      'ecommerce_icon_show_hover' => '',
      'popup_enable_ecommerce' => 0,
      'slideshow_effect_duration' => 1,
      'popup_effect_duration' => 1,
    ));
  }
  $exists_default = $wpdb->get_var('SELECT count(id) FROM ' . $wpdb->prefix . 'bwg_theme');
  $theme1 = array(
      'thumb_margin' => 4,
      'thumb_padding' => 0,
      'thumb_border_radius' => '0',
      'thumb_border_width' => 0,
      'thumb_border_style' => 'none',
      'thumb_border_color' => 'CCCCCC',
      'thumb_bg_color' => 'FFFFFF',
      'thumbs_bg_color' => 'FFFFFF',
      'thumb_bg_transparent' => 0,
      'thumb_box_shadow' => '0px 0px 0px #888888',
      'thumb_transparent' => 100,
      'thumb_align' => 'center',
      'thumb_hover_effect' => 'scale',
      'thumb_hover_effect_value' => '1.1',
      'thumb_transition' => 1,
      'thumb_title_font_color' => 'CCCCCC',
      'thumb_title_font_style' => 'segoe ui',
      'thumb_title_pos' => 'bottom',
      'thumb_title_font_size' => 16,
      'thumb_title_font_weight' => 'bold',
      'thumb_title_margin' => '2px',
      'thumb_title_shadow' => '0px 0px 0px #888888',

      'page_nav_position' => 'bottom',
      'page_nav_align' => 'center',
      'page_nav_number' => 0,
      'page_nav_font_size' => 12,
      'page_nav_font_style' => 'segoe ui',
      'page_nav_font_color' => '666666',
      'page_nav_font_weight' => 'bold',
      'page_nav_border_width' => 1,
      'page_nav_border_style' => 'solid',
      'page_nav_border_color' => 'E3E3E3',
      'page_nav_border_radius' => '0',
      'page_nav_margin' => '0',
      'page_nav_padding' => '3px 6px',
      'page_nav_button_bg_color' => 'FFFFFF',
      'page_nav_button_bg_transparent' => 100,
      'page_nav_box_shadow' => '0',
      'page_nav_button_transition' => 1,
      'page_nav_button_text' => 0,

      'lightbox_overlay_bg_color' => '000000',
      'lightbox_overlay_bg_transparent' => 70,
      'lightbox_bg_color' => '000000',
      'lightbox_ctrl_btn_pos' => 'bottom',
      'lightbox_ctrl_btn_align' => 'center',
      'lightbox_ctrl_btn_height' => 20,
      'lightbox_ctrl_btn_margin_top' => 10,
      'lightbox_ctrl_btn_margin_left' => 7,
      'lightbox_ctrl_btn_transparent' => 100,
      'lightbox_ctrl_btn_color' => 'FFFFFF',
      'lightbox_toggle_btn_height' => 14,
      'lightbox_toggle_btn_width' => 100,
      'lightbox_ctrl_cont_bg_color' => '000000',
      'lightbox_ctrl_cont_transparent' => 65,
      'lightbox_ctrl_cont_border_radius' => 4,
      'lightbox_close_btn_transparent' => 100,
      'lightbox_close_btn_bg_color' => '000000',
      'lightbox_close_btn_border_width' => 2,
      'lightbox_close_btn_border_radius' => '16px',
      'lightbox_close_btn_border_style' => 'none',
      'lightbox_close_btn_border_color' => 'FFFFFF',
      'lightbox_close_btn_box_shadow' => '0',
      'lightbox_close_btn_color' => 'FFFFFF',
      'lightbox_close_btn_size' => 10,
      'lightbox_close_btn_width' => 20,
      'lightbox_close_btn_height' => 20,
      'lightbox_close_btn_top' => '-10',
      'lightbox_close_btn_right' => '-10',
      'lightbox_close_btn_full_color' => 'FFFFFF',
      'lightbox_rl_btn_bg_color' => '000000',
      'lightbox_rl_btn_border_radius' => '20px',
      'lightbox_rl_btn_border_width' => 0,
      'lightbox_rl_btn_border_style' => 'none',
      'lightbox_rl_btn_border_color' => 'FFFFFF',
      'lightbox_rl_btn_box_shadow' => '',
      'lightbox_rl_btn_color' => 'FFFFFF',
      'lightbox_rl_btn_height' => 40,
      'lightbox_rl_btn_width' => 40,
      'lightbox_rl_btn_size' => 20,
      'lightbox_close_rl_btn_hover_color' => 'CCCCCC',
      'lightbox_comment_pos' => 'left',
      'lightbox_comment_width' => 400,
      'lightbox_comment_bg_color' => '000000',
      'lightbox_comment_font_color' => 'CCCCCC',
      'lightbox_comment_font_style' => 'segoe ui',
      'lightbox_comment_font_size' => 12,
      'lightbox_comment_button_bg_color' => '616161',
      'lightbox_comment_button_border_color' => '666666',
      'lightbox_comment_button_border_width' => 1,
      'lightbox_comment_button_border_style' => 'none',
      'lightbox_comment_button_border_radius' => '3px',
      'lightbox_comment_button_padding' => '3px 10px',
      'lightbox_comment_input_bg_color' => '333333',
      'lightbox_comment_input_border_color' => '666666',
      'lightbox_comment_input_border_width' => 1,
      'lightbox_comment_input_border_style' => 'none',
      'lightbox_comment_input_border_radius' => '0',
      'lightbox_comment_input_padding' => '2px',
      'lightbox_comment_separator_width' => 1,
      'lightbox_comment_separator_style' => 'solid',
      'lightbox_comment_separator_color' => '383838',
      'lightbox_comment_author_font_size' => 14,
      'lightbox_comment_date_font_size' => 10,
      'lightbox_comment_body_font_size' => 12,
      'lightbox_comment_share_button_color' => 'CCCCCC',
      'lightbox_filmstrip_pos' => 'top',
      'lightbox_filmstrip_rl_bg_color' => '3B3B3B',
      'lightbox_filmstrip_rl_btn_size' => 20,
      'lightbox_filmstrip_rl_btn_color' => 'FFFFFF',
      'lightbox_filmstrip_thumb_margin' => '0 1px',
      'lightbox_filmstrip_thumb_border_width' => 1,
      'lightbox_filmstrip_thumb_border_style' => 'solid',
      'lightbox_filmstrip_thumb_border_color' => '000000',
      'lightbox_filmstrip_thumb_border_radius' => '0',
      'lightbox_filmstrip_thumb_deactive_transparent' => 80,
      'lightbox_filmstrip_thumb_active_border_width' => 0,
      'lightbox_filmstrip_thumb_active_border_color' => 'FFFFFF',
      'lightbox_rl_btn_style' => 'fa-chevron',
      'lightbox_rl_btn_transparent' => 80,
      'lightbox_bg_transparent' => 100,

      'album_compact_back_font_color' => '000000',
      'album_compact_back_font_style' => 'segoe ui',
      'album_compact_back_font_size' => 16,
      'album_compact_back_font_weight' => 'bold',
      'album_compact_back_padding' => '0',
      'album_compact_title_font_color' => 'CCCCCC',
      'album_compact_title_font_style' => 'segoe ui',
      'album_compact_thumb_title_pos' => 'bottom',
      'album_compact_title_font_size' => 16,
      'album_compact_title_font_weight' => 'bold',
      'album_compact_title_margin' => '2px',
      'album_compact_title_shadow' => '0px 0px 0px #888888',
      'album_compact_thumb_margin' => 4,
      'album_compact_thumb_padding' => 0,
      'album_compact_thumb_border_radius' => '0',
      'album_compact_thumb_border_width' => 0,
      'album_compact_thumb_border_style' => 'none',
      'album_compact_thumb_border_color' => 'CCCCCC',
      'album_compact_thumb_bg_color' => 'FFFFFF',
      'album_compact_thumbs_bg_color' => 'FFFFFF',
      'album_compact_thumb_bg_transparent' => 0,
      'album_compact_thumb_box_shadow' => '0px 0px 0px #888888',
      'album_compact_thumb_transparent' => 100,
      'album_compact_thumb_align' => 'center',
      'album_compact_thumb_hover_effect' => 'scale',
      'album_compact_thumb_hover_effect_value' => '1.1',
      'album_compact_thumb_transition' => 0,

      'album_extended_thumb_margin' => 2,
      'album_extended_thumb_padding' => 0,
      'album_extended_thumb_border_radius' => '0',
      'album_extended_thumb_border_width' => 0,
      'album_extended_thumb_border_style' => 'none',
      'album_extended_thumb_border_color' => 'CCCCCC',
      'album_extended_thumb_bg_color' => 'FFFFFF',
      'album_extended_thumbs_bg_color' => 'FFFFFF',
      'album_extended_thumb_bg_transparent' => 0,
      'album_extended_thumb_box_shadow' => '',
      'album_extended_thumb_transparent' => 100,
      'album_extended_thumb_align' => 'left',
      'album_extended_thumb_hover_effect' => 'scale',
      'album_extended_thumb_hover_effect_value' => '1.1',
      'album_extended_thumb_transition' => 0,
      'album_extended_back_font_color' => '000000',
      'album_extended_back_font_style' => 'segoe ui',
      'album_extended_back_font_size' => 20,
      'album_extended_back_font_weight' => 'bold',
      'album_extended_back_padding' => '0',
      'album_extended_div_bg_color' => 'FFFFFF',
      'album_extended_div_bg_transparent' => 0,
      'album_extended_div_border_radius' => '0 0 0 0',
      'album_extended_div_margin' => '0 0 5px 0',
      'album_extended_div_padding' => 10,
      'album_extended_div_separator_width' => 1,
      'album_extended_div_separator_style' => 'solid',
      'album_extended_div_separator_color' => 'E0E0E0',
      'album_extended_thumb_div_bg_color' => 'FFFFFF',
      'album_extended_thumb_div_border_radius' => '0',
      'album_extended_thumb_div_border_width' => 1,
      'album_extended_thumb_div_border_style' => 'solid',
      'album_extended_thumb_div_border_color' => 'E8E8E8',
      'album_extended_thumb_div_padding' => '5px',
      'album_extended_text_div_bg_color' => 'FFFFFF',
      'album_extended_text_div_border_radius' => '0',
      'album_extended_text_div_border_width' => 1,
      'album_extended_text_div_border_style' => 'solid',
      'album_extended_text_div_border_color' => 'E8E8E8',
      'album_extended_text_div_padding' => '5px',
      'album_extended_title_span_border_width' => 1,
      'album_extended_title_span_border_style' => 'none',
      'album_extended_title_span_border_color' => 'CCCCCC',
      'album_extended_title_font_color' => '000000',
      'album_extended_title_font_style' => 'segoe ui',
      'album_extended_title_font_size' => 16,
      'album_extended_title_font_weight' => 'bold',
      'album_extended_title_margin_bottom' => 2,
      'album_extended_title_padding' => '2px',
      'album_extended_desc_span_border_width' => 1,
      'album_extended_desc_span_border_style' => 'none',
      'album_extended_desc_span_border_color' => 'CCCCCC',
      'album_extended_desc_font_color' => '000000',
      'album_extended_desc_font_style' => 'segoe ui',
      'album_extended_desc_font_size' => 14,
      'album_extended_desc_font_weight' => 'normal',
      'album_extended_desc_padding' => '2px',
      'album_extended_desc_more_color' => 'F2D22E',
      'album_extended_desc_more_size' => 12,

      'masonry_thumb_padding' => 4,
      'masonry_thumb_border_radius' => '0',
      'masonry_thumb_border_width' => 0,
      'masonry_thumb_border_style' => 'none',
      'masonry_thumb_border_color' => 'CCCCCC',
      'masonry_thumbs_bg_color' => 'FFFFFF',
      'masonry_thumb_bg_transparent' => 0,
      'masonry_thumb_transparent' => 100,
      'masonry_thumb_align' => 'center',
      'masonry_thumb_hover_effect' => 'scale',
      'masonry_thumb_hover_effect_value' => '1.1',
      'masonry_thumb_transition' => 0,

      'slideshow_cont_bg_color' => '000000',
      'slideshow_close_btn_transparent' => 100,
      'slideshow_rl_btn_bg_color' => '000000',
      'slideshow_rl_btn_border_radius' => '20px',
      'slideshow_rl_btn_border_width' => 0,
      'slideshow_rl_btn_border_style' => 'none',
      'slideshow_rl_btn_border_color' => 'FFFFFF',
      'slideshow_rl_btn_box_shadow' => '0px 0px 0px #000000',
      'slideshow_rl_btn_color' => 'FFFFFF',
      'slideshow_rl_btn_height' => 40,
      'slideshow_rl_btn_size' => 20,
      'slideshow_rl_btn_width' => 40,
      'slideshow_close_rl_btn_hover_color' => 'CCCCCC',
      'slideshow_filmstrip_pos' => 'top',
      'slideshow_filmstrip_thumb_border_width' => 1,
      'slideshow_filmstrip_thumb_border_style' => 'solid',
      'slideshow_filmstrip_thumb_border_color' =>  '000000',
      'slideshow_filmstrip_thumb_border_radius' => '0',
      'slideshow_filmstrip_thumb_margin' =>  '0 1px',
      'slideshow_filmstrip_thumb_active_border_width' => 0,
      'slideshow_filmstrip_thumb_active_border_color' => 'FFFFFF',
      'slideshow_filmstrip_thumb_deactive_transparent' => 80,
      'slideshow_filmstrip_rl_bg_color' => '3B3B3B',
      'slideshow_filmstrip_rl_btn_color' => 'FFFFFF',
      'slideshow_filmstrip_rl_btn_size' => 20,
      'slideshow_title_font_size' => 16,
      'slideshow_title_font' => 'segoe ui',
      'slideshow_title_color' => 'FFFFFF',
      'slideshow_title_opacity' => 70,
      'slideshow_title_border_radius' => '5px',
      'slideshow_title_background_color' => '000000',
      'slideshow_title_padding' => '0 0 0 0',
      'slideshow_description_font_size' => 14,
      'slideshow_description_font' => 'segoe ui',
      'slideshow_description_color' => 'FFFFFF',
      'slideshow_description_opacity' => 70,
      'slideshow_description_border_radius' => '0',
      'slideshow_description_background_color' => '000000',
      'slideshow_description_padding' => '5px 10px 5px 10px',
      'slideshow_dots_width' => 12,
      'slideshow_dots_height' => 12,
      'slideshow_dots_border_radius' => '5px',
      'slideshow_dots_background_color' => 'F2D22E',
      'slideshow_dots_margin' => 3,
      'slideshow_dots_active_background_color' => 'FFFFFF',
      'slideshow_dots_active_border_width' => 1,
      'slideshow_dots_active_border_color' => '000000',
      'slideshow_play_pause_btn_size' => 60,
      'slideshow_rl_btn_style' => 'fa-chevron',

      'blog_style_margin' => '2px',
      'blog_style_padding' => '0',
      'blog_style_border_radius' => '0',
      'blog_style_border_width' => 1,
      'blog_style_border_style' => 'solid',
      'blog_style_border_color' => 'F5F5F5',
      'blog_style_bg_color' => 'FFFFFF',    
      'blog_style_transparent' => 80,
      'blog_style_box_shadow' => '',
      'blog_style_align' => 'center',
      'blog_style_share_buttons_margin' => '5px auto 10px auto',
      'blog_style_share_buttons_border_radius' => '0',
      'blog_style_share_buttons_border_width' => 0,
      'blog_style_share_buttons_border_style' => 'none',
      'blog_style_share_buttons_border_color' => '000000',
      'blog_style_share_buttons_bg_color' => 'FFFFFF',
      'blog_style_share_buttons_align' => 'right',
      'blog_style_img_font_size' => 16,
      'blog_style_img_font_family' => 'segoe ui',
      'blog_style_img_font_color' => '000000',
      'blog_style_share_buttons_color' => 'B3AFAF',
      'blog_style_share_buttons_bg_transparent' => 0,
      'blog_style_share_buttons_font_size' => 20,

      'image_browser_margin' =>  '2px auto',
      'image_browser_padding' =>  '4px',
      'image_browser_border_radius'=>  '0',
      'image_browser_border_width' =>  1,
      'image_browser_border_style' => 'none',
      'image_browser_border_color' => 'F5F5F5',
      'image_browser_bg_color' => 'EBEBEB',
      'image_browser_box_shadow' => '',
      'image_browser_transparent' => 80,
      'image_browser_align' => 'center',	
      'image_browser_image_description_margin' => '0px 5px 0px 5px',
      'image_browser_image_description_padding' => '8px 8px 8px 8px',
      'image_browser_image_description_border_radius' => '0',
      'image_browser_image_description_border_width' => 1,
      'image_browser_image_description_border_style' => 'none',
      'image_browser_image_description_border_color' => 'FFFFFF',
      'image_browser_image_description_bg_color' => 'EBEBEB',
      'image_browser_image_description_align' => 'center',	
      'image_browser_img_font_size' => 15,
      'image_browser_img_font_family' => 'segoe ui',
      'image_browser_img_font_color' => '000000',
      'image_browser_full_padding' => '4px',
      'image_browser_full_border_radius' => '0',
      'image_browser_full_border_width' => 2,
      'image_browser_full_border_style' => 'none',
      'image_browser_full_border_color' => 'F7F7F7',
      'image_browser_full_bg_color' => 'F5F5F5',
      'image_browser_full_transparent' => 90,

      'lightbox_info_pos' => 'top',
      'lightbox_info_align' => 'right',
      'lightbox_info_bg_color' => '000000',
      'lightbox_info_bg_transparent' => 70,
      'lightbox_info_border_width' => 1,
      'lightbox_info_border_style' => 'none',
      'lightbox_info_border_color' => '000000',
      'lightbox_info_border_radius' => '5px',
      'lightbox_info_padding' => '5px',
      'lightbox_info_margin' => '15px',
      'lightbox_title_color' => 'FFFFFF',
      'lightbox_title_font_style' => 'segoe ui',
      'lightbox_title_font_weight' => 'bold',
      'lightbox_title_font_size' => 18,
      'lightbox_description_color' => 'FFFFFF',
      'lightbox_description_font_style' => 'segoe ui',
      'lightbox_description_font_weight' => 'normal',
      'lightbox_description_font_size' => 14,

      'lightbox_rate_pos' => 'bottom',
      'lightbox_rate_align' => 'right',
      'lightbox_rate_icon' => 'star',
      'lightbox_rate_color' => 'F9D062',
      'lightbox_rate_size' => 20,
      'lightbox_rate_stars_count' => 5,
      'lightbox_rate_padding' => '15px',
      'lightbox_rate_hover_color' => 'F7B50E',

      'lightbox_hit_pos' => 'bottom',
      'lightbox_hit_align' => 'left',
      'lightbox_hit_bg_color' => '000000',
      'lightbox_hit_bg_transparent' => 70,
      'lightbox_hit_border_width' => 1,
      'lightbox_hit_border_style' => 'none',
      'lightbox_hit_border_color' => '000000',
      'lightbox_hit_border_radius' => '5px',
      'lightbox_hit_padding' => '5px',
      'lightbox_hit_margin' => '0 5px',
      'lightbox_hit_color' => 'FFFFFF',
      'lightbox_hit_font_style' => 'segoe ui',
      'lightbox_hit_font_weight' => 'normal',
      'lightbox_hit_font_size' => 14,
      'masonry_description_font_size' => 12,
			'masonry_description_color' => 'CCCCCC',
			'masonry_description_font_style' => 'segoe ui',

			'album_masonry_back_font_color' => '000000',
      'album_masonry_back_font_style' => 'segoe ui',
      'album_masonry_back_font_size' => 16,
      'album_masonry_back_font_weight' => 'bold',
      'album_masonry_back_padding' => '0',
      'album_masonry_title_font_color' => 'CCCCCC',
      'album_masonry_title_font_style' => 'segoe ui',
      'album_masonry_thumb_title_pos' => 'bottom',
      'album_masonry_title_font_size' => 16,
      'album_masonry_title_font_weight' => 'bold',
      'album_masonry_title_margin' => '2px',
      'album_masonry_title_shadow' => '0px 0px 0px #888888',
      'album_masonry_thumb_margin' => 4,
      'album_masonry_thumb_padding' => 0,
      'album_masonry_thumb_border_radius' => '0',
      'album_masonry_thumb_border_width' => 0,
      'album_masonry_thumb_border_style' => 'none',
      'album_masonry_thumb_border_color' => 'CCCCCC',
      'album_masonry_thumb_bg_color' => 'FFFFFF',
      'album_masonry_thumbs_bg_color' => 'FFFFFF',
      'album_masonry_thumb_bg_transparent' => 0,
      'album_masonry_thumb_box_shadow' => '0px 0px 0px #888888',
      'album_masonry_thumb_transparent' => 100,
      'album_masonry_thumb_align' => 'center',
      'album_masonry_thumb_hover_effect' => 'scale',
      'album_masonry_thumb_hover_effect_value' => '1.1',
      'album_masonry_thumb_transition' => 0,
      
      'mosaic_thumb_padding' => 4,
      'mosaic_thumb_border_radius' => '0',
      'mosaic_thumb_border_width' => 0,
      'mosaic_thumb_border_style' => 'none',
      'mosaic_thumb_border_color' => 'CCCCCC',
      'mosaic_thumbs_bg_color' => 'FFFFFF',
      'mosaic_thumb_bg_transparent' => 0,
      'mosaic_thumb_transparent' => 100,
      'mosaic_thumb_align' => 'center',
      'mosaic_thumb_hover_effect' => 'scale',
      'mosaic_thumb_hover_effect_value' => '1.1',
      'mosaic_thumb_title_font_color' => 'CCCCCC',
      'mosaic_thumb_title_font_style' => 'segoe ui',
      'mosaic_thumb_title_font_weight' => 'bold',
      'mosaic_thumb_title_margin' => '2px',
      'mosaic_thumb_title_shadow' => '0px 0px 0px #888888',
      'mosaic_thumb_title_font_size' => 16,
      
      'carousel_cont_bg_color' => '000000',
      'carousel_cont_btn_transparent' =>  0, 
      'carousel_close_btn_transparent' =>  100, 
      'carousel_rl_btn_bg_color' => '000000',
      'carousel_rl_btn_border_radius' => '20px',  
      'carousel_rl_btn_border_width' =>  0,
      'carousel_rl_btn_border_style' => 'none',
      'carousel_rl_btn_border_color' => 'FFFFFF',       
      'carousel_rl_btn_color' => 'FFFFFF',
      'carousel_rl_btn_height' => 40, 
      'carousel_rl_btn_size' => 20,
      'carousel_play_pause_btn_size' => 20,
      'carousel_rl_btn_width' => 40,
      'carousel_close_rl_btn_hover_color' => 'CCCCCC',
      'carousel_rl_btn_style' => 'fa-chevron',
      'carousel_mergin_bottom' => '0.5',     
      'carousel_font_family' => 'Arial',
      'carousel_feature_border_width' => 2,
      'carousel_feature_border_style' => 'solid',
      'carousel_feature_border_color' => '5D204F',       
      'carousel_caption_background_color' => '000000',
      'carousel_caption_bottom' => 0,
      'carousel_caption_p_mergin' => 0, 
      'carousel_caption_p_pedding' => 5,   
      'carousel_caption_p_font_weight' => 'bold', 
      'carousel_caption_p_font_size' => 14,
      'carousel_caption_p_color' => 'white',
      'carousel_title_opacity' => 100,
      'carousel_title_border_radius' => '5px',
      'mosaic_thumb_transition' => 1,
    );
    $theme2 = array(
      'thumb_margin' => 4,
      'thumb_padding' => 4,
      'thumb_border_radius' => '0',
      'thumb_border_width' => 5,
      'thumb_border_style' => 'none',
      'thumb_border_color' => 'FFFFFF',
      'thumb_bg_color' => 'E8E8E8',
      'thumbs_bg_color' => 'FFFFFF',
      'thumb_bg_transparent' => 0,
      'thumb_box_shadow' => '0px 0px 0px #888888',
      'thumb_transparent' => 100,
      'thumb_align' => 'center',
      'thumb_hover_effect' => 'rotate',
      'thumb_hover_effect_value' => '2deg',
      'thumb_transition' => 1,
      'thumb_title_font_color' => 'CCCCCC',
      'thumb_title_font_style' => 'segoe ui',
      'thumb_title_pos' => 'bottom',
      'thumb_title_font_size' => 16,
      'thumb_title_font_weight' => 'bold',
      'thumb_title_margin' => '5px',
      'thumb_title_shadow' => '',

      'page_nav_position' => 'bottom',
      'page_nav_align' => 'center',
      'page_nav_number' => 0,
      'page_nav_font_size' => 12,
      'page_nav_font_style' => 'segoe ui',
      'page_nav_font_color' => '666666',
      'page_nav_font_weight' => 'bold',
      'page_nav_border_width' => 1,
      'page_nav_border_style' => 'none',
      'page_nav_border_color' => 'E3E3E3',
      'page_nav_border_radius' => '0',
      'page_nav_margin' => '0',
      'page_nav_padding' => '3px 6px',
      'page_nav_button_bg_color' => 'FCFCFC',
      'page_nav_button_bg_transparent' => 100,
      'page_nav_box_shadow' => '0',
      'page_nav_button_transition' => 1,
      'page_nav_button_text' => 0,

      'lightbox_overlay_bg_color' => '000000',
      'lightbox_overlay_bg_transparent' => 70,
      'lightbox_bg_color' => '000000',
      'lightbox_ctrl_btn_pos' => 'bottom',
      'lightbox_ctrl_btn_align' => 'center',
      'lightbox_ctrl_btn_height' => 20,
      'lightbox_ctrl_btn_margin_top' => 10,
      'lightbox_ctrl_btn_margin_left' => 7,
      'lightbox_ctrl_btn_transparent' => 80,
      'lightbox_ctrl_btn_color' => 'FFFFFF',
      'lightbox_toggle_btn_height' => 14,
      'lightbox_toggle_btn_width' => 100,
      'lightbox_ctrl_cont_bg_color' => '000000',
      'lightbox_ctrl_cont_transparent' => 80,
      'lightbox_ctrl_cont_border_radius' => 4,
      'lightbox_close_btn_transparent' => 95,
      'lightbox_close_btn_bg_color' => '000000',
      'lightbox_close_btn_border_width' => 0,
      'lightbox_close_btn_border_radius' => '16px',
      'lightbox_close_btn_border_style' => 'none',
      'lightbox_close_btn_border_color' => 'FFFFFF',
      'lightbox_close_btn_box_shadow' => '',
      'lightbox_close_btn_color' => 'FFFFFF',
      'lightbox_close_btn_size' => 10,
      'lightbox_close_btn_width' => 20,
      'lightbox_close_btn_height' => 20,
      'lightbox_close_btn_top' => '-10',
      'lightbox_close_btn_right' => '-10',
      'lightbox_close_btn_full_color' => 'FFFFFF',
      'lightbox_rl_btn_bg_color' => '000000',
      'lightbox_rl_btn_border_radius' => '20px',
      'lightbox_rl_btn_border_width' => 2,
      'lightbox_rl_btn_border_style' => 'none',
      'lightbox_rl_btn_border_color' => 'FFFFFF',
      'lightbox_rl_btn_box_shadow' => '',
      'lightbox_rl_btn_color' => 'FFFFFF',
      'lightbox_rl_btn_height' => 40,
      'lightbox_rl_btn_width' => 40,
      'lightbox_rl_btn_size' => 20,
      'lightbox_close_rl_btn_hover_color' => 'FFFFFF',
      'lightbox_comment_pos' => 'left',
      'lightbox_comment_width' => 400,
      'lightbox_comment_bg_color' => '000000',
      'lightbox_comment_font_color' => 'CCCCCC',
      'lightbox_comment_font_style' => 'arial',
      'lightbox_comment_font_size' => 12,
      'lightbox_comment_button_bg_color' => '333333',
      'lightbox_comment_button_border_color' => '666666',
      'lightbox_comment_button_border_width' => 1,
      'lightbox_comment_button_border_style' => 'none',
      'lightbox_comment_button_border_radius' => '3px',
      'lightbox_comment_button_padding' => '3px 10px',
      'lightbox_comment_input_bg_color' => '333333',
      'lightbox_comment_input_border_color' => '666666',
      'lightbox_comment_input_border_width' => 1,
      'lightbox_comment_input_border_style' => 'none',
      'lightbox_comment_input_border_radius' => '0',
      'lightbox_comment_input_padding' => '3px',
      'lightbox_comment_separator_width' => 1,
      'lightbox_comment_separator_style' => 'solid',
      'lightbox_comment_separator_color' => '2B2B2B',
      'lightbox_comment_author_font_size' => 14,
      'lightbox_comment_date_font_size' => 10,
      'lightbox_comment_body_font_size' => 12,
      'lightbox_comment_share_button_color' => 'FFFFFF',
      'lightbox_filmstrip_pos' => 'top',
      'lightbox_filmstrip_rl_bg_color' => '2B2B2B',
      'lightbox_filmstrip_rl_btn_size' => 20,
      'lightbox_filmstrip_rl_btn_color' => 'FFFFFF',
      'lightbox_filmstrip_thumb_margin' => '0 1px',
      'lightbox_filmstrip_thumb_border_width' => 1,
      'lightbox_filmstrip_thumb_border_style' => 'none',
      'lightbox_filmstrip_thumb_border_color' => '000000',
      'lightbox_filmstrip_thumb_border_radius' => '0',
      'lightbox_filmstrip_thumb_deactive_transparent' => 80,
      'lightbox_filmstrip_thumb_active_border_width' => 0,
      'lightbox_filmstrip_thumb_active_border_color' => 'FFFFFF',
      'lightbox_rl_btn_style' => 'fa-chevron',
      'lightbox_rl_btn_transparent' => 80,
      'lightbox_bg_transparent' => 100,

      'album_compact_back_font_color' => '000000',
      'album_compact_back_font_style' => 'segoe ui',
      'album_compact_back_font_size' => 14,
      'album_compact_back_font_weight' => 'normal',
      'album_compact_back_padding' => '0',
      'album_compact_title_font_color' => 'CCCCCC',
      'album_compact_title_font_style' => 'segoe ui',
      'album_compact_thumb_title_pos' => 'bottom',
      'album_compact_title_font_size' => 16,
      'album_compact_title_font_weight' => 'bold',
      'album_compact_title_margin' => '5px',
      'album_compact_title_shadow' => '',
      'album_compact_thumb_margin' => 4,
      'album_compact_thumb_padding' => 4,
      'album_compact_thumb_border_radius' => '0',
      'album_compact_thumb_border_width' => 1,
      'album_compact_thumb_border_style' => 'none',
      'album_compact_thumb_border_color' => '000000',
      'album_compact_thumb_bg_color' => 'E8E8E8',
      'album_compact_thumbs_bg_color' => 'FFFFFF',
      'album_compact_thumb_bg_transparent' => 100,
      'album_compact_thumb_box_shadow' => '',
      'album_compact_thumb_transparent' => 100,
      'album_compact_thumb_align' => 'center',
      'album_compact_thumb_hover_effect' => 'rotate',
      'album_compact_thumb_hover_effect_value' => '2deg',
      'album_compact_thumb_transition' => 1,

      'album_extended_thumb_margin' => 2,
      'album_extended_thumb_padding' => 4,
      'album_extended_thumb_border_radius' => '0',
      'album_extended_thumb_border_width' => 4,
      'album_extended_thumb_border_style' => 'none',
      'album_extended_thumb_border_color' => 'E8E8E8',
      'album_extended_thumb_bg_color' => 'E8E8E8',
      'album_extended_thumbs_bg_color' => 'FFFFFF',
      'album_extended_thumb_bg_transparent' => 100,
      'album_extended_thumb_box_shadow' => '',
      'album_extended_thumb_transparent' => 100,
      'album_extended_thumb_align' => 'left',
      'album_extended_thumb_hover_effect' => 'rotate',
      'album_extended_thumb_hover_effect_value' => '2deg',
      'album_extended_thumb_transition' => 0,
      'album_extended_back_font_color' => '000000',
      'album_extended_back_font_style' => 'segoe ui',
      'album_extended_back_font_size' => 16,
      'album_extended_back_font_weight' => 'bold',
      'album_extended_back_padding' => '0',
      'album_extended_div_bg_color' => 'FFFFFF',
      'album_extended_div_bg_transparent' => 0,
      'album_extended_div_border_radius' => '0',
      'album_extended_div_margin' => '0 0 5px 0',
      'album_extended_div_padding' => 10,
      'album_extended_div_separator_width' => 1,
      'album_extended_div_separator_style' => 'none',
      'album_extended_div_separator_color' => 'CCCCCC',
      'album_extended_thumb_div_bg_color' => 'FFFFFF',
      'album_extended_thumb_div_border_radius' => '0',
      'album_extended_thumb_div_border_width' => 0,
      'album_extended_thumb_div_border_style' => 'none',
      'album_extended_thumb_div_border_color' => 'CCCCCC',
      'album_extended_thumb_div_padding' => '0',
      'album_extended_text_div_bg_color' => 'FFFFFF',
      'album_extended_text_div_border_radius' => '0',
      'album_extended_text_div_border_width' => 1,
      'album_extended_text_div_border_style' => 'none',
      'album_extended_text_div_border_color' => 'CCCCCC',
      'album_extended_text_div_padding' => '5px',
      'album_extended_title_span_border_width' => 1,
      'album_extended_title_span_border_style' => 'none',
      'album_extended_title_span_border_color' => 'CCCCCC',
      'album_extended_title_font_color' => '000000',
      'album_extended_title_font_style' => 'segoe ui',
      'album_extended_title_font_size' => 16,
      'album_extended_title_font_weight' => 'bold',
      'album_extended_title_margin_bottom' => 2,
      'album_extended_title_padding' => '2px',
      'album_extended_desc_span_border_width' => 1,
      'album_extended_desc_span_border_style' => 'none',
      'album_extended_desc_span_border_color' => 'CCCCCC',
      'album_extended_desc_font_color' => '000000',
      'album_extended_desc_font_style' => 'segoe ui',
      'album_extended_desc_font_size' => 14,
      'album_extended_desc_font_weight' => 'normal',
      'album_extended_desc_padding' => '2px',
      'album_extended_desc_more_color' => 'FFC933',
      'album_extended_desc_more_size' => 12,

      'masonry_thumb_padding' => 4,
      'masonry_thumb_border_radius' => '2px',
      'masonry_thumb_border_width' => 1,
      'masonry_thumb_border_style' => 'none',
      'masonry_thumb_border_color' => 'CCCCCC',
      'masonry_thumbs_bg_color' => 'FFFFFF',
      'masonry_thumb_bg_transparent' => 0,
      'masonry_thumb_transparent' => 80,
      'masonry_thumb_align' => 'center',
      'masonry_thumb_hover_effect' => 'rotate',
      'masonry_thumb_hover_effect_value' => '2deg',
      'masonry_thumb_transition' => 0,

      'slideshow_cont_bg_color' => '000000',
      'slideshow_close_btn_transparent' => 100,
      'slideshow_rl_btn_bg_color' => '000000',
      'slideshow_rl_btn_border_radius' => '20px',
      'slideshow_rl_btn_border_width' => 0,
      'slideshow_rl_btn_border_style' => 'none',
      'slideshow_rl_btn_border_color' => 'FFFFFF',
      'slideshow_rl_btn_box_shadow' => '',
      'slideshow_rl_btn_color' => 'FFFFFF',
      'slideshow_rl_btn_height' => 40,
      'slideshow_rl_btn_size' => 20,
      'slideshow_rl_btn_width' => 40,
      'slideshow_close_rl_btn_hover_color' => 'DBDBDB',
      'slideshow_filmstrip_pos' => 'bottom',
      'slideshow_filmstrip_thumb_border_width' => 1,
      'slideshow_filmstrip_thumb_border_style' => 'none',
      'slideshow_filmstrip_thumb_border_color' =>  '000000',
      'slideshow_filmstrip_thumb_border_radius' => '0',
      'slideshow_filmstrip_thumb_margin' =>  '0 1px',
      'slideshow_filmstrip_thumb_active_border_width' => 0,
      'slideshow_filmstrip_thumb_active_border_color' => 'FFFFFF',
      'slideshow_filmstrip_thumb_deactive_transparent' => 80,
      'slideshow_filmstrip_rl_bg_color' => '303030',
      'slideshow_filmstrip_rl_btn_color' => 'FFFFFF',
      'slideshow_filmstrip_rl_btn_size' => 20,
      'slideshow_title_font_size' => 16,
      'slideshow_title_font' => 'segoe ui',
      'slideshow_title_color' => 'FFFFFF',
      'slideshow_title_opacity' => 70,
      'slideshow_title_border_radius' => '5px',
      'slideshow_title_background_color' => '000000',
      'slideshow_title_padding' => '5px 10px 5px 10px',
      'slideshow_description_font_size' => 14,
      'slideshow_description_font' => 'segoe ui',
      'slideshow_description_color' => 'FFFFFF',
      'slideshow_description_opacity' => 70,
      'slideshow_description_border_radius' => '0',
      'slideshow_description_background_color' => '000000',
      'slideshow_description_padding' => '5px 10px 5px 10px',
      'slideshow_dots_width' => 10,
      'slideshow_dots_height' => 10,
      'slideshow_dots_border_radius' => '10px',
      'slideshow_dots_background_color' => '292929',
      'slideshow_dots_margin' => 1,
      'slideshow_dots_active_background_color' => '292929',
      'slideshow_dots_active_border_width' => 2,
      'slideshow_dots_active_border_color' => 'FFC933',
      'slideshow_play_pause_btn_size' => 60,
      'slideshow_rl_btn_style' => 'fa-chevron',

      'blog_style_margin' => '2px',
      'blog_style_padding' => '4px',
      'blog_style_border_radius' => '0',
      'blog_style_border_width' => 1,
      'blog_style_border_style' => 'none',
      'blog_style_border_color' => 'CCCCCC',
      'blog_style_bg_color' => 'E8E8E8',    
      'blog_style_transparent' => 70,
      'blog_style_box_shadow' => '',
      'blog_style_align' => 'center',
      'blog_style_share_buttons_margin' => '5px auto 10px auto',
      'blog_style_share_buttons_border_radius' => '0',
      'blog_style_share_buttons_border_width' => 0,
      'blog_style_share_buttons_border_style' => 'none',
      'blog_style_share_buttons_border_color' => '000000',
      'blog_style_share_buttons_bg_color' => 'FFFFFF',
      'blog_style_share_buttons_align' => 'right',
      'blog_style_img_font_size' => 16,
      'blog_style_img_font_family' => 'segoe ui',
      'blog_style_img_font_color' => '000000',
      'blog_style_share_buttons_color' => 'A1A1A1',
      'blog_style_share_buttons_bg_transparent' => 0,
      'blog_style_share_buttons_font_size' => 20,

      'image_browser_margin' =>  '2px auto',
      'image_browser_padding' =>  '4px',
      'image_browser_border_radius'=>  '2px',
      'image_browser_border_width' =>  1,
      'image_browser_border_style' => 'none',
      'image_browser_border_color' => 'E8E8E8',
      'image_browser_bg_color' => 'E8E8E8',
      'image_browser_box_shadow' => '',
      'image_browser_transparent' => 80,
      'image_browser_align' => 'center',	
      'image_browser_image_description_margin' => '24px 0px 0px 0px',
      'image_browser_image_description_padding' => '8px 8px 8px 8px',
      'image_browser_image_description_border_radius' => '0',
      'image_browser_image_description_border_width' => 1,
      'image_browser_image_description_border_style' => 'none',
      'image_browser_image_description_border_color' => 'FFFFFF',
      'image_browser_image_description_bg_color' => 'E8E8E8',
      'image_browser_image_description_align' => 'center',	
      'image_browser_img_font_size' => 14,
      'image_browser_img_font_family' => 'segoe ui',
      'image_browser_img_font_color' => '000000',
      'image_browser_full_padding' => '4px',
      'image_browser_full_border_radius' => '0',
      'image_browser_full_border_width' => 1,
      'image_browser_full_border_style' => 'solid',
      'image_browser_full_border_color' => 'EDEDED',
      'image_browser_full_bg_color' => 'FFFFFF',
      'image_browser_full_transparent' => 90,

      'lightbox_info_pos' => 'top',
      'lightbox_info_align' => 'right',
      'lightbox_info_bg_color' => '000000',
      'lightbox_info_bg_transparent' => 70,
      'lightbox_info_border_width' => 1,
      'lightbox_info_border_style' => 'none',
      'lightbox_info_border_color' => '000000',
      'lightbox_info_border_radius' => '5px',
      'lightbox_info_padding' => '5px',
      'lightbox_info_margin' => '15px',
      'lightbox_title_color' => 'FFFFFF',
      'lightbox_title_font_style' => 'segoe ui',
      'lightbox_title_font_weight' => 'bold',
      'lightbox_title_font_size' => 18,
      'lightbox_description_color' => 'FFFFFF',
      'lightbox_description_font_style' => 'segoe ui',
      'lightbox_description_font_weight' => 'normal',
      'lightbox_description_font_size' => 14,

      'lightbox_rate_pos' => 'bottom',
      'lightbox_rate_align' => 'right',
      'lightbox_rate_icon' => 'star',
      'lightbox_rate_color' => 'F9D062',
      'lightbox_rate_size' => 20,
      'lightbox_rate_stars_count' => 5,
      'lightbox_rate_padding' => '15px',
      'lightbox_rate_hover_color' => 'F7B50E',

      'lightbox_hit_pos' => 'bottom',
      'lightbox_hit_align' => 'left',
      'lightbox_hit_bg_color' => '000000',
      'lightbox_hit_bg_transparent' => 70,
      'lightbox_hit_border_width' => 1,
      'lightbox_hit_border_style' => 'none',
      'lightbox_hit_border_color' => '000000',
      'lightbox_hit_border_radius' => '5px',
      'lightbox_hit_padding' => '5px',
      'lightbox_hit_margin' => '0 5px',
      'lightbox_hit_color' => 'FFFFFF',
      'lightbox_hit_font_style' => 'segoe ui',
      'lightbox_hit_font_weight' => 'normal',
      'lightbox_hit_font_size' => 14,
      'masonry_description_font_size' => 12,
			'masonry_description_color' => 'CCCCCC',
			'masonry_description_font_style' => 'segoe ui',

			'album_masonry_back_font_color' => '000000',
      'album_masonry_back_font_style' => 'segoe ui',
      'album_masonry_back_font_size' => 14,
      'album_masonry_back_font_weight' => 'normal',
      'album_masonry_back_padding' => '0',
      'album_masonry_title_font_color' => 'CCCCCC',
      'album_masonry_title_font_style' => 'segoe ui',
      'album_masonry_thumb_title_pos' => 'bottom',
      'album_masonry_title_font_size' => 16,
      'album_masonry_title_font_weight' => 'bold',
      'album_masonry_title_margin' => '5px',
      'album_masonry_title_shadow' => '',
      'album_masonry_thumb_margin' => 4,
      'album_masonry_thumb_padding' => 4,
      'album_masonry_thumb_border_radius' => '0',
      'album_masonry_thumb_border_width' => 1,
      'album_masonry_thumb_border_style' => 'none',
      'album_masonry_thumb_border_color' => '000000',
      'album_masonry_thumb_bg_color' => 'E8E8E8',
      'album_masonry_thumbs_bg_color' => 'FFFFFF',
      'album_masonry_thumb_bg_transparent' => 100,
      'album_masonry_thumb_box_shadow' => '',
      'album_masonry_thumb_transparent' => 100,
      'album_masonry_thumb_align' => 'center',
      'album_masonry_thumb_hover_effect' => 'rotate',
      'album_masonry_thumb_hover_effect_value' => '2deg',
      'album_masonry_thumb_transition' => 1,

      'mosaic_thumb_padding' => 4,
      'mosaic_thumb_border_radius' => '2px',
      'mosaic_thumb_border_width' => 1,
      'mosaic_thumb_border_style' => 'none',
      'mosaic_thumb_border_color' => 'CCCCCC',
      'mosaic_thumbs_bg_color' => 'FFFFFF',
      'mosaic_thumb_bg_transparent' => 0,
      'mosaic_thumb_transparent' => 80,
      'mosaic_thumb_align' => 'center',
      'mosaic_thumb_hover_effect' => 'rotate',
      'mosaic_thumb_hover_effect_value' => '2deg',
      'mosaic_thumb_title_font_color' => 'CCCCCC',
      'mosaic_thumb_title_font_style' => 'segoe ui',
      'mosaic_thumb_title_font_weight' => 'bold',
      'mosaic_thumb_title_margin' => '2px',
      'mosaic_thumb_title_shadow' => '0px 0px 0px #888888',
      'mosaic_thumb_title_font_size' => 16,
      
      'carousel_cont_bg_color' => '000000',
      'carousel_cont_btn_transparent' =>  0, 
      'carousel_close_btn_transparent' =>  100, 
      'carousel_rl_btn_bg_color' => '000000',
      'carousel_rl_btn_border_radius' => '20px',  
      'carousel_rl_btn_border_width' =>  0,
      'carousel_rl_btn_border_style' => 'none',
      'carousel_rl_btn_border_color' => 'FFFFFF',       
      'carousel_rl_btn_color' => 'FFFFFF',
      'carousel_rl_btn_height' => 40, 
      'carousel_rl_btn_size' => 20,
      'carousel_play_pause_btn_size' => 20,
      'carousel_rl_btn_width' => 40,
      'carousel_close_rl_btn_hover_color' => 'CCCCCC',
      'carousel_rl_btn_style' => 'fa-chevron',
      'carousel_mergin_bottom' => '0.5',    
      'carousel_font_family' => 'Arial',
      'carousel_feature_border_width' => 2,
      'carousel_feature_border_style' => 'solid',
      'carousel_feature_border_color' => '5D204F',       
      'carousel_caption_background_color' => '000000',
      'carousel_caption_bottom' => 0,
      'carousel_caption_p_mergin' => 0, 
      'carousel_caption_p_pedding' => 5,   
      'carousel_caption_p_font_weight' => 'bold', 
      'carousel_caption_p_font_size' => 14,
      'carousel_caption_p_color' => 'white',
      'carousel_title_opacity' => 100,
      'carousel_title_border_radius' => '5px',
      'default_theme' => 0,
      'mosaic_thumb_transition' => 1
    );
    $theme1 = json_encode($theme1);
    $theme2 = json_encode($theme2);
  if (!$exists_default) {
    $wpdb->insert($wpdb->prefix . 'bwg_theme', array(
      'id' => 1,
      'name' => 'Theme 1',
      'options' => $theme1,
      'default_theme' => 1
    ));

    $wpdb->insert($wpdb->prefix . 'bwg_theme', array(
      'id' => 2,
      'name' => 'Theme 2',
      'options' => $theme2,
      'default_theme' => 0
    ));
  }
  $version = WD_BWG_VERSION;
  $new_version = '1.2.107';
  if ($version && version_compare($version, $new_version, '<')) {
    require_once WD_BWG_DIR . "/update/bwg_update.php";
    bwg_update($version);
    update_option("wd_bwg_version", $new_version);
    delete_user_meta(get_current_user_id(), 'bwg_photo_gallery');
  }
  elseif (!$version) {
    update_user_meta(get_current_user_id(),'bwg_photo_gallery', '1');
    add_option("wd_bwg_version", $new_version, '', 'no');
    add_option("wd_bwg_theme_version", '1.0.0', '', 'no');
  }
  else {
    add_option("wd_bwg_version", $new_version, '', 'no');
    add_option("wd_bwg_theme_version", '1.0.0', '', 'no');
  }
}

function bwg_global_activate($networkwide) {
  if (function_exists('is_multisite') && is_multisite()) {
    // Check if it is a network activation - if so, run the activation function for each blog id.
    if ($networkwide) {
      global $wpdb;
      $old_blog = $wpdb->blogid;
      // Get all blog ids.
      $blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
      foreach ($blogids as $blog_id) {
        switch_to_blog($blog_id);
        bwg_activate();
      }
      switch_to_blog($old_blog);
      return;
    }
  }
  bwg_activate();
}
register_activation_hook(__FILE__, 'bwg_global_activate');

function bwg_new_blog_added($blog_id, $user_id, $domain, $path, $site_id, $meta ) {
  if (is_plugin_active_for_network('photo-gallery/photo-gallery.php')) {
    global $wpdb;
    $old_blog = $wpdb->blogid;
    switch_to_blog($blog_id);
    bwg_activate();
    switch_to_blog($old_blog);
  }
}
add_action('wpmu_new_blog', 'bwg_new_blog_added', 10, 6);

/*there is no instagram provider for https*/
wp_oembed_add_provider( '#https://instagr(\.am|am\.com)/p/.*#i', 'https://api.instagram.com/oembed', true );

function bwg_update_hook() {
  $version = WD_BWG_VERSION;
  $new_version = '1.2.107';
  if ($version && version_compare($version, $new_version, '<')) {
    require_once WD_BWG_DIR . "/update/bwg_update.php";
    bwg_update($version);
    update_option("wd_bwg_version", $new_version);
  }
}

function bwg_global_update() {
  if (function_exists('is_multisite') && is_multisite()) {
    global $wpdb;
    $old_blog = $wpdb->blogid;
    // Get all blog ids.
    $blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
    foreach ($blogids as $blog_id) {
      switch_to_blog($blog_id);
      bwg_update_hook();
    }
    switch_to_blog($old_blog);
    return;
  }
  bwg_update_hook();
}

if (!isset($_GET['action']) || $_GET['action'] != 'deactivate') {
  add_action('admin_init', 'bwg_global_update');
}

// Plugin styles.
function bwg_styles() {
  wp_admin_css('thickbox');
  wp_enqueue_style('bwg_tables', WD_BWG_URL . '/css/bwg_tables.css', array(), wd_bwg_version());
}

// Plugin scripts.
function bwg_scripts() {
  wp_enqueue_script('thickbox');
  wp_enqueue_script('bwg_admin', WD_BWG_URL . '/js/bwg.js', array(), wd_bwg_version());
  wp_localize_script('bwg_admin', 'bwg_objectL10B', array(
    'bwg_field_required'  => __('field is required.', 'bwg_back'),
    'bwg_select_image'  => __('You must select an image file.', 'bwg_back'),
    'bwg_select_audio'  => __('You must select an audio file.', 'bwg_back'),
    'bwg_client_id'  => __('You do not have Instagram CLIENT_ID. Input its value in Options->Embed options. ', 'bwg_back'),
    'bwg_post_number'  => __('Instagram recent post number must be between 1 and 33.', 'bwg_back'),
    'bwg_not_empty'  => __('The gallery is not empty. Please delete all the images first.', 'bwg_back'),
    'bwg_enter_url'  => __('Please enter url to embed.', 'bwg_back'),
    'bwg_cannot_response'  => __('Error: cannot get response from the server.', 'bwg_back'),
    'bwg_something_wrong'  => __('Error: something wrong happened at the server.', 'bwg_back'),
    'bwg_error'  => __('Error', 'bwg_back'),
    'bwg_show_order'  => __('Show order column', 'bwg_back'),
    'bwg_hide_order'  => __('Hide order column', 'bwg_back'),
    'selected'  => __('Selected', 'bwg_back'),
    'item'  => __('item', 'bwg_back'),
    'saved'  => __('Items Succesfully Saved.', 'bwg_back'),
    'recovered'  => __('Item Succesfully Recovered.', 'bwg_back'),
    'published'  => __('Item Succesfully Published.', 'bwg_back'),
    'unpublished'  => __('Item Succesfully Unpublished.', 'bwg_back'),
    'deleted'  => __('Item Succesfully Deleted.', 'bwg_back'),
    'one_item'  => __('You must select at least one item.', 'bwg_back'),
    'resized'  => __('Items Succesfully resized.', 'bwg_back'),
    'watermark_set'  => __('Watermarks Succesfully Set.', 'bwg_back'),
    'reset'  => __('Items Succesfully Reset.', 'bwg_back'),
  ));

  global $wp_scripts;
  if (isset($wp_scripts->registered['jquery'])) {
    $jquery = $wp_scripts->registered['jquery'];
    if (!isset($jquery->ver) OR version_compare($jquery->ver, '1.8.2', '<')) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', FALSE, array('jquery-core', 'jquery-migrate'), '1.10.2' );
    }
  }
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-sortable');
}

/* Add pagination to gallery admin pages.*/
function bwg_add_galleries_per_page_option(){
  $option = 'per_page';  
  $args_galleries = array(
    'label' => 'Items',
    'default' => 20,
    'option' => 'bwg_galleries_per_page'
  );
    add_screen_option( $option, $args_galleries ); 
}
function bwg_add_albums_per_page_option(){
  $option = 'per_page';  
  $args_albums = array(
    'label' => 'Items',
    'default' => 20,
    'option' => 'bwg_albums_per_page'
  );
    add_screen_option( $option, $args_albums ); 
}
function bwg_add_tags_per_page_option(){
  $option = 'per_page';  
  $args_tags = array(
    'label' => 'Tags',
    'default' => 20,
    'option' => 'bwg_tags_per_page'
  );
    add_screen_option( $option, $args_tags ); 
}
function bwg_add_themes_per_page_option(){
  $option = 'per_page';  
  $args_themes = array(
    'label' => 'Themes',
    'default' => 20,
    'option' => 'bwg_themes_per_page'
  );
    add_screen_option( $option, $args_themes ); 
}
function bwg_add_comments_per_page_option(){
  $option = 'per_page';  
  $args_comments = array(
    'label' => 'Comments',
    'default' => 20,
    'option' => 'bwg_comments_per_page'
  );
    add_screen_option( $option, $args_comments ); 
}
function bwg_add_rates_per_page_option(){
  $option = 'per_page';  
  $args_rates = array(
    'label' => 'Ratings',
    'default' => 20,
    'option' => 'bwg_rates_per_page'
  );
    add_screen_option( $option, $args_rates ); 
}

add_filter('set-screen-option', 'bwg_set_option_galleries', 10, 3);
add_filter('set-screen-option', 'bwg_set_option_albums', 10, 3);
add_filter('set-screen-option', 'bwg_set_option_tags', 10, 3);
add_filter('set-screen-option', 'bwg_set_option_themes', 10, 3);
add_filter('set-screen-option', 'bwg_set_option_comments', 10, 3);
add_filter('set-screen-option', 'bwg_set_option_rates', 10, 3);
 
function bwg_set_option_galleries($status, $option, $value) {
    if ( 'bwg_galleries_per_page' == $option ) return $value;
    return $status;
}
function bwg_set_option_albums($status, $option, $value) {
    if ( 'bwg_albums_per_page' == $option ) return $value;
    return $status;
}
function bwg_set_option_tags($status, $option, $value) {
    if ( 'bwg_tags_per_page' == $option ) return $value;
    return $status;
}
function bwg_set_option_themes($status, $option, $value) {
    if ( 'bwg_themes_per_page' == $option ) return $value;
    return $status;
}
function bwg_set_option_comments($status, $option, $value) {
    if ( 'bwg_comments_per_page' == $option ) return $value;
    return $status;
}
function bwg_set_option_rates($status, $option, $value) {
    if ( 'bwg_rates_per_page' == $option ) return $value;
    return $status;
}
function bwg_licensing_styles() {
  wp_enqueue_style('bwg_licensing', WD_BWG_URL . '/css/bwg_licensing.css');
}


function bwg_options_scripts() {
  wp_enqueue_script('thickbox');
  wp_enqueue_script('bwg_admin', WD_BWG_URL . '/js/bwg.js', array(), wd_bwg_version());
  global $wp_scripts;
  if (isset($wp_scripts->registered['jquery'])) {
    $jquery = $wp_scripts->registered['jquery'];
    if (!isset($jquery->ver) OR version_compare($jquery->ver, '1.8.2', '<')) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', FALSE, array('jquery-core', 'jquery-migrate'), '1.10.2' );
    }
  }
  wp_enqueue_script('jquery');
  wp_enqueue_script('jscolor', WD_BWG_URL . '/js/jscolor/jscolor.js', array(), '1.3.9');
}

function bwg_front_end_scripts() {
  $version = wd_bwg_version();
  global $wp_scripts;
  if (isset($wp_scripts->registered['jquery'])) {
    $jquery = $wp_scripts->registered['jquery'];
    if (!isset($jquery->ver) OR version_compare($jquery->ver, '1.8.2', '<')) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', FALSE, array('jquery-core', 'jquery-migrate'), '1.10.2' );
    }
  }
  wp_enqueue_script('jquery');
  /*wp_enqueue_style('jquery-ui', WD_BWG_FRONT_URL . '/css/jquery-ui-1.10.3.custom.css', array(), $version);*/

  wp_enqueue_script('bwg_frontend', WD_BWG_FRONT_URL . '/js/bwg_frontend.js', array(), $version);
  wp_enqueue_style('bwg_frontend', WD_BWG_FRONT_URL . '/css/bwg_frontend.css', array(), $version);
  wp_enqueue_script('bwg_sumoselect', WD_BWG_FRONT_URL . '/js/jquery.sumoselect.min.js', array(), $version);
  wp_enqueue_style('bwg_sumoselect', WD_BWG_FRONT_URL . '/css/sumoselect.css', array(), $version);
  // Styles/Scripts for popup.
  wp_enqueue_style('bwg_font-awesome', WD_BWG_FRONT_URL . '/css/font-awesome/font-awesome.css', array(), '4.2.0');
  wp_enqueue_script('bwg_jquery_mobile', WD_BWG_FRONT_URL . '/js/jquery.mobile.js', array(), $version);
  wp_enqueue_script('bwg_mCustomScrollbar', WD_BWG_FRONT_URL . '/js/jquery.mCustomScrollbar.concat.min.js', array(), $version);
  wp_enqueue_style('bwg_mCustomScrollbar', WD_BWG_FRONT_URL . '/css/jquery.mCustomScrollbar.css', array(), $version);
  wp_enqueue_script('jquery-fullscreen', WD_BWG_FRONT_URL . '/js/jquery.fullscreen-0.4.1.js', array(), '0.4.1');
  wp_enqueue_script('bwg_gallery_box', WD_BWG_FRONT_URL . '/js/bwg_gallery_box.js', array(), $version);
  wp_localize_script('bwg_gallery_box', 'bwg_objectL10n', array(
    'bwg_field_required'  => __('field is required.', 'bwg'),
    'bwg_mail_validation' => __('This is not a valid email address.', 'bwg'),
    'bwg_search_result' => __('There are no images matching your search.', 'bwg'),
  ));
  wp_localize_script('bwg_sumoselect', 'bwg_objectsL10n', array(
    'bwg_select_tag'  => __('Select Tag.', 'bwg'),
  ));
}
add_action('wp_enqueue_scripts', 'bwg_front_end_scripts');

// Languages localization.
function bwg_language_load() {
  load_plugin_textdomain('bwg', FALSE, basename(dirname(__FILE__)) . '/languages');
  load_plugin_textdomain('bwg_back', FALSE, basename(dirname(__FILE__)) . '/languages/backend');
}
add_action('init', 'bwg_language_load');

function bwg_create_post_type() {
  global $wpdb;
  $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1));
 
  if ($row->show_hide_post_meta == 1) {
     $show_hide_post_meta = array('editor', 'comments', 'thumbnail', 'title');
  }
  else {
     $show_hide_post_meta = array('thumbnail', 'title');
  }
  if ($row->show_hide_custom_post == 0) {
     $show_hide_custom_post = false;
  }
  else {
     $show_hide_custom_post = true;
  }
  $args = array(
    'public' => TRUE,
    'exclude_from_search' => TRUE,
    'publicly_queryable' => TRUE,
    'show_ui' => $show_hide_custom_post,
    'show_in_menu' => TRUE,
    'show_in_nav_menus' => FALSE,
    'permalink_epmask' => TRUE,
    'rewrite' => TRUE,
    'label'  => __('Galleries', 'bwg_back'),
    'supports' => $show_hide_post_meta
  );
  register_post_type( 'bwg_gallery', $args );

  $args = array(
    'public' => TRUE,
    'exclude_from_search' => TRUE,
    'publicly_queryable' => TRUE,
    'show_ui' => $show_hide_custom_post,
    'show_in_menu' => TRUE,
    'show_in_nav_menus' => FALSE,
    'permalink_epmask' => TRUE,
    'rewrite' => TRUE,
    'label'  => __('Albums', 'bwg_back'),
    'supports' => $show_hide_post_meta
  );
  register_post_type( 'bwg_album', $args );

  $args = array(
    'public' => TRUE,
    'exclude_from_search' => TRUE,
    'publicly_queryable' => TRUE,
    'show_ui' => $show_hide_custom_post,
    'show_in_menu' => TRUE,
    'show_in_nav_menus' => FALSE,
    'permalink_epmask' => TRUE,
    'rewrite' => TRUE,
    'label'  => __('Gallery tags', 'bwg_back'),
    'supports' => $show_hide_post_meta
  );
  register_post_type( 'bwg_tag', $args );
}
add_action( 'init', 'bwg_create_post_type' );

function bwg_widget_tag_cloud_args($args) {
  if ($args['taxonomy'] == 'bwg_tag') {
    require_once WD_BWG_DIR . "/frontend/models/BWGModelWidget.php";
    $model = new BWGModelWidgetFrontEnd();
    $tags = $model->get_tags_data(0);
  }
  return $args;
}
add_filter('widget_tag_cloud_args', 'bwg_widget_tag_cloud_args');

// Captcha.
function bwg_captcha() {
  if (isset($_GET['action']) && esc_html($_GET['action']) == 'bwg_captcha') {
    $i = (isset($_GET["i"]) ? esc_html($_GET["i"]) : '');
    $r2 = (isset($_GET["r2"]) ? (int) $_GET["r2"] : 0);
    $rrr = (isset($_GET["rrr"]) ? (int) $_GET["rrr"] : 0);
    $randNum = 0 + $r2 + $rrr;
    $digit = (isset($_GET["digit"]) ? (int) $_GET["digit"] : 0);
    $cap_width = $digit * 10 + 15;
    $cap_height = 26;
    $cap_quality = 100;
    $cap_length_min = $digit;
    $cap_length_max = $digit;
    $cap_digital = 1;
    $cap_latin_char = 1;
    function code_generic($_length, $_digital = 1, $_latin_char = 1) {
      $dig = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
      $lat = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
      $main = array();
      if ($_digital) {
        $main = array_merge($main, $dig);
      }
      if ($_latin_char) {
        $main = array_merge($main, $lat);
      }
      shuffle($main);
      $pass = substr(implode('', $main), 0, $_length);
      return $pass;
    }
    $l = rand($cap_length_min, $cap_length_max);
    $code = code_generic($l, $cap_digital, $cap_latin_char);
    @session_start();
    $_SESSION['bwg_captcha_code'] = $code;
    $canvas = imagecreatetruecolor($cap_width, $cap_height);
    $c = imagecolorallocate($canvas, rand(150, 255), rand(150, 255), rand(150, 255));
    imagefilledrectangle($canvas, 0, 0, $cap_width, $cap_height, $c);
    $count = strlen($code);
    $color_text = imagecolorallocate($canvas, 0, 0, 0);
    for ($it = 0; $it < $count; $it++) {
      $letter = $code[$it];
      imagestring($canvas, 6, (10 * $it + 10), $cap_height / 4, $letter, $color_text);
    }
    for ($c = 0; $c < 150; $c++) {
      $x = rand(0, $cap_width - 1);
      $y = rand(0, 29);
      $col = '0x' . rand(0, 9) . '0' . rand(0, 9) . '0' . rand(0, 9) . '0';
      imagesetpixel($canvas, $x, $y, $col);
    }
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');
    header('Content-Type: image/jpeg');
    imagejpeg($canvas, NULL, $cap_quality);
    die('');
  }
}

function wd_bwg_version() {
  $version = WD_BWG_VERSION;
  if ($version) {
    if (WD_BWG_PRO) {
      $version = substr_replace($version, '2', 0, 1);
    }
  }
  else{
    $version = '';
  }
  return $version;
}

if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
	include_once(WD_BWG_DIR . '/photo-gallery-notices.php');
  new BWG_Notices();
}
?>