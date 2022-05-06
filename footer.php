<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$contact_bool = get_field('contact_form');

?>


<?php if ($contact_bool) : ?>
<section class="" id="contact">
	<div class="container">
		<div class="row d-flex justify-content-center ">
			<div class="col-md-10">
				<div class="contact-form p-4 border">
					<h3 class="office-contact">Contact our Office</h3>
					<?= do_shortcode( '[wpforms id="29" title="false"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="border-top border-bottom mt-3" id="stay-in-touch">
	<div class="container">
		<div class="row justify-content-center py-5">
			<div class="col-md-10">
				<div class="form-wrapper d-flex justify-content-center align-items-center">
					<span class="h4 me-5">Stay in touch</span>

					<form class="form-inline d-flex">
						<label class="sr-only" for="emailInput">Email</label>
						<input type="text" class="form-control me-3" id="emailInput" placeholder="Email Address">

						<button type="submit" class="btn btn-dark">SUBSCRIBE</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<footer class="site-footer" id="colophon">
	<div class="container-fluid">
		<div class="row px-5 py-4 align-items-center">
			<div class="col-md-2">
				<div class="site-info">

					<span>Copyright <?= date('Y');?></span>

				</div><!-- .site-info -->
			</div><!--col end -->
			<div class="col-md-10">
				<nav>
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'footer',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav d-flex flex-grow-1 justify-content-around',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
				</nav>
			</div>
		</div><!-- row end -->

		</div><!-- container end -->
</footer><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

