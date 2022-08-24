<?php
/**
 * The sidebar for Article Archive pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sections = get_terms( array( 
    'taxonomy' => 'class',
    'hide_empty' => true
) );

global $wp;


if(is_tax('section')) {
    $current_slug = '/' . add_query_arg( array(), $wp->request );
} else {
    $current_slug = "";
}



?>

<div class="col-md-3 p-5 text-white" style="background-color: #000a66;">
    <aside role="complimentary">
    <?php echo $current_slug; ?>
        
        <ul class="sections-list ms-2">
            <?php get_search_form( ); ?>
            <?php foreach($sections as $section) : ?>

                <?php $name = $section->name; ?>
                <?php $slug = $section->slug; ?>

                <li><a class="text-white text-uppercase text-decoration-none" href="<?=$current_slug?>/?class=<?= $slug ?>"><?= $name ?> ></a></li>

            <?php endforeach; ?>
        </ul>
    </aside>
</div>