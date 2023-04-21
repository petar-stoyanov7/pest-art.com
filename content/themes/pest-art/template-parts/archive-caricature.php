<?php
/**
 * The template for displaying caricature
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

$postId = get_the_ID();
$url = get_template_directory_uri() . '/dist/images/cover-default.jpg';
$src = get_the_post_thumbnail_url($postId, 'archive-large');
$srcSet = $sizes = false;
if (!empty($src)) {
	$srcSet = get_the_post_thumbnail_url($postId, 'archive-small') . " 400w, " .
	          get_the_post_thumbnail_url($postId, 'archive-medium') . " 600w, " .
	          get_the_post_thumbnail_url($postId, 'archive-large') . " 800w";
	$sizes = "(max-width: 600px) 400px, (max-width: 800px) 600px, (max-width: 2560px) 800px";
    $url = $src;
}
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
                <?php if (!empty($srcSet)) : ?>
                    srcset="<?php echo $srcSet; ?>"
                <?php endif; ?>
                <?php if (!empty($sizes)) : ?>
                    sizes="<?php echo $sizes; ?>"
                <?php endif; ?>
                src="<?php echo $url; ?>"
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
