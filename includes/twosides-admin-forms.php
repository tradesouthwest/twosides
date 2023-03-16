<?php 
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' ); 
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.3
 */
function twosides_posibkgd_cb() 
{ 
    
    $def = "#aafaca";
    $options = get_option('twosides_admin'); 
    $twosides_color_1 = $options['twosides_posibkgd'];
    if( $twosides_color_1 == '' ) $twosides_color_1 = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 
        'Select color for background of positive comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_posibkgd]"
           class="twosides-color-field" data-default-color="#aafaca"
           value="<?php echo $twosides_color_1; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default title
 * @since  1.0.3
 */
function twosides_negabkgd_cb() 
{ 
    
    $def = "#faaa99";
    $options = get_option('twosides_admin'); 
    $twosides_color_2 = $options['twosides_negabkgd'];
    if( $twosides_color_2 == '' ) $twosides_color_2 = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 
        'Select color for background of negative comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_b" 
           name="twosides_admin[twosides_negabkgd]" 
           class="twosides-color-field" data-default-color="#faaa99" 
           value="<?php echo $twosides_color_2; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.3
 */
function twosides_posibord_cb() 
{ 
    
    $def = "#aafaca";
    $options = get_option('twosides_admin'); 
    $twosides_posibord = $options['twosides_posibord'];
    if( $twosides_posibord == '' ) $twosides_posibord = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 'Select color for borders of positive comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_posibord]"
           class="twosides-color-field" data-default-color="#aafaca"
           value="<?php echo $twosides_posibord; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.2
 */
function twosides_negabord_cb() 
{ 
    
    $def = "#faaa99";
    $options = get_option('twosides_admin'); 
    $twosides_negabord = $options['twosides_negabord'];
    if( $twosides_negabord == '' ) $twosides_negabord = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 'Select color for borders of negative comments.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_negabord]"
           class="twosides-color-field" data-default-color="#faaa99"
           value="<?php echo $twosides_negabord; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.2
 */
function twosides_submits_cb() 
{ 
    
    $def = "#ffffff";
    $options = get_option('twosides_admin'); 
    $twosides_submits = $options['twosides_submits'];
    if( $twosides_submits == '' ) $twosides_submits = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 'Select pro/con buttons text color.', 
                                           'twosides'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_submits]"
           class="twosides-color-field" data-default-color="#ffffff"
           value="<?php echo $twosides_submits; ?>"><br>
<?php     
}

/** 
 * Text of header
 * @since 1.0.1
 */
function twosides_posiheader_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_posiheader = (empty($options['twosides_posiheader'] )) 
                ? "" : $options['twosides_posiheader']; ?>
    <label class="olmin" for="twosides_posiheader"><?php esc_html_e( 
'Set text field.', 'twosides' ); ?></label><br>
    <input type="text" name="twosides_admin[twosides_posiheader]" 
           value="<?php echo esc_attr( $twosides_posiheader ); ?>" 
           size="35"/>
    <?php 
}
/** 
 * Text of header
 * @since 1.0.1
 */
function twosides_negaheader_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_negaheader = (empty($options['twosides_negaheader'] )) 
                ? "" : $options['twosides_negaheader']; ?>
    <label class="olmin" for="twosides_negaheader"><?php esc_html_e( 
'Set text field.', 'twosides' ); ?></label><br>
    <input type="text" name="twosides_admin[twosides_negaheader]" 
           value="<?php echo esc_attr( $twosides_negaheader ); ?>" 
           size="35"/>
    <?php 
}

/** 
 * Text of submit
 * @since 1.0.1
 */
function twosides_negatxt_cb()
{
    $options = get_option('twosides_admin'); 
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
    $options = get_option('twosides_admin'); 
    $twosides_positxt = (empty($options['twosides_positxt'] )) 
                ? "" : $options['twosides_positxt']; ?>
    <label class="olmin" for="twosides_positxt"><?php esc_html_e( 
'Set text field.', 'twosides' ); ?></label>
    <input type="text" name="twosides_admin[twosides_positxt]" 
           value="<?php echo esc_attr( $twosides_positxt ); ?>" 
           size="15"/>
    <?php 
}

/**
 * render information section
 * @since 1.0.1
 */
function twosides_docs_cb() 
{
?>
<div class="twosides-support">

<h4><?php esc_html_e( 'The Positive and Negative buttons for users to select which comment type they want to submit is already built into the single template file. 
If you are using a special template file for single posts, you may want to use the shortcode listed below.', 'twosides' ); ?></h4>

<h2><?php esc_html_e( 'Admin Tips', 'twosides' ); ?></h2>
<dl>
<dt><b><?php esc_html_e( 'Twosides Shortcodes', 'twosides' ); ?></b></dt>
<dd></dd>
<dd class="olds"><?php esc_html_e( 'Shortcode for the single posts pages are automatic and there is a shortcode but it is embedded into the functions of the single page instance.', 'twosides' ); ?><span> [twosides_form_shortcode]</span></dd>
<dd></dd>
<dt><b><?php esc_html_e( 'For more options, try TwoSides Debate plugin by Tradesouthwest.', 'twosides' ); ?></b></dt> 
<dd></dd>
<dd><a class="button primary" href="https://twosides.tradesouthwest.com/index.html" title="upgrade for twosides" target="_blank"><?php esc_html_e( 'TwoSides Debate', 'twosides' ); ?></a></dd>
<dd></dd>

<dt><?php esc_html_e( 'With an upgrade of Twosides you can add the following features:', 'twosides' ); ?></dt>
<dd></dd>
<dd><?php esc_html_e( 'Control what template to use for comments form', 'twosides' ); ?></dd>
<dd><?php esc_html_e( 'Add styles as preset values to buttons, comment list boxes and more', 'twosides' ); ?></dd>
<dd><?php esc_html_e( 'Turn on or off counters and other assets on page', 'twosides' ); ?></dd>
<dd><?php esc_html_e( 'Backend functionality for optimizations....', 'twosides' ); ?></dd>
<dd></dd>
</dl>
</div>
<?php
} 
