<?php

global $ss_framework;

while ( have_posts() ) : the_post();
	do_action( 'smallermobs_page_pre_content' );
	the_content();
	echo $ss_framework->clearfix();
	smallermobs_meta( 'cats' );
	smallermobs_meta( 'tags' );
	do_action( 'smallermobs_page_after_content' );

	wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) );
endwhile;
