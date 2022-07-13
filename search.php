<?php
/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$our_work_posts = array();
$resource_posts = array();
$article_posts = array();


?>
<main class="site-main" id="main">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			<div class="col-12">	
				Search: <?php get_search_form(); ?>
			</div>

			<div class="col-12">
				
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h2 class="page-title">
							<?php
							printf(
								/* translators: %s: query term */
								esc_html__( 'Search Results for: %s', 'understrap' ),
								'<span>' . get_search_query() . '</span>'
							);
							?>
						</h2>
					</header><!-- .page-header -->

					<?php
					while ( have_posts() ) : the_post();

						switch(get_post_type()) {
							case "post":
								$article_posts[] = $post;
								break;
							case "page":
								$our_work_posts[] = $post;
								break;
							case "site-resources":
								$resource_posts[] = $post;
								break;
						}
									
							// get_template_part( 'loop-templates/content', 'search' );

					endwhile;
					?>

					<div class="container-fluid" id="search-results">
						<div class="row">
							<h3>Resources</h3>
							<?php foreach($resource_posts as $resource_post) : ?>
								<?php setup_postdata($resource_post); ?>
								<div class="col-md-4 p-3">
									<div class="article text-info p-3" style="background-color: #C6D2DB;">
										<h3 class="text-uppercase"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h3>
										<?php understrap_posted_on(); ?>
										<p><?= wp_trim_words(get_the_content(), 20); ?></p>
										<?php $article_tags = get_the_tags($post->ID); ?>
										<span class="text-uppercase">TAGS: 
											<?php foreach($article_tags as $tag): ?>
												<?= '#' . $tag->name . ' ' ?>
											<?php endforeach; ?>
										</span>
									</div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
							<?php understrap_pagination(); ?>
						</div>
						<div class="row">
							<h3>Articles</h3>
							<?php foreach($article_posts as $article_post) : ?>
								<?php setup_postdata($article_post); ?>
								<div class="col-md-4 p-3">
									<div class="article text-info p-3" style="background-color: #C6D2DB;">
										<h3 class="text-uppercase"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h3>
										<?php understrap_posted_on(); ?>
										<p><?= wp_trim_words(get_the_content(), 20); ?></p>
										<?php $article_tags = get_the_tags($post->ID); ?>
										<span class="text-uppercase">TAGS: 
											<?php foreach($article_tags as $tag): ?>
												<?= '#' . $tag->name . ' ' ?>
											<?php endforeach; ?>
										</span>
									</div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
							<?php understrap_pagination(); ?>
						</div>
						<div class="row">
							<h3>Our Work</h3>
							<?php foreach($our_work_posts as $our_work_post) : ?>
								<?php setup_postdata($our_work_post); ?>
								<div class="col-md-4 p-3">
									<div class="article text-info p-3" style="background-color: #C6D2DB;">
										<h3 class="text-uppercase"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h3>
										<?php understrap_posted_on(); ?>
										<p><?= wp_trim_words(get_the_content(), 20); ?></p>
										<?php $article_tags = get_the_tags($post->ID); ?>
										<span class="text-uppercase">TAGS: 
											<?php foreach($article_tags as $tag): ?>
												<?= '#' . $tag->name . ' ' ?>
											<?php endforeach; ?>
										</span>
									</div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
							<?php understrap_pagination(); ?>
						</div>
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			

			<!-- The pagination component -->
			

		</div><!-- .row -->

	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
