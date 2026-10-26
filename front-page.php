<?php get_header(); ?>

<?php
$woocommerce_active = class_exists( 'WooCommerce' );
?>

<!-- =========================================
     HERO CAROUSEL
========================================= -->

<section class="hero-wrapper">

    <div class="hero-slider">

        <!-- =========================================
             SLIDE 1
        ========================================= -->

        <div class="hero-slide active">

            <img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero/hero-1.png"
                alt="Sugandhwale Premium Fragrance"
            >

        </div>


        <!-- =========================================
             SLIDE 2
        ========================================= -->

        <div class="hero-slide">

            <img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero/hero-2.png"
                alt="Sugandhwale Car Perfume"
            >

        </div>


        <!-- =========================================
             SLIDE 3 — CAR FRAGRANCE
        ========================================= -->

        <div class="hero-slide">

            <img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero/hero-3.png"
                alt="Sugandhwale Car Fragrance"
            >

            <div class="hero-slide-content hero-slide-content-car">

                <span class="hero-slide-eyebrow">
                    SUGANDHWALE
                </span>

                <h2>
                    Car Fragrance
                </h2>

                <p>
                    Elevate every journey.
                </p>

                <a
                    href="<?php
                        $perfume_term = get_term_by(
                            'slug',
                            'perfumes',
                            'product_cat'
                        );

                        echo (
                            $perfume_term &&
                            ! is_wp_error($perfume_term)
                        )
                            ? esc_url(get_term_link($perfume_term))
                            : esc_url(home_url('/products/'));
                    ?>"
                    class="hero-slide-button"
                >
                    Explore
                </a>

            </div>

        </div>


        <!-- =========================================
             SLIDE 4 — PERFUMES
        ========================================= -->

        <div class="hero-slide">

            <img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero/hero-4.png"
                alt="Sugandhwale Perfumes"
            >

            <div class="hero-slide-content hero-slide-content-perfume">

                <span class="hero-slide-eyebrow">
                    SUGANDHWALE
                </span>

                <h2>
                    Perfumes
                </h2>

                <p>
                    Find your signature fragrance.
                </p>

                <a
                    href="<?php
                        $perfume_term = get_term_by(
                            'slug',
                            'perfumes',
                            'product_cat'
                        );

                        echo (
                            $perfume_term &&
                            ! is_wp_error($perfume_term)
                        )
                            ? esc_url(get_term_link($perfume_term))
                            : esc_url(home_url('/products/'));
                    ?>"
                    class="hero-slide-button"
                >
                    Explore
                </a>

            </div>

        </div>


        <!-- =========================================
             LEFT ARROW
        ========================================= -->

        <button
            class="hero-arrow hero-prev"
            type="button"
            aria-label="Previous slide"
        >
            &#10094;
        </button>


        <!-- =========================================
             RIGHT ARROW
        ========================================= -->

        <button
            class="hero-arrow hero-next"
            type="button"
            aria-label="Next slide"
        >
            &#10095;
        </button>


        <!-- =========================================
             DOTS
        ========================================= -->

        <div class="hero-dots">

            <button
                class="hero-dot active"
                type="button"
                aria-label="Slide 1"
            ></button>

            <button
                class="hero-dot"
                type="button"
                aria-label="Slide 2"
            ></button>

            <button
                class="hero-dot"
                type="button"
                aria-label="Slide 3"
            ></button>

            <button
                class="hero-dot"
                type="button"
                aria-label="Slide 4"
            ></button>

        </div>

    </div>

</section>


<!-- =========================================
     HOMEPAGE CONTENT
========================================= -->

<main class="home-content">

    <!-- =========================================
     WHY SUGANDHWALE
========================================= -->

