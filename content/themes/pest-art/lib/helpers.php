<?php
/**
 * Helper functions
 *
 * @package Pest-art
 * @since Pest-art 0.0.6
 */
function get_hidden_caricature_ids()
{
	$result = get_transient('pa-hidden-caricature-ids');
	if (!empty($result) && is_array($result)) {
		return $result;
	}

	$result = [];

	$terms = get_terms([
		'taxonomy'   => 'gallery',
		'hide_empty' => true,
		'fields'     => 'ids',
		'meta_query' => [
			[
				'key' => 'pa-is-hidden',
				'value' => true,
				'compare' => '='
			]
		]
	]);

	if (empty($terms) || !is_array($terms) || count($terms) < 1) {
		return $result;
	}
	
	$hiddenPosts = new WP_Query([
		'post_type' => 'caricature',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'tax_query' => [
			[
				'taxonomy' => 'gallery',
				'fields' => 'ids',
				'terms' => $terms
			]
		]
	]);

	if (is_wp_error($hiddenPosts) || !$hiddenPosts->have_posts()) {
		return $result;
	}

	foreach ($hiddenPosts->posts as $post) {
		$result[] = $post->ID;
	}

	set_transient('pa-hidden-caricature-ids', $result, DAY_IN_SECONDS);

	return $result;
}