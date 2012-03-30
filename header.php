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
			<header class="grid_12">

				<!-- Site Description & Title -->
				<hgroup id="header">
					<h1><a href="<?php echo site_url(); ?>"><?php bloginfo('title'); ?></a></h1>
					<?php
					$description = get_bloginfo('description');
					if (! empty($description)) : ?>
						<h4 class="subheader"><?php $description; ?></h4>
					<?php endif; ?>
				</hgroup>

				<!-- Header Navigation -->
				<?php wp_nav_menu( array(
					'theme_location' => 'header',
					'menu_class'     => 'nav-bar',
					'container'      => 'nav'
				) ); ?>

				<!-- Header Widgets -->
				<aside>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header') ) : ?><?php endif; ?>
				</aside>

			</header>
			<div class="clear"></div>