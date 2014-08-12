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
	woocommerce_product_loop_start();
	echo '<div id="mxitup" class="row">';
	woocommerce_product_subcategories();

	while ( have_posts() ) : the_post();
		$image_id = get_post_thumbnail_id();
    	$image_src = wp_get_attachment_image_src($image_id,'full', true);
    	$image_url = $image_src[0];
	echo '<div class="mix product">';
	?>
  	<div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="<?php echo $image_url;?>" class="img-rounded">
	      <div class="caption">
	        <h3>Product label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
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