		<footer class="footer">
		    <div class="footer-container fb-footer footer-top">

		    	<?php  

		    		$footer_social_title = get_field('footer_social_title',pll_current_language('slug')) ;
		    		$footer_social_text = get_field('footer_social_text',pll_current_language('slug')) ;

		    	?>

		    	<?php if( have_rows('footer_social',pll_current_language('slug')) || $footer_social_title || $footer_social_text ) : ?>
			        <div class="footer-follow">

			        	<?php if( $footer_social_title ) : ?>
				            <h5><?php echo $footer_social_title ; ?></h5>
				        <?php endif ; ?>

				        <?php if( $footer_social_text ) : ?>
				            <div class="subtitle"><?php echo $footer_social_text ; ?></div>
				        <?php endif ; ?>

		    			<?php if( have_rows('footer_social',pll_current_language('slug')) ): ?>

				            <ul class="social-list">

				            	<?php while( have_rows('footer_social',pll_current_language('slug')) ) : the_row(); ?>

					            	<?php  

					            		$url = get_sub_field('url') ;
					            		$icon = get_sub_field('icon') ;

					            	?>

					            	<?php if( $icon && $url ) : ?>
						                <li class="social-item">
						                    <a href="<?php echo $url ; ?>" target="_blank">
						                        <i class="icon icon-<?php echo $icon ; ?>"></i>
						                    </a>
						                </li>
						            <?php endif ; ?>

						        <?php endwhile ; ?>

				            </ul>

			    		<?php endif ; ?>

			        </div>
		        <?php endif ; ?>

		        <?php  

		        	$footer_contact_title = get_field('footer_contact_title',pll_current_language('slug')) ;
		        	$footer_contact_text = get_field('footer_contact_text',pll_current_language('slug')) ;
		        	$footer_contact_button = get_field('footer_contact_button',pll_current_language('slug')) ;
		        	$footer_contact_shortcode = get_field('footer_contact_shortcode',pll_current_language('slug')) ;

		        ?>

		        <?php if( $footer_contact_title || $footer_contact_text || $footer_contact_button ) : ?>

			        <div class="footer-help">

			        	<?php if( $footer_contact_title ) : ?>
				            <h5><?php echo $footer_contact_title ; ?></h5>
				        <?php endif ; ?>

				        <?php if( $footer_contact_text ) : ?>
				            <div class="subtitle"><?php echo $footer_contact_text ; ?></div>
				        <?php endif ; ?>

				        <?php if( $footer_contact_button && $footer_contact_shortcode ) : ?>
			            	<button class="btn" data-target="call"><?php echo $footer_contact_button ; ?></button>
			            <?php endif ; ?>

			        </div>

			    <?php endif ; ?>

			    <?php  

			    	$footer_subscribe_title = get_field('footer_subscribe_title',pll_current_language('slug')) ;
		        	$footer_subscribe_text = get_field('footer_subscribe_text',pll_current_language('slug')) ;
		        	$footer_subscribe_shortcode = get_field('footer_subscribe_shortcode',pll_current_language('slug')) ;

			    ?>

			    <?php if( $footer_subscribe_shortcode || $footer_subscribe_text || $footer_subscribe_title ) : ?>

			        <div class="footer-subscribe">

			        	<?php if( $footer_subscribe_title ) : ?>
			            	<h5><?php echo $footer_subscribe_title ; ?></h5>
			            <?php endif ; ?>

			            <?php if( $footer_subscribe_text ) : ?>
				            <div class="subtitle"><?php echo $footer_subscribe_text ; ?></div>
				        <?php endif ; ?>

			            <?php if( $footer_subscribe_shortcode ){ echo do_shortcode($footer_subscribe_shortcode) ; } ?>

			        </div>

			    <?php endif ; ?>

		    </div>

		    <?php  

		    	$footer_bottom_logo = get_field('footer_bottom_logo',pll_current_language('slug')) ;
		    	$footer_copyright_text = get_field('footer_copyright_text',pll_current_language('slug')) ;

		    ?>

		    <div class="footer-container fb-footer footer-bottom">

		    	<?php if( $footer_bottom_logo ) : ?>
			        <div class="div-block-128 footer-logo">
			            <a href="<?php echo home_url(); ?>" class="link-block-3 w-inline-block">
			                <img src="<?php echo $footer_bottom_logo['url'] ; ?>" alt="<?php echo $footer_bottom_logo['alt'] ; ?>" class="logo">
			            </a>
			        </div>
			    <?php endif ; ?>

			    <?php if( have_rows('footer_menu',pll_current_language('slug')) ): ?>

			        <div class="footer-menu">

			        	<?php while( have_rows('footer_menu',pll_current_language('slug')) ) : the_row(); ?>

			        		<?php  

			    				$link = get_sub_field('link') ;

			    				if( $link ){
			    					$link_url = $link['url'];
								    $link_title = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
			    				}

			    			?>

			    			<?php if( $link_url && $link_title && $link ) : ?>

					            <a href="<?php echo $link_url ; ?>" class="d-80-menu-item-wrapper w-inline-block" target="<?php echo $link_target ; ?>">
					                <div class="d-80-menu-item-text-2"><?php echo $link_title ; ?></div>
					            </a>

					        <?php endif ; ?>

				        <?php endwhile ; ?>

			        </div>

			    <?php endif ; ?>

		        <?php if( $footer_copyright_text ) : ?>

			        <div class="copyright">
			            <div class="text-block-77"><span class="text-span-2"><?php echo $footer_copyright_text ; ?></span></div>
			        </div>

			    <?php endif ; ?>

		    </div>
		</footer>

		<?php if( $footer_contact_shortcode ) : ?>

			<div class="popup-overlay">
			    <div data-target="popup-call" class="popup popup__call">

			        <?php echo do_shortcode( $footer_contact_shortcode ) ; ?>

			        <div class="close-btn close">
			            <div class="close-container">
			                <div class="leftright"></div>
			                <div class="rightleft"></div>
			                <div class="text"><?php pll_e('close'); ?></div>
			            </div>
			        </div>
			    </div>
			</div>

		<?php endif ; ?>

		<div data-target="popup-review" class="popup">
	        <form class="popup-content js_validate" enctype="multipart/form-data" id="feedback-form">
	            <div class="popup-header">
	                <h4 class="title"><?php pll_e('Leave feedback'); ?></h4>
	            </div>
  
	            <div class="input-container review-success-hide">
	            	<div class="photo">
                        <div class="render-img"></div>
                    </div>
                    <div class="btn btn--load-photo"><span><?php pll_e('Add Photo'); ?></span></div>
	            	<input type="file" name="profilepicture" style="display: none" accept=".jpg,.jpeg,.png,.svg" class="image-file-input">
	            </div>
	            <div class="input-container review-success-hide">
	                <label for="name-review" class="req"><?php pll_e('Name'); ?></label>
	                <input type="text" name="name" id="name-review" class="validate">
	            </div>
	            <div id="full-stars-example-two" class="review-success-hide">
	                <label><?php pll_e('Your Score'); ?></label>
	                <div class="rating-group">
	                    <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
	                    <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
	                    <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
	                    <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
	                    <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
	                    <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
	                    <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
	                    <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
	                    <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
	                    <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
	                    <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
	                </div>
	            </div>
	            <div class="input-container review-success-hide">
	                <label for="text-review" class="req"><?php pll_e('Your feedback'); ?></label>
	                <textarea type="text" id="text-review" class="validate"></textarea>
	            </div>
	            <div class="btn btn-feedback review-success-hide"><span><?php pll_e('Leave feedback'); ?></span></div>
	            
	            <div class="form-review--success" style="display: none;">
	            	<h4><?php pll_e('Thanks for your feedback! The review will appear after confirmation by the administrator.'); ?></h4>
	            </div>

	        </form>
	        <div class="close-btn close">
	            <div class="close-container">
	                <div class="leftright"></div>
	                <div class="rightleft"></div>
	                <div class="text"><?php pll_e('close'); ?></div>
	            </div>
	        </div>
	    </div>

		<?php wp_footer(); ?>
	</body>
</html>