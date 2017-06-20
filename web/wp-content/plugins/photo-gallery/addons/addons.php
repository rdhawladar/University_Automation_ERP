<?php
function bwg_addons_display() {
  $addons = array(
    'photo-gallery-ecomerce'   => array(
      'name'        => __('Photo Gallery Ecommerce', 'bwg'),
      'url'         => 'https://web-dorado.com/products/wordpress-photo-gallery-plugin/add-ons/gallery-ecommerce.html',
      'description' => __('Using Photo Gallery Ecommerce you can sell images included in galleries either as digital downloads or products/prints via Paypal or Stripe.', 'bwg'),
      'icon'        => '',
      'image'       => WD_BWG_URL . '/addons/images/ecommerce.png',
    ),
    'photo-gallery-facebook'   => array(
      'name'        => __('Photo Gallery Facebook', 'bwg'),
      'url'         => 'https://web-dorado.com/products/wordpress-photo-gallery-plugin/add-ons/facebook.html',
      'description' => __('Photo Gallery Facebook is an add-on, which helps to display Facebook photos and videos within Photo Gallery plugin. You can create Facebook-only galleries, embed individual images and videos or include Facebook albums within mixed type albums.', 'bwg'),
      'icon'        => '',
      'image'       => WD_BWG_URL . '/addons/images/facebook.png',
    ),
    'ngitopg'   => array(
      'name'        => __('NextGen Gallery Import to Photo Gallery', 'bwg'),
      'url'         => 'https://wordpress.org/plugins/import-to-photo-gallery-from-nextgen-gallery/',
      'description' => __('This addon integrates NextGen with Photo Gallery allowing to import images and related data from NextGen to use with Photo Gallery', 'bwg'),
      'icon'        => '',
      'image'       => WD_BWG_URL . '/addons/images/nextgen_gallery.png',
    ),
    'photo-gallery-export'   => array(
      'name'        => __('Photo Gallery Export / Import', 'bwg'),
      'url'         => 'https://web-dorado.com/products/wordpress-photo-gallery-plugin/add-ons/export-import.html',
      'description' => __('Photo Gallery Export/Import helps to move created galleries and albums from one site to another. This way you can save the gallery/album options and manual modifications.', 'bwg'),
      'icon'        => '',
      'image'       => WD_BWG_URL . '/addons/images/import_export.png',
    ),
  );
  ?>
  <div class="wrap">
    <div id="settings">
      <div id="settings-content" >
        <h2 id="add_on_title"><?php _e('Photo Gallery Add-ons', 'bwg'); ?></h2>
        <div>
          <p>
            <span style="color: #ba281e; font-size: 20px;"><?php _e('Attention', 'bwg'); ?>:</span>
            <?php _e('Add-ons are supported by premium version of Photo Gallery', 'bwg'); ?>
          </p>
        </div>
        <?php
        if ($addons) {
          foreach ($addons as $name => $addon) {
            ?>
            <div class="add-on">
              <h2><?php echo $addon['name']; ?></h2>
              <figure class="figure">
                <div  class="figure-img">
                  <a href="<?php echo $addon['url']; ?>" target="_blank">
                    <?php
                    if ($addon['image']) {
                      ?>
                      <img src="<?php echo $addon['image']; ?>" />
                      <?php
                    }
                    ?>
                  </a>
                </div>
                <figcaption class="addon-descr figcaption">
                  <?php
                  if ($addon['icon']) {
                    ?>
                    <img src="<?php echo $addon['icon']; ?>" />
                    <?php
                  }
                  ?>
                  <?php echo $addon['description']; ?>
                </figcaption>
              </figure>
              <?php
              if ($addon['url'] !== '#') {
                ?>
              <a href="<?php echo $addon['url']; ?>" target="_blank" class="addon"><span><?php _e('GET THIS ADD ON', 'bwg'); ?></span></a>
                <?php
              }
              else {
                ?>
              <div class="ecwd_coming_soon">
                <img src="<?php echo WD_BWG_URL . '/addons/images/coming_soon.png'; ?>" />
              </div>
                <?php
              }
              ?>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
  <?php
}