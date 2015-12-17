<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

/**
 * Search Title
 *
 */
function ea_search_title() {

	echo '<header class="page-header">
		<h1 class="page-title">Search Results for: <span>' . get_search_query() . '</span></h1>
	</header>';

}
add_filter( 'tha_content_while_before', 'ea_search_title' );

/**
 * Search Content
 *
 */
function ea_search_content( $type ) {
	return 'search';
}
add_filter( 'ea_content_template', 'ea_search_content' );

// Build the page
require get_template_directory() . '/index.php';