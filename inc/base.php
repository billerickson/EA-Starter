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
function ea_page_layout() {
	
	$available_layouts = array( 'full-width-content', 'content-sidebar', 'sidebar-content' );
	$default_layout = 'full-width-content';
	
	$layout = apply_filters( 'ea_page_layout', $default_layout );
	$layout = in_array( $layout, $available_layouts ) ? $layout : $available_layouts[0];
	
	return sanitize_title_with_dashes( $layout );
}

/**
 * Page Layout Body Class
 *
 */
function ea_page_layout_body_class( $classes ) {
	$classes[] = ea_page_layout();
	return $classes;
}
add_filter( 'body_class', 'ea_page_layout_body_class' );

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
 * Default Loop
 *
 */
function ea_default_loop() {

	if ( have_posts() ) :

		tha_content_while_before();

		/* Start the Loop */
		while ( have_posts() ) : the_post();

			tha_entry_before();
			get_template_part( 'template-parts/content', apply_filters( 'ea_content_template', false ) );
			tha_entry_after(); 
			
		endwhile;

		tha_content_while_after();

	else :

		tha_entry_before();
		get_template_part( 'template-parts/content', 'none' );
		tha_entry_after(); 

	endif;

}
add_action( 'tha_content_loop', 'ea_default_loop' );

/**
 * Content Template Part 
 *
 */
function ea_content_template( $part ) {
	if( is_page() )
		$part = 'page';
	if( is_single() )
		$part = 'post';
	if( is_home() || is_archive() || is_search() )
		$part = 'archive';
	return $part;
}
add_filter( 'ea_content_template', 'ea_content_template' );

/**
 * Entry Meta
 *
 */
function ea_entry_meta() {

	$author = 'By <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" class="entry-author">' . get_the_author() . '</a> ';
	$posted_on = 'on <time class="entry-date" datetime="' . get_the_time( 'U' ) . '">' . get_the_date() . '</time> ';
	$comments  = 'with <a href="' . get_comments_link() . '" class="entry-comments"> ' . get_comments_number() . ' ' . _n( 'Comment', 'Comments', get_comments_number(), 'ea' ) . '</a>';
	$entry_meta = $author . $posted_on . $comments;

	echo apply_filters( 'ea_entry_meta', $entry_meta );

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
 * Post Comments 
 *
 */
function ea_comments() {

	if ( is_singular() && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}

}
add_action( 'tha_content_while_after', 'ea_comments' );