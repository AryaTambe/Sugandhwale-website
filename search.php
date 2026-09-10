<?php
defined('ABSPATH') || exit;

get_header();

$search_query = get_search_query();

?>

<main class="search-page">

    <div class="search-page-container">

        <div class="search-page-heading">

            <span>SEARCH</span>

            <h1>
                <?php
                if ($search_query) {
                    echo 'Results for "' . esc_html($search_query) . '"';
                } else {
                    echo 'Search Products';
                }
                ?>
            </h1>

        </div>


        <?php if (have_posts()) : ?>

            <div class="search-products">

                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $product = wc_get_product(get_the_ID());

                    if (!$product) {
                        continue;
                    }
                    ?>

                    <article class="search-product">

                        <a
                            href="<?php the_permalink(); ?>"
                            class="search-product-image"
                        >

                            <?php
                            echo $product->get_image(
                                'woocommerce_thumbnail'
                            );
                            ?>

                        </a>


                        <div class="search-product-info">

                            <h2>

                                <a href="<?php the_permalink(); ?>">

                                    <?php
                                    echo esc_html(
                                        $product->get_name()
                                    );
                                    ?>

                                </a>

                            </h2>


                            <div class="search-product-price">

                                <?php
                                echo wp_kses_post(
                                    $product->get_price_html()
                                );
                                ?>

                            </div>


                            <a
                                href="<?php the_permalink(); ?>"
                                class="search-product-link"
                            >
                                VIEW PRODUCT →
                            </a>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>


        <?php else : ?>

            <div class="search-no-results">

                <h2>
                    No products found
                </h2>

                <p>
                    We couldn't find a product matching
                    "<?php echo esc_html($search_query); ?>".
                </p>

                <a
                    href="<?php echo esc_url(home_url('/products/')); ?>"
                >
                    ← BACK TO SHOP
                </a>

            </div>

        <?php endif; ?>

    </div>

</main>


<?php get_footer(); ?>