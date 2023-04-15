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
    <div class="pa-header__desktop">
        <h1>desktop</h1>
    </div>
    <div class="pa-header__mobile">
        <h1>mobile</h1>
    </div>
</header>