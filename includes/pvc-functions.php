<?php

/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 *
 * @return mixed
 */
function pvc_get_option( $option, $section, $default = '' ) {
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    return $default;
}

// Register wprest field to get post views meta data via rest api - for block
register_rest_field( 'post', 'views', array(
'get_callback' => function ( $data ) {
    return get_post_meta( $data['id'], 'pvc_post_views', true );
}, ));