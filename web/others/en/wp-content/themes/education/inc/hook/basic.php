<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_customize_search_form' ) ) :
	/**
	 * Customize search form.
	 *
	 * @since 1.0.0
	 *
	 * @return string The search form HTML output.
	 */
	function education_hub_customize_search_form() {

		$search_placeholder = education_hub_get_option( 'search_placeholder' );
		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
      <label>
        <span class="screen-reader-text">' . _x( 'Search for:', 'label', 'education-hub' ) . '</span>
        <input type="search" class="search-field" placeholder="' . esc_attr( $search_placeholder ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'education-hub' ) . '" />
      </label>
      <input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button', 'education-hub' ) .'" />
    </form>';

		return $form;

	}

endif;

add_filter( 'get_search_form', 'education_hub_customize_search_form', 15 );


if ( ! function_exists( 'education_hub_add_custom_css' ) ) :

	/**
	 * Add custom CSS.
	 *
	 * @since 1.0.0
	 */
	function education_hub_add_custom_css() {

		$custom_css = education_hub_get_option( 'custom_css' );
		$output = '';
		if ( ! empty( $custom_css ) ) {
			$output = "\n" . '<style type="text/css">' . "\n";
			$output .= $custom_css;
			$output .= "\n" . '</style>' . "\n" ;
		}
		echo $output;

	}

endif;

add_action( 'wp_head', 'education_hub_add_custom_css' );


if ( ! function_exists( 'education_hub_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function education_hub_implement_excerpt_length( $length ) {

		$excerpt_length = education_hub_get_option( 'excerpt_length' );
		if ( empty( $excerpt_length ) ) {
			$excerpt_length = $length;
		}
		return apply_filters( 'education_hub_filter_excerpt_length', esc_attr( $excerpt_length ) );

	}

endif;
add_filter( 'excerpt_length', 'education_hub_implement_excerpt_length', 999 );


if ( ! function_exists( 'education_hub_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function education_hub_implement_read_more( $more ) {

		$flag_apply_excerpt_read_more = apply_filters( 'education_hub_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more;
		}

		$output = $more;
		$read_more_text = education_hub_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$output = ' <a href="'. esc_url( get_permalink() ) . '" class="read-more">' . sprintf( __( '%s', 'education-hub' ) , esc_html( $read_more_text ) ) . '</a>';
			$output = apply_filters( 'education_hub_filter_read_more_link' , $output );
		}
		return $output;

	}

endif;
add_filter( 'excerpt_more', 'education_hub_implement_read_more' );


if ( ! function_exists( 'education_hub_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function education_hub_content_more_link( $more_link, $more_link_text ) {

		$flag_apply_excerpt_read_more = apply_filters( 'education_hub_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more_link;
		}

		$read_more_text = education_hub_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, $read_more_text, $more_link );
		}
		return $more_link;

	}

endif;

add_filter( 'the_content_more_link', 'education_hub_content_more_link', 10, 2 );


if ( ! function_exists( 'education_hub_custom_body_class' ) ) :
	/**
	 * Custom body class
	 *
	 * @since 1.0.0
	 *
	 * @param string|array $input One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function education_hub_custom_body_class( $input ) {

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$input[] = 'group-blog';
		}

		// Site layout.
		$site_layout = education_hub_get_option( 'site_layout' );
		$input[] = 'site-layout-' . esc_attr( $site_layout );

		// Global layout.
		global $post;
		$global_layout = education_hub_get_option( 'global_layout' );
		$global_layout = apply_filters( 'education_hub_filter_theme_global_layout', $global_layout );
		// Check if single.
		if ( $post  && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		$input[] = 'global-layout-' . esc_attr( $global_layout );

		$home_content_status =	education_hub_get_option( 'home_content_status' );
		if( true !== $home_content_status ){
			$input[] = 'home-content-not-enabled';
		}

		return $input;
	}
endif;

add_filter( 'body_class', 'education_hub_custom_body_class' );

if ( ! function_exists( 'education_hub_featured_image_instruction' ) ) :

	/**
	 * Message to show in the Featured Image Meta box.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Admin post thumbnail HTML markup.
	 * @param int $post_id Post ID.
	 * @return string HTML.
	 */
	function education_hub_featured_image_instruction( $content, $post_id ) {

		$allowed = array( 'page' );
		if ( in_array( get_post_type( $post_id ), $allowed ) ) {
			$content .= '<strong>' . __( 'Recommended Image Sizes', 'education-hub' ) . ':</strong><br/>';
			$content .= __( 'Slider Image', 'education-hub' ) . ' : 1420px X 550px';
		}
		return $content;

	}

endif;
add_filter( 'admin_post_thumbnail_html', 'education_hub_featured_image_instruction', 10, 2 );

if ( ! function_exists( 'education_hub_import_logo_image_field' ) ) :

	/**
	 * Import logo image field.
	 *
	 * @since 1.4
	 */
	function education_hub_import_logo_image_field() {

		// Bail if Custom Logo feature is not available.
		if ( version_compare( $GLOBALS['wp_version'], '4.5-alpha', '<' ) ) {
			return;
		}

		// Bail if there is no existing logo.
		$site_logo = education_hub_get_option( 'site_logo' );
		if ( empty( $site_logo ) ) {
			return;
		}

		// Get attachment ID.
		$attachment_id = attachment_url_to_postid( $site_logo );
		if ( $attachment_id > 0 ) {
		    // We got valid attachment ID.
		    set_theme_mod( 'custom_logo', $attachment_id );
		    // Remove old logo value.
		    $all_options = education_hub_get_options();
		    $all_options['site_logo'] = '';
		    set_theme_mod( 'theme_options', $all_options );
		}

	}
endif;

add_action( 'after_setup_theme', 'education_hub_import_logo_image_field', 20 );

