<?php 

/** 
 * Template Part for displaying ACF - Results Circles
 */

 $circle_data = get_sub_field('circle_data');

?>


<section class="results-circles">
    <div class="container-fluid p-5">
        <div class="row px-5">
            <?php foreach($circle_data as $circle) : ?>
            <div class="col-md-6 col-lg-4 p-5 p-md-3 p-lg-4">
                <div class="circle-container">
                    <div class="circle-outer">
                        <div class="circle-inner" style="position: relative;">
                            <div class="front">
                                <span class="display-5 fw-bold"><?= $circle['number']; ?></span>
                                <span class="fs-4 pt-3">[+]</span>
                            </div>
                             <div class="back d-none">
                                <span class="display-6 fw-bold"><?= $circle['number']; ?></span>
                                <p class="p-3 text-center"><?= $circle['content']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>