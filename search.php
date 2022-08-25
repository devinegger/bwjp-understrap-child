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

	<?php if ( have_posts() ) : ?>
		
		<div class="container-fluid">
			<div class="row search-nav bg-primary text-white">
				<div class="col">
					<div class="container-fluid p-0">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#" data-target="our-work">Our Work</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" data-target="resources">Resources</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" data-target="articles">Articles</a>
							</li>
						</ul>
					</div>
				</div>
			</div><!-- .search-nav -->
		</div>

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

		endwhile;
		?>

		<div class="container search-results" id="content" tabindex="-1">
			<div class="row our-work results active">
				<h2 class="visually-hidden">Our Work</h2>
				<?php if($our_work_posts): ?>
					<?php foreach($our_work_posts as $our_work_post) : ?>
						<div class="col-md-6 col-lg-4 p-3">
							<div class="article text-info p-3" style="background-color: #C6D2DB;">
								<h3 class="text-uppercase"><a href="<?= get_the_permalink($our_work_post->ID); ?>"><?= $our_work_post->post_title ?></a></h3>
								<?= get_the_author_meta('display_name',$our_work_post->post_author) . " | " . get_the_date('F d Y', $our_work_post->ID ) ?>
								<p><?= $our_work_post->post_excerpt ?></p>
								<?php $article_tags = get_the_tags($our_work_post->ID); ?>
								<span class="text-uppercase">TAGS: 
									<?php foreach($article_tags as $tag): ?>
										<?= '#' . $tag->name . ' ' ?>
									<?php endforeach; ?>
								</span>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="p-5">No results for Our Work, check Resources or Articles tabs</p>
				<?php endif; ?>
			</div>

			<div class="row resources results">
				<h2 class="visually-hidden">Resources</h2>
				<?php if($resource_posts): ?>
					<?php foreach($resource_posts as $resource_post) : ?>
						<div class="col-md-6 col-lg-4 p-3">
							<div class="article text-info p-3" style="background-color: #C6D2DB;">
								<h3 class="text-uppercase"><a href="<?= get_the_permalink($resource_post->ID); ?>"><?= $resource_post->post_title ?></a></h3>
								<?= get_the_author_meta('display_name',$resource_post->post_author) . " | " . get_the_date('F d Y', $resource_post->ID ) ?>
								<p><?= $resource_post->post_excerpt ?></p>
								<?php $article_tags = get_the_tags($resource_post->ID); ?>
								<span class="text-uppercase">TAGS: 
									<?php foreach($article_tags as $tag): ?>
										<?= '#' . $tag->name . ' ' ?>
									<?php endforeach; ?>
								</span>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="p-5">No results for Resources, check Our Work or Articles tabs</p>
				<?php endif; ?>
			</div>

			<div class="row articles results">
				<h2 class="visually-hidden">Articles</h2>
				<?php if($article_posts): ?>
					<?php foreach($article_posts as $article_post) : ?>
						<div class="col-md-6 col-lg-4 p-3">
							<div class="article text-info p-3" style="background-color: #C6D2DB;">
								<h3 class="text-uppercase"><a href="<?= get_the_permalink($article_post->ID); ?>"><?= $article_post->post_title ?></a></h3>
								<?= get_the_author_meta('display_name',$article_post->post_author) . " | " . get_the_date('F d Y', $article_post->ID ) ?>
								<p><?= $article_post->post_excerpt ?></p>
								<?php $article_tags = get_the_tags($article_post->ID); ?>
								<span class="text-uppercase">TAGS: 
									<?php foreach($article_tags as $tag): ?>
										<?= '#' . $tag->name . ' ' ?>
									<?php endforeach; ?>
								</span>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="p-5">No results for Articles, check Our Work or Resources tabs</p>
				<?php endif; ?>
			</div>
		</div><!-- #content -->

	<?php else : ?>

		<div class="container p-5">
			<?php get_template_part( 'loop-templates/content', 'none' ); ?>
		</div>

	<?php endif; ?>

</main><!-- #main -->

<?php
get_footer();
