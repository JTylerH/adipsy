<nav role="navigation" class="container nav-mobile" itemscope itemtype="http://schema.org/SiteNavigationElement">
  <div class="nav-header">
    <a href="/" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/library/img/logo.png"></a>
    <div id="bars"><i class="fa fa-bars fa-fw"></i><i class="fa fa-close fa-fw" style="display:none"></i></div>
  </div>
  <?php wp_nav_menu(array(
             'container' => false,                           // remove nav container
             'container_class' => 'navbar navbar-default',                 // class of container (should you choose to use it)
             'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
             'menu_class' => 'header-nav',               // adding custom nav class
             'theme_location' => 'main-nav',                 // where it's located in the theme
             'before' => '',                                 // before the menu
                   'after' => '',                                  // after the menu
                   'link_before' => '',                            // before each link
                   'link_after' => '',                             // after each link
                   'depth' => 0,                                   // limit the depth of the nav
             'fallback_cb' => ''                             // fallback function (if there is one)
  )); ?>
</nav>
