<?php if ( get_field('enable_sections') == 'yes' ): ?>
<?php if( have_rows('sections') ): ?>
  <?php while( have_rows('sections') ): the_row();
    switch ( get_sub_field('background') ):
      case 'color' :
        if ( get_sub_field('background_color') !== '#ffffff' ):
          $thebackground = "background:".get_sub_field('background_color').";color:#fff;";
        else:
          $thebackground = "background:#fff;color:#252526";
        endif;
        break;
      case 'image' :
        $thebackground = "background-image:url('".get_sub_field('background_image')."');color:#fff;";
        break;
      case 'false' :
      default :
        $thebackground = "background:#fff;color:#252526;";
        break;
    endswitch;
    ?>

    <section class="hero" style="<?php echo $thebackground; ?>">
      <div class="container">
        <h1 class="tag"><?php the_sub_field('header'); ?></h1>
        <?php the_sub_field('content'); ?>
        <?php if( get_sub_field('button') == 'yes'  ): ?>
          <a href="<?php the_sub_field('button_link'); ?>" class="hollow-button"><?php the_sub_field('button_text'); ?></a>
        <?php endif; ?>
      </div>
  </section>
  <?php endwhile; ?>
<?php endif; ?>
<?php else: ?>
  <section class="basic-content" style="background:#fff;color:#252526;">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </section>
<?php endif; ?>
