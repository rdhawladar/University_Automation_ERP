<?php
/**
 * Theme Options related to featured content.
 *
 * @package Education_Hub
 */

$default = education_hub_get_default_theme_options();

// Add Featured Content Panel.
$wp_customize->add_panel( 'theme_featured_content_panel',
	array(
	'title'      => __( 'Featured Content', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Featured Content Type Section.
$wp_customize->add_section( 'section_theme_featured_content_type',
	array(
	'title'      => __( 'Featured Content Type', 'education-hub' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_featured_content_panel',
	)
);

// Setting featured_content_status.
$wp_customize->add_setting( 'theme_options[featured_content_status]',
	array(
	'default'           => $default['featured_content_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[featured_content_status]',
	array(
	'label'    => __( 'Enable Featured Content', 'education-hub' ),
	'section'  => 'section_theme_featured_content_type',
	'type'     => 'select',
	'priority' => 100,
	'choices'  => education_hub_get_featured_content_status_options(),
	)
);

// Setting featured_content_number.
$wp_customize->add_setting( 'theme_options[featured_content_number]',
	array(
	'default'           => $default['featured_content_number'],
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'education_hub_sanitize_number_range',
	)
);
$wp_customize->add_control( 'theme_options[featured_content_number]',
	array(
	'label'           => __( 'No of Blocks', 'education-hub' ),
	'description'     => sprintf( __( 'Enter number between %1$d and %2$d. Save and refresh the page if No of Blocks is changed.', 'education-hub' ), 1, 4 ),
	'section'         => 'section_theme_featured_content_type',
	'type'            => 'number',
	'priority'        => 100,
	'active_callback' => 'education_hub_is_featured_content_active',
	'input_attrs'     => array( 'min' => 1, 'max' => 4, 'step' => 1, 'style' => 'width: 55px;' ),
	)
);

// Setting featured_content_type.
$wp_customize->add_setting( 'theme_options[featured_content_type]',
	array(
	'default'           => $default['featured_content_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_hub_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[featured_content_type]',
	array(
	'label'           => __( 'Select Type', 'education-hub' ),
	'section'         => 'section_theme_featured_content_type',
	'type'            => 'select',
	'priority'        => 100,
	'choices'         => education_hub_get_featured_content_type(),
	'active_callback' => 'education_hub_is_featured_content_active',
	)
);

$featured_content_number = absint( education_hub_get_option( 'featured_content_number' ) );

if ( $featured_content_number > 0 ) {
	for ( $i = 1; $i <= $featured_content_number; $i++ ) {
		$wp_customize->add_setting( "theme_options[featured_content_page_$i]",
			array(
			'default'           => isset( $default[ 'featured_content_page_' .$i ] ) ? $default[ 'featured_content_page_' .$i ] : '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'education_hub_sanitize_dropdown_pages',
			)
		);
		$wp_customize->add_control( "theme_options[featured_content_page_$i]",
			array(
			'label'           => __( 'Featured Page', 'education-hub' ) . ' #' . $i,
			'section'         => 'section_theme_featured_content_type',
			'type'            => 'dropdown-pages',
			'priority'        => 100,
			'active_callback' => 'education_hub_is_featured_page_content_active',
			)
		);
	} // End for loop.
}
