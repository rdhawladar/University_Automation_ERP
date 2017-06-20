<?php
if ( ! defined( 'WPINC' ) )  die;

if(!function_exists('rbs_create_article_button')){
	add_action( 'admin_footer', 'rbs_create_article_button' ); 
	function rbs_create_article_button(){ 
		wp_enqueue_script( 	'rbs_create_post', ROBO_GALLERY_URL.'js/admin/extensions/create_post.js', array('jquery'), ROBO_GALLERY_VERSION, false);
			
		echo ' <div id="rbs_actionWindow" class="hidden" '
			.'data-title="'.__('Post manager','rbs_gallery').'" '
			.'data-close="'.__('Close').'" '
			.'data-button="'.__('Create post','rbs_gallery').'" '
			.'>';
			?>
			<div id="rbs_actionWindowContent">
				<h3> <span class="dashicons dashicons-update"></span> 
				<?php echo __('Loading . . . .','rbs_gallery'); ?></h3>
			</div>
		<?php
		echo '</div>';
	}
}


