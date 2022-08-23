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

$sidebar_content = get_field('sidebar_content');

$image_arr = get_field('sidebar_image');
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'partnership-image img-fluid', 'alt'=>$image_alt) );

?>
<div class="col-md-4 p-0 widget-area bg-info text-white" id="our-work-sidebar">
	<aside class="h-100 d-flex flex-column" role="complimentary">
		<div class="mb-3 mx-lg-5 p-5">
			<?= $sidebar_content ?>
		</div>
		<div class="sidebar-image mt-auto d-none d-lg-block">
			<?= $image; ?>
		</div>
	</aside>
</div>