<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
get_header(); ?>
<div class="container-fluid spa-heading">	
	<div class="container">
		<div class="col-md-12">
			<h1><?php 
			/* translators: $s: search item */
			printf( esc_html__( 'Search Results for: %s', 'beautyspa' ), '<span>' . get_search_query() . '</span>'  ); ?>
			</h1>
			<?php if(get_theme_mod('beauty_options_breadcrumb')!=''){ ?>
			<ul class="beautyspa-bredcum"><?php beautyspa_breadcrumb_trail(); ?> </ul>
			<?php } ?>
		</div>
	</div>	
</div>
<div class="container">	
	<div class="container-fluid space">
		<div class="col-md-9 rightside">
			<?php if ( have_posts()): 
				while ( have_posts() ): the_post();
					get_template_part('template-parts/post','content'); 
				endwhile;
			else :
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