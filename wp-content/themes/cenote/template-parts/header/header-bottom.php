<?php
/**
 * Display header bottom
 *
 * @package Cenote
 */

$header_style = get_theme_mod( 'cenote_header_style', 'tg-site-header--default' );
$menu_style   = get_theme_mod( 'cenote_menu_style', 'tg-site-menu--default' );

?>
<div class="header-bottom-top">
	<div class="tg-container tg-flex-container tg-flex-space-between tg-flex-item-centered">
		<?php
		if ( 'tg-site-header--corner-bordered' === $header_style ) {
			cenote_show_header_with_middle_content( 'site-identity' );
		} else {
			get_template_part( 'template-parts/header/site', 'branding' );
		}
		?>
	</div><!-- /.tg-container -->
</div>
<!-- /.header-bottom-top -->
<?php
// Bail out if menu is offcanvas or fullscreen and menu is corner bordered.
if ( in_array( $menu_style, array( 'tg-site-menu--offcanvas', 'tg-site-menu--fullscreen' ), true ) && 'tg-site-header--corner-bordered' === $header_style ) {
	return;
}
?>
<div class="header-bottom-bottom">
	<div class="tg-container tg-flex-container tg-flex-space-between tg-flex-item-centered">
		<?php
		if ( 'tg-site-header--corner-bordered' === $header_style ) {
			if ( 'tg-site-menu--default' === $menu_style ) {
				get_template_part( 'template-parts/menu/menu', 'primary' );
			}
		} else {
			cenote_show_header_with_middle_content( 'navigation' );
		}
		?>
	</div><!-- /.tg-header -->
</div>
<!-- /.header-bottom-bottom -->
