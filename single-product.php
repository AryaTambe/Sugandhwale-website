<?php
/**
 * Sugandhwale
 * Single WooCommerce Product Page
 */

defined('ABSPATH') || exit;

get_header();

global $product;

if (!$product || !is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}

if (!$product) {
    return;
}

$product_id = $product->get_id();

/*
|--------------------------------------------------------------------------
| PRODUCT DATA
|--------------------------------------------------------------------------
*/

$product_name = $product->get_name();

$categories = wc_get_product_category_list(
    $product_id,
    ', '
);

$short_description = $product->get_short_description();

$description = $product->get_description();

$main_image_id = $product->get_image_id();

$gallery_ids = $product->get_gallery_image_ids();

$sku = $product->get_sku();

$review_count = $product->get_review_count();

$average_rating = $product->get_average_rating();

$min_quantity = max(
    1,
    (int) $product->get_min_purchase_quantity()
);

$max_quantity = $product->get_max_purchase_quantity();

?>

<main class="sw-product">

    <!-- =====================================================
         PRODUCT HERO
    ====================================================== -->

    <section class="sw-product-main">


        <!-- =================================================
             PRODUCT IMAGES
        ================================================== -->

        <div class="sw-product-visual">

            <div class="sw-product-gallery">


                <!-- MAIN IMAGE -->

                <div class="sw-product-image">

                    <?php if ($main_image_id) : ?>

                        <?php
                        echo wp_get_attachment_image(
                            $main_image_id,
                            'full',
                            false,
                            array(
                                'class' => 'sw-main-product-image',
                                'alt'   => esc_attr($product_name),
                            )
                        );
                        ?>

                    <?php else : ?>

                        <?php
                        echo wc_placeholder_img(
                            'full',
                            array(
                                'class' => 'sw-main-product-image',
                            )
                        );
                        ?>

                    <?php endif; ?>

                </div>


                <!-- IMAGE GALLERY -->

                <?php if ($main_image_id || !empty($gallery_ids)) : ?>

                    <div class="sw-product-thumbnails">


                        <?php if ($main_image_id) : ?>

                            <button
                                type="button"
                                class="sw-product-thumbnail active"
                                data-image="<?php echo esc_url(
                                    wp_get_attachment_image_url(
                                        $main_image_id,
                                        'full'
                                    )
                                ); ?>"
                                aria-label="View product image"
                            >

                                <?php
                                echo wp_get_attachment_image(
                                    $main_image_id,
                                    'thumbnail',
                                    false,
                                    array(
                                        'alt' => esc_attr($product_name),
                                    )
                                );
                                ?>

                            </button>

                        <?php endif; ?>


                        <?php foreach ($gallery_ids as $gallery_id) : ?>

                            <button
                                type="button"
                                class="sw-product-thumbnail"
                                data-image="<?php echo esc_url(
                                    wp_get_attachment_image_url(
                                        $gallery_id,
                                        'full'
                                    )
                                ); ?>"
                                aria-label="View product image"
                            >

                                <?php
                                echo wp_get_attachment_image(
                                    $gallery_id,
                                    'thumbnail',
                                    false,
                                    array(
                                        'alt' => esc_attr($product_name),
                                    )
                                );
                                ?>

                            </button>

                        <?php endforeach; ?>


                    </div>

                <?php endif; ?>

            </div>

        </div>


        <!-- =================================================
             PRODUCT INFORMATION
        ================================================== -->

        <div class="sw-product-info">


            <!-- CATEGORY -->

            <?php if ($categories) : ?>

                <div class="sw-product-category">

                    <?php echo wp_kses_post($categories); ?>

                </div>

            <?php endif; ?>


            <!-- PRODUCT NAME -->

            <h1 class="sw-product-title">

                <?php echo esc_html($product_name); ?>

            </h1>


            <!-- RATING -->

            <?php if ($review_count > 0) : ?>

                <div class="sw-product-rating">

                    <span class="sw-stars">

                        <?php
                        echo esc_html(
                            str_repeat(
                                '★',
                                max(
                                    1,
                                    min(
                                        5,
                                        (int) round(
                                            (float) $average_rating
                                        )
                                    )
                                )
                            )
                        );
                        ?>

                    </span>

                    <span class="sw-review-count">

                        <?php
                        echo esc_html(
                            $review_count
                        );
                        ?>

                        <?php
                        echo $review_count === 1
                            ? ' Review'
                            : ' Reviews';
                        ?>

                    </span>

                </div>

            <?php endif; ?>


            <!-- PRICE -->

            <div class="sw-product-price">

                <?php
                echo wp_kses_post(
                    $product->get_price_html()
                );
                ?>

            </div>


            <!-- SHORT DESCRIPTION -->

            <?php if ($short_description) : ?>

                <div class="sw-product-intro">

                    <?php
                    echo wp_kses_post(
                        $short_description
                    );
                    ?>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 PURCHASE AREA
            ================================================== -->

            <div class="sw-product-purchase">


                <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>


                    <!-- =========================================
                         VARIABLE PRODUCT
                    ========================================== -->

                    <?php if ($product->is_type('variable')) : ?>

                        <div class="sw-variable-product">

                            <?php
                            /*
                             * WooCommerce handles:
                             *
                             * - Product attributes
                             * - 100g / 200g
                             * - Size
                             * - Colour
                             * - Variation prices
                             * - Variation stock
                             * - Variation IDs
                             * - Add to cart
                             */

                            woocommerce_variable_add_to_cart();
                            ?>

                        </div>


                    <!-- =========================================
                         SIMPLE PRODUCT
                    ========================================== -->

                    <?php else : ?>

                        <form
                            class="cart sw-cart-form"
                            action="<?php echo esc_url(
                                apply_filters(
                                    'woocommerce_add_to_cart_form_action',
                                    $product->get_permalink()
                                )
                            ); ?>"
                            method="post"
                            enctype="multipart/form-data"
                        >


                            <!-- QUANTITY -->

                            <div class="sw-quantity">

                                <button
                                    type="button"
                                    class="sw-qty-minus"
                                    aria-label="Decrease quantity"
                                >
                                    −
                                </button>


                                <input
                                    type="number"
                                    class="sw-qty-input"
                                    name="quantity"
                                    value="<?php echo esc_attr(
                                        $min_quantity
                                    ); ?>"
                                    min="<?php echo esc_attr(
                                        $min_quantity
                                    ); ?>"
                                    <?php
                                    if ($max_quantity > 0) {
                                        echo 'max="' .
                                            esc_attr($max_quantity) .
                                            '"';
                                    }
                                    ?>
                                    step="1"
                                >


                                <button
                                    type="button"
                                    class="sw-qty-plus"
                                    aria-label="Increase quantity"
                                >
                                    +
                                </button>

                            </div>


                            <!-- ADD TO CART -->

                            <button
                                type="submit"
                                name="add-to-cart"
                                value="<?php echo esc_attr(
                                    $product_id
                                ); ?>"
                                class="single_add_to_cart_button sw-add-to-cart"
                            >
                                Add to Cart
                            </button>


                            <!-- BUY NOW -->

                            <button
                                type="submit"
                                name="sw_buy_now"
                                value="<?php echo esc_attr(
                                    $product_id
                                ); ?>"
                                class="sw-buy-now"
                            >
                                Buy Now
                            </button>


                        </form>

                    <?php endif; ?>


                <?php else : ?>


                    <!-- OUT OF STOCK -->

                    <?php if (!$product->is_in_stock()) : ?>

                        <div class="sw-product-unavailable">

                            Out of Stock

                        </div>


                    <?php else : ?>

                        <div class="sw-product-unavailable">

                            This product is currently unavailable.

                        </div>

                    <?php endif; ?>


                <?php endif; ?>


            </div>


        </div>

    </section>


    <!-- =====================================================
         FULL PRODUCT DESCRIPTION
    ====================================================== -->

    <?php if ($description) : ?>

        <section class="sw-product-description">

            <div class="sw-description-label">

                <span>
                    PRODUCT DESCRIPTION
                </span>

            </div>


            <div class="sw-description-content">

                <?php
                echo wp_kses_post(
                    apply_filters(
                        'the_content',
                        $description
                    )
                );
                ?>

            </div>

        </section>

    <?php endif; ?>


    <!-- =====================================================
         PRODUCT DETAILS
    ====================================================== -->

    <section class="sw-product-information">

        <div class="sw-information-label">

            <span>
                PRODUCT DETAILS
            </span>

        </div>


        <div class="sw-information-content">


            <!-- SKU -->

            <?php if ($sku) : ?>

                <div class="sw-detail-row">

                    <span>
                        SKU
                    </span>

                    <strong>
                        <?php echo esc_html($sku); ?>
                    </strong>

                </div>

            <?php endif; ?>


            <!-- CATEGORY -->

            <?php if ($categories) : ?>

                <div class="sw-detail-row">

                    <span>
                        Category
                    </span>

                    <strong>
                        <?php echo wp_kses_post($categories); ?>
                    </strong>

                </div>

            <?php endif; ?>


            <!-- STOCK -->

            <div class="sw-detail-row">

                <span>
                    Availability
                </span>

                <strong>

                    <?php if ($product->is_in_stock()) : ?>

                        In Stock

                    <?php else : ?>

                        Out of Stock

                    <?php endif; ?>

                </strong>

            </div>


        </div>

    </section>


    <!-- =====================================================
         CONTINUE SHOPPING
    ====================================================== -->

    <section class="sw-product-footer">

        <a href="<?php echo esc_url(
            home_url('/products/')
        ); ?>">

            ← Continue Shopping

        </a>

    </section>


</main>


<?php get_footer(); ?>