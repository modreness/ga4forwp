<?php
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