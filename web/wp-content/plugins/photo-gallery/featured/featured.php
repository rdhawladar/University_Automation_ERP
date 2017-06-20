<?php
function spider_featured($current_plugin = '') {
  $plugins = array(
    "form-maker" => array(
      'title'    => 'Form Maker',
      'text'     => 'Wordpress form builder plugin',
      'content'  => 'Form Maker is a modern and advanced tool for creating WordPress forms easily and fast.',
      'href'     => 'https://web-dorado.com/products/wordpress-form.html'
    ),
    "photo-gallery" => array(
      'title'    => 'Photo Gallery',
      'text'     => 'WordPress Photo Gallery plugin',
      'content'  => 'Photo Gallery is a fully responsive WordPress Gallery plugin with advanced functionality.',
      'href'     => 'https://web-dorado.com/products/wordpress-photo-gallery-plugin.html'
    ),
    "contact_form_bulder" => array(
      'title'    => 'Contact Form Builder',
      'text'     => 'WordPress contact form builder plugin',
      'content'  => 'Contact Form Builder is the best tool for quickly arranging a contact form for your clients and visitors.',
      'href'     => 'https://web-dorado.com/products/wordpress-contact-form-builder.html'
    ),
    "slider_wd" => array(
      'title'    => 'Slider WD',
      'text'     => 'WordPress slider plugin',
      'content'  => 'Create responsive, highly configurable sliders with various effects for your WordPress site.',
      'href'     => 'https://web-dorado.com/products/wordpress-slider-plugin.html'
    ),
    "events-wd" => array(
      'title'    => 'Event Calendar WD',
      'text'     => 'WordPress calendar plugin',
      'content'  => 'Organize and publish your events in an easy and elegant way using Event Calendar WD.',
      'href'     => 'https://web-dorado.com/products/wordpress-event-calendar-wd.html'
    ),
    "contact-maker" => array(
      'title'    => 'Contact Form Maker',
      'text'     => 'WordPress contact form maker plugin',
      'content'  => 'WordPress Contact Form Maker is an advanced and easy-to-use tool for creating forms.',
      'href'     => 'https://web-dorado.com/products/wordpress-contact-form-maker-plugin.html'
    ),
    "spider-calendar" => array(
      'title'    => 'Spider Calendar',
      'text'     => 'WordPress event calendar plugin',
      'content'  => 'Spider Event Calendar is a highly configurable product which allows you to have multiple organized events.',
      'href'     => 'https://web-dorado.com/products/wordpress-calendar.html'
    ),
    "catalog" => array(
      'title'    => 'Spider Catalog',
      'text'     => 'WordPress product catalog plugin',
      'content'  => 'Spider Catalog for WordPress is a convenient tool for organizing the products represented on your website into catalogs.',
      'href'     => 'https://web-dorado.com/products/wordpress-catalog.html'
    ),
    "player" => array(
      'title'    => 'Video Player',
      'text'     => 'WordPress Video player plugin',
      'content'  => 'Spider Video Player for WordPress is a Flash & HTML5 video player plugin that allows you to easily add videos to your website with the possibility.',
      'href'     => 'https://web-dorado.com/products/wordpress-player.html'
    ),
    "contacts" => array(
      'title'    => 'Spider Contacts',
      'text'     => 'Wordpress staff list plugin',
      'content'  => 'Spider Contacts helps you to display information about the group of people more intelligible, effective and convenient.',
      'href'     => 'https://web-dorado.com/products/wordpress-contacts-plugin.html'
    ),
    "facebook" => array(
      'title'    => 'Spider Facebook',
      'text'     => 'WordPress Facebook plugin',
      'content'  => 'Spider Facebook is a WordPress integration tool for Facebook.It includes all the available Facebook social plugins and widgets.',
      'href'     => 'https://web-dorado.com/products/wordpress-facebook.html'
    ),
    "twitter-widget" => array(
      'title'    => 'Widget Twitter',
      'text'     => 'WordPress Widget Twitter plugin',
      'content'  => 'The Widget Twitter plugin lets you to fully integrate your WordPress site with your Twitter account.',
      'href'     => 'https://web-dorado.com/products/wordpress-twitter-integration-plugin.html'
    ),
    "faq" => array(
      'title'    => 'Spider FAQ',
      'text'     => 'WordPress FAQ Plugin',
      'content'  => 'The Spider FAQ WordPress plugin is for creating an FAQ (Frequently Asked Questions) section for your website.',
      'href'     => 'https://web-dorado.com/products/wordpress-faq-plugin.html'
    ),
    "zoom" => array(
      'title'    => 'Zoom',
      'text'     => 'WordPress text zoom plugin',
      'content'  => 'Zoom enables site users to resize the predefined areas of the web site.',
      'href'     => 'https://web-dorado.com/products/wordpress-zoom.html'
    ),
    "flash-calendar" => array(
      'title'    => 'Flash Calendar',
      'text'     => 'WordPress flash calendar plugin',
      'content'  => 'Spider Flash Calendar is a highly configurable Flash calendar plugin which allows you to have multiple organized events.',
      'href'     => 'https://web-dorado.com/products/wordpress-events-calendar.html'
    ),
    "folder_menu" => array(
      'title'    => 'Folder Menu',
      'text'     => 'WordPress folder menu plugin',
      'content'  => 'Folder Menu Vertical is a WordPress Flash menu module for your website, designed to meet your needs and preferences.',
      'href'     => 'https://web-dorado.com/products/wordpress-menu-vertical.html'
    ),
    "random_post" => array(
      'title'    => 'Random post',
      'text'     => 'WordPress random post plugin',
      'content'  => 'Spider Random Post is a small but very smart solution for your WordPress web site.',
      'href'     => 'https://web-dorado.com/products/wordpress-random-post.html'
    ),
    "faq_wd" => array(
      'title'    => 'FAQ WD',
      'text'     => 'WordPress FAQ plugin',
      'content'  => 'Organize and publish your FAQs in an easy and elegant way using FAQ WD.',
      'href'     => 'https://web-dorado.com/products/wordpress-faq-wd.html'
    ),
    "instagram_feed" => array(
      'title'    => 'Instagram Feed WD',
      'text'     => 'WordPress Instagram Feed plugin',
      'content'  => 'WD Instagram Feed is a user-friendly tool for displaying user or hashtag-based feeds on your website.',
      'href'     => 'https://web-dorado.com/products/wordpress-instagram-feed-wd.html'
    ),
    "post-slider" => array(
      'title'    => 'Post Slider',
      'text'     => 'WordPress Post Slider plugin',
      'content'  => 'Post Slider WD is designed to show off the selected posts of your website in a slider.',
      'href'     => 'https://web-dorado.com/products/wordpress-post-slider-plugin.html'
    ),
    "google-maps" => array(
      'title'    => 'Google Map',
      'text'     => 'WordPress Google Maps Plugin',
      'content'  => 'Google Maps WD is an intuitive tool for creating Google maps with advanced markers, custom layers and overlays for your website.',
      'href'     => 'https://web-dorado.com/products/wordpress-google-maps-plugin.html'
    ),
  );
  ?>
  <div id="main_featured_plugins_page">
    <h3>Featured Plugins</h3>
    <div class="featured_header">
      <a target="_blank" href="https://web-dorado.com/wordpress-plugins.html?source=<?php echo $current_plugin; ?>">
        <h1>GET <?php echo $plugins[$current_plugin]["title"]; ?> +18 PLUGINS</h1>
        <h1 class="get_plugins">FOR $100 ONLY <span>- SAVE 70%</span></h1>
        <div class="try-now">
          <span>TRY NOW</span>
        </div>
      </a>
	 </div>
    <ul id="featured-plugins-list">
      <?php
      foreach ($plugins as $key => $plugins) {
        if ($current_plugin != $key) {
          ?>
      <li class="<?php echo $key; ?>">
				<div class="product"></div>
				<div class="title">
					<strong class="heading"><?php echo $plugins['title']; ?></strong>
				</div>
				<div class="description">
					<p><?php echo $plugins['content']; ?></p>
				</div>
				<a target="_blank" href="<?php echo $plugins['href']; ?>?source=<?php echo $current_plugin; ?>" class="download">Download Plugin &#9658;</a>
			</li>
          <?php
        }
      }
      ?>
    </ul>
  </div>
  <?php
}