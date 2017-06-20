<?php 
/*
*      Robo Gallery     
*      Version: 1.0
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

if(isset($_GET['showproinfo']) && $_GET['showproinfo']){
	if(!function_exists('rbs_gallery_showInformation')){
		function rbs_gallery_showInformation(){
			wp_enqueue_style("wp-jquery-ui-dialog");
			wp_enqueue_script('jquery-ui-dialog');

			wp_enqueue_script('robo-gallery-info', ROBO_GALLERY_URL.'js/admin/info.js', array( 'jquery' ), ROBO_GALLERY_VERSION, true ); 
			wp_enqueue_style ('robo-gallery-info', ROBO_GALLERY_URL.'css/admin/info.css', array( ), '' );
			
			echo '<div id="rbs_showInformation" '
						.'style="display: none;" '
						.'data-open="1" '
						.'data-title="'.__('Get Robo Gallery Pro version', 'rbs_gallery').'" '
						.'data-close="'.__('Close', 'rbs_gallery').'" '
						.'data-info="'.__('Get Pro version', 'rbs_gallery').'"'
					.'>'
					.__('You can create only 3 galleries. Update to PRO to get unlimited galleries', 'rbs_gallery')
				.'</div>';
		}
		if(!ROBO_GALLERY_PRO) add_action( 'in_admin_header', 'rbs_gallery_showInformation' );
	}
}

if(!function_exists('rbs_custom_columns')){
	function rbs_custom_columns( $column, $post_id ) {
	    switch ( $column ) {
		case 'rbs_gallery' :
			global $post;
			//$slug = '' ; $slug = $post->post_name;
	        $shortcode = '<span>[robo-gallery id="'.$post->ID.'"]</span>';
		    echo $shortcode; 
		    break;

		case 'rbs_gallery_views' :
			global $post;
			$views = '';
	        $views = (int) get_post_meta( $post->ID, 'gallery_views_count', true);
	        //if(!$views) $views = '-';
		    echo $views; 
		    break;
	    }
	}
	add_action( 'manage_'.ROBO_GALLERY_TYPE_POST.'_posts_custom_column' , 'rbs_custom_columns', 10, 2 );
}

if(!function_exists('add_rbs_table_columns')){	
	function add_rbs_table_columns($columns) { 
		return array_merge(
				$columns, 
				array( 
					'rbs_gallery_views' => __('Views'), 
					'rbs_gallery' => __('Shortcode') 
				)
		); 
	}
	add_filter('manage_'.ROBO_GALLERY_TYPE_POST.'_posts_columns' , 'add_rbs_table_columns');
}



if(!function_exists('rbs_gallery_robogalleryList')){
	function rbs_gallery_robogalleryList (){
		wp_enqueue_style ('robo-gallery-list', ROBO_GALLERY_URL.'css/admin/list.css', array( ), ROBO_GALLERY_VERSION );
	}
	add_action( 'in_admin_header', 'rbs_gallery_robogalleryList' );
}