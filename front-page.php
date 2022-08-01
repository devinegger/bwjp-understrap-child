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
						<h2 class="text-uppercase text-light text-left display-3 headline"><span class="first-line slidein-right-effect d-inline-block">Changing Systems</span>
						<br/><span class="slidein-left-effect d-inline-block">Transforming Lives</span></h2>
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
					<div class="col-md-10">
						<?php the_field('intro_text', 'options'); ?>
					</div>
				</div>
			</section>
			<section class="national-gun-violence bg-info">
				<div class="row py-5 justify-content-center">
					<div class="col-10">
						<!-- commenting out non-accessible parts for now - DGE -->
						<div class="slidein-left-effect title-parent">
							<h3 class="fw-bold fs-1 text-white d-inline-block">NATIONAL GUN VIOLENCE</h3> <span class="disappear effect d-inline-block">NATIONAL GUN VIOLENCE</span>
						</div>
						<?php echo apply_shortcodes( '[mapsvg id="1"]', false ); ?>
					</div>
				</div>
			</section>
			
			<?php get_template_part('template-parts/acf','main'); ?>
		</div>
	</main><!-- #main -->
</div><!-- #content -->

<?php
get_footer();
