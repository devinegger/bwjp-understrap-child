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

$page_bg_color = get_field('page_background_color');

$content_class = "text-";

if($page_bg_color['label'] === "White") {
	$content_class .= "info";
} else {
	$content_class .= "white";
}

$marquee_images = get_field('marquee_images');

?>
<main class="site-main" id="main" style="background-color: <?= $page_bg_color['value'] ?>;">
	<div class="container-fluid p-0 <?= $content_class ?>" id="content">

		<?php if($marquee_images) :	?>

		<div class="row" id="image-marquee">
			<div class="col-md-7 p-0 marquee-left">
				<?php 
					$marquee_image_arr_1 = $marquee_images['marquee_image_1']; 
					$marquee_image_ID_1 = $marquee_image_arr_1['ID']; 
					$marquee_image_URL_1 = $marquee_image_arr_1['url']; 
					$marquee_image_alt_1 = $marquee_image_arr_1['alt']; 
					$marquee_image_1 = wp_get_attachment_image( $marquee_image_ID_1, 'full', FALSE, array('src'=>$marquee_image_URL_1, 'alt'=>$marquee_image_alt_1) ); 
				 ?>
				<?= $marquee_image_1 ?>
			</div>
			<div class="col-md-5 p-0 marquee-right">
				<?php 
					$marquee_image_arr_2 = $marquee_images['marquee_image_2']; 
					$marquee_image_ID_2 = $marquee_image_arr_2['ID']; 
					$marquee_image_URL_2 = $marquee_image_arr_2['url']; 
					$marquee_image_alt_2 = $marquee_image_arr_2['alt']; 
					$marquee_image_2 = wp_get_attachment_image( $marquee_image_ID_2, 'full', FALSE, array('src'=>$marquee_image_URL_2, 'alt'=>$marquee_image_alt_2) ); 
				 ?>
				<?= $marquee_image_2 ?>
			</div>
		</div>	

		<?php endif; ?>
		<div class="row p-5 justify-content-center">
			<div class="col-12">
				<div class="container-fluid px-0 px-lg-5">
				
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
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php get_template_part('template-parts/acf','main'); ?>
			</div>
		</div><!-- .row -->
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
