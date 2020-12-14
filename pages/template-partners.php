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
