<section class="custom-contact bg-w text-center">
  <div class="container">
    <p><a href='mailto:<?php the_field('main_email','options') ?>'><?php the_field('main_email','options') ?></a></p>
    <p><a class="phone" href="<?php the_field('main_phone_link','options') ?>"><?php the_field('main_phone','options') ?></a></p>
    <p><?php the_field('address','options') ?></p>
    <div class="social">
      <a href="<?php the_field('twitter_url','options') ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="<?php the_field('facebook_url','options') ?>" target="_blank"><i class="fa fa-facebook"></i></a>
      <a href="<?php the_field('instagram_url','options') ?>" target="_blank"><i class="fa fa-instagram"></i></a>
    </div>
  </div>
</section>
