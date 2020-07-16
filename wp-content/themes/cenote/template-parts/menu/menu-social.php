<?php
/**
 * Displays Social Menu
 *
 * @package Cenote
 */

?>

<nav class="tg-social-menu-navigation">
	<?php
	// Get social icons.
	$social_icons = get_theme_mod( 'cenote_social_icons_lists', array(
		array(
			'social_name'  => 'facebook',
			'social_url'   => '#',
			'social_icon'  => 'tg-icon-facebook',
			'social_image' => '',
		),
		array(
			'social_name'  => 'twitter',
			'social_url'   => '#',
			'social_icon'  => 'tg-icon-twitter',
			'social_image' => '',
		),
	) );

	if ( ! empty( $social_icons ) && is_array( $social_icons ) ) :
		?>

		<ul class="tg-social-menu">
			<?php
			// Loop through each of the social links.
			foreach ( $social_icons as $social_icon ) {
				if ( ! empty( $social_icon['social_url'] ) ) :
					?>

					<li class="social-link">
						<a href="<?php echo esc_url( $social_icon['social_url'] ); ?>">
							<?php
							// Displaying image takes first priority for social links.
							if ( ! empty( $social_icon['social_image'] ) ) {
								// Getting the attachment image id since image upload Kirki option saves via attachment id.
								$attachment_image_id       = $social_icon['social_image'];
								$image_link_via_attachment = wp_get_attachment_image_src( $attachment_image_id, 'thumbnail', true );
								$image_link                = $image_link_via_attachment[0];
								?>

								<img src="<?php echo esc_url( $image_link ); ?>" alt="<?php echo esc_html( $social_icon['social_name'] ); ?>" />

							<?php } else { ?>
								<i class="<?php echo esc_attr( $social_icon['social_icon'] ); ?>"></i>
							<?php } ?>

							<span class="screen-reader-text"><?php echo esc_html( $social_icon['social_name'] ); ?></span>
						</a>
					</li>

				<?php
				endif;
			}
			?>
		</ul>

	<?php endif; ?>
</nav><!-- /.tg-social-menu -->
