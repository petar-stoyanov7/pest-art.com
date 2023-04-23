<?php
/**
 * Helper functions
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