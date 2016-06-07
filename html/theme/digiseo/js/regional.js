// Curl load website preview
$(document).on('change', '#url', function(){
	$('#websitePreview').html('<iframe scrolling="no" widht="100%" height="320" src="http://' + $('#url').val() + '">');
})
// Right side scroll panel and to side scroll panel 
$(window).scroll(function() {
	if ($(this).scrollTop() > 20) {
		$('.navbar.navbar-default').css({"background-color": "#fff", "border-color": "#e5e5e5"});
	}else{
		$('.navbar.navbar-default').css({"background-color": "transparent", "border-color": "transparent"});
	}
});