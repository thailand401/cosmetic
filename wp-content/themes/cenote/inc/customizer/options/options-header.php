<?php
/**
 * Cenote available Header Options
 *
 * @package cenote
 */

// Enable/Disable Header top.
Kirki::add_field( 'cenote_config', array(
	'type'        => 'toggle',
	'settings'    => 'cenote_enable_header_top',
	'label'       => esc_html__( 'Header Top', 'cenote' ),
	'description' => esc_html__( 'Enable to display header menu as well as social links.', 'cenote' ),
	'section'     => 'cenote_section_header',
	'default'     => '1',
) );

// Re-arrange order of header top items.
Kirki::add_field( 'cenote_config', array(
	'type'            => 'sortable',
	'settings'        => 'cenote_order_header_top_items',
	'label'           => esc_html__( 'Header Top Item Order', 'cenote' ),
	'description'     => esc_html__( 'Drag & Drop to re-arrage order of items inside header top.', 'cenote' ),
	'section'         => 'cenote_section_header',
	'default'         => array(
		'menu',
		'social_links',
	),
	'choices'         => array(
		'menu'         => esc_attr__( 'Menu', 'cenote' ),
		'social_links' => esc_attr__( 'Social Links', 'cenote' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'cenote_enable_header_top',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

// Enable/disable the sticky header.
Kirki::add_field( 'cenote_config', array(
	'type'        => 'toggle',
	'settings'    => 'cenote_header_sticky_option',
	'label'       => esc_html__( 'Sticky Header', 'cenote' ),
	'description' => esc_html__( 'Enable to make the header sticky.', 'cenote' ),
	'section'     => 'cenote_section_header',
	'default'     => '1',
) );

// Select header style.
Kirki::add_field( 'cenote_config', array(
	'type'        => 'radio-image',
	'settings'    => 'cenote_header_style',
	'label'       => esc_html__( 'Header Layout.', 'cenote' ),
	'description' => esc_html__( 'Choose the header layout as required for your site.', 'cenote' ),
	'section'     => 'cenote_section_header',
	'default'     => 'tg-site-header--default',
	'choices'     => array(
		'tg-site-header--default'  => get_template_directory_uri() . '/assets/img/icons/header--default.jpg',
		'tg-site-header--bordered' => get_template_directory_uri() . '/assets/img/icons/header--bordered.jpg',
	),
) );

// Show/Hide search icon in header.
Kirki::add_field( 'cenote_config', array(
	'type'        => 'toggle',
	'settings'    => 'cenote_search_icon_option',
	'label'       => esc_html__( 'Search Icon', 'cenote' ),
	'description' => esc_html__( 'Enable to display the search icon in header.', 'cenote' ),
	'section'     => 'cenote_section_header',
	'default'     => '1',
) );
