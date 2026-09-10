<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<main class="contact-page">

    <!-- PAGE HEADING -->
    <section class="contact-heading">
        <div class="contact-container">

            <span class="contact-eyebrow">
                GET IN TOUCH
            </span>

            <h1>Contact Us</h1>

        </div>
    </section>


    <!-- CONTACT CONTENT -->
    <section class="contact-section">

        <div class="contact-container">

            <div class="contact-grid">


                <!-- CONTACT FORM -->
                <div class="contact-form-wrapper">

                    <h2>Send Us an Email</h2>

                    <form class="contact-form" method="post">

                        <div class="contact-form-row">

                            <div class="contact-field">
                                <input
                                    type="text"
                                    name="name"
                                    placeholder="Your Name"
                                    required
                                >
                            </div>

                        </div>


                        <div class="contact-form-row two-columns">

                            <div class="contact-field">
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="Email"
                                    required
                                >
                            </div>

                            <div class="contact-field">
                                <input
                                    type="tel"
                                    name="phone"
                                    placeholder="Contact No."
                                    required
                                >
                            </div>

                        </div>


                        <div class="contact-field">

                            <textarea
                                name="message"
                                placeholder="Message"
                                rows="7"
                                required
                            ></textarea>

                        </div>


                        <button type="submit" class="contact-submit">
                            Submit
                        </button>

                    </form>

                </div>


                <!-- CONTACT DETAILS -->
                <aside class="contact-details">

                    <h2>Contact Details</h2>


                    <!-- ADDRESS -->
                    <div class="contact-detail-item">

                        <h3>
                            <span class="contact-icon">⌖</span>
                            Address
                        </h3>

                        <p>
                            Sugandhwale,<br>
                            102, 1st Floor, Shakuntal,<br>
                            Beside Jipsi Corner, Shivaji Park,<br>
                            Dadar (West), Mumbai – 400028
                        </p>

                    </div>


                    <!-- EMAIL -->
                    <div class="contact-detail-item">

                        <h3>
                            <span class="contact-icon">✉</span>
                            Email
                        </h3>

                        <p>
                            <a href="mailto:info@sugandhwale.com">
                                info@sugandhwale.com
                            </a>
                        </p>

                    </div>


                    <!-- PHONE -->
                    <div class="contact-detail-item">

                        <h3>
                            <span class="contact-icon">☎</span>
                            Phone Number
                        </h3>

                        <p>
                            <a href="tel:+918291327076">
                                +91 82913 27076
                            </a>
                        </p>

                    </div>


                    <!-- WHATSAPP -->
                    <div class="contact-detail-item contact-whatsapp">

                        <a
                            href="https://wa.me/918291327076"
                            target="_blank"
                            rel="noopener"
                        >
                            WhatsApp Us
                            <span>→</span>
                        </a>

                    </div>

                </aside>

            </div>

        </div>

    </section>


    <!-- MAP -->
    <section class="contact-map-section">

        <div class="contact-container">

           <div class="contact-map">

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d947.8810306525439!2d72.83979219147105!3d19.025056339599647!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cfe30741910b%3A0xd9a077c2a6107afe!2sSugandhwale!5e1!3m2!1sen!2sin!4v1788516211033!5m2!1sen!2sin"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>