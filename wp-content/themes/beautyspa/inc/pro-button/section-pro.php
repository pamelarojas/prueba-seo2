<?php
/**
 * Pro customizer section.
 */
class Beautyspa_Updgrade_Section_Pro extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 */
	public $type = 'EnigmaProVersion';

	/**
	 * Custom button text to output.
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = $this->pro_url;

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}
