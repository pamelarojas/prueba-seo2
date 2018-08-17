<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Delight Spa
 */
?>


        <div class="copyright-wrapper">
        	<div class="inner">
                <div class="copyright">
                	<p><?php esc_attr(bloginfo('name')); ?> <?php echo date('Y'); ?> | <?php _e('All Rights Reserved','delight-spa'); ?></p> 
                </div><!-- copyright --><div class="clear"></div>         
            </div><!-- inner -->
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>