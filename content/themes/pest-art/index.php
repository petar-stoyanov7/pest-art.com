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

get_header();
?>

<main class="pa-content">
    <div class="pest-entry">
        <?php
        if (have_posts()) {
            while(have_posts()) {
                the_post();
                get_template_part('template-parts/content', get_post_format());
            }
        } else {
            get_template_part('template-parts/content', 'none');
        }
        ?>
    </div>

    <div class="pa-pagination">
        <?php defaultPagination(); ?>
    </div>
</main>


<?php get_footer(); ?>