<?php
/**
 * @package VW Spa Lite
 * @subpackage vw-spa-lite
 * @since vw-spa-lite 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_spa_lite_header_style()
*/

function vw_spa_lite_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'vw_spa_lite_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'             => true,
		'flex-height'            => true,
		'admin-preview-callback' => 'vw_spa_lite_admin_header_image',
	) ) );
}

add_action( 'after_setup_theme', 'vw_spa_lite_custom_header_setup' );

if ( ! function_exists( 'vw_spa_lite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see vw_spa_lite_custom_header_setup().
 */
function vw_spa_lite_admin_header_image() {
?>
	<div id="headimg">		
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // vw_spa_lite_admin_header_image