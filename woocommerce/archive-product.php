<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * @author 		Smobs
 * @package 	WooCommerce/Templates
 * @version     2.0.1
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (woocommerce_is_active()) {
	global $post, $product;
	woocommerce_product_loop_start();
	echo '<div id="mxitup" class="row">';
	
	woocommerce_product_subcategories();

	while ( have_posts() ) : the_post();
		$image_id = get_post_thumbnail_id();
    	$image_src = wp_get_attachment_image_src($image_id,'shop_single', true);
    	$image_url = $image_src[0];
	echo '<div class="mix product">';
	?>
  	<div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	    	<div class="product-image">
	    		
	    	</div>
	    <a href="<?php the_permalink(); ?>" class="thumb-link">
	      <img src="<?php echo $image_url;?>" class="img-rounded" width="100%">
	    </a>
	      <div class="product-sale">On Promotion!</div>
	      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<p class="product-price badge"><?php echo $product->get_price_html(); ?></p>
			<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
			<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
			<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
		  </div>
	      <div class="caption">
	        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
	        <p>
	        <a href="#" class="btn btn-primary" role="button">Add to <span class="glyphicon glyphicon-shopping-cart"></span></a>
	        <a href="<?php the_permalink(); ?>" class="btn btn-default">Detail <span class="glyphicon glyphicon-picture"></span></a>
	        </p>
	      </div>
	    </div>
	</div>
	<?php
	//get_template_part( 'content', 'product' );
	echo '</div>';
	endwhile; // end of the loop.
	echo '</div>';
	woocommerce_product_loop_end();
}
?>