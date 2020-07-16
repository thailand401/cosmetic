<?php
/**
 * Display Header top bar
 *
 * @package Cenote
 */

// Get the sorted data from theme options.
$header_top_items_order = get_theme_mod( 'cenote_order_header_top_items', array( 'menu', 'social_links' ) );

if ( ! empty( $header_top_items_order ) && is_array( $header_top_items_order ) ) :

	// Loop to display sortable elements.
	foreach ( $header_top_items_order as $key => $header_top_item_order ) :
		if ( 'menu' === $header_top_item_order ) :
			get_template_part( 'template-parts/menu/menu', 'header-top' );
		elseif ( 'social_links' === $header_top_item_order ) :
			get_template_part( 'template-parts/menu/menu', 'social' );
		endif;
	endforeach;
endif;
