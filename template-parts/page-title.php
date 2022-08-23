<?php

/**
 * Template Part for displaying Page Title  
 */

$title = get_the_title();
$title_split = explode(" ", $title, 2); // split title so that first word can be bolded

$parent_id = wp_get_post_parent_id( $post->ID );
$parent_title = get_the_title($parent_id);
$parent_url = get_permalink($parent_id);

$page_title = '';
$page_crumb = '';
$parent_crumb = '';


if(is_tax('section')) {
    $title_bg_color = '#000F9F'; // Blue
    $page_title = "Resources";
    $page_crumb = get_the_archive_title();
    $parent_crumb = "Resources"; 
} elseif(is_single() && get_post_type( get_the_ID()) === 'site-resources') {
    $title_bg_color = '#000F9F'; // Blue
    $page_title = "Resources";
    $page_crumb = get_the_title();
    $parent_crumb = "Resources";
} elseif(is_home()) {
    $title_bg_color = "#FF4D00"; // Orange
    $page_title = "Articles";
    $page_crumb = "Articles";
    $parent_crumb = "News";
} elseif(is_archive() || is_single() || is_date()) {
    $title_bg_color = "#FF4D00"; // Orange
    $page_title = "Articles";
    $page_crumb =  get_the_title();
    $parent_crumb = 'News / <a href="/articles/">Articles</a>';
} elseif(is_singular() && $post->post_name === 'search') {
    $title_bg_color = '#6938E6'; // Purple
    $page_title = "Search";
    $page_crumb = "Search";
    $parent_crumb = "";  
} elseif(is_search()) {
    $title_bg_color = "#6938E6"; // Purple 
    $page_title = "Search Results";
    $parent_title = "";
    $parent_crumb = "";
} else {
    $title_bg_color = get_field('title_background_color');
    $page_title = get_the_title();
    $page_crumb = get_the_title();
    $parent_crumb = $parent_title;
}

// don't display parent crumb if it is the sam as page cruumb
if ($parent_crumb === $page_crumb) { $parent_crumb = ''; }


 
?>

<section id="page-title"  style="background-color: <?= $title_bg_color; ?> ;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0 px-lg-5">
                <header class="entry-header">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container-fluid text-start text-light p-5">
                            <h1 class="entry-title text-uppercase display-4 fw-bold"><?= $page_title ?></h1>

                            <?php if(is_search()): ?>
                                <?php if(have_posts()) :?>
                                    <!-- display search resutls instead of breadcrumbs -->
                                    <?php
                                    printf(
                                        /* translators: %s: query term */
                                        esc_html__( 'Search Results for: %s', 'understrap' ),
                                        '<span>' . get_search_query() . '</span>'
                                    );
                                    ?>
                                <?php endif; ?>
                                <?php get_search_form(); ?>
                            <?php else: ?>
                                <div class="breadcrumbs">
                                    <a href="/">Home</a> / <?= $parent_crumb !== "" ? '<span class="parent-crumb">' . $parent_crumb . '</span> / ' : "" ?> <span class="crumb"><?= $page_crumb ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </header><!-- .entry-header -->
            </div>
        </div>
    </div>
</section>