<?php

$data = zbs_get_about_data();

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
                    <div class="intro">
                        <hr />
                        <span class="section-intro">Our Core Values</span>
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
                    <div class="bullet">
                        <i class="fa-solid fa-square-check"></i> Enthusiazm
                    </div>
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

                    for ($i = 0; $i < 3; $i++) {
                        $name = esc_html($directors[$i]['name']);
                        $role = esc_html($directors[$i]['role']);

                    ?>

                        <div class="executive <?php echo $i == 0 ? 'active' : '' ?>">
                            <p class="name"><?php echo $name ?></p>
                            <span class="role"><?php echo $role ?></span>
                        </div>

                    <?php
                    }

                    ?>
                    <!-- <div class="executive active">
                <p class="name">Dr. Kayode Henry</p>
                <span class="role">Chief Executive Officer</span>
              </div>
              <div class="executive">
                <p class="name">Dr. Martins Olatunji</p>
                <span class="role">Managing Director</span>
              </div>
              <div class="executive">
                <p class="name">Dr. Ismail Alexander</p>
                <span class="role">Sales Manager</span>
              </div> -->
                </div>
                <div class="about-name">
                    <?php

                    for ($i = 0; $i < 3; $i++) {

                        $about = nl2br(htmlentities(esc_textarea($directors[$i]['about'])));

                    ?>

                        <p class="executive-details <?php echo $i == 0 ? 'active' : '' ?>">
                            <?php echo $about ?>
                        </p>

                    <?php
                    }

                    ?>
                    <!-- <p class="executive-details active">
                About Dr Henry. Lorem ipsum dolor, sit amet consectetur
                adipisicing elit. A nesciunt ullam aspernatur hic error ex modi
                neque unde similique maiores vel eum distinctio reiciendis
                soluta expedita natus est, quas adipisci inventore consectetur
                commodi facilis. Nulla, officia voluptatem ex laudantium
                blanditiis omnis quod perspiciatis consequatur ut porro
                reiciendis? Eaque, perspiciatis voluptatum.
              </p>
              <p class="executive-details">
                About Dr Martins. Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Delectus, rerum atque velit, perferendis earum
                aperiam deleniti dolor itaque reprehenderit repellendus eaque
                exercitationem vero totam, iure vel quo ad obcaecati quisquam.
                Delectus, ratione asperiores, magnam doloremque similique neque
                cumque ex ut, eius nihil odio hic quas dolorum doloribus
                nesciunt blanditiis totam ea veritatis. Quidem, debitis
                voluptatum voluptate perferendis neque iste itaque ipsa saepe,
                vel nemo illo, tempore quia placeat? Eveniet nesciunt nulla
                dolores doloribus? Est quae iste sed quod consequatur voluptates
                modi fuga aut animi deleniti nam ipsa minus quia placeat at
                obcaecati ducimus in, explicabo ea incidunt officiis rem ipsam!
              </p>
              <p class="executive-details">
                About Dr Alexander. Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Fugit, inventore, illum tenetur vero quibusdam
                dicta quisquam doloribus ab ipsum neque aliquid enim labore
                sapiente perspiciatis magnam officia quas. Eaque illum, dolorem
                maiores eos dolores accusantium laboriosam eum officia? Autem
                quaerat, assumenda cupiditate repellendus quasi modi laudantium
                aspernatur ut maxime ratione nesciunt similique facere magni
                necessitatibus totam debitis fugit temporibus sapiente? Iste
                reprehenderit quaerat corporis aut est exercitationem dolore
                alias accusamus.
              </p> -->
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
