<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/page/content', 'front-page' );
		endwhile;
	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif;

get_footer();
