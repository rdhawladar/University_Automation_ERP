<?php

class BWG_pointers {
    private $prefix = 'bwg';
    private $page_url = '';
    private $pointers = array();
    private $page_pointers = array();
    private $pointer_script = array();
    private $pointer_text = array();

    public function __construct() {
      $user_meta = get_user_meta(get_current_user_id(), 'bwg_photo_gallery');
      if (is_array($user_meta) && !empty($user_meta)) {
        $this->set_urls();
        $this->set_pointer_text();
        $this->set_pointers();
        $this->get_page_pointers();
        if ($this->page_url == 'upload_image.php') {
          $this->show_pointer();
        }
        else {
          add_action('admin_enqueue_scripts', array($this, 'show_pointer'));
        }
        add_action('wp_ajax_bwg_tour', array($this, 'dismiss_pointer'));
      }
    }

    public function dismiss_pointer() {
      delete_user_meta(get_current_user_id(), 'bwg_photo_gallery');
      wp_die();
    }

    private function set_urls() {
      $path_info = pathinfo($_SERVER['REQUEST_URI']);
      $file_name = $path_info['filename'];
      if ( $file_name === 'admin-ajax' && ($_REQUEST['action'] == 'addImages' || $_REQUEST['action'] == 'addAlbumsGalleries' ||  $_REQUEST['action'] == 'BWGShortcode') ) {
        $this->page_url = 'upload_image.php';
      }
      elseif ($file_name === 'plugins') {
        $this->page_url = 'plugins.php';
      }
      else {
        $this->page_url = basename($_SERVER['REQUEST_URI']);
      }
    }

    private function get_page_pointers() {
      $post_type = false;
      if (isset($_REQUEST['post']) && intval($_REQUEST['post']) !== 0 && isset($_REQUEST['action']) && $_REQUEST['action'] === 'edit') {
          $post_type = get_post_type($_REQUEST['post']);
      }
      foreach ($this->pointers as $id => $options) {
        $t = false;
        if ((!$post_type && $this->page_url == 'upload_image.php') || !isset($options['post_type']) || (isset($options['post_type']) && $post_type === $options['post_type'])) {
          $t = true;
        }
        if ($options['page'] === $this->page_url && $t) {
          $this->page_pointers[$id] = $this->set_pointer_options($id, $options);
        }
      }
    }

    private function set_pointer_options($pointer_id, $options) {
      $container_id = $this->get_conteiner_id($pointer_id);
      $html = '<h3>' . $options['title'] . '</h3>';
      $content = (isset($this->pointer_text [$pointer_id])) ? $this->pointer_text [$pointer_id]: 'No text';
      $openFunctionContent = '(function( $ ) {' . join(";", $this->pointer_buttons($container_id, $options) ) . '; $("#' . $container_id . '").closest(".wp-pointer").addClass("wp-pointer-aligned-' . $options['align'] . ' ' . ( isset( $options['tooltip_class'] ) ? $options['tooltip_class'] : '' ) . '"); })( jQuery );';
      $html .= '<div style="padding:5px 10px; " id="' . $container_id . '">' . $this->pointer_text [$pointer_id] . '</div>';
      return array(
        'selector' => $options['selector'],
        'content' => $html,
        'openFunctionContent' => $openFunctionContent,
        'edge' => $options['edge'],
        'align' => $options['align'],
        'close_on_click' => isset( $options['close_on_click'] ) ? $options['close_on_click'] : false,
        'target_delayed' => isset( $options['target_delayed'] ) ? $options['target_delayed'] : false,
        'show_on_event' => isset( $options['show_on_event'] ) ? $options['show_on_event'] : '',
        'hide_on_event' => isset( $options['hide_on_event'] ) ? $options['hide_on_event'] : ''
      );
    }

