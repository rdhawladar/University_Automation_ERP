<?php
/**
 * Author: Rob
 * Date: 6/24/13
 * Time: 10:57 AM
 */


class FilemanagerController {
    ////////////////////////////////////////////////////////////////////////////////////////
    // Events                                                                             //
    ////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////
    // Constants                                                                          //
    ////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////
    // Variables                                                                          //
    ////////////////////////////////////////////////////////////////////////////////////////
    public $uploads_dir;
    public $uploads_url;

    ////////////////////////////////////////////////////////////////////////////////////////
    // Constructor & Destructor                                                           //
    ////////////////////////////////////////////////////////////////////////////////////////
    
    public function __construct() {
      $upload_dir = wp_upload_dir();
      $bwg_options = $this->get_options_data();
      $this->uploads_dir = (($bwg_options->images_directory . '/photo-gallery') ? ABSPATH . $bwg_options->images_directory . '/photo-gallery' : WD_BWG_DIR . '/filemanager/uploads');
      if (file_exists($this->uploads_dir) == FALSE) {
        mkdir($this->uploads_dir);
      }
      $this->uploads_url = (($bwg_options->images_directory . '/photo-gallery') ? site_url() . '/' . $bwg_options->images_directory . '/photo-gallery' : WD_BWG_URL . '/filemanager/uploads');
    }

    ////////////////////////////////////////////////////////////////////////////////////////
    // Public Methods                                                                     //
    ////////////////////////////////////////////////////////////////////////////////////////

