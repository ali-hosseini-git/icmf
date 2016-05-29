// News ticker
$('.newsTicker .postItem').mouseenter(function(){
	$(this).animate({ height:'500px' }, { queue:false, duration:500 });
}).mouseleave(function(){
	$(this).animate({ height:'35px' }, { queue:false, duration:500 });
});

// Right side scroll panel and to side scroll panel 
$(window).scroll(function() {
	if ($(this).scrollTop() > 20) {
		$('.navbar.navbar-default').css({"background-color": "#fff", "border-color": "#e5e5e5"});
	}else{
		$('.navbar.navbar-default').css({"background-color": "transparent", "border-color": "transparent"});
	}
});