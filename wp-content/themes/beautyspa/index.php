<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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
<!-- Blog Side Bar -->
<div class="container-fluid space">
	<div class="container">
		<!-- Right Side -->
		<div class="col-md-9 rightside">
				<?php if ( have_posts()): 
					while ( have_posts() ): the_post(); ?>
					<?php get_template_part('template-parts/post','content'); ?>
					<?php endwhile; 
					else:
						get_template_part('template-parts/nocontent');
				endif; ?>
				<div class="beautyspa_blog_pagination1">
				<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
			</div> 
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>