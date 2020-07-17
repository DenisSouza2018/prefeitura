$('map area').hover(function(){
  $('#pie-' + $(this).attr('id')).css('margin-top', '-567px');
},function(){
  $('#pie-' + $(this).attr('id')).css('margin-top', '0px');
});