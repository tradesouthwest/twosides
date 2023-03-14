<?php 
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );

// @id F2
add_filter('comment_post_redirect', 'twosides_redirect_after_comment');
// @id F5  TODO: is this important?
add_filter( 'preprocess_comment', 'twosides_verify_comment_type_data' );
// @id A1
add_action( 'wp_enqueue_scripts', 'twosides_background_colors_cb' ); 
// @id A2
add_action( 'wp_footer', 'twosides_addclass_comment_formPositive' );
add_action( 'wp_footer', 'twosides_addclass_comment_formNegative' );  
// @id A6
//add_action('save_post', 'twosides_modify_comment_type_data' );
// @id A7
add_action( 'comment_form_after_fields', 'twosides_verify_comment_meta_data');
// @id A8
add_action( 'comment_post', 'twosides_saving_comment_meta_data');


/**
 * Find twosides type to add to form
 * 
 * @id A7
 * https://stackoverflow.com/questions/8234673/wordpress-how-to-adding-a-custom-comment-type
 * 
 */

function twosides_verify_comment_meta_data()
{
    $twosides_commtype = '';
    $twosides_commtype = twosides_get_comment_types();
    ?>
    <input id="twosides_commtype" type="hidden" name="twosides_commtype" 
           value="<?php echo esc_attr($twosides_commtype); ?>"/> 
    <?php 
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
 * Save metadata commentmetadata
 * 
 * @since 1.0.3
 * @id A8
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
 *
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
  $defd = 'block';   //flex works well too  
    $twosides_field_url     = $options['twosides_field_url'];
    if( $twosides_field_url == '0' ) { $twosides_field_url   = esc_attr($defd); } 
                                else { $twosides_field_url   = 'none'; }
/*
  $def3 = " + ";
    $twosides_positxt = $options['twosides_positxt'];
    if( $twosides_positxt == '' ) $twosides_positxt   = esc_attr($def3);  
  $def4 = " - ";
    $twosides_negatxt = $options['twosides_negatxt'];
    if( $twosides_negatxt == '' ) $twosides_negatxt   = esc_attr($def4);  
  
  $def5 = "6";
    $twosides_margbord = $options['twosides_margbord'];
    if( $twosides_margbord == '' ) $twosides_margbord = esc_attr($def5);  
  
   
  $def8 = "7";
    $twosides_negposh  = $options['twosides_negposh'];
    if( $twosides_negposh  == '' ) $twosides_negposh  = esc_attr($def8);  

  $defb = 'block';  
    $twosides_metadata     = $options['twosides_checkbox_metadata'];
    if( $twosides_metadata == '0' ) { $twosides_metadata     = esc_attr($defb); } 
                               else { $twosides_metadata     = 'none'; } 
  $defc = 'block';   //flex works well too  
    $twosides_twscounter     = $options['twosides_checkbox_twscounter'];
    if( $twosides_twscounter == '0' ) { $twosides_twscounter = esc_attr($defc); } 
                                 else { $twosides_twscounter = 'none'; }
  
  $twosides_addcss = (empty($options['twosides_addcss'] )) 
                     ? '' : $options['twosides_addcss']; 
                     */
    $htm = ''; 
    $htm .= '.comment-list.comments-positive .comment,#actionPositive{
      background-color: '. $twosides_color_1 .';margin-bottom: 2px; border:1px solid '. $twosides_posibord .';}
    .comment-list.comments-negative .comment, #actionNegative{
      background-color: '. $twosides_color_2 .';margin-bottom: 2px; border:1px solid '. $twosides_negabord .';}
    
    .comment-meta .says {
      display:none;}

    .prohead-count{
      border:1px solid '. $twosides_posibord .';background:'. $twosides_color_1 .'}
    .conhead-count{
      border:1px solid '. $twosides_negabord .';background:'. $twosides_color_2 .'}
    .twosides_positive,#actionPositive{
      background:'. $twosides_color_1 .'}
    #actionNegative,.twosides_negative{
      background:'. $twosides_color_2 .'}
    
    p.comment-form-url{
      display:' . $twosides_field_url .';}';
    
    $htm .= stripslashes( $twosides_addcss );   
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
            $tws_footer .=  '<script type="text/javascript">
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
            $tws_footer .= '<script type="text/javascript">
            var element = document.getElementById("respond");
                element.classList.add("twoside-negative");
            </script>';
        }
    } 
            echo $tws_footer; 
}

/**
 * grab state of debug option
 */
function twosides_debug_class()
{
    $tws_dbug   = 'twshow';
    $options    = get_option('twosides_admin'); 
    $listbox    = (empty($options['twosides_checkbox_commlists'] )) 
                  ? 0 :  $options['twosides_checkbox_commlists'];
    $dbugs      = (empty($options['twosides_debug'] )) 
                  ? 0 :  $options['twosides_debug'];
    if( $listbox != 1 ) :
	if( $dbugs   == 0 ) { 
	    $tws_dbug = 'twshide';
        } else {
        $tws_dbug = 'twsshow';
    }
    endif;
        return $tws_dbug;
} 
