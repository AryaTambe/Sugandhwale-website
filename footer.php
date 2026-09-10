<?php
/**
 * Sugandhwale Footer
 */
?>

<!-- =========================================
     FOOTER
========================================= -->

<footer class="site-footer">

    <div class="footer-container">


        <!-- =====================================
             BRAND
        ====================================== -->

        <div class="footer-brand">

            <a
                href="<?php echo esc_url(home_url('/')); ?>"
                class="footer-logo"
            >

                <img
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/logo-white.png"
                    alt="<?php bloginfo('name'); ?>"
                >

            </a>

            <p>
                Bringing the essence of tradition, purity
                and premium fragrance into everyday life.
            </p>


            <!-- SOCIAL -->

            <div class="footer-social">

                <a
                    href="https://www.instagram.com/sugandhwale_sachinam/"
                    aria-label="Follow Sugandhwale on Instagram"
                    target="_blank"
                    rel="noopener"
                >
                    Instagram ↗
                </a>

            </div>

        </div>


        <!-- =====================================
             SHOP
        ====================================== -->

        <div class="footer-column">

            <h3>Shop</h3>

            <a href="<?php echo esc_url(home_url('/products/')); ?>">
                All Products
            </a>

            <a href="<?php echo esc_url(home_url('/products/?category=agarbatti')); ?>">
                Agarbatti
            </a>

            <a href="<?php echo esc_url(home_url('/products/?category=perfumes')); ?>">
                Perfumes
            </a>

            <a href="<?php echo esc_url(home_url('/products/?category=home-fragrance')); ?>">
                Home Fragrance
            </a>

            <a href="<?php echo esc_url(home_url('/products/?category=pooja-essentials')); ?>">
                Pooja Essentials
            </a>

        </div>


        <!-- =====================================
             COMPANY
        ====================================== -->

        <div class="footer-column">

            <h3>Company</h3>

            <a href="<?php echo esc_url(home_url('/our-story/')); ?>">
                Our Story
            </a>

            <a href="<?php echo esc_url(home_url('/partnership/')); ?>">
                Partnership
            </a>

            <a href="<?php echo esc_url(home_url('/academy/')); ?>">
                Academy
            </a>

            <a href="<?php echo esc_url(home_url('/blog/')); ?>">
                Blog
            </a>

            <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                Contact
            </a>

        </div>


        <!-- =====================================
             CUSTOMER CARE
        ====================================== -->

        <div class="footer-column">

            <h3>Customer Care</h3>

            <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                Contact Us
            </a>

            <a href="#">
                Shipping & Delivery
            </a>

            <a href="#">
                Returns & Refunds
            </a>

            <a href="#">
                FAQs
            </a>

            <a href="#">
                Track Order
            </a>

        </div>


        <!-- =====================================
             CONTACT
        ====================================== -->

        <div class="footer-column footer-contact">

            <h3>Get in Touch</h3>

            <p>
                Have a question or need help?
            </p>

            <a href="mailto:info@sugandhwale.com">
                info@sugandhwale.com
            </a>

            <a href="tel:+918291327076">
                +91 82913 27076
            </a>

            <a
                href="https://wa.me/918291327076"
                target="_blank"
                rel="noopener"
            >
                WhatsApp Us ↗
            </a>

            <a
                href="https://maps.app.goo.gl/5EaEuFymgQeaNVCB6"
                target="_blank"
                rel="noopener"
                class="footer-address"
            >
                Sugandhwale, 102, 1st floor, Shakuntal,
                Beside Jipsi Corner, Shivaji Park,
                Dadar (West), Mumbai - 400 028.
            </a>

        </div>

    </div>


    <!-- =========================================
         FOOTER BOTTOM
    ========================================== -->

    <div class="footer-bottom">

        <div class="footer-bottom-inner">

            <p>
                © <?php echo date('Y'); ?>
                Sugandhwale. All rights reserved.
            </p>


            <div class="footer-legal">

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms & Conditions
                </a>

                <a href="#">
                    Refund Policy
                </a>

            </div>


            <p class="developer-credit">
                Website Design & Development by Arya
            </p>

        </div>

    </div>

</footer>


<?php wp_footer(); ?>

</body>
</html>