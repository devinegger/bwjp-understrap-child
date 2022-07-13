<?php

/**
 * Template Part for displaying Page Title  
 */


if(is_tax('section')) {
    $title_bg_color = '#000F9F'; // Blue
} elseif(is_single() && get_post_type( get_the_ID()) === 'site-resources') {
    $title_bg_color = '#000F9F'; // Blue
} elseif(is_home() || is_single() || is_archive() || is_date()) {
    $title_bg_color = "#FF4D00"; // Orange
} elseif(is_search()) {
    $title_bg_color = "#6938E6"; // Purple 
} else {
    $title_bg_color = get_field('title_background_color');
}


$title = get_the_title();
// split title so that first word can be bolded
$title_split = explode(" ", $title, 2);
 
?>

<section id="page-title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <header class="entry-header">
                    <div class="jumbotron jumbotron-fluid" style="background-color: <?= $title_bg_color; ?> ;">
                        <div class="container text-start text-light py-5">
                            <?php if(is_tax('section')) : ?>
                                <h1 class="entry-title text-uppercase display-4 fw-bold">Resources</h1>
                            <?php elseif(is_single() && get_post_type( get_the_ID()) === 'site-resources'): ?>
                                <h1 class="entry-title text-uppercase display-4 fw-bold">Resources</h1>
                            <?php elseif(is_home() || is_single() || is_date()): ?>
                                <h1 class="entry-title text-uppercase display-4 fw-bold">Articles</h1>
                            <?php elseif(is_search()): ?>
                                <h1 class="entry-title text-uppercase display-4 fw-bold">Search Results</h1>
                            <?php elseif(is_archive()):?>
                                <?php the_archive_title('<h1 class="entry-title text-uppercase display-4 fw-bold">','</h1>') ?>
                            <?php else: ?>
                                <h1 class="entry-title text-uppercase display-4"><span class="fw-bold"><?= $title_split[0] ?></span> <?= $title_split[1] ?></h1> <?php ?>
                            <?php endif; ?>
                            <div class="breadcrumbs">
                                <span class="crumb"><a href="/">Home</a></span>/<span class="crumb"><?= is_tax('section') ? single_cat_title('' , true ) : the_title() ?></span>
                            </div>
                        </div>
                    </div>
                </header><!-- .entry-header -->
            </div>
        </div>
    </div>
</section>