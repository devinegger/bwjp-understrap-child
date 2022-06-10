<?php

/** 
 * Template part for displaying featured posts
 */

$headline = get_sub_field('headline');

?>


<section class="featured-resources">
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col-12">
                <h3 class="text-info fw-bold display-5 text-center text-uppercase"><?= $headline; ?></h3>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row py-3 flex-nowrap overflow-scroll">
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-1.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-2.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-3.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-4.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-1.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-2.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-3.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 item-column">
                                    <div class="column-overlay d-flex h-100 align-items-center justify-content-center" style="background-image: url('/wp-content/uploads/2022/06/featured-resource-4.jpg');">
                                        <div class="over">
                                            <h4 class="text-white">Resource Title</h4>
                                        </div>
                                        <div class="under">
                                            <p>Excepteur sint occaecat cupidatat non proident.</p>
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>