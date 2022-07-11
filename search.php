<?php
/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


?>
<main class="site-main" id="main">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			Search: <?php get_search_form(); ?>

			<div class="col">
				
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
							printf(
								/* translators: %s: query term */
								esc_html__( 'Search Results for: %s', 'understrap' ),
								'<span>' . get_search_query() . '</span>'
							);
							?>
						</h1>
					</header><!-- .page-header -->
					<div class="container-fluid" id="search-results">
						<div class="row">

							<?php
							while ( have_posts() ) : the_post();
									
									get_template_part( 'loop-templates/content', 'search' );

							endwhile;
							?>
						</div>
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- .row -->

	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
