<?php
/**
 * The blog archive template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$posts_page_id = get_option('page_for_posts');

?>

<div class="wrapper" id="index-wrapper">
	<div class="container-fluid" id="content" tabindex="-1">
		<main class="site-main" id="main">

		<?php if(get_field('featured', $posts_page_id)) : ?>
			<?php $featured_article = get_field('featured', $posts_page_id); ?>

			<?php $featured_article_ID = $featured_article->ID; ?>
			<?php $featured_article_url = get_post_permalink($featured_article); ?>

			<?php $image = get_the_post_thumbnail($featured_article_ID, 'full') ?>
			<?php $title = $featured_article->post_title; ?>
			<?php $content = $featured_article->post_excerpt; ?>

			<div class="row px-5 py-3">
				<div class="col-md-6">
					<?= $image ?>
				</div>
				<div class="col-md-6">
					<h2><?= $title ?></h2>
					<p> Date | Author </p>
					<p><?= $content ?></p>
					<p>Tags: #BAILREFORM #SURVIVORS #NEWS</p>
				</div>
			</div>
		
		<?php endif; ?>

			<div class="row px-5">
				<div class="col-md-8">
					
					<!--
					<div class="row px-5 py-3">
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

					<div class="row px-5 py-3">
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

					<div class="row px-5 py-3">

						<?php
						if ( have_posts() ) {
							// Start the Loop.
							while ( have_posts() ) {
								the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'loop-templates/content');
							}
						} else {
							get_template_part( 'loop-templates/content', 'none' );
						}
						?>

						<!-- The pagination component -->
						<?php understrap_pagination(); ?>


					</div> <!-- .row -->
				</div> <!-- .col -->
				<div class="col-md-4 widget-area border p-4" id="left-sidebar">
					<div class="sidebar-search mb-3">
						<input />
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</div>
					<h4>Filter by Tag</h4>
					<h4>Filter by Date</h4>
					</div><!-- #left-sidebar -->
				</div><!-- .col -->
			</div><!-- .row -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #index-wrapper -->

<?php
get_footer();
