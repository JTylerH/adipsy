<footer id="footer" class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<div class="container">
		<div class="row">
			<div class="col-md-3 footer-logo">
				<img class="logo" src="<?php echo get_template_directory_uri(); ?>/library/img/wlc_logo.png">
				<a href='mailto:<?php the_field('main_email','options') ?>'><?php the_field('main_email','options') ?></a>
				<a class="phone" href="<?php the_field('main_phone_link','options') ?>"><?php the_field('main_phone','options') ?></a>
				<a class="address" href="<?php the_field('address_link','options') ?>" target="_blank"><?php the_field('address','options') ?></a>
				<div class="social">
					<a href="<?php the_field('twitter_url','options') ?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="<?php the_field('facebook_url','options') ?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="<?php the_field('instagram_url','options') ?>" target="_blank"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
			<div class="col-md-9 footer-nav">
					<?php wp_nav_menu(array(
						 'container' => false,                           // remove nav container
						 'container_class' => '',                 // class of container (should you choose to use it)
						 'menu' => __( 'Footer Menu', 'bonestheme' ),  // nav name
						 'menu_class' => 'row',               // adding custom nav class
						 'theme_location' => 'footer-links',                 // where it's located in the theme
						 'before' => '',                                 // before the menu
									 'after' => '',                                  // after the menu
									 'link_before' => '',                            // before each link
									 'link_after' => '',                             // after each link
									 'depth' => 0,                                   // limit the depth of the nav
						 'fallback_cb' => ''// fallback function (if there is one)
					)); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
	</div>
</footer>
