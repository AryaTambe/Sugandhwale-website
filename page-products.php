<?php get_header(); ?>

<main class="products-page">

    <!-- =========================================
         SHOP HERO
    ========================================== -->

    <section class="products-hero">

        <div class="products-hero-inner">

            <span class="products-eyebrow">
                SUGANDHWALE COLLECTION
            </span>

            <h1>
                Find Your<br>
                <em>Perfect Fragrance.</em>
            </h1>

            <p>
                Explore fragrances created for everyday moments,
                traditions, celebrations and the spaces you call home.
            </p>

        </div>

    </section>


    <!-- =========================================
         CATEGORY NAVIGATION
    ========================================== -->

    <section class="products-navigation">

        <div class="products-container">

            <div class="products-nav-header">

                <span class="products-eyebrow">
                    EXPLORE OUR COLLECTION
                </span>

                <p>
                    Choose a category and discover what speaks to you.
                </p>

            </div>


            <div class="products-category-list">

                <a
                    href="<?php echo esc_url(get_permalink()); ?>"
                    class="products-category <?php echo !isset($_GET['category']) ? 'active' : ''; ?>"
                >
                    <span>01</span>
                    All Products
                </a>


                <a
                    href="<?php echo esc_url(add_query_arg('category', 'agarbatti', get_permalink())); ?>"
                    class="products-category <?php echo (isset($_GET['category']) && $_GET['category'] === 'agarbatti') ? 'active' : ''; ?>"
                >
                    <span>02</span>
                    Agarbatti
                </a>


                <a
                    href="<?php echo esc_url(add_query_arg('category', 'perfumes', get_permalink())); ?>"
                    class="products-category <?php echo (isset($_GET['category']) && $_GET['category'] === 'perfumes') ? 'active' : ''; ?>"
                >
                    <span>03</span>
                    Perfumes
                </a>


                <a
                    href="<?php echo esc_url(add_query_arg('category', 'home-fragrance', get_permalink())); ?>"
                    class="products-category <?php echo (isset($_GET['category']) && $_GET['category'] === 'home-fragrance') ? 'active' : ''; ?>"
                >
                    <span>04</span>
                    Home Fragrance
                </a>


                <a
                    href="<?php echo esc_url(add_query_arg('category', 'pooja-essentials', get_permalink())); ?>"
                    class="products-category <?php echo (isset($_GET['category']) && $_GET['category'] === 'pooja-essentials') ? 'active' : ''; ?>"
                >
                    <span>05</span>
                    Pooja Essentials
                </a>

            </div>

        </div>

    </section>


    <!-- =========================================
         PRODUCTS
    ========================================== -->

    <section class="products-showcase">

        <div class="products-container">

            <div class="products-showcase-header">

                <div>

                    <span class="products-eyebrow">
                        OUR PRODUCTS
                    </span>

                </div>


                <?php
                $category_slug = isset($_GET['category'])
                    ? sanitize_title($_GET['category'])
                    : '';
                ?>

                <p class="products-status">

                    <?php
                    if ($category_slug) {

                        $category = get_term_by(
                            'slug',
                            $category_slug,
                            'product_cat'
                        );

                        if ($category) {
                            echo esc_html($category->name);
                        }

                    } else {

                        echo 'Explore our collection';

                    }
                    ?>

                </p>

            </div>


            <!-- =====================================
                 PRODUCT QUERY
            ====================================== -->

            <?php

            $paged = get_query_var('paged')
                ? get_query_var('paged')
                : 1;


            $product_args = array(

                'post_type'      => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => 10,
                'paged'          => $paged,

            );


            // Add category filter

            if ($category_slug) {

                $product_args['tax_query'] = array(

                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category_slug,
                    )

                );

            }


            $products_query = new WP_Query($product_args);

            ?>


            <?php if ($products_query->have_posts()) : ?>


                <!-- =====================================
                     PRODUCT GRID
                ====================================== -->

                <div class="products-grid">

                    <?php while ($products_query->have_posts()) : ?>

                        <?php
                        $products_query->the_post();

                        global $product;

                        if (!$product) {
                            continue;
                        }

                        ?>


                        <article class="product-card">


                            <!-- PRODUCT IMAGE -->

                            <a
                                href="<?php the_permalink(); ?>"
                                class="product-image"
                            >

                                <?php

                                if (has_post_thumbnail()) {

                                    the_post_thumbnail(
                                        'large',
                                        array(
                                            'alt' => get_the_title()
                                        )
                                    );

                                } else {

                                    echo '<div class="product-image-placeholder">Sugandhwale</div>';

                                }

                                ?>

                            </a>


                            <!-- PRODUCT INFO -->

                            <div class="product-info">


                                <!-- CATEGORY -->

                                <?php

                                $terms = get_the_terms(
                                    get_the_ID(),
                                    'product_cat'
                                );

                                if ($terms && !is_wp_error($terms)) :

                                ?>

                                    <span class="product-category">

                                        <?php
                                        echo esc_html(
                                            $terms[0]->name
                                        );
                                        ?>

                                    </span>

                                <?php endif; ?>


                                <!-- PRODUCT NAME -->

                                <h3>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_title(); ?>

                                    </a>

                                </h3>


                                <!-- PRODUCT PRICE -->

                                <div class="product-bottom">

                                    <span class="product-price">

                                        <?php
                                        echo $product->get_price_html();
                                        ?>

                                    </span>


                                    <a
                                        href="<?php the_permalink(); ?>"
                                        class="product-arrow"
                                        aria-label="View <?php the_title_attribute(); ?>"
                                    >
                                        →
                                    </a>

                                </div>

                            </div>

                        </article>


                    <?php endwhile; ?>

                </div>


                <!-- =====================================
                     PAGINATION
                ====================================== -->

                <?php

                $pagination = paginate_links(array(

                    'total'     => $products_query->max_num_pages,

                    'current'   => $paged,

                    'type'      => 'list',

                    'prev_text' => '←',

                    'next_text' => '→',

                ));

                if ($pagination) :

                ?>

                    <nav class="products-pagination">

                        <?php echo $pagination; ?>

                    </nav>

                <?php endif; ?>


            <?php else : ?>


                <!-- =====================================
                     NO PRODUCTS
                ====================================== -->

                <div class="products-coming-soon">

                    <div class="products-coming-soon-number">
                        01
                    </div>

                    <div class="products-coming-soon-content">

                        <span class="products-eyebrow">
                            COMING SOON
                        </span>

                        <h3>
                            Something Beautiful<br>
                            <em>Is On Its Way.</em>
                        </h3>

                        <p>

                            We're currently preparing this collection.
                            Check back soon to discover our fragrances.

                        </p>

                    </div>

                </div>


            <?php endif; ?>


            <?php wp_reset_postdata(); ?>


        </div>

    </section>


    <!-- =========================================
         CLOSING
    ========================================== -->

    <section class="products-closing">

        <div class="products-closing-inner">

            <span class="products-eyebrow">
                MORE THAN JUST A FRAGRANCE
            </span>

            <h2>
                Every Scent Begins<br>
                <em>With a Feeling.</em>
            </h2>

            <p>
                Discover fragrances designed to become part
                of your everyday moments.
            </p>

        </div>

    </section>

</main>

<?php get_footer(); ?>