<?php
/**
 * Banner file.
 *
 */

 $options = get_option( 'banner_options' );

?>

<div id="coronaBanner" class="covid-banner">
	<div class="covid-banner-content">
		<?php
    if ( empty( $options[ 'display'] ) || !empty( $options[ 'display' ][ 'number' ] ) ){
      echo '<p class="covid-banner-text" >For more information on COVID-19 and government regulation: <a class="covid-banner-text-link" target="_blank" href="https://sacoronavirus.co.za/" rel="noopener nofollow" title="SAcoronavirus.co.za"> Click here </a></p>';
    }
    if ( !empty( $options[ 'display' ][ 'image' ] ) ){

  		echo '<a class="covid-banner-website-link" target="_blank" href="https://sacoronavirus.co.za/" rel="noopener nofollow" title="SAcoronavirus.co.za">';

      	echo '<img class="covid-banner-website-link-img" src="'. plugin_dir_url( __FILE__ ) . ( '../../assets/images/covid-1000.jpg' ).'" alt="SAcoronavirus.co.za" width="364" height="60" border="0" />';

      echo '</a>';

    };

    if ( !empty( $options[ 'display' ][ 'number' ] ) || !empty( $options[ 'display' ][ 'whatsapp' ] ) ){

	    echo '<div class="numbers">';

        if ( !empty( $options[ 'display' ][ 'number' ] ) ){
        	echo '<a class="covid-banner-hotline-link" href="tel:+27800029999"> Emergency Hotline: 0800 029 999 </a>';
        }

        if ( !empty( $options[ 'display' ][ 'whatsapp' ] ) ){
          echo '<a class="covid-banner-whatsapp-link" href="https://wa.me/27600123456?text=Hi" rel="noopener nofollow"> WhatsApp Support Line: 0600-123456 </a>';
        }

      echo '</div>';

    }

    ?>
	</div>
</div>
