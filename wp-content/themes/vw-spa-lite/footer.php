<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Spa Lite
 */
?>
    <div id="footer" class="copyright-wrapper">
      <div class="container">
        <div class="row footer-sec">
           <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-3' ); ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-4' ); ?>
            </div>
        </div>
      <div>
      <div class="copyright text-center">
        <p><?php echo esc_html(get_theme_mod('vw_spa_lite_footer_copy',__('Spa WordPress Theme By','vw-spa-lite'))); ?> <?php vw_spa_lite_credit(); ?></p>
      </div>
      <div class="clear"></div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>