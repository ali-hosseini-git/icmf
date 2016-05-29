
$(document).ready(function(){
	// Dont edit this
	commands = $('commands').attr('value');
	if (typeof commands !== "undefined"){
		setTimeout(commands, 100);
	}
	/////////////////

	/* ---------------------------------------------- /*
	 * Initialization general scripts for all pages
	/* ---------------------------------------------- */

	var filters     = $('#filters'),
		worksgrid   = $('#works-grid');
	
	/* ---------------------------------------------- /*
	 * Portfolio
	/* ---------------------------------------------- */

	var worksgrid_mode;
	if (worksgrid.hasClass('works-grid-masonry')) {
		worksgrid_mode = 'masonry';
	} else {
		worksgrid_mode = 'packery';
	}

	$('a', filters).on('click', function() {
		var selector = $(this).attr('data-filter');

		$('.current', filters).removeClass('current');
		$(this).addClass('current');

		worksgrid.isotope({
			filter: selector
		});

		return false;
	});

	$(window).on('resize', function() {

		var windowWidth    = Math.max($(window).width(), window.innerWidth),
			itemWidht      = $('.grid-sizer').width(),
			itemHeight     = Math.floor(itemWidht * 0.95),
			itemTallHeight = itemHeight * 2;

		if (windowWidth > 500) {
			$('.work-item', worksgrid).each(function() {
				if ($(this).hasClass('tall')) {
					$(this).css({
						height : itemTallHeight
					});
				} else if ($(this).hasClass('wide')) {
					$(this).css({
						height : itemHeight
					});
				} else if ($(this).hasClass('wide-tall')) {
					$(this).css({
						height : itemTallHeight
					});
				} else {
					$(this).css({
						height : itemHeight
					});
				}
			});
		} else {
			$('.work-item', worksgrid).each(function() {
				if ($(this).hasClass('tall')) {
					$(this).css({
						height : itemTallHeight
					});
				} else if ($(this).hasClass('wide')) {
					$(this).css({
						height : itemHeight / 2
					});
				} else if ($(this).hasClass('wide-tall')) {
					$(this).css({
						height : itemHeight
					});
				} else {
					$(this).css({
						height : itemHeight
					});
				}
			});
		}

		worksgrid.imagesLoaded(function() {
			worksgrid.isotope({
				layoutMode: worksgrid_mode,
				itemSelector: '.work-item',
				transitionDuration: '0.3s',
				packery: {
					columnWidth: '.grid-sizer',
				},
			});
		});

	}).resize();

	$('#myCarousel').carousel({
		interval: 0
	})
    
    $('#myCarousel').on('slid.bs.carousel', function() {
    	//alert("slid");
	});

});