<?php
/**
 * The template for caricature category
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

if (empty($args)) {
	return;
}
$galleryTerm = $args['term'];
$link = get_term_link($galleryTerm);
$selector = "{$galleryTerm->taxonomy}_{$galleryTerm->term_id}";
$galleryImage = get_field('pa-category-image', $selector);
$url = get_template_directory_uri() . '/dist/images/cover-default.jpg';
$srcSet = $sizes = false;
if (!empty($galleryImage)) {
	$srcSet = "{$galleryImage['sizes']['archive-small']} 400w, " .
	          "{$galleryImage['sizes']['archive-medium']} 600w, " .
	          "{$galleryImage['sizes']['archive-large']} 800w";
	$sizes  = "(max-width: 600px) 400px, (max-width: 800px) 600px, (max-width: 2560px) 800px";
    $url = $galleryImage['url'];
}
$excerpt = term_description($galleryTerm);
$order = get_field('pa-order', $selector);
?>

<article
        class="pa-archive pa-caricature pa-gallery"
        <?php if (!empty($order)) : ?>
            style="order: <?php echo $order; ?>"
        <?php endif; ?>
>
    <h3 class="pa-caricature__title">
		<?php echo $galleryTerm->name; ?>
    </h3>
	<a href="<?php echo $link; ?>" class="pa-archive__link" target="_blank">
		<figure class="pa-caricature__image">
			<img
                <?php if (!empty($srcSet)) : ?>
                    srcset="<?php echo $srcSet; ?>"
                <?php endif; ?>
                <?php if (!empty($sizes)) : ?>
                    sizes="<?php echo $sizes; ?>"
                <?php endif; ?>
				src="<?php echo $url; ?>"
				alt="<?php echo $galleryTerm->name; ?>"
			>
		</figure>
		<?php if (!empty($excerpt)) : ?>
			<span class="pa-caricature__excerpt">
            <?php echo $excerpt; ?>
        </span>
		<?php endif; ?>
	</a>
</article>
