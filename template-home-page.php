<?php
/*
Template Name: Home Page
*/

global $ss_framework;
echo '<div class="row">';
dynamic_sidebar( 'home-page-widgets-area' );
echo '</div>';

while ( have_posts() ) : the_post();
    //smallermobs_title_section();
    the_content();
    echo $ss_framework->clearfix();
    do_action( 'smallermobs_page_after_content' );

    wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) );
endwhile;
