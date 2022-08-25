<?php

/** 
 * Template part for displaying featured posts
 */

$headline = get_sub_field('headline');
$resources = get_sub_field('selected_resources');

?>


<section class="featured-resources">
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col-12">
                <div class="container-fluid px-5">
                    <div class="slidein-left-effect title-parent mx-0 mx-lg-5">
                        <h3 class="text-info fw-bold display-5 text-uppercase d-inline-block"><?= $headline; ?></h3>
                    </div>
                </div>
                <div class="container-fluid ps-3">
                    <div class="row mx-0 mx-lg-5">
                        <?php foreach($resources as $resource) : ?>
                            <?php $resource_object = $resource['resource']; ?>
                            <?php $image_url = get_the_post_thumbnail_url( $resource_object->ID, 'full' ); ?>

                                            

                        <div class="col-sm-6 col-lg-3 item-column mb-3">
                            <div class="column-overlay d-flex h-100 align-items-center" style="background-image: url('<?= get_the_post_thumbnail_url( $resource_object->ID, 'full' ) ?>');">
                                <div class="over">
                                    <h4 class="text-white text-center"><?= $resource_object->post_title ?></h4>
                                </div>
                                <div class="under">
                                    <p class="fs-6"><?= wp_trim_words( $resource_object->post_content, 10, '' ) ?></p>
                                    <span class="visually-hidden">Select to learn more about <?= $resource_object->post_title ?></span>
                                    <a href="<?= get_permalink($resource_object->ID) ?>" class="btn" style="line-height: 1.5rem;">Learn More</a>
                                </div>
                            </div>
                        </div>
                                        
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>