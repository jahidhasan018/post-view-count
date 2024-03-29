<?php

namespace PostViewCount\Includes\Classes;

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
     * PVC_Shortcodes constructor
     */
    public function __construct(){
        // Single post view count shortcode
        add_shortcode( 'post_view_count', [ $this, 'pvc_single_post_view_count_shortcode' ] );
    }

    /**
     * Render Post View Count Shortcode
     *
     * @param array $atts Attributes passed to the shortcode.
     * @param null|string $content Content within the shortcode.
     * @return string Rendered HTML for the shortcode.
     */
    public function pvc_single_post_view_count_shortcode( $atts, $content = null ){

        $atts = shortcode_atts( array(
            'id' => '',
            'title' => '',
            'subtitle' => '',
        ), $atts, 'post_view_count' );

        extract( $atts );

        // Get post_id and show_title from shortcode attributes
        $box_title  = pvc_get_option( 'pvc_views_box_title', 'pvc_settings', __( 'Post Views', 'post-views' ) );
        $box_sub_title  = pvc_get_option( 'pvc_views_box_subtitle', 'pvc_settings', __( 'Total views', 'post-views' ) );
        $post_id = !empty( $id ) ? absint( $id ) : get_the_ID();
        $title = !empty( $title ) ? sanitize_text_field( $title ) : esc_html( $box_title );
        $subtitle = !empty( $subtitle ) ? sanitize_text_field( $subtitle ) : esc_html( $box_sub_title );

        // Get post views
        $views = $this->get_post_views( $post_id );
        // Format the views
        $views = number_format_i18n( $views );

        // Return post view count
        ob_start();
        ?>

            <div class="pvc-view-count-wrap">
                <div class="pvc-single-post-view-count">
                    <?php if( '' !== $title ): ?>
                        <h4><?php echo esc_html( $title ); ?></h4>
                    <?php endif; ?>

                    <span><?php echo esc_html( $subtitle ); ?></span>
                    <p><?php echo esc_html( $views ); ?></p>
                </div>
            </div>

        <?php
        return ob_get_clean();

    }

    /**
     * Get Post Views
     *
     * @param int $post_id Post ID to get views for.
     * @return int Number of views for the post.
     */
    private function get_post_views( $post_id ){
        $views = get_post_meta($post_id, 'pvc_post_views', true);
        return $views ? $views + 1 : 0;
    }
}