    private function pointer_buttons($container_id, $options) {
      $this->pointer_script = array();
      if (isset($options['buttons']) && is_array($options['buttons']) && !empty($options['buttons'])) {
        foreach ($options['buttons'] as $button_class => $button_options) {
          $button = $button_class . '_button';
          $this->add_button_script($button_class, $button_options, $container_id);
          $this->$button($button_class, $button_options, $container_id);
        }
        if (isset($options['display']) && $options['display'] === false) {
          $this->pointer_script[] = '$("#' . $container_id . '").closest(".wp-pointer").hide();';
        }
        if (isset($options['scroll'])) {
          $this->pointer_script[] = 'setTimeout(function(){window.scrollTo(0, $("' . $options['scroll'] . '").offset().top-100)},1000);';
        }
        if (isset($options['close_on_click']) && $options['close_on_click'] == true) {
          $this->pointer_script[] = '$("' . $options['selector'] . '").on("click", function() { $("#' . $container_id . '").closest(".wp-pointer").hide();});';
        }
      }
      $pointer_script = $this->pointer_script;
      $this->pointer_script = array();
      return $pointer_script;
    }

    private function next_page_button($button_class, $options, $container_id) {
      $this->pointer_script[] = '$(".' . $button_class . '").on("click",function(){'
              . 'window.location.href="' . $options['url'] . '"'
              . '});';
    }

    private function next_pointer_button($button_class, $options, $container_id) {
      $pointer_conteiner_id = $this->get_conteiner_id($options['pointer_id']);
      $scroll_srcpt = "";
      if (isset($options['scroll'])) {
        $scroll_srcpt = '$(document).scrollTop($("' . $options['scroll'] . '").offset().top - 35);';
      }
      $this->pointer_script[] = '$("#' . $container_id . '").closest(".wp-pointer").find(".' . $button_class . '").on("click",function(){'
              . '$("#' . $pointer_conteiner_id . '") . closest(".wp-pointer") . show();'
              . '$(this).closest(".wp-pointer").hide();'
              . $scroll_srcpt
              . '});';
    }

    private function add_button_script($button_class, $options, $container_id) {
     if ($container_id != 'bwg_Add_image' && $container_id != 'bwg_add_alboms_gallery' && $container_id != 'bwg_add-shortcode' && $container_id != 'bwg_upload_image' && $container_id != 'bwg_add_selected_images' && $container_id != 'bwg_add_albums_gallery' && $container_id != 'bwg_add_album' && $container_id != 'bwg_choose_file' &&  $container_id != 'bwg_save_album' && $container_id != 'bwg_add-shortcode-gallery' && $container_id != 'bwg_insert_shortcode' && $container_id != 'bwg_save_gallery') {
        $button_class = 'class="button-secondary ' . $button_class . '"';
        $element = 'jQuery("#' . $container_id . '").closest(".wp-pointer-content").find(".wp-pointer-buttons")';
        $script = "jQuery('<button " . $button_class . ">" . $options['title'] . "</button>').appendTo(" . $element . ");";
        $this->pointer_script[] = $script;
      }
    }

    public function show_pointer() {
      if ( $this->page_url == 'upload_image.php'  ) {
        ob_start();
        $this->print_pointer_script();
       /* echo ob_get_clean();*/
      }
      else {
        wp_enqueue_style('wp-pointer');
        wp_enqueue_script('wp-pointer');
        add_action('admin_print_footer_scripts', array($this, 'print_pointer_script'));
      }
    }

