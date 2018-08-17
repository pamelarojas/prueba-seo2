<?php
/**
 * delight Theme Customizer
 *
 * @package Delight Spa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function delight_spa_customize_register( $wp_customize ) {

function delight_spa_format_for_editor( $text, $default_editor = null ) {
    if ( $text ) {
        $text = htmlspecialchars( $text, ENT_NOQUOTES, get_option( 'blog_charset' ) );
    }
 
    /**
     * Filter the text after it is formatted for the editor.
     *
     * @since 4.3.0
     *
     * @param string $text The formatted text.
     */
    return apply_filters( 'delight_spa_format_for_editor', $text, $default_editor );
}

//Add a class for titles
    class delight_spa_info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
		
	/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Delight_spa_customize_sec_upsell extends WP_Customize_Section {

	public $type = 'upsell';

	public $pro_text = '';

	
	public $pro_url = '';

	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );

		return $json;
	}

	
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand" style="display: block!important;">

			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

	// Register custom section types.
	$wp_customize->register_section_type( 'delight_spa_customize_sec_upsell' );

	// Register sections.
	$wp_customize->add_section(
		new delight_spa_customize_sec_upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Upgrade to PRO Version', 'delight-spa' ),
				'pro_text' => esc_html__( 'Buy Pro', 'delight-spa' ),
				'capability'    => 'edit_theme_options',
				'pro_url'  => 'http://themesware.com/product/delight-spa/',
				'priority'  => 1,
			)
		)
	);

	$wp_customize->add_setting('color_scheme', array(
		'default' => '#FF8093',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','delight-spa'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'delight-spa'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567)','delight-spa'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'delight_spa_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','delight-spa'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'delight_spa_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','delight-spa'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'delight_spa_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','delight-spa'),
			'section'	=> 'slider_section'
	));	
	
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => 0,
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider','delight-spa'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
	
}
add_action( 'customize_register', 'delight_spa_customize_register' );

//Integer
function delight_spa_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function delight_spa_css(){
		?>
        <style>
				a,
				a:hover, 
				.tm_client strong,
				#footer ul li:hover a, 
				#footer ul li.current_page_item a,
				.postmeta a:hover,
				.call h3,
				.footer-menu ul li a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.woocommerce ul.products li.product .price{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#ff8093')); ?>;
				}
				#header,
				a.blog-more:hover,
				.nav-links .current, 
				.nav-links a:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.top-right .social-icons a:hover,
				.blog-date .date,
				a.read-more{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#ff8093')); ?>;
				}
		</style>
	<?php }
add_action('wp_head','delight_spa_css');


function delight_spa_custom_customize_enqueue() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'delight-customize-controls', get_template_directory_uri() . '/js/customize-controls' . $min . '.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'delight-customize-controls', get_template_directory_uri() . '/css/customize-controls' . $min . '.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'delight_spa_custom_customize_enqueue' );