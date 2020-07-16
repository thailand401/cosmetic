<?php
/**
 * Cenote option for breadcrumb
 *
 * @package cenote
 */

// Enable/Disable breadcrumbs.
Kirki::add_field( 'cenote_config', array(
	'type'        => 'toggle',
	'settings'    => 'cenote_breadcrumb',
	'label'       => esc_html__( 'Breadcrumb', 'cenote' ),
	'description' => esc_html__( 'Enable to display breadcrumb.', 'cenote' ),
	'section'     => 'cenote_section_breadcrumb',
	'default'     => '1',
) );

// Breadcrumb style.
Kirki::add_field( 'cenote_config', array(
	'type'            => 'radio-buttonset',
	'settings'        => 'cenote_breadcrumb_style',
	'label'           => esc_html__( 'Breadcrumb style', 'cenote' ),
	'description'     => esc_html__( 'Choose breadcrumb style.', 'cenote' ),
	'section'         => 'cenote_section_breadcrumb',
	'default'         => 'cenote-breadcrumb--light',
	'choices'         => array(
		'cenote-breadcrumb--light' => esc_attr__( 'Light', 'cenote' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'cenote_breadcrumb',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );
