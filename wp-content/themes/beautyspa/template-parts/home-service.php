<?php  
/**
 * The template for displaying Home service
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

$beauty_theme_options = beautyspa_options(); 
if(get_theme_mod('beauty_options_enable_service')!=''){ ?>
<!-- Who We Are -->
	<div class="container-fluid space spa-services" id="services">
		<div class="container">
		<?php if(get_theme_mod('beauty_options_service_title')!=''){ ?>
			<h1 class="spa-title-section"><?php echo esc_html(get_theme_mod('beauty_options_service_title')); ?></h1>
			<?php if(get_theme_mod('beauty_options_service_desc')!=''){ ?>
			<p class="spa-title-section-desc"><?php echo html_entity_decode(get_theme_mod('beauty_options_service_desc')); ?></p>
			<?php } 
			}
			$args = array( 'post_type' => 'post','posts_per_page'=>3, 'post__not_in' => get_option( 'sticky_posts' ),'category_name' => get_theme_mod('beauty_options_service_category'));
			
		$home_blog= new WP_Query( $args );
		if($home_blog->have_posts()){
		while($home_blog->have_posts()):
		$home_blog->the_post(); ?>
			<div class="col-md-4 col-sm-6 ser">
				<?php if(has_post_thumbnail()): 
					$data= array('class' =>'img-responsive home-thumbnail'); ?>
						<div class="img-thumbnail">
							<?php the_post_thumbnail('beautyspa-home-thumbnail', $data); ?>
						</div>
						<?php endif; ?>
				<div class="row ser-text">
					<h3><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Read More','beautyspa'); ?> </a>
				</div>
			</div>
			<?php endwhile; } 
			wp_reset_postdata(); ?>
		</div>
	</div>
	<!-- Who We Are -->
<?php } ?>