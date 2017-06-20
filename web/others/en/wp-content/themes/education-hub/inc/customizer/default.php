<?php
/**
 * Default theme options.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function education_hub_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['site_logo']             = '';
		$defaults['show_title']            = true;
		$defaults['show_tagline']          = true;
		$defaults['contact_number']        = '234-235-5678';
		$defaults['contact_email']         = 'demo@wenthemes.com';
		$defaults['show_notice']           = true;
		$defaults['notice_title']          = esc_html__( 'Notice:', 'education-hub' );
		$defaults['notice_link_text']      = esc_html__( 'Welcome to our university.', 'education-hub' );
		$defaults['notice_link_url']       = '#';
		$defaults['show_social_in_header'] = false;
		$defaults['show_quick_links']      = true;
		$defaults['quick_links_text']      = esc_html__( 'Quick Links', 'education-hub' );
		$defaults['show_search_form']      = true;

		// Search.
		$defaults['search_placeholder'] = esc_html__( 'Search...', 'education-hub' );

		// Layout.
		$defaults['site_layout']             = 'fluid';
		$defaults['global_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'excerpt';
		$defaults['archive_image']           = 'large';
		$defaults['archive_image_alignment'] = 'center';
		$defaults['single_image']            = 'large';
		$defaults['single_image_alignment']  = 'center';

		// Home page.
		$defaults['home_content_status']        = true;
		$defaults['home_news_section_status']   = false;
		$defaults['home_news_section_title']    = esc_html__( 'News', 'education-hub' );
		$defaults['home_news_category']         = 0;
		$defaults['home_news_number']           = 2;
		$defaults['home_news_excerpt_length']   = 15;
		$defaults['home_news_read_more_text']   = esc_html__( 'Read More', 'education-hub' );
		$defaults['home_events_section_status'] = false;
		$defaults['home_events_section_title']  = esc_html__( 'Events', 'education-hub' );
		$defaults['home_events_category']       = 0;
		$defaults['home_events_number']         = 3;
		$defaults['home_events_excerpt_length'] = 10;

		// Pagination.
		$defaults['pagination_type'] = 'default';

		// Footer.
		$defaults['copyright_text'] = esc_html__( 'Copyright. All rights reserved.', 'education-hub' );
		$defaults['go_to_top']      = true;

		// Blog.
		$defaults['excerpt_length'] = 40;
		$defaults['read_more_text'] = esc_html__( 'Read More ...', 'education-hub' );

		// Breadcrumb.
		$defaults['breadcrumb_type']      = 'disabled';
		$defaults['breadcrumb_separator'] = '&gt;';

		// Advanced.
		$defaults['custom_css'] = '';

		// Slider Options.
		$defaults['featured_slider_status']              = 'disabled';
		$defaults['featured_slider_transition_effect']   = 'fadeout';
		$defaults['featured_slider_transition_delay']    = 3;
		$defaults['featured_slider_transition_duration'] = 1;
		$defaults['featured_slider_enable_caption']      = true;
		$defaults['featured_slider_enable_arrow']        = true;
		$defaults['featured_slider_enable_pager']        = false;
		$defaults['featured_slider_enable_autoplay']     = true;
		$defaults['featured_slider_type']                = 'featured-page';
		$defaults['featured_slider_number']              = 3;

		// Featured Content Options.
		$defaults['featured_content_status'] = 'disabled';
		$defaults['featured_content_number'] = 3;
		$defaults['featured_content_type']   = 'featured-page';

		// Pass through filter.
		$defaults = apply_filters( 'education_hub_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
