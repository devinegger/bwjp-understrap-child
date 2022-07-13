<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

// get this current section(category)s ID
$current_section = get_queried_object();
$current_section_id = $current_section->term_id;

$related_resource = get_field('related_resource');

$vimeo_url = get_field('vimeo_url');

$image_arr = get_field('section_image','category_'.$current_section_id);
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'img-fluid', 'alt'=>$image_alt) );

?>

<main class="site-main resource-sections" id="main" style="background-color: #000F9F;">
	<div class="container-fluid" id="content">
		<div class="row pt-5 justify-content-center text-white">
			<div class="col-md-7 p-0">
				<?= $image; ?>
			</div>
			<div class="col-md-5 px-5">
				<h2 class="text-uppercase"><?php echo single_cat_title('' , true ); ?></h2>
				<?php echo category_description(); ?>
			</div>
		</div>
		<div class="row">
			<?php get_template_part('sidebar-templates/sections','sidebar'); ?>
			<div class="col-md-9 bg-white">
				<div class="section-resources text-info p-3">
					<h3 class="text-uppercase"><?= the_title(); ?></h3>
					<?php understrap_posted_on(); ?>
					<?php the_content(); ?>

					<?php if($related_resource): ?>
						<a href="<?= $related_resource['url'] ?>" target="_blank">Download <?= $related_resource['filename'] ?></a>
					<?php endif; ?>

					<?php if($vimeo_url) : ?>
						<?php $vimeo_video_id = substr($vimeo_url, -9); ?>
						<?php $vimeo_embed_url = "https://player.vimeo.com/video/".$vimeo_video_id."?h=b0b4985b82"; ?>
						<iframe src="<?= $vimeo_embed_url ?>" width="640" height="313" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
					<?php endif; ?>
					
					<?php $resource_tags = get_the_tags(); ?>
					<div class="resource-tags">
						<span class="text-uppercase">TAGS: 
							<?php foreach($resource_tags as $tag): ?>
								<?= '#' . $tag->name . ' ' ?>
							<?php endforeach; ?>
						</span>
					</div>
				</div>
			</div>
		</div><!-- .row -->
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
