<?php
/**
 * custom option and settings
 */
  function sacb_settings_init() {
    // register a new setting for "sacb" page
    register_setting( 'sacb', 'sacb_options' );

    // register a new section in the "sacb" page
    add_settings_section(
      'sacb_section_developers',
      __('', 'sacb' ),
      'sacb_section_developers_cb',
      'sacb'
    );

    // register a new field in the "sacb_section_developers" section, inside the "sacb" page
    add_settings_field(
      'sacb_position',
      __( 'Banner style', 'sacb' ),
      'sacb_field_pill_cb',
      'sacb',
      'sacb_section_developers',
      [
        'label_for' => 'sacb_position',
        'class' => 'sacb_row',
        'sacb_custom_data' => 'custom',
      ]
    );
  }


add_action( 'admin_init', 'sacb_settings_init' );

/**
 * custom option and settings:
 * callback functions
 */
  function sacb_section_developers_cb( $args ) {

  }

// call back with the form
  function sacb_field_pill_cb( $args ) {
    // get the value of the setting we've registered with register_setting()
    $options = get_option( 'sacb_options' );

    ?>
    <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
    data-custom="<?php echo esc_attr( $args['sacb_custom_data'] ); ?>"
    name="sacb_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    >
      <option value="covid_top_scroll" <?php echo ( "covid_top_scroll" === $options['sacb_position'] ? 'selected' : '' );?> <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'top', false ) ) : ( '' ); ?>>
      <?php esc_html_e( 'Top & scroll', 'sacb' ); ?>
      </option>
      <option value="covid_top_fixed" <?php echo ( "covid_top_fixed" === $options['sacb_position'] ? 'selected' : '' );?> <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'top', false ) ) : ( '' ); ?>>
      <?php esc_html_e( 'Top & fixed', 'sacb' ); ?>
      </option>
      <option value="covid_bottom_scroll" <?php echo ( "covid_bottom_scroll" === $options['sacb_position'] ? 'selected' : '' );?> <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'bottom', false ) ) : ( '' ); ?>>
      <?php esc_html_e( 'Bottom & scroll', 'sacb' ); ?>
      </option>
      <option value="covid_bottom_fixed" <?php echo ( "covid_bottom_fixed" === $options['sacb_position'] ? 'selected' : '' );?> <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'bottom', false ) ) : ( '' ); ?>>
      <?php esc_html_e( 'Bottom & fixed', 'sacb' ); ?>
      </option>
    </select>
    <p class="description">
    <?php esc_html_e( 'Selected your banner position.', 'sacb' ); ?>
    </p>
    <ul>
      <li><strong>Top & scroll : </strong>Displays at the top of the site and scrolls with the page.</li>
      <li><strong>Top & fixed : </strong>Displays fixed at the top of the screen and the site scrolls behind it.</li>
      <li><strong>Bottom & scroll : </strong>Displays at the bottom of the site and is only viewed once scrolled to the bottom of the site.</li>
      <li><strong>Bottom & fixed : </strong>Displays fixed at the bottom of the screen and the site scrolls behind it.</li>
    </ul>
    <?php
  }

/**
 * top level menu
 */
function sacb_options_page() {
  // add top level menu page
  add_menu_page(
    'SA Coronoa Banner',
    'SA COVID-19',
    'manage_options',
    'sa-covid-19-banner',
    'sacb_options_page_content',
    plugins_url( 'sa-coronavirus-banner/assets/images/images.png' ),
    2
  );
}

/**
 * register our sacb_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'sacb_options_page' );

/**
 * top level menu:
 * callback functions
 */
  function sacb_options_page_content() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
      return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
      // add settings saved message with the class of "updated"
      add_settings_error( 'sacb_messages', 'sacb_message', __( 'Settings Saved', 'sacb' ), 'updated' );
    }

    // show error/update messages
    settings_errors( 'sacb_messages' );
    ?>
      <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "sacb"
        settings_fields( 'sacb' );
        // output setting sections and their fields
        // (sections are registered for "sacb", each field is registered to a specific section)
        do_settings_sections( 'sacb' );
        // output save settings button
        submit_button( 'Save Settings' );
        ?>
        </form>
      </div>
    <?php
  }
