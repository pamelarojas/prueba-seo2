<?php  
/**
 * The template for displaying Home Slider
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

$beauty_theme_options = beautyspa_options();
if(get_theme_mod('beauty_options_enable_slider')!='') { ?>
<!-- Slider Start -->
<!-- banner code -->
<?php if(get_theme_mod('slider_layout')=='banner') { ?>
<div class="slider home-slider swiper-slide">
	<img src="<?php echo esc_url(get_theme_mod('banner_image')); ?>" class="home_slider img-responsive" />
	<div class="overlay"></div>
	<div class="container">
	<div class="carousel-caption">
		<?php if(get_theme_mod('banner_title')!='') { ?>
		<h1 class="animation animated-item-1"><span><?php echo esc_html(get_theme_mod('banner_title')); ?></span></h1> <?php } ?>
		<?php if(get_theme_mod('banner_desc')!='') { ?>
		<h2 class="animation animated-item-2"><?php echo html_entity_decode(get_theme_mod('banner_desc')); ?></h2>
		<?php } ?>
	</div>
	</div>
</div> <!-- banner code close -->
<?php } else { ?>	
<!-- Page slider --> 
	<div class="row slider">
		 <div class="swiper-container home-slider">
			<div class="swiper-wrapper">
			<?php if(get_theme_mod('slider_layout')=='slider') { 
			if(get_theme_mod('slider_page_1')!='' || get_theme_mod('slider_page_2')!='' || get_theme_mod('slider_page_3')!=''){ $args = array( 'post_type' => 'page','post_status'=>'publish', 'post__in' => array(get_theme_mod('slider_page_1'),get_theme_mod('slider_page_2'),get_theme_mod('slider_page_3')));
                } 
				else { $args = array( 'post_type' => 'page', 'posts_per_page'=>3); } 
			$home_slide = new WP_Query( $args );
				if ( $home_slide->have_posts() ):
				while ( $home_slide->have_posts() ):
				$home_slide->the_post();				
				if(has_post_thumbnail() ) { ?>			
				<div class="swiper-slide">
					<img src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="<?php  the_title_attribute(); ?>" class="home_slider img-responsive" />
					<div class="overlay"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1 class="animation animated-item-1"><span><?php the_title(); ?></span></h1>
							<?php if( '' !== get_post()->post_content ) { ?>
							<h2 class="animation animated-item-2"><?php the_excerpt(); ?></h2>
							<?php } ?>
						</div>
					</div>
				</div> 
				<?php } endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php endif;  ?> <!-- Page Slider close -->
				<!-- banner code -->
				<?php } else {
				if(get_theme_mod('beauty_options_slider_image1')!='' || get_theme_mod('beauty_options_slider_image2')!='' || get_theme_mod('beauty_options_slider_image3')!=''){ $args = array( 'post_type' => 'post','post_status'=>'publish', 'post__in' => array(get_theme_mod('beauty_options_slider_image1'),get_theme_mod('beauty_options_slider_image2'),get_theme_mod('beauty_options_slider_image3')));
                } 
				else { $args = array( 'post_type' => 'post', 'posts_per_page'=>3, 'ignore_sticky_posts' => 1); }
				$home_slide = new WP_Query( $args );
				if ( $home_slide->have_posts() ):
				while ( $home_slide->have_posts() ):
				$home_slide->the_post();				
				if(has_post_thumbnail() ) { ?>			
				<div class="swiper-slide">
					<img src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="<?php  the_title_attribute(); ?>" class="home_slider img-responsive" />
					<div class="overlay"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1 class="animation animated-item-1"><span><?php the_title();?></span></h1>
							<?php if( '' !== get_post()->post_content ) { ?>
							<h2 class="animation animated-item-2"><?php the_excerpt(); ?></h2>
							<?php } ?>
						</div>
					</div>
				</div> 
				<?php } endwhile;
				wp_reset_postdata(); 
				endif; } ?> 
			</div> <!-- end swiper-wrapper -->
			<?php } ?>
			<?php if(get_theme_mod('slider_layout')=='slider' || get_theme_mod('slider_layout')=='sliderpost') { ?>
			<!-- Add Pagination -->
			<div class="swiper-pagination swiper-pagination1"></div>
			<div class="swiper-button-next swiper-button-white swiper-button-next1"></div>
			<div class="swiper-button-prev swiper-button-white swiper-button-prev1"></div>
			<?php } ?>
		</div>
	</div>  <?php } ?>