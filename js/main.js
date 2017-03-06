$(document).ready(function() {

  $(window).resize(function() {
    if($(window).width() < 701) {
      $('nav').addClass("closed");
      $('nav').click(function() {
         $(this).toggleClass("open closed");
      });
    }

   })
   .resize();

   $("#navItem_Title").keyup(function(){
       var text=$(this).val();
       $(this).val(text.replace(/[^A-Za-z]/g,''));
   })

});


jQuery(document).ready(function($) {

    $('.tab-head-step').click(function() {
        var currentContactSlide = $(this).attr('cp-data-page');

        switchContactSlide(currentContactSlide, "previous");
    });
});

function switchContactSlide(currentContactSlide) {
    currentContactSlide = parseInt(currentContactSlide);
    var slideToShow = currentContactSlide;

    // Remove active class from current tab
    $('.cp-data-active').removeClass('cp-data-active');

    // Add active class to slideToShow
    $('.tab-head-bar [cp-data-page="' + slideToShow + '"]').removeClass('was-active');
    $('[cp-data-page="' + slideToShow + '"]').addClass('cp-data-active');
}
