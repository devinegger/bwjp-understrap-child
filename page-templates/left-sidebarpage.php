<?php
/**
 * Template Name: Left Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container-fluid" id="content">
	
	
	<div class="row py-3">
		<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

		<div class="<?php echo is_active_sidebar( 'right-sidebar' ) ? 'col-md-8' : 'col-md-12'; ?> content-area p-3 pt-0" id="primary">

			<main class="site-main" id="main" role="main">

				<div class="row pb-3">
					<div class="col">
						<strong>Search results for "[gender-based violence]" in "[webinars]"</strong>
					</div>
				</div>
				<div class="row py-3">
					<div class="col">
						<div class="filters d-flex flex-row justify-content-end">
							<span>Filter by: [year]</span><span class="ps-4">Sort by: [Newest First, Oldest First]</span>
						</div>
					</div>
				</div>


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

				<div class="row">
					<div class="col-md-4">
						<div class="resource-box border px-2 pt-5">
							<h3>Resource Title</h3>
							<span>Date</span>
							<p>Publishing Org</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="resource-box border px-2 pt-5">
							<h3>Resource Title</h3>
							<span>Date</span>
							<p>Publishing Org</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="resource-box border px-2 pt-5">
							<h3>Resource Title</h3>
							<span>Date</span>
							<p>Publishing Org</p>
						</div>
					</div>
				</div>

				<hr>

				<div class="row py-3">
					<div class="col">
						<h3>Resource Title</h3>
						<p>Date</p>
						<p>Publishing Org</p>
						<p>[Resource content to load here]</p>
						<p>This webinar is part one of a three-part professional development series for community-based advocates, attorneys who work with victims of battering, and anyone interested in learning more about victims of battering charged with crimes. Facilitated by Cindene Pezzell, Legal Director at the National Clearinghouse for the Defense of Battered Women, participants will learn more about how victims of battering and abuse end up in the legal system as defendants, the unique challenges and risks faced by victim defendants, and the difficulties experienced by victim defendants who seek assistance from victim service organizations.</p>
					</div>
				</div>
				

				<div class="row py-3">
					<div class="col">
						<h4>[Name of National Center]</h4>
						<p>Tellus cras adipiscing enim eu turpis. Lorem ipsum dolor sit amet consectetur adipiscing. At tempor commodo ullamcorper a lacus vestibulum sed arcu.</p>
					</div>
				</div>
				<hr>
				<div class="row py-3">
					<div class="col">
						<h4>[Name of National Center]</h4>
						<p>Tellus cras adipiscing enim eu turpis. Lorem ipsum dolor sit amet consectetur adipiscing. At tempor commodo ullamcorper a lacus vestibulum sed arcu.</p>
					</div>
				</div>

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- #content -->

<?php
get_footer();
