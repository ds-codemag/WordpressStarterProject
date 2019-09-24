<?php
/**
 * Displays top navigation
 */

?>

<button class="navigation__trigger">
	<span class="line"></span>
	<span class="line"></span>
	<span class="line"></span>
</button>

<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'container'      => 'nav',
			'container_class'=> 'navigation',
			'menu_class'     => 'menu',
			'depth'          => 1,
			'items_wrap'     => '<ul class="%2$s">%3$s</ul>'
		)
	);
?>
