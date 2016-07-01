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
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php tha_entry_top(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php tha_entry_content_before(); ?>
		<?php the_excerpt(); ?>
		<?php tha_entry_content_after(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	<?php tha_entry_bottom(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
