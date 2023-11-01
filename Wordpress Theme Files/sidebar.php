<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zbs-co-theme
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside class="sidebar" id="right-sidebar">
	<div class="sidebar-content" id="sidebar-content">
		<h3>What We Do</h3>
		<hr />
		<div class="spacer-1"></div>
		<ul class="services-link">
			<li>
				<a href="<?php echo get_permalink(18); ?>"><i class="fa-solid fa-angle-right"></i>Bureau De Change</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(20); ?>"><i class="fa-solid fa-angle-right"></i>Financial Auxillary
					Services</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(23); ?>"><i class="fa-solid fa-angle-right"></i>Arbitrage</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(24); ?>"><i class="fa-solid fa-angle-right"></i>Procurement</a>
			</li>
		</ul>
		<div class="spacer-2"></div>
		<h3>Recent News</h3>
		<hr />
		<div class="spacer-1"></div>
		<ul class="recent-news">
			<?php

			$args = array(
				'cat' => '5',
				'numberposts' => 3,
				'post_status'    => 'publish'
			);
			$postslist = get_posts($args);

			if ($postslist) {
				foreach ($postslist as $post) :
					setup_postdata($post);
					// $img_url = get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
			?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="" />
							<div class="texts">
								<p><?php the_title(); ?></p>
								<span><?php get_the_date('dS M Y') ?></span>
							</div>
						</a>
					</li>

			<?php
				endforeach;
				wp_reset_postdata();
			}

			?>

		</ul>
	</div>
</aside>