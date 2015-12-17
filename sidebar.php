<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ea
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php tha_sidebars_before(); ?>
<aside id="secondary" class="widget-area" role="complementary">
	<?php tha_sidebar_top(); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php tha_sidebar_bottom(); ?>
</aside><!-- #secondary -->
<?php tha_sidebars_after(); ?>