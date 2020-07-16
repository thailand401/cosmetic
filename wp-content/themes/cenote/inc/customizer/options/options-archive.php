<?php
/**
 * Customizer option for Archive/Blog
 *
 * @package cenote
 */

// Blog/archive style.
Kirki::add_field(
	'cenote_config', array(
		'type'        => 'radio-image',
		'settings'    => 'cenote_archive_style',
		'label'       => esc_html__( 'Archive/Blog Post Style', 'cenote' ),
		'description' => esc_html__( 'Choose how you want post to be shown.', 'cenote' ),
		'section'     => 'cenote_section_archive',
		'default'     => 'tg-archive-style--masonry',
		'choices'     => array(
			'tg-archive-style--masonry'   => get_template_directory_uri() . '/assets/img/icons/archive--masonry.jpg',
			'tg-archive-style--classic'   => get_template_directory_uri() . '/assets/img/icons/archive--classic.jpg',
			'tg-archive-style--big-block' => get_template_directory_uri() . '/assets/img/icons/archive--big-block.jpg',
		),
	)
);

// Column Control for big block, block and masonry.
Kirki::add_field( 'cenote_config', array(
	'type'            => 'radio-buttonset',
	'settings'        => 'cenote_archive_column',
	'label'           => esc_html__( 'Post Column', 'cenote' ),
	'description'     => esc_html__( 'Choose how many post you want to show on one line.', 'cenote' ),
	'section'         => 'cenote_section_archive',
	'default'         => 'tg-archive-col--3',
	'choices'         => array(
		'tg-archive-col--2' => esc_attr__( '2', 'cenote' ),
		'tg-archive-col--3' => esc_attr__( '3', 'cenote' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'cenote_archive_style',
			'value'    => array( 'tg-archive-style--big-block', 'tg-archive-style--masonry' ),
			'operator' => 'in',
		),
	),
) );

// Enable/Disable Drop Drop.
Kirki::add_field( 'cenote_config', array(
	'type'            => 'toggle',
	'settings'        => 'cenote_archive_enable_drop_cap',
	'label'           => esc_html__( 'Drop Cap', 'cenote' ),
	'description'     => esc_html__( 'Enable it to make first letter of paragraph bigger.', 'cenote' ),
	'section'         => 'cenote_section_archive',
	'default'         => '1',
	'active_callback' => array(
		array(
			'setting'  => 'cenote_archive_style',
			'value'    => array( 'tg-archive-style--big-block', 'tg-archive-style--classic' ),
			'operator' => 'in',
		),
	),
) );


// Re-arrange order of archive post.
Kirki::add_field(
	'cenote_config', array(
		'type'        => 'sortable',
		'settings'    => 'cenote_archive_order_layout',
		'label'       => esc_html__( 'Post Content Order', 'cenote' ),
		'description' => esc_html__( 'Drag & Drop to re-arrage order of items inside post.', 'cenote' ),
		'section'     => 'cenote_section_archive',
		'default'     => array(
			'thumbnail',
			'meta',
			'title',
			'content',
			'footer',
		),
		'choices'     => array(
			'thumbnail' => esc_attr__( 'Thumbnail', 'cenote' ),
			'meta'      => esc_attr__( 'Meta Tags', 'cenote' ),
			'title'     => esc_attr__( 'Title', 'cenote' ),
			'content'   => esc_attr__( 'Content', 'cenote' ),
			'footer'    => esc_attr__( 'Footer', 'cenote' ),
		),
	)
);
