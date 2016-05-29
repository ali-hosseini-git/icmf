
$(document).ready(function(){
	// Dont edit this
	commands = $('commands').attr('value');
	if (typeof commands !== "undefined"){
		setTimeout(commands, 100);
	}
	/////////////////
	
	$('.carousel').carousel({
        interval: 5000 //changes the speed
    })

//	if(document.URL == 'http://icmf.com/')
//	$('#temp').farajax('loader', '/pageLoader/v_load/announce');
});
