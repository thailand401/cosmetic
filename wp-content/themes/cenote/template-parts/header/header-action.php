<?php
/**
 * Displays header action like cart and search
 *
 * @package Cenote
 */

$menu_style = get_theme_mod( 'cenote_menu_style', 'tg-site-menu--default' );
?>
<ul class="tg-header-action-menu">
	<?php if ( true === get_theme_mod( 'cenote_search_icon_option', true ) ) : ?>
		<li class="tg-search-toggle"><i class="tg-icon-search"></i></li>
	<?php endif; ?>

	<li class="tg-mobile-menu-toggle">
		<span></span>
	</li>
</ul><!-- .tg-header-action-menu -->
