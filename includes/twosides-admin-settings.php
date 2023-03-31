<?php
/**
 * @since ver: 1.0.1
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package twosides
 * @subpackage includes/twosides-admin-settings
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' ); 

    add_action( 'admin_menu', 'twosides_add_options_page' );  
    add_action( 'admin_init', 'twosides_register_admin_options' );
     
/**
 * Add an options page under the Settings submenu
 * $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position
 * @since  1.0.0
 */
function twosides_add_options_page() 
{
    add_menu_page(
        __( 'Twosides Settings', 'twosides' ),
        __( 'TwoSides Options', 'twosides' ),
        'manage_options',
        'twosides',
        'twosides_options_page',
        'dashicons-admin-comments' 
    );
}
/** register a new sections and fields in the "twosides admin" page
 */
function twosides_register_admin_options() 
{
    register_setting( 'twosides_admin', 'twosides_admin' ); //options pg
    register_setting( 'twosides_docs', 'twosides_docs' ); //listings pg
    
/**
 * listings section
 */        
    add_settings_section(
        'twosides_admin_section',
        '',
        'twosides_admin_section_cb',
        'twosides_admin'
    ); 
    //settings 
    add_settings_field(
        'twosides_posibkgd',
        __('Background color for Positive comments', 'twosides'),
        'twosides_posibkgd_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negabkgd',
        __( 'Background color for Negative comments', 'twosides' ),
        'twosides_negabkgd_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_posibord',
        __('Border color for Positive comments', 'twosides'),
        'twosides_posibord_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negabord',
        __( 'Border color for Negative comments', 'twosides' ),
        'twosides_negabord_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_submits',
        __( 'Color of Submit Buttons Text', 'twosides' ),
        'twosides_submits_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_posiheader',
        __('Header for Positive side', 'twosides'),
        'twosides_posiheader_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negaheader',
        __( 'Header for Negative side', 'twosides' ),
        'twosides_negaheader_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_positxt',
        __('Button text for Positive submit', 'twosides'),
        'twosides_positxt_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negatxt',
        __( 'Button text for Negative submit', 'twosides' ),
        'twosides_negatxt_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    
    
/**
 * instructions section
 */        
    add_settings_section(
        'twosides_docs_section',
        __( 'Twosides Documentation and Help', 'twosides' ),
        'twosides_docs_section_cb',
        'twosides_docs'
    ); 
    //docs settings fields
    add_settings_field(
        'twosides_info',
        __('Information', 'twosides'),
        'twosides_docs_cb',
        'twosides_docs',
        'twosides_docs_section'
    );
   
}

// admin section content cb
function twosides_admin_section_cb()
{ 
    print( '<h3><span class="dashicons dashicons-paperclip"></span> ' );
    esc_html_e( ' Set colors and options', 'twosides' ); print( '</h3>' );  
}
 
// instructions docs section content cb
function twosides_docs_section_cb()
{ 
    $imgurl        = TWOSIDES_URL . '/library/imgs/icon-128x128.png';
    $twosides_date = get_option( 'twosides_date_plugin_activated' ); 
    print( '<h3><span class="dashicons dashicons-paperclip"></span> ' );
    esc_html_e( ' Instructions and Tips', 'twosides' ); print( '</h3>' );
    echo '<p><img src="' . esc_url($imgurl) . '" alt="logo" height="50"/>' 
    . esc_html__( 'This plugin last activated on: ', 'twosides' ) 
    . '<code>'. esc_html($twosides_date) .'</code> Version '. TWOSIDES_VER . '</p>';
}
        
//render admin page
function twosides_options_page() 
{
    // Check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) return;
    // Check if the user have submitted the settings
    // Wordpress will add the "settings-updated" $_GET parameter to the url
    // Show error/update messages
    // settings_errors( 'twosides_messages' );
    $active_tab = isset( twosides_sanitize_get( $_GET[ 'tab' ] ) )
                ? twosides_sanitize_get( $_GET[ 'tab' ] ) : 'twosides_admin';
    ?>
    <div class="wrap wrap-twosides-admin">
    
    <h1><span id="twosidesAdmin" class="dashicons dashicons-comments"></span> 
    <?php echo esc_html( get_admin_page_title() ); ?></h1>
    
    <h2 class="nav-tab-wrapper">
    <a href="?page=twosides&tab=twosides_admin" 
       class="nav-tab <?php echo $active_tab == 'twosides_admin' ? 
       'nav-tab-active' : ''; ?>">
       <?php esc_html_e( 'Options', 'twosides' ); ?></a>
    <a href="?page=twosides&tab=twosides_docs" 
       class="nav-tab <?php echo $active_tab == 'twosides_docs' ? 
       'nav-tab-active' : ''; ?>">
       <?php esc_html_e( 'Twosides Documentation', 'twosides' ); ?></a></h2>
       
       <form action="options.php" method="post">
    <?php
    if( $active_tab == 'twosides_admin' ) { 
        settings_fields( 'twosides_admin' );
        do_settings_sections( 'twosides_admin' ); 
    } 
    else {
        settings_fields( 'twosides_docs' );
        do_settings_sections( 'twosides_docs' );
    } 
     submit_button( 'Save Settings' ); ?>
    </form>
    
    </div>
<?php
} 
