<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<!-- =========================
     TOP ANNOUNCEMENT BAR
========================= -->

<div class="top-bar">

    <div class="top-bar-inner">

        <p>
            Bringing the essence of tradition, purity and premium fragrance into your life.
        </p>

        <div class="top-bar-links">

            <span>
                Help Center
            </span>

        </div>

    </div>

</div>


<!-- =========================
     MAIN NAVBAR
========================= -->

<header class="site-header">

    <div class="header-inner">


        <!-- =========================
             LEFT NAVIGATION
        ========================= -->

        <nav class="main-navigation">

            <a href="<?php echo esc_url(home_url('/')); ?>">
                Home
            </a>

            <a href="<?php echo esc_url(home_url('/products/')); ?>">
                Shop
            </a>

            <a href="<?php echo esc_url(home_url('/our-story/')); ?>">
                Our Story
            </a>

            <a href="<?php echo esc_url(home_url('/academy/')); ?>">
                Academy
            </a>

        </nav>


        <!-- =========================
             CENTER LOGO
        ========================= -->

        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="site-logo"
        >

            <img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/logo.png"
                alt="<?php bloginfo('name'); ?>"
            >

        </a>


        <!-- =========================
             RIGHT SIDE
        ========================= -->

        <div class="header-right">


            <!-- RIGHT NAVIGATION -->

            <nav class="secondary-navigation">

                <a href="<?php echo esc_url(home_url('/business-partner/')); ?>">
                    Business Partner (SBPP)
                </a>

                <a href="<?php echo esc_url(home_url('/blog/')); ?>">
                    Blog
                </a>

                <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                    Contact
                </a>

            </nav>


            <!-- =========================
                 HEADER ICONS
            ========================= -->

            <div class="header-actions">


                <!-- SEARCH -->

                <button
                    class="header-icon search-toggle"
                    type="button"
                    aria-label="Search"
                    aria-expanded="false"
                >

                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >

                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        />

                        <line
                            x1="16.65"
                            y1="16.65"
                            x2="21"
                            y2="21"
                        />

                    </svg>

                </button>


                <!-- CART -->

                <a
                    href="<?php echo esc_url(home_url('/cart/')); ?>"
                    class="header-icon cart-icon"
                    aria-label="Cart"
                >

                    <svg
                        width="21"
                        height="21"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >

                        <circle
                            cx="9"
                            cy="20"
                            r="1"
                        />

                        <circle
                            cx="18"
                            cy="20"
                            r="1"
                        />

                        <path
                            d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 7H6"
                        />

                    </svg>

                </a>

            </div>

        </div>


        <!-- =========================
             MOBILE MENU BUTTON
        ========================= -->

        <button
            class="mobile-menu-toggle"
            type="button"
            aria-label="Open menu"
            aria-expanded="false"
            aria-controls="mobile-navigation"
        >

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>


    <!-- =========================
         MOBILE NAVIGATION
    ========================= -->

    <nav
        id="mobile-navigation"
        class="mobile-navigation"
        aria-hidden="true"
    >

        <a href="<?php echo esc_url(home_url('/')); ?>">
            Home
        </a>

        <a href="<?php echo esc_url(home_url('/products/')); ?>">
            Shop
        </a>

        <a href="<?php echo esc_url(home_url('/our-story/')); ?>">
            Our Story
        </a>

        <a href="<?php echo esc_url(home_url('/academy/')); ?>">
            Academy
        </a>

        <a href="<?php echo esc_url(home_url('/business-partner/')); ?>">
            Business Partner (SBPP)
        </a>

        <a href="<?php echo esc_url(home_url('/blog/')); ?>">
            Blog
        </a>

        <a href="<?php echo esc_url(home_url('/contact/')); ?>">
            Contact
        </a>

    </nav>


    <!-- =========================
         SEARCH PANEL
    ========================= -->

    <div class="header-search-panel">

        <form
            role="search"
            method="get"
            action="<?php echo esc_url(home_url('/')); ?>"
        >

            <input
                type="search"
                name="s"
                placeholder="Search products..."
                aria-label="Search products"
                autocomplete="off"
            >

            <input
                type="hidden"
                name="post_type"
                value="product"
            >

            <button type="submit">
                SEARCH
            </button>

        </form>

    </div>

</header>