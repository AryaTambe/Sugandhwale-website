<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
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

            <a href="#">
                Track Order
            </a>

            <span>|</span>

            <a href="#">
                Help Center
            </a>

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

            <a href="<?php echo esc_url(home_url('/about/')); ?>">
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

                <a href="<?php echo esc_url(home_url('/partnership/')); ?>">
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
                    class="header-icon"
                    type="button"
                    aria-label="Search"
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


                <!-- ACCOUNT -->

                <a
                    href="<?php echo esc_url(home_url('/my-account/')); ?>"
                    class="header-icon"
                    aria-label="Account"
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
                            cx="12"
                            cy="7"
                            r="4"
                        />

                        <path
                            d="M5 21c0-3.9 3.1-7 7-7s7 3.1 7 7"
                        />

                    </svg>

                </a>


                <!-- WISHLIST -->

                <a
                    href="#"
                    class="header-icon"
                    aria-label="Wishlist"
                >

                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >

                        <path
                            d="M20.8 8.7
                            C20.8 13.5 12 20 12 20
                            S3.2 13.5 3.2 8.7
                            C3.2 5.9 5.2 4 7.7 4
                            C9.3 4 10.8 4.8 12 6.1
                            C13.2 4.8 14.7 4 16.3 4
                            C18.8 4 20.8 5.9 20.8 8.7Z"
                        />

                    </svg>

                </a>


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
        >

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>

</header>