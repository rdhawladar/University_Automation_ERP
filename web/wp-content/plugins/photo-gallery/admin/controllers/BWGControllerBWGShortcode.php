<?php

class BWGControllerBWGShortcode {
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
    
    $from_menu = ((isset($_GET['page']) && (esc_html($_GET['page']) == 'BWGShortcode')) ? TRUE : FALSE);
    
    if($task != '' && $from_menu){
      if(!WDWLibrary::verify_nonce('BWGShortcode')){
        die('Sorry, your nonce did not verify.');
      }
    }

    
    if (method_exists($this, $task)) {
      $this->$task();
    }
    $this->display();
  }

  public function display() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelBWGShortcode.php";
    $model = new BWGModelBWGShortcode();

    require_once WD_BWG_DIR . "/admin/views/BWGViewBWGShortcode.php";
    $view = new BWGViewBWGShortcode($model);
    $view->display();
  }

  public function save() {
    global $wpdb;
    $tagtext = ((isset($_POST['tagtext'])) ? stripslashes($_POST['tagtext']) : '');
    if ($tagtext) {
      $id = ((isset($_POST['currrent_id'])) ? (int) esc_html(stripslashes($_POST['currrent_id'])) : 0);
      $insert = ((isset($_POST['bwg_insert'])) ? (int) esc_html(stripslashes($_POST['bwg_insert'])) : 0);
      if (!$insert) {
        $save = $wpdb->update($wpdb->prefix . 'bwg_shortcode', array(
        'tagtext' => $tagtext
        ), array('id' => $id));
      }
      else {
        $save = $wpdb->insert($wpdb->prefix . 'bwg_shortcode', array(
          'id' => $id,
          'tagtext' => $tagtext
        ), array(
          '%d',
          '%s'
        ));
      }
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