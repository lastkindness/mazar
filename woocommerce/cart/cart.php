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
    <div class="div-block-163 light-dark-theme-switch">
        <div class="switch-section">
            <div class="switchbox">
                <div class="html-embed w-embed">
                    <!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
                    <svg width="387px" height="149px" viewBox="0 0 387 149" version="1.1" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink">

                        <!--  Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch  -->
                        <desc>Created with Sketch.</desc>
                        <defs />
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" fill-opacity="0.149094203">
                            <path d="M307.760386,-34.2087352 C308.566217,-34.2468125 309.377486,-34.2660659 310.193812,-34.2660659 C338.636476,-34.2660659 362.446937,-10.8927427 362.446937,17.6871982 C362.446937,46.2671391 338.517214,69.012897 310.074549,69.012897 C309.199678,69.012897 308.330727,68.9913767 307.46816,68.9488282 L307.467955,69.0212242 C229.085938,68.814045 155.095455,116.342924 125.335434,193.870429 L125.273006,193.846465 C125.270783,193.852262 125.268559,193.858059 125.266334,193.863856 C114.974434,220.675172 84.9658181,234.073525 58.154502,223.781625 C31.3431859,213.489725 17.9515532,183.411626 28.2434532,156.60031 C28.2687135,156.534504 28.2940931,156.46878 28.3195915,156.403136 C74.1649932,37.8008262 187.653624,-34.7956944 307.760407,-34.2163102 Z"
                                  id="Combined-Shape-Copy-2" fill="#1A73AC" transform="translate(193.611275, 96.491253) rotate(34.000000) translate(-193.611275, -96.491253) " />
                        </g>
                    </svg>
                    <div class="switchbox-title">
                        <span class="light">Light theme</span>
                        <span class="dark">Dark theme</span>
                    </div>
                </div>
            </div>
            <div class="sundial">
                <div class="moon"></div>
                <div class="sun-div">
                    <svg width="412" height="209" viewBox="0 0 209 209" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.35" d="M104.749 178.047C145.374 178.047 178.307 145.114 178.307 104.49C178.307 63.865 145.374 30.9321 104.749 30.9321C64.1243 30.9321 31.1914 63.865 31.1914 104.49C31.1914 145.114 64.1243 178.047 104.749 178.047Z" fill="#F7F0A1"/>
                        <path d="M105.488 49.1981L114.256 38.7247C114.987 37.7504 116.692 37.994 117.179 39.2118L122.294 51.8774L133.985 44.5703C134.96 43.8396 136.421 44.5703 136.665 45.7882L137.639 59.428L151.035 56.0181C152.253 55.7745 153.471 56.7487 152.984 57.9666L149.574 71.3628L163.214 72.3371C164.431 72.3371 165.162 73.7985 164.431 75.0164L157.124 86.7076L169.79 91.8226C171.008 92.3097 171.251 93.7711 170.277 94.7454L159.804 103.514L170.277 112.282C171.251 113.013 171.008 114.718 169.79 115.205L157.124 120.32L164.431 132.011C165.162 132.986 164.431 134.447 163.214 134.691L149.574 135.665L152.984 149.061C153.227 150.279 152.253 151.497 151.035 151.01L137.639 147.6L136.665 161.24C136.665 162.457 135.203 163.188 133.985 162.457L122.294 155.15L117.179 167.816C116.692 169.034 115.231 169.277 114.256 168.303L105.488 157.83L96.7196 168.303C95.9888 169.277 94.2838 169.034 93.7967 167.816L88.6818 155.15L76.9905 162.457C76.0162 163.188 74.5548 162.457 74.3112 161.24L73.337 147.6L59.9407 151.01C58.7229 151.253 57.5051 150.279 57.9922 149.061L61.4021 135.665L47.7623 134.691C46.5445 134.691 45.8138 133.229 46.5445 132.011L53.8515 120.32L41.186 115.205C39.9681 114.718 39.7246 113.257 40.6988 112.282L51.1723 103.514L40.6988 94.7454C39.7246 94.0147 39.9681 92.3097 41.186 91.8226L53.8515 86.7076L46.5445 75.0164C45.8138 74.0421 46.5445 72.5807 47.7623 72.3371L61.4021 71.3628L57.9922 57.9666C57.7486 56.7487 58.7229 55.5309 59.9407 56.0181L73.337 59.428L74.3112 45.7882C74.3112 44.5703 75.7727 43.8396 76.9905 44.5703L88.6818 51.8774L93.7967 39.2118C94.2838 37.994 95.7453 37.7504 96.7196 38.7247L105.488 49.1981Z" fill="#FFC936"/>
                        <path d="M114.985 120.566C131.304 97.1839 121.805 74.532 106.947 55.5337C106.46 55.5337 106.216 55.5337 105.729 55.5337C79.1801 55.5337 57.7461 76.9677 57.7461 103.517C57.7461 123.489 69.9245 140.539 87.2178 147.846C97.6913 141.026 107.19 132.014 114.985 120.566Z" fill="#FFF15C"/>
                        <path d="M106.699 55.5337C121.8 74.532 131.3 96.9403 114.737 120.566C106.943 132.258 97.4436 141.026 86.7266 147.846C92.5722 150.282 98.6614 151.5 105.481 151.5C132.03 151.5 153.464 130.066 153.464 103.517C153.464 77.4549 132.761 56.0208 106.699 55.5337Z" fill="#F7E843"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

<?php do_action( 'woocommerce_after_cart' ); ?>
