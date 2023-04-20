<?php
/**
 * The Template file for displaying single caricature
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

$previousClass = "ps-controls__control is-previous";
$nextClass = "ps-controls__control is-next";

$previous = get_previous_post();
$previousClass .= empty($previous) ? " is-disabled" : '';
$previousLink = empty($previous) ? '#' : get_permalink($previous->ID);

$next = get_next_post();
$nextClass .= empty($next) ? " is-disabled" : '';
$nextLink = empty($next) ? '#' : get_permalink($next->ID);

$img = get_the_post_thumbnail_url();
$title = get_the_title();
?>

<ul class="ps-controls">
        <li class="<?php echo $previousClass; ?>">
            <a class="" href="<?php echo $previousLink; ?>"></a>
        </li>
        <li class="<?php echo $nextClass; ?>">
            <a class="" href="<?php echo $nextLink; ?>"></a>
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
