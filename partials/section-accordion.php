<?php
$btncount = 0;
$btnrep = "";
?>
<section class="section-accordion bg-w text-centerheader">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <?php if (get_sub_field('accordion_header')): ?>
          <h2><?php the_sub_field('accordion_header'); ?></h2>
        <?php endif; ?>
        <?php if (get_sub_field('accordion_content')): the_sub_field('accordion_content'); endif; ?>
        <?php if( have_rows('accordion_tabs') ): ?>
          <div class="accordion-dropdowns">
          <?php while ( have_rows('accordion_tabs') ) : the_row(); ?>
            <div class="accordion-dropdown">
              <div class="title"><?php the_sub_field('title'); ?></div>
              <div class="content"><p><?php the_sub_field('description'); ?></p></div>
            </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php
    if( have_rows('button_repeater') ):
      while ( have_rows('button_repeater') ) : the_row();
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
      endwhile;
    endif;
    ?>
    <div class="button-repeater has-<?php echo $btncount ?>-buttons">
      <?php echo $btnrep; ?>
    </div>
  </div>
</section>
