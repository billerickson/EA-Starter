<?php
/**
 * Author Box
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Author archive avatar
 *
 */
function ea_author_archive_avatar() {
	if( ! is_author() || get_query_var( 'paged' ) )
		return;

	echo get_avatar( get_queried_object_id(), 200 );
}
add_action( 'ea_archive_header_before', 'ea_author_archive_avatar' );

/**
 * Author archive introduction
 *
 */
function ea_author_intro() {
	if( ! is_author() || get_query_var( 'paged' ) )
		return;

	echo '<h3 class="has-text-align-center">Recent Articles by ' . get_the_author_meta( 'first_name' ) . '</h3>';
}
add_action( 'ea_archive_header_after', 'ea_author_intro' );

/**
 * Author Box
 *
 */
function ea_author_box() {

	echo '<section class="author-box">';
		echo get_avatar( get_the_author_meta( 'ID' ), 100 );
		echo '<h4 class="author-box-title">About ' . get_the_author() . '</h4>';
		echo '<div class="author-box-content">' . wpautop( get_the_author_meta( 'description' ) ) . '</div>';
	echo '</section>';
}
