<nav role="navigation" class="container nav-mobile" itemscope itemtype="http://schema.org/SiteNavigationElement">
  <div class="nav-header">
    <a href="/" class="logo"><img src="<?php the_field('logo','options') ?>"></a>
    <div id="bars"><i class="fa fa-bars fa-fw"></i><i class="fa fa-close fa-fw" style="display:none"></i></div>
  </div>
  <?php wp_nav_menu(array(
             'container' => false,                           // remove nav container
             'container_class' => 'navbar navbar-default',                 // class of container (should you choose to use it)
             'menu' => __( 'Top Menu Left', 'bonestheme' ),  // nav name
             'menu_class' => 'top-nav-left',               // adding custom nav class
             'theme_location' => 'top-nav-left',                 // where it's located in the theme
             'before' => '',                                 // before the menu
                   'after' => '',                                  // after the menu
                   'link_before' => '',                            // before each link
                   'link_after' => '',                             // after each link
                   'depth' => 0,                                   // limit the depth of the nav
             'fallback_cb' => ''                             // fallback function (if there is one)
  )); ?>
</nav>
