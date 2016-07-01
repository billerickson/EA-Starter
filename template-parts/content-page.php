<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php tha_entry_top(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php tha_entry_content_before(); ?>
		<?php

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ea' ),
				'after'  => '</div>',
			) );
		?>
		<?php tha_entry_content_after(); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
	<?php tha_entry_bottom(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
