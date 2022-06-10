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

$page_bg_color = get_field('page_background_color');

?>
<main class="site-main" id="main" style="background-color: <?= $page_bg_color ?>;">
	<div class="container-fluid" id="content">
		<div class="row py-5 justify-content-center text-white">
			<div class="col-12">
				<div class="container">
				
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
				</div>
			</div>
		</div>
		<div class="container-fluid p-0">
			<div class="row justify-content-center">
				<div class="col-12 p-0">

					<?php get_template_part('template-parts/acf','main'); ?>

				</div>
			</div>
		</div>
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
