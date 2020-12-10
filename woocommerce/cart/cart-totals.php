<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="cart-details">
    <div class="cart-details-line">
        <p class="paragraph-9"><?php esc_html_e( 'Total', 'woocommerce' ); ?>: </p>
        <p class="paragraph-10" udesly-data="cart-total"><?php wc_cart_totals_order_total_html(); ?></p>
    </div>
</div>