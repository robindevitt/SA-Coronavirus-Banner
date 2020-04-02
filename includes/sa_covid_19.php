<?php
/**
 * Initialises the plugin requriements.
 *
 */

namespace SA\Covid19;

require_once 'admin/script.php';
require_once 'admin/settings.php';
require_once 'banner.php';

/**
 * Initialises the app.
 */
function sa_covid_19() {

	add_action( 'admin_enqueue_scripts', 'SA\Covid19\Script\add_color_picker' );

	add_action( 'wp_enqueue_scripts', 		'SA\Covid19\Script\banner_height' );

	add_action( 'admin_init', 					 'SA\Covid19\SettingsPage\settings' );

 	add_action( 'admin_menu', 					 'SA\Covid19\SettingsPage\options' );

	add_action( 'wp_footer', 						 'SA\Covid19\BannerDisplay\banner' );

	add_action( 'wp_footer', 						 'SA\Covid19\BannerDisplay\banner_css' );

}
