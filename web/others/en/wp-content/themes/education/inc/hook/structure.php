<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function education_hub_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'education_hub_action_doctype', 'education_hub_doctype', 10 );


if ( ! function_exists( 'education_hub_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function education_hub_head() {
	?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
	}
endif;
add_action( 'education_hub_action_head', 'education_hub_head', 10 );

if ( ! function_exists( 'education_hub_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function education_hub_page_start() {
	?>
    <div id="page" class="container hfeed site">
    <?php
	}
endif;
add_action( 'education_hub_action_before', 'education_hub_page_start' );

if ( ! function_exists( 'education_hub_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function education_hub_page_end() {
	?></div><!-- #page --><?php
	}
endif;

add_action( 'education_hub_action_after', 'education_hub_page_end' );

if ( ! function_exists( 'education_hub_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function education_hub_content_start() {
	?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
	}
endif;
add_action( 'education_hub_action_before_content', 'education_hub_content_start' );


if ( ! function_exists( 'education_hub_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function education_hub_content_end() {
	?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php
	}
endif;
add_action( 'education_hub_action_after_content', 'education_hub_content_end' );


if ( ! function_exists( 'education_hub_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function education_hub_header_start() {
	?><header id="masthead" class="site-header" role="banner"><div class="container"><?php
	}
endif;
add_action( 'education_hub_action_before_header', 'education_hub_header_start' );

if ( ! function_exists( 'education_hub_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function education_hub_header_end() {
	?></div><!-- .container --></header><!-- #masthead --><?php
	}
endif;
add_action( 'education_hub_action_after_header', 'education_hub_header_end' );



if ( ! function_exists( 'education_hub_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function education_hub_footer_start() {
		$footer_status = apply_filters( 'education_hub_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
	?><footer id="colophon" class="site-footer" role="contentinfo"><div class="container"><?php
	}
endif;
add_action( 'education_hub_action_before_footer', 'education_hub_footer_start' );


if ( ! function_exists( 'education_hub_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function education_hub_footer_end() {
		$footer_status = apply_filters( 'education_hub_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
	?></div><!-- .container --></footer><!-- #colophon --><?php
	}
endif;
add_action( 'education_hub_action_after_footer', 'education_hub_footer_end' );
