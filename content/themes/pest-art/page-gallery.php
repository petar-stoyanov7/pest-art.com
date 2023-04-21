<?php
/**
 * The Gallery template file
 *
 * @package Pest-art
 * @since Pest-art 0.0.1
 */


get_header();

$terms = get_terms([
	'taxonomy' => 'gallery',
	'hide_empty' => false
]);
?>
<main class="pa-content">
	<h1 class="pa-content__title">
		Галерия
	</h1>

	<div class="pa-content__container">
		<?php
		foreach ($terms as $term) {
//            $isHidden = get_field('pa-is-hidden', "{$term->taxonomy}_{$term->term_id}");
//            if (!empty($isHidden) && (bool)$isHidden) {
//                continue;
//            }
			get_template_part('template-parts/archive', 'gallery', ['term' => $term]);
		}
		?>
	</div>
</main>

<?php get_footer(); ?>