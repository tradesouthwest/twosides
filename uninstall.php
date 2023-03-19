<?php
/** 
 * @plugin package: OnList
 * @author: Tradesouthwest - tradesouthwest.com
 */
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
} 
// Do not delete_comment_meta( ) in case user wants to upgrade to TwoSides Debate.
//return false; 
