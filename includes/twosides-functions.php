<?php 
/**
 * @since ver: 1.0.2
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package twosides
 * @subpackage includes/twosides-functions
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );

// @id F2
add_filter( 'comment_post_redirect', 'twosides_redirect_after_comment' );
// @id F5 
add_filter( 'preprocess_comment', 'twosides_verify_comment_type_data' );

// @id A1
add_action( 'wp_enqueue_scripts', 'twosides_background_colors_cb' ); 
// @id A2
add_action( 'wp_footer', 'twosides_addclass_comment_formPositive' );
add_action( 'wp_footer', 'twosides_addclass_comment_formNegative' );  
// @id A7
add_action( 'comment_form', 'twosides_verify_comment_metadata' );
// @id A8
add_action( 'comment_post', 'twosides_saving_comment_meta_data');

/**
 * Insert input for twosides type to add to form
 * 
 * @id A7
 * @since 1.0.2
 * @return void
 */

function twosides_verify_comment_metadata()
{
    $twosides_commtype = '';
    $twosides_commtype = twosides_get_comment_types();
    ob_start();
    ?>
    <input id="twosides_commtype" type="hidden" name="twosides_commtype" 
           value="<?php echo esc_attr($twosides_commtype); ?>"/>
    <?php 
    
    return ob_get_clean();
}

/**
 * Establish param $ctype
 *
 * @since 1.0.3
 */
function twosides_get_comment_types()
{

    $twosides_commtype = '';
    if( isset( $_POST['twosides_positive'] ) ) { 
        $twosides_commtype = wp_filter_nohtml_kses($_POST['twosides_positive']);
    } 
    elseif( isset( $_POST['twosides_negative'] ) ) {
        $twosides_commtype = wp_filter_nohtml_kses($_POST['twosides_negative']);
    }
    
        return sanitize_key($twosides_commtype);
} 

/**
 * @id A8
 * Save metadata commentmetadata
 * 
 * @since 1.0.0
 */

function twosides_saving_comment_meta_data($comment_id)
{
    if ( ( isset( $_POST['twosides_commtype'] ) ) 
        && ( '' !== $_POST['twosides_commtype'] ) ) 
    
        $commtype = wp_filter_nohtml_kses($_POST['twosides_commtype']);
        add_comment_meta( absint($comment_id), 'twosides_commtype', $commtype );
}
/**
 * @id F2
 * Redirect commentor to same page without url parsed
 *
 * @since 1.0.2
 */

function twosides_redirect_after_comment($location)
{
    $refurl = $_SERVER["HTTP_REFERER"];
    return esc_url_raw($refurl);
}

/**
 * @id F5
 * Preprocess metadata commentmetadata
 * 
 * @since 1.0.3
 * @see https://stackoverflow.com/questions/8234673/wordpress-how-to-adding-a-custom-comment-type
 * @param string $commentdata Adds field to valid data when passed to wp-comments-post.php
 */

function twosides_verify_comment_type_data( $commentdata )
{
    if ( isset( $_POST['twosides_commtype'] ) ) {
    $commentdata['twosides_commtype'] = twosides_sanitize_post(
                                            $_POST['twosides_commtype']
                                        );
    }
    return $commentdata;

}
/**
 * @id A1
 * comment_class() uses the following global variables. 
 * https://www.smashingmagazine.com/2012/05/adding-custom-fields-in-wordpress-comment-form/
 * -$comment_alt
 * -$comment_depth
 * -$comment_thread_alt
 * returns inline-'stylesheet' changes to the HTML layout. 
 */
