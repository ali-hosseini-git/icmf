
$(document).ready(function(){
	// Dont edit this
	commands = $('commands').attr('value');
	if (typeof commands !== "undefined"){
		setTimeout(commands, 100);
	}
	/////////////////
	
	$('.tip').tipTip();
	
	$(function() {
		
		var Photo	= (function() {
			
			var $list		= $('#pe-thumbs'),
				listW		= $list.width(),
				listL		= $list.offset().left,
				$elems		= $list.find('img'),
				$descrp		= $list.find('div.pe-description'),
				settings	= {
					maxScale	: 0.9,
					maxOpacity	: 0.9,
					minOpacity	: Number( $elems.css('opacity') )
				},
				init		= function() {
					
					settings.minScale = _getScaleVal();
					_loadImages( function() {
						
						_calcDescrp();
						_initEvents();
					
					});
				
				},
				// Get Value of CSS Scale through JavaScript:
				// http://css-tricks.com/get-value-of-css-rotation-through-javascript/
				_getScaleVal= function() {
				
					var st = window.getComputedStyle($elems.get(0), null),
						tr = st.getPropertyValue("-webkit-transform") ||
							 st.getPropertyValue("-moz-transform") ||
							 st.getPropertyValue("-ms-transform") ||
							 st.getPropertyValue("-o-transform") ||
							 st.getPropertyValue("transform") ||
							 "fail...";

					if( tr !== 'none' ) {	 

						var values = tr.split('(')[1].split(')')[0].split(','),
							a = values[0],
							b = values[1],
							c = values[2],
							d = values[3];

						return Math.sqrt( a * a + b * b );
					
					}
					
				},
				_calcDescrp	= function() {
					
					$descrp.each( function(i) {
					
						var $el		= $(this),
							$img	= $el.prev(),
							img_w	= $img.width(),
							img_h	= $img.height(),
							img_n_w	= settings.maxScale * img_w,
							img_n_h	= settings.maxScale * img_h,
							space_t = ( img_n_h - img_h ) / 2,
							space_l = ( img_n_w - img_w ) / 2;
						
						$el.data( 'space_l', space_l ).css({
							height	: settings.maxScale * $el.height(),
							top		: -space_t,
							left	: img_n_w - space_l
						});
					
					});
				
				},
				_initEvents	= function() {
				
					$elems.on('proximity.Photo', { max: 170, throttle: 10, fireOutOfBounds : true }, function(event, proximity, distance) {
						
						var $el			= $(this),
							$li			= $el.closest('li'),
							$desc		= $el.next(),
							scaleVal	= proximity * ( settings.maxScale - settings.minScale ) + settings.minScale,
							scaleExp	= 'scale(' + scaleVal + ')';
						
						var $desc		= $el.next();
						if( scaleVal === settings.maxScale ) {
							
							$li.css( 'z-index', 1000 );
							
							if( $desc.offset().left + $desc.width() > listL + listW ) {
								
								$desc.css( 'left', -$desc.width() - $desc.data( 'space_l' ) );
							
							}
							
							$desc.fadeIn( 800 );
							
						}	
						else {
							
							$li.css( 'z-index', 1 );
							
							$desc.stop(true,true).hide();
						
						}	
						
						$el.css({
							'-webkit-transform'	: scaleExp,
							'-moz-transform'	: scaleExp,
							'-o-transform'		: scaleExp,
							'-ms-transform'		: scaleExp,
							'transform'			: scaleExp,
							'opacity'			: ( proximity * ( settings.maxOpacity - settings.minOpacity ) + settings.minOpacity )
						});

					});
				
				},
				_loadImages	= function( callback ) {
					
					var loaded 	= 0,
						total	= $elems.length;
					
					$elems.each( function(i) {
						
						var $el = $(this);
						
						$('<img/>').load( function() {
							
							++loaded;
							if( loaded === total )
								callback.call();
							
						}).attr( 'src', $el.attr('src') );
					
					});
				
				};
			
			return {
				init	: init
			};
		
		})();
		
		Photo.init();
		
	});
	
});