<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

<!-- Full screen modal for safety and menu instructions -->
<div class="modal fade" id="navigationModal" tabindex="-1" aria-labelledby="navigationModelLabal" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-white" id="navigationModelLabal">Navigation Instructions</h4>
				<button type="button" class="btn-close modal-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Use the Quick Exit link to close out this website and open a new tab in the weather channel.</p>
				<p>Please be advised that BWJP.org will still show up in your browser's history. Consider opening this website in an incognito/private window and/or clearing your browser's history data when you are done.</p>
				<div class="d-flex flex-row align-items-center">
					<img src="/wp-content/uploads/2022/08/menu-icon.png" alt="menu icon for navigation illustration">
					<p class="fs-5 pt-2 ps-2">Quick Menu for Navigation</p>
				</div>
				<div class="d-flex flex-row align-items-center">
					<img src="/wp-content/uploads/2022/08/quick-exit-icon.png" alt="menu icon for navigation illustration">
					<p class="fs-5 pt-2 ps-2">Quick Exit Closes This Website </p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal" aria-label="close modal">Got It!</button>
			</div>
		</div>
	</div>
</div>



	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<?php get_template_part( 'global-templates/navbar', $navbar_type . '-' . $bootstrap_version ); ?>

	</header><!-- #wrapper-navbar end -->
	
	<?php if (! is_front_page()) : ?>
		<!-- *** Page Title *** -->
		<?php get_template_part('template-parts/page', 'title');    ?>
	<?php endif; ?>
