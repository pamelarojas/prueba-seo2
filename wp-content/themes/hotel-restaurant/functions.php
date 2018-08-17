<?php 
add_action('wp_enqueue_scripts', 'hotel_restaurant');
function hotel_restaurant() {
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css' );
}

?>