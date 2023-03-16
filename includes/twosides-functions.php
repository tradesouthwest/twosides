<?php 
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
 * @since 1.0.0
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
    
    echo ob_get_clean();
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
    
        return $twosides_commtype;
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
        add_comment_meta( $comment_id, 'twosides_commtype', $commtype );
}
/**
 * @id F2
 * Redirect commentor to same page without url parsed
 *
 * @since 1.0.2
 */

function twosides_redirect_after_comment($location)
{
    return $_SERVER["HTTP_REFERER"];
}

/**
 * @id F5
 * Preprocess metadata commentmetadata
 * 
 * @since 1.0.3
 * @see https://stackoverflow.com/questions/8234673/wordpress-how-to-adding-a-custom-comment-type
 * @param string $commentdata Adds field to valid data when passed to wp-comments-post.php
 */

function twosides_verify_comment_type_data($commentdata )
{
if ( isset( $_POST['twosides_commtype'] ) ) {
        $commentdata['twosides_commtype'] = $_POST['twosides_commtype'];
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

    $def1 = "#aafaca";
    $twosides_color_1 = $options['twosides_posibkgd'];
    if( $twosides_color_1 == '' ) $twosides_color_1   = esc_attr($def1);

    $def2 = "#faaa99";
    $twosides_color_2 = $options['twosides_negabkgd'];
    if( $twosides_color_2 == '' ) $twosides_color_2   = esc_attr($def2);  
    
    $def6 = '#ffffff';  
    $twosides_negabord = $options['twosides_negabord'];
    if( $twosides_negabord == '' ) $twosides_negabord = esc_attr($def6);  
    
    $def7 = '#ffffff';  
    $twosides_posibord = $options['twosides_posibord'];
    if( $twosides_posibord == '' ) $twosides_posibord = esc_attr($def7); 

    $htm = ''; 
    $htm .= 
    '.prohead-count,.comment-list.comments-positive .comment,#actionPositive{
      background-color: '. $twosides_color_1 .';border:1px solid '. $twosides_posibord .';
      margin-bottom: 1%;}
    .conhead-count,.comment-list.comments-negative .comment, #actionNegative{
      background-color: '. $twosides_color_2 .';border:1px solid '. $twosides_negabord .';
      margin-bottom: 1%;}';
                
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
    $tws_footer = ''; 
   
    $action = empty( $_REQUEST['action_positive'] ) 
            ? false : $_REQUEST['action_positive'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action != false ) 
    {  
        if( isset(  $_POST['twosides_positive'] ) )
        { 
            $tws_footer .=  '<script id="twosides-ftrposi">
            var element = document.getElementById("respond");
                element.classList.add("twoside-positive");
            </script>';
        }
    }
            echo $tws_footer;      
}

/**
 * Set additional field value to form
 *
 * @since 1.0.4
 */

function twosides_addclass_comment_formNegative()
{
    $tws_footer = '';
    
    $action = empty( $_REQUEST['action_negative'] ) 
            ? false : $_REQUEST['action_negative'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action !=  false ) 
    {  
        if( isset( $_POST['twosides_negative'] ) )
        {    
            $tws_footer .= '<script id="twosides-ftrnega">
            var element = document.getElementById("respond");
                element.classList.add("twoside-negative");
            </script>';
        }
    } 
            echo $tws_footer; 
}
