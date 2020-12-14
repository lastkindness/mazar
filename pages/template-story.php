<?php
/*
Template Name: Out Story Template
*/
get_header(); ?>

	<?php while ( have_posts( ) ) : the_post(); ?>

		<?php $text_content = get_field('text_content') ; ?>

		<div class="section-14">
		    <div class="div-block-141">
		        <h2><?php echo get_the_title() ; ?></h2>

		        <?php if( $text_content ) : ?>
			        <div class="rich-text-block-4 w-richtext">
			            <?php echo $text_content ; ?>
			        </div>
			    <?php endif ; ?>

		    </div>
		</div>

	<?php endwhile ; ?>

<?php get_footer(); ?>

