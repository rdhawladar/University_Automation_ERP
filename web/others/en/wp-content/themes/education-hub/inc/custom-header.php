<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Education_Hub
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses education_hub_header_style()
 */
function education_hub_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'education_hub_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '666666',
		'header-text'            => false,
		'width'                  => 1420,
		'height'                 => 180,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'education_hub_custom_header_setup' );
