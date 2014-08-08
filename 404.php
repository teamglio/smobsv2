<?php

global $ss_framework;

ss_get_template_part('templates/page', 'header');

$alert_message = __( 'Sorry, but the page you were trying to view does not exist.', 'smallermobs' );
echo $ss_framework->alert( $type = 'warning', $alert_message );
?>

<p><?php _e( 'It looks like this was the result of either:', 'smallermobs' ); ?></p>
<ul>
	<li><?php _e( 'a mistyped address', 'smallermobs' ); ?></li>
	<li><?php _e( 'an out-of-date link', 'smallermobs' ); ?></li>
</ul>
<?php get_search_form();