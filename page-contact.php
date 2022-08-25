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

$sidebar_content = get_field('contact_sidebar');

// map image array
$map_image_arr = get_field('map_image');

// break out image array
$map_image_ID = $map_image_arr['ID'];
$map_image_url = $map_image_arr['url'];
$map_image_alt = $map_image_alt['alt'];

// create HTML image
$map_image = wp_get_attachment_image( $map_image_ID, 'full', array('src' => $map_image_url, 'alt' => $map_image_alt, 'class' => 'img-fluid w-100' ) );

$page_bg_color = get_field('page_background_color');

$content_class = "text-";

if($page_bg_color['label'] === "White") {
	$content_class .= "info";
} else {
	$content_class .= "white";
}

?>
<main class="site-main contact-bwjp" id="main" style="background-color: <?= $page_bg_color['value'] ?>;">
	<div class="container-fluid <?= $content_class ?>" id="content">
		<div class="row">
			
			<div class="col-md-8">
				<div class="container p-5">
				
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
			<div class="col-md-4 contact-sidebar p-0 d-flex flex-column order-md-first" style="background-color: #19a5b4;">
				<div class="sidebar-content ps-3 p-2 ms-5 h-100">
					<?= $sidebar_content ?>
				</div>
				<?= $map_image ?>
			</div>
		</div>
		<div class="row" style="background-color: #19a5b4;">
			<div class="col-12 px-0 px-lg-5">
				<section class="contact-form text-info p-5">
					<h3 class="text-uppercase">Email us</h3>
					<?= apply_shortcodes( '[wpforms id="59" title="false"]', false ) ?>
				</section>
			</div>
		</div><!-- .row -->
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
