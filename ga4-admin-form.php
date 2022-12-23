<?php 

//if logged in user has capability to manage options save tracking ID from input field

function ga4forwp_options_page_html() {
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }

  if ( isset( $_POST['tracking_id'] ) && ! empty( $_POST['tracking_id'] ) ) {
    update_option( 'ga4forwp_tracking_id', sanitize_text_field( $_POST['tracking_id'] ) );
  }

  $tracking_id = get_option( 'ga4forwp_tracking_id' );
  ?>
  
<!-- HTML OUTPUT IN OPTIONS PAGE OF PLUGIN WHERE USER CAN TYPE OR PASTE GOOGLE ANALYTICS TRACKING ID -->

  <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<p class="description">Enter your Google Analytics 4 tracking ID in field below.</p>
    <form method="post">
      <table class="form-table">
        <tbody>
          <tr>
            <th scope="row"><label for="tracking_id">Tracking ID:</label></th>
            <td>
              <input type="text" name="tracking_id" id="tracking_id" placeholder="Tracking ID" value="<?php echo esc_attr( $tracking_id ); ?>">
            </td>
          </tr>
        </tbody>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>
  <?php
}
