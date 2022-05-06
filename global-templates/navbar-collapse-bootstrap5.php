<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-light" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container-fluid px-5">

		<!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>

			<?php if ( is_front_page() && is_home() ) : ?>

				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

			<?php else : ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

			<?php endif; ?>

			<?php
		} else {
			the_custom_logo();
		}
		?>
		<!-- end custom logo -->

		

		<div class="nav-options d-flex flex-grow-1 flex-row px-5">
			<div class="emergency-exit ms-5 me-auto">
				<span><a href="https://google.com">Emergency Website Exit - Click Here</a></span>
			</div>
			<div class="dropdown">
				<a class="nav-link dropdown-toggle pt-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Language
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">English</a>
					<a class="dropdown-item" href="#">Espanol</a>
				</div>
			</div>
			<a href="#">Technical Assistance</a>
		</div><!-- end .header-options -->

		<span class="search-form-wrap">
			<?php get_search_form(); ?>
		</span>

	</div><!-- .container-fluid -->

</nav><!-- .site-navigation -->

<nav id="second-nav" class="navbar navbar-expand-md navbar-light border-top" aria-labelledby="second-nav-label">
	<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- The WordPress Menu goes here -->
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => 'navbarNavDropdown',
			'menu_class'      => 'navbar-nav d-flex flex-grow-1 justify-content-around',
			'fallback_cb'     => '',
			'menu_id'         => 'main-menu',
			'depth'           => 2,
			'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
		)
	);
	?>
</nav>
