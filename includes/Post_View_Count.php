<?php
namespace PostViewCount\Includes;

// Exit if access directly
if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Post_View_Count Class
 * 
 * This the main class of the PVC plugin
 * 
 * @since 1.0.0
 */
class Post_View_Count{

    /**
     * Store Plugin Version
     * 
     * @var string
     * 
     * @since 1.0.0
     */
    private $version;

    /**
     * Store Plugin Name
     * 
     * @var string
     * 
     * @since 1.0.0
     */
    private $plugin_name;

    /**
     * Post_View_Count constructor
     * 
     * @since 1.0.0
     */
    public function __construct(){
        $this->version = PVC_VERSION;
        $this->plugin_name = PVC_PLUGIN_NAME;

        // Plugin Loaded Hook
        add_action( 'plugins_loaded', [ $this, 'plugin_loaded' ] );

        // Instantiate Register_Script class
        new PVC_Register_Script();

        // Instantiate PVC_Save_Post_Views class
        new PVC_Save_Post_Views();

        // Instantiate PVC_Shortcodes class
        new PVC_Shortcodes();

        // Instantiate Pvc_Admin_Column class
        new Pvc_Admin_Column();
    }

    /**
     * Plugin Loaded Method
     * 
     * Callback method for 'plugins_loaded' action hook
     * 
     * @since 1.0.0
     */
    public function plugin_loaded(){
        // Load plugin text domain
        load_plugin_textdomain( 'post-view', false, PVC_PLUGIN_PATH . 'languages' );

        // Instantiate PVC_Admin_Page class
        new PVC_Admin_Page();
    }

}