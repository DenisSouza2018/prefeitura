

$('nav a').click(function (e) {
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
	document.getElementsByClassName('legenda-port')[x].style.opacity = '100%';
}
function hover_out(x) {
	document.getElementsByClassName('legenda-port')[x].style.opacity = '0%';
}

function hover3(x) {
	document.getElementsByClassName('legenda-mensagem')[x].style.opacity = '100%';
	document.getElementsByClassName('sumir')[x].style.display = 'block';
  }
  function hover_out3(x) {
	document.getElementsByClassName('legenda-mensagem')[x].style.opacity = '0%';
	document.getElementsByClassName('sumir')[x].style.display = 'none';

  }


