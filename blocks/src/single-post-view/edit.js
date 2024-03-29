import { InspectorControls, useBlockProps } from "@wordpress/block-editor";
import { PanelBody, TextControl } from "@wordpress/components";
import { useEffect, useState } from "@wordpress/element";
import { __ } from "@wordpress/i18n";

import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { postId, boxTitle, boxSubTitle } = attributes;
	const [postViewCount, setPostViewCount] = useState(null);

	useEffect(() => {
		// Fetch post meta value when postId changes
		if (postId) {
			// Fetch post meta asynchronously
			fetch(`/wp-json/wp/v2/posts/${postId}`)
				.then((response) => {
					if (!response.ok || response.status === 404) {
						throw new Error("No post found with the given ID.");
					}
					return response.json();
				})
				.then((postData) => {
					// Extract view count from custom field
					console.log(postData?.views);
					const viewCount = postData?.views || 0;
					setPostViewCount(viewCount);
				})
				.catch((error) => {
					console.error("No post found with the given ID.", error);
					setPostViewCount(null); // Set view count to null in case of error
				});
		}
	}, [postId]);

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Post View Count Settings", "post-view-count")}>
					<TextControl
						label={__("Post ID", "post-view-count")}
						value={postId}
						onChange={(newValue) => setAttributes({ postId: newValue })}
					/>
					<TextControl
						label={__("Box Title", "post-view-count")}
						value={boxTitle}
						onChange={(boxTitle) => setAttributes({ boxTitle })}
					/>
					<TextControl
						label={__("Box Sub Title", "post-view-count")}
						value={boxSubTitle}
						onChange={(boxSubTitle) => setAttributes({ boxSubTitle })}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...useBlockProps()}>
				<div className="pvc-single-post-view-count">
					<h4>{boxTitle}</h4>
					<span>{boxSubTitle}</span>
					<p>{postViewCount !== null ? postViewCount : "Post not found..."}</p>
				</div>
			</div>
		</>
	);
}
