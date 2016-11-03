<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ea
 */

echo '<article class="' . join( ' ', get_post_class() ) . '">';

	echo '<header class="entry-header">';
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		tha_entry_top();
	echo '</header>';

	echo '<div class="entry-content">';
		tha_entry_content_before();
		the_excerpt();
		tha_entry_content_after();
	echo '</div>';

	echo '<footer class="entry-footer">';
		tha_entry_bottom();
	echo '</footer>';

echo '</article>';
