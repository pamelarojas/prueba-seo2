<?php
/**
 * BeautySpa functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since BeautySpa 1.0
 */
 
require( get_template_directory() . '/comment-function.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/pro-button/class-customize.php' );

/* Theme Setup*/
add_action( 'after_setup_theme', 'beautyspa_theme_setup' ); 	
function beautyspa_theme_setup(){	
	global $content_width;
	//content width
	if ( ! isset( $content_width ) ) $content_width = 630; //px

		
	add_theme_support( 'title-tag' );
	
	//supports custom logo
	add_theme_support( 'custom-logo', array(
						'height'      => 110,
						'width'       => 250,
						'flex-height' => true,
						'flex-width'  => true,
					) );

	
	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );


				
	add_theme_support( 'post-thumbnails' ); //supports featured image
	
	//supports custom header
	add_theme_support( 'automatic-feed-links' );
	$args = array(
		'width'         => 1200,
		'height'        => 200,
		'uploads'       => true,
		'flex-width'    => false,
		'default-repeat'         => '',
		'flex-height' => false,
		'default-image' => get_template_directory_uri() . '/images/3.jpg',
		);
	add_theme_support( 'custom-header', $args );
	
	//register theme Menu
	register_nav_menu( 'beautyspa-menu', esc_html__( 'Primary Menu','beautyspa' ) );
	
	add_theme_support( 'customize-selective-refresh-widgets' );
	
}

add_action('wp_enqueue_scripts', 'beautyspa_enqueue_style');
function beautyspa_enqueue_style(){
    //css
    wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css');
    wp_enqueue_style('fontAwesome', get_template_directory_uri(). '/css/font-awesome.min.css');            
    wp_enqueue_style('beautyspa-color', get_template_directory_uri(). '/css/color/default.css');
    wp_enqueue_style('photobox', get_template_directory_uri(). '/css/photobox.css');
    wp_enqueue_style('swiper', get_template_directory_uri(). '/css/swiper.css');
    wp_enqueue_style('beautyspa-main-style', get_template_directory_uri(). '/style.css');
    wp_enqueue_style('beautyspa-media-style', get_template_directory_uri(). '/css/media-query.css');
    wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css?family=Tinos');
    //js 
    wp_enqueue_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.js', array('jquery'));
    wp_enqueue_script('photobox', get_template_directory_uri(). '/js/jquery.photobox.js','1.9.9');
    wp_enqueue_script('parallax', get_template_directory_uri(). '/js/jquery.parallax-1.1.3.js');
    wp_enqueue_script('swiper', get_template_directory_uri(). '/js/swiper.js');
    wp_enqueue_script('beautyspa-custom-script', get_template_directory_uri(). '/js/custom-script.js');
    if ( is_singular() ){ 
        wp_enqueue_script( "comment-reply" );
    }
}

/***** Add Custom Image Sizes *****/

if (!function_exists('beautyspa_image_sizes')) {
	function beautyspa_image_sizes() {
		add_image_size('beautyspa-post-thumb', 800, 400, true);
		add_image_size('beautyspa-home-slider',1240,600,true);	
		add_image_size('beautyspa-home-thumbnail',600,400,true);
	}
}
add_action('after_setup_theme', 'beautyspa_image_sizes');

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style('css/editor-style.css');






function beautyspa_default_settings(){
	$beauty_theme_options=array(
			//'_frontpage' =>'',
			);
			
	return apply_filters( 'beauty_options', $beauty_theme_options );
	
}
	function beautyspa_options() {
    // Options API
    return wp_parse_args( 
        get_theme_mod( 'beauty_options' ), beautyspa_default_settings() 
    );    
}

require( get_template_directory() . '/customizer.php' );

require( get_template_directory() . '/inc/custom-header.php' );
require( get_template_directory() . '/inc/wp-bootstrap-navwalker.php' );

if (is_admin()) {
	require_once('core/admin/hompage-set.php');
	/*require_once('core/admin/pro-themes.php');*/
}

/****--- Navigation for Single ---***/
	
	

add_filter ('the_content', 'beautyspa_pagination_after_post',1);
function beautyspa_pagination_after_post($content) {
  if(is_single()) {

     $content.= '<div class="pagination">' . wp_link_pages('before=&after=&next_or_number=next&nextpagelink=Next&previouspagelink=Previous&echo=0') . '</div>';
  }
  return $content;
}
add_action( 'widgets_init', 'beautyspa_widgets_init');
	function beautyspa_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => esc_html__( 'Sidebar Widget Area', 'beautyspa' ),
			'id' => 'sidebar-primary',
			'description' => esc_html__( 'The primary widget area', 'beautyspa' ),
			'before_widget' => '<div class="row sidebar-widget sideline">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area', 'beautyspa' ),
			'id' => 'footer-widget-area',
			'description' => esc_html__( 'footer widget area', 'beautyspa' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 widget-footer">',
			'after_widget' => '</div>',
			'before_title' => '<div class="col-md-12 footer-heading"><h3>',
			'after_title' => '</h3></div>',
		) );             
	}

/*===================================================================================
	* Add Class Gravtar
	* =================================================================================*/
	add_filter('get_avatar','beautyspa_gravatar_class');

	function beautyspa_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive", $class);
    return $class;
	}
	/****--- Navigation ---***/

	/* breadcrumb trail details -
	Contributors: greenshady
	Donate link: https://themehybrid.com/donate
	Tags: breadcrumbs, navigation, menu
	Requires at least: 4.7
	Tested up to: 4.8.2
	Requires PHP: 5.2
	Stable tag: 1.1.0
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.htm */
	
