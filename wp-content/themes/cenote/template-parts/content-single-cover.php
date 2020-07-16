<?php
/**
 * Template part for displaying single video post format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cenote
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header entry-header--cover">
		<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail( 'cenote-full-width' ); ?>
		</figure>
		<?php endif; ?>

		<div class="entry-info">
			<div class="tg-top-cat">
				<?php cenote_post_categories(); ?>
			</div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php
					cenote_posted_by();
					cenote_posted_on();
				?>
			</div><!-- .entry-meta -->
		</div>
		<!-- /.entry-info -->

	</header><!-- .entry-header -->


	<div class="entry-center-content">
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<!-- /.entry-content -->

		<footer class="entry-footer">
			<?php cenote_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<?php
		$args = array(
			'prev_text' => '<span class="nav-links__label">' . esc_html__( 'Previous Article', 'cenote' ) . '</span> %title',
			'next_text' => '<span class="nav-links__label">' . esc_html__( 'Next Article', 'cenote' ) . '</span> %title',
		);

		// Show author box if enabled.
		if ( true === get_theme_mod( 'cenote_single_enable_author_box', true ) ) {
			get_template_part( 'template-parts/author/author', 'box' );
		}

		the_post_navigation( $args );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
	</div>
	<!-- /.entry-center-content -->
</article><!-- #post-<?php the_ID(); ?> -->
