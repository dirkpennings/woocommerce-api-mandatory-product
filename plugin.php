<?php
/**
 * Plugin Name: JSON REST API WooCommerce mandatory product
 * Description: Adds mandatory information to the WooCommerce API
 * Author: Dirk Pennings<dirkpennings@gmail.com>
 * Author URI: https://dirk.me
 * Version: 0.1
 * Plugin URI: https://github.com/dirkpennings/woocommerce-api-mandatory-product
 */

function wc_api_mandatory_product($product) {
	$product['mandatory'] = metadata_exists( 'post', $product['id'], 'mandatory' ) ? (int) get_post_meta( $product['id'], 'mandatory', true ) : 0;

	return $product;
}

add_filter('woocommerce_api_product_response', 'wc_api_mandatory_product', 10, 3);
