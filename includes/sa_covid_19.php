<?php
/**
 * Initialises the plugin requriements.
 *
 */

namespace SA\Covid19;

require_once 'settings.php';
require_once 'banner.php';

/**
 * Initialises the app.
 */
function sa_covid_19() {

	add_action( 'admin_init', 'SA\Covid19\SettingsPage\settings' );

 	add_action( 'admin_menu', 'SA\Covid19\SettingsPage\options' );

	add_action( 'wp_footer', 'SA\Covid19\SettingsPage\banner_display' );

}
