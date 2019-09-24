<?php
/**
 * Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Template only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function template_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/basetheme
	 * If you're building a theme based on Base Theme, use a find and replace
	 * to change 'basetheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'basetheme' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'featured-image', 2000, 1200, true );

	add_image_size( 'thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'basetheme' ),
			'social' => __( 'Social Links Menu', 'basetheme' ),
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
			'gallery',
			'caption',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'basetheme' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'basetheme' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters template array of starter content.
	 */
	$starter_content = apply_filters( 'template_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'template_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function template_content_width() {

	$content_width = $GLOBALS['content_width'];

	if ( check_if_frontpage() ) {
		$content_width = 644;
	} elseif ( is_page() ) {
		$content_width = 740;
	} elseif ( is_single() ) {
		$content_width = 740;
	}

	/**
	 * Filter template content width of the theme.
	 */
	$GLOBALS['content_width'] = apply_filters( 'template_content_width', $content_width );
}
add_action( 'template_redirect', 'template_content_width', 0 );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 */
function template_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'basetheme' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'template_excerpt_more' );

/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function template_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'template_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function basetheme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'basetheme_pingback_header' );

/**
 * Enqueues scripts and styles.
 */
function template_scripts() {

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.4.1.min.js", array(), '3.4.1' );

	wp_deregister_script( 'jquery-migrate' );
	wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-1.4.1.min.js", array('jquery'), '1.4.1' );

	wp_enqueue_script( 'global-scripts', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery-migrate' ), '1.0', true );

	global $template;
	wp_enqueue_script( 'scripts', get_theme_file_uri( '/assets/js/'.substr(basename($template), 0, -4).'.min.js' ), array( 'global-scripts' ), '1.0', true );
	wp_enqueue_style( 'page-style', get_theme_file_uri( '/assets/css/'.substr(basename($template), 0, -4).'.min.css' ));
}
add_action( 'wp_enqueue_scripts', 'template_scripts' );

/**
 * Get unique ID.
 */
function get_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );
