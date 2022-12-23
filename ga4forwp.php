<?php
/*
Plugin Name: Basic Google Analytics 4 for WP
Plugin URI: https://plugins.tehnoklik.ba/basic-google-analytics-4-for-wp
Description: Basic and lightweight plugin which connects to Google Analytics 4 and allows the administrators of website to enter the tracking ID.
Version: 1.0
Author: Žan Anđić, Tehnoklik
Author URI: https://tehnoklik.ba
License: GPL2
*/

//Require file with functions to register options page and menu item

require_once plugin_dir_path( __FILE__ ) . 'ga4-admin.php';

//Require file with function and HTML form (input field) where user can enter tracking ID

require_once plugin_dir_path( __FILE__ ) . 'ga4-admin-form.php';

//showing tracking ID in gtag snippet in head section of website

function ga4forwp_tracking_code() {
  $tracking_id = get_option( 'ga4forwp_tracking_id' );
  if ( ! empty( $tracking_id ) ) {
    $src = 'https://www.googletagmanager.com/gtag/js?id=' . esc_html( $tracking_id );
    wp_enqueue_script( 'ga4forwp-gtag', esc_url( $src ), array(), null, false );

    $script = "
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '" . esc_js( $tracking_id ) . "');
    ";
    wp_add_inline_script( 'ga4forwp-gtag', $script, 'after' );
  }
}
add_action( 'wp_enqueue_scripts', 'ga4forwp_tracking_code' );




