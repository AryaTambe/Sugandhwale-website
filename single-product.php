<?php
defined('ABSPATH') || exit;

get_header();

$product = wc_get_product(get_the_ID());

if (!$product) {
    get_footer();
    exit;
}

$categories = wc_get_product_category_list($product->get_id());

/*
 * WooCommerce returns -1 when there is no maximum
 * purchase quantity.
 *
 * Only add the max attribute when an actual limit exists.
 */
$max_quantity = $product->get_max_purchase_quantity();
?>

<main class="sw-product">

    <div class="sw-product-main">

        <!-- PRODUCT IMAGE -->
        <div class="sw-product-visual">

            <div class="sw-product-image">

                <?php
                echo $product->get_image(
                    'woocommerce_single',
                    array(
                        'class' => 'sw-main-image'
                    )
                );
                ?>

            </div>

        </div>


        <!-- PRODUCT INFORMATION -->
        <div class="sw-product-info">

            <!-- CATEGORY -->
            <?php if ($categories) : ?>

                <div class="sw-product-category">
                    <?php echo wp_kses_post($categories); ?>
                </div>

            <?php endif; ?>


            <!-- TITLE -->
            <h1>
                <?php echo esc_html($product->get_name()); ?>
            </h1>


            <!-- PRICE -->
            <div class="sw-product-price">
                <?php echo wp_kses_post($product->get_price_html()); ?>
            </div>


            <!-- DESCRIPTION -->
            <?php if ($product->get_short_description()) : ?>

                <div class="sw-product-intro">

                    <?php
                    echo wp_kses_post(
                        apply_filters(
                            'woocommerce_short_description',
                            $product->get_short_description()
                        )
                    );
                    ?>

                </div>

            <?php endif; ?>


            <!-- PURCHASE -->
            <div class="sw-product-purchase">

                <?php if (
                    $product->is_type('simple') &&
                    $product->is_purchasable() &&
                    $product->is_in_stock()
                ) : ?>

                    <form
                        class="sw-cart-form cart"
                        action="<?php echo esc_url($product->add_to_cart_url()); ?>"
                        method="post"
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
                                value="1"
                                min="1"
                                <?php
                                if ($max_quantity > 0) {
                                    echo 'max="' . esc_attr($max_quantity) . '"';
                                }
                                ?>
                                step="1"
                                inputmode="numeric"
                                aria-label="Product quantity"
                            />


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
                            value="<?php echo esc_attr($product->get_id()); ?>"
                            class="sw-add-to-cart"
                        >
                            ADD TO CART
                        </button>

                    </form>

                <?php else : ?>

                    <?php
                    woocommerce_template_single_add_to_cart();
                    ?>

                <?php endif; ?>

            </div>


            <!-- BRAND NOTE -->

            <div class="sw-product-note">

                <span>✦</span>

                Crafted with care in India

            </div>

        </div>

    </div>


    <!-- PRODUCT STORY -->

    <?php if ($product->get_description()) : ?>

        <section class="sw-product-story">

            <div class="sw-story-label">
                THE ESSENCE
            </div>

            <div class="sw-story-content">

                <?php
                echo wp_kses_post(
                    $product->get_description()
                );
                ?>

            </div>

        </section>

    <?php endif; ?>

</main>

<?php get_footer(); ?>