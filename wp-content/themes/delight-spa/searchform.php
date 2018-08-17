<?php
/**
 * The template for displaying search forms in delight
 *
 * @package Delight Spa
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<?php /*<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'delight-spa' ); ?></span>*/ ?>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'delight-spa' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'delight-spa' ); ?>">
</form>
