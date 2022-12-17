<?php
/*
Plugin Name: Google Analytics 4 for WP
Plugin URI: https://tehnoklik.ba/ga4forwp
Description: Connects to Google Analytics 4 and allows the administrator to enter the tracking ID.
Version: 1.0
Author: Žan Anđić, Tehnoklik
Author URI: https://tehnoklik.ba
License: GPL2
*/
require_once plugin_dir_path( __FILE__ ) . 'ga4-admin.php';
require_once plugin_dir_path( __FILE__ ) . 'ga4-admin-form.php';

function ga4forwp_tracking_code() {
  $tracking_id = get_option( 'ga4forwp_tracking_id' );
  if ( ! empty( $tracking_id ) ) {
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $tracking_id; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo $tracking_id; ?>');
    </script>
    <?php
  }
}
add_action( 'wp_head', 'ga4forwp_tracking_code' );