    public function print_pointer_script() {
      ?>
    <script type="text/javascript">
    if (typeof jQuery != "undefined") {
      jQuery(document).ready(function() {
        (function ($) {
          var action = 'bwg_tour';
          <?php
          foreach ($this->page_pointers as $id => $options) {
            ?>
            var t;
            var isDelayed = <?php echo isset( $options['target_delayed'] ) && $options['target_delayed'] == true ? 'true' : 'false'; ?>;
            var showOnEvent = '<?php echo isset( $options['show_on_event'] ) ? $options['show_on_event'] : ''; ?>';
            var hideOnEvent = '<?php echo isset( $options['hide_on_event'] ) ? $options['hide_on_event'] : ''; ?>'; 
                if ( showOnEvent && showOnEvent != "" ) {
                  (function() {
                    $(document).on(showOnEvent, function() {
                      $('<?php echo $options['selector']; ?>').pointer({
                        content: '<?php echo $options['content']; ?>',
                        position: {
                          edge: '<?php echo $options['edge']; ?>',
                          align: '<?php echo $options['align']; ?>'
                        },
                        close: function () {
                          if ('<?php echo $options['selector']; ?>' != '#select_all_images' ) {
                            jQuery.post(
                              ajaxurl, {'action': action},
                              function (response) {

                              });
                            }
                          }
                        }).pointer('open');
                        <?php echo $options['openFunctionContent']; ?>
                    });
                  })()
                }
                else if ( isDelayed ) {
                  (function() {
                    var interval = setInterval(function() {
                      if ( $('<?php echo $options['selector']; ?>').length && $('<?php echo $options['selector']; ?>').is(":visible") ) {
                        $('<?php echo $options['selector']; ?>').pointer({
                          content: '<?php echo $options['content']; ?>',
                          position: {
                            edge: '<?php echo $options['edge']; ?>',
                            align: '<?php echo $options['align']; ?>'
                          },
                          close: function () {                              
                              jQuery.post(
                                       ajaxurl, {'action': action},
                              function (response) {

                              });
                          }
                        }).pointer('open');
                        
                        <?php echo $options['openFunctionContent']; ?>
                        clearInterval( interval );
                      }
                    }, 350);
                  })()
                }
                else {
                  $('<?php echo $options['selector']; ?>').pointer({
                    content: '<?php echo $options['content']; ?>',
                    position: {
                      edge: '<?php echo $options['edge']; ?>',
                      align: '<?php echo $options['align']; ?>',
                    },
                    close: function () {
                        if ('<?php echo $options['selector']; ?>' != '#select_all_images') {
                          jQuery.post(
                            ajaxurl, {'action': action},
                          function (response) {
                            
                          });
                        }
                    }
                  }).pointer('open');
                  
                  <?php echo $options['openFunctionContent']; ?>
                }
                 
                  $(document).on(hideOnEvent, function() {
                    
                      try {
                        $('<?php echo $options['selector']; ?>').pointer('close');
                      }
                      catch( e ) {}
                      
                    
                  });
          <?php
        }
        foreach ($this->pointer_script as $id => $script) {
          echo $script;
        }
        ?>
        })(jQuery);  
      });
    }
    </script>
      <?php
    }

    private function get_conteiner_id($pointer_id) {
      return $this->prefix . '_' . $pointer_id;
    }
    
