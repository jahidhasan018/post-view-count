<?php

/*
Plugin Name: Post View Count
Plugin URI:  https://github.com/jahidhasan018/post-view-count
Version:     1.0.0
Author:      Jahid Hossain
Author URI:  https://jahiddev.com
Text Domain: post-view
Domain Path: /languages
Description: This will show post view count in single post or via shortcode and block
License:     GPL V3.0 or later
*/


// PVC Plugin namespace
namespace PostViewCount;
use PostViewCount\Includes\Classes\Post_View_Count;
use PostViewCount\Includes\Classes\PVC_Activator;

if( ! defined( "ABSPATH" ) ){
    exit;
}

// Require Composer Autoload
require_once 'vendor/autoload.php';

/**
 * Define Constants
 * 
 * @since 1.0.0
 */
define( 'PVC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PVC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PVC_VERSION', '1.0.0' );
define( 'PVC_PLUGIN_NAME', 'post-view-count' );


// Plugn Activation Hook - This will run when the plugin is activated
function pvc_plugin_activator() {
    $activate = new PVC_Activator();
    $activate->activate();
}
register_activation_hook( __FILE__, 'PostViewCount\pvc_plugin_activator' );

// Instantiate Post_View_Count class - Main Class of the Plugin inside includes/classes/Post_View_Count.php
new Post_View_Count();