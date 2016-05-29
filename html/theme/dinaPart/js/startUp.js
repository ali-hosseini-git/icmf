
$(document).ready(function(){
	/*// Dont edit this
	commands = $('commands').attr('value');
	if (typeof commands !== "undefined"){
		setTimeout(commands, 100);
	}
	////////////////*/

	$('#myCarousel2').carousel({
	interval:  10000
	})
    
    $('#myCarousel2').on('slid.bs.carousel', function() {
    	//alert("slid");
	});
    
    
});

