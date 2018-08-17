<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

get_header(); ?>
<div class="container-fluid spa-heading">	
	<div class="container">
		<h1><?php esc_html_e('Error','beautyspa'); ?></h1>
		<?php if(get_theme_mod('beauty_options_breadcrumb')!=''){ ?>
		<ul class="beautyspa-bredcum">
            <?php beautyspa_breadcrumb_trail(); ?> 
        </ul>
		<?php } ?>
	</div>	
</div>
<div class="container-fluid space">
	<div class="container">
		<div class="col-md-12">
			<div class="error_404">
				<h4><?php esc_html_e('Ooops... Page Not Found !!!','beautyspa'); ?></h4>
				<p><?php esc_html_e('We are sorry, but the page you are looking for does not exist.','beautyspa'); ?></p>
				<p><a href="<?php echo esc_url(home_url( '/' )); ?>"><button class="send_button" type="submit"><?php esc_html_e('Go To Homepage','beautyspa'); ?></button></a></p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>