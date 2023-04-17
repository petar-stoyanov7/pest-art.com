<?php
/**
 * The template for displaying blog content
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

?>
<article class="pa-archive pa-post">
    <h3 class="pa-post__title">
        <?php the_title(); ?>
    </h3>
    <div class="pa-post__excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>
