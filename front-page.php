<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div id="content" tabindex="-1">
	<main class="site-main" id="main">
		<div class="container-fluid p-0">

			<section class="home-main">
				<div class="row justify-content-center px-5 pt-5">
					<div class="col-10" style="z-index: 800;">
						<h2 class="text-uppercase text-light text-left display-3 headline"><span class="first-line">Changing Systems</span>
						<br/>Transforming Lives</h2>
					</div>
				</div>
				<div class="row" style="position: relative; z-index: 1;">
					<div class="col-md-2">
						<img class="img-left" src="/wp-content/uploads/2022/05/Home_2.png" alt="">
					</div>
					<div class="col-md-10">
						<img class="img-right" src="/wp-content/uploads/2022/05/Home_1-1.jpg" alt="">
					</div>
				</div>
				<div class="row p-5 text-white text-center justify-content-center">
					<div class="col-md-8">
						<h3 class="text-uppercase display-4 py-4 fw-bold">Who We Are</h3>
						<p>When we look at the current landscape of gender-based violence, we see proof that the justice system isn't always just.</p>
						<p class="text-uppercase display-6 py-4 fw-bold">And from there, we see solutions.</p>
						<p>We are BWJP: a collective of national policy and practice centers at the intersection of gender-based violence and legal systems. If you're looking for resources, training, consultations or research, then you're in the right place.</p>
					</div>
				</div>
			</section>
			<section class="national-gun-violence bg-info">
				<div class="row py-5">
					<div class="col-12">
						<h3 class="fw-bold display-4 text-center">NATIONAL GUN VIOLENCE</h3>
						<div class="d-flex justify-content-center">
							<img src="/wp-content/uploads/2022/06/Screen-Shot-2022-06-06-at-6.47.00-PM.png" alt="">
						</div>
							
					</div>
				</div>
			</section>
			
			<?php get_template_part('template-parts/acf','main'); ?>
		</div>
	</main><!-- #main -->
</div><!-- #content -->

<?php
get_footer();
