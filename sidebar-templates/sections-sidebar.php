<?php
/**
 * The sidebar for Article Archive pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sections = get_terms( array( 
    'taxonomy' => 'section',
    'hide_empty' => false
) );

?>

<div class="col-md-3 p-5 text-white" style="background-color: #000a66;">
    <aside role="complimentary">
        <ul class="sections-list">
            <?php foreach($sections as $section) : ?>

                <?php $name = $section->name; ?>
                <?php $slug = $section->slug; ?>

                <li><a class="text-white text-uppercase text-decoration-none" href="/section/<?= $slug ?>"><?= $name ?> ></a></li>

            <?php endforeach; ?>
        </ul>
    </aside>
</div>