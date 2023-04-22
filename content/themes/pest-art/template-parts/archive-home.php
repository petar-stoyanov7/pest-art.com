<?php
/**
 * The template for displaying home page content
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */
$postType = get_post_type();

if ('post' === $postType) {
	get_template_part('template-parts/archive', 'post');
} elseif ('caricature' === $postType) {
	get_template_part('template-parts/archive', 'caricature');
} elseif ('page' === $postType && !is_search()) {
	get_template_part('template-parts/page');
} elseif ('page' === $postType && is_search()) {
	get_template_part('template-parts/archive', 'post');
} else {
	get_template_part('template-parts/single', 'post');
}

