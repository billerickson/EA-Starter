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
	<div class="content-area">
		<main class="site-main" role="main">
		<?php tha_content_top(); ?>
		<?php tha_content_loop(); ?>
		<?php tha_content_bottom(); ?>
		</main>
	</div>
	<?php tha_content_after(); ?>

<?php
get_sidebar();
get_footer();
