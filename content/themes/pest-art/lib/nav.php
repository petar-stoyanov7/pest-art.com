<?php
/**
 * Register Menus
 *
 * @package Pesticide
 * @since 0.0.1
 */

register_nav_menus(
    [
        'desktop-nav'   => esc_html__('Main Desktop Navigation', 'Pesticide'),
        'mobile-nav'    => esc_html__('Mobile Navigation', 'Pesticide'),
        'footer-nav'    => esc_html__('Footer Navigation', 'Pesticide'),
    ]
);

if (!function_exists( 'paDesktopMenu' )) {
    function paDesktopMenu()
    {
        wp_nav_menu(
            [
                'container'         => false,
                'menu-class'        => 'pest-desktop-menu',
                'items_wrap'        => '<ul id="%1$s" class="pa-header__desktop-navigation">%3$s</ul>',
                'theme_location'    => 'desktop-nav',
                'depth'             => 3
            ]
        );
    }
}

if (!function_exists( 'paMobileMenu' )) {
    function paMobileMenu()
    {
        wp_nav_menu(
            [
                'container'         => false,
                'items_wrap'        => '<ul id="%1$s" class="pa-header__mobile-navigation">%3$s</ul>',
                'theme_location'    => 'mobile-nav',
                'depth'             => 3
            ]
        );
    }
}

if (!function_exists( 'paFooterMenu' )) {
    function paFooterMenu()
    {
        wp_nav_menu(
            [
                'container'         => false,
                'menu-class'        => 'pest-footer-menu',
                'items_wrap'        => '<ul id="%1$s" class="pa-footer__menu-navigation">%3$s</ul>',
                'theme_location'    => 'footer-nav',
                'depth'             => 3
            ]
        );
    }
}