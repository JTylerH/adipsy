<?php if( have_rows('sponsors', 'option') ): ?>
<section class="bg-w text-center sponsor-grid">
  <div class="container">
    <ul>
      <?php while ( have_rows('sponsors', 'option') ) : the_row(); ?>
        <li><a href="<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php the_sub_field('image'); ?>"></a></li>
      <?php endwhile; ?>
    </ul>
  </div>
</section>
<?php endif; ?>
