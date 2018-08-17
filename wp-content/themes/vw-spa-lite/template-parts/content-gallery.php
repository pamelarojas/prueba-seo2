<?php
/**
 * The template part for displaying slider
 *
 * @package VW Spa Lite
 * @subpackage vw-spa-lite
 * @since VW Spa Lite 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="services-box">
    <div class="page-box">      
      <div class="box-image">
        <?php
          if ( ! is_single() ) {

            // If not a single post, highlight the gallery.
            if ( get_post_gallery() ) {
              echo '<div class="entry-gallery">';
                echo ( get_post_gallery() );
              echo '</div>';
            };

          };
        ?>  
      </div> 
      <h4><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4> 
      <div class="date-box"><i class="far fa-calendar-alt"></i>    <?php the_time( get_option( 'date_format' ) ); ?></div>   
      <div class="box-content">
        <?php the_excerpt();?>
      </div>            
      <div class="cat-box">
        <i class="fas fa-folder-open"></i>    <?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?>
      </div>
    </div>
   </div>
  <div class="clearfix"></div>
</div>