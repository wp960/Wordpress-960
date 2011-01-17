<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
  </head>
  <body>
    <?php global $wordpress_960; ?>
    <div class="container_12">
      <?php wp_nav_menu( $wordpress_960->header_menu ); ?>
    </div>
