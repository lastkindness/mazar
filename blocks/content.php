<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="title">
			<?php if ( is_single() ) :
				the_title( '<h1>', '</h1>' );
			else :
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>	

			<?php if ( is_single() ) : ?>
				<p class="meta-info">
					<a href="<?php echo get_date_archive_link() ?>" rel="bookmark">
						 <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
						  <?php the_time( 'F jS, Y' ) ?>
						 </time>
					</a>
					<?php _e( 'by', 'prime' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
				</p>
			<?php endif ; ?>
	</div>
	<div class="content">
		<?php the_post_thumbnail( 'full' ); ?>
		<?php the_excerpt(); ?>
	</div>
	<?php wp_link_pages(); ?>

	<?php if ( is_single() ) : ?>
		<div class="meta">
			<ul>
				<li><?php _e( 'Posted in', 'prime' ); ?> <?php the_category( ', ' ) ?></li>
				<li><?php comments_popup_link( __( 'No Comments', 'prime' ), __( '1 Comment', 'prime' ), __( '% Comments', 'prime' ) ); ?></li>
				<?php the_tags( __( '<li>Tags: ', 'prime' ), ', ', '</li>' ); ?>
				<?php edit_post_link( __( 'Edit', 'prime' ), '<li>', '</li>' ); ?>
			</ul>
		</div>
	<?php endif ; ?>
</div>
