<?php
/**
* @package WordPress
* @subpackage wp960
* Template Name: Widget Page
*/
get_header(); ?>
        <div id="wp960-content">
            <div class="wp960-widget-zones-top" id="wp960-home-page-top"></div><!-- #wp960-home-page-top -->
            <div class="wp960-widget-zones" id="wp960-home-page">
              <?php dynamic_sidebar("home-page"); ?>
              <div class="clear"></div>
            </div><!-- #wp960-home-page -->
            <div class="widget-zones-bottom" id="home-page-bottom"></div><!-- #home-page-bottom -->
          <div class="clear"></div>
        </div><!-- #wp960-content -->
<?php get_footer(); ?>
