jQuery( document ).ready(function() {
  'use strict';
  jQuery( 'body' ).on( 'change', '.islemag-big-ad-type',function(){
    var th = jQuery(this);
    if( th.is( ':checked' ) ){
      if( th.val() === 'image' ){
        th.parent().parent().children('.islemag-big-ad-image').show();
        th.parent().parent().children('.islemag-big-ad-code').hide();
      } else {
        th.parent().parent().children('.islemag-big-ad-image').hide();
        th.parent().parent().children('.islemag-big-ad-code').show();
      }
    }
  });

  jQuery( 'body' ).on( 'change', '.islemag-small-ad-type',function(){
    var th = jQuery(this);
    if( th.is( ':checked' ) ){

      if( th.val() === 'image' ){
        th.parent().next().show();
        th.parent().next().next().hide();
      } else {
        th.parent().next().hide();
        th.parent().next().next().show();
      }
    }
  });


  //widget dropdown
  jQuery( 'body' ).on('click','.islemag-ad-widget-top',function(){
    jQuery(this).next().slideToggle();
  });

});


jQuery(document).ajaxSuccess(function() {
  'use strict';
  var th = jQuery(this);
  if( th.is( ':checked' ) ){
    if( th.val() === 'image' ){
      th.parent().parent().children('.islemag-big-ad-image').show();
      th.parent().parent().children('.islemag-big-ad-code').hide();
    } else {
      th.parent().parent().children('.islemag-big-ad-image').hide();
      th.parent().parent().children('.islemag-big-ad-code').show();
    }
  }
});
