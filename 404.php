<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

<section class="error">
	<h1 class="error__title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'basetheme' ); ?></h1>

	<div class="error__content">
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'basetheme' ); ?></p>
		<?php get_search_form(); ?>
	</div>

</section>

<?php get_footer();
