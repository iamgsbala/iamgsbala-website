<?php defined( 'ABSPATH' ) || exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'ordercraft-standalone' ); ?>>
<?php wp_body_open(); ?>
<div class="ordercraft-frame">
	<header class="ordercraft-header">
		<div class="ordercraft-header__inner">
			<a class="ordercraft-brand" href="<?php echo esc_url( iamgsbala_ordercraft_url() ); ?>" aria-label="Custom Order Workflow for WooCommerce home">
				<span class="ordercraft-brand__mark" aria-hidden="true"><span></span><span></span><i></i></span>
				<span><span class="ordercraft-brand__name">Custom Order Workflow</span><small><?php esc_html_e( 'for WooCommerce · by iamgsbala', 'iamgsbala' ); ?></small></span>
			</a>
			<nav class="ordercraft-nav" aria-label="Custom Order Workflow navigation">
				<a href="<?php echo esc_url( iamgsbala_ordercraft_url() ); ?>"><?php esc_html_e( 'Product', 'iamgsbala' ); ?></a>
				<a href="<?php echo esc_url( iamgsbala_ordercraft_url() . '#workflow' ); ?>"><?php esc_html_e( 'Workflow', 'iamgsbala' ); ?></a>
				<a href="<?php echo esc_url( iamgsbala_ordercraft_url( iamgsbala_ordercraft_documentation_slug() ) ); ?>"><?php esc_html_e( 'Documentation', 'iamgsbala' ); ?></a>
				<a href="<?php echo esc_url( iamgsbala_ordercraft_url() . '#plans' ); ?>"><?php esc_html_e( 'Pricing', 'iamgsbala' ); ?></a>
				<a href="https://iamgsbala.com/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'iamgsbala', 'iamgsbala' ); ?> ↗</a>
				<a class="ordercraft-nav__github" href="https://wordpress.org/plugins/iamgsbala-custom-order-workflow-for-woocommerce/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View on WordPress.org', 'iamgsbala' ); ?></a>
				<a class="ordercraft-nav__cta" href="https://wordpress.org/plugins/iamgsbala-custom-order-workflow-for-woocommerce/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Get the free plugin', 'iamgsbala' ); ?> ↗</a>
			</nav>
		</div>
	</header>
