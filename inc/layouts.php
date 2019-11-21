<?php
/**
 * Sidebar Layouts
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function ea_widgets_init() {

	register_sidebar( ea_widget_area_args( array(
		'name' => esc_html__( 'Primary Sidebar', 'ea-starter' ),
	) ) );

}
add_action( 'widgets_init', 'ea_widgets_init' );

/**
* Layout Body Class
*
*/
function ea_layout_body_class( $classes ) {
	$classes[] = ea_page_layout();
	return $classes;
}
add_filter( 'body_class', 'ea_layout_body_class', 5 );

/**
* Default Widget Area Arguments
*
* @param array $args
* @return array $args
*/
function ea_widget_area_args( $args = array() ) {

	$defaults = array(
		'name'          => '',
		'id'            => '',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	);
	$args = wp_parse_args( $args, $defaults );

	if( !empty( $args['name'] ) && empty( $args['id'] ) )
		$args['id'] = sanitize_title_with_dashes( $args['name'] );

	return $args;

}

/**
 * Layout Options
 *
 */
function ea_page_layout_options() {
	return [
		'content-sidebar',
		'wide-content',
		'full-width-content',
	];
}

/**
* Page Layout
*
*/
function ea_page_layout() {

	$available_layouts = ea_page_layout_options();
	$layout = 'content-sidebar';

	if( is_singular() ) {
		$selected = get_post_meta( get_the_ID(), 'ea_page_layout', true );
		if( !empty( $selected ) && in_array( $selected, $available_layouts ) )
			$layout = $selected;
	}

	$layout = apply_filters( 'ea_page_layout', $layout );
	$layout = in_array( $layout, $available_layouts ) ? $layout : $available_layouts[0];

	return sanitize_title_with_dashes( $layout );
}

/**
* Return Full Width Content
* used when filtering 'ea_page_layout'
*/
function ea_return_full_width_content() {
	return 'full-width-content';
}

/**
* Return Content Sidebar
* used when filtering 'ea_page_layout'
*/
function ea_return_content_sidebar() {
	return 'content-sidebar';
}

/**
* Return Sidebar Content
* used when filtering 'ea_page_layout'
*/
function ea_return_sidebar_content() {
	return 'sidebar-content';
}
