<?php get_header(); ?>
<?php get_template_part( 'partials/page', 'header' ); ?>
<?php get_template_part( 'partials/menu', 'financial' ); ?>
<?php
	$bgclass = "";
	$bgimage = "";
	$textalign = get_field('letter_text_align');
	switch ( get_field('letter_background_type') ):
	  case 'color' :
	    $bgclass = 'bg-'.get_field('letter_background_color');
	  break;
	  case 'image' :
	    $bgclass = 'bg-image';
	    $bgimage = 'style="background-image:url('.get_field('letter_background_image').');"';
	  break;
	  case 'false' :
	  default :
	    $bgclass = 'bg-white';
	  break;
	endswitch;

	echo '<section class="flex-letter '.$bgclass.' '.$textalign.'" '.$bgimage.'>';

	?>
	<div class="container">
	    <?php if (get_field('header')): ?><h2><?php the_field('header'); ?></h2><?php endif; ?>
			<?php if (get_field('headshot')): ?><figure><img src="<?php the_field('headshot'); ?>"></figure><?php endif; ?>
	    <?php if (get_field('content')): ?><p><?php the_field('content'); ?></p><?php endif; ?>
	</div>
</section>
<?php get_template_part( 'partials/acf', 'flex' ); ?>
<?php get_footer(); ?>
