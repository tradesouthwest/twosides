<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Onlister
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

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<ul class="comment-list comments-positive">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'type' => 'twosides_positive',
				) );
			?>
		</ul><!-- .comment-list -->
			<ul class="comment-list comments-negative">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'type' => 'twosides_negative',
				) );
			?>
		</ul><!-- .comment-list -->

	<?php endif; ?>
	<?php comment_form(); ?>

</div><!-- #comments -->
