<?php
/**
 * The template used for displaying Home page content
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
?>
<?php  
$beauty_theme_options = beautyspa_options();
get_template_part('template-parts/home','slider'); 
if($beauty_theme_options['enable_service']==1){
	get_template_part('template-parts/home','service');
}
if($beauty_theme_options['enable_portfolio']==1){
get_template_part('template-parts/home','portfolio');
}
if($beauty_theme_options['enable_blog']==1){ 
get_template_part('template-parts/home','blog');
}
if($beauty_theme_options['enable_testimonial']==1){ 
get_template_part('template-parts/home','testimonial'); 
}
if($beauty_theme_options['enable_callout']==1){
get_template_part('template-parts/home','callout');
}
?>