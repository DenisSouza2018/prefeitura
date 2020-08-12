var today=new Date();
var year= today.getFullYear();
var msg='<p>copyright '+ year +'     ';
msg+='Designed by: SURAJ RATHOD </p>';

var el = document.getElementById('footer');
el.innerHTML=msg;