<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
?>

<div class="col-md-8">
	<div class="error_404">
		<h4><?php esc_html_e('Ooops... Post Not Found !!!','beautyspa'); ?></h4>
		<p><?php esc_html_e('We are sorry, but the page you are looking for does not exist.','beautyspa'); ?></p>
		<p><a href="<?php echo esc_url(home_url( '/' )); ?>"><button class="send_button" type="submit"><?php esc_html_e('Go To Homepage','beautyspa'); ?></button></a></p>
	</div>
</div>