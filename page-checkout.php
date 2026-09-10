<?php
defined('ABSPATH') || exit;

get_header();

if (!function_exists('WC') || !WC()->cart || WC()->cart->is_empty()) {
    wp_safe_redirect(home_url('/cart/'));
    exit;
}

$checkout = WC()->checkout();
?>

<main class="sw-checkout-page">

    <div class="sw-checkout-container">

        <!-- =========================================
             CHECKOUT HEADER
        ========================================= -->

        <header class="sw-checkout-header">

            <div class="sw-checkout-eyebrow">
                CHECKOUT
            </div>

            <h1>
                Complete Your Order
            </h1>

            <p>
                Please enter your details below to place your order.
            </p>

        </header>


        <!-- =========================================
             CHECKOUT FORM
        ========================================= -->

        <?php
        do_action(
            'woocommerce_before_checkout_form',
            $checkout
        );
        ?>


        <form
            name="checkout"
            method="post"
            class="checkout woocommerce-checkout"
            action="<?php echo esc_url(wc_get_checkout_url()); ?>"
            enctype="multipart/form-data"
        >

            <!-- =====================================
                 MAIN CHECKOUT
            ===================================== -->

            <div class="sw-checkout-layout">


                <!-- =================================
                     LEFT - CUSTOMER DETAILS
                ================================= -->

                <section class="sw-checkout-details">

                    <div class="sw-checkout-section-heading">

                        <span>01</span>

                        <div>

                            <h2>
                                Delivery Details
                            </h2>

                            <p>
                                Tell us where you'd like your order delivered.
                            </p>

                        </div>

                    </div>


                    <div class="sw-checkout-form">

                        <?php
                        do_action(
                            'woocommerce_checkout_billing'
                        );
                        ?>


                        <?php
                        do_action(
                            'woocommerce_checkout_shipping'
                        );
                        ?>

                    </div>

                </section>


                <!-- =================================
                     RIGHT - ORDER SUMMARY
                ================================= -->

                <aside class="sw-checkout-sidebar">

                    <div class="sw-order-summary">

                        <div class="sw-summary-heading">

                            <span>02</span>

                            <h2>
                                Your Order
                            </h2>

                        </div>


                        <div class="sw-summary-products">

                            <?php foreach (WC()->cart->get_cart() as $cart_item) : ?>

                                <?php

                                $product = $cart_item['data'];

                                if (
                                    !$product ||
                                    !$product->exists() ||
                                    $cart_item['quantity'] <= 0
                                ) {
                                    continue;
                                }

                                $quantity = $cart_item['quantity'];

                                ?>

                                <div class="sw-summary-product">


                                    <div class="sw-summary-product-image">

                                        <?php
                                        echo $product->get_image(
                                            'woocommerce_thumbnail'
                                        );
                                        ?>

                                    </div>


                                    <div class="sw-summary-product-info">

                                        <div class="sw-summary-product-name">

                                            <?php
                                            echo esc_html(
                                                $product->get_name()
                                            );
                                            ?>

                                        </div>


                                        <div class="sw-summary-product-meta">

                                            Qty <?php echo esc_html($quantity); ?>

                                        </div>

                                    </div>


                                    <div class="sw-summary-product-price">

                                        <?php
                                        echo wp_kses_post(
                                            WC()->cart->get_product_subtotal(
                                                $product,
                                                $quantity
                                            )
                                        );
                                        ?>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>


                        <!-- TOTALS -->

                        <div class="sw-summary-totals">

                            <div class="sw-summary-row">

                                <span>
                                    Subtotal
                                </span>

                                <strong>
                                    <?php
                                    wc_cart_totals_subtotal_html();
                                    ?>
                                </strong>

                            </div>


                            <?php if (WC()->cart->needs_shipping()) : ?>

                                <div class="sw-summary-row">

                                    <span>
                                        Shipping
                                    </span>

                                    <strong>
                                        <?php
                                        wc_cart_totals_shipping_html();
                                        ?>
                                    </strong>

                                </div>

                            <?php endif; ?>


                            <div class="sw-summary-total">

                                <span>
                                    Total
                                </span>

                                <strong>
                                    <?php
                                    wc_cart_totals_order_total_html();
                                    ?>
                                </strong>

                            </div>

                        </div>


                        <div class="sw-checkout-note">

                            <span>✦</span>

                            <p>
                                Your order will be personally confirmed
                                with you before dispatch.
                            </p>

                        </div>

                    </div>

                </aside>

            </div>


            <!-- =====================================
                 ADDITIONAL INFORMATION
            ===================================== -->

            <section class="sw-checkout-additional-section">

                <div class="sw-checkout-section-heading">

                    <span>03</span>

                    <div>

                        <h2>
                            Additional Information
                        </h2>

                        <p>
                            Anything else you'd like us to know?
                        </p>

                    </div>

                </div>


                <?php
                do_action(
                    'woocommerce_checkout_after_customer_details'
                );
                ?>

            </section>


            <!-- =====================================
                 PAYMENT
            ===================================== -->

            <section class="sw-checkout-payment">

                <div class="sw-checkout-section-heading">

                    <span>04</span>

                    <div>

                        <h2>
                            Payment & Confirmation
                        </h2>

                        <p>
                            Choose your payment method and place your order.
                        </p>

                    </div>

                </div>


                <div class="sw-payment-content">

                    <?php
                    do_action(
                        'woocommerce_checkout_order_review'
                    );
                    ?>

                </div>

            </section>

        </form>


        <?php
        do_action(
            'woocommerce_after_checkout_form',
            $checkout
        );
        ?>

    </div>

</main>

<?php get_footer(); ?>