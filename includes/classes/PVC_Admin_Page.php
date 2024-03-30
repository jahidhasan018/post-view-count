<?php

namespace PostViewCount\Includes\Classes;

// Use The Settings API Wrapper class for admin
use WeDevs_Settings_API;

/**
 * PVC_Admin_Page class
 * 
 * @since 1.0.0
 */

class PVC_Admin_Page {
    
    /**
     * The instance of the class
     *
     * @var object
     */
    private $settings_api;
    
    function __construct() {
        $this->settings_api = new WeDevs_Settings_API();

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {
        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    /**
     * Add menu in admin menu
     *
     * @since 1.0.0
     */
    function admin_menu() {
        add_menu_page( __( 'Post View Count', 'post-view' ), __( 'Post View Count', 'post-view' ), 'manage_options', 'post-view-count', array($this, 'plugin_page'), 'dashicons-chart-line', 30 );
    }

    /**
     * Returns all the settings sections
     *
     * @return array settings sections
     */
    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'pvc_settings',
                'title' => __( 'Post View Count Settings', 'post-view' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'pvc_settings' => array(
                array(
                    'name'    => 'pvc_show_count',
                    'label'   => __( 'Show Post View Count', 'post-view' ),
                    'desc'    => __( 'Do you want to show post view count in single post?', 'post-view' ),
                    'type'    => 'select',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => 'Yes',
                        'no'  => 'No'
                    )
                ),
                array(
                    'name'    => 'pvc_admin_column',
                    'label'   => __( 'Show Column In Post Table ', 'post-view' ),
                    'desc'    => __( 'Do you want to show views count column in admin post table?', 'post-view' ),
                    'type'    => 'select',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => 'Yes',
                        'no'  => 'No'
                    )
                ),
                array(
                    'name'    => 'pvc_views_box_position',
                    'label'   => __( 'Views Box Position', 'post-view' ),
                    'desc'    => __( 'Position for the views box in the single post', 'post-view' ),
                    'type'    => 'select',
                    'default' => 'after',
                    'options' => array(
                        'before' => 'Before Content',
                        'after'  => 'After Content'
                    )
                ),
                array(
                    'name'    => 'pvc_views_box_title',
                    'label'   => __( 'Views Box Title', 'post-view' ),
                    'desc'    => __( 'Title for the views box in the single post', 'post-view' ),
                    'type'    => 'text',
                    'default' => __( 'Post Views', 'post-view' )
                ),
                array(
                    'name'    => 'pvc_views_box_subtitle',
                    'label'   => __( 'Views Box Subtitle', 'post-view' ),
                    'desc'    => __( 'Subtitle for the views box in the single post', 'post-view' ),
                    'type'    => 'text',
                    'default' => __( 'Total views', 'post-view' )
                ),
                array(
                    'name'    => 'pvc_remove_options',
                    'label'   => __( 'Remove Plugin Options', 'post-view' ),
                    'desc'    => __( 'Do you want to remove plugin options on uninstall?', 'post-view' ),
                    'type'    => 'select',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no'  => 'No'
                    )
                )
            )
        );

        return $settings_fields;
    }

    /**
     * Display the plugin settings options page 
     *
     * @since 1.0.0
     */
    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }
}
