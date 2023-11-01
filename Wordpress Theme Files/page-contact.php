<?php

$data = zbs_get_contact_data();

get_header();
?>

<main id="primary" class="site-main page-content">

    <!-- Hero Section -->
    <section class="hero-area" style="background-image: url('<?php echo $data['hero-url'] ?>')">
        <div class="overlay"></div>
        <h1>Contact Us</h1>
    </section>
    <!-- Hero Section Ends -->

    <!-- Contact details with form -->
    <section class="contact-details">
        <div class="inner-container">
            <div class="details">
                <div class="intro">
                    <hr />
                    <span class="section-intro">Contact Us</span>
                </div>
                <div class="spacer-1"></div>
                <h2>If need any info, please contact <span>us!</span></h2>
                <div class="spacer-2"></div>
                <div class="icon-details">
                    <div class="single">
                        <div class="icon-container">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="texts">
                            <span>Head office address: </span>
                            <br />
                            <p><?php echo $data['street'] ?><br /><?php echo $data['city'] ?></p>
                        </div>
                    </div>
                    <div class="spacer-3"></div>
                    <div class="single">
                        <div class="icon-container">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div class="texts">
                            <span>Mail for information: </span>
                            <br />
                            <p><?php echo $data['email'] ?></p>
                        </div>
                    </div>
                    <div class="spacer-3"></div>
                    <div class="single">
                        <div class="icon-container">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>

                        <div class="texts">
                            <span>Call for help:</span>
                            <br />
                            <p><?php echo $data['phone'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form">
                <p> For any inquiries relating to our services, kindly fill the form below.<br><br><span>*</span> indicates required fields.</p>
                <?php echo do_shortcode('[fluentform id="3"]') ?>
            </div>
        </div>
    </section>
    <!-- Contact details with form -->

    <!-- Google Map -->
    <section class="google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63427.14407168313!2d3.345646302924557!3d6.496788216950303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8cf3ea9e2d33%3A0xdc48a40ac59ed2a5!2sLagos%20Mainland%20101245%2C%20Lagos!5e0!3m2!1sen!2sng!4v1697030108216!5m2!1sen!2sng" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!-- Google Map Ends -->

</main>

<?php
get_footer();
