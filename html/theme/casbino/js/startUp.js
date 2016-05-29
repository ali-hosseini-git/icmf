
$(document).ready(function(){
	// Dont edit this
	commands = $('commands').attr('value');
	if (typeof commands !== "undefined"){
		setTimeout(commands, 100);
	}
	/////////////////
	
	$('.tip').tipTip();

//	if(document.URL == 'http://icmf.com/')
//	$('#temp').farajax('loader', '/pageLoader/v_load/announce');
});