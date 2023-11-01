<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zbs-co-theme
 */

get_header();
?>

<main class="page-content">
	<!-- Hero Section -->
	<section class="hero-area" style="background-image: url('<?php echo wp_get_attachment_url(47); ?>')">
		<div class="overlay"></div>
		<h1>News & Media</h1>
	</section>
	<!-- Hero Section Ends -->

	<!-- Blog Details -->
	<section class="news-media-content">
		<div class="inner-container">
			<div class="news" id="blog-post-news">
				<?php

				if (have_posts()) :

					/* Start the Loop */
					while (have_posts()) :
						the_post();

				?>
						<div class="single-blog">
							<div class="featured-image">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" />
								<div class="calender">
									<div class="day"><?php echo get_the_date('dS', get_the_ID()) ?></div>
									<div class="month-year"><?php echo get_the_date('M Y', get_the_ID()) ?></div>
								</div>
							</div>
							<div class="text-contents">
								<h3><?php the_title(); ?></h3>
								<div class="user-comment">
									<a href="#">
										<i class="fa-solid fa-user"></i>
										<span><?php the_author(); ?></span>
									</a>

									<?php echo getPostComments(get_the_ID()) ?>
								</div>

								<?php the_excerpt() ?>

								<a class="read-more" href="<?php the_permalink() ?>"><i class="fa-solid fa-angle-right"></i> Read More</a>
							</div>
						</div>


				<?php

					endwhile;

					the_posts_navigation();


				endif;

				?>

			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
