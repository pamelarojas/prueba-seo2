<?php 
/**
 * The template for comments function
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
// code for comment
if ( ! function_exists( 'beautyspa_comment' ) ) :
function beautyspa_comment( $comment, $args, $depth ) 
{
	//get theme data
	global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	'<i class="fa fa-mail-reply"></i> '.esc_html__('Reply','beautyspa'); ?>
<div class="row blog-comments">
    <div class="col-xs-12 comment-detail">
		<a class="col-xs-2 comments-pics">
		<?php echo get_avatar(get_the_author_meta( 'ID' ),$size = '150'); ?>
		</a>
		<div class="col-xs-10 comments-text">
			<h3><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a></h3>
			<span>
			<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>				
			<a href="#comment"><?php comment_date('F j, Y');?></a>
			<?php else : ?>
			<a href="#comment"><?php comment_date(); ?></a>
			<?php endif; ?>
			<?php esc_html_e('at','beautyspa');?>&nbsp;<?php comment_time('g:i a'); ?></span>
			<?php comment_text(); ?>				
			<div class="beautyspa-reply_text">
			<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'beautyspa' ); ?></em>
			<br/>
			<?php endif; ?>
		</div>							
	</div>
</div>
<?php } 
endif; ?>