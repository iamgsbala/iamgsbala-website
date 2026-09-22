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
	if ( is_front_page() && iamgsbala_contact_form() ) {
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) { wpcf7_enqueue_scripts(); }
		if ( function_exists( 'wpcf7_enqueue_styles' ) ) { wpcf7_enqueue_styles(); }
	}
}
add_action( 'wp_enqueue_scripts', 'iamgsbala_assets' );
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
