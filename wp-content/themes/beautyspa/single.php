<?php 
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

 get_header(); 
if(get_theme_mod('beauty_options_breadcrumb')!=''){ ?>
<div class="container-fluid w_breadcum">
<div class="container">
	<ul class="beautyspa-bredcum">
        <?php beautyspa_breadcrumb_trail(); ?> 
    </ul>
</div>
</div>
<?php } ?>
<div class="container">	
	<div class="container-fluid space">
		<div class="col-md-9 rightside">	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
			<?php get_template_part('template-parts/post','content'); ?>
			<div class="col-md-12 beautyspa_blog_pagination">
				<div class="beautyspa_blog_pagi">
					<p class="single-next"><span class="pre"></span> <?php previous_post_link('%link'); ?></p>	
					<p class="single-prev"><span class="next"> </span> <?php next_post_link('%link'); ?></p>
				</div>
			</div>
			<?php endwhile;
			else : 
			get_template_part('nocontent');
			endif;
			comments_template( '', true ); ?>
		</div>
		<?php get_sidebar(); ?>	
	</div>	
</div>
<?php get_footer(); ?>