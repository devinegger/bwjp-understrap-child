<?php
/**
 * The blog single template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$current_post_id = get_the_ID();

$post_years = get_post_years();
$all_tags = get_tags();

$article_tags = get_the_tags($current_post_id);

// get_related posts is custom function for pulling 3 posts with related slug
// we're using the first slug for this, but can be any slug
$related_posts = get_related_posts($article_tags[0]->slug);

$image_id = get_post_thumbnail_id( $current_post_id ); 
$image_url = get_the_post_thumbnail_url( $current_post_id, 'full' ); 
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); 

$image = wp_get_attachment_image( $image_id, 'full', FALSE, array('src'=>$image_url, 'class'=> 'img-fluid w-100', 'alt'=>$image_alt) ); 

?>

	
	<main class="site-main" id="main">
		<div class="container-fluid" id="content" tabindex="-1">
			<div class="row article-featured-image">
				<div class="col-12 p-0" style="max-height: 400px; overflow-y: hidden;">
					<?= $image ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 widget-area bg-info p-3 text-white" id="single-sidebar">
					<h3 class="text-uppercase">Related Articles</h3>
					<?php foreach($related_posts as $post): ?>
						<?php setup_postdata( $post ) ?>
						<div class="article text-info p-3 mb-4" style="background-color: #C6D2DB;">
							<h4 class="text-uppercase"><a href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a></h4>
							<?php understrap_posted_on(); ?>
							<p><?= wp_trim_words(get_the_content(), 20); ?></p>
							<?php $article_tags = get_the_tags($post->ID); ?>
							<span class="text-uppercase">TAGS: 
								<?php foreach($article_tags as $tag): ?>
									<?= '#' . $tag->name . ' ' ?>
								<?php endforeach; ?>
							</span>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div><!-- #articles-sidebar -->
				<div class="col-md-9">
					<div class="article text-info p-3">
						<h2 class="text-uppercase"><?= get_the_title(); ?></h2>
						<?php understrap_posted_on(); ?>
						<p><?= get_the_content(); ?></p>
						<span class="text-uppercase">TAGS:
							<?php foreach($article_tags as $tag): ?>
								<?= '#' . $tag->name . ' ' ?>
							<?php endforeach; ?>
						</span>
					</div>
				</div> <!-- .col -->
			</div><!-- .row -->
		</div><!-- #content -->
	</main><!-- #main -->

<?php

get_footer();
