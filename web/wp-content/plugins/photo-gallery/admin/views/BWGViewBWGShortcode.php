<?php

class BWGViewBWGShortcode {
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
    $gallery_rows = $this->model->get_gallery_rows_data();
    $album_rows = $this->model->get_album_rows_data();
    $option_row = $this->model->get_option_row_data();
    $theme_rows = $this->model->get_theme_rows_data();
    $from_menu = ((isset($_GET['page']) && (esc_html($_GET['page']) == 'BWGShortcode')) ? TRUE : FALSE);
    $shortcodes = $this->model->get_shortcode_data();
    $shortcode_max_id = $this->model->get_shortcode_max_id();
    $effects = array(
      'none' => __('None','bwg_back'),
      'cubeH' => __('Cube Horizontal','bwg_back'),
      'cubeV' => __('Cube Vertical','bwg_back'),
      'fade' => __('Fade','bwg_back'),
      'sliceH' => __('Slice Horizontal','bwg_back'),
      'sliceV' => __('Slice Vertical','bwg_back'),
      'slideH' => __('Slide Horizontal','bwg_back'),
      'slideV' => __('Slide Vertical','bwg_back'),
      'scaleOut' => __('Scale Out','bwg_back'),
      'scaleIn' => __('Scale In','bwg_back'),
      'blockScale' => __('Block Scale','bwg_back'),
      'kaleidoscope' => __('Kaleidoscope','bwg_back'),
      'fan' => __('Fan','bwg_back'),
      'blindH' => __('Blind Horizontal','bwg_back'),
      'blindV' => __('Blind Vertical','bwg_back'),
      'random' => __('Random','bwg_back'),
    );
    $watermark_fonts = array(
      'arial' => 'Arial',
      'Lucida grande' => 'Lucida grande',
      'segoe ui' => 'Segoe ui',
      'tahoma' => 'Tahoma',
      'trebuchet ms' => 'Trebuchet ms',
      'verdana' => 'Verdana',
      'cursive' =>'Cursive',
      'fantasy' => 'Fantasy',
      'monospace' => 'Monospace',
      'serif' => 'Serif',
    );
    if (!$from_menu) {
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
        <title><?php _e("Photo Gallery", 'bwg_back'); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
      <?php
      wp_print_scripts('jquery');
    }
    wp_print_scripts('jquery-ui-core');
    wp_print_scripts('jquery-ui-widget');
    wp_print_scripts('jquery-ui-position');
    wp_print_scripts('jquery-ui-tooltip');
    wp_print_scripts('wp-pointer');
    wp_print_styles('wp-pointer');
    wp_print_styles('dashicons');
    ?> 
        <link rel="stylesheet" href="<?php echo WD_BWG_URL . '/css/bwg_shortcode.css?ver='.wd_bwg_version(); ?>">
        <link rel="stylesheet" href="<?php echo WD_BWG_URL . '/css/jquery-ui-1.10.3.custom.css'; ?>">
        <script language="javascript" type="text/javascript" src="<?php echo WD_BWG_URL . '/js/bwg_shortcode.js?ver='.wd_bwg_version(); ?>"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WD_BWG_URL . '/js/jscolor/jscolor.js?ver='.wd_bwg_version(); ?>"></script>
        <?php
        if (!$from_menu) {
        ?>
        <base target="_self">
      </head>
      <body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" dir="ltr" class="forceColors">
        <?php if (isset($_POST['tagtext'])) { echo '<script>tinyMCEPopup.close();</script></body></html>'; die(); } ?>
        <form method="post" action="#" id="bwg_shortcode_form">
          <?php wp_nonce_field( 'BWGShortcode', 'bwg_nonce' ); ?>
          <div class="tabs" role="tablist" tabindex="-1">
            <ul>
              <li id="display_tab" class="current" role="tab" tabindex="0">
                <span>
                  <a href="javascript:mcTabs.displayTab('display_tab','display_panel');" onMouseDown="return false;" tabindex="-1"><?php _e("Display", 'bwg_back'); ?></a>
                </span>
              </li>
            </ul>
          </div>
          <div class="panel_wrapper">
            <div id="display_panel" class="panel current">
        <?php
        }
        else {
        ?>
        <form method="post" action="#" id="bwg_shortcode_form">
          <?php wp_nonce_field( 'BWGShortcode', 'bwg_nonce' ); ?>
          <div id="display_panel" style="width: 99%; margin-top: 30px;">
        <?php
        }
        ?>
              <div style="text-align:center; height:100px;">
                <span class="gallery_type" onClick="bwg_gallery_type('thumbnails')">
                  <div style="text-align: center;"><input type="radio" id="thumbnails" name="gallery_type" value="thumbnails"/><label for="thumbnails"><?php _e("Thumbnails", 'bwg_back'); ?></label></div>
                  <label for="thumbnails"><img id="display_thumb" src="<?php echo WD_BWG_URL . '/images/thumbnails.jpg'; ?>" /></label>
                </span>
                <span title="<?php _e("This view is disabled in free version.", 'bwg_back'); ?>" class="gallery_type">
                  <div style="text-align: center;"><input disabled="disabled" type="radio" id="thumbnails_masonry" name="gallery_type" value="thumbnails_masonry" /><label class="spider_free_version_label" for="thumbnails_masonry"><?php _e("Masonry", 'bwg_back'); ?></label></div>
                  <label><img style="opacity:0.5; filter: Alpha(opacity=50);" disabled="disabled" src="<?php echo WD_BWG_URL . '/images/thumbnails_masonry.jpg'; ?>" /></label>
                </span>
		<span title="<?php _e("This view is disabled in free version.", 'bwg_back'); ?>" class="gallery_type">
                  <div style="text-align: center;"><input disabled="disabled" type="radio" id="thumbnails_mosaic" name="gallery_type" value="thumbnails_mosaic" /><label class="spider_free_version_label" for="thumbnails_mosaic"><?php _e("Mosaic", 'bwg_back'); ?></label></div>
                  <label for="thumbnails_mosaic"><img style="opacity:0.5; filter: Alpha(opacity=50);" disabled="disabled" src="<?php echo WD_BWG_URL . '/images/thumbnails_mosaic.jpg'; ?>" /></label>
                </span>
                <span class="gallery_type" onClick="bwg_gallery_type('slideshow')">
                  <div style="text-align: center;"><input type="radio" id="slideshow" name="gallery_type" value="slideshow" /><label for="slideshow"><?php _e("Slideshow", 'bwg_back'); ?></label></div>
                  <label for="slideshow"><img src="<?php echo WD_BWG_URL . '/images/slideshow.jpg'; ?>" /></label>
                </span>
                <span class="gallery_type" onClick="bwg_gallery_type('image_browser')">
                  <div style="text-align: center;"><input type="radio" id="image_browser" name="gallery_type" value="image_browser" /><label for="image_browser"><?php _e("Image Browser", 'bwg_back'); ?></label></div>
                  <label for="image_browser"><img src="<?php echo WD_BWG_URL . '/images/image_browser.jpg'; ?>" /></label>
                </span>
                <span class="gallery_type" onClick="bwg_gallery_type('album_compact_preview')">
                  <div style="text-align: center;"><input type="radio" id="album_compact_preview" name="gallery_type" value="album_compact_preview" /><label for="album_compact_preview"><?php _e("Compact Album", 'bwg_back'); ?></label></div>
                  <label for="album_compact_preview"><img src="<?php echo WD_BWG_URL . '/images/album_compact_preview.jpg'; ?>" /></label>
                </span>
                <span title="<?php _e("This view is disabled in free version.", 'bwg_back'); ?>" class="gallery_type">
                  <div style="text-align: center;"><input disabled="disabled" type="radio" id="album_masonry_preview" name="gallery_type" value="album_masonry_preview" /><label class="spider_free_version_label" for="album_masonry_preview"><?php _e("Masonry Album", 'bwg_back'); ?></label></div>
                  <label for="album_masonry_preview"><img style="opacity:0.5; filter: Alpha(opacity=50);" disabled="disabled" src="<?php echo WD_BWG_URL . '/images/thumbnails_masonry.jpg'; ?>" /></label>
                </span>
                <span class="gallery_type" onClick="bwg_gallery_type('album_extended_preview')">
                  <div style="text-align: center;"><input type="radio" id="album_extended_preview" name="gallery_type" value="album_extended_preview" /><label for="album_extended_preview"><?php _e("Extended Album", 'bwg_back'); ?></label></div>
                  <label for="album_extended_preview"><img src="<?php echo WD_BWG_URL . '/images/album_extended_preview.jpg'; ?>" /></label>
                </span>
                <span title="<?php _e('This view is disabled in free version.', 'bwg_back'); ?>" class="gallery_type">
                  <div style="text-align: center;"><input disabled="disabled" type="radio" id="blog_style" name="gallery_type" value="blog_style" /><label class="spider_free_version_label" for="blog_style"><?php _e("Blog Style", 'bwg_back'); ?></label></div>
                  <label><img style="opacity:0.5; filter: Alpha(opacity=50);" disabled="disabled" src="<?php echo WD_BWG_URL . '/images/blog_style.jpg'; ?>" /></label>
                </span>			
		  <span title="<?php _e('This view is disabled in free version.', 'bwg_back'); ?>" class="gallery_type">
                  <div style="text-align: center;"><input disabled="disabled" type="radio" id="carousel" name="gallery_type" value="carousel" /><label class="spider_free_version_label" for="carousel"><?php _e("Carousel", 'bwg_back'); ?></label></div>
                  <label for="carousel"><img style="opacity:0.5; filter: Alpha(opacity=50);" disabled="disabled" src="<?php echo WD_BWG_URL . '/images/Carousel.png'; ?>" /></label>
                </span>
              </div>
              <hr />
              <div class="bwg_short_div" style="border-right: 1px solid #000000;">
              <table>
                <tbody>
                  <tr id="tr_theme">
                    <td <?php echo (get_option("wd_bwg_theme_version") ? 'title="This option is disabled in free version." class="spider_label spider_free_version_label"' : 'class="spider_label"'); ?>><label for="theme"><?php _e("Theme:", 'bwg_back'); ?> </label></td>
                    <td>
                      <select name="theme" id="theme" style="width:150px;" <?php echo (get_option("wd_bwg_theme_version") ? 'disabled="disabled"' : ''); ?>>
                        <option value="0" selected="selected"><?php _e("Select Theme", 'bwg_back'); ?></option>
                        <?php
                        foreach ($theme_rows as $theme_row) {
                          ?>
                          <option <?php echo ($theme_row->default_theme) ? 'selected="selected"' : ''; ?> value="<?php echo $theme_row->id; ?>"><?php echo $theme_row->name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr id="tr_gallery">
                    <td class="spider_label"><label for="gallery"><?php _e("Gallery:", 'bwg_back'); ?> </label></td>
                    <td>
                      <select name="gallery" id="gallery" style="width:150px;">
                        <option value="0" selected="selected"><?php _e("Select Gallery", 'bwg_back'); ?></option>
                        <?php
                        foreach ($gallery_rows as $gallery_row) {
                          ?>
                          <option value="<?php echo $gallery_row->id; ?>"><?php echo $gallery_row->name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr id="tr_album">
                    <td title="<?php _e('The selected album expanded content will be displayed.', 'bwg_back'); ?>" class="spider_label"><label for="album"><?php _e("Album:", 'bwg_back'); ?> </label></td>
                    <td>
                      <select name="album" id="album" style="width:150px;">
                        <option value="0" selected="selected"><?php _e("Select Album", 'bwg_back'); ?></option>
                        <?php
                        foreach ($album_rows as $album_row) {
                          ?>
                          <option value="<?php echo $album_row->id; ?>"><?php echo $album_row->name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr id="tr_sort_by">
                    <td class="spider_label"><label for="sort_by"><?php _e("Sort images by:", 'bwg_back'); ?> </label></td>
                    <td>
                      <select name="sort_by" id="sort_by" style="width:150px;">
                        <option value="order" selected="selected"><?php _e("Order", 'bwg_back'); ?></option>
                        <option value="alt"><?php _e("Title", 'bwg_back'); ?></option>
                        <option value="date"><?php _e("Date", 'bwg_back'); ?></option>
                        <option value="filename"><?php _e("Filename", 'bwg_back'); ?></option>
                        <option value="size"><?php _e("Size", 'bwg_back'); ?></option>
                        <option value="filetype"><?php _e("Type", 'bwg_back'); ?></option>
                        <option value="resolution"><?php _e("Resolution", 'bwg_back'); ?></option>
                        <option value="random"><?php _e("Random", 'bwg_back'); ?></option>
                      </select>
                    </td>
                  </tr>
                  <tr id="tr_order_by">
                    <td class="spider_label"><label><?php _e("Order images", 'bwg_back'); ?>: </label></td>
                    <td>
                      <input type="radio" name="order_by" id="order_by_1" value="asc" checked="checked" /><label for="order_by_1"><?php _e("Ascending", 'bwg_back'); ?></label>
                      <input type="radio" name="order_by" id="order_by_0" value="desc" /><label for="order_by_0"><?php _e("Descending", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_show_search_box">
                    <td class="spider_label"><label><?php _e("Show search box:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="show_search_box" id="show_search_box_1" value="1" <?php if ($option_row->show_search_box) echo 'checked="checked"'; ?> onchange="bwg_show_search_box()" /><label for="show_search_box_1"><?php _e("Yes", 'bwg_back'); ?></label>
                      <input type="radio" name="show_search_box" id="show_search_box_0" value="0" <?php if (!$option_row->show_search_box) echo 'checked="checked"'; ?> onchange="bwg_show_search_box()" /><label for="show_search_box_0"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_search_box_width">
                    <td class="spider_label"><label for="search_box_width"><?php _e("Search box width:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="search_box_width" id="search_box_width" value="<?php echo $option_row->search_box_width; ?>" class="spider_int_input" /> px</td>
                  </tr>
                  <tr id="tr_show_tag_box">
                    <td class="spider_label"><label><?php _e("Show tag box:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="show_tag_box" id="show_tag_box_1" value="1" <?php if ($option_row->show_tag_box) echo 'checked="checked"'; ?> /><label for="show_tag_box_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="show_tag_box" id="show_tag_box_0" value="0" <?php if (!$option_row->show_tag_box) echo 'checked="checked"'; ?> /><label for="show_search_box_0"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
									<tr id="tr_show_sort_images">
                    <td class="spider_label"><label><?php _e("Show 'Order by' dropdown list:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="show_sort_images" id="show_sort_images_1" value="1" <?php if ($option_row->show_sort_images) echo 'checked="checked"'; ?> onchange="" /><label for="show_sort_images_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="show_sort_images" id="show_sort_images_0" value="0" <?php if (!$option_row->show_sort_images) echo 'checked="checked"'; ?> onchange="" /><label for="show_sort_images_0"><?php _e('No', 'bwg_back'); ?>;</label>
                    </td>
                  </tr>
                  <!--Thumbnails, Masonry viewies-->
                  <tr id="tr_masonry_hor_ver">
                    <td class="spider_label"><label><?php _e("Masonry:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="masonry_hor_ver" id="masonry_ver" value="vertical" onclick="bwg_change_label('image_column_number_label', 'Number of image rows: ');
                                                                                                            bwg_change_label('thumb_width_height_label', 'Image thumbnail width: ');
                                                                                                            jQuery('#thumb_width').show();
                                                                                                            jQuery('#thumb_height').hide();
                                                                                                            jQuery('#thumb_width_height_separator').hide();" <?php echo ($option_row->masonry == 'vertical') ? 'checked' : ''; ?> /><label for="masonry_ver"><?php _e("Vertical", 'bwg_back'); ?></label>
                      <input type="radio" name="masonry_hor_ver" id="masonry_hor" value="horizontal" onclick="bwg_change_label('image_column_number_label', '<?php _e("Max. number of image columns: ", 'bwg_back'); ?>');
                                                                                                              bwg_change_label('thumb_width_height_label', 'Image Thumbnail Height: ');
                                                                                                              jQuery('#thumb_width').hide();
                                                                                                              jQuery('#thumb_height').show();
                                                                                                              jQuery('#thumb_width_height_separator').hide();" <?php echo ($option_row->masonry == 'horizontal') ? 'checked' : ''; ?> /><label for="masonry_hor"><?php _e("Horizontal", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <!--Thumbnails, Mosaic viewies-->
                  <tr id="tr_mosaic_hor_ver">
                    <td class="spider_label"><label><?php _e("Mosaic:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="mosaic_hor_ver" id="mosaic_ver" value="vertical" onclick="bwg_change_label('image_column_number_label', '<?php _e("Number of image rows: ", 'bwg_back'); ?>');
                                                                                                            bwg_change_label('thumb_width_height_label', '<?php _e("Image thumbnail width: ", 'bwg_back'); ?>');
                                                                                                            jQuery('#thumb_width').show();
                                                                                                            jQuery('#thumb_height').hide();
                                                                                                            jQuery('#thumb_width_height_separator').hide();" <?php echo ($option_row->mosaic == 'vertical') ? 'checked' : ''; ?> /><label for="mosaic_ver"><?php _e("Vertical", 'bwg_back'); ?></label>
                      <input type="radio" name="mosaic_hor_ver" id="mosaic_hor" value="horizontal" onclick="bwg_change_label('image_column_number_label', '<?php _e("Max. number of image columns:", 'bwg_back'); ?> ');
                                                                                                              bwg_change_label('thumb_width_height_label', '<?php _e("Image Thumbnail Height:", 'bwg_back'); ?> ');
                                                                                                              jQuery('#thumb_width').hide();
                                                                                                              jQuery('#thumb_height').show();
                                                                                                              jQuery('#thumb_width_height_separator').hide();" <?php echo ($option_row->mosaic == 'horizontal') ? 'checked' : ''; ?> /><label for="mosaic_hor"><?php _e("Horizontal", 'bwg_back'); ?></label>
                    
                  
                    </td>
                  </tr>
                  <tr id="tr_resizable_mosaic">
                    <td title="<?php _e('Mosaic thumbnails do not have fixed size, but are proportional to the width of the parent container. This option keeps thumbs to look nice when viewed with very large or very small screen. Prevents zooming of thumbs.', 'bwg_back'); ?>" class="spider_label"><label for="resizable_mosaic"><?php _e("Resizable mosaic", 'bwg_back'); ?></label></td>
                    <td>
                      <input type="radio" name="resizable_mosaic" id="resizable_mosaic_1" value="1" <?php echo ($option_row->resizable_mosaic == 1) ? 'checked' : ''; ?> /><label for="resizable_mosaic_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="resizable_mosaic" id="resizable_mosaic_0" value="0" <?php echo ($option_row->resizable_mosaic == 0) ? 'checked' : ''; ?> /><label for="resizable_mosaic_0"><?php _e('No', 'bwg_back'); ?></label>
                      <br />
                    </td>
                  </tr>
                  <tr id="tr_mosaic_total_width">
                    <td title="<?php _e("Percentage of container's width", 'bwg_back'); ?>" class="spider_label"><label for="mosaic_total_width"><?php _e("Total width of mosaic:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="mosaic_total_width" id="mosaic_total_width" value="<?php echo $option_row->mosaic_total_width; ?>" class="spider_int_input" /> %</td>
                  </tr>
                 <!--Thumbnails, Masonry and Mosaic viewies-->
                  <tr id="tr_image_column_number">
                    <td class="spider_label"><label id="image_column_number_label" for="image_column_number"><?php _e("Max. number of image columns:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="image_column_number" id="image_column_number" value="<?php echo $option_row->image_column_number; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_images_per_page">
                    <td title="<?php _e('If you want to display all images you should leave it blank or insert 0.', 'bwg_back'); ?>" class="spider_label"><label for="images_per_page"><?php _e("Images per page:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="images_per_page" id="images_per_page" value="<?php echo $option_row->images_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_image_title_hover">
                    <td class="spider_label"><label><?php _e("Image title:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="image_title" id="image_title_hover" value="hover" <?php echo ($option_row->image_title_show_hover == 'hover') ? 'checked' : ''; ?> /><label for="image_title_hover"><?php _e("Show on hover", 'bwg_back'); ?></label><br />
                      <input type="radio" name="image_title" id="image_title_show" value="show" <?php echo ($option_row->image_title_show_hover == 'show') ? 'checked' : ''; ?> /><label for="image_title_show"><?php _e("Always show", 'bwg_back'); ?></label><br />
                      <input type="radio" name="image_title" id="image_title_none" value="none" <?php echo ($option_row->image_title_show_hover == 'none') ? 'checked' : ''; ?> /><label for="image_title_none"><?php _e("Don't show", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_image_enable_page">
                    <td class="spider_label"><label><?php _e("Enable pagination:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="image_enable_page" class="hide_load_count" id="image_page_yes" value="1" <?php echo ($option_row->image_enable_page == '1') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="image_page_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="image_enable_page" class="hide_load_count" id="image_page_no" value="0" <?php echo ($option_row->image_enable_page == '0') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="image_page_no"><?php _e('No', 'bwg_back'); ?></label>
                      <input type="radio" name="image_enable_page" id="image_page_loadmore" value="2" <?php echo ($option_row->image_enable_page == '2') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="image_page_loadmore"><?php _e("Load More", 'bwg_back'); ?></label>
                      <input type="radio" name="image_enable_page" id="image_page_scrol_load" value="3" <?php echo ($option_row->image_enable_page == '3') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="image_page_scrol_load"><?php _e("Scroll Load", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_load_more_image_count">
                    <td class="spider_label"><label for="load_more_image_count"><?php _e("Images per load:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="load_more_image_count" id="load_more_image_count" value="<?php echo $option_row->images_per_page; ?>" class="spider_int_input" /></td>
                  </tr> 
                  <tr id="tr_thumb_width_height">
                    <td title="<?php _e('Maximum values for thumbnail dimension.', 'bwg_back'); ?>" class="spider_label"><label id="thumb_width_height_label" for="thumb_width"><?php _e("Image Thumbnail dimensions:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="thumb_width" id="thumb_width" value="<?php echo $option_row->thumb_width; ?>" class="spider_int_input" /><span id="thumb_width_height_separator"> x </span>
                      <input type="text" name="thumb_height" id="thumb_height" value="<?php echo $option_row->thumb_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>

                  <!--Compact Album view-->
                  <tr id="tr_compuct_album_column_number">
                    <td class="spider_label"><label for="compuct_album_column_number"><?php _e("Max. number of album columns:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="compuct_album_column_number" id="compuct_album_column_number" value="<?php echo $option_row->album_column_number; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_compuct_albums_per_page">
                    <td title="<?php _e("If you want to display all albums you should leave it blank or insert 0.", 'bwg_back'); ?>" class="spider_label"><label for="compuct_albums_per_page"><?php _e("Albums per page:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="compuct_albums_per_page" id="compuct_albums_per_page" value="<?php echo $option_row->albums_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_compuct_album_title_hover">
                    <td class="spider_label"><label><?php _e("Album title:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="compuct_album_title" id="compuct_album_title_hover" value="hover" <?php echo ($option_row->album_title_show_hover == 'hover') ? 'checked' : ''; ?> /><label for="compuct_album_title_hover"><?php _e("Show on hover", 'bwg_back'); ?></label><br />
                      <input type="radio" name="compuct_album_title" id="compuct_album_title_show" value="show" <?php echo ($option_row->album_title_show_hover == 'show') ? 'checked' : ''; ?> /><label for="compuct_album_title_show"><?php _e("Always show", 'bwg_back'); ?></label><br />
                      <input type="radio" name="compuct_album_title" id="compuct_album_title_none" value="none" <?php echo ($option_row->album_title_show_hover == 'none') ? 'checked' : ''; ?> /><label for="compuct_album_title_none"><?php _e("Don't show", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_compuct_album_thumb_width_height">
                    <td title="<?php _e("Maximum values for album thumb width and height.", 'bwg_back'); ?>" class="spider_label"><label for="compuct_album_thumb_width"><?php _e("Album Thumbnail dimensions:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="compuct_album_thumb_width" id="compuct_album_thumb_width" value="<?php echo $option_row->album_thumb_width; ?>" class="spider_int_input" /> x 
                      <input type="text" name="compuct_album_thumb_height" id="compuct_album_thumb_height" value="<?php echo $option_row->album_thumb_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_compuct_album_view_type">
                    <td title="<?php _e('The gallery images view type in the album.<br /><br />This option is disabled in free version.', 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Album view type:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="compuct_album_view_type" id="compuct_album_view_type_1" value="thumbnail" <?php if ($option_row->album_view_type == "thumbnail") echo 'checked="checked"'; ?> onchange="bwg_change_compuct_album_view_type()" /><label for="compuct_album_view_type_1"><?php _e("Thumbnail", 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="compuct_album_view_type" id="compuct_album_view_type_0" value="masonry" <?php if ($option_row->album_view_type == "masonry") echo 'checked="checked"'; ?> onchange="bwg_change_compuct_album_view_type()" /><label for="compuct_album_view_type_0"><?php _e("Masonry", 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="compuct_album_view_type" id="compuct_album_view_type_2" value="mosaic" <?php if ($option_row->album_view_type == "mosaic") echo 'checked="checked"'; ?> onchange="bwg_change_compuct_album_view_type()" /><label for="compuct_album_view_type_2"><?php _e("Mosaic", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_compuct_album_mosaic_hor_ver">
                    <td title="<?php _e('This option is disabled in free version.', 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Mosaic:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="compuct_album_mosaic_hor_ver" id="compuct_album_mosaic_ver" value="vertical" onclick="bwg_change_label('compuct_album_image_column_number', '<?php _e("Number of image rows:", 'bwg_back'); ?> ');
                                                                                                            bwg_change_label('compuct_album_image_thumb_dimensions', '<?php _e("Image thumbnail width:", 'bwg_back'); ?> ');
                                                                                                            jQuery('#compuct_album_image_thumb_width').show();
                                                                                                            jQuery('#compuct_album_image_thumb_height').hide();
                                                                                                            jQuery('#compuct_album_image_thumb_dimensions_x').hide();" <?php echo ($option_row->mosaic == 'vertical') ? 'checked' : ''; ?> /><label for="compuct_album_mosaic_ver"><?php _e("Vertical", 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="compuct_album_mosaic_hor_ver" id="compuct_album_mosaic_hor" value="horizontal" onclick="bwg_change_label('compuct_album_image_column_number', '<?php _e("Max. number of image columns:", 'bwg_back'); ?> ');
                                                                                                              bwg_change_label('compuct_album_image_thumb_dimensions', '<?php _e("Image thumbnail height:", 'bwg_back'); ?> ');
                                                                                                              jQuery('#compuct_album_image_thumb_width').hide();
                                                                                                              jQuery('#compuct_album_image_thumb_height').show();
                                                                                                              jQuery('#compuct_album_image_thumb_dimensions_x').hide();" <?php echo ($option_row->mosaic == 'horizontal') ? 'checked' : ''; ?> /><label for="compuct_album_mosaic_hor"><?php _e("Horizontal", 'bwg_back'); ?></label>
                    
                  
                    </td>
                  </tr>
                  <tr id="tr_compuct_album_resizable_mosaic">
                    <td title="<?php _e("Mosaic thumbnails do not have fixed size, but are proportional to the width of the parent container. This option keeps thumbs to look nice when viewed with very large or very small screen. Prevents zooming of thumbs.<br /><br />This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label for="compuct_album_resizable_mosaic"><?php _e("Resizable mosaic", 'bwg_back'); ?></label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="compuct_album_resizable_mosaic" id="compuct_album_resizable_mosaic_1" value="1" <?php echo ($option_row->resizable_mosaic == 1) ? 'checked' : ''; ?> /><label for="compuct_album_resizable_mosaic_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="compuct_album_resizable_mosaic" id="compuct_album_resizable_mosaic_0" value="0" <?php echo ($option_row->resizable_mosaic == 0) ? 'checked' : ''; ?> /><label for="compuct_album_resizable_mosaic_0"><?php _e('No', 'bwg_back'); ?></label>
                      <br />
                    </td>
                  </tr>
                  <tr id="tr_compuct_album_mosaic_total_width">
                    <td title="<?php _e("Percentage of container's width", 'bwg_back'); ?>" class="spider_label"><label for="compuct_album_mosaic_total_width"><?php _e("Total width of mosaic:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="compuct_album_mosaic_total_width" id="compuct_album_mosaic_total_width" value="<?php echo $option_row->mosaic_total_width; ?>" class="spider_int_input" /> <?php _e("percent", 'bwg_back'); ?></td>
                  </tr>
                  <tr id="tr_compuct_album_image_column_number">
                    <td class="spider_label"><label for="compuct_album_image_column_number"><?php _e("Max. number of image columns: ", 'bwg_back'); ?></label></td>
                    <td><input type="text" name="compuct_album_image_column_number" id="compuct_album_image_column_number" value="<?php echo $option_row->image_column_number; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_compuct_album_images_per_page">
                    <td title="<?php _e("If you want to display all images you should leave it blank or insert 0.", 'bwg_back'); ?>" class="spider_label"><label for="compuct_album_images_per_page"><?php _e("Images per page:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="compuct_album_images_per_page" id="compuct_album_images_per_page" value="<?php echo $option_row->images_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_compuct_album_image_title">
                    <td class="spider_label"><label><?php _e("Image title:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="compuct_album_image_title" id="compuct_album_image_title_hover" value="hover" <?php echo ($option_row->image_title_show_hover == 'hover') ? 'checked' : ''; ?> /><label for="compuct_album_image_title_hover"><?php _e("Show on hover", 'bwg_back'); ?></label><br />
                      <input type="radio" name="compuct_album_image_title" id="compuct_album_image_title_show" value="show" <?php echo ($option_row->image_title_show_hover == 'show') ? 'checked' : ''; ?> /><label for="compuct_album_image_title_show"><?php _e("Always show", 'bwg_back'); ?></label><br />
                      <input type="radio" name="compuct_album_image_title" id="compuct_album_image_title_none" value="none" <?php echo ($option_row->image_title_show_hover == 'none') ? 'checked' : ''; ?> /><label for="compuct_album_image_title_none"><?php _e("Don't show", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_compuct_album_image_thumb_width_height">
                    <td title="<?php _e("Maximum values for thumbnail width and height.", 'bwg_back'); ?>" class="spider_label"><label for="compuct_album_image_thumb_width" id="compuct_album_image_thumb_dimensions"><?php _e("Image thumbnail dimensions: ", 'bwg_back'); ?></label></td>
                    <td>
                      <input type="text" name="compuct_album_image_thumb_width" id="compuct_album_image_thumb_width" value="<?php echo $option_row->thumb_width; ?>" class="spider_int_input" /><span id="compuct_album_image_thumb_dimensions_x" > x </span>
                      <input type="text" name="compuct_album_image_thumb_height" id="compuct_album_image_thumb_height" value="<?php echo $option_row->thumb_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_compuct_album_enable_page">
                    <td class="spider_label"><label><?php _e("Enable pagination:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="compuct_album_enable_page" class="hide_load_count" id="compuct_album_page_yes" value="1" <?php echo ($option_row->album_enable_page == '1') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="compuct_album_page_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="compuct_album_enable_page"  class="hide_load_count"  id="compuct_album_page_no" value="0" <?php echo ($option_row->album_enable_page == '0') ? 'checked' : ''; ?> onchange="bwg_loadmore()" /><label for="compuct_album_page_no"><?php _e('No', 'bwg_back'); ?></label>  
                      <input type="radio" name="compuct_album_enable_page" id="compuct_album_page_loadmore" value="2" <?php echo ($option_row->album_enable_page == '2') ? 'checked' : ''; ?> onchange="bwg_loadmore()" /><label for="compuct_album_page_loadmore"><?php _e("Load More", 'bwg_back'); ?></label>
                       <input type="radio" name="compuct_album_enable_page" id="compuct_album_page_scrol_load" value="3" <?php echo ($option_row->album_enable_page == '3') ? 'checked' : ''; ?> onchange="bwg_loadmore()" /><label for="compuct_album_page_scrol_load"><?php _e("Scroll Load", 'bwg_back'); ?></label>
                    </td>
		  </tr>
                   <tr id="tr_compuct_albums_per_page_load_more">
                    <td title="<?php _e("If you want to display all albums you should leave it blank or insert 0.", 'bwg_back'); ?>" class="spider_label"><label for="compuct_albums_per_page_load_more"><?php _e("Albums per load:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="compuct_albums_per_page_load_more" id="compuct_albums_per_page_load_more" value="<?php echo $option_row->albums_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                   <tr id="tr_compuct_album_load_more_image_count">
                    <td class="spider_label"><label for="compuct_album_load_more_image_count"><?php _e("Images per load:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="compuct_album_load_more_image_count" id="compuct_album_load_more_image_count" value="<?php echo $option_row->images_per_page; ?>" class="spider_int_input" /></td>
                  </tr>

                  <!--Extended Album view-->
                  <tr id="tr_extended_albums_per_page">
                    <td title="<?php _e("If you want to display all albums you should leave it blank or insert 0.", 'bwg_back'); ?>" class="spider_label"><label for="extended_albums_per_page"><?php _e("Albums per page:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="extended_albums_per_page" id="extended_albums_per_page" value="<?php echo $option_row->albums_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_extended_album_height">
                    <td class="spider_label"><label for="extended_album_height"><?php _e("Album row height:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="extended_album_height" id="extended_album_height" value="<?php echo $option_row->extended_album_height; ?>" class="spider_int_input" /> px</td>
                  </tr>
                  <tr id="tr_extended_album_description_enable">
                    <td title="<?php _e("If you disable description only the title of the album will be displayed.", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Enable album description:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="extended_album_description_enable" id="extended_album_description_yes" value="1" <?php echo ($option_row->extended_album_description_enable) ? 'checked' : ''; ?> /><label for="extended_album_description_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="extended_album_description_enable" id="extended_album_description_no" value="0" <?php echo ($option_row->extended_album_description_enable) ? '' : 'checked'; ?> /><label for="extended_album_description_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_extended_album_thumb_width_height">
                    <td title="<?php _e("Maximum values for album thumb width and height.", 'bwg_back'); ?>" class="spider_label"><label for="extended_album_thumb_width"><?php _e("Album thumbnail dimensions:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="extended_album_thumb_width" id="extended_album_thumb_width" value="<?php echo $option_row->album_thumb_width; ?>" class="spider_int_input" /> x 
                      <input type="text" name="extended_album_thumb_height" id="extended_album_thumb_height" value="<?php echo $option_row->album_thumb_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_extended_album_view_type">
                    <td title="<?php _e("The gallery images view type in the album.", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Album view type:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="extended_album_view_type" id="extended_album_view_type_1" value="thumbnail" <?php if ($option_row->album_view_type == "thumbnail") echo 'checked="checked"'; ?> onchange="bwg_change_extended_album_view_type()" /><label for="extended_album_view_type_1"><?php _e("Thumbnail", 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="extended_album_view_type" id="extended_album_view_type_0" value="masonry" <?php if ($option_row->album_view_type == "masonry") echo 'checked="checked"'; ?> onchange="bwg_change_extended_album_view_type()" /><label for="extended_album_view_type_0"><?php _e("Masonry", 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="extended_album_view_type" id="extended_album_view_type_2" value="mosaic" <?php if ($option_row->album_view_type == "mosaic") echo 'checked="checked"'; ?> onchange="bwg_change_extended_album_view_type()" /><label for="extended_album_view_type_2"><?php _e("Mosaic", 'bwg_back'); ?></label>
                    </td>
                  </tr>				  
                  <tr id="tr_extended_album_mosaic_hor_ver">
                    <td title="<?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Mosaic:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="extended_album_mosaic_hor_ver" id="extended_album_mosaic_ver" value="vertical" onclick="bwg_change_label('extended_album_image_column_number', 'Number of image rows: ');
                                                                                                            bwg_change_label('extended_album_image_thumb_dimensions', '<?php _e("Image thumbnail width: ", 'bwg_back'); ?>');
                                                                                                            jQuery('#extended_album_image_thumb_width').show();
                                                                                                            jQuery('#extended_album_image_thumb_height').hide();
                                                                                                            jQuery('#extended_album_image_thumb_dimensions_x').hide();" <?php echo ($option_row->mosaic == 'vertical') ? 'checked' : ''; ?> /><label for="extended_album_mosaic_ver"><?php _e("Vertical", 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="extended_album_mosaic_hor_ver" id="extended_album_mosaic_hor" value="horizontal" onclick="bwg_change_label('extended_album_image_column_number', '<?php _e("Max. number of image columns:", 'bwg_back'); ?> ');
                                                                                                              bwg_change_label('extended_album_image_thumb_dimensions', '<?php _e("Image thumbnail height: ", 'bwg_back'); ?>');
                                                                                                              jQuery('#extended_album_image_thumb_width').hide();
                                                                                                              jQuery('#extended_album_image_thumb_height').show();
                                                                                                              jQuery('#extended_album_image_thumb_dimensions_x').hide();" <?php echo ($option_row->mosaic == 'horizontal') ? 'checked' : ''; ?> /><label for="extended_album_mosaic_hor"><?php _e("Horizontal", 'bwg_back'); ?></label>
                    
                  
                    </td>
                  </tr>
                  <tr id="tr_extended_album_resizable_mosaic">
                    <td title="<?php _e("Mosaic thumbnails do not have fixed size, but are proportional to the width of the parent container. This option keeps thumbs to look nice when viewed with very large or very small screen. Prevents zooming of thumbs.<br /><br />This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label for="extended_album_resizable_mosaic"><?php _e("Resizable mosaic:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="extended_album_resizable_mosaic" id="extended_album_resizable_mosaic_1" value="1" <?php echo ($option_row->resizable_mosaic == 1) ? 'checked' : ''; ?> /><label for="extended_album_resizable_mosaic_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="extended_album_resizable_mosaic" id="extended_album_resizable_mosaic_0" value="0" <?php echo ($option_row->resizable_mosaic == 0) ? 'checked' : ''; ?> /><label for="extended_album_resizable_mosaic_0"><?php _e('No', 'bwg_back'); ?></label>
                      <br />
                    </td>
                  </tr>
                  
                  <tr id="tr_extended_album_mosaic_total_width">
                    <td title="<?php _e("Percentage of container's width", 'bwg_back'); ?>" class="spider_label"><label for="extended_album_mosaic_total_width"><?php _e("Total width of mosaic:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="extended_album_mosaic_total_width" id="extended_album_mosaic_total_width" value="<?php echo $option_row->mosaic_total_width; ?>" class="spider_int_input" /> <?php _e("percent", 'bwg_back'); ?></td>
                  </tr>
                  <tr id="tr_extended_album_image_column_number">
                    <td class="spider_label"><label for="extended_album_image_column_number"><?php _e("Max. number of image columns:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="extended_album_image_column_number" id="extended_album_image_column_number" value="<?php echo $option_row->image_column_number; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_extended_album_images_per_page">
                    <td title="<?php _e("If you want to display all images you should leave it blank or insert 0.", 'bwg_back'); ?>" class="spider_label"><label for="extended_album_images_per_page"><?php _e("Images per page:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="extended_album_images_per_page" id="extended_album_images_per_page" value="<?php echo $option_row->images_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_extended_album_image_title">
                    <td class="spider_label"><label><?php _e("Image title:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="extended_album_image_title" id="extended_album_image_title_hover" value="hover" <?php echo ($option_row->image_title_show_hover == 'hover') ? 'checked' : ''; ?> /><label for="extended_album_image_title_hover"><?php _e("Show on hover", 'bwg_back'); ?></label><br />
                      <input type="radio" name="extended_album_image_title" id="extended_album_image_title_show" value="show" <?php echo ($option_row->image_title_show_hover == 'show') ? 'checked' : ''; ?> /><label for="extended_album_image_title_show"><?php _e("Always show", 'bwg_back'); ?></label><br />
                      <input type="radio" name="extended_album_image_title" id="extended_album_image_title_none" value="none" <?php echo ($option_row->image_title_show_hover == 'none') ? 'checked' : ''; ?> /><label for="extended_album_image_title_none"><?php _e("Don't show", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_extended_album_image_thumb_width_height">
                    <td title="<?php _e("Maximum values for thumbnail width and height.", 'bwg_back'); ?>" class="spider_label"><label for="extended_album_image_thumb_width" id="extended_album_image_thumb_dimensions"><?php _e("Image Thumbnail dimensions:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="extended_album_image_thumb_width" id="extended_album_image_thumb_width" value="<?php echo $option_row->thumb_width; ?>" class="spider_int_input" /><span id="extended_album_image_thumb_dimensions_x" > x </span>
                      <input type="text" name="extended_album_image_thumb_height" id="extended_album_image_thumb_height" value="<?php echo $option_row->thumb_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_extended_album_enable_page">
                    <td class="spider_label"><label><?php _e("Enable pagination:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="extended_album_enable_page" id="extended_album_page_yes" value="1" <?php echo ($option_row->album_enable_page == '1') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="extended_album_page_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="extended_album_enable_page" id="extended_album_page_no" value="0" <?php echo ($option_row->album_enable_page == '0') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="extended_album_page_no"><?php _e('No', 'bwg_back'); ?></label>
                      <input type="radio" name="extended_album_enable_page" id="extended_album_page_loadmore" value="2" <?php echo ($option_row->album_enable_page == '2') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="extended_album_page_loadmore"><?php _e("Load More", 'bwg_back'); ?></label>
                      <input type="radio" name="extended_album_enable_page" id="extended_album_page_scrol_load" value="3" <?php  echo ($option_row->album_enable_page == '3') ? 'checked' : ''; ?> onchange="bwg_loadmore()"/><label for="extended_album_page_scrol_load"><?php _e("Scroll Load", 'bwg_back'); ?> </label>
                    </td>
                  </tr>
                   <tr id="tr_extended_albums_per_page_load_more">
                    <td title="<?php _e("If you want to display all albums you should leave it blank or insert 0.", 'bwg_back'); ?>" class="spider_label"><label for="extended_albums_per_page_load_more"><?php _e("Albums per load:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="extended_albums_per_page_load_more" id="extended_albums_per_page_load_more" value="<?php echo $option_row->albums_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                   <tr id="tr_extended_album_load_more_image_count">
                    <td class="spider_label"><label for="extended_album_load_more_image_count"><?php _e("Images per load:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="extended_album_load_more_image_count" id="extended_album_load_more_image_count" value="<?php echo $option_row->images_per_page; ?>" class="spider_int_input" /></td>
                  </tr>

                  <!--Image Browser view-->
                  <tr id="tr_image_browser_width_height">
                    <td title="<?php _e("Maximum value for image width.", 'bwg_back'); ?>" class="spider_label"><label for="image_browser_width"><?php _e("Image width: ", 'bwg_back'); ?></label></td>
                    <td>
                      <input type="text" name="image_browser_width" id="image_browser_width" value="<?php echo $option_row->image_browser_width; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_image_browser_title_enable">
                    <td class="spider_label"><label><?php _e("Enable image title:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="image_browser_title_enable" id="image_browser_title_yes" value="1" <?php echo ($option_row->image_browser_title_enable) ? 'checked' : ''; ?> /><label for="image_browser_title_es"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="image_browser_title_enable" id="image_browser_title_no" value="0" <?php echo ($option_row->image_browser_title_enable) ? '' : 'checked'; ?> /><label for="image_browser_title_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_image_browser_description_enable">
                    <td class="spider_label"><label><?php _e("Enable image description:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="image_browser_description_enable" id="image_browser_description_yes" value="1" <?php echo ($option_row->image_browser_description_enable) ? 'checked' : ''; ?> /><label for="image_browser_description_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="image_browser_description_enable" id="image_browser_description_no" value="0" <?php echo ($option_row->image_browser_description_enable) ? '' : 'checked'; ?> /><label for="image_browser_description_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>

                  <!--Blog Style view-->
                  <tr id="tr_blog_style_width_height">
                    <td title="<?php _e("Maximum value for image width.", 'bwg_back'); ?>" class="spider_label"><label for="blog_style_width"><?php _e("Image width:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="blog_style_width" id="blog_style_width" value="<?php echo $option_row->blog_style_width; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_blog_style_title_enable">
                    <td class="spider_label"><label><?php _e("Enable image title:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="blog_style_title_enable" id="blog_style_title_yes" value="1" <?php echo ($option_row->blog_style_title_enable) ? 'checked' : ''; ?> /><label for="blog_style_title_es"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="blog_style_title_enable" id="blog_style_title_no" value="0" <?php echo ($option_row->blog_style_title_enable) ? '' : 'checked'; ?> /><label for="blog_style_title_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_blog_style_images_per_page">
                    <td title="<?php _e("If you want to display all images you should leave it blank or insert 0.", 'bwg_back'); ?>" class="spider_label"><label for="blog_style_images_per_page"><?php _e("Images per page:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="blog_style_images_per_page" id="blog_style_images_per_page" value="<?php echo $option_row->blog_style_images_per_page; ?>" class="spider_int_input" /></td>
                  </tr>
                  <tr id="tr_blog_style_enable_page">
                    <td class="spider_label"><label><?php _e("Enable pagination:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="blog_style_enable_page" id="blog_style_page_yes" value="1" <?php echo ($option_row->blog_style_enable_page == '1') ? 'checked' : ''; ?> onchange="bwg_loadmore()" /><label for="blog_style_page_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="blog_style_enable_page" id="blog_style_page_no" value="0" <?php echo ($option_row->blog_style_enable_page == '0') ? 'checked' : ''; ?> onchange="bwg_loadmore()" /><label for="blog_style_page_no"><?php _e('No', 'bwg_back'); ?></label>
                      <input type="radio" name="blog_style_enable_page" id="blog_style_page_loadmore" value="2" <?php echo ($option_row->blog_style_enable_page == '2') ? 'checked' : ''; ?> onchange="bwg_loadmore()" /><label for="blog_style_page_loadmore">Load more</label>
                      <input type="radio" name="blog_style_enable_page" id="blog_style_page_scrol_load" value="3" <?php echo ($option_row->blog_style_enable_page == '3') ? 'checked' : ''; ?> onchange="bwg_loadmore()" /><label for="blog_style_page_scrol_load"><?php _e("Scroll Load", 'bwg_back'); ?> </label>
                    </td>
                  </tr>
                  <tr id="tr_blog_style_load_more_image_count">
                    <td class="spider_label"><label for="blog_style_load_more_image_count"><?php _e("Images per load:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="blog_style_load_more_image_count" id="blog_style_load_more_image_count" value="<?php echo $option_row->blog_style_images_per_page; ?>" class="spider_int_input" /></td>
                  </tr>

                  <!--Slideshow view-->
                  <tr id="tr_slideshow_effect">
                    <td class="spider_label"><label for="slideshow_effect"><?php _e("Slideshow Effect:", 'bwg_back'); ?> </label></td>
                    <td>
                      <select name="slideshow_effect" id="slideshow_effect" style="width:150px;">
                        <?php
                        foreach ($effects as $key => $effect) {
                          ?>
                          <option value="<?php echo $key; ?>" <?php echo ($key != 'none' && $key != 'fade') ? 'disabled="disabled" title="' . __("This effect is disabled in free version.","bwg_back") . '"' : ''; ?> <?php echo ($option_row->slideshow_type == $key) ? 'selected' : ''; ?>><?php echo __($effect,"bwg_back"); ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr id="tr_slideshow_effect_duration">
                    <td title="<?php echo __("Interval between two images.", 'bwg_back'); ?>" class="spider_label"><label for="slideshow_effect_duration"><?php echo __('Effect duration:', 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="slideshow_effect_duration" id="slideshow_effect_duration" value="<?php echo $option_row->slideshow_effect_duration; ?>" class="spider_int_input" /> sec.</td>
                  </tr>
                  <tr id="tr_slideshow_interval">
                    <td title="<?php _e("Interval between two images.", 'bwg_back'); ?>" class="spider_label"><label for="slideshow_interval"><?php _e("Time interval:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="slideshow_interval" id="slideshow_interval" value="<?php echo $option_row->slideshow_interval; ?>" class="spider_int_input" /> sec.</td>
                  </tr>
                  <tr id="tr_slideshow_width_height">
                    <td title="<?php _e("Maximum values for slideshow width and height.", 'bwg_back'); ?>" class="spider_label"><label for="slideshow_width"><?php _e("Slideshow dimensions:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="slideshow_width" id="slideshow_width" value="<?php echo $option_row->slideshow_width; ?>" class="spider_int_input" /> x 
                      <input type="text" name="slideshow_height" id="slideshow_height" value="<?php echo $option_row->slideshow_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_enable_slideshow_autoplay">
                    <td class="spider_label"><label><?php _e("Enable Autoplay:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="enable_slideshow_autoplay" id="slideshow_autoplay_yes" value="1" <?php echo ($option_row->slideshow_enable_autoplay) ? 'checked' : ''; ?> /><label for="slideshow_autoplay_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="enable_slideshow_autoplay" id="slideshow_autoplay_no" value="0" <?php echo ($option_row->slideshow_enable_autoplay) ? '' : 'checked'; ?> /><label for="slideshow_autoplay_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_enable_slideshow_shuffle">
                    <td class="spider_label"><label><?php _e("Enable Shuffle:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="enable_slideshow_shuffle" id="slideshow_shuffle_yes" value="1" <?php echo ($option_row->slideshow_enable_shuffle) ? 'checked' : ''; ?> /><label for="slideshow_shuffle_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="enable_slideshow_shuffle" id="slideshow_shuffle_no" value="0" <?php echo ($option_row->slideshow_enable_shuffle) ? '' : 'checked'; ?> /><label for="slideshow_shuffle_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_enable_slideshow_ctrl">
                    <td class="spider_label"><label><?php _e("Enable control buttons:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="enable_slideshow_ctrl" id="slideshow_ctrl_yes" value="1" <?php echo ($option_row->slideshow_enable_ctrl) ? 'checked' : ''; ?> /><label for="slideshow_ctrl_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="enable_slideshow_ctrl" id="slideshow_ctrl_no" value="0" <?php echo ($option_row->slideshow_enable_ctrl) ? '' : 'checked'; ?> /><label for="slideshow_ctrl_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_enable_slideshow_filmstrip">
                    <td title="<?php _e("Enable slideshow filmstrip view", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable slideshow filmstrip:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="enable_slideshow_filmstrip" id="slideshow_filmstrip_yes" value="1" onClick="bwg_enable_disable('', 'tr_slideshow_filmstrip_height', 'slideshow_filmstrip_yes')" <?php echo ($option_row->slideshow_enable_filmstrip) ? 'checked' : ''; ?> /><label for="slideshow_filmstrip_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="enable_slideshow_filmstrip" id="slideshow_filmstrip_no" value="0" onClick="bwg_enable_disable('none', 'tr_slideshow_filmstrip_height', 'slideshow_filmstrip_no')" <?php echo ($option_row->slideshow_enable_filmstrip) ? '' : 'checked'; ?> /><label for="slideshow_filmstrip_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_slideshow_filmstrip_height">
                    <td class="spider_label spider_free_version_label"><label for="slideshow_filmstrip_height"><?php _e("Slideshow Filmstrip size:", 'bwg_back'); ?> </label></td>
                    <td class="spider_free_version_label"><input disabled="disabled" type="text" name="slideshow_filmstrip_height" id="slideshow_filmstrip_height" value="<?php echo $option_row->slideshow_filmstrip_height; ?>" class="spider_int_input spider_free_version_label" /> px</td>
                  </tr>
                </tbody>
              </table>
              </div>
              <div class="bwg_short_div" style="border-right: 1px solid #000000;">
              <table>
                <!--Slideshow view-->
                <tbody id="tbody_slideshow">
                  <tr id="tr_slideshow_enable_title">
                    <td class="spider_label"><label><?php _e("Enable Image Title:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="slideshow_enable_title" id="slideshow_title_yes" value="1" <?php echo ($option_row->slideshow_enable_title) ? 'checked' : ''; ?> onClick="bwg_enable_disable('', 'tr_slideshow_title_position', 'slideshow_title_yes')" /><label for="slideshow_title_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="slideshow_enable_title" id="slideshow_title_no" value="0" <?php echo ($option_row->slideshow_enable_title) ? '' : 'checked'; ?> onClick="bwg_enable_disable('none', 'tr_slideshow_title_position', 'slideshow_title_no')" /><label for="slideshow_title_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_slideshow_title_position">
                    <td title="<?php _e("Image title position on slideshow", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Title Position:", 'bwg_back'); ?> </label></td>
                    <td>
                      <table class="bws_position_table">
                        <tbody>
                          <tr>
                            <td><input type="radio" value="top-left" id="slideshow_title_top-left" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'top-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="top-center" id="slideshow_title_top-center" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'top-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="top-right" id="slideshow_title_top-right" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'top-right') ? 'checked' : ''; ?>></td>
                          </tr>
                          <tr>
                            <td><input type="radio" value="middle-left" id="slideshow_title_middle-left" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'middle-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="middle-center" id="slideshow_title_middle-center" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'middle-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="middle-right" id="slideshow_title_middle-right" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'middle-right') ? 'checked' : ''; ?>></td>
                          </tr>
                          <tr>
                            <td><input type="radio" value="bottom-left" id="slideshow_title_bottom-left" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'bottom-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="bottom-center" id="slideshow_title_bottom-center" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'bottom-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="bottom-right" id="slideshow_title_bottom-right" name="slideshow_title_position" <?php echo ($option_row->slideshow_title_position == 'bottom-right') ? 'checked' : ''; ?>></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr id="tr_slideshow_full_width_title">
                    <td title="<?php _e("Display image title based on the slideshow dimensions.", 'bwg_back'); ?>" class="spider_label">
                      <label><?php _e("Full width title:", 'bwg_back'); ?></label>
                    </td>
                    <td>
                      <input type="radio" name="slideshow_title_full_width" id="slideshow_title_full_width_1" value="1" <?php if ($option_row->slideshow_title_full_width) echo 'checked="checked"'; ?>  /><label for="slideshow_title_full_width_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="slideshow_title_full_width" id="slideshow_title_full_width_0" value="0" <?php if (!$option_row->slideshow_title_full_width) echo 'checked="checked"'; ?>  /><label for="slideshow_title_full_width_0"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_slideshow_enable_description">
                    <td class="spider_label"><label><?php _e("Enable Image Description:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="slideshow_enable_description" id="slideshow_description_yes" value="1" <?php echo ($option_row->slideshow_enable_description) ? 'checked' : ''; ?> onClick="bwg_enable_disable('', 'tr_slideshow_description_position', 'slideshow_description_yes')" /><label for="slideshow_description_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="slideshow_enable_description" id="slideshow_description_no" value="0" <?php echo ($option_row->slideshow_enable_description) ? '' : 'checked'; ?> onClick="bwg_enable_disable('none', 'tr_slideshow_description_position', 'slideshow_description_no')" /><label for="slideshow_description_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_slideshow_description_position">
                    <td title="<?php _e("Image description position on slideshow", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Description Position: ", 'bwg_back'); ?></label></td>
                    <td>
                      <table class="bws_position_table">
                        <tbody>
                          <tr>
                            <td><input type="radio" value="top-left" id="slideshow_description_top-left" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'top-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="top-center" id="slideshow_description_top-center" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'top-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="top-right" id="slideshow_description_top-right" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'top-right') ? 'checked' : ''; ?>></td>
                          </tr>
                          <tr>
                            <td><input type="radio" value="middle-left" id="slideshow_description_middle-left" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'middle-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="middle-center" id="slideshow_description_middle-center" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'middle-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="middle-right" id="slideshow_description_middle-right" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'middle-right') ? 'checked' : ''; ?>></td>
                          </tr>
                          <tr>
                            <td><input type="radio" value="bottom-left" id="slideshow_description_bottm-Left" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'bottom-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="bottom-center" id="slideshow_description_bottom-center" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'bottom-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="bottom-right" id="slideshow_description_bottm-right" name="slideshow_description_position" <?php echo ($option_row->slideshow_description_position == 'bottom-right') ? 'checked' : ''; ?>></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr id="tr_enable_slideshow_music">
                    <td class="spider_label"><label><?php _e("Enable Slideshow Music:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="enable_slideshow_music" id="slideshow_music_yes" value="1" onClick="bwg_enable_disable('', 'tr_slideshow_music_url', 'slideshow_music_yes')" <?php echo ($option_row->slideshow_enable_music) ? 'checked' : ''; ?> /><label for="slideshow_music_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="enable_slideshow_music" id="slideshow_music_no" value="0" onClick="bwg_enable_disable('none', 'tr_slideshow_music_url', 'slideshow_music_no')" <?php echo ($option_row->slideshow_enable_music) ? '' : 'checked'; ?> /><label for="slideshow_music_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_slideshow_music_url">
                    <td title="<?php _e("Enter absolute audio file url or add file from Options page.", 'bwg_back'); ?>" class="spider_label">
                      <label for="slideshow_music_url"><?php _e("Music url:", 'bwg_back'); ?> </label>
                    </td>
                    <td>
                      <input type="text" id="slideshow_music_url" name="slideshow_music_url" value="<?php echo $option_row->slideshow_audio_url; ?>" style="display:inline-block;" />
                    </td>
                  </tr>
                </tbody>

                <!--Lightbox view-->
                <tbody id="tbody_popup_other">
                  <tr id="tr_thumb_click_action">
                    <td class="spider_label"><label><?php _e("Thumb click action:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="thumb_click_action" id="thumb_click_action_1" value="open_lightbox" <?php if ($option_row->thumb_click_action == 'open_lightbox') echo 'checked="checked"'; ?> onchange="bwg_thumb_click_action()" /><label for="thumb_click_action_1"><?php _e("Open lightbox", 'bwg_back'); ?></label><br />
                      <input type="radio" name="thumb_click_action" id="thumb_click_action_2" value="redirect_to_url" <?php if ($option_row->thumb_click_action == 'redirect_to_url') echo 'checked="checked"'; ?> onchange="bwg_thumb_click_action()" /><label for="thumb_click_action_2"><?php _e("Redirect to url", 'bwg_back'); ?></label><br />
                      <input type="radio" name="thumb_click_action" id="thumb_click_action_3" value="do_nothing" <?php if ($option_row->thumb_click_action == 'do_nothing') echo 'checked="checked"'; ?> onchange="bwg_thumb_click_action()" /><label for="thumb_click_action_3"><?php _e("Do Nothing", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_thumb_link_target">
                    <td title="<?php _e("Open new window when redirecting.", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Open in new window:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="thumb_link_target" id="thumb_link_target_yes" value="1" <?php if ($option_row->thumb_link_target) echo 'checked="checked"'; ?> /><label for="thumb_link_target_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="thumb_link_target" id="thumb_link_target_no" value="0" <?php if (!$option_row->thumb_link_target) echo 'checked="checked"'; ?> /><label for="thumb_link_target_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                </tbody>
                <tbody id="tbody_popup">
                  <tr id="tr_popup_fullscreen">
                    <td title="<?php _e("Enable full width feature for the lightbox.", 'bwg_back'); ?>" class="spider_label">
                      <label><?php _e("Full width lightbox:", 'bwg_back'); ?></label>
                    </td>
                    <td>
                      <input type="radio" name="popup_fullscreen" id="popup_fullscreen_1" value="1" <?php if ($option_row->popup_fullscreen) echo 'checked="checked"'; ?> onchange="bwg_popup_fullscreen()" /><label for="popup_fullscreen_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="popup_fullscreen" id="popup_fullscreen_0" value="0" <?php if (!$option_row->popup_fullscreen) echo 'checked="checked"'; ?> onchange="bwg_popup_fullscreen()" /><label for="popup_fullscreen_0"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>	
                  <tr id="tr_popup_width_height">
                    <td title="<?php _e("Maximum values for lightbox width and height.", 'bwg_back'); ?>" class="spider_label"><label for="popup_width"><?php _e("Lightbox dimensions:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="popup_width" id="popup_width" value="<?php echo $option_row->popup_width; ?>" class="spider_int_input" /> x 
                      <input type="text" name="popup_height" id="popup_height" value="<?php echo $option_row->popup_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_popup_effect">
                    <td title="<?php _e("Lightbox slideshow effect.", 'bwg_back'); ?>" class="spider_label"><label for="popup_effect"><?php _e("Lightbox effect:", 'bwg_back'); ?> </label></td>
                    <td>
                      <select name="popup_effect" id="popup_effect" style="width:150px;">
                        <?php
                        foreach ($effects as $key => $effect) {
                          ?>
                          <option value="<?php echo $key; ?>" <?php echo ($key != 'none' && $key != 'fade') ? 'disabled="disabled" title="This effect is disabled in free version."' : ''; ?> <?php echo ($option_row->popup_type == $key) ? 'selected' : ''; ?>><?php echo __($effect,"bwg_back"); ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr id="tr_popup_effect_duration">
                    <td title="<?php echo __("Interval between two images.", 'bwg_back'); ?>" class="spider_label"><label for="popup_effect_duration"><?php echo __('Effect duration:', 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="popup_effect_duration" id="popup_effect_duration" value="<?php echo $option_row->popup_effect_duration; ?>" class="spider_int_input" /> sec.</td>
                  </tr>
                  <tr id="tr_popup_autoplay">
                    <td class="spider_label">
                      <label><?php _e("Lightbox autoplay:", 'bwg_back'); ?> </label>
                    </td>
                    <td>
                      <input type="radio" name="popup_autoplay" id="popup_autoplay_1" value="1" <?php if ($option_row->popup_autoplay) echo 'checked="checked"'; ?>  /><label for="popup_autoplay_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="popup_autoplay" id="popup_autoplay_0" value="0" <?php if (!$option_row->popup_autoplay) echo 'checked="checked"'; ?>  /><label for="popup_autoplay_0"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_interval">
                    <td title="<?php _e("Interval between two images.", 'bwg_back'); ?>" class="spider_label"><label for="popup_interval"><?php _e("Time interval:", 'bwg_back'); ?> </label></td>
                    <td><input type="text" name="popup_interval" id="popup_interval" value="<?php echo $option_row->popup_interval; ?>" class="spider_int_input" /> sec.</td>
                  </tr>
                  <tr id="tr_popup_enable_filmstrip">
                    <td title="<?php _e("Enable filmstrip view for images", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable filmstrip in lightbox:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_filmstrip" id="popup_filmstrip_yes" value="1" onClick="bwg_enable_disable('', 'tr_popup_filmstrip_height', 'popup_filmstrip_yes')" <?php echo ($option_row->popup_enable_filmstrip) ? 'checked' : ''; ?> /><label for="popup_filmstrip_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_filmstrip" id="popup_filmstrip_no" value="0" onClick="bwg_enable_disable('none', 'tr_popup_filmstrip_height', 'popup_filmstrip_no')" <?php echo ($option_row->popup_enable_filmstrip) ? '' : 'checked'; ?> /><label for="popup_filmstrip_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_filmstrip_height">
                    <td title="<?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label for="popup_filmstrip_height"><?php _e("Filmstrip size:", 'bwg_back'); ?> </label></td>
                    <td class="spider_free_version_label"><input disabled="disabled" type="text" name="popup_filmstrip_height" id="popup_filmstrip_height" value="<?php echo $option_row->popup_filmstrip_height; ?>" class="spider_int_input spider_free_version_label" /> px</td>
                  </tr>
                  <tr id="tr_popup_hit_counter">
                    <td title="<?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Display hit counter:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_hit_counter" id="popup_hit_counter_yes" value="1" <?php echo ($option_row->popup_hit_counter) ? 'checked' : ''; ?> /><label for="popup_hit_counter_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_hit_counter" id="popup_hit_counter_no" value="0" <?php echo ($option_row->popup_hit_counter) ? '' : 'checked'; ?> /><label for="popup_hit_counter_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_ctrl_btn">
                    <td title="<?php _e("Enable control buttons in lightbox", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Enable control buttons:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="popup_enable_ctrl_btn" id="popup_ctrl_btn_yes" value="1" onClick="bwg_enable_disable('', 'tbody_popup_ctrl_btn', 'popup_ctrl_btn_yes');" <?php echo ($option_row->popup_enable_ctrl_btn) ? 'checked' : ''; ?> /><label for="popup_ctrl_btn_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="popup_enable_ctrl_btn" id="popup_ctrl_btn_no" value="0" onClick="bwg_enable_disable('none', 'tbody_popup_ctrl_btn', 'popup_ctrl_btn_no');" <?php echo ($option_row->popup_enable_ctrl_btn) ? '' : 'checked'; ?> /><label for="popup_ctrl_btn_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                </tbody>
                <tbody id="tbody_popup_ctrl_btn">
                  <tr id="tr_popup_enable_fullscreen">
                    <td title="<?php _e("Enable fullscreen view for images", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Enable fullscreen:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="popup_enable_fullscreen" id="popup_fullscreen_yes" value="1" <?php echo ($option_row->popup_enable_fullscreen) ? 'checked' : ''; ?> /><label for="popup_fullscreen_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="popup_enable_fullscreen" id="popup_fullscreen_no" value="0" <?php echo ($option_row->popup_enable_fullscreen) ? '' : 'checked'; ?> /><label for="popup_fullscreen_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_info">
                    <td title="<?php _e("Enable title, description for images", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Enable info:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="popup_enable_info" id="popup_info_yes" value="1" <?php echo ($option_row->popup_enable_info) ? 'checked="checked"' : ''; ?> /><label for="popup_info_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="popup_enable_info" id="popup_info_no" value="0" <?php echo ($option_row->popup_enable_info) ? '' : 'checked="checked"'; ?> /><label for="popup_info_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_info_always_show">
                    <td class="spider_label"><label><?php _e("Display info by default:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="popup_info_always_show" id="popup_info_always_show_yes" value="1" <?php echo ($option_row->popup_info_always_show) ? 'checked="checked"' : ''; ?> /><label for="popup_info_always_show_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="popup_info_always_show" id="popup_info_always_show_no" value="0" <?php echo ($option_row->popup_info_always_show) ? '' : 'checked="checked"'; ?> /><label for="popup_info_always_show_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_info_full_width">
                    <td title="<?php _e("Display image information based on the lightbox dimensions.", 'bwg_back'); ?>" class="spider_label"><label><?php _e("Full width info:", 'bwg_back'); ?></label></td>
                    <td>
                      <input type="radio" name="popup_info_full_width" id="popup_info_full_width_1" value="1" <?php if ($option_row->popup_info_full_width) echo 'checked="checked"'; ?>  /><label for="popup_info_full_width_1"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input type="radio" name="popup_info_full_width" id="popup_info_full_width_0" value="0" <?php if (!$option_row->popup_info_full_width) echo 'checked="checked"'; ?>  /><label for="popup_info_full_width_0"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_rate">
                    <td title="<?php _e("Enable rating for images", 'bwg_back'); ?><br /><br />This option is disabled in free version." class="spider_label spider_free_version_label"><label><?php _e("Enable rating:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_rate" id="popup_rate_yes" value="1" <?php echo ($option_row->popup_enable_rate) ? 'checked="checked"' : ''; ?> /><label for="popup_rate_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_rate" id="popup_rate_no" value="0" <?php echo ($option_row->popup_enable_rate) ? '' : 'checked="checked"'; ?> /><label for="popup_rate_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_comment">
                    <td title="<?php _e("Enable comments for images", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable comments:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_comment" id="popup_comment_yes" value="1" <?php echo ($option_row->popup_enable_comment) ? 'checked' : ''; ?> /><label for="popup_comment_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_comment" id="popup_comment_no" value="0" <?php echo ($option_row->popup_enable_comment) ? '' : 'checked'; ?> /><label for="popup_comment_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_facebook">
                    <td title="<?php _e("Enable Facebook share button for images", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable Facebook button:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_facebook" id="popup_facebook_yes" value="1" <?php echo ($option_row->popup_enable_facebook) ? 'checked' : ''; ?> /><label for="popup_facebook_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_facebook" id="popup_facebook_no" value="0" <?php echo ($option_row->popup_enable_facebook) ? '' : 'checked'; ?> /><label for="popup_facebook_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_twitter">
                    <td title="<?php _e("Enable Twitter share button for images", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable Twitter button:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_twitter" id="popup_twitter_yes" value="1" <?php echo ($option_row->popup_enable_twitter) ? 'checked' : ''; ?> /><label for="popup_twitter_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_twitter" id="popup_twitter_no" value="0" <?php echo ($option_row->popup_enable_twitter) ? '' : 'checked'; ?> /><label for="popup_twitter_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_google">
                    <td title="<?php _e("Enable Google+ share button for images", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable Google+ button:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_google" id="popup_google_yes" value="1" <?php echo ($option_row->popup_enable_google) ? 'checked' : ''; ?> /><label for="popup_google_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_google" id="popup_google_no" value="0" <?php echo ($option_row->popup_enable_google) ? '' : 'checked'; ?> /><label for="popup_google_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_pinterest">
                    <td title="<?php _e("Enable Pinterest share button for images", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable Pinterest button:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_pinterest" id="popup_pinterest_yes" value="1" <?php echo ($option_row->popup_enable_pinterest) ? 'checked' : ''; ?> /><label for="popup_pinterest_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_pinterest" id="popup_pinterest_no" value="0" <?php echo ($option_row->popup_enable_pinterest) ? '' : 'checked'; ?> /><label for="popup_pinterest_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_popup_enable_tumblr">
                    <td title="<?php _e("Enable Tumblr share button for images", 'bwg_back'); ?><br /><br /><?php _e("This option is disabled in free version.", 'bwg_back'); ?>" class="spider_label spider_free_version_label"><label><?php _e("Enable Tumblr button:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input disabled="disabled" type="radio" name="popup_enable_tumblr" id="popup_tumblr_yes" value="1" <?php echo ($option_row->popup_enable_tumblr) ? 'checked' : ''; ?> /><label for="popup_tumblr_yes"><?php _e('Yes', 'bwg_back'); ?></label>
                      <input disabled="disabled" type="radio" name="popup_enable_tumblr" id="popup_tumblr_no" value="0" <?php echo ($option_row->popup_enable_tumblr) ? '' : 'checked'; ?> /><label for="popup_tumblr_no"><?php _e('No', 'bwg_back'); ?></label>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
              <div class="bwg_short_div">
              <table>
                <tbody>
                  <tr id="tr_watermark_type">
                    <td class="spider_label"><label><?php _e("Advertisement Type:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="radio" name="watermark_type" id="watermark_type_none" value="none" onClick="bwg_watermark('watermark_type_none')" <?php echo ($option_row->watermark_type == 'none') ? 'checked' : ''; ?> /><label for="watermark_type_none"><?php _e("None", 'bwg_back'); ?></label>
                      <input type="radio" name="watermark_type" id="watermark_type_text" value="text" onClick="bwg_watermark('watermark_type_text')" <?php echo ($option_row->watermark_type == 'text') ? 'checked' : ''; ?> /><label for="watermark_type_text"><?php _e("Text", 'bwg_back'); ?></label>
                      <input type="radio" name="watermark_type" id="watermark_type_image" value="image" onClick="bwg_watermark('watermark_type_image')" <?php echo ($option_row->watermark_type == 'image') ? 'checked' : ''; ?> /><label for="watermark_type_image"><?php _e("Image", 'bwg_back'); ?></label>
                    </td>
                  </tr>
                  <tr id="tr_watermark_link">
                    <td title="<?php _e("Enter absolute url", 'bwg_back'); ?>, e.g. http://www.example.com" class="spider_label">
                      <label for="watermark_link"><?php _e("Advertisement link:", 'bwg_back'); ?> </label>
                    </td>
                    <td>
                      <input type="text" id="watermark_link" name="watermark_link" value="<?php echo $option_row->watermark_link; ?>" style="display:inline-block;" />
                    </td>
                  </tr>
                  <tr id="tr_watermark_url">
                    <td title="<?php _e("Enter absolute image file url or add file from Options page.", 'bwg_back'); ?>" class="spider_label">
                      <label for="watermark_url"><?php _e("Advertisement url:", 'bwg_back'); ?> </label>
                    </td>
                    <td>
                      <input type="text" id="watermark_url" name="watermark_url" value="<?php echo $option_row->watermark_url; ?>" style="display:inline-block;" />
                    </td>
                  </tr>
                  <tr id="tr_watermark_width_height">
                    <td title="<?php _e("Maximum values for watermark image width and height.", 'bwg_back'); ?>" class="spider_label"><label for="watermark_width"><?php _e("Advertisement dimensions:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="watermark_width" id="watermark_width" value="<?php echo $option_row->watermark_width; ?>" class="spider_int_input" /> x 
                      <input type="text" name="watermark_height" id="watermark_height" value="<?php echo $option_row->watermark_height; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_watermark_text">
                    <td class="spider_label"><label for="watermark_text"><?php _e("Advertisement text:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="watermark_text" id="watermark_text" value="<?php echo $option_row->watermark_text; ?>" />
                    </td>
                  </tr>
                  <tr id="tr_watermark_font_size">
                    <td class="spider_label"><label for="watermark_font_size"><?php _e("Advertisement font size:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="watermark_font_size" id="watermark_font_size" value="<?php echo $option_row->watermark_font_size; ?>" class="spider_int_input" /> px
                    </td>
                  </tr>
                  <tr id="tr_watermark_font">
                    <td class="spider_label"><label for="watermark_font"><?php _e("Advertisement font style:", 'bwg_back'); ?> </label></td>
                    <td>
                      <select name="watermark_font" id="watermark_font" style="width:150px;">
                        <?php
                        foreach ($watermark_fonts as $watermark_font) {
                          ?>
                          <option value="<?php echo $watermark_font; ?>" <?php echo ($option_row->watermark_font == $watermark_font) ? 'selected' : ''; ?>><?php echo $watermark_font; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr id="tr_watermark_color">
                    <td class="spider_label"><label for="watermark_color"><?php _e("Advertisement color:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="watermark_color" id="watermark_color" value="<?php echo $option_row->watermark_color; ?>" class="color" />
                    </td>
                  </tr>
                  <tr id="tr_watermark_opacity">
                    <td title="<?php _e("Value must be between 0 to 100.", 'bwg_back'); ?>" class="spider_label"><label for="watermark_opacity"><?php _e("Advertisement opacity:", 'bwg_back'); ?> </label></td>
                    <td>
                      <input type="text" name="watermark_opacity" id="watermark_opacity" value="<?php echo $option_row->watermark_opacity; ?>" class="spider_int_input" /> %
                    </td>
                  </tr>
                  <tr id="tr_watermark_position">
                    <td class="spider_label"><label><?php _e("Advertisement Position:", 'bwg_back'); ?> </label></td>
                    <td>
                      <table class="bws_position_table">
                        <tbody>
                          <tr>
                            <td><input type="radio" value="top-left" id="watermark_top-left" name="watermark_position" <?php echo ($option_row->watermark_position == 'top-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="top-center" id="watermark_top-center" name="watermark_position" <?php echo ($option_row->watermark_position == 'top-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="top-right" id="watermark_top-right" name="watermark_position" <?php echo ($option_row->watermark_position == 'top-right') ? 'checked' : ''; ?>></td>
                          </tr>
                          <tr>
                            <td><input type="radio" value="middle-left" id="watermark_middle-left" name="watermark_position" <?php echo ($option_row->watermark_position == 'middle-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="middle-center" id="watermark_middle-center" name="watermark_position" <?php echo ($option_row->watermark_position == 'middle-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="middle-right" id="watermark_middle-right" name="watermark_position" <?php echo ($option_row->watermark_position == 'middle-right') ? 'checked' : ''; ?>></td>
                          </tr>
                          <tr>
                            <td><input type="radio" value="bottom-left" id="watermark_bottom-left" name="watermark_position" <?php echo ($option_row->watermark_position == 'bottom-left') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="bottom-center" id="watermark_bottom-center" name="watermark_position" <?php echo ($option_row->watermark_position == 'bottom-center') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" value="bottom-right" id="watermark_bottom-right" name="watermark_position" <?php echo ($option_row->watermark_position == 'bottom-right') ? 'checked' : ''; ?>></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
          <?php
          if (!$from_menu) {
          ?>
            </div>
          </div>
          <div class="mceActionPanel">
            <div style="float:left;">
              <a id="bwg_pro_version_link" class="button button-primary" target="_blank" style="line-height: 25px; padding: 0 5px; text-decoration: none; vertical-align: middle; width: inherit; float: left;" href="http://wpdemo.web-dorado.com/thumbnails-view-2/"><?php _e("Please see Pro ", 'bwg_back'); ?><span id="bwg_pro_version"><?php _e("Thumbnail", 'bwg_back'); ?></span> <?php _e("View", 'bwg_back'); ?></a>
            </div>
            <div style="float:right;">
              <input type="button" id="insert" name="insert" value="<?php _e("Insert", 'bwg_back'); ?>" onClick="bwg_insert_shortcode('');" />
              <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'bwg_back'); ?>" onClick="tinyMCEPopup.close();" />
            </div>
          </div>
          <?php
          }
          else {
            $tagtext = '';
            $tagfunction = '';
            if (isset($_POST['currrent_id'])) {
              $currrent_id = stripslashes($_POST['currrent_id']);
              $title = ((isset($_POST['title'])) ? stripslashes($_POST['title']) : '');
              $tagtext = '[Best_Wordpress_Gallery id="' . $currrent_id . '"' . $title . ']';
              $tagfunction = "<?php echo photo_gallery(" . $currrent_id . "); ?>";
            }
            ?>
            <hr style="float: left; width: 100%;" />
            <span style="float: left; width: 100%;">
              <a id="bwg_pro_version_link" class="button button-primary" target="_blank" style="display: table; margin-bottom: 5px;" href="https://web-dorado.com/files/fromPhotoGallery.php"><?php _e("Please see Pro", 'bwg_back'); ?> <span id="bwg_pro_version"><?php _e("Thumbnail", 'bwg_back'); ?></span> <?php _e("View", 'bwg_back'); ?></a>
              <input type="button" class="button-primary" id="insert" name="insert" value="<?php echo __("Generate", 'bwg_back'); ?>" onclick="bwg_insert_shortcode('');" />
              <input type="button" class="button-secondary" id="import" name="import" value="<?php echo __("Import", 'bwg_back'); ?>" onclick="bwg_update_shortcode()" />
              <div>
                <input type="text" size="55" id="bwg_shortcode" name="bwg_shortcode" value='<?php echo $tagtext; ?>' onclick="bwg_onKeyDown(event)" />
                <b><?php _e("Shortcode", 'bwg_back'); ?></b>
              </div>
              <div>
                <input type="text" size="55" id="bwg_function" name="bwg_function" value="<?php echo $tagfunction; ?>" onclick="spider_select_value(this)" readonly="readonly" />
                <b><?php _e("PHP function", 'bwg_back'); ?></b>
              </div>
            </span>
            </div>
            <?php
          }
          ?>
          <input type="hidden" id="tagtext" name="tagtext" value="" />
          <input type="hidden" id="currrent_id" name="currrent_id" value="" />
          <input type="hidden" id="title" name="title" value="" />
          <input type="hidden" id="bwg_insert" name="bwg_insert" value="" />
          <input type="hidden" id="task" name="task" value="" />
        </form>
        <script type="text/javascript">
          var shortcodes = [];
          var shortcode_id = 1;
          <?php
          foreach ($shortcodes as $shortcode) {
            ?>
            shortcodes[<?php echo $shortcode->id; ?>] = '<?php echo addslashes($shortcode->tagtext); ?>';
            <?php
          }
          ?>
          shortcode_id = <?php echo $shortcode_max_id + 1; ?>;
          window.onload = bwg_shortcode_load;
          var params = get_params("Best_Wordpress_Gallery");
          var bwg_insert = 1;
          bwg_update_shortcode();
          <?php if (!$from_menu) { ?>
          var content = tinyMCE.activeEditor.selection.getContent();
          <?php } else { ?>
          var content = jQuery("#bwg_shortcode").val();
          <?php } ?>
          function bwg_update_shortcode() {
            params = get_params("Best_Wordpress_Gallery");
            if (!params) { // Insert.
            <?php if (!$from_menu) { ?>
              jQuery('#insert').val('Insert');
            <?php } ?>
              bwg_gallery_type('thumbnails');
            }
            else { // Update.
              if (params['id']) {
                shortcode_id = params['id'];
                if(typeof shortcodes[shortcode_id] === 'undefined'){
                  alert("<?php _e('There is No shortcode with such', 'bwg_back'); ?> ID!");
                  bwg_gallery_type('thumbnails');
                  return 0;
                }
                var short_code = get_short_params(shortcodes[shortcode_id]);
                bwg_insert = 0;
              }
              else {
                var short_code = get_params("Best_Wordpress_Gallery");
              }
            <?php if (!$from_menu) { ?>
              jQuery('#insert').val('Update');
            <?php } else { ?>
              content = jQuery("#bwg_shortcode").val();
            <?php } ?>
              jQuery('#insert').attr('onclick', "bwg_insert_shortcode(content)");
              jQuery("select[id=theme] option[value='" + short_code['theme_id'] + "']").attr('selected', 'selected');
              switch (short_code['gallery_type']) {
                case 'thumbnails': {
                  jQuery("select[id=gallery] option[value='" + short_code['gallery_id'] + "']").attr('selected', 'selected');
                  jQuery("select[id=sort_by] option[value='" + short_code['sort_by'] + "']").attr('selected', 'selected');
                  if (short_code['order_by'] == 'asc') {
                    jQuery("#order_by_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#order_by_0").attr('checked', 'checked');
                  }
                  if (short_code['show_search_box'] == 1) {
                    jQuery("#show_search_box_1").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', '');
                  }
                  else {
                    jQuery("#show_search_box_0").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', 'none');
                  }
									if (short_code['show_sort_images'] == 1) {
                    jQuery("#show_sort_images_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#show_sort_images_0").attr('checked', 'checked');
                  }
                  if (short_code['show_tag_box'] == 1) {
                    jQuery("#show_tag_box_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#show_tag_box_0").attr('checked', 'checked');
                  }
                  if (short_code['search_box_width']) {
                    jQuery("#search_box_width").val(short_code['search_box_width']);
                  }
                  jQuery("#image_column_number").val(short_code['image_column_number']);
                  jQuery("#images_per_page").val(short_code['images_per_page']);
                  jQuery("#load_more_image_count").val(short_code['load_more_image_count']);
                  jQuery("#image_title_" + short_code['image_title']).attr('checked', 'checked');
                  if (short_code['image_enable_page'] == 1) {
                    jQuery("#image_page_yes").attr('checked', 'checked');
                  }
                  else if (short_code['image_enable_page'] == 0) {
                    jQuery("#image_page_no").attr('checked', 'checked');
                  }
                  else if (short_code['image_enable_page'] == 2) {
                    jQuery("#image_page_loadmore").attr('checked', 'checked');
                  }
                   else if (short_code['image_enable_page'] == 3) {
                    jQuery("#image_page_scrol_load").attr('checked', 'checked');
                  }
                  jQuery("#thumb_width").val(short_code['thumb_width']);
                  jQuery("#thumb_height").val(short_code['thumb_height']);
                  break;

                }
                case 'slideshow': {
                  jQuery("select[id=gallery] option[value='" + short_code['gallery_id'] + "']").attr('selected', 'selected');
                  jQuery("select[id=sort_by] option[value='" + short_code['sort_by'] + "']").attr('selected', 'selected');
                  if (short_code['order_by'] == 'asc') {
                    jQuery("#order_by_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#order_by_0").attr('checked', 'checked');
                  }
                  jQuery("select[id=slideshow_effect] option[value='" + short_code['slideshow_effect'] + "']").attr('selected', 'selected');
                  jQuery("#slideshow_interval").val(short_code['slideshow_interval']);
                  jQuery("#slideshow_effect_duration").val(short_code['slideshow_effect_duration']);
                  jQuery("#slideshow_width").val(short_code['slideshow_width']);
                  jQuery("#slideshow_height").val(short_code['slideshow_height']);
                  if (short_code['enable_slideshow_autoplay'] == 1) {
                    jQuery("#slideshow_autoplay_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#slideshow_autoplay_no").attr('checked', 'checked');
                  }
                  if (short_code['enable_slideshow_shuffle'] == 1) {
                    jQuery("#slideshow_shuffle_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#slideshow_shuffle_no").attr('checked', 'checked');
                  }
                  if (short_code['enable_slideshow_ctrl'] == 1) {
                    jQuery("#slideshow_ctrl_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#slideshow_ctrl_no").attr('checked', 'checked');
                  }
                  if (short_code['enable_slideshow_filmstrip'] == 1) {
                    jQuery("#slideshow_filmstrip_yes").attr('checked', 'checked');
                    jQuery("#slideshow_filmstrip_height").val(short_code['slideshow_filmstrip_height']);
                    bwg_enable_disable('', 'tr_slideshow_filmstrip_height', 'slideshow_filmstrip_yes');
                  }
                  else {
                    jQuery("#slideshow_filmstrip_no").attr('checked', 'checked');
                  }
                  if (short_code['slideshow_enable_title'] == 1) {
                    jQuery("#slideshow_title_yes").attr('checked', 'checked');
                    jQuery("#slideshow_title_" + short_code['slideshow_title_position']).attr('checked', 'checked');
                    bwg_enable_disable('', 'tr_slideshow_title_position', 'slideshow_title_yes');
                  }
                  else {
                    jQuery("#slideshow_title_no").attr('checked', 'checked');
                  }
                  if (short_code['slideshow_enable_description'] == 1) {
                    jQuery("#slideshow_description_yes").attr('checked', 'checked');
                    jQuery("#slideshow_description_" + short_code['slideshow_description_position']).attr('checked', 'checked');
                    bwg_enable_disable('', 'tr_slideshow_description_position', 'slideshow_description_yes');
                  }
                  else {
                    jQuery("#slideshow_description_no").attr('checked', 'checked');
                  }
                  if (short_code['enable_slideshow_music'] == 1) {
                    jQuery("#slideshow_music_yes").attr('checked', 'checked');
                    jQuery("#slideshow_music_url").val(short_code['slideshow_music_url']);
                    bwg_enable_disable('', 'tr_slideshow_music_url', 'slideshow_music_yes');
                  }
                  else {
                    jQuery("#slideshow_music_no").attr('checked', 'checked');
                  }
                  break;

                }
                case 'image_browser': {
                  jQuery("select[id=gallery] option[value='" + short_code['gallery_id'] + "']").attr('selected', 'selected');
                  jQuery("select[id=sort_by] option[value='" + short_code['sort_by'] + "']").attr('selected', 'selected');
                  if (short_code['order_by'] == 'asc') {
                    jQuery("#order_by_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#order_by_0").attr('checked', 'checked');
                  }
                  if (short_code['show_search_box'] == 1) {
                    jQuery("#show_search_box_1").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', '');
                  }
                  else {
                    jQuery("#show_search_box_0").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', 'none');
                  }
                  if (short_code['search_box_width']) {
                    jQuery("#search_box_width").val(short_code['search_box_width']);
                  }
                  jQuery("#image_browser_width").val(short_code['image_browser_width']);
                  if (short_code['image_browser_title_enable'] == 1) {
                    jQuery("#image_browser_title_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#image_browser_title_no").attr('checked', 'checked');
                  }
                  if (short_code['image_browser_description_enable'] == 1) {
                    jQuery("#image_browser_description_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#image_browser_description_no").attr('checked', 'checked');
                  }
                  break;

                }
                case 'album_compact_preview': {
                  jQuery("select[id=album] option[value='" + short_code['album_id'] + "']").attr('selected', 'selected');
                  jQuery("select[id=sort_by] option[value='" + short_code['sort_by'] + "']").attr('selected', 'selected');
                  if (short_code['order_by'] == 'asc') {
                    jQuery("#order_by_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#order_by_0").attr('checked', 'checked');
                  }
                  if (short_code['show_search_box'] == 1) {
                    jQuery("#show_search_box_1").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', '');
                  }
                  else {
                    jQuery("#show_search_box_0").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', 'none');
                  }
									if (short_code['show_sort_images'] == 1) {
                    jQuery("#show_sort_images_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#show_sort_images_0").attr('checked', 'checked');
                  }
                  if (short_code['search_box_width']) {
                    jQuery("#search_box_width").val(short_code['search_box_width']);
                  }
                  jQuery("#compuct_album_column_number").val(short_code['compuct_album_column_number']);
                  jQuery("#compuct_albums_per_page").val(short_code['compuct_albums_per_page']);
                  jQuery("#compuct_album_title_" + short_code['compuct_album_title']).attr('checked', 'checked');
                  jQuery("#compuct_album_thumb_width").val(short_code['compuct_album_thumb_width']);
                  jQuery("#compuct_album_thumb_height").val(short_code['compuct_album_thumb_height']);
                  jQuery("#compuct_album_image_column_number").val(short_code['compuct_album_image_column_number']);
                  jQuery("#compuct_album_images_per_page").val(short_code['compuct_album_images_per_page']);
                  jQuery("#compuct_album_image_title_" + short_code['compuct_album_image_title']).attr('checked', 'checked');
                  jQuery("#compuct_album_image_thumb_width").val(short_code['compuct_album_image_thumb_width']);
                  jQuery("#compuct_album_image_thumb_height").val(short_code['compuct_album_image_thumb_height']);
                  jQuery("#compuct_album_load_more_image_count").val(short_code['compuct_album_load_more_image_count']);
                  jQuery("#compuct_albums_per_page_load_more").val(short_code['compuct_albums_per_page_load_more']);
                  if (short_code['compuct_album_enable_page'] == 1) {
                    jQuery("#compuct_album_page_yes").attr('checked', 'checked');
                  }
                  else if (short_code['compuct_album_enable_page'] == 0) {
                    jQuery("#compuct_album_page_no").attr('checked', 'checked');
                  }
                  else if (short_code['compuct_album_enable_page'] == 2) {
                    jQuery("#compuct_album_page_loadmore").attr('checked', 'checked');
                  }
                  else if (short_code['compuct_album_enable_page'] == 3) {
                    jQuery("#compuct_album_page_scrol_load").attr('checked', 'checked');
                  }
                  if (short_code['compuct_album_view_type'] == 'thumbnail') {				  
                    jQuery("#compuct_album_view_type_1").attr('checked', 'checked');								  
                  }
                  else if (short_code['compuct_album_view_type'] == 'masonry'){ 
                    jQuery("#compuct_album_view_type_0").attr('checked', 'checked');
                  }
                  else{
                    jQuery("#compuct_album_view_type_2").attr('checked', 'checked');
                  }
                  if (short_code['compuct_album_mosaic_hor_ver'] == "vertical") {
                    jQuery("#compuct_album_mosaic_ver").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#compuct_album_mosaic_hor").attr('checked', 'checked');
                  }
                  if (short_code['compuct_album_resizable_mosaic'] == 1) {
                    jQuery("#compuct_album_resizable_mosaic_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#compuct_album_resizable_mosaic_0").attr('checked', 'checked');
                  }
                  if (short_code['show_tag_box'] == 1) {
                    jQuery("#show_tag_box_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#show_tag_box_0").attr('checked', 'checked');
                  }
                  jQuery("#compuct_album_mosaic_total_width").val(short_code['compuct_album_mosaic_total_width']);
                  break;

                }
                case 'album_extended_preview': {
                  jQuery("select[id=album] option[value='" + short_code['album_id'] + "']").attr('selected', 'selected');
                  jQuery("select[id=sort_by] option[value='" + short_code['sort_by'] + "']").attr('selected', 'selected');
                  if (short_code['order_by'] == 'asc') {
                    jQuery("#order_by_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#order_by_0").attr('checked', 'checked');
                  }
                  if (short_code['show_search_box'] == 1) {
                    jQuery("#show_search_box_1").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', '');
                  }
                  else {
                    jQuery("#show_search_box_0").attr('checked', 'checked');
                    jQuery("#tr_search_box_width").css('display', 'none');
                  }
									if (short_code['show_sort_images'] == 1) {
                    jQuery("#show_sort_images_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#show_sort_images_0").attr('checked', 'checked');
                  }
                  if (short_code['search_box_width']) {
                    jQuery("#search_box_width").val(short_code['search_box_width']);
                  }
                  jQuery("#extended_albums_per_page").val(short_code['extended_albums_per_page']);
                  jQuery("#extended_album_height").val(short_code['extended_album_height']);
                  if (short_code['extended_album_description_enable'] == 1) {
                    jQuery("#extended_album_description_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#extended_album_description_no").attr('checked', 'checked');
                  }
                  jQuery("#extended_album_thumb_width").val(short_code['extended_album_thumb_width']);
                  jQuery("#extended_album_thumb_height").val(short_code['extended_album_thumb_height']);
                  jQuery("#extended_album_image_column_number").val(short_code['extended_album_image_column_number']);
                  jQuery("#extended_album_images_per_page").val(short_code['extended_album_images_per_page']);
                  jQuery("#extended_album_image_title_" + short_code['extended_album_image_title']).attr('checked', 'checked');
                  jQuery("#extended_album_image_thumb_width").val(short_code['extended_album_image_thumb_width']);
                  jQuery("#extended_album_image_thumb_height").val(short_code['extended_album_image_thumb_height']);
                  jQuery("#extended_albums_per_page_load_more").val(short_code['extended_albums_per_page_load_more']);
		  jQuery("#extended_album_load_more_image_count").val(short_code['extended_album_load_more_image_count']);
                  if (short_code['extended_album_enable_page'] == 1) {
                    jQuery("#extended_album_page_yes").attr('checked', 'checked');
                  }
                  else if (short_code['extended_album_enable_page'] == 0) {
                    jQuery("#extended_album_page_no").attr('checked', 'checked');
                  }
                   else if (short_code['extended_album_enable_page'] == 2) {
                    jQuery("#extended_album_page_loadmore").attr('checked', 'checked');
                  }
                  else if (short_code['extended_album_enable_page'] == 3){
                    jQuery("#extended_album_page_scrol_load").attr('checked', 'checked');
                  }
                  if (short_code['extended_album_view_type'] == 'thumbnail') {  
                    jQuery("#extended_album_view_type_1").attr('checked', 'checked');
                  }
                  else if(short_code['extended_album_view_type'] == 'masonry'){
                    jQuery("#extended_album_view_type_0").attr('checked', 'checked');
                  }
                  else{
                    jQuery("#extended_album_view_type_2").attr('checked', 'checked');
                  }
                  if (short_code['extended_album_mosaic_hor_ver'] == "vertical") {
                    jQuery("#extended_album_mosaic_ver").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#extended_album_mosaic_hor").attr('checked', 'checked');
                  }
                  if (short_code['extended_album_resizable_mosaic'] == 1) {
                    jQuery("#extended_album_resizable_mosaic_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#extended_album_resizable_mosaic_0").attr('checked', 'checked');
                  }
                  if (short_code['show_tag_box'] == 1) {
                    jQuery("#show_tag_box_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#show_tag_box_0").attr('checked', 'checked');
                  }
                  jQuery("#extended_album_mosaic_total_width").val(short_code['extended_album_mosaic_total_width']);
                  break;

                }
              }
              // Lightbox.
              if (short_code['gallery_type'] != 'slideshow') {
                jQuery("#popup_width").val(short_code['popup_width']);
                jQuery("#popup_height").val(short_code['popup_height']);
                jQuery("select[id=popup_effect] option[value='" + short_code['popup_effect'] + "']").attr('selected', 'selected');
                jQuery("#popup_interval").val(short_code['popup_interval']);
                jQuery("#popup_effect_duration").val(short_code['popup_effect_duration']);
                if (short_code['popup_fullscreen'] == 1) {
                  jQuery("#popup_fullscreen_1").attr('checked', 'checked'); 
                  jQuery("#tr_popup_width_height").css('display', 'none');
                }
                else {
                  jQuery("#popup_fullscreen_0").attr('checked', 'checked');
                  jQuery("#tr_popup_width_height").css('display', '');
                }
                if (short_code['popup_autoplay'] == 1) {
                  jQuery("#popup_autoplay_1").attr('checked', 'checked'); 
                }
                else {
                  jQuery("#popup_autoplay_0").attr('checked', 'checked');
                }
                if (short_code['popup_enable_filmstrip'] == 1) {
                  jQuery("#popup_filmstrip_yes").attr('checked', 'checked');
                  jQuery("#popup_filmstrip_height").val(short_code['popup_filmstrip_height']);
                  bwg_enable_disable('', 'tr_popup_filmstrip_height', 'popup_filmstrip_yes');
                }
                else {
                  jQuery("#popup_filmstrip_no").attr('checked', 'checked');
                }
                if (short_code['popup_enable_ctrl_btn'] == 1) {
                  jQuery("#popup_ctrl_btn_yes").attr('checked', 'checked');
                  bwg_enable_disable('', 'tbody_popup_ctrl_btn', 'popup_ctrl_btn_yes');
                  if (short_code['popup_enable_fullscreen'] == 1) {
                    jQuery("#popup_fullscreen_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_fullscreen_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_info'] == 1 || !short_code['popup_enable_info']) {
                    jQuery("#popup_info_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_info_no").attr('checked', 'checked');
                  }
                  if (short_code['show_tag_box'] == 0 || !short_code['show_tag_box']) {
                    jQuery("#show_tag_box_0").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#show_tag_box_1").attr('checked', 'checked');
                  }
                  if (short_code['popup_info_full_width'] == 1) {
                    jQuery("#popup_info_full_width_1").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_info_full_width_0").attr('checked', 'checked');
                  }
                  if (short_code['popup_info_always_show'] == 1 && short_code['popup_info_always_show']) {
                    jQuery("#popup_info_always_show_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_info_always_show_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_rate'] == 1 && short_code['popup_enable_rate']) {
                    jQuery("#popup_rate_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_rate_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_comment'] == 1) {
                    jQuery("#popup_comment_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_comment_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_hit_counter'] == 1 && short_code['popup_hit_counter']) {
                    jQuery("#popup_hit_counter_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_hit_counter_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_facebook'] == 1) {
                    jQuery("#popup_facebook_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_facebook_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_twitter'] == 1) {
                    jQuery("#popup_twitter_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_twitter_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_google'] == 1) {
                    jQuery("#popup_google_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_google_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_pinterest'] == 1) {
                    jQuery("#popup_pinterest_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_pinterest_no").attr('checked', 'checked');
                  }
                  if (short_code['popup_enable_tumblr'] == 1) {
                    jQuery("#popup_tumblr_yes").attr('checked', 'checked');
                  }
                  else {
                    jQuery("#popup_tumblr_no").attr('checked', 'checked');
                  }
                }
                else {
                  jQuery("#popup_ctrl_btn_no").attr('checked', 'checked');
                }
                if (!short_code['thumb_click_action'] || short_code['thumb_click_action'] == 'undefined' || short_code['thumb_click_action'] == 'open_lightbox') {
                  jQuery("#thumb_click_action_1").attr('checked', 'checked'); 
                }
                else if (short_code['thumb_click_action'] == 'redirect_to_url') {
                  jQuery("#thumb_click_action_2").attr('checked', 'checked');
                }
                else if (short_code['thumb_click_action'] == 'do_nothing') {
                  jQuery("#thumb_click_action_3").attr('checked', 'checked');
                }
                if (short_code['thumb_link_target'] == 1 || !short_code['thumb_link_target'] || short_code['thumb_link_target'] == 'undefined') {
                  jQuery("#thumb_link_target_yes").attr('checked', 'checked'); 
                }
                else {
                  jQuery("#thumb_link_target_no").attr('checked', 'checked');
                }
                bwg_thumb_click_action();
              }
              // Watermark.
              if (short_code['watermark_type'] == 'text') {
                jQuery("#watermark_type_text").attr('checked', 'checked');
                jQuery("#watermark_link").val(decodeURIComponent(short_code['watermark_link']));
                jQuery("#watermark_text").val(short_code['watermark_text']);
                jQuery("#watermark_font_size").val(short_code['watermark_font_size']);
                jQuery("select[id=watermark_font] option[value='" + short_code['watermark_font'] + "']").attr('selected', 'selected');
                jQuery("#watermark_color").val(short_code['watermark_color']);
                jQuery("#watermark_opacity").val(short_code['watermark_opacity']);
                jQuery("#watermark_type_text").attr('checked', 'checked');
                jQuery("#watermark_" + short_code['watermark_position']).attr('checked', 'checked');
              }
              else if (short_code['watermark_type'] == 'image') {
                jQuery("#watermark_type_image").attr('checked', 'checked');
                jQuery("#watermark_link").val(decodeURIComponent(short_code['watermark_link']));
                jQuery("#watermark_url").val(short_code['watermark_url']);
                jQuery("#watermark_width").val(short_code['watermark_width']);
                jQuery("#watermark_height").val(short_code['watermark_height']);
                jQuery("#watermark_opacity").val(short_code['watermark_opacity']);
                jQuery("#watermark_type_image").attr('checked', 'checked');
                jQuery("#watermark_" + short_code['watermark_position']).attr('checked', 'checked');
              }
              else {
                jQuery("#watermark_type_none").attr('checked', 'checked');
              }
              bwg_watermark('watermark_type_' + short_code['watermark_type']);
              bwg_gallery_type(short_code['gallery_type']);
            }
          }
          // Get shortcodes attributes.
          function get_params(module_name) {
            <?php if (!$from_menu) { ?>
            var selected_text = tinyMCE.activeEditor.selection.getContent();
            <?php } else { ?>
            var selected_text = jQuery("#bwg_shortcode").val();
            <?php } ?>
            var module_start_index = selected_text.indexOf("[" + module_name);
            var module_end_index = selected_text.indexOf("]", module_start_index);
            var module_str = "";
            if ((module_start_index >= 0) && (module_end_index >= 0)) {
              module_str = selected_text.substring(module_start_index + 1, module_end_index);
            }
            else {
              return false;
            }
            var params_str = module_str.substring(module_str.indexOf(" ") + 1);
            var key_values = params_str.split('" ');
            var short_code_attr = new Array();
            for (var key in key_values) {
              var short_code_index = key_values[key].split('=')[0];
              var short_code_value = key_values[key].split('=')[1];
              short_code_value = short_code_value.replace(/\"/g, '');
              short_code_attr[short_code_index] = short_code_value;
            }
            return short_code_attr;
          }
          function get_short_params(tagtext) {
            var params_str = tagtext.substring(tagtext.indexOf(" ") + 1);
            var key_values = params_str.split('" ');
            var short_code_attr = new Array();
            for (var key in key_values) {
              var short_code_index = key_values[key].split('=')[0];
              var short_code_value = key_values[key].split('=')[1];
              short_code_value = short_code_value.replace(/\"/g, '');
              short_code_attr[short_code_index] = short_code_value;
            }
            return short_code_attr;
          }
          function bwg_insert_shortcode(content) {
            window.parent.window.jQuery(window.parent.document).trigger("onOpenShortcode");
            var gallery_type = jQuery("input[name=gallery_type]:checked").val();
            var theme = jQuery("#theme").val();
            var title = "";
            var short_code = '[Best_Wordpress_Gallery';
            var tagtext = ' gallery_type="' + gallery_type + '" theme_id="' + theme + '"';
            switch (gallery_type) {
              case 'thumbnails': {
                tagtext += ' gallery_id="' + jQuery("#gallery").val() + '"';
                tagtext += ' sort_by="' + jQuery("#sort_by").val() + '"';
                tagtext += ' order_by="' + jQuery("input[name=order_by]:checked").val() + '"';
                tagtext += ' show_search_box="' + jQuery("input[name=show_search_box]:checked").val() + '"';
                tagtext += ' show_sort_images="' + jQuery("input[name=show_sort_images]:checked").val() + '"';
                tagtext += ' search_box_width="' + jQuery("#search_box_width").val() + '"';
                tagtext += ' image_column_number="' + jQuery("#image_column_number").val() + '"';
                tagtext += ' images_per_page="' + jQuery("#images_per_page").val() + '"';
                tagtext += ' image_title="' + jQuery("input[name=image_title]:checked").val() + '"';
                tagtext += ' image_enable_page="' + jQuery("input[name=image_enable_page]:checked").val() + '"';
                tagtext += ' thumb_width="' + jQuery("#thumb_width").val() + '"';
                tagtext += ' thumb_height="' + jQuery("#thumb_height").val() + '"';
                title = ' gal_title="' + jQuery.trim(jQuery('#gallery option:selected').text().replace("'", "").replace('"', '')) + '"';
                tagtext += ' load_more_image_count="' + jQuery("#load_more_image_count").val() + '"';
                tagtext += ' show_tag_box="' + jQuery("input[name=show_tag_box]:checked").val() + '"';
                break;

              }
              case 'slideshow': {
                tagtext += ' gallery_id="' + jQuery("#gallery").val() + '"';
                tagtext += ' sort_by="' + jQuery("#sort_by").val() + '"';
                tagtext += ' order_by="' + jQuery("input[name=order_by]:checked").val() + '"';
                tagtext += ' slideshow_effect="' + jQuery("#slideshow_effect").val() + '"';
                tagtext += ' slideshow_interval="' + jQuery("#slideshow_interval").val() + '"';
                tagtext += ' slideshow_width="' + jQuery("#slideshow_width").val() + '"';
                tagtext += ' slideshow_height="' + jQuery("#slideshow_height").val() + '"';
                tagtext += ' enable_slideshow_autoplay="' + jQuery("input[name=enable_slideshow_autoplay]:checked").val() + '"';
                tagtext += ' enable_slideshow_shuffle="' + jQuery("input[name=enable_slideshow_shuffle]:checked").val() + '"';
                tagtext += ' enable_slideshow_ctrl="' + jQuery("input[name=enable_slideshow_ctrl]:checked").val() + '"';
                tagtext += ' enable_slideshow_filmstrip="' + jQuery("input[name=enable_slideshow_filmstrip]:checked").val() + '"';
                tagtext += ' slideshow_filmstrip_height="' + jQuery("#slideshow_filmstrip_height").val() + '"';
                tagtext += ' slideshow_enable_title="' + jQuery("input[name=slideshow_enable_title]:checked").val() + '"';
                tagtext += ' slideshow_title_position="' + jQuery("input[name=slideshow_title_position]:checked").val() + '"';
                tagtext += ' slideshow_title_full_width="' + jQuery("input[name=slideshow_title_full_width]:checked").val() + '"';  				
                tagtext += ' slideshow_enable_description="' + jQuery("input[name=slideshow_enable_description]:checked").val() + '"';
                tagtext += ' slideshow_description_position="' + jQuery("input[name=slideshow_description_position]:checked").val() + '"';
                tagtext += ' enable_slideshow_music="' + jQuery("input[name=enable_slideshow_music]:checked").val() + '"';
                tagtext += ' slideshow_music_url="' + jQuery("#slideshow_music_url").val() + '"';
								title = ' gal_title="' + jQuery.trim(jQuery('#gallery option:selected').text().replace("'", "").replace('"', '')) + '"';
                tagtext += ' slideshow_effect_duration="' + jQuery("#slideshow_effect_duration").val() + '"';
                break;

              }
              case 'image_browser': {
                tagtext += ' gallery_id="' + jQuery("#gallery").val() + '"';
                tagtext += ' sort_by="' + jQuery("#sort_by").val() + '"';
                tagtext += ' order_by="' + jQuery("input[name=order_by]:checked").val() + '"';
                tagtext += ' show_search_box="' + jQuery("input[name=show_search_box]:checked").val() + '"';
                tagtext += ' search_box_width="' + jQuery("#search_box_width").val() + '"';
                tagtext += ' image_browser_width="' + jQuery("#image_browser_width").val() + '"';
                tagtext += ' image_browser_title_enable="' + jQuery("input[name=image_browser_title_enable]:checked").val() + '"';
                tagtext += ' image_browser_description_enable="' + jQuery("input[name=image_browser_description_enable]:checked").val() + '"';
								title = ' gal_title="' + jQuery.trim(jQuery('#gallery option:selected').text().replace("'", "").replace('"', '')) + '"';
                break;

              }
              case 'album_compact_preview': {
                tagtext += ' album_id="' + jQuery("#album").val() + '"';
                tagtext += ' sort_by="' + jQuery("#sort_by").val() + '"';
                tagtext += ' order_by="' + jQuery("input[name=order_by]:checked").val() + '"';
                tagtext += ' show_search_box="' + jQuery("input[name=show_search_box]:checked").val() + '"';
								tagtext += ' show_sort_images="' + jQuery("input[name=show_sort_images]:checked").val() + '"';
                tagtext += ' search_box_width="' + jQuery("#search_box_width").val() + '"';
                tagtext += ' compuct_album_column_number="' + jQuery("#compuct_album_column_number").val() + '"';
                tagtext += ' compuct_albums_per_page="' + jQuery("#compuct_albums_per_page").val() + '"';
                tagtext += ' compuct_album_title="' + jQuery("input[name=compuct_album_title]:checked").val() + '"';
                tagtext += ' compuct_album_view_type="' + jQuery("input[name=compuct_album_view_type]:checked").val() + '"';
                tagtext += ' compuct_album_mosaic_hor_ver="' + jQuery("input[name=compuct_album_mosaic_hor_ver]:checked").val() + '"';
                tagtext += ' compuct_album_resizable_mosaic="' + jQuery("input[name=compuct_album_resizable_mosaic]:checked").val() + '"';
                tagtext += ' compuct_album_mosaic_total_width="' + jQuery("#compuct_album_mosaic_total_width").val() + '"';
                tagtext += ' compuct_album_thumb_width="' + jQuery("#compuct_album_thumb_width").val() + '"';
                tagtext += ' compuct_album_thumb_height="' + jQuery("#compuct_album_thumb_height").val() + '"';
                tagtext += ' compuct_album_image_column_number="' + jQuery("#compuct_album_image_column_number").val() + '"';
                tagtext += ' compuct_album_images_per_page="' + jQuery("#compuct_album_images_per_page").val() + '"';
                tagtext += ' compuct_album_image_title="' + jQuery("input[name=compuct_album_image_title]:checked").val() + '"';
                tagtext += ' compuct_album_image_thumb_width="' + jQuery("#compuct_album_image_thumb_width").val() + '"';
                tagtext += ' compuct_album_image_thumb_height="' + jQuery("#compuct_album_image_thumb_height").val() + '"';
                tagtext += ' compuct_album_enable_page="' + jQuery("input[name=compuct_album_enable_page]:checked").val() + '"';
                tagtext += ' compuct_album_load_more_image_count="' + jQuery("#compuct_album_load_more_image_count").val() + '"';
                tagtext += ' compuct_albums_per_page_load_more="' + jQuery("#compuct_albums_per_page_load_more").val() + '"';
                tagtext += ' show_tag_box="' + jQuery("input[name=show_tag_box]:checked").val() + '"';
								title = ' gal_title="' + jQuery.trim(jQuery('#album option:selected').text().replace("'", "").replace('"', '')) + '"';
                break;

              }
              case 'album_extended_preview': {
                tagtext += ' album_id="' + jQuery("#album").val() + '"';
                tagtext += ' sort_by="' + jQuery("#sort_by").val() + '"';
                tagtext += ' order_by="' + jQuery("input[name=order_by]:checked").val() + '"';
                tagtext += ' show_search_box="' + jQuery("input[name=show_search_box]:checked").val() + '"';
								tagtext += ' show_sort_images="' + jQuery("input[name=show_sort_images]:checked").val() + '"';
                tagtext += ' search_box_width="' + jQuery("#search_box_width").val() + '"';
                tagtext += ' extended_albums_per_page="' + jQuery("#extended_albums_per_page").val() + '"';
                tagtext += ' extended_album_height="' + jQuery("#extended_album_height").val() + '"';
                tagtext += ' extended_album_description_enable="' + jQuery("input[name=extended_album_description_enable]:checked").val() + '"';
                tagtext += ' extended_album_view_type="' + jQuery("input[name=extended_album_view_type]:checked").val() + '"';
                tagtext += ' extended_album_mosaic_hor_ver="' + jQuery("input[name=extended_album_mosaic_hor_ver]:checked").val() + '"';
                tagtext += ' extended_album_resizable_mosaic="' + jQuery("input[name=extended_album_resizable_mosaic]:checked").val() + '"';
                tagtext += ' extended_album_mosaic_total_width="' + jQuery("#extended_album_mosaic_total_width").val() + '"';
                tagtext += ' extended_album_thumb_width="' + jQuery("#extended_album_thumb_width").val() + '"';
                tagtext += ' extended_album_thumb_height="' + jQuery("#extended_album_thumb_height").val() + '"';
                tagtext += ' extended_album_image_column_number="' + jQuery("#extended_album_image_column_number").val() + '"';
                tagtext += ' extended_album_images_per_page="' + jQuery("#extended_album_images_per_page").val() + '"';
                tagtext += ' extended_album_image_title="' + jQuery("input[name=extended_album_image_title]:checked").val() + '"';
                tagtext += ' extended_album_image_thumb_width="' + jQuery("#extended_album_image_thumb_width").val() + '"';
                tagtext += ' extended_album_image_thumb_height="' + jQuery("#extended_album_image_thumb_height").val() + '"';
                tagtext += ' extended_album_enable_page="' + jQuery("input[name=extended_album_enable_page]:checked").val() + '"';
                tagtext += ' extended_album_load_more_image_count="' + jQuery("#extended_album_load_more_image_count").val() + '"';
                tagtext += ' extended_albums_per_page_load_more="' + jQuery("#extended_albums_per_page_load_more").val() + '"';
                tagtext += ' show_tag_box="' + jQuery("input[name=show_tag_box]:checked").val() + '"';
								title = ' gal_title="' + jQuery.trim(jQuery('#album option:selected').text().replace("'", "").replace('"', '')) + '"';
                break;

              }
            }
            // Lightbox paramteres.
            if (gallery_type != 'slideshow') {
              tagtext += ' thumb_click_action="' + jQuery("input[name=thumb_click_action]:checked").val() + '"';
              tagtext += ' thumb_link_target="' + jQuery("input[name=thumb_link_target]:checked").val() + '"';
              tagtext += ' popup_fullscreen="' + jQuery("input[name=popup_fullscreen]:checked").val() + '"';
              tagtext += ' popup_autoplay="' + jQuery("input[name=popup_autoplay]:checked").val() + '"';			  
              tagtext += ' popup_width="' + jQuery("#popup_width").val() + '"';
              tagtext += ' popup_height="' + jQuery("#popup_height").val() + '"';
              tagtext += ' popup_effect="' + jQuery("#popup_effect").val() + '"';
              tagtext += ' popup_interval="' + jQuery("#popup_interval").val() + '"';
              tagtext += ' popup_enable_filmstrip="' + jQuery("input[name=popup_enable_filmstrip]:checked").val() + '"';
              tagtext += ' popup_filmstrip_height="' + jQuery("#popup_filmstrip_height").val() + '"';
              tagtext += ' popup_enable_ctrl_btn="' + jQuery("input[name=popup_enable_ctrl_btn]:checked").val() + '"';
              tagtext += ' popup_enable_fullscreen="' + jQuery("input[name=popup_enable_fullscreen]:checked").val() + '"';
              tagtext += ' popup_enable_info="' + jQuery("input[name=popup_enable_info]:checked").val() + '"';
              tagtext += ' popup_info_always_show="' + jQuery("input[name=popup_info_always_show]:checked").val() + '"';
              tagtext += ' popup_info_full_width="' + jQuery("input[name=popup_info_full_width]:checked").val() + '"';
              tagtext += ' popup_enable_rate="' + jQuery("input[name=popup_enable_rate]:checked").val() + '"';
              tagtext += ' popup_enable_comment="' + jQuery("input[name=popup_enable_comment]:checked").val() + '"';
              tagtext += ' popup_hit_counter="' + jQuery("input[name=popup_hit_counter]:checked").val() + '"';
              tagtext += ' popup_enable_facebook="' + jQuery("input[name=popup_enable_facebook]:checked").val() + '"';
              tagtext += ' popup_enable_twitter="' + jQuery("input[name=popup_enable_twitter]:checked").val() + '"';
              tagtext += ' popup_enable_google="' + jQuery("input[name=popup_enable_google]:checked").val() + '"';
              tagtext += ' popup_enable_pinterest="' + jQuery("input[name=popup_enable_pinterest]:checked").val() + '"';
              tagtext += ' popup_enable_tumblr="' + jQuery("input[name=popup_enable_tumblr]:checked").val() + '"';
              tagtext += ' show_tag_box="' + jQuery("input[name=show_tag_box]:checked").val() + '"';
              tagtext += ' popup_effect_duration="' + jQuery("#popup_effect_duration").val() + '"';
            }
            // Watermark parameters.
            tagtext += ' watermark_type="' + jQuery("input[name=watermark_type]:checked").val() + '"';
            tagtext += ' watermark_link="' + (jQuery("#watermark_link").val()) + '"';
            if (jQuery("input[name=watermark_type]:checked").val() == 'text') {
              tagtext += ' watermark_text="' + jQuery("#watermark_text").val() + '"';
              tagtext += ' watermark_font_size="' + jQuery("#watermark_font_size").val() + '"';
              tagtext += ' watermark_font="' + jQuery("#watermark_font").val() + '"';
              tagtext += ' watermark_color="' + jQuery("#watermark_color").val() + '"';
              tagtext += ' watermark_opacity="' + jQuery("#watermark_opacity").val() + '"';
              tagtext += ' watermark_position="' + jQuery("input[name=watermark_position]:checked").val() + '"';
            }
            else if (jQuery("input[name=watermark_type]:checked").val() == 'image') {
              tagtext += ' watermark_url="' + jQuery("#watermark_url").val() + '"';
              tagtext += ' watermark_width="' + jQuery("#watermark_width").val() + '"';
              tagtext += ' watermark_height="' + jQuery("#watermark_height").val() + '"';
              tagtext += ' watermark_opacity="' + jQuery("#watermark_opacity").val() + '"';
              tagtext += ' watermark_position="' + jQuery("input[name=watermark_position]:checked").val() + '"';
            }
            short_code += ' id="' + shortcode_id + '"' + title + ']';
            var short_id = ' id="' + shortcode_id + '"' + title;
            short_code = short_code.replace(/\[Best_Wordpress_Gallery([^\]]*)\]/g, function(d, c) {
              return "<img src='<?php echo WD_BWG_URL; ?>/images/bwg_shortcode.png' class='bwg_shortcode mceItem' title='Best_Wordpress_Gallery" + short_id + "' />";
            });
            jQuery("#task").val("save");
            jQuery("#tagtext").val(tagtext);
            jQuery("#currrent_id").val(shortcode_id);
            jQuery("#title").val(title);
            jQuery("#bwg_insert").val((content && !bwg_insert) ? 0 : 1);
            jQuery("#bwg_shortcode_form").submit();
            <?php if (!$from_menu) { ?>
            if (window.tinymce.isIE && content) {
              // IE and Update.
              var all_content = tinyMCE.activeEditor.getContent();
              all_content = all_content.replace('<p></p><p>[Best_Wordpress_Gallery', '<p>[Best_Wordpress_Gallery');
              tinyMCE.activeEditor.setContent(all_content.replace(content, '[Best_Wordpress_Gallery id="' + shortcode_id + '"' + title + ']'));
            }
            else {
              window.tinyMCE.execCommand('mceInsertContent', false, short_code);
            }
            tinyMCEPopup.editor.execCommand('mceRepaint');
            <?php } else { ?>
            jQuery("#bwg_shortcode").val('[Best_Wordpress_Gallery id="' + shortcode_id + '"' + title + ']');
            <?php } ?>
          }
          jQuery(document).ready(function () {
            bwg_loadmore();
          });
          var bwg_image_thumb = '<?php addslashes(__('Image thumbnail dimensions:', 'bwg_back')); ?>';
          var bwg_image_thumb_width = '<?php addslashes(__('Image thumbnail width: ', 'bwg_back')); ?>';
          var bwg_max_column = '<?php addslashes(__('Max. number of image columns:', 'bwg_back')); ?>';
          var bwg_image_thumb_height = '<?php addslashes(__('Image thumbnail height:', 'bwg_back')); ?>';
        </script>
      </body>
    </html>
    <?php
    include_once (WD_BWG_DIR .'/includes/bwg_pointers.php');
    new BWG_pointers();
    die();
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