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

?>

<div id="content" tabindex="-1">
	<main class="site-main" id="main">
		<div class="container">
			<?php get_template_part('template-parts/acf','main'); ?>
		</div>
	</main><!-- #main -->
</div><!-- #content -->

<?php
get_footer();
