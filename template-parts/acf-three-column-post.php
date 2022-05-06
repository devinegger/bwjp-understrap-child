<?php 

/** 
 * Template Part for displaying ACF - Three Column Custom
 */

$headline = get_sub_field('headline');

// array of posts
$post_columns = get_sub_field('post_columns'); 

?>

<div class="row py-3">
    <h3><?= $headline ?></h3>

    <?php foreach($post_columns as $post_column) : ?>

        <?php $display_post = $post_column['display_post']; ?>
        <?php $display_post_ID = $display_post->ID; ?>
        <?php $display_post_url = get_post_permalink($display_post); ?>

        <?php $image = get_the_post_thumbnail($display_post_ID, 'full') ?>
        <?php $title = $display_post->post_title; ?>
        <?php $content = $display_post->post_excerpt; ?>

    <div class="col-md-4">
        <div class="card">
            <a class="text-decoration-none text-dark" href="<?= $display_post_url ?>">
                <?= $image ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $title ?></h5>
                    <p class="card-text"><?= $content ?></p>
                </div>
            </a>
        </div>
    </div>

    <?php endforeach; ?>
</div>