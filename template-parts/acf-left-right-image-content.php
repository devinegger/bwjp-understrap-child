<?php 

/** 
 * Template Part for displaying ACF - Left Right Image Content
 */

// background color
$bg_color = get_sub_field('background_color');

// text color
$text_color = get_sub_field('text_color');

// set class based on text color
$content_class = "text";
if ($text_color === "Blue") {
    $content_class .= "-info";
} elseif ($text_color === "White") {
    $content_class .= "-white";
}

// side image is on
$image_side = get_sub_field('image_side');

// image array
$image_arr = get_sub_field('image');

// break out image array
$image_ID = $image_arr['ID'];
$image_url = $image_arr['url'];
$image_alt = $image_alt['alt'];

// create HTML image
$image = wp_get_attachment_image( $image_ID, 'full', array('src' => $image_url, 'alt' => $image_alt ) );

// headline and content
$headline = get_sub_field('headline');
$content = get_sub_field('content');

// button array
$button_arr = get_sub_field('button');

if($button_arr) {
    // break out button array
    $button_url = $button_arr['url'];
    $button_title = $button_arr['title'];
    $button_target = $button_arr['target'];
}

// image class for right side image
$image_side === 'left' ? $image_class = '' : $image_class = 'order-md-2';

?>


<section class="left-right-image-content" style="background-color: <?= $bg_color; ?> ;">
    <div class="container">
        <div class="row d-flex align-items-center py-5">
            <div class="col-md-6 p-3 <?= $image_class ?>">
                <?= $image ?>
            </div>
            <div class="col-md-6 p-3 <?= $content_class ?>">
                <h3 class="fw-bold text-uppercase mb-5" style="color: <?= $text_color ?> ;"><?= $headline ?></h3>
                <p style="color: <?= $text_color ?> ;"><?= $content ?></p>
                <?php if($button_arr) : ?>
                    <a href="<?= $button_url ?>" class="btn btn-dark" target="<?= $button_target ?>"><?= $button_title ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>