<?php

class BWGModelAddAlbumsGalleries {
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
    $this->per_page = ((isset($_GET['bwg_items_per_page'])) ? esc_html($_GET['bwg_items_per_page']) : ((isset($_POST['bwg_items_per_page'])) ? esc_html($_POST['bwg_items_per_page']) : 20));
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function get_rows_data($album_id) {
    global $wpdb;
    $where = ((isset($_POST['search_value']) && (esc_html(stripslashes($_POST['search_value'])) != '')) ? ' AND name LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"' : '');
    $asc_or_desc = ((isset($_POST['asc_or_desc'])) ? esc_html(stripslashes($_POST['asc_or_desc'])) : 'asc');
    $asc_or_desc = ($asc_or_desc != 'asc') ? 'desc' : 'asc';
    $order_by = ' ORDER BY ' . ((isset($_POST['order_by']) && esc_html(stripslashes($_POST['order_by'])) != '') ? esc_html(stripslashes($_POST['order_by'])) : 'name') . ' ' . $asc_or_desc;
    if (isset($_POST['page_number']) && $_POST['page_number']) {
      $limit = ((int) $_POST['page_number'] - 1)  * $this->per_page;
    }
    else {
      $limit = 0;
    }
    $query = "SELECT id, name, 1 as is_album FROM " . $wpdb->prefix . "bwg_album WHERE published=1 AND id<>" . $album_id . " " . $where . " UNION ALL SELECT id, name, 0 as is_album FROM " . $wpdb->prefix . "bwg_gallery WHERE published=1 " . $where . $order_by . " LIMIT " . $limit . ",".$this->per_page;
    $rows = $wpdb->get_results($query);
    return $rows;
  }
    
  public function page_nav($album_id) {
    global $wpdb;
    $where = ((isset($_POST['search_value']) && (esc_html(stripslashes($_POST['search_value'])) != '')) ? ' AND name LIKE "%' . esc_html(stripslashes($_POST['search_value'])) . '%"' : '');
    $query = "SELECT id FROM " . $wpdb->prefix . "bwg_album WHERE published=1 AND id<>" . $album_id . " " . $where . " UNION ALL SELECT id FROM " . $wpdb->prefix . "bwg_gallery WHERE published=1 " . $where;
    $total = count($wpdb->get_col($query));
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