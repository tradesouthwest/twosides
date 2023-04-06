<?php
/**
 * The templater for comments.
 *
 * This is the templater that gets current comments
 * and the comment form. 
 * @since 1.0.0
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/comments_template
 * @package TwoSides
 */

add_filter( 'comments_template', 'twosides_comment_templater' );

function twosides_comment_templater( $comment_template ) {
    global $post;
    
    if ( !(is_singular() && (have_comments() || 'open' == $post->comment_status ))){ 
        return;
    }    
    $post_type_is = 'post';

    if( $post->post_type == sanitize_key($post_type_is) ){ 
      return dirname(__FILE__) . '/comments.php';
    }

} 