<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

$layout = ea_page_layout();
if( ! in_array( $layout, array( 'content-sidebar', 'sidebar-content' ) ) )
	return;

$sidebar = apply_filters( 'ea_sidebar', 'primary-sidebar' );
if ( ! is_active_sidebar( $sidebar ) )
	return;

tha_sidebars_before();
echo '<aside class="widget-area" role="complementary">';
	tha_sidebar_top();
	dynamic_sidebar( $sidebar );
	tha_sidebar_bottom();
echo '</aside>';
tha_sidebars_after();
