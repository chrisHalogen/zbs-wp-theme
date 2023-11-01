<?php

/**
 * zbs-co-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zbs-co-theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zbs_co_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on zbs-co-theme, use a find and replace
		* to change 'zbs-co-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('zbs-co-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'zbs-co-theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'zbs_co_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'zbs_co_theme_setup');

function register_custom_image_sizes()
{
	if (!current_theme_supports('post-thumbnails')) {
		add_theme_support('post-thumbnails');
	}
	add_image_size('custom-small-square', 450, 450, true);
	add_image_size('custom-landscape', 1000, 600);
	// New Image size
	add_image_size('archive-thumb', 640, 427, true);
}
add_action('after_setup_theme', 'register_custom_image_sizes');

function add_custom_image_sizes($sizes)
{
	return array_merge($sizes, array(
		'custom-small-square' => __('Custom Square'),
		'custom-landscape' => __('Custom Landscape'),
		'archive-thumb' => __('Archive Page Thumb')
	));
}
add_filter('image_size_names_choose', 'add_custom_image_sizes');

function register_new_menu()
{
	register_nav_menu('services', __('Services Menu'));
}
add_action('init', 'register_new_menu');

// Change WP Search URL
function zbs_change_search_url()
{
	if (is_search() && !empty($_GET['s'])) {
		wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
		exit();
	}
}
add_action('template_redirect', 'zbs_change_search_url');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zbs_co_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('zbs_co_theme_content_width', 640);
}
add_action('after_setup_theme', 'zbs_co_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zbs_co_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'zbs-co-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'zbs-co-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'zbs_co_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function zbs_co_theme_scripts()
{
	wp_enqueue_style('zbs-co-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('zbs-co-theme-style', 'rtl', 'replace');

	wp_enqueue_script('zbs-co-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'zbs_co_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Echo debug log
if (!function_exists('write_log')) {
	function write_log($log)
	{
		if (is_array($log) || is_object($log)) {
			error_log(print_r($log, true));
		} else {
			error_log($log);
		}
	}
}

// User Area Styles
function zbs_register_guest_css()
{

	// Font Awesome
	wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), 1.0);
	wp_enqueue_style('font-awesome');

	wp_register_style('zbs-guest-css', get_template_directory_uri() . '/sass/main.css', array(), time());
	wp_enqueue_style('zbs-guest-css');
}

add_action('wp_enqueue_scripts', 'zbs_register_guest_css');

// Register guest JS
function zbs_register_guest_script()
{
	wp_enqueue_script('zbs-guest-clampjs', get_template_directory_uri() . '/js/clamp.min.js', array('jquery'), 1.0);

	wp_enqueue_script('zbs-guest-rAFjs', get_template_directory_uri() . '/js/rAF.js', array('jquery'), 1.0);

	wp_enqueue_script('zbs-guest-RSjs', get_template_directory_uri() . '/js/ResizeSensor.js', array('jquery'), 1.0);

	wp_enqueue_script('zbs-guest-SSjs', get_template_directory_uri() . '/js/sticky-sidebar.js', array('jquery'), 1.0);

	wp_enqueue_script('zbs-guest-js', get_template_directory_uri() . '/js/main.js', array('jquery'), time());

	wp_localize_script(
		'zbs-guest-js',
		'script_data',
		array(
			'search_url' => site_url('/search/'),
		)
	);
}
add_action('wp_enqueue_scripts', 'zbs_register_guest_script');

// Load media files in the admin dashboard
function zbs_load_media_files()
{
	wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'zbs_load_media_files');

// Register admin JS
function zbs_register_admin_script()
{
	wp_enqueue_script('zbs-admin-script', get_template_directory_uri() . '/js/admin.js', array('jquery', 'media-upload'), time());
}
add_action('admin_enqueue_scripts', 'zbs_register_admin_script');

/**
 * Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
 */
add_filter('wp_nav_menu_items', 'add_search_icon', 10, 2);

function add_search_icon($items, $args)
{

	if ($args->menu_id == 2) {
		$items .= '<li class="search-icon"><i class="fa-solid fa-magnifying-glass" id="search-icon-desktop"></i></li>';
	}
	return $items;
}

