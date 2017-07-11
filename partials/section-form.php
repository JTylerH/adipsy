<?php
$headerstr = 'id="default-form-hash"';
$bgclass = "";
$bgimage = "";
$formalign = get_sub_field('form_alignment');
$successstyle = (get_sub_field('confirmation_covers_section')) ? "confirmation-cover" : "" ;
switch ( get_sub_field('background_type') ):
  case 'color' :
    $bgclass = 'bg-'.get_sub_field('background_color');
  break;
  case 'image' :
    $bgclass = 'bg-image';
    $bgimage = 'style="background-image:url('.get_sub_field('background_image').');"';
  break;
  case 'false' :
  default :
    $bgclass = 'bg-white';
  break;
endswitch;
if (get_sub_field('form_header')):
  $headerstr = 'id="'.(str_replace(' ', '-', strtolower(get_sub_field('form_header')))).'"';
endif;
echo '<section '.$headerstr.' class="flex-form '.$bgclass.' '.$formalign.' '.$successstyle.'" '.$bgimage.'>';

?>

<div class="container">
    <?php if (get_sub_field('form_header')): ?><h2 class="<?php the_sub_field('header_color'); ?>"><?php the_sub_field('form_header'); ?></h2><?php endif; ?>
    <?php if (get_sub_field('form_paragraph')): ?><p><?php the_sub_field('form_paragraph'); ?></p><?php endif; ?>
    <?php echo do_shortcode( get_sub_field('contact_form_shortcode') );  ?>
</div>
</section>
