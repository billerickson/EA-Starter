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
 * Body Classes
 *
 */
function ea_body_classes( $classes ) {

	// Page Layout
	$classes[] = ea_page_layout();
	
	// Blog Archive
	if( is_home() || is_archive() || is_search() )
		$classes[] = 'blog-archive';
	
	return $classes;
}
add_filter( 'body_class', 'ea_body_classes' );

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
 * Archive Header 
 *
 */
function ea_archive_header() {

	$title = $description = false;
	
	if( is_search() )
		$title = 'Search Results for: <em>' . get_search_query() . '</em>';
	if( is_archive() ) {
		$title = get_the_archive_title();
		$description = get_the_archive_description();
	}
	
	if( empty( $title ) && empty( $description ) )
		return;

	echo '<header class="archive-intro">';
	if( ! empty( $title ) )
		echo '<h1 class="archive-title">' . $title . '</h1>';
	if( ! empty( $description ) )
		echo '<div class="archive-description">' . apply_filters( 'ea_the_content', $description ) . '</div>';
	echo '</header>';

}
add_action( 'tha_content_while_before', 'ea_archive_header' );

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

	$entry_meta = '';

	if( 'post' == get_post_type() )  {

		$author = 'By <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" class="entry-author">' . get_the_author() . '</a> ';
		$posted_on = 'on <time class="entry-date" datetime="' . get_the_time( 'U' ) . '">' . get_the_date() . '</time> ';
		$comments  = 'with <a href="' . get_comments_link() . '" class="entry-comments"> ' . get_comments_number() . ' ' . _n( 'Comment', 'Comments', get_comments_number(), 'ea' ) . '</a>';
		$entry_meta = $author . $posted_on . $comments;

	}

	$entry_meta = apply_filters( 'ea_entry_meta', $entry_meta );
	
	if( $entry_meta )
		echo '<div class="entry-meta">' . $entry_meta . '</div>';

}
add_action( 'tha_entry_content_before', 'ea_entry_meta' );

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
			$output .= '<span class="entry-categories">' . esc_html__( 'Posted in', 'ea' ) . $categories_list . '</span>';
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'ea' ) );
		if ( $tags_list ) {
			$output .= '<span class="entry-tags">' . esc_html__( 'Tagged', 'ea' ) . $tags_list . '</span>';
		}
	}

	echo apply_filters( 'ea_entry_footer', $output );
}
add_action( 'tha_entry_content_after', 'ea_entry_footer' );

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