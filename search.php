<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<h1><?php printf( __( 'Search Results for: %s', 'basetheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php else : ?>
		<h1><?php _e( 'Nothing Found', 'basetheme' ); ?></h1>
	<?php endif; ?>

	<?php
		if ( have_posts() ) :
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
	?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'basetheme' ); ?></p>

	<?php
		get_search_form();
		endif;
	?>

<?php get_footer();
