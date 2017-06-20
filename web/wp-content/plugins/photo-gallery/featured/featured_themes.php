<?php
function spider_featured_themes($current_plugin = '') {
 $themes = array(
    "portfolio_gallery" => array(
      'title'    => 'Portfolio Gallery Theme',
      'content'  => 'Portfolio Gallery helps to display images using various color schemes and layouts combined with elegant fonts and content parts.',
      'href'     => 'https://web-dorado.com/wordpress-themes/portfolio-gallery.html'
    ),
     "business_elite" => array(
      'title'    => 'Business Elite Theme',
      'content'  => 'Business Elite is a robust parallax theme for business websites. The theme uses smooth transitions and many functional sections.',
      'href'     => 'https://web-dorado.com/wordpress-themes/business-elite.html'
    ),
    "sauron" => array(
      'title'    => 'Sauron Theme',
      'content'  => 'Sauron is a multipurpose parallax theme, which uses multiple interactive sections designed for the client-engagement.',
      'href'     => 'https://web-dorado.com/wordpress-themes/sauron.html'
    ),
    "mottomag" => array(
      'title'    => 'MottoMag Theme',
      'content'  => 'MottoMag is a vibrant, responsive theme which is a perfect choice for the combination of textual content with videos and images.',
      'href'     => 'https://web-dorado.com/wordpress-themes/mottomag.html'
    ),
     "business_world" => array(
      'title'    => 'Business World Theme',
      'content'  => 'Business World is an innovative WordPress theme great for Business websites.',
      'href'     => 'https://web-dorado.com/wordpress-themes/business-world.html'
    ),
    "best_magazine" => array(
      'title'    => 'Best Magazine Theme',
      'content'  => 'Best Magazine is an ultimate selection when you are dealing with multi-category news websites.',
      'href'     => 'https://web-dorado.com/wordpress-themes/best-magazine.html'
    ),
    "wedding_style" => array(
      'title'    => 'Wedding Style Theme',
      'content'  => 'Wedding style is a responsive theme designed for the organization and maintenance of wedding websites and blogs.',
      'href'     => 'https://web-dorado.com/wordpress-themes/wedding-style.html'
    ),
    "magazine" => array(
      'title'    => 'Magazine Theme',
      'content'  => 'Magazine theme is a perfect solution when creating news and informational websites. It comes with a wide range of layout options.',
      'href'     => 'https://web-dorado.com/wordpress-themes/news-magazine.html'
    ),
    "weddings" => array(
      'title'    => 'Weddings Theme',
      'content'  => 'Weddings is an elegant, responsive WordPress theme designed for wedding websites. The theme includes multiple pages, homepage slider and gallery support.',
      'href'     => 'https://web-dorado.com/wordpress-themes/wedding.html'
    ),
    "exclusive" => array(
      'title'    => 'Exclusive Theme',
      'content'  => 'Exclusive is a unique theme designed to best fit business style websites. It comes with a large list of customizable features.',
      'href'     => 'https://web-dorado.com/wordpress-themes/exclusive.html'
    ),
    "expert" => array(
      'title'    => 'Expert Theme',
      'content'  => 'WordPress Expert is a modern, user-friendly and stylish theme. It has a list of customizable layout, style, colors and fonts.',
      'href'     => 'https://web-dorado.com/wordpress-themes/business-responsive.html'
    ),
  );
  ?>
  <div id="main_featured_themes_page">
    <h3>Featured Themes</h3>
    <div class="featured_header">
      <a href="https://web-dorado.com/wordpress-themes.html?source=<?php echo $current_plugin; ?>" target="_blank">
        <h1>WORDPRESS THEMES</h1>
        <h1 class="get_plugins">FOR $40 ONLY <span>- SAVE 80%</span></h1>
        <div class="try-now">
					<span>TRY NOW</span>
				</div>
      </a>
    </div>
    <ul id="featured-plugins-list">
      <?php
      foreach ($themes as $key => $themes) {
        ?>
      <li class="<?php echo $key; ?>">
				<div class="product"></div>
				<div class="title">
					<strong class="heading"><?php echo $themes['title']; ?></strong>
				</div>
				<div class="description">
					<p><?php echo $themes['content']; ?></p>
				</div>
				<a target="_blank" href="<?php echo $themes['href']; ?>?source=<?php echo $current_plugin; ?>" class="download">Download theme  &#9658;</a>
			</li>
        <?php
      }
      ?>
    </ul>
  </div>
  <?php
}