// Add Menu Options for Theme Settings
// Theme Options
function addThemeOptions()
{

	add_menu_page(
		'Theme Options',
		'Theme Options',
		'manage_options',
		'zbs-options',
		'zbs_general_settings',
		'dashicons-admin-site-alt',
		10, // Position
	);

	//adding submenu to a menu
	add_submenu_page(
		'zbs-options', //parent page slug
		'Contact Page Settings', //page title
		'Contact Page', //menu titel
		'manage_options', //manage optios
		'zbs-contact-page-options', //slug
		'zbs_contact_settings' //function
	);

	//adding submenu to a menu
	add_submenu_page(
		'zbs-options', //parent page slug
		'About Page Settings', //page title
		'About Page', //menu titel
		'manage_options', //manage optios
		'zbs-about-page-options', //slug
		'zbs_about_settings' //function
	);

	//adding submenu to a menu
	add_submenu_page(
		'zbs-options', //parent page slug
		'Home Page Settings', //page title
		'Home Page', //menu titel
		'manage_options', //manage optios
		'zbs-home-page-options', //slug
		'zbs_home_settings' //function
	);
}
add_action('admin_menu', 'addThemeOptions');

// Get Theme Options data
function zbs_update_wp_option($option_key, $option_value)
{

	if (!update_option($option_key, $option_value)) {
		add_option($option_key, $option_value);
	}
}

// Include Theme Option Files
define('ZBS_ROOTDIR', dirname(__FILE__));
require_once(ZBS_ROOTDIR . '/theme_options/contact_info.php');

require_once(ZBS_ROOTDIR . '/theme_options/contact_page_info.php');

require_once(ZBS_ROOTDIR . '/theme_options/about_page_info.php');

require_once(ZBS_ROOTDIR . '/theme_options/home_page_info.php');

// Header Data
function zbs_get_header_data()
{
	$data = array();

	try {
		// Get Welcome Text
		$data['welcome-text'] = 'Welcome to ZBS Groups';
		if (get_option('zbs-welcome')) {

			$data["welcome-text"] = esc_html(get_option('zbs-welcome'));
		}

		// Get Facebook URL
		$data["fb-url"] = "#";
		if (get_option('zbs-fb')) {
			$temp = get_option('zbs-fb');
			$data["fb-url"] = esc_url($temp);
		}

		// Get Twitter URL
		$data["tw-url"] = "#";
		if (get_option('zbs-tw')) {
			$temp = get_option('zbs-tw');
			$data["tw-url"] = esc_url($temp);
		}

		// Get Linkedin URL
		$data["ln-url"] = "#";
		if (get_option('zbs-ln')) {
			$temp = get_option('zbs-ln');
			$data["ln-url"] = esc_url($temp);
		}

		// Get Instagram URL
		$data["ig-url"] = "#";
		if (get_option('zbs-ig')) {
			$temp = get_option('zbs-ig');
			$data["ig-url"] = esc_url($temp);
		}

		// Get Logo URL
		$data['logo-url'] = 'http://zbs-group.local/wp-content/uploads/2023/10/logo-placeholder-e1698081080168.jpg';

		if (get_option('zbs-logo')) {
			$temp = wp_get_attachment_url(get_option('zbs-logo'));

			$data["logo-url"] = esc_url($temp);
		}

		// Get Phone
		$data['phone'] = "08012345678";
		if (get_option('zbs-phone')) {
			$temp = get_option('zbs-phone');
			$data['phone'] = esc_html($temp);
		}

		// Get Address
		$data['street'] = "Abule Egba";
		if (get_option('zbs-street')) {
			$temp = get_option('zbs-street');
			$data['street'] = esc_html($temp);
		}

		$data['city'] = "Lagos Island, Lagos";
		if (get_option('zbs-city-state')) {
			$temp = get_option('zbs-city-state');
			$data['city'] = esc_html($temp);
		}

		return $data;
	} catch (\Throwable $th) {
		write_log($th);
	}
}

// function zbs_header_info()
// {
// 	$data = array();

// 	try {
// 		$data['welcome-text'] = 'Welcome to ZBS Groups';
// 		if (get_option('zbs-welcome')) {

// 			$data["welcome-text"] = esc_html(get_option('zbs-welcome'));
// 		}

