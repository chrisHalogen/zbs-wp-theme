<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zbs-co-theme
 */

//  Getting template data
$data = zbs_get_header_data();
// write_log($data);

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'zbs-co-theme'); ?></a>
		<!-- Custom Code Begin -->

		<!-- Topmost Section -->
		<section class="top-most">
			<div class="inner-container">
				<p>Welcome to <span>ZBC Group Investment</span></p>
				<div class="social-icons">
					<a class="icon" href="<?php echo $data['fb-url']; ?>">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a class="icon" href="<?php echo $data['tw-url']; ?>">
						<i class="fa-brands fa-twitter"></i>
					</a>
					<a class="icon" href="<?php echo $data['ln-url']; ?>">
						<i class="fa-brands fa-linkedin-in"></i>
					</a>
					<a class="icon" href="<?php echo $data['ig-url']; ?>">
						<i class="fa-brands fa-instagram"></i>
					</a>
				</div>
			</div>
		</section>

		<!-- Navigation -->
		<section class="logo-icons">
			<div class="inner-container">
				<img class="logo" src="<?php echo $data['logo-url']; ?>" alt="logo" />
				<div class="toggle" id="mobile-menu-toggle"></div>
				<div class="icon-text">
					<div class="single">
						<i class="fa-solid fa-phone-volume"></i>
						<div class="texts">
							<span>Requesting a Call</span>
							<br />
							<p><?php echo $data['phone']; ?></p>
						</div>
					</div>
					<div class="single">
						<i class="fa-solid fa-clock"></i>
						<div class="texts">
							<span>Monday to Friday</span>
							<br />
							<p>8am - 5pm</p>
						</div>
					</div>
					<div class="single">
						<i class="fa-solid fa-location-dot"></i>
						<div class="texts">
							<span><?php echo $data['street']; ?></span>
							<br />
							<p><?php echo $data['city']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Navigation Pane -->
		<section class="navigation">
			<div class="nav-container">

				<?php

				$menu_id = 2;

				$args = array(
					'menu_id' => $menu_id,
					'container' => 'nav',
					'container_class' => 'menu',
					'container_id' => 'nav-menu',
					'menu_class' => 'menu-ul',
				);

				wp_nav_menu($args);

				?>

			</div>
			<a class="appointment" href="<?php echo get_permalink(10); ?>">
				<span>Book An Appointment<i class="fa-solid fa-arrow-right-long"></i>
				</span>
			</a>
		</section>

		<!-- Mobile Menu -->
		<div class="mobile-menu" id="mobile-menu-panel">
			<div class="close-icon">
				<i class="fa-solid fa-xmark" id="close-icon-icon"></i>
			</div>
			<div class="spacer"></div>
			<div class="logo">
				<img src="<?php echo $data['logo-url']; ?>" alt="mobile logo" />
			</div>
			<div class="spacer"></div>
			<form id="mobile-search" class="search-form">
				<input type="text" name="search-term" id="search-term" placeholder="Search..." />
				<button type="submit">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
			</form>
			<div class="spacer"></div>

			<?php

			$menu_id = 4;

			$args = array(
				'menu_id' => $menu_id,
				'container' => 'nav',
				'container_class' => 'menu',
				'container_id' => 'nav-menu',
				'menu_class' => 'menu-ul',
			);

			wp_nav_menu($args);

			?>
			<div class="spacer"></div>
			<div class="icon-text">
				<div class="single">
					<i class="fa-solid fa-phone-volume"></i>
					<div class="texts">
						<span>Requesting a Call</span>
						<br />
						<p><?php echo $data['phone']; ?></p>
					</div>
				</div>
				<div class="single">
					<i class="fa-solid fa-clock"></i>
					<div class="texts">
						<span>Monday to Friday</span>
						<br />
						<p>8am - 5pm</p>
					</div>
				</div>
				<div class="single">
					<i class="fa-solid fa-location-dot" id="location"></i>
					<div class="texts">
						<span><?php echo $data['street']; ?></span>
						<br />
						<p><?php echo $data['city']; ?></p>
					</div>
				</div>
			</div>
			<div class="spacer"></div>
			<a class="appointment" href="<?php echo get_permalink(10); ?>">
				<span>Book An Appointment<i class="fa-solid fa-arrow-right-long"></i>
				</span>
			</a>
		</div>

		<!-- Desktop Search -->
		<section class="desktop-search" id="desktop-search-container">
			<i class="fa-solid fa-xmark" id="close-icon-desktop"></i>
			<form class="search-form" id="desktop-search">
				<input type="search" name="search-term" id="search-term" placeholder="Search ....">
			</form>
		</section>

		<!-- Custom Code Ends -->