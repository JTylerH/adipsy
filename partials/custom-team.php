<section class="bg-w team-members">
  <div class="container">
    <?php if( have_rows('team_members_repeater', 'option') ): ?>
      <?php while ( have_rows('team_members_repeater', 'option') ) : the_row(); ?>
        <div class="team-member">
          <img src="<?php the_sub_field('photo'); ?>" alt="Photo of <?php the_sub_field('name'); ?>">
          <p class="name"><?php the_sub_field('name'); ?></p>
          <?php if(get_sub_field('title')): ?><p class="title"><?php the_sub_field('title'); ?></p><?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
