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
      if ($(".lightbox").hasClass('open')) {

          $(".lightbox").removeClass('open');
      }

  });

//Making sure we can still click stuff within the menu
  $("header").click(function(e) {
    event.stopPropagation();
  });


//GALLERY LIGHTBOX

$(".galleripost").on("click", function(e){

  var thumbid = $(this).attr('id');
  var slides = document.getElementsByClassName("galleripost-lb");

  if ($(".galleripost-lb").hasClass('visible')) {
      $(".galleripost-lb").removeClass('visible');
  }

  $('.lightbox').addClass('open');

  for (var i = 0; i < slides.length; i++) {
    if (slides[i].id == thumbid ) {
      console.log(slides[i]);
      slides[i].classList.add('visible');
    }

  }


});

$('#closelb').on("click", function(e){

  $('.lightbox').removeClass('open');


});

//Making sure we can still click stuff within the gallery post, and controls within the lightbox
$(".galleripost").click(function(e) {
  event.stopPropagation();
});
$(".modal-content").click(function(e) {
  event.stopPropagation();
});

//slide controls:

$(".prev").click(function(e) {
  changeslide(e, this, "prev");
});
$(".next").click(function(e) {
  changeslide(e, this, "next");
});

function changeslide(e, element, which) {
    
}

// Next/previous controls

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("galleripost-lb");
//   var captionText = document.getElementById("caption");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//
//   slides[slideIndex-1].style.display = "block";
// }


});
