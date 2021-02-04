<?php
/**
 * Single Post
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Entry category in header
add_action( 'tha_entry_top', 'ea_entry_category', 8 );
add_action( 'tha_entry_top', 'ea_entry_author', 12 );
add_action( 'tha_entry_top', 'ea_entry_header_share', 13 );

/**
 * Entry header share
 *
 */
function ea_entry_header_share() {
	do_action( 'ea_entry_header_share' );
}

/**
 * After Entry
 *
 */
function ea_single_after_entry() {
	echo '<div class="after-entry">';

	// Breadcrumbs
	ea_breadcrumbs();

	// Publish date
	echo '<p class="publish-date">Published on ' . get_the_date( 'F j, Y' ) . '</p>';

	// Sharing
	do_action( 'ea_entry_footer_share' );
	
	echo '</div>';

}
add_action( 'tha_content_while_after', 'ea_single_after_entry', 8 );

// Build the page
require get_template_directory() . '/index.php';
