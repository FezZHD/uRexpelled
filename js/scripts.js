function resizeContent() {
  height = window.innerHeight - $(".header").height();
  $("#page_body").css({'min-height': height});
}

var menu_showing = false;

function click_menu () {

  if (menu_showing) {
    $(".menu").stop(true, true).slideUp("normal");
    menu_showing = false;
  } else {
    $(".menu").slideDown("normal");
    menu_showing = true;
  }
  var clear = setInterval(resizeContent, 16);
  setTimeout(function() {
    clearInterval(clear);
  }, 400);
}

$(document).ready(function () {
  resizeContent();
  $(window).resize(resizeContent);

  $(".menu_opener").on("click", click_menu);
});
