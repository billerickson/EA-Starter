<?php
/**
 * Site Footer
 *
 * @package      GrownAndFlown2020
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Register footer widget areas
 *
 */
function ea_register_footer_widget_areas() {

	for( $i = 1; $i <=3; $i++ ) {

		register_sidebar( ea_widget_area_args( array(
			'name' => esc_html__( 'Footer ' . $i, 'ea-starter' ),
		) ) );
	}

}
add_action( 'widgets_init', 'ea_register_footer_widget_areas' );


/**
 * Footer Widget Areas
 *
 */
function ea_site_footer_widgets() {
	echo '<div class="footer-widgets"><div class="wrap">';
	for( $i = 1; $i < 4; $i++ ) {
		dynamic_sidebar( 'footer-' . $i );
	}
	echo '</div></div>';
}
add_action( 'tha_footer_before', 'ea_site_footer_widgets' );

/**
 * Site Footer
 *
 */
function ea_site_footer() {
	echo '<div class="footer-left">';
		echo '<p class="copyright">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '®. All Rights Reserved.</p>';
		echo '<p class="footer-links"><a href="' . home_url( 'privacy-policy' ) . '">Privacy Policy</a> <a href="' . home_url( 'terms' ) . '">Terms</a></p>';
		echo '<p class="cafemedia">An Elite Cafemedia Food Publisher</p>';
	echo '</div>';
	echo '<a class="backtotop" href="#main-content">Back to top' . ea_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}
add_action( 'tha_footer_top', 'ea_site_footer' );
