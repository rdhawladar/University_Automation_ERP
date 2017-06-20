<?php

class BWGModelGalleries_bwg {
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

  public function get_image_rows_data($gallery_id) {
    global $wpdb;
    if (!current_user_can('manage_options') && $wpdb->get_var("SELECT image_role FROM " . $wpdb->prefix . "bwg_option")) {
      $where = " WHERE author=" . get_current_user_id();
    }
    else {
      $where = " WHERE author>=0 ";
    }
    $where .= ((isset($_POST['search_value'])) ? ' AND filename LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"' : '');
    $image_asc_or_desc = ((isset($_POST['image_asc_or_desc'])) ? esc_html(stripslashes($_POST['image_asc_or_desc'])) : ((isset($_COOKIE['bwg_image_asc_or_desc'])) ? esc_html(stripslashes($_COOKIE['bwg_image_asc_or_desc'])) : 'asc'));
    $image_asc_or_desc = ($image_asc_or_desc != 'asc') ? 'desc' : 'asc';
    $image_order_by = ((isset($_POST['image_order_by']) && esc_html(stripslashes($_POST['image_order_by'])) != '') ? esc_html(stripslashes($_POST['image_order_by'])) : ((isset($_COOKIE['bwg_image_order_by']) && esc_html(stripslashes($_COOKIE['bwg_image_order_by'])) != '') ? esc_html(stripslashes($_COOKIE['bwg_image_order_by'])) : 'order'));
    $order_by_arr = array('filename', 'alt', 'description', 'published');
    $image_order_by = in_array($image_order_by, $order_by_arr) ? $image_order_by : 'order';
    $image_order_by = ' ORDER BY `' . $image_order_by . '` ' . $image_asc_or_desc;

    if (isset($_POST['page_number']) && $_POST['page_number']) {
      $limit = ((int) $_POST['page_number'] - 1) * $this->per_page;
    }
    else {
      $limit = 0;
    }
    $row = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "bwg_image " . $where . " AND gallery_id='" . $gallery_id . "' " . $image_order_by . " LIMIT " . $limit . "," . $this->per_page);
    return $row;
  }

  public function get_tag_rows_data($image_id) {
    global $wpdb;
    $rows = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "terms AS table1 INNER JOIN " . $wpdb->prefix . "bwg_image_tag AS table2 ON table1.term_id=table2.tag_id WHERE table2.image_id='%d' ORDER BY table2.tag_id", $image_id));
    return $rows;
  }

  public function get_rows_data() {
    global $wpdb;
    if (!current_user_can('manage_options') && $wpdb->get_var("SELECT gallery_role FROM " . $wpdb->prefix . "bwg_option")) {
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
    $query = "SELECT * FROM " . $wpdb->prefix . "bwg_gallery " . $where . $order_by . " LIMIT " . $limit . ",".$this->per_page;
    $rows = $wpdb->get_results($query);
    return $rows;
  }

  public function get_row_data($id) {
    global $wpdb;
    if ($id != 0) {
      if (!current_user_can('manage_options') && $wpdb->get_var("SELECT gallery_role FROM " . $wpdb->prefix . "bwg_option")) {
        $where = " WHERE author=" . get_current_user_id();
      }
      else {
        $where = " WHERE author>=0 ";
      }
      $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_gallery ' . $where . ' AND id="%d"', $id));
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
      $row->images_count = 0;
      $row->published = 1;
      $row->gallery_type = '';
      $row->gallery_source = '';
      $row->autogallery_image_number = 12;
      $row->update_flag = '';
    }
    return $row;
  }
  
  public function page_nav() {
    global $wpdb;
    if (!current_user_can('manage_options') && $wpdb->get_var("SELECT gallery_role FROM " . $wpdb->prefix . "bwg_option")) {
      $where = " WHERE author=" . get_current_user_id();
    }
    else {
      $where = " WHERE author>=0 ";
    }
    $where .= ((isset($_POST['search_value']) && (esc_html(stripslashes($_POST['search_value'])) != '')) ? ' AND name LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"'  : '');
    $query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "bwg_gallery " . $where;
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

  public function image_page_nav($gallery_id) {
    global $wpdb;
    if (!current_user_can('manage_options') && $wpdb->get_var("SELECT image_role FROM " . $wpdb->prefix . "bwg_option")) {
      $where = " AND author=" . get_current_user_id();
    }
    else {
      $where = " AND author>=0 ";
    }
    $where .= ((isset($_POST['search_value']) && (esc_html(stripslashes($_POST['search_value'])) != '')) ? ' AND filename LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"'  : '');
    $query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "bwg_image WHERE gallery_id='" . $gallery_id . "' " . $where;
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

  public function get_option_row_data() {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1));
    return $row;
  }

	public function get_images_count($gallery_id) {
    global $wpdb;
		if (!current_user_can('manage_options') && $wpdb->get_var("SELECT image_role FROM " . $wpdb->prefix . "bwg_option")) {
      $where = " WHERE author=" . get_current_user_id();
    }
    else {
      $where = " WHERE author>=0 ";
    }
    $row = $wpdb->get_var($wpdb->prepare("SELECT COUNT(filename) FROM " . $wpdb->prefix . "bwg_image " . $where . " AND gallery_id='%d'", $gallery_id));
    return $row;
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