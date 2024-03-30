<?php

namespace PostViewCount\Includes\Classes;

// Exit if access directly
if( ! defined( 'ABSPATH' ) ) exit;

/**
 * PVC_Save_Post_Views Class
 * 
 * @since 1.0.0
 */
class PVC_Save_Post_Views{
    
    public function __construct(){
        // Save Post Views in single post meta when the post is viewed
        add_action( 'wp_head', array( $this, 'pvc_save_post_views' ) );
    }

    /**
     * Save Post Views in single post meta
     * 
     * @since 1.0.0
     */
    public function pvc_save_post_views(){
        $show_count = pvc_get_option( 'pvc_show_count', 'pvc_settings', 'yes' );

        // Check if the post is a single post and post type is 'post' and is not admin and show count is set to 'yes'
        if( is_single() && 'post' === get_post_type() && ! is_admin() && 'yes' === $show_count ){
            $post_id = get_the_ID();
            $meta_key = 'pvc_post_views';
            $count = get_post_meta( $post_id, $meta_key, true );
            $count = $count ? $count : 0;

            // Increase the count by 1
            $count++;
            update_post_meta( $post_id, $meta_key, $count );
        }
    }
}