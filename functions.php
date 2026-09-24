<?php
/** Theme setup and editable profile details. */
defined( 'ABSPATH' ) || exit;
function iamgsbala_setup() {
	load_theme_textdomain( 'iamgsbala', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 300, 'flex-height' => true, 'flex-width' => true ) );
}
add_action( 'after_setup_theme', 'iamgsbala_setup' );
function iamgsbala_assets() {
	wp_enqueue_style( 'iamgsbala', get_stylesheet_uri(), array(), '1.1.0' );
	wp_enqueue_script( 'iamgsbala', get_template_directory_uri() . '/assets/site.js', array(), '1.1.0', true );
	if ( is_page( array( 'ordercraft-studio-for-woocommerce', 'ordercraft-studio', 'ordercraft-studio-documentation', 'ordercraft-documentation' ) ) || is_page_template( 'page-ordercraft-studio.php' ) || is_page_template( 'page-ordercraft-studio-legacy.php' ) || is_page_template( 'page-ordercraft-studio-documentation.php' ) ) {
		wp_enqueue_style( 'iamgsbala-ordercraft', get_template_directory_uri() . '/assets/ordercraft.css', array( 'iamgsbala' ), '1.3.0' );
	}
	if ( is_front_page() && iamgsbala_contact_form() ) {
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) { wpcf7_enqueue_scripts(); }
		if ( function_exists( 'wpcf7_enqueue_styles' ) ) { wpcf7_enqueue_styles(); }
	}
}
add_action( 'wp_enqueue_scripts', 'iamgsbala_assets' );

/** Keep the public OrderCraft product and documentation pages visible while the store is in Coming Soon mode. */
function iamgsbala_ordercraft_exclude_from_coming_soon( $exclude ) {
	if ( is_page( array( 'ordercraft-studio-for-woocommerce', 'ordercraft-studio-documentation' ) ) || is_page_template( array( 'page-ordercraft-studio.php', 'page-ordercraft-studio-documentation.php' ) ) ) {
		return true;
	}
	return $exclude;
}
add_filter( 'woocommerce_coming_soon_exclude', 'iamgsbala_ordercraft_exclude_from_coming_soon', 20 );

/** Give the standalone product pages their own browser/search titles. */
function iamgsbala_ordercraft_document_title( $parts ) {
	if ( is_page( 'ordercraft-studio-documentation' ) ) {
		$parts['title'] = 'Documentation | OrderCraft Studio';
	} elseif ( is_page( array( 'ordercraft-studio-for-woocommerce', 'ordercraft-studio' ) ) ) {
		$parts['title'] = 'OrderCraft Studio | Custom-order workflow for WooCommerce';
	}
	return $parts;
}
add_filter( 'document_title_parts', 'iamgsbala_ordercraft_document_title', 20 );

