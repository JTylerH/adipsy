<?php
$btncount = 0;
$btnrep = "";
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

if (get_sub_field('header')):
  $headerstr = 'id="'.(str_replace(' ', '-', strtolower(get_sub_field('header')))).'"';
endif;
echo '<section '.$headerstr.' class="flex-basic '.$bgclass.' '.$textalign.' '.get_sub_field('additional_classes').'" '.$bgimage.'>';

?>
<div class="container">
  <?php if (get_sub_field('header')): ?><h2 <?php if (get_sub_field('header_color')): echo 'class="'.get_sub_field('header_color').'"'; endif; ?>><?php the_sub_field('header'); ?></h2><?php endif; ?>
  <?php if (get_sub_field('content')): ?><p><?php the_sub_field('content'); ?></p><?php endif; ?>
  <?php if (get_sub_field('more_content')): ?>
    <div class="show_more">
      <button class="btn btn-block <?php the_sub_field('more_button_style'); ?>"><?php the_sub_field('more_button_text'); ?></button>
      <div class="show_more_content well well-lg" style="display:none;"><?php the_sub_field('more_content'); ?></div>
    </div>
  <?php endif; ?>
  <?php
    if (get_sub_field('show_button')):
      $btntext = get_sub_field('button_text');
      $btnstyle = get_sub_field('button_style');
      $btnpagelink = get_sub_field('button_pagelink');
      $btncustomlink = get_sub_field('button_customlink');
      $btnnewtab = (get_sub_field('button_newtab')=="yes") ? "_blank" : "_self" ;
      $btnlink = (get_sub_field('button_linktype')=="true") ? $btnpagelink : $btncustomlink;
      $btn = '<a href="'.$btnlink.'" class="btn '.$btnstyle.'" target="'.$btnnewtab.'">'.$btntext.'</a>';
      echo $btn;
    endif;
  ?>
</div>
</section>
