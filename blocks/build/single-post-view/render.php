<?php
/**
 * Render the block on the frontend.
 * 
 */
	// get the post ID and post meta by id
	$post_id = $attributes['postId'];
	$title = $attributes['boxTitle'];
	$sub_title = $attributes['boxSubTitle'];
	$post_view_count = get_post_meta( $post_id, 'pvc_post_views', true );
?>
<div <?php echo get_block_wrapper_attributes(); ?> >
	<div className="pvc-single-post-view-count">
		<?php if( $title ): ?>
			<h4><?php echo esc_html( $title ); ?></h4>
		<?php endif; ?>

		<?php if( $sub_title ): ?>
			<span><?php echo esc_html( $sub_title ); ?></span>
		<?php endif; ?>
		<p><?php echo $post_view_count; ?></p>
	</div>
</div>

