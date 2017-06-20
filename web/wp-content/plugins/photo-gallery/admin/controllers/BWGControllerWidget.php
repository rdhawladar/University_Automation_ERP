<?php

class BWGControllerWidget extends WP_Widget {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $view;
  private $model;
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct() {
    $widget_ops = array(
      'classname' => 'bwp_gallery',
      'description' => 'Add Photo Gallery albums or galleries to Your widget area.'
    );
    // Widget Control Settings.
    $control_ops = array('id_base' => 'bwp_gallery');
    // Create the widget.
    parent::__construct('bwp_gallery', 'Photo Gallery Widget', $widget_ops, $control_ops);
    require_once WD_BWG_DIR . "/admin/models/BWGModelWidget.php";
    $this->model = new BWGModelWidget();

    require_once WD_BWG_DIR . "/admin/views/BWGViewWidget.php";
    $this->view = new BWGViewWidget($this->model);
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function widget($args, $instance) {
    $this->view->widget($args, $instance);
	}

 	public function form( $instance ) {
    $this->view->form($instance, parent::get_field_id('title'), parent::get_field_name('title'), parent::get_field_id('type'), parent::get_field_name('type'), parent::get_field_id('show'), parent::get_field_name('show'), parent::get_field_id('gallery_id'), parent::get_field_name('gallery_id'), parent::get_field_id('album_id'), parent::get_field_name('album_id'), parent::get_field_id('count'), parent::get_field_name('count'), parent::get_field_id('width'), parent::get_field_name('width'), parent::get_field_id('height'), parent::get_field_name('height'), parent::get_field_id('theme_id'), parent::get_field_name('theme_id'));    
	}

	// Update Settings.
  public function update($new_instance, $old_instance) {
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['type'] = $new_instance['type'];
    $instance['gallery_id'] = $new_instance['gallery_id'];
    $instance['album_id'] = $new_instance['album_id'];
    $instance['show'] = $new_instance['show'];
    $instance['count'] = $new_instance['count'];
    $instance['width'] = $new_instance['width'];
    $instance['height'] = $new_instance['height'];
    $instance['theme_id'] = $new_instance['theme_id'];
    return $instance;
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