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
	'post_type' => $postType,
	'post_status' => 'publish',
	'posts_per_page' => 2,
    'post__not_in' => [$postId]
];
if ('caricature' === $postType) {
	$title = "Подобни карикатури";
	//TODO add category
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
