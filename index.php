<?php
/**
 * Base template
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

get_header();

tha_content_before();

	$classes = apply_filters( 'ea_site_main_class', array( 'col-md-12' ) );
	if( !empty( $classes ) )
		echo '<div class="' . join( ' ', $classes ) . '">';

	echo '<main class="site-main" role="main">';
	tha_content_top();
	tha_content_loop();
	tha_content_bottom();
	echo '</main>';

	if( !empty( $classes ) )
		echo '</div>';

	get_sidebar();

tha_content_after();

get_sidebar();
get_footer();
