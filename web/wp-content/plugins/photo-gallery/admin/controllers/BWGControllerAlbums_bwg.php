<?php

class BWGControllerAlbums_bwg {
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
      if(!WDWLibrary::verify_nonce('albums_bwg')){
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
    require_once WD_BWG_DIR . "/admin/models/BWGModelAlbums_bwg.php";
    $model = new BWGModelAlbums_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewAlbums_bwg.php";
    $view = new BWGViewAlbums_bwg($model);
    $view->display();
  }

  public function add() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelAlbums_bwg.php";
    $model = new BWGModelAlbums_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewAlbums_bwg.php";
    $view = new BWGViewAlbums_bwg($model);
    $view->edit(0);
  }

  public function edit() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelAlbums_bwg.php";
    $model = new BWGModelAlbums_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewAlbums_bwg.php";
    $view = new BWGViewAlbums_bwg($model);
    $id = WDWLibrary::get('current_id', 0);
    $view->edit($id);
  }

  public function save() {
    $message = $this->save_db();
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }

  public function apply() {
    $message = $this->save_db();
    global $wpdb;
    $id = (int) $wpdb->get_var('SELECT MAX(`id`) FROM ' . $wpdb->prefix . 'bwg_album');
    $current_id = WDWLibrary::get('current_id', $id);
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'edit', 'current_id' => $current_id, 'message' => $message),$query_url);
    WDWLibrary::spider_redirect($query_url);
  }

  // Return random image from gallery or album for album preview.
  public function get_image_for_album($album_id) {
    global $wpdb;
    $preview_image = '';
    $gallery_row = $wpdb->get_row($wpdb->prepare("SELECT t1.preview_image,t1.random_preview_image FROM " . $wpdb->prefix . "bwg_gallery as t1 INNER JOIN " . $wpdb->prefix . "bwg_album_gallery as t2 on t1.id=t2.alb_gal_id WHERE t2.is_album=0 AND t2.album_id='%d' AND (t1.preview_image<>'' OR t1.random_preview_image<>'') ORDER BY t2.`order`", $album_id));
    if ($gallery_row) {
      $preview_image = (($gallery_row->preview_image) ? $gallery_row->preview_image : $gallery_row->random_preview_image);
    }
    if (!$preview_image) {
      $album_row = $wpdb->get_row($wpdb->prepare("SELECT t1.preview_image,t1.random_preview_image FROM " . $wpdb->prefix . "bwg_album as t1 INNER JOIN " . $wpdb->prefix . "bwg_album_gallery as t2 on t1.id=t2.alb_gal_id WHERE t2.is_album=1 AND t2.album_id='%d' AND (t1.preview_image<>'' OR t1.random_preview_image<>'') ORDER BY t2.`order`", $album_id));
      if ($album_row) {
        $preview_image = (($album_row->preview_image) ? $album_row->preview_image : $album_row->random_preview_image);
      }
    }
    return $preview_image;
  }
  
  public function bwg_get_unique_slug($slug, $id) {
    global $wpdb;
    $slug = sanitize_title($slug);
    if ($id != 0) {
      $query = $wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "bwg_album WHERE slug = %s AND id != %d", $slug, $id);
    }
    else {
      $query = $wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "bwg_album WHERE slug = %s", $slug);
    }
    if ($wpdb->get_var($query)) {
      $num = 2;
      do {
        $alt_slug = $slug . "-$num";
        $num++;
        $slug_check = $wpdb->get_var($wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "bwg_album WHERE slug = %s", $alt_slug));
      } while ($slug_check);
      $slug = $alt_slug;
    }
    return $slug;
  }
  
  public function bwg_get_unique_name($name, $id) {
    global $wpdb;
    if ($id != 0) {
      $query = $wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "bwg_album WHERE name = %s AND id != %d", $name, $id);
    }
    else {
      $query = $wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "bwg_album WHERE name = %s", $name);
    }
    if ($wpdb->get_var($query)) {
      $num = 2;
      do {
        $alt_name = $name . "-$num";
        $num++;
        $slug_check = $wpdb->get_var($wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "bwg_album WHERE name = %s", $alt_name));
      } while ($slug_check);
      $name = $alt_name;
    }
    return $name;
  }

  public function save_db() {
    global $wpdb;
    $id = (int) WDWLibrary::get('current_id', 0);
    $name = ((isset($_POST['name'])) ? esc_html(stripslashes($_POST['name'])) : '');
    $name = $this->bwg_get_unique_name($name, $id);
    $slug = ((isset($_POST['slug']) && esc_html(stripslashes($_POST['slug'])) != '') ? esc_html(stripslashes($_POST['slug'])) : $name);
    $slug = $this->bwg_get_unique_slug($slug, $id);
    $description = (isset($_POST['description']) ? stripslashes($_POST['description']) : '');
    $preview_image = ((isset($_POST['preview_image']) && esc_html(stripslashes($_POST['preview_image'])) != '') ? esc_html(stripslashes($_POST['preview_image'])) : '');
    $author = get_current_user_id();
    $published = ((isset($_POST['published']) && esc_html(stripslashes($_POST['published'])) != '') ? esc_html(stripslashes($_POST['published'])) : '');
    $albums_galleries = (isset($_POST['albums_galleries']) ? esc_html(stripslashes($_POST['albums_galleries'])) : '');
    if ($id != 0) {
      $save = $wpdb->update($wpdb->prefix . 'bwg_album', array(
      'name' => $name,
      'slug' => $slug,
      'description' => $description,
      'preview_image' => $preview_image,
      'published' => $published), array('id' => $id));

      /* Update data in corresponding posts.*/
      $query2 = "SELECT ID, post_content FROM " . $wpdb->posts . " WHERE post_type = 'bwg_album'";
      $posts = $wpdb->get_results($query2, OBJECT);
      foreach ($posts as $post) {
        $post_content = $post->post_content;
        if (strpos($post_content, ' type="album" ') && strpos($post_content, ' album_id="' . $id . '" ')) {
          $album_post = array('ID' => $post->ID, 'post_title' => $name, 'post_name' => $slug);
          wp_update_post($album_post);
        }
      }
    }
    else {
      $save = $wpdb->insert($wpdb->prefix . 'bwg_album', array(
        'name' => $name,
        'slug' => $slug,
        'description' => $description,
        'preview_image' => $preview_image,
        'random_preview_image' => '',
        'order' => ((int) $wpdb->get_var('SELECT MAX(`order`) FROM ' . $wpdb->prefix . 'bwg_album')) + 1,
        'author' => $author,
        'published' => $published
      ), array(
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d',
        '%d',
        '%d'
      ));
      $id = $wpdb->get_var('SELECT MAX(`id`) FROM ' . $wpdb->prefix . 'bwg_album');
    }
    $this->save_alb_gal($id, $albums_galleries);
    // Set random image.
    $random_preview_image = (($preview_image == '') ? $this->get_image_for_album($id) : '');
    $wpdb->update($wpdb->prefix . 'bwg_album', array('random_preview_image' => $random_preview_image), array('id' => $id));
    if ($save !== FALSE) {
      return 1;
    }
    else {
      return 2;
    }
  }
  
  public function save_alb_gal($id, $alb_gal_str) {
    global $wpdb;
    $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_album_gallery WHERE album_id="%d"', $id);
    $wpdb->query($query);
    $alb_gals = explode(",", $alb_gal_str);
    for ($i = 0; $i < count($alb_gals); $i++) {
      $params = explode(":", $alb_gals[$i]);      
      if (count($params) == 3) {
        $save = $wpdb->insert($wpdb->prefix . 'bwg_album_gallery', array(
          'album_id' => $id,
          'is_album' => $params[1],
          'alb_gal_id' => $params[2],
          'order' => $i+1
        ), array(
          '%d',
          '%d',
          '%d',
          '%d'
        ));
      }
    }
  }

  public function delete($id) {
    global $wpdb;
    $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_album WHERE id="%d"', $id);
    $query_gal = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_album_gallery WHERE album_id="%d" OR (is_album AND alb_gal_id="%d")', $id, $id);
    if ($wpdb->query($query)) {
      $wpdb->query($query_gal);
      $message = 3;
    }
    else {
      $message = 2;
    }
    /* Delete corresponding posts and their meta.*/
    $query2 = "SELECT ID, post_content FROM " . $wpdb->posts . " WHERE post_type = 'bwg_album'";
    $posts = $wpdb->get_results($query2, OBJECT);
    foreach ($posts as $post) {
      $post_content = $post->post_content;
      if (strpos($post_content, ' type="album" ') && strpos($post_content, ' album_id="'.$id.'" ')) {
        wp_delete_post($post->ID, TRUE);
      }
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }
  
  public function delete_all() {
    global $wpdb;
    $flag = FALSE;
    $album_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_album');
    foreach ($album_ids_col as $album_id) {
      if (isset($_POST['check_' . $album_id]) || isset($_POST['check_all_items'])) {
        $flag = TRUE;
        $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_album WHERE id="%d"', $album_id);
        $query_gal = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_album_gallery WHERE album_id="%d" OR (is_album AND alb_gal_id="%d")', $album_id, $album_id);
        $wpdb->query($query);
        $wpdb->query($query_gal);
      }
    }
    if ($flag) {
      $message = 5;
    }
    else {
      $message = 6;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }

  public function publish($id) {
    global $wpdb;
    $save = $wpdb->update($wpdb->prefix . 'bwg_album', array('published' => 1), array('id' => $id));
    if ($save !== FALSE) {
      $message = 9;
    }
    else {
      $message = 2;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }
  
  public function publish_all() {
    global $wpdb;
    $flag = FALSE;
    if (isset($_POST['check_all_items'])) {
      $wpdb->query('UPDATE ' .  $wpdb->prefix . 'bwg_album SET published=1');
      $flag = TRUE;
    }
    else {
      $alum_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_album');
      foreach ($alum_ids_col as $album_id) {
        if (isset($_POST['check_' . $album_id])) {
          $flag = TRUE;
          $wpdb->update($wpdb->prefix . 'bwg_album', array('published' => 1), array('id' => $album_id));
        }
      }
    }
    if ($flag) {
      $message = 10;
    }
    else {
      $message = 6;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }

  public function unpublish($id) {
    global $wpdb;
    $save = $wpdb->update($wpdb->prefix . 'bwg_album', array('published' => 0), array('id' => $id));
    if ($save !== FALSE) {
      $message = 11;
    }
    else {
      $message = 2;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }
  
  public function unpublish_all() {
    global $wpdb;
    $flag = FALSE;
    if (isset($_POST['check_all_items'])) {
      $wpdb->query('UPDATE ' .  $wpdb->prefix . 'bwg_album SET published=0');
      $flag = TRUE;
    }
    else {
      $album_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_album');
      foreach ($album_ids_col as $album_id) {
        if (isset($_POST['check_' . $album_id])) {
          $flag = TRUE;
          $wpdb->update($wpdb->prefix . 'bwg_album', array('published' => 0), array('id' => $album_id));
        }
      }
    }
    if ($flag) {
      $message = 12;
    }
    else {
      $message = 6;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }
  
  public function save_order($flag = TRUE) {
    global $wpdb;
    $album_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_album');
    $message = 0;
    if ($album_ids_col) {
      foreach ($album_ids_col as $album_id) {
        if (isset($_POST['order_input_' . $album_id])) {
          $order_values[$album_id] = (int) $_POST['order_input_' . $album_id];
        }
        else {
          $order_values[$album_id] = (int) $wpdb->get_var($wpdb->prepare('SELECT `order` FROM ' . $wpdb->prefix . 'bwg_album WHERE `id`="%d"', $album_id));
        }
      }
      asort($order_values);
      $i = 1;
      foreach ($order_values as $key => $order_value) {
        $wpdb->update($wpdb->prefix . 'bwg_album', array('order' => $i), array('id' => $key));
        $i++;
      }
      if ($flag) {
        $message = 13;
      }
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'albums_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
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