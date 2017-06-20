<?php
/*
Plugin Name: CMB Field Type: Gallery
Plugin URI: https://github.com/mustardBees/cmb-field-gallery
Description: Gallery field type for Custom Metaboxes and Fields for WordPress. Thanks to <a href="http://www.purewebsolutions.nl/">Roel Obdam</a> for the hard work <a href="http://goo.gl/RYj2w">figuring out the media library</a>.
Version: 2.0.2
Author: Phil Wylie
Author URI: http://www.philwylie.co.uk/
License: GPLv2+
*/

define( 'PW_GALLERY_URL', plugin_dir_url( __FILE__ ) );

function pw_gallery_field( $field, $meta ) {
	wp_enqueue_script( 'pw_gallery_init', PW_GALLERY_URL . 'js/script.js', array( 'jquery' ), null );
	wp_enqueue_style( 'pw_gallery_style', PW_GALLERY_URL . 'css/style.css', array(), '', 'all' );
		
	

	/*if ( ! empty( $meta ) ) {
		$meta = implode( ',', $meta );
	} else $meta = ' ';*/

	if ( empty( $meta ) || $meta == ' ' || $meta == '' || !is_array($meta) ) {
		$meta = ' ';
	} else $meta = implode( ',', $meta );

	echo '<div class="pw-gallery rbs_block ">';
	echo '	<input type="hidden" class="pw-gallary-value" id="' . $field->args( 'id' ) . '" name="' . $field->args( 'id' ) . '" value="' . $meta . '" />';
	echo '	<button class="btn btn-info btn-lg "><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> ' . ( $field->args( 'button' ) ? $field->args( 'button' ) : 'Manage gallery' ) . ' </button>';
	echo '</div>';

	$desc = $field->args( 'desc' );
	if ( ! empty( $desc ) ) echo '<p class="cmb2-metabox-description">' . $desc . '</p>';
}
add_filter( 'cmb2_render_pw_gallery', 'pw_gallery_field', 10, 2 );


function pw_gallery_field_sanitise( $meta_value, $field ) {
	if ( empty( $meta_value ) ) {
		$meta_value = '';
	} else {
		$meta_value = explode( ',', $meta_value );
	}
	return $meta_value;
}
