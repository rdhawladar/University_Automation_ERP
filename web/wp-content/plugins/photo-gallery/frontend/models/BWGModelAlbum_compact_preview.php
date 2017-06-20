<?php

class BWGModelAlbum_compact_preview {
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
  public function get_theme_row_data($id) {
    global $wpdb;
    if ($id) {
      $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_theme WHERE id="%d"', $id));
    }
    else {      
      $row = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_theme WHERE default_theme=1');
    }
    if (isset($row->options)) {
      $row = (object) array_merge((array) $row, (array) json_decode($row->options));
    }
    return $row;
  }

  public function get_alb_gals_row($id, $albums_per_page, $sort_by, $bwg, $sort_direction = ' ASC ') {
    global $wpdb;
    if (isset($_REQUEST['page_number_' . $bwg]) && $_REQUEST['page_number_' . $bwg]) {
      $limit = ((int) $_REQUEST['page_number_' . $bwg] - 1) * $albums_per_page;
    }
    else {
      $limit = 0;
    }
    if ($albums_per_page) {
      $limit_str = 'LIMIT ' . $limit . ',' . $albums_per_page;
    }
    else {
      $limit_str = '';
    }
    $row = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_album_gallery WHERE album_id="%d" ORDER BY ' . ($sort_by == "RAND()" ? '' : '`') . $sort_by . ($sort_by == "RAND()" ? '' : '`') . $sort_direction . $limit_str, $id));
    return $row;
  }

  public function get_album_row_data($id) {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_album WHERE published=1 AND id="%d"', $id));
    if ($row) {
      $row->permalink = $this->bwg_create_post($row->name, $row->slug, "album", $id);
    }
    return $row;
  }

  public function get_gallery_row_data($id) {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_gallery WHERE published=1 AND id="%d"', $id));
    if ($row) {
      $row->permalink = $this->bwg_create_post($row->name, $row->slug, "gallery", $id);
    }
    return $row;
  }

  public function get_image_rows_data($id, $images_per_page, $sort_by, $bwg, $sort_direction = ' ASC ') {
    global $wpdb;
    if (isset($_REQUEST['page_number_' . $bwg]) && $_REQUEST['page_number_' . $bwg]) {
      $limit = ((int) $_REQUEST['page_number_' . $bwg] - 1) * $images_per_page;
    }
    else {
      $limit = 0;
    }
    if ($images_per_page) {
      $limit_str = 'LIMIT ' . $limit . ',' . $images_per_page;
    }
    else {
      $limit_str = '';
    }
    $bwg_search = ((isset($_POST['bwg_search_' . $bwg])) ? esc_html($_POST['bwg_search_' . $bwg]) : '');
    if ($bwg_search != '') {
      $where = 'AND (alt LIKE "%%' . $bwg_search . '%%" OR description LIKE "%%' . $bwg_search . '%%")';
    }
    else {
      $where = '';
    }
    if ($sort_by == 'random' || $sort_by == 'RAND()') {
      $sort_by = 'RAND()';
    }
    else {
      $sort_by = 'image.`' . $sort_by . '`';
    }
    if (isset($_REQUEST['bwg_tag_id_bwg_album_compact_' . $bwg]) && $_REQUEST['bwg_tag_id_bwg_album_compact_' . $bwg]) {
	    $row = $wpdb->get_results($wpdb->prepare('SELECT image.* FROM ' . $wpdb->prefix . 'bwg_image AS image INNER JOIN 
	   (SELECT GROUP_CONCAT( tag_id SEPARATOR ",") AS tags, image_id FROM  ' . $wpdb->prefix . 'bwg_image_tag WHERE gallery_id="' . $id . '"  GROUP BY image_id) AS tag ON image.id=tag.image_id WHERE image.published=1 ' . $where . ' AND CONCAT(",", tag.tags, ",") REGEXP ",('.implode("|",$_REQUEST['bwg_tag_id_bwg_album_compact_' . $bwg]).')," AND image.gallery_id="%d" ORDER BY ' . $sort_by . ' ' . $sort_direction . ' ' . $limit_str,$id));
    }
    else {
      $row = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_image AS image WHERE published=1 ' . $where . ' AND gallery_id="%d" ORDER BY ' . $sort_by . ' ' . $sort_direction . $limit_str, $id));
    }
    return $row;
  }

  public function gallery_page_nav($id, $bwg) {
    global $wpdb;
    $bwg_search = ((isset($_POST['bwg_search_' . $bwg]) && esc_html($_POST['bwg_search_' . $bwg]) != '') ? esc_html($_POST['bwg_search_' . $bwg]) : '');
    if ($bwg_search != '') {
      $where = 'AND (alt LIKE "%%' . $bwg_search . '%%" OR description LIKE "%%' . $bwg_search . '%%")';
    }
    else {
      $where = '';
    }
    if (isset($_REQUEST['bwg_tag_id_bwg_album_compact_' . $bwg]) && $_REQUEST['bwg_tag_id_bwg_album_compact_' . $bwg]) {
      $total = $wpdb->get_var('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bwg_image as image INNER JOIN 	(SELECT GROUP_CONCAT( tag_id SEPARATOR ",") AS tags, image_id FROM  ' . $wpdb->prefix . 'bwg_image_tag WHERE gallery_id="' . $id . '" GROUP BY image_id) AS tag ON image.id=tag.image_id  WHERE image.published=1 ' . $where . ' AND  CONCAT(",", tag.tags, ",") REGEXP ",('.implode("|",$_REQUEST['bwg_tag_id_bwg_album_compact_' . $bwg]).')," ');
    }
    else {
      $total = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bwg_image WHERE published=1 ' . $where . ' AND gallery_id="%d"', $id));
    }
    $page_nav['total'] = $total;
    if (isset($_REQUEST['page_number_' . $bwg]) && $_REQUEST['page_number_' . $bwg]) {
      $page_nav['limit'] = (int) $_REQUEST['page_number_' . $bwg];
    }
    else {
      $page_nav['limit'] = 1;
    }
    return $page_nav;
  }

  public function album_page_nav($id, $bwg) {
    global $wpdb;
    $total = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bwg_album_gallery WHERE album_id="%d"', $id));
    $page_nav['total'] = $total;
    if (isset($_REQUEST['page_number_' . $bwg]) && $_REQUEST['page_number_' . $bwg]) {
      $page_nav['limit'] = (int) $_REQUEST['page_number_' . $bwg];
    }
    else {
      $page_nav['limit'] = 1;
    }
    return $page_nav;
  }
  
  public function get_options_row_data() {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1));
    return $row;
  }
  
