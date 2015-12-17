<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
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
