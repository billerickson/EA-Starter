<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

get_header();

tha_content_before();
echo '<div class="content-area">';

	$classes = apply_filters( 'ea_site_main_class', array( 'col-md-8',  'col-md-offset-2' ) );
	$classes[] = 'site-main';
	echo '<main class="' . implode( ' ', $classes ) . '" role="main">';
	tha_content_top();
	tha_content_loop();
	tha_content_bottom();
	echo '</main>';

echo '</div>';
tha_content_after();

get_sidebar();
get_footer();
