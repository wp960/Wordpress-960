<?php

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

			include('functions/sidebars.php');
			include('functions/menus.php');
			include('functions/theme-options.php');

		} # End Constructor

	}

} # Does the class exist?

if ( class_exists( 'wordpress_960' ) and !isset( $wordpress_960 ) ) {
	$wordpress_960 = new wordpress_960();
}
