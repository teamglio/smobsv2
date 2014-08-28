<?php

global $ss_framework;
global $ss_settings;

while ( have_posts() ) : the_post();
  if ( $ss_settings['title_section_style'] == 'normal' ) {
    smallermobs_title_section();
    do_action( 'smallermobs_entry_meta' );
  };
  do_action( 'smallermobs_page_pre_content' );
	the_content();
	echo $ss_framework->clearfix();
	smallermobs_meta( 'cats' );
	smallermobs_meta( 'tags' );
	do_action( 'smallermobs_page_after_content' );

	wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) );
endwhile;
