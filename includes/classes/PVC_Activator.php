<?php

namespace PostViewCount\Includes\Classes;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

class PVC_Activator{

    /**
     * Run Activation Process
     * 
     * @since 1.0.0
     */
    public function activate(){        
        // Check if the current user has permissions to activate plugins
        if( ! current_user_can( 'activate_plugins' ) ) return;

        // Save plugin version and time of activation
        add_option( 'pvc_plugin_version', PVC_VERSION );
        add_option( 'pvc_plugin_activated', time() );

        // Save default plugin settings
        $default_settings = [
            'pvc_show_count' => 'yes',
            'pvc_admin_column' => 'yes',
            'pvc_remove_options' => 'no'
        ];

        add_option( 'pvc_settings', $default_settings );
    }
}