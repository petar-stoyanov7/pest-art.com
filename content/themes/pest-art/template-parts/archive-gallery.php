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
$galleryImage = get_field('pa-category-image', "{$galleryTerm->taxonomy}_{$galleryTerm->term_id}");
$srcSet = "{$galleryImage['sizes']['archive-small']} 400w, " .
          "{$galleryImage['sizes']['archive-medium']} 600w, " .
          "{$galleryImage['sizes']['archive-large']} 800w";
$sizes = "(max-width: 600px) 400px, (max-width: 800px) 600px, (max-width: 2560px) 800px";
$excerpt = term_description($galleryTerm);
?>

<article class="pa-archive pa-caricature pa-gallery">
	<a href="<?php echo $link; ?>" class="pa-archive__link" target="_blank">
		<h3 class="pa-caricature__title">
			<?php echo $galleryTerm->name; ?>
		</h3>
		<figure class="pa-caricature__image">
			<img
				srcset="<?php echo $srcSet; ?>"
				sizes="<?php echo $sizes; ?>"
				src="<?php echo $galleryImage['url']; ?>"
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
