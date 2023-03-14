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
 * Border and spacing
 * @since 1.0.1
 */
function twosides_margbord_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_margbord = (empty($options['twosides_margbord'] )) 
                ? "3" : $options['twosides_margbord']; ?>
    <label class="olmin" for="twosides_margbord"><?php esc_html_e( 
'Set border and spacing.', 'twosides' ); ?></label>
    <input type="number" name="twosides_admin[twosides_margbord]" 
           value="<?php echo esc_attr( $twosides_margbord ); ?>" 
           size="15" class="smallinput"/>
    <?php 
}
/** 
 * Height of comments
 * @since 1.0.1
 */
function twosides_negposh_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_negposh = (empty($options['twosides_negposh'] )) 
                       ? "5" : $options['twosides_negposh']; ?>
    <p><label class="olmin" for="twosides_negposh"><?php esc_html_e( 
'Set padding.', 'twosides' ); ?></label>
    <input type="number" name="twosides_admin[twosides_negposh]" 
           value="<?php echo esc_attr( $twosides_negposh ); ?>" 
           size="15" max="60" class="smallinput"/></p>
    <small><?php esc_html_e( 'Setting is in pixels... line-height is in stylesheet',
    'twosides' ); ?></small>
    <?php 
}
/**
 * checkbox for 'metadata' field
 * @since 1.0.1
 */
function twosides_checkbox_metadata_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_checkbox_metadata'] )) 
                 ? 0 : $options['twosides_checkbox_metadata']; ?>
 <p><input type="hidden" 
           name="twosides_admin[twosides_checkbox_metadata]" 
           value="0" />
    <input name="twosides_admin[twosides_checkbox_metadata]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to hide the metadata for comments.', 
                      'twosides' ); ?></p>
    <small><?php esc_html_e( 'Date, time and other data which shows below author.', 
                             'twosides' ); ?> </small>
                             
    <?php   print( $checkbox );
} 
/**
 * checkbox for 'twscounter' field
 * @since 1.0.1
 */
function twosides_checkbox_twscounter_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_checkbox_twscounter'] )) 
                 ? 0 : $options['twosides_checkbox_twscounter']; ?>
 <p><input type="hidden" 
           name="twosides_admin[twosides_checkbox_twscounter]" 
           value="0" />
    <input name="twosides_admin[twosides_checkbox_twscounter]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to not show counters.', 
                      'twosides' ); ?></p>
    <small><?php esc_html_e( 'The counter and progress bar above the submit buttons.', 
                             'twosides' ); ?> </small>
                             
    <?php  print( $checkbox );
} 
/**
 * checkbox for 'use theme template' field
 * @since 1.0.1
 * @package twosides
 * @subpackage includes/twosides-admin-forms
 */
function twosides_checkbox_commlists_cb() {
    $options = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_checkbox_commlists'] )) 
                 ? 0 : $options['twosides_checkbox_commlists']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_checkbox_commlists]" 
           value="0" />
    <input name="twosides_admin[twosides_checkbox_commlists]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to use ', 'twosides' ); ?><span class="twosides-highlite"><?php esc_html_e( 'Theme', 'twosides' ); ?>
    </span><?php esc_html_e( ' comments_form and comment_list.', 'twosides' ); ?></p>
    <small><?php esc_html_e( 'Use if for some reason the TwoSides comments form is not working properly.', 'twosides' ); ?><br>
    <span class="twosides-highlite"><?php esc_html_e( 'Documentation must be read to use your theme form. Installing code snippet is required.', 'twosides' ); ?></span></small>
    <?php  print( $checkbox );
} 
/**
 * checkbox for 'use debug mode' field
 * @since 1.0.1
 * @package twosides
 * @subpackage includes/twosides-admin-forms
 */
function twosides_debug_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_debug'] )) 
                 ? 0 : $options['twosides_debug']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_debug]" 
           value="0" />
    <input name="twosides_admin[twosides_debug]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to use debug mode.', 'twosides' ); ?></p>
    <small><?php esc_html_e( 'Use if for testing of your theme comment form if Duplicate Comment errors are thrown.', 'twosides' ); ?></small>
    <?php print( $checkbox );
} 
/**
 * checkbox for 'remove url field' field
 * @since 1.0.1
 * @package twosides
 * @subpackage includes/twosides-admin-forms
 */
