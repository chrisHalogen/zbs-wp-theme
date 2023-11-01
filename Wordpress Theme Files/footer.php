<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zbs-co-theme
 */

//  Getting template data
$data = zbs_get_footer_data();

$args = array(
	'cat' => '5',
	'numberposts' => 3,
	'post_status'    => 'publish'
);
$postslist = get_posts($args);

?>

<!-- Footer Section -->
<footer class="footer">
	<div class="inner-container">
		<div class="col-1">
			<img src="<?php echo $data['logo-url']; ?>" alt="main logo" />
			<div class="spacer-1"></div>

			<p class="about-content"><?php echo $data['footer-content']; ?></p>
			<div class="spacer-2"></div>
			<a id="anchor" href="<?php echo get_permalink(4); ?>">About Us</a>
		</div>
		<div class="col-2">
			<h3>News & Media</h3>
			<div class="spacer-0"></div>

			<?php

			if ($postslist) {
				foreach ($postslist as $post) :
					setup_postdata($post);
					// $img_url = get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
			?>
					<div class="blog-card">

						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?php the_title(); ?>" />
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>

			<?php
				endforeach;
				wp_reset_postdata();
			}

			?>

		</div>
		<div class="col-3">
			<h3>Contact Info</h3>
			<div class="spacer-0"></div>
			<div class="contact-icon">
				<i class="fa-solid fa-location-dot" id="location"></i>
				<p><?php echo $data['street']; ?>, <?php echo $data['city']; ?></p>
			</div>
			<div class="contact-icon">
				<i class="fa-solid fa-phone-volume"></i>
				<p><?php echo $data['phone']; ?></p>
			</div>
			<div class="contact-icon">
				<i class="fa-solid fa-envelope"></i>
				<p>info@zbcgroup.com</p>
			</div>
			<h4>Open Hours</h4>
			<p class="open-hours">Mon - Fri: 8 am - 5 pm,</p>
			<p class="open-hours">Saturday - Sunday: CLOSED</p>
		</div>
	</div>
</footer>
<section class="credit">
	<p>2023 © All rights reserved by <span>ZBS Group</span></p>
</section>
<!-- Footer Section end -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>