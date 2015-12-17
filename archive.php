<?php

/**
 * Archive Body Class
 *
 */
function ea_archive_body_class( $classes ) {
	$classes[] = 'blog-archive';
	return $classes;
}
add_filter( 'body_class', 'ea_archive_body_class' );

/**
 * Archive Header 
 *
 */
function ea_archive_header() {

	echo '<header class="page-header">';
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="taxonomy-description">', '</div>' );
	echo '</header>';

}
add_action( 'tha_content_while_before', 'ea_archive_header' );

// Build the page
require get_template_directory() . '/index.php';