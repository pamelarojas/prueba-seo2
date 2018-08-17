<?php
/**
 * The template for displaying the header
 *
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
  <div class="wrraper">
   <header id="top" style='background-image: url("<?php header_image(); ?>");'>
		<div class="container-fluid spa-top">
			<div class="container">
				<div class="col-md-6 col-sm-6 top-social">
				<?php if(get_theme_mod('beauty_options_social_header')==1){ ?>
					<ul class="social">
						<?php if(get_theme_mod('beauty_spa_facbook_link')!=''){ ?>
						<li class="facebook"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_facbook_link')); ?>"><i class="fa fa-facebook"></i></a></li> 
						<?php }
						if(get_theme_mod('beauty_spa_twitter_link')!=''){ ?>
						<li class="twitter"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_twitter_link')); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php } 
						if(get_theme_mod('beauty_spa_youtube_link')!=''){ ?>
						<li class="youtube"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_youtube_link')); ?>"><i class="fa fa-youtube"></i></a></li>
						<?php } 
						if(get_theme_mod('beauty_spa_linkdin_link')!=''){ ?>
						<li class="linkedin"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_linkdin_link')); ?>"><i class="fa fa-linkedin"></i></a></li>
						<?php } 
						if(get_theme_mod('beauty_spa_goglpls_link')!=''){ ?>
						<li class="google"><a href="<?php echo esc_url(get_theme_mod('beauty_spa_goglpls_link')); ?>"><i class="fa fa-google-plus"></i></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
				</div>
				<div class="col-md-6 col-sm-6 top-search">
					<?php if(get_theme_mod('beauty_options_search_header')==1){ get_search_form(); } ?>
				</div>
			</div>
		</div>
	<nav <?php if(get_theme_mod('beauty_options_sticky_header')==1) echo 'id="site-header"'; ?> class="navbar navbar-default menu" 
	<?php if ( has_header_image() ) { ?> style='background-image: url("<?php header_image(); ?>")' <?php  } ?> >
		<div class="container-fluid">
			<div class="container">
				<div class="row spa-menu-head">
					<div class="col-md-3 navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
				 <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
				  <?php if (has_custom_logo()) { the_custom_logo(); } else { ?> <h1><?php echo esc_html(get_bloginfo('name')); } ?></h1>
				  </a>	
						<p><?php esc_html(bloginfo('description')); ?></p> 
				  </div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <?php wp_nav_menu( array(
						'theme_location' => 'beautyspa-menu',
						'menu_class' => 'nav navbar-nav navbar-right',
			            'fallback_cb' => 'beautyspa_fallback_page_menu',
						'walker' => new beautyspa_nav_walker(),
						)
						);	?>
				</div>
			</div>
		</div>
		</nav>
</header>