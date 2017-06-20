<?php
/**
 * Implement theme metabox.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function education_hub_get_option( $key = '' ) {

		global $education_hub_default_options;
		if ( empty( $key ) ) {
			return;
		}

		$default = ( isset( $education_hub_default_options[ $key ] ) ) ? $education_hub_default_options[ $key ] : '';
		$theme_options = get_theme_mod( 'theme_options', $education_hub_default_options );
		$theme_options = array_merge( $education_hub_default_options, $theme_options );
		$value = '';
		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}
		return $value;

	}

endif;

if ( ! function_exists( 'education_hub_get_options' ) ) :

	/**
	 * Get theme options.
	 *
	 * @since 1.4
	 */
	function education_hub_get_options() {

		$value = array();

		$value = get_theme_mod( 'theme_options' );

		return $value;

	}

endif;
