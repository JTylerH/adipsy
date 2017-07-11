<?php
global $wp_query;
$theID = "";
if($wp_query->post)
$theID = $wp_query->post->ID;
?>

<nav role="navigation" class="container nav-lg <?php the_field('nav_color', $theID ); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
  <a href="<?php bloginfo( 'url' ); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/library/img/logo.png"></a>
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
  <?php wp_nav_menu(array(
             'container' => false,                           // remove nav container
             'container_class' => 'navbar navbar-default',                 // class of container (should you choose to use it)
             'menu' => __( 'Top Menu Right', 'bonestheme' ),  // nav name
             'menu_class' => 'top-nav-right',               // adding custom nav class
             'theme_location' => 'top-nav-right',                 // where it's located in the theme
             'before' => '',                                 // before the menu
                   'after' => '',                                  // after the menu
                   'link_before' => '',                            // before each link
                   'link_after' => '',                             // after each link
                   'depth' => 0,                                   // limit the depth of the nav
             'fallback_cb' => ''                             // fallback function (if there is one)
  )); ?>
</nav>
