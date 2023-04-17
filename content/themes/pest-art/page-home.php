<?php
/**
 * The Home Page  template file
 *
 * That's the very basic file for any WP theme.
 *
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Pest-art
 * @since Pest-art 0.0.1
 */

get_header();

$featuredQuery = new WP_Query([
	'post_type' => 'post',
    'post_status' => 'publish',
    'meta_key' => 'pa-featured',
    'meta_value' => true,
    'posts_per_page' => 1,
]);

$currentPage = 1;
if (preg_match('/\/page\/\d/', $_SERVER['REQUEST_URI'])) {
    $currentPage = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
}


$mainQuery = new WP_Query([
    'post_type' => ['post', 'caricature'],
    'post_status' => 'published',
//    'posts_per_page' => 12,
    'posts_per_page' => 2,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $currentPage
]);
?>

<main class="pa-content">
    <?php if (1 === $currentPage) : ?>
	<div class="pa-content__featured">
        <?php
        if ($featuredQuery->have_posts()) {
            while($featuredQuery->have_posts()) {
                $featuredQuery->the_post();
                get_template_part('template-parts/content-featured');
            }
        }
        wp_reset_postdata();
        ?>
	</div>
    <?php endif; ?>
    <div class="pa-content__container">
        <?php
        if ($mainQuery->have_posts()) {
            while($mainQuery->have_posts()) {
                $mainQuery->the_post();
                get_template_part('template-parts/content', 'home');
            }
        }
        ?>
    </div>
    <div class="pa-pagination">
        <?php archivePagination($mainQuery, $currentPage); ?>
    </div>
</main>

<?php get_footer(); ?>