<section class="why-sugandhwale">

    <div class="why-sugandhwale-container">

        <h2 class="why-sugandhwale-title">
            Why Sugandhwale?
        </h2>


        <div class="why-sugandhwale-grid">


            <!-- LOW SMOKE -->

            <div class="why-item">

                <div class="why-icon">

                    <svg viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M24 38V24"/>
                        <path d="M24 24C18 20 18 14 23 10"/>
                        <path d="M24 24C30 20 30 14 25 10"/>
                        <path d="M17 38H31"/>
                    </svg>

                </div>

                <h3>Low Smoke</h3>

                <p>
                    Cleaner and more pleasant experience
                </p>

            </div>


            <!-- LONG LASTING -->

            <div class="why-item">

                <div class="why-icon">

                    <svg viewBox="0 0 48 48" aria-hidden="true">
                        <circle cx="24" cy="24" r="15"/>
                        <path d="M24 15V24L30 28"/>
                        <path d="M24 8V5"/>
                    </svg>

                </div>

                <h3>Long Lasting</h3>

                <p>
                    Stays longer and smells stronger
                </p>

            </div>


            <!-- PREMIUM QUALITY -->

            <div class="why-item">

                <div class="why-icon">

                    <svg viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M10 19L24 10L38 19L24 38L10 19Z"/>
                        <path d="M10 19H38"/>
                        <path d="M18 15L24 19L30 15"/>
                    </svg>

                </div>

                <h3>Premium Quality</h3>

                <p>
                    Finest ingredients carefully selected
                </p>

            </div>


            <!-- NATURAL AROMA -->

            <div class="why-item">

                <div class="why-icon">

                    <svg viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M24 39C17 33 13 27 15 21C17 16 22 13 24 9C27 13 32 16 33 21C35 27 31 33 24 39Z"/>
                        <path d="M24 31C21 27 21 23 24 19C27 23 27 27 24 31Z"/>
                    </svg>

                </div>

                <h3>Natural Aroma</h3>

                <p>
                    Pure, soothing and refreshing
                </p>

            </div>


            <!-- MADE IN INDIA -->

            <div class="why-item">

                <div class="why-icon">

                    <svg viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M24 38C24 29 18 24 12 23C13 31 17 37 24 38Z"/>
                        <path d="M24 38C24 29 30 24 36 23C35 31 31 37 24 38Z"/>
                        <path d="M24 38V13"/>
                        <path d="M24 13C20 10 17 10 14 12"/>
                        <path d="M24 18C28 15 31 15 34 17"/>
                    </svg>

                </div>

                <h3>Made in India</h3>

                <p>
                    Proudly crafted in India
                </p>

            </div>


            <!-- TRUSTED BRAND -->

            <div class="why-item">

                <div class="why-icon">

                    <svg viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M24 39C24 39 11 31 11 20C11 15 15 12 19 12C22 12 24 14 24 17C24 14 26 12 29 12C33 12 37 15 37 20C37 31 24 39 24 39Z"/>
                        <path d="M24 18V27"/>
                        <path d="M20 23L24 27L28 23"/>
                    </svg>

                </div>

                <h3>Trusted Brand</h3>

                <p>
                    Loved by thousands across India
                </p>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
     BEST SELLERS
========================================= -->

<section class="best-sellers">

    <div class="best-sellers-container">

        <!-- SECTION HEADING -->

        <div class="section-heading best-sellers-heading">

            <span class="heading-line"></span>

            <h2>Best Sellers</h2>

            <span class="heading-line"></span>

        </div>


        <!-- PRODUCTS -->

        <div class="best-sellers-wrapper">

            <!-- LEFT ARROW -->

            <button
                class="product-arrow product-prev"
                type="button"
                aria-label="Previous products"
            >
                &#10094;
            </button>


            <div class="best-sellers-grid">


                <?php
                if ( $woocommerce_active ) :

                    $best_sellers = new WP_Query(
                        array(
                            'post_type'      => 'product',
                            'posts_per_page' => 4,
                            'post_status'    => 'publish',
                            'meta_key'       => 'total_sales',
                            'orderby'        => 'meta_value_num',
                            'order'          => 'DESC',
                        )
                    );

                    if ( $best_sellers->have_posts() ) :

                        while ( $best_sellers->have_posts() ) :
                            $best_sellers->the_post();

                            $product = wc_get_product( get_the_ID() );

                            if ( ! $product ) {
                                continue;
                            }

                            $rating       = (float) $product->get_average_rating();
                            $review_count = (int) $product->get_review_count();
                            ?>

                            <article class="product-card">

                                <a href="<?php the_permalink(); ?>" class="product-image">

                                    <?php if ( has_post_thumbnail() ) : ?>

                                        <?php
                                        the_post_thumbnail(
                                            'woocommerce_thumbnail',
                                            array(
                                                'alt' => esc_attr( get_the_title() ),
                                            )
                                        );
                                        ?>

                                    <?php endif; ?>

                                </a>


                                <div class="product-info">

                                    <h3>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>


                                    <?php if ( $review_count > 0 ) : ?>

                                        <div class="product-rating">

                                            <span class="stars">
                                                <?php echo esc_html( str_repeat( '★', max( 0, min( 5, (int) round( $rating ) ) ) ) ); ?>
                                            </span>

                                            <span class="review-count">
                                                (<?php echo esc_html( $review_count ); ?>)
                                            </span>

                                        </div>

                                    <?php endif; ?>


                                    <div class="product-price">
                                        <?php echo wp_kses_post( $product->get_price_html() ); ?>
                                    </div>


                                    <?php if ( $product->is_purchasable() && $product->is_in_stock() && $product->is_type( 'simple' ) ) : ?>

                                        <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="add-to-cart">
                                            ADD TO CART
                                        </a>

                                    <?php else : ?>

                                        <a href="<?php the_permalink(); ?>" class="add-to-cart">
                                            ADD TO CART
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </article>

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>

                <?php endif; ?>


            <!-- RIGHT ARROW -->

            <button
                class="product-arrow product-next"
                type="button"
                aria-label="Next products"
            >
                &#10095;
            </button>

        </div>

    </div>