function beautyspa_breadcrumb_trail( $args = array() ) {

	$breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

	if ( ! is_object( $breadcrumb ) )
		$breadcrumb = new beautyspa_Breadcrumb_Trail( $args );

	return $breadcrumb->trail();
}


class beautyspa_Breadcrumb_Trail {

	
	public $items = array();

	
	public $args = array();

	public $labels = array();

	
	public $post_taxonomy = array();

	
	public function __toString() {
		return $this->trail();
	}

	public function __construct( $args = array() ) {

		$defaults = array(
			'container'       => 'nav',
			'before'          => '',
			'after'           => '',
			'browse_tag'      => 'h2',
			'list_tag'        => 'ul',
			'item_tag'        => 'li',
			'show_on_front'   => true,
			'network'         => false,
			'show_title'      => true,
			'show_browse'     => true,
			'labels'          => array(),
			'post_taxonomy'   => array(),
			'echo'            => true
		);

		// Parse the arguments with the deaults.
		$this->args = apply_filters( 'breadcrumb_trail_args', wp_parse_args( $args, $defaults ) );

		// Set the labels and post taxonomy properties.
		$this->set_labels();
		$this->set_post_taxonomy();

		// Let's find some items to add to the trail!
		$this->add_items();
	}

	/* ====== Public Methods ====== */

	/**
	 * Formats the HTML output for the breadcrumb trail.
	 *
	 * @since  0.6.0
	 * @access public
	 * @return string
	 */
	public function trail() {

		// Set up variables that we'll need.
		$breadcrumb    = '';
		$item_count    = count( $this->items );
		$item_position = 0;

		// Connect the breadcrumb trail if there are items in the trail.
		if ( 0 < $item_count ) {

			/* Add 'browse' label if it should be shown.
			if ( true === $this->args['show_browse'] ) {

				$breadcrumb .= sprintf(
					'<%1$s class="trail-browse">%2$s</%1$s>',
					tag_escape( $this->args['browse_tag'] ),
					$this->labels['browse']
				);
			}
			*/
			// Open the unordered list.
			$breadcrumb .= sprintf(
				'<%s class="trail-items" itemscope itemtype="http://schema.org/BreadcrumbList">',
				tag_escape( $this->args['list_tag'] )
			);

			// Add the number of items and item list order schema.
			$breadcrumb .= sprintf( '<meta name="numberOfItems" content="%d" />', absint( $item_count ) );
			$breadcrumb .= '<meta name="itemListOrder" content="Ascending" />';

			// Loop through the items and add them to the list.
			foreach ( $this->items as $item ) {

				// Iterate the item position.
				++$item_position;

				// Check if the item is linked.
				preg_match( '/(<a.*?>)(.*?)(<\/a>)/i', $item, $matches );

				// Wrap the item text with appropriate itemprop.
				$item = ! empty( $matches ) ? sprintf( '%s<span itemprop="name">%s</span>%s', $matches[1], $matches[2], $matches[3] ) : sprintf( '<span itemprop="name">%s</span>', $item );

				// Wrap the item with its itemprop.
				$item = ! empty( $matches )
					? preg_replace( '/(<a.*?)([\'"])>/i', '$1$2 itemprop=$2item$2>', $item )
					: sprintf( '<span itemprop="item">%s</span>', $item );

				// Add list item classes.
				$item_class = 'trail-item';

				if ( 1 === $item_position && 1 < $item_count )
					$item_class .= ' trail-begin';

				elseif ( $item_count === $item_position )
					$item_class .= ' trail-end';

				// Create list item attributes.
				$attributes = 'itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="' . $item_class . '"';

				// Build the meta position HTML.
				$meta = sprintf( '<meta itemprop="position" content="%s" />', absint( $item_position ) );

				// Build the list item.
				$breadcrumb .= sprintf( '<%1$s %2$s>%3$s%4$s</%1$s>', tag_escape( $this->args['item_tag'] ),$attributes, $item, $meta );
			}

			// Close the unordered list.
			$breadcrumb .= sprintf( '</%s>', tag_escape( $this->args['list_tag'] ) );

			// Wrap the breadcrumb trail.
			$breadcrumb = sprintf(
				'<%1$s role="navigation" aria-label="%2$s" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">%3$s%4$s%5$s</%1$s>',
				tag_escape( $this->args['container'] ),
				esc_attr( $this->labels['aria_label'] ),
				$this->args['before'],
				$breadcrumb,
				$this->args['after']
			);
		}

		// Allow developers to filter the breadcrumb trail HTML.
		$breadcrumb = apply_filters( 'breadcrumb_trail', $breadcrumb, $this->args );

		if ( false === $this->args['echo'] )
			return $breadcrumb;

		echo wp_kses_post($breadcrumb);
	}

	/* ====== Protected Methods ====== */

