<?php
/**
 * The blog archive template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$post_years = get_post_years();
$all_tags = get_tags();

$posts_page_id = get_option('page_for_posts');
$featured_article = get_field('featured', $posts_page_id); 

$featured_article_ID = $featured_article->ID; 
$featured_article_url = get_post_permalink($featured_article); 

$image_id = get_post_thumbnail_id( $featured_article_ID ); 
$image_url = get_the_post_thumbnail_url( $featured_article_ID, 'full' ); 
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); 

$image = wp_get_attachment_image( $image_id, 'full', FALSE, array('src'=>$image_url, 'class'=> 'img-fluid w-100', 'alt'=>$image_alt) ); 
$title = $featured_article->post_title; 
$content = $featured_article->post_excerpt; 

?>
	<main class="site-main" id="main">
		<div class="container-fluid" id="content" tabindex="-1">
			<div class="row featured-article">
				<div class="col-md-7 p-0">
					<?= $image ?>
				</div>
				<div class="col-md-5 text-white" style="background-color: #FF4D00;">
					<h2><?= $title ?></h2>
					<p><?php understrap_posted_on(); ?></p>
					<p><?= $content ?></p>
					<?php 
						$tags = get_the_tags($featured_article_ID); 
					?>
					<p>Tags: 
						<?php foreach($tags as $tag) : ?>
							<?= $tag->name ?>
						<?php endforeach; ?>
						
					</p>
				</div>
			</div>
			<div class="row">
				<?php get_template_part( 'sidebar-templates/archive', 'sidebar' ); ?>
				<div class="col-md-9 order-2"> 
				<!-- displaying first to run though posts to get oldest year -->
					<div class="row">
						<?php if(have_posts()) : ?>
							<?php while(have_posts()): the_post(); ?>
								<?php 
									$posted_on_year = get_the_date('Y');
									if($posted_on_year<$oldest_post_year) {
										$oldest_post_year=$posted_on_year;
									}
								?>
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
					</div>
				</div> <!-- .col -->
			</div><!-- .row -->
		</div><!-- #content -->
	</main><!-- #main -->

<?php
get_footer();
