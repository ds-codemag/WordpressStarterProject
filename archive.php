<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="taxonomy-description">', '</div>' );

	if ( have_posts() ) :
		while ( have_posts() ) :

			the_post();
			get_template_part( 'template-parts/post/content', get_post_format() );

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

	endif;

get_footer();
