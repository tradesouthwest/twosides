<?php
/**
 * Template Name: Twosides Template
 * @package Twosides
 * @version 1.0.1
 */
get_header();

?>

<div class="before-content-twosides">
before content test
</div>

<?php do_shortcode('[twosides_form_header]'); ?>

<div class="before-content-twosides">
after content test 
</div>

<?php get_footer();
