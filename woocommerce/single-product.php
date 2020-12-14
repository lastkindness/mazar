<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php

			$product = get_the_ID() ;
			$index_row = get_row_index() ;

		    $translation_ids = pll_get_post_translations( get_the_ID() );



		?>

		<div id="korb" class="section-23 product-holder korb" data-ix="show-bg-2" data-prod-id="<?php echo get_the_ID() ; ?>">
		    <div>
		        <div class="wrapper content">
		            <div class="grid">
		                <div class="block vertically-centered">

			                <?php if( get_the_post_thumbnail_url( $product, 'full' ) ) : ?>

			                    <img width="500px" height="auto" data-image-id="<?php echo $product ; ?>" src="<?php echo get_the_post_thumbnail_url( $product, 'full' ) ; ?>" alt="cbd oil for anxiety by Headery" class="cord image2 product-image">

			                <?php endif ; ?>

		                </div>
		                <div class="block _41">
		                    <h2 class="heading-3"><?php echo get_the_title($product) ; ?></h2>

		                    <?php if( get_the_excerpt( $product ) ) : ?>

			                    <div class="block-label"><?php echo get_the_excerpt( $product ) ; ?></div>

			                <?php endif ; ?>

		                    <div class="paragraph-45"><?php the_content() ; ?></div>

		                    <?php

		                    	$capacity_tax = get_the_terms( $product, 'pa_capacity' );

		                    ?>

		                    <?php if( is_array( $capacity_tax ) ) : ?>

			                    <div class="capacity">
			                        <span class="title"><?php pll_e('Capacity'); ?>:</span>
			                        <div class="dropdown dropdown_native">

			                        	<select name="capacity" class="capacity_select">
				                        	<?php foreach( $capacity_tax as $cur_term ) : ?>

				                        		<option value="<?php echo $cur_term->slug ; ?>"><?php echo $cur_term->name ; ?></option>

				                        	<?php endforeach ; ?>
				                        </select>

			                        </div>
			                    </div>
			                <?php endif ; ?>

		                    <?php

		                    	$flavour_tax = get_the_terms( $product, 'pa_flavour' );

		                    ?>

		                    <?php if( is_array( $flavour_tax ) ) : ?>

		                    	<?php $flavour_tax_counter = 1 ; ?>

			                    <div class="taste">

			                    	<?php foreach( $flavour_tax as $cur_term ) : ?>

			                    		<?php $cur_term_img = get_field('image_flavour', 'term_' . $cur_term->term_id) ; ?>

				                        <div class="input-wrapper">
				                            <input type="radio" class="taste_select" name="group-1" value="<?php echo $cur_term->slug ; ?>" <?php if( $flavour_tax_counter == 1 ) : ?> checked="checked" <?php endif ; ?>>
				                            <div class="border"></div>
				                            <img src="<?php echo $cur_term_img['url'] ; ?>" alt="<?php echo $cur_term_img['alt'] ; ?>">
				                        </div>

				                        <?php $flavour_tax_counter++ ; ?>
				                    <?php endforeach ; ?>

			                    </div>

			                <?php endif ; ?>

		                    <div class="quantity">
		                        <span class="title"><?php pll_e('quantity'); ?>:</span>
		                        <div class="input-number">
		                            <div class="input-number_arrow prev"></div>
		                            <input type="number" min="1" max="99" value="1" step="1" readonly class="input-number_input quantity_number">
		                            <div class="input-number_arrow next"></div>
		                        </div>
		                    </div>
		                    <div class="block-buy">
		                        <span class="price" data-price-id="<?php echo $product ; ?>">$79.99</span>
		                        <span class="d-66-button-wrapper w-inline-block ajax-add-card" data-product-id="<?php echo $product ; ?>">
		                            <div class="d-66-text-wrapper">
		                                <div class="d-66-btn-text"><?php pll_e('Add to cart'); ?></div>
		                            </div>
		                            <div class="d-66-icon-wrapper">
		                                <div class="d-66-cart-icon">&#xF217;</div>
		                            </div>
		                        </span>
		                    </div>

		                </div>
		                <div class="block _8"></div>
		            </div>
		        </div>
		    </div>
		</div>

		<?php

			$ci_image = get_field('ci_image') ;

		?>

		<?php if( $ci_image || have_rows('ci_items') ) : ?>

			<section class="product-advantages">
			    <div class="wrapper">
			        <div class="product-advantages__wrapper">
			            <div class="product-advantages__holder">
			                <div class="product-advantages__circle">

			                </div>

			                <?php if( $ci_image ) : ?>
				                <div class="product-advantages__image">
				                    <img src="<?php echo $ci_image['url'] ; ?>" alt="<?php echo $ci_image['alt'] ; ?>">
				                </div>
				            <?php endif ; ?>

			                <div class="product-advantages__icons">

			                	<?php while( have_rows('ci_items') ) : the_row(); ?>

			                		<?php

			                			$text = get_sub_field('text') ;
			                			$image = get_sub_field('image') ;

			                		?>

			                		<?php if( $image || $text ) : ?>
					                    <i class="icon">

					                    	<?php if( $image ) : ?>
					                        	<img src="<?php echo $image['url'] ; ?>" alt="<?php echo $image['alt'] ; ?>">
					                        <?php endif ; ?>

					                        <?php if( $text ) : ?>
					                        	<span><?php echo $text ; ?></span>
					                        <?php endif ; ?>

					                    </i>
					                <?php endif ; ?>

				                <?php endwhile ; ?>

			                </div>
			            </div>
			        </div>
			    </div>
			</section>

		<?php endif ; ?>

		<?php

			$gi_image = get_field('gi_image') ;
			$gi_content = get_field('gi_content') ;
			$gi_link = get_field('gi_link') ;

			if( $gi_link ){
				$link_url = $gi_link['url'];
			    $link_title = $gi_link['title'];
			    $link_target = $gi_link['target'] ? $gi_link['target'] : '_self';
			}

		?>

		<?php if( $gi_image || $gi_content ) : ?>

			<section class="product-information">
			    <div class="wrapper">
			        <div class="product-information__wrapper">

			        	<?php if( $gi_image ) : ?>
				            <div class="product-information__img">
				                <img src="<?php echo $gi_image['url'] ; ?>" alt="" title="<?php echo $gi_image['alt'] ; ?>">
				            </div>
				        <?php endif ; ?>

			            <div class="product-information__text">

				        	<?php if( $gi_content ){ echo $gi_content ; } ?>

				        	<?php if( $gi_link && $link_url && $link_title ) : ?>
			                	<a class="btn" href="<?php echo $link_url ; ?>" target="<?php echo $link_target ; ?>"><?php echo $link_title ; ?></a>
			                <?php endif ; ?>

			            </div>
			        </div>
			    </div>
			</section>

		<?php endif ; ?>

		<section class="reviews">
    		<div class="wrapper">

    			<?php

    				$count_reviews = 0 ;

    				if( have_rows('reviews') ){
    					while( have_rows('reviews') ) { the_row();
    						$approved = get_sub_field('approved') ;
    						if( $approved ){
    							$score = get_sub_field('score') ;
    							$score_total += $score ;
    							$count_reviews++ ;
    							$score_total_output = round( $score_total / $count_reviews ) ;
    						}
    					}
    				}

    			?>

    			<div class="reviews__wrapper">
		            <div class="reviews__header">
		                <div class="title">
		                    <h2><?php pll_e('Customer Reviews'); ?></h2>
		                    <button class="btn inverse" data-target="review"><?php pll_e('Write a Customer Review'); ?></button>
		                </div>
		                <div class="stars">
		                    <ul class="star-list">

		                    	<?php

			                    	for( $i = 1 ; $i < 6 ; $i++ ){

			                    		if( $i <= $score_total_output ) { ?>

			                    			<li class="star active"><i class="fa fa-star"></i></li>

			                    		<?php }else { ?>

			                    			<li class="star"><i class="fa fa-star"></i></li>

			                    		<?php }

			                    	}

		                    	?>

		                    </ul>
		                    <span><?php echo $count_reviews ; ?> <?php pll_e('Customer Reviews'); ?></span>

		                </div>
		            </div>
		        </div>

		        <?php if( have_rows('reviews') ) : ?>

			        <div class="reviews__list">

			        	<?php while( have_rows('reviews') ) : the_row(); ?>

			        		<?php

			        			$image = get_sub_field('image') ;
			        			$name = get_sub_field('name') ;
			        			$text = get_sub_field('text') ;
			        			$score = get_sub_field('score') ;
			        			$approved = get_sub_field('approved') ;

			        		?>

			        		<?php if( $approved ) : ?>
					        	<div class="reviews__item">

					        		<?php if( $image ) : ?>

						                <div class="reviews__item-portrait">
						                    <img src="<?php echo $image['url'] ; ?>" alt="<?php echo $image['alt'] ; ?>" title="portrait">
						                </div>

						            <?php endif ; ?>

					                <div class="reviews__item-content">
					                    <ul class="star-list">

					                    	<?php

						                    	for( $i = 1 ; $i < 6 ; $i++ ){

						                    		if( $i <= $score ) { ?>

						                    			<li class="star active"><i class="fa fa-star"></i></li>

						                    		<?php }else { ?>

						                    			<li class="star"><i class="fa fa-star"></i></li>

						                    		<?php }

						                    	}

					                    	?>

					                    </ul>
					                    <div class="title">
					                        <h6><?php echo $name ; ?></h6>
					                    </div>
					                    <div class="text">
					                        <p><?php echo $text ; ?></p>
					                    </div>
					                </div>
					            </div>
					        <?php endif ; ?>

				        <?php endwhile ; ?>

			        </div>

			    <?php endif ; ?>

    		</div>
    	</section>

	<?php endwhile; ?>
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

<?php
get_footer();

