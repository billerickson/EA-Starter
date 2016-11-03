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
  * Dont Update the Theme
  *
  * If there is a theme in the repo with the same name, this prevents WP from prompting an update.
  *
  * @since  1.0.0
  * @author Bill Erickson
  * @link   http://www.billerickson.net/excluding-theme-from-updates
  * @param  array $r Existing request arguments
  * @param  string $url Request URL
  * @return array Amended request arguments
  */
 function ea_dont_update_theme( $r, $url ) {
 	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) )
  		return $r; // Not a theme update request. Bail immediately.
  	$themes = json_decode( $r['body']['themes'] );
  	$child = get_option( 'stylesheet' );
 	unset( $themes->themes->$child );
  	$r['body']['themes'] = json_encode( $themes );
  	return $r;
  }
 add_filter( 'http_request_args', 'ea_dont_update_theme', 5, 2 );

 /**
  * Set the content width in pixels, based on the theme's design and stylesheet.
  *
  * Priority 0 to make it available to lower priority callbacks.
  *
  * @global int $content_width
  */
 function ea_content_width() {
 	$GLOBALS['content_width'] = apply_filters( 'ea_content_width', 640 );
 }
 add_action( 'after_setup_theme', 'ea_content_width', 0 );

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
add_filter( 'nav_menu_css_class', 'ea_clean_nav_menu_classes', 5 );

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
      'one-half',
      'one-third',
      'two-thirds',
      'one-fourth',
      'two-fourths',
      'three-fourths',
      'one-fifth',
      'two-fifths',
      'three-fifths',
      'four-fifths',
   	);

	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'ea_clean_post_classes', 5 );
