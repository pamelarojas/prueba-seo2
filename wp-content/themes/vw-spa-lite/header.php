<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Spa Lite
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-spa-lite' ) ); ?>">
  
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-spa-lite'); ?></a></div>
    <div class="spa-topbar">
      <div class="container"> 
        <div class="row">       
          <div class="col-md-6">
            <?php if( get_theme_mod( 'vw_spa_lite_contact','' ) != '') { ?>
              <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_spa_lite_contact',__('512-252-3698','vw-spa-lite') )); ?></span>
            <?php } ?>
            <?php if( get_theme_mod( 'vw_spa_lite_email','' ) != '') { ?>
              <span class="email-spa"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_spa_lite_email', __('example@gmail.com','vw-spa-lite')) ); ?></span>
            <?php } ?>
          </div>
          <div class="col-md-6">
            <div class="social-icon">
              <?php if(get_theme_mod('vw_spa_lite_twitter_url','') != ''){ ?>
                <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_twitter_url','') ); ?>"><i class="fab fa-twitter"></i></a>
              <?php } ?>
              <?php if(get_theme_mod('vw_spa_lite_google_plus_url','') != ''){ ?>
                <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_google_plus_url','') ); ?>"><i class="fab fa-google-plus-g"></i></a>
              <?php } ?>
              <?php if(get_theme_mod('vw_spa_lite_facebook_url','') != ''){ ?>
                <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_facebook_url','') ); ?>"><i class="fab fa-facebook-f"></i></a>
              <?php } ?>
              <?php if(get_theme_mod('vw_spa_lite_pinterest_url','') != ''){ ?>
                <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_pinterest_url','') ); ?>"><i class="fab fa-pinterest-p"></i></a>
              <?php } ?>
              <?php if(get_theme_mod('vw_spa_lite_linkedin_url','') != ''){ ?>
                <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_linkedin_url','') ); ?>"><i class="fab fa-linkedin-in"></i></a>
              <?php } ?>
              <?php if(get_theme_mod('vw_spa_lite_instagram_url','') != ''){ ?>
                <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_instagram_url','') ); ?>"><i class="fab fa-instagram"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  <div id="header">
    <div class="container">
      <div class="row">
        <div class="logo col-md-4">
            <?php vw_spa_lite_the_custom_logo(); ?>
            <?php if ( is_front_page() && is_home() ) : ?>
              <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
              <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php endif;

            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
        </div>

        <div class="menubox nav col-md-8">
          <div class="">
  		    <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>

  <?php if ( is_singular() && has_post_thumbnail() ) : ?>
    <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'vw-spa-lite-post-image-cover' );
      $post_image = $thumb['0'];
    ?>
    <div class="header-image bg-image" style="background-image: url(<?php echo esc_url( $post_image ); ?>)">
      <?php the_post_thumbnail( 'vw-spa-lite-post-image' ); ?>
    </div>

  <?php elseif ( get_header_image() ) : ?>
  <div class="header-image bg-image" style="background-image: url(<?php header_image(); ?>)">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
    </a>
  </div>
  <?php endif; // End header image check. ?>