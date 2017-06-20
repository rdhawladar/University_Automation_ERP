<?php

class  BWGViewThemes_bwg {
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
    $rows_data = $this->model->get_rows_data();
    $page_nav = $this->model->page_nav();
    $search_value = ((isset($_POST['search_value'])) ? esc_html($_POST['search_value']) : '');
    $search_select_value = ((isset($_POST['search_select_value'])) ? (int)$_POST['search_select_value'] : 0);
    $asc_or_desc = ((isset($_POST['asc_or_desc'])) ? esc_html($_POST['asc_or_desc']) : 'asc');
    $order_by = (isset($_POST['order_by']) ? esc_html($_POST['order_by']) : 'id');
    $order_class = 'manage-column column-title sorted ' . $asc_or_desc;
    $ids_string = '';
    $per_page = $this->model->per_page();
	$pager = 0;
    ?>
    <div style="clear: both; float: left; width: 99%;">
      <div style="float:left; font-size: 14px; font-weight: bold;">
        <?php _e("This section allows you to create, edit and delete themes.", 'bwg_back'); ?>
        <a style="color: blue; text-decoration: none;" target="_blank" href="https://web-dorado.com/wordpress-gallery/editing-themes/thumbnails.html"><?php _e("Read More in User Manual", 'bwg_back'); ?></a>
        <?php
        if (get_option("wd_bwg_theme_version")) {
          ?>
          <br />
          <?php _e("This feature is disabled for the non-commercial version.", 'bwg_back'); ?>
          <?php
        }
        ?>
      </div>
      <div style="float: right; text-align: right;">
        <a style="text-decoration: none;" target="_blank" href="https://web-dorado.com/files/fromPhotoGallery.php">
          <img width="215" border="0" alt="web-dorado.com" src="<?php echo WD_BWG_URL . '/images/logo.png'; ?>" />
        </a>
      </div>
    </div>
    <?php
    if (get_option("wd_bwg_theme_version")) {
      ?>
      <div style="clear: both; float: left; width: 97%;">
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_thumbnails.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_masonry.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_slideshow.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_image_browser.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_compact_album.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_extended_album.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_blog_style.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_lightbox.png'; ?>" />
        <img style="max-width: 100%;" src="<?php echo WD_BWG_URL . '/images/theme_page_navigation.png'; ?>" />
      </div>
      <?php
      die();
    }
    ?>
    <form class="wrap bwg_form" id="themes_form" method="post" action="admin.php?page=themes_bwg" style="float: left; width: 99%;">
      <?php wp_nonce_field( 'themes_bwg', 'bwg_nonce' ); ?>
      <span class="theme_icon"></span>
      <h2>
        <?php _e("Themes", 'bwg_back'); ?>
        <a href="" class="add-new-h2" onclick="spider_set_input_value('task', 'add');
                                               spider_form_submit(event, 'themes_form')"><?php _e("Add new", 'bwg_back'); ?></a>
      </h2>
      <div class="buttons_div">
        <input class="button-secondary" type="submit" onclick="if (confirm('<?php echo addslashes(__('Do you want to delete selected items?', 'bwg_back')); ?>')) {
                                                       spider_set_input_value('task', 'delete_all');
                                                     } else {
                                                       return false;
                                                     }" value="<?php _e("Delete", 'bwg_back'); ?>"/>
      </div>
      <div class="tablenav top">
        <?php
        WDWLibrary::search(__('Title','bwg_back'), $search_value, 'themes_form');
        WDWLibrary::html_page_nav($page_nav['total'], $pager++, $page_nav['limit'], 'themes_form', $per_page);
        ?>
      </div>
      <table class="wp-list-table widefat fixed pages">
        <thead>
          <th class="manage-column column-cb check-column table_small_col"><input id="check_all" type="checkbox" style="margin:0;"/></th>
          <th class="table_small_col <?php if ($order_by == 'id') { echo $order_class; } ?>">
            <a onclick="spider_set_input_value('task', '');
              spider_set_input_value('order_by', 'id');
              spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'id') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
              spider_form_submit(event, 'themes_form')" href="">
              <span>ID</span><span class="sorting-indicator"></span></a>
          </th>
          <th class="<?php if ($order_by == 'name') { echo $order_class; } ?>">
            <a onclick="spider_set_input_value('task', '');
              spider_set_input_value('order_by', 'name');
              spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'title') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
              spider_form_submit(event, 'themes_form')" href="">
              <span><?php _e("Name", 'bwg_back'); ?></span><span class="sorting-indicator"></span></a>
          </th>
          <th class="table_big_col <?php if ($order_by == 'default_theme') { echo $order_class; } ?>">
            <a onclick="spider_set_input_value('task', '');
              spider_set_input_value('order_by', 'default_theme');
              spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'default_theme') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
              spider_form_submit(event, 'themes_form')" href="">
              <span><?php _e("Default", 'bwg_back'); ?></span><span class="sorting-indicator"></span></a>
          </th>
          <th class="table_big_col"><?php _e("Edit", 'bwg_back'); ?></th>
          <th class="table_big_col"><?php _e("Delete", 'bwg_back'); ?></th>
        </thead>
        <tbody id="tbody_arr">
          <?php
          if ($rows_data) {
            foreach ($rows_data as $row_data) {
              $alternate = (!isset($alternate) || $alternate == 'class="alternate"') ? '' : 'class="alternate"';
              $default_image = (($row_data->default_theme) ? 'default' : 'notdefault');
              $default = (($row_data->default_theme) ? '' : 'setdefault');
              ?>
              <tr id="tr_<?php echo $row_data->id; ?>" <?php echo $alternate; ?>>
                <td class="table_small_col check-column">
                  <input id="check_<?php echo $row_data->id; ?>" name="check_<?php echo $row_data->id; ?>" type="checkbox"/>
                </td>
                <td class="table_small_col"><?php echo $row_data->id; ?></td>
                <td>
                  <a onclick="spider_set_input_value('task', 'edit');
                              spider_set_input_value('current_id', '<?php echo $row_data->id; ?>');
                              spider_form_submit(event, 'themes_form')" href="" title="<?php _e("Edit", 'bwg_back'); ?>"><?php echo $row_data->name; ?></a>
                </td>
                <td class="table_big_col">
                  <?php
                  if ($default != '') {
                    ?>
                    <a onclick="spider_set_input_value('task', '<?php echo $default; ?>');
                                spider_set_input_value('current_id', '<?php echo $row_data->id; ?>');
                                spider_form_submit(event, 'themes_form')" href="">
                    <?php
                  }
                  ?>
                  <img src="<?php echo WD_BWG_URL . '/images/' . $default_image . '.png'; ?>" />
                  <?php
                  if ($default != '') {
                    ?>
                    </a>
                    <?php
                    }
                  ?>
                </td>
                <td class="table_big_col">
                  <a onclick="spider_set_input_value('task', 'edit');
                              spider_set_input_value('current_id', '<?php echo $row_data->id; ?>');
                              spider_form_submit(event, 'themes_form')" href=""><?php _e("Edit", 'bwg_back'); ?></a>
                </td>
                <td class="table_big_col">
                  <a onclick="spider_set_input_value('task', 'delete');
                              spider_set_input_value('current_id', '<?php echo $row_data->id; ?>');
                              spider_form_submit(event, 'themes_form')" href=""><?php _e("Delete", 'bwg_back'); ?></a>
                </td>
              </tr>
              <?php
              $ids_string .= $row_data->id . ',';
            }
          }
          ?>
        </tbody>
      </table>
      <div class="tablenav bottom">
        <?php
        WDWLibrary::html_page_nav($page_nav['total'], $pager++, $page_nav['limit'], 'themes_form', $per_page);
        ?>
      </div>
      <input id="task" name="task" type="hidden" value=""/>
      <input id="current_id" name="current_id" type="hidden" value=""/>
      <input id="ids_string" name="ids_string" type="hidden" value="<?php echo $ids_string; ?>"/>
      <input id="asc_or_desc" name="asc_or_desc" type="hidden" value="asc"/>
      <input id="order_by" name="order_by" type="hidden" value="<?php echo $order_by; ?>"/>
    </form>
    <?php
  }

  public function edit($id, $reset) {
    $row = $this->model->get_row_data($id, $reset);
    $page_title = (($id != 0) ? 'Edit theme ' . $row->name : 'Create new theme');
    $current_type = WDWLibrary::get('current_type', 'Thumbnail');
    $border_styles = array(
      'none' => __('None', 'bwg_back'),
      'solid' => __('Solid', 'bwg_back'),
      'dotted' => __('Dotted', 'bwg_back'),
      'dashed' => __('Dashed', 'bwg_back'),
      'double' => __('Double', 'bwg_back'),
      'groove' => __('Groove', 'bwg_back'),
      'ridge' => __('Ridge', 'bwg_back'),
      'inset' => __('Inset', 'bwg_back'),
      'outset' => __('Outset', 'bwg_back'),
    );
    $font_families = array(
      'arial' => 'Arial',
      'lucida grande' => 'Lucida grande',
      'segoe ui' => 'Segoe ui',
      'tahoma' => 'Tahoma',
      'trebuchet ms' => 'Trebuchet ms',
      'verdana' => 'Verdana',
      'cursive' =>'Cursive',
      'fantasy' => 'Fantasy',
      'monospace' => 'Monospace',
      'serif' => 'Serif',
    );
    $aligns = array(
      'left' => __('Left', 'bwg_back'),
      'center' => __('Center', 'bwg_back'),
      'right' => __('Right', 'bwg_back'),
    );
    $font_weights = array(
      'lighter' => __('Lighter', 'bwg_back'),
      'normal' => __('Normal', 'bwg_back'),
      'bold' => __('Bold', 'bwg_back'),
    );
    $hover_effects = array(
      'none' => __('None', 'bwg_back'),
      'rotate' => __('Rotate', 'bwg_back'),
      'scale' => __('Scale', 'bwg_back'),
      'skew' => __('Skew', 'bwg_back'),
    );
    $button_styles = array(
      'fa-chevron' => __('Chevron', 'bwg_back'),
      'fa-angle' => __('Angle', 'bwg_back'),
      'fa-angle-double' => __('Double', 'bwg_back'),
    );
    $rate_icons = array(
      'star' => __('Star', 'bwg_back'),
      'bell' => __('Bell', 'bwg_back'),
      'circle' => __('Circle', 'bwg_back'),
      'flag' => __('Flag', 'bwg_back'),
      'heart' => __('Heart', 'bwg_back'),
      'square' => __('Square', 'bwg_back'),
    );
    ?>
   <div style="clear: both; float: left; width: 99%;">
      <div style="float:left; font-size: 14px; font-weight: bold;">
        <?php _e("This section allows you to add/edit theme.", 'bwg_back'); ?>
        <a style="color: blue; text-decoration: none;" target="_blank" href="https://web-dorado.com/wordpress-gallery/editing-themes/thumbnails.html"><?php _e("Read More in User Manual", 'bwg_back'); ?></a>
      </div>
      <div style="float: right; text-align: right;">
        <a style="text-decoration: none;" target="_blank" href="https://web-dorado.com/files/fromPhotoGallery.php">
          <img width="215" border="0" alt="web-dorado.com" src="<?php echo WD_BWG_URL . '/images/logo.png'; ?>" />
        </a>
      </div>
    </div>
    <form class="wrap bwg_form" method="post" action="admin.php?page=themes_bwg" style="float: left; width: 99%;">
      <?php wp_nonce_field( 'themes_bwg', 'bwg_nonce' ); ?>
      <span class="theme_icon"></span>
      <h2><?php echo $page_title; ?></h2>
      <div style="float: right; margin: 0 5px 0 0;">
        <input class="button-secondary" type="submit" onclick="if (spider_check_required('name', 'Name')) {return false;}; spider_set_input_value('task', 'save')" value="<?php _e("Save", 'bwg_back'); ?>"/>
        <input class="button-secondary" type="submit" onclick="if (spider_check_required('name', 'Name')) {return false;}; spider_set_input_value('task', 'apply')" value="<?php _e("Apply", 'bwg_back'); ?>"/>
        <input class="button-secondary" type="submit" onclick="spider_set_input_value('task', 'cancel')" value="<?php _e("Cancel", 'bwg_back'); ?>"/>
        <input title="Reset to default theme" class="button-primary" type="submit" onclick="if (confirm('<?php echo addslashes(__("Do you want to reset to default?", 'bwg_back')); ?>')) {
                                                                 spider_set_input_value('task', 'reset');
                                                               } else {
                                                                 return false;
                                                               }" value="<?php _e("Reset", 'bwg_back'); ?>"/>
      </div>
      <div style="float: left; margin: 10px 0 0; display: none;" id="type_menu">
        <div id="type_Thumbnail" class="theme_type" onclick="bwg_change_theme_type('Thumbnail')"><?php _e("Thumbnails", 'bwg_back'); ?></div>
        <div id="type_Masonry" class="theme_type" style="opacity: 0.4; filter: Alpha(opacity=40);" title="This tab is disabled in free version"><?php _e("Masonry", 'bwg_back'); ?></div>
        <div id="type_Mosaic" class="theme_type" style="opacity: 0.4; filter: Alpha(opacity=40);" title="This tab is disabled in free version"><?php _e("Mosaic", 'bwg_back'); ?></div>
        <div id="type_Slideshow" class="theme_type" onclick="bwg_change_theme_type('Slideshow')"><?php _e("Slideshow", 'bwg_back'); ?></div>
        <div id="type_Image_browser" class="theme_type" onclick="bwg_change_theme_type('Image_browser')"><?php _e("Image Browser", 'bwg_back'); ?></div>
        <div id="type_Compact_album" class="theme_type" onclick="bwg_change_theme_type('Compact_album')"><?php _e("Compact Album", 'bwg_back'); ?></div>
        <div id="type_Masonry_album" class="theme_type" style="opacity: 0.4; filter: Alpha(opacity=40);" title="<?php _e("This tab is disabled in free version", 'bwg_back'); ?>"><?php _e("Masonry Album", 'bwg_back'); ?></div>
        <div id="type_Extended_album" class="theme_type" onclick="bwg_change_theme_type('Extended_album')"><?php _e("Extended Album", 'bwg_back'); ?></div>
        <div id="type_Blog_style" class="theme_type" style="opacity: 0.4; filter: Alpha(opacity=40);" title="This tab is disabled in free version"><?php _e("Blog Style", 'bwg_back'); ?></div>
        <div id="type_Lightbox" class="theme_type" onclick="bwg_change_theme_type('Lightbox')"><?php _e("Lightbox", 'bwg_back'); ?></div>
        <div id="type_Navigation" class="theme_type" onclick="bwg_change_theme_type('Navigation')"><?php _e("Page Navigation", 'bwg_back'); ?></div>
        <div id="type_Carousel" class="theme_type" style="opacity: 0.4; filter: Alpha(opacity=40);" title="This tab is disabled in free version"><?php _e("Carousel", 'bwg_back'); ?></div>
        <input type="hidden" id="current_type" name="current_type" value="<?php echo $current_type; ?>" />
      </div>
      <fieldset class="spider_fieldset">
        <legend><?php _e("Parameters", 'bwg_back'); ?></legend>
        <table style="clear:both;">
          <tbody>
          <tr>
            <td class="spider_label"><label for="name"><?php _e("Name:", 'bwg_back'); ?> <span style="color:#FF0000;"> * </span> </label></td>
            <td><input type="text" id="name" name="name" value="<?php echo $row->name; ?>" class="spider_text_input"/></td>
          </tr>
          </tbody>
        </table>

        <fieldset class="spider_type_fieldset" id="Thumbnail">
          <fieldset class="spider_child_fieldset" id="Thumbnail_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="thumb_margin"><?php _e("Margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_margin" id="thumb_margin" value="<?php echo $row->thumb_margin; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_padding"><?php _e("Padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_padding" id="thumb_padding" value="<?php echo $row->thumb_padding; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_border_width"><?php _e("Border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_border_width" id="thumb_border_width" value="<?php echo $row->thumb_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_border_style"><?php _e("Border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="thumb_border_style" id="thumb_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->thumb_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_border_color"><?php _e("Border color:", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="thumb_border_color" id="thumb_border_color" value="<?php echo $row->thumb_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_border_radius"><?php _e("Border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_border_radius" id="thumb_border_radius" value="<?php echo $row->thumb_border_radius; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_box_shadow"><?php _e("Shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_box_shadow" id="thumb_box_shadow" value="<?php echo $row->thumb_box_shadow; ?>" class="spider_box_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_hover_effect"><?php _e("Hover effect:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="thumb_hover_effect" id="thumb_hover_effect" class="spider_int_input">
                      <?php
                      foreach ($hover_effects as $key => $hover_effect) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->thumb_hover_effect == $key) ? 'selected="selected"' : ''); ?>><?php echo __($hover_effect,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_hover_effect_value"><?php _e("Hover effect value:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_hover_effect_value" id="thumb_hover_effect_value" value="<?php echo $row->thumb_hover_effect_value; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("E.g. Rotate:", 'bwg_back'); ?> 10deg, <?php _e("Scale:", 'bwg_back'); ?> 1.5, <?php _e("Skew:", 'bwg_back'); ?> 10deg.</div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Transition:", 'bwg_back'); ?> </label></td>
                  <td id="thumb_transition">
                    <input type="radio" name="thumb_transition" id="thumb_transition1" value="1"<?php if ($row->thumb_transition == 1) echo 'checked="checked"'; ?> />
                    <label for="thumb_transition1" id="thumb_transition1_lbl"><?php _e("Yes", 'bwg_back'); ?></label>
                    <input type="radio" name="thumb_transition" id="thumb_transition0" value="0"<?php if ($row->thumb_transition == 0) echo 'checked="checked"'; ?> />
                    <label for="thumb_transition0" id="thumb_transition0_lbl"><?php _e("No", 'bwg_back'); ?></label>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Thumbnail_2">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label">
                    <label for="thumb_bg_color"><?php _e("Thumbnail background color:", 'bwg_back'); ?> </label>
                  </td>
                  <td>
                    <input type="text" name="thumb_bg_color" id="thumb_bg_color" value="<?php echo $row->thumb_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_transparent"><?php _e("Thumbnail transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_transparent" id="thumb_transparent" value="<?php echo $row->thumb_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumbs_bg_color"><?php _e("Full background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumbs_bg_color" id="thumbs_bg_color" value="<?php echo $row->thumbs_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_bg_transparent"><?php _e("Full background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_bg_transparent" id="thumb_bg_transparent" value="<?php echo $row->thumb_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_align"><?php _e("Alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="thumb_align" id="thumb_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->thumb_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Thumbnail_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label><?php _e("Title position:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="thumb_title_pos" id="thumb_title_pos1" value="top" <?php if ($row->thumb_title_pos == "top") echo 'checked="checked"'; ?> />
                    <label for="thumb_title_pos1" id="thumb_title_pos1_lbl"><?php _e("Top", 'bwg_back'); ?></label>
                    <input type="radio" name="thumb_title_pos" id="thumb_title_pos0" value="bottom" <?php if ($row->thumb_title_pos == "bottom") echo 'checked="checked"'; ?> />
                    <label for="thumb_title_pos0" id="thumb_title_pos0_lbl"><?php _e("Bottom", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_title_font_size"><?php _e("Title font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_title_font_size" id="thumb_title_font_size" value="<?php echo $row->thumb_title_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_title_font_color"><?php _e("Title font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_title_font_color" id="thumb_title_font_color" value="<?php echo $row->thumb_title_font_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_title_font_style"><?php _e("Title font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="thumb_title_font_style" id="thumb_title_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->thumb_title_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_title_font_weight"><?php _e("Title font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="thumb_title_font_weight" id="thumb_title_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->thumb_title_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_title_shadow"><?php _e("Title box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_title_shadow" id="thumb_title_shadow" value="<?php echo $row->thumb_title_shadow; ?>" class="spider_box_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="thumb_title_margin"><?php _e("Title margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="thumb_title_margin" id="thumb_title_margin" value="<?php echo $row->thumb_title_margin; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>

        <fieldset class="spider_type_fieldset" id="Masonry">
          <fieldset class="spider_child_fieldset" id="Masonry_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_padding"><?php _e("Padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumb_padding" id="masonry_thumb_padding" value="<?php echo $row->masonry_thumb_padding; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_border_width"><?php _e("Border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumb_border_width" id="masonry_thumb_border_width" value="<?php echo $row->masonry_thumb_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_border_style"><?php _e("Border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="masonry_thumb_border_style" id="masonry_thumb_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->masonry_thumb_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_border_color"><?php _e("Border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumb_border_color" id="masonry_thumb_border_color" value="<?php echo $row->masonry_thumb_border_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_border_radius"><?php _e("Border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumb_border_radius" id="masonry_thumb_border_radius" value="<?php echo $row->masonry_thumb_border_radius; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Masonry_2">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_transparent"><?php _e("Transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumb_transparent" id="masonry_thumb_transparent" value="<?php echo $row->masonry_thumb_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumbs_bg_color"><?php _e("Background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumbs_bg_color" id="masonry_thumbs_bg_color" value="<?php echo $row->masonry_thumbs_bg_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_bg_transparent"><?php _e("Background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumb_bg_transparent" id="masonry_thumb_bg_transparent" value="<?php echo $row->masonry_thumb_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_align0"><?php _e("Alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="masonry_thumb_align" id="masonry_thumb_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->masonry_thumb_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Masonry_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_hover_effect"><?php _e("Hover effect:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="masonry_thumb_hover_effect" id="masonry_thumb_hover_effect" class="spider_int_input">
                      <?php
                      foreach ($hover_effects as $key => $hover_effect) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->masonry_thumb_hover_effect == $key) ? 'selected="selected"' : ''); ?>><?php echo __($hover_effect,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_thumb_hover_effect_value"><?php _e("Hover effect value:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_thumb_hover_effect_value" id="masonry_thumb_hover_effect_value" value="<?php echo $row->masonry_thumb_hover_effect_value; ?>" class="spider_char_input" />
                    <div class="spider_description">E.g. <?php _e("Rotate:", 'bwg_back'); ?> 10deg, <?php _e("Scale:", 'bwg_back'); ?> 1.5, <?php _e("Skew:", 'bwg_back'); ?> 10deg.</div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Transition:", 'bwg_back'); ?> </label></td>
                  <td id="masonry_thumb_transition">
                    <input type="radio" name="masonry_thumb_transition" id="masonry_thumb_transition1" value="1"<?php if ($row->masonry_thumb_transition == 1) echo 'checked="checked"'; ?> />
                    <label for="masonry_thumb_transition1" id="masonry_thumb_transition1_lbl"><?php _e("Yes", 'bwg_back'); ?></label>
                    <input type="radio" name="masonry_thumb_transition" id="masonry_thumb_transition0" value="0"<?php if ($row->masonry_thumb_transition == 0) echo 'checked="checked"'; ?> />
                    <label for="masonry_thumb_transition0" id="masonry_thumb_transition0_lbl"><?php _e("No", 'bwg_back'); ?></label>
                  </td>
                </tr>
		<tr>
                  <td class="spider_label"><label for="masonry_description_font_size"><?php _e("Description font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_description_font_size" id="masonry_description_font_size" value="<?php echo $row->masonry_description_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_description_color"><?php _e("Description font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="masonry_description_color" id="masonry_description_color" value="<?php echo $row->masonry_description_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="masonry_description_font_style"><?php _e("Description font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="masonry_description_font_style" id="masonry_description_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->masonry_description_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>
        
        <fieldset class="spider_type_fieldset" id="Slideshow">
          <fieldset class="spider_child_fieldset" id="Slideshow_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="slideshow_cont_bg_color"><?php _e("Background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_cont_bg_color" id="slideshow_cont_bg_color" value="<?php echo $row->slideshow_cont_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_size"><?php _e("Right, left buttons size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_size" id="slideshow_rl_btn_size" value="<?php echo $row->slideshow_rl_btn_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_play_pause_btn_size"><?php _e("Play, pause buttons size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_play_pause_btn_size" id="slideshow_play_pause_btn_size" value="<?php echo $row->slideshow_play_pause_btn_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_color"><?php _e("Buttons color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_color" id="slideshow_rl_btn_color" value="<?php echo $row->slideshow_rl_btn_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_close_btn_transparent"><?php _e("Buttons transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_close_btn_transparent" id="slideshow_close_btn_transparent" value="<?php echo $row->slideshow_close_btn_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description">V<?php _e("alue must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_close_rl_btn_hover_color"><?php _e("Buttons hover color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_close_rl_btn_hover_color" id="slideshow_close_rl_btn_hover_color" value="<?php echo $row->slideshow_close_rl_btn_hover_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_width"><?php _e("Right, left buttons width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_width" id="slideshow_rl_btn_width" value="<?php echo $row->slideshow_rl_btn_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_height"><?php _e("Right, left buttons height:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_height" id="slideshow_rl_btn_height" value="<?php echo $row->slideshow_rl_btn_height; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_bg_color"><?php _e("Right, left buttons background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_bg_color" id="slideshow_rl_btn_bg_color" value="<?php echo $row->slideshow_rl_btn_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_border_width"><?php _e("Right, left buttons border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_border_width" id="slideshow_rl_btn_border_width" value="<?php echo $row->slideshow_rl_btn_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_border_style"><?php _e("Right, left buttons border style: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="slideshow_rl_btn_border_style" id="slideshow_rl_btn_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->slideshow_rl_btn_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_border_color"><?php _e("Right, left buttons border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_border_color" id="slideshow_rl_btn_border_color" value="<?php echo $row->slideshow_rl_btn_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_border_radius"><?php _e("Right, left buttons border radius: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_border_radius" id="slideshow_rl_btn_border_radius" value="<?php echo $row->slideshow_rl_btn_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_style"><?php _e("Right, left buttons style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="slideshow_rl_btn_style" id="slideshow_rl_btn_style">
                      <?php
                      foreach ($button_styles as $key => $button_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->slideshow_rl_btn_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($button_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_rl_btn_box_shadow"><?php _e("Right, left buttons box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_rl_btn_box_shadow" id="slideshow_rl_btn_box_shadow" value="<?php echo $row->slideshow_rl_btn_box_shadow; ?>" class="spider_box_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Slideshow_2">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label><?php _e("Filmstrip/Slider bullet position: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="slideshow_filmstrip_pos" id="slideshow_filmstrip_pos">
                      <option value="top" <?php echo (($row->slideshow_filmstrip_pos == "top") ? 'selected="selected"' : ''); ?>><?php _e("Top", 'bwg_back'); ?></option>
                      <option value="right" <?php echo (($row->slideshow_filmstrip_pos == "right") ? 'selected="selected"' : ''); ?>><?php _e("Right", 'bwg_back'); ?></option>
                      <option value="bottom" <?php echo (($row->slideshow_filmstrip_pos == "bottom") ? 'selected="selected"' : ''); ?>><?php _e("Bottom", 'bwg_back'); ?></option>
                      <option value="left" <?php echo (($row->slideshow_filmstrip_pos == "left") ? 'selected="selected"' : ''); ?>><?php _e("Left", 'bwg_back'); ?></option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_margin"><?php _e("Filmstrip margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_thumb_margin" id="slideshow_filmstrip_thumb_margin" value="<?php echo $row->slideshow_filmstrip_thumb_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_border_width"><?php _e("Filmstrip border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_thumb_border_width" id="slideshow_filmstrip_thumb_border_width" value="<?php echo $row->slideshow_filmstrip_thumb_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_border_style"><?php _e("Filmstrip border style: ", 'bwg_back'); ?></label>
                  </td>
                  <td>
                    <select name="slideshow_filmstrip_thumb_border_style" id="slideshow_filmstrip_thumb_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->slideshow_filmstrip_thumb_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_border_color"><?php _e("Filmstrip border color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_thumb_border_color" id="slideshow_filmstrip_thumb_border_color" value="<?php echo $row->slideshow_filmstrip_thumb_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_border_radius"><?php _e("Filmstrip border radius: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_thumb_border_radius" id="slideshow_filmstrip_thumb_border_radius" value="<?php echo $row->slideshow_filmstrip_thumb_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_active_border_width"><?php _e("Filmstrip active border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_thumb_active_border_width" id="slideshow_filmstrip_thumb_active_border_width" value="<?php echo $row->slideshow_filmstrip_thumb_active_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/>px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_active_border_color"><?php _e("Filmstrip active border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_thumb_active_border_color" id="slideshow_filmstrip_thumb_active_border_color" value="<?php echo $row->slideshow_filmstrip_thumb_active_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="tr_appWidth">
                  <td class="spider_label"><label for="slideshow_filmstrip_thumb_deactive_transparent"><?php _e("Filmstrip deactive transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_thumb_deactive_transparent" id="slideshow_filmstrip_thumb_deactive_transparent" value="<?php echo $row->slideshow_filmstrip_thumb_deactive_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_rl_bg_color"><?php _e("Filmstrip right, left buttons background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_rl_bg_color" id="slideshow_filmstrip_rl_bg_color" value="<?php echo $row->slideshow_filmstrip_rl_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_rl_btn_color"><?php _e("Filmstrip right, left buttons color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_rl_btn_color" id="slideshow_filmstrip_rl_btn_color" value="<?php echo $row->slideshow_filmstrip_rl_btn_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_filmstrip_rl_btn_size"><?php _e("Filmstrip right, left buttons size: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_filmstrip_rl_btn_size" id="slideshow_filmstrip_rl_btn_size" value="<?php echo $row->slideshow_filmstrip_rl_btn_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)" /> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_width"><?php _e("Slider bullet width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_dots_width" id="slideshow_dots_width" value="<?php echo $row->slideshow_dots_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_height"><?php _e("Slider bullet height: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_dots_height" id="slideshow_dots_height" value="<?php echo $row->slideshow_dots_height; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_border_radius"><?php _e("Slider bullet border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_dots_border_radius" id="slideshow_dots_border_radius" value="<?php echo $row->slideshow_dots_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_background_color"><?php _e("Slider bullet background color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_dots_background_color" id="slideshow_dots_background_color" value="<?php echo $row->slideshow_dots_background_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_margin"><?php _e("Slider bullet margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_dots_margin" id="slideshow_dots_margin" value="<?php echo $row->slideshow_dots_margin; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_active_background_color"><?php _e("Slider bullet active background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_dots_active_background_color" id="slideshow_dots_active_background_color" value="<?php echo $row->slideshow_dots_active_background_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_active_border_width"><?php _e("Slider bullet active border width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_dots_active_border_width" id="slideshow_dots_active_border_width" value="<?php echo $row->slideshow_dots_active_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_dots_active_border_color"><?php _e("Slider bullet active border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_dots_active_border_color" id="slideshow_dots_active_border_color" value="<?php echo $row->slideshow_dots_active_border_color; ?>" class="color"/>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Slideshow_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="slideshow_title_background_color"><?php _e("Title background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_title_background_color" id="slideshow_title_background_color" value="<?php echo $row->slideshow_title_background_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_title_opacity"><?php _e("Title transparency: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_title_opacity" id="slideshow_title_opacity" value="<?php echo $row->slideshow_title_opacity; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_title_border_radius"><?php _e("Title border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_title_border_radius" id="slideshow_title_border_radius" value="<?php echo $row->slideshow_title_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_title_padding"><?php _e("Title padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_title_padding" id="slideshow_title_padding" value="<?php echo $row->slideshow_title_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_title_font_size"><?php _e("Title font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_title_font_size" id="slideshow_title_font_size" value="<?php echo $row->slideshow_title_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)" /> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_title_color"><?php _e("Title color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_title_color" id="slideshow_title_color" value="<?php echo $row->slideshow_title_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_title_font"><?php _e("Title font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="slideshow_title_font" id="slideshow_title_font">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->slideshow_title_font == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_description_background_color"><?php _e("Description background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_description_background_color" id="slideshow_description_background_color" value="<?php echo $row->slideshow_description_background_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_description_opacity"><?php _e("Description transparency: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_description_opacity" id="slideshow_description_opacity" value="<?php echo $row->slideshow_description_opacity; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_description_border_radius"><?php _e("Description border radius: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_description_border_radius" id="slideshow_description_border_radius" value="<?php echo $row->slideshow_description_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_description_padding"><?php _e("Description padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_description_padding" id="slideshow_description_padding" value="<?php echo $row->slideshow_description_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_description_font_size"><?php _e("Description font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="slideshow_description_font_size" id="slideshow_description_font_size" value="<?php echo $row->slideshow_description_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_description_color"><?php _e("Description color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="slideshow_description_color" id="slideshow_description_color" value="<?php echo $row->slideshow_description_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="slideshow_description_font"><?php _e("Description font family: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="slideshow_description_font" id="slideshow_description_font">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->slideshow_description_font == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>

        <fieldset class="spider_type_fieldset" id="Image_browser">
          <fieldset class="spider_child_fieldset" id="Image_browser_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="image_browser_full_padding"><?php _e("Full padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_full_padding" id="image_browser_full_padding" value="<?php echo $row->image_browser_full_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_full_bg_color"><?php _e("Full background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_full_bg_color" id="image_browser_full_bg_color" value="<?php echo $row->image_browser_full_bg_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_full_transparent"><?php _e("Full background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_full_transparent" id="image_browser_full_transparent" value="<?php echo $row->image_browser_full_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_full_border_radius"><?php _e("Full border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_full_border_radius" id="image_browser_full_border_radius" value="<?php echo $row->image_browser_full_border_radius; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_full_border_width"><?php _e("Full border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_full_border_width" id="image_browser_full_border_width" value="<?php echo $row->image_browser_full_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_full_border_style"><?php _e("Full border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="image_browser_full_border_style" id="image_browser_full_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->image_browser_full_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_full_border_color"><?php _e("Full border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_full_border_color" id="image_browser_full_border_color" value="<?php echo $row->image_browser_full_border_color; ?>" class="color" />
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Image_browser_2">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="image_browser_align0"><?php _e("Alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="image_browser_align" id="image_browser_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->image_browser_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_margin"><?php _e("Margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_margin" id="image_browser_margin" value="<?php echo $row->image_browser_margin; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_padding"><?php _e("Padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_padding" id="image_browser_padding" value="<?php echo $row->image_browser_padding; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_border_width"><?php _e("Border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_border_width" id="image_browser_border_width" value="<?php echo $row->image_browser_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_border_style"><?php _e("Border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="image_browser_border_style" id="image_browser_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->image_browser_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_border_color"><?php _e("Border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_border_color" id="image_browser_border_color" value="<?php echo $row->image_browser_border_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_border_radius"><?php _e("Border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_border_radius" id="image_browser_border_radius" value="<?php echo $row->image_browser_border_radius; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_bg_color"><?php _e("Background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_bg_color" id="image_browser_bg_color" value="<?php echo $row->image_browser_bg_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_transparent"><?php _e("Background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_transparent" id="image_browser_transparent" value="<?php echo $row->image_browser_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_box_shadow"><?php _e("Box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_box_shadow" id="image_browser_box_shadow" value="<?php echo $row->image_browser_box_shadow; ?>" class="spider_box_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Image_browser_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_align0"><?php _e("Title alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="image_browser_image_description_align" id="image_browser_image_description_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->image_browser_image_description_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_img_font_size"><?php _e("Font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_img_font_size" id="image_browser_img_font_size" value="<?php echo $row->image_browser_img_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_img_font_color"><?php _e("Font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_img_font_color" id="image_browser_img_font_color" value="<?php echo $row->image_browser_img_font_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_img_font_family"><?php _e("Font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="image_browser_img_font_family" id="image_browser_img_font_family">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->image_browser_img_font_family == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_margin"><?php _e("Description margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_image_description_margin" id="image_browser_image_description_margin" value="<?php echo $row->image_browser_image_description_margin; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_padding"><?php _e("Description padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_image_description_padding" id="image_browser_image_description_padding" value="<?php echo $row->image_browser_image_description_padding; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_border_width"><?php _e("Description border width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="image_browser_image_description_border_width" id="image_browser_image_description_border_width" value="<?php echo $row->image_browser_image_description_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)" /> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_border_style"><?php _e("Description border style: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="image_browser_image_description_border_style" id="image_browser_image_description_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->image_browser_image_description_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_border_color"><?php _e("Description border color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="image_browser_image_description_border_color" id="image_browser_image_description_border_color" value="<?php echo $row->image_browser_image_description_border_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_border_radius"><?php _e("Description border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="image_browser_image_description_border_radius" id="image_browser_image_description_border_radius" value="<?php echo $row->image_browser_image_description_border_radius; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="image_browser_image_description_bg_color"><?php _e("Description background color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="image_browser_image_description_bg_color" id="image_browser_image_description_bg_color" value="<?php echo $row->image_browser_image_description_bg_color; ?>" class="color" />
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>

        <fieldset class="spider_type_fieldset" id="Compact_album">
          <fieldset class="spider_child_fieldset" id="Compact_album_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_padding"><?php _e("Padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_padding" id="album_compact_thumb_padding" value="<?php echo $row->album_compact_thumb_padding; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_margin"><?php _e("Margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_margin" id="album_compact_thumb_margin" value="<?php echo $row->album_compact_thumb_margin; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                    <div class="spider_description">U<?php _e("se CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_border_width"><?php _e("Border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_border_width" id="album_compact_thumb_border_width" value="<?php echo $row->album_compact_thumb_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_border_style"><?php _e("Border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_compact_thumb_border_style" id="album_compact_thumb_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_compact_thumb_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_border_color"><?php _e("Border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_border_color" id="album_compact_thumb_border_color" value="<?php echo $row->album_compact_thumb_border_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_border_radius"><?php _e("Border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_border_radius" id="album_compact_thumb_border_radius" value="<?php echo $row->album_compact_thumb_border_radius; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_box_shadow"><?php _e("Shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_box_shadow" id="album_compact_thumb_box_shadow" value="<?php echo $row->album_compact_thumb_box_shadow; ?>" class="spider_box_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_hover_effect"><?php _e("Hover effect:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_compact_thumb_hover_effect" id="album_compact_thumb_hover_effect">
                      <?php
                      foreach ($hover_effects as $key => $hover_effect) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_compact_thumb_hover_effect == $key) ? 'selected="selected"' : ''); ?>><?php echo __($hover_effect,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_hover_effect_value"><?php _e("Hover effect value:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_hover_effect_value" id="album_compact_thumb_hover_effect_value" value="<?php echo $row->album_compact_thumb_hover_effect_value; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("E.g. Rotate", 'bwg_back'); ?>: 10deg, <?php _e("Scale:", 'bwg_back'); ?> 1.5, <?php _e("Skew:", 'bwg_back'); ?> 10deg.</div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Thumbnail transition:", 'bwg_back'); ?> </label></td>
                  <td id="album_compact_thumb_transition">
                    <input type="radio" name="album_compact_thumb_transition" id="album_compact_thumb_transition1" value="1"<?php if ($row->album_compact_thumb_transition == 1) echo 'checked="checked"'; ?> />
                    <label for="album_compact_thumb_transition1" id="album_compact_thumb_transition1_lbl"><?php _e("Yes", 'bwg_back'); ?></label>
                    <input type="radio" name="album_compact_thumb_transition" id="album_compact_thumb_transition0" value="0"<?php if ($row->album_compact_thumb_transition == 0) echo 'checked="checked"'; ?> />
                    <label for="album_compact_thumb_transition0" id="album_compact_thumb_transition0_lbl"><?php _e("No", 'bwg_back'); ?></label>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Compact_album_2">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_bg_color"><?php _e("Thumbnail background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_bg_color" id="album_compact_thumb_bg_color" value="<?php echo $row->album_compact_thumb_bg_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_transparent"><?php _e("Thumbnail transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_transparent" id="album_compact_thumb_transparent" value="<?php echo $row->album_compact_thumb_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumbs_bg_color"><?php _e("Full background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_thumbs_bg_color" id="album_compact_thumbs_bg_color" value="<?php echo $row->album_compact_thumbs_bg_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_bg_transparent"><?php _e("Full background transparency: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="album_compact_thumb_bg_transparent" id="album_compact_thumb_bg_transparent" value="<?php echo $row->album_compact_thumb_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_thumb_align0"><?php _e("Alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_compact_thumb_align" id="album_compact_thumb_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_compact_thumb_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Compact_album_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label><?php _e("Title position:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="album_compact_thumb_title_pos" id="album_compact_thumb_title_pos1" value="top" <?php if ($row->album_compact_thumb_title_pos == "top") echo 'checked="checked"'; ?> />
                    <label for="album_compact_thumb_title_pos1" id="album_compact_thumb_title_pos1_lbl"><?php _e("Top", 'bwg_back'); ?></label>
                    <input type="radio" name="album_compact_thumb_title_pos" id="album_compact_thumb_title_pos0" value="bottom" <?php if ($row->album_compact_thumb_title_pos == "bottom") echo 'checked="checked"'; ?> />
                    <label for="album_compact_thumb_title_pos0" id="album_compact_thumb_title_pos0_lbl"><?php _e("Bottom", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_title_font_size"><?php _e("Title font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_title_font_size" id="album_compact_title_font_size" value="<?php echo $row->album_compact_title_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_title_font_color"><?php _e("Title font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_title_font_color" id="album_compact_title_font_color" value="<?php echo $row->album_compact_title_font_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_title_font_style"><?php _e("Title font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_compact_title_font_style" id="album_compact_title_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_compact_title_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_title_font_weight"><?php _e("Title font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_compact_title_font_weight" id="album_compact_title_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_compact_title_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_title_shadow"><?php _e("Title box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_title_shadow" id="album_compact_title_shadow" value="<?php echo $row->album_compact_title_shadow; ?>" class="spider_box_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_title_margin"><?php _e("Title margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_title_margin" id="album_compact_title_margin" value="<?php echo $row->album_compact_title_margin; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_back_font_size"><?php _e("Font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_back_font_size" id="album_compact_back_font_size" value="<?php echo $row->album_compact_back_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_back_font_color"><?php _e("Font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_back_font_color" id="album_compact_back_font_color" value="<?php echo $row->album_compact_back_font_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_back_font_style"><?php _e("Font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_compact_back_font_style" id="album_compact_back_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_compact_back_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_back_font_weight"><?php _e("Font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_compact_back_font_weight" id="album_compact_back_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_compact_back_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_compact_back_padding"><?php _e("Back padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_compact_back_padding" id="album_compact_back_padding" value="<?php echo $row->album_compact_back_padding; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>

        <fieldset class="spider_type_fieldset" id="Extended_album">
          <fieldset class="spider_child_fieldset" id="Extended_album_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_margin"><?php _e("Thumbnail margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_margin" id="album_extended_thumb_margin" value="<?php echo $row->album_extended_thumb_margin; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_padding"><?php _e("Thumbnail padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_padding" id="album_extended_thumb_padding" value="<?php echo $row->album_extended_thumb_padding; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_border_width"><?php _e("Thumbnail border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_border_width" id="album_extended_thumb_border_width" value="<?php echo $row->album_extended_thumb_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_border_style"><?php _e("Thumbnail border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_thumb_border_style" id="album_extended_thumb_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_thumb_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_border_color"><?php _e("Thumbnail border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_border_color" id="album_extended_thumb_border_color" value="<?php echo $row->album_extended_thumb_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_border_radius"><?php _e("Thumbnail border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_border_radius" id="album_extended_thumb_border_radius" value="<?php echo $row->album_extended_thumb_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_box_shadow"><?php _e("Thumbnail box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_box_shadow" id="album_extended_thumb_box_shadow" value="<?php echo $row->album_extended_thumb_box_shadow; ?>" class="spider_box_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Thumbnail transition:", 'bwg_back'); ?> </label></td>
                  <td id="album_extended_thumb_transition">
                    <input type="radio" name="album_extended_thumb_transition" id="album_extended_thumb_transition1" value="1"<?php if ($row->album_extended_thumb_transition == 1) echo 'checked="checked"'; ?> />
                    <label for="album_extended_thumb_transition1" id="album_extended_thumb_transition1_lbl"><?php _e("Yes", 'bwg_back'); ?></label>
                    <input type="radio" name="album_extended_thumb_transition" id="album_extended_thumb_transition0" value="0"<?php if ($row->album_extended_thumb_transition == 0) echo 'checked="checked"'; ?> />
                    <label for="album_extended_thumb_transition0" id="album_extended_thumb_transition0_lbl"><?php _e("No", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_align0"><?php _e("Thumbnail alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_thumb_align" id="album_extended_thumb_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_thumb_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_transparent"><?php _e("Thumbnail transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_transparent" id="album_extended_thumb_transparent" value="<?php echo $row->album_extended_thumb_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_hover_effect"><?php _e("Thumbnail hover effect: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="album_extended_thumb_hover_effect" id="album_extended_thumb_hover_effect">
                      <?php
                      foreach ($hover_effects as $key => $hover_effect) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_thumb_hover_effect == $key) ? 'selected="selected"' : ''); ?>><?php echo __($hover_effect,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_hover_effect_value"><?php _e("Hover effect value:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_hover_effect_value" id="album_extended_thumb_hover_effect_value" value="<?php echo $row->album_extended_thumb_hover_effect_value; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("E.g. Rotate:", 'bwg_back'); ?> 10deg, <?php _e("Scale:", 'bwg_back'); ?> 1.5, <?php _e("Skew:", 'bwg_back'); ?> 10deg.</div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_bg_color"><?php _e("Thumbnail background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_bg_color" id="album_extended_thumb_bg_color" value="<?php echo $row->album_extended_thumb_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumbs_bg_color"><?php _e("Thumbnails background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumbs_bg_color" id="album_extended_thumbs_bg_color" value="<?php echo $row->album_extended_thumbs_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_bg_transparent"><?php _e("Thumbnail background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_bg_transparent" id="album_extended_thumb_bg_transparent" value="<?php echo $row->album_extended_thumb_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Extended_album_2">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_div_padding"><?php _e("Thumbnail div padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_div_padding" id="album_extended_thumb_div_padding" value="<?php echo $row->album_extended_thumb_div_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_div_bg_color"><?php _e("Thumbnail div background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_div_bg_color" id="album_extended_thumb_div_bg_color" value="<?php echo $row->album_extended_thumb_div_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_div_border_width"><?php _e("Thumbnail div border width:", 'bwg_back'); ?> </label>
                  </td>
                  <td>
                    <input type="text" name="album_extended_thumb_div_border_width" id="album_extended_thumb_div_border_width" value="<?php echo $row->album_extended_thumb_div_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_div_border_style"><?php _e("Thumbnail div border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_thumb_div_border_style" id="album_extended_thumb_div_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_thumb_div_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_div_border_color"><?php _e("Thumbnail div border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_div_border_color" id="album_extended_thumb_div_border_color" value="<?php echo $row->album_extended_thumb_div_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_thumb_div_border_radius"><?php _e("Thumbnail div border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_thumb_div_border_radius" id="album_extended_thumb_div_border_radius" value="<?php echo $row->album_extended_thumb_div_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_margin"><?php _e("Margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_div_margin" id="album_extended_div_margin" value="<?php echo $row->album_extended_div_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_padding"><?php _e("Padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_div_padding" id="album_extended_div_padding" value="<?php echo $row->album_extended_div_padding; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_bg_color"><?php _e("Background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_div_bg_color" id="album_extended_div_bg_color" value="<?php echo $row->album_extended_div_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_bg_transparent"><?php _e("Background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_div_bg_transparent" id="album_extended_div_bg_transparent" value="<?php echo $row->album_extended_div_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_border_radius"><?php _e("Border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_div_border_radius" id="album_extended_div_border_radius" value="<?php echo $row->album_extended_div_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_separator_width"><?php _e("Separator width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_div_separator_width" id="album_extended_div_separator_width" value="<?php echo $row->album_extended_div_separator_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_separator_style"><?php _e("Separator style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_div_separator_style" id="album_extended_div_separator_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_div_separator_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_div_separator_color"><?php _e("Separator color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_div_separator_color" id="album_extended_div_separator_color" value="<?php echo $row->album_extended_div_separator_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_back_padding"><?php _e("Back padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_back_padding" id="album_extended_back_padding" value="<?php echo $row->album_extended_back_padding; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_back_font_size"><?php _e("Back font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_back_font_size" id="album_extended_back_font_size" value="<?php echo $row->album_extended_back_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_back_font_color"><?php _e("Back font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_back_font_color" id="album_extended_back_font_color" value="<?php echo $row->album_extended_back_font_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_back_font_style"><?php _e("Back font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_back_font_style" id="album_extended_back_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_back_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_back_font_weight"><?php _e("Back font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_back_font_weight" id="album_extended_back_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_back_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
            </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Extended_album_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="album_extended_text_div_padding"><?php _e("Text div padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_text_div_padding" id="album_extended_text_div_padding" value="<?php echo $row->album_extended_text_div_padding; ?>" class="spider_char_input" />
                    <div class="spider_description">Use CSS type values.</div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_text_div_border_width"><?php _e("Text div border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_text_div_border_width" id="album_extended_text_div_border_width" value="<?php echo $row->album_extended_text_div_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_text_div_border_style"><?php _e("Text border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_text_div_border_style" id="album_extended_text_div_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_text_div_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_text_div_border_color"><?php _e("Text border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_text_div_border_color" id="album_extended_text_div_border_color" value="<?php echo $row->album_extended_text_div_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_text_div_border_radius"><?php _e("Text div border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_text_div_border_radius" id="album_extended_text_div_border_radius" value="<?php echo $row->album_extended_text_div_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_text_div_bg_color"><?php _e("Text background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_text_div_bg_color" id="album_extended_text_div_bg_color" value="<?php echo $row->album_extended_text_div_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_margin_bottom"><?php _e("Title margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_title_margin_bottom" id="album_extended_title_margin_bottom" value="<?php echo $row->album_extended_title_margin_bottom; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_padding"><?php _e("Title padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_title_padding" id="album_extended_title_padding" value="<?php echo $row->album_extended_title_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_span_border_width"><?php _e("Title border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_title_span_border_width" id="album_extended_title_span_border_width" value="<?php echo $row->album_extended_title_span_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_span_border_style"><?php _e("Title border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_title_span_border_style" id="album_extended_title_span_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_title_span_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_span_border_color"><?php _e("Title border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_title_span_border_color" id="album_extended_title_span_border_color" value="<?php echo $row->album_extended_title_span_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_font_size"><?php _e("Title font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_title_font_size" id="album_extended_title_font_size" value="<?php echo $row->album_extended_title_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_font_color"><?php _e("Title font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_title_font_color" id="album_extended_title_font_color" value="<?php echo $row->album_extended_title_font_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_font_style"><?php _e("Title font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_title_font_style" id="album_extended_title_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_title_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_title_font_weight"><?php _e("Title font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_title_font_weight" id="album_extended_title_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_title_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_padding"><?php _e("Description padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_desc_padding" id="album_extended_desc_padding" value="<?php echo $row->album_extended_desc_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_span_border_width"><?php _e("Description border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_desc_span_border_width" id="album_extended_desc_span_border_width" value="<?php echo $row->album_extended_desc_span_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_span_border_style"><?php _e("Description border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_desc_span_border_style" id="album_extended_desc_span_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_desc_span_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_span_border_color"><?php _e("Description border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_desc_span_border_color" id="album_extended_desc_span_border_color" value="<?php echo $row->album_extended_desc_span_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_font_size"><?php _e("Description font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_desc_font_size" id="album_extended_desc_font_size" value="<?php echo $row->album_extended_desc_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_font_color"><?php _e("Description font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_desc_font_color" id="album_extended_desc_font_color" value="<?php echo $row->album_extended_desc_font_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_font_style"><?php _e("Description font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_desc_font_style" id="album_extended_desc_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_desc_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_font_weight"><?php _e("Description font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="album_extended_desc_font_weight" id="album_extended_desc_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->album_extended_desc_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_more_size"><?php _e("Description more size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_desc_more_size" id="album_extended_desc_more_size" value="<?php echo $row->album_extended_desc_more_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="album_extended_desc_more_color"><?php _e("Description more color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="album_extended_desc_more_color" id="album_extended_desc_more_color" value="<?php echo $row->album_extended_desc_more_color; ?>" class="color"/>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>

        <fieldset class="spider_type_fieldset" id="Blog_style">
          <fieldset class="spider_child_fieldset" id="Blog_style_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="blog_style_bg_color"><?php _e("Background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_bg_color" id="blog_style_bg_color" value="<?php echo $row->blog_style_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_transparent"><?php _e("Background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_transparent" id="blog_style_transparent" value="<?php echo $row->blog_style_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_align0"><?php _e("Alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="blog_style_align" id="blog_style_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->blog_style_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_margin"><?php _e("Margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_margin" id="blog_style_margin" value="<?php echo $row->blog_style_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_padding"><?php _e("Padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_padding" id="blog_style_padding" value="<?php echo $row->blog_style_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description">U<?php _e("se CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_box_shadow"><?php _e("Box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_box_shadow" id="blog_style_box_shadow" value="<?php echo $row->blog_style_box_shadow; ?>" class="spider_box_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Blog_style_2">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="blog_style_img_font_family"><?php _e("Font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="blog_style_img_font_family" id="blog_style_img_font_family">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->blog_style_img_font_family == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_img_font_size"><?php _e("Font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_img_font_size" id="blog_style_img_font_size" value="<?php echo $row->blog_style_img_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_img_font_color"><?php _e("Font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_img_font_color" id="blog_style_img_font_color" value="<?php echo $row->blog_style_img_font_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_border_width"><?php _e("Border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_border_width" id="blog_style_border_width" value="<?php echo $row->blog_style_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_border_style"><?php _e("Border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="blog_style_border_style" id="blog_style_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->blog_style_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_border_color"><?php _e("Border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_border_color" id="blog_style_border_color" value="<?php echo $row->blog_style_border_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_border_radius"><?php _e("Border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_border_radius" id="blog_style_border_radius" value="<?php echo $row->blog_style_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Blog_style_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_margin"><?php _e("Buttons and title margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_margin" id="blog_style_share_buttons_margin" value="<?php echo $row->blog_style_share_buttons_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_font_size"><?php _e("Buttons size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_font_size" id="blog_style_share_buttons_font_size" value="<?php echo $row->blog_style_share_buttons_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_color"><?php _e("Buttons color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_color" id="blog_style_share_buttons_color" value="<?php echo $row->blog_style_share_buttons_color; ?>" class="color"/>
                  </td>
                </tr>
               <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_border_width"><?php _e("Buttons and title border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_border_width" id="blog_style_share_buttons_border_width" value="<?php echo $row->blog_style_share_buttons_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_border_style"><?php _e("Buttons and title border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="blog_style_share_buttons_border_style" id="blog_style_share_buttons_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->blog_style_share_buttons_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_border_color"><?php _e("Buttons and title border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_border_color" id="blog_style_share_buttons_border_color" value="<?php echo $row->blog_style_share_buttons_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_border_radius"><?php _e("Buttons and title border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_border_radius" id="blog_style_share_buttons_border_radius" value="<?php echo $row->blog_style_share_buttons_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_bg_color"><?php _e("Buttons and title background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_bg_color" id="blog_style_share_buttons_bg_color" value="<?php echo $row->blog_style_share_buttons_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_bg_transparent"><?php _e("Buttons and title background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="blog_style_share_buttons_bg_transparent" id="blog_style_share_buttons_bg_transparent" value="<?php echo $row->blog_style_share_buttons_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="blog_style_share_buttons_align0"><?php _e("Buttons or title alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="blog_style_share_buttons_align" id="blog_style_share_buttons_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->blog_style_share_buttons_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>

        <fieldset class="spider_type_fieldset" id="Lightbox">
          <fieldset class="spider_child_fieldset" id="Lightbox_1">
            <table style="clear:both;">
              <tbody>
                <tr id="lightbox_overlay_bg">
                  <td class="spider_label"><label for="lightbox_overlay_bg_color"><?php _e("Overlay background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_overlay_bg_color" id="lightbox_overlay_bg_color" value="<?php echo $row->lightbox_overlay_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_overlay">
                  <td class="spider_label"><label for="lightbox_overlay_bg_transparent"><?php _e("Overlay background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_overlay_bg_transparent" id="lightbox_overlay_bg_transparent" value="<?php echo $row->lightbox_overlay_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_bg">
                  <td class="spider_label"><label for="lightbox_bg_color"><?php _e("Lightbox background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_bg_color" id="lightbox_bg_color" value="<?php echo $row->lightbox_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_transparency">
                  <td class="spider_label"><label for="lightbox_bg_transparent"><?php echo __('Lightbox background transparency:', 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_bg_transparent" id="lightbox_bg_transparent" value="<?php echo $row->lightbox_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php echo __('Value must be between 0 to 100.', 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_cntrl1">
                  <td class="spider_label"><label for="lightbox_ctrl_btn_height"><?php _e("Control buttons height:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_btn_height" id="lightbox_ctrl_btn_height" value="<?php echo $row->lightbox_ctrl_btn_height; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_cntrl2">
                  <td class="spider_label"><label for="lightbox_ctrl_btn_margin_top"><?php _e("Control buttons margin (top):", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_btn_margin_top" id="lightbox_ctrl_btn_margin_top" value="<?php echo $row->lightbox_ctrl_btn_margin_top; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_cntrl3">
                  <td class="spider_label"><label for="lightbox_ctrl_btn_margin_left"><?php _e("Control buttons margin (left):", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_btn_margin_left" id="lightbox_ctrl_btn_margin_left" value="<?php echo $row->lightbox_ctrl_btn_margin_left; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_cntrl9">
                  <td class="spider_label"><label><?php _e("Control buttons position:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="lightbox_ctrl_btn_pos" id="lightbox_ctrl_btn_pos1" value="top"<?php if ($row->lightbox_ctrl_btn_pos == "top") echo 'checked="checked"'; ?> />
                    <label for="lightbox_ctrl_btn_pos1" id="lightbox_ctrl_btn_pos1_lbl"><?php _e("Top", 'bwg_back'); ?></label>
                    <input type="radio" name="lightbox_ctrl_btn_pos" id="lightbox_ctrl_btn_pos0" value="bottom"<?php if ($row->lightbox_ctrl_btn_pos == "bottom") echo 'checked="checked"'; ?> />
                    <label for="lightbox_ctrl_btn_pos0" id="lightbox_ctrl_btn_pos0_lbl"><?php _e("Bottom", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr id="lightbox_cntrl8">
                  <td class="spider_label"><label for="lightbox_ctrl_cont_bg_color"><?php _e("Control buttons background color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_cont_bg_color" id="lightbox_ctrl_cont_bg_color" value="<?php echo $row->lightbox_ctrl_cont_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_cntrl5">
                  <td class="spider_label"><label for="lightbox_ctrl_cont_border_radius"><?php _e("Control buttons container border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_cont_border_radius" id="lightbox_ctrl_cont_border_radius" value="<?php echo $row->lightbox_ctrl_cont_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_cntrl6">
                  <td class="spider_label"><label for="lightbox_ctrl_cont_transparent"><?php _e("Control buttons container background transparency: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_cont_transparent" id="lightbox_ctrl_cont_transparent" value="<?php echo $row->lightbox_ctrl_cont_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_cntrl10">
                  <td class="spider_label"><label for="lightbox_ctrl_btn_align0"><?php _e("Control buttons alignment: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="lightbox_ctrl_btn_align" id="lightbox_ctrl_btn_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_ctrl_btn_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_cntrl7">
                  <td class="spider_label"><label for="lightbox_ctrl_btn_color"><?php _e("Control buttons color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_btn_color" id="lightbox_ctrl_btn_color" value="<?php echo $row->lightbox_ctrl_btn_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_cntrl4">
                  <td class="spider_label"><label for="lightbox_ctrl_btn_transparent"><?php _e("Control buttons transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_ctrl_btn_transparent" id="lightbox_ctrl_btn_transparent" value="<?php echo $row->lightbox_ctrl_btn_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_toggle1">
                  <td class="spider_label"><label for="lightbox_toggle_btn_height"><?php _e("Toggle button height: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_toggle_btn_height" id="lightbox_toggle_btn_height" value="<?php echo $row->lightbox_toggle_btn_height; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_toggle2">
                  <td class="spider_label"><label for="lightbox_toggle_btn_width"><?php _e("Toggle button width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_toggle_btn_width" id="lightbox_toggle_btn_width" value="<?php echo $row->lightbox_toggle_btn_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close1">
                  <td class="spider_label"><label for="lightbox_close_btn_border_radius"><?php _e("Close button border radius:", 'bwg_back'); ?> </label>
                  </td>
                  <td>
                    <input type="text" name="lightbox_close_btn_border_radius" id="lightbox_close_btn_border_radius" value="<?php echo $row->lightbox_close_btn_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_close2">
                  <td class="spider_label"><label for="lightbox_close_btn_border_width"><?php _e("Close button border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_border_width" id="lightbox_close_btn_border_width" value="<?php echo $row->lightbox_close_btn_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close12">
                  <td class="spider_label"><label for="lightbox_close_btn_border_style"><?php _e("Close button border style: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="lightbox_close_btn_border_style" id="lightbox_close_btn_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_close_btn_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_close13">
                  <td class="spider_label"><label for="lightbox_close_btn_border_color"><?php _e("Close button border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_border_color" id="lightbox_close_btn_border_color" value="<?php echo $row->lightbox_close_btn_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_close3">
                  <td class="spider_label"><label for="lightbox_close_btn_box_shadow"><?php _e("Close button box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_box_shadow" id="lightbox_close_btn_box_shadow" value="<?php echo $row->lightbox_close_btn_box_shadow; ?>" class="spider_box_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_close11">
                  <td class="spider_label"><label for="lightbox_close_btn_bg_color"><?php _e("Close button background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_bg_color" id="lightbox_close_btn_bg_color" value="<?php echo $row->lightbox_close_btn_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_close9">
                  <td class="spider_label"><label for="lightbox_close_btn_transparent"><?php _e("Close button transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_transparent" id="lightbox_close_btn_transparent" value="<?php echo $row->lightbox_close_btn_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                  </td>
                </tr>
                <tr id="lightbox_close5">
                  <td class="spider_label"><label for="lightbox_close_btn_width"><?php _e("Close button width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_width" id="lightbox_close_btn_width" value="<?php echo $row->lightbox_close_btn_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close6">
                  <td class="spider_label"><label for="lightbox_close_btn_height"><?php _e("Close button height:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_height" id="lightbox_close_btn_height" value="<?php echo $row->lightbox_close_btn_height; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close7">
                  <td class="spider_label"><label for="lightbox_close_btn_top"><?php _e("Close button top:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_top" id="lightbox_close_btn_top" value="<?php echo $row->lightbox_close_btn_top; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close8">
                  <td class="spider_label"><label for="lightbox_close_btn_right"><?php _e("Close button right:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_right" id="lightbox_close_btn_right" value="<?php echo $row->lightbox_close_btn_right; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close4">
                  <td class="spider_label"><label for="lightbox_close_btn_size"><?php _e("Close button size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_size" id="lightbox_close_btn_size" value="<?php echo $row->lightbox_close_btn_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close14">
                  <td class="spider_label"><label for="lightbox_close_btn_color"><?php _e("Close button color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_color" id="lightbox_close_btn_color" value="<?php echo $row->lightbox_close_btn_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_close10">
                  <td class="spider_label"><label for="lightbox_close_btn_full_color"><?php _e("Fullscreen close button color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_btn_full_color" id="lightbox_close_btn_full_color" value="<?php echo $row->lightbox_close_btn_full_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_comment24">
                  <td class="spider_label"><label for="lightbox_comment_share_button_color"><?php _e("Share buttons color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_share_button_color" id="lightbox_comment_share_button_color" value="<?php echo $row->lightbox_comment_share_button_color; ?>" class="color" />
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Lightbox_2">
            <table style="clear:both;">
              <tbody>
                <tr id="lightbox_right_left11">
                  <td class="spider_label"><label for="lightbox_rl_btn_style"><?php _e("Right, left buttons style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_rl_btn_style" id="lightbox_rl_btn_style" class="spider_int_input">
                      <?php
                      foreach ($button_styles as $key => $button_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_rl_btn_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($button_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_right_left7">
                  <td class="spider_label"><label for="lightbox_rl_btn_bg_color"><?php _e("Right, left buttons background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_bg_color" id="lightbox_rl_btn_bg_color" value="<?php echo $row->lightbox_rl_btn_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rl_btn_transparent"><?php _e("Right, left buttons transparency: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_transparent" id="lightbox_rl_btn_transparent" value="<?php echo $row->lightbox_rl_btn_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                  </td>
                </tr>
                <tr id="lightbox_right_left3">
                  <td class="spider_label"><label for="lightbox_rl_btn_box_shadow"><?php _e("Right, left buttons box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_box_shadow" id="lightbox_rl_btn_box_shadow" value="<?php echo $row->lightbox_rl_btn_box_shadow; ?>" class="spider_box_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_right_left4">
                  <td class="spider_label"><label for="lightbox_rl_btn_height"><?php _e("Right, left buttons height:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_height" id="lightbox_rl_btn_height" value="<?php echo $row->lightbox_rl_btn_height; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_right_left5">
                  <td class="spider_label"><label for="lightbox_rl_btn_width"><?php _e("Right, left buttons width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_width" id="lightbox_rl_btn_width" value="<?php echo $row->lightbox_rl_btn_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_right_left6">
                  <td class="spider_label"><label for="lightbox_rl_btn_size"><?php _e("Right, left buttons size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_size" id="lightbox_rl_btn_size" value="<?php echo $row->lightbox_rl_btn_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_close15">
                  <td class="spider_label"><label for="lightbox_close_rl_btn_hover_color"><?php _e("Right, left, close buttons hover color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_close_rl_btn_hover_color" id="lightbox_close_rl_btn_hover_color" value="<?php echo $row->lightbox_close_rl_btn_hover_color; ?>" class="color" />
                  </td>
                </tr>
                <tr id="lightbox_right_left10">
                  <td class="spider_label"><label for="lightbox_rl_btn_color"><?php _e("Right, left buttons color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_color" id="lightbox_rl_btn_color" value="<?php echo $row->lightbox_rl_btn_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_right_left1">
                  <td class="spider_label"><label for="lightbox_rl_btn_border_radius"><?php _e("Right, left buttons border radius: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_border_radius" id="lightbox_rl_btn_border_radius" value="<?php echo $row->lightbox_rl_btn_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_right_left2">
                  <td class="spider_label"><label for="lightbox_rl_btn_border_width"><?php _e("Right, left buttons border width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_border_width" id="lightbox_rl_btn_border_width" value="<?php echo $row->lightbox_rl_btn_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_right_left8">
                  <td class="spider_label"><label for="lightbox_rl_btn_border_style"><?php _e("Right, left buttons border style: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="lightbox_rl_btn_border_style" id="lightbox_rl_btn_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_rl_btn_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_right_left9">
                  <td class="spider_label"><label for="lightbox_rl_btn_border_color"><?php _e("Right, left buttons border color: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_rl_btn_border_color" id="lightbox_rl_btn_border_color" value="<?php echo $row->lightbox_rl_btn_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip12">
                  <td class="spider_label"><label><?php _e("Filmstrip position: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="lightbox_filmstrip_pos" id="lightbox_filmstrip_pos">
                      <option value="top" <?php echo (($row->lightbox_filmstrip_pos == "top") ? 'selected="selected"' : ''); ?>><?php _e("Top", 'bwg_back'); ?></option>
                      <option value="right" <?php echo (($row->lightbox_filmstrip_pos == "right") ? 'selected="selected"' : ''); ?>><?php _e("Right", 'bwg_back'); ?></option>
                      <option value="bottom" <?php echo (($row->lightbox_filmstrip_pos == "bottom") ? 'selected="selected"' : ''); ?>><?php _e("Bottom", 'bwg_back'); ?></option>
                      <option value="left" <?php echo (($row->lightbox_filmstrip_pos == "left") ? 'selected="selected"' : ''); ?>><?php _e("Left", 'bwg_back'); ?></option>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip2">
                  <td class="spider_label"><label for="lightbox_filmstrip_thumb_margin"><?php _e("Filmstrip thumbnail margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_thumb_margin" id="lightbox_filmstrip_thumb_margin" value="<?php echo $row->lightbox_filmstrip_thumb_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip3">
                  <td class="spider_label"><label for="lightbox_filmstrip_thumb_border_width"><?php _e("Filmstrip thumbnail border width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_thumb_border_width" id="lightbox_filmstrip_thumb_border_width" value="<?php echo $row->lightbox_filmstrip_thumb_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_filmstrip9">
                  <td class="spider_label"><label for="lightbox_filmstrip_thumb_border_style"><?php _e("Filmstrip thumbnail border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_filmstrip_thumb_border_style" id="lightbox_filmstrip_thumb_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_filmstrip_thumb_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip10">
                  <td class="spider_label"><label for="lightbox_filmstrip_thumb_border_color"><?php _e("Filmstrip thumbnail border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_thumb_border_color" id="lightbox_filmstrip_thumb_border_color" value="<?php echo $row->lightbox_filmstrip_thumb_border_color; ?>" class="color" />
                  </td>
                </tr>
                <tr id="lightbox_filmstrip4">
                  <td class="spider_label"><label for="lightbox_filmstrip_thumb_border_radius"><?php _e("Filmstrip thumbnail border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_thumb_border_radius" id="lightbox_filmstrip_thumb_border_radius" value="<?php echo $row->lightbox_filmstrip_thumb_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip6">
                  <td class="spider_label"><label for="lightbox_filmstrip_thumb_active_border_width"><?php _e("Filmstrip thumbnail active border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_thumb_active_border_width" id="lightbox_filmstrip_thumb_active_border_width" value="<?php echo $row->lightbox_filmstrip_thumb_active_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_filmstrip11">
                  <td class="spider_label"> <label for="lightbox_filmstrip_thumb_active_border_color"><?php _e("Filmstrip thumbnail active border color:", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_thumb_active_border_color" id="lightbox_filmstrip_thumb_active_border_color" value="<?php echo $row->lightbox_filmstrip_thumb_active_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip5">
                  <td class="spider_label"><label for="lightbox_filmstrip_thumb_deactive_transparent"><?php _e("Filmstrip thumbnail deactive transparency: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_thumb_deactive_transparent" id="lightbox_filmstrip_thumb_deactive_transparent" value="<?php echo $row->lightbox_filmstrip_thumb_deactive_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip1">
                  <td class="spider_label"><label for="lightbox_filmstrip_rl_btn_size"><?php _e("Filmstrip right, left buttons size: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_rl_btn_size" id="lightbox_filmstrip_rl_btn_size" value="<?php echo $row->lightbox_filmstrip_rl_btn_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_filmstrip7">
                  <td class="spider_label"><label for="lightbox_filmstrip_rl_btn_color"><?php _e("Filmstrip right, left buttons color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_rl_btn_color" id="lightbox_filmstrip_rl_btn_color" value="<?php echo $row->lightbox_filmstrip_rl_btn_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_filmstrip8">
                  <td class="spider_label"><label for="lightbox_filmstrip_rl_bg_color"><?php _e("Filmstrip right, left button background color:", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_filmstrip_rl_bg_color" id="lightbox_filmstrip_rl_bg_color" value="<?php echo $row->lightbox_filmstrip_rl_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_pos1"><?php _e("Rating position: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="radio" name="lightbox_rate_pos" id="lightbox_rate_pos1" value="top" <?php if ($row->lightbox_rate_pos == "top") echo 'checked="checked"'; ?> />
                    <label for="lightbox_rate_pos1" id="lightbox_rate_pos1_lbl"><?php _e("Top", 'bwg_back'); ?></label>
                    <input type="radio" name="lightbox_rate_pos" id="lightbox_rate_pos0" value="bottom" <?php if ($row->lightbox_rate_pos == "bottom") echo 'checked="checked"'; ?> />
                    <label for="lightbox_rate_pos0" id="lightbox_rate_pos0_lbl"><?php _e("Bottom", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_align"><?php _e("Rating alignment: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="lightbox_rate_align" id="lightbox_rate_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_rate_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_icon"><?php _e("Rating icon:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_rate_icon" id="lightbox_rate_icon">
                      <?php
                      foreach ($rate_icons as $key => $rate_icon) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_rate_icon == $key) ? 'selected="selected"' : ''); ?>><?php echo __($rate_icon,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_color"><?php _e("Rating color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rate_color" id="lightbox_rate_color" value="<?php echo $row->lightbox_rate_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_hover_color"><?php _e("Rating hover color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rate_hover_color" id="lightbox_rate_hover_color" value="<?php echo $row->lightbox_rate_hover_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_size"><?php _e("Rating size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rate_size" id="lightbox_rate_size" value="<?php echo $row->lightbox_rate_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_stars_count"><?php _e("Rating icon count:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rate_stars_count" id="lightbox_rate_stars_count" value="<?php echo $row->lightbox_rate_stars_count; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_rate_padding"><?php _e("Rating padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_rate_padding" id="lightbox_rate_padding" value="<?php echo $row->lightbox_rate_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Hit counter position:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="lightbox_hit_pos" id="lightbox_hit_pos1" value="top" <?php if ($row->lightbox_hit_pos == "top") echo 'checked="checked"'; ?> />
                    <label for="lightbox_hit_pos1" id="lightbox_hit_pos1_lbl"><?php _e("Top", 'bwg_back'); ?></label>
                    <input type="radio" name="lightbox_hit_pos" id="lightbox_hit_pos0" value="bottom" <?php if ($row->lightbox_hit_pos == "bottom") echo 'checked="checked"'; ?> />
                    <label for="lightbox_hit_pos0" id="lightbox_hit_pos0_lbl"><?php _e("Bottom", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_align"><?php _e("Hit counter alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_hit_align" id="lightbox_hit_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_hit_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_bg_color"><?php _e("Hit counter background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_hit_bg_color" id="lightbox_hit_bg_color" value="<?php echo $row->lightbox_hit_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_bg_transparent"><?php _e("Hit counter background transparency: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_hit_bg_transparent" id="lightbox_hit_bg_transparent" value="<?php echo $row->lightbox_hit_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_border_width"><?php _e("Hit counter border width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_hit_border_width" id="lightbox_hit_border_width" value="<?php echo $row->lightbox_hit_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_border_style"><?php _e("Hit counter border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_hit_border_style" id="lightbox_hit_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_hit_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_border_color"><?php _e("Hit counter border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_hit_border_color" id="lightbox_hit_border_color" value="<?php echo $row->lightbox_hit_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_border_radius"><?php _e("Hit counter border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_hit_border_radius" id="lightbox_hit_border_radius" value="<?php echo $row->lightbox_hit_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_padding"><?php _e("Hit counter padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_hit_padding" id="lightbox_hit_padding" value="<?php echo $row->lightbox_hit_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_margin"><?php _e("Hit counter margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_hit_margin" id="lightbox_hit_margin" value="<?php echo $row->lightbox_hit_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_color"><?php _e("Hit counter font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_hit_color" id="lightbox_hit_color" value="<?php echo $row->lightbox_hit_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_font_style"><?php _e("Hit counter font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_hit_font_style" id="lightbox_hit_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_hit_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_font_weight"><?php _e("Hit counter font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_hit_font_weight" id="lightbox_hit_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_hit_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_hit_font_size"><?php _e("Hit counter font size:", 'bwg_back'); ?> </label>
                  </td>
                  <td>
                    <input type="text" name="lightbox_hit_font_size" id="lightbox_hit_font_size" value="<?php echo $row->lightbox_hit_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Lightbox_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label><?php _e("Info position:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="lightbox_info_pos" id="lightbox_info_pos1" value="top" <?php if ($row->lightbox_info_pos == "top") echo 'checked="checked"'; ?> />
                    <label for="lightbox_info_pos1" id="lightbox_info_pos1_lbl"><?php _e("Top", 'bwg_back'); ?></label>
                    <input type="radio" name="lightbox_info_pos" id="lightbox_info_pos0" value="bottom" <?php if ($row->lightbox_info_pos == "bottom") echo 'checked="checked"'; ?> />
                    <label for="lightbox_info_pos0" id="lightbox_info_pos0_lbl"><?php _e("Bottom", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_align"><?php _e("Info alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_info_align" id="lightbox_info_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_info_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_bg_color"><?php _e("Info background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_info_bg_color" id="lightbox_info_bg_color" value="<?php echo $row->lightbox_info_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_bg_transparent"><?php _e("Info background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_info_bg_transparent" id="lightbox_info_bg_transparent" value="<?php echo $row->lightbox_info_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_border_width"><?php _e("Info border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_info_border_width" id="lightbox_info_border_width" value="<?php echo $row->lightbox_info_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_border_style"><?php _e("Info border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_info_border_style" id="lightbox_info_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_info_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_border_color"><?php _e("Info border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_info_border_color" id="lightbox_info_border_color" value="<?php echo $row->lightbox_info_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_border_radius"><?php _e("Info border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_info_border_radius" id="lightbox_info_border_radius" value="<?php echo $row->lightbox_info_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_padding"><?php _e("Info padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_info_padding" id="lightbox_info_padding" value="<?php echo $row->lightbox_info_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_info_margin"><?php _e("Info margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_info_margin" id="lightbox_info_margin" value="<?php echo $row->lightbox_info_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_title_color"><?php _e("Title font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_title_color" id="lightbox_title_color" value="<?php echo $row->lightbox_title_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_title_font_style"><?php _e("Title font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_title_font_style" id="lightbox_title_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_title_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_title_font_weight"><?php _e("Title font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_title_font_weight" id="lightbox_title_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_title_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_title_font_size"><?php _e("Title font size:", 'bwg_back'); ?> </label>
                  </td>
                  <td>
                    <input type="text" name="lightbox_title_font_size" id="lightbox_title_font_size" value="<?php echo $row->lightbox_title_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_description_color"><?php _e("Description font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_description_color" id="lightbox_description_color" value="<?php echo $row->lightbox_description_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_description_font_style"><?php _e("Description font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_description_font_style" id="lightbox_description_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_description_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_description_font_weight"><?php _e("Description font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_description_font_weight" id="lightbox_description_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_description_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_description_font_size"><?php _e("Description font size:", 'bwg_back'); ?> </label>
                  </td>
                  <td>
                    <input type="text" name="lightbox_description_font_size" id="lightbox_description_font_size" value="<?php echo $row->lightbox_description_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="lightbox_comment_width"><?php _e("Comments Width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_width" id="lightbox_comment_width" value="<?php echo $row->lightbox_comment_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment25">
                  <td class="spider_label"><label><?php _e("Comments position:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="lightbox_comment_pos" id="lightbox_comment_pos1" value="left"<?php if ($row->lightbox_comment_pos == "left") echo 'checked="checked"'; ?> />
                    <label for="lightbox_comment_pos1" id="lightbox_comment_pos1_lbl"><?php _e("Left", 'bwg_back'); ?></label>
                    <input type="radio" name="lightbox_comment_pos" id="lightbox_comment_pos0" value="right"<?php if ($row->lightbox_comment_pos == "right") echo 'checked="checked"'; ?> />
                    <label for="lightbox_comment_pos0" id="lightbox_comment_pos0_lbl"><?php _e("Right", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr id="lightbox_comment13">
                  <td class="spider_label"><label for="lightbox_comment_bg_color"><?php _e("Comments background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_bg_color" id="lightbox_comment_bg_color" value="<?php echo $row->lightbox_comment_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_comment2">
                  <td class="spider_label"><label for="lightbox_comment_font_size"><?php _e("Comments font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_font_size" id="lightbox_comment_font_size" value="<?php echo $row->lightbox_comment_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment14">
                  <td class="spider_label"><label for="lightbox_comment_font_color"><?php _e("Comments font color:", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_comment_font_color" id="lightbox_comment_font_color" value="<?php echo $row->lightbox_comment_font_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_comment15">
                  <td class="spider_label"><label for="lightbox_comment_font_style"><?php _e("Comments font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_comment_font_style" id="lightbox_comment_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_comment_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_comment10">
                  <td class="spider_label"><label for="lightbox_comment_author_font_size"><?php _e("Comments author font size:", 'bwg_back'); ?> </label>
                  </td>
                  <td>
                    <input type="text" name="lightbox_comment_author_font_size" id="lightbox_comment_author_font_size" value="<?php echo $row->lightbox_comment_author_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment11">
                  <td class="spider_label"><label for="lightbox_comment_date_font_size"><?php _e("Comments date font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_date_font_size" id="lightbox_comment_date_font_size" value="<?php echo $row->lightbox_comment_date_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment12">
                  <td class="spider_label"><label for="lightbox_comment_body_font_size"><?php _e("Comments body font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_body_font_size" id="lightbox_comment_body_font_size" value="<?php echo $row->lightbox_comment_body_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment6">
                  <td class="spider_label"><label for="lightbox_comment_input_border_width"><?php _e("Comment input border width: ", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="lightbox_comment_input_border_width" id="lightbox_comment_input_border_width" value="<?php echo $row->lightbox_comment_input_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment21">
                  <td class="spider_label"><label for="lightbox_comment_input_border_style"><?php _e("Comment input border style: ", 'bwg_back'); ?></label></td>
                  <td>
                    <select name="lightbox_comment_input_border_style" id="lightbox_comment_input_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_comment_input_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_comment20">
                  <td class="spider_label"><label for="lightbox_comment_input_border_color"><?php _e("Comment input border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_input_border_color" id="lightbox_comment_input_border_color" value="<?php echo $row->lightbox_comment_input_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_comment7">
                  <td class="spider_label"><label for="lightbox_comment_input_border_radius"><?php _e("Comment input border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_input_border_radius" id="lightbox_comment_input_border_radius" value="<?php echo $row->lightbox_comment_input_border_radius; ?>" class="spider_char_input"/>
                  </td>
                </tr>
                <tr id="lightbox_comment8">
                  <td class="spider_label"><label for="lightbox_comment_input_padding"><?php _e("Comment input padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_input_padding" id="lightbox_comment_input_padding" value="<?php echo $row->lightbox_comment_input_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_comment19">
                  <td class="spider_label"><label for="lightbox_comment_input_bg_color"><?php _e("Comment input background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_input_bg_color" id="lightbox_comment_input_bg_color" value="<?php echo $row->lightbox_comment_input_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_comment16">
                  <td class="spider_label"><label for="lightbox_comment_button_bg_color"><?php _e("Comment button background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_button_bg_color" id="lightbox_comment_button_bg_color" value="<?php echo $row->lightbox_comment_button_bg_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_comment5">
                  <td class="spider_label"><label for="lightbox_comment_button_padding"><?php _e("Comment button padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_button_padding" id="lightbox_comment_button_padding" value="<?php echo $row->lightbox_comment_button_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_comment3">
                  <td class="spider_label"><label for="lightbox_comment_button_border_width"><?php _e("Comment button border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_button_border_width" id="lightbox_comment_button_border_width" value="<?php echo $row->lightbox_comment_button_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment18">
                  <td class="spider_label"><label for="lightbox_comment_button_border_style"><?php _e("Comment button border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_comment_button_border_style" id="lightbox_comment_button_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_comment_button_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_comment17">
                  <td class="spider_label"><label for="lightbox_comment_button_border_color"><?php _e("Comment button border color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_button_border_color" id="lightbox_comment_button_border_color" value="<?php echo $row->lightbox_comment_button_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr id="lightbox_comment4">
                  <td class="spider_label"><label for="lightbox_comment_button_border_radius"><?php _e("Comment button border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_button_border_radius" id="lightbox_comment_button_border_radius" value="<?php echo $row->lightbox_comment_button_border_radius; ?>" class="spider_char_input" />
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr id="lightbox_comment9">
                  <td class="spider_label"><label for="lightbox_comment_separator_width"><?php _e("Comment separator width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_separator_width" id="lightbox_comment_separator_width" value="<?php echo $row->lightbox_comment_separator_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr id="lightbox_comment22">
                  <td class="spider_label"><label for="lightbox_comment_separator_style"><?php _e("Comment separator style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="lightbox_comment_separator_style" id="lightbox_comment_separator_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->lightbox_comment_separator_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr id="lightbox_comment23">
                  <td class="spider_label"><label for="lightbox_comment_separator_color"><?php _e("Comment separator color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="lightbox_comment_separator_color" id="lightbox_comment_separator_color" value="<?php echo $row->lightbox_comment_separator_color; ?>" class="color"/>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>

        <fieldset class="spider_type_fieldset" id="Navigation">
          <fieldset class="spider_child_fieldset" id="Navigation_1">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="page_nav_font_size"><?php _e("Font size:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_font_size" id="page_nav_font_size" value="<?php echo $row->page_nav_font_size; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_font_color"><?php _e("Font color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_font_color" id="page_nav_font_color" value="<?php echo $row->page_nav_font_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_font_style"><?php _e("Font family:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="page_nav_font_style" id="page_nav_font_style">
                      <?php
                      foreach ($font_families as $key => $font_family) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->page_nav_font_style == $key) ? 'selected="selected"' : ''); ?>><?php echo $font_family; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_font_weight"><?php _e("Font weight:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="page_nav_font_weight" id="page_nav_font_weight">
                      <?php
                      foreach ($font_weights as $key => $font_weight) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->page_nav_font_weight == $key) ? 'selected="selected"' : ''); ?>><?php echo __($font_weight,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_border_width"><?php _e("Border width:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_border_width" id="page_nav_border_width" value="<?php echo $row->page_nav_border_width; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> px
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_border_style"><?php _e("Border style:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="page_nav_border_style" id="page_nav_border_style">
                      <?php
                      foreach ($border_styles as $key => $border_style) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->page_nav_border_style == $key) ? 'selected="selected"' : ''); ?>><?php echo __($border_style,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_border_color"><?php _e("Border color:", 'bwg_back'); ?></label></td>
                  <td>
                    <input type="text" name="page_nav_border_color" id="page_nav_border_color" value="<?php echo $row->page_nav_border_color; ?>" class="color"/>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_border_radius"><?php _e("Border radius:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_border_radius" id="page_nav_border_radius" value="<?php echo $row->page_nav_border_radius; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Navigation_2" style="display:block">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label for="page_nav_margin"><?php _e("Margin:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_margin" id="page_nav_margin" value="<?php echo $row->page_nav_margin; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_padding"><?php _e("Padding:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_padding" id="page_nav_padding" value="<?php echo $row->page_nav_padding; ?>" class="spider_char_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_button_bg_color"><?php _e("Button background color:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_button_bg_color" id="page_nav_button_bg_color" value="<?php echo $row->page_nav_button_bg_color; ?>" class="color" />
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_button_bg_transparent"><?php _e("Button background transparency:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_button_bg_transparent" id="page_nav_button_bg_transparent" value="<?php echo $row->page_nav_button_bg_transparent; ?>" class="spider_int_input" onkeypress="return spider_check_isnum(event)"/> %
                    <div class="spider_description"><?php _e("Value must be between 0 to 100.", 'bwg_back'); ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Button transition:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="page_nav_button_transition" id="page_nav_button_transition1" value="1"<?php if ($row->page_nav_button_transition == 1) echo 'checked="checked"'; ?> />
                    <label for="page_nav_button_transition1" id="page_nav_button_transition1_lbl"><?php _e("Yes", 'bwg_back'); ?></label>
                    <input type="radio" name="page_nav_button_transition" id="page_nav_button_transition0" value="0"<?php if ($row->page_nav_button_transition == 0) echo 'checked="checked"'; ?> />
                    <label for="page_nav_button_transition0" id="page_nav_button_transition0_lbl"><?php _e("No", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_box_shadow"><?php _e("Box shadow:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="text" name="page_nav_box_shadow" id="page_nav_box_shadow" value="<?php echo $row->page_nav_box_shadow; ?>" class="spider_box_input"/>
                    <div class="spider_description"><?php _e("Use CSS type values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <fieldset class="spider_child_fieldset" id="Navigation_3">
            <table style="clear:both;">
              <tbody>
                <tr>
                  <td class="spider_label"><label><?php _e("Position:", 'bwg_back'); ?> </label></td>
                  <td id="page_nav_position">
                    <input type="radio" name="page_nav_position" id="page_nav_position1" value="top"<?php if ($row->page_nav_position == "top") echo 'checked="checked"'; ?> />
                    <label for="page_nav_position1" id="page_nav_position1_lbl"><?php _e("Top", 'bwg_back'); ?></label>
                    <input type="radio" name="page_nav_position" id="page_nav_position0" value="bottom"<?php if ($row->page_nav_position == "bottom") echo 'checked="checked"'; ?> />
                    <label for="page_nav_position0" id="page_nav_position0_lbl"><?php _e("Bottom", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label for="page_nav_align0"><?php _e("Alignment:", 'bwg_back'); ?> </label></td>
                  <td>
                    <select name="page_nav_align" id="page_nav_align">
                      <?php
                      foreach ($aligns as $key => $align) {
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo (($row->page_nav_align == $key) ? 'selected="selected"' : ''); ?>><?php echo __($align,"bwg_back"); ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Numbering:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="page_nav_number" id="page_nav_number1" value="1"<?php if ($row->page_nav_number == 1) echo 'checked="checked"'; ?> />
                    <label for="page_nav_number1" id="page_nav_number1_lbl"><?php _e("Yes", 'bwg_back'); ?></label>
                    <input type="radio" name="page_nav_number" id="page_nav_number0" value="0"<?php if ($row->page_nav_number == 0) echo 'checked="checked"'; ?> />
                    <label for="page_nav_number0" id="page_nav_number0_lbl"><?php _e("No", 'bwg_back'); ?></label>
                  </td>
                </tr>
                <tr>
                  <td class="spider_label"><label><?php _e("Button text:", 'bwg_back'); ?> </label></td>
                  <td>
                    <input type="radio" name="page_nav_button_text" id="page_nav_button_text1" value="1"<?php if ($row->page_nav_button_text == 1) echo 'checked="checked"'; ?> />
                    <label for="page_nav_button_text1" id="page_nav_button_text1_lbl"><?php _e("Text", 'bwg_back'); ?></label>
                    <input type="radio" name="page_nav_button_text" id="page_nav_button_text0" value="0"<?php if ($row->page_nav_button_text == 0) echo 'checked="checked"'; ?> />
                    <label for="page_nav_button_text0" id="page_nav_button_text0_lbl"><?php _e("Arrow", 'bwg_back'); ?></label>
                    <div class="spider_description"><?php _e("Next, previous buttons values.", 'bwg_back'); ?></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </fieldset>
        </fieldset>
      </fieldset>
      <input type="hidden" id="task" name="task" value=""/>
      <input type="hidden" id="current_id" name="current_id" value="<?php echo $row->id; ?>"/>
      <input type="hidden" id="default_theme" name="default_theme" value="<?php echo $row->default_theme; ?>"/>
      <script>
        window.onload = bwg_change_theme_type('<?php echo $current_type; ?>');
      </script>
    </form>
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