<?php

namespace PostViewCount\Includes\Classes;

// Exit if access directly
if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class PVC_Admin_Column
 * 
 * @since 1.0.0
 */
class PVC_Admin_Column{

    /**
     * Constructor for the class.
     */
    public function __construct(){
        $pvc_admin_column = pvc_get_option( 'pvc_admin_column', 'pvc_settings', 'yes' );

        if( 'yes' === $pvc_admin_column ){
            add_filter( 'manage_posts_columns', array( $this, 'add_views_column' ) );
            add_action( 'manage_posts_custom_column', array( $this, 'display_views' ), 10, 2 );
            add_filter( 'manage_edit-post_sortable_columns', array( $this, 'sortable_views_column' ) );
            add_action( 'pre_get_posts', array( $this, 'sort_views_column' ) );
        }
        
    }

    /**
     * Add views column in post list table
     * 
     * @param array $columns
     * 
     * @return array
     */
    public function add_views_column( $columns ){
        $columns['post_views'] = __( 'Views', 'post-view' );
        return $columns;
    }

    /**
     * Display views count in views column in post list table
     * 
     * @param string $column
     * @param int $post_id
     */
    public function display_views( $column, $post_id ){
        if( $column === 'post_views' ){
            echo get_post_meta( $post_id, 'pvc_post_views', true );
        }
    }

    /**
     * Make views column Sortable based on views count
     * 
     */
    public function sortable_views_column( $columns ){
        $columns['post_views'] = 'post_views';
        return $columns;
    }

    /**
     * Sort views column based on views count in post list table using pre_get_posts hook
     * 
     * @param \WP_Query $query
     */
    public function sort_views_column( $query ){

        // Check if the query is for admin and not the main query
        if( !is_admin() || !$query->is_main_query() ) {
            return;
        }

        $orderby = $query->get( 'orderby' );

        if( 'post_views' === $orderby ){
            $query->set('meta_key', 'pvc_post_views');
            $query->set('orderby', 'meta_value_num');
        }
    }
}