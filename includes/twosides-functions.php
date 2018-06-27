<?php 
defined( 'ABSPATH' ) or die( 'X' );
/**
comment_class() uses the following global variables. So these variables can be set prior to calling comment_class() to effect the output:
https://www.smashingmagazine.com/2012/05/adding-custom-fields-in-wordpress-comment-form/
    $comment_alt
    $comment_depth
    $comment_thread_alt
    @args 'callback' changes to the HTML layout. 
    */

/**
 * add custom comment type
 *
 * @returns $content
 https://stackoverflow.com/questions/8234673/wordpress-how-to-adding-a-custom-comment-type
 */

add_filter( 'preprocess_comment', 'preprocess_comment_handler' );
function preprocess_comment_handler( $commentdata ) 
{

    if ( isset( $_POST['comment_type'] ) ) {
        $commentdata['comment_type'] = $_POST['comment_type'];
    }
    return $commentdata;

}

/**
 * Comment form pos 
 *
 * @returns $content
 */    
add_filter('comment_form_defaults', 'twosides_defaults_comments_positive');    
function twosides_defaults_comments_positive($default)
{    

if ( post_password_required() ) {
	return;
}
if( is_single() ) : 
    global $comment_id;

    $action = empty( $_REQUEST['action_positive'] ) ? false : $_REQUEST['action_positive'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action != false ) 
    {  
        if( isset(  $_POST['twosides_positive'] ) ){ 
            $ctype     = $_POST['twosides_positive'];
            $commenter = wp_get_current_commenter();
            $req       = get_option( 'require_name_email' );
            $aria_req  = ( $req ? " aria-required='true'" : '' );

    $default['fields']['url'] = '<p class="comment-form-twosides '. $ctype .'">
    <label for="twosides"></label>
    <input id="twosides" name="twosides" type="hidden" 
    value="'. $ctype .'" size="30"  tabindex="4" />
    <input type="hidden" name="comment_type" value="twosides_positive" id="comment_type" /></p>';
        }

    }     return $default; 
endif;      
}

/**
 * Comment form neg 
 *
 * @returns $content
 */    
add_filter('comment_form_defaults', 'twosides_defaults_comments_negative');    
function twosides_defaults_comments_negative($default)
{    

if ( post_password_required() ) {
	return;
}
if( is_single() ) : 
    global $comment_id; 

    $action = empty( $_REQUEST['action_negative'] ) ? false : $_REQUEST['action_negative'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action !=  false ) 
    {  
        if( isset( $_POST['twosides_negative'] ) )
        { 
            $ctype     = $_POST['twosides_negative']; 
            $commenter = wp_get_current_commenter();
            $req       = get_option( 'require_name_email' );
            $aria_req  = ( $req ? " aria-required='true'" : '' );

        $default['fields']['url'] = '<p class="comment-form-twosides '. $ctype .'">
        <label for="twosides"></label>
        <input id="twosides" name="twosides" type="hidden" 
        value="'. $ctype .'" size="30"  tabindex="4" />
        <input type="hidden" name="comment_type" value="twosides_negative" id="comment_type" /></p>';
        }
     
    } return $default;  
    
endif;
      
}

//pos
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
add_action( 'wp_footer', 'twosides_addclass_comment_formPositive' );

//neg
function twosides_addclass_comment_formNegative()
{
    $tws_footer = '';
    
    $action = empty( $_REQUEST['action_negative'] ) 
              ? false : $_REQUEST['action_negative'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action !=  false ) 
    {  
        if( isset( $_POST['twosides_negative'] ) )
        { 
            $ctype = $_POST['twosides_negative']; 
        
$tws_footer .= '<script type="text/javascript">
var element = document.getElementById("respond");
    element.classList.add("twoside-negative");
</script>';
        }
    } 
            echo $tws_footer;
           
}
add_action( 'wp_footer', 'twosides_addclass_comment_formNegative' );

