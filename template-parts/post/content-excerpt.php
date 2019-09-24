<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post__header">
		<?php the_title( '<h2 class="post__title"><a href="' . get_permalink() . '">', '</a></h2>' ); ?>
	</header>

	<div class="post__content">
		<?php the_excerpt(); ?>
	</div>
</article>
