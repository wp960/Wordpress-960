<?php

// Register sidebars
if ( !function_exists('register_cp_sidebars') ) {
	function register_cp_sidebars() {
		register_sidebar(array(
			'name' => 'Right Sidebar',
			'before_widget' => '<div class="sidebar widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		));
		register_sidebar(array(
			'name' => 'Left Sidebar',
			'before_widget' => '<div class="sidebar widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		));
		register_sidebar(array(
			'name' => 'Header',
			'before_widget' => '<div class="header widget grid_3">',
			'after_widget' => '</div>',
			'before_title' => '<span class="header-widget-title">',
			'after_title' => '</span>'
		));
		register_sidebar(array(
			'name' => 'Footer',
			'before_widget' => '<div class="footer widget grid_3">',
			'after_widget' => '</div>',
			'before_title' => '<span class="footer-widget-title">',
			'after_title' => '</span>'
		));
	}
}
add_action('init', 'register_cp_sidebars', 1);