    public function set_pointer_text(){
      $this->pointer_text = array(
        'plugins' => __('Press Start Tour to learn how to create your first Photo Gallery.', 'bwg_back'),
        'edit_options' => __('Set the settings for gallery/album.', 'bwg_back'),
        'galleries' => __('Press Add New button to create your gallery.', 'bwg_back'),
       /* 'gallery_name' => __('Name your gallery and press Next.', 'bwg_back'),*/
        'Add_image' => __('Press add image button to open Image Upload to add images to gallery.', 'bwg_back'),
        'upload_image' => __('Press to upload images. If you plan to create gallery based on images stored in standard WordPress Media Library, you must enable "Import from Media Library" option from "Global options".', 'bwg_back'),
        'choose_file' => __('Browse photos or drag and drop to upload.', 'bwg_back'),
        'select_all_img' => __('Hit on images you want to add to existing gallery or press Select All button for adding all images.', 'bwg_back'),
        'add_selected_images' => __('To finalize the process of adding images press Add Selected image to gallery. Images will be added to your gallery and pop-up will be closed.', 'bwg_back'),
        'save_gallery' => __('Press Save button. If you want to additionally create an album navigate to Photo Gallery/Albums or navigate to Pages section to insert created gallery into a page.', 'bwg_back'),
        'add_albums' => __('Press Add New button to create your album.', 'bwg_back'),
        /*'albums_name' => __('Name your album and press Next', 'bwg_back'),*/
        'add_albums_gallery' => __('Press Add Albums/Galleries button to choose the galleries and albums which will be included into newly created album.', 'bwg_back'),
        'check_all_album' => __('Select albums/galleries which you want to add to the album.', 'bwg_back'),
        'add_album' => __('Press Add button to add selected items to your album.', 'bwg_back'),
        'save_album' => __('Press Save button. Navigate to Pages section to insert created album into a page.', 'bwg_back'),
        'show_page_gallery_album' => __('Add New Photo Gallery page.', 'bwg_back'),
        'add-page' => __('Press Add New button to create a new page with gallery/album.', 'bwg_back'),
        'add-shortcode-gallery' => __('Click on Photo Gallery shortcode generator icon.', 'bwg_back'),
        'shortcode_gallery_bwg' => __('Select the view option you want to use for your gallery/album based on provided display options', 'bwg_back'),
        'theme_shortcode' => __('Select the gallery/album and define view-related options.', 'bwg_back'),
        'laytbox_shortcode' => __('Define lightbox settings (except slideshow and carousel views with their own sets of features).', 'bwg_back'),
        'advertisement_shortcode' => __('Enable Advertisement previously created in Options section.', 'bwg_back'),
        'insert_shortcode' => __('To finalize the shortcode generation and to insert it to a page press Insert button.', 'bwg_back'),
        'add-shortcode' => __('Publish the page.', 'bwg_back')
      );
    }

