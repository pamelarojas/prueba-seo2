<?php
/**
 * Delight functions and definitions
 *
 * @package Delight Spa
 */


if ( ! function_exists( 'delight_spa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function delight_spa_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'delight-spa', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('delight-spa-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'delight-spa' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // delight_spa_setup
add_action( 'after_setup_theme', 'delight_spa_setup' );


function delight_spa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'delight-spa' ),
		'description'   => __( 'Appears on blog page sidebar', 'delight-spa' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'delight-spa' ),
		'description'   => __( 'Appears on page sidebar', 'delight-spa' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'delight_spa_widgets_init' );


function delight_spa_scripts() {	
	wp_enqueue_style( 'delight-care-bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'delight-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'delight-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_style( 'delight-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_script( 'delight-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'delight-care_bootstrap', get_template_directory_uri() .'/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'delight-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'delight_spa_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

// URL DEFINES
define('delight_spa_pro_theme_url','http://themesware.com/product/delight-wordpress-theme/');
define('delight_spa_theme_doc','http://themesware.com/documentation/delight-doc/');
define('delight_spa_site_url','http://themesware.com/');