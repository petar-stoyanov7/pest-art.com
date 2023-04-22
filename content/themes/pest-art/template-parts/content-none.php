<?php
/**
 * Template part for missing content
 *
 * @package Pesticide
 * @since 0.0.1
 */
?>

<article class="pa-archive pa-caricature pa-none">
    <h3 class="pa-caricature__title">
        Nothing found...
    </h3>
    <a href="<?php echo get_home_url(); ?>" class="pa-archive__link">
        <figure class="pa-caricature__image">
            <img
                src="<?php echo get_template_directory_uri() . '/dist/images/cover-default.jpg'; ?>"
                alt="Nothing"
            >
        </figure>
        <span class="pa-caricature__excerpt">
            These are not the caricatures you are looking for
        </span>
    </a>
</article>