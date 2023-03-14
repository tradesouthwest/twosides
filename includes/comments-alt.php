<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both 
 * the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Twosides
 * 
 */
global $post, $comments;
if( !(is_singular() && (have_comments() || 'open' == $post->comment_status))) {
  return;
}
  /** If the current post is protected by a password and 
   * the visitor has not yet entered the password we will 
   * return early without loading the comments. 
   * */ 
if( post_password_required() ) { return; } 
$dbug = twosides_debug_class();
?> 
  
<div id="comments" class="comments-area"> 
<h6 class="<?php echo esc_attr( $dbug ); ?>"><?php esc_html_e( 'You are using the comments template that is part of TwoSides plugin', 'twosides' ); ?></h6>

    <?php if( have_comments() ) : ?> 

  	<ul class="comment-list comments-positive"> <li>positive</li>
		<?php $tscp = wp_list_comments( array( 
								'style' => 'ul', 
								'short_ping' => true, 
								'avatar_size' => 34,
								'type' => 'twosides_positive', 
								) ); 
        if ( $tscn ) : echo $tscp; else: print('nothing yet'); endif;
	?> 
	</ul> 
	<ul class="comment-list comments-negative"> <li>negative></li>
		<?php $tscn = wp_list_comments( array( 
								'style' => 'ul', 
								'short_ping' => true,
								'avatar_size' => 34, 
								'type' => 'twosides_negative', 
								) ); 
        if ( $tscn ) : echo $tscn; else: echo esc_html('nothing yet'); endif;
	?> 
	</ul> 
	<?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twosides' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twosides' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twosides' ) ); ?></div>
    </nav>
	<?php 
		endif; // ends Check for comment navigation 
	?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'twosides' ); ?></p>
        <?php endif; ?>
	<?php endif; ?> 

    <div id="twosidesMain">
    
	<?php if( is_user_logged_in() ) : 

	$ctype = '';
	    if( isset( $_POST['twosides_positive'] ) ) { 
        $ctype   = $_POST['twosides_positive'];
        } 
        elseif( isset(  $_POST['twosides_negative'] ) ) {
               $ctype = $_POST['twosides_negative'];
            }
	comment_form(array(
        'comment_notes_after' => '',
        'comment_type'      => sanitize_text_field( $ctype ),
        'title_reply'     => esc_html__( 'Leave a reply', 'my_theme' ),
        'label_submit'  => esc_html__( 'Leave a comment', 'my_theme' ),
    ), $post_id ); 
    
    print( '<p>' . $ctype .'</p>' ); 
    ?>
	<?php else: ?>
	<?php comment_form(); ?>
	<?php endif; ?>
	
    </div>
</div> 
