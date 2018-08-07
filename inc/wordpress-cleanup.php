<?php
/**
 * WordPress Cleanup
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

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
 * Dequeue jQuery Migrate
 *
 */
function ea_dequeue_jquery_migrate( &$scripts ){
	if( !is_admin() ) {
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'ea_dequeue_jquery_migrate' );

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
	$remove_classes = array(
		'menu-item-type-custom',
		'menu-item-type-taxonomy',
		'menu-item-object-custom',
		'menu-item-object-category',
	);
	$classes = array_diff( $classes, $remove_classes );
	foreach( $classes as $i => $class ) {
		// Remove class with menu item id
		$id = strtok( $class, 'menu-item-' );
		if( 0 < intval( $id ) )
			unset( $classes[ $i ] );
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'ea_clean_nav_menu_classes', 5 );

/**
 * Clean Post Classes
 *
 */
function ea_clean_post_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;

	// Change hentry to entry, remove if adding microformat support
	$key = array_search( 'hentry', $classes );
	if( false !== $key )
		$classes = array_replace( $classes, array( $key => 'entry' ) );

    $allowed_classes = array(
  		'entry',
  		'type-' . get_post_type(),
   	);

	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'ea_clean_post_classes', 5 );

/**
 * Staff comment class
 *
 */
function ea_staff_comment_class( $classes, $class, $comment_id, $comment, $post_id ) {
	if( empty( $comment->user_id ) )
		return $classes;
	$staff_roles = array( 'comment_manager', 'author', 'editor', 'administrator' );
	$staff_roles = apply_filters( 'ea_staff_roles', $staff_roles );
	$user = get_userdata( $comment->user_id );
	if( !empty( array_intersect( $user->roles, $staff_roles ) ) )
		$classes[] = 'staff';
	return $classes;
}
add_filter( 'comment_class', 'ea_staff_comment_class', 10, 5 );

/**
 * Archive Title, remove prefix
 *
 */
function ea_archive_title_remove_prefix( $title ) {
	$title_pieces = explode( ': ', $title );
	if( count( $title_pieces ) > 1 ) {
		unset( $title_pieces[0] );
		$title = join( ': ', $title_pieces );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'ea_archive_title_remove_prefix' );

/**
 * Excerpt More
 *
 */
function ea_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'ea_excerpt_more' );

/**
 * Posts Navigation as Buttons
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/previous-next-links-as-button
 *
 * @param string $attr, link attributes
 * @return string
 */
function be_pagination_posts_nav( $attr ) {
	$attr .= ' class="button"';
	return $attr;
}
add_filter( 'previous_posts_link_attributes', 'be_pagination_posts_nav' );
add_filter( 'next_posts_link_attributes', 'be_pagination_posts_nav' );
