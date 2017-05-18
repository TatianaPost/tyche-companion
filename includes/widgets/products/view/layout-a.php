<?php
/**
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Tyche_Companion
 * @subpackage Tyche_Companion/includes
 */

wp_enqueue_script( 'owlCarousel-js' );
wp_enqueue_style( 'owlCarousel-main-css' );
wp_enqueue_style( 'owlCarousel-theme-css' );


$posts = Tyche_Companion_Helper::get_products( $params ); ?>

<div class="row tyche-product-slider-container">
    <div class="tyche-product-slider-navigation hidden-xs">
        <a class="prev" href="#"><i class="fa fa-angle-left"></i></a>
        <a class="next" href="#"><i class="fa fa-angle-right"></i></a>
    </div>
    <div class="col-sm-3 hidden-xs">
        <div class="tyche-companion-banner" style="background-image:url('<?php echo $params['image'] ?>')">
            <div class="tyche-companion-banner-caption">
				<?php if ( ! empty( $params['first_line'] ) ): ?>
                    <span class="first_line"> <?php echo $params['first_line'] ?> </span>
				<?php endif; ?>
				<?php if ( ! empty( $params['second_line'] ) ): ?>
                    <span class="second_line"> <?php echo $params['second_line'] ?> </span>
				<?php endif; ?>
				<?php if ( ! empty( $params['third_line'] ) ): ?>
                    <span class="third_line"> <?php echo $params['third_line'] ?> </span>
				<?php endif; ?>
				<?php if ( ! empty( $params['button_label'] && ! empty( $params['button_link'] ) ) ): ?>
                    <a href="<?php echo $params['button_link'] ?>"><?php echo $params['button_label'] ?></a>
				<?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-9 col-xs-12">
        <div class="owl-carousel tyche-product-slider" data-attr-elements="3">
			<?php while ( $posts->have_posts() ) : $posts->the_post();
				global $product;
				global $post; ?>
                <div class="item">
                    <div
                            class="tyche-product <?php echo esc_attr( ! empty( $params['color'] ) ? $params['color'] : '' ) ?>">
                        <div class="tyche-product-image">
							<?php if ( $product->is_on_sale() ) : ?>

								<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>

							<?php endif; ?>

							<?php
							$image = '<img src="' . get_template_directory_uri() . '/assets/images/product-placeholder.jpg" />';
							if ( has_post_thumbnail() ) {
								$image = woocommerce_get_product_thumbnail();
							};
							echo $image;
							?>
                        </div>
                        <div class="tyche-product-body">
                            <h3><?php woocommerce_template_loop_product_link_open() ?><?php echo get_the_title(); ?><?php woocommerce_template_loop_product_link_close() ?></h3>

							<?php if ( $rating_html = wc_get_rating_html( $product->get_average_rating() ) ) : ?>
								<?php echo $rating_html; ?>
							<?php endif; ?>


							<?php if ( $price_html = $product->get_price_html() ) : ?>
                                <span class="price"><?php echo $price_html; ?></span>
							<?php endif; ?>

							<?php echo apply_filters(
								'woocommerce_loop_add_to_cart_link',
								sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><span class="fa fa-shopping-cart"></span> %s</a>',
								         esc_url( $product->add_to_cart_url() ),
								         esc_attr( isset( $quantity ) ? $quantity : 1 ),
								         esc_attr( $product->get_id() ),
								         esc_attr( $product->get_sku() ),
								         esc_attr( ! empty( $params['color'] ) ? 'ajax_add_to_cart add_to_cart_button button ' . $params['color'] : 'ajax_add_to_cart add_to_cart_button button' ),
								         esc_html( $product->add_to_cart_text() )
								),
								$product ); ?>
                        </div>

                    </div>
                </div>
			<?php endwhile; ?>
        </div>
    </div>
</div>
