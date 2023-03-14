<?php 
//twosides comment form

	global $user_identity, $id, $post;
	$commenter    = wp_get_current_commenter(); 
	$logged_in_as = '<p class="comment-form-item comment-form-logged-in-as">' 
	. sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">
	Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, 
	wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '</p>';

	$note = __('Your email address will not be published. ', 'twosides'); 
	
	?>
	<div class="content comment-form" id="respond">
		<h3 class="primary comment-form-hd">Leave a response</h3>
		<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" 
		id="<?php echo esc_attr( $args['id_form'] ); ?>">
		<?php if ( is_user_logged_in() ) : ?>
			<?php echo apply_filters( 'comment_form_logged_in', $logged_in_as, $commenter, $user_identity ); ?>
<?php endif; ?>
			<p class="comment-form-item comment-form-author clearfix">
				<label for="author" class="required">Name</label>
				<input id="author" name="author" type="text" 
				value="<?php echo esc_attr( $user_identity ); ?>" 
				size="20" aria-required="true" />
			</p>
			<p class="comment-form-item comment-form-email clearfix">
				<label for="email" class="required">Email</label>
				<input id="email" name="email" type="email" 
				value="<?php echo esc_attr( $commenter['comment_author_email'] ); ?>" 
				size="20" aria-required="true" placeholder="you@website.com" />
			</p>
			<p class="comment-form-item comment-form-url clearfix">
				<label for="url">Website <span class="note">(Optional)</span></label>
				<input id="url" name="url" type="url" 
				value="<?php echo esc_attr( $commenter['comment_author_url'] ); ?>" 
				size="20" placeholder="http://yourwebsite.com" />
			</p>
		<?php //option to get logged in assets or not ?>
			<p class="comment-form-item comment-form-comment clearfix">
				<label for="comment" class="required">Message</label>
				<textarea id="comment" name="comment" cols="45" rows="4" aria-required="true"></textarea>
			</p>
			<p class="note comment-form-item"><?php echo wptexturize( $note ); ?></p>
			<p class="comment-form-item">
				<input name="submit" type="submit" id="submit" value="Submit your comment" />
				<?php comment_id_fields( $id ); ?>
			</p>
		</form>
	</div>

</section>
