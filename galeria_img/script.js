$('.carousel').slick({
  dots: true,
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 4
});

function img(atual){
 
  html = `<img src="img/${atual}.jpg" >`;
  document.getElementById('img-center').innerHTML = html;

}

