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
<section class="footer-contact" id="contact">
	<div class="container-fluid px-5 ">
		<div class="row d-flex justify-content-center px-0 px-lg-5 py-5">
			<div class="col">
				<div class="contact-form py-4">
					<h3 class="office-contact text-info text-uppercase">Contact our Office</h3>
					<?= do_shortcode( '[wpforms id="29" title="false"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="bg-primary text-light" id="stay-in-touch">
	<div class="container-fluid px-5">
		<div class="d-flex justify-content-lg-between px-0 px-lg-5 py-5 flex-column flex-lg-row">
			<div class="text-start mb-2"><span class="h4">LET'S STAY IN TOUCH</span></div>
			<div class="text-start">
				<div class="form-wrapper">
					<form class="form-inline d-lg-flex" action="https://bwjp.us11.list-manage.com/subscribe/post" method="POST">
						<input type="hidden" name="u" value="554dc701fd0b3a38d610ccc2c">
						<input type="hidden" name="id" value="347d47d8e9">
						<label class="sr-only" for="emailInput">Email</label>
						<input type="text" class="form-control me-3 mb-2 mb-lg-0 text-uppercase" name="MERGE0" id="emailInput" placeholder="Email Address" size="50">

						<button type="submit" class="btn">SUBSCRIBE</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<footer class="site-footer bg-primary text-light" id="colophon">
	<div class="container-fluid px-5">
		<div class="row px-0 px-lg-5">
			<div class="col-12">

				<?php the_field('footer_text', 'options'); ?>

			</div>
		</div>
		<div class="row align-items-center px-0 px-lg-5">
			<div class="col-12">
				<img src="/wp-content/uploads/2022/05/BWJP-decorative.png" alt="">
			</div>
		</div><!-- row end -->

	</div><!-- container end -->
</footer><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

