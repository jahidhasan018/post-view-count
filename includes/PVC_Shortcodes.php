<?php

namespace PostViewCount\Includes;

// Exit if access directly
if( ! defined( 'ABSPATH' ) ) exit;

/**
 * PVC_Shortcodes Class
 * 
 * This class will register shortcode for post view count plugin
 *   
 * @since 1.0.0
 */

class PVC_Shortcodes{

    /**
     * PVC_Shortcode constructor
     */
    public function __construct(){
        // Single post view count shortcode
        add_shortcode( 'post_view_count', [ $this, 'pvc_single_post_view_count_shortcode' ] );
    }

    /**
     * Single Post View Count Shortcode
     * 
     * @since 1.0.0
     */
    public function pvc_single_post_view_count_shortcode( $atts, $content = null ){

        $atts = shortcode_atts( array(
            'post_type' => 'post',
            'id' => '',
            'title' => __( 'Post Views', 'post-view' ),
            'total_view_text' => __( 'Total views', 'post-view' ),
        ), $atts, 'post_view_count' );

        extract( $atts );

        // Get post_type, post_id and show_title from shortcode attributes
        $post_type = $post_type ? sanitize_text_field( $post_type ) : 'post';
        $post_id = $id ? absint( $id ) : get_the_ID();
        $title = $title ? sanitize_text_field( $title ) : '';
        $total_view_text = $total_view_text ? sanitize_text_field( $total_view_text ) : '';

        // Get post views from post meta
        $views = get_post_meta( $post_id, 'pvc_post_views', true );
        $views = $views ? $views : 0;

        // Return post view count
        ob_start();
        ?>

            <div class="pvc-view-count-wrap">
                <div class="pvc-single-post-view-count">
                    <?php if( '' !== $title ): ?>
                        <h4><?php echo esc_html( $title ); ?></h4>
                    <?php endif; ?>

                    <span><?php echo esc_html( $total_view_text ); ?></span>
                    <p><?php echo esc_html( $views ); ?></p>
                </div>
            </div>

        <?php
        return ob_get_clean();

    }
}
