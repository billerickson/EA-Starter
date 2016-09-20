<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

// h1 front page
add_filter( 'ea_h1_site_title', '__return_true' );

// Build the page
require get_template_directory() . '/index.php';
