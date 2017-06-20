<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_global_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'education-hub' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'education-hub' ),
			'three-columns' => esc_html__( 'Three Columns', 'education-hub' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_site_layout_options' ) ) :

	/**
	 * Returns site layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_site_layout_options() {

		$choices = array(
			'fluid' => esc_html__( 'Fluid', 'education-hub' ),
			'boxed' => esc_html__( 'Boxed', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_site_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Default (Older / Newer Post)', 'education-hub' ),
			'numeric' => esc_html__( 'Numeric', 'education-hub' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'education_hub_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'education-hub' ),
			'simple'   => esc_html__( 'Simple', 'education-hub' ),
			'advanced' => esc_html__( 'Advanced', 'education-hub' ),
		);
		return $choices;

	}

endif;


if ( ! function_exists( 'education_hub_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'education-hub' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function education_hub_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'education-hub' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'education-hub' );
		$choices['medium']    = esc_html__( 'Medium', 'education-hub' );
		$choices['large']     = esc_html__( 'Large', 'education-hub' );
		$choices['full']      = esc_html__( 'Full (original)', 'education-hub' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = ucfirst( $_size ) . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ){
					$choices[ $key ] .= ' ('. $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'education_hub_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_image_alignment_options() {

		$choices = array(
			'none'   => _x( 'None', 'Alignment', 'education-hub' ),
			'left'   => _x( 'Left', 'Alignment', 'education-hub' ),
			'center' => _x( 'Center', 'Alignment', 'education-hub' ),
			'right'  => _x( 'Right', 'Alignment', 'education-hub' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_slider_transition_effects() {

		$choices = array(
			'fade'       => esc_html__( 'fade', 'education-hub' ),
			'fadeout'    => esc_html__( 'fadeout', 'education-hub' ),
			'none'       => esc_html__( 'none', 'education-hub' ),
			'scrollHorz' => esc_html__( 'scrollHorz', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_slider_transition_effects', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_slider_content_options() {

		$choices = array(
			'home-page'               => esc_html__( 'Static Front Page Only', 'education-hub' ),
			'entire-site'             => esc_html__( 'Entire Site', 'education-hub' ),
			'entire-site-except-blog' => esc_html__( 'Entire Site Except Blog Index Page', 'education-hub' ),
			'disabled'                => esc_html__( 'Disabled', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_slider_content_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_content_status_options' ) ) :

	/**
	 * Returns the featured content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_content_status_options() {

		$choices = array(
			'home-page' => esc_html__( 'Static Front Page Only', 'education-hub' ),
			'disabled'  => esc_html__( 'Disabled', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_content_status_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_slider_type() {

		$choices = array(
			'featured-page' => esc_html__( 'Featured Pages', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_slider_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_featured_content_type' ) ) :

	/**
	 * Returns the featured content type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function education_hub_get_featured_content_type() {

		$choices = array(
			'featured-page' => esc_html__( 'Featured Pages', 'education-hub' ),
		);
		$output = apply_filters( 'education_hub_filter_featured_content_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;
