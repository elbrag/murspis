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

/////////////////Välja eldstad: gå till toppen

var duration = 300;

$('#to-top').click(function(event) {

  event.preventDefault();
  $('html, body').animate({scrollTop: 0}, duration);

return false;

})

//////////////////////////GALLERY LIGHTBOX////////////////////////

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
    e.preventDefault();

    //find all gallery posts
    var galleryposts = document.querySelectorAll('.galleripost-lb');
    var lastpost = galleryposts[galleryposts.length - 1];
    var firstpost = galleryposts[0];

    var activepost = document.querySelector(".galleripost-lb.visible");
    var sibling = activepost.previousElementSibling;

    //if our post#1 is the one shown, we want the previous image to be the last of the bunch
    if (firstpost.classList.contains('visible')) {
      if (which == 'prev') {
        sibling = lastpost;
      } else {
        sibling = activepost.previousElementSibling;
      }
    }
    //if our last post is the one shown, we want the next image to be the first post
    if (lastpost.classList.contains('visible')) {
      if (which == 'next') {
        sibling = firstpost;
      }
    } else {
      if (which == 'next') {
        sibling = activepost.nextElementSibling;
      }
    }

    //deactivate the visible post
    activepost.classList.remove('visible');

    //whoever sibling might be, they are now visible
    sibling.classList.add('visible');


}


/////////////////////////////////////////GALLERY FILTERS////////////

//if we click just the title (everything on the button except for the dropdown symbol)
$(".filter-button").click(function(e) {
  //first of all, "show all" can't be active if we've filtered
  $("#alla-kat").removeClass('active');
  $(this).toggleClass('active');


    filter(this);


});

//if we click "show all again..."
$("#alla-kat").click(function(e) {
  //other categories can't be opened or active or checked
  $(".filter-button").removeClass('active');
  $(this).toggleClass('active');

  if ($(this).hasClass('active')) {
    $('.galleripost').removeClass('filter-hide');
    $('.galleripost').addClass('filter-show');
  }

});

var filterarray = [];

function filter(target){

  var title = target.innerHTML;

  if (target.classList.contains('active')) {
    filterarray.push(title);
  } else {
    for (var i = 0; i < filterarray.length; i++) {
      if (filterarray[i] == title) {
        filterarray.pop(filterarray[i]);
      }
    }
  }

  console.log(filterarray);

  var galleripost = $('.galleripost');

    for (var i = 0; i<galleripost.length; i++) {

      if (filterarray.includes(galleripost[i].alt)) {
        galleripost[i].classList.add('filter-show');
        galleripost[i].classList.remove('filter-hide');
      } else {
        galleripost[i].classList.add('filter-hide');
        galleripost[i].classList.remove('filter-show');
      }
    }
}

////////MURSPISAR/////////////////////////

// https://zingersystems.com/news-title-here/

var texts = document.querySelectorAll('.murspis p');

for (var i = 0; i < texts.length; i++) {
  var shorttext = texts[i].innerHTML;
  limitWords(texts[i], shorttext, 10);
}

function limitWords(texttag, textToLimit, wordLimit) {

var finalText = "";
var text2 = textToLimit.replace(/\s+/g, ' ');
var text3 = text2.split(' ');
var numberOfWords = text3.length;

if(numberOfWords > wordLimit) {
  for ( var i= 0; i < wordLimit; i++ ) {
    finalText = finalText+" "+ text3[i] + " ";
    texttag.innerHTML = finalText+"…";
  }
  } else return textToLimit;
}



});
