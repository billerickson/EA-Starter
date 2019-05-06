<?php
/**
 * Custom Logo
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Custom Logo theme support
 *
 */
function ea_custom_logo_theme_support() {

	add_theme_support(
		'custom-logo', array(
			'height'      => 120,
			'width'       => 700,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
}
add_action( 'after_setup_theme', 'ea_custom_logo_theme_support' );

/**
 * Customizer CSS
 * @see https://gist.github.com/billerickson/2c9a311dfd0d346cffbdfa448eacc924
 */
function ea_customizer_css() {

	$css = false;

	$logo = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' );
	if ( $logo ) {

		$css .= '
		.wp-custom-logo .site-title a {
			background-image: url(' . $logo . ');
		}
		';
	}

	if( $css ) {
		wp_add_inline_style( 'ea-style', $css );
	}

}
add_action( 'wp_enqueue_scripts', 'ea_customizer_css' );
