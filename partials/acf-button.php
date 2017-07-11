<?php
if (get_field('show_button')):
  $herobtntext = get_field('hero_button_text');
  $herobtnstyle = get_field('hero_button_style');
  $herobtnlinktype = get_field('hero_button_linktype');
  $herobtnpagelink = get_field('hero_button_pagelink');
  $herobtncustomlink = get_field('hero_button_customlink');
  $herobtnnewtab = (get_field('hero_button_newtab')) ? "_blank" : "_self" ;
  $herobtnlink = ($herobtnlinktype) ? $herobtnpagelink : $herobtncustomlink;
  $herobtn = '<a href="'.$herobtnlink.'" class="btn '.$herobtnstyle.'" target="'.$herobtnnewtab.'">'.$herobtntext.'</a>';
  echo '<div class="header-action">'.$herobtn.'</div>';
endif;
?>