// 		// Get Facebook URL
// 		$data["fb-url"] = "#";
// 		if (get_option('zbs-fb')) {
// 			$temp = get_option('zbs-fb');
// 			$data["fb-url"] = esc_url($temp);
// 		}

// 		// Get Twitter URL
// 		$data["tw-url"] = "#";
// 		if (get_option('zbs-tw')) {
// 			$temp = get_option('zbs-tw');
// 			$data["tw-url"] = esc_url($temp);
// 		}

// 		// Get Linkedin URL
// 		$data["ln-url"] = "#";
// 		if (get_option('zbs-ln')) {
// 			$temp = get_option('zbs-ln');
// 			$data["ln-url"] = esc_url($temp);
// 		}

// 		// Get Instagram URL
// 		$data["ig-url"] = "#";
// 		if (get_option('zbs-ig')) {
// 			$temp = get_option('zbs-ig');
// 			$data["ig-url"] = esc_url($temp);
// 		}

// 		// Get Logo URL
// 		$data['logo-url'] = 'http://zbs-group.local/wp-content/uploads/2023/10/logo-placeholder-e1698081080168.jpg';

// 		if (get_option('zbs-logo')) {
// 			$temp = wp_get_attachment_url(get_option('zbs-logo'));

// 			$data["logo-url"] = esc_url($temp);
// 		}

// 		// Get Phone
// 		$data['phone'] = "08012345678";
// 		if (get_option('zbs-phone')) {
// 			$temp = get_option('zbs-phone');
// 			$data['phone'] = esc_url($temp);;
// 		}

// 		// Get Address
// 		$data['street'] = "Abule Egba";
// 		if (get_option('zbs-street')) {
// 			$temp = get_option('zbs-street');
// 			$data['street'] = esc_html($temp);
// 		}

// 		$data['city'] = "Lagos Island, Lagos";
// 		if (get_option('zbs-city-state')) {
// 			$temp = get_option('zbs-city-state');
// 			$data['city'] = esc_html($temp);
// 		}
// 	} catch (\Throwable $th) {
// 		write_log($th);
// 	}

// 	return $data;
// }

// Header Data
function zbs_get_footer_data()
{
	$data = array();

	try {

		// Get Facebook URL
		$data["fb-url"] = "#";
		if (get_option('zbs-fb')) {
			$temp = get_option('zbs-fb');
			$data["fb-url"] = esc_url($temp);
		}

		// Get Twitter URL
		$data["tw-url"] = "#";
		if (get_option('zbs-tw')) {
			$temp = get_option('zbs-tw');
			$data["tw-url"] = esc_url($temp);
		}

		// Get Linkedin URL
		$data["ln-url"] = "#";
		if (get_option('zbs-ln')) {
			$temp = get_option('zbs-ln');
			$data["ln-url"] = esc_url($temp);
		}

		// Get Instagram URL
		$data["ig-url"] = "#";
		if (get_option('zbs-ig')) {
			$temp = get_option('zbs-ig');
			$data["ig-url"] = esc_url($temp);
		}

		// Get Logo URL
		$data['logo-url'] = 'http://zbs-group.local/wp-content/uploads/2023/10/logo-placeholder-e1698081080168.jpg';

		if (get_option('zbs-logo')) {
			$temp = wp_get_attachment_url(get_option('zbs-logo'));

			$data["logo-url"] = esc_url($temp);
		}

		// Get Phone
		$data['phone'] = "08012345678";
		if (get_option('zbs-phone')) {
			$temp = get_option('zbs-phone');
			$data['phone'] = esc_html($temp);
		}

		// Get Address
		$data['street'] = "Abule Egba";
		if (get_option('zbs-street')) {
			$temp = get_option('zbs-street');
			$data['street'] = esc_html($temp);
		}

		$data['city'] = "Lagos Island, Lagos";
		if (get_option('zbs-city-state')) {
			$temp = get_option('zbs-city-state');
			$data['city'] = esc_html($temp);
		}

		// Get Footer Content
		$data["footer-content"] = "";
		if (get_option('zbs-ft-text')) {
			$temp = get_option('zbs-ft-text');

			$data["footer-content"] = nl2br(htmlentities(esc_textarea($temp)));
		}

		// Get Email
		$data['email'] = "info@zbsgroup.co";
		if (get_option('zbs-email')) {
			$temp = get_option('zbs-email');
			$data['email'] = esc_html($temp);
		}

		return $data;
	} catch (\Throwable $th) {
		write_log($th);
	}
}

