<?php

namespace PostViewCount\Includes;

// Exit if access directly
if( ! defined( 'ABSPATH' ) ) exit;

/**
 * PVC_Save_Post_Views Class
 * 
 * This class will save post views in singe post meta 
 * 
 * @since 1.0.0
 */
class PVC_Save_Post_Views{
    
    /**
     * PVC_Save_Post_Views constructor
     */
    public function __construct(){
        add_action( 'wp_head', array( $this, 'pvc_save_post_views' ) );
    }

    /**
     * Save Post Views
     * 
     * @since 1.0.0
     */
    public function pvc_save_post_views(){
        
        // Check if the post is a single post and post type is 'post' and is main query
        if( is_single() && get_post_type() == 'post' && is_main_query() ){
            $post_id = get_the_ID();
            $views = get_post_meta( $post_id, 'pvc_post_views', true );
            $views = $views ? $views : 0;
            $views++;
            update_post_meta( $post_id, 'pvc_post_views', $views );
        }

    }
}