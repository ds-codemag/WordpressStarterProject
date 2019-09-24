<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta name="robots" content="noindex">
<!-- Remove noindex on production -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">

	<?php the_custom_logo(); ?>

	<?php if ( has_nav_menu( 'top' ) ) : ?>
		<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
	<?php endif; ?>

</header>

<main class="wrap">
