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
License:     GPL2
*/


// PVC Plugin namespace
namespace PostViewCount;

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
define( 'PVC_VERSION', '1.0' );
define( 'PVC_PLUGIN_NAME', 'post-view-count' );


// Instantiate PVC_ManiClass class
use PostViewCount\Includes\Classes\Post_View_Count;
new Post_View_Count();