function zbs_get_contact_data()
{
	$data = array();

	try {

		// Get Hero Image URL
		$data['hero-url'] = 'http://zbs-group.local/wp-content/uploads/2023/10/news-scaled.jpg';

		if (get_option('zbs-contact-hero')) {
			$temp = wp_get_attachment_url(get_option('zbs-contact-hero'));

			$data["hero-url"] = esc_url($temp);
		}

		// Get Address
		$data['street'] = "Abule Egba";
		if (get_option('zbs-street')) {
			$temp = get_option('zbs-street');
			$data['street'] = esc_html($temp);
		}

		$data['city'] = "Lagos Island, Lagos";
		if (get_option('zbs-city-state')) {
			$temp = get_option('zbs-city-state');
			$data['city'] = esc_html($temp);
		}

		// Get Email
		$data['email'] = "info@zbsgroup.co";
		if (get_option('zbs-email')) {
			$temp = get_option('zbs-email');
			$data['email'] = esc_html($temp);
		}

		// Get Phone
		$data['phone'] = "08012345678";
		if (get_option('zbs-phone')) {
			$temp = get_option('zbs-phone');
			$data['phone'] = esc_html($temp);
		}

		return $data;
	} catch (\Throwable $th) {
		write_log($th);
	}
}

function zbs_get_about_data()
{
	$data = array();

	try {

		// Get Hero Image URL
		$data['hero-url'] = 'http://zbs-group.local/wp-content/uploads/2023/10/news-scaled.jpg';

		if (get_option('zbs-about-hero')) {
			$temp = wp_get_attachment_url(get_option('zbs-about-hero'));

			$data["hero-url"] = esc_url($temp);
		}

		$data["about-content"] = "";
		if (get_option('zbs-about-text')) {
			$temp = get_option('zbs-about-text');

			$data["about-content"] = nl2br(htmlentities(esc_textarea($temp)));
		}

		$data['mission'] = "";
		if (get_option('zbs-mission')) {
			$temp = get_option('zbs-mission');
			$data['mission'] = esc_html($temp);
		}

		$data['vision'] = "";
		if (get_option('zbs-vision')) {
			$temp = get_option('zbs-vision');
			$data['vision'] = esc_html($temp);
		}

		$data['bod'] = array();
		if (get_option('zbs-bod')) {
			$temp = get_option('zbs-bod');
			$data['bod'] = $temp;
		}



		return $data;
	} catch (\Throwable $th) {
		write_log($th);
	}
}

function zbs_get_home_data()
{
	$data = array();

	try {

		$data["intro"] = "";
		if (get_option('zbs-intro')) {
			$temp = get_option('zbs-intro');

			$data["intro"] = nl2br(htmlentities(esc_textarea($temp)));
		}

		$data['support'] = "";
		if (get_option('zbs-support')) {
			$temp = get_option('zbs-support');
			$data['support'] = esc_html($temp);
		}

		$data['advisory'] = "";
		if (get_option('zbs-advisory')) {
			$temp = get_option('zbs-advisory');
			$data['advisory'] = esc_html($temp);
		}

		$data['clients'] = "";
		if (get_option('zbs-clients')) {
			$temp = get_option('zbs-clients');
			$data['clients'] = esc_html($temp);
		}

		$data['transactions'] = "";
		if (get_option('zbs-transactions')) {
			$temp = get_option('zbs-transactions');
			$data['transactions'] = esc_html($temp);
		}

		return $data;
	} catch (\Throwable $th) {
		write_log($th);
	}
}

function getPostComments($postID)
{
	$query_post = get_post($postID);
	$num = $query_post->comment_count;
	if ($num == 0 || $num > 1) : $num = $num . ' Comments';
	else : $num = $num . ' Comment';
	endif;
	$permalink = get_permalink($postID);

	// return '<a href="'. $permalink . '#comments" class="comments_link">' . $num . '</a>';

	return '<a href="' . $permalink . '"><i class="fa-solid fa-comments"></i><span>' . $num . '</span></a>';
}
