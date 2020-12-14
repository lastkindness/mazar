<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="<?php bloginfo( 'charset' ); ?>">

	    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" type="image/png">
   		<link href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" rel="apple-touch-icon">

		<?php wp_head(); ?>

		<script type="text/javascript">
	        WebFont.load({
	            google: {
	                families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic", "Merriweather:300,300italic,400,400italic,700,700italic,900,900italic", "Inconsolata:400,700",
	                    "Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
	                ]
	            }
	        });
	    </script>

	</head>

	<?php

		if( basename( get_page_template() ) == 'template-home.php' ){
			$custom_body_class = 'main-page' ;
		}elseif( basename( get_page_template() ) == 'template-learn.php' ) {
			$custom_body_class = 'learn-page' ;
		}elseif( basename( get_page_template() ) == 'template-contact.php' ) {
			$custom_body_class = 'contact-page' ;
		}elseif( basename( get_page_template() ) == 'template-story.php' ) {
			$custom_body_class = 'story-page' ;
		}elseif( basename( get_page_template() ) == 'template-partners.php' ) {
			$custom_body_class = 'partners-page' ;
		}
		else{
			$custom_body_class = '' ;
		}

		if( count(WC()->cart->get_cart()) > 0 ){

			$count_circle_style = 'display:block' ;
			$modal_available = '' ;
			$cart_link = 'href="' . wc_get_cart_url() . '"' ;

		}else{

			$count_circle_style = 'display:none' ;
			$modal_available = 'commerce-cart-open-link' ;
			$cart_link = '' ;

		}

	?>

	<body <?php body_class($custom_body_class); ?>>
		<header data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
		    <div data-node-type="commerce-cart-wrapper" class="w-commerce-commercecartwrapper cart" data-wf-page-link-href-prefix="" data-wf-cart-duration="250" data-wf-cart-type="modal" data-open-product="" data-wf-cart-query="" udesly-shopify-el="mini-cart">

		        <a <?php echo $cart_link ; ?> data-node-type="<?php echo $modal_available ; ?>" class="w-commerce-commercecartopenlink cart-button w-inline-block">

		            <div style="<?php echo $count_circle_style ; ?>" data-count-hide-rule="always" class="w-commerce-commercecartopenlinkcount cart-quantity" udesly-shopify-el="cart-count"><?php echo count(WC()->cart->get_cart()) ; ?></div>

		        </a>

		        <div data-node-type="commerce-cart-container-wrapper" style="display:none" class="w-commerce-commercecartcontainerwrapper w-commerce-commercecartcontainerwrapper--cartType-modal cart-wrapper">
		            <div data-node-type="commerce-cart-container" class="w-commerce-commercecartcontainer cart-container">
		                <div class="w-commerce-commercecartheader">
		                    <h4 class="w-commerce-commercecartheading heading-35"><?php pll_e('Your Cart'); ?></h4>
		                    <a href="#" data-node-type="commerce-cart-close-link" class="w-commerce-commercecartcloselink w-inline-block">
		                        <svg width="16px" height="16px" viewBox="0 0 16 16">
		                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		                                <g fill-rule="nonzero" fill="#333333">
		                                    <polygon points="6.23223305 8 0.616116524 13.6161165 2.38388348 15.3838835 8 9.76776695 13.6161165 15.3838835 15.3838835 13.6161165 9.76776695 8 15.3838835 2.38388348 13.6161165 0.616116524 8 6.23223305 2.38388348 0.616116524 0.616116524 2.38388348 6.23223305 8" />
		                                </g>
		                            </g>
		                        </svg>
		                    </a>
		                </div>
		                <div class="w-commerce-commercecartformwrapper">
		                    <form data-node-type="commerce-cart-form" style="display:none" class="w-commerce-commercecartform">
		                        <ul class="list-2" udesly-shopify-el="mini-cart-items">

		                        </ul>
		                    </form>

		                    <div class="w-commerce-commercecartemptystate" udesly-shopify-el="no-items-in-cart">
		                        <div><?php pll_e('No items found.'); ?></div>
		                    </div>

		                    <div style="display:none" data-node-type="commerce-cart-error" class="w-commerce-commercecarterrorstate">
		                        <div class="w-cart-error-msg" data-w-cart-quantity-error="Product is not available in this quantity." data-w-cart-checkout-error="Checkout is disabled on this site." data-w-cart-general-error="Something went wrong when adding this item to the cart."
		                             data-w-cart-cart_order_min-error="Cart failed.">Product is not available in this quantity.</div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="menu-button w-nav-button">
		        <img src="<?php echo get_template_directory_uri(); ?>/img/menu.png" width="50" alt="" class="icon">
		    </div>

		    <?php

		    	$header_image = get_field('header_image',pll_current_language('slug')) ;

		    ?>

		    <?php if( $header_image ) : ?>
			    <a href="<?php echo home_url(); ?>" class="brand w-nav-brand w--current">
			        <img src="<?php echo $header_image['url'] ; ?>" alt="<?php echo $header_image['alt'] ; ?>" class="logo">
			    </a>
			<?php endif ; ?>

		    <nav role="navigation" class="nav-menu w-nav-menu">

		    	<?php if( have_rows('header_menu',pll_current_language('slug')) ): ?>

                    <div class="nav-menu-wrap">

                        <?php while( have_rows('header_menu',pll_current_language('slug')) ) : the_row(); ?>

                            <?php

                                $link = get_sub_field('link') ;

                                if( $link ){
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                }

                            ?>

                            <?php if( $link_url && $link_title && $link ) : ?>

                                <a href="<?php echo $link_url ; ?>" class="nav-link w-nav-link" target="<?php echo $link_target ; ?>">
                                    <?php echo $link_title ; ?>
                                </a>

                            <?php endif ; ?>

                        <?php endwhile ; ?>

                    </div>

			    <?php endif ; ?>

			    <?php if ( function_exists( 'pll_the_languages' ) ) : ?>

			    	<?php

			    		$languages = pll_the_languages( array(
						    'display_names_as'       => 'slug',
						    'hide_if_no_translation' => 1,
						    'raw'                    => true
						));

			    	?>

			    	<?php if ( !empty( $languages ) && count( $languages ) > 1 ) : ?>

				        <div class="dropdown dropdown_native">
				            <div class="dropdown__wrapper js__dropdown">
				                <div class="dropdown__header">
				                    <div class="icon">
				                        <img src="<?php echo get_template_directory_uri(); ?>/img/internet 1.svg" alt="" class="icon">
				                    </div>
				                    <span class="dropdown__header-item" style="text-transform: uppercase;"><?php echo pll_current_language('slug') ; ?></span>
				                    <span class="arr"><i>▼</i></span>
				                </div>
				                <ul style="display: none;" class="dropdown__dropdown">
				                    <div class="dropdown__dropdown-wrapper">

				                    	<?php foreach ( $languages as $language ) : ?>

				                    		<?php

				                    			$id             = $language['id'];
											    $slug           = $language['slug'];
											    $url            = $language['url'];
											    $current        = $language['current_lang'] ? ' languages__item--current' : '';
											    $no_translation = $language['no_translation'];

				                    		?>

				                    		<?php if ( ! $no_translation ) : ?>

				                    			<li class="dropdown__item">
				                    				<a href="<?php echo $url ; ?>" class="dropdown__text"><?php echo $slug ; ?></a>
				                    			</li>

				                    		<?php endif ; ?>

				                    	<?php endforeach ; ?>

				                    </div>
				                </ul>
				            </div>
				        </div>

			    	<?php endif ; ?>

			    <?php endif ; ?>

		    </nav>
		</header>
