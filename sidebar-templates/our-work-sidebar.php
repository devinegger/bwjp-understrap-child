<?php
/**
 * The sidebar for Our Work pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'our-work-sidebar' ) ) {
	return;
}

$image_arr = get_field('sidebar_image');
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'partnership-image img-fluid', 'alt'=>$image_alt) );

?>

<div class="col-md-4 p-0 widget-area bg-info text-white" id="our-work-sidebar">
	<div class="mb-3 p-5">
		<?php dynamic_sidebar( 'our-work-sidebar' ); ?>
	</div>
	<div class="sidebar-image">
		<?= $image; ?>
	</div>
	
</div><!-- #left-sidebar -->
