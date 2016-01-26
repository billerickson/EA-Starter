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
 * Page Layout 
 *
 */
function ea_page_layout( $classes ) {
	
	$available_layouts = array( 'full-width-content', 'content-sidebar', 'sidebar-content' );
	$default_layout = 'full-width-content';
	
	$layout = apply_filters( 'ea_page_layout', $default_layout );
	$layout = in_array( $layout, $available_layouts ) ? $layout : $available_layouts[0];
	
	$classes[] = $layout;
	return $classes;
}
add_filter( 'body_class', 'ea_page_layout' );

/**
 * Structural Wraps
 *
 */
function ea_structural_wrap( $context = '', $output = 'open', $echo = true ) {

	$wraps = get_theme_support( 'ea-structural-wraps' );
	
	//* If theme doesn't support structural wraps, bail.
	if ( ! $wraps )
		return;
		
	if ( ! in_array( $context, (array) $wraps[0] ) )
		return '';
		
	//* Save original output param
	$original_output = $output;
	
	switch ( $output ) {
		case 'open':
			$output = '<div class="wrap">';
			break;
		case 'close':
			$output = '</div>';
			break;
	}
	
	$output = apply_filters( "ea_structural_wrap-{$context}", $output, $original_output );
	
	if ( $echo )
		echo $output;
	else
		return $output;
}

/**
 * Content Template Part 
 *
 */
function ea_content_template( $part ) {
	if( is_page() )
		$part = 'page';
	if( is_search() )
		$part = 'search';
	return $part;
}
add_filter( 'ea_content_template', 'ea_content_template' );

/**
 * Entry Meta
 *
 */
function ea_entry_meta() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'ea' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'ea' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo apply_filters( 'ea_entry_meta', '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>' );

}

/**
 * Entry Footer 
 *
 */
function ea_entry_footer() {

	$output = '';
	
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'ea' ) );
		if ( $categories_list ) {
			$output .= '<span class="cat-links">' . esc_html__( 'Posted in', 'ea' ) . $categories_list . '</span>';
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'ea' ) );
		if ( $tags_list ) {
			$output .= '<span class="tags-links">' . esc_html__( 'Tagged', 'ea' ) . $tags_list . '</span>';
		}
	}

	echo apply_filters( 'ea_entry_footer', $output );
}

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
 * Single Post Navigation
 *
 */
function ea_single_navigation() {

	if( is_singular( 'post' ) )
		the_post_navigation();

}
add_action( 'tha_content_while_after', 'ea_single_navigation' );
 
/**
 * Post Comments 
 *
 */
function ea_comments() {

	if ( is_singular() && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}

}
add_action( 'tha_content_while_after', 'ea_comments' );