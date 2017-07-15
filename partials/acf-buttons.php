<?php
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
?>
