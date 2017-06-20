<?php

class BWGViewLicensing_bwg {
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
    ?>
    <div id="featurs_tables">
      <div id="featurs_table1">
        <span>WordPress 3.4+ <?php _e("ready", 'bwg_back'); ?></span>
        <span>SEO-<?php _e("friendly", 'bwg_back'); ?></span>
        <span><?php _e("Responsive Design and Layout", 'bwg_back'); ?></span>
        <span><?php _e("5 Standard Gallery/Album Views", 'bwg_back'); ?></span>
        <span><?php _e("Watermarking/ Advertising Possibility", 'bwg_back'); ?></span>
        <span><?php _e("Basic Tag Cloud Widget", 'bwg_back'); ?></span>
        <span><?php _e("Image Download", 'bwg_back'); ?></span>
        <span><?php _e("Photo Gallery Slideshow Widget", 'bwg_back'); ?></span>
        <span><?php _e("Photo Gallery Widget", 'bwg_back'); ?></span>
        <span><?php _e("Slideshow/Lightbox Effects", 'bwg_back'); ?></span>
        <span><?php _e("Possibility of Editing/Creating New Themes", 'bwg_back'); ?></span>
        <span><?php _e("10 Pro Gallery/Album Views", 'bwg_back'); ?></span>
        <span><?php _e("Image Commenting", 'bwg_back'); ?></span>
        <span><?php _e("Image Social Sharing", 'bwg_back'); ?></span>
        <span><?php _e("Photo Gallery Tags Cloud Widget", 'bwg_back'); ?></span>
        <span><?php _e("Instagram Integration", 'bwg_back'); ?></span>
        <span>AddThis <?php _e("Integration", 'bwg_back'); ?></span>
        <span><?php _e("Add-ons Support", 'bwg_back'); ?></span>
      </div>
      <div id="featurs_table2">
        <span style="padding-top: 18px;height: 39px;"><?php _e("Free", 'bwg_back'); ?></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span>1</span>
        <span class="no"></span>
        <span class="no"></span>
        <span class="no"></span>
        <span class="no"></span>
        <span class="no"></span>
        <span class="no"></span>
        <span class="no"></span>
        <span class="no"></span>
      </div>
      <div id="featurs_table3">
        <span><?php _e("Pro Version", 'bwg_back'); ?></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span>15</span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
        <span class="yes"></span>
      </div>
    </div>
    <div style="float: right; text-align: right;">
        <a style="text-decoration: none;" target="_blank" href="https://web-dorado.com/files/fromPhotoGallery.php">
          <img width="215" border="0" alt="web-dorado.com" src="<?php echo WD_BWG_URL . '/images/logo.png'; ?>" />
        </a>
      </div>
    <div style="float: left; clear: both;">
      <p><?php _e("After purchasing the commercial version follow these steps:", 'bwg_back'); ?></p>
      <ol>
        <li><?php _e("Deactivate Photo Gallery plugin.", 'bwg_back'); ?></li>
        <li><?php _e("Delete Photo Gallery plugin.", 'bwg_back'); ?></li>
        <li><?php _e("Install the downloaded commercial version of the plugin.", 'bwg_back'); ?></li>
      </ol>
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