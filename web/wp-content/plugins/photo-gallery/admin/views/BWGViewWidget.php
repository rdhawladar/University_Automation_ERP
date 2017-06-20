<?php

class BWGViewWidget {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;

  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function display() {
  }

  function widget($args, $instance) {
    extract($args);
    $title = (isset($instance['title']) ? $instance['title'] : "");
    $type = (isset($instance['type']) ? $instance['type'] : "gallery");
    $gallery_id = (isset($instance['gallery_id']) ? $instance['gallery_id'] : 0);
    $album_id = (isset($instance['album_id']) ? $instance['album_id'] : 0);
    $show = (isset($instance['show']) ? $instance['show'] : "random");
    $count = (isset($instance['count']) ? $instance['count'] : 4);
    $width = (isset($instance['width']) ? $instance['width'] : 100);
    $height = (isset($instance['height']) ? $instance['height'] : 100);
    $theme_id = (isset($instance['theme_id']) ? $instance['theme_id'] : 0);
    // Before widget.
    echo $before_widget;
    // Title of widget.
    if ($title) {
      echo $before_title . $title . $after_title;
    }
    // Widget output.
    if ($type == 'gallery') {
      require_once(WD_BWG_DIR . '/frontend/controllers/BWGControllerThumbnails.php');
      $controller_class = 'BWGControllerThumbnails';
    }
    else {
      require_once(WD_BWG_DIR . '/frontend/controllers/BWGControllerAlbum_compact_preview.php');
      $controller_class = 'BWGControllerAlbum_compact_preview';
    }
    $controller = new $controller_class();
    global $bwg;
    $params = array (
      'from' => 'widget',
      'gallery_type' => $type,
      'id' => ($type == 'gallery' ? $gallery_id : $album_id),
      'show' => $show,
      'count' => $count, 
      'width' => $width, 
      'height' => $height,
      'theme_id' => $theme_id);
    $controller->execute($params, 1, $bwg);
    $bwg++;
    // After widget.
    echo $after_widget;
  }
  
