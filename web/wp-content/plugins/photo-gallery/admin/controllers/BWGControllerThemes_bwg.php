<?php

class BWGControllerThemes_bwg {
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
    $message = WDWLibrary::get('message');

    if($task != ''){
      if(!WDWLibrary::verify_nonce('themes_bwg')){
        die('Sorry, your nonce did not verify.');
      }
    }

    echo WDWLibrary::message_id($message);
    if (method_exists($this, $task)) {
      $this->$task($id);
    }
    else {
      $this->display();
    }
  }

  public function display() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelThemes_bwg.php";
    $model = new BWGModelThemes_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewThemes_bwg.php";
    $view = new BWGViewThemes_bwg($model);
    $view->display();
  }

  public function add() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelThemes_bwg.php";
    $model = new BWGModelThemes_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewThemes_bwg.php";
    $view = new BWGViewThemes_bwg($model);
    $view->edit(0, false);
  }

  public function edit() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelThemes_bwg.php";
    $model = new BWGModelThemes_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewThemes_bwg.php";
    $view = new BWGViewThemes_bwg($model);
    $id = WDWLibrary::get('current_id', 0);
    $view->edit($id, false);
  }	
  
  public function reset() {
    require_once WD_BWG_DIR . "/admin/models/BWGModelThemes_bwg.php";
    $model = new BWGModelThemes_bwg();

    require_once WD_BWG_DIR . "/admin/views/BWGViewThemes_bwg.php";
    $view = new BWGViewThemes_bwg($model);
    $id = WDWLibrary::get('current_id', 0);
    echo WDWLibrary::message('Changes must be saved.', 'error');
    $view->edit($id, TRUE);
  }

  public function save() {
    $message = $this->save_db();
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'themes_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }

  public function apply() {
    $message = $this->save_db();
    global $wpdb;
    $id = (int) $wpdb->get_var('SELECT MAX(`id`) FROM ' . $wpdb->prefix . 'bwg_theme');
    $current_id = WDWLibrary::get('current_id', $id);
    $page = WDWLibrary::get('page');
    $current_type = WDWLibrary::get('current_type', 'Thumbnail');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'themes_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'edit', 'current_id' => $current_id, 'message' => $message, 'current_type' => $current_type), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }  
  
  public function save_db() {
    global $wpdb;
    $id = (int) WDWLibrary::get('current_id', 0);
    $name = (isset($_POST['name']) ? esc_html(stripslashes( $_POST['name'])) : 'exaple');
    $thumb_margin = (isset($_POST['thumb_margin']) ? esc_html(stripslashes( $_POST['thumb_margin'])) : '');
    $thumb_padding = (isset($_POST['thumb_padding']) ?  esc_html(stripslashes( $_POST['thumb_padding'])) : '');
    $thumb_border_radius = (isset($_POST['thumb_border_radius']) ?  esc_html(stripslashes( $_POST['thumb_border_radius'])) :'');
    $thumb_border_width = (isset($_POST['thumb_border_width']) ? (int) esc_html(stripslashes( $_POST['thumb_border_width'])) : 1);
    $thumb_border_style = (isset($_POST['thumb_border_style']) ? esc_html(stripslashes( $_POST['thumb_border_style'])) : 'solid');
    $thumb_border_color = (isset($_POST['thumb_border_color']) ? esc_html(stripslashes( $_POST['thumb_border_color'])) : '000000');
    $thumb_bg_color = (isset($_POST['thumb_bg_color']) ? esc_html(stripslashes( $_POST['thumb_bg_color'])) : 'FFFFFF');
    $thumbs_bg_color = (isset($_POST['thumbs_bg_color']) ? esc_html(stripslashes( $_POST['thumbs_bg_color'])) : 'FFFFFF');
    $thumb_bg_transparent = (isset($_POST['thumb_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['thumb_bg_transparent'])) :0);
    $thumb_box_shadow = (isset($_POST['thumb_box_shadow']) ?  esc_html(stripslashes( $_POST['thumb_box_shadow'])) : '');
    $thumb_transparent = (isset($_POST['thumb_transparent']) ? (int) esc_html(stripslashes( $_POST['thumb_transparent'])) : 0);
    $thumb_align = (isset($_POST['thumb_align']) ? esc_html(stripslashes( $_POST['thumb_align'])) : '');
    $thumb_hover_effect = (isset($_POST['thumb_hover_effect']) ? esc_html(stripslashes( $_POST['thumb_hover_effect'])) : '');
    $thumb_hover_effect_value = (isset($_POST['thumb_hover_effect_value']) ?  esc_html(stripslashes( $_POST['thumb_hover_effect_value'])) : '');
    $thumb_transition = (isset($_POST['thumb_transition']) ? (int) esc_html(stripslashes( $_POST['thumb_transition'])) : 0);
    $thumb_title_margin = (isset($_POST['thumb_title_margin']) ? esc_html(stripslashes( $_POST['thumb_title_margin'])) : '');
    $thumb_title_font_style = (isset($_POST['thumb_title_font_style']) ? esc_html(stripslashes( $_POST['thumb_title_font_style'])) : 'inherit');
    $thumb_title_pos = (isset($_POST['thumb_title_pos']) ?  esc_html(stripslashes( $_POST['thumb_title_pos'])) :'bottom');
    $thumb_title_font_color = (isset($_POST['thumb_title_font_color']) ? esc_html(stripslashes( $_POST['thumb_title_font_color'])) : 'CCCCCC');	
    $thumb_title_shadow = (isset($_POST['thumb_title_shadow']) ?  esc_html(stripslashes( $_POST['thumb_title_shadow'])) : '');
    $thumb_title_font_size = (isset($_POST['thumb_title_font_size']) ? (int) esc_html(stripslashes( $_POST['thumb_title_font_size'])) : 12);
    $thumb_title_font_weight = (isset($_POST['thumb_title_font_weight']) ? esc_html(stripslashes( $_POST['thumb_title_font_weight'])) : 'normal');		
    
    $page_nav_position = (isset($_POST['page_nav_position']) ? esc_html(stripslashes( $_POST['page_nav_position'])) : 'top');
    $page_nav_align = (isset($_POST['page_nav_align']) ? esc_html(stripslashes( $_POST['page_nav_align'])) : 'center');
    $page_nav_number = (isset($_POST['page_nav_number']) ? (int) esc_html(stripslashes( $_POST['page_nav_number'])) : 1);
    $page_nav_font_size = (isset($_POST['page_nav_font_size']) ? (int) esc_html(stripslashes( $_POST['page_nav_font_size'])) : 13);
    $page_nav_font_style = (isset($_POST['page_nav_font_style']) ? esc_html(stripslashes( $_POST['page_nav_font_style'])) : 'solid');
    $page_nav_font_color = (isset($_POST['page_nav_font_color']) ? esc_html(stripslashes( $_POST['page_nav_font_color'])) : '000000');
    $page_nav_font_weight = (isset($_POST['page_nav_font_weight']) ? esc_html(stripslashes( $_POST['page_nav_font_weight'])) : '');
    $page_nav_border_width = (isset($_POST['page_nav_border_width']) ? (int) esc_html(stripslashes( $_POST['page_nav_border_width'])) : 1);
    $page_nav_border_style = (isset($_POST['page_nav_border_style']) ? esc_html(stripslashes( $_POST['page_nav_border_style'])) : 'solid');
    $page_nav_border_color = (isset($_POST['page_nav_border_color']) ?  esc_html(stripslashes( $_POST['page_nav_border_color'])) : '');
    $page_nav_border_radius = (isset($_POST['page_nav_border_radius']) ?  esc_html(stripslashes( $_POST['page_nav_border_radius'])) : '');
    $page_nav_margin = (isset($_POST['page_nav_margin']) ?  esc_html(stripslashes( $_POST['page_nav_margin'])) : '');
    $page_nav_padding = (isset($_POST['page_nav_padding']) ?  esc_html(stripslashes( $_POST['page_nav_padding'])) : '');
    $page_nav_button_bg_color = (isset($_POST['page_nav_button_bg_color']) ? esc_html(stripslashes( $_POST['page_nav_button_bg_color'])) : 'FFFFFF');
    $page_nav_button_bg_transparent = (isset($_POST['page_nav_button_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['page_nav_button_bg_transparent'])) : 0);
    $page_nav_box_shadow = (isset($_POST['page_nav_box_shadow']) ?  esc_html(stripslashes( $_POST['page_nav_box_shadow'])) : '');
    $page_nav_button_transition = (isset($_POST['page_nav_button_transition']) ? (int) esc_html(stripslashes( $_POST['page_nav_button_transition'])) : 0);
    $page_nav_button_text = (isset($_POST['page_nav_button_text']) ? (int) esc_html(stripslashes( $_POST['page_nav_button_text'])) : 0);
    $lightbox_ctrl_btn_pos = (isset($_POST['lightbox_ctrl_btn_pos']) ?  esc_html(stripslashes( $_POST['lightbox_ctrl_btn_pos'])) :'top');
    $lightbox_ctrl_btn_align = (isset($_POST['lightbox_ctrl_btn_align']) ? esc_html(stripslashes( $_POST['lightbox_ctrl_btn_align'])) : 'left');
    $lightbox_ctrl_btn_height = (isset($_POST['lightbox_ctrl_btn_height']) ? (int) esc_html(stripslashes( $_POST['lightbox_ctrl_btn_height'])) : 1);
    $lightbox_ctrl_btn_margin_top = (isset($_POST['lightbox_ctrl_btn_margin_top']) ? (int) esc_html(stripslashes( $_POST['lightbox_ctrl_btn_margin_top'])) : 1);
    $lightbox_ctrl_btn_margin_left = (isset($_POST['lightbox_ctrl_btn_margin_left']) ? (int) esc_html(stripslashes( $_POST['lightbox_ctrl_btn_margin_left'])) : 0);
    $lightbox_ctrl_btn_transparent = (isset($_POST['lightbox_ctrl_btn_transparent']) ? (int) esc_html(stripslashes( $_POST['lightbox_ctrl_btn_transparent'])) : 0);
    $lightbox_ctrl_btn_color = (isset($_POST['lightbox_ctrl_btn_color']) ? esc_html(stripslashes( $_POST['lightbox_ctrl_btn_color'])) : '000000');
    $lightbox_toggle_btn_height = (isset($_POST['lightbox_toggle_btn_height']) ? (int) esc_html(stripslashes( $_POST['lightbox_toggle_btn_height'])) : 1);
    $lightbox_toggle_btn_width = (isset($_POST['lightbox_toggle_btn_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_toggle_btn_width'])) : 1);
    $lightbox_ctrl_cont_bg_color = (isset($_POST['lightbox_ctrl_cont_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_ctrl_cont_bg_color'])) : '000000');
    $lightbox_ctrl_cont_border_radius = (isset($_POST['lightbox_ctrl_cont_border_radius']) ? (int)  esc_html(stripslashes( $_POST['lightbox_ctrl_cont_border_radius'])) : 1);
    $lightbox_ctrl_cont_transparent = (isset($_POST['lightbox_ctrl_cont_transparent']) ? (int) esc_html(stripslashes( $_POST['lightbox_ctrl_cont_transparent'])) : 1);
    $lightbox_close_btn_bg_color = (isset($_POST['lightbox_close_btn_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_bg_color'])) : '000000');
    $lightbox_close_btn_border_radius = (isset($_POST['lightbox_close_btn_border_radius']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_border_radius'])) : '16px');
    $lightbox_close_btn_border_width = (isset($_POST['lightbox_close_btn_border_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_close_btn_border_width'])) : 1);
    $lightbox_close_btn_border_style = (isset($_POST['lightbox_close_btn_border_style']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_border_style'])) : 'solid');
    $lightbox_close_btn_border_color = (isset($_POST['lightbox_close_btn_border_color']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_border_color'])) : '000000');
    $lightbox_close_btn_box_shadow = (isset($_POST['lightbox_close_btn_box_shadow']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_box_shadow'])) : '');
    $lightbox_close_btn_color = (isset($_POST['lightbox_close_btn_color']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_color'])) : '000000');
    $lightbox_close_btn_size = (isset($_POST['lightbox_close_btn_size']) ? (int) esc_html(stripslashes( $_POST['lightbox_close_btn_size'])) : 1);
    $lightbox_close_btn_width = (isset($_POST['lightbox_close_btn_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_close_btn_width'])) : 1);
    $lightbox_close_btn_height = (isset($_POST['lightbox_close_btn_height']) ? (int) esc_html(stripslashes( $_POST['lightbox_close_btn_height'])) : 1);
    $lightbox_close_btn_top = (isset($_POST['lightbox_close_btn_top']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_top'])) : '');
    $lightbox_close_btn_right = (isset($_POST['lightbox_close_btn_right']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_right'])) : '');
    $lightbox_close_btn_full_color = (isset($_POST['lightbox_close_btn_full_color']) ? esc_html(stripslashes( $_POST['lightbox_close_btn_full_color'])) : '000000');
    $lightbox_close_btn_transparent = (isset($_POST['lightbox_close_btn_transparent']) ? (int) esc_html(stripslashes( $_POST['lightbox_close_btn_transparent'])) : 1);
    $lightbox_rl_btn_bg_color = (isset($_POST['lightbox_rl_btn_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_bg_color'])) : '000000');
    $lightbox_rl_btn_transparent = (isset($_POST['lightbox_rl_btn_transparent']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_transparent'])) : 100);
    $lightbox_rl_btn_border_radius = (isset($_POST['lightbox_rl_btn_border_radius']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_border_radius'])) : '');
    $lightbox_rl_btn_border_width = (isset($_POST['lightbox_rl_btn_border_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_rl_btn_border_width'])) : 1);
    $lightbox_rl_btn_border_style = (isset($_POST['lightbox_rl_btn_border_style']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_border_style'])) : 'solid');
    $lightbox_rl_btn_border_color = (isset($_POST['lightbox_rl_btn_border_color']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_border_color'])) : '000000');
    $lightbox_rl_btn_box_shadow = (isset($_POST['lightbox_rl_btn_box_shadow']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_box_shadow'])) : '');
    $lightbox_rl_btn_color = (isset($_POST['lightbox_rl_btn_color']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_color'])) : '000000');
    $lightbox_rl_btn_height = (isset($_POST['lightbox_rl_btn_height']) ? (int) esc_html(stripslashes( $_POST['lightbox_rl_btn_height'])) : 1);
    $lightbox_rl_btn_width = (isset($_POST['lightbox_rl_btn_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_rl_btn_width'])) : 1);
    $lightbox_rl_btn_size = (isset($_POST['lightbox_rl_btn_size']) ? (int) esc_html(stripslashes( $_POST['lightbox_rl_btn_size'])) : 1);
    $lightbox_close_rl_btn_hover_color = (isset($_POST['lightbox_close_rl_btn_hover_color']) ? esc_html(stripslashes( $_POST['lightbox_close_rl_btn_hover_color'])) : '000000');
    $lightbox_comment_pos = (isset($_POST['lightbox_comment_pos']) ? esc_html(stripslashes( $_POST['lightbox_comment_pos'])) : 'left');
    $lightbox_comment_width = (isset($_POST['lightbox_comment_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_width'])) : 1);
    $lightbox_comment_bg_color = (isset($_POST['lightbox_comment_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_bg_color'])) : '000000');
    $lightbox_comment_font_color = (isset($_POST['lightbox_comment_font_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_font_color'])) : '000000');
    $lightbox_comment_font_style = (isset($_POST['lightbox_comment_font_style']) ? esc_html(stripslashes( $_POST['lightbox_comment_font_style'])) : '');
    $lightbox_comment_font_size = (isset($_POST['lightbox_comment_font_size']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_font_size'])) : 1 );
    $lightbox_comment_button_bg_color = (isset($_POST['lightbox_comment_button_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_button_bg_color'])) : '000000');
    $lightbox_comment_button_border_color = (isset($_POST['lightbox_comment_button_border_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_button_border_color'])) : '000000');
    $lightbox_comment_button_border_width = (isset($_POST['lightbox_comment_button_border_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_button_border_width'])) : 1);
    $lightbox_comment_button_border_style = (isset($_POST['lightbox_comment_button_border_style']) ? esc_html(stripslashes( $_POST['lightbox_comment_button_border_style'])) : 'solid');
    $lightbox_comment_button_border_radius = (isset($_POST['lightbox_comment_button_border_radius']) ? esc_html(stripslashes( $_POST['lightbox_comment_button_border_radius'])) : '');
    $lightbox_comment_button_padding = (isset($_POST['lightbox_comment_button_padding']) ? esc_html(stripslashes( $_POST['lightbox_comment_button_padding'])) : '');
    $lightbox_comment_input_bg_color = (isset($_POST['lightbox_comment_input_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_input_bg_color'])) : '000000');
    $lightbox_comment_input_border_color = (isset($_POST['lightbox_comment_input_border_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_input_border_color'])) : '000000');
    $lightbox_comment_input_border_width = (isset($_POST['lightbox_comment_input_border_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_input_border_width'])) : 1);
    $lightbox_comment_input_border_style = (isset($_POST['lightbox_comment_input_border_style']) ? esc_html(stripslashes( $_POST['lightbox_comment_input_border_style'])) : 'solid');
    $lightbox_comment_input_border_radius = (isset($_POST['lightbox_comment_input_border_radius']) ? esc_html(stripslashes( $_POST['lightbox_comment_input_border_radius'])) : '');
    $lightbox_comment_input_padding = (isset($_POST['lightbox_comment_input_padding']) ? esc_html(stripslashes( $_POST['lightbox_comment_input_padding'])) : '');
    $lightbox_comment_separator_width = (isset($_POST['lightbox_comment_separator_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_separator_width'])) : 1);
    $lightbox_comment_separator_style = (isset($_POST['lightbox_comment_separator_style']) ? esc_html(stripslashes( $_POST['lightbox_comment_separator_style'])) : 'solid');
    $lightbox_comment_separator_color = (isset($_POST['lightbox_comment_separator_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_separator_color'])) : '000000');
    $lightbox_comment_author_font_size = (isset($_POST['lightbox_comment_author_font_size']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_author_font_size'])) : 1);
    $lightbox_comment_date_font_size = (isset($_POST['lightbox_comment_date_font_size']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_date_font_size'])) : 1);
    $lightbox_comment_body_font_size = (isset($_POST['lightbox_comment_body_font_size']) ? (int) esc_html(stripslashes( $_POST['lightbox_comment_body_font_size'])) : 1);
    $lightbox_comment_share_button_color = (isset($_POST['lightbox_comment_share_button_color']) ? esc_html(stripslashes( $_POST['lightbox_comment_share_button_color'])) : '000000');
    $lightbox_filmstrip_rl_bg_color = (isset($_POST['lightbox_filmstrip_rl_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_rl_bg_color'])) : '000000');
    $lightbox_filmstrip_rl_btn_size = (isset($_POST['lightbox_filmstrip_rl_btn_size']) ? (int) esc_html(stripslashes( $_POST['lightbox_filmstrip_rl_btn_size'])) : 1);
    $lightbox_filmstrip_rl_btn_color = (isset($_POST['lightbox_filmstrip_rl_btn_color']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_rl_btn_color'])) : '000000');
    $lightbox_filmstrip_thumb_margin = (isset($_POST['lightbox_filmstrip_thumb_margin']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_margin'])) : '');
    $lightbox_filmstrip_thumb_border_width = (isset($_POST['lightbox_filmstrip_thumb_border_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_border_width'])) : 1);
    $lightbox_filmstrip_thumb_border_style = (isset($_POST['lightbox_filmstrip_thumb_border_style']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_border_style'])) : 'solid');
    $lightbox_filmstrip_thumb_border_color = (isset($_POST['lightbox_filmstrip_thumb_border_color']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_border_color'])) : '000000');
    $lightbox_filmstrip_thumb_border_radius = (isset($_POST['lightbox_filmstrip_thumb_border_radius']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_border_radius'])) : '');
    $lightbox_filmstrip_thumb_deactive_transparent = (isset($_POST['lightbox_filmstrip_thumb_deactive_transparent']) ? (int) esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_deactive_transparent'])) : 1);
    $lightbox_filmstrip_pos = (isset($_POST['lightbox_filmstrip_pos']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_pos'])) : 'top');
    $lightbox_filmstrip_thumb_active_border_width = (isset($_POST['lightbox_filmstrip_thumb_active_border_width']) ? (int) esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_active_border_width'])) : 1);
    $lightbox_filmstrip_thumb_active_border_color = (isset($_POST['lightbox_filmstrip_thumb_active_border_color']) ? esc_html(stripslashes( $_POST['lightbox_filmstrip_thumb_active_border_color'])) : '000000');
    $lightbox_overlay_bg_transparent = (isset($_POST['lightbox_overlay_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['lightbox_overlay_bg_transparent'])) : 80);
    $lightbox_bg_color = (isset($_POST['lightbox_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_bg_color'])) : '000000');
    $lightbox_overlay_bg_color = (isset($_POST['lightbox_overlay_bg_color']) ? esc_html(stripslashes( $_POST['lightbox_overlay_bg_color'])) : '000000');			
    $lightbox_rl_btn_style = (isset($_POST['lightbox_rl_btn_style']) ? esc_html(stripslashes( $_POST['lightbox_rl_btn_style'])) : 'fa-chevron');
    $lightbox_bg_transparent = (isset($_POST['lightbox_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['lightbox_bg_transparent'])) : 100);
	
    $blog_style_margin = (isset($_POST['blog_style_margin']) ? esc_html(stripslashes( $_POST['blog_style_margin'])) : '');
    $blog_style_padding = (isset($_POST['blog_style_padding']) ?  esc_html(stripslashes( $_POST['blog_style_padding'])) : '');
    $blog_style_border_radius = (isset($_POST['blog_style_border_radius']) ?  esc_html(stripslashes( $_POST['blog_style_border_radius'])) :'');
    $blog_style_border_width = (isset($_POST['blog_style_border_width']) ? (int) esc_html(stripslashes( $_POST['blog_style_border_width'])) : 1);
    $blog_style_border_style = (isset($_POST['blog_style_border_style']) ? esc_html(stripslashes( $_POST['blog_style_border_style'])) : 'solid');
    $blog_style_border_color = (isset($_POST['blog_style_border_color']) ? esc_html(stripslashes( $_POST['blog_style_border_color'])) : '000000');
    $blog_style_bg_color = (isset($_POST['blog_style_bg_color']) ? esc_html(stripslashes( $_POST['blog_style_bg_color'])) : 'FFFFFF');	
    $blog_style_box_shadow = (isset($_POST['blog_style_box_shadow']) ?  esc_html(stripslashes( $_POST['blog_style_box_shadow'])) : '');
    $blog_style_transparent = (isset($_POST['blog_style_transparent']) ? (int) esc_html(stripslashes( $_POST['blog_style_transparent'])) : 0);
    $blog_style_align = (isset($_POST['blog_style_align']) ? esc_html(stripslashes( $_POST['blog_style_align'])) : '');		
    $blog_style_share_buttons_margin = (isset($_POST['blog_style_share_buttons_margin']) ? esc_html(stripslashes( $_POST['blog_style_share_buttons_margin'])) : '');
    $blog_style_share_buttons_border_radius = (isset($_POST['blog_style_share_buttons_border_radius']) ?  esc_html(stripslashes( $_POST['blog_style_share_buttons_border_radius'])) :'');
    $blog_style_share_buttons_border_width = (isset($_POST['blog_style_share_buttons_border_width']) ? (int) esc_html(stripslashes( $_POST['blog_style_share_buttons_border_width'])) : 1);
    $blog_style_share_buttons_border_style = (isset($_POST['blog_style_share_buttons_border_style']) ? esc_html(stripslashes( $_POST['blog_style_share_buttons_border_style'])) : 'solid');
    $blog_style_share_buttons_border_color = (isset($_POST['blog_style_share_buttons_border_color']) ? esc_html(stripslashes( $_POST['blog_style_share_buttons_border_color'])) : '000000');
    $blog_style_share_buttons_bg_color = (isset($_POST['blog_style_share_buttons_bg_color']) ? esc_html(stripslashes( $_POST['blog_style_share_buttons_bg_color'])) : 'FFFFFF');	
    $blog_style_share_buttons_align = (isset($_POST['blog_style_share_buttons_align']) ? esc_html(stripslashes( $_POST['blog_style_share_buttons_align'])) : '');	
    $blog_style_img_font_size = (isset($_POST['blog_style_img_font_size']) ? (int) esc_html(stripslashes( $_POST['blog_style_img_font_size'])) : 1);
    $blog_style_img_font_family = (isset($_POST['blog_style_img_font_family']) ? esc_html(stripslashes( $_POST['blog_style_img_font_family'])) : 'cursive');
    $blog_style_img_font_color = (isset($_POST['blog_style_img_font_color']) ? esc_html(stripslashes( $_POST['blog_style_img_font_color'])) : '000000');
    $blog_style_share_buttons_font_size = (isset($_POST['blog_style_share_buttons_font_size']) ? (int) esc_html(stripslashes( $_POST['blog_style_share_buttons_font_size'])) : 20);
    $blog_style_share_buttons_color = (isset($_POST['blog_style_share_buttons_color']) ? esc_html(stripslashes( $_POST['blog_style_share_buttons_color'])) : 'C7C3C3');
    $blog_style_share_buttons_bg_transparent = (isset($_POST['blog_style_share_buttons_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['blog_style_share_buttons_bg_transparent'])) : 0);

    $image_browser_margin = (isset($_POST['image_browser_margin']) ? esc_html(stripslashes( $_POST['image_browser_margin'])) : '');
    $image_browser_padding = (isset($_POST['image_browser_padding']) ?  esc_html(stripslashes( $_POST['image_browser_padding'])) : '');
    $image_browser_border_radius = (isset($_POST['image_browser_border_radius']) ?  esc_html(stripslashes( $_POST['image_browser_border_radius'])) :'');
    $image_browser_border_width = (isset($_POST['image_browser_border_width']) ? (int) esc_html(stripslashes( $_POST['image_browser_border_width'])) : 1);
    $image_browser_border_style = (isset($_POST['image_browser_border_style']) ? esc_html(stripslashes( $_POST['image_browser_border_style'])) : 'solid');
    $image_browser_border_color = (isset($_POST['image_browser_border_color']) ? esc_html(stripslashes( $_POST['image_browser_border_color'])) : '000000');
    $image_browser_bg_color = (isset($_POST['image_browser_bg_color']) ? esc_html(stripslashes( $_POST['image_browser_bg_color'])) : 'FFFFFF');	
    $image_browser_box_shadow = (isset($_POST['image_browser_box_shadow']) ?  esc_html(stripslashes( $_POST['image_browser_box_shadow'])) : '');
    $image_browser_transparent = (isset($_POST['image_browser_transparent']) ? (int) esc_html(stripslashes( $_POST['image_browser_transparent'])) : 0);
    $image_browser_align = (isset($_POST['image_browser_align']) ? esc_html(stripslashes( $_POST['image_browser_align'])) : '');		
    $image_browser_image_description_margin = (isset($_POST['image_browser_image_description_margin']) ? esc_html(stripslashes( $_POST['image_browser_image_description_margin'])) : '');
    $image_browser_image_description_padding = (isset($_POST['image_browser_image_description_padding']) ?  esc_html(stripslashes( $_POST['image_browser_image_description_padding'])) : '');
    $image_browser_image_description_border_radius = (isset($_POST['image_browser_image_description_border_radius']) ?  esc_html(stripslashes( $_POST['image_browser_image_description_border_radius'])) :'');
    $image_browser_image_description_border_width = (isset($_POST['image_browser_image_description_border_width']) ? (int) esc_html(stripslashes( $_POST['image_browser_image_description_border_width'])) : 1);
    $image_browser_image_description_border_style = (isset($_POST['image_browser_image_description_border_style']) ? esc_html(stripslashes( $_POST['image_browser_image_description_border_style'])) : 'solid');
    $image_browser_image_description_border_color = (isset($_POST['image_browser_image_description_border_color']) ? esc_html(stripslashes( $_POST['image_browser_image_description_border_color'])) : '000000');
    $image_browser_image_description_bg_color = (isset($_POST['image_browser_image_description_bg_color']) ? esc_html(stripslashes( $_POST['image_browser_image_description_bg_color'])) : 'FFFFFF');	
    $image_browser_image_description_align = (isset($_POST['image_browser_image_description_align']) ? esc_html(stripslashes( $_POST['image_browser_image_description_align'])) : '');	
    $image_browser_img_font_size = (isset($_POST['image_browser_img_font_size']) ? (int) esc_html(stripslashes( $_POST['image_browser_img_font_size'])) : 1);
    $image_browser_img_font_family = (isset($_POST['image_browser_img_font_family']) ? esc_html(stripslashes( $_POST['image_browser_img_font_family'])) : 'cursive');
    $image_browser_img_font_color = (isset($_POST['image_browser_img_font_color']) ? esc_html(stripslashes( $_POST['image_browser_img_font_color'])) : '000000');
    $image_browser_full_padding = (isset($_POST['image_browser_full_padding']) ?  esc_html(stripslashes( $_POST['image_browser_full_padding'])) : '');
    $image_browser_full_border_radius = (isset($_POST['image_browser_full_border_radius']) ?  esc_html(stripslashes( $_POST['image_browser_full_border_radius'])) :'');
    $image_browser_full_border_width = (isset($_POST['image_browser_full_border_width']) ? (int) esc_html(stripslashes( $_POST['image_browser_full_border_width'])) : 1);
    $image_browser_full_border_style = (isset($_POST['image_browser_full_border_style']) ? esc_html(stripslashes( $_POST['image_browser_full_border_style'])) : 'solid');
    $image_browser_full_border_color = (isset($_POST['image_browser_full_border_color']) ? esc_html(stripslashes( $_POST['image_browser_full_border_color'])) : '000000');
    $image_browser_full_bg_color = (isset($_POST['image_browser_full_bg_color']) ? esc_html(stripslashes( $_POST['image_browser_full_bg_color'])) : 'FFFFFF');	
    $image_browser_full_transparent = (isset($_POST['image_browser_full_transparent']) ? (int) esc_html(stripslashes( $_POST['image_browser_full_transparent'])) : 0);

    $album_compact_title_margin = (isset($_POST['album_compact_title_margin']) ? esc_html(stripslashes( $_POST['album_compact_title_margin'])) : '');
    $album_compact_title_font_style = (isset($_POST['album_compact_title_font_style']) ? esc_html(stripslashes( $_POST['album_compact_title_font_style'])) : 'inherit');
    $album_compact_thumb_title_pos = (isset($_POST['album_compact_thumb_title_pos']) ?  esc_html(stripslashes( $_POST['album_compact_thumb_title_pos'])) :'bottom');
    $album_compact_title_font_color = (isset($_POST['album_compact_title_font_color']) ? esc_html(stripslashes( $_POST['album_compact_title_font_color'])) : 'CCCCCC');	
    $album_compact_title_shadow = (isset($_POST['album_compact_title_shadow']) ?  esc_html(stripslashes( $_POST['album_compact_title_shadow'])) : '');
    $album_compact_title_font_size = (isset($_POST['album_compact_title_font_size']) ? (int) esc_html(stripslashes( $_POST['album_compact_title_font_size'])) : 12);
    $album_compact_title_font_weight = (isset($_POST['album_compact_title_font_weight']) ? esc_html(stripslashes( $_POST['album_compact_title_font_weight'])) : 'normal');
    $album_compact_thumb_margin = (isset($_POST['album_compact_thumb_margin']) ? (int) esc_html(stripslashes( $_POST['album_compact_thumb_margin'])) : 0);   
    $album_compact_back_padding = (isset($_POST['album_compact_back_padding']) ?  esc_html(stripslashes( $_POST['album_compact_back_padding'])) : '');
    $album_compact_thumb_padding = (isset($_POST['album_compact_thumb_padding']) ? (int)  esc_html(stripslashes( $_POST['album_compact_thumb_padding'])) : 0);    
    $album_compact_thumb_border_radius = (isset($_POST['album_compact_thumb_border_radius']) ?  esc_html(stripslashes( $_POST['album_compact_thumb_border_radius'])) :'');
    $album_compact_thumb_border_width = (isset($_POST['album_compact_thumb_border_width']) ? (int) esc_html(stripslashes( $_POST['album_compact_thumb_border_width'])) : 1);
    $album_compact_back_font_color = (isset($_POST['album_compact_back_font_color']) ? esc_html(stripslashes( $_POST['album_compact_back_font_color'])) : '000000');
    $album_compact_thumb_bg_transparent = (isset($_POST['album_compact_thumb_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['album_compact_thumb_bg_transparent'])) : 0);
    $album_compact_thumb_box_shadow = (isset($_POST['album_compact_thumb_box_shadow']) ? esc_html(stripslashes( $_POST['album_compact_thumb_box_shadow'])) : '');		
    $album_compact_thumb_transition = (isset($_POST['album_compact_thumb_transition']) ? (int) esc_html(stripslashes( $_POST['album_compact_thumb_transition'])) : 1);
    $album_compact_thumb_border_style = (isset($_POST['album_compact_thumb_border_style']) ? esc_html(stripslashes( $_POST['album_compact_thumb_border_style'])) : 'solid');
    $album_compact_thumb_border_color = (isset($_POST['album_compact_thumb_border_color']) ? esc_html(stripslashes( $_POST['album_compact_thumb_border_color'])) : '000000');
    $album_compact_thumb_bg_color = (isset($_POST['album_compact_thumb_bg_color']) ? esc_html(stripslashes( $_POST['album_compact_thumb_bg_color'])) : 'FFFFFF');	
    $album_compact_back_font_weight = (isset($_POST['album_compact_back_font_weight']) ? esc_html(stripslashes( $_POST['album_compact_back_font_weight'])) : 'normal');	
    $album_compact_back_font_size = (isset($_POST['album_compact_back_font_size']) ? (int) esc_html(stripslashes( $_POST['album_compact_back_font_size'])) : 12);
    $album_compact_back_font_style = (isset($_POST['album_compact_back_font_style']) ? esc_html(stripslashes( $_POST['album_compact_back_font_style'])) : 'inherit');
    $album_compact_thumbs_bg_color = (isset($_POST['album_compact_thumbs_bg_color']) ? esc_html(stripslashes( $_POST['album_compact_thumbs_bg_color'])) : 'FFFFFF');
    $album_compact_thumb_align = (isset($_POST['album_compact_thumb_align']) ?  esc_html(stripslashes( $_POST['album_compact_thumb_align'])) : 'center');
    $album_compact_thumb_hover_effect = (isset($_POST['album_compact_thumb_hover_effect']) ?  esc_html(stripslashes( $_POST['album_compact_thumb_hover_effect'])) :'skew');
    $album_compact_thumb_transparent = (isset($_POST['album_compact_thumb_transparent']) ? (int) esc_html(stripslashes( $_POST['album_compact_thumb_transparent'])) : 80);
    $album_compact_thumb_hover_effect_value = (isset($_POST['album_compact_thumb_hover_effect_value']) ? esc_html(stripslashes( $_POST['album_compact_thumb_hover_effect_value'])) : '35deg');		
    $album_extended_thumb_margin = (isset($_POST['album_extended_thumb_margin']) ? (int) esc_html(stripslashes( $_POST['album_extended_thumb_margin'])) : 0);
    $album_extended_thumb_padding = (isset($_POST['album_extended_thumb_padding']) ? (int) esc_html(stripslashes( $_POST['album_extended_thumb_padding'])) : 0);   
    $album_extended_thumb_border_radius = (isset($_POST['album_extended_thumb_border_radius']) ?  esc_html(stripslashes( $_POST['album_extended_thumb_border_radius'])) : '');
    $album_extended_thumb_border_width = (isset($_POST['album_extended_thumb_border_width']) ? (int)  esc_html(stripslashes( $_POST['album_extended_thumb_border_width'])) :1);    
    $album_extended_thumb_border_style = (isset($_POST['album_extended_thumb_border_style']) ?  esc_html(stripslashes( $_POST['album_extended_thumb_border_style'])) :'solid');
    $album_extended_thumb_border_color = (isset($_POST['album_extended_thumb_border_color']) ? esc_html(stripslashes( $_POST['album_extended_thumb_border_color'])) : '000000');
    $album_extended_thumb_bg_color = (isset($_POST['album_extended_thumb_bg_color']) ? esc_html(stripslashes( $_POST['album_extended_thumb_bg_color'])) : 'FFFFFF');
    $album_extended_thumbs_bg_color = (isset($_POST['album_extended_thumbs_bg_color']) ? esc_html(stripslashes( $_POST['album_extended_thumbs_bg_color'])) : 'FFFFFF');
    $album_extended_thumb_bg_transparent = (isset($_POST['album_extended_thumb_bg_transparent']) ? (int)  esc_html(stripslashes( $_POST['album_extended_thumb_bg_transparent'])) : 80);	
    $album_extended_thumb_box_shadow = (isset($_POST['album_extended_thumb_box_shadow']) ?  esc_html(stripslashes( $_POST['album_extended_thumb_box_shadow'])) : '');
    $album_extended_thumb_transparent = (isset($_POST['album_extended_thumb_transparent']) ? (int) esc_html(stripslashes( $_POST['album_extended_thumb_transparent'])) : 80);
    $album_extended_thumb_align = (isset($_POST['album_extended_thumb_align']) ? esc_html(stripslashes( $_POST['album_extended_thumb_align'])) : 'center');		
    $album_extended_thumb_hover_effect = (isset($_POST['album_extended_thumb_hover_effect']) ? esc_html(stripslashes( $_POST['album_extended_thumb_hover_effect'])) : '');
    $album_extended_thumb_hover_effect_value = (isset($_POST['album_extended_thumb_hover_effect_value']) ? esc_html(stripslashes( $_POST['album_extended_thumb_hover_effect_value'])) : '32deg');
    $album_extended_thumb_transition = (isset($_POST['album_extended_thumb_transition']) ? (int) esc_html(stripslashes( $_POST['album_extended_thumb_transition'])) : 0);
    $album_extended_back_font_color = (isset($_POST['album_extended_back_font_color']) ? esc_html(stripslashes( $_POST['album_extended_back_font_color'])) : '000000');	
    $album_extended_back_font_style = (isset($_POST['album_extended_back_font_style']) ? esc_html(stripslashes( $_POST['album_extended_back_font_style'])) : 'inherit');	
    $album_extended_back_font_size = (isset($_POST['album_extended_back_font_size']) ? (int) esc_html(stripslashes( $_POST['album_extended_back_font_size'])) : 12);
    $album_extended_back_font_weight = (isset($_POST['album_extended_back_font_weight']) ? esc_html(stripslashes( $_POST['album_extended_back_font_weight'])) : 'normal');
    $album_extended_back_padding = (isset($_POST['album_extended_back_padding']) ? esc_html(stripslashes( $_POST['album_extended_back_padding'])) : '');
    $album_extended_div_bg_color = (isset($_POST['album_extended_div_bg_color']) ? esc_html(stripslashes( $_POST['album_extended_div_bg_color'])) : 'FFFFFF');
    $album_extended_div_bg_transparent = (isset($_POST['album_extended_div_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['album_extended_div_bg_transparent'])) : 80);		
    $album_extended_div_border_radius = (isset($_POST['album_extended_div_border_radius']) ?  esc_html(stripslashes( $_POST['album_extended_div_border_radius'])) : '');
    $album_extended_div_margin = (isset($_POST['album_extended_div_margin']) ?  esc_html(stripslashes( $_POST['album_extended_div_margin'])) : '');
    $album_extended_div_padding = (isset($_POST['album_extended_div_padding']) ? (int) esc_html(stripslashes( $_POST['album_extended_div_padding'])) : 0);
    $album_extended_div_separator_width = (isset($_POST['album_extended_div_separator_width']) ? (int) esc_html(stripslashes( $_POST['album_extended_div_separator_width'])) : 1);		  
    $album_extended_div_separator_style = (isset($_POST['album_extended_div_separator_style']) ? esc_html(stripslashes( $_POST['album_extended_div_separator_style'])) : 'solid');
    $album_extended_div_separator_color = (isset($_POST['album_extended_div_separator_color']) ? esc_html(stripslashes( $_POST['album_extended_div_separator_color'])) : '000000');   
    $album_extended_thumb_div_bg_color = (isset($_POST['album_extended_thumb_div_bg_color']) ?  esc_html(stripslashes( $_POST['album_extended_thumb_div_bg_color'])) : 'FFFFFF');
    $album_extended_thumb_div_border_radius = (isset($_POST['album_extended_thumb_div_border_radius']) ?  esc_html(stripslashes( $_POST['album_extended_thumb_div_border_radius'])) : '');    
    $album_extended_thumb_div_border_width = (isset($_POST['album_extended_thumb_div_border_width']) ? (int)  esc_html(stripslashes( $_POST['album_extended_thumb_div_border_width'])) : 1);
    $album_extended_thumb_div_border_style = (isset($_POST['album_extended_thumb_div_border_style']) ? esc_html(stripslashes( $_POST['album_extended_thumb_div_border_style'])) : 'solid');
    $album_extended_thumb_div_border_color = (isset($_POST['album_extended_thumb_div_border_color']) ? esc_html(stripslashes( $_POST['album_extended_thumb_div_border_color'])) : '000000');
    $album_extended_thumb_div_padding = (isset($_POST['album_extended_thumb_div_padding']) ? esc_html(stripslashes( $_POST['album_extended_thumb_div_padding'])) : '');
    $album_extended_text_div_bg_color = (isset($_POST['album_extended_text_div_bg_color']) ? esc_html(stripslashes( $_POST['album_extended_text_div_bg_color'])) : 'FFFFFF');	
    $album_extended_text_div_border_radius = (isset($_POST['album_extended_text_div_border_radius']) ?  esc_html(stripslashes( $_POST['album_extended_text_div_border_radius'])) : '');
    $album_extended_text_div_border_width = (isset($_POST['album_extended_text_div_border_width']) ? (int) esc_html(stripslashes( $_POST['album_extended_text_div_border_width'])) : 1);
    $album_extended_text_div_border_style = (isset($_POST['album_extended_text_div_border_style']) ? esc_html(stripslashes( $_POST['album_extended_text_div_border_style'])) : 'solid');		
    $album_extended_text_div_border_color = (isset($_POST['album_extended_text_div_border_color']) ? esc_html(stripslashes( $_POST['album_extended_text_div_border_color'])) : '000000');
    $album_extended_text_div_padding = (isset($_POST['album_extended_text_div_padding']) ? esc_html(stripslashes( $_POST['album_extended_text_div_padding'])) : '');
    $album_extended_title_span_border_width = (isset($_POST['album_extended_title_span_border_width']) ? (int) esc_html(stripslashes( $_POST['album_extended_title_span_border_width'])) : 1);
    $album_extended_title_span_border_style = (isset($_POST['album_extended_title_span_border_style']) ? esc_html(stripslashes( $_POST['album_extended_title_span_border_style'])) : 'solid');	
    $album_extended_title_span_border_color = (isset($_POST['album_extended_title_span_border_color']) ? esc_html(stripslashes( $_POST['album_extended_title_span_border_color'])) : '000000');	
    $album_extended_title_font_color = (isset($_POST['album_extended_title_font_color']) ? esc_html(stripslashes( $_POST['album_extended_title_font_color'])) : '000000');
    $album_extended_title_font_style = (isset($_POST['album_extended_title_font_style']) ? esc_html(stripslashes( $_POST['album_extended_title_font_style'])) : 'inherit');
    $album_extended_title_font_size = (isset($_POST['album_extended_title_font_size']) ? (int) esc_html(stripslashes( $_POST['album_extended_title_font_size'])) : 12);
    $album_extended_title_font_weight = (isset($_POST['album_extended_title_font_weight']) ?  esc_html(stripslashes( $_POST['album_extended_title_font_weight'])) : 'normal');
    $album_extended_title_margin_bottom = (isset($_POST['album_extended_title_margin_bottom']) ? (int) esc_html(stripslashes( $_POST['album_extended_title_margin_bottom'])) : 0);		
    $album_extended_title_padding = (isset($_POST['album_extended_title_padding']) ?  esc_html(stripslashes( $_POST['album_extended_title_padding'])) : '');
    $album_extended_desc_span_border_width = (isset($_POST['album_extended_desc_span_border_width']) ? (int)  esc_html(stripslashes( $_POST['album_extended_desc_span_border_width'])) : 1);
    $album_extended_desc_span_border_style = (isset($_POST['album_extended_desc_span_border_style']) ? esc_html(stripslashes( $_POST['album_extended_desc_span_border_style'])) : 'solid');
    $album_extended_desc_span_border_color = (isset($_POST['album_extended_desc_span_border_color']) ? esc_html(stripslashes( $_POST['album_extended_desc_span_border_color'])) : '000000');
    $album_extended_desc_font_color = (isset($_POST['album_extended_desc_font_color']) ?  esc_html(stripslashes( $_POST['album_extended_desc_font_color'])) : '000000');
    $album_extended_desc_font_style = (isset($_POST['album_extended_desc_font_style']) ?  esc_html(stripslashes( $_POST['album_extended_desc_font_style'])) : 'inherit');
    $album_extended_desc_font_size = (isset($_POST['album_extended_desc_font_size']) ? (int) esc_html(stripslashes( $_POST['album_extended_desc_font_size'])) : 12);		
    $album_extended_desc_font_weight = (isset($_POST['album_extended_desc_font_weight']) ?  esc_html(stripslashes( $_POST['album_extended_desc_font_weight'])) : 'normal');
    $album_extended_desc_padding = (isset($_POST['album_extended_desc_padding']) ? esc_html(stripslashes( $_POST['album_extended_desc_padding'])) : '');
    $album_extended_desc_more_color = (isset($_POST['album_extended_desc_more_color']) ? esc_html(stripslashes( $_POST['album_extended_desc_more_color'])) : '000000');
    $album_extended_desc_more_size = (isset($_POST['album_extended_desc_more_size']) ? (int) esc_html(stripslashes( $_POST['album_extended_desc_more_size'])) : 12);

		$album_masonry_title_margin = (isset($_POST['album_masonry_title_margin']) ? esc_html(stripslashes( $_POST['album_masonry_title_margin'])) : '');
    $album_masonry_title_font_style = (isset($_POST['album_masonry_title_font_style']) ? esc_html(stripslashes( $_POST['album_masonry_title_font_style'])) : 'inherit');
    $album_masonry_thumb_title_pos = (isset($_POST['album_masonry_thumb_title_pos']) ?  esc_html(stripslashes( $_POST['album_masonry_thumb_title_pos'])) :'bottom');
    $album_masonry_title_font_color = (isset($_POST['album_masonry_title_font_color']) ? esc_html(stripslashes( $_POST['album_masonry_title_font_color'])) : 'CCCCCC');	
    $album_masonry_title_shadow = (isset($_POST['album_masonry_title_shadow']) ?  esc_html(stripslashes( $_POST['album_masonry_title_shadow'])) : '');
    $album_masonry_title_font_size = (isset($_POST['album_masonry_title_font_size']) ? (int) esc_html(stripslashes( $_POST['album_masonry_title_font_size'])) : 12);
    $album_masonry_title_font_weight = (isset($_POST['album_masonry_title_font_weight']) ? esc_html(stripslashes( $_POST['album_masonry_title_font_weight'])) : 'normal');
    $album_masonry_thumb_margin = (isset($_POST['album_masonry_thumb_margin']) ? (int) esc_html(stripslashes( $_POST['album_masonry_thumb_margin'])) : 0);   
    $album_masonry_back_padding = (isset($_POST['album_masonry_back_padding']) ?  esc_html(stripslashes( $_POST['album_masonry_back_padding'])) : '');
    $album_masonry_thumb_padding = (isset($_POST['album_masonry_thumb_padding']) ? (int)  esc_html(stripslashes( $_POST['album_masonry_thumb_padding'])) : 0);    
    $album_masonry_thumb_border_radius = (isset($_POST['album_masonry_thumb_border_radius']) ?  esc_html(stripslashes( $_POST['album_masonry_thumb_border_radius'])) :'');
    $album_masonry_thumb_border_width = (isset($_POST['album_masonry_thumb_border_width']) ? (int) esc_html(stripslashes( $_POST['album_masonry_thumb_border_width'])) : 1);
    $album_masonry_back_font_color = (isset($_POST['album_masonry_back_font_color']) ? esc_html(stripslashes( $_POST['album_masonry_back_font_color'])) : '000000');
    $album_masonry_thumb_bg_transparent = (isset($_POST['album_masonry_thumb_bg_transparent']) ? (int) esc_html(stripslashes( $_POST['album_masonry_thumb_bg_transparent'])) : 0);
    $album_masonry_thumb_box_shadow = (isset($_POST['album_masonry_thumb_box_shadow']) ? esc_html(stripslashes( $_POST['album_masonry_thumb_box_shadow'])) : '');		
    $album_masonry_thumb_transition = (isset($_POST['album_masonry_thumb_transition']) ? (int) esc_html(stripslashes( $_POST['album_masonry_thumb_transition'])) : 1);
    $album_masonry_thumb_border_style = (isset($_POST['album_masonry_thumb_border_style']) ? esc_html(stripslashes( $_POST['album_masonry_thumb_border_style'])) : 'solid');
    $album_masonry_thumb_border_color = (isset($_POST['album_masonry_thumb_border_color']) ? esc_html(stripslashes( $_POST['album_masonry_thumb_border_color'])) : '000000');
    $album_masonry_thumb_bg_color = (isset($_POST['album_masonry_thumb_bg_color']) ? esc_html(stripslashes( $_POST['album_masonry_thumb_bg_color'])) : 'FFFFFF');	
    $album_masonry_back_font_weight = (isset($_POST['album_masonry_back_font_weight']) ? esc_html(stripslashes( $_POST['album_masonry_back_font_weight'])) : 'normal');	
    $album_masonry_back_font_size = (isset($_POST['album_masonry_back_font_size']) ? (int) esc_html(stripslashes( $_POST['album_masonry_back_font_size'])) : 12);
    $album_masonry_back_font_style = (isset($_POST['album_masonry_back_font_style']) ? esc_html(stripslashes( $_POST['album_masonry_back_font_style'])) : 'inherit');
    $album_masonry_thumbs_bg_color = (isset($_POST['album_masonry_thumbs_bg_color']) ? esc_html(stripslashes( $_POST['album_masonry_thumbs_bg_color'])) : 'FFFFFF');
    $album_masonry_thumb_align = (isset($_POST['album_masonry_thumb_align']) ?  esc_html(stripslashes( $_POST['album_masonry_thumb_align'])) : 'center');
    $album_masonry_thumb_hover_effect = (isset($_POST['album_masonry_thumb_hover_effect']) ?  esc_html(stripslashes( $_POST['album_masonry_thumb_hover_effect'])) :'skew');
    $album_masonry_thumb_transparent = (isset($_POST['album_masonry_thumb_transparent']) ? (int) esc_html(stripslashes( $_POST['album_masonry_thumb_transparent'])) : 80);
    $album_masonry_thumb_hover_effect_value = (isset($_POST['album_masonry_thumb_hover_effect_value']) ? esc_html(stripslashes( $_POST['album_masonry_thumb_hover_effect_value'])) : '35deg');
		
    $slideshow_cont_bg_color = (isset($_POST['slideshow_cont_bg_color']) ?  esc_html(stripslashes( $_POST['slideshow_cont_bg_color'])) : 'FFFFFF');
    $slideshow_close_btn_transparent = (isset($_POST['slideshow_close_btn_transparent']) ? (int) esc_html(stripslashes( $_POST['slideshow_close_btn_transparent'])) : 80);
    $slideshow_rl_btn_bg_color = (isset($_POST['slideshow_rl_btn_bg_color']) ? esc_html(stripslashes( $_POST['slideshow_rl_btn_bg_color'])) : 'FFFFFF');
    $slideshow_rl_btn_border_radius = (isset($_POST['slideshow_rl_btn_border_radius']) ?  esc_html(stripslashes( $_POST['slideshow_rl_btn_border_radius'])) : '');	
    $slideshow_rl_btn_border_width = (isset($_POST['slideshow_rl_btn_border_width']) ? (int) esc_html(stripslashes( $_POST['slideshow_rl_btn_border_width'])) : 1);
    $slideshow_rl_btn_border_style = (isset($_POST['slideshow_rl_btn_border_style']) ?  esc_html(stripslashes( $_POST['slideshow_rl_btn_border_style'])) : 'solid');
    $slideshow_rl_btn_border_color = (isset($_POST['slideshow_rl_btn_border_color']) ? esc_html(stripslashes( $_POST['slideshow_rl_btn_border_color'])) : '000000');		
    $slideshow_rl_btn_box_shadow = (isset($_POST['slideshow_rl_btn_box_shadow']) ? esc_html(stripslashes( $_POST['slideshow_rl_btn_box_shadow'])) : '');
    $slideshow_rl_btn_color = (isset($_POST['slideshow_rl_btn_color']) ? esc_html(stripslashes( $_POST['slideshow_rl_btn_color'])) : '000000');
    $slideshow_rl_btn_height = (isset($_POST['slideshow_rl_btn_height']) ? (int) esc_html(stripslashes( $_POST['slideshow_rl_btn_height'])) : 10);
    $slideshow_rl_btn_size = (isset($_POST['slideshow_rl_btn_size']) ? (int) esc_html(stripslashes( $_POST['slideshow_rl_btn_size'])) : 13);	
    $slideshow_rl_btn_width = (isset($_POST['slideshow_rl_btn_width']) ? (int) esc_html(stripslashes( $_POST['slideshow_rl_btn_width'])) : 30);	
    $slideshow_close_rl_btn_hover_color = (isset($_POST['slideshow_close_rl_btn_hover_color']) ? esc_html(stripslashes( $_POST['slideshow_close_rl_btn_hover_color'])) : 'FFFFFF');
    $slideshow_filmstrip_pos = (isset($_POST['slideshow_filmstrip_pos']) ? esc_html(stripslashes( $_POST['slideshow_filmstrip_pos'])) : 'top');
    $slideshow_filmstrip_thumb_border_width = (isset($_POST['slideshow_filmstrip_thumb_border_width']) ? (int) esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_border_width'])) : 1);
    $slideshow_filmstrip_thumb_border_style = (isset($_POST['slideshow_filmstrip_thumb_border_style']) ? esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_border_style'])) : 'solid');
    $slideshow_filmstrip_thumb_border_color = (isset($_POST['slideshow_filmstrip_thumb_border_color']) ? esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_border_color'])) : '000000');		
    $slideshow_filmstrip_thumb_border_radius = (isset($_POST['slideshow_filmstrip_thumb_border_radius']) ?  esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_border_radius'])) : '');
    $slideshow_filmstrip_thumb_margin = (isset($_POST['slideshow_filmstrip_thumb_margin']) ?  esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_margin'])) : '');
    $slideshow_filmstrip_thumb_active_border_width = (isset($_POST['slideshow_filmstrip_thumb_active_border_width']) ? (int) esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_active_border_width'])) : 1);
    $slideshow_filmstrip_thumb_active_border_color = (isset($_POST['slideshow_filmstrip_thumb_active_border_color']) ? esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_active_border_color'])) : '000000');		  
    $slideshow_filmstrip_thumb_deactive_transparent = (isset($_POST['slideshow_filmstrip_thumb_deactive_transparent']) ? (int) esc_html(stripslashes( $_POST['slideshow_filmstrip_thumb_deactive_transparent'])) : 80);
    $slideshow_filmstrip_rl_bg_color = (isset($_POST['slideshow_filmstrip_rl_bg_color']) ? esc_html(stripslashes( $_POST['slideshow_filmstrip_rl_bg_color'])) : 'FFFFFF');   
    $slideshow_filmstrip_rl_btn_color = (isset($_POST['slideshow_filmstrip_rl_btn_color']) ?  esc_html(stripslashes( $_POST['slideshow_filmstrip_rl_btn_color'])) : 'FFFFFF');
    $slideshow_filmstrip_rl_btn_size = (isset($_POST['slideshow_filmstrip_rl_btn_size']) ? (int) esc_html(stripslashes( $_POST['slideshow_filmstrip_rl_btn_size'])) : 15);    
    $slideshow_title_font_size = (isset($_POST['slideshow_title_font_size']) ? (int)  esc_html(stripslashes( $_POST['slideshow_title_font_size'])) : 15);
    $slideshow_title_font = (isset($_POST['slideshow_title_font']) ? esc_html(stripslashes( $_POST['slideshow_title_font'])) : 'cursive');
    $slideshow_title_color = (isset($_POST['slideshow_title_color']) ? esc_html(stripslashes( $_POST['slideshow_title_color'])) : '000000');
    $slideshow_title_opacity = (isset($_POST['slideshow_title_opacity']) ? (int) esc_html(stripslashes( $_POST['slideshow_title_opacity'])) : 80);
    $slideshow_title_border_radius = (isset($_POST['slideshow_title_border_radius']) ? esc_html(stripslashes( $_POST['slideshow_title_border_radius'])) : '');	
    $slideshow_title_background_color = (isset($_POST['slideshow_title_background_color']) ?  esc_html(stripslashes( $_POST['slideshow_title_background_color'])) : 'FFFFFF');
    $slideshow_title_padding = (isset($_POST['slideshow_title_padding']) ? esc_html(stripslashes( $_POST['slideshow_title_padding'])) : '');
    $slideshow_description_font_size = (isset($_POST['slideshow_description_font_size']) ? (int) esc_html(stripslashes( $_POST['slideshow_description_font_size'])) : 15);		
    $slideshow_description_font = (isset($_POST['slideshow_description_font']) ? esc_html(stripslashes( $_POST['slideshow_description_font'])) : 'cursive');
    $slideshow_description_color = (isset($_POST['slideshow_description_color']) ? esc_html(stripslashes( $_POST['slideshow_description_color'])) : '000000');
    $slideshow_description_opacity = (isset($_POST['slideshow_description_opacity']) ? (int) esc_html(stripslashes( $_POST['slideshow_description_opacity'])) : 80);
    $slideshow_description_border_radius = (isset($_POST['slideshow_description_border_radius']) ? esc_html(stripslashes( $_POST['slideshow_description_border_radius'])) : '');	
    $slideshow_description_background_color = (isset($_POST['slideshow_description_background_color']) ? esc_html(stripslashes( $_POST['slideshow_description_background_color'])) : 'FFFFFF');	
    $slideshow_description_padding = (isset($_POST['slideshow_description_padding']) ? esc_html(stripslashes( $_POST['slideshow_description_padding'])) : '');
    $slideshow_dots_width = (isset($_POST['slideshow_dots_width']) ? (int) esc_html(stripslashes( $_POST['slideshow_dots_width'])) : 5);
    $slideshow_dots_height = (isset($_POST['slideshow_dots_height']) ? (int) esc_html(stripslashes( $_POST['slideshow_dots_height'])) : 5);
    $slideshow_dots_border_radius = (isset($_POST['slideshow_dots_border_radius']) ?  esc_html(stripslashes( $_POST['slideshow_dots_border_radius'])) : '');
    $slideshow_dots_background_color = (isset($_POST['slideshow_dots_background_color']) ?  esc_html(stripslashes( $_POST['slideshow_dots_background_color'])) : 'FFFFFF');		
    $slideshow_dots_margin = (isset($_POST['slideshow_dots_margin']) ? (int) esc_html(stripslashes( $_POST['slideshow_dots_margin'])) : 0);
    $slideshow_dots_active_background_color = (isset($_POST['slideshow_dots_active_background_color']) ?  esc_html(stripslashes( $_POST['slideshow_dots_active_background_color'])) : 'FFFFFF');
    $slideshow_dots_active_border_width = (isset($_POST['slideshow_dots_active_border_width']) ? (int) esc_html(stripslashes( $_POST['slideshow_dots_active_border_width'])) : 1);
    $slideshow_dots_active_border_color = (isset($_POST['slideshow_dots_active_border_color']) ? esc_html(stripslashes( $_POST['slideshow_dots_active_border_color'])) : '000000');
    $slideshow_play_pause_btn_size = (isset($_POST['slideshow_play_pause_btn_size']) ? (int) esc_html(stripslashes( $_POST['slideshow_play_pause_btn_size'])) : 15);
    $slideshow_rl_btn_style = (isset($_POST['slideshow_rl_btn_style']) ?  esc_html(stripslashes( $_POST['slideshow_rl_btn_style'])) : 'fa-chevron');

    $masonry_thumb_padding = (isset($_POST['masonry_thumb_padding']) ?  esc_html(stripslashes( $_POST['masonry_thumb_padding'])) : 4);
    $masonry_thumb_border_radius = (isset($_POST['masonry_thumb_border_radius']) ?  esc_html(stripslashes( $_POST['masonry_thumb_border_radius'])) : '2px');
    $masonry_thumb_border_width = (isset($_POST['masonry_thumb_border_width']) ?  esc_html(stripslashes( $_POST['masonry_thumb_border_width'])) : 1);
    $masonry_thumb_border_style = (isset($_POST['masonry_thumb_border_style']) ?  esc_html(stripslashes( $_POST['masonry_thumb_border_style'])) : 'solid');
    $masonry_thumb_border_color = (isset($_POST['masonry_thumb_border_color']) ?  esc_html(stripslashes( $_POST['masonry_thumb_border_color'])) : 'CCCCCC');
    $masonry_thumbs_bg_color = (isset($_POST['masonry_thumbs_bg_color']) ?  esc_html(stripslashes( $_POST['masonry_thumbs_bg_color'])) : 'FFFFFF');
    $masonry_thumb_bg_transparent = (isset($_POST['masonry_thumb_bg_transparent']) ?  esc_html(stripslashes( $_POST['masonry_thumb_bg_transparent'])) : 0);
    $masonry_thumb_transparent = (isset($_POST['masonry_thumb_transparent']) ?  esc_html(stripslashes( $_POST['masonry_thumb_transparent'])) : 100);
    $masonry_thumb_align = (isset($_POST['masonry_thumb_align']) ?  esc_html(stripslashes( $_POST['masonry_thumb_align'])) : 'left');
    $masonry_thumb_hover_effect = (isset($_POST['masonry_thumb_hover_effect']) ?  esc_html(stripslashes( $_POST['masonry_thumb_hover_effect'])) : 'scale');
    $masonry_thumb_hover_effect_value = (isset($_POST['masonry_thumb_hover_effect_value']) ?  esc_html(stripslashes( $_POST['masonry_thumb_hover_effect_value'])) : '1.3');
    $masonry_thumb_transition = (isset($_POST['masonry_thumb_transition']) ?  esc_html(stripslashes( $_POST['masonry_thumb_transition'])) : 0);

    $mosaic_thumb_padding = (isset($_POST['mosaic_thumb_padding']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_padding'])) : 4);
    $mosaic_thumb_border_radius = (isset($_POST['mosaic_thumb_border_radius']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_border_radius'])) : '2px');
    $mosaic_thumb_border_width = (isset($_POST['mosaic_thumb_border_width']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_border_width'])) : 1);
    $mosaic_thumb_border_style = (isset($_POST['mosaic_thumb_border_style']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_border_style'])) : 'solid');
    $mosaic_thumb_border_color = (isset($_POST['mosaic_thumb_border_color']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_border_color'])) : 'CCCCCC');
    $mosaic_thumbs_bg_color = (isset($_POST['mosaic_thumbs_bg_color']) ?  esc_html(stripslashes( $_POST['mosaic_thumbs_bg_color'])) : 'FFFFFF');
    $mosaic_thumb_bg_transparent = (isset($_POST['mosaic_thumb_bg_transparent']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_bg_transparent'])) : 0);
    $mosaic_thumb_transparent = (isset($_POST['mosaic_thumb_transparent']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_transparent'])) : 100);
    $mosaic_thumb_align = (isset($_POST['mosaic_thumb_align']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_align'])) : 'left');
    $mosaic_thumb_hover_effect = (isset($_POST['mosaic_thumb_hover_effect']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_hover_effect'])) : 'scale');
    $mosaic_thumb_hover_effect_value = (isset($_POST['mosaic_thumb_hover_effect_value']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_hover_effect_value'])) : '1.3');
    $mosaic_thumb_title_margin = (isset($_POST['mosaic_thumb_title_margin']) ? esc_html(stripslashes( $_POST['mosaic_thumb_title_margin'])) : '');
    $mosaic_thumb_title_font_style = (isset($_POST['mosaic_thumb_title_font_style']) ? esc_html(stripslashes( $_POST['mosaic_thumb_title_font_style'])) : 'inherit');
    $mosaic_thumb_title_font_color = (isset($_POST['mosaic_thumb_title_font_color']) ? esc_html(stripslashes( $_POST['mosaic_thumb_title_font_color'])) : 'CCCCCC'); 
    $mosaic_thumb_title_shadow = (isset($_POST['mosaic_thumb_title_shadow']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_title_shadow'])) : '');
    $mosaic_thumb_title_font_size = (isset($_POST['mosaic_thumb_title_font_size']) ? (int) esc_html(stripslashes( $_POST['mosaic_thumb_title_font_size'])) : 12);
    $mosaic_thumb_title_font_weight = (isset($_POST['mosaic_thumb_title_font_weight']) ? esc_html(stripslashes( $_POST['mosaic_thumb_title_font_weight'])) : 'normal');    
    $lightbox_info_pos = (isset($_POST['lightbox_info_pos']) ?  esc_html(stripslashes( $_POST['lightbox_info_pos'])) : 'top');
    $lightbox_info_align = (isset($_POST['lightbox_info_align']) ?  esc_html(stripslashes( $_POST['lightbox_info_align'])) : 'right');
    $lightbox_info_bg_color = (isset($_POST['lightbox_info_bg_color']) ?  esc_html(stripslashes( $_POST['lightbox_info_bg_color'])) : '000000');
    $lightbox_info_bg_transparent = (isset($_POST['lightbox_info_bg_transparent']) ?  esc_html(stripslashes( $_POST['lightbox_info_bg_transparent'])) : 70);
    $lightbox_info_border_width = (isset($_POST['lightbox_info_border_width']) ?  esc_html(stripslashes( $_POST['lightbox_info_border_width'])) : 1);
    $lightbox_info_border_style = (isset($_POST['lightbox_info_border_style']) ?  esc_html(stripslashes( $_POST['lightbox_info_border_style'])) : 'none');
    $lightbox_info_border_color = (isset($_POST['lightbox_info_border_color']) ?  esc_html(stripslashes( $_POST['lightbox_info_border_color'])) : '000000');
    $lightbox_info_border_radius = (isset($_POST['lightbox_info_border_radius']) ?  esc_html(stripslashes( $_POST['lightbox_info_border_radius'])) : 5);
    $lightbox_info_padding = (isset($_POST['lightbox_info_padding']) ?  esc_html(stripslashes( $_POST['lightbox_info_padding'])) : '5px');
    $lightbox_info_margin = (isset($_POST['lightbox_info_margin']) ?  esc_html(stripslashes( $_POST['lightbox_info_margin'])) : '15px');
    $lightbox_title_color = (isset($_POST['lightbox_title_color']) ?  esc_html(stripslashes( $_POST['lightbox_title_color'])) : 'FFFFFF');
    $lightbox_title_font_style = (isset($_POST['lightbox_title_font_style']) ?  esc_html(stripslashes( $_POST['lightbox_title_font_style'])) : 'segoe ui');
    $lightbox_title_font_weight = (isset($_POST['lightbox_title_font_weight']) ?  esc_html(stripslashes( $_POST['lightbox_title_font_weight'])) : 'bold');
    $lightbox_title_font_size = (isset($_POST['lightbox_title_font_size']) ?  esc_html(stripslashes( $_POST['lightbox_title_font_size'])) : 18);
    $lightbox_description_color = (isset($_POST['lightbox_description_color']) ?  esc_html(stripslashes( $_POST['lightbox_description_color'])) : 'FFFFFF');
    $lightbox_description_font_style = (isset($_POST['lightbox_description_font_style']) ?  esc_html(stripslashes( $_POST['lightbox_description_font_style'])) : 'segoe ui');
    $lightbox_description_font_weight = (isset($_POST['lightbox_description_font_weight']) ?  esc_html(stripslashes( $_POST['lightbox_description_font_weight'])) : 'normal');
    $lightbox_description_font_size = (isset($_POST['lightbox_description_font_size']) ?  esc_html(stripslashes( $_POST['lightbox_description_font_size'])) : 14);
    $lightbox_rate_pos = (isset($_POST['lightbox_rate_pos']) ?  esc_html(stripslashes( $_POST['lightbox_rate_pos'])) : 'bottom');
    $lightbox_rate_align = (isset($_POST['lightbox_rate_align']) ?  esc_html(stripslashes( $_POST['lightbox_rate_align'])) : 'right');
    $lightbox_rate_icon = (isset($_POST['lightbox_rate_icon']) ?  esc_html(stripslashes( $_POST['lightbox_rate_icon'])) : 'star');
    $lightbox_rate_color = (isset($_POST['lightbox_rate_color']) ?  esc_html(stripslashes( $_POST['lightbox_rate_color'])) : 'F9D062');
    $lightbox_rate_size = (isset($_POST['lightbox_rate_size']) ?  esc_html(stripslashes( $_POST['lightbox_rate_size'])) : 20);
    $lightbox_rate_stars_count = (isset($_POST['lightbox_rate_stars_count']) ?  esc_html(stripslashes( $_POST['lightbox_rate_stars_count'])) : 5);
    $lightbox_rate_padding = (isset($_POST['lightbox_rate_padding']) ?  esc_html(stripslashes( $_POST['lightbox_rate_padding'])) : '15px');
    $lightbox_rate_hover_color = (isset($_POST['lightbox_rate_hover_color']) ?  esc_html(stripslashes( $_POST['lightbox_rate_hover_color'])) : 'F7B50E');

    $lightbox_hit_pos = (isset($_POST['lightbox_hit_pos']) ?  esc_html(stripslashes( $_POST['lightbox_hit_pos'])) : 'bottom');
    $lightbox_hit_align = (isset($_POST['lightbox_hit_align']) ?  esc_html(stripslashes( $_POST['lightbox_hit_align'])) : 'left');
    $lightbox_hit_bg_color = (isset($_POST['lightbox_hit_bg_color']) ?  esc_html(stripslashes( $_POST['lightbox_hit_bg_color'])) : '000000');
    $lightbox_hit_bg_transparent = (isset($_POST['lightbox_hit_bg_transparent']) ?  esc_html(stripslashes( $_POST['lightbox_hit_bg_transparent'])) : 70);
    $lightbox_hit_border_width = (isset($_POST['lightbox_hit_border_width']) ?  esc_html(stripslashes( $_POST['lightbox_hit_border_width'])) : 1);
    $lightbox_hit_border_style = (isset($_POST['lightbox_hit_border_style']) ?  esc_html(stripslashes( $_POST['lightbox_hit_border_style'])) : 'none');
    $lightbox_hit_border_color = (isset($_POST['lightbox_hit_border_color']) ?  esc_html(stripslashes( $_POST['lightbox_hit_border_color'])) : '000000');
    $lightbox_hit_border_radius = (isset($_POST['lightbox_hit_border_radius']) ?  esc_html(stripslashes( $_POST['lightbox_hit_border_radius'])) : 5);
    $lightbox_hit_padding = (isset($_POST['lightbox_hit_padding']) ?  esc_html(stripslashes( $_POST['lightbox_hit_padding'])) : '5px');
    $lightbox_hit_margin = (isset($_POST['lightbox_hit_margin']) ?  esc_html(stripslashes( $_POST['lightbox_hit_margin'])) : '0 5px');
    $lightbox_hit_color = (isset($_POST['lightbox_hit_color']) ?  esc_html(stripslashes( $_POST['lightbox_hit_color'])) : 'FFFFFF');
    $lightbox_hit_font_style = (isset($_POST['lightbox_hit_font_style']) ?  esc_html(stripslashes( $_POST['lightbox_hit_font_style'])) : 'segoe ui');
    $lightbox_hit_font_weight = (isset($_POST['lightbox_hit_font_weight']) ?  esc_html(stripslashes( $_POST['lightbox_hit_font_weight'])) : 'normal');
    $lightbox_hit_font_size = (isset($_POST['lightbox_hit_font_size']) ?  esc_html(stripslashes( $_POST['lightbox_hit_font_size'])) : 14);
    $masonry_description_font_size = (isset($_POST['masonry_description_font_size']) ? (int) esc_html(stripslashes( $_POST['masonry_description_font_size'])) : 12);
    $masonry_description_color = (isset($_POST['masonry_description_color']) ? esc_html(stripslashes( $_POST['masonry_description_color'])) : 'CCCCCC');
    $masonry_description_font_style = (isset($_POST['masonry_description_font_style']) ? esc_html(stripslashes( $_POST['masonry_description_font_style'])) : 'segoe ui');
    //carousel
    $carousel_cont_bg_color = (isset($_POST['carousel_cont_bg_color']) ?  esc_html(stripslashes( $_POST['carousel_cont_bg_color'])) : 'FFFFFF');
    $carousel_cont_btn_transparent = (isset($_POST['carousel_cont_btn_transparent']) ? (int) esc_html(stripslashes( $_POST['carousel_cont_btn_transparent'])) : 0);
    $carousel_close_btn_transparent = (isset($_POST['carousel_close_btn_transparent']) ? (int) esc_html(stripslashes( $_POST['carousel_close_btn_transparent'])) : 80);
    $carousel_rl_btn_bg_color = (isset($_POST['carousel_rl_btn_bg_color']) ? esc_html(stripslashes( $_POST['carousel_rl_btn_bg_color'])) : 'CCCCCC');
    $carousel_rl_btn_border_radius = (isset($_POST['carousel_rl_btn_border_radius']) ?  esc_html(stripslashes( $_POST['carousel_rl_btn_border_radius'])) : '');	
    $carousel_rl_btn_border_width = (isset($_POST['carousel_rl_btn_border_width']) ? (int) esc_html(stripslashes( $_POST['carousel_rl_btn_border_width'])) : 1);
    $carousel_rl_btn_border_style = (isset($_POST['carousel_rl_btn_border_style']) ?  esc_html(stripslashes( $_POST['carousel_rl_btn_border_style'])) : 'solid');
    $carousel_rl_btn_border_color = (isset($_POST['carousel_rl_btn_border_color']) ? esc_html(stripslashes( $_POST['carousel_rl_btn_border_color'])) : '000000');
    $carousel_rl_btn_color = (isset($_POST['carousel_rl_btn_color']) ? esc_html(stripslashes( $_POST['carousel_rl_btn_color'])) : 'FFFFFF');
    $carousel_rl_btn_height = (isset($_POST['carousel_rl_btn_height']) ? (int) esc_html(stripslashes( $_POST['carousel_rl_btn_height'])) : 10);
    $carousel_rl_btn_size = (isset($_POST['carousel_rl_btn_size']) ? (int) esc_html(stripslashes( $_POST['carousel_rl_btn_size'])) : 20);
    $carousel_play_pause_btn_size = (isset($_POST['carousel_play_pause_btn_size']) ? (int) esc_html(stripslashes( $_POST['carousel_play_pause_btn_size'])) : 20);    
    $carousel_rl_btn_width = (isset($_POST['carousel_rl_btn_width']) ? (int) esc_html(stripslashes( $_POST['carousel_rl_btn_width'])) : 30);	
    $carousel_close_rl_btn_hover_color = (isset($_POST['carousel_close_rl_btn_hover_color']) ? esc_html(stripslashes( $_POST['carousel_close_rl_btn_hover_color'])) : 'FFFFFF');
    $carousel_rl_btn_style = (isset($_POST['carousel_rl_btn_style']) ?  esc_html(stripslashes( $_POST['carousel_rl_btn_style'])) : 'fa-chevron');
    $carousel_mergin_bottom = (isset($_POST['carousel_mergin_bottom']) ? esc_html(stripslashes( $_POST['carousel_mergin_bottom'])) : '1');    
    $carousel_font_family  = (isset($_POST['carousel_font_family']) ? esc_html(stripslashes( $_POST['carousel_font_family'])) : 'Arial');
    $carousel_feature_border_width = (isset($_POST['carousel_feature_border_width']) ? (int) esc_html(stripslashes( $_POST['carousel_feature_border_width'])) : 2);		
    $carousel_feature_border_style = (isset($_POST['carousel_feature_border_style']) ?  esc_html(stripslashes( $_POST['carousel_feature_border_style'])) : 'solid');
    $carousel_feature_border_color = (isset($_POST['carousel_feature_border_color']) ?  esc_html(stripslashes( $_POST['carousel_feature_border_color'])) : '5D204F');      
    $carousel_caption_background_color = (isset($_POST['carousel_caption_background_color']) ?  esc_html(stripslashes( $_POST['carousel_caption_background_color'])) : '000000');
    $carousel_caption_bottom = (isset($_POST['carousel_caption_bottom']) ? (int) esc_html(stripslashes( $_POST['carousel_caption_bottom'])) : 0);   
    $carousel_caption_p_mergin = (isset($_POST['carousel_caption_p_mergin']) ? (int) esc_html(stripslashes( $_POST['carousel_caption_p_mergin'])) : 0);
    $carousel_caption_p_pedding = (isset($_POST['carousel_caption_p_pedding']) ? (int) esc_html(stripslashes( $_POST['carousel_caption_p_pedding'])) : 5);    
    $carousel_caption_p_font_weight = (isset($_POST['carousel_caption_p_font_weight']) ?  esc_html(stripslashes( $_POST['carousel_caption_p_font_weight'])) : 'bold');
    $carousel_caption_p_font_size = (isset($_POST['carousel_caption_p_font_size']) ? (int) esc_html(stripslashes( $_POST['carousel_caption_p_font_size'])) : 14);
    $carousel_caption_p_color = (isset($_POST['carousel_caption_p_color']) ? esc_html(stripslashes( $_POST['carousel_caption_p_color'])) : '000000');
    $carousel_title_opacity = (isset($_POST['carousel_title_opacity']) ? (int) esc_html(stripslashes( $_POST['carousel_title_opacity'])) : 100);
    $carousel_title_border_radius = (isset($_POST['carousel_title_border_radius']) ? esc_html(stripslashes( $_POST['carousel_title_border_radius'])) : '5px');
    $mosaic_thumb_transition = (isset($_POST['mosaic_thumb_transition']) ?  esc_html(stripslashes( $_POST['mosaic_thumb_transition'])) : 1);

    $default_theme = (isset($_POST['default_theme']) ? esc_html(stripslashes( $_POST['default_theme'])) : 0);
    $themes = array(
      'thumb_margin' => $thumb_margin,
      'thumb_padding' => $thumb_padding,
      'thumb_border_radius' => $thumb_border_radius,
      'thumb_border_width' => $thumb_border_width,
      'thumb_border_style' => $thumb_border_style,
      'thumb_border_color' => $thumb_border_color,
      'thumb_bg_color' => $thumb_bg_color,
      'thumbs_bg_color' => $thumbs_bg_color,
      'thumb_bg_transparent' => $thumb_bg_transparent,
      'thumb_box_shadow' => $thumb_box_shadow,
      'thumb_transparent' => $thumb_transparent,
      'thumb_align' => $thumb_align,
      'thumb_hover_effect' => $thumb_hover_effect,
      'thumb_hover_effect_value' => $thumb_hover_effect_value,
      'thumb_transition' => $thumb_transition,
      'thumb_title_margin' => $thumb_title_margin,
      'thumb_title_font_style' => $thumb_title_font_style,
      'thumb_title_pos' => $thumb_title_pos,
      'thumb_title_font_color' => $thumb_title_font_color,
      'thumb_title_shadow' => $thumb_title_shadow,
      'thumb_title_font_size' => $thumb_title_font_size,
      'thumb_title_font_weight' => $thumb_title_font_weight,

      'page_nav_position' => $page_nav_position,
      'page_nav_align' => $page_nav_align,              
      'page_nav_number' => $page_nav_number,
      'page_nav_font_size' => $page_nav_font_size,
      'page_nav_font_style' => $page_nav_font_style,
      'page_nav_font_color' => $page_nav_font_color,
      'page_nav_font_weight' => $page_nav_font_weight,
      'page_nav_border_width' => $page_nav_border_width,
      'page_nav_border_style'=> $page_nav_border_style,
      'page_nav_border_color' => $page_nav_border_color,
      'page_nav_border_radius' => $page_nav_border_radius,
      'page_nav_margin' => $page_nav_margin,
      'page_nav_padding' => $page_nav_padding,
      'page_nav_button_bg_color' => $page_nav_button_bg_color,
      'page_nav_button_bg_transparent' => $page_nav_button_bg_transparent,
      'page_nav_box_shadow' => $page_nav_box_shadow,
      'page_nav_button_transition' => $page_nav_button_transition,
      'page_nav_button_text' => $page_nav_button_text,
      'lightbox_ctrl_btn_pos' => $lightbox_ctrl_btn_pos,
      'lightbox_ctrl_btn_align' => $lightbox_ctrl_btn_align,
      'lightbox_ctrl_btn_height' => $lightbox_ctrl_btn_height,
      'lightbox_ctrl_btn_margin_top' => $lightbox_ctrl_btn_margin_top,
      'lightbox_ctrl_btn_margin_left' => $lightbox_ctrl_btn_margin_left,
      'lightbox_ctrl_btn_transparent' => $lightbox_ctrl_btn_transparent,
      'lightbox_ctrl_btn_color' => $lightbox_ctrl_btn_color,
      'lightbox_toggle_btn_height' => $lightbox_toggle_btn_height,
      'lightbox_toggle_btn_width' => $lightbox_toggle_btn_width,                
      'lightbox_ctrl_cont_bg_color' => $lightbox_ctrl_cont_bg_color,
      'lightbox_ctrl_cont_border_radius' => $lightbox_ctrl_cont_border_radius,
      'lightbox_ctrl_cont_transparent' => $lightbox_ctrl_cont_transparent,
      'lightbox_close_btn_bg_color' => $lightbox_close_btn_bg_color,
      'lightbox_close_btn_border_radius' => $lightbox_close_btn_border_radius,
      'lightbox_close_btn_border_width' => $lightbox_close_btn_border_width,
      'lightbox_close_btn_border_style' => $lightbox_close_btn_border_style,
      'lightbox_close_btn_border_color' => $lightbox_close_btn_border_color,
      'lightbox_close_btn_box_shadow' => $lightbox_close_btn_box_shadow,
      'lightbox_close_btn_color' => $lightbox_close_btn_color,
      'lightbox_close_btn_size' => $lightbox_close_btn_size,
      'lightbox_close_btn_width' => $lightbox_close_btn_width,
      'lightbox_close_btn_height' => $lightbox_close_btn_height,
      'lightbox_close_btn_top' => $lightbox_close_btn_top,
      'lightbox_close_btn_right' => $lightbox_close_btn_right,
      'lightbox_close_btn_full_color' => $lightbox_close_btn_full_color,
      'lightbox_close_btn_transparent' => $lightbox_close_btn_transparent,
      'lightbox_rl_btn_bg_color' => $lightbox_rl_btn_bg_color,
      'lightbox_rl_btn_transparent' => $lightbox_rl_btn_transparent,
      'lightbox_rl_btn_border_radius' => $lightbox_rl_btn_border_radius,
      'lightbox_rl_btn_border_width' => $lightbox_rl_btn_border_width,
      'lightbox_rl_btn_border_style' => $lightbox_rl_btn_border_style,
      'lightbox_rl_btn_border_color' => $lightbox_rl_btn_border_color,
      'lightbox_rl_btn_box_shadow' => $lightbox_rl_btn_box_shadow,
      'lightbox_rl_btn_color' => $lightbox_rl_btn_color,
      'lightbox_rl_btn_height' => $lightbox_rl_btn_height,
      'lightbox_rl_btn_width' => $lightbox_rl_btn_width,
      'lightbox_rl_btn_size' => $lightbox_rl_btn_size,
      'lightbox_close_rl_btn_hover_color' => $lightbox_close_rl_btn_hover_color,
      'lightbox_comment_pos' => $lightbox_comment_pos,
      'lightbox_comment_width' => $lightbox_comment_width,
      'lightbox_comment_bg_color' => $lightbox_comment_bg_color,
      'lightbox_comment_font_color' => $lightbox_comment_font_color,
      'lightbox_comment_font_style' => $lightbox_comment_font_style,
      'lightbox_comment_font_size' => $lightbox_comment_font_size,
      'lightbox_comment_button_bg_color' => $lightbox_comment_button_bg_color,
      'lightbox_comment_button_border_color' => $lightbox_comment_button_border_color,
      'lightbox_comment_button_border_width' => $lightbox_comment_button_border_width,
      'lightbox_comment_button_border_style' => $lightbox_comment_button_border_style,
      'lightbox_comment_button_border_radius' => $lightbox_comment_button_border_radius,
      'lightbox_comment_button_padding' => $lightbox_comment_button_padding,
      'lightbox_comment_input_bg_color' => $lightbox_comment_input_bg_color,
      'lightbox_comment_input_border_color' => $lightbox_comment_input_border_color,
      'lightbox_comment_input_border_width' => $lightbox_comment_input_border_width,
      'lightbox_comment_input_border_style' => $lightbox_comment_input_border_style,
      'lightbox_comment_input_border_radius' => $lightbox_comment_input_border_radius,
      'lightbox_comment_input_padding' => $lightbox_comment_input_padding,
      'lightbox_comment_separator_width' => $lightbox_comment_separator_width,
      'lightbox_comment_separator_style' => $lightbox_comment_separator_style,
      'lightbox_comment_separator_color' => $lightbox_comment_separator_color,
      'lightbox_comment_author_font_size' => $lightbox_comment_author_font_size,
      'lightbox_comment_date_font_size' => $lightbox_comment_date_font_size,
      'lightbox_comment_body_font_size' => $lightbox_comment_body_font_size,
      'lightbox_comment_share_button_color' => $lightbox_comment_share_button_color,
      'lightbox_filmstrip_rl_bg_color' => $lightbox_filmstrip_rl_bg_color,
      'lightbox_filmstrip_rl_btn_size' => $lightbox_filmstrip_rl_btn_size,
      'lightbox_filmstrip_rl_btn_color' => $lightbox_filmstrip_rl_btn_color,
      'lightbox_filmstrip_thumb_margin' => $lightbox_filmstrip_thumb_margin,
      'lightbox_filmstrip_thumb_border_width' => $lightbox_filmstrip_thumb_border_width,
      'lightbox_filmstrip_thumb_border_style' => $lightbox_filmstrip_thumb_border_style,
      'lightbox_filmstrip_thumb_border_color' => $lightbox_filmstrip_thumb_border_color,
      'lightbox_filmstrip_thumb_border_radius' => $lightbox_filmstrip_thumb_border_radius,
      'lightbox_filmstrip_thumb_deactive_transparent' => $lightbox_filmstrip_thumb_deactive_transparent,
      'lightbox_filmstrip_pos' => $lightbox_filmstrip_pos,
      'lightbox_filmstrip_thumb_active_border_width' => $lightbox_filmstrip_thumb_active_border_width,
      'lightbox_filmstrip_thumb_active_border_color' => $lightbox_filmstrip_thumb_active_border_color,
      'lightbox_overlay_bg_transparent' => $lightbox_overlay_bg_transparent,
      'lightbox_bg_color' => $lightbox_bg_color,
      'lightbox_overlay_bg_color' => $lightbox_overlay_bg_color,
      'lightbox_rl_btn_style' => $lightbox_rl_btn_style,
      'lightbox_bg_transparent' => $lightbox_bg_transparent, 

      'blog_style_margin' => $blog_style_margin,
      'blog_style_padding' => $blog_style_padding,
      'blog_style_border_radius' => $blog_style_border_radius,
      'blog_style_border_width' => $blog_style_border_width,
      'blog_style_border_style' => $blog_style_border_style,
      'blog_style_border_color' => $blog_style_border_color,
      'blog_style_bg_color' => $blog_style_bg_color,
      'blog_style_transparent' => $blog_style_transparent,
      'blog_style_box_shadow' => $blog_style_box_shadow,
      'blog_style_align' => $blog_style_align,
      'blog_style_share_buttons_margin' => $blog_style_share_buttons_margin,
      'blog_style_share_buttons_border_radius' => $blog_style_share_buttons_border_radius,
      'blog_style_share_buttons_border_width' => $blog_style_share_buttons_border_width,
      'blog_style_share_buttons_border_style' => $blog_style_share_buttons_border_style,
      'blog_style_share_buttons_border_color' => $blog_style_share_buttons_border_color,
      'blog_style_share_buttons_bg_color' => $blog_style_share_buttons_bg_color,
      'blog_style_share_buttons_align' => $blog_style_share_buttons_align,
      'blog_style_img_font_size' => $blog_style_img_font_size,
      'blog_style_img_font_family' => $blog_style_img_font_family,
      'blog_style_img_font_color' => $blog_style_img_font_color,
      'blog_style_share_buttons_font_size' => $blog_style_share_buttons_font_size,
      'blog_style_share_buttons_color' => $blog_style_share_buttons_color,
      'blog_style_share_buttons_bg_transparent' => $blog_style_share_buttons_bg_transparent,

      'image_browser_margin' => $image_browser_margin,
      'image_browser_padding' => $image_browser_padding,
      'image_browser_border_radius'=> $image_browser_border_radius,
      'image_browser_border_width' => $image_browser_border_width,
      'image_browser_border_style' => $image_browser_border_style,
      'image_browser_border_color' => $image_browser_border_color,
      'image_browser_bg_color' => $image_browser_bg_color,
      'image_browser_box_shadow' => $image_browser_box_shadow,
      'image_browser_transparent' => $image_browser_transparent,
      'image_browser_align' => $image_browser_align,	
      'image_browser_image_description_margin' => $image_browser_image_description_margin,
      'image_browser_image_description_padding' => $image_browser_image_description_padding,
      'image_browser_image_description_border_radius' => $image_browser_image_description_border_radius,
      'image_browser_image_description_border_width' => $image_browser_image_description_border_width,
      'image_browser_image_description_border_style' => $image_browser_image_description_border_style,
      'image_browser_image_description_border_color' => $image_browser_image_description_border_color,
      'image_browser_image_description_bg_color' => $image_browser_image_description_bg_color,
      'image_browser_image_description_align' => $image_browser_image_description_align,	
      'image_browser_img_font_size' => $image_browser_img_font_size,
      'image_browser_img_font_family' => $image_browser_img_font_family,
      'image_browser_img_font_color' => $image_browser_img_font_color,
      'image_browser_full_padding' => $image_browser_full_padding,
      'image_browser_full_border_radius'	=> $image_browser_full_border_radius,
      'image_browser_full_border_width' => $image_browser_full_border_width,
      'image_browser_full_border_style' => $image_browser_full_border_style,
      'image_browser_full_border_color' => $image_browser_full_border_color,
      'image_browser_full_bg_color' => $image_browser_full_bg_color,
      'image_browser_full_transparent' => $image_browser_full_transparent,

      'album_compact_title_margin' => $album_compact_title_margin, 
      'album_compact_thumb_margin' => $album_compact_thumb_margin,
      'album_compact_back_padding' => $album_compact_back_padding, 
      'album_compact_thumb_padding' => $album_compact_thumb_padding,   
      'album_compact_thumb_border_radius' => $album_compact_thumb_border_radius, 
      'album_compact_thumb_border_width' => $album_compact_thumb_border_width, 
      'album_compact_title_font_style' => $album_compact_title_font_style, 
      'album_compact_back_font_color' => $album_compact_back_font_color, 
      'album_compact_title_font_color' => $album_compact_title_font_color, 	
      'album_compact_title_shadow' => $album_compact_title_shadow, 
      'album_compact_thumb_bg_transparent' => $album_compact_thumb_bg_transparent, 
      'album_compact_thumb_box_shadow' => $album_compact_thumb_box_shadow, 
      'album_compact_thumb_transition' => $album_compact_thumb_transition, 
      'album_compact_thumb_border_style' => $album_compact_thumb_border_style, 
      'album_compact_thumb_border_color' => $album_compact_thumb_border_color,
      'album_compact_thumb_bg_color' => $album_compact_thumb_bg_color, 
      'album_compact_back_font_weight' => $album_compact_back_font_weight, 	
      'album_compact_back_font_size' => $album_compact_back_font_size, 
      'album_compact_back_font_style' => $album_compact_back_font_style,
      'album_compact_thumb_title_pos' => $album_compact_thumb_title_pos,
      'album_compact_thumbs_bg_color' => $album_compact_thumbs_bg_color,
      'album_compact_title_font_size' => $album_compact_title_font_size,
      'album_compact_title_font_weight' => $album_compact_title_font_weight,	
      'album_compact_thumb_align' => $album_compact_thumb_align, 
      'album_compact_thumb_hover_effect' => $album_compact_thumb_hover_effect,
      'album_compact_thumb_transparent' => $album_compact_thumb_transparent,
      'album_compact_thumb_hover_effect_value' => $album_compact_thumb_hover_effect_value,
      'album_extended_thumb_margin' => $album_extended_thumb_margin, 
      'album_extended_thumb_padding' => $album_extended_thumb_padding, 
      'album_extended_thumb_border_radius' => $album_extended_thumb_border_radius, 
      'album_extended_thumb_border_width' => $album_extended_thumb_border_width,     
      'album_extended_thumb_border_style' => $album_extended_thumb_border_style, 
      'album_extended_thumb_border_color' => $album_extended_thumb_border_color, 
      'album_extended_thumb_bg_color' => $album_extended_thumb_bg_color, 
      'album_extended_thumbs_bg_color' => $album_extended_thumbs_bg_color, 
      'album_extended_thumb_bg_transparent' => $album_extended_thumb_bg_transparent, 	
      'album_extended_thumb_box_shadow' => $album_extended_thumb_box_shadow, 
      'album_extended_thumb_transparent' => $album_extended_thumb_transparent,
      'album_extended_thumb_align' => $album_extended_thumb_align, 		
      'album_extended_thumb_hover_effect' => $album_extended_thumb_hover_effect,
      'album_extended_thumb_hover_effect_value' => $album_extended_thumb_hover_effect_value,
      'album_extended_thumb_transition' => $album_extended_thumb_transition, 
      'album_extended_back_font_color' => $album_extended_back_font_color, 
      'album_extended_back_font_style' => $album_extended_back_font_style, 
      'album_extended_back_font_size' => $album_extended_back_font_size, 
      'album_extended_back_font_weight' => $album_extended_back_font_weight, 
      'album_extended_back_padding' => $album_extended_back_padding, 
      'album_extended_div_bg_color' => $album_extended_div_bg_color, 
      'album_extended_div_bg_transparent' => $album_extended_div_bg_transparent, 		
      'album_extended_div_border_radius' => $album_extended_div_border_radius, 
      'album_extended_div_margin' => $album_extended_div_margin, 
      'album_extended_div_padding' => $album_extended_div_padding, 
      'album_extended_div_separator_width' => $album_extended_div_separator_width, 		  
      'album_extended_div_separator_style' => $album_extended_div_separator_style, 
      'album_extended_div_separator_color' => $album_extended_div_separator_color,
      'album_extended_thumb_div_bg_color' => $album_extended_thumb_div_bg_color, 
      'album_extended_thumb_div_border_radius' => $album_extended_thumb_div_border_radius,  
      'album_extended_thumb_div_border_width' => $album_extended_thumb_div_border_width, 
      'album_extended_thumb_div_border_style' => $album_extended_thumb_div_border_style, 
      'album_extended_thumb_div_border_color' => $album_extended_thumb_div_border_color,
      'album_extended_thumb_div_padding' => $album_extended_thumb_div_padding, 
      'album_extended_text_div_bg_color' => $album_extended_text_div_bg_color, 
      'album_extended_text_div_border_radius' => $album_extended_text_div_border_radius, 
      'album_extended_text_div_border_width' => $album_extended_text_div_border_width, 
      'album_extended_text_div_border_style' => $album_extended_text_div_border_style, 
      'album_extended_text_div_border_color' => $album_extended_text_div_border_color, 
      'album_extended_text_div_padding' => $album_extended_text_div_padding, 
      'album_extended_title_span_border_width' => $album_extended_title_span_border_width, 
      'album_extended_title_span_border_style' => $album_extended_title_span_border_style,	
      'album_extended_title_span_border_color' => $album_extended_title_span_border_color, 
      'album_extended_title_font_color' => $album_extended_title_font_color,
      'album_extended_title_font_style' => $album_extended_title_font_style, 
      'album_extended_title_font_size' => $album_extended_title_font_size, 
      'album_extended_title_font_weight' => $album_extended_title_font_weight,
      'album_extended_title_margin_bottom' => $album_extended_title_margin_bottom,		
      'album_extended_title_padding' => $album_extended_title_padding, 
      'album_extended_desc_span_border_width' => $album_extended_desc_span_border_width, 
      'album_extended_desc_span_border_style' => $album_extended_desc_span_border_style, 
      'album_extended_desc_span_border_color' => $album_extended_desc_span_border_color,
      'album_extended_desc_font_color' => $album_extended_desc_font_color, 
      'album_extended_desc_font_style' => $album_extended_desc_font_style, 
      'album_extended_desc_font_size' => $album_extended_desc_font_size, 
      'album_extended_desc_font_weight' => $album_extended_desc_font_weight, 
      'album_extended_desc_padding' => $album_extended_desc_padding, 
      'album_extended_desc_more_color' => $album_extended_desc_more_color, 
      'album_extended_desc_more_size' => $album_extended_desc_more_size, 

      'slideshow_cont_bg_color' => $slideshow_cont_bg_color,
      'slideshow_close_btn_transparent' => $slideshow_close_btn_transparent, 
      'slideshow_rl_btn_bg_color' => $slideshow_rl_btn_bg_color,
      'slideshow_rl_btn_border_radius' => $slideshow_rl_btn_border_radius,  
      'slideshow_rl_btn_border_width' => $slideshow_rl_btn_border_width, 
      'slideshow_rl_btn_border_style' => $slideshow_rl_btn_border_style, 
      'slideshow_rl_btn_border_color' => $slideshow_rl_btn_border_color, 
      'slideshow_rl_btn_box_shadow' => $slideshow_rl_btn_box_shadow,
      'slideshow_rl_btn_color' => $slideshow_rl_btn_color,
      'slideshow_rl_btn_height' => $slideshow_rl_btn_height, 
      'slideshow_rl_btn_size' => $slideshow_rl_btn_size, 
      'slideshow_rl_btn_width' => $slideshow_rl_btn_width, 
      'slideshow_close_rl_btn_hover_color' => $slideshow_close_rl_btn_hover_color,
      'slideshow_filmstrip_pos' => $slideshow_filmstrip_pos,
      'slideshow_filmstrip_thumb_border_width' => $slideshow_filmstrip_thumb_border_width,
      'slideshow_filmstrip_thumb_border_style' => $slideshow_filmstrip_thumb_border_style, 
      'slideshow_filmstrip_thumb_border_color' => $slideshow_filmstrip_thumb_border_color, 
      'slideshow_filmstrip_thumb_border_radius' => $slideshow_filmstrip_thumb_border_radius, 
      'slideshow_filmstrip_thumb_margin' => $slideshow_filmstrip_thumb_margin,  
      'slideshow_filmstrip_thumb_active_border_width' => $slideshow_filmstrip_thumb_active_border_width, 
      'slideshow_filmstrip_thumb_active_border_color' => $slideshow_filmstrip_thumb_active_border_color,
      'slideshow_filmstrip_thumb_deactive_transparent' => $slideshow_filmstrip_thumb_deactive_transparent, 
      'slideshow_filmstrip_rl_bg_color' => $slideshow_filmstrip_rl_bg_color, 
      'slideshow_filmstrip_rl_btn_color' => $slideshow_filmstrip_rl_btn_color, 
      'slideshow_filmstrip_rl_btn_size' => $slideshow_filmstrip_rl_btn_size,     
      'slideshow_title_font_size' => $slideshow_title_font_size, 
      'slideshow_title_font' => $slideshow_title_font, 
      'slideshow_title_color' => $slideshow_title_color, 
      'slideshow_title_opacity' => $slideshow_title_opacity, 
      'slideshow_title_border_radius' => $slideshow_title_border_radius,
      'slideshow_title_background_color' => $slideshow_title_background_color, 
      'slideshow_title_padding' => $slideshow_title_padding, 
      'slideshow_description_font_size' => $slideshow_description_font_size,
      'slideshow_description_font' => $slideshow_description_font, 
      'slideshow_description_color' => $slideshow_description_color,
      'slideshow_description_opacity' => $slideshow_description_opacity, 
      'slideshow_description_border_radius' => $slideshow_description_border_radius,
      'slideshow_description_background_color' => $slideshow_description_background_color, 
      'slideshow_description_padding' => $slideshow_description_padding, 
      'slideshow_dots_width' => $slideshow_dots_width, 
      'slideshow_dots_height' => $slideshow_dots_height, 
      'slideshow_dots_border_radius' => $slideshow_dots_border_radius, 
      'slideshow_dots_background_color' => $slideshow_dots_background_color,
      'slideshow_dots_margin' => $slideshow_dots_margin,
      'slideshow_dots_active_background_color' => $slideshow_dots_active_background_color,  
      'slideshow_dots_active_border_width' => $slideshow_dots_active_border_width,
      'slideshow_dots_active_border_color' => $slideshow_dots_active_border_color,
      'slideshow_play_pause_btn_size' => $slideshow_play_pause_btn_size, 
      'slideshow_rl_btn_style' => $slideshow_rl_btn_style,

      'masonry_thumb_padding' => $masonry_thumb_padding,
      'masonry_thumb_border_radius' => $masonry_thumb_border_radius,
      'masonry_thumb_border_width' => $masonry_thumb_border_width,
      'masonry_thumb_border_style' => $masonry_thumb_border_style,
      'masonry_thumb_border_color' => $masonry_thumb_border_color,
      'masonry_thumbs_bg_color' => $masonry_thumbs_bg_color,
      'masonry_thumb_bg_transparent' => $masonry_thumb_bg_transparent,
      'masonry_thumb_transparent' => $masonry_thumb_transparent,
      'masonry_thumb_align' => $masonry_thumb_align,
      'masonry_thumb_hover_effect' => $masonry_thumb_hover_effect,
      'masonry_thumb_hover_effect_value' => $masonry_thumb_hover_effect_value,
      'masonry_thumb_transition' => $masonry_thumb_transition,

      'mosaic_thumb_padding' => $mosaic_thumb_padding,
      'mosaic_thumb_border_radius' => $mosaic_thumb_border_radius,
      'mosaic_thumb_border_width' => $mosaic_thumb_border_width,
      'mosaic_thumb_border_style' => $mosaic_thumb_border_style,
      'mosaic_thumb_border_color' => $mosaic_thumb_border_color,
      'mosaic_thumbs_bg_color' => $mosaic_thumbs_bg_color,
      'mosaic_thumb_bg_transparent' => $mosaic_thumb_bg_transparent,
      'mosaic_thumb_transparent' => $mosaic_thumb_transparent,
      'mosaic_thumb_align' => $mosaic_thumb_align,
      'mosaic_thumb_hover_effect' => $mosaic_thumb_hover_effect,
      'mosaic_thumb_hover_effect_value' => $mosaic_thumb_hover_effect_value,
      'mosaic_thumb_title_margin' => $mosaic_thumb_title_margin,
      'mosaic_thumb_title_font_style' => $mosaic_thumb_title_font_style,
      'mosaic_thumb_title_font_color' => $mosaic_thumb_title_font_color,
      'mosaic_thumb_title_shadow' => $mosaic_thumb_title_shadow,
      'mosaic_thumb_title_font_size' => $mosaic_thumb_title_font_size,
      'mosaic_thumb_title_font_weight' => $mosaic_thumb_title_font_weight,
      'lightbox_info_pos' => $lightbox_info_pos,
      'lightbox_info_align' => $lightbox_info_align,
      'lightbox_info_bg_color' => $lightbox_info_bg_color,
      'lightbox_info_bg_transparent' => $lightbox_info_bg_transparent,
      'lightbox_info_border_width' => $lightbox_info_border_width,
      'lightbox_info_border_style' => $lightbox_info_border_style,
      'lightbox_info_border_color' => $lightbox_info_border_color,
      'lightbox_info_border_radius' => $lightbox_info_border_radius,
      'lightbox_info_padding' => $lightbox_info_padding,
      'lightbox_info_margin' => $lightbox_info_margin,
      'lightbox_title_color' => $lightbox_title_color,
      'lightbox_title_font_style' => $lightbox_title_font_style,
      'lightbox_title_font_weight' => $lightbox_title_font_weight,
      'lightbox_title_font_size' => $lightbox_title_font_size,
      'lightbox_description_color' => $lightbox_description_color,
      'lightbox_description_font_style' => $lightbox_description_font_style,
      'lightbox_description_font_weight' => $lightbox_description_font_weight,
      'lightbox_description_font_size' => $lightbox_description_font_size,

      'lightbox_rate_pos' => $lightbox_rate_pos,
      'lightbox_rate_align' => $lightbox_rate_align,
      'lightbox_rate_icon' => $lightbox_rate_icon,
      'lightbox_rate_color' => $lightbox_rate_color,
      'lightbox_rate_size' => $lightbox_rate_size,
      'lightbox_rate_stars_count' => $lightbox_rate_stars_count,
      'lightbox_rate_padding' => $lightbox_rate_padding,
      'lightbox_rate_hover_color' => $lightbox_rate_hover_color,

      'lightbox_hit_pos' => $lightbox_hit_pos,
      'lightbox_hit_align' => $lightbox_hit_align,
      'lightbox_hit_bg_color' => $lightbox_hit_bg_color,
      'lightbox_hit_bg_transparent' => $lightbox_hit_bg_transparent,
      'lightbox_hit_border_width' => $lightbox_hit_border_width,
      'lightbox_hit_border_style' => $lightbox_hit_border_style,
      'lightbox_hit_border_color' => $lightbox_hit_border_color,
      'lightbox_hit_border_radius' => $lightbox_hit_border_radius,
      'lightbox_hit_padding' => $lightbox_hit_padding,
      'lightbox_hit_margin' => $lightbox_hit_margin,
      'lightbox_hit_color' => $lightbox_hit_color,
      'lightbox_hit_font_style' => $lightbox_hit_font_style,
      'lightbox_hit_font_weight' => $lightbox_hit_font_weight,
      'lightbox_hit_font_size' => $lightbox_hit_font_size,
      'masonry_description_font_size' => $masonry_description_font_size,
      'masonry_description_color' => $masonry_description_color,
      'masonry_description_font_style' => $masonry_description_font_style,

      'album_masonry_back_font_color' => $album_masonry_back_font_color,
      'album_masonry_back_font_style' => $album_masonry_back_font_style,
      'album_masonry_back_font_size' => $album_masonry_back_font_size,
      'album_masonry_back_font_weight' => $album_masonry_back_font_weight,
      'album_masonry_back_padding' => $album_masonry_back_padding,
      'album_masonry_title_font_color' => $album_masonry_title_font_color,
      'album_masonry_title_font_style' => $album_masonry_title_font_style,
      'album_masonry_thumb_title_pos' => $album_masonry_thumb_title_pos,
      'album_masonry_title_font_size' => $album_masonry_title_font_size,
      'album_masonry_title_font_weight' => $album_masonry_title_font_weight,
      'album_masonry_title_margin' => $album_masonry_title_margin,
      'album_masonry_title_shadow' => $album_masonry_title_shadow,
      'album_masonry_thumb_margin' => $album_masonry_thumb_margin,
      'album_masonry_thumb_padding' => $album_masonry_thumb_padding,
      'album_masonry_thumb_border_radius' => $album_masonry_thumb_border_radius,
      'album_masonry_thumb_border_width' => $album_masonry_thumb_border_width,
      'album_masonry_thumb_border_style' => $album_masonry_thumb_border_style,
      'album_masonry_thumb_border_color' => $album_masonry_thumb_border_color,
      'album_masonry_thumb_bg_color' => $album_masonry_thumb_bg_color,
      'album_masonry_thumbs_bg_color' => $album_masonry_thumbs_bg_color,
      'album_masonry_thumb_bg_transparent' => $album_masonry_thumb_bg_transparent,
      'album_masonry_thumb_box_shadow' => $album_masonry_thumb_box_shadow,
      'album_masonry_thumb_transparent' => $album_masonry_thumb_transparent,
      'album_masonry_thumb_align' => $album_masonry_thumb_align,
      'album_masonry_thumb_hover_effect' => $album_masonry_thumb_hover_effect,
      'album_masonry_thumb_hover_effect_value' => $album_masonry_thumb_hover_effect_value,
      'album_masonry_thumb_transition' => $album_masonry_thumb_transition,
     
      'carousel_cont_bg_color' => $carousel_cont_bg_color,
      'carousel_cont_btn_transparent' => $carousel_cont_btn_transparent,
      'carousel_close_btn_transparent' => $carousel_close_btn_transparent, 
      'carousel_rl_btn_bg_color' => $carousel_rl_btn_bg_color,
      'carousel_rl_btn_border_radius' => $carousel_rl_btn_border_radius,  
      'carousel_rl_btn_border_width' => $carousel_rl_btn_border_width, 
      'carousel_rl_btn_border_style' => $carousel_rl_btn_border_style, 
      'carousel_rl_btn_border_color' => $carousel_rl_btn_border_color,       
      'carousel_rl_btn_color' => $carousel_rl_btn_color,
      'carousel_rl_btn_height' => $carousel_rl_btn_height, 
      'carousel_rl_btn_size' => $carousel_rl_btn_size, 
      'carousel_play_pause_btn_size' => $carousel_play_pause_btn_size,
      'carousel_rl_btn_width' => $carousel_rl_btn_width, 
      'carousel_close_rl_btn_hover_color' => $carousel_close_rl_btn_hover_color,
      'carousel_rl_btn_style' => $carousel_rl_btn_style,
      'carousel_mergin_bottom' => $carousel_mergin_bottom,
      'carousel_font_family' => $carousel_font_family, 
      'carousel_feature_border_width' => $carousel_feature_border_width, 
      'carousel_feature_border_style' => $carousel_feature_border_style, 
      'carousel_feature_border_color' => $carousel_feature_border_color,    
      'carousel_caption_background_color' => $carousel_caption_background_color, 
      'carousel_caption_bottom' => $carousel_caption_bottom, 
      'carousel_caption_p_mergin' => $carousel_caption_p_mergin, 
      'carousel_caption_p_pedding' => $carousel_caption_p_pedding,     
      'carousel_caption_p_font_weight' => $carousel_caption_p_font_weight, 
      'carousel_caption_p_font_size' => $carousel_caption_p_font_size, 
      'carousel_caption_p_color' => $carousel_caption_p_color,
      'carousel_title_opacity' => $carousel_title_opacity, 
      'carousel_title_border_radius' => $carousel_title_border_radius,
      'default_theme' => $default_theme,
      'mosaic_thumb_transition' => $mosaic_thumb_transition,
    );
    $themes = json_encode($themes);
    if ($id != 0) {
      $save = $wpdb->update($wpdb->prefix . 'bwg_theme', array(
        'name' => $name,
        'options' => $themes,
        'default_theme' => $default_theme,
      ), array('id' => $id));
    }
    else {
      $save = $wpdb->insert($wpdb->prefix . 'bwg_theme', array(
        'name' => $name,
        'options' => $themes,
        'default_theme' => $default_theme,
        ));
    }
    if ($save !== FALSE) {
      return 1;
    }
    else {
      return 2;
    }
  }

  public function delete($id) {
    global $wpdb;
    $isDefault = $wpdb->get_var('SELECT default_theme FROM ' . $wpdb->prefix . 'bwg_theme WHERE id=' . $id);
    if ($isDefault) {
      echo WDWLibrary::message("You can't delete default theme", 'error');
    }
    else {
      $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_theme WHERE id="%d"', $id);
      if ($wpdb->query($query)) {
        echo WDWLibrary::message('Item Succesfully Deleted.', 'updated');
        $message = 3;
      }
      else {
        $message = 2;
      }
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'themes_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }
  
  public function delete_all() {
    global $wpdb;
    $flag = FALSE;
    $isDefault = FALSE;
    $tag_ids_col = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'bwg_theme');
    foreach ($tag_ids_col as $tag_id) {
      if (isset($_POST['check_' . $tag_id])) {
        $isDefault = $wpdb->get_var('SELECT default_theme FROM ' . $wpdb->prefix . 'bwg_theme WHERE id=' . $tag_id);
        if ($isDefault) {
          $message = 4;
        }
        else {
          $flag = TRUE;
          $query = $wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'bwg_theme WHERE id="%d"', $tag_id);
          $wpdb->query($query);
        }
      }
    }
    if ($flag) {
      $message = 5;
    }
    else {
      $message = 6;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'themes_bwg', 'bwg_nonce' );
    $query_url = add_query_arg(array('page' => $page, 'task' => 'display', 'message' => $message), $query_url);
    WDWLibrary::spider_redirect($query_url);
  }

  public function setdefault($id) {
    global $wpdb;
    $save = $wpdb->update($wpdb->prefix . 'bwg_theme', array('default_theme' => 0), array('default_theme' => 1));
    $save = $wpdb->update($wpdb->prefix . 'bwg_theme', array('default_theme' => 1), array('id' => $id));
    if ($save !== FALSE) {
      $message = 7;
    }
    else {
      $message = 2;
    }
    $page = WDWLibrary::get('page');
    $query_url = wp_nonce_url( admin_url('admin.php'), 'themes_bwg', 'bwg_nonce' );
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