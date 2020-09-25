

$('nav a').click(function (e) {
	console.log('ssss')
	e.preventDefault();
	var id = $(this).attr('href'),
		targetOffset = $(id).offset().top,
		menuHeight = $('nav').innerHeight();



	$('html, body').animate({
		scrollTop: targetOffset
	}, 1000);
});



function hover2(x) {
	document.getElementsByClassName('seta2')[x].style.display = 'inline-table';
}

function hover_out2(x) {
	document.getElementsByClassName('seta2')[x].style.display = 'none';

}

function hover(x) {
	document.getElementsByClassName('legenda-port')[x].style.display = 'inherit';
}
function hover_out(x) {
	document.getElementsByClassName('legenda-port')[x].style.display = 'none';
}




