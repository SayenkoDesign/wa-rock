<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comment-form">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'warock' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'warock' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'warock' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'warock' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'warock' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'warock' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'warock' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'warock' ); ?></p>
	<?php
	endif;
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
			  'author' =>
				'<div class="row"><div class="columns medium-6"><span class="comment-form-author comment-author"> <input id="author" name="author" placeholder="*NAME" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="15"' . $aria_req . ' /></span></div>',
			
			  'email' =>
				'<div class="columns medium-6"><span class="comment-form-email"> <input id="email" name="email" placeholder="*EMAIL" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="15"' . $aria_req . ' /></span></div></div>',
					'url' => '',
	);

	$comments_args = array( 
			'label_submit'=>'Submit',
			'comment_field' => '<div class="row"><div class="columns"><p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="*YOUR COMMENT" cols="45" rows="4" aria-required="true"></textarea></p></div></div>',
			// change the title of the reply section
			'title_reply'=>'Leave a comment',
			// remove "Text or HTML to be displayed after the set of comment fields"
			'comment_notes_after' => '',
			//get rid of Your email address will...
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);
	
	comment_form($comments_args);

	?>

</div><!-- #comments -->
