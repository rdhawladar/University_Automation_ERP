<?php
/**
 * Theme Options.
 *
 * @package Education_Hub
 */

$default = education_hub_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => __( 'Header Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

if ( version_compare( $GLOBALS['wp_version'], '4.5-alpha', '<' ) ) {
	// Setting site_logo.
	$wp_customize->add_setting( 'theme_options[site_logo]',
		array(
		'default'           => $default['site_logo'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_hub_sanitize_image',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'theme_options[site_logo]',
			array(
			'label'    => __( 'Logo', 'education-hub' ),
			'section'  => 'section_header',
			'settings' => 'theme_options[site_logo]',
			)
		)
	);
}

// Search Section.
$wp_customize->add_section( 'section_search',
	array(
	'title'      => __( 'Search Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);
// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'education-hub' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'education-hub' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting contact_number.
$wp_customize->add_setting( 'theme_options[contact_number]',
	array(
	'default'           => $default['contact_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_number]',
	array(
	'label'    => __( 'Contact Number', 'education-hub' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);
// Setting contact_email.
$wp_customize->add_setting( 'theme_options[contact_email]',
	array(
	'default'           => $default['contact_email'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control( 'theme_options[contact_email]',
	array(
	'label'    => __( 'Contact Email', 'education-hub' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);
// Setting show_notice.
$wp_customize->add_setting( 'theme_options[show_notice]',
	array(
	'default'           => $default['show_notice'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_notice]',
	array(
	'label'    => __( 'Show Notice', 'education-hub' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting notice_title.
$wp_customize->add_setting( 'theme_options[notice_title]',
	array(
		'default'           => $default['notice_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[notice_title]',
	array(
		'label'           => __( 'Notice Title', 'education-hub' ),
		'section'         => 'section_header',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_notice_active',
	)
);
// Setting notice_link_text.
$wp_customize->add_setting( 'theme_options[notice_link_text]',
	array(
		'default'           => $default['notice_link_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[notice_link_text]',
	array(
	'label'           => __( 'Notice Text', 'education-hub' ),
	'section'         => 'section_header',
	'type'            => 'text',
	'priority'        => 100,
	'active_callback' => 'education_hub_is_notice_active',
	)
);
// Setting notice_link_url.
$wp_customize->add_setting( 'theme_options[notice_link_url]',
	array(
		'default'           => $default['notice_link_url'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[notice_link_url]',
	array(
		'label'           => __( 'Notice URL', 'education-hub' ),
		'section'         => 'section_header',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_notice_active',
	)
);

// Setting show_social_in_header.
$wp_customize->add_setting( 'theme_options[show_social_in_header]',
	array(
	'default'           => $default['show_social_in_header'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_header]',
	array(
	'label'    => __( 'Show Social Icons', 'education-hub' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_quick_links.
$wp_customize->add_setting( 'theme_options[show_quick_links]',
	array(
	'default'           => $default['show_quick_links'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_quick_links]',
	array(
	'label'    => __( 'Show Quick Links', 'education-hub' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting quick_links_text.
$wp_customize->add_setting( 'theme_options[quick_links_text]',
	array(
		'default'           => $default['quick_links_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[quick_links_text]',
	array(
		'label'           => __( 'Quick Links Text', 'education-hub' ),
		'section'         => 'section_header',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_quick_links_active',
	)
);
// Setting show_search_form.
$wp_customize->add_setting( 'theme_options[show_search_form]',
	array(
		'default'           => $default['show_search_form'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_search_form]',
	array(
		'label'       => __( 'Show Search Form', 'education-hub' ),
		'description' => __( 'Check this to display search form.', 'education-hub' ),
		'section'     => 'section_header',
		'type'        => 'checkbox',
		'priority'    => 100,
	)
);

// Setting search_placeholder.
$wp_customize->add_setting( 'theme_options[search_placeholder]',
	array(
	'default'           => $default['search_placeholder'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
	)
);
$wp_customize->add_control( 'theme_options[search_placeholder]',
	array(
	'label'    => __( 'Search Placeholder', 'education-hub' ),
	'section'  => 'section_search',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting site_layout.
$wp_customize->add_setting( 'theme_options[site_layout]',
	array(
	'default'           => $default['site_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[site_layout]',
	array(
	'label'    => __( 'Site Layout', 'education-hub' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => education_hub_get_site_layout_options(),
	'priority' => 100,
	)
);
// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => __( 'Global Layout', 'education-hub' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => education_hub_get_global_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => __( 'Archive Layout', 'education-hub' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => education_hub_get_archive_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_image.
$wp_customize->add_setting( 'theme_options[archive_image]',
	array(
	'default'           => $default['archive_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image]',
	array(
	'label'    => __( 'Image in Archive', 'education-hub' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => education_hub_get_image_sizes_options( true, array( 'disable', 'thumbnail', 'large' ), false ),
	'priority' => 100,
	)
);
// Setting archive_image_alignment.
$wp_customize->add_setting( 'theme_options[archive_image_alignment]',
	array(
	'default'           => $default['archive_image_alignment'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image_alignment]',
	array(
	'label'    => __( 'Image Alignment in Archive', 'education-hub' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => education_hub_get_image_alignment_options(),
	'priority' => 100,
	)
);
// Setting single_image.
$wp_customize->add_setting( 'theme_options[single_image]',
	array(
	'default'           => $default['single_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single_image]',
	array(
	'label'    => __( 'Image in Single Post/Page', 'education-hub' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => education_hub_get_image_sizes_options( true, array( 'disable', 'large' ), false ),
	'priority' => 100,
	)
);
// Setting single_image_alignment.
$wp_customize->add_setting( 'theme_options[single_image_alignment]',
	array(
	'default'           => $default['single_image_alignment'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single_image_alignment]',
	array(
	'label'    => __( 'Image Alignment in Single Post/Page', 'education-hub' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => education_hub_get_image_alignment_options(),
	'priority' => 100,
	)
);
// Home Page Section.
$wp_customize->add_section( 'section_home_page',
	array(
	'title'      => __( 'Home Page Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);
// Setting home_content_status.
$wp_customize->add_setting( 'theme_options[home_content_status]',
	array(
	'default'           => $default['home_content_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[home_content_status]',
	array(
	'label'       => __( 'Show Home Content', 'education-hub' ),
	'description' => __( 'Check this to show page content in Home page.', 'education-hub' ),
	'section'     => 'section_home_page',
	'type'        => 'checkbox',
	'priority'    => 100,
	)
);
// Setting home_news_section_status.
$wp_customize->add_setting( 'theme_options[home_news_section_status]',
	array(
	'default'           => $default['home_news_section_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[home_news_section_status]',
	array(
	'label'    => __( 'Enable News Section', 'education-hub' ),
	'section'  => 'section_home_page',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting home_news_section_title.
$wp_customize->add_setting( 'theme_options[home_news_section_title]',
	array(
	'default'           => $default['home_news_section_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[home_news_section_title]',
	array(
		'label'           => __( 'News Section Title', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_home_news_active',
	)
);
// Setting home_news_category.
$wp_customize->add_setting( 'theme_options[home_news_category]',
	array(
	'default'           => $default['home_news_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Education_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[home_news_category]',
		array(
			'label'           => __( 'News Category', 'education-hub' ),
			'section'         => 'section_home_page',
			'settings'        => 'theme_options[home_news_category]',
			'priority'        => 100,
			'active_callback' => 'education_hub_is_home_news_active',
		)
	)
);
// Setting home_news_number.
$wp_customize->add_setting( 'theme_options[home_news_number]',
	array(
	'default'           => $default['home_news_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[home_news_number]',
	array(
		'label'           => __( 'No. of News Posts', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'number',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_home_news_active',
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);
// Setting home_news_excerpt_length.
$wp_customize->add_setting( 'theme_options[home_news_excerpt_length]',
	array(
	'default'           => $default['home_news_excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_number_range',
	)
);
$wp_customize->add_control( 'theme_options[home_news_excerpt_length]',
	array(
		'label'           => __( 'News Post Excerpt Length', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'number',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_home_news_active',
		'input_attrs'     => array( 'min' => 0, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);
// Setting home_news_read_more_text.
$wp_customize->add_setting( 'theme_options[home_news_read_more_text]',
	array(
	'default'           => $default['home_news_read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[home_news_read_more_text]',
	array(
		'label'           => __( 'News Post Read More Text', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_home_news_active',
	)
);
// Setting home_events_section_status.
$wp_customize->add_setting( 'theme_options[home_events_section_status]',
	array(
	'default'           => $default['home_events_section_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[home_events_section_status]',
	array(
		'label'           => __( 'Enable Events Section', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'checkbox',
		'priority'        => 100,
	)
);
// Setting home_events_section_title.
$wp_customize->add_setting( 'theme_options[home_events_section_title]',
	array(
	'default'           => $default['home_events_section_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[home_events_section_title]',
	array(
		'label'           => __( 'Events Section Title', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'text',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_home_events_active',
	)
);
// Setting home_events_category.
$wp_customize->add_setting( 'theme_options[home_events_category]',
	array(
	'default'           => $default['home_events_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Education_Hub_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[home_events_category]',
		array(
			'label'           => __( 'Events Category', 'education-hub' ),
			'section'         => 'section_home_page',
			'settings'        => 'theme_options[home_events_category]',
			'priority'        => 100,
			'active_callback' => 'education_hub_is_home_events_active',
		)
	)
);
// Setting home_events_number.
$wp_customize->add_setting( 'theme_options[home_events_number]',
	array(
	'default'           => $default['home_events_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[home_events_number]',
	array(
		'label'           => __( 'No. of Events Posts', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'number',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_home_events_active',
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);
// Setting home_events_excerpt_length.
$wp_customize->add_setting( 'theme_options[home_events_excerpt_length]',
	array(
	'default'           => $default['home_events_excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_number_range',
	)
);
$wp_customize->add_control( 'theme_options[home_events_excerpt_length]',
	array(
		'label'           => __( 'Events Post Excerpt Length', 'education-hub' ),
		'section'         => 'section_home_page',
		'type'            => 'number',
		'priority'        => 100,
		'active_callback' => 'education_hub_is_home_events_active',
		'input_attrs'     => array( 'min' => 0, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Pagination Section.
$wp_customize->add_section( 'section_pagination',
	array(
	'title'      => __( 'Pagination Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'theme_options[pagination_type]',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination_type]',
	array(
	'label'       => __( 'Pagination Type', 'education-hub' ),
	'section'     => 'section_pagination',
	'type'        => 'select',
	'choices'     => education_hub_get_pagination_type_options(),
	'priority'    => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'education-hub' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);
// Setting go_to_top.
$wp_customize->add_setting( 'theme_options[go_to_top]',
	array(
	'default'           => $default['go_to_top'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[go_to_top]',
	array(
	'label'    => __( 'Show Go To Top', 'education-hub' ),
	'section'  => 'section_footer',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
	'title'      => __( 'Blog Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_number_range',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
	'label'       => __( 'Excerpt Length', 'education-hub' ),
	'description' => __( 'in words', 'education-hub' ),
	'section'     => 'section_blog',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);
// Setting read_more_text.
$wp_customize->add_setting( 'theme_options[read_more_text]',
	array(
	'default'           => $default['read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[read_more_text]',
	array(
	'label'    => __( 'Read More Text', 'education-hub' ),
	'section'  => 'section_blog',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
	'title'      => __( 'Breadcrumb Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
	'label'       => __( 'Breadcrumb Type', 'education-hub' ),
	'description' => sprintf( __( 'Advanced: Requires %sBreadcrumb NavXT%s plugin', 'education-hub' ), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
	'section'     => 'section_breadcrumb',
	'type'        => 'select',
	'choices'     => education_hub_get_breadcrumb_type_options(),
	'priority'    => 100,
	)
);
// Setting breadcrumb_separator.
$wp_customize->add_setting( 'theme_options[breadcrumb_separator]',
	array(
	'default'           => $default['breadcrumb_separator'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_separator]',
	array(
	'label'           => __( 'Separator', 'education-hub' ),
	'section'         => 'section_breadcrumb',
	'type'            => 'text',
	'priority'        => 100,
	'active_callback' => 'education_hub_is_simple_breadcrumb_active',
	'input_attrs'     => array( 'style' => 'width: 55px;' ),
	)
);

// Advanced Section.
$wp_customize->add_section( 'section_advanced',
	array(
	'title'      => __( 'Advanced Options', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting custom_css.
$wp_customize->add_setting( 'theme_options[custom_css]',
	array(
	'default'              => $default['custom_css'],
	'capability'           => 'edit_theme_options',
	'sanitize_callback'    => 'wp_strip_all_tags',
	'sanitize_js_callback' => 'wp_strip_all_tags',
	)
);
$wp_customize->add_control( 'theme_options[custom_css]',
	array(
	'label'    => __( 'Custom CSS', 'education-hub' ),
	'section'  => 'section_advanced',
	'type'     => 'textarea',
	'priority' => 100,
	)
);

