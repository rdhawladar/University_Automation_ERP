<?php
/**
 * Callback functions for active_callback.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_is_simple_breadcrumb_active' ) ) :

	/**
	 * Check if simple breadcrumb is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_simple_breadcrumb_active( $control ) {

		if ( 'simple' === $control->manager->get_setting( 'theme_options[breadcrumb_type]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_notice_active' ) ) :

	/**
	 * Check if notice is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_notice_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[show_notice]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_slider_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_slider_active( $control ) {

		if ( 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_content_active' ) ) :

	/**
	 * Check if featured content is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_content_active( $control ) {

		if ( 'disabled' !== $control->manager->get_setting( 'theme_options[featured_content_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_page_slider_active' ) ) :

	/**
	 * Check if featured page slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_page_slider_active( $control ) {

		if (
		'featured-page' === $control->manager->get_setting( 'theme_options[featured_slider_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_slider_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_featured_page_content_active' ) ) :

	/**
	 * Check if featured page content is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_featured_page_content_active( $control ) {

		if (
		'featured-page' === $control->manager->get_setting( 'theme_options[featured_content_type]' )->value()
		&& 'disabled' !== $control->manager->get_setting( 'theme_options[featured_content_status]' )->value()
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_home_news_active' ) ) :

	/**
	 * Check if home news is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_home_news_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[home_news_section_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;
if ( ! function_exists( 'education_hub_is_home_events_active' ) ) :

	/**
	 * Check if home news is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_home_events_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[home_events_section_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'education_hub_is_quick_links_active' ) ) :

	/**
	 * Check if quick links is active.
	 *
	 * @since 1.5
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function education_hub_is_quick_links_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[show_quick_links]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;
