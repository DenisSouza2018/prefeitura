// External js: flickity.pkgd.js


// Prevents vertical scrolling on swipe
document.getElementById("flick").addEventListener('touchmove', function(e) { e.preventDefault(); }, { passive: false });

// Image Parallex
AOS.init();

var image = document.getElementsByClassName('thumbnail');
new simpleParallax(image, {
	delay: .6,
	transition: 'cubic-bezier(0,0,0,1)'
});

//Show/Hide Grid Overlay via Grid Toggle
$(document).ready(function(){
	$(".switch input").on("change", function(e) {
  	const isOn = e.currentTarget.checked;
    
    if (isOn) {
    	$(".col-grid").show();
    } else {
    	$(".col-grid").hide();
    }
  });
});

//Show/Hide background tone to col divs when the Grid Toggle is selected
// var image = document.getElementsByClassName('team-member');
// new simpleParallax(image);

// $('#checkbox').change(function(){
//     if($(this).is(":checked")) {
//        $('.boundary').addClass('bounds');
//     } else {
//        $('.boundary').removeClass('bounds');
//     }
// });

// Carousel Progress Bar
var duration = 4;
var interval = 10;
var slider = document.querySelector('.carousel');
var sliderWrapper = document.querySelector('.carousel-wrapper');
var progressBar = document.querySelector('.progress');

var flkty = new Flickity( slider, {
  cellSelector: '.carousel-cell',
  wrapAround: true,
  prevNextButtons: false,
  pageDots: false
});

// -- Carousel Pause control
var isPaused = false;

sliderWrapper.addEventListener('mouseenter', function() {
  isPaused = true;
});

sliderWrapper.addEventListener('mouseleave', function() {
  isPaused = false;
});

// -- Main function
var percentTime,
    step,
    tick;

function startProgressbar() {
  resetProgressbar();
  percentTime = 0;
  isPaused = false;
  tick = window.setInterval(increase, interval);
};

function increase() {
  if (!isPaused) {
    step = (duration * 1000) / interval;
    percentTime += 100 / step;
    progressBar.style.width = percentTime + "%";
    if (percentTime >= 100) {
      flkty.next();
      startProgressbar();
    }
  }
}

function resetProgressbar() {
  progressBar.style.width = 0 + '%';
  clearTimeout(tick);
}

startProgressbar();