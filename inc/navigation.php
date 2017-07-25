<?php
/**
 * Navigation
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Header Navigation
 *
 */
function ea_header_navigation() {

  if( has_nav_menu( 'primary' ) ) {
    echo '<nav class="nav-primary nav-menu" role="navigation">';
    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
    echo '</nav>';
  }

  if( has_nav_menu( 'mobile' ) ) {
    echo '<div class="nav-mobile">';
      echo '<a class="mobile-menu-toggle" href="#"><span class="label">menu</span><i class="icon-menu"></i></a>';
    echo '</div>';
  }
}
add_action( 'tha_header_bottom', 'ea_header_navigation' );

/**
 * Mobile Menu
 *
 */
function ea_mobile_menu() {
  if( has_nav_menu( 'mobile' ) ) {
    echo '<div id="sidr-mobile-menu" class="sidr right">';
      echo '<a class="sidr-menu-close" href="#">X</a>';
      wp_nav_menu( array( 'theme_location' => 'mobile' ) );
    echo '</div>';
  }
}
add_action( 'wp_footer', 'ea_mobile_menu' );
