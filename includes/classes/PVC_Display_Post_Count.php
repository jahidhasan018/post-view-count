<?php

namespace PostViewCount\Includes\Classes;

/**
 * PVC_Display_Post_Count class
 * 
 * @since 1.0.0
 */
class PVC_Display_Post_Count {

    public function __construct() {
        // Add filter to display post count
        add_filter( 'the_content', array( $this, 'display_post_count' ));
    }

    /**
     * display_post_count callback
     * 
     * @param string $content
     * 
     * @return string
     */
    public function display_post_count( $content ) {
        // Get option value from database
        $show_count = pvc_get_option( 'pvc_show_count', 'pvc_settings', 'yes' );
        $box_position = esc_html( pvc_get_option( 'pvc_views_box_position', 'pvc_settings', 'after' ) );

        // Don't show the count box if show count is set to 'no' or if it's a single post or if it's not a 'post' type
        if( 'no' === $show_count || ! is_single() || 'post' !== get_post_type() ){
            return $content;
        }
        
        // If the box position is set to 'before' then show the count box before the content
        if( 'before' === $box_position ){
            $content = do_shortcode("[post_view_count]") . $content;
            return $content;
        }

        // If show count is set to 'yes' then show the count
        $content .= do_shortcode("[post_view_count]");
        return $content;
    }
}