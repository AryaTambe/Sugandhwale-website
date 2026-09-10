


<?php
defined('ABSPATH') || exit;

get_header();
?>

<main class="cart-page">

    <section class="cart-section">

        <div class="cart-container">

            <div class="section-heading cart-heading">
                <span class="heading-accent">✦</span>
                <h1>Your Cart</h1>
                <span class="heading-accent">✦</span>
            </div>

            <?php if (WC()->cart->is_empty()) : ?>

                <div class="cart-empty">

                    <h2>Your cart is empty</h2>

                    <p>
                        Add something beautiful to your cart and continue shopping.
                    </p>

                    <a
    href="<?php echo esc_url(home_url('/products/')); ?>"
    class="cart-button"
>
    CONTINUE SHOPPING →
</a>

                </div>

            <?php else : ?>

                <form
                    class="woocommerce-cart-form cart-form"
                    action="<?php echo esc_url(wc_get_cart_url()); ?>"
                    method="post"
                >

                    <div class="cart-layout">

                        <!-- CART ITEMS -->
                        <div class="cart-items">

                            <?php do_action('woocommerce_before_cart_contents'); ?>

                            <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : ?>

                                <?php
                                $_product = apply_filters(
                                    'woocommerce_cart_item_product',
                                    $cart_item['data'],
                                    $cart_item,
                                    $cart_item_key
                                );

                                if (
                                    !$_product ||
                                    !$_product->exists() ||
                                    $cart_item['quantity'] <= 0
                                ) {
                                    continue;
                                }

                                $product_permalink = $_product->is_visible()
                                    ? $_product->get_permalink($cart_item)
                                    : '';

                                $thumbnail = $_product->get_image(
                                    'woocommerce_thumbnail'
                                );
                                ?>

                                <article class="cart-item">

                                    <!-- IMAGE -->
                                    <div class="cart-item-image">

                                        <?php if ($product_permalink) : ?>

                                            <a href="<?php echo esc_url($product_permalink); ?>">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </a>

                                        <?php else : ?>

                                            <?php echo wp_kses_post($thumbnail); ?>

                                        <?php endif; ?>

                                    </div>


                                    <!-- DETAILS -->
                                    <div class="cart-item-details">

                                        <h2 class="cart-item-title">

                                            <?php if ($product_permalink) : ?>

                                                <a href="<?php echo esc_url($product_permalink); ?>">
                                                    <?php echo esc_html($_product->get_name()); ?>
                                                </a>

                                            <?php else : ?>

                                                <?php echo esc_html($_product->get_name()); ?>

                                            <?php endif; ?>

                                        </h2>


                                        <div class="cart-item-price">

                                            <?php
                                            echo wp_kses_post(
                                                WC()->cart->get_product_price($_product)
                                            );
                                            ?>

                                        </div>


                                        <?php
                                        echo wc_get_formatted_cart_item_data($cart_item);
                                        ?>


                                        <!-- QUANTITY + REMOVE -->
                                        <div class="cart-item-controls">

                                            <div class="cart-quantity">

                                                <label
                                                    for="quantity-<?php echo esc_attr($cart_item_key); ?>"
                                                >
                                                    Quantity
                                                </label>

                                                <?php

                                                woocommerce_quantity_input(
                                                    array(
                                                        'input_name'  => "cart[{$cart_item_key}][qty]",
                                                        'input_id'    => "quantity-{$cart_item_key}",
                                                        'input_value' => $cart_item['quantity'],
                                                        'min_value'   => 0,
                                                        'max_value'   => $_product->get_max_purchase_quantity(),
                                                    ),
                                                    $_product,
                                                    false
                                                );

                                                ?>

                                            </div>


                                            <a
                                                href="<?php echo esc_url(
                                                    wc_get_cart_remove_url($cart_item_key)
                                                ); ?>"
                                                class="cart-remove"
                                                aria-label="<?php echo esc_attr(
                                                    sprintf(
                                                        'Remove %s from cart',
                                                        $_product->get_name()
                                                    )
                                                ); ?>"
                                            >
                                                REMOVE
                                            </a>

                                        </div>

                                    </div>


                                    <!-- ITEM TOTAL -->
                                    <div class="cart-item-total">

                                        <?php
                                        echo wp_kses_post(
                                            WC()->cart->get_product_subtotal(
                                                $_product,
                                                $cart_item['quantity']
                                            )
                                        );
                                        ?>

                                    </div>

                                </article>

                            <?php endforeach; ?>


                            <?php do_action('woocommerce_cart_contents'); ?>


                            <!-- UPDATE CART -->
                            <div class="cart-update-row">

                                <button
                                    type="submit"
                                    class="cart-button cart-update-button"
                                    name="update_cart"
                                    value="1"
                                >
                                    UPDATE CART
                                </button>

                                <?php do_action('woocommerce_cart_actions'); ?>

                                <?php
                                wp_nonce_field(
                                    'woocommerce-cart',
                                    'woocommerce-cart-nonce'
                                );
                                ?>

                            </div>


                            <?php do_action('woocommerce_after_cart_contents'); ?>

                        </div>


                        <!-- CART SUMMARY -->
                        <aside class="cart-summary">

                            <h2>Cart Summary</h2>


                            <div class="cart-summary-row">

                                <span>Subtotal</span>

                                <strong>
                                    <?php
                                    echo wp_kses_post(
                                        WC()->cart->get_cart_subtotal()
                                    );
                                    ?>
                                </strong>

                            </div>


                            <?php if (
                                WC()->cart->needs_shipping() &&
                                WC()->cart->show_shipping()
                            ) : ?>

                                <div class="cart-summary-row cart-shipping-note">

                                    <span>Shipping</span>

                                    <strong>
                                        Calculated at checkout
                                    </strong>

                                </div>

                            <?php endif; ?>


                            <div class="cart-summary-total">

                                <span>Total</span>

                                <strong>
                                    <?php
                                    echo wp_kses_post(
                                        WC()->cart->get_total()
                                    );
                                    ?>
                                </strong>

                            </div>


                            <a
                                href="<?php echo esc_url(wc_get_checkout_url()); ?>"
                                class="cart-button cart-checkout-button"
                            >
                                PROCEED TO CHECKOUT →
                            </a>


                            <a
                                href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                                class="cart-continue"
                            >
                                ← CONTINUE SHOPPING
                            </a>

                        </aside>

                    </div>

                </form>

            <?php endif; ?>

        </div>

    </section>

</main>

<?php get_footer(); ?>