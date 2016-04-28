<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

$layout = ea_page_layout();
if( ! in_array( $layout, array( 'content-sidebar', 'sidebar-content' ) ) )
	return;

$sidebar = 'primary-sidebar';
if ( ! is_active_sidebar( $sidebar ) )
	return;
	
?>

<?php tha_sidebars_before(); ?>
<aside class="widget-area" role="complementary">
	<?php tha_sidebar_top(); ?>
	<?php dynamic_sidebar( $sidebar ); ?>
	<?php tha_sidebar_bottom(); ?>
</aside><!-- #secondary -->
<?php tha_sidebars_after(); ?>
