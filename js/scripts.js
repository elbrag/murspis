$(document).ready(function() {

//Just another open menu function:
  $("#menu-symb").on("click", function(e){

    $(this).toggleClass('open');
    $('header').toggleClass("menu-open");
    $('#menu-items').toggleClass("menu-open");

  });

//Making it so that clicking outside the open menu closes it
  $("html").click(function(e){
      if ($('header').hasClass("menu-open")) {

          $("#menu-symb").removeClass('open');
          $('header').removeClass("menu-open");
          $('#menu-items').removeClass("menu-open");
      }
//...and while we're at it, the same with a gallery post in the lightbox (see further down)
      if ($(".galleripost").hasClass('enlarged')) {

          $(".galleripost").removeClass('enlarged');
      }

  });

//Making sure we can still click stuff within the menu
  $("header").click(function(e) {
    event.stopPropagation();
  });


//GALLERY LIGHTBOX

$(".galleripost").on("click", function(e){

  if ($(".galleripost").hasClass('enlarged')) {
    $(".galleripost").removeClass('enlarged');
  }

  $(this).toggleClass('enlarged');

});

//Making sure we can still click stuff within the gallery post
$(".galleripost").click(function(e) {
  event.stopPropagation();
});

});
