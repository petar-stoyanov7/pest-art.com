<?php
/**
 * The Template part for displaying similar posts
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

$postType = get_post_type();
$postId = get_the_ID();

$title = "Подобни блог постове";
$args = [
	'post_type'         => $postType,
	'post_status'       => 'publish',
	'posts_per_page'    => 2,
    'post__not_in'      => [$postId],
    'orderby'           => 'rand'
];
if ('caricature' === $postType) {
	$title = "Подобни карикатури";
}
$terms = get_the_terms($postId, 'gallery');
if (is_array($terms) && count($terms) > 0 && is_a($terms[0], 'WP_Term')) {
    $args['tax_query'] = [
            [
                'taxonomy'  => 'gallery',
                'field'     => 'id',
                'terms'     => [$terms[0]->term_id]
            ]
    ];
}
$similarQuery = new WP_Query($args);
if (!$similarQuery->have_posts()) {
	return;
}
?>

<div class="pa-similar">
    <h3 class="pa-similar__title">
        <?php echo $title; ?>
    </h3>
	<?php
	while ($similarQuery->have_posts()) {
		$similarQuery->the_post();
		get_template_part('template-parts/archive-home');
	}
	?>
</div>
