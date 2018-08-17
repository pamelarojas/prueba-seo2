<?php
/**
 * Spa and Salon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spa_and_Salon
 */

//define theme version
if ( !defined( 'SPA_AND_SALON_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'SPA_AND_SALON_THEME_VERSION', $theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'spa_and_salon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spa_and_salon_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Spa and Salon, use a find and replace
	 * to change 'spa-and-salon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'spa-and-salon', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'spa-and-salon' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
        'status',
        'audio', 
        'chat'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'spa_and_salon_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


	/* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );

	// Custom Image Size
	set_post_thumbnail_size( 571, 373, true );
	add_image_size( 'spa-and-salon-banner', 1920, 967, true );
    add_image_size( 'spa-and-salon-blog', 780, 437, true );
    add_image_size( 'spa-and-salon-with-sidebar', 846, 515, true );
    add_image_size( 'spa-and-salon-without-sidebar', 1170, 610, true );
    add_image_size( 'spa-and-salon-featured-block', 380, 226, true );
    add_image_size( 'spa-and-salon-recent-post', 65, 65, true );
    add_image_size( 'spa-and-salon-testmonial', 380, 481, true);
    add_image_size( 'spa-and-salon-testmonial-thumb', 160, 159, true);
    add_image_size( 'spa-and-salon-service', 380, 225, true);
    add_image_size( 'spa-and-salon-welcome-note',547, 293, true );
    add_image_size( 'spa-and-salon-schema',600, 60, true );

}
endif;
add_action( 'after_setup_theme', 'spa_and_salon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spa_and_salon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spa_and_salon_content_width', 780 );
}
add_action( 'after_setup_theme', 'spa_and_salon_content_width', 0 );


/**
* Adjust content_width value according to template.
*
* @return void
*/
function spa_and_salon_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = spa_and_salon_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1180;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1180;
	}

}
add_action( 'template_redirect', 'spa_and_salon_template_redirect_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spa_and_salon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'spa-and-salon' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'spa-and-salon' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'spa-and-salon' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'spa-and-salon' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'spa_and_salon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spa_and_salon_scripts() {

	// Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	$query_args = array(
		'family' => 'Marcellus|Lato:400,700',
		);

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css' . $build . '/font-awesome' . $suffix . '.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css' . $build . '/slick' . $suffix . '.css' );
    wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/css' . $build . '/meanmenu' . $suffix . '.css' );
    wp_enqueue_style( 'mcustomscrollbar', get_template_directory_uri().'/css' . $build . '/jquery.mCustomScrollbar' . $suffix . '.css' );
	wp_enqueue_style( 'spa-and-salon-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'spa-and-salon-style', get_stylesheet_uri(), array(), SPA_AND_SALON_THEME_VERSION );

	if( spa_and_salon_woocommerce_activated() ) 
    wp_enqueue_style( 'spa-and-salon-woocommerce-style', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', array('spa-and-salon-style'), SPA_AND_SALON_THEME_VERSION );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js' . $build . '/slick' . $suffix . '.js', array('jquery'), '2.6.0', true );
    wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/js' . $build . '/jquery.meanmenu' . $suffix . '.js', array('jquery'), SPA_AND_SALON_THEME_VERSION, true );
    wp_enqueue_script( 'equal-height', get_template_directory_uri() . '/js' . $build . '/equal-height' . $suffix . '.js', array('jquery'), SPA_AND_SALON_THEME_VERSION, true );
    wp_enqueue_script( 'mcustomscrollbar', get_template_directory_uri(). '/js' . $build . '/jquery.mCustomScrollbar' . $suffix . '.js', array('jquery'), SPA_AND_SALON_THEME_VERSION, true  );
	wp_enqueue_script( 'spa-and-salon-js', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), SPA_AND_SALON_THEME_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spa_and_salon_scripts' );

if ( is_admin() ) : // Load only if we are viewing an admin page
function spa_and_salon_admin_scripts() {
	wp_enqueue_style( 'spa-and-salon-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );
    
    wp_enqueue_script( 'spa-and-salon-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );    
	
}
add_action( 'admin_enqueue_scripts', 'spa_and_salon_admin_scripts' );
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extra.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Featured Post Widget
 */
require get_template_directory() . '/inc/widget-featured-post.php';

/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Popular Post Widget
 */
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 * Social Links Widget
 */
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/info.php';

/**
 * Load plugin for right and no sidebar
 */
require get_template_directory() . '/inc/woocommerce-functions.php';

/**
* Recommended Plugins
*/
require_once get_template_directory() . '/inc/tgmpa/recommended-plugins.php';