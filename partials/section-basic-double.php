<?php
$responsivebreak = get_sub_field('responsive_break_at');
$dsminheight = get_sub_field('double_section_min_height');
if( have_rows('double_section_repeater') ): ?>

<section class="flex-basic-double container-fluid">
<div class="row equalheightcols">
<?php while ( have_rows('double_section_repeater') ) : the_row(); ?>
<?php
$btncount = 0;
$btnrep = "";
$headerstr = "";
$bgclass = "";
$bgstyle = "min-height:".$dsminheight."px;";
$textalign = get_sub_field('text_align');
switch ( get_sub_field('background_type') ):
  case 'color' :
    $bgclass = 'bg-'.get_sub_field('background_color');
  break;
  case 'image' :
    $bgclass = 'bg-image';
    $bgstyle = $bgstyle.'background-image:url('.get_sub_field('background_image').');';
  break;
  case 'false' :
  default :
    $bgclass = 'bg-white';
  break;
endswitch;

if (get_sub_field('header')):
  $headerstr = 'id="'.(str_replace(' ', '-', strtolower(get_sub_field('header')))).'"';
endif;
echo '<section '.$headerstr.' class="'.$responsivebreak.' flex-basic '.$bgclass.' '.$textalign.' '.get_sub_field('additional_classes').'" style="'.$bgstyle.'">';

?>
    <?php if (get_sub_field('header')): ?><h2 <?php if (get_sub_field('header_color')): echo 'class="'.get_sub_field('header_color').'"'; endif; ?>><?php the_sub_field('header'); ?></h2><?php endif; ?>
    <?php if (get_sub_field('content')): ?><p><?php the_sub_field('content'); ?></p><?php endif; ?>
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

  <?php

  if( have_rows('button_repeater') ):
    while ( have_rows('button_repeater') ) : the_row();
      if (get_sub_field('button_show')):
        $btncount++;
        $btntext = get_sub_field('button_text');
        $btnstyle = get_sub_field('button_style');
        $btnpagelink = get_sub_field('button_pagelink');
        $btncustomlink = get_sub_field('button_customlink');
        $btnnewtab = (get_sub_field('button_newtab')=="yes") ? "_blank" : "_self" ;
        $btnlink = (get_sub_field('button_linktype')=="true") ? $btnpagelink : $btncustomlink;
        $btnrep = $btnrep.'<a href="'.$btnlink.'" class="btn '.$btnstyle.'" target="'.$btnnewtab.'">'.$btntext.'</a>';
      endif;
    endwhile;
  endif;
  ?>
  <div class="button-repeater has-<?php echo $btncount ?>-buttons">
    <?php echo $btnrep; ?>
  </div>
</section>
<?php endwhile; ?>
</div>
</section>
<?php endif; ?>
