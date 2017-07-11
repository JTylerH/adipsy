<?php
  $offsetcol = "";
  if ( get_sub_field('portrait_align') == "focusedleft" ):
    $offsetcol = "col-sm-offset-6";
  endif;
?>
<section class="flex-personalintro <?php the_sub_field('portrait_align'); ?> <?php the_sub_field('portrait_class'); ?> <?php the_sub_field('additional_classes'); ?>" style="background-image:url('<?php the_sub_field('bg_img'); ?>');background-color:<?php the_sub_field('bg_color_ref');?>;">
  <div class="container">
    <div class="row">
      <div class="<?php echo $offsetcol ?> col-sm-6">
        <h2><?php the_sub_field('header'); ?></h2>
        <?php the_sub_field('content'); ?>
        <?php if(get_sub_field('video_url')): ?>
          <button class="btn <?php the_sub_field('btn_class'); ?>" id="watchvideobtn">Watch Video</button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php if(get_sub_field('video_url')): ?>
  <section id="watchvideo" class="flex-basic" style="background-color:<?php the_sub_field('bg_color_ref'); ?>">
    <div class="container">
      <div class="embed-container">
        <?php the_sub_field('video_url'); ?>
      </div>
    </div>
  </section>
<?php endif; ?>