	/**
	 * Sets the labels property.  Parses the inputted labels array with the defaults.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function set_labels() {

		$defaults = array(
			//'browse'              => esc_html__( 'Browse:',                               'beautyspa' ),
			'aria_label'          => esc_attr_x( 'Breadcrumbs', 'breadcrumbs aria label', 'beautyspa' ),
			'home'                => esc_html__( 'Home',                                  'beautyspa' ),
			'error_404'           => esc_html__( '404 Not Found',                         'beautyspa' ),
			'archives'            => esc_html__( 'Archives',                              'beautyspa' ),
			// Translators: %s is the search query.
			'search'              => esc_html__( 'Search results for: %s',                'beautyspa' ),
			// Translators: %s is the page number.
			'paged'               => esc_html__( 'Page %s',                               'beautyspa' ),
			// Translators: %s is the page number.
			'paged_comments'      => esc_html__( 'Comment Page %s',                       'beautyspa' ),
			// Translators: Minute archive title. %s is the minute time format.
			'archive_minute'      => esc_html__( 'Minute %s',                             'beautyspa' ),
			// Translators: Weekly archive title. %s is the week date format.
			'archive_week'        => esc_html__( 'Week %s',                               'beautyspa' ),

			// "%s" is replaced with the translated date/time format.
			'archive_minute_hour' => '%s',
			'archive_hour'        => '%s',
			'archive_day'         => '%s',
			'archive_month'       => '%s',
			'archive_year'        => '%s',
		);

		$this->labels = apply_filters( 'breadcrumb_trail_labels', wp_parse_args( $this->args['labels'], $defaults ) );
	}

	/**
	 * Sets the `$post_taxonomy` property.  This is an array of post types (key) and taxonomies (value).
	 * The taxonomy's terms are shown on the singular post view if set.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function set_post_taxonomy() {

		$defaults = array();

		// If post permalink is set to `%postname%`, use the `category` taxonomy.
		if ( '%postname%' === trim( get_option( 'permalink_structure' ), '/' ) )
			$defaults['post'] = 'category';

		$this->post_taxonomy = apply_filters( 'breadcrumb_trail_post_taxonomy', wp_parse_args( $this->args['post_taxonomy'], $defaults ) );
	}

	/**
	 * Runs through the various WordPress conditional tags to check the current page being viewed.  Once
	 * a condition is met, a specific method is launched to add items to the `$items` array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_items() {

		// If viewing the front page.
		if ( is_front_page() ) {
			$this->add_front_page_items();
		}

		// If not viewing the front page.
		else {

			// Add the network and site home links.
			$this->add_network_home_link();
			$this->add_site_home_link();

			// If viewing the home/blog page.
			if ( is_home() ) {
				$this->add_blog_items();
			}

			// If viewing a single post.
			elseif ( is_singular() ) {
				$this->add_singular_items();
			}

			// If viewing an archive page.
			elseif ( is_archive() ) {

				if ( is_post_type_archive() )
					$this->add_post_type_archive_items();

				elseif ( is_category() || is_tag() || is_tax() )
					$this->add_term_archive_items();

				elseif ( is_author() )
					$this->add_user_archive_items();

				elseif ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
					$this->add_minute_hour_archive_items();

				elseif ( get_query_var( 'minute' ) )
					$this->add_minute_archive_items();

				elseif ( get_query_var( 'hour' ) )
					$this->add_hour_archive_items();

				elseif ( is_day() )
					$this->add_day_archive_items();

				elseif ( get_query_var( 'w' ) )
					$this->add_week_archive_items();

				elseif ( is_month() )
					$this->add_month_archive_items();

				elseif ( is_year() )
					$this->add_year_archive_items();

				else
					$this->add_default_archive_items();
			}

			// If viewing a search results page.
			elseif ( is_search() ) {
				$this->add_search_items();
			}

			// If viewing the 404 page.
			elseif ( is_404() ) {
				$this->add_404_items();
			}
		}

		// Add paged items if they exist.
		$this->add_paged_items();

		// Allow developers to overwrite the items for the breadcrumb trail.
		$this->items = array_unique( apply_filters( 'breadcrumb_trail_items', $this->items, $this->args ) );
	}

	/**
	 * Gets front items based on $wp_rewrite->front.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_rewrite_front_items() {
		global $wp_rewrite;

		if ( $wp_rewrite->front )
			$this->add_path_parents( $wp_rewrite->front );
	}

	/**
	 * Adds the page/paged number to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_paged_items() {

		// If viewing a paged singular post.
		if ( is_singular() && 1 < get_query_var( 'page' ) && true === $this->args['show_title'] )
			$this->items[] = sprintf( $this->labels['paged'], number_format_i18n( absint( get_query_var( 'page' ) ) ) );

		// If viewing a singular post with paged comments.
		elseif ( is_singular() && get_option( 'page_comments' ) && 1 < get_query_var( 'cpage' ) )
			$this->items[] = sprintf( $this->labels['paged_comments'], number_format_i18n( absint( get_query_var( 'cpage' ) ) ) );

		// If viewing a paged archive-type page.
		elseif ( is_paged() && true === $this->args['show_title'] )
			$this->items[] = sprintf( $this->labels['paged'], number_format_i18n( absint( get_query_var( 'paged' ) ) ) );
	}

	/**
	 * Adds the network (all sites) home page link to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_network_home_link() {

		if ( is_multisite() && ! is_main_site() && true === $this->args['network'] )
			$this->items[] = sprintf( '<a href="%s" rel="home">%s</a>', esc_url( network_home_url() ), $this->labels['home'] );
	}

	/**
	 * Adds the current site's home page link to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_site_home_link() {

		$network = is_multisite() && ! is_main_site() && true === $this->args['network'];
		$label   = $network ? get_bloginfo( 'name' ) : $this->labels['home'];
		$rel     = $network ? '' : ' rel="home"';

		$this->items[] = sprintf( '<a href="%s"%s>%s</a>', esc_url( user_trailingslashit( esc_url(home_url()) ) ), $rel, $label );
	}

	/**
	 * Adds items for the front page to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_front_page_items() {

		// Only show front items if the 'show_on_front' argument is set to 'true'.
		if ( true === $this->args['show_on_front'] || is_paged() || ( is_singular() && 1 < get_query_var( 'page' ) ) ) {

			// Add network home link.
			$this->add_network_home_link();

			// If on a paged view, add the site home link.
			if ( is_paged() )
				$this->add_site_home_link();

			// If on the main front page, add the network home title.
			elseif ( true === $this->args['show_title'] )
				$this->items[] = is_multisite() && true === $this->args['network'] ? get_bloginfo( 'name' ) : $this->labels['home'];
		}
	}

	/**
	 * Adds items for the posts page (i.e., is_home()) to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_blog_items() {

		// Get the post ID and post.
		$post_id = get_queried_object_id();
		$post    = get_post( $post_id );

		// If the post has parents, add them to the trail.
		if ( 0 < $post->post_parent )
			$this->add_post_parents( $post->post_parent );

		// Get the page title.
		$title = get_the_title( $post_id );

		// Add the posts page item.
		if ( is_paged() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_permalink( $post_id ) ), $title );

		elseif ( $title && true === $this->args['show_title'] )
			$this->items[] = $title;
	}

	/**
	 * Adds singular post items to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_singular_items() {

		// Get the queried post.
		$post    = get_queried_object();
		$post_id = get_queried_object_id();

		// If the post has a parent, follow the parent trail.
		if ( 0 < $post->post_parent )
			$this->add_post_parents( $post->post_parent );

		// If the post doesn't have a parent, get its hierarchy based off the post type.
		else
			$this->add_post_hierarchy( $post_id );

		// Display terms for specific post type taxonomy if requested.
		if ( ! empty( $this->post_taxonomy[ $post->post_type ] ) )
			$this->add_post_terms( $post_id, $this->post_taxonomy[ $post->post_type ] );

		// End with the post title.
		if ( $post_title = single_post_title( '', false ) ) {

			if ( ( 1 < get_query_var( 'page' ) || is_paged() ) || ( get_option( 'page_comments' ) && 1 < absint( get_query_var( 'cpage' ) ) ) )
				$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_permalink( $post_id ) ), $post_title );

			elseif ( true === $this->args['show_title'] )
				$this->items[] = $post_title;
		}
	}

	/**
	 * Adds the items to the trail items array for taxonomy term archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @global object $wp_rewrite
	 * @return void
	 */
	protected function add_term_archive_items() {
		global $wp_rewrite;

		// Get some taxonomy and term variables.
		$term           = get_queried_object();
		$taxonomy       = get_taxonomy( $term->taxonomy );
		$done_post_type = false;

		// If there are rewrite rules for the taxonomy.
		if ( false !== $taxonomy->rewrite ) {

			// If 'with_front' is true, dd $wp_rewrite->front to the trail.
			if ( $taxonomy->rewrite['with_front'] && $wp_rewrite->front )
				$this->add_rewrite_front_items();

			// Get parent pages by path if they exist.
			$this->add_path_parents( $taxonomy->rewrite['slug'] );

			// Add post type archive if its 'has_archive' matches the taxonomy rewrite 'slug'.
			if ( $taxonomy->rewrite['slug'] ) {

				$slug = trim( $taxonomy->rewrite['slug'], '/' );

				// Deals with the situation if the slug has a '/' between multiple
				// strings. For example, "movies/genres" where "movies" is the post
				// type archive.
				$matches = explode( '/', $slug );

				// If matches are found for the path.
				if ( isset( $matches ) ) {

					// Reverse the array of matches to search for posts in the proper order.
					$matches = array_reverse( $matches );

					// Loop through each of the path matches.
					foreach ( $matches as $match ) {

						// If a match is found.
						$slug = $match;

						// Get public post types that match the rewrite slug.
						$post_types = $this->get_post_types_by_slug( $match );

						if ( ! empty( $post_types ) ) {

							$post_type_object = $post_types[0];

							// Add support for a non-standard label of 'archive_title' (special use case).
							$label = ! empty( $post_type_object->labels->archive_title ) ? $post_type_object->labels->archive_title : $post_type_object->labels->name;

							// Core filter hook.
							$label = apply_filters( 'post_type_archive_title', $label, $post_type_object->name );

							// Add the post type archive link to the trail.
							$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_post_type_archive_link( $post_type_object->name ) ), $label );

							$done_post_type = true;

							// Break out of the loop.
							break;
						}
					}
				}
			}
		}

		// If there's a single post type for the taxonomy, use it.
		if ( false === $done_post_type && 1 === count( $taxonomy->object_type ) && post_type_exists( $taxonomy->object_type[0] ) ) {

			// If the post type is 'post'.
			if ( 'post' === $taxonomy->object_type[0] ) {
				$post_id = get_option( 'page_for_posts' );

				if ( 'posts' !== get_option( 'show_on_front' ) && 0 < $post_id )
					$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_permalink( $post_id ) ), get_the_title( $post_id ) );

			// If the post type is not 'post'.
			} else {
				$post_type_object = get_post_type_object( $taxonomy->object_type[0] );

				$label = ! empty( $post_type_object->labels->archive_title ) ? $post_type_object->labels->archive_title : $post_type_object->labels->name;

				// Core filter hook.
				$label = apply_filters( 'post_type_archive_title', $label, $post_type_object->name );

				$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_post_type_archive_link( $post_type_object->name ) ), $label );
			}
		}

		// If the taxonomy is hierarchical, list its parent terms.
		if ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent )
			$this->add_term_parents( $term->parent, $term->taxonomy );

		// Add the term name to the trail end.
		if ( is_paged() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_term_link( $term, $term->taxonomy ) ), single_term_title( '', false ) );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = single_term_title( '', false );
	}

	/**
	 * Adds the items to the trail items array for post type archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_post_type_archive_items() {

		// Get the post type object.
		$post_type_object = get_post_type_object( get_query_var( 'post_type' ) );

		if ( false !== $post_type_object->rewrite ) {

			// If 'with_front' is true, add $wp_rewrite->front to the trail.
			if ( $post_type_object->rewrite['with_front'] )
				$this->add_rewrite_front_items();

			// If there's a rewrite slug, check for parents.
			if ( ! empty( $post_type_object->rewrite['slug'] ) )
				$this->add_path_parents( $post_type_object->rewrite['slug'] );
		}

		// Add the post type [plural] name to the trail end.
		if ( is_paged() || is_author() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_post_type_archive_link( $post_type_object->name ) ), post_type_archive_title( '', false ) );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = post_type_archive_title( '', false );

		// If viewing a post type archive by author.
		if ( is_author() )
			$this->add_user_archive_items();
	}

	/**
	 * Adds the items to the trail items array for user (author) archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @global object $wp_rewrite
	 * @return void
	 */
	protected function add_user_archive_items() {
		global $wp_rewrite;

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Get the user ID.
		$user_id = get_query_var( 'author' );

		// If $author_base exists, check for parent pages.
		if ( ! empty( $wp_rewrite->author_base ) && ! is_post_type_archive() )
			$this->add_path_parents( $wp_rewrite->author_base );

		// Add the author's display name to the trail end.
		if ( is_paged() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_author_posts_url( $user_id ) ), get_the_author_meta( 'display_name', $user_id ) );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = get_the_author_meta( 'display_name', $user_id );
	}

	/**
	 * Adds the items to the trail items array for minute + hour archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_minute_hour_archive_items() {

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Add the minute + hour item.
		if ( true === $this->args['show_title'] )
			$this->items[] = sprintf( $this->labels['archive_minute_hour'], get_the_time( esc_html_x( 'g:i a', 'minute and hour archives time format', 'beautyspa' ) ) );
	}

	/**
	 * Adds the items to the trail items array for minute archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_minute_archive_items() {

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Add the minute item.
		if ( true === $this->args['show_title'] )
			$this->items[] = sprintf( $this->labels['archive_minute'], get_the_time( esc_html_x( 'i', 'minute archives time format', 'beautyspa' ) ) );
	}

	/**
	 * Adds the items to the trail items array for hour archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_hour_archive_items() {

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Add the hour item.
		if ( true === $this->args['show_title'] )
			$this->items[] = sprintf( $this->labels['archive_hour'], get_the_time( esc_html_x( 'g a', 'hour archives time format', 'beautyspa' ) ) );
	}

	/**
	 * Adds the items to the trail items array for day archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_day_archive_items() {

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Get year, month, and day.
		$year  = sprintf( $this->labels['archive_year'],  get_the_time( esc_html_x( 'Y', 'yearly archives date format',  'beautyspa' ) ) );
		$month = sprintf( $this->labels['archive_month'], get_the_time( esc_html_x( 'F', 'monthly archives date format', 'beautyspa' ) ) );
		$day   = sprintf( $this->labels['archive_day'],   get_the_time( esc_html_x( 'j', 'daily archives date format',   'beautyspa' ) ) );

		// Add the year and month items.
		$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_year_link( get_the_time( 'Y' ) ) ), $year );
		$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ), $month );

		// Add the day item.
		if ( is_paged() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_day_link( get_the_time( 'Y' ) ), get_the_time( 'm' ), get_the_time( 'd' ) ), $day );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = $day;
	}

	/**
	 * Adds the items to the trail items array for week archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_week_archive_items() {

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Get the year and week.
		$year = sprintf( $this->labels['archive_year'],  get_the_time( esc_html_x( 'Y', 'yearly archives date format', 'beautyspa' ) ) );
		$week = sprintf( $this->labels['archive_week'],  get_the_time( esc_html_x( 'W', 'weekly archives date format', 'beautyspa' ) ) );

		// Add the year item.
		$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_year_link( get_the_time( 'Y' ) ) ), $year );

		// Add the week item.
		if ( is_paged() )
			$this->items[] = esc_url( get_archives_link( add_query_arg( array( 'm' => get_the_time( 'Y' ), 'w' => get_the_time( 'W' ) ), home_url() ), $week, false ) );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = $week;
	}

	/**
	 * Adds the items to the trail items array for month archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_month_archive_items() {

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Get the year and month.
		$year  = sprintf( $this->labels['archive_year'],  get_the_time( esc_html_x( 'Y', 'yearly archives date format',  'beautyspa' ) ) );
		$month = sprintf( $this->labels['archive_month'], get_the_time( esc_html_x( 'F', 'monthly archives date format', 'beautyspa' ) ) );

		// Add the year item.
		$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_year_link( get_the_time( 'Y' ) ) ), $year );

		// Add the month item.
		if ( is_paged() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ), $month );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = $month;
	}

	/**
	 * Adds the items to the trail items array for year archives.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_year_archive_items() {

		// Add $wp_rewrite->front to the trail.
		$this->add_rewrite_front_items();

		// Get the year.
		$year  = sprintf( $this->labels['archive_year'],  get_the_time( esc_html_x( 'Y', 'yearly archives date format',  'beautyspa' ) ) );

		// Add the year item.
		if ( is_paged() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_year_link( get_the_time( 'Y' ) ) ), $year );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = $year;
	}

	/**
	 * Adds the items to the trail items array for archives that don't have a more specific method
	 * defined in this class.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_default_archive_items() {

		// If this is a date-/time-based archive, add $wp_rewrite->front to the trail.
		if ( is_date() || is_time() )
			$this->add_rewrite_front_items();

		if ( true === $this->args['show_title'] )
			$this->items[] = $this->labels['archives'];
	}

	/**
	 * Adds the items to the trail items array for search results.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_search_items() {

		if ( is_paged() )
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_search_link() ), sprintf( $this->labels['search'], get_search_query() ) );

		elseif ( true === $this->args['show_title'] )
			$this->items[] = sprintf( $this->labels['search'], get_search_query() );
	}

	/**
	 * Adds the items to the trail items array for 404 pages.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	protected function add_404_items() {

		if ( true === $this->args['show_title'] )
			$this->items[] = $this->labels['error_404'];
	}

	/**
	 * Adds a specific post's parents to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @param  int    $post_id
	 * @return void
	 */
	protected function add_post_parents( $post_id ) {
		$parents = array();

		while ( $post_id ) {

			// Get the post by ID.
			$post = get_post( $post_id );

			// If we hit a page that's set as the front page, bail.
			if ( 'page' == $post->post_type && 'page' == get_option( 'show_on_front' ) && $post_id == get_option( 'page_on_front' ) )
				break;

			// Add the formatted post link to the array of parents.
			$parents[] = sprintf( '<a href="%s">%s</a>', esc_url( get_permalink( $post_id ) ), get_the_title( $post_id ) );

			// If there's no longer a post parent, break out of the loop.
			if ( 0 >= $post->post_parent )
				break;

			// Change the post ID to the parent post to continue looping.
			$post_id = $post->post_parent;
		}

		// Get the post hierarchy based off the final parent post.
		$this->add_post_hierarchy( $post_id );

		// Display terms for specific post type taxonomy if requested.
		if ( ! empty( $this->post_taxonomy[ $post->post_type ] ) )
			$this->add_post_terms( $post_id, $this->post_taxonomy[ $post->post_type ] );

		// Merge the parent items into the items array.
		$this->items = array_merge( $this->items, array_reverse( $parents ) );
	}

	/**
	 * Adds a specific post's hierarchy to the items array.  The hierarchy is determined by post type's
	 * rewrite arguments and whether it has an archive page.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @param  int    $post_id
	 * @return void
	 */
	protected function add_post_hierarchy( $post_id ) {

		// Get the post type.
		$post_type        = get_post_type( $post_id );
		$post_type_object = get_post_type_object( $post_type );

		// If this is the 'post' post type, get the rewrite front items and map the rewrite tags.
		if ( 'post' === $post_type ) {

			// Add $wp_rewrite->front to the trail.
			$this->add_rewrite_front_items();

			// Map the rewrite tags.
			$this->map_rewrite_tags( $post_id, get_option( 'permalink_structure' ) );
		}

		// If the post type has rewrite rules.
		elseif ( false !== $post_type_object->rewrite ) {

			// If 'with_front' is true, add $wp_rewrite->front to the trail.
			if ( $post_type_object->rewrite['with_front'] )
				$this->add_rewrite_front_items();

			// If there's a path, check for parents.
			if ( ! empty( $post_type_object->rewrite['slug'] ) )
				$this->add_path_parents( $post_type_object->rewrite['slug'] );
		}

		// If there's an archive page, add it to the trail.
		if ( $post_type_object->has_archive ) {

			// Add support for a non-standard label of 'archive_title' (special use case).
			$label = ! empty( $post_type_object->labels->archive_title ) ? $post_type_object->labels->archive_title : $post_type_object->labels->name;

			// Core filter hook.
			$label = apply_filters( 'post_type_archive_title', $label, $post_type_object->name );

			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_post_type_archive_link( $post_type ) ), $label );
		}

		// Map the rewrite tags if there's a `%` in the slug.
		if ( 'post' !== $post_type && ! empty( $post_type_object->rewrite['slug'] ) && false !== strpos( $post_type_object->rewrite['slug'], '%' ) )
			$this->map_rewrite_tags( $post_id, $post_type_object->rewrite['slug'] );
	}

	/**
	 * Gets post types by slug.  This is needed because the get_post_types() function doesn't exactly
	 * match the 'has_archive' argument when it's set as a string instead of a boolean.
	 *
	 * @since  0.6.0
	 * @access protected
	 * @param  int    $slug  The post type archive slug to search for.
	 * @return void
	 */
	protected function get_post_types_by_slug( $slug ) {

		$return = array();

		$post_types = get_post_types( array(), 'objects' );

		foreach ( $post_types as $type ) {

			if ( $slug === $type->has_archive || ( true === $type->has_archive && $slug === $type->rewrite['slug'] ) )
				$return[] = $type;
		}

		return $return;
	}

	/**
	 * Adds a post's terms from a specific taxonomy to the items array.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @param  int     $post_id  The ID of the post to get the terms for.
	 * @param  string  $taxonomy The taxonomy to get the terms from.
	 * @return void
	 */
	protected function add_post_terms( $post_id, $taxonomy ) {

		// Get the post type.
		$post_type = get_post_type( $post_id );

		// Get the post categories.
		$terms = get_the_terms( $post_id, $taxonomy );

		// Check that categories were returned.
		if ( $terms && ! is_wp_error( $terms ) ) {

			// Sort the terms by ID and get the first category.
			if ( function_exists( 'wp_list_sort' ) )
				$terms = wp_list_sort( $terms, 'term_id' );

			else
				usort( $terms, '_usort_terms_by_ID' );

			$term = get_term( $terms[0], $taxonomy );

			// If the category has a parent, add the hierarchy to the trail.
			if ( 0 < $term->parent )
				$this->add_term_parents( $term->parent, $taxonomy );

			// Add the category archive link to the trail.
			$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_term_link( $term, $taxonomy ) ), $term->name );
		}
	}

	/**
	 * Get parent posts by path.  Currently, this method only supports getting parents of the 'page'
	 * post type.  The goal of this function is to create a clear path back to home given what would
	 * normally be a "ghost" directory.  If any page matches the given path, it'll be added.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @param  string $path The path (slug) to search for posts by.
	 * @return void
	 */
	function add_path_parents( $path ) {

		// Trim '/' off $path in case we just got a simple '/' instead of a real path.
		$path = trim( $path, '/' );

		// If there's no path, return.
		if ( empty( $path ) )
			return;

		// Get parent post by the path.
		$post = get_page_by_path( $path );

		if ( ! empty( $post ) ) {
			$this->add_post_parents( $post->ID );
		}

		elseif ( is_null( $post ) ) {

			// Separate post names into separate paths by '/'.
			$path = trim( $path, '/' );
			preg_match_all( "/\/.*?\z/", $path, $matches );

			// If matches are found for the path.
			if ( isset( $matches ) ) {

				// Reverse the array of matches to search for posts in the proper order.
				$matches = array_reverse( $matches );

				// Loop through each of the path matches.
				foreach ( $matches as $match ) {

					// If a match is found.
					if ( isset( $match[0] ) ) {

						// Get the parent post by the given path.
						$path = str_replace( $match[0], '', $path );
						$post = get_page_by_path( trim( $path, '/' ) );

						// If a parent post is found, set the $post_id and break out of the loop.
						if ( ! empty( $post ) && 0 < $post->ID ) {
							$this->add_post_parents( $post->ID );
							break;
						}
					}
				}
			}
		}
	}

	/**
	 * Searches for term parents of hierarchical taxonomies.  This function is similar to the WordPress
	 * function get_category_parents() but handles any type of taxonomy.
	 *
	 * @since  1.0.0
	 * @param  int    $term_id  ID of the term to get the parents of.
	 * @param  string $taxonomy Name of the taxonomy for the given term.
	 * @return void
	 */
	function add_term_parents( $term_id, $taxonomy ) {

		// Set up some default arrays.
		$parents = array();

		// While there is a parent ID, add the parent term link to the $parents array.
		while ( $term_id ) {

			// Get the parent term.
			$term = get_term( $term_id, $taxonomy );

			// Add the formatted term link to the array of parent terms.
			$parents[] = sprintf( '<a href="%s">%s</a>', esc_url( get_term_link( $term, $taxonomy ) ), $term->name );

			// Set the parent term's parent as the parent ID.
			$term_id = $term->parent;
		}

		// If we have parent terms, reverse the array to put them in the proper order for the trail.
		if ( ! empty( $parents ) )
			$this->items = array_merge( $this->items, array_reverse( $parents ) );
	}

	/**
	 * Turns %tag% from permalink structures into usable links for the breadcrumb trail.  This feels kind of
	 * hackish for now because we're checking for specific %tag% examples and only doing it for the 'post'
	 * post type.  In the future, maybe it'll handle a wider variety of possibilities, especially for custom post
	 * types.
	 *
	 * @since  0.6.0
	 * @access protected
	 * @param  int    $post_id ID of the post whose parents we want.
	 * @param  string $path    Path of a potential parent page.
	 * @param  array  $args    Mixed arguments for the menu.
	 * @return array
	 */
	protected function map_rewrite_tags( $post_id, $path ) {

		$post = get_post( $post_id );

		// Trim '/' from both sides of the $path.
		$path = trim( $path, '/' );

		// Split the $path into an array of strings.
		$matches = explode( '/', $path );

		// If matches are found for the path.
		if ( is_array( $matches ) ) {

			// Loop through each of the matches, adding each to the $trail array.
			foreach ( $matches as $match ) {

				// Trim any '/' from the $match.
				$tag = trim( $match, '/' );

				// If using the %year% tag, add a link to the yearly archive.
				if ( '%year%' == $tag )
					$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_year_link( get_the_time( 'Y', $post_id ) ) ), sprintf( $this->labels['archive_year'], get_the_time( esc_html_x( 'Y', 'yearly archives date format',  'beautyspa' ) ) ) );

				// If using the %monthnum% tag, add a link to the monthly archive.
				elseif ( '%monthnum%' == $tag )
					$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_month_link( get_the_time( 'Y', $post_id ), get_the_time( 'm', $post_id ) ) ), sprintf( $this->labels['archive_month'], get_the_time( esc_html_x( 'F', 'monthly archives date format', 'beautyspa' ) ) ) );

				// If using the %day% tag, add a link to the daily archive.
				elseif ( '%day%' == $tag )
					$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_day_link( get_the_time( 'Y', $post_id ), get_the_time( 'm', $post_id ), get_the_time( 'd', $post_id ) ) ), sprintf( $this->labels['archive_day'], get_the_time( esc_html_x( 'j', 'daily archives date format', 'beautyspa' ) ) ) );

				// If using the %author% tag, add a link to the post author archive.
				elseif ( '%author%' == $tag )
					$this->items[] = sprintf( '<a href="%s">%s</a>', esc_url( get_author_posts_url( $post->post_author ) ), get_the_author_meta( 'display_name', $post->post_author ) );

				// If using the %category% tag, add a link to the first category archive to match permalinks.
				elseif ( taxonomy_exists( trim( $tag, '%' ) ) ) {

					// Force override terms in this post type.
					$this->post_taxonomy[ $post->post_type ] = false;

					// Add the post categories.
					$this->add_post_terms( $post_id, trim( $tag, '%' ) );
				}
			}
		}
	}
}
add_action( 'after_setup_theme', 'beautyspa_breadcrumb_trail_theme_setup', 12 );

