var dot1 = $("#dot1 > ul > li");
var contents = $("#contents > div");

dot1.on("click",function(e){   //닷 버튼을 클릭했을때 함수를 설정
    e.preventDefault();
   var target = $(this);
   var index = target.index();
   //alert(index);
   
   var section = contents.eq(index);
   var offset = section.offset().top;
   //alert(offset);
   
   $("body,html").animate({scrollTop:offset},400,"easeOutQuad");
});
   
   $(window).on("scroll",function(){
      var wScroll = $(this).scrollTop();
      
      if( wScroll >= contents.eq(0).offset().top){
         dot1.removeClass("on");
         dot1.eq(0).addClass("on");

      }
      if( wScroll >= contents.eq(1).offset().top){
         dot1.removeClass("on");
         dot1.eq(1).addClass("on");

      }
      if( wScroll >= contents.eq(2).offset().top){
         dot1.removeClass("on");
         dot1.eq(2).addClass("on");

      }
      if( wScroll >= contents.eq(3).offset().top){
         dot1.removeClass("on");
         dot1.eq(3).addClass("on");

      }
      if( wScroll >= contents.eq(4).offset().top){
         dot1.removeClass("on");
         dot1.eq(4).addClass("on");

      }
      if( wScroll >= contents.eq(5).offset().top){
         dot1.removeClass("on");
         dot1.eq(5).addClass("on");

      }
     
     
     //title
     if(wScroll >= contents.eq(0).offset().top - $(window).height()/2 + 180){
       $("#section1 h2").addClass("show");
     }
     
     if(wScroll >= contents.eq(1).offset().top - $(window).height()/2 + 180){
       $("#section2 h2").addClass("show");
     }
     
     if(wScroll >= contents.eq(2).offset().top - $(window).height()/2 + 180){
       $("#section3 h2").addClass("show");
     }
     
     if(wScroll >= contents.eq(3).offset().top - $(window).height()/2 + 180){
       $("#section4 h2").addClass("show");
     }
     
     if(wScroll >= contents.eq(4).offset().top - $(window).height()/2 + 180){
       $("#section5 h2").addClass("show");
     }
     
     if(wScroll >= contents.eq(5).offset().top - $(window).height()/2 + 180){
       $("#section6 h2").addClass("show");
     }
     
     
  
     
   });