<?php
/**
 * Singleton class for handling the theme's customizer integration.
 */
final class Beautyspa_Updgrade_Pro_Button {

	/**
	 * Returns the instance.
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
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/pro-button/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Beautyspa_Updgrade_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Beautyspa_Updgrade_Section_Pro(
				$manager,
				'beautyspa_buy_pro',
				array(
					'priority' => 0,
					'title'    => esc_html__( 'Beautyspa PRO Theme', 'beautyspa' ),
					'pro_text' => esc_html__( 'Go Pro',         'beautyspa' ),
					'pro_url'  => 'https://weblizar.com/themes/beautyspa-premium/',
				)
			)
		);
	}

	public function enqueue_control_scripts() {

		wp_enqueue_script( 'enigma-customize-controls-pro-button', trailingslashit( get_template_directory_uri() ) . 'inc/pro-button/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'enigma-customize-controls-pro-button', trailingslashit( get_template_directory_uri() ) . 'inc/pro-button/customize-controls.css' );
	}
}

// Doing this customizer thang!
Beautyspa_Updgrade_Pro_Button::get_instance();
