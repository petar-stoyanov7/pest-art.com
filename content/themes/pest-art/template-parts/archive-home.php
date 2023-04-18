<?php
/**
 * The template for displaying home page content
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

if ('post' === get_post_type()) {
	get_template_part('template-parts/archive', 'post');
} else {
	get_template_part('template-parts/archive', 'caricature');
}

