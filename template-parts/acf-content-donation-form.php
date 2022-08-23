<?php 

/** 
 * Template Part for displaying ACF - Donation Form Content
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

// headline and content
$headline = get_sub_field('headline');
$content = get_sub_field('content');

?>

<section class="left-right-image-content" style="background-color: <?= $bg_color; ?> ;">
    <div class="container-fluid p-5">
        <div class="row d-flex align-items-center px-0 px-lg-5 py-5">
            <div class="col-md-6 p-3 <?= $content_class ?>">
                <?php if($headline) : ?>
                    <h3 class="fw-bold text-uppercase mb-5" style="color: <?= $text_color ?> ;"><?= $headline ?></h3>
                <?php endif; ?>
                <p style="color: <?= $text_color ?> ;"><?= $content ?></p>
            </div>
            <div class="col-md-6 p-3">
                <div class="donation-form border p-3">
                    <h3 class="fw-bold text-uppercase text-white text-center">Make A Secure Donation</h3>
                    <?php echo apply_shortcodes('[mittun_non_classy id="463"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>