</section>
<!-- =========================================
     FEATURED BUSINESS SECTIONS
========================================= -->



<!-- =========================================
     VIDEO TESTIMONIALS
========================================= -->

<section class="video-testimonials">

    <div class="video-testimonials-container">

        <div class="section-heading">

            <span class="heading-accent">✦</span>

            <h2>Customer Stories</h2>

            <span class="heading-accent">✦</span>

        </div>


        <div class="video-testimonial-grid">


    <!-- VIDEO 1 -->

    <div class="video-testimonial">

        <video
            class="testimonial-video"
            controls
            preload="metadata"
        >

            <source
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/testimonials/testimonials1.mp4"
                type="video/mp4"
            >

            Your browser does not support the video tag.

        </video>

    </div>


    <!-- VIDEO 2 -->

    <div class="video-testimonial">

        <video
            class="testimonial-video"
            controls
            preload="metadata"
        >

            <source
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/testimonials/testimonials2.mp4"
                type="video/mp4"
            >

            Your browser does not support the video tag.

        </video>

    </div>


</div>


        </div>

    </div>

</section>

<!-- =========================================
     WHY CUSTOMERS LOVE US
========================================= -->

<section class="testimonials">

    <div class="testimonials-container">

        <div class="section-heading">

            <span class="heading-accent">✦</span>

            <h2>Why Customers Love Us</h2>

            <span class="heading-accent">✦</span>

        </div>

        <?php echo do_shortcode('[trustindex no-registration=google]'); ?>

    </div>

</section>

<!-- =========================================
     LATEST FROM THE BLOG
========================================= -->

<section class="latest-blog">

    <div class="latest-blog-container">

        <!-- SECTION HEADING -->

        <div class="blog-heading-row">

            <div class="section-heading">

                <span class="heading-accent">✦</span>

                <h2>Latest From the Blog</h2>

                <span class="heading-accent">✦</span>

            </div>

            <a
                href="<?php echo esc_url(home_url('/blog/')); ?>"
                class="view-all"
            >
                VIEW ALL →
            </a>

        </div>


        <!-- BLOG POSTS -->

        <div class="blog-grid">

            <?php

            $latest_posts = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ));

            if ($latest_posts->have_posts()) :

                while ($latest_posts->have_posts()) :
                    $latest_posts->the_post();

                    $categories = get_the_category();

            ?>

                <article class="blog-card">

                    <!-- FEATURED IMAGE -->

                    <a
                        href="<?php the_permalink(); ?>"
                        class="blog-image"
                    >

                        <?php if (has_post_thumbnail()) : ?>

                            <?php the_post_thumbnail(
                                'large',
                                array(
                                    'alt' => esc_attr(get_the_title())
                                )
                            ); ?>

                        <?php else : ?>

                            <div class="blog-image-placeholder">
                                Sugandhwale
                            </div>

                        <?php endif; ?>

                    </a>


                    <!-- BLOG CONTENT -->

                    <div class="blog-info">

                        <?php if (!empty($categories)) : ?>

                            <span class="blog-category">

                                <?php
                                echo esc_html(
                                    $categories[0]->name
                                );
                                ?>

                            </span>

                        <?php endif; ?>


                        <h3>

                            <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                            </a>

                        </h3>


                        <p>

                            <?php

                            $excerpt = get_the_excerpt();

                            if (empty($excerpt)) {

                                $excerpt = wp_trim_words(
                                    wp_strip_all_tags(
                                        get_the_content()
                                    ),
                                    22,
                                    '...'
                                );

                            }

                            echo esc_html($excerpt);

                            ?>

                        </p>


                        <a
                            href="<?php the_permalink(); ?>"
                            class="read-more"
                        >
                            READ MORE →
                        </a>

                    </div>

                </article>

            <?php

                endwhile;

                wp_reset_postdata();

            else :

            ?>

                <p class="no-blog-posts">
                    New stories are coming soon.
                </p>

            <?php endif; ?>

        </div>

    </div>

</section>



</main>



<?php get_footer(); ?>