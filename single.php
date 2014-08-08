<?php

if ( ! has_action( 'smallermobs_content_single_override' ) ) {
	ss_get_template_part( 'templates/content', 'single' );
} else {
	do_action( 'smallermobs_content_single_override' );
}
