<?php 
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) : ?>
	<p><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'beautyspa' ); ?></p>
	<?php return; endif; ?>
    <?php if ( have_comments() ) : ?>
	<div class="row comment-section">		
	<h3><i class="fa fa-comments"></i><?php echo comments_number(esc_html__('No Comments','beautyspa'), esc_html__('1 Comment','beautyspa'), esc_html__('% Comments','beautyspa')); ?></h3>
	<?php wp_list_comments( array( 'callback' => 'beautyspa_comment' ) ); ?>		
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="row blog-pagination">
			<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'beautyspa' ); ?></h1>
			<div class="previous"><?php previous_comments_link(esc_html__( '&larr; Older Comments', 'beautyspa' ) ); ?></div>
			<div class="next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'beautyspa' ) ); ?></div>
		</nav>
		<?php endif;  ?>
	</div>		
	<?php endif; ?>
	
<?php if ( comments_open() ) : ?>
	<div class="row blog-feedback">
	<?php $fields=array(
		'author' => '<div class="form-group col-md-6"><label for="name">'. esc_html__( 'Name','beautyspa').'<small>*</small></label><input name="author" id="name" type="text" id="exampleInputEmail1" class="form-control"></div>',
		'email' => '<div class="form-group col-md-6"><label for="email">'. esc_html__( 'Email','beautyspa').'<small>*</small></label><input  name="email" id="email" type="text" class="form-control"></div>',
	);
	function beautyspa_comment_fields($fields) { 
		return $fields;
	}
	add_filter('wl_comment_form_default_fields','beautyspa_comment_fields');
		$defaults = array(
		'fields'=> apply_filters( 'wl_comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form-group col-md-12"><label for="message">'.esc_html__('Message','beautyspa').'</label>
		<textarea id="comment" name="comment" class="form-control" rows="5"></textarea></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . esc_html__( "Logged in as ",'beautyspa' ).'<a href="'. esc_url(admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( esc_url(get_permalink() )).'" title="'. esc_attr__("Log out of this account","beautyspa").'">'.esc_html__(" Log out?",'beautyspa').'</a>' . '</p>', /* translators: %s: reply to name */ 
		'title_reply_to' => esc_html__( 'Leave Your comments Here to %s','beautyspa'),
		'class_submit' => 'btn',
		'label_submit'=>esc_html__( 'Post Comment','beautyspa'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> '<h3>'.esc_html__('Leave Your Comment Here','beautyspa').'</h3>',		
		'role_form'=> 'form',		
		);
		comment_form($defaults); ?>		
		
</div>
<?php endif; // If registration required and not logged in ?>