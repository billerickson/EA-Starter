<?php
/**
 * Template part for displaying post archive.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ea_entry_meta(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			tha_entry_content_before();
			the_excerpt();
			tha_entry_content_after();
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ea_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
