<?php

namespace PostViewCount\Includes\Classes;
use WeDevs_Settings_API;

/**
 * PVC_Admin_Page class
 * 
 * This is the class that will handle the admin page
 * 
 * @author Tareq Hasan
 * @since 1.0.0
 */

class PVC_Admin_Page {
    
    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

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

    function admin_menu() {
        //add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', array($this, 'plugin_page') );
        add_menu_page( __( 'Post View Count', 'post-view' ), __( 'Post View Count', 'post-view' ), 'manage_options', 'post-view-count', array($this, 'plugin_page'), 'dashicons-chart-line', 30 );
    }

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
                // sub title
                array(
                    'name'    => 'pvc_views_box_subtitle',
                    'label'   => __( 'Views Box Subtitle', 'post-view' ),
                    'desc'    => __( 'Subtitle for the views box in the single post', 'post-view' ),
                    'type'    => 'text',
                    'default' => __( 'Total views', 'post-view' )
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

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     * @since 1.0.0
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
