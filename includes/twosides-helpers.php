<?php 
/**
 * Meta boxes for admin display of additional commentsw information
 * @package twosides
 */
defined( 'ABSPATH' ) or die( 'X' );

// @id A1
add_action( 'add_meta_boxes', 'twosides_add_comment_meta_box' );  
// @id A2
add_action( 'edit_comment', 'twosides_save_custom_meta_box', 10, 3 ); 

/**
 * @id A1
 * Add to the admin_init function
 *
 * @since 1.0.2
 */
function twosides_add_comment_meta_box()
{
    add_meta_box(
        'twosides_comment_meta_box', 
        __('Twosides Data'), 
        'twosides_metabox_callback', 
        'comment', 
        'normal', 
        'high', 
        null
    );
}

/**
 * Show the data
 *
 * @since 1.0.2
 * @see https://www.pmg.com/blog/adding-extra-fields-to-wordpress-comments
 */
function twosides_metabox_callback($comment) 
{    
    global $comment;
    $commtype = get_comment_meta($comment->comment_ID, 'twosides_commtype', true );
    wp_nonce_field(basename(__FILE__), "twosides-meta-box-nonce"); 
    ?>
            <table class="form-table editcomment comment_xtra">
            <tbody>
            <tr>
            <td class="first"><?php esc_html_e( 'Comment Class:', 'twosides' ); ?></td>
            <td><input id="twosides_commtype" type="text" 
                name="twosides_commtype" size="20" class="code" 
                value="<?php echo esc_attr($commtype); ?>" tabindex="1" /></td>
            </tr>
           </tbody>
           </table>
        <?php
}

/**
 * Save the data
 *
 * @since 1.0.2
 * @id A2
 */
function twosides_save_custom_meta_box($comment_id)
{
    if (!isset($_POST["twosides-meta-box-nonce"]) || 
    !wp_verify_nonce($_POST["twosides-meta-box-nonce"], basename(__FILE__)))
        return $comment_id;

    if(!current_user_can("edit_post", $comment_id))
        return $comment_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $comment_id;

    $commenttype             = '';
    if( isset( $_POST["twosides_commtype"] ) )
    {
        $commenttype = wp_filter_nohtml_kses($_POST["twosides_commtype"]);
        update_comment_meta($comment_id, "twosides_commtype", $commenttype);
    }
}