  // Widget Control Panel.
  function form($instance, $id_title, $name_title, $id_type, $name_type, $id_show, $name_show, $id_gallery_id, $name_gallery_id, $id_album_id, $name_album_id, $id_count, $name_count, $id_width, $name_width, $id_height, $name_height, $id_theme_id, $name_theme_id) {
		$defaults = array(
			'title' => 'Photo Gallery',
			'type' => 'gallery',
			'gallery_id' => 0,
			'album_id' => 0,
			'show' => 'random',
			'count' => 4,
			'width' => 100,
			'height' => 100,
			'theme_id' => 0,
		);
		
    $instance = wp_parse_args((array) $instance, $defaults);
    $gallery_rows = $this->model->get_gallery_rows_data();
    $album_rows = $this->model->get_album_rows_data();
    $theme_rows = $this->model->get_theme_rows_data();
    ?>
    <script>
      function bwg_change_type(event, obj) {
        var div = jQuery(obj).closest("div");
        if (jQuery(jQuery(div).find(".sel_gallery")[0]).prop("checked")) {
          jQuery(jQuery(div).find("#p_galleries")).css("display", "");
          jQuery(jQuery(div).find("#p_albums")).css("display", "none");
          jQuery(obj).nextAll(".bwg_hidden").first().attr("value", "gallery");
        }
        else {
          jQuery(jQuery(div).find("#p_galleries")).css("display", "none");
          jQuery(jQuery(div).find("#p_albums")).css("display", "");
          jQuery(obj).nextAll(".bwg_hidden").first().attr("value", "album");
        }
      }
    </script>
    <p>
      <label for="<?php echo $id_title; ?>"><?php _e("Title:", 'bwg_back'); ?></label>
      <input class="widefat" id="<?php echo $id_title; ?>" name="<?php echo $name_title; ?>'" type="text" value="<?php echo $instance['title']; ?>"/>
    </p>
    <p>
      <input type="radio" name="<?php echo $name_type; ?>" id="<?php echo $id_type . "_1"; ?>" value="gallery" class="sel_gallery" onclick="bwg_change_type(event, this)" <?php if ($instance['type'] == "gallery") echo 'checked="checked"'; ?> /><label for="<?php echo $id_type . "_1"; ?>"><?php _e("Gallery", 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_type; ?>" id="<?php echo $id_type . "_2"; ?>" value="album" class="sel_album" onclick="bwg_change_type(event, this)" <?php if ($instance['type'] == "album") echo 'checked="checked"'; ?> /><label for="<?php echo $id_type . "_2"; ?>"><?php _e("Album", 'bwg_back'); ?></label>
      <input type="hidden" name="<?php echo $name_type; ?>" id="<?php echo $id_type; ?>" value="<?php echo $instance['type']; ?>" class="bwg_hidden" />
    </p>
    <p id="p_galleries" style="display:<?php echo ($instance['type'] == "gallery") ? "" : "none" ?>;">
      <select name="<?php echo $name_gallery_id; ?>" id="<?php echo $id_gallery_id; ?>" class="widefat">
        <option value="0"><?php _e("Select Gallery", 'bwg_back'); ?></option>
        <?php
        foreach ($gallery_rows as $gallery_row) {
          ?>
          <option value="<?php echo $gallery_row->id; ?>" <?php echo (($instance['gallery_id'] == $gallery_row->id) ? 'selected="selected"' : ''); ?>><?php echo $gallery_row->name; ?></option>
          <?php
        }
        ?>
      </select>
    </p>
    <p id="p_albums" style="display:<?php echo ($instance['type'] == "album") ? "" : "none" ?>;">
      <select name="<?php echo $name_album_id; ?>" id="<?php echo $id_album_id; ?>" class="widefat">
        <option value="0"><?php _e("Select Album", 'bwg_back'); ?></option>
        <?php
        foreach ($album_rows as $album_row) {
          ?>
          <option value="<?php echo $album_row->id; ?>" <?php echo (($instance['album_id'] == $album_row->id) ? 'selected="selected"' : ''); ?>><?php echo $album_row->name; ?></option>
          <?php
        }
        ?>
      </select>
    </p>    
    <p>
      <input type="radio" name="<?php echo $name_show; ?>" id="<?php echo $id_show . "_1"; ?>" value="random" <?php if ($instance['show'] == "random") echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "random");' /><label for="<?php echo $id_show . "_1"; ?>"><?php _e("Random", 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_show; ?>" id="<?php echo $id_show . "_2"; ?>" value="first" <?php if ($instance['show'] == "first") echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "first");' /><label for="<?php echo $id_show . "_2"; ?>"><?php _e("First", 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_show; ?>" id="<?php echo $id_show . "_3"; ?>" value="last" <?php if ($instance['show'] == "last") echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "last");' /><label for="<?php echo $id_show . "_3"; ?>"><?php _e("Last", 'bwg_back'); ?></label>
      <input type="hidden" name="<?php echo $name_show; ?>" id="<?php echo $id_show; ?>" value="<?php echo $instance['show']; ?>" class="bwg_hidden" />
    </p>
    <p>
      <label for="<?php echo $id_count; ?>"><?php _e("Count:", 'bwg_back'); ?></label>
      <input class="widefat" style="width:25%;" id="<?php echo $id_count; ?>" name="<?php echo $name_count; ?>'" type="text" value="<?php echo $instance['count']; ?>"/>
    </p>
    <p>
      <label for="<?php echo $id_width; ?>"><?php _e("Dimensions:", 'bwg_back'); ?></label>
      <input class="widefat" style="width:25%;" id="<?php echo $id_width; ?>" name="<?php echo $name_width; ?>'" type="text" value="<?php echo $instance['width']; ?>"/> x 
      <input class="widefat" style="width:25%;" id="<?php echo $id_height; ?>" name="<?php echo $name_height; ?>'" type="text" value="<?php echo $instance['height']; ?>"/> px
    </p>
    <p>
      <select name="<?php echo $name_theme_id; ?>" id="<?php echo $id_theme_id; ?>" class="widefat">
        <?php
        foreach ($theme_rows as $theme_row) {
          ?>
          <option value="<?php echo $theme_row->id; ?>" <?php echo (($instance['theme_id'] == $theme_row->id || $theme_row->default_theme == 1) ? 'selected="selected"' : ''); ?>><?php echo $theme_row->name; ?></option>
          <?php
        }
        ?>
      </select>
    </p> 
    <?php
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