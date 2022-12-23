<?php

//register new menu item in WordPress dashboard and options page for plugin

function ga4forwp_options_page() {
  add_options_page(
    'Google Analytics',
    'Google Analytics',
    'manage_options',
    'ga4forwp-plugin',
    'ga4forwp_options_page_html'
  );
}
add_action( 'admin_menu', 'ga4forwp_options_page' );