<?php
/**
 * Cenote color option
 *
 * @package cenote
 */

// Primary color option.
Kirki::add_field(
	'cenote_config', array(
		'type'        => 'color',
		'settings'    => 'cenote_color_primary',
		'label'       => esc_html__( 'Primary Color', 'cenote' ),
		'description' => esc_html__( 'Choose the main color for your site.', 'cenote' ),
		'section'     => 'cenote_section_color',
		'default'     => '#de7b85',
		'output'      => array(
			array(
				'element'  => array(
					'a:hover',
					'a:focus',
					'a:active',
					'.entry-content a',
					'.entry-meta a',
					'.tg-top-cat .cat-links a',
					'.single .hentry .entry-meta a:hover',
					'.entry-footer .tags-links a:hover',
					'.widget_tag_cloud .tagcloud a:hover',
					'.cenote-breadcrumb.cenote-breadcrumb--dark li:hover a',
					'.main-navigation.tg-site-menu--offcanvas li.current_page_item > a',
					'.main-navigation.tg-site-menu--offcanvas li.current-menu-item > a',
					'.main-navigation.tg-site-menu--offcanvas li.current_page_ancestor > a',
					'.main-navigation.tg-site-menu--offcanvas li.current-menu-ancestor > a',
					'.main-navigation.tg-site-menu--offcanvas li:hover > a',
					'.tg-site-menu--default li.focus > a',
					'.cenote-breadcrumb li a:hover',
					'.cenote-header-sticky .main-navigation li ul li > a:hover',
					'.cenote-header-sticky .main-navigation li ul li.focus > a',
					'.tg-header-top ul:not(.tg-social-menu) li a:hover',
					'.pagination .page-numbers:hover',
					'.tg-site-footer--default .widget ul li a:hover',
					'.tg-site-footer--default .widget .tagcloud a:hover',
					'.tg-footer-bottom .tg-social-menu a:hover',
					'.tg-site-footer--default .tg-footer-bottom .site-info a:hover',
					'.tg-site-footer--default .tg-footer-bottom .tg-social-menu li a:hover',
					'.tg-site-footer--light-dark .tg-footer-bottom .tg-social-menu a:hover',
					'.tg-site-footer--light-dark-center .tg-footer-bottom .tg-social-menu a:hover',
					'.tg-site-footer--light-dark .tg-footer-bottom .site-info a:hover',
					'.tg-site-footer--light-dark-center .tg-footer-bottom .site-info a:hover',
					'.tg-footer-bottom .tg-social-menu li:hover a',
					'.tg-header-top .tg-social-menu li:hover a',
					'.entry-content .page-links a:hover',
					'.cenote-hero.cenote-hero--right .cenote-hero__button:hover',
					'.entry-content table a:hover',
					'.cenote-header-sticky .cenote-reading-bar .cenote-reading-bar__share .cenote-reading-share-item a:hover',
				),
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => array(
					'.button:hover',
					'button:hover',
					'input[type="button"]:hover',
					'input[type="reset"]:hover',
					'input[type="submit"]:hover',
					'.widget .widget-title:after',
					'.post-template-post-template-cover .entry-header--cover .tg-top-cat .cat-links a:hover',
					'.entry-meta .posted-on:before',
					'.tg-readmore-link:hover:before',
					'.entry-footer .cat-links a',
					'.main-navigation.tg-site-menu--offcanvas li.current_page_item > a:before',
					'.main-navigation.tg-site-menu--offcanvas li.current-menu-item > a:before',
					'.main-navigation.tg-site-menu--offcanvas li.current_page_ancestor > a:before',
					'.main-navigation.tg-site-menu--offcanvas li.current-menu-ancestor > a:before',
					'.main-navigation.tg-site-menu--offcanvas li:hover > a:before',
					'.post-format-media--gallery .swiper-button-next',
					'.post-format-media--gallery .swiper-button-prev',
				),
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => array(
					'.entry-footer .tags-links a:hover',
					'.widget_tag_cloud .tagcloud a:hover',
					'.tg-site-footer--default .widget .tagcloud a:hover',
				),
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	)
);
