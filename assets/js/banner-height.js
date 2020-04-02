$( document ).ready( function( $ ) {
  $('body.banner_topFixed').css('padding-top', $('#coronaBanner').height()+'px');
  $('body.banner_topScroll').css('padding-top', $('#coronaBanner').height()+'px');
  $('body.banner_bottomFixed').css('padding-bottom', $('#coronaBanner').height()+'px');
} );
$(window).resize(function(){
  $('body.banner_topFixed').css('padding-top', $('#coronaBanner').height()+'px');
  $('body.banner_topScroll').css('padding-top', $('#coronaBanner').height()+'px');
  $('body.banner_bottomFixed').css('padding-bottom', $('#coronaBanner').height()+'px');
} );
