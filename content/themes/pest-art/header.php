<?php

/**
 * The template for displaying the header
 *
 * Displays all the head elements, scripts, styles and everything up until the "container" div.
 *
 * @package Pesticide
 * @since Pesticide 0.0.1
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="pa-header">
    <div class="pa-header__overlay" id="pa-page-overlay"></div>
    <div class="pa-header__desktop">
        <?php pest_desktop_nav(); ?>
    </div>
    <div class="pa-header__mobile">
        <?php pest_mobile_nav(); ?>
        <div class="pa-header__mobile-home">
            <a href="<?php echo get_home_url(); ?>" class="pa-header__mobile-home-link"></a>
        </div>
    </div>
    <div class="pa-header__search">
        <form class="search-form" role="search" method="get" id="searchform" action="/">
            <input
                type="text"
                class="search-form__input"
                value=""
                name="s"
                id="s"
                aria-label="Search"
                placeholder="Търси..."
            >
            <button class="search-form__submit" type="submit"></button>
        </form>
    </div>
</header>