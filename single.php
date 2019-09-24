<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();

	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/post/content', get_post_format() );

		the_post_navigation(
			array(
				'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'basetheme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'basetheme' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'basetheme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'basetheme' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
			)
		);
	endwhile;

get_footer();
