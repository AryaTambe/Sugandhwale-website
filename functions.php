<?php

/**
 * Theme Setup
 */
function sugandhwale_setup() {

    // Let WordPress manage the page title
    add_theme_support('title-tag');

    // Enable featured images
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'sugandhwale'),
    ));
}

add_action('after_setup_theme', 'sugandhwale_setup');


/**
 * Calculate Blog Reading Time
 */
function sugandhwale_reading_time() {

    $content = get_post_field(
        'post_content',
        get_the_ID()
    );

    $word_count = str_word_count(
        wp_strip_all_tags($content)
    );

    $minutes = ceil($word_count / 200);

    return $minutes . ' min read';
}


/**
 * Load CSS and JavaScript
 */
function sugandhwale_assets() {

    /*
    =================================
    CORE CSS
    =================================
    */

    wp_enqueue_style(
        'sugandhwale-style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'sugandhwale-global',
        get_template_directory_uri() . '/assets/css/global.css',
        array('sugandhwale-style'),
        '1.0'
    );

    wp_enqueue_style(
        'sugandhwale-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array('sugandhwale-global'),
        '1.0'
    );


    /*
    =================================
    HOMEPAGE
    =================================
    */

    if (is_front_page()) {

        wp_enqueue_style(
            'sugandhwale-home',
            get_template_directory_uri() . '/assets/css/home.css',
            array('sugandhwale-global'),
            '1.0'
        );

        wp_enqueue_script(
            'sugandhwale-hero-slider',
            get_template_directory_uri() . '/assets/js/hero-slider.js',
            array(),
            '1.0',
            true
        );

    }


    /*
    =================================
    PRODUCTS / SHOP PAGE
    =================================
    */

    if (is_page('products')) {

        wp_enqueue_style(
            'sugandhwale-products',
            get_template_directory_uri() . '/assets/css/products.css',
            array('sugandhwale-global'),
            '1.0'
        );

        wp_enqueue_script(
            'sugandhwale-product-filter',
            get_template_directory_uri() . '/assets/js/product-filter.js',
            array(),
            '1.0',
            true
        );

    }


    /*
    =================================
    BLOG ARCHIVE PAGE
    =================================
    */

    if (is_home() || is_page('blog')) {

        wp_enqueue_style(
            'sugandhwale-blog',
            get_template_directory_uri() . '/assets/css/blog.css',
            array('sugandhwale-global'),
            '1.0'
        );

    }


    /*
    =================================
    OUR STORY / ABOUT PAGE
    =================================
    */

    if (is_page('our-story')) {

        wp_enqueue_style(
            'sugandhwale-about',
            get_template_directory_uri() . '/assets/css/about.css',
            array('sugandhwale-global'),
            '1.0'
        );

    }


    /*
    =================================
    SINGLE BLOG POSTS
    =================================
    */

    if (is_single() && get_post_type() === 'post') {

        wp_enqueue_style(
            'sugandhwale-single-post',
            get_template_directory_uri() . '/assets/css/single-post.css',
            array('sugandhwale-global'),
            '1.0'
        );

    }


    /*
    =================================
    CONTACT PAGE
    =================================
    */

    if (is_page('contact')) {

        wp_enqueue_style(
            'sugandhwale-contact',
            get_template_directory_uri() . '/assets/css/contact.css',
            array('sugandhwale-global'),
            '1.0'
        );

    }


    /*
    =================================
    CART PAGE
    =================================
    */

    if (is_page('cart')) {

        wp_enqueue_style(
            'sugandhwale-cart',
            get_template_directory_uri() . '/assets/css/cart.css',
            array(
                'sugandhwale-global',
                'sugandhwale-header'
            ),
            '1.0'
        );

    }

    if (is_singular('product')) {

    wp_enqueue_style(
        'sugandhwale-single-product',
        get_template_directory_uri() . '/assets/css/product-single.css',
        array('sugandhwale-global', 'sugandhwale-header'),
        '1.0'
    );

}

/*
=================================
CHECKOUT PAGE
=================================
*/

if (is_page('checkout')) {

    wp_enqueue_style(
        'sugandhwale-checkout',
        get_template_directory_uri() . '/assets/css/checkout.css',
        array(
            'sugandhwale-global',
            'sugandhwale-header'
        ),
        '1.0'
    );

}





    /*
    =================================
    FOOTER CSS
    =================================
    */

    wp_enqueue_style(
        'sugandhwale-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        array('sugandhwale-global'),
        '1.0'
    );


    /*
    =================================
    HEADER JAVASCRIPT
    =================================
    */

    wp_enqueue_script(
        'sugandhwale-header-js',
        get_template_directory_uri() . '/assets/js/header.js',
        array(),
        '1.0',
        true
    );
    if (is_singular('product')) {

    wp_enqueue_style(
        'sugandhwale-single-product',
        get_template_directory_uri() . '/assets/css/single-product.css',
        array('sugandhwale-global', 'sugandhwale-header'),
        '1.0'
    );

    wp_enqueue_script(
        'sugandhwale-single-product',
        get_template_directory_uri() . '/assets/js/single-product.js',
        array(),
        '1.0',
        true
    );

}

}


add_action('wp_enqueue_scripts', 'sugandhwale_assets');

/**
 * WooCommerce Product Search
 */
function sugandhwale_product_search($query) {

    if (
        !is_admin() &&
        $query->is_main_query() &&
        $query->is_search()
    ) {

        $post_type = $query->get('post_type');

        if ($post_type === 'product') {

            $query->set('post_type', 'product');

            $query->set('posts_per_page', -1);

        }

    }

}

add_action('pre_get_posts', 'sugandhwale_product_search');