<?php 

/** 
 * Template Part for displaying ACF - Headline with Image
 */

$headline = get_sub_field('headline');
$image_arr = get_sub_field('image');

$image_ID = $image_arr['ID'];
$image_url = $image_arr['url'];
$image_alt = $image_alt['alt'];

$image = wp_get_attachment_image( $image_ID, 'full', array('src' => $image_url, 'alt' => $image_alt ) );

?>


<section class="headline-image">
    <div class="row py-3">
        <div class="col">
            <h3><?= $headline ?></h3>
            <?= $image ?>
        </div>
    </div>
</section>