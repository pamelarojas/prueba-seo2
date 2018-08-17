<?php  
/**
 * The template for displaying Home Portfolio
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

$beauty_theme_options = beautyspa_options(); 
if(get_theme_mod('beauty_options_enable_portfolio')!=''){ ?>
<!-- Portfolio Start -->
<div class="portfolio-background" <?php if(get_theme_mod('beauty_options_portfolio_background')!='') echo 'style="background-image:url('.esc_url(get_theme_mod('beauty_options_portfolio_background')).');"'; ?>>
	<div class="container-fluid space portfolio">
		<div class="container">
			<?php if(get_theme_mod('beauty_options_portfolio_title')!=''){ ?>
			<h1 class="spa-title-section"><?php echo esc_html(get_theme_mod('beauty_options_portfolio_title')); ?></h1>
			<?php if(get_theme_mod('beauty_options_portfolio_desc')!=''){ ?>
			<p class="spa-title-section-desc"><?php echo html_entity_decode(get_theme_mod('beauty_options_portfolio_desc')); ?></p>
			<?php } 
			}?>
		</div>
		<div class="container">
			<div class="row port-pics">
				<?php $args = array( 'post_type' => 'post','posts_per_page'=>4, 'post__not_in' => get_option( 'sticky_posts'),'category_name' => get_theme_mod('beauty_options_portfolio_category'));
			$home_blog= new WP_Query( $args );
			if($home_blog->have_posts()){ ?>
				<div class="grid blog_gallery">
				<?php while($home_blog->have_posts()):
			$home_blog->the_post();
				if(has_post_thumbnail()):
				$data= array('class' =>'img-responsive home-thumbnail'); ?>
					<div class="col-md-3 col-sm-6 element-item">
						<?php the_post_thumbnail('beautyspa-home-thumbnail', $data); ?>
						<div class="overlay">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<a class="photobox_a" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>"><img style="display:none" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" alt="<?php the_title_attribute(); ?>"><span class="fa fa-search icon"></span></a>
							<a href="<?php the_permalink(); ?>"><span class="fa fa-chain icon"></span></a>
						</div>
					</div>
					<?php endif;
					endwhile; 
					wp_reset_postdata(); ?>
					</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- Portfolio end -->
<?php } ?>