var $ = jQuery;

function setupProjectSlider() {
  var resetTimeout = null;
  var maxHeight = null;
  var active = true;

  var list = $(".project-list");
  var projects = list.find(".project");
  var button = $(".js-project-more").on("click", function() {
    active = !active;
    var other = button.data("other");
    button.data("other", button.text());
    button.text(other);
    updateProjectToggler();
  });

  function updateProjectToggler() {
    if (!maxHeight) {
      list.height("auto");
      button.hide();
    } else {
      button.show();
      if (active) {
        list.height(maxHeight);
      } else {
        list.height(list[0].scrollHeight);
      }
    }
  }
  function resetProjectHeight() {
    if (resetTimeout) return;
    resetTimeout = setTimeout(function() {
      resetTimeout = null;
      var first = projects.eq(0);
      var third = projects.eq(2);
      if (!third) {
        maxHeight = 0;
      } else {
        maxHeight = third.offset().top + third.height() - first.offset().top - 10;
      }
      updateProjectToggler();
    });
  }

  $(".project-media")
    .slick({dots: false, arrows: true})
    .on("setPosition", function() {
      resetProjectHeight();
    });
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
