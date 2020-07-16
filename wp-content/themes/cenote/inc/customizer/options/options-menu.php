<?php
/**
 * Cenote available Menu Options
 *
 * @package cenote
 */

// Option for different menu layout.
Kirki::add_field( 'cenote_config', array(
	'type'        => 'radio-image',
	'settings'    => 'cenote_menu_style',
	'label'       => esc_html__( 'Menu Layout', 'cenote' ),
	'description' => esc_html__( 'Choose the menu layout as required for your site.', 'cenote' ),
	'section'     => 'cenote_section_menu',
	'default'     => 'tg-site-menu--default',
	'choices'     => array(
		'tg-site-menu--default' => get_template_directory_uri() . '/assets/img/icons/header--default.jpg',
	),
) );
