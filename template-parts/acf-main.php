<?php 

/** 
 * Template part for displaying all ACF Templates on any page
 */

 if (have_rows('section_templates')) :
    while (have_rows('section_templates')) : the_row();

        // Headline Image Template
        if (get_row_layout() == 'headline_image') :
            get_template_part('template-parts/acf','headline-image');
        endif;

        // Left Right Image Content Template
        if (get_row_layout() == 'left_right_image_content') :
            get_template_part('template-parts/acf','left-right-image-content');
        endif;

        // Three Column Custom Template
        if (get_row_layout() == 'three_column_custom') :
            get_template_part('template-parts/acf','three-column-custom');
        endif;

        // Three Column Post Template
        if (get_row_layout() == 'three_column_post') :
            get_template_part('template-parts/acf','three-column-post');
        endif;

        // Masonry Post Template
        if (get_row_layout() == 'post_masonry') :
            get_template_part('template-parts/acf','masonry-posts');
        endif;

    endwhile;
 endif;