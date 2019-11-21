<?php
/**
 * PWA Offline
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Offline Content
 *
 */
function ea_pwa_offline_content() {
	echo '<h1>Oops, it looks like you\'re offline</h1>';
	if( function_exists( 'wp_service_worker_error_message_placeholder' ) )
		wp_service_worker_error_message_placeholder();

}
add_action( 'tha_content_loop', 'ea_pwa_offline_content' );
remove_action( 'tha_content_loop', 'ea_default_loop' );

// Build the page
require get_template_directory() . '/index.php';
