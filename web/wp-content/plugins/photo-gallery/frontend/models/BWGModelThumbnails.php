<?php

class BWGModelThumbnails {
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

  public function get_gallery_row_data($id) {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_gallery WHERE published=1 AND id="%d"', $id));
    return $row;
  }

  public function get_image_rows_data($params, $bwg, $type, $sort_direction = ' ASC ') {
    $id = $params['gallery_id'];
    $images_per_page = $params['images_per_page'];
    $sort_by = $params['sort_by'];
    global $wpdb;
    $bwg_search = ((isset($_POST['bwg_search_' . $bwg]) && esc_html($_POST['bwg_search_' . $bwg]) != '') ? esc_html($_POST['bwg_search_' . $bwg]) : '');
    if  ($type == 'tag') {
      if ($bwg_search != '') {
        $where = 'AND (image.alt LIKE "%%' . $bwg_search . '%%" OR image.description LIKE "%%' . $bwg_search . '%%")';  
      }
      else {
        $where = '';
      }
    }
    else {
      if ($bwg_search != '') {
        $where = 'AND (alt LIKE "%%' . $bwg_search . '%%" OR description LIKE "%%' . $bwg_search . '%%")';        
      }
      else {
        $where = '';
      }
    }
    if ($sort_by == 'size' || $sort_by == 'resolution') {
      $sort_by = ' CAST(' . $sort_by . ' AS SIGNED) ';
    }
    elseif ($sort_by == 'random') {
      $sort_by = 'RAND()';
    }
    elseif (($sort_by != 'alt') && ($sort_by != 'date') && ($sort_by != 'filetype') && ($sort_by != 'RAND()') && ($sort_by != 'filename')) {
      $sort_by = '`order`';
    }
    $items_in_page = $images_per_page;
    if (isset($_REQUEST['page_number_' . $bwg]) && $_REQUEST['page_number_' . $bwg]) {
      if ($_REQUEST['page_number_' . $bwg] > 1) {
        $items_in_page = $params['load_more_image_count'];
      }
      $limit = (((int) $_REQUEST['page_number_' . $bwg] - 2) * $items_in_page) + $images_per_page;
    }
    else {
      $limit = 0;
    }
    if ($images_per_page) {
      $limit_str = 'LIMIT ' . $limit . ',' . $items_in_page;
    }
    else {
      $limit_str = '';
    }

    if( isset($_REQUEST['bwg_tag_id_bwg_standart_thumbnails_' . $bwg]) && $_REQUEST['bwg_tag_id_bwg_standart_thumbnails_' . $bwg] ){
	    $row = $wpdb->get_results('SELECT image.* FROM ' . $wpdb->prefix . 'bwg_image as image INNER JOIN 
	   (SELECT GROUP_CONCAT( tag_id SEPARATOR ",") AS tags, image_id FROM  ' . $wpdb->prefix . 'bwg_image_tag WHERE gallery_id="' . $id . '" GROUP BY image_id) AS tag ON image.id=tag.image_id WHERE image.published=1 ' . $where . ' AND CONCAT(",", tag.tags, ",") REGEXP ",('.implode("|",$_REQUEST['bwg_tag_id_bwg_standart_thumbnails_' . $bwg]).')," ORDER BY ' . $sort_by . ' ' . $sort_direction . ' ' . $limit_str);
    }
    elseif($type == 'tag') {
      $row = $wpdb->get_results($wpdb->prepare('SELECT image.* FROM ' . $wpdb->prefix . 'bwg_image as image INNER JOIN ' . $wpdb->prefix . 'bwg_image_tag as tag ON image.id=tag.image_id WHERE image.published=1 ' . $where . ' AND tag.tag_id="%d" ORDER BY ' . $sort_by . ' ' . $sort_direction . ' ' . $limit_str, $id));
    }
    else {
      $row = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_image WHERE published=1 ' . $where . ' AND gallery_id="%d" ORDER BY ' . $sort_by . ' ' . $sort_direction . ' ' . $limit_str, $id));
    }
    return $row;
  }

  public function page_nav($id, $bwg, $type) {
    global $wpdb;
    $bwg_search = ((isset($_POST['bwg_search_' . $bwg]) && esc_html($_POST['bwg_search_' . $bwg]) != '') ? esc_html($_POST['bwg_search_' . $bwg]) : '');
    if ($type == 'tag') {
      if ($bwg_search != '') {
        $where = 'AND (image.alt LIKE "%%' . $bwg_search . '%%" OR image.description LIKE "%%' . $bwg_search . '%%")'; 
      }
      else {
        $where = '';
      }
    }
    else {
      if ($bwg_search != '') {
        $where = 'AND (alt LIKE "%%' . $bwg_search . '%%" OR description LIKE "%%' . $bwg_search . '%%")';  
      }
      else {
        $where = '';
      }
    }
    if( isset($_REQUEST['bwg_tag_id_bwg_standart_thumbnails_' . $bwg]) && $_REQUEST['bwg_tag_id_bwg_standart_thumbnails_' . $bwg] ){
      $total = $wpdb->get_var('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bwg_image as image INNER JOIN 	(SELECT GROUP_CONCAT( tag_id SEPARATOR ",") AS tags, image_id FROM  ' . $wpdb->prefix . 'bwg_image_tag WHERE gallery_id="' . $id . '"  GROUP BY image_id) AS tag ON image.id=tag.image_id  WHERE image.published=1 ' . $where . ' AND  CONCAT(",", tag.tags, ",") REGEXP ",('.implode("|",$_REQUEST['bwg_tag_id_bwg_standart_thumbnails_' . $bwg]).')," ');	
    }
    elseif ($type == 'tag') {
      $total = $wpdb->get_var($wpdb->prepare('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bwg_image as image INNER JOIN ' . $wpdb->prefix . 'bwg_image_tag as tag ON image.id=tag.image_id WHERE image.published=1 ' . $where . ' AND tag.tag_id="%d"', $id));
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
  
  public function get_options_row_data() {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1));
    return $row;
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