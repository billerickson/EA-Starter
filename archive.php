<?php
/**
 * Archive
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Archive Header
 *
 */
function ea_archive_header() {

	$title = $description = false;

	if( is_home() ) {
		$title = get_the_title( get_option( 'page_for_posts' ) );

	} elseif( is_search() ) {
		$title = 'Search Results for: <em>' . get_search_query() . '</em>';

	} elseif( is_archive() ) {
		$title = get_the_archive_title();
		$description = get_the_archive_description();
	}

	if( empty( $title ) && empty( $description ) )
		return;

	echo '<header class="archive-intro">';
	if( ! empty( $title ) )
		echo '<h1 class="archive-title">' . $title . '</h1>';
	if( ! empty( $description ) )
		echo '<div class="archive-description">' . apply_filters( 'ea_the_content', $description ) . '</div>';
	echo '</header>';

}
add_action( 'tha_content_while_before', 'ea_archive_header' );
