<?php

class BWGModelAlbums_bwg {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $per_page = 20;
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct() {
    $user = get_current_user_id();
    $screen = get_current_screen();
    $option = $screen->get_option('per_page', 'option');
    
    $this->per_page = get_user_meta($user, $option, true);
    
    if ( empty ( $this->per_page) || $this->per_page < 1 ) {
      $this->per_page = $screen->get_option( 'per_page', 'default' );
    }
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function get_rows_data() {
    global $wpdb;
    if (!current_user_can('manage_options') && $wpdb->get_var("SELECT album_role FROM " . $wpdb->prefix . "bwg_option")) {
      $where = " WHERE author=" . get_current_user_id();
    }
    else {
      $where = " WHERE author>=0 ";
    }
    $where .= ((isset($_POST['search_value'])) ? ' AND name LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"' : '');
    $asc_or_desc = ((isset($_POST['asc_or_desc']) && esc_html($_POST['asc_or_desc']) == 'desc') ? 'desc' : 'asc');
    $order_by_arr = array('id', 'name', 'slug', 'order', 'author', 'published');
    $order_by = ((isset($_POST['order_by']) && in_array(esc_html($_POST['order_by']), $order_by_arr)) ? esc_html($_POST['order_by']) : 'order');
    $order_by = ' ORDER BY `' . $order_by . '` ' . $asc_or_desc;
    if (isset($_POST['page_number']) && $_POST['page_number']) {
      $limit = ((int) $_POST['page_number'] - 1) * $this->per_page;
    }
    else {
      $limit = 0;
    }
    $query = "SELECT * FROM " . $wpdb->prefix . "bwg_album " . $where . $order_by . " LIMIT " . $limit . ",".$this->per_page;
    $rows = $wpdb->get_results($query);
    return $rows;
  }
  
  public function get_row_data($id) {
    global $wpdb;
    if ($id != 0) {
      if (!current_user_can('manage_options') && $wpdb->get_var("SELECT album_role FROM " . $wpdb->prefix . "bwg_option")) {
        $where = " WHERE author=" . get_current_user_id();
      }
      else {
        $where = " WHERE author>=0 ";
      }
      $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_album ' . $where . ' AND id="%d"', $id));
    }
    else {
      $row = new stdClass();
      $row->id = 0;
      $row->name = '';
      $row->slug = '';
      $row->description = '';
      $row->preview_image = '';
      $row->order = 0;
      $row->author = get_current_user_id();
      $row->published = 1;
    }
    return $row;
  }
  
  public function get_albums_galleries_rows_data($album_id) {
    global $wpdb;
    if (!current_user_can('manage_options') && $wpdb->get_var("SELECT album_role FROM " . $wpdb->prefix . "bwg_option")) {
      $where = " AND author=" . get_current_user_id();
    }
    else {
      $where = " AND author>=0 ";
    }
    $row = $wpdb->get_results("SELECT t1.id, t2.name, t2.slug, t1.is_album, t1.alb_gal_id, t1.order FROM " . $wpdb->prefix . "bwg_album_gallery as t1 INNER JOIN " . $wpdb->prefix . "bwg_album as t2 on t1.alb_gal_id = t2.id where t1.is_album='1'" . $where . " AND t1.album_id='" . $album_id . "' union SELECT t1.id, t2.name, t2.slug, t1.is_album, t1.alb_gal_id, t1.order FROM " . $wpdb->prefix . "bwg_album_gallery as t1 INNER JOIN " . $wpdb->prefix . "bwg_gallery as t2 on t1.alb_gal_id = t2.id where t1.is_album='0'" . $where . " AND t1.album_id='" . $album_id . "' ORDER BY `order`");
    return $row;
  }
  
  public function page_nav() {
    global $wpdb;
    $where = ((isset($_POST['search_value']) && (esc_html(stripslashes($_POST['search_value'])) != '')) ? 'WHERE name LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"'  : '');
    $query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "bwg_album " . $where;
    $total = $wpdb->get_var($query);
    $page_nav['total'] = $total;
    if (isset($_POST['page_number']) && $_POST['page_number']) {
      $limit = ((int) $_POST['page_number'] - 1) * $this->per_page;
    }
    else {
      $limit = 0;
    }
    $page_nav['limit'] = (int) ($limit / $this->per_page + 1);
    return $page_nav;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function per_page(){
    return $this->per_page;

  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}