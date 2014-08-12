<?php
if ( ! function_exists( 'woocommerce_is_active' ) ) {
    function woocommerce_is_active() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
}
?>