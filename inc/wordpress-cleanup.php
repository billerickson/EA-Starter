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
 * Header Meta Tags 
 *
 */
function ea_header_meta_tags() {
	echo '<meta charset="' . get_bloginfo( 'charset' ) . '">';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	echo '<link rel="profile" href="http://gmpg.org/xfn/11">';
	echo '<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '">';
}
add_action( 'wp_head', 'ea_header_meta_tags' );

/**
 * Clean Nav Menu Classes
 *
 */
function ea_clean_nav_menu_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;
		
	$allowed_classes = array(
		'menu-item',
		'current-menu-item',
		'current-menu-ancestor',
		'menu-item-has-children',
	);
	
	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'nav_menu_css_class', 'ea_clean_nav_menu_classes' );

/**
 * Clean Post Classes 
 *
 */
function ea_clean_post_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;
		
	$allowed_classes = array(
		'hentry',
		'type-' . get_post_type(),
	);
	
	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'ea_clean_post_classes' );

/**
 * Clean Body Classes
 *
 */
function ea_clean_body_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;
		
	$allowed_classes = array(
		'single',
		'page',
		'single-' . get_post_type(),
		'admin-bar',
		ea_page_layout()
	);
	
	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'body_class', 'ea_clean_body_classes' );