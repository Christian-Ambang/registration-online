$(document).ready(function () {
  var heightWindow = $(document).height() - $(".nav").innerHeight();
  $(".contenu").css("min-height", heightWindow);
  $(".nav .menu,.nav h1").click(function () {
    $(".contenu").slideToggle(3000);
    $(".contenu .menu").slideToggle(3000);
    var MenuShow = $(".contenu .menu").attr("style");

    if ($(".nav .menu img").attr("src") == "img/btn-menu.png") {
      $(".nav .menu img").attr("src", "img/btn-menu-close.png");
    } else if ($(".nav .menu img").attr("src") == "img/btn-menu-close.png") {
      $(".nav .menu img").attr("src", "img/btn-menu.png");
    }

    if ($(".nav .menu img").attr("src") == "../img/btn-menu.png") {
      $(".nav .menu img").attr("src", "../img/btn-menu-close.png");
    } else if ($(".nav .menu img").attr("src") == "../img/btn-menu-close.png") {
      $(".nav .menu img").attr("src", "../img/btn-menu.png");
    }
  });
});
