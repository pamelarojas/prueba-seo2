<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
$beauty_theme_options = beautyspa_options(); ?>
<!-- Footer start -->
<?php 
if ( is_active_sidebar( 'footer-widget-area' ) ){ ?>
<div class="container-fluid space footer">
	<div class="container">
	 
	     <?php	dynamic_sidebar( 'footer-widget-area' ); ?>
	
	  </div>
</div>
<?php } else { ?>
<div class="container-fluid space footer">
	<div class="container">
	<?php $args = array(
		'before_widget' => '<div class="col-md-3 col-sm-6 widget-footer">',
		'after_widget' => '</div>',
		'before_title' => '<div class="col-md-12 footer-heading"><h3>',
		'after_title' => '</h3></div>');
		the_widget('WP_Widget_Pages', null, $args);			
		the_widget('WP_Widget_Recent_Posts', null, $args);			
		the_widget('WP_Widget_Meta', null , $args);
		the_widget('WP_Widget_Calendar', null , $args);
	} ?>
	</div>
</div>
<div class="container-fluid footer-bottom">
	<div class="container">
		<div class="row footer-copyright">
			<div class="col-md-9 col-sm-6 f_copyright">
			<?php if(get_theme_mod('beauty_options_footer_text')!=''){ 
				echo esc_html(get_theme_mod('beauty_options_footer_text'));
			if(get_theme_mod('beauty_options_footer_link_text')!=''){ ?>
			 <a class="social1" href="<?php echo esc_url(get_theme_mod('beauty_options_footer_link')); ?>" target="_blank" ><?php echo esc_html(get_theme_mod('beauty_options_footer_link_text')); ?></a>
			<?php }			
			 } else { ?>
				<div>© 2018 Theme Preview. All Rights Reserved. BeautySpa by <a href="https://www.weblizar.com">Weblizar </a>. Powered by <a href="http://wordpress.org">WordPress</a></div>
			<?php } ?>
			</div>
			<?php if(get_theme_mod('beauty_options_social_footer')){ ?>
			<div class="col-md-3 col-sm-6 f_social">
				<div class="right-align">
					<ul class="social">
						<?php if(get_theme_mod('beauty_spa_facbook_link')!=''){ ?>
						<li class="facebook"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_facbook_link')); ?>"><i class="fa fa-facebook"></i></a></li> 
						<?php }
						if(get_theme_mod('beauty_spa_twitter_link')!=''){ ?>
						<li class="twitter"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_twitter_link')); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php } 
						if(get_theme_mod('beauty_spa_youtube_link')!=''){ ?>
						<li class="youtube"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_youtube_link')); ?>"><i class="fa fa-youtube"></i></a></li>
						<?php } 
						if(get_theme_mod('beauty_spa_linkdin_link')!=''){ ?>
						<li class="linkedin"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_linkdin_link')); ?>"><i class="fa fa-linkedin"></i></a></li>
						<?php } 
						if(get_theme_mod('beauty_spa_goglpls_link')!=''){ ?>
						<li class="google"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_goglpls_link')); ?>"><i class="fa fa-google-plus"></i></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Footer End -->
</div>
<?php wp_footer();?>
</body>
</html>