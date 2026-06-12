<?php
/**
 * HUDL Consultancy theme functions.
 *
 * @package HUDL_Consultancy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

if ( ! defined( 'HUDL_VERSION' ) ) {
	define( 'HUDL_VERSION', '1.1.0' );
}

/**
 * Theme setup.
 */
function hudl_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Featured images (used as blog card thumbnails and article hero images).
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hudl-card', 800, 450, true ); // 16:9 blog card thumb.

	// HTML5 markup.
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	// Output feed links in <head>.
	add_theme_support( 'automatic-feed-links' );

	// Selective refresh + custom logo support.
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 48,
			'width'       => 160,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Gutenberg: dark editor + brand palette.
	add_theme_support( 'editor-styles' );
	add_theme_support( 'dark-editor-style' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'HUDL Yellow', 'hudl-consultancy' ),
				'slug'  => 'hudl-yellow',
				'color' => '#fbbf46',
			),
			array(
				'name'  => __( 'HUDL Blue', 'hudl-consultancy' ),
				'slug'  => 'hudl-blue',
				'color' => '#45aeff',
			),
			array(
				'name'  => __( 'HUDL Red', 'hudl-consultancy' ),
				'slug'  => 'hudl-red',
				'color' => '#ff515e',
			),
			array(
				'name'  => __( 'HUDL Cyan', 'hudl-consultancy' ),
				'slug'  => 'hudl-cyan',
				'color' => '#1edfd4',
			),
			array(
				'name'  => __( 'Near Black', 'hudl-consultancy' ),
				'slug'  => 'hudl-black',
				'color' => '#0c0c0c',
			),
			array(
				'name'  => __( 'White', 'hudl-consultancy' ),
				'slug'  => 'hudl-white',
				'color' => '#ffffff',
			),
		)
	);

	// Navigation menus.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'hudl-consultancy' ),
		)
	);
}
add_action( 'after_setup_theme', 'hudl_setup' );

/**
 * Enqueue styles and scripts.
 */
function hudl_assets() {
	// Brand fonts: Barlow Condensed (display) + Source Sans 3 (body).
	wp_enqueue_style(
		'hudl-fonts',
		'https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&family=Barlow+Condensed:wght@700;800;900&display=swap',
		array(),
		null
	);

	// Main theme stylesheet (the style.css header + all rules).
	// Use the file modification time as the version so updated CSS is never
	// served from a stale browser/CDN cache after the theme is changed.
	$style_path = get_stylesheet_directory() . '/style.css';
	$style_ver  = file_exists( $style_path ) ? filemtime( $style_path ) : HUDL_VERSION;
	wp_enqueue_style( 'hudl-style', get_stylesheet_uri(), array( 'hudl-fonts' ), $style_ver );

	// Front-end behaviour: nav scroll, hamburger, smooth scroll, reveal-on-scroll.
	$script_path = get_template_directory() . '/js/theme.js';
	$script_ver  = file_exists( $script_path ) ? filemtime( $script_path ) : HUDL_VERSION;
	wp_enqueue_script( 'hudl-theme', get_template_directory_uri() . '/js/theme.js', array(), $script_ver, true );

	// Threaded comments where enabled.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hudl_assets' );

/**
 * Preconnect to Google Fonts hosts (matches the original markup).
 */
function hudl_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'hudl_resource_hints', 10, 2 );

/**
 * Estimated reading time for a post (≈200 words/min), e.g. "6 min read".
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function hudl_reading_time( $post_id = null ) {
	$content = get_post_field( 'post_content', $post_id );
	$words   = str_word_count( wp_strip_all_tags( strip_shortcodes( $content ) ) );
	$minutes = max( 1, (int) ceil( $words / 200 ) );
	/* translators: %d: estimated reading time in minutes. */
	return sprintf( _n( '%d min read', '%d min read', $minutes, 'hudl-consultancy' ), $minutes );
}

/**
 * Slug of a post's primary category (drives the brand colour CSS classes
 * cat-case-study / cat-marketing-tips / cat-industry-insights).
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function hudl_primary_category_slug( $post_id = null ) {
	$cats = get_the_category( $post_id );
	return ! empty( $cats ) ? $cats[0]->slug : '';
}

/**
 * Human label for a category slug (falls back to the category name).
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function hudl_primary_category_label( $post_id = null ) {
	$cats = get_the_category( $post_id );
	return ! empty( $cats ) ? $cats[0]->name : '';
}

/**
 * Emoji fallback icon for a category slug (matches the original blog grid).
 *
 * @param string $slug Category slug.
 * @return string
 */
function hudl_category_icon( $slug ) {
	$icons = array(
		'case-study'        => '📊',
		'marketing-tips'    => '💡',
		'industry-insights' => '🔭',
	);
	return isset( $icons[ $slug ] ) ? $icons[ $slug ] : '📝';
}

/**
 * The HUDL wordmark (four brand-coloured letters), used in nav and footer.
 *
 * @return string
 */
function hudl_wordmark() {
	return '<span class="lh">H</span><span class="lu">U</span><span class="ld">D</span><span class="ll">L</span>';
}

/**
 * Fallback primary menu — mirrors the original site navigation.
 * Used when no menu is assigned to the "primary" location.
 */
function hudl_default_menu() {
	$home = home_url( '/' );
	echo '<ul id="navLinks" class="nav-links">';
	echo '<li><a href="' . esc_url( $home . '#about' ) . '">' . esc_html__( 'About', 'hudl-consultancy' ) . '</a></li>';
	echo '<li><a href="' . esc_url( $home . '#services' ) . '">' . esc_html__( 'Services', 'hudl-consultancy' ) . '</a></li>';
	echo '<li><a href="' . esc_url( $home . '#process' ) . '">' . esc_html__( 'How We Work', 'hudl-consultancy' ) . '</a></li>';
	echo '<li><a href="' . esc_url( $home . '#team' ) . '">' . esc_html__( 'Meet Our Founders', 'hudl-consultancy' ) . '</a></li>';
	echo '<li><a href="' . esc_url( $home . '#clients' ) . '">' . esc_html__( 'Clients', 'hudl-consultancy' ) . '</a></li>';
	echo '<li><a href="' . esc_url( get_post_type_archive_link( 'post' ) ? get_post_type_archive_link( 'post' ) : $home ) . '">' . esc_html__( 'Insights', 'hudl-consultancy' ) . '</a></li>';
	echo '<li class="menu-item-nav-cta nav-cta"><a class="nav-cta" href="' . esc_url( $home . '#cta' ) . '">' . esc_html__( 'BOOK YOUR FREE CONSULTATION', 'hudl-consultancy' ) . '</a></li>';
	echo '</ul>';
}

/**
 * Add the nav-cta helper class to any menu item whose CSS classes include "nav-cta".
 */
function hudl_nav_cta_class( $classes, $item ) {
	if ( in_array( 'nav-cta', (array) $classes, true ) ) {
		$classes[] = 'menu-item-nav-cta';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'hudl_nav_cta_class', 10, 2 );

/**
 * Trim the auto excerpt and use a brand-consistent read-more string.
 */
function hudl_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'hudl_excerpt_length' );

function hudl_excerpt_more( $more ) {
	return '…';
}
add_filter( 'excerpt_more', 'hudl_excerpt_more' );
