<?php
/**
 * Kauffman functions and definitions
 *
 * @package Kauffman
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kauffmansetup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kauffmansetup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kauffman, use a find and replace
	 * to change 'kauffman' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kauffman', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kauffman' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kauffmancustom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // kauffmansetup
add_action( 'after_setup_theme', 'kauffmansetup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kauffmanwidgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kauffman' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kauffmanwidgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kauffmanscripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/public/styles/bootstrap/bootstrap.css', array(), '0.0.1','all' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/public/styles/bootstrap/bootstrap-theme.css', array(), '0.0.1','all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/public/styles/font-awesome.min.css', array(), '0.0.1','all' );
	wp_enqueue_style( 'kauffman-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/public/js/jquery-1.11.2.min.js', array(), '20120206', true );

	wp_enqueue_script( 'kauffman-navigation', get_template_directory_uri() . '/public/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'kauffman-boostrap', get_template_directory_uri() . '/public/js/bootstrap.js', array(), '20120206', true );
	wp_enqueue_script( 'kauffman-skip-link-focus-fix', get_template_directory_uri() . '/public/js/skip-link-focus-fix.js', array(), '20130115', true );
}
add_action( 'wp_enqueue_scripts', 'kauffmanscripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
