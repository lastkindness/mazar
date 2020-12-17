<?php
// Theme css & js

function base_scripts_styles() {
	$in_footer = true;

	wp_deregister_script( 'comment-reply' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', get_template_directory_uri() . '/js/comment-reply.js', '', '', $in_footer );
	}

	// Loads our main stylesheet.
	wp_enqueue_style( 'base-style', get_stylesheet_uri(), array() );

	// Implementation stylesheet.
	wp_enqueue_style( 'base-theme', get_template_directory_uri() . '/theme.css', array() );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array() );
	wp_enqueue_style( 'webflow', get_template_directory_uri() . '/css/webflow.css', array() );
	wp_enqueue_style( 'headery', get_template_directory_uri() . '/css/headery.webflow.css', array() );
    wp_enqueue_style( 'select2-min', get_template_directory_uri() . '/css/select2.min.css', array() );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'icon-flags', get_template_directory_uri() . '/css/flag-icon.min.css', array() );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array() );

    // Loads JavaScript file with functionality specific.
    wp_enqueue_script( 'jquery3-4-1', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '', '', $in_footer );
    wp_enqueue_script( 'select2-min', get_template_directory_uri() . '/js/select2.min.js', '', '', $in_footer );
    wp_enqueue_script( 'webfont-js', get_template_directory_uri() . '/js/webfont.js' );
    wp_enqueue_script( 'webflow-js', get_template_directory_uri() . '/js/webflow.js', '', '', $in_footer );
    wp_enqueue_script( 'udesly-shopify', get_template_directory_uri() . '/js/udesly-shopify.js', '', '', $in_footer );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '', $in_footer );
    wp_enqueue_script( 'cookie-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', '', '', $in_footer );

	//ajax_filter js
    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom-theme.js', array('jquery'), '', $in_footer );

    $localize_params_filter = array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
        'ajax_nonce' => wp_create_nonce('check_nonce'),
    ) ;

    wp_localize_script( 'custom-js', 'filter_params', $localize_params_filter );

    wp_enqueue_script( 'custom-js' );

}
add_action( 'wp_enqueue_scripts', 'base_scripts_styles' );
