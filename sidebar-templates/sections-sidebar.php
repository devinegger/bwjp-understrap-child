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
        
        <ul class="sections-list ms-2">
            <?php get_search_form( ); ?>
            <h4 class="fs-6 pt-3">Filter Resources by Class</h4>
            <?php foreach($sections as $section) : ?>

                <?php $name = $section->name; ?>
                <?php $slug = $section->slug; ?>

                <li><a class="text-white text-uppercase" href="<?=$current_slug?>/?class=<?= $slug ?>"><?= $name ?> ></a></li>

            <?php endforeach; ?>
        </ul>
    </aside>
</div>