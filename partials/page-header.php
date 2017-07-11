<?php

// $herotag = '';
// $vTop = '';
// $vBottom = '';
// $vPad = '';
//
// if(get_field('vertical_alignment')) :
//   $vTop = get_field('vertical_alignment');
//   $vBottom = 50 - get_field('vertical_alignment');
//   $vPad = 'padding-top:'.$vTop.'%;padding-bottom:'.$vBottom.'%;';
// endif;

// switch ( get_field('background') ):
//   case 'color' :
//     $herotag = '<div class="hero bg-'.get_field('background_color').'" style="'.$vPad.'"">';
//   break;
//   case 'image' :
//     $herotag = '<div class="hero" style="background-image:url('.get_field('background_image').');color:#fff;'.$vPad.'">';
//   break;
//   case 'false' :
//   default :
//     $herotag = '<div class="hero bg-blue" style="'.$vPad.'"">';
//   break;
// endswitch;
// echo $herotag;

// if(get_field('background_video')):
// $iframe = get_field('background_video');
// preg_match('/src="(.+?)"/', $iframe, $matches);
// $src = $matches[1];
// $params = array(
//     'background'    => 1
// );
// $new_src = add_query_arg($params, $src);
// $iframe = str_replace($src, $new_src, $iframe);
// $attributes = 'frameborder="0"';
// $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
// endif;


/// wp-content/themes/WaveLeadershipCollege/library/video/test.mp4
// https://player.vimeo.com/external/129589425.hd.mp4?s=31aae396844ad80fad322d9ccc29e9bd&amp;profile_id=113
$btnrep = "";
$btncount = 0;
$valign = (get_field('valign')=='center') ? "valign-center" : "valign-top";
$headerh = (get_field('header_height')) ? get_field('header_height') : "ch";
$bgimage = "";
$herotag = "";
$bgclass = "";
$bgtype = get_field('background_type');
$videourl = "";
$textcolor = get_field('hero_header_color');
$overlaypercentage = get_field('overlay_percentage')/100;
switch ( $bgtype ):
  case 'color' :
    $herotag = 'class="bg-'.get_field('background_color').' '.$valign.' '.$headerh.' '.$textcolor.'"';
  break;
  case 'image' :
    $herotag = 'class="'.$valign.' '.$headerh.' '.$textcolor.'" style="background-image:url('.get_field('background_image').');"';
  break;
  case 'video' :
    $phimg = get_field('background_video_placeholder_image');
    $herotag = 'class="fullscreen '.$valign.' wh '.$textcolor.'" style="background-image:url('.$phimg.')"';
    $videourl = get_field('background_video');
  break;
  case 'false' :
  default :
    $herotag = 'class="bg-blue '.$valign.' '.$headerh.' '.$textcolor.'"';
  break;
endswitch;

echo '<header '.$herotag.'role="banner" itemscope itemtype="http://schema.org/WPHeader">';

?>
<div class="container">
    <?php if (get_field('hero_header')): ?><h1><?php the_field('hero_header'); ?></h1><?php endif; ?>
    <?php if (get_field('hero_sub_header')): ?><p><?php the_field('hero_sub_header'); ?></p><?php endif; ?>
    <?php if (get_field('show_button')):
        $herobtntext = get_field('hero_button_text');
        $herobtnstyle = get_field('hero_button_style');
        $herobtnlinktype = get_field('hero_button_linktype');
        $herobtnpagelink = get_field('hero_button_pagelink');
        $herobtncustomlink = get_field('hero_button_customlink');
        $herobtnnewtab = (get_field('hero_button_newtab')=='yes') ? "_blank" : "_self" ;
        $herobtnlink = ($herobtnlinktype) ? $herobtnpagelink : $herobtncustomlink;
        $herobtn = '<a href="'.$herobtnlink.'" class="btn '.$herobtnstyle.'" target="'.$herobtnnewtab.'">'.$herobtntext.'</a>';
        echo '<div class="header-action">'.$herobtn.'</div>';
      endif;
        if ($bgtype=='video'):
          echo '<div class="bg-video"><div class="overlay" style="background-color:rgba(0,0,0,'.$overlaypercentage.')"></div><video id="bgvideo" autoplay loop preload="auto" muted webkit-playsinline playsinline><source src="'.$videourl.'"></video></div>';
        endif;
    ?>
    <?php

    if( have_rows('hero_button_repeater') ):
      $btncount = 0;
      while ( have_rows('hero_button_repeater') ) : the_row();
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
  </div>
</header>
