<?php

/**
 * Template Part for displaying Page Title  
 */
 
 ?>

<section id="page-title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <header class="entry-header">
                    <div class="jumbotron jumbotron-fluid bg-light border-top border-bottom">
                        <div class="container text-center py-5">

                            <?php if(is_home()): ?>
                                <h1 class="entry-title">Articles</h1>
                            <?php else: ?>
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </header><!-- .entry-header -->
            </div>
        </div>
    </div>
</section>