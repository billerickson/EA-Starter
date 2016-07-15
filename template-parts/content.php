<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
		<?php tha_entry_top(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php tha_entry_content_before(); ?>
		<?php
			if( is_singular() ) {

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ea' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ea' ),
					'after'  => '</div>',
				) );
			} else {
			
				the_excerpt();
			}
		?>
		<?php tha_entry_content_after(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	<?php tha_entry_bottom(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
