<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

?>


<div class="col-md-4 widget-area border p-4" id="right-sidebar">

	<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
