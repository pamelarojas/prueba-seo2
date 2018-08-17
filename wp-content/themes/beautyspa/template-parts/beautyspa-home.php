<?php 
/**
 * The template for displaying Home
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
 
if($sections = json_decode(get_theme_mod('home_reorder'),true)) {
	foreach ($sections as $section) {
		$data = "beauty_options_enable_".$section;
		if(get_theme_mod($data)=="1") {
		get_template_part('template-parts/home', $section);
		}
	}
}
else {
	if(get_theme_mod('beauty_options_enable_service') == "1") {
	get_template_part('template-parts/home','service'); 
	}
	if(get_theme_mod('beauty_options_enable_portfolio') == "1") {
	get_template_part('template-parts/home','portfolio'); 
	}
	if(get_theme_mod('beauty_options_enable_blog') == "1") {
	get_template_part('template-parts/home','blog');
	}
}
?>