<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-light" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container">
		<div class="row flex-grow-1 py-5">
			<div class="col-md-2 desktop-menu">

				<div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="navbarNavOffcanvasPrimary">

					<div class="offcanvas-header justify-content-end">
						<button type="button" class="btn-close btn-close-secondary text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div><!-- .offcancas-header -->

					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'offcanvas-body',
							'container_id'    => 'navbarNavDropdownLeft',
							'menu_class'      => 'navbar-nav d-flex flex-column justify-content-around',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
				</div><!-- .offcanvas -->
			</div>

			<div class="col-md-8 text-center">

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
			</div>
			<div class="col-md-2 desktop-menu">
				<div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="navbarNavOffcanvasSeconadry">

					<div class="offcanvas-header justify-content-end">
						<button type="button" class="btn-close btn-close-secondary text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div><!-- .offcancas-header -->

					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'secondary',
							'container_class' => 'offcanvas-body',
							'container_id'    => 'navbarNavDropdownRight',
							'menu_class'      => 'navbar-nav d-flex flex-column',
							'fallback_cb'     => '',
							'menu_id'         => 'secondary-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
				</div><!-- .offcanvas -->
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->

	<div class="mobile-menu d-block d-md-none">
		<div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="navbarNavOffcanvasMobile">
			<div class="offcanvas-header justify-content-end">
				<button type="button" class="btn-close btn-close-secondary text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div><!-- .offcancas-header -->
			<?php  
				// two WordPress menus combined into one.
				// first menu.
				$menu = wp_nav_menu( array(
					'theme_location'=> 'secondary', // or whatever location
					'fallback_cb'   => false,
					'container'     => '',
					'container_class' => 'offcanvas-body',
					'container_id'    => 'navbarNavOffcanvasMobile',
					'menu_class'      => 'navbar-nav d-flex flex-column',
					'menu_id'         => 'mobile-menu',
					'items_wrap' => '%3$s',
					'echo' => false,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				) );
				// include all of the menu items from the first inside the second menu.
				wp_nav_menu( array(
					'theme_location' => 'primary', // or whatever location
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s ' . $menu . '</ul>',
					'container_class' => 'offcanvas-body',
					'container_id'    => 'navbarNavOffcanvasMobile',
					'menu_class'      => 'navbar-nav d-flex flex-column',
					'menu_id'         => 'mobile-menu',
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				) );
			?>
		</div>
	</div>
	<div class="side-menu">
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvasMobile" aria-controls="navbarNavOffcanvasMobile" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon"></span>
			<span class="visually-hidden">Open Menu</span>
		</button>
		<a href="#" class="btn btn-secondary quick-exit text-white d-block d-md-none">
			<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000F9F" class="bi bi-x-lg" viewBox="0 0 16 16">
				<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
			</svg>
			<span class="visually-hidden">Quickly Exit Site</span>
		</a>
	</div>

</nav><!-- .site-navigation -->
