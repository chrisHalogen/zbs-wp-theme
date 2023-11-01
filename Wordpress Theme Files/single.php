<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zbs-co-theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<!-- Hero Section -->
	<section class="hero-area" style="background-image: url('http://zbs-group.local/wp-content/uploads/2023/10/news-scaled.jpg')">
		<div class="overlay"></div>
		<h1><?php echo get_the_title() ?></h1>
	</section>
	<!-- Hero Section Ends -->

	<!-- Blog Details -->
	<section class="news-media-content">
		<div class="inner-container">
			<div class="single-post" id="single-post-content">

				<?php
				while (have_posts()) :
					the_post();

				?>

					<img class="featured-image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" />

					<div class="post-content"><?php the_content() ?>

					</div>
					<div class="credit">
						<span>Contact us as ZBC Group to help you take advantage of the
							circumstances.
						</span>
					</div>

				<?php

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'zbs-co-theme') . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'zbs-co-theme') . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>





			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();
