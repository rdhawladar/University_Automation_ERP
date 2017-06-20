<?php
/**
 * Reset theme options.
 *
 * @package Education_Hub
 */

// Reset Section.
$wp_customize->add_section( 'section_reset_all_settings',
	array(
		'title'       => esc_html__( 'Reset All Theme Settings', 'education-hub' ),
		'description' => esc_html__( 'Caution: All theme settings will be reset to default. Refresh the page after save to view full effects.', 'education-hub' ),
		'priority'    => 200,
		'capability'  => 'edit_theme_options',
	)
);

$wp_customize->add_setting( 'theme_options[reset_all_settings]', array(
	'default'           => false,
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'education_hub_customize_callback_reset_all_settings',
));
$wp_customize->add_control( 'reset_all_settings', array(
    'label'    => __( 'Check to reset all settings', 'education-hub' ),
    'type'     => 'checkbox',
    'section'  => 'section_reset_all_settings',
    'settings' => 'theme_options[reset_all_settings]',
));
