<?php 
/**
 * The template for displaying Category.
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
get_header(); ?>
<div class="container-fluid w_breadcum">
    <div class="container">
        <h1><?php the_archive_title("", false); ?></h1>
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
						esc_html_e('No content found this article','beautyspa');
				endif; ?>
				<div class="beautyspa_blog_pagination1">
				<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>