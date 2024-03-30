<?php

if( ! defined( 'ABSPATH' ) ) exit;

// If uninstall not called from WordPress, then exit
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

// Check pvc_remove_options is set to yes
$is_remove = get_option( 'pvc_settings' )['pvc_remove_options'];


if( 'yes' === $is_remove ){
    // Delete the plugin options
    delete_option( 'pvc_settings' );

    // Delete the post meta
    delete_post_meta_by_key( 'pvc_show_count' );
}
