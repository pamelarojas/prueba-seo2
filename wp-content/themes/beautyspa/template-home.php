<?php //Template Name:HOME
/**
 * The template for displaying Home Page
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
get_header(); 
$wl_theme_options = beautyspa_options();
	if (is_front_page())
	{	
	get_template_part('template-parts/home','slider');
	get_template_part('template-parts/beautyspa','home');
	get_footer();

}
else {	
		get_template_part( 'page' );
} 
?>