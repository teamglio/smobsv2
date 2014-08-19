<?php
if ( ! function_exists( 'woocommerce_is_active' ) ) {
    function woocommerce_is_active() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
}

// Ensure cart contents update when products are added to the cart via AJAX.
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    
    ob_start();
    
    echo '<a class="btn btn-default cart-content" href="';
    echo $woocommerce->cart->get_cart_url();
    echo '"><span class="glyphicon glyphicon-shopping-cart"></span> Basket <span class="badge">';
    echo $woocommerce->cart->get_cart_total();
    echo '</span></a>';
    
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return $fragments;
    
}
?>