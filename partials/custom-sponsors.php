<?php if( have_rows('sponsors', 'option') ): ?>
<section class="bg-ow">
  <div class="container">
    <div class="sponsors lS-controls-dark">
      <h2 class="txt-k text-center">Thank you to our sponsors!</h2>
      <ul id="sponsor-slider">
        <?php while ( have_rows('sponsors', 'option') ) : the_row(); ?>
          <li><a href="<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php the_sub_field('image'); ?>"></a></li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</section>
<?php endif; ?>
