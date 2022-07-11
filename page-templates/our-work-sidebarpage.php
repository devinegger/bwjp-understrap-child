<?php
/**
 * Template Name: Our Work Sidebar Layout
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container-fluid" id="content">
	<div class="row">
		<?php get_template_part( 'sidebar-templates/our-work', 'sidebar' ); ?>

		<div class="col-md-8 content-area text-info p-0">
			<main class="site-main p-5" id="main" role="main">


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

			</main><!-- #main -->
			<div class="content-bottom bg-primary">
				<div class="content-tools bg-info text-white">
					<h3>TOOLS</h3>
					<?= the_field('tools_content');  ?> 
				</div>
			</div>
		</div><!-- .content-area -->
	</div><!-- .row -->
	<div class="row">
		<div class="col-12 p-0">
			<?php get_template_part('template-parts/acf','main'); ?>
		</div>
	</div><!-- .row -->
</div><!-- #content -->

<?php
get_footer();
