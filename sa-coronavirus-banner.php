<?php
/**
	* Plugin Name: SA Coronavirus Banner
	* Description: Options to add a banner of your choice to your WordPress site as stipulated by the South African Goverment.
	* Version: 1.0.0
	* Author: Robin Devitt
  * Author URI : https://github.com/robindevitt/
	* License: GNU General Public License v2.0
	* License URI: https://www.gnu.org/licenses/gpl-2.0.html
	* Text Domain: sa-coronavirus-banner
  * Tags: South Africa, Corona Virus, COVID-19
  * Tested up to: 5.3
  * Stable tag: 5.0
  *
  * Make it easy for South African WordPress sites to add the Covid-19 banner as required by the South African government.
  *
  * You should have received a copy of the GNU General Public License
  * along with South African Covid-19 Banner. If not, see
  * https://www.gnu.org/licenses/gpl-2.0.html.
  */
// require

namespace SA\Covid19;

require_once 'included/sa_covid_19.php';

/**
 * Initialise the plugin.
 */
function init() {

	define( 'SA_COVID19_VERSION', '0.1.1' );
	define( 'SA_COVID19_DIR', plugin_dir_path( __FILE__ ) );
	define( 'SA_COVID19_URL', plugin_dir_url( __FILE__ ) );

	sa_covid_19();
}
add_action( 'plugins_loaded', 'SA\Covid19\init' );
