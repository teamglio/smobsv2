<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    $GLOBALS['WooCommerce_isActive'] = true;
} else {
    $GLOBALS['WooCommerce_isActive'] = false;
}
?>