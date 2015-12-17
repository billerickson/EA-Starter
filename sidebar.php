<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

if ( ! is_active_sidebar( 'primary-sidebar' ) ) {
	return;
}
?>

<?php tha_sidebars_before(); ?>
<aside class="widget-area" role="complementary">
	<?php tha_sidebar_top(); ?>
	<?php dynamic_sidebar( 'primary-sidebar' ); ?>
	<?php tha_sidebar_bottom(); ?>
</aside><!-- #secondary -->
<?php tha_sidebars_after(); ?>