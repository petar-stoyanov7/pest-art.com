<?php
/**
 * The Template file for displaying random caricature
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

$randomQuery = new WP_Query([
	'post_type'         => 'caricature',
	'post_status'       => 'publish',
	'posts_per_page'    => 1,
    'post__not_in'      => get_hidden_caricature_ids(),
	'orderby'           => 'rand',
]);

get_header();
?>

<main class="pa-content pa-single">
	<?php
	if ($randomQuery->have_posts()) {
		while($randomQuery->have_posts()) {
			$randomQuery->the_post();
			get_template_part(
				'template-parts/single',
				get_post_type(),
				['is-random' => true]
			);
		}
	}
	?>
</main>

<?php get_footer(); ?>