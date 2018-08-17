<?php 
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
if ( is_active_sidebar( 'sidebar-primary' ) ) { ?>
<div class="col-md-3 left-sidebar ">
<?php dynamic_sidebar( 'sidebar-primary' ); ?>
<?php } else { ?>
<div class="col-md-3 left-sidebar "> 
<?php	$args = array(
	'before_widget' => '<div class="row sidebar-widget sideline">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>');
	the_widget('WP_Widget_Pages', null, $args);			
	the_widget('WP_Widget_Recent_Posts', null, $args);			
	the_widget('WP_Widget_Meta', null , $args);
	the_widget('WP_Widget_Calendar', null , $args);
} ?>
</div>