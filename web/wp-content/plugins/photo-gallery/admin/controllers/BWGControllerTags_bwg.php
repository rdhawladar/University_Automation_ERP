<?php

class BWGControllerTags_bwg {
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
    $task = WDWLibrary::get('task');
    $id = WDWLibrary::get('current_id', 0);

    if($task != ''){
      if(!WDWLibrary::verify_nonce('tags_bwg')){
        die('Sorry, your nonce did not verify.');
      }
    }


    $message = WDWLibrary::get('message');
    echo WDWLibrary::message_id($message);
    if (method_exists($this, $task)) {
      $this->$task($id);
    }
    else {
      $this->display();
    }
  }

  public function display() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelTags_bwg.php";
    $model = new BWGModelTags_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewTags_bwg.php";
    $view = new BWGViewTags_bwg($model);
    $view->display();
  }

  public function save() {
    $message = $this->save_tag();
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'tags_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  } 
  
  public function bwg_get_unique_slug($slug, $id) {
    global $wpdb;
    $slug = sanitize_title($slug);
    if ($id != 0) {
      $query = $wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "terms WHERE slug = %s AND term_id != %d", $slug, $id);
    }
    else {
      $query = $wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "terms WHERE slug = %s", $slug);
    }
    if ($wpdb->get_var($query)) {
      $num = 2;
      do {
        $alt_slug = $slug . "-$num";
        $num++;
        $slug_check = $wpdb->get_var($wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "terms WHERE slug = %s", $alt_slug));
      } while ($slug_check);
      $slug = $alt_slug;
    }
    return $slug;
  }
  
  public function bwg_get_unique_name($name, $id) {
    /*global $wpdb;
    if ($id != 0) {
      $query = $wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "terms WHERE name = %s AND term_id != %d", $name, $id);
    }
    else {
      $query = $wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "terms WHERE name = %s", $name);
    }
    if ($wpdb->get_var($query)) {
      $num = 2;
      do {
        $alt_name = $name . "-$num";
        $num++;
        $slug_check = $wpdb->get_var($wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "terms WHERE name = %s", $alt_name));
      } while ($slug_check);
      $name = $alt_name;
    }*/
    return $name;
  }
  
  public function save_tag() {
    $name = ((isset($_POST['tagname'])) ? esc_html(stripslashes($_POST['tagname'])) : '');
    $name = $this->bwg_get_unique_name($name, 0);
    $slug = ((isset($_POST['slug']) && (esc_html($_POST['slug']) != '')) ? esc_html(stripslashes($_POST['slug'])) : $name);
    $slug = $this->bwg_get_unique_slug($slug, 0);
	  $slug = sanitize_title($slug);
    if ($name) {
      $save = wp_insert_term($name, 'bwg_tag', array(
        'description'=> '',
        'slug' => $slug,
        'parent' => 0
        )
      );
      if (isset($save->errors)) {
        return 14;
      }
      else {
        return 1;
      }
    }
    else {
      return 15;
    }
  }
  
  function edit_tag() {
    global $wpdb;
    $flag = FALSE; 
    $id = ((isset($_REQUEST['tag_id'])) ? esc_html(stripslashes($_REQUEST['tag_id'])) : '');
    $query = "SELECT count FROM " . $wpdb->prefix . "term_taxonomy WHERE term_id=" . $id;
    $count = $wpdb->get_var($query);
    $name = ((isset($_REQUEST['tagname'])) ? esc_html(stripslashes($_REQUEST['tagname'])) : '');
    $name = $this->bwg_get_unique_name($name, $id);
    if ($name) {
      $slug = ((isset($_REQUEST['slug']) && (esc_html($_REQUEST['slug']) != '')) ? esc_html(stripslashes($_REQUEST['slug'])) : $name);
      $slug = $this->bwg_get_unique_slug($slug, $id);
      $save = wp_update_term($id, 'bwg_tag', array(
        'name' => $name,
        'slug' => $slug
      ));
      
      /*update data in corresponding posts*/
      $query2 = "SELECT ID, post_content FROM ".$wpdb->posts." WHERE post_type = 'bwg_tag' ";
      $posts = $wpdb->get_results($query2, OBJECT);
      foreach($posts as $post){
        $post_content = $post->post_content;
        if( strpos($post_content, ' type="tag" ') && strpos($post_content, ' gallery_id="'.$id.'" ') ){
          $tag_post = array('ID' => $post->ID, 'post_title' => $name, 'post_name' => $slug);
          wp_update_post( $tag_post );
        }
      }
      
      if (isset($save->errors)) {
        echo 'The slug must be unique.';
      }
      else {
        $flag = TRUE;
      }
    }
    if ($flag) {
      echo $name . '.' . $slug . '.' . $count;
    }
    die();
  }

  public function edit_tags() {
    global $wpdb;
    $flag = FALSE;
    $rows = get_terms('bwg_tag', array('orderby' => 'count', 'hide_empty' => 0));
    $name = ((isset($_POST['tagname'])) ? esc_html(stripslashes($_POST['tagname'])) : '');
    $name = $this->bwg_get_unique_name($name, 0);
    $slug = ((isset($_POST['slug']) && (esc_html($_POST['slug']) != '')) ? esc_html(stripslashes($_POST['slug'])) : $name);
    $slug = $this->bwg_get_unique_slug($slug, 0);
    if ($name) {
      $save = wp_insert_term($name, 'bwg_tag', array(
        'description'=> '',
        'slug' => $slug,
        'parent' => 0
        )
      );
      if (isset($save->errors)) {
        $message = 15;
      }
      else {
        $message = 1;
      }
    }
    foreach ($rows as $row) {
      $id = $row->term_id;
      $name = ((isset($_POST['tagname' . $row->term_id])) ? esc_html(stripslashes($_POST['tagname' . $id])) : '');
      $name = $this->bwg_get_unique_name($name,  $id);
      if ($name) {
        $slug = ((isset($_POST['slug' . $row->term_id]) && (esc_html($_POST['slug' . $id]) != '')) ? esc_html(stripslashes($_POST['slug' . $id])) : $name);
        $slug = $this->bwg_get_unique_slug($slug, $id);
        $save = wp_update_term($id, 'bwg_tag', array(
          'name' => $name,
          'slug' => $slug
        ));
        if (isset($save->errors)) {
          $message = 16;
        }
        else {
          $flag = TRUE;
        }
        
        /*update data in corresponding posts*/
        $query2 = "SELECT ID, post_content FROM ".$wpdb->posts." WHERE post_type = 'bwg_tag' ";
        $posts = $wpdb->get_results($query2, OBJECT);
        foreach($posts as $post){
          $post_content = $post->post_content;
          if( strpos($post_content, ' type="tag" ') && strpos($post_content, ' gallery_id="'.$id.'" ') ){
            $tag_post = array('ID' => $post->ID, 'post_title' => $name, 'post_name' => $slug);
            wp_update_post( $tag_post );
          }
        }
        
      }
    }
    if ($flag) {
      $message = 1;
    }
    else {
      $message = '';
    }
    $page = WDWLibrary::get('page');

    $query_url = wp_nonce_url( admin_url('admin.php'), 'tags_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }

  public function delete($id) {
    global $wpdb;
    wp_delete_term($id, 'bwg_tag');
    $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE tag_id="%d"', $id);
    $flag = $wpdb->query($query);
    
    /* Delete corresponding posts and their meta.*/
    $query2 = "SELECT ID, post_content FROM " . $wpdb->posts . " WHERE post_type = 'bwg_tag'";
    $posts = $wpdb->get_results($query2, OBJECT);
    foreach ($posts as $post) {
      $post_content = $post->post_content;
      if (strpos($post_content, ' type="tag" ') && strpos($post_content, ' gallery_id="' . $id . '" ')) {
        wp_delete_post($post->ID, TRUE);
      }
    }
    if ($flag !== FALSE) {
      $message = 3;
    }
    else {
      $message = 2;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'tags_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }
  
  public function delete_all() {
    global $wpdb;
    $flag = FALSE;
    $tag_ids_col = $wpdb->get_col("SELECT term_id FROM " . $wpdb->prefix . "terms");
    foreach ($tag_ids_col as $tag_id) {
      if (isset($_POST['check_' . $tag_id])) {
        wp_delete_term($tag_id, 'bwg_tag');
        $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE tag_id="%d"', $tag_id));
        $flag = TRUE;
      }
    }
    
    /*delete corresponding posts and their meta*/
    $query2 = "SELECT ID, post_content FROM ".$wpdb->posts." WHERE post_type = 'bwg_tag' ";
    $posts = $wpdb->get_results($query2, OBJECT);
    foreach($posts as $post){
      $post_content = $post->post_content;
      if( strpos($post_content, ' type="tag" ') ){
        wp_delete_post( $post->ID, true ); 
      }
    }
    
    if ($flag) {
      $message = 5;
    }
    else {
      $message = 6;
    }  
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'tags_bwg', 'bwg_nonce' );
    $query_url  = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
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