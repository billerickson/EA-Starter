<?php
/**
 * Loop
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

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

			$partial = apply_filters( 'ea_loop_partial', is_singular() ? 'content' : 'archive' );
			$context = apply_filters( 'ea_loop_partial_context', is_search() ? 'search' : get_post_type() );
			get_template_part( 'partials/' . $partial, $context );

			tha_entry_after();

		endwhile;

		tha_content_while_after();

	else :

		tha_entry_before();
		$context = apply_filters( 'ea_empty_loop_partial_context', 'none' );
		get_template_part( 'partials/archive', $context );
		tha_entry_after();

	endif;

}
add_action( 'tha_content_loop', 'ea_default_loop' );

/**
 * Entry Title
 *
 */
function ea_entry_title() {
	echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
}
add_action( 'tha_entry_top', 'ea_entry_title' );

/**
 * Remove entry-title if h1 block used
 * @link https://www.billerickson.net/building-a-header-block-in-wordpress/
 */
function be_remove_entry_title() {

	if( ! ( is_singular() && function_exists( 'parse_blocks' ) ) )
		return;

	global $post;
	$blocks = parse_blocks( $post->post_content );
	$has_h1 = be_has_h1_block( $blocks );

	if( $has_h1 ) {
		remove_action( 'tha_entry_top', 'ea_breadcrumbs', 8 );
		remove_action( 'tha_entry_top', 'ea_entry_category', 8 );
		remove_action( 'tha_entry_top', 'ea_entry_title' );
		remove_action( 'tha_entry_top', 'ea_entry_author', 12 );
		remove_action( 'tha_entry_top', 'ea_entry_header_share', 13 );
	}
}
add_action( 'tha_entry_before', 'be_remove_entry_title' );

/**
 * Recursively searches content for h1 blocks.
 *
 * @link https://www.billerickson.net/building-a-header-block-in-wordpress/
 *
 * @param array $blocks
 * @return bool
 */
function be_has_h1_block( $blocks = array() ) {
	foreach ( $blocks as $block ) {

		if( ! isset( $block['blockName'] ) )
			continue;

		// Custom header block
		if( 'acf/header' === $block['blockName'] ) {
			return true;

		// Heading block
		} elseif( 'core/heading' === $block['blockName'] && isset( $block['attrs']['level'] ) && 1 === $block['attrs']['level'] ) {
			return true;

		// Scan inner blocks for headings
		} elseif( isset( $block['innerBlocks'] ) && !empty( $block['innerBlocks'] ) ) {
			$inner_h1 = be_has_h1_block( $block['innerBlocks'] );
			if( $inner_h1 )
				return true;
		}
	}

	return false;
}

/**
 * Post Comments
 *
 */
function ea_comments() {

	if ( is_single() && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}

}
add_action( 'tha_content_while_after', 'ea_comments' );
