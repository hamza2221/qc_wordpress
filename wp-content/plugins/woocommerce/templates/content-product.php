<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>

<div class="col-md-4 product simpleCart_shelfItem text-center">
                <a href="<?php echo  get_the_permalink() ?>">
					<?php
						if ( has_post_thumbnail() ) {
							$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
							$image_link    = the_post_thumbnail_url( array(100, 300) );
							$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
								'title'	=> get_the_title( get_post_thumbnail_id() )
							) );

							$attachment_count = count( $product->get_gallery_attachment_ids() );

							if ( $attachment_count > 0 ) {
								$gallery = '[product-gallery]';
							} else {
								$gallery = '';
							} ?>

							<img src="<?php echo $image_link; ?>" />

						<?php } else {

							echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

						}
					?>
				</a>
                <div class="mask">
                    <a href="<?php echo get_the_permalink() ?>">Quick View</a>
                </div>
                <a class="product_name" href=""><?php echo the_title() ?></a>
                <p><a class="item_add" href=""><i></i> <span class="item_price"><?php echo $product->get_price_html(); ?></span></a></p>
</div>

