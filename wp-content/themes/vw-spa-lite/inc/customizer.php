<?php
/**
 * VW Spa Lite Theme Customizer
 *
 * @package VW Spa Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_spa_lite_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_spa_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-spa-lite' ),
	    'description' => __( 'Description of what this panel does.', 'vw-spa-lite' )
	) );

	$wp_customize->add_section( 'vw_spa_lite_left_right', array(
    	'title'      => __( 'General Settings', 'vw-spa-lite' ),
		'priority'   => 30,
		'panel' => 'vw_spa_lite_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_spa_lite_theme_options',array(
	        'default' => '',
	        'sanitize_callback' => 'vw_spa_lite_sanitize_choices'	        
	));

	$wp_customize->add_control('vw_spa_lite_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'vw-spa-lite' ),
	        'section' => 'vw_spa_lite_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-spa-lite'),
	            'Right Sidebar' => __('Right Sidebar','vw-spa-lite'),
	            'One Column' => __('One Column','vw-spa-lite'),
	            'Three Columns' => __('Three Columns','vw-spa-lite'),
	            'Four Columns' => __('Four Columns','vw-spa-lite'),
	            'Grid Layout' => __('Grid Layout','vw-spa-lite')
	        ),
	));
	
	$font_array = array(
        '' => __( 'No Fonts', 'vw-spa-lite' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-spa-lite' ),
        'Acme' => __( 'Acme', 'vw-spa-lite' ),
        'Anton' => __( 'Anton', 'vw-spa-lite' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-spa-lite' ),
        'Arimo' => __( 'Arimo', 'vw-spa-lite' ),
        'Arsenal' => __( 'Arsenal', 'vw-spa-lite' ),
        'Arvo' => __( 'Arvo', 'vw-spa-lite' ),
        'Alegreya' => __( 'Alegreya', 'vw-spa-lite' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-spa-lite' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-spa-lite' ),
        'Bangers' => __( 'Bangers', 'vw-spa-lite' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-spa-lite' ),
        'Bad Script' => __( 'Bad Script', 'vw-spa-lite' ),
        'Bitter' => __( 'Bitter', 'vw-spa-lite' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-spa-lite' ),
        'BenchNine' => __( 'BenchNine', 'vw-spa-lite' ),
        'Cabin' => __( 'Cabin', 'vw-spa-lite' ),
        'Cardo' => __( 'Cardo', 'vw-spa-lite' ),
        'Courgette' => __( 'Courgette', 'vw-spa-lite' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-spa-lite' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-spa-lite' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-spa-lite' ),
        'Cuprum' => __( 'Cuprum', 'vw-spa-lite' ),
        'Cookie' => __( 'Cookie', 'vw-spa-lite' ),
        'Chewy' => __( 'Chewy', 'vw-spa-lite' ),
        'Days One' => __( 'Days One', 'vw-spa-lite' ),
        'Dosis' => __( 'Dosis', 'vw-spa-lite' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-spa-lite' ),
        'Economica' => __( 'Economica', 'vw-spa-lite' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-spa-lite' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-spa-lite' ),
        'Francois One' => __( 'Francois One', 'vw-spa-lite' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-spa-lite' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-spa-lite' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-spa-lite' ),
        'Handlee' => __( 'Handlee', 'vw-spa-lite' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-spa-lite' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-spa-lite' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-spa-lite' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-spa-lite' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-spa-lite' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-spa-lite' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-spa-lite' ),
        'Kanit' => __( 'Kanit', 'vw-spa-lite' ),
        'Lobster' => __( 'Lobster', 'vw-spa-lite' ),
        'Lato' => __( 'Lato', 'vw-spa-lite' ),
        'Lora' => __( 'Lora', 'vw-spa-lite' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-spa-lite' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-spa-lite' ),
        'Merriweather' => __( 'Merriweather', 'vw-spa-lite' ),
        'Monda' => __( 'Monda', 'vw-spa-lite' ),
        'Montserrat' => __( 'Montserrat', 'vw-spa-lite' ),
        'Muli' => __( 'Muli', 'vw-spa-lite' ),
        'Marck Script' => __( 'Marck Script', 'vw-spa-lite' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-spa-lite' ),
        'Open Sans' => __( 'Open Sans', 'vw-spa-lite' ),
        'Overpass' => __( 'Overpass', 'vw-spa-lite' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-spa-lite' ),
        'Oxygen' => __( 'Oxygen', 'vw-spa-lite' ),
        'Orbitron' => __( 'Orbitron', 'vw-spa-lite' ),
        'Patua One' => __( 'Patua One', 'vw-spa-lite' ),
        'Pacifico' => __( 'Pacifico', 'vw-spa-lite' ),
        'Padauk' => __( 'Padauk', 'vw-spa-lite' ),
        'Playball' => __( 'Playball', 'vw-spa-lite' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-spa-lite' ),
        'PT Sans' => __( 'PT Sans', 'vw-spa-lite' ),
        'Philosopher' => __( 'Philosopher', 'vw-spa-lite' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-spa-lite' ),
        'Poiret One' => __( 'Poiret One', 'vw-spa-lite' ),
        'Quicksand' => __( 'Quicksand', 'vw-spa-lite' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-spa-lite' ),
        'Raleway' => __( 'Raleway', 'vw-spa-lite' ),
        'Rubik' => __( 'Rubik', 'vw-spa-lite' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-spa-lite' ),
        'Russo One' => __( 'Russo One', 'vw-spa-lite' ),
        'Righteous' => __( 'Righteous', 'vw-spa-lite' ),
        'Slabo' => __( 'Slabo', 'vw-spa-lite' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-spa-lite' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-spa-lite'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-spa-lite' ),
        'Sacramento' => __( 'Sacramento', 'vw-spa-lite' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-spa-lite' ),
        'Tangerine' => __( 'Tangerine', 'vw-spa-lite' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-spa-lite' ),
        'VT323' => __( 'VT323', 'vw-spa-lite' ),
        'Varela Round' => __( 'Varela Round', 'vw-spa-lite' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-spa-lite' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-spa-lite' ),
        'Volkhov' => __( 'Volkhov', 'vw-spa-lite' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-spa-lite' )
    );

	//Typography
	$wp_customize->add_section( 'vw_spa_lite_typography', array(
    	'title'      => __( 'Typography', 'vw-spa-lite' ),
		'priority'   => 30,
		'panel' => 'vw_spa_lite_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_paragraph_color', array(
		'label' => __('Paragraph Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_paragraph_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( 'Paragraph Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('vw_spa_lite_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_spa_lite_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_typography',
		'setting'	=> 'vw_spa_lite_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_atag_color', array(
		'label' => __('"a" Tag Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_atag_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( '"a" Tag Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_li_color', array(
		'label' => __('"li" Tag Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_li_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( '"li" Tag Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_h1_color', array(
		'label' => __('H1 Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_h1_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( 'H1 Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('vw_spa_lite_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_spa_lite_h1_font_size',array(
		'label'	=> __('H1 Font Size','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_typography',
		'setting'	=> 'vw_spa_lite_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_h2_color', array(
		'label' => __('h2 Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_h2_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( 'h2 Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('vw_spa_lite_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_spa_lite_h2_font_size',array(
		'label'	=> __('h2 Font Size','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_typography',
		'setting'	=> 'vw_spa_lite_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_h3_color', array(
		'label' => __('h3 Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_h3_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( 'h3 Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('vw_spa_lite_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_spa_lite_h3_font_size',array(
		'label'	=> __('h3 Font Size','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_typography',
		'setting'	=> 'vw_spa_lite_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_h4_color', array(
		'label' => __('h4 Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_h4_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( 'h4 Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('vw_spa_lite_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_spa_lite_h4_font_size',array(
		'label'	=> __('h4 Font Size','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_typography',
		'setting'	=> 'vw_spa_lite_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_h5_color', array(
		'label' => __('h5 Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_h5_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( 'h5 Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('vw_spa_lite_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_spa_lite_h5_font_size',array(
		'label'	=> __('h5 Font Size','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_typography',
		'setting'	=> 'vw_spa_lite_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'vw_spa_lite_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_spa_lite_h6_color', array(
		'label' => __('h6 Color', 'vw-spa-lite'),
		'section' => 'vw_spa_lite_typography',
		'settings' => 'vw_spa_lite_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('vw_spa_lite_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_spa_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_spa_lite_h6_font_family', array(
	    'section'  => 'vw_spa_lite_typography',
	    'label'    => __( 'h6 Fonts','vw-spa-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('vw_spa_lite_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_spa_lite_h6_font_size',array(
		'label'	=> __('h6 Font Size','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_typography',
		'setting'	=> 'vw_spa_lite_h6_font_size',
		'type'	=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'vw_spa_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-spa-lite' ),
		'priority'   => 30,
		'panel' => 'vw_spa_lite_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_spa_lite_slidersettings-page-' . $count, array(
				'default'           => '',
				'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'vw_spa_lite_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-spa-lite' ),
			'section'  => 'vw_spa_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
	
	//home page setting pannel
	$wp_customize->add_section('vw_spa_lite_topbar',array(
        'title' => __('Contact Info','vw-spa-lite'),
        'description'   => __('Contact Info','vw-spa-lite'),
        'panel' => 'vw_spa_lite_panel_id',
    ));
    
    $wp_customize->add_setting('vw_spa_lite_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	));
	
	$wp_customize->add_control('vw_spa_lite_contact',array(
		'label'	=> __('Contact','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	));
	
	$wp_customize->add_control('vw_spa_lite_email',array(
		'label'	=> __('Email','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_topbar',
		'type'		=> 'text'
	));
    
    //Follow us
	$wp_customize->add_section('vw_spa_lite_social_icon',array(
        'title' => __('Social Icon','vw-spa-lite'),
        'description'   => __('social links','vw-spa-lite'),
        'panel' => 'vw_spa_lite_panel_id',
    ));

    $wp_customize->add_setting('vw_spa_lite_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_twitter_url',array(
		'label'	=> __('Twitter url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_spa_lite_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_google_plus_url',array(
		'label'	=> __('Google plus url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_spa_lite_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_facebook_url',array(
		'label'	=> __('Facebook url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_spa_lite_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_pinterest_url',array(
		'label'	=> __('Pinterest url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_spa_lite_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_linkedin_url',array(
		'label'	=> __('Linkedin url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_spa_lite_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_instagram_url',array(
		'label'	=> __('Instagram url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'url'
	));

	//Our Amenities
	$wp_customize->add_section('vw_spa_lite_amaze_service_section',array(
		'title'	=> __('Amazing Service','vw-spa-lite'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'vw_spa_lite_panel_id',
	));
	
	$wp_customize->add_setting('vw_spa_lite_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_spa_lite_main_title',array(
		'label'	=> __('Title','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_amaze_service_section',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_short_desc',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_spa_lite_short_desc',array(
		'label'	=> __('Short Content','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_amaze_service_section',
		'type'	=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_spa_lite_service_category_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_spa_lite_service_category_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','vw-spa-lite'),
		'section' => 'vw_spa_lite_amaze_service_section',
	));
	
	//footer section
	$wp_customize->add_section('vw_spa_lite_footer_section',array(
		'title'	=> __('Copyright','vw-spa-lite'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'vw_spa_lite_panel_id',
	));
	
	$wp_customize->add_setting('vw_spa_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('vw_spa_lite_footer_copy',array(
		'label'	=> __('Copyright Text','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_footer_section',
		'type'		=> 'text'
	));
	/** home page setions end here**/	
}
add_action( 'customize_register', 'vw_spa_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-resizer.php' );
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Spa_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Spa_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Spa_Lite_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'	=> 9,
					'title'    => esc_html__( 'VW Spa Pro', 'vw-spa-lite' ),
					'pro_text' => esc_html__( 'Upgarde Pro',         'vw-spa-lite' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/premium/salon-spa-wordpress-theme/')
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new VW_Spa_Lite_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Documentation', 'vw-spa-lite' ),
					'pro_text' => esc_html__( 'Docs', 'vw-spa-lite' ),
					'pro_url'  => admin_url( 'themes.php?page=vw_spa_lite_guide' )
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-spa-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-spa-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Spa_Lite_Customize::get_instance();