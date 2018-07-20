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

//kat-more is the dropdown symbol on the button
$(".kat-more").click(function(e) {
  //first of all, "show all" can't be active if we've filtered
  $("#alla-kat").removeClass('active');

//our parent (the button opens)
  $(this).closest(".kat-parent").toggleClass('open');
/*...and is also activated (these two are different: open means options are open, active means the parent filter is active)*/
  $(this).closest(".kat-parent").addClass('active');
//when we open the dropdown, all children are checked until we uncheck them
  $(this).closest(".kat-parent").find(".kat-child").toggleClass('check');
});

//if we click just the title (everything on the button except for the dropdown symbol)
$(".kat-title").click(function(e) {
  //first of all, "show all" can't be active if we've filtered
  $("#alla-kat").removeClass('active');
  //the clicked parent category will be active
  $(this).closest(".kat-parent").toggleClass('active');

});

//if we click "show all again..."
$("#alla-kat").click(function(e) {
  //other categories can't be opened or active or checked
  $(".kat-parent").removeClass('active');
  $(".kat-parent").removeClass('open');
  $(".kat-child").removeClass('check');
  $(this).toggleClass('active');

});

//if we click a sub-category (child)...
$(".kat-child").click(function(e) {
  //to be able to click inside these:
  event.stopPropagation();
  //stop button default behaviour:
  e.preventDefault();

//you have to have at least one checked, so we don't allow unchecking the last one
  var siblingsnr = $(this).siblings(".kat-child.check").length + 1;
  if (siblingsnr > 1) {
    $(this).toggleClass('check');
  }

});

/*clicking outside the dropdown closes it*/
$("html").click(function(e){
    if ($(".multiselect").hasClass('expanded')) {
        $(".multiselect").removeClass('expanded');
    }
});

});
