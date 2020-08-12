$(window).scroll(function() {
  $("#home-section").css("backgroundPosition",$(this).scrollTop()*1/5+"% 0%");
});
$('nav a').click(function(e) {
  e.preventDefault();
  var loc= $(this.hash);
  $('body').animate({scrollTop: loc.offset().top - $("#navbar").height()},600);
});