function twosides_background_colors_cb()
{   
    $options = get_option('twosides_admin'); 
    /* 
     * Defaults and values from options 
     */
    //twosides_submits 
    $twosides_submits  = $options['twosides_submits'];
    if( $twosides_submits == '' ) $twosides_submits = esc_attr("#ffffff");
    // "#aafaca";
    $twosides_color_1  = $options['twosides_posibkgd'];
    if( $twosides_color_1 == '' ) $twosides_color_1    = esc_attr("transparent");
    // "#faaa99";
    $twosides_color_2  = $options['twosides_negabkgd'];
    if( $twosides_color_2  == '' ) $twosides_color_2   = esc_attr("transparent");  
    // border present by default
    $twosides_posibord = $options['twosides_posibord'];
    if( $twosides_posibord == '' ) $twosides_posibord  = esc_attr('#aafaca'); 
    // border color
    $twosides_negabord = $options['twosides_negabord'];
    if( $twosides_negabord == '' ) $twosides_negabord  = esc_attr('#faaa99');  
    $twosides_maxwidth = (empty($options['twosides_maxwidth'])) 
                       ? esc_attr('915') : $options['twosides_maxwidth'];
    $twosides_padboth  = (empty($options['twosides_padboth'])) 
                       ? esc_attr('0') : $options['twosides_padboth'];
    $twosides_margleft = (empty($options['twosides_margleft'])) 
                              ? esc_attr('0') : $options['twosides_margleft'];
    $htm = ''; 
    $htm .= 
    '.twosides_fieldset input[type="submit"]#actionPositive, .twosides_fieldset input[type="submit"]#actionNegative{
    color: '. esc_attr($twosides_submits).';}
    .prohead-count,.comment-list.comments-positive .comment,#actionPositive{
      background-color: '. esc_attr($twosides_color_1) .';border:1px solid '. esc_attr($twosides_posibord) .';margin-bottom: 1%;}
    .conhead-count,.comment-list.comments-negative .comment, #actionNegative{
      background-color: '. esc_attr($twosides_color_2) .';border:1px solid '. esc_attr($twosides_negabord) .';margin-bottom: 1%;}
    #comments.comments-area.twosides, .comments-above-list{margin: 0 auto;max-width:'. esc_attr($twosides_maxwidth) .'px;}
    .comment-list.comments-positive,.comment-list.comments-negative{padding: '. absint($twosides_padboth).'px;}
    #comments.comments-area.twosides .comment-list{margin-left:'. esc_attr($twosides_margleft) .'px;}';
                
        wp_register_style( 'twosides-entry-set', false );
        wp_enqueue_style(   'twosides-entry-set' );
        wp_add_inline_style( 'twosides-entry-set', $htm );
}

/**
 * Set additional field value to form
 *
 * @since 1.0.4
 */

function twosides_addclass_comment_formPositive()
{
    $action = empty( $_REQUEST['action_positive'] ) 
            ? false : sanitize_text_field( $_REQUEST['action_positive'] );
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action != false ) 
    {  
        if( isset(  $_POST['twosides_positive'] ) )
        { 
            print( '<script id="twosides-ftrposi">
            var element = document.getElementById("respond");
                element.classList.add("twoside-positive");
            </script>' );
        }
    }      
}

/**
 * Set additional field value to form
 *
 * @since 1.0.4
 */

function twosides_addclass_comment_formNegative()
{
    $action = empty( $_REQUEST['action_negative'] ) 
            ? false : sanitize_text_field( $_REQUEST['action_negative'] );
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action !=  false ) 
    {  
        if( isset( $_POST['twosides_negative'] ) )
        {    
            print( '<script id="twosides-ftrnega">
            var element = document.getElementById("respond");
                element.classList.add("twoside-negative");
            </script>' );
        } 
    }
}
/**
 * Sanitize POST data
 * @since 1.0.2
 * @see https://tommcfarlin.com/sanitize-post-data/
 */
function twosides_sanitize_post($data)
{
    if(!$data) return; 
    $rtrn = stripslashes( sanitize_text_field( filter_input(INPUT_POST, $data) ) );
    
    return $rtrn;
}
/**
 * Sanitize GET data
 * @since 1.0.2
 */
function twosides_sanitize_get($data)
{
    if(!$data) return; 
    $rtrn = stripslashes( sanitize_text_field( filter_input(INPUT_POST, $data) ) );
    
    return $rtrn;
}