<?php

global $ss_framework;

echo '<article '; post_class(); echo '>';

	do_action( 'smallermobs_in_article_top' );
	smallermobs_title_section( true, 'h2', true );
	if ( has_action( 'smallermobs_entry_meta_override' ) ) {
		do_action( 'smallermobs_entry_meta_override' );
	} else {
		do_action( 'smallermobs_entry_meta' );	
	}

	echo '<div class="entry-summary">';
		echo apply_filters( 'smallermobs_do_the_excerpt', get_the_excerpt() );
		echo $ss_framework->clearfix();
	echo '</div>';

	if ( has_action( 'smallermobs_entry_footer' ) ) {
		echo '<footer class="entry-footer">';
		do_action( 'smallermobs_entry_footer' );
		echo '</footer>';
	}

	do_action( 'smallermobs_in_article_bottom' );

echo '</article>';
