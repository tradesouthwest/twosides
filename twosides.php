<?php
/*
Plugin Name: TwoSides
Plugin URI: http://themes.tradesouthwest.com/wordpress/plugins/
Description: Display comments in a side by side fashion and divide each side as positive or negative styled.
Version:           1.0.2
Author:            Larry Judd
Author URI:        https://tradesouthwest.com
Stable tag:        1.0.1
License:           GPLv3
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/ /** @since file_version 20230331.102 */
defined( 'ABSPATH' ) or die( 'X' );

if( !defined('TWOSIDES_URL' ) ) { 
     define( 'TWOSIDES_URL', plugin_dir_url(__FILE__) ); }
if( !defined('TWOSIDES_BASE_PATH' ) ) { 
     define( 'TWOSIDES_BASE_PATH', dirname(plugin_basename(__FILE__) ) ); }
if( !defined('TWOSIDES_VER' ) ) { 
     define( 'TWOSIDES_VER', '1.0.2' ); }

/**
 * Get time of activating the plugin
 */
function twosides_plugin_activate()
{
    $format    = get_option('date_format');
    $timestamp = get_the_time();
    $time      = date_i18n($format, $timestamp, true);
    add_option( 'twosides_date_plugin_activated' );
    update_option( 'twosides_date_plugin_activated', $time );
}

/**
 * deactivation settings
 */
function twosides_plugin_deactivate() 
{    
    delete_option( 'twosides_date_plugin_activated' );
        return false;
}

register_activation_hook(__FILE__,   'twosides_plugin_activate');
register_deactivation_hook(__FILE__, 'twosides_plugin_deactivate');
register_uninstall_hook(__FILE__,    'twosides_plugin_uninstall');

/**
 * Add language file.
 */
if( function_exists( 'load_plugin_textdomain' ) )
{   
    $plugin_dir = basename(dirname(__FILE__)).'/languages';
    load_plugin_textdomain( 'twosides', false, $plugin_dir );
}

/**
 * Add setup link.
 */
//enqueue or localise scripts 
add_action( 'wp_enqueue_scripts', 'twosides_public_style' );
function twosides_public_style() 
{
    wp_enqueue_style( 'twosides-css',  TWOSIDES_URL
                     . 'library/twosides-css.css', array(), TWOSIDES_VER, false );
    wp_enqueue_script( 'twosides-plugin', plugin_dir_url( __FILE__ ) . 
                       'library/twosides-plugin.js', 
                       array( 'jquery' ), '', true ); 
}

// check for comments theme support
if( !current_theme_supports( 'comments' ) ) 
{ 
    //add_post_type_support( 'post', array( 'comments' ) );
    add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
}   
   
/**
 * Include required scripts.
 */
if( is_admin() ) : 
function twosides_enqueue_admin_scripts()
{
    wp_enqueue_style( 'twosides-admin-css',  TWOSIDES_URL
                      . 'library/twosides-admin-css.css', array(), null, false );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'twosides-colors', 
                       plugins_url('library/twosides-colors.js', __FILE__ ), 
                       array( 'wp-color-picker' ), false, true );
    if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
}
    add_action( 'admin_enqueue_scripts', 'twosides_enqueue_admin_scripts' );
endif;

// load required files
require_once dirname(__FILE__) . '/includes/twosides-admin-settings.php';
require_once dirname(__FILE__) . '/includes/twosides-admin-forms.php';
require_once dirname(__FILE__) . '/includes/twosides-helpers.php';
require_once dirname(__FILE__) . '/includes/twosides-functions.php';
require_once dirname(__FILE__) . '/templates/twosides-comments_templater.php';
require_once dirname(__FILE__) . '/includes/twosides-shortcodes.php';

//register shortcodes
add_action( 'init', 'twosides_register_shortcodes' ); 
function twosides_register_shortcodes() 
{
    add_shortcode( 'twosides_form_header', 'twosides_header_form_shortcode' ); 
} 
?>