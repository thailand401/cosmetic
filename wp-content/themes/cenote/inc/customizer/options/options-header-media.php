<?php
/**
 * Cenote Heder media options
 *
 * @package cenote
 */

// Option to enable/disable the header media section.
Kirki::add_field(
	'cenote_config', array(
		'type'     => 'toggle',
		'settings' => 'cenote_header_media_enable_desc',
		'label'    => esc_html__( 'Show Description', 'cenote' ),
		'section'  => 'header_image',
		'default'  => '1',
	)
);


// Header media Heading.
Kirki::add_field(
	'cenote_config', array(
		'type'            => 'text',
		'settings'        => 'cenote_header_media_heading',
		'label'           => esc_html__( 'Title', 'cenote' ),
		'section'         => 'header_image',
		'default'         => 'Hi, I am Header Media Title',
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'element'  => '.cenote-header-media .cenote-header-media__heading',
				'function' => 'html',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'cenote_header_media_enable_desc',
				'operator' => '==',
				'value'    => 1,
			),
		),
	)
);

// Header Media Content.
Kirki::add_field(
	'cenote_config', array(
		'type'            => 'text',
		'settings'        => 'cenote_header_media_text',
		'label'           => esc_html__( 'Text', 'cenote' ),
		'section'         => 'header_image',
		'default'         => 'I am description of header media. You can write short text to give me more info.',
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'element'  => '.cenote-header-media .cenote-header-media__content',
				'function' => 'html',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'cenote_header_media_enable_desc',
				'operator' => '==',
				'value'    => 1,
			),
		),
	)
);

// Header Media Button text.
Kirki::add_field(
	'cenote_config', array(
		'type'            => 'text',
		'settings'        => 'cenote_header_media_button_text',
		'label'           => esc_html__( 'Button Text', 'cenote' ),
		'section'         => 'header_image',
		'default'         => 'Take action',
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'element'  => '.cenote-header-media .cenote-header-media__button',
				'function' => 'html',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'cenote_header_media_enable_desc',
				'operator' => '==',
				'value'    => 1,
			),
		),
	)
);

// Header Media Button LInk.
Kirki::add_field(
	'cenote_config', array(
		'type'            => 'url',
		'settings'        => 'cenote_header_media_url',
		'label'           => esc_html__( 'Button URL', 'cenote' ),
		'section'         => 'header_image',
		'default'         => '#',
		'active_callback' => array(
			array(
				'setting'  => 'cenote_header_media_enable_desc',
				'operator' => '==',
				'value'    => 1,
			),
		),
	)
);
