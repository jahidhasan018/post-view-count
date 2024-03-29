<?php
namespace PostViewCount\Includes\Classes;

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

        // Init Hook
        add_action( 'init', [ $this, 'init' ] );

        // Instantiate Register_Script class
        new PVC_Register_Script();

        // Instantiate PVC_Save_Post_Views class
        new PVC_Save_Post_Views();

        // Instantiate PVC_Shortcodes class
        new PVC_Shortcodes();

        // Load Required Files
        $this->load_files();
        
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
        
        // Instantiate PVC_Admin_Column class
        new PVC_Admin_Column();
    }

    /**
     * Init Method
     * 
     * Callback method for 'init' action hook
     * 
     * @since 1.0.0
     */
    public function init(){
        // Instantiate PVC_Display_Post_Count class
        new PVC_Display_Post_Count();

        // Register PVC Block
        register_block_type( PVC_PLUGIN_PATH . 'blocks/build/single-post-view' );
    }

    /**
     * Load Files Method
     * 
     * This method will load/include all the required files
     * 
     * @since 1.0.0
     */
    public function load_files(){
        require_once PVC_PLUGIN_PATH . 'includes/pvc-functions.php';
    }

    //

}