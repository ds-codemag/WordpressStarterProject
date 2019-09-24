<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

<div class="container">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	<?php else : ?>
		<h2 class="page-title"><?php _e( 'Posts', 'basetheme' ); ?></h2>
	<?php endif; ?>

	<?php if ( have_posts() ) :
		while ( have_posts() ) :

			the_post();
			get_template_part( 'template-parts/post/content', 'excerpt' );

		endwhile;

		the_posts_pagination(
			array(
				'prev_text'          => get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'basetheme' ) . '</span>',
				'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'basetheme' ) . '</span>' . get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'basetheme' ) . ' </span>',
			)
		);

		else :

			get_template_part( 'template-parts/post/content', 'none' );

	endif; ?>
</div>

<?php get_footer();
