<?php

class BWGViewUninstall_bwg {
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
    global $wpdb;
    $prefix = $wpdb->prefix;
    ?>
    <form class="bwg_form" method="post" action="admin.php?page=uninstall_bwg" style="width:99%;">
      <?php wp_nonce_field( 'uninstall_bwg', 'bwg_nonce' ); ?>
      <div class="wrap">
        <span class="uninstall_icon"></span>
        <h2><?php _e("Uninstall Photo Gallery", 'bwg_back'); ?></h2>
        <div class="goodbye-text">
          <?php
          $support_team = '<a href="https://web-dorado.com/support/contact-us.html?source=photo-gallery" target="_blank">' . __('support team', 'bwg_back') . '</a>';
          $contact_us = '<a href="https://web-dorado.com/support/contact-us.html?source=photo-gallery" target="_blank">' . __('Contact us', 'bwg_back') . '</a>';
          echo sprintf(__("Before uninstalling the plugin, please Contact our %s. We'll do our best to help you out with your issue. We value each and every user and value what's right for our users in everything we do.<br />
          However, if anyway you have made a decision to uninstall the plugin, please take a minute to %s and tell what you didn't like for our plugins further improvement and development. Thank you !!!", "bwg_back"), $support_team, $contact_us); ?>
        </div>
        <p>
          <?php _e("Deactivating Photo Gallery plugin does not remove any data that may have been created. To completely remove this plugin, you can uninstall it here.", 'bwg_back'); ?>
        </p>
        <p style="color: red;">
          <strong><?php _e("WARNING:", 'bwg_back'); ?></strong>
          <?php _e("Once uninstalled, this can't be undone. You should use a Database Backup plugin of WordPress to back up all the data first.", 'bwg_back'); ?>
        </p>
        <p style="color: red">
          <strong><?php _e("The following Database Tables will be deleted:", 'bwg_back'); ?></strong>
        </p>
        <table class="widefat">
          <thead>
            <tr>
              <th><?php _e("Database Tables", 'bwg_back'); ?></th>
            </tr>
          </thead>
          <tr>
            <td valign="top">
              <ol>
                  <li><?php echo $prefix; ?>bwg_album</li>
                  <li><?php echo $prefix; ?>bwg_album_gallery</li>
                  <li><?php echo $prefix; ?>bwg_gallery</li>
                  <li><?php echo $prefix; ?>bwg_image</li>
                  <li><?php echo $prefix; ?>bwg_image_comment</li>
                  <li><?php echo $prefix; ?>bwg_image_rate</li>
                  <li><?php echo $prefix; ?>bwg_image_tag</li>
                  <li><?php echo $prefix; ?>bwg_option</li>
                  <li><?php echo $prefix; ?>bwg_theme</li>
                  <li><?php echo $prefix; ?>bwg_shortcode</li>
              </ol>
            </td>
          </tr>
          <tfoot>
            <tr>
              <th>
                <input type="checkbox" name="bwg_delete_files" id="bwg_delete_files" style="vertical-align: middle;" />
                <label for="bwg_delete_files">&nbsp;<?php _e("Delete the folder containing uploaded images.", 'bwg_back'); ?></label>
              </th>
            </tr>
          </tfoot>
        </table>
        <p style="text-align: center;">
          <?php _e("Do you really want to uninstall Photo Gallery?", 'bwg_back'); ?>
        </p>
        <p style="text-align: center;">
          <input type="checkbox" name="Photo Gallery" id="check_yes" value="yes" />&nbsp;<label for="check_yes"><?php _e("Yes", 'bwg_back'); ?></label>
        </p>
        <p style="text-align: center;">
          <input type="submit" value="UNINSTALL" class="button-primary" onclick="if (check_yes.checked) { 
                                                                                    if (confirm('<?php echo addslashes(__("You are About to Uninstall Photo Gallery from WordPress. This Action Is Not Reversible.", 'bwg_back')); ?>')) {
                                                                                        spider_set_input_value('task', 'uninstall');
                                                                                    } else {
                                                                                        return false;
                                                                                    }
                                                                                  }
                                                                                  else {
                                                                                    return false;
                                                                                  }" />
        </p>
      </div>
      <input id="task" name="task" type="hidden" value="" />
    </form>
  <?php
  }

  public function uninstall() {
    $flag = TRUE;
    if (isset($_POST['bwg_delete_files'])) {
      function delfiles($del_file) {
        if (is_dir($del_file)) {
          $del_folder = scandir($del_file);
          foreach ($del_folder as $file) {
            if ($file != '.' and $file != '..') {
              delfiles($del_file . '/' . $file);
            }
          }
          if (!rmdir($del_file)) {
            $flag = FALSE;
          }
        }
        else {
          if (!unlink($del_file)) {
            $flag = FALSE;
          }
        }
      }
      global $WD_BWG_UPLOAD_DIR;
      if ($WD_BWG_UPLOAD_DIR) {
        if (is_dir(ABSPATH . $WD_BWG_UPLOAD_DIR)) {
          delfiles(ABSPATH . $WD_BWG_UPLOAD_DIR);
        }
      }
    }
    global $wpdb;
    $this->model->delete_db_tables();
    $prefix = $wpdb->prefix;
    $deactivate_url = wp_nonce_url('plugins.php?action=deactivate&amp;plugin=' . WD_BWG_NAME . '/photo-gallery.php', 'deactivate-plugin_' . WD_BWG_NAME . '/photo-gallery.php');
    ?>
    <div id="message" class="updated fade">
      <p><?php _e("The following Database Tables successfully deleted:", 'bwg_back'); ?></p>
      <p><?php echo $prefix; ?>bwg_album,</p>
      <p><?php echo $prefix; ?>bwg_album_gallery,</p>
      <p><?php echo $prefix; ?>bwg_gallery,</p>
      <p><?php echo $prefix; ?>bwg_image,</p>
      <p><?php echo $prefix; ?>bwg_image_comment,</p>
      <p><?php echo $prefix; ?>bwg_image_rate,</p>
      <p><?php echo $prefix; ?>bwg_image_tag,</p>
      <p><?php echo $prefix; ?>bwg_option,</p>
      <p><?php echo $prefix; ?>bwg_theme,</p>
      <p><?php echo $prefix; ?>bwg_shortcode.</p>
    </div>
    <?php
    if (isset($_POST['bwg_delete_files'])) {
    ?>
    <div class="<?php echo ($flag) ? 'updated' : 'error'?>">
      <p><?php echo ($flag) ? __("The folder was successfully deleted.", 'bwg_back') : __("An error occurred when deleting the folder.", 'bwg_back')?></p>
    </div>
    <?php
    }
    ?>
    <div class="wrap">
      <h2><?php _e("Uninstall Photo Gallery", 'bwg_back'); ?></h2>
      <p><strong><a href="<?php echo $deactivate_url; ?>"><?php _e("Click Here", 'bwg_back'); ?></a> <?php _e("To Finish the Uninstallation and Photo Gallery will be Deactivated Automatically.", 'bwg_back'); ?></strong></p>
      <input id="task" name="task" type="hidden" value="" />
    </div>
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