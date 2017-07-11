<?php
/**
 * Front Page
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// h1 front page
add_filter( 'ea_h1_site_title', '__return_true' );

// Build the page
require get_template_directory() . '/index.php';