    public function get_options_data() {
      global $wpdb;
      $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1));
      return $row;
    }

    public function execute() {
      $task = isset($_REQUEST['task']) ? stripslashes(esc_html($_REQUEST['task'])) : 'display';
      if (method_exists($this, $task)) {
        $this->$task();
      }
      else {
        $this->display();
      }
    }

    public function get_uploads_dir() {
      return $this->uploads_dir;
    }

    public function get_uploads_url() {
      return $this->uploads_url;
    }

    public function display() {
      require_once WD_BWG_DIR . '/filemanager/model.php';
      $model = new FilemanagerModel($this);

      require_once WD_BWG_DIR . '/filemanager/view.php';
      $view = new FilemanagerView($this, $model);
      $view->display();
    }

    public function make_dir() {
      $input_dir = (isset($_REQUEST['dir']) ? stripslashes(esc_html($_REQUEST['dir'])) : '');
      $cur_dir_path = $input_dir == '' ? $this->uploads_dir : $this->uploads_dir . '/' . $input_dir;

      $new_dir_path = $cur_dir_path . '/' . (isset($_REQUEST['new_dir_name']) ? stripslashes(esc_html($_REQUEST['new_dir_name'])) : '');

      $msg = '';
      if (file_exists($new_dir_path) == true) {
        $msg = "Directory already exists.";
      }
      else {
        mkdir($new_dir_path);
      }
      $query_url = wp_nonce_url( admin_url('admin-ajax.php'), 'addImages', 'bwg_nonce' );
      $query_url  = add_query_arg(array('action' => 'addImages', 'filemanager_msg' => $msg, 'width' => '650', 'height' => '500', 'task' => 'display', 'extensions' => esc_html($_REQUEST['extensions']), 'callback' => esc_html($_REQUEST['callback']), 'dir' => esc_html($_REQUEST['dir']), 'TB_iframe' => '1'), $query_url);
      header('Location: ' . $query_url);
      exit;
    }

    public function rename_item() {
      $input_dir = (isset($_REQUEST['dir']) ? stripslashes(esc_html($_REQUEST['dir'])) : '');
      $cur_dir_path = $input_dir == '' ? $this->uploads_dir : $this->uploads_dir . '/' . $input_dir;
      $cur_dir_path = htmlspecialchars_decode($cur_dir_path, ENT_COMPAT | ENT_QUOTES);

      $file_names = explode('**#**', (isset($_REQUEST['file_names']) ? stripslashes(esc_html($_REQUEST['file_names'])) : ''));
      $file_name = $file_names[0];
      $file_name = htmlspecialchars_decode($file_name, ENT_COMPAT | ENT_QUOTES);

      $file_new_name = (isset($_REQUEST['file_new_name']) ? stripslashes(esc_html($_REQUEST['file_new_name'])) : '');

      $file_path = $cur_dir_path . '/' . $file_name;
      $thumb_file_path = $cur_dir_path . '/thumb/' . $file_name;
      $original_file_path = $cur_dir_path . '/.original/' . $file_name;

      $msg = '';
      if (file_exists($file_path) == false) {
        $msg = "File doesn't exist.";
      }
      elseif (is_dir($file_path) == true) {
        if (rename($file_path, $cur_dir_path . '/' . $file_new_name) == false) {
            $msg = "Can't rename the file.";
        }
      }
      elseif ((strrpos($file_name, '.') !== false)) {
        $file_extension = substr($file_name, strrpos($file_name, '.') + 1);
        if (rename($file_path, $cur_dir_path . '/' . $file_new_name . '.' . $file_extension) == false) {
            $msg = "Can't rename the file.";
        }
        rename($thumb_file_path, $cur_dir_path . '/thumb/' . $file_new_name . '.' . $file_extension);
        rename($original_file_path, $cur_dir_path . '/.original/' . $file_new_name . '.' . $file_extension);
      }
      else {
        $msg = "Can't rename the file.";
      }
      $_REQUEST['file_names'] = '';
      $query_url = wp_nonce_url( admin_url('admin-ajax.php'), 'addImages', 'bwg_nonce' );
      $query_url = add_query_arg(array('action' => 'addImages', 'filemanager_msg' => $msg, 'width' => '650', 'height' => '500', 'task' => 'display', 'extensions' => esc_html($_REQUEST['extensions']), 'callback' => esc_html($_REQUEST['callback']), 'dir' => esc_html($_REQUEST['dir']), 'TB_iframe' => '1'), $query_url);
      header('Location: ' . $query_url);
      exit;
    }

    public function remove_items() {
      $input_dir = (isset($_REQUEST['dir']) ? stripslashes(esc_html($_REQUEST['dir'])) : '');
      $cur_dir_path = $input_dir == '' ? $this->uploads_dir : $this->uploads_dir . '/' . $input_dir;
      $cur_dir_path = htmlspecialchars_decode($cur_dir_path, ENT_COMPAT | ENT_QUOTES);

      $file_names = explode('**#**', (isset($_REQUEST['file_names']) ? stripslashes(esc_html($_REQUEST['file_names'])) : ''));

      $msg = '';
      foreach ($file_names as $file_name) {
        $file_name = htmlspecialchars_decode($file_name, ENT_COMPAT | ENT_QUOTES);
        $file_path = $cur_dir_path . '/' . $file_name;
        $thumb_file_path = $cur_dir_path . '/thumb/' . $file_name;
        $original_file_path = $cur_dir_path . '/.original/' . $file_name;
        if (file_exists($file_path) == false) {
          $msg = "Some of the files couldn't be removed.";
        }
        else {
          $this->remove_file_dir($file_path);
          if (file_exists($thumb_file_path)) {
            $this->remove_file_dir($thumb_file_path);
          }
          if (file_exists($original_file_path)) {
            $this->remove_file_dir($original_file_path);
          }
        }
      }
      $_REQUEST['file_names'] = '';
      $query_url = wp_nonce_url( admin_url('admin-ajax.php'), 'addImages', 'bwg_nonce' );
      $query_url = add_query_arg(array('action' => 'addImages', 'filemanager_msg' => $msg, 'width' => '650', 'height' => '500', 'task' => 'show_file_manager', 'extensions' => esc_html($_REQUEST['extensions']), 'callback' => esc_html($_REQUEST['callback']), 'dir' => esc_html($_REQUEST['dir']), 'TB_iframe' => '1'), $query_url);      
      header('Location: ' . $query_url);
      exit;
    }

    public function paste_items() {
      $msg = '';

      $file_names = explode('**#**', (isset($_REQUEST['clipboard_files']) ? stripslashes($_REQUEST['clipboard_files']) : ''));
      // $src_dir = $_SESSION['clipboard_src'];
      $src_dir = (isset($_REQUEST['clipboard_src']) ? stripslashes($_REQUEST['clipboard_src']) : '');
      $src_dir = $src_dir == '' ? $this->uploads_dir : $this->uploads_dir . '/' . $src_dir;
      $src_dir = htmlspecialchars_decode($src_dir, ENT_COMPAT | ENT_QUOTES);
      // $dest_dir = $_SESSION['clipboard_dest'];
      $dest_dir = (isset($_REQUEST['clipboard_dest']) ? stripslashes($_REQUEST['clipboard_dest']) : '');
      $dest_dir = $dest_dir == '' ? $this->uploads_dir : $this->uploads_dir . '/' . $dest_dir;
      $dest_dir = htmlspecialchars_decode($dest_dir, ENT_COMPAT | ENT_QUOTES);

      switch ((isset($_REQUEST['clipboard_task']) ? stripslashes($_REQUEST['clipboard_task']) : '')) {
        case 'copy':
          foreach ($file_names as $file_name) {
            $file_name = htmlspecialchars_decode($file_name, ENT_COMPAT | ENT_QUOTES);
            $src = $src_dir . '/' . $file_name;
            if (file_exists($src) == false) {
              $msg = "Failed to copy some of the files.";
              $msg = $file_name;
              continue;
            }
            $dest = $dest_dir . '/' . $file_name;
            if (!is_dir($src_dir . '/' . $file_name)) {
              if (!is_dir($dest_dir . '/thumb')) {
                mkdir($dest_dir . '/thumb', 0777);
              }
              $thumb_src = $src_dir . '/thumb/' . $file_name;
              $thumb_dest = $dest_dir . '/thumb/' . $file_name;
              if (!is_dir($dest_dir . '/.original')) {
                mkdir($dest_dir . '/.original', 0777);
              }
              $original_src = $src_dir . '/.original/' . $file_name;
              $original_dest = $dest_dir . '/.original/' . $file_name;
            }
            $i = 0;
            if (file_exists($dest) == true) {
              $path_parts = pathinfo($dest);
              while (file_exists($path_parts['dirname'] . '/' . $path_parts['filename'] . '(' . ++$i . ')' . '.' . $path_parts['extension'])) {
              }
              $dest = $path_parts['dirname'] . '/' . $path_parts['filename'] . '(' . $i . ')' . '.' . $path_parts['extension'];
              if (!is_dir($src_dir . '/' . $file_name)) {
                $thumb_dest = $path_parts['dirname'] . '/thumb/' . $path_parts['filename'] . '(' . $i . ')' . '.' . $path_parts['extension'];
                $original_dest = $path_parts['dirname'] . '/.original/' . $path_parts['filename'] . '(' . $i . ')' . '.' . $path_parts['extension'];
              }
            }

            if (!$this->copy_file_dir($src, $dest)) {
              $msg = "Failed to copy some of the files.";
            }
            if (!is_dir($src_dir . '/' . $file_name)) {
              $this->copy_file_dir($thumb_src, $thumb_dest);
              $this->copy_file_dir($original_src, $original_dest);
            }
          }
          break;
        case 'cut':
          if ($src_dir != $dest_dir) {
            foreach ($file_names as $file_name) {
              $file_name = htmlspecialchars_decode($file_name, ENT_COMPAT | ENT_QUOTES);
              $src = $src_dir . '/' . $file_name;
              $dest = $dest_dir . '/' . $file_name;
              if (!is_dir($src_dir . '/' . $file_name)) {
                $thumb_src = $src_dir . '/thumb/' . $file_name;
                $thumb_dest = $dest_dir . '/thumb/' . $file_name;
                if (!is_dir($dest_dir . '/thumb')) {
                  mkdir($dest_dir . '/thumb', 0777);
                }
                $original_src = $src_dir . '/.original/' . $file_name;
                $original_dest = $dest_dir . '/.original/' . $file_name;
                if (!is_dir($dest_dir . '/.original')) {
                  mkdir($dest_dir . '/.original', 0777);
                }
              }
              if ((file_exists($src) == false) || (file_exists($dest) == true) || (!rename($src, $dest))) {
                $msg = "Failed to move some of the files.";
              }
              if (!is_dir($src_dir . '/' . $file_name)) {
                rename($thumb_src, $thumb_dest);
                rename($original_src, $original_dest);
              }
            }
          }
          break;
      }
      $query_url = wp_nonce_url( admin_url('admin-ajax.php'), 'addImages', 'bwg_nonce' );
      $query_url = add_query_arg(array('action' => 'addImages', 'filemanager_msg' => $msg, 'width' => '650', 'height' => '500', 'task' => 'show_file_manager', 'extensions' => esc_html($_REQUEST['extensions']), 'callback' => esc_html($_REQUEST['callback']), 'dir' => esc_html($_REQUEST['dir']), 'TB_iframe' => '1'), $query_url);      
      header('Location: ' . $query_url);
      exit;
    }

    public function import_items() {
      $query_url = wp_nonce_url( admin_url('admin-ajax.php'), 'bwg_UploadHandler', 'bwg_nonce' );
      $query_url = add_query_arg(array('action' => 'bwg_UploadHandler', 'importer_thumb_width' => esc_html($_REQUEST['importer_thumb_width']), 'importer_thumb_height' => esc_html($_REQUEST['importer_thumb_height']), 'callback' => esc_html($_REQUEST['callback']), 'file_namesML' => esc_html($_REQUEST['file_namesML']), 'importer_img_width' => esc_html($_REQUEST['importer_img_width']), 'importer_img_height' => esc_html($_REQUEST['importer_img_height']), 'import' => 'true', 'redir' => esc_html($_REQUEST['dir']), 'dir' => esc_html($_REQUEST['dir']) . '/'), $query_url);
      header('Location: ' . $query_url);
      exit;
    }


    ////////////////////////////////////////////////////////////////////////////////////////
    // Getters & Setters                                                                  //
    ////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////
    // Private Methods                                                                    //
    ////////////////////////////////////////////////////////////////////////////////////////
    private function remove_file_dir($del_file_dir) {
      if (is_dir($del_file_dir) == true) {
        $files_to_remove = scandir($del_file_dir);
        foreach ($files_to_remove as $file) {
          if ($file != '.' and $file != '..') {
            $this->remove_file_dir($del_file_dir . '/' . $file);
          }
        }
        rmdir($del_file_dir);
      }
      else {
        unlink($del_file_dir);
      }
    }

    private function copy_file_dir($src, $dest) {
      if (is_dir($src) == true) {
        $dir = opendir($src);
        @mkdir($dest);
        while (false !== ($file = readdir($dir))) {
          if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
              $this->copy_file_dir($src . '/' . $file, $dest . '/' . $file);
            }
            else {
              copy($src . '/' . $file, $dest . '/' . $file);
            }
          }
        }
        closedir($dir);
        return true;
      }
      else {
        return copy($src, $dest);
      }
    }


    ////////////////////////////////////////////////////////////////////////////////////////
    // Listeners                                                                          //
    ////////////////////////////////////////////////////////////////////////////////////////
}