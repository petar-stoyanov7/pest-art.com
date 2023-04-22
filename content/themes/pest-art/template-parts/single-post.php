<?php
/**
 * The Template part for displaying single post
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

?>
<article class="ps-post">
	<h1><?php the_title(); ?></h1>
	<div class="pa-post__content">
		<?php the_content(); ?>s
	</div>
    <?php if (!is_search()) : ?>
	<div class="pa-post__similar">
		<?php get_template_part('template-parts/single-similar-posts'); ?>
	</div>
    <?php endif; ?>
</article>
