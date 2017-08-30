<?php if( have_rows('sponsors', 'option') ): ?>
<section class="bg-w text-center">
  <div class="container">
    <div class="sponsors lS-controls-dark">
      <h2 class="txt-k">Our Partners</h2>
      <p>See who’s partnering with us in helping those fighting cancer!</p>
      <ul id="sponsor-slider">
        <?php while ( have_rows('sponsors', 'option') ) : the_row(); ?>
          <li><a href="<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php the_sub_field('image'); ?>"></a></li>
        <?php endwhile; ?>
      </ul>
      <a href="<?php bloginfo('url'); ?>/about-us/our-partners/" class="btn btn-blue">See Who's Helping Us</a>
    </div>
  </div>
</section>
<?php endif; ?>
