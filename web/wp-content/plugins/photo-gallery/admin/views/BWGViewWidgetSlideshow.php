<?php

class BWGViewWidgetSlideshow {
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
    $gallery_id = (isset($instance['gallery_id']) ? $instance['gallery_id'] : 0);
    $width = (isset($instance['width']) ? $instance['width'] : 200);
    $height = (isset($instance['height']) ? $instance['height'] : 200);
    $effect = (isset($instance['effect']) ? $instance['effect'] : "fade");
    $interval = (isset($instance['interval']) ? $instance['interval'] : 5);
    $shuffle = (isset($instance['shuffle']) ? $instance['shuffle'] : 0);
    $theme_id = (isset($instance['theme_id']) ? $instance['theme_id'] : 0);
    $enable_ctrl_btn = (isset($instance['enable_ctrl_btn']) ? $instance['enable_ctrl_btn'] : 0);
    $enable_autoplay = (isset($instance['enable_autoplay']) ? $instance['enable_autoplay'] : 0);
    // Before widget.
    echo $before_widget;
    // Title of widget.
    if ($title) {
      echo $before_title . $title . $after_title;
    }
    // Widget output.
  require_once(WD_BWG_DIR . '/frontend/controllers/BWGControllerSlideshow.php');
    $controller_class = 'BWGControllerSlideshow';
    $controller = new $controller_class();
    global $bwg;
    $params = array (
      'from' => 'widget',
      'gallery_type' => 'slideshow',
      'gallery_id' => $gallery_id,
      'width' => $width, 
      'height' => $height,
      'effect' => $effect, 
      'interval' => $interval, 
      'shuffle' => $shuffle,
      'theme_id' => $theme_id,
      'enable_ctrl_btn' => $enable_ctrl_btn,
      'enable_autoplay' => $enable_autoplay);
    $controller->execute($params, 1, $bwg);
    $bwg++;
    // After widget.
    echo $after_widget;
  }
  
  // Widget Control Panel.
  function form($instance, $id_title, $name_title, $id_gallery_id, $name_gallery_id, $id_width, $name_width, $id_height, $name_height, $id_effect, $name_effect, $id_interval, $name_interval, $id_shuffle, $name_shuffle, $id_theme_id, $name_theme_id, $id_enable_ctrl_btn, $name_enable_ctrl_btn, $id_enable_autoplay, $name_enable_autoplay) {
    $defaults = array(
      'title' => 'Photo Gallery Slideshow',
      'gallery_id' => 0,
      'width' => 200,
      'height' => 200,
      'effect' => 'fade',
      'interval' => 5,
      'shuffle' => 0,
      'theme_id' => 0,
      'enable_ctrl_btn' => 0,
      'enable_autoplay' => 0,
    );
    $slideshow_effects = array(
      'none' => 'None',
      'cubeH' => 'Cube Horizontal',
      'cubeV' => 'Cube Vertical',
      'fade' => 'Fade',
      'sliceH' => 'Slice Horizontal',
      'sliceV' => 'Slice Vertical',
      'slideH' => 'Slide Horizontal',
      'slideV' => 'Slide Vertical',
      'scaleOut' => 'Scale Out',
      'scaleIn' => 'Scale In',
      'blockScale' => 'Block Scale',
      'kaleidoscope' => 'Kaleidoscope',
      'fan' => 'Fan',
      'blindH' => 'Blind Horizontal',
      'blindV' => 'Blind Vertical',
      'random' => 'Random',
    );
    $instance = wp_parse_args((array) $instance, $defaults);
    $gallery_rows = $this->model->get_gallery_rows_data();
    $theme_rows = $this->model->get_theme_rows_data();
    $options_row = $this->model->get_options_row_data();
    ?>
    <p>
      <label for="<?php echo $id_title; ?>"><?php _e("Title:", 'bwg_back'); ?></label>
      <input class="widefat" id="<?php echo $id_title; ?>" name="<?php echo $name_title; ?>" type="text" value="<?php echo $instance['title']; ?>"/>
    </p>    
    <p>
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
    <p>
      <label for="<?php echo $id_width; ?>"><?php _e("Dimensions:", 'bwg_back'); ?></label>
      <input class="widefat" style="width:25%;" id="<?php echo $id_width; ?>" name="<?php echo $name_width; ?>" type="text" value="<?php echo $instance['width']; ?>"/> x 
      <input class="widefat" style="width:25%;" id="<?php echo $id_height; ?>" name="<?php echo $name_height; ?>" type="text" value="<?php echo $instance['height']; ?>"/> px
    </p>
    <p title="<?php _e("This option is disabled in free version.", 'bwg_back'); ?>" <?php echo ($options_row->slideshow_enable_filmstrip ? 'style="color: #7F7F7F;"' : 'style="display: none;"'); ?>>
      <label><?php _e("Filmstrip height:", 'bwg_back'); ?></label>
      <input disabled="disabled" class="widefat" style="width: 25%; color: #7F7F7F;" type="text" value="40" /> px
    </p>
    <p>
      <label for="<?php echo $id_effect; ?>"><?php _e("Slideshow effect:", 'bwg_back'); ?></label>
      <select name="<?php echo $name_effect; ?>" id="<?php echo $id_effect; ?>" class="widefat">        
        <?php
        foreach ($slideshow_effects as $key => $slideshow_effect) {
          ?>
          <option value="<?php echo $key; ?>" <?php echo ($key != 'none' && $key != 'fade') ? 'disabled="disabled" title="This effect is disabled in free version."' : ''; ?> <?php if ($instance['effect'] == $key) echo 'selected="selected"'; ?>><?php echo $slideshow_effect; ?></option>
          <?php
        }
        ?>
      </select>
    </p>
    <p>
      <label for="<?php echo $id_interval; ?>"><?php _e("Time interval:", 'bwg_back'); ?></label>
      <input class="widefat" style="width:25%;" id="<?php echo $id_interval; ?>" name="<?php echo $name_interval; ?>" type="text" value="<?php echo $instance['interval']; ?>" /> sec.
    </p>
    <p>
      <label><?php _e("Enable shuffle:", 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_shuffle; ?>" id="<?php echo $id_shuffle . "_1"; ?>" value="1" <?php if ($instance['shuffle']) echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "1");' /><label for="<?php echo $id_shuffle . "_1"; ?>"><?php _e("Yes", 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_shuffle; ?>" id="<?php echo $id_shuffle . "_0"; ?>" value="0" <?php if (!$instance['shuffle']) echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "0");' /><label for="<?php echo $id_shuffle . "_0"; ?>"><?php _e("No", 'bwg_back'); ?></label>
      <input type="hidden" name="<?php echo $name_shuffle; ?>" id="<?php echo $id_shuffle; ?>" value="<?php echo $instance['shuffle']; ?>" class="bwg_hidden" />
    </p>
    <p>
      <label><?php echo __('Enable autoplay:', 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_enable_autoplay; ?>" id="<?php echo $id_enable_autoplay . "_1"; ?>" value="1" <?php if ($instance['enable_autoplay']) echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "1");' /><label for="<?php echo $id_enable_autoplay . "_1"; ?>"><?php echo __('Yes', 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_enable_autoplay; ?>" id="<?php echo $id_enable_autoplay . "_0"; ?>" value="0" <?php if (!$instance['enable_autoplay']) echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "0");' /><label for="<?php echo $id_enable_autoplay . "_0"; ?>"><?php echo __('No', 'bwg_back'); ?></label>
      <input type="hidden" name="<?php echo $name_enable_autoplay; ?>" id="<?php echo $id_enable_autoplay; ?>" value="<?php echo $instance['enable_autoplay']; ?>" class="bwg_hidden" />
    </p>
     <p>
      <label><?php echo __('Enable control buttons:', 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_enable_ctrl_btn; ?>" id="<?php echo $id_enable_ctrl_btn . "_1"; ?>" value="1" <?php if ($instance['enable_ctrl_btn']) echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "1");' /><label for="<?php echo $id_enable_ctrl_btn . "_1"; ?>"><?php echo __('Yes', 'bwg_back'); ?></label>
      <input type="radio" name="<?php echo $name_enable_ctrl_btn; ?>" id="<?php echo $id_enable_ctrl_btn . "_0"; ?>" value="0" <?php if (!$instance['enable_ctrl_btn']) echo 'checked="checked"'; ?> onclick='jQuery(this).nextAll(".bwg_hidden").first().attr("value", "0");' /><label for="<?php echo $id_enable_ctrl_btn . "_0"; ?>"><?php echo __('No', 'bwg_back'); ?></label>
      <input type="hidden" name="<?php echo $name_enable_ctrl_btn; ?>" id="<?php echo $id_enable_ctrl_btn; ?>" value="<?php echo $instance['enable_ctrl_btn']; ?>" class="bwg_hidden" />
    </p>
    <p>
      <select name="<?php echo $name_theme_id; ?>" id="<?php echo $id_theme_id; ?>" class="widefat" <?php echo (get_option("wd_bwg_theme_version") ? 'title="'.__("This option is disabled in free version.", "bwg_back").'"  disabled="disabled"' : ''); ?>>
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