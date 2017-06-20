<?php

class BWGControllerWidgetTags extends WP_Widget {
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
      'classname' => 'bwp_gallery_tags',
      'description' => 'Add Photo Gallery Tags dynamic cloud to Your widget area.'
    );
    // Widget Control Settings.
    $control_ops = array('id_base' => 'bwp_gallery_tags');
    // Create the widget.
    parent::__construct('bwp_gallery_tags', 'Photo Gallery Tags Cloud', $widget_ops, $control_ops);
    require_once WD_BWG_DIR . "/admin/models/BWGModelWidgetTags.php";
    $this->model = new BWGModelWidgetTags();

    require_once WD_BWG_DIR . "/admin/views/BWGViewWidgetTags.php";
    $this->view = new BWGViewWidgetTags($this->model);
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function widget($args, $instance) {
    $this->view->widget($args, $instance);
	}

 	public function form( $instance ) {
    $this->view->form($instance, parent::get_field_id('title'), parent::get_field_name('title'), parent::get_field_id('type'), parent::get_field_name('type'), parent::get_field_id('show_name'), parent::get_field_name('show_name'), parent::get_field_id('open_option'), parent::get_field_name('open_option'), parent::get_field_id('count'), parent::get_field_name('count'), parent::get_field_id('width'), parent::get_field_name('width'), parent::get_field_id('height'), parent::get_field_name('height'), parent::get_field_id('background_transparent'), parent::get_field_name('background_transparent'), parent::get_field_id('background_color'), parent::get_field_name('background_color'), parent::get_field_id('text_color'), parent::get_field_name('text_color'), parent::get_field_id('theme_id'), parent::get_field_name('theme_id'));    
	}

	// Update Settings.
  public function update($new_instance, $old_instance) {
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['type'] = $new_instance['type'];
    $instance['show_name'] = $new_instance['show_name'];
    $instance['open_option'] = $new_instance['open_option'];
    $instance['count'] = $new_instance['count'];
    $instance['width'] = $new_instance['width'];
    $instance['height'] = $new_instance['height'];
    $instance['background_transparent'] = $new_instance['background_transparent'];
    $instance['background_color'] = $new_instance['background_color'];
    $instance['text_color'] = $new_instance['text_color'];
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