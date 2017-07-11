<?php
// check if the flexible content field has rows of data
if( have_rows('flex_section') ):

     // loop through the rows of data
    while ( have_rows('flex_section') ) : the_row();

        switch ( get_row_layout() ):

        case 'hero_section': get_template_part( 'partials/section', 'hero' ); break;
        case 'basic_section': get_template_part( 'partials/section', 'basic' ); break;
        case 'content_with_dropdown': get_template_part( 'partials/section', 'basic-withdropdown' ); break;
        case 'basic_section_double': get_template_part( 'partials/section', 'basic-double' ); break;
        case 'contact_form_section': get_template_part( 'partials/section', 'form' ); break;
        case 'heading_with_bars': get_template_part( 'partials/section', 'headingwithbars' ); break;
        case 'accordion_section': get_template_part( 'partials/section', 'accordion' ); break;
        case 'hero_portait_section': get_template_part( 'partials/section', 'portraithero' ); break;
        case 'degree_course_section': get_template_part( 'partials/section', 'degreecourse' ); break;
        case 'custom_php': get_template_part( 'partials/custom', get_sub_field('template_part') ); break;
        default: //do nothing

        endswitch;

    endwhile;

else :

    // no layouts found

endif;

?>
