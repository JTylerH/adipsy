<section class="bg-w">
  <div class="container">
    <?php if( have_rows('board_members_repeater', 'option') ): ?>
      <?php while ( have_rows('board_members_repeater', 'option') ) : the_row(); ?>
        <div class="board-member">
          <h2><?php the_sub_field('name'); ?></h2>
          <?php if(get_sub_field('subtitle')): ?><p class="subtitle"><?php the_sub_field('subtitle'); ?></p><?php endif; ?>
          <p class="bio"><?php the_sub_field('bio'); ?></p>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
