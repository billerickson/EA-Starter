<?php
/**
 * Navigation
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Header Navigation
 *
 */
function ea_header_navigation() {

	if( has_nav_menu( 'primary' ) ) {
		echo '<nav class="nav-primary nav-menu" role="navigation">';
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
		echo '</nav>';
	}
}
add_action( 'tha_header_bottom', 'ea_header_navigation', 12 );

/**
 * Mobile Menu
 *
 */
function ea_mobile_menu() {
	echo '<nav class="nav-mobile">';
		echo '<button class="mobile-menu-toggle">';
			echo ea_icon( array( 'icon' => 'menu', 'size' => 14, 'class' => 'menu-open' ) );
			echo ea_icon( array( 'icon' => 'close', 'size' => 14, 'class' => 'menu-close' ) );
			echo '<span class="screen-reader-text">Menu</span>';
		echo '</button>';
	echo '</nav>';
}
add_action( 'tha_header_bottom', 'ea_mobile_menu', 11 );

/**
 * Add a dropdown icon to top-level menu items.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 * Add a dropdown icon to top-level menu items
 */
function ea_nav_add_dropdown_icons( $output, $item, $depth, $args ) {

	// Only add class to 'top level' items on the 'primary' menu.
	if ( ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $output;
	}

	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add SVG icon to parent items.
		$icon = ea_icon( array( 'icon' => 'navigate-down', 'size' => 16 ) );

		$output .= sprintf(
			'<span class="submenu-expand" tabindex="-1">%s</span>',
			$icon
		);
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'ea_nav_add_dropdown_icons', 10, 4 );

/**
 * Archive Navigation
 *
 */
function ea_archive_navigation() {

	if( ! is_singular() )
		the_posts_navigation();

}
add_action( 'tha_content_while_after', 'ea_archive_navigation' );

/**
 * (disabled) Archive Paginated Navigation
 *
 */
function ea_archive_paginated_navigation() {

	if( is_singular() )
		return;

    global $wp_query;
    $big = 999999999; // need an unlikely integer

	$navigation = paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $wp_query->max_num_pages,
		'prev_text' => 'Previous',
		'next_text' => 'Next',
	) );

	if( $navigation ) {
    	echo '<nav class="navigation posts-navigation" role="navigation">';
        	echo '<h2 class="screen-reader-text">Posts navigation</h2>';
        	echo '<div class="nav-links">' . $navigation . '</div>';
		echo '</nav>';
	}

}
//add_action( 'tha_content_while_after', 'ea_archive_paginated_navigation' );
