<?php
/*
Template Name: Learn Template
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

			<?php if( have_rows('tabs_items') ) : ?>

				<div class="learn-tub">
    				<div class="div-block-127">
      					<div class="tab-block">

      						<div class="tab_filter">
					          <ul class="tab_header">

					          	<?php while( have_rows('tabs_items') ) : the_row(); ?>

					          		<?php

					          			$title = get_sub_field('title') ;
					          			$content = get_sub_field('content') ;
					          			$list = get_sub_field('list') ;
					          			$index_row = get_row_index() ;

					          			if( $index_row == 1 ){
					          				$active_class = 'active' ;
					          			}else{
					          				$active_class = '' ;
					          			}

					          		?>

					          		<?php if( $title && $content ) : ?>
					            		<li class="title <?php echo $active_class ; ?>"><?php echo $title ; ?></li>
					            	<?php endif ; ?>

					            <?php endwhile ; ?>

					          </ul>
					        </div>

					        <div class="main_cont">

					        	<?php while( have_rows('tabs_items') ) : the_row(); ?>

					        		<?php

					          			$title = get_sub_field('title') ;
					          			$content = get_sub_field('content') ;
					          			$list = get_sub_field('list') ;
					          			$index_row = get_row_index() ;

					          			if( $index_row == 1 ){
					          				$active_style = 'display: block' ;
					          			}else{
					          				$active_style = 'display: none' ;
					          			}

					          		?>

					          		<?php if( $content || $list ) : ?>

					          			<div class="tab_body" style="<?php echo $active_style ; ?>">
								            <div class="content">
								            	<?php if( $content ){ echo $content ; } ?>
								            </div>
								            <div class="content">
								            	<?php if( $list ){ echo $list ; } ?>
								            </div>
								        </div>

					          		<?php endif ; ?>

					        	<?php endwhile ; ?>

					        </div>

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

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>
