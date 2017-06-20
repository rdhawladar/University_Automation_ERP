<?php

class BWGModelWidgetFrontEnd {
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
  public function get_tags_data($count) {
    global $wpdb;
    $rows = $wpdb->get_results('SELECT image.thumb_url as thumb_url, image.id as image_id, tags.name, tags.slug, tags.term_id, image.filetype FROM ' . $wpdb->prefix . 'terms AS tags INNER JOIN ' . $wpdb->prefix . 'term_taxonomy AS taxonomy ON taxonomy.term_id=tags.term_id INNER JOIN (SELECT image.thumb_url, tag.tag_id, image.id, image.filetype FROM ' . $wpdb->prefix . 'bwg_image AS image INNER JOIN ' . $wpdb->prefix . 'bwg_image_tag AS tag ON image.id=tag.image_id ORDER BY RAND()) AS image ON image.tag_id=tags.term_id WHERE taxonomy.taxonomy="bwg_tag" GROUP BY tags.term_id' . ($count ? ' LIMIT ' . $count : ""));
    foreach ($rows as $row) {
      $row->permalink = $this->bwg_create_post($row->name, $row->slug, "tag", $row->term_id);
    }
    return $rows;
  }
  
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
  
  public function get_options_row_data() {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1));
    return $row;
  }
  
  public function bwg_create_post($title, $slug, $type, $id) {
    $bwg_post_id = get_page_by_title($title, OBJECT, 'bwg_tag');
    $options_row = $this->get_options_row_data();
    $theme_row = $this->get_theme_row_data(0);
    $shortecode_string = '[Best_Wordpress_Gallery type="' . $type . '" gallery_type="thumbnails" theme_id="' . $theme_row->id . '" gallery_id="' . $id . '" sort_by="date" order_by="asc" image_column_number="' . $options_row->image_column_number . '" images_per_page="' . $options_row->images_per_page . '" image_title="' . $options_row->image_title_show_hover . '" image_enable_page="' . $options_row->image_enable_page . '" thumb_width="' . $options_row->thumb_width . '" thumb_height="' . $options_row->thumb_height . '" popup_fullscreen="' . $options_row->popup_fullscreen . '" popup_autoplay="' . $options_row->popup_autoplay . '" popup_width="' . $options_row->popup_width . '" popup_height="' . $options_row->popup_height . '" popup_effect="' . $options_row->popup_type . '" popup_interval="' . $options_row->popup_interval . '" popup_enable_filmstrip="' . $options_row->popup_enable_filmstrip . '" popup_filmstrip_height="' . $options_row->popup_filmstrip_height . '" popup_enable_ctrl_btn="' . $options_row->popup_enable_ctrl_btn . '" popup_enable_fullscreen="' . $options_row->popup_enable_fullscreen . '" popup_enable_comment="' . $options_row->popup_enable_comment . '" popup_enable_facebook="' . $options_row->popup_enable_facebook . '" popup_enable_twitter="' . $options_row->popup_enable_twitter . '" popup_enable_google="' . $options_row->popup_enable_google . '" popup_enable_pinterest="' . $options_row->popup_enable_pinterest . '" popup_enable_tumblr="' . $options_row->popup_enable_tumblr . '" watermark_type="' . $options_row->watermark_type . '" watermark_link="' . $options_row->watermark_link . '" watermark_text="' . $options_row->watermark_text . '" watermark_font_size="' . $options_row->watermark_font_size . '" watermark_font="' . $options_row->watermark_font . '" watermark_color="' . $options_row->watermark_color . '" watermark_opacity="' . $options_row->watermark_opacity . '" watermark_position="' . $options_row->watermark_position . '" watermark_url="' . $options_row->watermark_url . '" watermark_width="' . $options_row->watermark_width . '" watermark_height="' . $options_row->watermark_height . '" show_search_box="' . $options_row->show_search_box . '" search_box_width="' . $options_row->search_box_width . '" popup_enable_info="' . $options_row->popup_enable_info . '" popup_info_always_show="' . $options_row->popup_info_always_show . '" popup_enable_rate="' . $options_row->popup_enable_rate . '" popup_hit_counter="' . $options_row->popup_hit_counter . '" thumb_click_action="' . $options_row->thumb_click_action . '" thumb_link_target="' . $options_row->thumb_link_target . '"]';
    if (!$bwg_post_id) {    
      $post = array(
        'post_content'   => $shortecode_string,
        'post_name'      => $slug,
        'post_status'    => 'publish', //'custom_registered_status'
        'post_title'     => $title,
        'post_type'      => 'bwg_tag'
      );  
      wp_insert_post($post);
    }
    else {
      $bwg_post_id->post_name = $slug;
      $bwg_post_id->post_content = $shortecode_string;
      wp_update_post($bwg_post_id);
    }
    $bwg_post_id = get_page_by_title($title, OBJECT, 'bwg_tag');      
    return get_permalink($bwg_post_id->ID);
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