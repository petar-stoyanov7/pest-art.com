<?php
/**
 * The Main template file
 *
 * That's the very basic file for any WP theme.
 *
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Pesticide
 * @since Pesticide 0.0.1
 */
$title = false;
$queriedObject = get_queried_object();

if (is_a($queriedObject, 'WP_Term')) {
    $title = $queriedObject->name;
} elseif (is_a($queriedObject, 'WP_Post_Type')) {
    $title = $queriedObject->label;
} elseif (is_home()) {
    $title = $queriedObject->post_title;
} elseif (is_search()) {
    $title = 'Търсене за "' . get_search_query() . '"';
}

get_header();
?>

<main class="pa-content">

    <div class="pa-content__container">
        <?php if (!empty($title)) : ?>
            <h1 class="pa-content__title">
                <?php echo $title; ?>
            </h1>
        <?php endif; ?>

        <?php
        if (have_posts()) {
            while(have_posts()) {
                the_post();
                get_template_part('template-parts/archive', 'home');
            }
        } else {
            get_template_part('template-parts/content', 'none');
        }
        ?>
    </div>

    <div class="pa-pagination">
        <?php archivePagination(); ?>
    </div>
</main>


<?php get_footer(); ?>