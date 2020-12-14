<?php do_action( 'woocommerce_before_cart' ); ?>

	<div class="section-11">
	    <div class="cart-2">
	        <h1 class="heading-21"><?php esc_html_e( 'Cart', 'woocommerce' ); ?></h1>

	        <div class="w-form">

	        	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

	        		<?php do_action( 'woocommerce_before_cart_table' ); ?>

	        		<div class="cart-table">

	        			<div class="table-header w-hidden-tiny">
	                        <div class="table-header-data product">
	                            <p class="paragraph-3"><?php esc_html_e( 'Product', 'woocommerce' ); ?></p>
	                        </div>
	                        <div class="table-header-data">
	                            <p class="paragraph-3"><?php esc_html_e( 'Price', 'woocommerce' ); ?></p>
	                        </div>
	                        <div class="table-header-data">
	                            <p class="paragraph-3"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></p>
	                        </div>
	                        <div class="table-header-data">
	                            <p class="paragraph-3"><?php esc_html_e( 'Total', 'woocommerce' ); ?></p>
	                        </div>
	                    </div>

	                    <div class="collection-list-wrapper-4 w-dyn-list">

	                    	<?php do_action( 'woocommerce_before_cart_contents' ); ?>

	                    		<div class="collection-list-3 w-dyn-items">

	                    			<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) : ?>

	                    				<?php

	                    					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
											$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

	                    				?>

	                    				<?php if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) : ?>

	                    					<?php

	                    						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

	                    					?>

	                    					<div class="w-dyn-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
				                                <div class="table-row">
				                                    <div class="table-row-data product">

				                                    	<?php
															echo apply_filters(
																'woocommerce_cart_item_remove_link',
																sprintf(
																	'<a href="%s" class="remove remove-item w-inline-block" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img src="'.get_template_directory_uri().'/img/times-solid.svg" alt="" class="image-29"></a>',
																	esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
																	esc_html__( 'Remove this item', 'woocommerce' ),
																	esc_attr( $product_id ),
																	esc_attr( $_product->get_sku() )
																),
																$cart_item_key
															);
														?>

														<?php
															$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

															if ( ! $product_permalink ) {
																echo $thumbnail;
															} else {
																printf( '<a href="%s" class="link-block-4 w-inline-block">%s</a>', esc_url( $product_permalink ), $thumbnail );
															}
														?>

														<div class="div-block-7">
					                                        <?php
																if ( ! $product_permalink ) {
																	echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
																} else {
																	echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="link-5">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
																}

																do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

																echo wc_get_formatted_cart_item_data( $cart_item );

																if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
																	echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
																}
															?>
														</div>

				                                    </div>

				                                    <div class="table-row-data price">
				                                        <p class="paragraph-23">
					                                        <?php
																echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
															?>
				                                        </p>
				                                    </div>

				                                    <div class="table-row-data quantity">
				                                    	<?php
															if ( $_product->is_sold_individually() ) {
																$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
															} else {
																$product_quantity = woocommerce_quantity_input(
																	array(
																		'input_name'   => "cart[{$cart_item_key}][qty]",
																		'input_value'  => $cart_item['quantity'],
																		'max_value'    => $_product->get_max_purchase_quantity(),
																		'min_value'    => '0',
																		'product_name' => $_product->get_name(),
																	),
																	$_product,
																	false
																);
															}

															echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
														?>
				                                    </div>


				                                    <div class="table-row-data total">
				                                        <p class="paragraph-46">

				                                        	<?php
																echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
															?>

				                                        </p>
				                                    </div>

				                                </div>
				                            </div>

	                    				<?php endif ; ?>

	                    			<?php endforeach ; ?>

	                    			<?php do_action( 'woocommerce_cart_contents' ); ?>

	                    			<?php if ( wc_coupons_enabled() ) { ?>
										<div class="coupon">
											<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
											<?php do_action( 'woocommerce_cart_coupon' ); ?>
										</div>
									<?php } ?>

									<?php do_action( 'woocommerce_cart_actions' ); ?>

									<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

	                    		</div>

	                    	<?php do_action( 'woocommerce_after_cart_contents' ); ?>

	                    </div>

	        		</div>

	        		<?php do_action( 'woocommerce_after_cart_table' ); ?>

		        	<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

					<?php do_action( 'woocommerce_cart_collaterals' ); ?>

					<div class="cart-actions">
						<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
						<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="submit-button-10 w-button">
							<?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
						</a>
					</div>

	        	</form>


	        </div>

	    </div>
	</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
