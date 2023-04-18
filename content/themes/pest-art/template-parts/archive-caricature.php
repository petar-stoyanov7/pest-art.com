<?php
/**
 * The template for displaying caricature
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

$postId = get_the_ID();
$src = get_the_post_thumbnail_url($postId, 'archive-large');
$srcSet = get_the_post_thumbnail_url($postId, 'archive-small') . " 400w, " .
          get_the_post_thumbnail_url($postId, 'archive-medium') . " 600w, " .
          get_the_post_thumbnail_url($postId, 'archive-large') . " 800w";
$sizes = "(max-width: 600px) 400px, (max-width: 800px) 600px, (max-width: 2560px) 800px";
$title = get_the_title();
$excerpt = get_the_excerpt();
$link = get_the_permalink();
?>

<article class="pa-archive pa-caricature">
    <a href="<?php echo $link; ?>" class="pa-archive__link">
        <h3 class="pa-caricature__title">
            <?php echo $title; ?>
        </h3>
        <figure class="pa-caricature__image">
            <img
                    srcset="<?php echo $srcSet; ?>"
                    sizes="<?php echo $sizes; ?>"
                    src="<?php echo $src; ?>"
                    alt="<?php echo $title; ?>"
            >
        </figure>
        <?php if (!empty($excerpt)) : ?>
            <span class="pa-caricature__excerpt">
            <?php echo $excerpt; ?>
        </span>
        <?php endif; ?>
    </a>
</article>
