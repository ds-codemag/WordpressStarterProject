<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post__header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="post__title">', '</h1>' );
			} else {
				the_title( '<h2 class="post__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}
		?>
	</header>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post__thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'featured-image' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="post__content">
		<?php the_content(); ?>
	</div>
</article>