function beautyspa_breadcrumb_trail_theme_setup() {

	if ( ! current_theme_supports( 'breadcrumb-trail' ) )
		add_action( 'wp_head', 'beautyspa_breadcrumb_trail_print_styles' );
}

function beautyspa_breadcrumb_trail_print_styles() {

	$style = '
		.breadcrumbs .trail-browse,
		.breadcrumbs .trail-items,
		.breadcrumbs .trail-items li {
			display:     inline-block;
			margin:      0;
			padding:     0;
			border:      none;
			background:  transparent;
			text-indent: 0;
		}

		.breadcrumbs .trail-browse {
			font-size:   inherit;
			font-style:  inherit;
			font-weight: inherit;
			color:       inherit;
		}

		.breadcrumbs .trail-items {
			list-style: none;
		}

			.trail-items li::after {
				content: "\002F";
				padding: 0 0.5em;
			}

			.trail-items li:last-of-type::after {
				display: none;
			}';

	$style = apply_filters( 'breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", "  " ), '', $style ) ) );

	if ( $style )
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . wp_kses_post($style) . '</style>' . "\n";
}



function beautyspa_custom_admin_notice(){
	wp_register_style( 'custom_admin_css', get_template_directory_uri() . '/core/admin/admin-rating.css');
    wp_enqueue_style( 'custom_admin_css' );
	$wl_th_info = wp_get_theme(); 
	$currentversion = str_replace('.','',(esc_html( $wl_th_info->get('Version') )));
	$isitdismissed = 'beautyspa_notice_dismissed'.$currentversion;
	if ( !get_user_meta( get_current_user_id() , $isitdismissed ) ) { ?>
	<div class="notice-box notice-success is-dismissible flat_responsive_notice" data-dismissible="disable-done-notice-forever">
		<div>
			<p>	
			<?php esc_html_e('Thank you for using the free version of ','beautyspa'); ?>
			<?php echo esc_html( $wl_th_info->get('Name') );?> - 
			<?php echo esc_html( $wl_th_info->get('Version') );
			 ?>
			<?php esc_html_e('Please give your reviews and ratings on ','beautyspa')?><?php $wl_th_info->get('Name') ?><?php esc_html_e('theme. Your ratings will help us to improve our themes.', 'beautyspa'); ?>
				<script type="text/javascript">alert(<?php echo esc_attr($isitdismissed)?>);</script>
			<a class="rateme" href="<?php echo esc_url('https://wordpress.org/support/theme/beautyspa/reviews/?filter=5');  ?>" target="_blank" aria-label="Dismiss the welcome panel">
				<strong><?php esc_html_e('Rate Us here','beautyspa');?></strong>
			</a>
			<a class="dismiss" href="?-notice-dismissed<?php echo esc_attr($currentversion);?>"><strong><?php esc_html_e("Dismiss","beautyspa");?></strong></a>
			</p>
		</div>
		
	</div>
	
<?php
	}
 }
add_action('admin_notices', 'beautyspa_custom_admin_notice');

function beautyspa_notice_dismissed() {
	$wl_th_info = wp_get_theme(); 
	$currentversion = str_replace('.','',(esc_html( $wl_th_info->get('Version') )));
	$dismissurl = '-notice-dismissed'.$currentversion;
	$isitdismissed = 'beautyspa_notice_dismissed'.$currentversion;
    $user_id = get_current_user_id();
    if ( isset( $_GET[$dismissurl] ) )
        add_user_meta( $user_id, $isitdismissed, 'true', true );
}
add_action( 'admin_init', 'beautyspa_notice_dismissed' );

?>