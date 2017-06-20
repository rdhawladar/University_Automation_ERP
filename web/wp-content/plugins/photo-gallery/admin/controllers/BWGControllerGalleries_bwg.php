<?php

class BWGControllerGalleries_bwg {
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
    $task = ((isset($_POST['task'])) ? esc_html(stripslashes($_POST['task'])) : '');
    $id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    if ($task != '') {
      if (!WDWLibrary::verify_nonce('galleries_bwg')) {
        die('Sorry, your nonce did not verify.');
      }
    }

    if (method_exists($this, $task)) {
      $this->$task($id);
    }
    else {
      $this->display();
    }
  }

  public function display() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelGalleries_bwg.php";
    $model = new BWGModelGalleries_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewGalleries_bwg.php";
    $view = new BWGViewGalleries_bwg($model);
    $this->delete_unknown_images();
    $view->display();
  }

  public function add() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelGalleries_bwg.php";
    $model = new BWGModelGalleries_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewGalleries_bwg.php";
    $view = new BWGViewGalleries_bwg($model);
    $view->edit(0);
  }

  public function edit() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelGalleries_bwg.php";
    $model = new BWGModelGalleries_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewGalleries_bwg.php";
    $view = new BWGViewGalleries_bwg($model);
    $id = ((isset($_POST['current_id']) && esc_html(stripslashes($_POST['current_id'])) != '') ? esc_html(stripslashes($_POST['current_id'])) : 0);
    $view->edit($id);
  }

  public function save_order_images($gallery_id) {
    global $wpdb;
    $imageids_col = $wpdb->get_col($wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'bwg_image WHERE `gallery_id`="%d"', $gallery_id));
    if ($imageids_col) {
      foreach ($imageids_col as $imageid) {
        if (isset($_POST['order_input_' . $imageid])) {
          $order_values[$imageid] = (int) $_POST['order_input_' . $imageid];
        }
        else {
          $order_values[$imageid] = (int) $wpdb->get_var($wpdb->prepare('SELECT `order` FROM ' . $wpdb->prefix . 'bwg_image WHERE `id`="%d"', $imageid));
        }
      }
      asort($order_values);
      $i = 1;
      foreach ($order_values as $key => $order_value) {
        $wpdb->update($wpdb->prefix . 'bwg_image', array('order' => $i), array('id' => $key));
        $i++;
      }
    }
  }

  public function ajax_search() {
    if (isset($_POST['ajax_task'])) {
      // Save gallery on "apply" and "save".
      $this->save_db();
      global $wpdb;
      if (!isset($_POST['current_id']) || (esc_html(stripslashes($_POST['current_id'])) == 0) || (esc_html(stripslashes($_POST['current_id'])) == '')) {
        // If gallery saved first time (insert in db).
        $_POST['current_id'] = (int) $wpdb->get_var('SELECT MAX(`id`) FROM ' . $wpdb->prefix . 'bwg_gallery');
      }
    }
    $this->save_image_db();
    if (isset($_POST['check_all_items'])) {
      $tag_ids = (isset($_POST['added_tags_select_all']) ? esc_html(stripslashes($_POST['added_tags_select_all'])) : '');
      if ($tag_ids != '') {
          $this->save_tags_if_select_all($tag_ids);
      }
    }
    $this->save_order_images($_POST['current_id']);
    if (isset($_POST['ajax_task']) && esc_html($_POST['ajax_task']) != '') {
      $ajax_task = esc_html($_POST['ajax_task']);
      if (method_exists($this, $ajax_task)) {
        $this->$ajax_task();
      }
    }
    $this->edit();
  }
  
  public function save_tags_if_select_all($tag_ids) {
    global $wpdb;
    $gal_id = (isset($_POST['current_id']) ? (int) $_POST['current_id'] : 0);
    $image_ids = (isset($_POST['ids_string']) ? esc_html(stripslashes($_POST['ids_string'])) : '');
    $current_page_image_ids = explode(',', $image_ids);
    $tag_ids_array = explode(',', $tag_ids);
    $query_image = $wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gal_id);
    $image_id_array = $wpdb->get_results($query_image);
    foreach ($image_id_array as $image_id) {
      $flag = FALSE;
      foreach ($current_page_image_ids as $current_page_image_id) { 
        if ($current_page_image_id == $image_id->id) {
          $flag = TRUE;
        }
      }
      if ($flag) {
        continue;
      }
      foreach ($tag_ids_array as $tag_id) {
        if ($tag_id) {		
          $exist_tag = $wpdb->get_var($wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE tag_id="%d" AND image_id="%d" AND gallery_id="%d"', $tag_id,$image_id->id, $gal_id));
          if ($exist_tag == NULL) {
            $save = $wpdb->insert($wpdb->prefix . 'bwg_image_tag', array(
              'tag_id' => $tag_id,
              'image_id' => $image_id->id,
              'gallery_id' => $gal_id,
              ), array(
              '%d',
              '%d',
              '%d',
            ));	  	
            // Increase tag count in term_taxonomy table.
            $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'term_taxonomy SET count="%d" WHERE term_id="%d"', $wpdb->get_var($wpdb->prepare('SELECT COUNT(image_id) FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE tag_id="%d"', $tag_id)), $tag_id));
          }
        }
      }
    }
  }
  
  public function recover() {
    global $wpdb;
    $id = ((isset($_POST['image_current_id'])) ? esc_html(stripslashes($_POST['image_current_id'])) : 0);
    $options = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id=1');
    $thumb_width = $options->upload_thumb_width;
    $thumb_height = $options->upload_thumb_height;    
    $this->recover_image($id, $thumb_width, $thumb_height);
  }
  
  public function image_recover_all() {
    global $wpdb;
    $gallery_id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    $options = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id=1');
    $thumb_width = $options->upload_thumb_width;
    $thumb_height = $options->upload_thumb_height;    
    $image_ids_col = $wpdb->get_col($wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gallery_id));
    foreach ($image_ids_col as $image_id) {
      if (isset($_POST['check_' . $image_id]) || isset($_POST['check_all_items'])) {
        $this->recover_image($image_id, $thumb_width, $thumb_height);
      }
    }
  }
  
  public function recover_image($id, $thumb_width, $thumb_height) {
    global $WD_BWG_UPLOAD_DIR;
    global $wpdb;
    $image_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_image WHERE id="%d"', $id));
    $filename = htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $image_data->image_url, ENT_COMPAT | ENT_QUOTES);
    $thumb_filename = htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $image_data->thumb_url, ENT_COMPAT | ENT_QUOTES);
    copy(str_replace('/thumb/', '/.original/', $thumb_filename), $filename);
    list($width_orig, $height_orig, $type_orig) = getimagesize($filename);
    $percent = $width_orig / $thumb_width;
    $thumb_height = $height_orig / $percent;
    @ini_set('memory_limit', '-1');
    if ($type_orig == 2) {
      $img_r = imagecreatefromjpeg($filename);
      $dst_r = ImageCreateTrueColor($thumb_width, $thumb_height);
      imagecopyresampled($dst_r, $img_r, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
      imagejpeg($dst_r, $thumb_filename, 100);
      imagedestroy($img_r);
      imagedestroy($dst_r);
    }
    elseif ($type_orig == 3) {
      $img_r = imagecreatefrompng($filename);
      $dst_r = ImageCreateTrueColor($thumb_width, $thumb_height);
      imageColorAllocateAlpha($dst_r, 0, 0, 0, 127);
      imagealphablending($dst_r, FALSE);
      imagesavealpha($dst_r, TRUE);
      imagecopyresampled($dst_r, $img_r, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
      imagealphablending($dst_r, FALSE);
      imagesavealpha($dst_r, TRUE);
      imagepng($dst_r, $thumb_filename, 9);
      imagedestroy($img_r);
      imagedestroy($dst_r);
    }
    elseif ($type_orig == 1) {
      $img_r = imagecreatefromgif($filename);
      $dst_r = ImageCreateTrueColor($thumb_width, $thumb_height);
      imageColorAllocateAlpha($dst_r, 0, 0, 0, 127);
      imagealphablending($dst_r, FALSE);
      imagesavealpha($dst_r, TRUE);
      imagecopyresampled($dst_r, $img_r, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
      imagealphablending($dst_r, FALSE);
      imagesavealpha($dst_r, TRUE);
      imagegif($dst_r, $thumb_filename);
      imagedestroy($img_r);
      imagedestroy($dst_r);
    }
    @ini_restore('memory_limit');
    ?>
    <script language="javascript">
      var image_src = window.parent.document.getElementById("image_thumb_<?php echo $id; ?>").src;
      document.getElementById("image_thumb_<?php echo $id; ?>").src = image_src + "?date=<?php echo date('Y-m-y H:i:s'); ?>";
    </script>
    <?php
  }

  public function image_publish() {
    $id = ((isset($_POST['image_current_id'])) ? esc_html(stripslashes($_POST['image_current_id'])) : 0);
    global $wpdb;
    $save = $wpdb->update($wpdb->prefix . 'bwg_image', array('published' => 1), array('id' => $id));
  }

  public function image_publish_all() {
    global $wpdb;
    $gallery_id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    if (isset($_POST['check_all_items'])) {
      $wpdb->query($wpdb->prepare('UPDATE ' .  $wpdb->prefix . 'bwg_image SET published=1 WHERE gallery_id="%d"', $gallery_id));
    }
    else {
      $image_ids_col = $wpdb->get_col($wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gallery_id));
      foreach ($image_ids_col as $image_id) {
        if (isset($_POST['check_' . $image_id])) {
          $wpdb->update($wpdb->prefix . 'bwg_image', array('published' => 1), array('id' => $image_id));
        }
      }
    }
  }

  public function image_unpublish() {
    $id = ((isset($_POST['image_current_id'])) ? esc_html(stripslashes($_POST['image_current_id'])) : 0);
    global $wpdb;
    $save = $wpdb->update($wpdb->prefix . 'bwg_image', array('published' => 0), array('id' => $id));
  }

  public function image_unpublish_all() {
    global $wpdb;
    $gallery_id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    if (isset($_POST['check_all_items'])) {
      $wpdb->query($wpdb->prepare('UPDATE ' .  $wpdb->prefix . 'bwg_image SET published=0 WHERE gallery_id="%d"', $gallery_id));
    }
    else {
      $image_ids_col = $wpdb->get_col($wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gallery_id));
      foreach ($image_ids_col as $image_id) {
        if (isset($_POST['check_' . $image_id])) {
          $wpdb->update($wpdb->prefix . 'bwg_image', array('published' => 0), array('id' => $image_id));
        }
      }
    }
  }

  public function image_delete() {
    $id = ((isset($_POST['image_current_id'])) ? esc_html(stripslashes($_POST['image_current_id'])) : 0);
    global $wpdb;
    $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image WHERE id="%d"', $id));
    $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_comment WHERE image_id="%d"', $id));
    $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_rate WHERE image_id="%d"', $id));
    $tag_ids = $wpdb->get_col($wpdb->prepare('SELECT tag_id FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE image_id="%d"', $id));
    $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE image_id="%d"', $id));
    // Increase tag count in term_taxonomy table.
    if ($tag_ids) {
      foreach ($tag_ids as $tag_id) {
        $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'term_taxonomy SET count="%d" WHERE term_id="%d"', $wpdb->get_var($wpdb->prepare('SELECT COUNT(image_id) FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE tag_id="%d"', $tag_id)), $tag_id));
      }
    }
  }

  public function image_delete_all() {
    global $wpdb;
    $gallery_id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    $image_ids_col = $wpdb->get_col($wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gallery_id));
    foreach ($image_ids_col as $image_id) {
      if (isset($_POST['check_' . $image_id]) || isset($_POST['check_all_items'])) {
        $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image WHERE id="%d"', $image_id));
        $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_comment WHERE image_id="%d"', $image_id));
        $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_rate WHERE image_id="%d"', $image_id));
        $tag_ids = $wpdb->get_col($wpdb->prepare('SELECT tag_id FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE image_id="%d"', $image_id));
        $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE image_id="%d"', $image_id));
        // Increase tag count in term_taxonomy table.
        if ($tag_ids) {
          foreach ($tag_ids as $tag_id) {
            $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'term_taxonomy SET count="%d" WHERE term_id="%d"', $wpdb->get_var($wpdb->prepare('SELECT COUNT(image_id) FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE tag_id="%d"', $tag_id)), $tag_id));
          }
        }
      }
    }
  }

  public function image_set_watermark() {
    global $wpdb;
    global $WD_BWG_UPLOAD_DIR;
    $options = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id=1');
    $gallery_id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    $images = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gallery_id));
    switch ($options->built_in_watermark_type) {
      case 'text':
        foreach ($images as $image) {
          if (isset($_POST['check_' . $image->id]) || isset($_POST['check_all_items'])) {
            $this->set_text_watermark(ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, $options->built_in_watermark_text, $options->built_in_watermark_font, $options->built_in_watermark_font_size, '#' . $options->built_in_watermark_color, $options->built_in_watermark_opacity, $options->built_in_watermark_position);
          }
        }
        break;
      case 'image':
        $watermark_path = str_replace(site_url() . '/', ABSPATH, $options->built_in_watermark_url);
        foreach ($images as $image) {
          if (isset($_POST['check_' . $image->id]) || isset($_POST['check_all_items'])) {
            $this->set_image_watermark(ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, $watermark_path, $options->built_in_watermark_size, $options->built_in_watermark_size, $options->built_in_watermark_position);
          }
        }
        break;
    }
  }

  public function image_resize() {
    global $wpdb;
    global $WD_BWG_UPLOAD_DIR;
    $gallery_id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    $image_width = ((isset($_POST['image_width'])) ? esc_html(stripslashes($_POST['image_width'])) : 1600);
    $image_height = ((isset($_POST['image_height'])) ? esc_html(stripslashes($_POST['image_height'])) : 1200);
    $images = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gallery_id));
    foreach ($images as $image) {
      if (isset($_POST['check_' . $image->id]) || isset($_POST['check_all_items'])) {
        $this->bwg_scaled_image(ABSPATH . $WD_BWG_UPLOAD_DIR . $image->image_url, $image_width, $image_height);
      }
    }
  }

  function bwg_scaled_image($file_path, $max_width = 0, $max_height = 0, $crop = FALSE) {
    $file_path = htmlspecialchars_decode($file_path, ENT_COMPAT | ENT_QUOTES);
    if (!function_exists('getimagesize')) {
      error_log('Function not found: getimagesize');
      return FALSE;
    }
    list($img_width, $img_height, $type) = @getimagesize($file_path);
    if (!$img_width || !$img_height) {
      return FALSE;
    }
    $scale = min(
      $max_width / $img_width,
      $max_height / $img_height
    );
    @ini_set('memory_limit', '-1');
    if (($scale >= 1) || (($max_width === 0) && ($max_height === 0))) {
      // if ($file_path !== $new_file_path) {
        // return copy($file_path, $new_file_path);
      // }
      return TRUE;
    }
    
    if (!function_exists('imagecreatetruecolor')) {
      error_log('Function not found: imagecreatetruecolor');
      return FALSE;
    }
    if (!$crop) {
      $new_width = $img_width * $scale;
      $new_height = $img_height * $scale;
      $dst_x = 0;
      $dst_y = 0;
      $new_img = @imagecreatetruecolor($new_width, $new_height);
    }
    else {
      if (($img_width / $img_height) >= ($max_width / $max_height)) {
        $new_width = $img_width / ($img_height / $max_height);
        $new_height = $max_height;
      }
      else {
        $new_width = $max_width;
        $new_height = $img_height / ($img_width / $max_width);
      }
      $dst_x = 0 - ($new_width - $max_width) / 2;
      $dst_y = 0 - ($new_height - $max_height) / 2;
      $new_img = @imagecreatetruecolor($max_width, $max_height);
    }
    switch ($type) {
      case 2:
        $src_img = @imagecreatefromjpeg($file_path);
        $write_image = 'imagejpeg';
        $image_quality = 90;
        break;
      case 1:
        @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
        $src_img = @imagecreatefromgif($file_path);
        $write_image = 'imagegif';
        $image_quality = NULL;
        break;
      case 3:
        @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
        @imagealphablending($new_img, FALSE);
        @imagesavealpha($new_img, TRUE);
        $src_img = @imagecreatefrompng($file_path);
        $write_image = 'imagepng';
        $image_quality = 9;
        break;
      default:
        $src_img = NULL;
    }
    $success = $src_img && @imagecopyresampled(
      $new_img,
      $src_img,
      $dst_x,
      $dst_y,
      0,
      0,
      $new_width,
      $new_height,
      $img_width,
      $img_height
    ) && $write_image($new_img, $file_path, $image_quality);
    // Free up memory (imagedestroy does not delete files):
    @imagedestroy($src_img);
    @imagedestroy($new_img);
    @ini_restore('memory_limit');
    return $success;
  }

  function bwg_hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    if (strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    }
    else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    return $rgb;
  }

  function bwg_imagettfbboxdimensions($font_size, $font_angle, $font, $text) {
    $box = @ImageTTFBBox($font_size, $font_angle, $font, $text) or die;
    $max_x = max(array($box[0], $box[2], $box[4], $box[6]));
    $max_y = max(array($box[1], $box[3], $box[5], $box[7]));
    $min_x = min(array($box[0], $box[2], $box[4], $box[6]));
    $min_y = min(array($box[1], $box[3], $box[5], $box[7]));
    return array(
      "width"  => ($max_x - $min_x),
      "height" => ($max_y - $min_y)
    );
  }

  function set_text_watermark($original_filename, $dest_filename, $watermark_text, $watermark_font, $watermark_font_size, $watermark_color, $watermark_transparency, $watermark_position) {
    $original_filename = htmlspecialchars_decode($original_filename, ENT_COMPAT | ENT_QUOTES);
    $dest_filename = htmlspecialchars_decode($dest_filename, ENT_COMPAT | ENT_QUOTES);

    $watermark_transparency = 127 - ($watermark_transparency * 1.27);
    list($width, $height, $type) = getimagesize($original_filename);
    $watermark_image = imagecreatetruecolor($width, $height);

    $watermark_color = $this->bwg_hex2rgb($watermark_color);
    $watermark_color = imagecolorallocatealpha($watermark_image, $watermark_color[0], $watermark_color[1], $watermark_color[2], $watermark_transparency);
    $watermark_font = WD_BWG_DIR . '/fonts/' . $watermark_font;
    $watermark_font_size = (($height > $width ? $width : $height) * $watermark_font_size / 500) . 'px';
    $watermark_position = explode('-', $watermark_position);
    $watermark_sizes = $this->bwg_imagettfbboxdimensions($watermark_font_size, 0, $watermark_font, $watermark_text);

    $top = $height - 5;
    $left = $width - $watermark_sizes['width'] - 5;
    switch ($watermark_position[0]) {
      case 'top':
        $top = $watermark_sizes['height'] + 5;
        break;
      case 'middle':
        $top = ($height + $watermark_sizes['height']) / 2;
        break;
    }
    switch ($watermark_position[1]) {
      case 'left':
        $left = 5;
        break;
      case 'center':
        $left = ($width - $watermark_sizes['width']) / 2;
        break;
    }
    @ini_set('memory_limit', '-1');
    if ($type == 2) {
      $image = imagecreatefromjpeg($original_filename);
      imagettftext($image, $watermark_font_size, 0, $left, $top, $watermark_color, $watermark_font, $watermark_text);
      imagejpeg ($image, $dest_filename, 100);
      imagedestroy($image);  
    }
    elseif ($type == 3) {
      $image = imagecreatefrompng($original_filename);
      imagettftext($image, $watermark_font_size, 0, $left, $top, $watermark_color, $watermark_font, $watermark_text);
      imageColorAllocateAlpha($image, 0, 0, 0, 127);
      imagealphablending($image, FALSE);
      imagesavealpha($image, TRUE);
      imagepng($image, $dest_filename, 9);
      imagedestroy($image);
    }
    elseif ($type == 1) {
      $image = imagecreatefromgif($original_filename);
      imageColorAllocateAlpha($watermark_image, 0, 0, 0, 127);
      imagecopy($watermark_image, $image, 0, 0, 0, 0, $width, $height);
      imagettftext($watermark_image, $watermark_font_size, 0, $left, $top, $watermark_color, $watermark_font, $watermark_text);
      imagealphablending($watermark_image, FALSE);
      imagesavealpha($watermark_image, TRUE);
      imagegif($watermark_image, $dest_filename);
      imagedestroy($image);
    }
    imagedestroy($watermark_image);
    @ini_restore('memory_limit');
  }

  function set_image_watermark($original_filename, $dest_filename, $watermark_url, $watermark_height, $watermark_width, $watermark_position) {
    $original_filename = htmlspecialchars_decode($original_filename, ENT_COMPAT | ENT_QUOTES);
    $dest_filename = htmlspecialchars_decode($dest_filename, ENT_COMPAT | ENT_QUOTES);
    $watermark_url = htmlspecialchars_decode($watermark_url, ENT_COMPAT | ENT_QUOTES);

    list($width, $height, $type) = getimagesize($original_filename);
    list($width_watermark, $height_watermark, $type_watermark) = getimagesize($watermark_url);

    $watermark_width = $width * $watermark_width / 100;
    $watermark_height = $height_watermark * $watermark_width / $width_watermark;
        
    $watermark_position = explode('-', $watermark_position);
    $top = $height - $watermark_height - 5;
    $left = $width - $watermark_width - 5;
    switch ($watermark_position[0]) {
      case 'top':
        $top = 5;
        break;
      case 'middle':
        $top = ($height - $watermark_height) / 2;
        break;
    }
    switch ($watermark_position[1]) {
      case 'left':
        $left = 5;
        break;
      case 'center':
        $left = ($width - $watermark_width) / 2;
        break;
    }
    @ini_set('memory_limit', '-1');
    if ($type_watermark == 2) {
      $watermark_image = imagecreatefromjpeg($watermark_url);        
    }
    elseif ($type_watermark == 3) {
      $watermark_image = imagecreatefrompng($watermark_url);
    }
    elseif ($type_watermark == 1) {
      $watermark_image = imagecreatefromgif($watermark_url);      
    }
    else {
      return false;
    }
    
    $watermark_image_resized = imagecreatetruecolor($watermark_width, $watermark_height);
    imagecolorallocatealpha($watermark_image_resized, 255, 255, 255, 127);
    imagealphablending($watermark_image_resized, FALSE);
    imagesavealpha($watermark_image_resized, TRUE);
    imagecopyresampled ($watermark_image_resized, $watermark_image, 0, 0, 0, 0, $watermark_width, $watermark_height, $width_watermark, $height_watermark);
        
    if ($type == 2) {
      $image = imagecreatefromjpeg($original_filename);
      imagecopy($image, $watermark_image_resized, $left, $top, 0, 0, $watermark_width, $watermark_height);
      if ($dest_filename <> '') {
        imagejpeg ($image, $dest_filename, 100); 
      } else {
        header('Content-Type: image/jpeg');
        imagejpeg($image, null, 100);
      };
      imagedestroy($image);  
    }
    elseif ($type == 3) {
      $image = imagecreatefrompng($original_filename);
      imagecopy($image, $watermark_image_resized, $left, $top, 0, 0, $watermark_width, $watermark_height);
      imagealphablending($image, FALSE);
      imagesavealpha($image, TRUE);
      imagepng($image, $dest_filename, 9);
      imagedestroy($image);
    }
    elseif ($type == 1) {
      $image = imagecreatefromgif($original_filename);
      $tempimage = imagecreatetruecolor($width, $height);
      imagecopy($tempimage, $image, 0, 0, 0, 0, $width, $height);
      imagecopy($tempimage, $watermark_image_resized, $left, $top, 0, 0, $watermark_width, $watermark_height);
      imagegif($tempimage, $dest_filename);
      imagedestroy($image);
      imagedestroy($tempimage);
    }
    imagedestroy($watermark_image);
    @ini_restore('memory_limit');
  }

  public function save_image_db() {
    global $wpdb;
    $gal_id = (isset($_POST['current_id']) ? (int) $_POST['current_id'] : 0);
    $image_ids = (isset($_POST['ids_string']) ? esc_html(stripslashes($_POST['ids_string'])) : '');
    $image_id_array = explode(',', $image_ids);
    foreach ($image_id_array as $image_id) {
      if ($image_id) {
        $filename = ((isset($_POST['input_filename_' . $image_id])) ? esc_html(stripslashes($_POST['input_filename_' . $image_id])) : '');
        $image_url = ((isset($_POST['image_url_' . $image_id])) ? esc_html(stripslashes($_POST['image_url_' . $image_id])) : '');
        $thumb_url = ((isset($_POST['thumb_url_' . $image_id])) ? esc_html(stripslashes($_POST['thumb_url_' . $image_id])) : '');
        $description = ((isset($_POST['image_description_' . $image_id])) ? esc_html((stripslashes($_POST['image_description_' . $image_id]))) : '');
        $alt = ((isset($_POST['image_alt_text_' . $image_id])) ? esc_html(stripslashes($_POST['image_alt_text_' . $image_id])) : '');
        $date = ((isset($_POST['input_date_modified_' . $image_id])) ? esc_html(stripslashes($_POST['input_date_modified_' . $image_id])) : '');
        $size = ((isset($_POST['input_size_' . $image_id])) ? esc_html(stripslashes($_POST['input_size_' . $image_id])) : '');
        $filetype = ((isset($_POST['input_filetype_' . $image_id])) ? esc_html(stripslashes($_POST['input_filetype_' . $image_id])) : '');
        $resolution = ((isset($_POST['input_resolution_' . $image_id])) ? esc_html(stripslashes($_POST['input_resolution_' . $image_id])) : '');
        $order = ((isset($_POST['order_input_' . $image_id])) ? esc_html(stripslashes($_POST['order_input_' . $image_id])) : '');
        $redirect_url = ((isset($_POST['redirect_url_' . $image_id])) ? esc_html(stripslashes($_POST['redirect_url_' . $image_id])) : '');
        $author = get_current_user_id();
        $tags_ids = ((isset($_POST['tags_' . $image_id])) ? esc_html(stripslashes($_POST['tags_' . $image_id])) : '');
        if (strpos($image_id, 'pr_') !== FALSE) {
          $save = $wpdb->insert($wpdb->prefix . 'bwg_image', array(
            'gallery_id' => $gal_id,
            'slug' => WDWLibrary::spider_replace4byte($alt),
            'filename' => $filename,
            'image_url' => $image_url,
            'thumb_url' => $thumb_url,
            'description' => WDWLibrary::spider_replace4byte($description),
            'alt' => WDWLibrary::spider_replace4byte($alt),
            'date' => $date,
            'size' => $size,
            'filetype' => $filetype,
            'resolution' => $resolution,
            'author' => $author,
            'order' => $order,
            'published' => 1,
            'comment_count' => 0,
            'avg_rating' => 0,
            'rate_count' => 0,
            'hit_count' => 0,
            'redirect_url' => $redirect_url,
          ), array(
            '%d',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%d',
            '%d',
            '%d',
            '%d',
            '%d',
            '%d',
            '%d',
            '%s',
          ));
          $new_image_id = (int) $wpdb->get_var('SELECT MAX(`id`) FROM ' . $wpdb->prefix . 'bwg_image');
          if (isset($_POST['check_' . $image_id])) {
            $_POST['check_' . $new_image_id] = 'on';
          }
          if (isset($_POST['image_current_id']) && (esc_html($_POST['image_current_id']) == $image_id)) {
            $_POST['image_current_id'] = $new_image_id;
          }
          $image_id = $new_image_id;
        }
        else {
          $save = $wpdb->update($wpdb->prefix . 'bwg_image', array(
            'gallery_id' => $gal_id,
            'slug' => WDWLibrary::spider_replace4byte($alt),
            'filename' => $filename,
            'image_url' => $image_url,
            'thumb_url' => $thumb_url,
            'description' => WDWLibrary::spider_replace4byte($description),
            'alt' => WDWLibrary::spider_replace4byte($alt),
            'date' => $date,
            'size' => $size,
            'filetype' => $filetype,
            'resolution' => $resolution,
            'order' => $order,
            'redirect_url' => $redirect_url), array('id' => $image_id));
        }
        $wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE image_id="%d" AND gallery_id="%d"', $image_id, $gal_id));
        if ($save !== FALSE) {
          $tag_id_array = explode(',', $tags_ids);
          foreach ($tag_id_array as $tag_id) {
            if ($tag_id) {
              if (strpos($tag_id, 'pr_') !== FALSE) {
                $tag_id = substr($tag_id, 3);
              }
              $save = $wpdb->insert($wpdb->prefix . 'bwg_image_tag', array(
                'tag_id' => $tag_id,
                'image_id' => $image_id,
                'gallery_id' => $gal_id,
              ), array(
                '%d',
                '%d',
                '%d',
              ));
              // Increase tag count in term_taxonomy table.
              $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'term_taxonomy SET count="%d" WHERE term_id="%d"', $wpdb->get_var($wpdb->prepare('SELECT COUNT(image_id) FROM ' . $wpdb->prefix . 'bwg_image_tag WHERE tag_id="%d"', $tag_id)), $tag_id));
            }
          }
        }
      }
    }
  }

  public function save() {
    echo WDWLibrary::message(__('Item Succesfully Saved.', 'bwg_back'), 'updated');
    $this->display();
  }

  public function delete_unknown_images() {
    global $wpdb;
    $wpdb->query('DELETE FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id=0');
  }

  public function bwg_get_unique_slug($slug, $id) {
    global $wpdb;
    $slug = sanitize_title($slug);
    if ($id != 0) {
      $query = $wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "bwg_gallery WHERE slug = %s AND id != %d", $slug, $id);
    }
    else {
      $query = $wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "bwg_gallery WHERE slug = %s", $slug);
    }
    if ($wpdb->get_var($query)) {
      $num = 2;
      do {
        $alt_slug = $slug . "-$num";
        $num++;
        $slug_check = $wpdb->get_var($wpdb->prepare("SELECT slug FROM " . $wpdb->prefix . "bwg_gallery WHERE slug = %s", $alt_slug));
      } while ($slug_check);
      $slug = $alt_slug;
    }
    return $slug;
  }
  
  public function bwg_get_unique_name($name, $id) {
    global $wpdb;
    if ($id != 0) {
      $query = $wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "bwg_gallery WHERE name = %s AND id != %d", $name, $id);
    }
    else {
      $query = $wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "bwg_gallery WHERE name = %s", $name);
    }
    if ($wpdb->get_var($query)) {
      $num = 2;
      do {
        $alt_name = $name . "-$num";
        $num++;
        $slug_check = $wpdb->get_var($wpdb->prepare("SELECT name FROM " . $wpdb->prefix . "bwg_gallery WHERE name = %s", $alt_name));
      } while ($slug_check);
      $name = $alt_name;
    }
    return $name;
  }
  
  public function save_db() {
    global $wpdb;
    global $WD_BWG_UPLOAD_DIR;
    $id = (isset($_POST['current_id']) ? (int) $_POST['current_id'] : 0);
    $name = ((isset($_POST['name']) && esc_html(stripslashes($_POST['name'])) != '') ? esc_html(stripslashes($_POST['name'])) : 'Gallery');
    $name = $this->bwg_get_unique_name($name, $id);
    $slug = ((isset($_POST['slug']) && esc_html(stripslashes($_POST['slug'])) != '') ? esc_html(stripslashes($_POST['slug'])) : $name);
    $slug = $this->bwg_get_unique_slug($slug, $id);
    $description = (isset($_POST['description']) ? stripslashes($_POST['description']) : '');
    $preview_image = (isset($_POST['preview_image']) ? esc_html(stripslashes($_POST['preview_image'])) : '');
    $random_preview_image = '';
    if ($preview_image == '') {
      if ($id != 0) {
        $random_preview_image = $wpdb->get_var($wpdb->prepare("SELECT random_preview_image FROM " . $wpdb->prefix . "bwg_gallery WHERE id='%d'", $id));
        if ($random_preview_image == '' || !file_exists(ABSPATH . $WD_BWG_UPLOAD_DIR . $random_preview_image)) {
          $random_preview_image = $wpdb->get_var($wpdb->prepare("SELECT thumb_url FROM " . $wpdb->prefix . "bwg_image WHERE gallery_id='%d' ORDER BY `order`", $id));
        }
      }
      else {
        $i = 0;
        $random_preview_image = '';
        while (isset($_POST['thumb_url_pr_' . $i]) && isset($_POST["input_filetype_pr_" . $i])) {
          /*if ($_POST["input_filetype_pr_" . $i] == "JPG" || $_POST["input_filetype_pr_" . $i] == "PNG" || $_POST["input_filetype_pr_" . $i] == "GIF")*/ {
            $random_preview_image = esc_html(stripslashes($_POST['thumb_url_pr_' . $i]));
            break;
          }
          $i++;
        }
      }
    }

    $gallery_type = ((isset($_POST['gallery_type']) && esc_html(stripslashes($_POST['gallery_type'])) != '') ? esc_html(stripslashes($_POST['gallery_type'])) : '');
    $gallery_source = ((isset($_POST['gallery_source']) && esc_html(stripslashes($_POST['gallery_source'])) != '') ? esc_html(stripslashes($_POST['gallery_source'])) : '');
    $update_flag = ((isset($_POST['update_flag']) && esc_html(stripslashes($_POST['update_flag'])) != '') ? esc_html(stripslashes($_POST['update_flag'])) : '');
    $autogallery_image_number = (isset($_POST['autogallery_image_number']) ? (int) $_POST['autogallery_image_number'] : 12);
    $published = (isset($_POST['published']) ? (int) $_POST['published'] : 1);
    if ($id != 0) {
      $save = $wpdb->update($wpdb->prefix . 'bwg_gallery', array(
        'name' => $name,
        'slug' => $slug,
        'description' => $description,
        'preview_image' => $preview_image,
        'random_preview_image' => $random_preview_image,
        'gallery_type' => $gallery_type,
        'gallery_source' => $gallery_source,
        'autogallery_image_number' => $autogallery_image_number,
        'update_flag' => $update_flag,
        'published' => $published), array('id' => $id));
      /* Update data in corresponding posts.*/
      $query2 = "SELECT ID, post_content FROM " . $wpdb->posts . " WHERE post_type = 'bwg_gallery'";
      $posts = $wpdb->get_results($query2, OBJECT);
      foreach ($posts as $post) {
        $post_content = $post->post_content;
        if (strpos($post_content, ' type="gallery" ') && strpos($post_content, ' gallery_id="' . $id . '" ')) {
          $album_post = array('ID' => $post->ID, 'post_title' => $name, 'post_name' => $slug);
          wp_update_post($album_post);
        }
      }
    }
    else {
      $save = $wpdb->insert($wpdb->prefix . 'bwg_gallery', array(
        'name' => $name,
        'slug' => $slug,
        'description' => $description,
        'page_link' => '',
        'preview_image' => $preview_image,
        'random_preview_image' => $random_preview_image,
        'order' => ((int) $wpdb->get_var('SELECT MAX(`order`) FROM ' . $wpdb->prefix . 'bwg_gallery')) + 1,
        'author' => get_current_user_id(),
        'gallery_type' => $gallery_type,
        'gallery_source' => $gallery_source,
        'autogallery_image_number' => $autogallery_image_number,
        'update_flag' => $update_flag,
        'published' => $published,
      ), array(
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d',
        '%d',
        '%s',
        '%s',
        '%d',
        '%s',
        '%d',
      ));
    }
    if ($save !== FALSE) {
      echo WDWLibrary::message(__('Item Succesfully Saved.', 'bwg_back'), 'updated');
    }
    else {
      echo WDWLibrary::message(__('Error. Please install plugin again.', 'bwg_back'), 'error');
    }
  }

  public function save_order($flag = TRUE) {
    global $wpdb;
    $gallery_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_gallery');
    if ($gallery_ids_col) {
      foreach ($gallery_ids_col as $gallery_id) {
        if (isset($_POST['order_input_' . $gallery_id])) {
          $order_values[$gallery_id] = (int) $_POST['order_input_' . $gallery_id];
        }
        else {
          $order_values[$gallery_id] = (int) $wpdb->get_var($wpdb->prepare('SELECT `order` FROM ' . $wpdb->prefix . 'bwg_gallery WHERE `id`="%d"', $gallery_id));
        }
      }
      asort($order_values);
      $i = 1;
      foreach ($order_values as $key => $order_value) {
        $wpdb->update($wpdb->prefix . 'bwg_gallery', array('order' => $i), array('id' => $key));
        $i++;
      }
      if ($flag) {
        echo WDWLibrary::message(__('Ordering Succesfully Saved.', 'bwg_back'), 'updated');
      }
    }
    $this->display();
  }

  public function delete($id) {
    global $wpdb;
    $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_gallery WHERE id="%d"', $id);
    $query_image = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $id);
    $query_album_gallery = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_album_gallery WHERE alb_gal_id="%d" AND is_album="%d"', $id, 0);
    if ($wpdb->query($query)) {
      $wpdb->query($query_image);
      $wpdb->query($query_album_gallery);
      echo WDWLibrary::message(__('Item Succesfully Deleted.', 'bwg_back'), 'updated');
    }
    else {
      echo WDWLibrary::message(__('Error. Please install plugin again.', 'bwg_back'), 'error');
    }
    /* Delete corresponding posts and their meta.*/
    $query2 = "SELECT ID, post_content FROM " . $wpdb->posts . " WHERE post_type = 'bwg_gallery'";
    $posts = $wpdb->get_results($query2, OBJECT);
    foreach ($posts as $post) {
      $post_content = $post->post_content;
      if (strpos($post_content, ' type="gallery" ') && strpos($post_content, ' gallery_id="'.$id.'" ')) {
        wp_delete_post($post->ID, TRUE);
      }
    }
    $this->display();
  }
  
  public function delete_all() {
    global $wpdb;
    $flag = FALSE;
    $gal_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_gallery');
    foreach ($gal_ids_col as $gal_id) {
      if (isset($_POST['check_' . $gal_id]) || isset($_POST['check_all_items'])) {
        $flag = TRUE;
        $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_gallery WHERE id="%d"', $gal_id);
        $wpdb->query($query);
        $query_image = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gal_id);
        $wpdb->query($query_image);
        $query_album_gallery = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_album_gallery WHERE alb_gal_id="%d" AND is_album="%d"', $gal_id, 0);
        $wpdb->query($query_album_gallery);
      }
    }
    if ($flag) {
      echo WDWLibrary::message(__('Items Succesfully Deleted.', 'bwg_back'), 'updated');
    }
    else {
      echo WDWLibrary::message(__('You must select at least one item.', 'bwg_back'), 'error');
    }
    $this->display();
  }

  public function publish($id) {
    global $wpdb;
    $save = $wpdb->update($wpdb->prefix . 'bwg_gallery', array('published' => 1), array('id' => $id));
    if ($save !== FALSE) {
      echo WDWLibrary::message(__('Item Succesfully Published.', 'bwg_back'), 'updated');
    }
    else {
      echo WDWLibrary::message(__('Error. Please install plugin again.', 'bwg_back'), 'error');
    }
    $this->display();
  }
  
  public function publish_all() {
    global $wpdb;
    $flag = FALSE;
    if (isset($_POST['check_all_items'])) {
      $wpdb->query('UPDATE ' .  $wpdb->prefix . 'bwg_gallery SET published=1');
      $flag = TRUE;
    }
    else {
      $gal_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_gallery');
      foreach ($gal_ids_col as $gal_id) {
        if (isset($_POST['check_' . $gal_id])) {
          $flag = TRUE;
          $wpdb->update($wpdb->prefix . 'bwg_gallery', array('published' => 1), array('id' => $gal_id));
        }
      }
    }
    if ($flag) {
      echo WDWLibrary::message(__('Items Succesfully Published.', 'bwg_back'), 'updated');
    }
    else {
      echo WDWLibrary::message(__('You must select at least one item.', 'bwg_back'), 'error');
    }
    $this->display();
  }

  public function unpublish($id) {
    global $wpdb;
    $save = $wpdb->update($wpdb->prefix . 'bwg_gallery', array('published' => 0), array('id' => $id));
    if ($save !== FALSE) {
      echo WDWLibrary::message(__('Item Succesfully Unpublished.', 'bwg_back'), 'updated');
    }
    else {
      echo WDWLibrary::message(__('Error. Please install plugin again.', 'bwg_back'), 'error');
    }
    $this->display();
  }
  
  public function unpublish_all() {
    global $wpdb;
    $flag = FALSE;
    if (isset($_POST['check_all_items'])) {
      $wpdb->query('UPDATE ' .  $wpdb->prefix . 'bwg_gallery SET published=0');
      $flag = TRUE;
    }
    else {
      $gal_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_gallery');
      foreach ($gal_ids_col as $gal_id) {
        if (isset($_POST['check_' . $gal_id])) {
          $flag = TRUE;
          $wpdb->update($wpdb->prefix . 'bwg_gallery', array('published' => 0), array('id' => $gal_id));
        }
      }
    }
    if ($flag) {
      echo WDWLibrary::message(__('Items Succesfully Unpublished.', 'bwg_back'), 'updated');
    }
    else {
      echo WDWLibrary::message(__('You must select at least one item.', 'bwg_back'), 'error');
    }
    $this->display();
  }
  public function resize_image_thumb() {
    global $WD_BWG_UPLOAD_DIR;
    global $wpdb;
    $flag = FALSE;
    $gallery_id = ((isset($_POST['current_id'])) ? esc_html(stripslashes($_POST['current_id'])) : 0);
    $img_ids = $wpdb->get_results($wpdb->prepare('SELECT id, thumb_url FROM ' . $wpdb->prefix . 'bwg_image WHERE gallery_id="%d"', $gallery_id));
    $options = $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'bwg_option');
    foreach ($img_ids as $img_id) {
      if (isset($_POST['check_' . $img_id->id]) || isset($_POST['check_all_items'])) {
	      $flag = TRUE;
        $file_path = str_replace("thumb", ".original", htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $img_id->thumb_url, ENT_COMPAT | ENT_QUOTES));
	      $new_file_path = htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $img_id->thumb_url, ENT_COMPAT | ENT_QUOTES);
        list($img_width, $img_height, $type) = @getimagesize(htmlspecialchars_decode($file_path, ENT_COMPAT | ENT_QUOTES));
        if (!$img_width || !$img_height) {
          continue;
        }
        $max_width = $options->upload_thumb_width;
        $max_height = $options->upload_thumb_height;
        $scale = min(
          $max_width / $img_width,
          $max_height / $img_height
        );
        @ini_set('memory_limit', '-1');
        if (!function_exists('imagecreatetruecolor')) {
          error_log('Function not found: imagecreatetruecolor');
          return FALSE;
        }
        $new_width = $img_width * $scale;
        $new_height = $img_height * $scale;
        $dst_x = 0;
        $dst_y = 0;
        $new_img = @imagecreatetruecolor($new_width, $new_height);
        switch ($type) {
          case 2:
            $src_img = @imagecreatefromjpeg($file_path);
            $write_image = 'imagejpeg';
            $image_quality = isset($options->jpeg_quality) ? $options->jpeg_quality : 75;
            break;
          case 1:
            @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
            $src_img = @imagecreatefromgif($file_path);
            $write_image = 'imagegif';
            $image_quality = null;
            break;
          case 3:
            @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
            @imagealphablending($new_img, false);
            @imagesavealpha($new_img, true);
            $src_img = @imagecreatefrompng($file_path);
            $write_image = 'imagepng';
            $image_quality = isset($options->png_quality) ? $options->png_quality : 9;
            break;
          default:
            $src_img = null;
            break;
        }
        $success = $src_img && @imagecopyresampled(
          $new_img,
          $src_img,
          $dst_x,
          $dst_y,
          0,
          0,
          $new_width,
          $new_height,
          $img_width,
          $img_height
        ) && $write_image($new_img, $new_file_path, $image_quality);
        // Free up memory (imagedestroy does not delete files):
        @imagedestroy($src_img);
        @imagedestroy($new_img);
        @ini_restore('memory_limit');
	    }
	  }
	  if ($flag == false) {
      echo WDWLibrary::message(__('You must select at least one item.', 'bwg_back'), 'error');
    }
	  else {
		  echo WDWLibrary::message(__('Thumb Succesfully Resized', 'bwg_back'), 'updated');
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