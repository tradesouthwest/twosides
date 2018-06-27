<?php 
/**
* @package twosides
*/
function comments_twosides_get_comment_positive_count() {
  global $post, $comments, $wp_query, $comments_by_type;
  //return count($wp_query->comments_by_type['twosides_positive']);
   $num_comments = get_comments(
    array(
        'post_id' => get_the_ID(),
        'type' => 'twosides_positive', 
        'count' => true // return only the count
    )
);
return $num_comments;
}
/**
* @returns comment count
*/
function comments_twosides_get_comment_negative_count() {
  global $post, $comments, $wp_query, $comments_by_type;
  $num_comments = get_comments (
    array(
        'post_id' => get_the_ID(),
        'type' => 'twosides_negative', 
        'count' => true // return only the count
    )
);
return $num_comments;
}
/**
 * Shortcode 
 *
 * @returns $content
 */
function twosides_header_form_shortcode( $atts, $content = null)
{ 
if( is_single() ) :     

    $legendP = comments_twosides_get_comment_positive_count();
    $legendN = comments_twosides_get_comment_negative_count();
   

    // display header above comments list
    ob_start();
echo '
<div class="comments-above-list">
    
    <fieldset class="twosides_fieldset">
    <div class="twosides-left">
    <small>' . $legendP .'</small>
        <form name="twoside-comment-positive" method="POST" action="">
            <h4>Positive Comment</h4>
            <input type="submit" name="action_positive" value=" + " id="actionPositive">
            <input type="hidden" name="twosides_positive" value="twosides-left" id="twsPositive">
        </form>        
    </div>

    <div class="twosides-right">
        <small>' . $legendN .'</small>
        <form name="twoside-comment-negative" method="POST" action="">
            <h4>Negative Comment</h4>
            <input type="submit" name="action_negative" value=" - " id="actionNegative">
            <input type="hidden" name="twosides_negative" value="twosides-right" id="twsNegative">
        </form>
    </div>
    </fieldset>
</div>';
    $contents = ob_get_clean();
        return $contents; 
endif;
}

/**
 * get comments content meta data 
 * @TODO
 * @returns $content
 */
 
/**
 * Auto post $content shortcode 
 *
 * @returns $content
 */
function twosides_shortcode_autoto_post( $content ) {
  global $post;
  if( ! $post instanceof WP_Post ) return $content;

  switch( $post->post_type ) {
    case 'post':
      return $content . '[twosides_form_header]';

    case 'page':
      return $content;

    default:
      return $content;
  }
}
add_filter( 'the_content', 'twosides_shortcode_autoto_post' ); 
