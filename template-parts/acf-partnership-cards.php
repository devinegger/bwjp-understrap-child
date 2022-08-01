<?php 

/** 
 * Template Part for displaying ACF - Partnership Cards
 */

$partnerships = get_sub_field('partnerships');

?>

<section class="partnership-cards bg-white">
    <div class="container">
        <div class="row py-5">
            <?php foreach($partnerships as $partnership) : ?>
                <?php $name = $partnership['name']; ?>
                <?php $image_arr = $partnership['image']; 
                    $image_ID = $image_arr['ID']; 
                    $image_URL = $image_arr['url']; 
                    $image_alt = $image_arr['alt']; 
                    $image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'partnership-image img-fluid', 'alt'=>$image_alt) ); ?>
            <div class="col-md-4 mb-4 px-lg-4 px-xl-5 slidein-left-effect">
                <div class="card h-100">
                    <div class="card-body bg-info text-white">
                        <div class="image-wrapper d-flex align-items-center justify-content-center bg-white w-100">
                            <?= $image ?>
                        </div>
                        <h5 class="card-title text-uppercase text-center fs-6 pt-3"><?= $name; ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

