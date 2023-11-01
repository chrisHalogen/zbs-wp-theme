<?php

/* Template Name: Services Template */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-area" style="background-image: url('<?php echo wp_get_attachment_url(99); ?>')">
        <div class="overlay"></div>
        <h1>Services</h1>
    </section>
    <!-- Hero Section Ends -->

    <!-- Blog Details -->
    <section class="services">
        <div class="inner-container">
            <div class="content">
                <?php

                while (have_posts()) :
                    the_post();

                ?>
                    <div class="intro">
                        <hr />
                        <span class="section-intro"><?php the_title() ?></span>
                    </div>
                    <div class="spacer"></div>
                    <div class="details">
                        <?php the_content() ?>
                    </div>

                    <a class="cta" href="<?php echo get_permalink(10); ?>">
                        <span>Click Here to Get in Touch<i class="fa-solid fa-arrow-right-long"></i>
                        </span>
                    </a>
                <?php

                endwhile; // End of the loop.

                ?>

            </div>


            <?php

            $args = array(
                'theme_location' => 'services',
                'container' => 'nav',
                'container_class' => 'menu',
                'container_id' => 'nav-menu',
                'menu_class' => 'menu-ul',
            );

            wp_nav_menu($args);

            ?>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
