<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ea
 */

echo '<article id="post-' . get_the_ID() . '" class="' . join( ' ', get_post_class() ) . '">';

	echo '<header class="entry-header">';
		if( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		// Entry Meta
		$author = 'By <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" class="entry-author">' . get_the_author() . '</a> ';
		$posted_on = 'on <time class="entry-date" datetime="' . get_the_time( 'U' ) . '">' . get_the_date() . '</time> ';
		$comments  = 'with <a href="' . get_comments_link() . '" class="entry-comments"> ' . get_comments_number() . ' ' . _n( 'Comment', 'Comments', get_comments_number(), 'ea' ) . '</a>';
		echo '<div class="entry-meta">' . $author . $posted_on . $comments . '</div>';

		tha_entry_top();
	echo '</header>';

	echo '<div class="entry-content">';
		tha_entry_content_before();

		if( is_singular() ) {

			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ea' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ea' ),
				'after'  => '</div>',
			) );
		} else { 
		
			the_excerpt();
		}
			
		tha_entry_content_after();
	echo '</div>';

	echo '<footer class="entry-footer">';
		tha_entry_bottom();

		// Entry Footer
		$output = '';
		
		$categories_list = get_the_category_list( esc_html__( ', ', 'ea' ) );
		if ( $categories_list ) {
			$output .= '<span class="entry-categories">' . esc_html__( 'Posted in', 'ea' ) . $categories_list . '</span>';
		}
	
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'ea' ) );
		if ( $tags_list ) {
			$output .= '<span class="entry-tags">' . esc_html__( 'Tagged', 'ea' ) . $tags_list . '</span>';
		}
		
		if( $output )
			echo '<p>' . $output . '</p>';

	echo '</footer>';
echo '</article>';
