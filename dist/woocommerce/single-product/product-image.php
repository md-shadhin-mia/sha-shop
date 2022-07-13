<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

use function PHPSTORM_META\map;

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

function get_image_urls($item){
	return wp_get_attachment_url($item);
}
?>

<?php 
// var_dump($wrapper_classes);
// var_dump($attachment_ids);

?>

<div class="p-2 w-full md:w-1/2">
	<div class="zoom-preview">
		<div class="preview-container">
		</div>
	</div>
	<div class="swiper product-gallery">
		<div class="swiper-wrapper">
			<div class="swiper-slide"><?php echo wc_get_gallery_image_html( $post_thumbnail_id, true )?></div>
			<?php foreach($attachment_ids as $at_id){
				echo '<div class="swiper-slide">'.wc_get_gallery_image_html($at_id).'</div>';
			}?>
		</div>

		<div class="pagination flex justify-center py-2"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>

	<div class="swiper gallery-Thumnail">
		<div class="swiper-wrapper">
			<div class="swiper-slide"><?php echo wp_get_attachment_image( $post_thumbnail_id, true )?></div>
			<?php foreach($attachment_ids as $at_id){
				echo '<div class="swiper-slide">'.wp_get_attachment_image($at_id).'</div>';
			}?>
		</div>
	</div>
</div>
