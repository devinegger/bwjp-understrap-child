<?php 

/** 
 * Template Part for displaying ACF - WYSIWYG
 */

// background color
$bg_color = get_sub_field('background_color');
$text_color = get_sub_field('text_color');
$content = get_sub_field('content');

// set class based on text color
$content_class = "text";
if ($text_color['label'] === "Blue") {
    $content_class .= "-info";
} elseif ($text_color === "White") {
    $content_class .= "-white";
}

?>


<section class="shortcode-full" style="background-color: <?= $bg_color['value']; ?> ;">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 <?= $content_class ?>">
                <?php if($content) : ?>
                    <?= $content ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>