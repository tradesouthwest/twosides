<?php
/*
Plugin Name: TwoSides
Plugin URI: http://
Description: COMMENTS SIDE BY SIDE
Version: 1.0.1
Author: Larry Judd
Author URI: 
License: GPL2
*/ 
defined( 'ABSPATH' ) or die( 'X' );

if (!defined('TWOSIDES_URL')) { define( 'TWOSIDES_URL', plugin_dir_url(__FILE__)); }

define('TWOSIDES_BASE_PATH', dirname(plugin_basename(__FILE__)));

/**
 * Check technical requirements before activating the plugin (Wordpress 3.0 or newer required)
 */
function twosides_plugin_activate()
{
  

}
/**
 * deactivation settings
 */
function twosides_plugin_deactivate() 
{
    //delete_option( 'twosides_date_plugin_activated' );
        return false;
} 

register_activation_hook(__FILE__, 'twosides_plugin_activate');
register_deactivation_hook(__FILE__, 'twosides_plugin_deactivate');

/**
 * Add setup link.
 */

//enqueue or localise scripts
function twosides_public_style() 
{
    wp_enqueue_style( 'twosides-css',  TWOSIDES_URL
                      . 'library/twosides-css.css',array(), null, false );
   wp_enqueue_script( 'twosides-plugin', plugin_dir_url( __FILE__ ) . 
                       'library/twosides-plugin.js', 
                       array( 'jquery' ), '1.6.0', true );  
    
}
    add_action( 'wp_enqueue_scripts', 'twosides_public_style' );
    
add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );

/**
 * Include required files.
 */
require_once dirname(__FILE__) . '/includes/twosides-functions.php';
require_once dirname(__FILE__) . '/includes/twosides-shortcodes.php';
//register shortcodes
function twosides_register_shortcodes() {
    
    add_shortcode( 'twosides_form_header', 'twosides_header_form_shortcode' ); 
}
    add_action( 'init', 'twosides_register_shortcodes' );


/**
 * Add language file.
 */
if (function_exists('load_plugin_textdomain'))
{
    load_plugin_textdomain('twosides', false, TWOSIDES_BASE_PATH . '/languages/');
}
