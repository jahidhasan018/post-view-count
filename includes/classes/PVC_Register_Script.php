<?php
namespace PostViewCount\Includes\Classes;

if ( ! defined( "ABSPATH" ) ) exit;


/**
 * Register Script Class
 * 
 * @since 1.0.0
 */
class PVC_Register_Script{
    public function __construct(){
        // Enqueue frontend script
        add_action( 'wp_enqueue_scripts', [ $this, 'register_public_script' ] );

        // Enqueue admin script
        add_action( 'admin_enqueue_scripts', [ $this, 'register_admin_script' ] );

    }

    /**
     * Register Public Script
     * 
     * @since 1.0.0
     */
    public function register_public_script(){
        wp_enqueue_style( 'pvc-public-style', PVC_PLUGIN_URL . 'assets/public/css/style.css', array(), PVC_VERSION, 'all' );

        wp_enqueue_script( 'pvc-public-script', PVC_PLUGIN_URL . 'assets/public/js/script.js', array( 'jquery' ), PVC_VERSION, true );
    }

    /**
     * Register Admin Script
     * 
     * @since 1.0.0
     */
    public function register_admin_script(){

        // Check if current screen is post-view-count settings page
        $screen = get_current_screen();

        if( 'toplevel_page_post-view-count' === $screen->id ){
            wp_enqueue_style( 'pvc-admin-style', PVC_PLUGIN_URL . 'assets/admin/css/style.css', array(), PVC_VERSION, 'all' );

            wp_enqueue_script( 'pvc-admin-script', PVC_PLUGIN_URL . 'assets/admin/js/script.js', array( 'jquery' ), PVC_VERSION, true );
        }
        
    }
}