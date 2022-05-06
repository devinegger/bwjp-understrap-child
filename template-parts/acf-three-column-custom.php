<?php 

/** 
 * Template Part for displaying ACF - Three Column Custom
 */

$headline = get_sub_field('headline');

// array of columns
$custom_columns = get_sub_field('custom_columns'); 

?>

<div class="row py-3">
    <h3><?= $headline ?></h3>

    <?php foreach($custom_columns as $custom_column) : ?>
        <?php $image_arr = $custom_column['image']; ?>      
        <?php $image_ID = $image_arr['ID']; ?>  
        <?php $image_url = $image_arr['url']; ?>  
        <?php $image_alt = $image_arr['alt']; ?>  
        <?php $image = wp_get_attachment_image( $image_ID, 'full', array('src' => $image_url, 'alt' => $image_alt ) ); ?>
        <?php $title = $custom_column['title']; ?>
        <?php $content = $custom_column['content']; ?>

    <div class="col-md-4">
        <div class="card">
            <?= $image ?>
            <div class="card-body">
                <h5 class="card-title"><?= $title ?></h5>
                <p class="card-text"><?= $content ?></p>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
</div>