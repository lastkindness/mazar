<?php
/*
Template Name: Partners Template
*/
get_header(); ?>

	<?php while ( have_posts( ) ) : the_post(); ?>

		<?php

			$pi_title = get_field('pi_title') ;
			$pi_text = get_field('pi_text') ;
			$pi_image = get_field('pi_image') ;
			$pi_link = get_field('pi_link') ;

			if( $pi_link ){
				$link_url = $pi_link['url'];
			    $link_title = $pi_link['title'];
			    $link_target = $pi_link['target'] ? $pi_link['target'] : '_self';
			}

		?>

		<div class="section-9">
		    <div class="div-block-127">

		    	<?php if( $pi_title || $pi_text || $pi_image ) : ?>

			      <div class="profit">
			        <div class="profit__content">

			        	<?php if( $pi_title ) : ?>
			          		<div class="profit__subtitle"><?php echo $pi_title ; ?></div>
			          	<?php endif ; ?>

			          	<?php if( $pi_text ) : ?>
			          		<h1 class="profit__title"><?php echo $pi_text ; ?></h1>
			          	<?php endif ; ?>

			          	<?php if( $link_url && $link_title && $pi_link ) : ?>
			          		<a class="btn inverse" target="<?php echo $link_target ; ?>" href="<?php echo $link_url ; ?>"><?php echo $link_title ; ?></a>
			          	<?php endif ; ?>

			        </div>

			        <?php if( $pi_image ) : ?>
				        <div class="profit__img">
				          <img src="<?php echo $pi_image['url'] ; ?>" alt="<?php echo $pi_image['alt'] ; ?>">
				        </div>
				    <?php endif ; ?>

			      </div>

		    	<?php endif ; ?>

		    	<?php

		    		$pw_title = get_field('pw_title') ;

		    	?>

		    	<?php if( have_rows('pw_items') ): ?>

				    <div class="how">

				    	<?php if( $pw_title ) : ?>
					        <h2 class="how__title"><?php echo $pw_title ; ?></h2>
					    <?php endif ; ?>

				        <div class="how__grid">

				        	<?php while ( have_rows('pw_items') ) : the_row(); ?>

				        		<?php

				        			$image = get_sub_field('image') ;
				        			$title = get_sub_field('title') ;
				        			$text = get_sub_field('text') ;
				        			$link = get_sub_field('link') ;

									if( $link ){
										$link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
									}

				        		?>

				        		<?php if( $image || $title || $text ) : ?>

						          	<div class="how__item">
							            <div class="content">

							            	<?php if( $image ) : ?>
							              		<div class="img"><img src="<?php echo $image['url'] ; ?>" alt="<?php echo $image['alt'] ; ?>"></div>
							              	<?php endif ; ?>

							              	<?php if( $title ) : ?>
								            	<div class="title"><?php echo $title ; ?></div>
								          	<?php endif ; ?>

								          	<?php if( $text ) : ?>
									            <div class="text">
									            	<?php echo $text ; ?>
									            </div>
									        <?php endif ; ?>

							            </div>

							            <?php if( $link_url && $link_title && $link ) : ?>
							            	<a class="link" target="<?php echo $link_target ; ?>" href="<?php echo $link_url ; ?>"><?php echo $link_title ; ?></a>
							            <?php endif ; ?>

						          	</div>

						        <?php endif ; ?>

					        <?php endwhile ; ?>

				        </div>

				    </div>

				<?php endif ; ?>

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

		<?php if( have_rows('bottom_navigation_items') ): ?>

			<div class="nav-sub">
			    <div class="div-block-127">
			    	<div class="nav-sub__wrapper">

						<ul class="nav-sub__grid">

				    		<?php while ( have_rows('bottom_navigation_items') ) : the_row(); ?>

				    			<?php if( get_row_layout() == 'menu_block' ) : ?>

				    				<?php

				    					$menu_title = get_sub_field('menu_title') ;

				    				?>

						        	<li class="nav-sub__item">
							            <ul>

							            	<?php if( $menu_title ) : ?>
							              		<li class="title"><?php echo $menu_title ; ?></li>
							              	<?php endif ; ?>

							              	<?php if( have_rows('menu_items') ) : ?>
							              		<?php while( have_rows('menu_items') ) : the_row(); ?>

							              			<?php

							              				$link = get_sub_field('link') ;

							              				if( $link ){
															$link_url = $link['url'];
														    $link_title = $link['title'];
														    $link_target = $link['target'] ? $link['target'] : '_self';
														}

							              			?>

							              			<?php if( $link_url && $link_title && $link ) : ?>

								              			<li><a href="<?php echo $link_url ; ?>" target="<?php echo $link_target ; ?>"><?php echo $link_title ; ?></a></li>

								              		<?php endif ; ?>

								              	<?php endwhile ; ?>
							              	<?php endif ; ?>

							            </ul>
						        	</li>

							    <?php endif ; ?>

						    <?php endwhile ; ?>

						</ul>

			    	</div>
			    </div>
			</div>

		<?php endif ; ?>

	<?php endwhile ; ?>

<?php get_footer(); ?>
