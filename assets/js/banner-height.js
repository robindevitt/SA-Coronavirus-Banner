$( document ).load( function( $ ) {
  $('body.banner_topFixed').css('padding-top', $('#coronaBanner').outerHeight()+'px');
  $('body.banner_topScroll').css('padding-top', $('#coronaBanner').outerHeight()+'px');
  $('body.banner_bottomFixed').css('padding-bottom', $('#coronaBanner').outerHeight()+'px');
} );
$(window).resize(function(){
  $('body.banner_topFixed').css('padding-top', $('#coronaBanner').outerHeight()+'px');
  $('body.banner_topScroll').css('padding-top', $('#coronaBanner').outerHeight()+'px');
  $('body.banner_bottomFixed').css('padding-bottom', $('#coronaBanner').outerHeight()+'px');
} );
