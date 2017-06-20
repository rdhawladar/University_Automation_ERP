<?php

class BWGModelTags_bwg {
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
    $where = ((isset($_POST['search_value']) && (esc_html(stripslashes($_POST['search_value'])) != '')) ? 'AND A.name LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"'  : '');
    $asc_or_desc = ((isset($_POST['asc_or_desc']) && esc_html($_POST['asc_or_desc']) == 'desc') ? 'desc' : 'asc');
    $order_by_arr = array('A.term_id', 'A.name', 'A.slug', 'B.count');
    $order_by = ((isset($_POST['order_by']) && in_array(esc_html($_POST['order_by']), $order_by_arr)) ? esc_html($_POST['order_by']) : 'A.term_id');
    $order_by = ' ORDER BY ' . $order_by . ' ' . $asc_or_desc;
    if (isset($_POST['page_number']) && $_POST['page_number']) {
      $limit = ((int) $_POST['page_number'] - 1) * $this->per_page;
    }
    else {
      $limit = 0;
    }
    $query ="SELECT * FROM ".$wpdb->prefix."terms as A LEFT JOIN ".$wpdb->prefix ."term_taxonomy as B ON A.term_id = B.term_id WHERE B.taxonomy='bwg_tag' " . $where . $order_by . " LIMIT " . $limit . "," . $this->per_page;
    $rows = $wpdb->get_results($query);
    return $rows;
  }
  
  public function page_nav() {
    global $wpdb;
    $where = ((isset($_POST['search_value']) && (esc_html(stripslashes($_POST['search_value'])) != '')) ? 'AND A.name LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"'  : '');
    $query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "terms as A LEFT JOIN ".$wpdb->prefix . "term_taxonomy as B ON A.term_id = B.term_id WHERE B.taxonomy ='bwg_tag' " . $where;
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
  
  public function get_count_of_images($term_id) {
    global $wpdb;
    $query = "SELECT count FROM " . $wpdb->prefix . "term_taxonomy WHERE term_id=" . $term_id;
    $count = $wpdb->get_var($query);
    return $count;
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