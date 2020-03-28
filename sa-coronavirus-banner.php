<?php
/**
	* Plugin Name: Sa Coronavirus Banner
	* Description: Options to add a banner of your choice to your WordPress site as stipulated by the South African Goverment.
	* Version: 1.0.0
	* Author: Robin Devitt
	* License: GNU General Public License v3.0
	* License URI: https://github.com/robindevitt/sa-coronavirus-banner/blob/master/LICENSE
	* Text Domain: sa-coronavirus-banner
  */
// require

include_once 'includes/settings-page.php';

// Actions
  $options = get_option( 'sacb_options' );

  add_filter( 'body_class', function( $classes ) {
    $options = get_option( 'sacb_options' );
    return array_merge( $classes, array( $options['sacb_position'] ) );
  } );

  register_activation_hook( __FILE__, 'sacb_corona_banner_activation' );

  add_action( 'admin_notices', 'sacb_corona_banner_notice' );


  if( 'top' === $options['sacb_position'] ){
    add_action( 'wp_head', 'sacb_corona_banner_one' );
  } else {
    add_action( 'wp_footer', 'sacb_corona_banner_one' );
  }
  
  add_action( 'wp_enqueue_scripts', 'sacb_enqueue_style' );

// Fuctions

// enququq styles
  function sacb_enqueue_style() {
    wp_register_style( 'sa-coronavirus-style', plugins_url('assets/css/style.min.css', __FILE__ ));
    wp_enqueue_style( 'sa-coronavirus-style' );
  }

// Banner one structure
  function sacb_corona_banner_one(){
    echo '<div id="coronaBanner" class="coronaBanner">'.
      '<div class="coronaBanner__content">'.
        '<a class="coronaBanner__websiteLink" target="_blank" href="https://sacoronavirus.co.za/" rel="noopener nofollow" title="SAcoronavirus.co.za">'.
          '<img class="coronaBanner__websiteLinkImg" src="'. plugins_url('assets/images/corona.jpg', __FILE__ ) .'" alt="SAcoronavirus.co.za" width="364" height="60" border="0" />'.
        '</a>'.
        '<div class="numbers">'.
          '<a class="coronaBanner__hotlineLink" href="tel:+27800029999">'.
            'Emergency Hotline: 0800 029 999'.
          '</a>'.
          '<a class="coronaBanner__whatsappLink" href="https://wa.me/27600123456?text=Hi" rel="noopener nofollow">'.
            'WhatsApp Support Line: 0600-123456'.
          '</a>'.
        '</div>'.
      '</div>'.
    '</div>';
  }

// Plugin activation
  function sacb_corona_banner_activation() {
      set_transient( 'sacb_banner_admin_notice', true, 5 );
  }

// plugin banner notice
  function sacb_corona_banner_notice(){

      /* Check transient, if available display notice */
      if( get_transient( 'sacb_banner_admin_notice' ) ){
          ?>
          <div class="updated notice is-dismissible">
              <p>Thank you for using this plugin and giving South Africa the support it needs, <strong>You are awesome</strong>. <a href="<?php echo site_url();?>/wp-admin/admin.php?page=sa-covid-19-banner">Activate plugin settings</a></p>
          </div>
          <?php
          /* Delete transient, only display this notice once. */
          delete_transient( 'sacb_banner_admin_notice' );
      }
  }
