<?php 

/** 
 * Template Part for displaying ACF - Masonry Posts
 */

// array of posts
$post_masons = get_sub_field('mason_posts'); 
$posts = 0;

?>

<div class="row d-flex my-5">

<?php foreach($post_masons as $post_mason) : ?>
    <?php $posts ++; ?>

    <?php $block_post = $post_mason['block_post']; ?>
    <?php $block_post_ID = $block_post->ID; ?>
    <?php $block_post_url = get_post_permalink($block_post); ?>

    <?php $image = get_the_post_thumbnail($block_post_ID, 'full') ?>
    <?php $title = $block_post->post_title; ?>
    <?php $content = $block_post->post_excerpt; ?>

    <?php if($posts === 1 ) :  ?>

        <div class="col-md-6">
            <div class="post-wrap p-3 border">
                <div style="min-height: 200px;"></div>
                <h4><?= $title ?></h4>
                <p><?= $content ?></p>
                <a href="<?= $block_post_url ?>" class="">Read Post ></a>
            </div>
        </div>	
        <div class="col-md-6">

    <?php elseif($posts === 2 || $posts === 3) : ?>
            <div class="row border h-50 p-3 align-items-end">
                <div class="col">
                    <h4><?= $title ?></h4>
                    <a href="<?= $block_post_url ?>" class="">Read ></a>
                </div>
            </div>
    <?php endif ; ?>
        
<?php endforeach; ?>
    </div>
</div>