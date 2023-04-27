<?php
/**
 * Queries
 *
 * @package Pest-art
 * @since Pest-art 0.0.6
 */

add_action('pre_get_posts', 'queryOverride');
function queryOverride(WP_Query $query) : WP_Query
{
	if ($query->is_search()) {
		$query->set('post__not_in', getHiddenCaricatureIds());
	}

	return $query;
}


add_action('wp_insert_post', 'resetTransients', 10, 2);
function resetTransients($postId, WP_Post $post) : void
{
	if ('caricature' === $post->post_type) {
		resetHiddenList();
	}

	$categories = get_the_terms($postId, 'gallery');

	if (empty($categories)) {
		$caricatures = get_term_by('slug', 'caricatures', 'gallery');

		if (!empty($caricatures)) {
			wp_set_post_terms( $postId, [ $caricatures->term_id ], 'gallery' );
		}
	}
}