function iamgsbala_ordercraft_pre_document_title( $title ) {
	if ( is_page( 'ordercraft-studio-documentation' ) ) {
		return 'Documentation | OrderCraft Studio';
	}
	if ( is_page( array( 'ordercraft-studio-for-woocommerce', 'ordercraft-studio' ) ) ) {
		return 'OrderCraft Studio | Custom-order workflow for WooCommerce';
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'iamgsbala_ordercraft_pre_document_title', 20 );

/**
 * Create the public OrderCraft Studio pages once for the site owner.
 *
 * @return void
 */
function iamgsbala_ordercraft_pages() {
	$pages = array(
		'ordercraft-studio-for-woocommerce'        => array( 'title' => 'OrderCraft Studio for WooCommerce', 'template' => 'page-ordercraft-studio.php' ),
		'ordercraft-studio-documentation' => array( 'title' => 'OrderCraft Studio Documentation', 'template' => 'page-ordercraft-studio-documentation.php' ),
	);

	if ( get_option( 'iamgsbala_ordercraft_pages_ready' ) ) {
		$pages_exist = true;
		foreach ( $pages as $slug => $page ) {
			$existing = get_page_by_path( $slug );
			if ( ! $existing || get_page_template_slug( $existing->ID ) !== $page['template'] ) {
				$pages_exist = false;
				break;
			}
		}
		if ( $pages_exist ) {
			return;
		}
	}

	foreach ( $pages as $slug => $page ) {
		$existing = get_page_by_path( $slug );
		$page_id  = $existing ? $existing->ID : wp_insert_post( array( 'post_title' => $page['title'], 'post_name' => $slug, 'post_status' => 'publish', 'post_type' => 'page' ), true );
		if ( is_wp_error( $page_id ) || ! $page_id ) {
			continue;
		}
		update_post_meta( $page_id, '_wp_page_template', $page['template'] );
	}

	update_option( 'iamgsbala_ordercraft_pages_ready', '1', false );
}
add_action( 'init', 'iamgsbala_ordercraft_pages', 20 );

/**
 * Keep the OrderCraft microsite on its own host while it shares this WordPress
 * installation with iamgsbala.com.
 *
 * The subdomain must point to the same WordPress document root. These filters
 * then keep generated page, asset and canonical URLs on that host only while a
 * visitor is browsing the subdomain.
 */
function iamgsbala_ordercraft_subdomain_host() {
	return 'ordercraft.iamgsbala.com';
}

function iamgsbala_ordercraft_is_subdomain_request() {
	$host = isset( $_SERVER['HTTP_HOST'] ) ? strtolower( (string) wp_unslash( $_SERVER['HTTP_HOST'] ) ) : '';
	$host = preg_replace( '/:\d+$/', '', $host );
	return $host && iamgsbala_ordercraft_subdomain_host() === $host;
}

function iamgsbala_ordercraft_subdomain_url( $url ) {
	if ( ! iamgsbala_ordercraft_is_subdomain_request() || ! $url ) {
		return $url;
	}

	$parts = wp_parse_url( $url );
	if ( ! is_array( $parts ) ) {
		return $url;
	}

	$scheme = ! empty( $parts['scheme'] ) ? $parts['scheme'] : ( is_ssl() ? 'https' : 'http' );
	$port   = ! empty( $parts['port'] ) ? ':' . absint( $parts['port'] ) : '';
	$path   = isset( $parts['path'] ) ? $parts['path'] : '/';
	$query  = isset( $parts['query'] ) ? '?' . $parts['query'] : '';
	$fragment = isset( $parts['fragment'] ) ? '#' . $parts['fragment'] : '';

	return $scheme . '://' . iamgsbala_ordercraft_subdomain_host() . $port . $path . $query . $fragment;
}

function iamgsbala_ordercraft_subdomain_home_url( $url ) {
	return iamgsbala_ordercraft_subdomain_url( $url );
}
add_filter( 'home_url', 'iamgsbala_ordercraft_subdomain_home_url', 20 );
add_filter( 'site_url', 'iamgsbala_ordercraft_subdomain_home_url', 20 );

/** Give the subdomain a clean homepage and documentation shortcut. */
function iamgsbala_ordercraft_subdomain_routes() {
	if ( ! iamgsbala_ordercraft_is_subdomain_request() || is_admin() || wp_doing_ajax() || wp_doing_cron() || is_feed() ) {
		return;
	}

	$path = wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/', PHP_URL_PATH );
	$path = '/' . trim( (string) $path, '/' ) . '/';

	if ( '//' === $path ) {
		$path = '/';
	}

	if ( '/' === $path ) {
		wp_safe_redirect( iamgsbala_ordercraft_url(), 301 );
		exit;
	}

	if ( '/documentation/' === strtolower( $path ) ) {
		wp_safe_redirect( iamgsbala_ordercraft_url( 'ordercraft-studio-documentation' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'iamgsbala_ordercraft_subdomain_routes', 1 );

function iamgsbala_ordercraft_url( $slug = 'ordercraft-studio-for-woocommerce' ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . trim( $slug, '/' ) . '/' );
}
function iamgsbala_customize( $customizer ) {
	$customizer->add_section( 'iamgsbala_profile', array( 'title' => __( 'iamgsbala Profile', 'iamgsbala' ), 'priority' => 30 ) );
	$fields = array(
		'name' => array( 'Balamurugan G.', __( 'Name', 'iamgsbala' ), 'text' ),
		'headline' => array( 'Built for your business. Made to work.', __( 'Headline', 'iamgsbala' ), 'text' ),
		'intro' => array( 'I’m Balamurugan, a senior WordPress & WooCommerce full-stack developer. I turn complex requirements into thoughtful websites, custom plugins and dependable commerce experiences.', __( 'Introduction', 'iamgsbala' ), 'textarea' ),
		'email' => array( '', __( 'Public contact email', 'iamgsbala' ), 'email' ),
		'contact_url' => array( '', __( 'Booking or contact URL (optional)', 'iamgsbala' ), 'url' ),
		'linkedin' => array( '', __( 'LinkedIn URL (optional)', 'iamgsbala' ), 'url' ),
	);
	foreach ( $fields as $key => $field ) {
		$sanitize = 'email' === $field[2] ? 'sanitize_email' : ( 'url' === $field[2] ? 'esc_url_raw' : 'sanitize_textarea_field' );
		$customizer->add_setting( 'iamgsbala_' . $key, array( 'default' => $field[0], 'sanitize_callback' => $sanitize ) );
		$customizer->add_control( 'iamgsbala_' . $key, array( 'label' => $field[1], 'section' => 'iamgsbala_profile', 'type' => $field[2] ) );
	}
	$customizer->add_setting( 'iamgsbala_contact_form_id', array( 'default' => 0, 'sanitize_callback' => 'absint' ) );
	$choices = array( 0 => __( 'Select a contact form', 'iamgsbala' ) );
	if ( post_type_exists( 'wpcf7_contact_form' ) ) {
		foreach ( get_posts( array( 'post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1 ) ) as $form ) {
			$choices[ $form->ID ] = $form->post_title;
		}
	}
	$customizer->add_control( 'iamgsbala_contact_form_id', array( 'label' => __( 'Contact Form 7 form', 'iamgsbala' ), 'section' => 'iamgsbala_profile', 'type' => 'select', 'choices' => $choices ) );
	foreach ( array( 'fileops' => __( 'FileOps landing-page URL', 'iamgsbala' ), 'storeops' => __( 'StoreOps landing-page URL', 'iamgsbala' ) ) as $key => $label ) {
		$customizer->add_setting( 'iamgsbala_' . $key . '_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$customizer->add_control( 'iamgsbala_' . $key . '_url', array( 'label' => $label, 'description' => __( 'Leave blank until the subdomain is live; the project links to WordPress.org meanwhile.', 'iamgsbala' ), 'section' => 'iamgsbala_profile', 'type' => 'url' ) );
	}
}
add_action( 'customize_register', 'iamgsbala_customize' );
function iamgsbala_anchor( $id ) {
	return ( is_front_page() ? '' : home_url( '/' ) ) . '#' . $id;
}

function iamgsbala_contact_form() {
	$id = absint( get_theme_mod( 'iamgsbala_contact_form_id', 0 ) );
	return class_exists( 'WPCF7_ContactForm' ) && $id ? WPCF7_ContactForm::get_instance( $id ) : null;
}

function iamgsbala_icon( $type = 'code' ) {
	$paths = array(
		'code' => '<path d="m8 7-5 5 5 5m8-10 5 5-5 5m-3-13-2 16"/>',
		'store' => '<path d="M4 10v11h16V10M3 3h18l1 7H2l1-7Zm6 18v-7h6v7M2 10c0 3 5 3 5 0 0 3 5 3 5 0 0 3 5 3 5 0 0 3 5 3 5 0"/>',
		'check' => '<rect x="3" y="3" width="18" height="18" rx="5"/><path d="m7 12 3 3 7-7"/>',
		'link' => '<path d="m10 13 4-4m-6 6-2 2a4 4 0 0 1-5-5l4-4a4 4 0 0 1 5 0m4 8a4 4 0 0 0 5 0l4-4a4 4 0 0 0-5-5l-2 2"/>',
	);
	return '<svg class="line-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . ( $paths[ $type ] ?? $paths['code'] ) . '</svg>';
}
