<?php defined( 'ABSPATH' ) || exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'iamgsbala' ); ?></a>
<header class="site-header"><div class="shell header-inner">
<div class="brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'iamgsbala home', 'iamgsbala' ); ?>"><img class="brand-logo" src="<?php echo esc_url( get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : get_template_directory_uri() . '/assets/gs-logo.png' ); ?>" width="88" height="40" alt="GS Bala"><span class="brand-name">iamgsbala<span class="brand-dot">.</span></span></a></div>
<button class="menu-toggle" aria-controls="primary-nav" aria-expanded="false" hidden><?php esc_html_e( 'Menu', 'iamgsbala' ); ?> <span aria-hidden="true">☰</span></button>
<nav id="primary-nav" aria-label="<?php esc_attr_e( 'Main navigation', 'iamgsbala' ); ?>">
<?php foreach ( array( 'expertise' => __( 'Expertise', 'iamgsbala' ), 'work' => __( 'Work', 'iamgsbala' ), 'about' => __( 'About', 'iamgsbala' ) ) as $id => $label ) : ?><a href="<?php echo esc_url( iamgsbala_anchor( $id ) ); ?>"><?php echo esc_html( $label ); ?></a><?php endforeach; ?>
<a class="nav-contact" href="<?php echo esc_url( iamgsbala_anchor( 'contact' ) ); ?>"><?php esc_html_e( 'Let’s talk', 'iamgsbala' ); ?> <span aria-hidden="true">↗</span></a>
</nav></div></header>
