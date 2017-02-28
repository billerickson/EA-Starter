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
 * Default Loop
 *
 */
function ea_default_loop() {

	if ( have_posts() ) :

		tha_content_while_before();

		/* Start the Loop */
		while ( have_posts() ) : the_post();

			tha_entry_before();
      if( is_singular() ) {
				get_template_part( 'partials/content', get_post_type() );
			} else {
				get_template_part( 'partials/archive', get_post_type() );
      }
			tha_entry_after();

		endwhile;

		tha_content_while_after();

	else :

		tha_entry_before();
		get_template_part( 'partials/content', 'none' );
		tha_entry_after();

	endif;

}
add_action( 'tha_content_loop', 'ea_default_loop' );

/**
 * Entry Title
 *
 */
function ea_entry_title() {

    $title = apply_filters( 'ea_entry_title_text', get_the_title() );
    if( $title && is_singular() ) {
        echo '<h1 class="entry-title">' . $title . '</h1>';
    } elseif( $title ) {
        echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $title . '</a></h2>';
    }
}
add_action( 'tha_entry_top', 'ea_entry_title' );

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
