<?php
/*
Template Name: Contact Template
*/
get_header(); ?>

	<main>

		<?php while ( have_posts( ) ) : the_post(); ?>

			<?php

				$tb_title = get_field('tb_title') ;
				$tb_subtitle = get_field('tb_subtitle') ;
				$tb_link = get_field('tb_link') ;

				if( $tb_link ){
					$link_url = $tb_link['url'];
				    $link_title = $tb_link['title'];
				    $link_target = $tb_link['target'] ? $tb_link['target'] : '_self';
				}

			?>

			<?php if( $tb_title || $tb_subtitle ) : ?>
				<div class="profit-bar">
				    <div class="profit-bar__wrapper">
				      <div class="profit-bar__content">

				      	<?php if( $tb_title ) : ?>
				        	<div class="profit-bar__subtitle"><?php echo $tb_title ; ?></div>
				        <?php endif ; ?>

				        <?php if( $tb_subtitle ) : ?>
				        	<h1 class="profit-bar__title"><?php echo $tb_subtitle ; ?></h1>
				        <?php endif ; ?>
				      </div>

				    <?php if( $link_url && $link_title && $tb_link ) : ?>
				    	<a href="<?php echo $link_url ; ?>" target="<?php echo $link_target ; ?>" class="btn"><?php echo $link_title ; ?></a>
				    <?php endif ; ?>

				    </div>
				</div>
			<?php endif ; ?>

			<?php

				$cf_title = get_field('cf_title') ;
				$cf_text = get_field('cf_text') ;
				$cf_shortcode = get_field('cf_shortcode') ;

			?>

			<?php if( $cf_shortcode || $cf_title || $cf_text ) : ?>
				<div class="contacts">
				    <div class="div-block-127">
				      <div class="contacts__wrapper">

				      	<?php if( $cf_title ) : ?>
				        	<h1 class="contacts__title"><?php echo $cf_title ; ?></h1>
				        <?php endif ; ?>

				        <?php if( $cf_text ) : ?>
					        <p class="contacts__content"><?php echo $cf_text ; ?></p>
					    <?php endif ; ?>

					    <?php if( $cf_shortcode ){ echo do_shortcode($cf_shortcode) ; } ?>

				      </div>
				    </div>
				</div>
			<?php endif ; ?>

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

	</main>

<?php get_footer(); ?>
