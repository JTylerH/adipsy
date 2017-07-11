<?php

/// wp-content/themes/WaveLeadershipCollege/library/video/test.mp4
// https://player.vimeo.com/external/129589425.hd.mp4?s=31aae396844ad80fad322d9ccc29e9bd&amp;profile_id=113



$valign = (get_sub_field('valign')=='center') ? "valign-center" : "valign-top";
$btncount = 0;
$btnrep = "";

switch ( get_sub_field('background_type') ):
  case 'color' :
    $herotag = 'class="flex-hero bg-'.get_sub_field('background_color').' '.$valign.'"';
  break;
  case 'image' :
    $herotag = 'class="flex-hero '.$valign.'" style="background-image:url('.get_sub_field('background_image').');color:#fff;"';
  break;
  case 'video' :
    $herotag = 'class="flex-hero fullscreen '.$valign.'"';
    $vimeoext = '<video src="'.get_sub_field('background_video').'" autoplay="true" loop="true" preload="auto"><script> var video = document.currentScript.parentElement; video.volume = 0;</script></video>';
  break;
  case 'false' :
  default :
    $herotag = 'class="flex-hero bg-blue '.$valign.'"';
  break;
endswitch;
echo '<section '.$herotag.'>';

?>
    <?php if (get_sub_field('hero_header')): ?><h1><?php the_sub_field('hero_header'); ?></h1><?php endif; ?>
    <?php if (get_sub_field('hero_sub_header')): ?><p><?php the_sub_field('hero_sub_header'); ?></p><?php endif; ?>
      <?php

      if( have_rows('hero_button_repeater') ):
        while ( have_rows('hero_button_repeater') ) : the_row();
          if (get_sub_field('button_show')):
            $btncount++;
            $btntext = get_sub_field('button_text');
            $btnstyle = get_sub_field('button_style');
            $btnpagelink = get_sub_field('button_pagelink');
            $btncustomlink = get_sub_field('button_customlink');
    	      $btndoclink = get_sub_field('button_documentlink');
            $btnnewtab = (get_sub_field('button_newtab')=="yes") ? "_blank" : "_self" ;
            switch(get_sub_field('button_linktype')):
              case "true" : $btnlink = $btnpagelink; break;
              case "false" : $btnlink = $btncustomlink; break;
              case "docs" : $btnlink = $btndoclink; break;
            endswitch;
            $btnrep = $btnrep.'<a href="'.$btnlink.'" class="btn '.$btnstyle.'" target="'.$btnnewtab.'">'.$btntext.'</a>';
          endif;
        endwhile; ?>
        <div class="button-repeater has-<?php echo $btncount ?>-buttons">
          <?php echo $btnrep; ?>
        </div>
      <?php endif; ?>
      <?php if (get_sub_field('hero_background_type')=='video')
        echo '<div class="bg-video">'.$vimeoext.'</div>';
      ?>
</section>
