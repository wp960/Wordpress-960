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

/**
 * Builds the correct amount of columns based on the theme options.
 * @param string $loop (optional) Which loop to get the contents for
 */
if ( !function_exists( 'get_columns' ) ) {
	function get_columns( $loop = 'index' ) {
		$options = get_option( '960gs_theme_options' );
		$sidebars = ! empty( $options['sidebars'] ) ? $options['sidebars'] : 'right';
		$grid = $class = 0;
		
		// Left sidebar
		if ( 'left' === $sidebars or 'both' === $sidebars ) :
			$grid = 'both' === $sidebars ? 3 : 4;
			?>
			<aside class="grid_<?php echo $grid; ?> alpha">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>Left Sidebar<?php endif; ?>
			</aside>
		<?php endif;
		
		// Main content
		switch ( $sidebars ) {
			case 'left':
				$grid = 8;
				$class = 'omega';
				break;
			case 'right':
				$grid = 8;
				$class = 'alpha';
				break;
			case 'both':
				$grid = 6;
				$class = '';
				break;
			case 'none':
			default:
				$grid = 12;
				$class = 'alpha omega';
				break;
		}
		?>
		<div id="wp960-blog-content" class="<?php printf( 'grid_%d %s', $grid, $class ); ?>">
			<?php get_template_part( 'loop', $loop ); ?>
		</div>
		<?php
		
		// Right Sidebar
		if ( 'right' === $sidebars or 'both' === $sidebars ) :
			$grid = 'both' === $sidebars ? 3 : 4; ?>
		<aside id="sidebar-blog" class="grid_<?php echo $grid; ?> omega">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?><?php endif; ?>
		</aside>
		<?php endif; ?>
		<div class="clear"></div>
		<?php
	}
}
