<?php
/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>


<div class="container" id="content">

	<div class="row py-5">

		<div class="<?php echo is_active_sidebar( 'right-sidebar' ) ? 'col-md-8' : 'col-md-12'; ?> content-area" id="primary">

			<main class="site-main" id="main" role="main">

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

		</div><!-- #primary -->

		<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

	</div><!-- .row -->

</div><!-- #content -->

<?php
get_footer();
