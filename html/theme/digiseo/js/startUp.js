
$(document).ready(function(){
	// Dont edit this
	commands = $('commands').attr('value');
	if (typeof commands !== "undefined"){
		setTimeout(commands, 100);
	}
	/////////////////

	jQuery("#status").fadeOut();
	jQuery("#preloader").delay(1000).fadeOut("slow");
	
	tinymce.init({
		selector: '#mytextarea'
	});


//	if(document.URL == 'http://icmf.com/')
//	$('#temp').farajax('loader', '/pageLoader/v_load/announce');
});
