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
 * @since 1.0.1
 */
global $post, $comments; $commentn = $commentp = '';
if ( !comments_open() ) {
  return;
}
  /** If the current post is protected by a password and 
   * the visitor has not yet entered the password we will 
   * return early without loading the comments. 
   * */ 
if( post_password_required() ) { return; } 

?> 
  
<div id="comments" class="comments-area"> 

    <?php if( have_comments() ) : ?> 

       <ul class="comment-list comments-positive">  
		<?php 
        $commentp = get_comments( array(
            'post_id'  => get_the_ID(),
            'meta_key'  => 'twosides_commtype',
            'meta_value' => 'twosides_positive', 
            )
        );
        wp_list_comments( array( 
			'style' => 'ul', 
			'short_ping' => true,
			'avatar_size' => 34, 
            ), 
            $commentp
        ); 
	?> 
	</ul> 

	<ul class="comment-list comments-negative">  
		<?php 
        $commentn = get_comments( array(
            'post_id'  => get_the_ID(),
            'meta_key'  => 'twosides_commtype',
            'meta_value' => 'twosides_negative', 
            )
        );
        wp_list_comments( array( 
			'style' => 'ul', 
			'short_ping' => true,
			'avatar_size' => 34, 
            ), 
            $commentn
        ); 
	?> 
	</ul> 
    <?php
        // Comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>

        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'twosides' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twosides' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twosides' ) ); ?></div>
        </nav>
    <?php 
    endif; // ends Check for comment navigation 
    ?>
    <?php 
    if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'twosides' ); ?></p>
    <?php 
    endif; 
    ?>
	
    <?php endif; ?> 

    <?php 
    /* ******** ******** ******** ********
     * Starts slide-in form for commenting 
     * ******* ******** ******** ******** */
    ?>
    
    <div id="twosidesMain">

        <?php 
        $ctype = twosides_get_comment_types();
        $args  =  array( 
            'comment_notes_after' => '<input id="twosides_commtype" type="hidden" 
                    name="twosides_commtype"  value="'.esc_attr($ctype).'"/>'
            );
    
            comment_form($args);    
        ?>

    </div>
</div>
<div class="clearfix clear"></div> 