<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
  </head>
  <body>
    <?php global $wordpress_960; ?>
    <div class="container_24">
      <!-- menu? -->
      <?php 
      $args = array(
          'sort_column' => 'menu_order, post_title',
          'menu_class'  => 'sf-menu',
          'echo'        => true,
          'show_home'   => 'Blog',
          'theme_location' => 'header'
      );
      wp_nav_menu( $args );
      ?>
      <!-- #wp960-menu-container -->
      