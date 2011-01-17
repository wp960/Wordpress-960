<!DOCTYPE html>
  <head>
    <title><?php wp_title(); ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="Blog RSS Feed" id="blog_rss_feed" href="<?php bloginfo('rss2_url'); ?>"/>
    <!-- Begin WordPress Header -->
    <?php wp_head(); ?>
    <!-- Complete WordPress Header -->
  </head>
  <body <?php body_class(); ?>>
    <div id="wp960-wrapper" class="container_24 hfeed">
      <div id="wp960-header">
        <?php if (wp960_header()) { ?>
          <div id="wp960-header-text" class="grid_24">
            <a href="/"><?php echo wp960_header(); ?></a>
          </div><!-- #wp960-header-text -->
        <?php } else { ?>
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("header") ) : ?><?php endif; ?>
        <?php } ?>
          <div class="clear"></div>
      </div><!-- #wp960-header -->
      <div id="wp960-menu-bar" class="grid_24">
        <div id="wp960-header-access">
          <?php wp_nav_menu( array( 'container_id' => 'wp960-header-menu-container', 'menu_id' => 'wp960-header-menu', 'container_class' => 'menu-header', 'theme_location' => 'header', 'menu_class' => 'sf-menu' ) ); ?><!-- #wp960-menu-container -->
        </div>
        <div class="clear"></div>
      </div>
      <div id="wp960-sub-menu">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("submenu") ) : ?><?php endif; ?>
        <div class="clear"></div>
      </div>
      <div id="wp960-inner-wrapper-top"></div>
      <div id="wp960-inner-wrapper">
