<?php
/**
 * Template Name: OrderCraft Studio documentation
 *
 * @package iamgsbala
 */
defined( 'ABSPATH' ) || exit;
get_header( 'ordercraft' );
$guide_url = get_template_directory_uri() . '/assets/ordercraft-guides/';
?>
<main id="main" class="ordercraft-site-page ordercraft-docs-page">
	<section class="ordercraft-docs-hero shell">
		<div>
			<p class="ordercraft-kicker"><span class="ordercraft-kicker-dot"></span><?php esc_html_e( 'OrderCraft Studio · by iamgsbala', 'iamgsbala' ); ?></p>
			<h1><?php esc_html_e( 'Documentation that keeps the workflow moving.', 'iamgsbala' ); ?></h1>
			<p class="ordercraft-lead"><?php esc_html_e( 'A practical, screen-by-screen guide for store owners, production teams and customers using OrderCraft Studio for WooCommerce.', 'iamgsbala' ); ?></p>
		</div>
		<a class="ordercraft-button ordercraft-button--primary" href="<?php echo esc_url( iamgsbala_ordercraft_url() ); ?>">← <?php esc_html_e( 'Back to OrderCraft Studio', 'iamgsbala' ); ?></a>
	</section>

	<section class="ordercraft-docs-layout shell">
		<aside class="ordercraft-docs-nav">
			<p class="ordercraft-kicker"><?php esc_html_e( 'On this page', 'iamgsbala' ); ?></p>
			<a href="#quick-start"><?php esc_html_e( 'Quick start', 'iamgsbala' ); ?></a>
			<a href="#settings"><?php esc_html_e( 'Global settings', 'iamgsbala' ); ?></a>
			<a href="#product-setup"><?php esc_html_e( 'Product setup', 'iamgsbala' ); ?></a>
			<a href="#dashboard"><?php esc_html_e( 'Dashboard', 'iamgsbala' ); ?></a>
			<a href="#jobs"><?php esc_html_e( 'Jobs and activity', 'iamgsbala' ); ?></a>
			<a href="#customer"><?php esc_html_e( 'Customer review', 'iamgsbala' ); ?></a>
			<a href="#workflow"><?php esc_html_e( 'Workflow states', 'iamgsbala' ); ?></a>
			<a href="#security"><?php esc_html_e( 'Files and security', 'iamgsbala' ); ?></a>
			<a href="#faq"><?php esc_html_e( 'FAQ and support', 'iamgsbala' ); ?></a>
		</aside>

		<article class="ordercraft-docs-content">
			<section id="quick-start">
				<p class="ordercraft-kicker">01 / <?php esc_html_e( 'Quick start', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'Install the free workflow in four moves.', 'iamgsbala' ); ?></h2>
				<p class="ordercraft-guide-intro"><?php esc_html_e( 'OrderCraft Studio adds a structured production layer to WooCommerce. The product remains the place where customers order; the Job becomes the place where your team reviews files, sends proofs and moves work into production.', 'iamgsbala' ); ?></p>
				<ol class="ordercraft-number-list">
					<li><b>01</b><div><strong><?php esc_html_e( 'Check the requirements', 'iamgsbala' ); ?></strong><p><?php esc_html_e( 'Use a supported WordPress/PHP installation with WooCommerce active. Customers need an account when proof approval is enabled.', 'iamgsbala' ); ?></p></div></li>
					<li><b>02</b><div><strong><?php esc_html_e( 'Install OrderCraft Studio', 'iamgsbala' ); ?></strong><p><?php esc_html_e( 'Install it from WordPress.org, activate it, then open OrderCraft Studio in the WordPress admin menu.', 'iamgsbala' ); ?></p></div></li>
					<li><b>03</b><div><strong><?php esc_html_e( 'Configure one product', 'iamgsbala' ); ?></strong><p><?php esc_html_e( 'Open a WooCommerce product and use the OrderCraft Studio product panel to enable the workflow, artwork upload, proof approval and specification fields.', 'iamgsbala' ); ?></p></div></li>
					<li><b>04</b><div><strong><?php esc_html_e( 'Run a complete test order', 'iamgsbala' ); ?></strong><p><?php esc_html_e( 'Place a test order, upload artwork, open the Job, upload a proof and approve it from My Account. Confirm that the order status follows the Job milestone.', 'iamgsbala' ); ?></p></div></li>
				</ol>
				<div class="ordercraft-callout"><strong><?php esc_html_e( 'Recommended first test', 'iamgsbala' ); ?></strong><p><?php esc_html_e( 'Use one simple product with one required text field and a small JPG. This verifies the customer form, private file handler, Job creation, proof approval and status synchronization without introducing extra variables.', 'iamgsbala' ); ?></p></div>
			</section>

			<section id="settings">
				<p class="ordercraft-kicker">02 / <?php esc_html_e( 'Global settings', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'Set the rules once for the whole store.', 'iamgsbala' ); ?></h2>
				<p class="ordercraft-guide-intro"><?php esc_html_e( 'Open OrderCraft Studio → Settings to control file handling and data retention. Product-level switches still decide which products use the workflow.', 'iamgsbala' ); ?></p>
				<div class="ordercraft-option-grid">
					<div class="ordercraft-option-card"><b><?php esc_html_e( 'Maximum artwork size', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Choose 1–100 MB. The default is 25 MB. Keep this close to what your production team really needs so uploads stay reliable.', 'iamgsbala' ); ?></p></div>
					<div class="ordercraft-option-card"><b><?php esc_html_e( 'Allowed extensions', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'PDF, AI, EPS, PNG, JPG/JPEG, TIF/TIFF and ZIP are available. SVG is not selected by default because it needs sanitization before customer use.', 'iamgsbala' ); ?></p></div>
					<div class="ordercraft-option-card"><b><?php esc_html_e( 'Delete data on uninstall', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Leave this off to retain operational history. Enable it only when you explicitly want OrderCraft tables and settings removed during uninstall.', 'iamgsbala' ); ?></p></div>
					<div class="ordercraft-option-card"><b><?php esc_html_e( 'Data retention', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Artwork, proofs, Jobs, notes and activity are retained while the plugin is active. This protects historical order context during normal updates.', 'iamgsbala' ); ?></p></div>
				</div>
				<figure class="ordercraft-guide-figure"><img src="<?php echo esc_url( $guide_url . 'ordercraft-product-guide.png' ); ?>" alt="OrderCraft Studio product setup interface showing workflow switches and specification fields"><figcaption><strong><?php esc_html_e( 'Interface guide: product workflow controls and specification builder.', 'iamgsbala' ); ?></strong> <?php esc_html_e( 'The screenshot shows the same controls explained in the next section.', 'iamgsbala' ); ?></figcaption></figure>
			</section>

			<section id="product-setup">
				<p class="ordercraft-kicker">03 / <?php esc_html_e( 'Product setup', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'Turn a normal product into a custom-order product.', 'iamgsbala' ); ?></h2>
				<p class="ordercraft-guide-intro"><?php esc_html_e( 'The OrderCraft Studio tab appears inside the WooCommerce product editor. Configure these options before publishing the product or accepting a live custom order.', 'iamgsbala' ); ?></p>
				<div class="ordercraft-doc-details">
					<details open><summary><?php esc_html_e( 'Enable custom order operations', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Creates one production Job for each eligible order item. The Job stores the product, WooCommerce order ID, specification snapshot, artwork, proofs, status and activity trail.', 'iamgsbala' ); ?></p></details>
					<details><summary><?php esc_html_e( 'Require customer approval', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Adds the proof-review step and requires a customer account for approval. Staff can send a current proof, the customer can approve it or request changes, and the approval is recorded against that proof version.', 'iamgsbala' ); ?></p></details>
					<details><summary><?php esc_html_e( 'Enable artwork upload', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Adds artwork collection to the customer order flow. File type and size are validated against Global Settings, filenames are randomized for storage, and authorized preview/download handlers protect access.', 'iamgsbala' ); ?></p></details>
					<details><summary><?php esc_html_e( 'Specification fields', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Build the customer brief with Text, Number, Textarea, Select, Radio and Checkbox fields. ID is stable, Label is customer-facing, Required controls validation, Description explains the request, Placeholder guides entry, Default pre-fills a value, and Options uses one value|label pair per line for Select or Radio fields.', 'iamgsbala' ); ?></p></details>
				</div>
				<ul class="ordercraft-tip-list"><li><?php esc_html_e( 'Stable IDs are copied into the order snapshot, so later label changes do not rewrite historical specifications.', 'iamgsbala' ); ?></li><li><?php esc_html_e( 'For options, enter values like red|Red ink and blue|Blue ink. The value is stored; the label is shown to the customer.', 'iamgsbala' ); ?></li><li><?php esc_html_e( 'Save the product after adding or changing fields. Place a test order after every major form change.', 'iamgsbala' ); ?></li></ul>
			</section>

			<section id="dashboard">
				<p class="ordercraft-kicker">04 / <?php esc_html_e( 'Dashboard', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'Start every morning from one operational view.', 'iamgsbala' ); ?></h2>
				<p class="ordercraft-guide-intro"><?php esc_html_e( 'The overview shows the current workload rather than technical setup information. Status cards count Jobs, Recent Jobs gives a fast queue, and the next-step panel tells the operator what needs attention.', 'iamgsbala' ); ?></p>
				<div class="ordercraft-option-grid"><div class="ordercraft-option-card"><b><?php esc_html_e( 'Status cards', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Use Artwork Review, Waiting Approval, Approved, In Production and Ready counts to spot bottlenecks quickly.', 'iamgsbala' ); ?></p></div><div class="ordercraft-option-card"><b><?php esc_html_e( 'Recent Jobs', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Open a Job from its Job number. The linked WooCommerce order ID and current status remain visible in the queue.', 'iamgsbala' ); ?></p></div><div class="ordercraft-option-card"><b><?php esc_html_e( 'Documentation link', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Use the in-dashboard documentation link for setup guidance and customer approval instructions.', 'iamgsbala' ); ?></p></div><div class="ordercraft-option-card"><b><?php esc_html_e( 'Pro preview', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'The Pro card describes planned advanced automation, team operations, reporting and integrations. The free workflow works independently.', 'iamgsbala' ); ?></p></div></div>
				<figure class="ordercraft-guide-figure"><img src="<?php echo esc_url( $guide_url . 'ordercraft-dashboard-guide.png' ); ?>" alt="OrderCraft Studio dashboard showing status cards, recent Jobs and next steps"><figcaption><strong><?php esc_html_e( 'Interface guide: dashboard workload view.', 'iamgsbala' ); ?></strong> <?php esc_html_e( 'Counts and queue entries are generated from the Jobs stored by the plugin.', 'iamgsbala' ); ?></figcaption></figure>
			</section>

			<section id="jobs">
				<p class="ordercraft-kicker">05 / <?php esc_html_e( 'Jobs and activity', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'A Job is the production record for one order item.', 'iamgsbala' ); ?></h2>
				<p class="ordercraft-guide-intro"><?php esc_html_e( 'Open OrderCraft Studio → Jobs, then select a Job to see the full context. This is where the team reviews the immutable specification snapshot, artwork revisions, proof versions, status and activity.', 'iamgsbala' ); ?></p>
				<div class="ordercraft-option-grid"><div class="ordercraft-option-card"><b><?php esc_html_e( 'Specification snapshot', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Shows the values submitted with the order. Historical values remain stable even if the product field label later changes.', 'iamgsbala' ); ?></p></div><div class="ordercraft-option-card"><b><?php esc_html_e( 'Artwork', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Review the current file, see previous versions, preview supported images and download authorized files.', 'iamgsbala' ); ?></p></div><div class="ordercraft-option-card"><b><?php esc_html_e( 'Proofs', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Upload a new revision, add a customer message and make the current proof available in My Account.', 'iamgsbala' ); ?></p></div><div class="ordercraft-option-card"><b><?php esc_html_e( 'Activity trail', 'iamgsbala' ); ?></b><p><?php esc_html_e( 'Every important status, upload, approval and change request is recorded with the actor and timestamp.', 'iamgsbala' ); ?></p></div></div>
				<figure class="ordercraft-guide-figure"><img src="<?php echo esc_url( $guide_url . 'ordercraft-job-guide.png' ); ?>" alt="OrderCraft Studio Job detail screen showing status steps, specifications, files and activity"><figcaption><strong><?php esc_html_e( 'Interface guide: Job detail and production hand-off.', 'iamgsbala' ); ?></strong> <?php esc_html_e( 'The Job connects the customer request to the action your team takes next.', 'iamgsbala' ); ?></figcaption></figure>
			</section>

			<section id="customer">
				<p class="ordercraft-kicker">06 / <?php esc_html_e( 'Customer review', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'Approval happens in My Account, with the order ID visible.', 'iamgsbala' ); ?></h2>
				<p class="ordercraft-guide-intro"><?php esc_html_e( 'Customers use My Account → Artwork & Proofs to review the current proof, identify the linked WooCommerce order and tell the team whether to continue or revise.', 'iamgsbala' ); ?></p>
				<div class="ordercraft-doc-details"><details open><summary><?php esc_html_e( 'Approve proof', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Approval records the customer, timestamp and proof revision. The Job becomes Approved and the matching WooCommerce order status becomes OrderCraft Studio: Approved.', 'iamgsbala' ); ?></p></details><details><summary><?php esc_html_e( 'Request changes', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'The customer message is saved as a change request. Staff can prepare and upload a new proof revision, then send it back for review.', 'iamgsbala' ); ?></p></details><details><summary><?php esc_html_e( 'Order and Job IDs', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'The customer sees the WooCommerce order ID, the OrderCraft Job ID and the product context so the approval is unambiguous.', 'iamgsbala' ); ?></p></details></div>
				<figure class="ordercraft-guide-figure"><img src="<?php echo esc_url( $guide_url . 'ordercraft-customer-guide.png' ); ?>" alt="OrderCraft Studio customer Artwork and Proofs page showing order ID and approval buttons"><figcaption><strong><?php esc_html_e( 'Interface guide: customer Artwork & Proofs review.', 'iamgsbala' ); ?></strong> <?php esc_html_e( 'The current proof, order ID, Job ID and activity are kept together on the customer side.', 'iamgsbala' ); ?></figcaption></figure>
			</section>

			<section id="workflow">
				<p class="ordercraft-kicker">07 / <?php esc_html_e( 'Workflow states', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'What happens after customer approval?', 'iamgsbala' ); ?></h2>
				<p><?php esc_html_e( 'Approval does not silently start production. It changes the Job to Approved and updates the order. Staff then deliberately move the Job to In Production when payment, scheduling and the production hand-off are ready.', 'iamgsbala' ); ?></p>
				<div class="ordercraft-status-table"><div><span><?php esc_html_e( 'Job milestone', 'iamgsbala' ); ?></span><span><?php esc_html_e( 'WooCommerce order status', 'iamgsbala' ); ?></span></div><div><strong>New</strong><strong>OrderCraft Studio: New</strong></div><div><strong>Artwork Received</strong><strong>OrderCraft Studio: Artwork Received</strong></div><div><strong>Artwork Review</strong><strong>OrderCraft Studio: Artwork Review</strong></div><div><strong>Artwork Changes Required</strong><strong>OrderCraft Studio: Artwork Changes Required</strong></div><div><strong>Artwork Approved</strong><strong>OrderCraft Studio: Artwork Approved</strong></div><div><strong>Proof Preparation</strong><strong>OrderCraft Studio: Proof Preparation</strong></div><div><strong>Waiting Customer Approval</strong><strong>OrderCraft Studio: Waiting Approval</strong></div><div><strong>Changes Requested</strong><strong>OrderCraft Studio: Changes Requested</strong></div><div><strong>Approved</strong><strong>OrderCraft Studio: Approved</strong></div><div><strong>In Production</strong><strong>OrderCraft Studio: In Production</strong></div><div><strong>Quality Check</strong><strong>OrderCraft Studio: Quality Check</strong></div><div><strong>Ready</strong><strong>OrderCraft Studio: Ready</strong></div><div><strong>All Jobs Completed</strong><strong>Completed</strong></div></div>
				<p class="ordercraft-doc-note"><?php esc_html_e( 'If an order has multiple active Jobs, the order follows the least advanced active Job. Cancelled, refunded and failed orders are not overwritten by synchronization.', 'iamgsbala' ); ?></p>
			</section>

			<section id="security">
				<p class="ordercraft-kicker">08 / <?php esc_html_e( 'Files and security', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'Designed for sensitive production files.', 'iamgsbala' ); ?></h2>
				<div class="ordercraft-callout"><strong><?php esc_html_e( 'Private by default', 'iamgsbala' ); ?></strong><p><?php esc_html_e( 'Artwork and proofs are stored outside the public uploads directory when the server permits it. Access is served through authenticated, capability-checked handlers. SVG is disabled by default.', 'iamgsbala' ); ?></p></div>
				<ul class="ordercraft-tip-list"><li><?php esc_html_e( 'Use HTTPS on the live store and keep WordPress, WooCommerce and OrderCraft Studio updated.', 'iamgsbala' ); ?></li><li><?php esc_html_e( 'Give production staff the minimum WordPress capabilities they need. Job and settings screens require the appropriate admin permissions.', 'iamgsbala' ); ?></li><li><?php esc_html_e( 'Test preview and download links while logged out. A protected link should not expose a private file to an anonymous visitor.', 'iamgsbala' ); ?></li></ul>
			</section>

			<section id="faq">
				<p class="ordercraft-kicker">09 / <?php esc_html_e( 'FAQ and support', 'iamgsbala' ); ?></p>
				<h2><?php esc_html_e( 'Common questions.', 'iamgsbala' ); ?></h2>
				<div class="ordercraft-doc-details"><details open><summary><?php esc_html_e( 'Does customer approval start production automatically?', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'No. Customer approval changes the Job to Approved and the order to OrderCraft Studio: Approved. Staff then move the Job to In Production when the team is ready.', 'iamgsbala' ); ?></p></details><details><summary><?php esc_html_e( 'Why can a customer not see the Artwork & Proofs page?', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Check that the customer is logged into the account used for the order, that a proof has been sent for review and that the product has customer approval enabled.', 'iamgsbala' ); ?></p></details><details><summary><?php esc_html_e( 'Can I change a field label later?', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Yes. New orders use the new label; existing Jobs retain their stable field ID and submitted snapshot so historical specifications remain understandable.', 'iamgsbala' ); ?></p></details><details><summary><?php esc_html_e( 'What is included in Pro?', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Pro is planned for advanced automation, Kanban/team operations, reporting, integrations and expanded production controls. The free workflow remains useful on its own.', 'iamgsbala' ); ?></p></details><details><summary><?php esc_html_e( 'Where can I get help?', 'iamgsbala' ); ?></summary><p><?php esc_html_e( 'Start with this guide and the plugin readme. For product updates and support information, visit iamgsbala.com.', 'iamgsbala' ); ?></p></details></div>
			</section>
		</article>
	</section>

	<section class="ordercraft-doc-cta"><div class="shell"><div><p class="ordercraft-kicker"><?php esc_html_e( 'Ready to test?', 'iamgsbala' ); ?></p><h2><?php esc_html_e( 'Give one custom order a clear next step.', 'iamgsbala' ); ?></h2></div><a class="ordercraft-button ordercraft-button--light" href="https://wordpress.org/plugins/ordercraft-studio-for-woocommerce/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Get the free plugin', 'iamgsbala' ); ?> ↗</a></div></section>
</main>
<?php get_footer( 'ordercraft' ); ?>
