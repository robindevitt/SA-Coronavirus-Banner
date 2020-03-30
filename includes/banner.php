<?php
/**
 * Initialises the plugin requriements.
 *
 */

namespace SA\Covid19\BannerDisplay;

add_filter( 'body_class', function( $classes ) {

  $options = get_option( 'rbd_options' );

  return array_merge( $classes, array( $options[ 'rbd_position' ] ) );

} );

function banner_display(){

  $options = get_option( 'rbd_options' );

  if ( empty( $options[ 'rbd_position' ] ) ){
    return;
  }

  \wp_enqueue_style( 'south-african-covid-19-page-banner', SA_COVID19_URL . 'resources/css/south-african-covid-19-page-banner.css', null, SA_COVID19_VERSION, false );

  ob_start();

	include_once 'html/page-banner.php';

	$banner = ob_get_contents();

	ob_end_clean();

	echo $banner;
}

 ?>
