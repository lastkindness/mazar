<?php
// Theme functions

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

add_action('init', function() {
  pll_register_string('prime-capacity', 'Capacity');
  pll_register_string('prime-flavour', 'Flavour');
  pll_register_string('prime-your-cart', 'Your Cart');
  pll_register_string('prime-items-not-found', 'No items found.');
  pll_register_string('prime-close', 'close');
  pll_register_string('prime-quantity', 'quantity');
  pll_register_string('prime-add-cart', 'Add to cart');
  pll_register_string('prime-blog-title', 'Wellness');
  pll_register_string('prime-read-more', 'Read More');
  pll_register_string('prime-prev-page', 'Previous Page');
  pll_register_string('prime-next-page', 'Next Page');
  pll_register_string('prime-formulas', 'Formulas');
  pll_register_string('prime-bottle-size', 'Bottle Size');
  pll_register_string('prime-total-cbd', 'Total CBD');
  pll_register_string('prime-potency', 'Potency');
  pll_register_string('prime-specs', 'Specs');
  pll_register_string('prime-customer-reviews', 'Customer Reviews');
  pll_register_string('prime-customer-reviews-text', 'Write a Customer Review');
  pll_register_string('prime-name', 'Name');
  pll_register_string('prime-score', 'Your Score');
  pll_register_string('prime-feedback', 'Your feedback');
  pll_register_string('prime-leave-feedback', 'Leave feedback');
  pll_register_string('prime-add-photo', 'Add Photo');
  pll_register_string('prime-feedback-success', 'Thanks for your feedback! The review will appear after confirmation by the administrator.');
});

if( function_exists('acf_add_options_page') && current_user_can( 'theme_options_view' ) ) {
  
  $languages = pll_languages_list(array( 'hide_empty' => 0, 'fields' => 'slug' )) ;

	foreach ( $languages as $lang ) {
	    acf_add_options_page( array(
	      'page_title' => 'Theme Options (' . strtoupper( $lang ) . ')',
	      'menu_title' => __('Theme Options (' . strtoupper( $lang ) . ')', 'prime'),
	      'menu_slug'  => "theme-options-${lang}",
	      'post_id'    => $lang
	    ) );
	}

}

function add_to_cart(){

    check_ajax_referer('check_nonce', 'security') ;

    if ( isset( $_POST['capacity'] ) && isset( $_POST['taste'] ) && isset( $_POST['quantity'] ) && isset( $_POST['productId'] ) ){
        
		$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['productId']));

		$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);

    	$match_attributes =  array(
		    "attribute_pa_capacity" => $_POST['capacity'],
		    "attribute_pa_flavour" => $_POST['taste']
		);

		$data_store   = WC_Data_Store::load( 'product' );
		$variation_id = $data_store->find_matching_product_variation(
		  new \WC_Product( $product_id),$match_attributes
		);

		$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);

		$product_status = get_post_status($product_id);

		if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

            do_action('woocommerce_ajax_added_to_cart', $product_id);

            if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                wc_add_to_cart_message(array($product_id => $quantity), true);
            }

            WC_AJAX :: get_refreshed_fragments();

        }else {

            $data = array(
                'error' => true,
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

            echo wp_send_json($data);

        }

    }

die;

}

add_action('wp_ajax_addtocart', 'add_to_cart');
add_action('wp_ajax_nopriv_addtocart', 'add_to_cart');

function change_product_price(){

    check_ajax_referer('check_nonce', 'security') ;

    if ( isset( $_POST['capacity'] ) && isset( $_POST['taste'] ) && isset( $_POST['quantity'] ) && isset( $_POST['productId'] ) ){
        
		$product_id = $_POST['productId'] ;

		$match_attributes =  array(
		    "attribute_pa_capacity" => $_POST['capacity'],
		    "attribute_pa_flavour" => $_POST['taste']
		);

		$data_store   = WC_Data_Store::load( 'product' );
		$variation_id = $data_store->find_matching_product_variation(
		  new \WC_Product( $product_id),$match_attributes
		);

		$currency_symbol = get_woocommerce_currency_symbol();
		$price_iner = get_post_meta($variation_id, '_price', true);
		$price_full = $price_iner * $_POST['quantity']  ;

		echo $currency_symbol.$price_full ;

    }

die;

}

