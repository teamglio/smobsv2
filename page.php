<?php

if ( ! has_action( 'smallermobs_content_page_override' ) ) {
	ss_get_template_part( 'templates/content', 'page' );
} else {
	do_action( 'smallermobs_content_page_override' );
}
