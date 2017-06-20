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

if(!function_exists('rbs_gallery_stats_init')){
	function rbs_gallery_stats_init(){
		rbs_gallery_include('stats.class.php',  plugin_dir_path( __FILE__ ) );
		//echo plugin_dir_path( __FILE__ );
		new ROBO_GALLERY_STATS( ROBO_GALLERY_TYPE_POST );
	}
	add_action( 'init', 'rbs_gallery_stats_init' );
}

if(!function_exists('robo_gallery_stats_submenu_page')){
	add_action('admin_menu', 'robo_gallery_stats_submenu_page');
	function robo_gallery_stats_submenu_page() {
		add_submenu_page( 'edit.php?post_type=robo_gallery_table', 'Statistics', 'Statistics', 'manage_options', 'robo-gallery-stats', 'robo_gallery_stats_submenu_page_render' );
	}
	function robo_gallery_stats_submenu_page_render(){
		rbs_gallery_include('stats.form.php', plugin_dir_path( __FILE__ ));
	}
}