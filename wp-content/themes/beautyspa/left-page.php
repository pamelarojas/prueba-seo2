<?php //Template Name: Page With Left Sidebar
/**
 * The template used for Page With Left Sidebar
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

get_header(); 
if(get_theme_mod('beauty_options_breadcrumb')!=''){ ?>
<div class="container-fluid w_breadcum">
<div class="container">
	<ul class="beautyspa-bredcum"><?php beautyspa_breadcrumb_trail(); ?> </ul>
</div>
</div>
<?php } ?>
<div class="container-fluid space">
<div class="container">	
		<?php get_sidebar(); ?>
		<div class="col-md-9 rightside">	
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
				}	?>
			</div>
		</div>
</div>
</div>
<?php get_footer(); ?>