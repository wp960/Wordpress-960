<?php

// Register sidebars
if ( !function_exists('register_cp_sidebars') ) {
	function register_cp_sidebars() {
		register_sidebar(array('name' => 'Header','before_widget' => '','after_widget' => '','before_title' => '<span class="header-widget-title">','after_title' => '</span>'));
		register_sidebar(array('name' => 'Sidebar','before_widget' => '<div class="wp960-sidebar-widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widget-title">','after_title' => '</h2>'));
		register_sidebar(array('name' => 'Footer','before_widget' => '','after_widget' => '','before_title' => '','after_title' => ''));
	}
}
add_action('init', 'register_cp_sidebars', 1);
