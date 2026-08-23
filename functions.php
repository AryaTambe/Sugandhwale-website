<?php

function sugandhwale_setup() {

    // Let WordPress manage the page title
    add_theme_support('title-tag');

    // Featured images
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'sugandhwale'),
    ));
}

add_action('after_setup_theme', 'sugandhwale_setup');


/*
 * Load CSS and JavaScript
 */
function sugandhwale_assets() {

    // Main stylesheet
    wp_enqueue_style(
        'sugandhwale-style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    // Global CSS
    wp_enqueue_style(
        'sugandhwale-global',
        get_template_directory_uri() . '/assets/css/global.css',
        array('sugandhwale-style'),
        '1.0'
    );

    // Header CSS
    wp_enqueue_style(
        'sugandhwale-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array('sugandhwale-global'),
        '1.0'
    );

    // Home CSS
    wp_enqueue_style(
        'sugandhwale-home',
        get_template_directory_uri() . '/assets/css/home.css',
        array('sugandhwale-global'),
        '1.0'
    );

    // Header JavaScript
    wp_enqueue_script(
        'sugandhwale-header',
        get_template_directory_uri() . '/assets/js/header.js',
        array(),
        '1.0',
        true
    );

    // Hero Slider JavaScript
    wp_enqueue_script(
        'sugandhwale-hero-slider',
        get_template_directory_uri() . '/assets/js/hero-slider.js',
        array(),
        '1.0',
        true
    );

}


add_action('wp_enqueue_scripts', 'sugandhwale_assets');