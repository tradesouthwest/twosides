<?php 
/**
 * @since ver: 1.0.1
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package twosides
 * @subpackage includes/twosides-admin-forms
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' ); 
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.1
 */
function twosides_posibkgd_cb() 
{ 
    
    $def              = "transparent";
    $options          = get_option('twosides_admin'); 
    $twosides_color_1 = $options['twosides_posibkgd'];
    if( $twosides_color_1 == '' ) $twosides_color_1 = esc_attr($def);
    ?>
    <label class="olmin"><?php esc_html_e( 
        'Select color for background of positive comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_twosides_posibkgd" 
           name="twosides_admin[twosides_posibkgd]"
           class="twosides-color-field" data-default-color="#aafaca"
           value="<?php echo esc_attr($twosides_color_1); ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default title
 * @since  1.0.1
 */
function twosides_negabkgd_cb() 
{ 
    
    $def              = "transparent";
    $options          = get_option('twosides_admin'); 
    $twosides_color_2 = $options['twosides_negabkgd'];
    if( $twosides_color_2 == '' ) $twosides_color_2 = esc_attr($def);
    ?>
    <label class="olmin"><?php esc_html_e( 
        'Select color for background of negative comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_twosides_negabkgd" 
           name="twosides_admin[twosides_negabkgd]" 
           class="twosides-color-field" data-default-color="#faaa99" 
           value="<?php echo esc_attr($twosides_color_2); ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color Not using sanitize_hex_color() in case of transparent value.
 * @since  1.0.1
 */
function twosides_posibord_cb() 
{ 
    
    $def               = "#aafaca";
    $options           = get_option('twosides_admin'); 
    $twosides_posibord = $options['twosides_posibord'];
    if( $twosides_posibord == '' ) $twosides_posibord = esc_attr($def);
    ?>
    <label class="olmin"><?php esc_html_e( 'Select color for borders of positive comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_twosides_posibord" 
           name="twosides_admin[twosides_posibord]"
           class="twosides-color-field" data-default-color="#aafaca"
           value="<?php echo esc_attr($twosides_posibord); ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.1
 */
function twosides_negabord_cb() 
{ 
    
    $def               = "#faaa99";
    $options           = get_option('twosides_admin'); 
    $twosides_negabord = $options['twosides_negabord'];
    if( $twosides_negabord == '' ) $twosides_negabord = esc_attr($def);
    ?>
    <label class="olmin"><?php esc_html_e( 'Select color for borders of negative comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_twosides_negabord" 
           name="twosides_admin[twosides_negabord]"
           class="twosides-color-field" data-default-color="#faaa99"
           value="<?php echo esc_attr($twosides_negabord); ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.1
 */
function twosides_submits_cb() 
{ 
    
    $def              = "#ffffff";
    $options          = get_option('twosides_admin'); 
    $twosides_submits = $options['twosides_submits'];
    if( $twosides_submits == '' ) $twosides_submits = esc_attr($def);
    ?>
    <label class="olmin"><?php esc_html_e( 'Select pro/con buttons text color.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_twosides_submits" 
           name="twosides_admin[twosides_submits]"
           class="twosides-color-field" data-default-color="#ffffff"
           value="<?php echo esc_attr($twosides_submits); ?>"><br>
<?php     
}

/** 
 * Text of header
 * @since 1.0.1
 */
function twosides_posiheader_cb()
{
    $options             = get_option('twosides_admin'); 
    $twosides_posiheader = (empty($options['twosides_posiheader'] )) 
                           ? "" : $options['twosides_posiheader']; ?>
    <label class="olmin" for="twosides_posiheader"><?php esc_html_e( 
    'Set text field.', 'twosides' ); ?></label><br>
    <input type="text" name="twosides_admin[twosides_posiheader]" 
           value="<?php echo esc_attr( $twosides_posiheader ); ?>" size="35"/>
    <?php 
}
/** 
 * Text of header
 * @since 1.0.1
 */
function twosides_negaheader_cb()
{
    $options             = get_option('twosides_admin'); 
    $twosides_negaheader = (empty($options['twosides_negaheader'] )) 
                           ? "" : $options['twosides_negaheader']; ?>
    <label class="olmin" for="twosides_negaheader"><?php esc_html_e( 
    'Set text field.', 'twosides' ); ?></label><br>
    <input type="text" name="twosides_admin[twosides_negaheader]" 
           value="<?php echo esc_attr( $twosides_negaheader ); ?>" size="35"/>
    <?php 
}

/** 
 * Text of submit
 * @since 1.0.1
 */
function twosides_negatxt_cb()
{
    $options          = get_option('twosides_admin'); 
    $twosides_negatxt = (empty($options['twosides_negatxt'] )) 
                ? "" : $options['twosides_negatxt']; ?>
    <label class="olmin" for="twosides_negatxt"><?php esc_html_e( 
    'Set text field.', 'twosides' ); ?></label>
    <input type="text" name="twosides_admin[twosides_negatxt]" 
           value="<?php echo esc_attr( $twosides_negatxt ); ?>" 
           size="15"/>
    <?php 
}
/** 
 * Text of submit
 * @since 1.0.1
 */
function twosides_positxt_cb()
{
    $options          = get_option('twosides_admin'); 
    $twosides_positxt = (empty($options['twosides_positxt'] )) 
                        ? "" : $options['twosides_positxt']; ?>
    <label class="olmin" for="twosides_positxt"><?php esc_html_e( 
    'Set text field.', 'twosides' ); ?></label>
    <input type="text" name="twosides_admin[twosides_positxt]" 
           value="<?php echo esc_attr( $twosides_positxt ); ?>" size="15"/>
    <?php 
}

/** 
 * padding of comments
 * @since 1.0.4
 */
function twosides_padboth_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_padboth = (empty($options['twosides_padboth'] )) 
                       ? "0" : $options['twosides_padboth']; ?>
    <p><label class="olmin" for="twosides_padboth"><?php esc_html_e( 
'Set padding.', 'twosides' ); ?></label>
    <input type="number" name="twosides_admin[twosides_padboth]" 
           value="<?php echo esc_attr( $twosides_padboth ); ?>" 
           size="15" min="0" max="60" class="smallinput"/> px</p>
    <small><?php esc_html_e( 'Setting is in pixels. Controls all twosides comment boxes padding.',
    'twosides' ); ?></small>
    <?php 
}
/** 
 * left margin of comments
 * @since 1.0.4
 */
function twosides_margleft_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_margleft = (empty($options['twosides_margleft'] )) 
                       ? "0" : $options['twosides_margleft']; ?>
    <p><label class="olmin" for="twosides_margleft"><?php esc_html_e( 
'Set Margins Left.', 'twosides' ); ?></label>
    <input type="number" name="twosides_admin[twosides_margleft]" 
           value="<?php echo esc_attr( $twosides_margleft ); ?>" 
           size="15" min="-90" max="90" class="smallinput"/> px</p>
    <small><?php esc_html_e( 'Setting is in pixels. Controls all twosides comment boxes margin-left.',
    'twosides' ); ?></small>
    <?php 
}
/** 
 * Width
 * @since 1.0.1
 */
function twosides_maxwidth_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_maxwidth = (empty($options['twosides_maxwidth'] )) 
                ? "1170" : $options['twosides_maxwidth']; ?>
    <p><label class="olmin" for="twosides_maxwidth"><?php esc_html_e( 
'Set width.', 'twosides' ); ?></label>
    <input type="number" name="twosides_admin[twosides_maxwidth]" 
           value="<?php echo esc_attr( $twosides_maxwidth ); ?>" 
           size="15" min="0" max="99999" class="smallinput"/> px</p>
    <small><?php esc_html_e( 'Set the MAXIMUM width, in pixels, of the entire comments section.',
    'twosides' ); ?></small>
    <?php 
} 
/**
 * render information section
 * @since 1.0.2
 */
function twosides_docs_cb() 
{ 
$pluguri = "https://themes.tradesouthwest.com/wordpress/plugins/";
?>
<article class="twosides-support">

<h4><?php esc_html_e( 'The Positive and Negative buttons for users to select which comment type they want to submit is already built into the single template file. 
If you are using a special template file for single posts, you may want to use the shortcode listed below.', 'twosides' ); ?></h4>

<h2><?php esc_html_e( 'Admin Tips', 'twosides' ); ?></h2>
<dl>
<dt><b><?php esc_html_e( 'Twosides Shortcodes', 'twosides' ); ?></b></dt>
<dd></dd>
<dd class="olds"><?php esc_html_e( 'Shortcode for the single posts pages are automatic and there is a shortcode but it is hardcoded as do_shortcode into the functions of the templating instance. Use this shortocode to add a form with buttons to your comments page.', 'twosides' ); ?><span> [twosides_form_shortcode]</span></dd>
<dd></dd>
</dl>


<section class="twosides-support-faq">
    <h4><?php esc_html_e( 'Frequently Asked Questions | Troubleshooting', 'twosides' ); ?></h4>
    <details>
    <summary><?php esc_html_e( 'Comment list columns are not sitting side-by-side', 'twosides'); ?></summary>
    <?php esc_html_e( 'Try setting the margin-left to a lower number. This can be done using &#39;Left Margin Comments Boxes&#39; option or the theme Customizer. CSS Selector name is: ', 'twosides'); ?>
    <pre>#comments.comments-area.twosides .comment-list{margin-left: -15px;}</pre>
    </details>
<!--    <details>
    <summary><?php esc_html_e( 'Other', 'twosides'); ?></summary>
    <?php esc_html_e( 'Other', 'twosides'); ?>
    </details>
-->
</section>
<hr>

<dl>
<dt><b><?php esc_html_e( 'For more options, try TwoSides Debate plugin by Tradesouthwest.', 'twosides' ); ?></b></dt> 
<dd></dd>
<dd><a class="button primary" href="<?php echo esc_url( $pluguri ); ?>" title="upgrade for twosides" target="_blank"><?php esc_html_e( 'TwoSides Debate', 'twosides' ); ?></a></dd>
<dd></dd>

<dt><?php esc_html_e( 'With an upgrade of Twosides you can add the following features:', 'twosides' ); ?></dt>
<dd></dd>
<dd>*<?php esc_html_e( 'Control what template to use for comments form', 'twosides' ); ?></dd>
<dd>*<?php esc_html_e( 'Add styles directly inline for comment list boxes and more', 'twosides' ); ?></dd>
<dd>*<?php esc_html_e( 'Turn on or off counters and other assets on page', 'twosides' ); ?></dd>
<dd>*<?php esc_html_e( 'Backend functionality and debug mode for optimizations.', 'twosides' ); ?></dd>
<dd>*<?php esc_html_e( 'Documentation for making alterations to comment form code.', 'twosides' ); ?></dd>
<dd>*<?php esc_html_e( 'Support from author team for advanced usages (180 days).', 'twosides' ); ?></dd>

<dd></dd>
</dl>
</article>
<?php
} 
