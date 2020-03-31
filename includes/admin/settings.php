<?php
/**
 * Create a settings page for different banner options.
 *
 */

namespace SA\Covid19\SettingsPage;

include_once 'sa-covid-19-options.php';

/**
 * Create top level menu item
 */
function options() {

  // add top level menu page
  add_menu_page(
    'SA Coronoa Banner',
    'SA COVID-19',
    'manage_options',
    'sa-covid-19',
    'options_page_content',
    plugin_dir_url( __FILE__ ) . ( '../../assets/images/sa-flag.png' ),
    2
  );

}

/**
 * Create settings
 */
function settings() {

  // register a new setting for "rbd" page
  register_setting( 'rbd', 'rbd_options' );

  // register a new section in the "rbd" page
  add_settings_section(
    'rbd_section',
    __( '', 'rbd' ),
    'section_cb',
    'rbd'
  );

  // register a new field in the "rbd_section" section, inside the "rbd" page
  add_settings_field(
    'rbd_position',
    __( 'Banner style', 'rbd' ),
    'add_form',
    'rbd',
    'rbd_section',
    [
      'label_for'           => 'rbd_position',
      'class'               => 'rbd_row',
      'rbd_custom_data'  => 'custom',
    ]
  );
}
