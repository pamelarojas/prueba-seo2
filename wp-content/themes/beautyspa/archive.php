<?php 
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

get_header(); ?>
<div class="container-fluid spa-heading">	
	<div class="container">
		<?php if(have_posts()) : ?>
			<h1><?php the_archive_title(); ?>
		    </h1>
		<?php endif; ?>	
		<?php if(get_theme_mod('beauty_options_breadcrumb')!=''){ ?>
		<ul class="beautyspa-bredcum">
            <?php beautyspa_breadcrumb_trail(); ?> 
        </ul>
		<?php } ?>
	</div>	
</div>
<div class="container-fluid space">
	<div class="container">
		<div class="col-md-9 rightside">
				<?php if ( have_posts()): 
					while ( have_posts() ): the_post(); ?>
					<?php get_template_part('template-parts/post','content'); ?>
					<?php endwhile; 
					else:
						get_template_part('nocontent');
				endif; ?>
				<div class="col-md-12 beautyspa_blog_pagination">
					<div class="beautyspa_blog_pagi">
						<p class="single-next"><?php previous_posts_link(); ?></p>	
						<p class="single-prev"><?php next_posts_link(); ?></p>
					</div>
				</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>