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

<div class="container" id="content">
	<div class="row py-5 justify-content-center">
		<div class="col-md-10">
			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

				<?php get_template_part('template-parts/acf','main'); ?>

				<!--
				<h3>Recent news worth celebrating</h3>
				<div class="row py-3">
					<div class="col-md-3">
						<img class="h-100" src="/wp-content/uploads/2022/04/cb307e4d-b902-31cc-9dc1-77d3eddd6233.jpg" alt="" height="180" width="180" />
					</div>
					<div class="col-md-9">
						<h4>Article</h4>
						<p>Date | Author</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cursus eget nunc scelerisque viverra.</p>
						<p>Tags: #BAILREFORM #SURVIVORS #NEWS</p>
					</div>
				</div>

				<div class="row py-3">
					<div class="col-md-3">
						<img class="h-100" src="/wp-content/uploads/2022/04/cb307e4d-b902-31cc-9dc1-77d3eddd6233.jpg" alt="" height="180" width="180" >
					</div>
					<div class="col-md-9">
						<h4>Article</h4>
						<p>Date | Author</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cursus eget nunc scelerisque viverra.</p>
						<p>Tags: #BAILREFORM #SURVIVORS #NEWS</p>
					</div>
				</div>
				-->

			</main><!-- #main -->
		</div>
	</div>
</div><!-- #content -->


<?php
get_footer();
