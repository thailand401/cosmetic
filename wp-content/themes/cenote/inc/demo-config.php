<?php
/**
 * Functions for configuring demo importer.
 *
 * @author   ThemeGrill
 * @category Admin
 * @package  Importer/Functions
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup demo importer packages.
 *
 * @param array $packages The list of theme demo packages.
 *
 * @return array
 */
function cenote_demo_importer_packages( $packages ) {
	$new_packages = array(
		'cenote-free'    => array(
			'name'    => __( 'Cenote', 'cenote' ),
			'preview' => 'https://demo.themegrill.com/cenote/',
		),
		'cenote-fashion' => array(
			'name'    => __( 'Cenote Fashion', 'cenote' ),
			'preview' => 'https://demo.themegrill.com/cenote-fashion/',
		),
	);

	return array_merge( $new_packages, $packages );
}

add_filter( 'themegrill_demo_importer_packages', 'cenote_demo_importer_packages' );
