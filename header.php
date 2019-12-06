<?php
/**
 * Site Header
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '<!DOCTYPE html>';
tha_html_before();
echo '<html ' . get_language_attributes() . '>';

echo '<head>';
	tha_head_top();
	wp_head();
	tha_head_bottom();
echo '</head>';

echo '<body class="' . join( ' ', get_body_class() ) . '">';
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
tha_body_top();
echo '<div class="site-container">';
	echo '<a class="skip-link screen-reader-text" href="#main-content">' . esc_html__( 'Skip to content', 'ea-starter' ) . '</a>';

	tha_header_before();
	echo '<header class="site-header" role="banner"><div class="wrap">';
		tha_header_top();

		echo '<div class="title-area">';
		$logo_tag = ( apply_filters( 'ea_h1_site_title', false ) || ( is_front_page() && is_home() ) ) ? 'h1' : 'p';
		echo '<' . $logo_tag . ' class="site-title"><a href="' . esc_url( home_url() ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></' . $logo_tag . '>';
		if( apply_filters( 'ea_header_site_description', false ) )
		 	echo '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>';
		echo '</div>';

		tha_header_bottom();
	echo '</div></header>';
	tha_header_after();
	echo '<div class="site-inner" id="main-content">';
