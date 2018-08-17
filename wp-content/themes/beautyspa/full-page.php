<?php //Template Name: Page Full Width
/**
 * The template used for Page Full Width
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
get_header(); ?>
<div class="container-fluid w_breadcum">
<div class="container">
<?php if(get_theme_mod('beauty_options_breadcrumb')!=''){ ?>
		<ul class="beautyspa-bredcum">
            <?php beautyspa_breadcrumb_trail(); ?> 
        </ul>
		<?php } ?>
</div>
</div>
<div class="container">	
	<div class="container-fluid space">
		<div class="col-md-12 rightside">	
			<div <?php post_class();?>>		
				<?php if ( have_posts()): 
				while ( have_posts() ): the_post();
				get_template_part('template-parts/post','content'); 
				endwhile;
				beautyspa_link_pages();
				else:
					get_template_part('template-parts/nocontent');
				endif;
				if ( comments_open() || get_comments_number() ) {
				comments_template( '', true );
				} ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>