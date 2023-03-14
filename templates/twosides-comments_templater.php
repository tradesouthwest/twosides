<?php
/**
 * The templater for comments.
 *
 * This is the templater that gets current comments
 * and the comment form. 
 * 
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/comments_template
 * @package TwoSides
 */

add_filter( 'comments_template', 'twosides_comment_templater' );
function twosides_comment_templater( $comment_template ) {
  global $post;
  
  if ( !( is_singular() && ( have_comments() || 'open' == 
  $post->comment_status ) ) ) {
     return;
  }
  
  $post_type_is = 'post';
  $options      = get_option('twosides_admin'); 
  $checkbox     = (empty($options['twosides_checkbox_commlists'] )) 
                   ? 0 : $options['twosides_checkbox_commlists'];
  //if( is_single() && $checkbox == 0 ) {

    if( $post->post_type == $post_type_is ){ 
      return dirname(__FILE__) . '/comments.php';
    }
  //}
} 