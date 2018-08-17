<?php  
/**
 * The template for displaying Home Blog
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
 
$beauty_theme_options = beautyspa_options(); ?>
<!-- Spa Post Start -->
<div class="container-fluid spa-post">
	<div class="container">
		<?php if(get_theme_mod('beauty_options_enable_blog')!=''){ ?>
			<h1 class="spa-title-section"><?php echo esc_html(get_theme_mod('beauty_options_blog_title')); ?></h1>
			<?php if(get_theme_mod('beauty_options_blog_desc')!=''){ ?>
			<p class="spa-title-section-desc"><?php echo html_entity_decode(get_theme_mod('beauty_options_blog_desc')); ?></p>
			<?php } 
			}
			?>
			<div class="row spa-blog-post">
			<?php $args = array( 'post_type' => 'post','posts_per_page'=>3, 'post__not_in' => get_option( 'sticky_posts' ));
		$home_blog= new WP_Query( $args );
		if($home_blog->have_posts()){
		while($home_blog->have_posts()):
		$home_blog->the_post(); ?>
				<div class="col-md-4 col-sm-6 spa-post-desc">
					<div class="col-md-12 spa-post-desc-text">
					<?php if(has_post_thumbnail()): 
					$data= array('class' =>'img-responsive home-thumbnail'); ?>
						<div class="img-thumbnail">
							<?php the_post_thumbnail('beautyspa-home-thumbnail', $data); ?>
						</div>
						<?php endif; ?>
						<div class="row spa-post-detail">
							<span class="spa-post-date"><?php echo esc_html(get_the_date('d')); ?><span><?php echo esc_html(get_the_date('M')); ?></span>		</span>
							<h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
							<?php echo esc_html(substr(get_the_excerpt(),0,get_theme_mod('excerpt_blog',55))); ?>
							<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Read More.','beautyspa'); ?></a>
						</div>
					</div>
				</div>
				<?php endwhile; } 
				wp_reset_postdata(); ?>
			</div>
	</div>
</div>