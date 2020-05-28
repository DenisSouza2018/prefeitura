$('.carousel').slick({
  dots: true,
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 4
});

function img(atual){
 
  html = `<img src="img/${atual}.jpg" class="img-final">`;
  document.getElementById('img-center').innerHTML = html;

}

function reset(){

  html = ``;
  document.getElementById('img-center').innerHTML = html;
}

