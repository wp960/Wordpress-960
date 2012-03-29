<?php

# TODO: Implement dynamic base width for the 960 Grid System.
# TODO: Implement dynamic column amounts.
# TODO: Add custom menus.
# TODO: Add widget zones.
# TODO: Implement updating system for 960 Grid System.

# Sanity check.
if ( !class_exists( 'wordpress_960' ) ) {

	class wordpress_960 {

		# PHP 4 Constructor
		function wordpress_960() {

			$wp960_theme_data = get_theme_data(TEMPLATEPATH.'/style.css');
			define('THEME_PATH', trailingslashit(TEMPLATEPATH));
			define('wp960_HEME_NAME', $wp960_theme_data['Name']);
			define('wp960_THEME_AUTHOR', $wp960_theme_data['Author']);
			define('wp960_THEME_URI', $wp960_theme_data['URI']);
			define('THEME_VERSION', trim($wp960_theme_data['Version']));
			define('THEME_URL', get_bloginfo('template_url'));

			# Setup Widget Zones
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

			# This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'header' => __( 'Header Navigation', 'wp960' ),
				'footer' => __( 'Footer Navigation', 'wp960' )
			) );

		} # End Constructor

	}

} # Does the class exist?

if ( class_exists( 'wordpress_960' ) and !isset( $wordpress_960 ) ) {
	$wordpress_960 = new wordpress_960();
}
