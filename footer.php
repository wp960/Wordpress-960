<?php
			$args = array(
				'sort_column' => 'menu_order, post_title',
				'menu_class'  => 'sf-menu',
				'echo'        => true,
				'show_home'   => 'Blog',
				'theme_location' => 'footer'
			);
			wp_nav_menu( $args );
		?>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