function twosides_field_url_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_field_url'] )) 
                 ? 0 : $options['twosides_field_url']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_field_url]" 
           value="0" />
    <input name="twosides_admin[twosides_field_url]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to remove the url field from comments form.', 'twosides' ); ?></p>
    <small><?php esc_html_e( 'Optional', 'twosides' ); ?></small>
    <?php print( $checkbox );
} 
/** 
 * Additional CSS
 * @since 1.0.1
 */
function twosides_addcss_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_addcss = (empty($options['twosides_addcss'] )) 
                       ? '' : $options['twosides_addcss']; ?>
    <p><label class="olmin" for="twosides_addcss"><?php esc_html_e( 
'Add styles', 'twosides' ); ?></label></p>
<textarea name="twosides_admin[twosides_addcss]" cols="45" rows="8"><?php echo esc_textarea( $twosides_addcss ); ?></textarea><br>
    <small><?php esc_html_e( 'Add styles directly related to TwoSides plugin', 'twosides' ); ?></small>
    <?php 
}

/**
 * render information section
 * @since 1.0.1
 */
function twosides_docs_cb() 
{
    $urla = "https://developer.wordpress.org/themes/advanced-topics/child-themes/";
    $urlb = esc_url( plugin_dir_url(dirname(__FILE__)) . 'library/imgs/tws-ftp.png');
    $urlc = esc_url( plugin_dir_url(dirname(__FILE__)) . 'library/imgs/tws-editcommentfile.png');
    $urld = esc_url( plugin_dir_url(dirname(__FILE__)) . 'library/imgs/tws-editcomment.png');
    $urle = esc_url( plugin_dir_url(dirname(__FILE__)) . 'library/imgs/tws-foldico.png');
    ?>
<div class="twosides-support">
<!--<p><img height="210" src="<?php //echo esc_attr( $urlc ); ?>" alt="image of child theme folder contents"/></p>-->
<h1><?php esc_html_e( 'Very Important - Please Read!', 'twosides' ); ?></h1> 
<h5 class="maroon"><?php esc_html_e( 'TwoSides plugin MAY REQUIRE you to replace your comments.php file inside a child-theme (or parent theme)!', 'twosides' ); ?><br>
<?php esc_html_e( 'To add theme templates to a child theme follow the instructions below.', 'twosides' ); ?></h5>

<ol>
<li><?php esc_html_e( 'The process to follow is ONLY to be done if you have checked the ', 'twosides' ); ?><span class="twosides-highlite"><?php esc_html_e( ' Use Theme Comments List Template option.', 'twosides' ); ?></span><br>
<b>&nbsp;<?php esc_html_e( 'If you do not use YOUR theme&#39;s comments list then TwoSides automatically adds one.', 'twosides' ); ?></b></li>    
<li><?php esc_html_e( 'Create Child Theme. For further instructions on building a child-theme view: ', 'twosides' ); 
echo '<a href="' . esc_url( $urla ) . '" target="_blank" title="child theme instructions open in new window">' . esc_url( $urla ) . '</a>'; ?> </li>
<li><?php esc_html_e( 'You should now have a child-theme folder to add files to. We require at least these 4 files:', 'twosides' ); ?><br>
<ul style="list-style:inside disc"><li>functions.php</li><li>page.php ( or index.php or single.php* )</li><li>screenshot.png</li><li><b>comments.php</b></li></ul></li>
<li><?php esc_html_e( 'The last one --- comments.php being the file you will be required to change.', 'twosides' ); ?><br>
<p><img height="180" src="<?php echo esc_attr( $urlb ); ?>" alt="image of ftp client"/></p>
</li>
<li><?php esc_html_e( 'Get the comments.php file from your Child Theme and save it in the provided folder inside of the plugin template directory inside of the folder named ', 'twosides' ); ?>
<img height="19" src="<?php echo esc_attr( $urle ); ?>" alt="folder that is named theme inside of plugin"/><?php esc_html_e( 'theme. This folder is for convenience only and has nothing to do with how the plugin or theme works. It is merely a place to keep your original file. You may feel safer keeping this file some other place but it really should not matter if you have the original comments file in your parent theme to fall back on.', 'twosides' ); ?><br>
</li>
<li><?php esc_html_e( 'Now highlight and copy the code below** that is to go inside of the new comments.php file and paste that copied code into your new comments.php file.', 'twosides' ); ?><br>
<p><a href="<?php echo esc_url($urld); ?>" title="comments code" rel="image_src"><img height="210" src="<?php echo esc_attr( $urld ); ?>" alt="image of comments file to edit"/></a></p></li>
</ol>
<small><?php esc_html_e( '*Any of these three files can be omitted but some versions of themes require at least one of these to be included in a child-theme.', 'twosides' ); ?></small>
<hr>
<p><b><?php esc_html_e( 'There are several ways to add the TwoSides comment form to your theme. Here are some tips to help build you confidence:', 'twosides' ); ?></b></p>
<ul class="inside-disc">
    <li><?php esc_html_e( 'Use the comment file that is in the plugin template folder of this plugin to add directly into your child-theme.', 'twosides' ); ?></li>
    <li><?php esc_html_e( 'Copy the contents of the required comments code (either from below or from the TwoSides template folder file) and paste it directly into your child-theme comments file BUT, in between the other code that makes up your theme template such as headers and footers. This method provides a better looking match to your theme.', 'twosides' ); ?></li>
    <li><?php esc_html_e( 'Please DO NOT use the WordPress Theme Editor (as seen in the image above). That visual is for showing the file contents code only.', 'twosides' ); ?></li>
</ul>
<hr>
<h4><?php esc_html_e( 'The Positive and Negative buttons for users to select which comment type they want to submit is already built into the single template file. If you are using a special template file for single posts, you may want to use the shortcode listed below.', 'twosides' ); ?></h4>
<h4><?php esc_html_e( '**Below is the required comments list code that can be placed in your current comments.php template.', 'twosides' ); ?></h4>

<code class="premasked">
&lt;?php 
/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if( post_password_required() ) {
   return;
}
?>
&lt;div id="comments" class="comments-area"> 
	   &lt;?php if( have_comments() ) : ?&gt;
		   &lt;ul class="comment-list comments-positive">
			   &lt;?php
				   wp_list_comments( array(
					   'style'       => 'ul',
					   'short_ping'  => true,
					   'type' => 'twosides_positive',
				   ) );
			   ?&gt;
		   &lt;/ul> 
			   &lt;ul class="comment-list comments-negative">
			   &lt;?php
				   wp_list_comments( array(
					   'style'       => 'ul',
					   'short_ping'  => true,
					   'type' => 'twosides_negative',
				   ) );
			   ?>
		   &lt;/ul> 
   
	   &lt;?php endif; ?>
	   &lt;?php comment_form(); ?>&lt;/div> 
</code>
<hr>
<h2><?php esc_html_e( 'Admin Tips', 'twosides' ); ?></h2>
<dl>
<dt><b><?php esc_html_e( 'Twosides Shortcodes', 'twosides' ); ?></b></dt>
<dd class="olds"><?php esc_html_e( 'Shortcode for the single posts pages are automatic and there is a shortcode but it is embedded into the functions of the single page instance.', 'twosides' ); ?><span> [twosides_form_shortcode]</span></dd>
<dt><b><?php esc_html_e( 'Spacing and gaps between comment boxes', 'twosides' ); ?></b></dt>
<dd class="olds"><?php esc_html_e( 'When you set the option for Spacing between comments, you will be creating a gap between the comment boxes. The method used is to set the left and right boxes up using a border attribute of how many pixel wide the border is. And then the margin for the bottom of every box (left and right) is determined by using the same number and multiplying it by two. For example: If you enter 3 as your spacing - what you have is 3 pixels right and 3 pixels left border for each right and left box. Then 3 X 2= 6 pixels width for bottom margin of all boxes. ', 'twosides' ); ?><span></span></dd>
<dt><b><?php esc_html_e( 'To Override Button Styles', 'twosides' ); ?></b></dt>
<dd><?php esc_html_e( 'Use the following CSS to change how your submit buttons will appear on the page', 'twosides' ); ?><br>
<pre>
.twosides_fieldset input[type="submit"]{
    min-width: 50px;
    margin: 8px auto;
    border-color:rgba(222,222,222,.5);}
</pre>
</dd>
</dl>
</div>
<?php
} 
