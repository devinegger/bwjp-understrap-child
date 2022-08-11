<?php
/**
 * The sidebar for Article Archive pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_years = get_post_years();
$all_tags = get_tags();

?>

<div class="col-md-3 widget-area bg-info p-3 text-white" id="archive-sidebar">
	<aside role="complimentary">
		<div class="sidebar-search mb-3">
			<?php get_search_form(); ?>
		</div>
		<h4 class="text-white text-uppercase">Filter by Tag</h4>
		<ul class="tag-list">
			<?php foreach($all_tags as $single_tag): ?>
				<li class="single-tag"><a class="text-decoration-none text-white text-uppercase" href="<?= get_term_link($single_tag); ?>"># <?= $single_tag->name ?></a></li>
			<?php endforeach; ?>
		</ul>
							
		<h4 class="text-white text-uppercase">Filter by Date</h4>
		<ul class="date-list">
			<?php foreach($post_years as $year) : ?>
				<li class="single-year"><a class="text-decoration-none text-white text-uppercase" href="<?= get_year_link($year); ?>"><?= $year ?></a></li>
			<?php endforeach; ?>
		</ul>
	</aside>
</div><!-- #articles-sidebar -->