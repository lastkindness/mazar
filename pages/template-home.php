<?php
/*
Template Name: Home Template
*/
get_header(); ?>

	<?php while ( have_posts( ) ) : the_post(); ?>

		<?php  

			$hs_image = get_field('hs_image') ;
			$hs_title = get_field('hs_title') ;
			$hs_subtitle = get_field('hs_subtitle') ;

		?>

		<?php if( $hs_subtitle || $hs_title || $hs_image ) : ?>

			<div id="landing" class="section-23 first">
			    <div data-ix="hide-scroll-button-on-scroll"></div>
			    <div data-ix="fade-in-on-load" class="sticky full-opacity">

			    	<?php if( $hs_title ) : ?>
			        	<h1 class="heading-33 first" data-ix="fade-in-on-load"><?php echo $hs_title ; ?></h1>
			        <?php endif ; ?>

			        <?php if( $hs_subtitle ) : ?>
			        	<h2 class="heading-33 first" data-ix="fade-in-on-load"><?php echo $hs_subtitle ; ?></h2>
			        <?php endif ; ?>

			    </div>

			    <?php if( $hs_image ) : ?>
				    <a href="#" class="w-inline-block">
				        <img src="<?php echo $hs_image['url'] ; ?>" width="750" alt="Headery products" srcset="<?php echo $hs_image['url'] ; ?> 500w, <?php echo $hs_image['url'] ; ?> 800w, <?php echo $hs_image['url'] ; ?> 1080w, <?php echo $hs_image['url'] ; ?> 1483w" sizes="(max-width: 479px) 80vw, (max-width: 991px) 60vw, 750px" data-w-id="5e51f98e-66bd-3876-c8da-cfbc510019ed" class="bottles-hero">
				    </a>
				<?php endif ; ?>

			</div>

		<?php endif ; ?>

		<?php  

			$ts_title = get_field('ts_title') ;
			$ts_text = get_field('ts_text') ;
			$ts_show_heart = get_field('ts_show_heart') ;
			$iid_image = get_field('iid_image') ;

		?>

		<?php if( $ts_title || $ts_text || $iid_image || have_rows('iid_dots') ) : ?>
			<div id="intro" class="section-23 intro" data-ix="show-bg-1">
			    <div class="wrapper">
			        <div class="block">

			        	<?php if( $ts_title ) : ?>
				            <h2><?php echo $ts_title ; ?></h2>
				        <?php endif ; ?>

				        <?php if( $ts_text) : ?>
				            <p class="big-paragraph"><?php echo $ts_text ; ?> <?php if( $ts_show_heart ) : ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/green-heart_1f49.png"><?php endif ; ?></p>
				        <?php endif ; ?>

				        <?php if( have_rows('iid_dots') ) : ?>

				            <div class="full-img__wrapper">

				            	<?php if( $iid_image ) : ?>
				                	<img class="full-img" src="<?php echo $iid_image['url'] ; ?>" alt="<?php echo $iid_image['alt'] ; ?>">
				                <?php endif ; ?>

				                <?php while( have_rows('iid_dots') ) : the_row(); ?>

				                	<?php  

				                		$title = get_sub_field('title') ;
				                		$left = get_sub_field('left') ;
				                		$top = get_sub_field('top') ;
				                		$text_right = get_sub_field('text_right') ;

				                	?>

					                <div class="full-img__text right" style="left: <?php echo $left ; ?>px; top: <?php echo $top ; ?>px;">
					                    <span class="text">
					                        <?php echo $title ; ?>
					                    </span>
					                    <div class="add">
					                        +
					                    </div>
					                </div>

					            <?php endwhile ; ?>
				               
				            </div>

				        <?php endif ; ?>

			        </div>
			    </div>
			</div>
		<?php endif ; ?>

		<?php if( have_rows('ps_items') ) : ?>

			<?php while( have_rows('ps_items') ) : the_row(); ?>

				<?php  

					$title = get_sub_field('title') ;
					$product = get_sub_field('product') ;
					$index_row = get_row_index() ;

					if( $index_row % 3 == 1 ){

						$block_id = 'korb' ;
						$block_class = 'korb' ;
						$block_bg = 'show-bg-2' ;
						$block_img_width = '444px' ;

					}elseif( $index_row % 3 == 2 ) {

						$block_id = 'griff' ;
						$block_class = 'sticky-top' ;
						$block_bg = 'show-bg-3' ;
						$block_img_width = '595px' ;
						
					}else{

						$block_id = 'griff' ;
						$block_class = '' ;
						$block_bg = 'show-bg-5' ;
						$block_img_width = '444px' ;

					}

					$product_content = get_post($product)->post_content ;

				?>

				<div id="<?php echo $block_id ; ?>" class="section-23 product-holder <?php echo $block_class ; ?>" data-ix="<?php echo $block_bg ; ?>">
				    <div>
				        <div class="wrapper content">
				            <div class="grid">
				                <div class="block vertically-centered">

				                	<?php if( $title ) : ?>
					                    <div class="sticky">
					                        <h2 class="heading-34"><?php echo $title ; ?></h2>
					                    </div>
					                <?php endif ; ?>

					                <?php if( get_the_post_thumbnail_url( $product, 'full' ) ) : ?>
   
					                    <img width="<?php echo $block_img_width ; ?>" data-image-id="<?php echo $product ; ?>" height="auto" src="<?php echo get_the_post_thumbnail_url( $product, 'full' ) ; ?>" alt="cbd oil for anxiety by Headery" class="cord image2 product-image">

					                <?php endif ; ?>

				                </div>
				                <div class="block _41">
				                    <h2 class="heading-3"><?php echo get_the_title($product) ; ?></h2>

				                    <?php if( get_the_excerpt( $product ) ) : ?>

					                    <div class="block-label"><?php echo get_the_excerpt( $product ) ; ?></div>

					                <?php endif ; ?>

				                    <p class="paragraph-45"><?php echo $product_content ; ?></p>

				                    <?php  

				                    	$capacity_tax = get_the_terms( $product, 'pa_capacity' );

				                    ?>

				                    <?php if( is_array( $capacity_tax ) ) : ?>

				                    	<?php $capacity_tax_counter = 1 ; ?>

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
						                            <input type="radio" class="taste_select" name="group<?php echo $index_row ; ?>" value="<?php echo $cur_term->slug ; ?>" <?php if( $flavour_tax_counter == 1 ) : ?> checked="checked" <?php endif ; ?>>
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

			<?php endwhile ; ?>

			<div class="bkg">
			    <div class="bkg0"></div>
			    <div class="bkg1"></div>
			    <div class="bkg2"></div>
			    <div class="bkg4"></div>
			    <div class="bkg5"></div>
			</div>

		<?php endif ; ?>

		<?php  

			$faq_title = get_field('faq_title') ;
			$faq_text = get_field('faq_text') ;

		?>

		<?php if( $faq_title || $faq_text || have_rows('faq_items') ) : ?>

			<div id="FAQ" class="section faq-section">
	    		<div class="page-container faq-cointainer">

	    			<?php if( $faq_title ) : ?>

		    			<a data-w-id="1cedd390-880b-31ba-ed79-091268990acd" href="#" class="faq-question-wrap w-inline-block">
				            <h3 class="faq-question"><?php echo $faq_title ; ?></h3>
				        </a>

				    <?php endif ; ?>

				    <?php if( $faq_text ) : ?>

        				<div class="faq-answer"><?php echo $faq_text ; ?></div>

        			<?php endif ; ?>

        			<?php if( have_rows('faq_items') ) : ?>

						<?php while( have_rows('faq_items') ) : the_row(); ?>

							<?php  

								$title = get_sub_field('title') ;
								$text = get_sub_field('text') ;

							?>

							<?php if( $text && $title ) : ?>

								<div class="faq-wrap">
						            <a data-w-id="82cdd169-f24a-3303-cc55-106d2d03cdd1" href="#" class="faq-question-wrap w-inline-block">
						                <h3 class="faq-question"><strong><?php echo $title ; ?></strong></h3>
						            </a>
						            <div style="display:none;-webkit-transform:translate3d(0, 50PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 50PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 50PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 50PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
						               class="faq-answer"><?php echo $text ; ?></div>
						        </div>

							<?php endif ; ?>

						<?php endwhile ; ?>

					<?php endif ; ?>

	    		</div>
	    	</div>

	    <?php endif ; ?>

	<?php endwhile; ?>

<?php get_footer(); ?>