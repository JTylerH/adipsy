<?php
$headerstr = "";
$bgclass = "";
$bgimage = "";
$textalign = get_sub_field('text_align');
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

echo '<section class="flex-headingwithbars '.$bgclass.' '.$textalign.'" '.$bgimage.'>';

?>
<div class="container">
    <?php if (get_sub_field('heading')): ?>
      <h2 <?php if (get_sub_field('heading_color')): echo 'class="'.get_sub_field('heading_color').'"'; endif; ?>><?php the_sub_field('heading'); ?></h2>
    <?php endif; ?>
</div>
</section>
