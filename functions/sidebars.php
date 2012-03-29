<?php

// Register sidebars
if ( !function_exists('register_cp_sidebars') ) {
	function register_cp_sidebars() {
		register_sidebar(array('name' => 'header','before_widget' => '','after_widget' => '','before_title' => '<span class="header-widget-title">','after_title' => '</span>'));
		register_sidebar(array('name' => 'submenu','before_widget' => '<div class="wp960-submenu-widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget-title">','after_title' => '</h3>'));
		register_sidebar(array('name' => 'page-sidebar','before_widget' => '<div class="wp960-sidebar-widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		register_sidebar(array('name' => 'footer','before_widget' => '','after_widget' => '','before_title' => '','after_title' => ''));
		register_sidebar(array('name' => 'home-page','before_widget' => '<div class="wp960-home-widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget-title">','after_title' => '</h3>'));
		register_sidebar(array('name' => 'sidebar-blog', 'before_widget' => '<div class="blog-sidebar-widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	}
}
add_action('init', 'register_cp_sidebars', 1);
