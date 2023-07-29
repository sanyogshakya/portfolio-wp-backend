<?php
/**
 * Portfolio Sanyog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio_Sanyog
 */

if ( ! defined( '_PORTFOLIO_SANYOG_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_PORTFOLIO_SANYOG', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portfolio_sanyog_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Portfolio Sanyog, use a find and replace
		* to change 'portfolio-sanyog' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'portfolio-sanyog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'portfolio-sanyog' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'portfolio_sanyog_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'portfolio_sanyog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_sanyog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolio_sanyog_content_width', 1440 );
}
add_action( 'after_setup_theme', 'portfolio_sanyog_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function portfolio_sanyog_scripts() {
	wp_enqueue_style( 'portfolio-sanyog-style', get_stylesheet_uri(), array(), _PORTFOLIO_SANYOG );
	wp_style_add_data( 'portfolio-sanyog-style', 'rtl', 'replace' );

	wp_enqueue_script( 'portfolio-sanyog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _PORTFOLIO_SANYOG, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_sanyog_scripts' );

/**
 * Register ACF options page
 */
function portfolio_sanyog_register_acf_options_pages() {

    // check function exists
    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }

    // register options page
	$portfolio_sanyog_options_page = acf_add_options_page(
		array(
			'page_title'    	=> 'Theme Settings',
			'menu_title'    	=> 'Theme Settings',
			'menu_slug'     	=> 'theme-settings',
			'capability'		=> 'edit_posts',
			'show_in_graphql'	=> true,
		)
	);
}
add_action( 'acf/init', 'portfolio_sanyog_register_acf_options_pages' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}