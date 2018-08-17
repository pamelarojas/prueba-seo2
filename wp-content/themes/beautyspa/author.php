<?php
/**
 * The template for displaying Author Posts
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="container-fluid w_breadcum">
    <div class="container">
        <h1><?php get_the_author(); ?></h1>
        <?php if(get_theme_mod('beauty_options_breadcrumb')!=''){ ?>
		<ul class="beautyspa-bredcum">
            <?php beautyspa_breadcrumb_trail(); ?> 
        </ul>
		<?php } ?>
    </div>
</div>

<div class="container">	
	<div class="container-fluid space">
	<div class="col-md-9 rightside">
	<?php if ( have_posts()): while ( have_posts() ): the_post();
	get_template_part('post','content'); ?>
	<?php endwhile; 
	endif; 
	?>
	<div class="col-md-12 beautyspa_blog_pagination">
		<div class="beautyspa_blog_pagi">
		<p class="single-next"><?php previous_posts_link(); ?></p>	
		<p class="single-prev"> <?php next_posts_link(); ?></p>
		</div>
	</div>
	</div>		
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>	