<?php

class BWGViewOptions_bwg {
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
  public function display($reset = FALSE) {
    if (isset($_GET['bwg_start_tour']) && $_GET['bwg_start_tour'] == '1') {
      update_user_meta(get_current_user_id(), 'bwg_photo_gallery', '1');
      WDWLibrary::spider_redirect('admin.php?page=options_bwg');
    }
    global $WD_BWG_UPLOAD_DIR;
    ?>
    <div style="clear: both; float: left; width: 99%;">
      <div style="float:left; font-size: 14px; font-weight: bold;">
        <?php _e("This section allows you to change settings for different views and general options.", 'bwg_back'); ?>
        <a style="color: blue; text-decoration: none;" target="_blank" href="https://web-dorado.com/wordpress-gallery/editing-options/global-options.html"><?php _e("Read More in User Manual", 'bwg_back'); ?></a>
      </div>
      <div style="float: right; text-align: right;">
        <a style="text-decoration: none;" target="_blank" href="https://web-dorado.com/files/fromPhotoGallery.php">
          <img width="215" border="0" alt="web-dorado.com" src="<?php echo WD_BWG_URL . '/images/logo.png'; ?>" />
        </a>
      </div>
    </div>
    <script>
      function bwg_add_music(files) {
        document.getElementById("slideshow_audio_url").value = files[0]['url'];
      }
      function bwg_add_built_in_watermark_image(files) {
        document.getElementById("built_in_watermark_url").value = '<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR; ?>' + files[0]['url'];
      }
      function bwg_add_watermark_image(files) {
        document.getElementById("watermark_url").value = '<?php echo site_url() . '/' . $WD_BWG_UPLOAD_DIR; ?>' + files[0]['url'];
      }
    </script>
    <?php
    $row = $this->model->get_row_data($reset);
    $built_in_watermark_fonts = array();
    foreach (scandir(path_join(WD_BWG_DIR, 'fonts')) as $filename) {
			if (strpos($filename, '.') === 0) continue;
			else $built_in_watermark_fonts[] = $filename;
		}
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
    $effects = array(
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
    ?>
    <form method="post" class="wrap bwg_form" action="admin.php?page=options_bwg" style="float: left; width: 99%;">      
      <?php wp_nonce_field( 'options_bwg', 'bwg_nonce' ); ?>
      <span class="option-icon"></span>
      <h2 id="ed_options"><?php _e("Edit options", 'bwg_back'); ?></h2>
      <div style="display: inline-block; width: 100%;">
        <div style="float: right;">
          <input class="button-primary" type="submit" onclick="if (spider_check_required('title', 'Title')) {return false;}; spider_set_input_value('task', 'save')" value="<?php _e("Save", 'bwg_back'); ?>" />
          <input class="button-secondary" type="submit" onclick="if (confirm('<?php echo addslashes(__("Do you want to reset to default?", 'bwg_back')); ?>')) {
                                                                 spider_set_input_value('task', 'reset');
                                                               } else {
                                                                 return false;
                                                               }" value="<?php _e("Reset all options", 'bwg_back'); ?>" />
        </div>
      </div>
      <div style="display: none; width: 100%;" id="display_panel">
        <div style="float:left;">
          <div id="div_1" class="gallery_type" onclick="bwg_change_option_type('1')"> <?php _e("Global options", 'bwg_back'); ?></div><br/>
          <div id="div_8" class="gallery_type" onclick="bwg_change_option_type('8')"> <?php _e("Watermark", 'bwg_back'); ?></div><br/>
          <div id="div_2" class="gallery_type" onclick="bwg_change_option_type('2')"> <?php _e("Advertisement", 'bwg_back'); ?></div><br/>
          <div id="div_3" class="gallery_type" onclick="bwg_change_option_type('3')"> <?php _e("Lightbox", 'bwg_back'); ?></div><br/>
          <div id="div_4" class="gallery_type" onclick="bwg_change_option_type('4')"> <?php _e("Album options", 'bwg_back'); ?></div><br/>
          <div id="div_5" class="gallery_type" onclick="bwg_change_option_type('5')"> <?php _e("Slideshow", 'bwg_back'); ?></div><br/>
          <div id="div_6" class="gallery_type" onclick="bwg_change_option_type('6')"> <?php _e("Thumbnail options", 'bwg_back'); ?></div><br/>
          <div id="div_7" class="gallery_type" onclick="bwg_change_option_type('7')"> <?php _e("Image options", 'bwg_back'); ?></div><br/>
          <div id="div_9" class="gallery_type" onclick="bwg_change_option_type('9')"> <?php _e("Embed options", 'bwg_back'); ?></div><br/>
	  <div id="div_10" class="gallery_type" onclick="bwg_change_option_type('10')"> <?php _e("Carousel", 'bwg_back'); ?></div><br/>
          <input type="hidden" id="type" name="type" value="<?php echo (isset($_POST["type"]) ? esc_html(stripslashes($_POST["type"])) : "1"); ?>"/>
        </div>

        <!--Global options-->
        <div class="spider_div_options" id="div_content_1">
          <table>
            <tbody>
             <tr>
                <td class="spider_label_options">
                  <label><?php echo __('Introduction tour:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <a href="admin.php?page=options_bwg&bwg_start_tour=1" class="button" title="<?php echo _e('Start tour', 'bwg_back'); ?>">
                    <?php _e('Start tour', 'bwg_back'); ?>
                  </a>
                  <div class="spider_description"><?php echo __('Take this tour to quickly learn about the use of this plugin.', 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="images_directory"><?php _e("Images directory:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input id="images_directory" name="images_directory" type="text" style="display:inline-block; width:100%;" value="<?php echo $row->images_directory; ?>" />
                  <input type="hidden" id="old_images_directory" name="old_images_directory" value="<?php echo $row->old_images_directory; ?>"/>
                  <div class="spider_description"><?php _e("Input an existing directory inside the Wordpress directory to store uploaded images.<br />Old directory content will be moved to the new one.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="upload_img_width"><?php _e("Image dimensions:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="upload_img_width" id="upload_img_width" value="<?php echo $row->upload_img_width; ?>" class="spider_int_input" /> x 
                  <input type="text" name="upload_img_height" id="upload_img_height" value="<?php echo $row->upload_img_height; ?>" class="spider_int_input" /> px
                  <div class="spider_description"><?php _e("The maximum size of the uploaded image (0 for original size).", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Right click protection:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="image_right_click" id="image_right_click_1" value="1" <?php if ($row->image_right_click) echo 'checked="checked"'; ?> /><label for="image_right_click_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="image_right_click" id="image_right_click_0" value="0" <?php if (!$row->image_right_click) echo 'checked="checked"'; ?> /><label for="image_right_click_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"><?php _e("Disable image right click possibility.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr style="display: none;">
                <td class="spider_label_options">
                  <label><?php _e("Gallery role:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="gallery_role" id="gallery_role_1" value="1" <?php if ($row->gallery_role) echo 'checked="checked"'; ?> /><label for="gallery_role_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="gallery_role" id="gallery_role_0" value="0" <?php if (!$row->gallery_role) echo 'checked="checked"'; ?> /><label for="gallery_role_0">No</label>
                  <div class="spider_description">Only author can change a gallery.</div>
                </td>
              </tr>
              <tr style="display: none;">
                <td class="spider_label_options">
                  <label>Album role:</label>
                </td>
                <td>
                  <input type="radio" name="album_role" id="album_role_1" value="1" <?php if ($row->album_role) echo 'checked="checked"'; ?> /><label for="album_role_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="album_role" id="album_role_0" value="0" <?php if (!$row->album_role) echo 'checked="checked"'; ?> /><label for="album_role_0">No</label>
                  <div class="spider_description">Only author can change an album.</div>
                </td>
              </tr>
              <tr style="display: none;">
                <td class="spider_label_options">
                  <label>Image role:</label>
                </td>
                <td>
                  <input type="radio" name="image_role" id="image_role_1" value="1" <?php if ($row->image_role) echo 'checked="checked"'; ?> /><label for="image_role_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="image_role" id="image_role_0" value="0" <?php if (!$row->image_role) echo 'checked="checked"'; ?> /><label for="image_role_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"><?php _e("Only author can change an image.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php echo __('Show search box:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="show_search_box" id="show_search_box_1" value="1" <?php if ($row->show_search_box) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_search_box_width', 'show_search_box_1'); bwg_enable_disable('', 'tr_search_box_placeholder', 'show_search_box_1')" /><label for="show_search_box_1"><?php echo __('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="show_search_box" id="show_search_box_0" value="0" <?php if (!$row->show_search_box) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_search_box_width', 'show_search_box_0'); bwg_enable_disable('none', 'tr_search_box_placeholder', 'show_search_box_0')" /><label for="show_search_box_0"><?php echo __('No', 'bwg_back'); ?></label>
                 <div class="spider_description"></div>
                </td>
              </tr>
	      <tr id="tr_search_box_placeholder">
                <td class="spider_label_options">
                  <label for="placeholder"><?php echo __('Add placeholder to search:', 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="placeholder" id="placeholder" value="<?php echo $row->placeholder; ?>"  /> 
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr id="tr_search_box_width">
                <td class="spider_label_options">
                  <label for="search_box_width"><?php _e('Search box width:', 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="search_box_width" id="search_box_width" value="<?php echo $row->search_box_width; ?>" class="spider_int_input" /> px
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Show "Order by" dropdown list:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="show_sort_images" id="show_sort_images_1" value="1" <?php if ($row->show_sort_images) echo 'checked="checked"'; ?> /><label for="show_sort_images_1"><?php _e('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="show_sort_images" id="show_sort_images_0" value="0" <?php if (!$row->show_sort_images) echo 'checked="checked"'; ?> /><label for="show_sort_images_0"><?php _e('No', 'bwg_back'); ?></label>
                 <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Show tag box:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="show_tag_box" id="show_tag_box_1" value="1" <?php if ($row->show_tag_box) echo 'checked="checked"'; ?> /><label for="show_tag_box_1"><?php _e('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="show_tag_box" id="show_tag_box_0" value="0" <?php if (!$row->show_tag_box) echo 'checked="checked"'; ?> /><label for="show_tag_box_0"><?php _e('No', 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Preload images:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="preload_images" id="preload_images_1" value="1" <?php if ($row->preload_images) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_preload_images_count', 'preload_images_1')" /><label for="preload_images_1"><?php _e('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="preload_images" id="preload_images_0" value="0" <?php if (!$row->preload_images) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_preload_images_count', 'preload_images_0')" /><label for="preload_images_0"><?php _e('No', 'bwg_back'); ?></label>
                 <div class="spider_description"></div>
                </td>
              </tr>	
              <tr id="tr_preload_images_count">
                <td class="spider_label_options">
                  <label for="preload_images_count"><?php _e('Count of images:', 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="preload_images_count" id="preload_images_count" value="<?php echo $row->preload_images_count; ?>" class="spider_int_input" />
                  <div class="spider_description"><?php _e('Count of images to preload (0 for all).', 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Import from Media Library:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="enable_ML_import" id="enable_ML_import_1" value="1" <?php if ($row->enable_ML_import) echo 'checked="checked"'; ?> /><label for="enable_ML_import_1"><?php _e('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="enable_ML_import" id="enable_ML_import_0" value="0" <?php if (!$row->enable_ML_import) echo 'checked="checked"'; ?> /><label for="enable_ML_import_0"><?php _e('No', 'bwg_back'); ?></label>
                 <div class="spider_description"><?php _e('Enable import from Media Library in file manager.', 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Enable href attribute:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="enable_seo" id="enable_seo_1" value="1" <?php if ($row->enable_seo) echo 'checked="checked"'; ?> /><label for="enable_seo_1"><?php _e('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="enable_seo" id="enable_seo_0" value="0" <?php if (!$row->enable_seo) echo 'checked="checked"'; ?> /><label for="enable_seo_0"><?php _e('No', 'bwg_back'); ?></label>
                 <div class="spider_description"><?php _e('Disable this option only if it conflicts with your theme.', 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Meta auto-fill:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="read_metadata" id="read_metadata_1" value="1" <?php if ($row->read_metadata) echo 'checked="checked"'; ?> /><label for="read_metadata_1"><?php _e('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="read_metadata" id="read_metadata_0" value="0" <?php if (!$row->read_metadata) echo 'checked="checked"'; ?> /><label for="read_metadata_0"><?php _e('No', 'bwg_back'); ?></label>
                  <div class="spider_description"><?php _e('Enabling this option the meta description of the image will be automatically filled in image description field.', 'bwg_back'); ?></div>
                </td>
              </tr>

              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Show/hide custom post types:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="show_hide_custom_post" id="show_hide_custom_post_1" value="1" <?php if ($row->show_hide_custom_post) echo 'checked="checked"'; ?> /><label for="show_hide_custom_post_1"><?php _e('Yes', 'bwg_back'); ?></label>
                  <input type="radio" name="show_hide_custom_post" id="show_hide_custom_post_0" value="0" <?php if (!$row->show_hide_custom_post) echo 'checked="checked"'; ?> /><label for="show_hide_custom_post_0"><?php _e('No', 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e('Show/hide comments for custom post types:', 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="show_hide_post_meta" id="show_hide_post_meta_1" value="1" <?php if ($row->show_hide_post_meta) echo 'checked="checked"'; ?> /><label for="show_hide_post_meta_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="show_hide_post_meta" id="show_hide_post_meta_0" value="0" <?php if (!$row->show_hide_post_meta) echo 'checked="checked"'; ?> /><label for="show_hide_post_meta_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <!--Watermark-->
        <div class="spider_div_options" id="div_content_8">
          <table style="width: 100%;">
            <tr>
              <td style="width: 50%; vertical-align: top; height: 100%; display: table-cell;">
                <table>
                  <tbody>
                    <tr id="tr_built_in_watermark_type">
                      <td class="spider_label_options">
                        <label><?php _e('Watermark type: ', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="built_in_watermark_type" id="built_in_watermark_type_none" value="none" <?php if ($row->built_in_watermark_type == 'none') echo 'checked="checked"'; ?> onClick="bwg_built_in_watermark('watermark_type_none')" />
                          <label for="built_in_watermark_type_none"><?php _e('None', 'bwg_back'); ?></label>
                        <input type="radio" name="built_in_watermark_type" id="built_in_watermark_type_text" value="text" <?php if ($row->built_in_watermark_type == 'text') echo 'checked="checked"'; ?> onClick="bwg_built_in_watermark('watermark_type_text')" onchange="preview_built_in_watermark()" />
                          <label for="built_in_watermark_type_text"><?php _e('Text', 'bwg_back'); ?></label>
                        <input type="radio" name="built_in_watermark_type" id="built_in_watermark_type_image" value="image" <?php if ($row->built_in_watermark_type == 'image') echo 'checked="checked"'; ?> onClick="bwg_built_in_watermark('watermark_type_image')" onchange="preview_built_in_watermark()" />
                          <label for="built_in_watermark_type_image"><?php _e('Image', 'bwg_back'); ?></label>
                          <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_built_in_watermark_url">
                      <td class="spider_label_options">
                        <label for="built_in_watermark_url"><?php _e('Watermark url: ', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="text" id="built_in_watermark_url" name="built_in_watermark_url" style="width: 68%;" value="<?php echo $row->built_in_watermark_url; ?>" style="display:inline-block;" onchange="preview_built_in_watermark()" />
                        <?php
                        $query_url = add_query_arg(array('action' => 'addImages', 'width' => '700', 'height' => '550', 'extensions' => 'png', 'callback' => 'bwg_add_built_in_watermark_image'), admin_url('admin-ajax.php'));
                        $query_url = wp_nonce_url( $query_url, 'addImages', 'bwg_nonce' );
                        $query_url =  add_query_arg(array('TB_iframe' => '1'), $query_url );
                        ?>
                        <a href="<?php echo $query_url; ?>" id="button_add_built_in_watermark_image" class="button-primary thickbox thickbox-preview"
                           title="Add image" 
                           onclick="return false;"
                           style="margin-bottom:5px;">
                          <?php _e('Add Image', 'bwg_back'); ?>
                        </a>
                        <div class="spider_description"><?php _e('Only .png format is supported.', 'bwg_back'); ?></div>
                      </td>
                    </tr>                    
                    <tr id="tr_built_in_watermark_text">
                      <td class="spider_label_options">
                        <label for="built_in_watermark_text"><?php _e('Watermark text: ', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="text" name="built_in_watermark_text" id="built_in_watermark_text" style="width: 100%;" value="<?php echo $row->built_in_watermark_text; ?>" onchange="preview_built_in_watermark()" onkeypress="preview_built_in_watermark()" />
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_built_in_watermark_size">
                      <td class="spider_label_options">
                        <label for="built_in_watermark_size"><?php _e('Watermark size: ', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="text" name="built_in_watermark_size" id="built_in_watermark_size" value="<?php echo $row->built_in_watermark_size; ?>" class="spider_int_input" onchange="preview_built_in_watermark()" /> %
                        <div class="spider_description"><?php _e('Enter size of watermark in percents according to image.', 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_built_in_watermark_font_size">
                      <td class="spider_label_options">
                        <label for="built_in_watermark_font_size"><?php _e('Watermark font size:', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="text" name="built_in_watermark_font_size" id="built_in_watermark_font_size" value="<?php echo $row->built_in_watermark_font_size; ?>" class="spider_int_input" onchange="preview_built_in_watermark()" /> 
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_built_in_watermark_font">
                      <td class="spider_label_options">
                        <label for="built_in_watermark_font"><?php _e('Watermark font style: ', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <select name="built_in_watermark_font" id="built_in_watermark_font" style="width:150px;" onchange="preview_built_in_watermark()">
                          <?php
                          foreach ($built_in_watermark_fonts as $watermark_font) {
                            ?>
                            <option value="<?php echo $watermark_font; ?>" <?php if ($row->built_in_watermark_font == $watermark_font) echo 'selected="selected"'; ?>><?php echo $watermark_font; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                        <?php 
                          foreach ($built_in_watermark_fonts as $watermark_font) {
                            ?>
                            <style>
                            @font-face {
                              font-family: <?php echo 'bwg_' . str_replace('.ttf', '', $watermark_font); ?>;
                              src: url("<?php echo WD_BWG_URL . '/fonts/' . $watermark_font; ?>");
                             }
                            </style>
                            <?php
                          }
                        ?>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_built_in_watermark_color">
                      <td class="spider_label_options">
                        <label for="built_in_watermark_color"><?php _e('Watermark color:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="built_in_watermark_color" id="built_in_watermark_color" value="<?php echo $row->built_in_watermark_color; ?>" class="color" onchange="preview_built_in_watermark()" />
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_built_in_watermark_opacity">
                      <td class="spider_label_options">
                        <label for="built_in_watermark_opacity"><?php _e('Watermark opacity:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="built_in_watermark_opacity" id="built_in_watermark_opacity" value="<?php echo $row->built_in_watermark_opacity; ?>" class="spider_int_input" onchange="preview_built_in_watermark()" /> %
                        <div class="spider_description"><?php _e('Opacity value must be in the range of 0 to 100.', 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_built_in_watermark_position">
                      <td class="spider_label_options">
                        <label><?php _e('Watermark position:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <table class="bwg_position_table">
                          <tbody>
                            <tr>
                              <td><input type="radio" value="top-left" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "top-left") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                              <td><input type="radio" value="top-center" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "top-center") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                              <td><input type="radio" value="top-right" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "top-right") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="middle-left" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "middle-left") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                              <td><input type="radio" value="middle-center" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "middle-center") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                              <td><input type="radio" value="middle-right" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "middle-right") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="bottom-left" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "bottom-left") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                              <td><input type="radio" value="bottom-center" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "bottom-center") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                              <td><input type="radio" value="bottom-right" name="built_in_watermark_position" <?php if ($row->built_in_watermark_position == "bottom-right") echo 'checked="checked"'; ?> onchange="preview_built_in_watermark()"></td>
                            </tr>
                          </tbody>
                        </table>
                        <input type="submit" class="button-secondary" title="<?php _e('Set watermark', 'bwg_back'); ?>" style="margin-top: 5px;"
                               onclick="spider_set_input_value('task', 'save'); spider_set_input_value('watermark', 'image_set_watermark');"
                               value="<?php _e('Set Watermark', 'bwg_back'); ?>"/>
                        <input type="submit" class="button-secondary" title="<?php _e('Reset watermark', 'bwg_back'); ?>" style="margin-top: 5px;"
                               onclick="spider_set_input_value('task', 'image_recover_all');"
                               value="<?php echo __('Reset Watermark', 'bwg_back'); ?>"/>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td style="width: 50%; vertical-align: top;height: 100%; display: table-cell;">
                <span id="preview_built_in_watermark" style="display:table-cell; background-image:url('<?php echo WD_BWG_URL . '/images/watermark_preview.jpg'?>');background-size:100% 100%;width:400px;height:400px;padding-top: 4px; position:relative;">
                </span>
              </td>
            </tr>
          </table>
        </div>

        <!--Advertisement-->
        <div class="spider_div_options" id="div_content_2">
          <table style="width: 100%;">
            <tr>
              <td style="width: 50%; vertical-align: top; height: 100%; display: table-cell;">
                <table>
                  <tbody>
                    <tr id="tr_watermark_type">
                      <td class="spider_label_options">
                        <label><?php _e('Advertisement type:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="radio" name="watermark_type" id="watermark_type_none" value="none" <?php if ($row->watermark_type == 'none') echo 'checked="checked"'; ?> onClick="bwg_watermark('watermark_type_none')" />
                          <label for="watermark_type_none"><?php _e('None', 'bwg_back'); ?></label>
                        <input type="radio" name="watermark_type" id="watermark_type_text" value="text" <?php if ($row->watermark_type == 'text') echo 'checked="checked"'; ?> onClick="bwg_watermark('watermark_type_text')" onchange="preview_watermark()" />
                          <label for="watermark_type_text"><?php _e('Text', 'bwg_back'); ?></label>
                        <input type="radio" name="watermark_type" id="watermark_type_image" value="image" <?php if ($row->watermark_type == 'image') echo 'checked="checked"'; ?> onClick="bwg_watermark('watermark_type_image')" onchange="preview_watermark()" />
                          <label for="watermark_type_image"><?php _e('Image', 'bwg_back'); ?></label>
                          <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_url">
                      <td class="spider_label_options">
                        <label for="watermark_url"><?php _e('Advertisement url:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" id="watermark_url" name="watermark_url" style="width: 68%;" value="<?php echo $row->watermark_url; ?>" style="display:inline-block;" onchange="preview_watermark()" />
                        
                        <?php
                        $query_url = add_query_arg(array('action' => 'addImages', 'width' => '700', 'height' => '550', 'extensions' => 'jpg,jpeg,png,gif', 'callback' => 'bwg_add_watermark_image'), admin_url('admin-ajax.php'));
                        $query_url = wp_nonce_url( $query_url, 'addImages', 'bwg_nonce' );
                        $query_url = add_query_arg(array('TB_iframe' => '1'), $query_url );
                        ?>

                        <a href="<?php echo $query_url; ?>" id="button_add_watermark_image" class="button-primary thickbox thickbox-preview"
                           title="Add image" 
                           onclick="return false;"
                           style="margin-bottom:5px;">
                          <?php _e('Add Image', 'bwg_back'); ?>
                        </a>
                        <div class="spider_description"><?php _e('Enter absolute image file url or add file from Options page. (.jpg,.jpeg,.png,.gif formats are supported)', 'bwg_back'); ?></div>
                      </td>
                    </tr>                    
                    <tr id="tr_watermark_text">
                      <td class="spider_label_options">
                        <label for="watermark_text"><?php _e('Advertisement text:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="watermark_text" id="watermark_text" style="width: 100%;" value="<?php echo $row->watermark_text; ?>" onchange="preview_watermark()" onkeypress="preview_watermark()" />
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_link">
                      <td class="spider_label_options">
                        <label for="watermark_link"><?php _e('Advertisement link:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="watermark_link" id="watermark_link" style="width: 100%;" value="<?php echo $row->watermark_link; ?>" onchange="preview_watermark()" onkeypress="preview_watermark()" />
                        <div class="spider_description"><?php _e('Enter a URL to open when the advertisement banner is clicked.', 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_width_height">
                      <td class="spider_label_options">
                        <label for="watermark_width"><?php _e('Advertisement dimensions:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="watermark_width" id="watermark_width" value="<?php echo $row->watermark_width; ?>" class="spider_int_input" onchange="preview_watermark()" /> x 
                        <input type="text" name="watermark_height" id="watermark_height" value="<?php echo $row->watermark_height; ?>" class="spider_int_input" onchange="preview_watermark()" /> px
                        <div class="spider_description"><?php _e('Maximum values for watermark image width and height.', 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_font_size">
                      <td class="spider_label_options">
                        <label for="watermark_font_size"><?php _e('Advertisement font size:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="watermark_font_size" id="watermark_font_size" value="<?php echo $row->watermark_font_size; ?>" class="spider_int_input" onchange="preview_watermark()" /> px
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_font">
                      <td class="spider_label_options">
                        <label for="watermark_font"><?php _e('Advertisement font style:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <select name="watermark_font" id="watermark_font" style="width:150px;" onchange="preview_watermark()">
                          <?php
                          foreach ($watermark_fonts as $watermark_font) {
                            ?>
                            <option value="<?php echo $watermark_font; ?>" <?php if ($row->watermark_font == $watermark_font) echo 'selected="selected"'; ?>><?php echo $watermark_font; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_color">
                      <td class="spider_label_options">
                        <label for="watermark_color"><?php _e('Advertisement color:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="watermark_color" id="watermark_color" value="<?php echo $row->watermark_color; ?>" class="color" onchange="preview_watermark()" />
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_opacity">
                      <td class="spider_label_options">
                        <label for="watermark_opacity"><?php _e('Advertisement opacity:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="watermark_opacity" id="watermark_opacity" value="<?php echo $row->watermark_opacity; ?>" class="spider_int_input" onchange="preview_watermark()" /> %
                        <div class="spider_description"><?php _e('Value must be between 0 to 100.', 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_watermark_position">
                      <td class="spider_label_options">
                        <label><?php _e('Advertisement position:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <table class="bwg_position_table">
                          <tbody>
                            <tr>
                              <td><input type="radio" value="top-left" name="watermark_position" <?php if ($row->watermark_position == "top-left") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                              <td><input type="radio" value="top-center" name="watermark_position" <?php if ($row->watermark_position == "top-center") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                              <td><input type="radio" value="top-right" name="watermark_position" <?php if ($row->watermark_position == "top-right") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="middle-left" name="watermark_position" <?php if ($row->watermark_position == "middle-left") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                              <td><input type="radio" value="middle-center" name="watermark_position" <?php if ($row->watermark_position == "middle-center") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                              <td><input type="radio" value="middle-right" name="watermark_position" <?php if ($row->watermark_position == "middle-right") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="bottom-left" name="watermark_position" <?php if ($row->watermark_position == "bottom-left") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                              <td><input type="radio" value="bottom-center" name="watermark_position" <?php if ($row->watermark_position == "bottom-center") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                              <td><input type="radio" value="bottom-right" name="watermark_position" <?php if ($row->watermark_position == "bottom-right") echo 'checked="checked"'; ?> onchange="preview_watermark()"></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td style="width: 50%; vertical-align: top;height: 100%; display: table-cell;">
                <span id="preview_watermark" style="display:table-cell; background-image:url('<?php echo WD_BWG_URL . '/images/watermark_preview.jpg'?>');background-size:100% 100%;width:400px;height:400px;padding-top: 4px; position:relative;">
                </span>
              </td>
            </tr>
          </table>
        </div>

        <!--Lightbox-->
        <div class="spider_div_options" id="div_content_3">        
          <table style="width: 100%;">
            <tr>
              <td style="width: 50%; vertical-align: top;">
                <table style="display: inline-table;">
                  <tbody>			
                    <tr id="tr_popup_full_width">
                      <td class="spider_label_options">
                        <label><?php _e('Full width lightbox:', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_fullscreen" id="popup_fullscreen_1" value="1" <?php if ($row->popup_fullscreen) echo 'checked="checked"'; ?> onchange="bwg_popup_fullscreen(1)" /><label for="popup_fullscreen_1"><?php _e('Yes', 'bwg_back'); ?></label>
                        <input type="radio" name="popup_fullscreen" id="popup_fullscreen_0" value="0" <?php if (!$row->popup_fullscreen) echo 'checked="checked"'; ?> onchange="bwg_popup_fullscreen(0)" /><label for="popup_fullscreen_0"><?php _e('No', 'bwg_back'); ?></label>
                        <div class="spider_description"><?php _e('Enable full width feature for the lightbox.', 'bwg_back'); ?></div>
                      </td>
                    </tr>			
                    <tr id="tr_popup_dimensions" >
                      <td class="spider_label_options">
                        <label for="popup_width"><?php _e('Lightbox dimensions:', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="text" name="popup_width" id="popup_width" value="<?php echo $row->popup_width; ?>" class="spider_int_input" /> x 
                        <input type="text" name="popup_height" id="popup_height" value="<?php echo $row->popup_height; ?>" class="spider_int_input" /> px
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label for="popup_type"><?php _e('Lightbox effect:', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <select name="popup_type" id="popup_type" style="width:150px;">
                          <?php
                          foreach ($effects as $key => $effect) {
                            ?>
                            <option value="<?php echo $key; ?>" <?php echo ($key != 'none' && $key != 'fade') ? 'disabled="disabled" title="'.__("This effect is disabled in free version.", 'bwg_back').'"' : ''; ?> <?php if ($row->popup_type == $key) echo 'selected="selected"'; ?>><?php echo __($effect,"bwg_back"); ?></option>
                            <?php
                          }
                          ?>
                        </select>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label for="popup_effect_duration"><?php echo __('Effect duration:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="popup_effect_duration" id="popup_effect_duration" value="<?php echo $row->popup_effect_duration; ?>" class="spider_int_input" /> sec.
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_autoplay">
                      <td class="spider_label_options">
                        <label><?php _e('Lightbox autoplay:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="radio" name="popup_autoplay" id="popup_autoplay_1" value="1" <?php if ($row->popup_autoplay) echo 'checked="checked"'; ?> /><label for="popup_autoplay_1"><?php _e('Yes', 'bwg_back'); ?></label>
                        <input type="radio" name="popup_autoplay" id="popup_autoplay_0" value="0" <?php if (!$row->popup_autoplay) echo 'checked="checked"'; ?> /><label for="popup_autoplay_0"><?php _e('No', 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label for="popup_interval"><?php _e('Time interval:', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="text" name="popup_interval" id="popup_interval" value="<?php echo $row->popup_interval; ?>" class="spider_int_input" /> sec.
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label><?php _e('Enable filmstrip:', 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_filmstrip" id="popup_enable_filmstrip_1" value="1" <?php if ($row->popup_enable_filmstrip ) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_popup_filmstrip_height', 'popup_enable_filmstrip_1')" /><label for="popup_enable_filmstrip_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_filmstrip" id="popup_enable_filmstrip_0" value="0" <?php if (!$row->popup_enable_filmstrip ) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_popup_filmstrip_height', 'popup_enable_filmstrip_0')" /><label for="popup_enable_filmstrip_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_filmstrip_height">
                      <td class="spider_label_options spider_free_version_label">
                        <label for="popup_filmstrip_height"><?php _e("Filmstrip size:", 'bwg_back'); ?></label>
                      </td>
                      <td class="spider_free_version_label">
                        <input disabled="disabled" type="text" name="popup_filmstrip_height" id="popup_filmstrip_height" value="<?php echo $row->popup_filmstrip_height; ?>" class="spider_int_input spider_free_version_label" /> px
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_hit_counter">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Display hit counter:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_hit_counter" id="popup_hit_counter_1" value="1" <?php if ($row->popup_hit_counter) echo 'checked="checked"'; ?> /><label for="popup_hit_counter_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_hit_counter" id="popup_hit_counter_0" value="0" <?php if (!$row->popup_hit_counter) echo 'checked="checked"'; ?> /><label for="popup_hit_counter_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label> <?php _e("Show Next / Previous buttons:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="autohide_lightbox_navigation" id="autohide_lightbox_navigation_1" value="1" <?php if ($row->autohide_lightbox_navigation ) echo 'checked="checked"'; ?> /><label for="autohide_lightbox_navigation_1"><?php _e("On hover", 'bwg_back'); ?></label>
                        <input type="radio" name="autohide_lightbox_navigation" id="autohide_lightbox_navigation_0" value="0" <?php if (!$row->autohide_lightbox_navigation ) echo 'checked="checked"'; ?> /><label for="autohide_lightbox_navigation_0"><?php _e("Always", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label><?php _e("Enable control buttons:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_enable_ctrl_btn" id="popup_enable_ctrl_btn_1" value="1" <?php if ($row->popup_enable_ctrl_btn) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_popup_fullscreen', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_info', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_comment', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_facebook', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_twitter', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_google', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_pinterest', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_tumblr', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_comment_moderation', 'comment_moderation_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_email', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_captcha', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_download', 'popup_enable_ctrl_btn_1');
                                                                                                                                                                                             bwg_enable_disable('', 'tr_popup_fullsize_image', 'popup_enable_ctrl_btn_1');" /><label for="popup_enable_ctrl_btn_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="popup_enable_ctrl_btn" id="popup_enable_ctrl_btn_0" value="0" <?php if (!$row->popup_enable_ctrl_btn) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_popup_fullscreen', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_info', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_comment', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_facebook', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_twitter', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_google', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_pinterest', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_tumblr', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_comment_moderation', 'comment_moderation_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_email', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_captcha', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_download', 'popup_enable_ctrl_btn_0');
                                                                                                                                                                                             bwg_enable_disable('none', 'tr_popup_fullsize_image', 'popup_enable_ctrl_btn_0');" /><label for="popup_enable_ctrl_btn_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_fullscreen">
                      <td class="spider_label_options">
                        <label><?php _e("Enable fullscreen:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_enable_fullscreen" id="popup_enable_fullscreen_1" value="1" <?php if ($row->popup_enable_fullscreen) echo 'checked="checked"'; ?> /><label for="popup_enable_fullscreen_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="popup_enable_fullscreen" id="popup_enable_fullscreen_0" value="0" <?php if (!$row->popup_enable_fullscreen) echo 'checked="checked"'; ?> /><label for="popup_enable_fullscreen_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_info">
                      <td class="spider_label_options">
                        <label><?php _e("Enable info:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_enable_info" id="popup_enable_info_1" value="1" <?php if ($row->popup_enable_info) echo 'checked="checked"'; ?> /><label for="popup_enable_info_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="popup_enable_info" id="popup_enable_info_0" value="0" <?php if (!$row->popup_enable_info) echo 'checked="checked"'; ?> /><label for="popup_enable_info_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_info_always_show">
                      <td class="spider_label_options">
                        <label><?php _e("Display info by default:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_info_always_show" id="popup_info_always_show_1" value="1" <?php if ($row->popup_info_always_show) echo 'checked="checked"'; ?> /><label for="popup_info_always_show_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="popup_info_always_show" id="popup_info_always_show_0" value="0" <?php if (!$row->popup_info_always_show) echo 'checked="checked"'; ?> /><label for="popup_info_always_show_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_info_full_width">
                      <td class="spider_label_options">
                        <label><?php _e("Full width info:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_info_full_width" id="popup_info_full_width_1" value="1" <?php if ($row->popup_info_full_width) echo 'checked="checked"'; ?>  /><label for="popup_info_full_width_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="popup_info_full_width" id="popup_info_full_width_0" value="0" <?php if (!$row->popup_info_full_width) echo 'checked="checked"'; ?>  /><label for="popup_info_full_width_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"><?php _e("Display image information based on the lightbox dimensions.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td style="width: 50%; vertical-align: top;">
                <table style="display: inline-table;">
                  <tbody>
                    <tr id="tr_popup_rate">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable rating:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_rate" id="popup_enable_rate_1" value="1" <?php if ($row->popup_enable_rate) echo 'checked="checked"'; ?> /><label for="popup_enable_rate_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_rate" id="popup_enable_rate_0" value="0" <?php if (!$row->popup_enable_rate) echo 'checked="checked"'; ?> /><label for="popup_enable_rate_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_comment">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable comments:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_comment" id="popup_enable_comment_1" value="1" <?php if ($row->popup_enable_comment) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_comment_moderation', 'popup_enable_comment_1');
                                                                                                                                                                                          bwg_enable_disable('', 'tr_popup_email', 'popup_enable_comment_1');
                                                                                                                                                                                          bwg_enable_disable('', 'tr_popup_captcha', 'popup_enable_comment_1');" /><label for="popup_enable_comment_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_comment" id="popup_enable_comment_0" value="0" <?php if (!$row->popup_enable_comment) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_comment_moderation', 'popup_enable_comment_0');
                                                                                                                                                                                           bwg_enable_disable('none', 'tr_popup_email', 'popup_enable_comment_0');
                                                                                                                                                                                            bwg_enable_disable('none', 'tr_popup_captcha', 'popup_enable_comment_0');" /><label for="popup_enable_comment_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_comment_moderation">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable comments moderation:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="comment_moderation" id="comment_moderation_1" value="1" <?php if ($row->comment_moderation) echo 'checked="checked"'; ?> /><label for="comment_moderation_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="comment_moderation" id="comment_moderation_0" value="0" <?php if (!$row->comment_moderation) echo 'checked="checked"'; ?> /><label for="comment_moderation_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_email">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable Email for comments:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_email" id="popup_enable_email_1" value="1" <?php if ($row->popup_enable_email) echo 'checked="checked"'; ?> /><label for="popup_enable_email_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_email" id="popup_enable_email_0" value="0" <?php if (!$row->popup_enable_email) echo 'checked="checked"'; ?> /><label for="popup_enable_email_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_captcha">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable Captcha for comments:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_captcha" id="popup_enable_captcha_1" value="1" <?php if ($row->popup_enable_captcha) echo 'checked="checked"'; ?> /><label for="popup_enable_captcha_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_captcha" id="popup_enable_captcha_0" value="0" <?php if (!$row->popup_enable_captcha) echo 'checked="checked"'; ?> /><label for="popup_enable_captcha_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_fullsize_image">
                      <td class="spider_label_options">
                        <label><?php _e("Enable original image display button:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_enable_fullsize_image" id="popup_enable_fullsize_image_1" value="1" <?php if ($row->popup_enable_fullsize_image) echo 'checked="checked"'; ?> /><label for="popup_enable_fullsize_image_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="popup_enable_fullsize_image" id="popup_enable_fullsize_image_0" value="0" <?php if (!$row->popup_enable_fullsize_image) echo 'checked="checked"'; ?> /><label for="popup_enable_fullsize_image_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_download">
                      <td class="spider_label_options">
                        <label><?php _e("Enable download button:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="popup_enable_download" id="popup_enable_download_1" value="1" <?php if ($row->popup_enable_download) echo 'checked="checked"'; ?> /><label for="popup_enable_download_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="popup_enable_download" id="popup_enable_download_0" value="0" <?php if (!$row->popup_enable_download) echo 'checked="checked"'; ?> /><label for="popup_enable_download_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_facebook">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable Facebook button:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_facebook" id="popup_enable_facebook_1" value="1" <?php if ($row->popup_enable_facebook) echo 'checked="checked"'; ?> /><label for="popup_enable_facebook_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_facebook" id="popup_enable_facebook_0" value="0" <?php if (!$row->popup_enable_facebook) echo 'checked="checked"'; ?> /><label for="popup_enable_facebook_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_twitter">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable Twitter button:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_twitter" id="popup_enable_facebook_1" value="1" <?php if ($row->popup_enable_twitter) echo 'checked="checked"'; ?> /><label for="popup_enable_twitter_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_twitter" id="popup_enable_facebook_0" value="0" <?php if (!$row->popup_enable_twitter) echo 'checked="checked"'; ?> /><label for="popup_enable_twitter_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_google">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable Google+ button:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_google" id="popup_enable_google_1" value="1" <?php if ($row->popup_enable_google) echo 'checked="checked"'; ?> /><label for="popup_enable_google_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_google" id="popup_enable_google_0" value="0" <?php if (!$row->popup_enable_google) echo 'checked="checked"'; ?> /><label for="popup_enable_google_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_pinterest">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable Pinterest button:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_pinterest" id="popup_enable_pinterest_1" value="1" <?php if ($row->popup_enable_pinterest) echo 'checked="checked"'; ?> /><label for="popup_enable_pinterest_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_pinterest" id="popup_enable_pinterest_0" value="0" <?php if (!$row->popup_enable_pinterest) echo 'checked="checked"'; ?> /><label for="popup_enable_pinterest_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_popup_tumblr">
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable Tumblr button:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="popup_enable_tumblr" id="popup_enable_tumblr_1" value="1" <?php if ($row->popup_enable_tumblr) echo 'checked="checked"'; ?> /><label for="popup_enable_tumblr_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="popup_enable_tumblr" id="popup_enable_tumblr_0" value="0" <?php if (!$row->popup_enable_tumblr) echo 'checked="checked"'; ?> /><label for="popup_enable_tumblr_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_image_count">
                      <td class="spider_label_options">
                        <label><?php _e("Show images count:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="show_image_counts" id="show_image_counts_current_image_number_1" value="1" <?php if ($row->show_image_counts) echo 'checked="checked"'; ?> /><label for="show_image_counts_current_image_number_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="show_image_counts" id="show_image_counts_current_image_number_0" value="0" <?php if (!$row->show_image_counts) echo 'checked="checked"'; ?> /><label for="show_image_counts_current_image_number_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_image_cycle">
                      <td class="spider_label_options">
                        <label><?php _e("Enable loop:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="enable_loop" id="enable_loop_1" value="1" <?php if ($row->enable_loop) echo 'checked="checked"'; ?> /><label for="enable_loop_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="enable_loop" id="enable_loop_0" value="0" <?php if (!$row->enable_loop) echo 'checked="checked"'; ?> /><label for="enable_loop_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable", 'bwg_back'); ?> AddThis:</label>
                      </td>
                      <td>
                        <input disabled="disabled" type="radio" name="enable_addthis" id="enable_addthis_1" value="1" <?php if ($row->enable_addthis ) echo 'checked="checked"'; ?> />
                        <label for="enable_addthis_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="enable_addthis" id="enable_addthis_0" value="0" <?php if (!$row->enable_addthis ) echo 'checked="checked"'; ?> />
                        <label for="enable_addthis_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </table>
        </div>

        <!--Album options-->
        <div class="spider_div_options" id="div_content_4">        
          <table>
            <tbody>
              <tr>
                <td class="spider_label_options">
                  <label for="album_column_number"><?php _e("Number of album columns:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="album_column_number" id="album_column_number" value="<?php echo $row->album_column_number; ?>" class="spider_int_input" />
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="albums_per_page"><?php _e("Albums per page:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="albums_per_page" id="albums_per_page" value="<?php echo $row->albums_per_page; ?>" class="spider_int_input" />
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Enable pagination:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="album_enable_page" id="album_enable_page_1" value="1" <?php if ($row->album_enable_page) echo 'checked="checked"'; ?> /><label for="album_enable_page_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="album_enable_page" id="album_enable_page_0" value="0" <?php if (!$row->album_enable_page) echo 'checked="checked"'; ?> /><label for="album_enable_page_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Album view type:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input disabled="disabled" type="radio" name="album_view_type" id="album_view_type_1" value="thumbnail" <?php if ($row->album_view_type == "thumbnail") echo 'checked="checked"'; ?> /><label for="album_view_type_1"><?php _e("Thumbnail", 'bwg_back'); ?></label>
                  <input disabled="disabled" type="radio" name="album_view_type" id="album_view_type_0" value="masonry" <?php if ($row->album_view_type == "masonry") echo 'checked="checked"'; ?> /><label for="album_view_type_0"><?php _e("Masonry", 'bwg_back'); ?></label>
                  <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Show title:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="album_title_show_hover" id="album_title_show_hover_1" value="hover" <?php if ($row->album_title_show_hover == "hover") echo 'checked="checked"'; ?> /><label for="album_title_show_hover_1"><?php _e("Show on hover", 'bwg_back'); ?></label><br />
                  <input type="radio" name="album_title_show_hover" id="album_title_show_hover_0" value="show" <?php if ($row->album_title_show_hover == "show") echo 'checked="checked"'; ?> /><label for="album_title_show_hover_0"><?php _e("Always show", 'bwg_back'); ?></label><br />
                  <input type="radio" name="album_title_show_hover" id="album_title_show_hover_2" value="none" <?php if ($row->album_title_show_hover == "none") echo 'checked="checked"'; ?> /><label for="album_title_show_hover_2"><?php _e("Don't show", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Show album/gallery name:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="show_album_name_enable" id="show_album_name_enable_1" value="1" <?php if ($row->show_album_name) echo 'checked="checked"'; ?> /><label for="show_album_name_enable_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="show_album_name_enable" id="show_album_name_enable_0" value="0" <?php if (!$row->show_album_name) echo 'checked="checked"'; ?> /><label for="show_album_name_enable_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Enable extended album description:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="extended_album_description_enable" id="extended_album_description_enable_1" value="1" <?php if ($row->extended_album_description_enable) echo 'checked="checked"'; ?> /><label for="extended_album_description_enable_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="extended_album_description_enable" id="extended_album_description_enable_0" value="0" <?php if (!$row->extended_album_description_enable) echo 'checked="checked"'; ?> /><label for="extended_album_description_enable_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="album_thumb_width"><?php _e("Album thumbnail dimensions:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="album_thumb_width" id="album_thumb_width" value="<?php echo $row->album_thumb_width; ?>" class="spider_int_input" /> x 
                  <input type="text" name="album_thumb_height" id="album_thumb_height" value="<?php echo $row->album_thumb_height; ?>" class="spider_int_input" /> px
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="extended_album_height"><?php _e("Extended album height:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="extended_album_height" id="extended_album_height" value="<?php echo $row->extended_album_height; ?>" class="spider_int_input" /> px
                  <div class="spider_description"></div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!--Slideshow-->
        <div class="spider_div_options" id="div_content_5">
          <table style="width: 100%;">
            <tr>
              <td style="width: 50%; vertical-align: top;">
                <table style="display: inline-table;">
                  <tbody>
                    <tr>
                      <td class="spider_label_options">
                        <label for="slideshow_type"><?php _e("Slideshow effect:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <select name="slideshow_type" id="slideshow_type" style="width:150px;">
                          <?php
                          foreach ($effects as $key => $effect) {
                            ?>
                            <option value="<?php echo $key; ?>" <?php echo ($key != 'none' && $key != 'fade') ? 'disabled="disabled" title="This effect is disabled in free version."' : ''; ?> <?php if ($row->slideshow_type == $key) echo 'selected="selected"'; ?>><?php echo $effect; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                     <tr>
                      <td class="spider_label_options">
                        <label for="slideshow_effect_duration"><?php echo __('Effect duration:', 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="slideshow_effect_duration" id="slideshow_effect_duration" value="<?php echo $row->slideshow_effect_duration; ?>" class="spider_int_input" /> sec.
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label for="slideshow_interval"><?php _e("Time interval:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="slideshow_interval" id="slideshow_interval" value="<?php echo $row->slideshow_interval; ?>" class="spider_int_input" /> sec.
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label for="slideshow_width"><?php _e("Slideshow dimensions:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" name="slideshow_width" id="slideshow_width" value="<?php echo $row->slideshow_width; ?>" class="spider_int_input" /> x 
                        <input type="text" name="slideshow_height" id="slideshow_height" value="<?php echo $row->slideshow_height; ?>" class="spider_int_input" /> px
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label><?php _e("Enable autoplay:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="radio" name="slideshow_enable_autoplay" id="slideshow_enable_autoplay_yes" value="1" <?php if ($row->slideshow_enable_autoplay) echo 'checked="checked"'; ?> /><label for="slideshow_enable_autoplay_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="slideshow_enable_autoplay" id="slideshow_enable_autoplay_no" value="0" <?php if (!$row->slideshow_enable_autoplay) echo 'checked="checked"'; ?> /><label for="slideshow_enable_autoplay_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label><?php _e("Enable shuffle:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="radio" name="slideshow_enable_shuffle" id="slideshow_enable_shuffle_yes" value="1" <?php if ($row->slideshow_enable_shuffle) echo 'checked="checked"'; ?> /><label for="slideshow_enable_shuffle_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="slideshow_enable_shuffle" id="slideshow_enable_shuffle_no" value="0" <?php if (!$row->slideshow_enable_shuffle) echo 'checked="checked"'; ?> /><label for="slideshow_enable_shuffle_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label> <?php _e("Show Next / Previous buttons:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="autohide_slideshow_navigation" id="autohide_slideshow_navigation_1" value="1" <?php if ($row->autohide_slideshow_navigation) echo 'checked="checked"'; ?> /><label for="autohide_slideshow_navigation_1"><?php _e("On hover", 'bwg_back'); ?></label>
                        <input type="radio" name="autohide_slideshow_navigation" id="autohide_slideshow_navigation_0" value="0" <?php if (!$row->autohide_slideshow_navigation) echo 'checked="checked"'; ?> /><label for="autohide_slideshow_navigation_0"><?php _e("Always", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label><?php _e("Enable control buttons:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="radio" name="slideshow_enable_ctrl" id="slideshow_enable_ctrl_yes" value="1" <?php if ($row->slideshow_enable_ctrl) echo 'checked="checked"'; ?> /><label for="slideshow_enable_ctrl_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="slideshow_enable_ctrl" id="slideshow_enable_ctrl_no" value="0" <?php if (!$row->slideshow_enable_ctrl) echo 'checked="checked"'; ?> /><label for="slideshow_enable_ctrl_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options spider_free_version_label"><label><?php _e("Enable slideshow filmstrip:", 'bwg_back'); ?> </label></td>
                      <td>
                        <input disabled="disabled" type="radio" name="slideshow_enable_filmstrip" id="slideshow_enable_filmstrip_yes" value="1" <?php if ($row->slideshow_enable_filmstrip) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_slideshow_filmstrip_height', 'slideshow_enable_filmstrip_yes')" /><label for="slideshow_enable_filmstrip_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input disabled="disabled" type="radio" name="slideshow_enable_filmstrip" id="slideshow_enable_filmstrip_no" value="0" <?php if (!$row->slideshow_enable_filmstrip) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_slideshow_filmstrip_height', 'slideshow_enable_filmstrip_no')" /><label for="slideshow_enable_filmstrip_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_slideshow_filmstrip_height">
                      <td class="spider_label_options spider_free_version_label"><label for="slideshow_filmstrip_height"><?php _e("Slideshow filmstrip size:", 'bwg_back'); ?> </label></td>
                      <td class="spider_free_version_label">
                        <input disabled="disabled" type="text" name="slideshow_filmstrip_height" id="slideshow_filmstrip_height" value="<?php echo $row->slideshow_filmstrip_height; ?>" class="spider_int_input spider_free_version_label" /> px
                        <div class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td style="width: 50%; vertical-align: top;">
                <table style="width: 100%; display: inline-table;">
                  <tbody>
                    <tr>
                      <td class="spider_label_options"><label><?php _e("Enable image title:", 'bwg_back'); ?> </label></td>
                      <td>
                        <input type="radio" name="slideshow_enable_title" id="slideshow_enable_title_yes" value="1" <?php if ($row->slideshow_enable_title) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_slideshow_title_position', 'slideshow_enable_title_yes')" /><label for="slideshow_enable_title_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="slideshow_enable_title" id="slideshow_enable_title_no" value="0" <?php if (!$row->slideshow_enable_title) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_slideshow_title_position', 'slideshow_enable_title_no')" /><label for="slideshow_enable_title_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_slideshow_title_position">
                      <td class="spider_label_options"><label><?php _e("Title position:", 'bwg_back'); ?> </label></td>
                      <td>
                        <table class="bwg_position_table">
                          <tbody>
                            <tr>
                              <td><input type="radio" value="top-left" id="slideshow_title_topLeft" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "top-left") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="top-center" id="slideshow_title_topCenter" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "top-center") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="top-right" id="slideshow_title_topRight" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "top-right") echo 'checked="checked"'; ?>></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="middle-left" id="slideshow_title_midLeft" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "middle-left") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="middle-center" id="slideshow_title_midCenter" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "middle-center") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="middle-right" id="slideshow_title_midRight" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "middle-right") echo 'checked="checked"'; ?>></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="bottom-left" id="slideshow_title_botLeft" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "bottom-left") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="bottom-center" id="slideshow_title_botCenter" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "bottom-center") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="bottom-right" id="slideshow_title_botRight" name="slideshow_title_position" <?php if ($row->slideshow_title_position == "bottom-right") echo 'checked="checked"'; ?>></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="spider_description"><?php _e("Image title position on slideshow", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr id="tr_slideshow_full_width_title">
                      <td class="spider_label_options">
                        <label><?php _e("Full width title:", 'bwg_back'); ?></label>
                      </td>
                      <td>
                        <input type="radio" name="slideshow_title_full_width" id="slideshow_title_full_width_1" value="1" <?php if ($row->slideshow_title_full_width) echo 'checked="checked"'; ?>  /><label for="slideshow_title_full_width_1"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="slideshow_title_full_width" id="slideshow_title_full_width_0" value="0" <?php if (!$row->slideshow_title_full_width) echo 'checked="checked"'; ?>  /><label for="slideshow_title_full_width_0"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"><?php _e("Display image title based on the slideshow dimensions.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options"><label><?php _e("Enable image description: ", 'bwg_back'); ?></label></td>
                      <td>
                        <input type="radio" name="slideshow_enable_description" id="slideshow_enable_description_yes" value="1" <?php if ($row->slideshow_enable_description) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_slideshow_description_position', 'slideshow_enable_description_yes')" /><label for="slideshow_enable_description_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="slideshow_enable_description" id="slideshow_enable_description_no" value="0" <?php if (!$row->slideshow_enable_description) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_slideshow_description_position', 'slideshow_enable_description_no')" /><label for="slideshow_enable_description_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_slideshow_description_position">
                      <td class="spider_label"><label><?php _e("Description position:", 'bwg_back'); ?> </label></td>
                      <td>
                        <table class="bwg_position_table">
                          <tbody>
                            <tr>
                              <td><input type="radio" value="top-left" id="slideshow_description_topLeft" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "top-left") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="top-center" id="slideshow_description_topCenter" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "top-center") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="top-right" id="slideshow_description_topRight" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "top-right") echo 'checked="checked"'; ?>></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="middle-left" id="slideshow_description_midLeft" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "middle-left") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="middle-center" id="slideshow_description_midCenter" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "middle-center") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="middle-right" id="slideshow_description_midRight" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "middle-right") echo 'checked="checked"'; ?>></td>
                            </tr>
                            <tr>
                              <td><input type="radio" value="bottom-left" id="slideshow_description_botLeft" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "bottom-left") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="bottom-center" id="slideshow_description_botCenter" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "bottom-center") echo 'checked="checked"'; ?>></td>
                              <td><input type="radio" value="bottom-right" id="slideshow_description_botRight" name="slideshow_description_position" <?php if ($row->slideshow_description_position == "bottom-right") echo 'checked="checked"'; ?>></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="spider_description"><?php _e("Image description position on slideshow", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options">
                        <label><?php _e("Enable slideshow Music:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="radio" name="slideshow_enable_music" id="slideshow_enable_music_yes" value="1" <?php if ($row->slideshow_enable_music) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_slideshow_music_url', 'slideshow_enable_music_yes')" /><label for="slideshow_enable_music_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" name="slideshow_enable_music" id="slideshow_enable_music_no" value="0" <?php if (!$row->slideshow_enable_music) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_slideshow_music_url', 'slideshow_enable_music_no')"  /><label for="slideshow_enable_music_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr id="tr_slideshow_music_url">
                      <td class="spider_label_options">
                        <label for="slideshow_audio_url"><?php _e("Music url:", 'bwg_back'); ?> </label>
                      </td>
                      <td>
                        <input type="text" id="slideshow_audio_url" name="slideshow_audio_url" style="width: 70%;" value="<?php echo $row->slideshow_audio_url; ?>" style="display:inline-block;" />
                        <?php
                        $query_url = add_query_arg(array('action' => 'addMusic', 'width' => '700', 'height' => '550', 'extensions' => 'aac,m4a,f4a,mp3,ogg,oga', 'callback' => 'bwg_add_music'), admin_url('admin-ajax.php'));
                        $query_url = wp_nonce_url( $query_url, 'addMusic', 'bwg_nonce' );
                        $query_url = add_query_arg(array('TB_iframe' => '1'), $query_url );
                        ?>
                        <a href="<?php echo $query_url; ?>" id="button_add_music" class="button-primary thickbox thickbox-preview"
                           title="Add music"
                           onclick="return false;"
                           style="margin-bottom:5px;">
                          <?php _e("Add Music", 'bwg_back'); ?>
                        </a>
                        <div class="spider_description"><?php _e("Only", 'bwg_back'); ?> .aac,.m4a,.f4a,.mp3,.ogg,.oga <?php _e("formats are supported.", 'bwg_back'); ?></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </table>
        </div>

        <!--Thumbnail options-->
        <div class="spider_div_options" id="div_content_6">        
          <table>
            <tbody>
              <tr style="display:none;">
                <td class="spider_label_options">
                  <label><?php _e("Masonry:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="masonry" id="masonry_1" value="horizontal" <?php if ($row->masonry == "horizontal") echo 'checked="checked"'; ?> /><label for="masonry_1"><?php _e("Horizontal", 'bwg_back'); ?></label>
                  <input type="radio" name="masonry" id="masonry_0" value="vertical" <?php if ($row->masonry == "vertical") echo 'checked="checked"'; ?> /><label for="masonry_0"><?php _e("Vertical", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
	      <tr style="display:none;">
                <td class="spider_label_options">
                  <label><?php _e("Mosaic:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="mosaic" id="mosaic_0" value="vertical" <?php if ($row->mosaic == "vertical") echo 'checked="checked"'; ?> /><label for="mosaic_0"><?php _e("Vertical", 'bwg_back'); ?></label>
                  <input type="radio" name="mosaic" id="mosaic_1" value="horizontal" <?php if ($row->mosaic == "horizontal") echo 'checked="checked"'; ?> /><label for="mosaic_1"><?php _e("Horizontal", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr style="display:none;">
                <td class="spider_label_options">
                  <label><?php _e("Resizable mosaic:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="resizable_mosaic" id="resizable_mosaic_0" value="0" <?php if ($row->resizable_mosaic == "0") echo 'checked="checked"'; ?> /><label for="resizable_mosaic_0"><?php _e("No", 'bwg_back'); ?></label>
                  <input type="radio" name="resizable_mosaic" id="resizable_mosaic_1" value="1" <?php if ($row->resizable_mosaic == "1") echo 'checked="checked"'; ?> /><label for="resizable_mosaic_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr style="display:none;">
                <td class="spider_label_options">
                  <label for="mosaic_total_width"><?php _e("Total width of mosaic:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="mosaic_total_width" id="mosaic_total_width" value="<?php echo $row->mosaic_total_width; ?>" class="spider_int_input" /> %
                  <div class="spider_description"><?php _e("Width of mosaic as a percentage of container's width.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="image_column_number"><?php _e("Number of image columns:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="image_column_number" id="image_column_number" value="<?php echo $row->image_column_number; ?>" class="spider_int_input" />
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="images_per_page"><?php _e("Images per page:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="images_per_page" id="images_per_page" value="<?php echo $row->images_per_page; ?>" class="spider_int_input" />
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="upload_thumb_width"><?php _e("Generated thumbnail dimensions:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="upload_thumb_width" id="upload_thumb_width" value="<?php echo $row->upload_thumb_width; ?>" class="spider_int_input" /> x 
                  <input type="text" name="upload_thumb_height" id="upload_thumb_height" value="<?php echo $row->upload_thumb_height; ?>" class="spider_int_input" /> px
                  <input type="submit" class="button-secondary" onclick="spider_set_input_value('task', 'save'); spider_set_input_value('recreate', 'resize_image_thumb');" value="<?php echo __('Recreate', 'bwg_back'); ?>" />
                  <div class="spider_description"><?php _e("The maximum size of the generated thumbnail. Its dimensions should be larger than the ones of the frontend thumbnail.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="thumb_width"><?php _e("Frontend thumbnail dimensions:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input type="text" name="thumb_width" id="thumb_width" value="<?php echo $row->thumb_width; ?>" class="spider_int_input" /> x 
                  <input type="text" name="thumb_height" id="thumb_height" value="<?php echo $row->thumb_height; ?>" class="spider_int_input" /> px
                  <div class="spider_description"><?php _e("The default size of the thumbnail which will be displayed in the website", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Show image title:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="image_title_show_hover" id="image_title_show_hover_1" value="hover" <?php if ($row->image_title_show_hover == "hover") echo 'checked="checked"'; ?> /><label for="image_title_show_hover_1"><?php _e("Show on hover", 'bwg_back'); ?></label><br />
                  <input type="radio" name="image_title_show_hover" id="image_title_show_hover_0" value="show" <?php if ($row->image_title_show_hover == "show") echo 'checked="checked"'; ?> /><label for="image_title_show_hover_0"><?php _e("Always show", 'bwg_back'); ?></label><br />
                  <input type="radio" name="image_title_show_hover" id="image_title_show_hover_2" value="none" <?php if ($row->image_title_show_hover == "none") echo 'checked="checked"'; ?> /><label for="image_title_show_hover_2"><?php _e("Don't show", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr id="tr_thumb_show_name">
                <td class="spider_label_options"><label><?php _e("Show gallery name:", 'bwg_back'); ?> </label></td>
                <td>
                  <input type="radio" name="thumb_name" id="thumb_name_yes" value="1" <?php if ($row->showthumbs_name) echo 'checked="checked"'; ?> /><label for="thumb_name_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="thumb_name" id="thumb_name_no" value="0"  <?php if (!$row->showthumbs_name) echo 'checked="checked"'; ?> /><label for="thumb_name_no"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options spider_free_version_label">
                  <label><?php _e("Show description in Vertical Masonry view:", 'bwg_back'); ?> </label>
                </td>
                <td>
                  <input disabled="disabled" type="radio" name="show_masonry_thumb_description" id="masonry_thumb_desc_1" value="1" <?php if ($row->show_masonry_thumb_description) echo 'checked="checked"'; ?> /><label for="masonry_thumb_desc_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input disabled="disabled" type="radio" name="show_masonry_thumb_description" id="masonry_thumb_desc_0" value="0" <?php if (!$row->show_masonry_thumb_description) echo 'checked="checked"'; ?> /><label for="masonry_thumb_desc_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div style="width: 200px;" class="spider_description spider_free_version"><?php _e("This option is disabled in free version.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options"><label><?php _e("Enable image pagination:", 'bwg_back'); ?> </label></td>
                <td>
                  <input type="radio" name="image_enable_page" id="image_enable_page_yes" value="1" <?php if ($row->image_enable_page) echo 'checked="checked"'; ?> /><label for="image_enable_page_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="image_enable_page" id="image_enable_page_no" value="0" <?php if (!$row->image_enable_page) echo 'checked="checked"'; ?> /><label for="image_enable_page_no"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options"><label><?php _e("Thumbnail click action:", 'bwg_back'); ?> </label></td>
                <td>
                  <input type="radio" name="thumb_click_action" id="thumb_click_action_1" value="open_lightbox" <?php if ($row->thumb_click_action == 'open_lightbox') echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_thumb_link_target', 'thumb_click_action_1')" /><label for="thumb_click_action_1"><?php _e("Open lightbox", 'bwg_back'); ?></label>
                  <input type="radio" name="thumb_click_action" id="thumb_click_action_2" value="redirect_to_url" <?php if ($row->thumb_click_action == 'redirect_to_url') echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_thumb_link_target', 'thumb_click_action_2')" /><label for="thumb_click_action_2"><?php _e("Redirect to url", 'bwg_back'); ?></label>
                  <input type="radio" name="thumb_click_action" id="thumb_click_action_3" value="do_nothing" <?php if ($row->thumb_click_action == 'do_nothing') echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_thumb_link_target', 'thumb_click_action_3')" /><label for="thumb_click_action_3"><?php _e("Do Nothing", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr id="tr_thumb_link_target">
                <td class="spider_label_options"><label><?php _e("Open in a new window:", 'bwg_back'); ?> </label></td>
                <td>
                  <input type="radio" name="thumb_link_target" id="thumb_link_target_yes" value="1" <?php if ($row->thumb_link_target) echo 'checked="checked"'; ?> /><label for="thumb_link_target_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="thumb_link_target" id="thumb_link_target_no" value="0" <?php if (!$row->thumb_link_target) echo 'checked="checked"'; ?> /><label for="thumb_link_target_no"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options"><label><?php _e("Play icon over the video thumbnail:", 'bwg_back'); ?> </label></td>
                <td>
                  <input type="radio" name="play_icon" id="play_icon_yes" value="1" <?php if ($row->play_icon) echo 'checked="checked"'; ?> /><label for="play_icon_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="play_icon" id="play_icon_no" value="0" <?php if (!$row->play_icon) echo 'checked="checked"'; ?> /><label for="play_icon_no"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!--Image options-->
        <div class="spider_div_options" id="div_content_7">        
          <table>
            <tbody>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Enable image title for Image Browser view:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="image_browser_title_enable" id="image_browser_title_enable_1" value="1" <?php if ($row->image_browser_title_enable) echo 'checked="checked"'; ?> /><label for="image_browser_title_enable_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="image_browser_title_enable" id="image_browser_title_enable_0" value="0" <?php if (!$row->image_browser_title_enable) echo 'checked="checked"'; ?> /><label for="image_browser_title_enable_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label><?php _e("Enable image description for Image Browser view:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="radio" name="image_browser_description_enable" id="image_browser_description_enable_1" value="1" <?php if ($row->image_browser_description_enable) echo 'checked="checked"'; ?> /><label for="image_browser_description_enable_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input type="radio" name="image_browser_description_enable" id="image_browser_description_enable_0" value="0" <?php if (!$row->image_browser_description_enable) echo 'checked="checked"'; ?> /><label for="image_browser_description_enable_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options">
                  <label for="image_browser_width"><?php _e("Image width for Image Browser view:", 'bwg_back'); ?></label>
                </td>
                <td>
                  <input type="text" name="image_browser_width" id="image_browser_width" value="<?php echo $row->image_browser_width; ?>" class="spider_int_input" /> px
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <div style="margin: 0;" class="spider_description spider_free_version"><?php _e("The Blog Style view is disabled in free version.", 'bwg_back'); ?></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options spider_free_version_label">
                  <label><?php _e("Enable image title for Blog Style view:", 'bwg_back'); ?></label>
                </td>
                <td class="spider_free_version_label">
                  <input disabled="disabled" type="radio" name="blog_style_title_enable" id="blog_style_title_enable_1" value="1" <?php if ($row->blog_style_title_enable) echo 'checked="checked"'; ?> /><label for="blog_style_title_enable_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input disabled="disabled" type="radio" name="blog_style_title_enable" id="blog_style_title_enable_0" value="0" <?php if (!$row->blog_style_title_enable) echo 'checked="checked"'; ?> /><label for="blog_style_title_enable_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options spider_free_version_label">
                  <label for="blog_style_width"><?php _e("Image width for Blog Style view:", 'bwg_back'); ?></label>
                </td>
                <td class="spider_free_version_label">
                  <input disabled="disabled" type="text" name="blog_style_width" id="blog_style_width" value="<?php echo $row->blog_style_width; ?>" class="spider_int_input spider_free_version_label" /> px
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options spider_free_version_label">
                  <label for="blog_style_images_per_page"><?php _e("Images per page in Blog Style view:", 'bwg_back'); ?></label>
                </td>
                <td class="spider_free_version_label">
                  <input disabled="disabled" type="text" name="blog_style_images_per_page" id="blog_style_images_per_page" value="<?php echo $row->blog_style_images_per_page; ?>" class="spider_int_input spider_free_version_label" />
                  <div class="spider_description"></div>
                </td>
              </tr>
              <tr>
                <td class="spider_label_options spider_free_version_label">
                  <label><?php _e("Enable pagination for Blog Style view:", 'bwg_back'); ?></label>
                </td>
                <td class="spider_free_version_label">
                  <input disabled="disabled" type="radio" name="blog_style_enable_page" id="blog_style_enable_page_1" value="1" <?php if ($row->blog_style_enable_page) echo 'checked="checked"'; ?> /><label for="blog_style_enable_page_1"><?php _e("Yes", 'bwg_back'); ?></label>
                  <input disabled="disabled" type="radio" name="blog_style_enable_page" id="blog_style_enable_page_0" value="0" <?php if (!$row->blog_style_enable_page) echo 'checked="checked"'; ?> /><label for="blog_style_enable_page_0"><?php _e("No", 'bwg_back'); ?></label>
                  <div class="spider_description"></div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--Embed options-->
        <div class="spider_div_options" id="div_content_9">
          <table>
            <tbody>
              <tr>
                <td class="spider_label_options spider_free_version_label">
                  <label ><?php _e("Gallery autoupdate interval:", 'bwg_back'); ?></label>
                </td>
                <td class="spider_free_version_label">
                  <input type="number" disabled="disabled" id="autoupdate_interval_hour" class="spider_int_input" min="0" max="24" value="0" />
                  <?php _e("hour", 'bwg_back'); ?>
                  <input type="number" disabled="disabled" id="autoupdate_interval_min" class="spider_int_input" min="0" max="59" value="30" />
                  <?php _e("min", 'bwg_back'); ?>
                  <div class="spider_description spider_free_version"><?php _e("Autoupdatable galleries are disabled in free version.", 'bwg_back'); ?></div>
                </td>
              </tr>
              
              <tr>
                <td class="spider_label_options spider_free_version_label">
                  <label>Instagram Access Token:</label>
                </td>
                <td class="spider_free_version_label">
                  <input id="instagram_client_id" type="text" disabled="disabled" style="display:inline-block; width:100%;" value="" />
                 <div class="spider_description spider_free_version">Instagram <?php _e("galleries are disabled in free version.", 'bwg_back'); ?></div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
	
	<!-- Carousel-->
		    <div class="spider_div_options" id="div_content_10">
          <table style="width: 100%;">
            <tr>
              <td style="width: 50%; vertical-align: top;">
                <table style="display: inline-table;">
                  <tbody>
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label for="carousel_interval"><?php _e("Time interval:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="text" disabled="disabled" name="carousel_interval" id="carousel_interval" value="<?php echo $row->carousel_interval; ?>" class="spider_int_input" /> sec.
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label for="carousel_image_column_number"><?php _e("Max. number of images:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="text" disabled="disabled" name="carousel_image_column_number" id="carousel_image_column_number" value="<?php echo $row->carousel_image_column_number; ?>" class="spider_int_input" /> sec.
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label for="carousel_image_par"><?php _e("Carousel image ratio:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="text" disabled="disabled" name="carousel_image_par" id="carousel_image_par" value="<?php echo $row->carousel_image_par; ?>"  /> 
                        <div class="spider_description"></div>
                      </td>
                    </tr>                
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label for="carousel_width"><?php _e("Image dimensions:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="text" disabled="disabled" name="carousel_width" id="carousel_width" value="<?php echo $row->carousel_width; ?>" class="spider_int_input" /> x 
                        <input type="text" disabled="disabled" name="carousel_height" id="carousel_height" value="<?php echo $row->carousel_height; ?>" class="spider_int_input" /> px
                        <div class="spider_description"></div>
                      </td>
                    </tr>         
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label for="carousel_r_width"><?php _e("Fixed width:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="text" disabled="disabled" name="carousel_r_width" id="carousel_r_width" value="<?php echo $row->carousel_r_width; ?>" class="spider_int_input" /> px                         
                      </td>
                    </tr>   
                  </tbody>
                </table>
              </td>
              <td style="width: 50%; vertical-align: top;">
                <table style="width: 100%; display: inline-table;">
                  <tbody>
                    <tr>
                      <td class="spider_label_options spider_free_version_label"><label><?php _e("Enable image title:", 'bwg_back'); ?> </label></td>
                      <td class="spider_free_version_label">
                        <input type="radio" disabled="disabled" name="carousel_enable_title" id="carousel_enable_title_yes" value="1" <?php if ($row->carousel_enable_title) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('', 'tr_carousel_title_position', 'carousel_enable_title_yes')" /><label for="carousel_enable_title_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" disabled="disabled" name="carousel_enable_title" id="carousel_enable_title_no" value="0" <?php if (!$row->carousel_enable_title) echo 'checked="checked"'; ?> onClick="bwg_enable_disable('none', 'tr_carousel_title_position', 'carousel_enable_title_no')" /><label for="carousel_enable_title_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label><?php _e("Enable autoplay:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="radio" disabled="disabled" name="carousel_enable_autoplay" id="carousel_enable_autoplay_yes" value="1" <?php if ($row->carousel_enable_autoplay) echo 'checked="checked"'; ?> /><label for="carousel_enable_autoplay_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" disabled="disabled" name="carousel_enable_autoplay" id="carousel_enable_autoplay_no" value="0" <?php if (!$row->carousel_enable_autoplay) echo 'checked="checked"'; ?> /><label for="carousel_enable_autoplay_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label> <?php _e("Container fit:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="radio" disabled="disabled" name="carousel_fit_containerWidth" id="carousel_fit_containerWidth_yes" value="1" <?php if ($row->carousel_fit_containerWidth) echo 'checked="checked"'; ?> /><label for="carousel_fit_containerWidth_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" disabled="disabled" name="carousel_fit_containerWidth" id="carousel_fit_containerWidth_no" value="0" <?php if (!$row->carousel_fit_containerWidth) echo 'checked="checked"'; ?> /><label for="carousel_fit_containerWidth_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr> 
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label> <?php _e("Next/Previous buttons:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="radio" disabled="disabled" name="carousel_prev_next_butt" id="carousel_prev_next_butt_yes" value="1" <?php if ($row->carousel_prev_next_butt) echo 'checked="checked"'; ?> /><label for="carousel_prev_next_butt_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" disabled="disabled" name="carousel_prev_next_butt" id="carousel_prev_next_butt_no" value="0" <?php if (!$row->carousel_prev_next_butt) echo 'checked="checked"'; ?> /><label for="carousel_prev_next_butt_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr> 
                    <tr>
                      <td class="spider_label_options spider_free_version_label">
                        <label> <?php _e("Play/Pause button:", 'bwg_back'); ?> </label>
                      </td>
                      <td class="spider_free_version_label">
                        <input type="radio" disabled="disabled" name="carousel_play_pause_butt" id="carousel_play_pause_butt_yes" value="1" <?php if ($row->carousel_play_pause_butt) echo 'checked="checked"'; ?> /><label for="carousel_play_pause_butt_yes"><?php _e("Yes", 'bwg_back'); ?></label>
                        <input type="radio" disabled="disabled" name="carousel_play_pause_butt" id="carousel_play_pause_butt_no" value="0" <?php if (!$row->carousel_play_pause_butt) echo 'checked="checked"'; ?> /><label for="carousel_play_pause_butt_no"><?php _e("No", 'bwg_back'); ?></label>
                        <div class="spider_description"></div>
                      </td>
                    </tr> 
                  </tbody>
                </table>
              </td>
            </tr>
          </table>
          <div class="spider_description spider_free_version"><?php _e("Carousel view is disabled in free version.", 'bwg_back'); ?></div>
        </div>
      </div>
      <input id="task" name="task" type="hidden" value="" />
      <input id="recreate" name="recreate" type="hidden" value="" />
      <input id="current_id" name="current_id" type="hidden" value="<?php echo $row->id; ?>" />
      <input id="watermark" name="watermark" type="hidden" value="" />
      <script>
        window.onload = bwg_change_option_type('<?php echo isset($_POST['type']) ? esc_html($_POST['type']) : '1'; ?>');
        window.onload = bwg_inputs();
        window.onload = bwg_watermark('watermark_type_<?php echo $row->watermark_type ?>');
        window.onload = bwg_built_in_watermark('watermark_type_<?php echo $row->built_in_watermark_type ?>');
        window.onload = bwg_popup_fullscreen(<?php echo $row->popup_fullscreen; ?>);
        window.onload = bwg_enable_disable(<?php echo $row->show_search_box ? "'', 'tr_search_box_width', 'show_search_box_1'" : "'none', 'tr_search_box_width', 'show_search_box_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->show_search_box ? "'', 'tr_search_box_placeholder', 'show_search_box_1'" : "'none', 'tr_search_box_placeholder', 'show_search_box_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->preload_images ? "'', 'tr_preload_images_count', 'preload_images_1'" : "'none', 'tr_preload_images_count', 'preload_images_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_fullscreen', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_fullscreen', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_info', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_info', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_download', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_download', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_fullsize_image', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_fullsize_image', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_comment', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_comment', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? ($row->popup_enable_comment ? "'', 'tr_comment_moderation', 'popup_enable_comment_1'" : "'none', 'tr_comment_moderation', 'popup_enable_comment_0'") : "'none', 'tr_comment_moderation', 'popup_enable_comment_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? ($row->popup_enable_comment ? "'', 'tr_popup_email', 'popup_enable_comment_1'" : "'none', 'tr_popup_email', 'popup_enable_comment_0'") : "'none', 'tr_popup_email', 'popup_enable_comment_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? ($row->popup_enable_comment ? "'', 'tr_popup_captcha', 'popup_enable_comment_1'" : "'none', 'tr_popup_captcha', 'popup_enable_comment_0'") : "'none', 'tr_popup_captcha', 'popup_enable_comment_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_facebook', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_facebook', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_twitter', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_twitter', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_google', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_google', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_pinterest', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_pinterest', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_ctrl_btn ? "'', 'tr_popup_thumblr', 'popup_enable_ctrl_btn_1'" : "'none', 'tr_popup_thumblr', 'popup_enable_ctrl_btn_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->popup_enable_filmstrip ? "'', 'tr_popup_filmstrip_height', 'popup_enable_filmstrip_1'" : "'none', 'tr_popup_filmstrip_height', 'popup_enable_filmstrip_0'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->slideshow_enable_filmstrip ? "'', 'tr_slideshow_filmstrip_height', 'slideshow_enable_filmstrip_yes'" : "'none', 'tr_slideshow_filmstrip_height', 'slideshow_enable_filmstrip_no'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->slideshow_enable_title ? "'', 'tr_slideshow_title_position', 'slideshow_enable_title_yes'" : "'none', 'tr_slideshow_title_position', 'slideshow_enable_title_no'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->slideshow_enable_description ? "'', 'tr_slideshow_description_position', 'slideshow_enable_description_yes'" : "'none', 'tr_slideshow_description_position', 'slideshow_enable_description_no'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->slideshow_enable_music ? "'', 'tr_slideshow_music_url', 'slideshow_enable_music_yes'" : "'none', 'tr_slideshow_music_url', 'slideshow_enable_music_no'" ?>);
        window.onload = bwg_enable_disable(<?php echo $row->thumb_click_action == 'redirect_to_url' ? "'', 'tr_thumb_link_target', 'thumb_click_action_2'" : "'none', 'tr_thumb_link_target', 'thumb_click_action_" . ($row->thumb_click_action == 'open_lightbox' ? 1 : 3) . "'"; ?>);
        window.onload = preview_watermark();
        window.onload = preview_built_in_watermark();
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