<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$post_years = get_post_years();
$all_tags = get_tags();

?>

<main class="site-main" id="main">
	<div class="container-fluid" id="content" tabindex="-1">
		<div class="row px-0 px-lg-5">
			<?php get_template_part( 'sidebar-templates/archive', 'sidebar' ); ?>
			<div class="col-md-9 order-2"> 
				<div class="row">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()): the_post(); ?>
							<div class="col-md-6 p-3">
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
						<?php endwhile; ?>
						<?php understrap_pagination(); ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div> <!-- .col -->
		</div><!-- .row -->
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
