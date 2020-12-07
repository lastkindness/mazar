<?php get_header(); ?>
	
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="section-14">
		    <div class="div-block-141">
		        <h2><?php echo get_the_title() ; ?></h2>

		        <div class="rich-text-block-4 w-richtext">
		            <?php the_content() ; ?>
		        </div>
			    
		    </div>
		</div>
		
	<?php endwhile; ?>

<?php get_footer(); ?>