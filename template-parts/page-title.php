<?php

/**
 * Template Part for displaying Page Title  
 */

$title_bg_color = get_field('title_background_color');
 
?>

<section id="page-title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <header class="entry-header">
                    <div class="jumbotron jumbotron-fluid border-top border-bottom" style="background-color: <?= $title_bg_color; ?> ;">
                        <div class="container text-start text-light py-5">

                            <?php if(is_home()): ?>
                                <h1 class="entry-title text-uppercase display-4 fw-bold">Articles</h1>
                            <?php else: ?>
                                <?php the_title( '<h1 class="entry-title text-uppercase display-4 fw-bold">', '</h1>' ); ?>
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