  public function bwg_create_post($title, $slug, $type, $id) {
    $post_type = 'bwg_' . $type;
    $bwg_post_id = get_page_by_title($title, OBJECT, $post_type);
    $options_row = $this->get_options_row_data();
    $theme_row = $this->get_theme_row_data(0);
    $shortecode_string = '[Best_Wordpress_Gallery type="' . $type . '" gallery_type="album_compact_preview" theme_id="' . $theme_row->id . '" album_id="' . $id . '" sort_by="order" order_by="asc" compuct_album_column_number="' . $options_row->album_column_number . '" compuct_albums_per_page="' . $options_row->albums_per_page . '" compuct_album_title="' . $options_row->album_title_show_hover . '" compuct_album_view_type="' . $options_row->album_view_type . '" compuct_album_thumb_width="' . $options_row->album_thumb_width . '" compuct_album_thumb_height="' . $options_row->album_thumb_height . '" compuct_album_image_column_number="' . $options_row->image_column_number . '" compuct_album_images_per_page="' . $options_row->images_per_page . '" compuct_album_image_title="' . $options_row->image_title_show_hover . '" compuct_album_image_thumb_width="' . $options_row->thumb_width . '" compuct_album_image_thumb_height="' . $options_row->thumb_height . '" compuct_album_enable_page="' . $options_row->album_enable_page . '" popup_fullscreen="' . $options_row->popup_fullscreen . '" popup_autoplay="' . $options_row->popup_autoplay . '" popup_width="' . $options_row->popup_width . '" popup_height="' . $options_row->popup_height . '" popup_effect="' . $options_row->popup_type . '" popup_interval="' . $options_row->popup_interval . '" popup_enable_filmstrip="' . $options_row->popup_enable_filmstrip . '" popup_filmstrip_height="' . $options_row->popup_filmstrip_height . '" popup_enable_ctrl_btn="' . $options_row->popup_enable_ctrl_btn . '" popup_enable_fullscreen="' . $options_row->popup_enable_fullscreen . '" popup_enable_comment="' . $options_row->popup_enable_comment . '" popup_enable_facebook="' . $options_row->popup_enable_facebook . '" popup_enable_twitter="' . $options_row->popup_enable_twitter . '" popup_enable_google="' . $options_row->popup_enable_google . '" popup_enable_pinterest="' . $options_row->popup_enable_pinterest . '" popup_enable_tumblr="' . $options_row->popup_enable_tumblr . '" watermark_type="' . $options_row->watermark_type . '" watermark_link="' . $options_row->watermark_link . '" watermark_text="' . $options_row->watermark_text . '" watermark_font_size="' . $options_row->watermark_font_size . '" watermark_font="' . $options_row->watermark_font . '" watermark_color="' . $options_row->watermark_color . '" watermark_opacity="' . $options_row->watermark_opacity . '" watermark_position="' . $options_row->watermark_position . '" watermark_url="' . $options_row->watermark_url . '" watermark_width="' . $options_row->watermark_width . '" watermark_height="' . $options_row->watermark_height . '" show_search_box="' . $options_row->show_search_box . '" search_box_width="' . $options_row->search_box_width . '" popup_enable_info="' . $options_row->popup_enable_info . '" popup_info_always_show="' . $options_row->popup_info_always_show . '" popup_enable_rate="' . $options_row->popup_enable_rate . '" popup_hit_counter="' . $options_row->popup_hit_counter . '"]';
    if (!$bwg_post_id) {    
      $post = array(
        'post_content'   => $shortecode_string,
        'post_name'      => $slug,
        'post_status'    => 'publish', //'custom_registered_status'
        'post_title'     => $title,
        'post_type'      => $post_type
      );  
      wp_insert_post($post);
    }
    else {
      $bwg_post_id->post_name = $slug;
      $bwg_post_id->post_content = $shortecode_string;
      wp_update_post($bwg_post_id);
    }
    $bwg_post_id = get_page_by_title($title, OBJECT, $post_type);      
    return get_permalink($bwg_post_id->ID);
  }

  public function get_tags_rows_data($gallery_id) {
    global $wpdb;
    $row = $wpdb->get_results('Select t1.* FROM ' . $wpdb->prefix . 'terms AS t1 LEFT JOIN ' . $wpdb->prefix . 'term_taxonomy AS t2 ON t1.term_id = t2.term_id LEFT JOIN ( SELECT DISTINCT tag_id , gallery_id  FROM ' . $wpdb->prefix . 'bwg_image_tag) AS t3 ON  t1.term_id=t3.tag_id WHERE taxonomy = "bwg_tag" AND t3.gallery_id="' . $gallery_id . '"');
    return $row;
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