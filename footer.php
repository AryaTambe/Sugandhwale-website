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


            <!-- SOCIAL LINKS -->

            <div class="footer-social">

                <a
                    href="#"
                    aria-label="Instagram"
                    target="_blank"
                    rel="noopener"
                >
                    Instagram
                </a>

                <a
                    href="#"
                    aria-label="Facebook"
                    target="_blank"
                    rel="noopener"
                >
                    Facebook
                </a>

                <a
                    href="#"
                    aria-label="YouTube"
                    target="_blank"
                    rel="noopener"
                >
                    YouTube
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

            <a href="#">
                Agarbatti
            </a>

            <a href="#">
                Perfumes
            </a>

            <a href="#">
                Home Fragrance
            </a>

            <a href="#">
                Pooja Essentials
            </a>

        </div>


        <!-- =====================================
             COMPANY
        ====================================== -->

        <div class="footer-column">

            <h3>Company</h3>

            <a href="<?php echo esc_url(home_url('/about/')); ?>">
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

            <a href="#">
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

            <a href="tel:+910000000000">
                +91 00000 00000
            </a>

            <span class="footer-location">
                Mumbai, Maharashtra, India
            </span>

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


            <!-- DEVELOPER CREDIT -->

            <p class="developer-credit">
                Website Design & Development by Arya
            </p>

        </div>

    </div>

</footer>


<?php wp_footer(); ?>

</body>

</html>