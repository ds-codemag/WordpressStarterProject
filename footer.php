<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

</main>

<footer class="footer">
	<div class="container">
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation" role="navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . get_svg( array( 'icon' => 'chain' ) ),
						)
					);
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
