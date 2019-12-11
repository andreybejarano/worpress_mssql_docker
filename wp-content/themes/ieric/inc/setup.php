<?php 
/**
 * Add theme filters and core-level configurations.
 *
 * @return void
 */


if ( ! function_exists( 'ieric_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ieric_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ieric, use a find and replace
		 * to change 'ieric' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ieric', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ieric' ),
			'menu-2' => esc_html__( 'AccesosDirectos', 'ieric' ),
			'menu-3' => esc_html__( 'Footer1', 'ieric' ),
			'menu-4' => esc_html__( 'Footer2', 'ieric' ),
			'menu-5' => esc_html__( 'Footer3', 'ieric' ),
			'menu-6' => esc_html__( 'Footer4', 'ieric' ),
		) );

	}
endif;


/**
 * Disable admin bar
 */
function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );


/**
 * Remove unnecessary stuff from header
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );



?>