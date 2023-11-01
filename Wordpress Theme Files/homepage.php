<?php

/* Template Name: Homepage Template */

$data = zbs_get_home_data();

get_header();
?>

<main id="primary" class="site-main page-content">
    <section class="image-slider" id="hero-slider">
        <!-- Slide 1 -->
        <div class="myslide fade">
            <div class="txt">
                <h1>Delivering Quality</h1>
                <p>
                    At ZBC Groups, we provide top-notch financial solutions tailored
                    to our clients' needs and goals, ensuring exceptional quality with
                    every service.
                </p>
                <a href="<?php echo get_permalink(4); ?>">Learn More</a>
            </div>
            <img src="<?php echo wp_get_attachment_url(40); ?>" style="width: 100%; height: 100%" />
            <div class="img-overlay"></div>
        </div>

        <!-- Slide 2 -->
        <div class="myslide fade">
            <div class="txt">
                <h1>Licensed & Qualified</h1>
                <p>
                    As a licensed financial solution provider, we prioritize
                    compliance and professionalism, offering peace of mind to clients
                    entrusting us with their financial affairs.
                </p>
                <a href="<?php echo get_permalink(18); ?>">Our Services</a>
            </div>
            <img src="<?php echo wp_get_attachment_url(42); ?>" style="width: 100%; height: 100%" />
            <div class="img-overlay"></div>
        </div>

        <!-- Slide 3 -->
        <div class="myslide fade">
            <div class="txt">
                <h1>Exceptional Solutions</h1>
                <p>
                    ZBC Groups offers personalized and exceptional solutions,
                    empowering clients to achieve their financial objectives with
                    confidence and expertise.
                </p>
                <a href="<?php echo get_permalink(10); ?>">Contact Us</a>
            </div>
            <img src="<?php echo wp_get_attachment_url(41); ?>" style="width: 100%; height: 100%" />
            <div class="img-overlay"></div>
        </div>

        <!-- Slide 4 -->
        <div class="myslide fade">
            <div class="txt">
                <h1>Business Updates</h1>
                <p>
                    Stay updated with the latest financial insights and trends through
                    our informative blog, crafted by our team of industry experts and
                    financial analysts.
                </p>
                <a href="<?php echo get_permalink(11); ?>">Read Our News</a>
            </div>
            <img src="<?php echo wp_get_attachment_url(43); ?>" style="width: 100%; height: 100%" />
            <div class="img-overlay"></div>
        </div>

        <!-- On Click Js -->
        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>

        <!-- Dots Box -->
        <div class="dotsbox" style="text-align: center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <!-- <span class="dot" onclick="currentSlide(5)"></span> -->
        </div>
    </section>

    <section class="about-home">
        <div class="inner-container">
            <div class="about">
                <span>About Us</span>
                <h2>We are ZBS Group</h2>
                <p><?php echo $data['intro'] ?></p>
            </div>
            <div class="digits">
                <div class="intro">
                    <hr />
                    <span class="section-intro">Business Statistics</span>
                </div>
                <div class="spacer"></div>
                <div class="stats-container">
                    <div class="stat-box">
                        <div class="container">
                            <i class="fa-solid fa-people-group"></i>
                            <span><?php echo $data['support'] ?></span>
                        </div>
                        <p>People Support</p>
                    </div>
                    <div class="stat-box">
                        <div class="container">
                            <i class="fa-solid fa-star"></i>
                            <span><?php echo $data['advisory'] ?></span>
                        </div>
                        <p>Advisory</p>
                    </div>
                    <div class="stat-box">
                        <div class="container">
                            <i class="fa-solid fa-face-smile"></i>
                            <span><?php echo $data['clients'] ?></span>
                        </div>
                        <p>Satisfied Clients</p>
                    </div>
                    <div class="stat-box">
                        <div class="container">
                            <i class="fa-solid fa-people-group"></i>
                            <span><?php echo $data['transactions'] ?></span>
                        </div>
                        <p>Completed Transactions</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="why-choose-us">
            <div class="intro">
                <hr />
                <span class="section-intro">Why Choose Us</span>
            </div>
            <div class="why-icon">
                <div class="icon">
                    <i class="fa-solid fa-thumbs-up"></i>
                </div>
                <span>Competent</span>
            </div>
            <div class="why-icon">
                <div class="icon">
                    <i class="fa-solid fa-shield"></i>
                </div>
                <span>Premium Service</span>
            </div>
            <div class="why-icon">
                <div class="icon">
                    <i class="fa-solid fa-business-time"></i>
                </div>
                <span>Timely Delivery</span>
            </div>
        </div>
    </section>

    <section class="what-we-do">
        <div class="inner-container">
            <div class="sub-title">
                <hr />
                <span>Services</span>
                <hr />
            </div>
            <h2 class="title">What We Do</h2>

            <div class="cards">
                <div class="single-card">
                    <div class="icon-container">
                        <i class="fa-solid fa-dollar-sign"></i>
                    </div>
                    <div class="content" style="background-image: url('<?php echo wp_get_attachment_url(54); ?>')">
                        <div class="overlay"></div>
                        <h3 class="card-title">Bureau De Change</h3>
                        <p class="card-description">
                            We are a foreign exchange company hased in Lagos State, Nigeria.
                        </p>
                        <div class="link">
                            <a href="<?php echo get_permalink(18); ?>">Learn More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-card">
                    <div class="icon-container">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="content" style="
                  background-image: url('<?php echo wp_get_attachment_url(51); ?>');">
                        <div class="overlay"></div>
                        <h3 class="card-title">Financial Auxillary Services</h3>
                        <p class="card-description">We provide information on the foreign exchange market to help our clients make the best business decision.
                        </p>
                        <div class="link">
                            <a href="<?php echo get_permalink(20); ?>">Learn More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-card">
                    <div class="icon-container">
                        <i class="fa-solid fa-circle-dollar-to-slot"></i>
                    </div>
                    <div class="content" style="background-image: url('<?php echo wp_get_attachment_url(55); ?>')">
                        <div class="overlay"></div>
                        <h3 class="card-title">Arbitrage</h3>
                        <p class="card-description">We offer Foreign exchange arbitrage to a diversified customer base that includes individuals and corporate entities.</p>
                        <div class="link">
                            <a href="<?php echo get_permalink(23); ?>">Learn More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-card">
                    <div class="icon-container">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <div class="content" style="background-image: url('<?php echo wp_get_attachment_url(44); ?>')">
                        <div class="overlay"></div>
                        <h3 class="card-title">Procurement</h3>
                        <p class="card-description">We offer an extensive range of commercial, technical procurement and supply services.
                        </p>
                        <div class="link">
                            <a href="<?php echo get_permalink(24); ?>">Learn More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-home">
        <div class="inner-container">
            <div class="sub-title">
                <hr />
                <span>Contact Us</span>
                <hr />
            </div>
            <h2 class="title">Get In touch</h2>
            <div class="grid-contact-form">
                <div class="form-space">
                    <?php echo do_shortcode('[fluentform id="3"]') ?>
                </div>

                <div class="image">
                    <img src="<?php echo wp_get_attachment_url(52); ?>" alt="contact us" />
                </div>
            </div>
        </div>
    </section>

    <section class="google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63427.14407168313!2d3.345646302924557!3d6.496788216950303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8cf3ea9e2d33%3A0xdc48a40ac59ed2a5!2sLagos%20Mainland%20101245%2C%20Lagos!5e0!3m2!1sen!2sng!4v1697030108216!5m2!1sen!2sng" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

</main>

<?php
get_footer();
