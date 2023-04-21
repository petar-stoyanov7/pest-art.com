<?php
/**
 * The Template file for displaying single caricature
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

$isRandom = !empty($args) && !empty($args['is-random']) && $args['is-random'];
$previousClass = "ps-controls__control is-previous";
$nextClass = "ps-controls__control is-next";

$previous = get_previous_post();
$previousClass .= empty($previous) && !$isRandom ? " is-disabled" : '';
$previousLink = empty($previous) ? '#' : get_permalink($previous->ID);

$next = get_next_post();
$nextClass .= empty($next) && !$isRandom ? " is-disabled" : '';
$nextLink = empty($next) ? '#' : get_permalink($next->ID);

$img = get_the_post_thumbnail_url();
$title = get_the_title();

if (!empty($args) && !empty($args['is-random']) && $args['is-random']) {
    $nextLink = $previousLink = '/random';
}
?>

<ul id="nav-controls" class="ps-controls">
        <li class="<?php echo $previousClass; ?>">
            <a id="previous-item" href="<?php echo $previousLink; ?>"></a>
        </li>
        <li class="<?php echo $nextClass; ?>">
            <a id="next-item" href="<?php echo $nextLink; ?>"></a>
        </li>
</ul>
<article class="ps-caricature">
	<h1 class="ps-caricature__title">
        <?php echo $title; ?>
    </h1>
    <figure class="ps-caricature__image">
        <img
                src="<?php echo $img; ?>"
                alt="<?php echo $title; ?>"
        >
    </figure>
    <span class="ps-caricature__description">
        <?php the_content(); ?>
    </span>
	<div class="pa-post__similar">
		<?php get_template_part('template-parts/single-similar-posts'); ?>
	</div>
</article>
