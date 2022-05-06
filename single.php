<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="single-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

		<main class="site-main" id="main">
			
			<div class="row px-5">

				<div class="col-md-8">
					<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'loop-templates/content', 'single' );
							understrap_post_nav();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}
					?>
				</div>
				<div class="col-md-4 widget-area border p-4" id="right-sidebar">
					<h3>Related Posts</h3>
				</div>

			</div><!-- .row -->

		</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
