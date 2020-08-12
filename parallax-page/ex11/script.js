$(window).on('scroll', function(){
  
 var wScroll = $(this).scrollTop();
  
 if(wScroll > $('.thumb-wrapper').offset().top -($(window).height()/1.5)) {
   
    $('.content').css('transform','translateY('+wScroll/2+'px)'); 
 $('.thumb-unit').each(function(i){
             
    setTimeout(function(){
      
      $('.thumb-unit').eq(i).addClass('active');
      
    }, 200 * (i+1));
    
  });
 }

  
  
});