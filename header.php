<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
		<?php wp_head(); ?>
	</head>
	<body>
		<?php global $wordpress_960; ?>
		<div class="container_12">
			<!-- Header Navigation -->
			<?php wp_nav_menu( array(
				'theme_location' => 'header',
				'menu_class'    => 'nav-bar',
				'container'     => 'nav'
			) ); ?>
