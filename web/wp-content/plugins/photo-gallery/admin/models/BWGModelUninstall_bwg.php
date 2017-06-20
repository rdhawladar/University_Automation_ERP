<?php

class BWGModelUninstall_bwg {
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
  public function delete_db_tables() {
    global $wpdb;
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_album");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_album_gallery");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_gallery");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_image");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_image_comment");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_image_rate");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_image_tag");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_option");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_theme");
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "bwg_shortcode");
    delete_option("wd_bwg_version");
    if (isset($_COOKIE['bwg_image_asc_or_desc'])) {
      $_COOKIE['bwg_image_asc_or_desc'] = '';
    }
    if (isset($_COOKIE['bwg_image_order_by'])) {
      $_COOKIE['bwg_image_order_by'] = '';
    }
    // Delete terms.
    $terms = get_terms('bwg_tag', array('orderby' => 'count', 'hide_empty' => 0));
    foreach ($terms as $term) {
      wp_delete_term($term->term_id, 'bwg_tag');
    }
    // Delete custom pages for galleries.
    $posts = get_posts(array('posts_per_page' => -1, 'post_type' => 'bwg_gallery'));
    foreach ($posts as $post) {
      wp_delete_post($post->ID, TRUE);
    }
    // Delete custom pages for albums.
    $posts = get_posts(array('posts_per_page' => -1, 'post_type' => 'bwg_album'));
    foreach ($posts as $post) {
      wp_delete_post($post->ID, TRUE);
    }
    // Delete custom pages for tags.
    $posts = get_posts(array('posts_per_page' => -1, 'post_type' => 'bwg_tag'));
    foreach ($posts as $post) {
      wp_delete_post($post->ID, TRUE);
    }
    // Delete custom pages for share.
    $posts = get_posts(array('posts_per_page' => -1, 'post_type' => 'bwg_share'));
    foreach ($posts as $post) {
      wp_delete_post($post->ID, TRUE);
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