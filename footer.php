			<footer class="grid_12 alpha omega">

				<!-- Footer Widgets -->
				<aside>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>
					<div class="clear"></div>
				</aside>

				<!-- Footer Navigation -->
				<?php
				$options = get_option( '960gs_theme_options' );
				if ( $options['footer_navigation'] ) {
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_class'    => 'nav-bar',
						'container'     => 'nav'
					) );
				}
				?>

			</footer>

		</div>
		<?php wp_footer(); ?>
	</body>
</html>
