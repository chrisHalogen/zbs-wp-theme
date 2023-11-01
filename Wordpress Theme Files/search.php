<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package zbs-co-theme
 */

get_header();
?>

<main class="page-content">
	<!-- Hero Section -->
	<section class="hero-area" style="background-image: url('<?php echo wp_get_attachment_url(106); ?>')">
		<div class="overlay"></div>
		<h1><?php printf(esc_html__('Search Results for: %s', 'zbs-co-theme'), '<span>' . get_search_query() . '</span>'); ?></h1>
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
								<img src="<?php echo  has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : "http://zbs-group.local/wp-content/uploads/2023/10/stock.jpg"; ?>" alt="<?php the_title(); ?>" />
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

								<?php echo has_excerpt() ? the_excerpt() : "<p>This post doesn't have an excerpt but it is appearing under the search results because it is related to your search query -" . get_search_query() . "</p>"; ?>

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
