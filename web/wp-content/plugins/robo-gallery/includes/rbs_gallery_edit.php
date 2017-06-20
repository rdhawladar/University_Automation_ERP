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

function rbs_gallery_group_metabox() {

	function rbs_gallery_set_checkbox_default_for_new_post( $default ) {
		return rbs_gallery_is_edit_page('edit') ? '' : ( $default ? (string) $default : '' );
	}
	if( rbs_gallery_is_edit_page('edit') ) rbs_gallery_include('rbs_gallery_options_copy.php', ROBO_GALLERY_OPTIONS_PATH);

	rbs_gallery_include('rbs_gallery_options_guides.php', ROBO_GALLERY_OPTIONS_PATH);

	rbs_gallery_include('rbs_gallery_options_images.php', ROBO_GALLERY_OPTIONS_PATH);

    if( rbs_gallery_is_edit_page('edit') ){
    	rbs_gallery_include( array( 
    			'rbs_gallery_options_shortcode.php',
    			'rbs_gallery_options_tools.php',
    		), ROBO_GALLERY_OPTIONS_PATH);
    }
	rbs_gallery_include( array(
		'rbs_gallery_options_text.php',
		'rbs_gallery_options_size.php',
		'rbs_gallery_options_view.php',
		'rbs_gallery_options_hover.php',
		'rbs_gallery_options_button.php',
	 ), ROBO_GALLERY_OPTIONS_PATH);
	
	if( !ROBO_GALLERY_PRO ) rbs_gallery_include('rbs_gallery_options_infowide.php', ROBO_GALLERY_OPTIONS_PATH); 
	
	rbs_gallery_include( array(
		'rbs_gallery_options_loading.php',
		'rbs_gallery_options_polaroid.php',
		'rbs_gallery_options_lightbox.php',
	 ), ROBO_GALLERY_OPTIONS_PATH);

	if( !ROBO_GALLERY_PRO ) rbs_gallery_include('rbs_gallery_options_info.php', ROBO_GALLERY_OPTIONS_PATH); 
     
	if( rbs_gallery_is_edit_page('edit') ) rbs_gallery_include('rbs_create_post.php', ROBO_GALLERY_EXTENSIONS_PATH);

}
add_action( 'cmb2_init', 'rbs_gallery_group_metabox' );


