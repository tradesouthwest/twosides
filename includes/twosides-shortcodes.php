<?php 
/**
* @package twosides
*/
defined( 'ABSPATH' ) or die( 'X' );

// @id F1
add_filter( 'the_content', 'twosides_shortcode_autoto_post' ); 

/**
 * @return comment count
 * @param string $comment_type Comment type, either user-submitted comment,
 *                             trackback, or pingback.
 */
function comments_twosides_get_comment_positive_count() {
  global $post, $comments, $wp_query; //, $comments_by_type;
  
   $num_comments = get_comments(
    array(
        'post_id'    => get_the_ID(),
        'meta_key'   => 'twosides_commtype',
        'meta_value' => 'twosides_positive', 
        'count'      => true  
    ) );

    ob_start(); 
    echo '<p class="twosides-prohead">'. $num_comments .' <span class="prohead-count" style="width:' . $num_comments . 'em"> </span></p>'; 
    $comment_pos = ob_get_clean();
    return $comment_pos;
}
/**
* @returns comment count
*/
function comments_twosides_get_comment_negative_count() {
    global $post, $comments, $wp_query; //, $comments_by_type;
    //$commtype     = get_comment_meta($comment->comment_ID, 'twosides_commtype', true );
    $num_comments = get_comments (
    array(
        'post_id'    => get_the_ID(),
        'meta_key'   => 'twosides_commtype',
        'meta_value' => 'twosides_negative', 
        'count'      => true  
    ) );

    ob_start(); echo '<p class="twosides-conhead">'. $num_comments .' <span class="conhead-count" style="width:'. $num_comments .'em;"> </span></p>'; 
    $comment_con = ob_get_clean();
    return $comment_con;
}
/**
 * Shortcode 
 *
 * @returns $content
 */
function twosides_header_form_shortcode( $atts ='', $content = null)
{ 
    if( is_single() ) :    
        $options = get_option('twosides_admin'); 
        $def3 = " + ";
          $twosides_positxt     = $options['twosides_positxt'];
          if( $twosides_positxt == '' ) $twosides_positxt = $def3;  
        $def4 = " - ";
          $twosides_negatxt     = $options['twosides_negatxt'];
          if( $twosides_negatxt == '' ) $twosides_negatxt = $def4;  
        $def5 = "Positive Comment";
          $twosides_posiheader  = $options['twosides_posiheader'];
          if( $twosides_posiheader == '' ) $twosides_posiheader = $def5;  
        $def6 = "Negative Comment";
          $twosides_negaheader  = $options['twosides_negaheader'];
          if( $twosides_negaheader == '' ) $twosides_negaheader = $def6;  
          
        $legendP = comments_twosides_get_comment_positive_count();
        $legendN = comments_twosides_get_comment_negative_count();
      
          // display header above comments list
          ob_start();
    echo '
<div class="comments-above-list">
    
    <fieldset class="twosides_fieldset"> 
    <div class="twosides-left">
    <legend>' . $legendP .'</legend>
        <form name="twoside-comment-positive" method="POST" action="#commentform">
            <h4>'. esc_html__( $twosides_posiheader, 'twosides' ) .'</h4>
            <input type="submit" name="action_positive" 
            value="'. $twosides_positxt .'" id="actionPositive">
            <input id="twsPositive" type="hidden" name="twosides_positive" 
            value="twosides_positive">
        </form>  
    </div>

    <div class="twosides-right">
        <legend>' . $legendN .'</legend>
        <form name="twoside-comment-negative" method="POST" action="#commentform">
            <h4>'. esc_html__( $twosides_negaheader, 'twosides' ) .'</h4>
            <input type="submit" name="action_negative" value="'. $twosides_negatxt .'" id="actionNegative">
            <input id="twsNegative" type="hidden" name="twosides_negative" 
            value="twosides_negative">
        </form>
    </div>
    </fieldset>
</div>';

    $contents = ob_get_clean();
        return $contents; 
endif;
}

/**
 * @id F1
 * Auto post shortcode into $content
 *
 * @since 1.0.3
 * @return $content
 */

function twosides_shortcode_autoto_post( $content ) 
{
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
