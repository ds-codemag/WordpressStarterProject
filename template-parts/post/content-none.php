<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<section class="no-results not-found">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'basetheme' ); ?></h1>

	<div class="page-content">
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'basetheme' ); ?></p>
			<?php get_search_form(); ?>
	</div>
</section>
