		<footer class="grid_12">

			<!-- Footer Widgets -->
			<aside>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>
				<div class="clear"></div>
			</aside>

			<!-- Footer Navigation -->
			<?php wp_nav_menu( array(
				'theme_location' => 'footer',
				'menu_class'    => 'nav-bar',
				'container'     => 'nav'
			) ); ?>

		</footer>

		</div>
		<?php wp_footer(); ?>
	</body>
</html>
