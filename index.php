<?php

echo apply_filters( 'smallermobs_title_section', '<header><title>' . smallermobs_title() . '</title><h1 class="entry-title">' . smallermobs_title() . '</h1></header>' );

do_action( 'smallermobs_index_begin' );

if ( ! have_posts() ) {
	echo '<div class="alert alert-warning">' . __( 'Sorry, no results were found.', 'smallermobs' ) . '</div>';
	get_search_form();
}

if ( ! has_action( 'smallermobs_override_index_loop' ) ) {
	while ( have_posts() ) : the_post();
		do_action( 'smallermobs_in_loop_start' );

		if ( ! has_action( 'smallermobs_content_override' ) ) {
			ss_get_template_part( 'templates/content', get_post_format() );
		} else {
			do_action( 'smallermobs_content_override' );
		}

		do_action( 'smallermobs_in_loop_end' );
	endwhile;
} else {
	do_action( 'smallermobs_override_index_loop' );
}

do_action( 'smallermobs_index_end' );

echo smallermobs_pagination_toggler();
