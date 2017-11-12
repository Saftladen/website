var $ = jQuery;

function setupProjectSlider() {
  $(".project-media").slick({dots: false, arrows: true});
}

$(function() {
  setupProjectSlider();
  $('a[href*="#"]').on("click", function(e) {
    var href = $(this).attr("href");
    var $target = $("#" + href.split("#")[1]);
    if ($target.length) {
      $("html, body").animate({scrollTop: $target.offset().top - 50}, 500);
      e.preventDefault();
    }
  });

  var ua = window.navigator.userAgent;
  if (ua.indexOf("MSIE ") > 0 || !!ua.match(/Trident.*rv\:11\./)) $("body").addClass("is-ie");
});