add_action('wp_ajax_changeprice', 'change_product_price');
add_action('wp_ajax_nopriv_changeprice', 'change_product_price');

function change_cart_number(){

    check_ajax_referer('check_nonce', 'security') ;

    $count_product = count(WC()->cart->get_cart()) ;

    $cart_link = wc_get_cart_url() ;

    $dataCart = array( 'number' => $count_product, 'link' => $cart_link ) ;

	echo json_encode( $dataCart ) ;

die;

}

add_action('wp_ajax_cartnumber', 'change_cart_number');
add_action('wp_ajax_nopriv_cartnumber', 'change_cart_number');

function change_product_image(){

    check_ajax_referer('check_nonce', 'security') ;

    if ( isset( $_POST['capacity'] ) && isset( $_POST['taste'] ) && isset( $_POST['productId'] ) ){

    	$product_id = $_POST['productId'] ;

		$match_attributes =  array(
		    "attribute_pa_capacity" => $_POST['capacity'],
		    "attribute_pa_flavour" => $_POST['taste']
		);

		$data_store   = WC_Data_Store::load( 'product' );
		$variation_id = $data_store->find_matching_product_variation(
		  new \WC_Product( $product_id),$match_attributes
		);

		$variation = wc_get_product($variation_id) ;
		$variation_img_url = wp_get_attachment_image_url( $variation->image_id, 'full' ) ;
		
		echo $variation_img_url ;

    }

die;

}

add_action('wp_ajax_changeimage', 'change_product_image');
add_action('wp_ajax_nopriv_changeimage', 'change_product_image');

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="submit-button-next-3 w-button"';
}

function set_review(){

    check_ajax_referer('check_nonce', 'security') ;

    if ( isset( $_POST['name'] ) && isset( $_POST['score'] ) && isset( $_POST['text'] ) && isset( $_POST['prod_id'] ) ){

      $translations_ids = pll_get_post_translations(absint($_POST['prod_id']));

      $value = array(
          'name'   => $_POST['name'],
          'text'  => $_POST['text'],
          'score'  => $_POST['score'],
          'approved'  => false,
      );

      if( $_FILES['main_image']['tmp_name'] != '' ){

        $wordpress_upload_dir = wp_upload_dir();

        $i = 1;
         
        $profilepicture = $_FILES['main_image'];
        $new_file_path = $wordpress_upload_dir['path'] . '/' . $profilepicture['name'];
        $new_file_mime = mime_content_type( $profilepicture['tmp_name'] );

        while( file_exists( $new_file_path ) ) {
          $i++;
          $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $profilepicture['name'];
        }

        if( move_uploaded_file( $profilepicture['tmp_name'], $new_file_path ) ) {
             
          $upload_id = wp_insert_attachment( array(
            'guid'           => $new_file_path, 
            'post_mime_type' => $new_file_mime,
            'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'] ),
            'post_content'   => '',
            'post_status'    => 'inherit'
          ), $new_file_path );
         
          require_once( ABSPATH . 'wp-admin/includes/image.php' );
         
          wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );

          $value['image'] = $upload_id ;
         
        }

      }else{

        $default_user_image = get_field('default_user_image',pll_current_language('slug')) ;
        $value['image'] = $default_user_image ;

      }

      foreach( $translations_ids as $page_id ){

        $count = 0 ;

        if( have_rows( 'reviews', $page_id ) ){
          while( have_rows( 'reviews', $page_id ) ) { 
            the_row(); 
            $count++ ;
          }
        }

        $next_row = $count + 1 ;

        update_row('reviews', $next_row, $value, $page_id);

      }

      echo 'Review has been added!' ;

    }

die;

}

add_action('wp_ajax_setreview', 'set_review');
add_action('wp_ajax_nopriv_setreview', 'set_review');