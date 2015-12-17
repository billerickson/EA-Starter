<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ea
 */

get_header(); ?>

	<?php tha_content_before(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php tha_content_top(); ?>

		<?php
		if ( have_posts() ) :

			tha_content_while_before();
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				tha_entry_before();
				get_template_part( 'template-parts/content' );
				tha_entry_after(); 
				
			endwhile;

			tha_content_while_after();
			the_posts_navigation();

		else :

			tha_entry_before();
			get_template_part( 'template-parts/content', 'none' );
			tha_entry_after(); 

		endif; ?>

		<?php tha_content_bottom(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php tha_content_after(); ?>

<?php
get_sidebar();
get_footer();
