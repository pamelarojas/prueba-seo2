<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
?>

<div class="row blog-description blog_gallery">
    <div <?php post_class();?>>
		<?php if(is_single() || is_page()){ ?>
			<h1 class="title"><?php the_title(); ?></h1>
		<?php }else{ ?>
			<h1><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
			<?php } ?>
			<div class="col-xs-1 blog-meta">
				 <?php if ( is_home() || is_page() || is_single()) : ?>
				<div class="blog-date">
					<span><?php echo esc_html(get_the_date('d')); ?></span>
					<span class="blog-year"><?php echo esc_html(get_the_date('M  y')); ?></span>
				</div>
				<?php endif;?>
				<?php if(comments_open()) { ?>
				<div class="blog-comment">
					<span><?php echo comments_number(esc_html__('No','beautyspa'), number_format_i18n('1'), '%'); ?></span>
					<span class="blog-year"><?php echo esc_html__('Comments','beautyspa'); ?></span>
				</div>
				<?php } ?>
			</div>
			<div class="col-xs-11 blog-detail">
			   <?php if(has_post_thumbnail()): ?>
			   <div class="img-thumbnail">
					<?php $data= array('class' =>'img-responsive'); 
						the_post_thumbnail('beautyspa-post-thumb', $data); ?>
						<div class="overlay">
						<a class="photobox_a" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>"><span class="fa fa-search icon"></span></a>
						<?php if(!is_page() && !is_single() ) { ?>
						<a href="<?php the_permalink(); ?>"><span class="fa fa-chain icon"></span></a>
						<?php } ?>
						</div>
				</div>
				<?php endif; ?>
				
				<?php if(is_single() || is_page()){ the_content(); }else{ the_excerpt(); } ?>
				<div class="row blog-text">			
				 <?php if(get_the_tag_list ()!= ''){ ?>
					<div class="col-md-12 blog-tags">
						<?php the_tags( '<span>'.esc_attr__('Tags:','beautyspa').' </span>', ' ', '' ); ?>
						</div>
				 <?php } ?>
					<?php if(get_the_category_list() != '') { ?>
					<div class="col-md-12 blog-category">
					<span><?php esc_html_e('Categories :','beautyspa'); ?></span><?php the_category('  '); ?>
					</div>
					 <?php } ?>					
				</div>
				<?php if ( !is_single() && !is_page()) : ?>
				<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Read More','beautyspa'); ?> </a>
				<?php endif;?>
				
			</div>
	</div>
</div>