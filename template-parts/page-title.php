<?php

/**
 * Template Part for displaying Page Title  
 */

$title_bg_color = get_field('title_background_color');

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
                            <?php if(is_home()): ?>
                                <h1 class="entry-title text-uppercase display-4 fw-bold">Articles</h1>
                            <?php else: ?>
                                <h1 class="entry-title text-uppercase display-4"><span class="fw-bold"><?= $title_split[0] ?></span> <?= $title_split[1] ?></h1> <?php ?>
                            <?php endif; ?>
                            <div class="breadcrumbs">
                                <span class="crumb"><a href="/">Home</a></span>/<span class="crumb"><?php the_title() ?></span>
                            </div>
                        </div>
                    </div>
                </header><!-- .entry-header -->
            </div>
        </div>
    </div>
</section>