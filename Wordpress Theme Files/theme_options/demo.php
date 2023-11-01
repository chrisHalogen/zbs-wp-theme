<?php

$data = zbs_get_about_data();
// $about = str_replace('\\', '', $about);
get_header();
?>

<main id="primary" class="site-main page-content">

    <section class="hero-area" style="background-image: url('<?php echo $data['hero-url'] ?>')">
        <div class="overlay"></div>
        <h1>About</h1>
    </section>
    <!-- Hero Section Ends -->

    <!-- About Details -->
    <section class="about-section">
        <div class="inner-container">
            <div class="text">
                <div class="intro">
                    <hr />
                    <span class="section-intro">About Us</span>
                </div>
                <div class="spacer"></div>
                <p><?php echo $data['about-content'] ?></p>
            </div>
            <div class="values">
                <div class="overlay"></div>
                <div class="inner">
                    <!--                     <div class="intro">
                        <hr />
                        <span class="section-intro">Our Core Values</span>
                    </div> -->
                    <div class="bullet">
                        <i class="fa-solid fa-minus"></i> Our Core Values
                    </div>
                    <div class="bullet">
                        <i class="fa-solid fa-square-check"></i> Integrity
                    </div>
                    <div class="bullet">
                        <i class="fa-solid fa-square-check"></i> Team Work
                    </div>
                    <div class="bullet">
                        <i class="fa-solid fa-square-check"></i> Excellence
                    </div>
                    <!--                     <div class="bullet">
                        <i class="fa-solid fa-square-check"></i> Enthusiasm
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <section class="about-mision-vision">
        <div class="inner-container">
            <div class="grid">
                <div class="mission">
                    <i class="fa-solid fa-eye"></i>
                    <h3>Our Mission</h3>
                    <span><?php echo $data['mission'] ?></span>
                </div>
                <div class="vision">
                    <i class="fa-solid fa-rocket"></i>
                    <h3>Our Vision</h3>
                    <span><?php echo $data['vision'] ?></span>
                </div>
            </div>
        </div>
    </section>
    <section class="bod">
        <div class="inner-container">
            <div class="intro">
                <hr />
                <span class="section-intro">Board of Directors</span>
            </div>
            <p class="bod-intro">
                Our team of experts has years of experience in forex trading and the
                financial markets.
            </p>
            <div class="bod-tabs">
                <div class="names">
                    <?php

                    $directors = $data['bod'];

                    for ($i = 0; $i < count($directors); $i++) {
                        $name = esc_html($directors[$i]['name']);
                        $role = esc_html($directors[$i]['role']);

                        if (!$name) {
                            continue;
                        }

                    ?>

                        <div class="executive <?php echo $i == 0 ? 'active' : '' ?>">
                            <p class="name"><?php echo $name ?></p>
                            <span class="role"><?php echo $role ?></span>
                        </div>

                    <?php
                    }

                    ?>

                </div>
                <div class="about-name">
                    <?php

                    for ($i = 0; $i < count($directors); $i++) {

                        $about = nl2br(

                            esc_textarea(
                                $directors[$i]['about']
                            )

                        );

                        if (!$about) {
                            continue;
                        }

                    ?>

                        <p class="executive-details <?php echo $i == 0 ? 'active' : '' ?>">
                            <?php echo $about ?>
                        </p>

                    <?php
                    }

                    ?>

                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
