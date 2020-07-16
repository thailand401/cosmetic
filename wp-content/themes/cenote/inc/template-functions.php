<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cenote
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cenote_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

add_action( 'wp_head', 'cenote_pingback_header' );


/**
 * Show the header item with social and header action of left right
 * with user specific content on bottom
 *
 * @param string $middle_content content to show in middle.
 */
function cenote_show_header_with_middle_content( $middle_content = 'navigation' ) {
	$header_items_order = get_theme_mod( 'cenote_oder_header_items', array( 'social', 'header-action' ) );
	$menu_style         = get_theme_mod( 'cenote_menu_style', 'tg-site-menu--default' );

	// Add middle item between social and header action.
	$header_items_order[2] = $header_items_order[1];
	$header_items_order[1] = 'middle-item';

	if ( 'site-identity' === $middle_content ) {
		$middle_content = 'template-parts/header/site-branding';
	} else {
		if ( 'tg-site-menu--default' === $menu_style ) {
			$middle_content = 'template-parts/menu/menu-primary';
		}
	}

	if ( ! empty( $header_items_order ) ) :
		foreach ( $header_items_order as $key => $header_item_order ) :
			if ( 'social' === $header_item_order ) {
				get_template_part( 'template-parts/menu/menu', 'social' );
			} elseif ( 'header-action' === $header_item_order ) {
				get_template_part( 'template-parts/header/header', 'action' );
			} elseif ( 'middle-item' === $header_item_order ) {
				get_template_part( $middle_content );
			}
		endforeach;
	endif;
}

/**
 * Checks if the current page matches the given layout
 *
 * @return string $layout layout of current page.
 */
function cenote_is_layout() {
	global $post;
	$layout = '';

	if ( is_archive() || is_home() ) {
		$layout = get_theme_mod( 'cenote_layout_archive', 'layout--no-sidebar' );
	} elseif ( is_single() ) {
		$individual_layout = get_post_meta( $post->ID, 'cenote_post_layout', true );

		// If individual layout is set.
		if ( ! empty( $individual_layout ) ) {
			$layout = $individual_layout;
		} else {
			// if individual layout is not set add global one.
			$layout = get_theme_mod( 'cenote_layout_single', 'layout--right-sidebar' );
		}
	} elseif ( is_page() ) {
		$individual_layout = get_post_meta( $post->ID, 'cenote_post_layout', true );

		// If individual layout is set.
		if ( ! empty( $individual_layout ) ) {
			$layout = $individual_layout;
		} else {
			// if individual layout is not set add global one.
			$layout = get_theme_mod( 'cenote_layout_page', 'layout--right-sidebar' );
		}
	}

	return $layout;
}

/**
 * Retuns the post url
 *
 * @return string the link format url.
 */
function cenote_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Adds the necessary template to load on footer.
 *
 * @return void
 */
function cenote_add_footer_extras() {
	$menu_style = get_theme_mod( 'cenote_menu_style', 'tg-site-menu--default' );

	// Load mobile navigaiton.
	get_template_part( 'template-parts/menu/menu', 'mobile' );

	// Load offcanvas or full screen menu.
	if ( 'tg-site-menu--offcanvas' === $menu_style || 'tg-site-menu--fullscreen' === $menu_style ) {
		get_template_part( 'template-parts/menu/menu', 'primary' );
	}

	// load search form.
	get_template_part( 'template-parts/footer/search', 'form' );

	// Show back to top if enabled.
	if ( true === get_theme_mod( 'cenote_footer_enable_back_to_top', true ) ) {
		?>
		<div id="cenote-back-to-top" class="cenote-back-to-top">
		<span>
			<?php esc_html_e( 'Back To Top', 'cenote' ); ?>
			<i class="tg-icon-arrow-right"></i>
		</span> 
	</div>
	<?php
	}
}
add_action( 'cenote_after_footer', 'cenote_add_footer_extras' );

/**
 * Adds elements after header
 */
function cenote_add_after_header() {
	// Show sticky header if enabled.
	if ( true === get_theme_mod( 'cenote_header_sticky_option', true ) ) :
		get_template_part( 'template-parts/header/header', 'sticky' );
	endif;
}
add_action( 'cenote_after_header', 'cenote_add_after_header' );

/**
 * Adds breadcrumb to site if enabled.
 *
 * @return void
 */
function cenote_add_breadcrumnb() {
	// Show Breadcrumb if enabled.
	if ( true === get_theme_mod( 'cenote_breadcrumb', true ) ) :
		get_template_part( 'template-parts/breadcrumb/breadcrumb', 'trail' );
	endif;
}
add_action( 'cenote_after_header', 'cenote_add_breadcrumnb', 10 );

/**
 * Adds page header
 *
 * @return void
 */
function cenote_add_page_header() {
	if ( is_home() && ! is_front_page() ) {
		?>
			<header>
				<div class="tg-container">
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</div>
			</header>
			<!-- /.tg-container -->
		<?php
	} elseif ( is_archive() ) {
		?>
		<header class="page-header">
			<div class="tg-container">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div>
			<!-- /.tg-container -->
		</header><!-- .page-header -->
		<?php
	}
}
add_action( 'cenote_after_header', 'cenote_add_page_header' );
