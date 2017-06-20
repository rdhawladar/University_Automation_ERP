<?php
/**
 * The Secondary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Hub
 */

?>
<div id="sidebar-secondary" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) :  ?>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
	<?php endif ?>
</div><!-- #sidebar-secondary -->
