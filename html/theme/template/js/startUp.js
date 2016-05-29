
$(document).ready(
	function() {
		// Dont edit this
//		commands = $('commands').attr('value');
//		if (typeof commands !== "undefined") {
//			setTimeout(commands, 100);
//		}
		// ///////////////

//		$('.tip').tipTip();
		
		/*****************************************************************
		 * Slider                                                        *
		 *****************************************************************/
		jQuery('#camera_wrap_1').camera({ 
			height: '600px',
			pagination: false,
			loader: 'pie',
			fx: 'simpleFade',
			loaderColor: '#F5821F',
			navigation: false,
			navigationHover: true,
			mobileNavHover: true,
			pieDiameter: 100,
			time: 7000,
			transPeriod: 2000,
			piePosition: 'rightBottom',
			pauseOnClick: false
		});
		
		/*****************************************************************
		 * Vertical Ticker1                                              *
		 *****************************************************************/
		var dd = $('.vticker1').easyTicker({
			direction: 'up',
			easing: 'easeInOutBack',
			speed: 'slow',
			interval: 10000,
			height: 'auto',
			visible: 3,
			mousePause: 1,
			controls: {
				up: '.up',
				down: '.down',
				toggle: '.toggle',
				stopText: 'Stop !!!'
			}
		}).data('easyTicker');
		
		cc = 1;
		$('.aa').click(function(){
			$('.vticker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tags and some</li>');
			cc++;
		});
		
		$('.vis').click(function(){
			dd.options['visible'] = 3;
			
		});
		
		$('.visall').click(function(){
			dd.stop();
			dd.options['visible'] = 0 ;
			dd.start();
		});

		/*****************************************************************
		 * Vertical Ticker2                                              *
		 *****************************************************************/
		var dd = $('.vticker2').easyTicker({
			direction: 'up',
			easing: 'easeInOutBack',
			speed: 'slow',
			interval: 17000,
			height: 'auto',
			visible: 1,
			mousePause: 1,
			controls: {
				up: '.up',
				down: '.down',
				toggle: '.toggle',
				stopText: 'Stop !!!'
			}
		}).data('easyTicker');
		
		cc = 1;
		$('.aa').click(function(){
			$('.vticker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tags and some</li>');
			cc++;
		});
		
		$('.vis').click(function(){
			dd.options['visible'] = 3;
			
		});
		
		$('.visall').click(function(){
			dd.stop();
			dd.options['visible'] = 0 ;
			dd.start();
		});
		/*****************************************************************
		 * Testimonials                                                  *
		 *****************************************************************/
		var testimonials = {};

		testimonials.slider = (function() {
			var currentItemIndex = 0, prevBtn = $('.prev-testimonial'), nextBtn = $('.next-testimonial'), items = (function() {
				var items = [];
				$('.testimonial').each(function() {
					items.push($(this));
				});
				return items;
			})();

			function getCurrent() {
				$('.testimonial').each(function(index) {
					$(this).removeClass('current');
				});
				$('.testimonial').eq(currentItemIndex).addClass(
						'current');
			}

			function greyOut(prevBtn, nextBtn) {
				if ($(prevBtn).hasClass('grey-out')) {
					$(prevBtn).removeClass('grey-out');
				}
				if ($(nextBtn).hasClass('grey-out')) {
					$(nextBtn).removeClass('grey-out');
				}
				if (currentItemIndex == 0) {
					$(prevBtn).addClass('grey-out');
				}
				if (currentItemIndex == items.length - 1) {
					$(nextBtn).addClass('grey-out');
				}
			}

			return {
				init : function(prevBtn, nextBtn) {
					items[currentItemIndex].addClass('current');
					greyOut(prevBtn, nextBtn);
					$(prevBtn).click(function() {
						if (currentItemIndex > 0) {
							currentItemIndex--;
						}
						getCurrent();
						greyOut(prevBtn, nextBtn);
					});
					$(nextBtn).click(function() {
						if (currentItemIndex < items.length - 1) {
							currentItemIndex++;
						}
						getCurrent();
						greyOut(prevBtn, nextBtn);
					});
				}
			};

		})();

		testimonials.slider.init('.prev-testimonial', '.next-testimonial');

		// if(document.URL == 'http://icmf.com/')
		// $('#temp').farajax('loader',
		// '/pageLoader/v_load/announce');
	});