    public function set_pointers() {
      if(strpos($this->page_url,'bwg_nonce') > 0) {
        $Page_url = $this->page_url;
      }
      else {
        $Page_url = 'admin.php?page=galleries_bwg&show_pointer=true';
      }
      
      $this->pointers = array(
        'plugins' => array(
          'page' => 'plugins.php',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Start', 'bwg_back'),
              'url' => 'admin.php?page=options_bwg'
            )
          ),
          'title' => __('Click to Start Tour', 'bwg_back'),
          'selector' => '#toplevel_page_galleries_bwg',
          'edge' => 'left',
          'scroll'=> '#toplevel_page_galleries_bwg',
          'align' => 'center'
        ),
        'edit_options' => array(
          'page' => 'admin.php?page=options_bwg',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'admin.php?page=galleries_bwg',
            )
          ),
          'title' => __('Photo Gallery options', 'bwg_back'),
          'selector' => '#ed_options',
          'edge' => 'left',
          'align' => 'left',
          'tooltip_class' => 'option_class'
        ),
        'galleries' => array(
          'page' => 'admin.php?page=galleries_bwg',
            'buttons' => array(),
          'title' => __('Add a Gallery', 'bwg_back'),
          'selector' => '#galleries_id',
          'edge' => 'left',
          'align' => 'left',
          'tooltip_class' => 'bwg_photo_galleries'
        ),
        /*'gallery_name' => array(
          'page' => 'admin.php?page=galleries_bwg',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
                'pointer_id' => 'Add_image',
                'scroll' => '#add_image_bwg'
            )
          ),
          'title' => __('Provide Title', 'bwg_back'),
          'selector' => '#name',
          'edge' => 'left',
          'align' => 'left',
        ),*/
        'Add_image' => array(
          'page' => 'admin.php?page=galleries_bwg',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'admin.php?page=galleries_bwg'
            )
          ),
          'title' => __('Add images', 'bwg_back'),
          'selector' => '#add_image_bwg',
          'edge' => 'top',
          'align' => 'left',
          'tooltip_class' => 'bwg_add_img',
          //'scroll' => '#add_image_bwg',                
          'close_on_click' => true
        ),
        'upload_image' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'choose_file'
            )
          ),
          'title' => __('Upload Images', 'bwg_back'),
          'selector' => '#upload_images',
          'edge' => 'top',
          'align' => 'left',
          'tooltip_class' => 'bwg_upload_img',
          'target_delayed' => true,
          'show_on_event' => 'onUpload',
          'close_on_click' => true,
        ),
        'choose_file' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'select_all_img'
            )
          ),
          'title' => __('Choose file', 'bwg_back'),
          'selector' => '#jQueryUploader',
          'edge' => 'top',
          'align' => 'left',
          'close_on_click' => true,
          'target_delayed' => true
        ),
        'select_all_img' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'add_selected_images'
            )
          ),
          'title' => __('Select Images', 'bwg_back'),
          'content' => 'description',
          'selector' => '#select_all_images',
          'edge' => 'left',
          'align' => 'center',
          'tooltip_class' => 'bwg_select_img',
          'show_on_event' => 'onSelectAllImage',
          'hide_on_event' => 'onUploadFilesPressed',
        ),
        'add_selected_images' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'admin.php?page=galleries_bwg',
              'scroll' => '#save_gall',
            )
          ),
          'title' => __('Add Selected images to gallery', 'bwg_back'),
          'selector' => '#add_selectid_img',
          'edge' => 'bottom',
          'align' => 'left',
          'tooltip_class' => 'bwg_selected_img',
          'display' =>false,
        ),
        'save_gallery' => array(
          'page' => 'admin.php?page=galleries_bwg',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'admin.php?page=albums_bwg'
            )
          ),
          'title' => __('Save gallery', 'bwg_back'),
          'content' => 'description',
          'selector' => '#save_gall',
          'edge' => 'right',
          'align' => 'center',
          'tooltip_class' => 'bwg_gallery_save',
          'scroll' => '#save_gall',
          'show_on_event' => 'bwgImagesAdded',
        ), 
        'add_albums' => array(
          'page' => 'admin.php?page=albums_bwg',
          'buttons' => array(),
          'title' => __('Add album/gallery', 'bwg_back'),
          'selector' => '.add-new-h2',
          'edge' => 'left',
          'align' => 'left',
          'tooltip_class' => 'bwg_gallery_album',
        ),
        /*'albums_name' => array(
          'page' => 'admin.php?page=albums_bwg',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'add_albums_gallery',
              'scroll' => '#content-add_media',
            )
          ),
          'title' => __('Provide Title', 'bwg_back'),
          'selector' => '#name',
          'edge' => 'left',
          'align' => 'left',
        ),*/
        'add_albums_gallery' => array(
          'page' => 'admin.php?page=albums_bwg',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'admin.php?page=albums_bwg',
            )
          ),
          'title' => __('Add Albums/Galleries', 'bwg_back'),
          'content' => 'description',
          'selector' => '#content-add_media',
          'edge' => 'left',
          'align' => 'left',
          'tooltip_class' => 'bwg_add_gallery_album',
          'close_on_click' => true,
          //'display' =>false 
        ),
        'check_all_album' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'add_album'
            )
          ),
          'title' => __('Select album/gallery', 'bwg_back'),
          'content' => 'description',
          'selector' => '#check_all',
          'edge' => 'left',
          'align' => 'left',
          'tooltip_class' => 'select_all_album'
        ),
        'add_album' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'upload_image.php'
            )
          ),
          'title' => __('Choosing Galleries/Albums', 'bwg_back'),
          'content' => 'description',
          'selector' => '#add_albums',
          'edge' => 'top',
          'tooltip_class' => 'bwg_add_album_bwg',
          'align' => 'right',
          'display' => false
        ),
        'save_album' => array(
          'page' => 'admin.php?page=albums_bwg',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'edit.php?post_type=page'
            )
          ),
          'title' => __('Save Album', 'bwg_back'),
          'content' => 'description',
          'selector' => '#save_albums',
          'edge' => 'right',
          'align' => 'left',
          'tooltip_class' => 'bwg_album_save',
          'scroll' =>'#save_albums',
          'show_on_event' => 'onAddAlbum',
        ),
        'show_page_gallery_album' => array(
          'page' =>  $Page_url,
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'edit.php?post_type=page'
            )
          ),
          'title' => __('Add New Page', 'bwg_back'),
          'content' => 'description',
          'selector' => '.dashicons-admin-page',
          'edge' => 'left',
          'align' => 'left',
          'scroll' => '.dashicons-admin-page',
          'tooltip_class' => 'show_page',
        ),
        'add-page' => array(
          'page' => 'edit.php?post_type=page',
          'buttons' => array(),
          'title' => __('Add Page', 'bwg_back'),
          'selector' => '.page-title-action',
          'edge' => 'top',
          'align' => 'left',
        ),
        'add-shortcode-gallery' => array(
          'page' => 'post-new.php?post_type=page',
            'buttons' => array(
                'next_pointer' => array(
                    'title' => __('Next', 'bwg_back'),
                    'pointer_id' => 'add-shortcode'
                )
            ),
            'title' => __('Insert Shortcode', 'bwg_back'),
            'selector' => '#mceu_bwg_shorcode',
            'edge' => 'bottom',
            'align' => 'left',
            'close_on_click' =>true,
            'show_on_event' => 'onUploadImg',
            'tooltip_class' =>'add_short_gall'
        ),
        'shortcode_gallery_bwg' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'theme_shortcode'
            )
          ),
          'title' => __('Choose View', 'bwg_back'),
          'selector' => '#display_thumb',
          'edge' => 'top',
          'align' => 'left',
          'show_on_event' => 'onUploadShortcode'                
        ),
        'theme_shortcode' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'laytbox_shortcode'
            )
          ),
          'title' => __('Select gallery', 'bwg_back'),
          'selector' => '#gallery',
          'edge' => 'left',
          'align' => 'center',
          'display'=> false,
          'tooltip_class' => 'theme_short',
          'show_on_event' => 'onUploadShortcode',
        ),
        'laytbox_shortcode' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'insert_shortcode',
              'scroll' =>'#insert'
            )
          ),
          'title' => __('Ligthbox settings', 'bwg_back'),
          'selector' => '#tbody_popup_other',
          'edge' => 'left',
          'align' => 'center',
          'display'=> false
        ),
        /*'advertisement_shortcode' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_pointer' => array(
              'title' => __('Next', 'bwg_back'),
              'pointer_id' => 'insert_shortcode',
              'scroll' =>'#insert'
            )
          ),
          'title' => __('Advertisement settings', 'bwg_back'),
          'selector' => '#advertisement_id',
          'edge' => 'right',
          'align' => 'center',
          'display'=> false
        ),*/
        'insert_shortcode' => array(
          'page' => 'upload_image.php',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'post-new.php?post_type=page'
            )
          ),
          'title' => __('Insert Shortcode', 'bwg_back'),
          'selector' => '#insert',
          'edge' => 'bottom',
          'align' => 'right',
          'tooltip_class' => 'bwg_insert_short',
          'show_on_event' => 'onUploadShortcode',
          'display'=> false
        ),
        'add-shortcode' => array(
          'page' => 'post-new.php?post_type=page',
          'buttons' => array(
            'next_page' => array(
              'title' => __('Next', 'bwg_back'),
              'url' => 'post-new.php?post_type=page'
            )
          ),
          'title' => __('Publish Page', 'bwg_back'),
          'selector' => '#publishing-action',
          'edge' => 'right',
          'align' => 'left',
          'show_on_event' => 'onOpenShortcode'
        ),
      );
    }
}
