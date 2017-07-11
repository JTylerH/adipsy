<?php
// check if the flexible content field has rows of data
if( have_rows('flex_section',39) ):

     // loop through the rows of data
    while ( have_rows('flex_section',39) ) : the_row();

        switch ( get_row_layout() ):

        case 'hero_section': get_template_part( 'partials/section', 'hero' ); break;
        case 'basic_section': get_template_part( 'partials/section', 'basic' ); break;
        case 'contact_form_section': get_template_part( 'partials/section', 'form' ); break;
        case 'custom_php': get_template_part( 'partials/custom', get_sub_field('template_part') ); break;
        default: //do nothing

        endswitch;

    endwhile;

else :

    // no layouts found

endif;

?>
