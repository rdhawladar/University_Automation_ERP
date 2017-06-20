<?php
/**
 * Author: Rob
 * Date: 6/24/13
 * Time: 11:48 AM
 */

class FilemanagerView {
    ////////////////////////////////////////////////////////////////////////////////////////
    // Events                                                                             //
    ////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////
    // Constants                                                                          //
    ////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////
    // Variables                                                                          //
    ////////////////////////////////////////////////////////////////////////////////////////
    private $controller;
    private $model;

    ////////////////////////////////////////////////////////////////////////////////////////
    // Constructor & Destructor                                                           //
    ////////////////////////////////////////////////////////////////////////////////////////
    public function __construct($controller, $model) {
      $this->controller = $controller;
      $this->model = $model;
    }

    ////////////////////////////////////////////////////////////////////////////////////////
    // Public Methods                                                                     //
    ////////////////////////////////////////////////////////////////////////////////////////
    public function display() {
      if (isset($_GET['filemanager_msg']) && esc_html($_GET['filemanager_msg']) != '') {
        ?>
        <div id="file_manager_message" style="height:40px;">
          <div  style="background-color: #FFEBE8; border: 1px solid #CC0000; margin: 5px 15px 2px; padding: 5px 10px;">
            <strong style="font-size:14px"><?php echo esc_html(stripslashes($_GET['filemanager_msg'])); ?></strong>
          </div>
        </div>
        <?php
        $_GET['filemanager_msg'] = '';
      }
      $bwg_options = $this->controller->get_options_data();
      $file_manager_data = $this->model->get_file_manager_data();

      $items_view = $file_manager_data['session_data']['items_view'];
      $sort_by = $file_manager_data['session_data']['sort_by'];
      $sort_order = $file_manager_data['session_data']['sort_order'];
      $clipboard_task = $file_manager_data['session_data']['clipboard_task'];
      $clipboard_files = $file_manager_data['session_data']['clipboard_files'];
      $clipboard_src = $file_manager_data['session_data']['clipboard_src'];
      $clipboard_dest = $file_manager_data['session_data']['clipboard_dest'];
      $icons_dir_url = WD_BWG_URL . '/filemanager/images/file_icons';
      $sort_icon = $icons_dir_url . '/' . $sort_order;
      wp_print_scripts('jquery');
      wp_print_scripts('jquery-ui-widget');
      wp_print_scripts('wp-pointer');
      wp_print_styles('admin-bar');
      wp_print_styles('dashicons');
      wp_print_styles('wp-admin');
      wp_print_styles('buttons');
      wp_print_styles('wp-auth-check');
      wp_print_styles('wp-pointer');
      ?>
      <script src="<?php echo WD_BWG_URL; ?>/filemanager/js/jq_uploader/jquery.iframe-transport.js"></script>
      <script src="<?php echo WD_BWG_URL; ?>/filemanager/js/jq_uploader/jquery.fileupload.js"></script>
      <link media="all" type="text/css" href="<?php echo get_admin_url(); ?>load-styles.php?c=1&amp;dir=ltr&amp;load=admin-bar,dashicons,wp-admin,buttons,wp-auth-check,wp-pointer" rel="stylesheet">
      <script>
        var DS = "<?php echo addslashes('/'); ?>";

        var errorLoadingFile = "<?php echo __('File loading failed', 'bwg_back'); ?>";

        var warningRemoveItems = "<?php echo __('Are you sure you want to permanently remove selected items?', 'bwg_back'); ?>";
        var warningCancelUploads = "<?php echo __('This will cancel uploads. Continue?', 'bwg_back'); ?>";

        var messageEnterDirName = "<?php echo __('Enter directory name', 'bwg_back'); ?>";
        var messageEnterNewName = "<?php echo __('Enter new name', 'bwg_back'); ?>";
        var messageFilesUploadComplete = "<?php echo __('Processing uploaded files...', 'bwg_back'); ?>";

        var root = "<?php echo addslashes($this->controller->get_uploads_dir()); ?>";
        var dir = "<?php echo (isset($_REQUEST['dir']) ? addslashes(esc_html($_REQUEST['dir'])) : ''); ?>";
        var dirUrl = "<?php echo $this->controller->get_uploads_url() . (isset($_REQUEST['dir']) ? esc_html($_REQUEST['dir']) . '/' : ''); ?>";
        var callback = "<?php echo (isset($_REQUEST['callback']) ? esc_html($_REQUEST['callback']) : ''); ?>";
        var sortBy = "<?php echo $sort_by; ?>";
        var sortOrder = "<?php echo $sort_order; ?>";
        jQuery(document).ready(function () {
          jQuery("#search_by_name .search_by_name").on("input keyup", function() {
            var search_by_name = jQuery(this).val();
            jQuery("#explorer_body .explorer_item").each(function() {
            jQuery(this).hide();
            if (jQuery(this).find(".item_name").html().trim().toLowerCase().indexOf(search_by_name) !== -1) {
              jQuery(this).show();
            }
            });
          });
        });
      </script>
      <script src="<?php echo WD_BWG_URL; ?>/filemanager/js/default.js?ver=<?php echo wd_bwg_version(); ?>"></script>
      <link href="<?php echo WD_BWG_URL; ?>/filemanager/css/default.css?ver=<?php echo wd_bwg_version(); ?>" type="text/css" rel="stylesheet">
      <?php
      switch ($items_view) {
        case 'list':
          ?>
          <link href="<?php echo WD_BWG_URL; ?>/filemanager/css/default_view_list.css?ver=<?php echo wd_bwg_version(); ?>" type="text/css" rel="stylesheet">
          <?php
          break;
        case 'thumbs':
          ?>
          <link href="<?php echo WD_BWG_URL; ?>/filemanager/css/default_view_thumbs.css?ver=<?php echo wd_bwg_version(); ?>" type="text/css" rel="stylesheet">
          <?php
          break;
      }
      $i = 0;
      ?>

      <form id="adminForm" name="adminForm" action="" method="post">
      <?php wp_nonce_field( '', 'bwg_nonce' ); ?>
        <div id="wrapper">
          <div id="opacity_div" style="background-color: rgba(0, 0, 0, 0.2); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 99998;"></div>
          <div id="loading_div" style="text-align: center; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 99999;">
            <img src="<?php echo WD_BWG_URL . '/images/ajax_loader.png'; ?>" class="spider_ajax_loading" style="margin-top: 200px; width:50px;">
          </div>
          <div id="file_manager">
            <div class="ctrls_bar ctrls_bar_header">
              <div class="ctrls_left">
                <a class="ctrl_bar_btn btn_up" onclick="onBtnUpClick(event, this);" title="<?php echo __('Up', 'bwg_back'); ?>"></a>
                <a class="ctrl_bar_btn btn_make_dir" onclick="onBtnMakeDirClick(event, this);" title="<?php echo __('Make a directory', 'bwg_back'); ?>"></a>
                <a class="ctrl_bar_btn btn_rename_item" onclick="onBtnRenameItemClick(event, this);" title="<?php echo __('Rename item', 'bwg_back'); ?>"></a>
                <span class="ctrl_bar_divider"></span>
                <a class="ctrl_bar_btn btn_copy" onclick="onBtnCopyClick(event, this);" title="<?php echo __('Copy', 'bwg_back'); ?>"></a>
                <a class="ctrl_bar_btn btn_cut" onclick="onBtnCutClick(event, this);" title="<?php echo __('Cut', 'bwg_back'); ?>"></a>
                <a class="ctrl_bar_btn btn_paste" onclick="onBtnPasteClick(event, this);" title="<?php echo __('Paste', 'bwg_back'); ?>"> </a>
                <a class="ctrl_bar_btn btn_remove_items" onclick="onBtnRemoveItemsClick(event, this);" title="<?php echo __('Remove items', 'bwg_back'); ?>"></a>
                <span class="ctrl_bar_divider"></span>
                <span class="ctrl_bar_btn btn_primary">
                  <a class="ctrl_bar_btn btn_upload_files" id='upload_images' onclick="onBtnShowUploaderClick(event, this);"><?php echo __('Upload files', 'bwg_back'); ?></a>
                </span>
                <?php if ($bwg_options->enable_ML_import) { ?>
                <span class="ctrl_bar_divider"></span>
                <span class="ctrl_bar_btn btn_primary">
                  <a class="ctrl_bar_btn btn_import_files" onclick="onBtnShowImportClick(event, this);"><?php echo __('Media library', 'bwg_back'); ?></a>
                </span>
                <?php } ?>
		<span class="ctrl_bar_divider"></span>
                <span id="search_by_name" class="ctrl_bar_btn">
                  <input type="search" placeholder="Search" class="ctrl_bar_btn search_by_name">
                </span>
              </div>
              <div class="ctrls_right">
                <a class="ctrl_bar_btn btn_view_thumbs" onclick="onBtnViewThumbsClick(event, this);" title="<?php echo __('View thumbs', 'bwg_back'); ?>"></a>
                <a class="ctrl_bar_btn btn_view_list" onclick="onBtnViewListClick(event, this);" title="<?php echo __('View list', 'bwg_back'); ?>"></a>
              </div>
            </div>
            <div id="path">
              <?php
              foreach ($file_manager_data['path_components'] as $key => $path_component) {
                ?>
                <a <?php echo ($key == 0) ? 'title="'. __("To change upload directory go to Options page.", 'bwg_back').'"' : ''; ?> class="path_component path_dir"
                   onclick="onPathComponentClick(event, this, '<?php echo addslashes($path_component['path']); ?>');">
                    <?php echo $path_component['name']; ?></a>
                <a class="path_component path_separator"><?php echo '/'; ?></a>
                <?php
              }
              ?>
            </div>
            <div id="explorer">
              <div id="explorer_header_wrapper">
                <div id="explorer_header_container">
                  <div id="explorer_header">
                    <span class="item_numbering">#</span>
                    <span class="item_icon"></span>
                    <span class="item_name">
                      <span class="clickable" onclick="onNameHeaderClick(event, this);">
                          <?php
                          echo 'Name';
                          if ($sort_by == 'name') {
                            ?>
                            <span class="sort_order_<?php echo $sort_order; ?>"></span>
                            <?php
                          }
                          ?>
                      </span>
                    </span>
                    <span class="item_size">
                      <span class="clickable" onclick="onSizeHeaderClick(event, this);">
                        <?php
                        echo 'Size';
                        if ($sort_by == 'size') {
                          ?>
                          <span class="sort_order_<?php echo $sort_order; ?>"></span>
                          <?php
                        }
                        ?>
                      </span>
                    </span>
                    <span class="item_date_modified">
                      <span class="clickable" onclick="onDateModifiedHeaderClick(event, this);">
                        <?php
                        echo 'Date modified';
                        if ($sort_by == 'date_modified') {
                          ?>
                          <span class="sort_order_<?php echo $sort_order; ?>"></span>
                          <?php
                        }
                        ?>
                      </span>
                    </span>
                    <span class="scrollbar_filler"></span>
                  </div>
                </div>
              </div>
              <div id="explorer_body_wrapper">
                <div id="explorer_body_container">
                  <div id="explorer_body">
                    <?php
                    foreach ($file_manager_data['files'] as $key => $file) {
                      $file['name'] = esc_html($file['name']);
                      $file['filename'] = esc_html($file['filename']);
                      $file['thumb'] = esc_html($file['thumb']);
                      ?>
                      <div class="explorer_item" draggable="true"
                           name="<?php echo $file['name']; ?>"
                           filename="<?php echo $file['filename']; ?>"
                           filethumb="<?php echo $file['thumb']; ?>"
                           filesize="<?php echo $file['size']; ?>"
                           filetype="<?php echo strtoupper($file['type']); ?>"
                           date_modified="<?php echo $file['date_modified']; ?>"
                           fileresolution="<?php echo $file['resolution']; ?>"
                           fileCredit="<?php echo isset($file['credit']) ? $file['credit'] : ''; ?>"
                           fileAperture="<?php echo isset($file['aperture']) ? $file['aperture'] : ''; ?>"
                           fileCamera="<?php echo isset($file['camera']) ? $file['camera'] : ''; ?>"
                           fileCaption="<?php echo isset($file['caption']) ? $file['caption'] : ''; ?>"
                           fileIso="<?php echo isset($file['iso']) ? $file['iso'] : ''; ?>"
                           fileOrientation="<?php echo isset($file['orientation']) ? $file['orientation'] : ''; ?>"
                           fileCopyright="<?php echo isset($file['copyright']) ? $file['copyright'] : ''; ?>"
                           onmouseover="onFileMOver(event, this);"
                           onmouseout="onFileMOut(event, this);"
                           onclick="onFileClick(event, this);"
                           ondblclick="onFileDblClick(event, this);"
                           ondragstart="onFileDragStart(event, this);"
                          <?php
                          if ($file['is_dir'] == true) {
                            ?>
                            ondragover="onFileDragOver(event, this);"
                            ondrop="onFileDrop(event, this);"
                            <?php
                          }
                          ?>
                            isDir="<?php echo $file['is_dir'] == true ? 'true' : 'false'; ?>">
                        <span class="item_numbering"><?php echo ++$i; ?></span>
                        <span class="item_thumb">
                          <img src="<?php echo $file['thumb']; ?>" <?php echo $key == 24 ? 'onload="loaded()"' : ''; ?> />
                        </span>
                        <span class="item_icon">
                          <img src="<?php echo $file['icon']; ?>"/>
                        </span>
                        <span class="item_name">
                          <?php echo $file['name']; ?>
                        </span>
                        <span class="item_size">
                          <?php echo $file['size']; ?>
                        </span>
                        <span class="item_date_modified">
                          <?php echo $file['date_modified']; ?>
                        </span>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="ctrls_bar ctrls_bar_footer">
              <div class="ctrls_left">
                <a class="ctrl_bar_btn btn_open btn_primary none_select" id='select_all_images' onclick="onBtnSelectAllClick();"><?php echo __('Select All', 'bwg_back'); ?></a>
              </div>
              <div class="ctrls_right">
                <span id="file_names_span">
                  <span>
                  </span>
                </span>
                <a class="ctrl_bar_btn btn_open btn_primary none_select" id='add_selectid_img' onclick="onBtnOpenClick(event, this);"><?php echo ((isset($_REQUEST['callback']) && esc_html($_REQUEST['callback']) == 'bwg_add_image') ? __('Add selected images to gallery', 'bwg_back') : __('Add', 'bwg_back')); ?></a>
                <span class="ctrl_bar_empty_devider"></span>
                <a class="ctrl_bar_btn btn_cancel btn_secondary none_select" onclick="onBtnCancelClick(event, this);"><?php echo 'Cancel'; ?></a>
              </div>
            </div>
          </div>
          <div id="importer" style="display: none;">
            <div id="importer_bg"></div>
            <div class="ctrls_bar ctrls_bar_header">
              <div class="ctrls_left upload_thumb">
                <?php echo __("Thumbnail Maximum Dimensions:", 'bwg_back'); ?>
                <input type="text" class="upload_thumb_dim" name="importer_thumb_width" id="importer_thumb_width" value="<?php echo $bwg_options->upload_thumb_width; ?>" /> x 
                <input type="text" class="upload_thumb_dim" name="importer_thumb_height" id="importer_thumb_height" value="<?php echo $bwg_options->upload_thumb_height; ?>" /> px
              </div>
              <div class="ctrls_right">
                <a class="ctrl_bar_btn btn_back" onclick="onBtnBackClick(event, this);" title="<?php echo __('Back', 'bwg_back'); ?>"></a>
              </div>
              <div class="ctrls_right_img upload_thumb">
                <?php echo __("Image Maximum Dimensions:", 'bwg_back'); ?>
                <input type="text" class="upload_thumb_dim" name="importer_img_width" id="importer_img_width" value="<?php echo $bwg_options->upload_img_width; ?>" /> x 
                <input type="text" class="upload_thumb_dim" name="importer_img_height" id="importer_img_height" value="<?php echo $bwg_options->upload_img_height; ?>" /> px
              </div>
            </div>
            <div id="importer_body_wrapper">
              <div id="importer_body_container">
                <div id="importer_body">
                  <?php
                  foreach ($file_manager_data['media_library_files'] as $key => $file) {
                    $file['name'] = esc_html($file['name']);
                    $file['filename'] = esc_html($file['filename']);
                    $file['thumb'] = esc_html($file['thumb']);
                    ?>
                    <div class="importer_item" draggable="true"
                         name="<?php echo $file['name']; ?>"
                         path="<?php echo $file['path']; ?>"
                         filename="<?php echo $file['filename']; ?>"
                         filethumb="<?php echo $file['thumb']; ?>"
                         filesize="<?php echo $file['size']; ?>"
                         filetype="<?php echo strtoupper($file['type']); ?>"
                         date_modified="<?php echo $file['date_modified']; ?>"
                         fileresolution="<?php echo $file['resolution']; ?>"
                         fileCredit="<?php echo $file['credit']; ?>"
                         fileAperture="<?php echo $file['aperture']; ?>"
                         fileCamera="<?php echo $file['camera']; ?>"
                         fileCaption="<?php echo $file['caption']; ?>"
                         fileIso="<?php echo $file['iso']; ?>"
                         fileOrientation="<?php echo $file['orientation']; ?>"
                         fileCopyright="<?php echo $file['copyright']; ?>"
                         onmouseover="onFileMOverML(event, this);"
                         onmouseout="onFileMOutML(event, this);"
                         onclick="onFileClickML(event, this);"
                         ondblclick="onFileDblClickML(event, this);"
                         isDir="<?php echo $file['is_dir'] == true ? 'true' : 'false'; ?>">
                      <span class="item_numbering"><?php echo ++$i; ?></span>
                      <span class="item_thumb">
                        <img src="<?php echo $file['thumb']; ?>" <?php echo $key == 24 ? 'onload="loaded()"' : ''; ?> />
                      </span>
                      <span class="item_icon">
                        <img src="<?php echo $file['icon']; ?>"/>
                      </span>
                      <span class="item_name">
                        <?php echo $file['name']; ?>
                      </span>
                      <span class="item_size">
                        <?php echo $file['size']; ?>
                      </span>
                      <span class="item_date_modified">
                        <?php echo $file['date_modified']; ?>
                      </span>
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="ctrls_bar ctrls_bar_footer">
              <div class="ctrls_left">
                <a class="ctrl_bar_btn btn_open btn_primary none_select" onclick="onBtnSelectAllMediLibraryClick();"><?php echo __('Select All','bwg_back'); ?></a>
              </div>
              <div class="ctrls_right">
                <span id="file_names_span">
                  <span>
                  </span>
                </span>
                <a class="ctrl_bar_btn btn_open btn_primary none_select" onclick="onBtnImportClick(event, this);"><?php echo __("Import selected images", 'bwg_back'); ?></a>
              </div>
            </div>
          </div>
          <div id="uploader">
            <div id="uploader_bg"></div>
            <div class="ctrls_bar ctrls_bar_header">
              <div class="ctrls_left upload_thumb">
                <?php echo __("Thumbnail Maximum Dimensions:", 'bwg_back'); ?>
                <input type="text" class="upload_thumb_dim" name="upload_thumb_width" id="upload_thumb_width" value="<?php echo $bwg_options->upload_thumb_width; ?>" /> x 
                <input type="text" class="upload_thumb_dim" name="upload_thumb_height" id="upload_thumb_height" value="<?php echo $bwg_options->upload_thumb_height; ?>" /> px
              </div>
              <div class="ctrls_right">
                <a class="ctrl_bar_btn btn_back" onclick="onBtnBackClick(event, this);" title="<?php echo __('Back', 'bwg_back'); ?>"></a>
              </div>
              <div class="ctrls_right_img upload_thumb">
                <?php echo __("Image Maximum Dimensions:", 'bwg_back'); ?>
                <input type="text" class="upload_thumb_dim" name="upload_img_width" id="upload_img_width" value="<?php echo $bwg_options->upload_img_width; ?>" /> x 
                <input type="text" class="upload_thumb_dim" name="upload_img_height" id="upload_img_height" value="<?php echo $bwg_options->upload_img_height; ?>" /> px
              </div>
            </div>
            <label for="jQueryUploader">
              <div id="uploader_hitter">
                <div id="drag_message">
                  <span><?php echo __('Drag files here or click the button below','bwg_back') . '<br />' . __('to upload files','bwg_back')?></span>
                </div>
                <div id="btnBrowseContainer">
                <?php
                $query_url = wp_nonce_url( admin_url('admin-ajax.php'), 'bwg_UploadHandler', 'bwg_nonce' );
                $query_url = add_query_arg(array('action' => 'bwg_UploadHandler', 'dir' => (isset($_REQUEST['dir']) ? esc_html($_REQUEST['dir']) : '') . '/'), $query_url);
                

                ?>


                  <input id="jQueryUploader" type="file" name="files[]"
                         data-url="<?php echo $query_url; ?>"
                         multiple>
                </div>
                <script>
                  jQuery("#jQueryUploader").fileupload({
                    dataType: "json",
                    dropZone: jQuery("#uploader_hitter"),
                    submit: function (e, data) {
                      jQuery("#uploader_progress_text").removeClass("uploader_text");
                      isUploading = true;
                      jQuery("#uploader_progress_bar").fadeIn();
                    },
                    progressall: function (e, data) {
                      var progress = parseInt(data.loaded / data.total * 100, 10);
                      jQuery("#uploader_progress_text").text("Progress " + progress + "%");
                      jQuery("#uploader_progress div div").css({width: progress + "%"});
                      if (data.loaded == data.total) {
                        isUploading = false;
                        jQuery("#uploader_progress_bar").fadeOut(function () {
                          jQuery("#uploader_progress_text").text(messageFilesUploadComplete);
                          jQuery("#uploader_progress_text").addClass("uploader_text");
                        });
                        jQuery("#opacity_div").show();
                        jQuery("#loading_div").show();
                      }
                    },
                    stop: function (e, data) {
                      onBtnBackClick();
                    },
                    done: function (e, data) {
                      jQuery.each(data.files, function (index, file) {
                        if (file.error) {
                          alert(errorLoadingFile + ' :: ' + file.error);
                        }
                        if (file.error) {
                          jQuery("#uploaded_files ul").prepend(jQuery("<li class=uploaded_item_failed>" + "<?php echo 'Upload failed' ?> :: " + file.error + "</li>"));
                        }
                        else {
                          jQuery("#uploaded_files ul").prepend(jQuery("<li class=uploaded_item>" + file.name + " (<?php echo 'Uploaded' ?>)" + "</li>"));
                        }
                      });
                      jQuery("#opacity_div").hide();
                      jQuery("#loading_div").hide();
                    }
                  });
                </script>
              </div>
            </label>
            <div id="uploaded_files">
              <ul></ul>
            </div>
            <div id="uploader_progress">
              <div id="uploader_progress_bar">
                <div></div>
              </div>
              <span id="uploader_progress_text" class="uploader_text">
                <?php echo __('No files to upload', 'bwg_back'); ?>
              </span>
            </div>
          </div>
        </div>

        <input type="hidden" name="task" value="">
        <input type="hidden" name="extensions" value="<?php echo (isset($_REQUEST['extensions']) ? esc_html($_REQUEST['extensions']) : '*'); ?>">
        <input type="hidden" name="callback" value="<?php echo (isset($_REQUEST['callback']) ? esc_html($_REQUEST['callback']) : ''); ?>">
        <input type="hidden" name="sort_by" value="<?php echo $sort_by; ?>">
        <input type="hidden" name="sort_order" value="<?php echo $sort_order; ?>">
        <input type="hidden" name="items_view" value="<?php echo $items_view; ?>">
        <input type="hidden" name="dir" value="<?php echo (isset($_REQUEST['dir']) ? esc_html($_REQUEST['dir']) : ''); ?>"/>
        <input type="hidden" name="file_names" value=""/>
        <input type="hidden" name="file_namesML" value=""/>
        <input type="hidden" name="file_new_name" value=""/>
        <input type="hidden" name="new_dir_name" value=""/>
        <input type="hidden" name="clipboard_task" value="<?php echo $clipboard_task; ?>"/>
        <input type="hidden" name="clipboard_files" value="<?php echo $clipboard_files; ?>"/>
        <input type="hidden" name="clipboard_src" value="<?php echo $clipboard_src; ?>"/>
        <input type="hidden" name="clipboard_dest" value="<?php echo $clipboard_dest; ?>"/>
      </form>
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