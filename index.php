<?php get_header(); ?>

	<div class="section-22">
	    <div class="div-block-158">
	        <div class="text-wrapper">
	            <h1 class="heading-27"><?php pll_e('Wellness'); ?></h1>
	        </div>
	    </div>
	</div>
	
	<?php if ( have_posts() ) : ?>

		<div class="section-18">
    		<div class="blog-container">

	        	<div class="collection-list-wrapper w-dyn-list">

		           	<div class="collection-list w-dyn-items">

						<?php while ( have_posts() ) : the_post(); ?>

							<div class="collection-item w-dyn-item">
			                    <div class="post-wrapper">
			                        <div class="author-wrapper-post-card-3">
			                            <div class="div-block-117">
			                                <p class="paragraph-23"><?php echo get_the_date('D, M d, y') ; ?></p>
			                            </div>
			                        </div>
			                        <div class="post-wrapper__content">
			                            <div class="post-wrapper__text">
			                                <div class="div-block-114">
			                                    <h2 class="heading-30" udesly-data="title"><?php echo get_the_title() ; ?></h2>
			                                </div>
			                                <div class="div-block-157">
			                                    <?php the_excerpt() ; ?>
			                                </div>
			                            </div>
			                            <div class="read-more-wrapper"><a href="<?php echo get_permalink() ; ?>" class="link-15 w-button"><?php pll_e('Read More'); ?></a></div>
			                        </div>
			                    </div>
			                </div>
							
						<?php endwhile; ?>

					</div>

				</div>

				<div class="div-block-140">

		            <?php echo get_previous_posts_link( __( pll__('Previous Page'), 'prime' ) ); ?>
		            <?php echo get_next_posts_link( __( pll__('Next Page'), 'prime' ) ); ?>

		        </div>

			</div>
		</div>

	<?php endif; ?>


<?php get_footer(); ?>