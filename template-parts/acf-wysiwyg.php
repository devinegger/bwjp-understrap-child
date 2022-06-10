<?php 

/** 
 * Template Part for displaying ACF - WYSIWYG
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

$content = get_sub_field('content');
$headline = get_sub_field('headline');

?>


<section class="wysiwyg" style="background-color: <?= $bg_color; ?> ;">
    <div class="container">
        <div class="row d-flex align-items-center py-5">
            <div class="col-12 <?= $content_class ?>">
                <h3 class="fw-bold text-uppercase"><?= $headline; ?></h3>
                <p style="color: <?= $text_color ?> ;"><?= $content ?></p>
            </div>
        </div>
    </div>
</section>