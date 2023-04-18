<?php
/**
 * The template for displaying blog content
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

$link = get_the_permalink();
?>
<article class="pa-archive pa-post">
    <a href="<?php echo $link; ?>" class="pa-archive__link">
        <h3 class="pa-post__title">
		    <?php the_title(); ?>
        </h3>
        <div class="pa-post__excerpt">
		    <?php the_excerpt(); ?>
        </div>
    </a>
</article>
