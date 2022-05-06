<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="entry-content">

	<?php
	the_content();
	understrap_link_pages();
	?>

</div><!-- .entry-content -->
