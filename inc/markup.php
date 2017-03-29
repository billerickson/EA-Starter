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
  * Site Inner Markup Open
  *
  */
function ea_site_inner_markup_open() {
	echo '<div class="site-inner" id="main-content">';
}
add_action( 'tha_header_after', 'ea_site_inner_markup_open', 40 );

/**
 * Landing page site inner markup open
 *
 */
function ea_landing_site_inner_markup_open() {
    echo '<div class="site-inner" id="main-content">';
}

 /**
  * Content Area Markup Open
  *
  */
 function ea_content_area_markup_open() {
 	echo '<div class="content-area container-fluid">';
 	if( apply_filters( 'ea_content_area_has_row', true ) )
 		echo '<div class="row">';
 }
 add_action( 'tha_content_before', 'ea_content_area_markup_open', 40 );

 /**
  * Content Area Markup Close
  *
  */
 function ea_content_area_markup_close() {
 	echo '</div>';
 	if( apply_filters( 'ea_content_area_has_row', true ) )
 		echo '</div>';
 }
 add_action( 'tha_content_after', 'ea_content_area_markup_close', 1 );

 /**
  * Site Inner Markup Close
  *
  */
 function ea_site_inner_markup_close() {
 	echo '</div>';
 }
 add_action( 'tha_content_after', 'ea_site_inner_markup_close', 1 );
