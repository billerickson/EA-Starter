<?php
/**
 * Functions
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/*
BEFORE MODIFYING THIS THEME:
Please read the instructions here (private repo): https://github.com/billerickson/EA-Starter/wiki
Devs, contact me if you need access
*/

require get_template_directory() . '/inc/tha-theme-hooks.php';
require get_template_directory() . '/inc/wordpress-cleanup.php';
require get_template_directory() . '/inc/login-logo.php';
require get_template_directory() . '/inc/helper-functions.php';
require get_template_directory() . '/inc/navigation.php';
//require get_template_directory() . '/inc/sidebar-layouts.php';
require get_template_directory() . '/inc/loop.php';
require get_template_directory() . '/inc/tinymce.php';

/**
 * Enqueue scripts and styles.
 */
function ea_scripts() {

	wp_enqueue_style( 'ea-fonts', ea_theme_fonts_url() );
	wp_enqueue_style( 'ea-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );
	wp_enqueue_script( 'ea-global', get_stylesheet_directory_uri() . '/assets/js/global-min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/global-min.js' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Move jQuery to footer
	if( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_enqueue_script( 'jquery' );
	}
}
add_action( 'wp_enqueue_scripts', 'ea_scripts' );

/**
 * Gutenberg scripts and styles
 *
 */
function ea_gutenberg_scripts() {
	wp_enqueue_style( 'ea-fonts', ea_theme_fonts_url() );
	wp_enqueue_style( 'ea', get_stylesheet_directory_uri() . '/assets/css/gutenberg.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/gutenberg.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'ea_gutenberg_scripts' );

/**
 * Theme Fonts URL
 *
 */
function ea_theme_fonts_url() {
	$font_families = apply_filters( 'ea_theme_fonts', array( 'Source+Sans+Pro:400,400i,700,700i' ) );
	$query_args = array(
		'family' => implode( '|', $font_families ),
		'subset' => 'latin,latin-ext',
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	return esc_url_raw( $fonts_url );
}

if ( ! function_exists( 'ea_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ea_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ea, use a find and replace
	 * to change 'ea' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ea', get_template_directory() . '/languages' );

	// Structural Wraps
	add_theme_support( 'ea-structural-wraps', array( 'header', 'site-inner', 'footer' ) );

	// Editor Styles
	add_editor_style( 'assets/css/editor-style.css' );

	// Admin Bar Styling
	add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 */
	 $GLOBALS['content_width'] = apply_filters( 'ea_content_width', 1024 );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ea' ),
		'mobile'  => esc_html__( 'Mobile Menu', 'ea' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Gutenberg

	// -- Wide Images
	//add_theme_support( 'align-wide' );

	// -- Editor Font Styles
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'small', 'ea_genesis_child' ),
			'shortName' => __( 'S', 'ea_genesis_child' ),
			'size'      => 12,
			'slug'      => 'small'
		),
		array(
			'name'      => __( 'regular', 'ea_genesis_child' ),
			'shortName' => __( 'M', 'ea_genesis_child' ),
			'size'      => 16,
			'slug'      => 'regular'
		),
		array(
			'name'      => __( 'large', 'ea_genesis_child' ),
			'shortName' => __( 'L', 'ea_genesis_child' ),
			'size'      => 20,
			'slug'      => 'large'
		),
/*
		array(
			'name'      => __( 'larger', 'ea_genesis_child' ),
			'shortName' => __( 'XL', 'ea_genesis_child' ),
			'size'      => 24,
			'slug'      => 'larger'
		)
*/
	) );

	// -- Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );

	// -- Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Light Grey', 'ea_genesis_child' ),
			'slug'  => 'light-gray',
			'color'	=> '#f5f5f5',
		),
		array(
			'name'  => __( 'Medium Grey', 'ea_genesis_child' ),
			'slug'  => 'medium-gray',
			'color' => '#9E9E9E',
		),
		array(
			'name'  => __( 'Dark Grey', 'ea_genesis_child' ),
			'slug'  => 'dark-gray',
			'color' => '#424242',
	       ),
	) );

}
endif;
add_action( 'after_setup_theme', 'ea_setup' );

/**
 * Template Hierarchy
 *
 */
function ea_template_hierarchy( $template ) {

	if( is_home() || is_search() )
		$template = get_query_template( 'archive' );
	return $template;
}
add_filter( 'template_include', 'ea_template_hierarchy' );
