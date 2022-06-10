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

        // WYSIWYG Template
        if (get_row_layout() == 'wysiwyg') :
            get_template_part('template-parts/acf','wysiwyg');
        endif;

        // Featured Posts Template
        if (get_row_layout() == 'featured_posts') :
            get_template_part('template-parts/acf','featured-posts');
        endif;

        // Results Circles Template
        if (get_row_layout() == 'results_circles') :
            get_template_part('template-parts/acf','results-circles');
        endif;
        
        // Staff Cards Template
        if (get_row_layout() == 'staff_cards') :
            get_template_part('template-parts/acf','staff-cards');
        endif;

        // Partnership Cards Template
        if (get_row_layout() == 'partnership_cards') :
            get_template_part('template-parts/acf','partnership-cards');
        endif;

    endwhile;
 endif;