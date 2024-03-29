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

?>
<main class="site-main search-page" id="main" style="background-color: <?= $page_bg_color['value'] ?>;">
	<div class="container-fluid <?= $content_class ?>" id="content">
		<div class="row py-5 justify-content-center">
			<div class="col-12">
				<div class="container">
					<p>Search for a term using the form below:</p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
