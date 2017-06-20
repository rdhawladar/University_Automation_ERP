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

if(!function_exists('robo_gallery_fix_menu')){
	function robo_gallery_fix_menu(){
		if( 
			isset($_GET['post_type']) && $_GET['post_type']=='robo_gallery_table' &&
			isset($_GET['page']) && $_GET['page']=='robo-gallery-support' 
		) wp_redirect( "http://robosoft.co/go.php?product=gallery&task=support" );

		if( 
			isset($_GET['post_type']) && $_GET['post_type']=='robo_gallery_table' &&
			isset($_GET['page']) && $_GET['page']=='robo-gallery-demo' 
		) wp_redirect( "http://robosoft.co/go.php?product=gallery&task=demo" );

		if( 
			isset($_GET['post_type']) && $_GET['post_type']=='robo_gallery_table' &&
			isset($_GET['page']) && $_GET['page']=='robo-gallery-guides' 
		) wp_redirect( "http://robosoft.co/go.php?product=gallery&task=guides" );
	}
	add_action( 'init', 'robo_gallery_fix_menu' );
}

if(!function_exists('robo_gallery_settings_submenu_page')){
	add_action('admin_menu', 'robo_gallery_settings_submenu_page');
	function robo_gallery_settings_submenu_page() {
		add_submenu_page( 'edit.php?post_type=robo_gallery_table', 'Settings Robo Gallery', 'Settings', 'manage_options', 'robo-gallery-settings', 'robo_gallery_settings_submenu_page_render' );
	}
	function robo_gallery_settings_submenu_page_render(){
		rbs_gallery_include('rbs_gallery_settings.php', ROBO_GALLERY_INCLUDES_PATH);
	}

	add_action( 'admin_init', 'robo_gallery_settings_init' );
	function robo_gallery_settings_init() {
		//register our settings
		register_setting( 'rbs_gallery_settings', ROBO_GALLERY_PREFIX.'jqueryVersion' );
		register_setting( 'rbs_gallery_settings', ROBO_GALLERY_PREFIX.'switchStyle' );
		register_setting( 'rbs_gallery_settings', ROBO_GALLERY_PREFIX.'delay' );
		register_setting( 'rbs_gallery_settings', ROBO_GALLERY_PREFIX.'postShowText' );
		register_setting( 'rbs_gallery_settings', ROBO_GALLERY_PREFIX.'debugEnable' );
		
		register_setting( 'rbs_gallery_settings', ROBO_GALLERY_PREFIX.'categoryShow' );
			
	}

}

if(!function_exists('robo_gallery_about_submenu_page')){
	add_action('admin_menu', 'robo_gallery_about_submenu_page');
	function robo_gallery_about_submenu_page() {
		add_submenu_page( 'edit.php?post_type=robo_gallery_table', 'About Robo Gallery', 'About', 'manage_options', 'robo-gallery-about', 'robo_gallery_about_submenu_page_render' );
	}
	function robo_gallery_about_submenu_page_render(){
		rbs_gallery_include('rbs_gallery_about.php', ROBO_GALLERY_INCLUDES_PATH);
	}
}

if(!function_exists('robo_gallery_support_submenu_page')){
	add_action('admin_menu', 'robo_gallery_support_submenu_page');
	function robo_gallery_support_submenu_page() {
		add_submenu_page( 'edit.php?post_type=robo_gallery_table', 'Robo Gallery Support', 'Support', 'manage_options', 'robo-gallery-support', 'robo_gallery_support_submenu_page_render');
	}
	function robo_gallery_support_submenu_page_render(){
		echo '<script> window.open("http://robosoft.co/go.php?product=gallery&task=support", "_bank"); window.open("edit.php?post_type=robo_gallery_table", "_self"); </script>'; 
	}
}

if(!function_exists('robo_gallery_submenu_empty')){ function robo_gallery_submenu_empty(){} }

if(!function_exists('robo_gallery_demo_submenu_page')){
	add_action('admin_menu', 'robo_gallery_demo_submenu_page');
	function robo_gallery_demo_submenu_page() {
		add_submenu_page( 'edit.php?post_type=robo_gallery_table', 'Robo Gallery Demo', 'Gallery Demo', 'manage_options', 'robo-gallery-demo', 'robo_gallery_submenu_empty' );
	}
}

if(!function_exists('robo_gallery_guides_submenu_page')){
	add_action('admin_menu', 'robo_gallery_guides_submenu_page');
	function robo_gallery_guides_submenu_page() {
		add_submenu_page( 'edit.php?post_type=robo_gallery_table', 'Robo Gallery Video Guides', 'Video Guides', 'manage_options', 'robo-gallery-guides', 'robo_gallery_submenu_empty' );
	}
}

if(!function_exists('rbs_gallery_menuConfig')){
	function rbs_gallery_menuConfig(){
		wp_enqueue_script('robo-gallery-menu', ROBO_GALLERY_URL.'js/admin/menu.js', array( 'jquery' ), ROBO_GALLERY_VERSION, true ); 
	}
	add_action( 'in_admin_header', 'rbs_gallery_menuConfig' );
}

