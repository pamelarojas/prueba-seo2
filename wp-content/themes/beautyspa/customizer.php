<?php    
/**
 * BeautySpa Customizer functionality
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since BeautySpa 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */  
add_action( 'customize_register', 'beautyspa_customizer' );
function beautyspa_customizer( $wp_customize ) {
	wp_enqueue_style('beautyspa-customizr', get_template_directory_uri() .'/css/customizr.css');    
	$beauty_theme_options = beautyspa_options();
	$site_logo = get_template_directory_uri().'/images/logo1.png';
	$portfolio_img = get_template_directory_uri().'/images/3.jpg';
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.navbar-brand h1',
		'render_callback' => 'beautyspa_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.navbar-header p',
		'render_callback' => 'beautyspa_customize_partial_blogdescription',
	) );
	
	

/* Panel */
	$wp_customize->add_panel( 'beauty_spa_theme_option', array(
    'title' => esc_html__( 'Theme Options','beautyspa' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
	) );
	
// General Settings
	$wp_customize->add_section('beauty_spa_general_option',
		array(
			'title' => esc_html__('General Options','beautyspa'),
			'description' => esc_html__('Here you can customize Your theme General Settings ','beautyspa'),
			'panel'=>'beauty_spa_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35,
			)
		);
	
	$wp_customize->add_setting(
		'beauty_options_sticky_header',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'beauty_spa_fixed_header', array(
		'label'        => esc_html__( 'Enable Fixed Header', 'beautyspa' ),
		'description' => esc_html__( 'Select options for Fixed Header', 'beautyspa' ),
		'type'=>'checkbox',
		'section'    => 'beauty_spa_general_option',
		'settings'   => 'beauty_options_sticky_header',
	) );
	$wp_customize->add_setting(
		'beauty_options_search_header',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'beauty_spa_search_header', array(
		'label'        => esc_html__( 'Show Search In Header', 'beautyspa' ),
		'description' => esc_html__( 'Select options for search box show on header', 'beautyspa' ),
		'type'=>'checkbox',
		'section'    => 'beauty_spa_general_option',
		'settings'   => 'beauty_options_search_header',
	));
	
	$wp_customize->selective_refresh->add_partial( 'beauty_options_search_header', array(
		'selector' => '.top-search',
		'render_callback' => 'beautyspa_header_search',
	) );
	
	$wp_customize->add_setting(
		'beauty_options_breadcrumb',
		array('type' => 'theme_mod',
			'default'=>'on',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'beauty_spa_breadcrumb', array(
		'label'        => esc_html__( 'Enable breadcrumb', 'beautyspa' ),
		'description' => esc_html__( 'Select options for enable breadcrumb', 'beautyspa' ),
		'type'=>'checkbox',
		'section'    => 'beauty_spa_general_option',
		'settings'   => 'beauty_options_breadcrumb',
	) );
	
	// slider images
	$wp_customize->add_section(
        'beauty_spa_slider_images',
        array(
        'title' => esc_html__('Slider Image Options','beautyspa'),
        'description' => esc_html__('Here you can customize Your Slider\'s Images by selecting post.','beautyspa'),
	    'panel'=>'beauty_spa_theme_option',
	    'capability'=>'edit_theme_options',
        'priority' => 35,
	)
	);
	
	// Slider type
	$wp_customize->add_setting('slider_layout', 
		array(
		'type'=>'theme_mod',
			'default'           => 'slider',        
			'sanitize_callback' => 'beautyspa_sanitize_text'
		)
	);

	$wp_customize->add_control(
		'slider_layout', 
		array(      
			'label'     => esc_html__('Select Slider Type', 'beautyspa'),
			'description' => esc_html__( 'Select Type of slider that show on front page', 'beautyspa' ),
			'section'   => 'beauty_spa_slider_images',
			'settings'  => 'slider_layout',
			'type'      => 'select',
			'choices'   => array(
				'slider'  => esc_html__('Slider Display Pages', 'beautyspa'),
				'banner'  => esc_html__('Banner Image', 'beautyspa'),
				'sliderpost'  => esc_html__('Slider Display Posts', 'beautyspa'),
			),
		)
	);
	
	// Banner Image
	$wp_customize->add_setting('banner_image', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'beautyspa_sanitize_text',
		)
	);

	$wp_customize->add_control(new WP_Customize_Image_Control( 
		$wp_customize,'banner_image', 
		array(
		'label'       => esc_html__('Banner Image', 'beautyspa'),
		'description' => esc_html__( 'Select Banner Image', 'beautyspa' ), 
		'section'     => 'beauty_spa_slider_images',   
		'settings'    => 'banner_image',		
		'active_callback'   => 'beautyspa_slider_layout_banner',	
		)
	));
	$wp_customize->add_setting('banner_title', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'beautyspa_sanitize_text',
		)
	);

	$wp_customize->add_control('banner_title', 
		array(
		'label'       => esc_html__('Banner Title', 'beautyspa'),
		'section'     => 'beauty_spa_slider_images',   
		'settings'    => 'banner_title',		
		'type'        => 'text',	
		'active_callback'   => 'beautyspa_slider_layout_banner',	
		)
	);
	$wp_customize->add_setting('banner_desc', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'beautyspa_sanitize_text',
		)
	);

	$wp_customize->add_control('banner_desc', 
		array(
		'label'       => esc_html__('Banner Description', 'beautyspa'),
		'section'     => 'beauty_spa_slider_images',   
		'settings'    => 'banner_desc',		
		'type'        => 'text',	
		'active_callback'   => 'beautyspa_slider_layout_banner',	
		)
	);
	
	// page slider //
	for($i=1; $i<=3; $i++){
	$wp_customize->add_setting(
		'slider_page_'.$i,
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_integer',
			'capability' => 'edit_theme_options'
		));
	$wp_customize->add_control( new Beautyspa_Page_Control( $wp_customize,  'slider_page_'.$i, array(
			'label'        => esc_html__('Select page for slider ','beautyspa').$i,
			'section'    => 'beauty_spa_slider_images',
			'settings'   => 'slider_page_'.$i,
			'active_callback'   => 'beautyspa_slider_layout',	
	)));
	// page slider end //
	}
	
	// post slider //
	for($i=1; $i<=3; $i++){
	$wp_customize->add_setting(
		'beauty_options_slider_image'.$i,
			array(
			'type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 
	new beautyspa_Slider_Image_Control( 
	$wp_customize, 'slider_image'.$i,
	array(
		'label'    => 'Slider Image '.$i, 
		'section'  => 'beauty_spa_slider_images',
		'settings' => 'beauty_options_slider_image'.$i,
		'active_callback'   => 'beautyspa_slider_layout_post',	
			
	) ) );
	// post slider end //
	}
	
	$wp_customize->add_setting(
		'beauty_options_enable_slider',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		));
		$wp_customize->add_control( 'beauty_spa_enable_slider', array(
			'label'        => esc_html__( 'Show Slider Section On Front-Page', 'beautyspa' ),
			'description' => esc_html__( 'Select option to show slider on front page', 'beautyspa' ),
			'type'=>'checkbox',
			'section'    => 'beauty_spa_slider_images',
			'settings'   => 'beauty_options_enable_slider',
		) );
	
	
	
	// Service Settings
	$wp_customize->add_section('beauty_spa_service_option',
		array(
			'title' => esc_html__('Service Options','beautyspa'),
			'description' => esc_html__('Customize Home Service Section','beautyspa'),
			'panel'=>'beauty_spa_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35,
			)
		);
		$wp_customize->add_setting(
		'beauty_options_enable_service',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		));
		$wp_customize->add_control( 'beauty_spa_enable_service', array(
			'label'        => esc_html__( 'Show Service Section On Front-Page', 'beautyspa' ),
			'description' => esc_html__( 'Select option to show service section on front page', 'beautyspa' ),
			'type'=>'checkbox',
			'section'    => 'beauty_spa_service_option',
			'settings'   => 'beauty_options_enable_service',
		) );
		$wp_customize->add_setting(
			'beauty_options_service_title',
			array('type' => 'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'beautyspa_sanitize_text',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'beauty_spa_service_title', array(
			'label'        => esc_html__( 'Service Title','beautyspa' ),
			'description' => esc_html__( 'Enter title for service section', 'beautyspa' ),
			'section'    => 'beauty_spa_service_option',
			'settings'   => 'beauty_options_service_title',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'beauty_options_service_title', array(
		'selector' => '.spa-services .spa-title-section',
		'render_callback' => 'beautyspa_service',
		) );
		
		$wp_customize->add_setting(
			'beauty_options_service_desc',
			array(
				'default'=>'',
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'beautyspa_sanitize_text'
			)
		);
		$wp_customize->selective_refresh->add_partial( 'beauty_options_service_desc', array(
		'selector' => '.spa-services .spa-title-section-desc',
		));
		$wp_customize->add_control('beauty_options_service_desc', array(
			'type'=>'textarea',
			'label'        => esc_html__( 'Enter Service Description','beautyspa' ),
			'description'=>esc_html__('In Service Description you can use html tag like <h1> Latest Service </h1>', 'beautyspa' ),
			'section'    => 'beauty_spa_service_option',
			'settings'   => 'beauty_options_service_desc',
		));
		
		$wp_customize->add_setting(
		'beauty_options_service_category',
			array(
			'type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_text',
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 
			new beautyspa_category_Control( 
			$wp_customize, 'beauty_options_service_category',
			array(
			'label'    => esc_html__('Service Category','beautyspa'), 
			'description' => __('select category for service section','beautyspa'),
			'section'  => 'beauty_spa_service_option',
			'settings' => 'beauty_options_service_category',
		)));
		
		
// portfolio Settings
	$wp_customize->add_section('beauty_spa_portfolio_option',
		array(
			'title' => esc_html__('Portfolio Options','beautyspa'),
			'description' => esc_html__('Customize Home Portfolio Section','beautyspa'),
			'panel'=>'beauty_spa_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35,
			)
		);
		$wp_customize->add_setting(
		'beauty_options_enable_portfolio',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		));
		$wp_customize->add_control( 'beauty_spa_enable_portfolio', array(
			'label'        => esc_html__( 'Show Portfolio Section On Front-Page', 'beautyspa' ),
			'description'=>__('select option for enable portfolio section on front page','beautyspa'),
			'type'=>'checkbox',
			'section'    => 'beauty_spa_portfolio_option',
			'settings'   => 'beauty_options_enable_portfolio',
		) );
		$wp_customize->add_setting(
			'beauty_options_portfolio_title',
			array('type'=>'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'beautyspa_sanitize_text',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'beauty_spa_portfolio_title', array(
			'label'        => esc_html__( 'portfolio Title','beautyspa' ),
			'description'=>__('Enter title for portfolio section ','beautyspa'),
			'section'    => 'beauty_spa_portfolio_option',
			'settings'   => 'beauty_options_portfolio_title',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'beauty_options_portfolio_title', array(
		'selector' => '.portfolio .spa-title-section',
		'render_callback' => 'beautyspa_portfolio',
		) );
		
		$wp_customize->add_setting(
			'beauty_options_portfolio_desc',
			array(
				'default'=>'',
				'sanitize_callback'=>'beautyspa_sanitize_text',
			)
		);
		$wp_customize->selective_refresh->add_partial( 'beauty_options_portfolio_desc', array(
		'selector' => '.portfolio .spa-title-section-desc',
		) );
		$wp_customize->add_control('beauty_options_portfolio_desc', array(
			'type'=>'textarea',
			'label'        => esc_html__( 'Enter Portfolio Description','beautyspa' ),
			'description'=>esc_html__('In Portfolio Description you can use html tag like <h1> Latest Portfolio </h1>', 'beautyspa' ),
			'section'    => 'beauty_spa_portfolio_option',
			'settings'   => 'beauty_options_portfolio_desc',
		));

		$wp_customize->add_setting(
		'beauty_options_portfolio_background',
			array('type'=>'theme_mod',
			'default'=> $portfolio_img,
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 'beauty_spa_portfolio_background',
		array(
			'label'    => esc_html__('Portfolio Background','beautyspa'), 
			'description'=>__('Select background image for portfolio section ','beautyspa'),
			'section'  => 'beauty_spa_portfolio_option',
			'settings' => 'beauty_options_portfolio_background',
		) ) );
		
		$wp_customize->add_setting(
		'beauty_options_portfolio_category',
			array(
			'type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_text',
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 
			new beautyspa_category_Control( 
			$wp_customize, 'beauty_options_portfolio_category',
			array(
			'label'    => esc_html__('Portfolio Category','beautyspa'), 
			'description' => __('select category for portfolio section','beautyspa'),
			'section'  => 'beauty_spa_portfolio_option',
			'settings' => 'beauty_options_portfolio_category',
		)));

// Blog Settings
		$wp_customize->add_section('beauty_spa_blog_option',
		array(
			'title' => esc_html__('Blog Options','beautyspa'),
			'description' => esc_html__('Customize Home Blog Section','beautyspa'),
			'panel'=>'beauty_spa_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35,
			)
		);
		$wp_customize->add_setting(
		'beauty_options_enable_blog',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		));
		$wp_customize->add_control( 'beauty_spa_enable_blog', array(
			'label'        => esc_html__( 'Show Blog Section On Front-Page', 'beautyspa' ),
			'description'=>__('Select option to enable blog section on front page','beautyspa'),
			'type'=>'checkbox',
			'section'    => 'beauty_spa_blog_option',
			'settings'   => 'beauty_options_enable_blog',
		) );
		$wp_customize->add_setting(
			'beauty_options_blog_title',
			array('type'=>'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'beautyspa_sanitize_text',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'beauty_spa_blog_title', array(
			'label'        => esc_html__( 'blog Title','beautyspa' ),
			'description'=>__('Enter title for blog section','beautyspa'),
			'section'    => 'beauty_spa_blog_option',
			'settings'   => 'beauty_options_blog_title',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'beauty_options_blog_title', array(
		'selector' => '.spa-post .spa-title-section',
		'render_callback' => 'beautyspa_blog',
		) );
		
		$wp_customize->add_setting(
			'beauty_options_blog_desc',
			array('type'=>'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'beautyspa_sanitize_text',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->selective_refresh->add_partial( 'beauty_options_blog_desc', array(
		'selector' => '.spa-post .spa-title-section-desc',
		) );
		$wp_customize->add_control('beauty_options_blog_desc', array(
			'type'=>'textarea',
			'label'        => esc_html__( 'Enter Blog Description','beautyspa' ),
			'description'=>esc_html__('In Blog Description you can use html tag like <h1> Latest Blog </h1>', 'beautyspa'),
			'section'    => 'beauty_spa_blog_option',
			'settings'   => 'beauty_options_blog_desc',
		));
		
// Social Settings //
	$wp_customize->add_section('beauty_spa_social_option',
		array(
			'title' => esc_html__('Social Options','beautyspa'),
			'description' => esc_html__('Customize Social Icons','beautyspa'),
			'panel'=>'beauty_spa_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35,
			)
		);
		$wp_customize->add_setting(
		'beauty_options_social_header',
		array('type'	 => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		));
		$wp_customize->add_control( 'beauty_spa_social_header', array(
			'label'        => esc_html__( 'Show Social Icon On Header', 'beautyspa' ),
			'description'=>__('Select option to show social icons on header','beautyspa'),
			'type'=>'checkbox',
			'section'    => 'beauty_spa_social_option',
			'settings'   => 'beauty_options_social_header',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'beauty_options_social_header', array(
		'selector' => '.top-social',
		'render_callback' => 'beautyspa_header_social',
		) );
		
		$wp_customize->add_setting(
		'beauty_options_social_footer',
		array(
			'type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'beautyspa_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		));
		$wp_customize->add_control( 'beauty_spa_social_footer', array(
			'label'        => esc_html__( 'Show Social Icon On Footer', 'beautyspa' ),
			'description'=>__('Select option to show social icons on footer','beautyspa'),
			'type'=>'checkbox',
			'section'    => 'beauty_spa_social_option',
			'settings'   => 'beauty_options_social_footer',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'beauty_options_social_footer', array(
		'selector' => '.f_social',
		'render_callback' => 'beautyspa_footer_social',
		) );
		
		$wp_customize->add_setting('beauty_spa_facbook_link',
		array('type' 	=> 'theme_mod',
			'default'	=> '',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
 
	$wp_customize->add_control( 'facbook_link', 
		array('label'    => esc_html__( 'Facebook', 'beautyspa' ),
		'description'=>__('Enter link address for facebook','beautyspa'),
			'type'		 => 'url',
			'section'    => 'beauty_spa_social_option',
			'settings'   => 'beauty_spa_facbook_link'
		));
 
	$wp_customize->add_setting('beauty_spa_twitter_link',
		array('type' => 'theme_mod',
			'default'=> '',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
			));
 
	$wp_customize->add_control( 'twitter_link',
		array('label'    => esc_html__( 'Twitter', 'beautyspa' ),
		'description'=>__('Enter link address for twitter','beautyspa'),
		'type'			 => 'url',
			'section'    => 'beauty_spa_social_option',
			'settings'   => 'beauty_spa_twitter_link'
		));
	
	$wp_customize->add_setting('beauty_spa_youtube_link',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
 
	$wp_customize->add_control( 'youtube_link', 
		array('label'        => esc_html__( 'Youtube', 'beautyspa' ),
		'description'=>__('Enter link address for youtube','beautyspa'),
			'type'			 => 'url',
			'section'   	 => 'beauty_spa_social_option',
			'settings'  	 => 'beauty_spa_youtube_link'
		));
 
	$wp_customize->add_setting('beauty_spa_linkdin_link',
		array( 'type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
 
	$wp_customize->add_control( 'linkdin_link', 
		array('label'        => esc_html__( 'Linkedin', 'beautyspa' ),
		'description'=>__('Enter link address for linkdin','beautyspa'),
			'type'		     => 'url',
			'section'   	 => 'beauty_spa_social_option',
			'settings'  	 => 'beauty_spa_linkdin_link'
		));
 
	$wp_customize->add_setting('beauty_spa_goglpls_link',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
	$wp_customize->add_control( 'goglpls_link',	
		array('label'     	=> esc_html__( 'Google Plus', 'beautyspa' ),
		'description'=>__('Enter link address for Google Plus','beautyspa'),
			'type'			=> 'url',
			'section'    	=> 'beauty_spa_social_option',
			'settings'      => 'beauty_spa_goglpls_link'
		));
	
// footer Settings
		$wp_customize->add_section('beauty_spa_footer_option',
		array(
			'title' => esc_html__('Footer Options','beautyspa'),
			'description' => esc_html__('Customize Home Footer Section','beautyspa'),
			'panel'=>'beauty_spa_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35,
			)
		);
		$wp_customize->add_setting(
			'beauty_options_footer_text',
			array('type' => 'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'beautyspa_sanitize_text',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'beauty_spa_footer_text', array(
			'label'        => esc_html__( 'Footer Title','beautyspa' ),
			'description'=>__('Enter title to show on footer','beautyspa'),
			'section'    => 'beauty_spa_footer_option',
			'settings'   => 'beauty_options_footer_text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'beauty_options_footer_text', array(
		'selector' => '.f_copyright',
		'render_callback' => 'beautyspa_footer',
		) );
		
		$wp_customize->add_setting(
			'beauty_options_footer_link_text',
			array('type' => 'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'beautyspa_sanitize_text',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'beauty_spa_footer_link_text', array(
			'label'        => esc_html__( 'Footer Link Text','beautyspa' ),
			'description'=>__('Enter text to show on footer','beautyspa'),
			'section'    => 'beauty_spa_footer_option',
			'settings'   => 'beauty_options_footer_link_text',
		) );
		$wp_customize->add_setting(
			'beauty_options_footer_link',
			array('type' => 'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'esc_url_raw',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'beauty_spa_footer_link', array(
			'label'        => esc_html__( 'Footer Link','beautyspa' ),
			'description'=>__('Enter footer link','beautyspa'),
			'section'    => 'beauty_spa_footer_option',
			'settings'   => 'beauty_options_footer_link',
		) );
		
	
	// excerpt option 
    $wp_customize->add_section('excerpt_option',array(
    'title'=>__("Excerpt Option",'beautyspa'),
    'panel'=>'beauty_spa_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 37,
    ));
    
    $wp_customize->add_setting( 'excerpt_blog', array(
        'default'=>55,
        'type'=>'theme_mod',
        'sanitize_callback'=>'beautyspa_sanitize_integer',
        'capability'=>'edit_theme_options'
    ) );
        $wp_customize->add_control( 'excerpt_blog', array(
        'label'        => __( 'Excerpt length blog section', 'beautyspa' ),
        'type'=>'number',
        'section'    => 'excerpt_option',
		'description' => esc_html__('Excerpt length only for home blog section.', 'beautyspa'),
		'settings'   => 'excerpt_blog'
    ) );
		
		
			
			// home layout //
	$wp_customize->add_section('Home_Page_Layout',array(
    'title'=>__("Home Page Layout Option",'beautyspa'),
    'panel'=>'beauty_spa_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 37,
    ));
	$wp_customize->add_setting('home_reorder',
            array(
				'type'=>'theme_mod',
                'sanitize_callback' => 'beautyspa_sanitize_json_string',
				'capability'        => 'edit_theme_options',
            )
        );
        $wp_customize->add_control(new beautyspa_enigma_Custom_sortable_Control($wp_customize,'home_reorder', array(
			'label'=>__( 'Front Page Layout Option', 'beautyspa' ),
            'section' => 'Home_Page_Layout',
            'type'    => 'home-sortable',
            'choices' => array(
                'service'      => __('Home Services', 'beautyspa'),
                'portfolio'     => __('Home Portfolio', 'beautyspa'),
                'blog'        => __('Home Blog', 'beautyspa'),
            ),
			'settings'=>'home_reorder',
        )));
	// home layout close //
	
	
}

//sanitize callbacks
function beautyspa_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function beautyspa_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
        return 1;
    } else {
        return 0;
    }
}
function beautyspa_sanitize_integer( $input ) {
    return (int)($input);
}


/* class for thumbnail images */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'beautyspa_Slider_Image_Control' ) ) :
	class beautyspa_Slider_Image_Control extends WP_Customize_Control {  
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php $args = array( 'post_type' => 'post', 'post_status'=>'publish'); 
				$slide_id = new WP_Query( $args ); ?>
				<select <?php $this->link(); ?> >
				<?php if($slide_id->have_posts()):
					while($slide_id->have_posts()):
						$slide_id->the_post();
						if(has_post_thumbnail()){ ?>
						 <option value= "<?php echo esc_attr(get_the_id()); ?>"<?php if($this->value()== get_the_id() ) echo 'selected="selected"';?>><?php the_title(); ?></option>
						<?php }
					endwhile; 
				 endif; ?>
				 </select>
				<?php
		}  /* public function ends */
	}/*   class ends */
	endif;

/* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Beautyspa_category_Control' ) ) :
class Beautyspa_category_Control extends WP_Customize_Control 
{  
 public function render_content(){ ?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<?php  
		$beauty_spa_category = get_categories(); ?>
		<select <?php $this->link(); ?> >
		<?php foreach($beauty_spa_category as $category){ ?>
		<option value= "<?php echo esc_attr($category->cat_name) ?>" <?php if($this->value()== $category->cat_name ) echo 'selected="selected"';?>><?php echo esc_html($category->cat_name) ?></option>
		<?php } ?>
		 </select>
		 <?php
}  /* public function ends */
}/*   class ends */
endif; 

/* class for pages */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Beautyspa_Page_Control' ) ) :
class Beautyspa_Page_Control extends WP_Customize_Control 
{  
 public function render_content(){ ?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<span class="customize-control-title"><?php echo esc_html( $this->description ); ?></span>
	<?php  
		$list_pages = get_pages(); ?>
		<select <?php $this->link(); ?> >
		<?php foreach($list_pages as $list){ 
		if(has_post_thumbnail($list->ID)){ ?>
		<option value= "<?php echo esc_html($list->ID) ?>" <?php if($this->value()== $list->ID ) echo 'selected="selected"';?>><?php echo esc_html($list->post_title) ?></option>
		<?php } } ?>
		 </select>
		 <?php
}  /* public function ends */
}/*   class ends */
endif; 

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'beautyspa_enigma_Custom_sortable_Control' ) ) :
class beautyspa_enigma_Custom_sortable_Control extends WP_Customize_Control
{
    public $type = 'home-sortable';
    /*Enqueue resources for the control*/
    public function enqueue()
    {

        wp_enqueue_style('beautyspa_customizer-repeater-admin-stylesheet', get_template_directory_uri() . '/assets/customizer_js_css/css/enigma-admin-style.css', time());

        wp_enqueue_script('beautyspa_customizer-repeater-script', get_template_directory_uri() . '/assets/customizer_js_css/js/enigma-customizer_repeater.js', array('jquery', 'jquery-ui-draggable'), time(), true);

    }
    public function render_content()
    {
        if (empty($this->choices)) {
            return;
        }
        $values = json_decode($this->value());
        $name         = $this->id;
        ?>

		<span class="customize-control-title">
			<?php echo esc_html($this->label); ?>
		</span>

		<?php if (!empty($this->description)): ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
		<?php endif;?>

		<div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
			<?php 
			if(!empty($values)){ 
				foreach ($values as $value) {?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo esc_html($this->choices[$value]); ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo esc_attr($value); ?>">
					</div>	
				<?php }?>
				
			<?php }else{
			foreach ($this->choices as $value => $label): ?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo esc_html($label); ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo esc_attr($value); ?>">
					</div>

				<?php endforeach;
			}
        		if (!empty($value)) {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo esc_attr($this->id); ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"
					       value="<?php echo esc_textarea(json_encode($value)); ?>"/>
					<?php
				} else {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo esc_attr($this->id); ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"/>
					<?php
				}?>
		</div>
		<?php
}
}
endif;

function beautyspa_sanitize_json_string($json){
    $sanitized_value = array();
    foreach (json_decode($json,true) as $value) {
        $sanitized_value[] = esc_attr($value);
    }
    return json_encode($sanitized_value);
}


if ( ! function_exists( 'beautyspa_slider_layout' ) ) :

    function beautyspa_slider_layout( $control ) { 
        
        if( 'slider' == $control->manager->get_setting('slider_layout')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

//=============================================================
		// Active callback for Banner
//=============================================================
if ( ! function_exists( 'beautyspa_slider_layout_banner' ) ) :

    function beautyspa_slider_layout_banner( $control ) { 
        
        if( 'banner' == $control->manager->get_setting('slider_layout')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

if ( ! function_exists( 'beautyspa_slider_layout_post' ) ) :

    function beautyspa_slider_layout_post( $control ) { 
        
        if( 'sliderpost' == $control->manager->get_setting('slider_layout')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

function beautyspa_customize_partial_blogname() {
	bloginfo( 'name' );
}
function beautyspa_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function beautyspa_header_social() {
	return $wl_theme_options['beauty_options_social_header'];
}
function beautyspa_header_search() {
	return $wl_theme_options['beauty_options_search_header'];
}
function beautyspa_service() {
	return $wl_theme_options['beauty_options_service_title'];
}
function beautyspa_portfolio() {
	return $wl_theme_options['beauty_options_portfolio_title'];
}
function beautyspa_blog() {
	return $wl_theme_options['beauty_options_blog_title'];
}
function beautyspa_footer_social() {
	return $wl_theme_options['beauty_options_social_footer'];
}
function beautyspa_footer() {
	return $wl_theme_options['beauty_options_footer_text'];
}


/* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'beautyspa_category_Control' ) ) :
class beautyspa_category_Control extends WP_Customize_Control 
{   public function render_content(){ ?>
		<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
		<?php  $beautyspa_category = get_categories(); ?>
		<select <?php $this->link(); ?> >
			<option value= "" <?php if($this->value()=='') echo 'selected="selected"';?>><?php esc_html_e('Default Image','beautyspa'); ?></option>
			<?php foreach($beautyspa_category as $category){ ?>
				<option value= "<?php echo esc_attr($category->cat_name); ?>" <?php if($this->value()=='') echo 'selected="selected"';?> ><?php echo esc_html($category->cat_name); ?></option>
			<?php } ?>
		</select> <?php
	}
}
endif;


?>