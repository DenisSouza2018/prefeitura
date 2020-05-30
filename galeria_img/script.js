$('.carousel').slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4
});

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    centerMode: true,
    focusOnSelect: true
});

function img() {
    $("#carousel-center").removeClass("disabled");
    $("#carousel").addClass("disabled");
    $("#body-page").addClass("body2");
    disableScroll();
}

function closeImg() {
    $("#carousel-center").addClass("disabled");
    $("#carousel").removeClass("disabled");
    $("#body-page").removeClass("body2");
    enableScroll();
}



function disableScroll() {
    // Get the current page scroll position 
    scrollTop = 0;
    scrollLeft = 0;

        // if any scroll is attempted, set this to the previous value 
        window.onscroll = function () {
            window.scrollTo(scrollLeft, scrollTop);
        };
}

function enableScroll() {
    window.onscroll = function () { };
} 