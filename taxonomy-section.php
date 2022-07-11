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

$image_arr = get_field('section_image','category_'.$current_section_id);
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'img-fluid', 'alt'=>$image_alt) );


$sections = get_terms( array( 
	'taxonomy' => 'section',
    'hide_empty' => false
) );



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
			<div class="col-md-3 p-5 text-white" style="background-color: #000a66;">
				<ul class="sections-list">

					<?php foreach($sections as $section) : ?>

						<?php $name = $section->name; ?>
						<?php $slug = $section->slug; ?>

						<li><a class="text-white text-uppercase text-decoration-none" href="/section/<?= $slug ?>"><?= $name ?> ></a></li>

					<?php endforeach; ?>

				</ul>
			</div>
			<div class="col-md-9 bg-white">
				<div class="row">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()): the_post(); ?>
							<div class="col-md-6 p-3">
								<div class="section-resources text-info p-3" style="background-color: #C6D2DB;">
									<h3 class="text-uppercase"><?= the_title(); ?></h3>
									<?php understrap_posted_on(); ?>
									<p><?= wp_trim_words(get_the_content(), 20); ?></p>
									<?php $resource_tags = get_the_tags(); ?>
									<span class="text-uppercase">TAGS: 
										<?php foreach($resource_tags as $tag): ?>
											<?= '#' . $tag->name . ' ' ?>
										<?php endforeach; ?>
									</span>
								</div>
							</div>
						<?php endwhile; ?>
						<?php understrap_pagination(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- .row -->
	</div><!-- #content -->
</main><!-- #main -->

<?php
get_footer();
