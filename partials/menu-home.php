<section class="bg-blue section-btngroup">
   <div class="container four-btn-container">
     <div class="four-btn-row">
    <?php wp_nav_menu(array(
       'container' => false,                           // remove nav container
       'container_class' => '',                 // class of container (should you choose to use it)
       'menu' => __( 'Home Page Menu Bar', 'bonestheme' ),  // nav name
       'menu_class' => '',               // adding custom nav class
       'theme_location' => 'home-links',                 // where it's located in the theme
       'before' => '',                                 // before the menu
             'after' => '',                                  // after the menu
             'link_before' => '',                            // before each link
             'link_after' => '',                             // after each link
             'depth' => 0,                                   // limit the depth of the nav
       'fallback_cb' => ''// fallback function (if there is one)
    )); ?>
  </div>
  </div>
</section>
