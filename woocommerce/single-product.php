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
			        			$country = get_sub_field('country') ;
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

					                        <?php if( $country ) : ?>
                                            	<span class="flag-icon <?php echo $country ; ?>"></span>
                                            <?php endif ; ?>

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

<?php
get_footer();

