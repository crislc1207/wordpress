<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Signify
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		$header_image = signify_featured_overall_image();

		if ( 'disable' === $header_image ) : ?>

		<header class="entry-header">
			<?php the_title( '<h1 class="section-title">', '</h1>' ); ?>

			<?php
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php signify_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

	<?php endif; ?>
	<?php signify_single_image(); ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'signify' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'signify' ),
				'after'  => '</span></div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php signify_entry_footer(); ?>
		</div><!-- .entry-meta -->

		<?php signify_author_bio(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
