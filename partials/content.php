<?php
/**
 * Singular partial
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '<article class="' . join( ' ', get_post_class() ) . '">';

	echo '<header class="entry-header">';
		echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
		tha_entry_top();
	echo '</header>';

	echo '<div class="entry-content">';
		tha_entry_content_before();

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ea' ),
			'after'  => '</div>',
		) );

		tha_entry_content_after();
	echo '</div>';

	if( has_action( 'tha_entry_bottom' ) ) {
		echo '<footer class="entry-footer">';
			tha_entry_bottom();
		echo '</footer>';
	}

echo '</article>';
