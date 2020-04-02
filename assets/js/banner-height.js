$( document ).ready( function( $ ) {
  $('body').css('padding-top', $('#coronaBanner').height()+'px');
} );
$(window).resize(function(){
  $('body').css('padding-top', $('#coronaBanner').height()+'px');
});
