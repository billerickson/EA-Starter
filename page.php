<?php
/**
 * Page
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Breadcrumbs above page title
add_action( 'tha_entry_top', 'ea_breadcrumbs', 8 );

// Build the page
require get_template_directory() . '/index.php';
