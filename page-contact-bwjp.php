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
<main class="site-main" id="main">
	<div class="container" id="content">
		<div class="row py-5">
			<div class="col-md-8">
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
			<div class="col-md-4">
				<div class="message border p-3 text-center mb-5">
					<p>A message to Domestic Violence Victims and Survivors: </p>
					<a href="#" class="btn btn-dark">FIND HELP HERE</a>
				</div>
				<div class="info border p-3">
					<h5>BWJP Headquarters</h5>
					<p>540 Fairview Ave N. Suite 208
					<br/>St. Paul, MN 55104
					<br/>(612) 824-8768
					<br/>(800) 903-0111 ext. 1 (TTY Callers: Use 711)</p>
					<h5>National Center on Protection Orders and Full Faith & Credit</h5>
					<p>(800) 903-0111 ext.2 ncffc@bwjp.org</p>
					<h5>National Defense Center for Criminalized Survivors</h5>
					<p>(800) 903-0111 ext. 3</p>
				</div>
			</div>
		</div>
		<div class="row py-5 justify-content-center">
			<div class="col-md-10">
				<div class="contact-form border p-3">
					<?= do_shortcode( '[wpforms id="59" title="false"]' ); ?>
				</div>
			</div>
		</div>
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
