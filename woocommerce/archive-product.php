<?php

defined( 'ABSPATH' ) || exit;

get_header();

?>

    <div class="section-19">
        <div class="div-block-143">
            <h1 class="main-title"><?php pll_e('Formulas'); ?></h1>
            <div class="div-block-144">
                <div class="collection-list-wrapper-8 w-dyn-list container">
                    <div class="collection-list-8 w-dyn-items">

                        <?php
                        if ( woocommerce_product_loop() ) {

                        if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) : the_post(); ?>

                        <?php

                        $bottle_sizes = array() ;

                        $product_info = wc_get_product( get_the_ID() );
                        $capacity_tax = get_the_terms( get_the_ID(), 'pa_capacity' );

                        foreach( $capacity_tax as $cur_term ){

                            array_push( $bottle_sizes, $cur_term->name ) ;

                        }

                        $total_cbd = get_field('total_cbd') ;
                        $potency = get_field('potency') ;

                        ?>

                        <div class="collection-item-2 w-dyn-item">
                            <a href="<?php echo get_the_permalink() ; ?>" class="product-wrapper">
                                <?php if( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) : ?>

                                    <span class="link-block-2 w-inline-block">
                                        <?php the_post_thumbnail( get_the_ID(), 'full' ) ; ?>
                                    </span>
                                <?php endif ; ?>

                                <div class="div-block-109">
                                    <h3 class="head-product-card"><?php echo get_the_title() ; ?></h3>
                                    <p class="paragraph-20"><?php echo $product_info->get_price_html() ?></p>
                                </div>
                                <div class="div-block-154">
                                    <div class="paragraph-19">
                                        <?php the_content() ; ?>
                                        <div class="spec-box">
                                            <h3><?php pll_e('Specs'); ?>.</h3>
                                            <?php if( !empty( $bottle_sizes ) ) : ?>
                                                <p><span><?php pll_e('Bottle Size'); ?></span><span><?php echo implode(", ", $bottle_sizes); ?></span></p>
                                                <?php endif ; ?>

                                                <?php if( $total_cbd ) : ?>
                                                    <p><span><?php pll_e('Total CBD'); ?></span><span><?php echo $total_cbd ; ?></span></p>
                                                <?php endif ; ?>

                                                <?php if( $potency ) : ?>
                                                    <p><span><?php pll_e('Potency'); ?></span><span><?php echo $potency ; ?></span></p>
                                            <?php endif ; ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="div-block-111"></div>
                        </div>

                    <?php endwhile ;
                    }

                    }?>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

<?php get_footer(); ?>
