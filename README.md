== TwoSides 

= Load order

/includes/twosides-admin-settings.php
    add_action( 'admin_menu', 'twosides_add_options_page' );  
    add_action( 'admin_init', 'twosides_register_admin_options' );
    register_setting( 'twosides_admin', 'twosides_admin' ); //options pg
    register_setting( 'twosides_docs', 'twosides_docs' ); //listings pg

/includes/twosides-admin-forms.php
    settings and docs sections

/includes/twosides-helpers.php
    add_action( 'add_meta_boxes', 'twosides_add_comment_meta_box' );  
    add_action( 'edit_comment', 'twosides_save_custom_meta_box', 10, 3 ); 

/includes/twosides-functions.php
    add_filter('comment_post_redirect', 'twosides_redirect_after_comment');
    add_filter( 'preprocess_comment', 'twosides_verify_comment_type_data' );
    add_action( 'wp_enqueue_scripts', 'twosides_background_colors_cb' ); 
    add_action( 'wp_footer', 'twosides_addclass_comment_formPositive' );
    add_action( 'wp_footer', 'twosides_addclass_comment_formNegative' );  
    add_action( 'comment_form_after_fields', 'twosides_verify_comment_meta_data');
    add_action( 'comment_post', 'twosides_saving_comment_meta_data');
    function twosides_debug_class - Grab state of debug option.
    function twosides_commlist_class - Grab state of comment list template used.
/templates/twosides-comments_templater.php
    add_filter( 'comments_template', 'twosides_comment_templater' );

/includes/twosides-shortcodes.php
    add_filter( 'the_content', 'twosides_shortcode_autoto_post' ); 

= Notes
https://twosides.tswdev.com/ demo. https://tswdev.com/test/ dev site.
icon colors #52ae6a #de6565