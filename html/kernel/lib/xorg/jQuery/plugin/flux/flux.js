/*
 Flux Slider v1.4.4
 http://www.joelambert.co.uk/flux

 Copyright 2011, Joe Lambert.
 Free to use under the MIT license.
 http://www.opensource.org/licenses/mit-license.php
 */
window.flux = {
	version : "1.4.4"
};
(function(b) {
	flux.slider = function(c, e) {
		flux.browser.init();
		flux.browser.supportsTransitions
				|| window.console
				&& window.console.error
				&& console
						.error("Flux Slider requires a browser that supports CSS3 transitions");
		var a = this;
		this.element = b(c);
		this.transitions = [];
		for ( var d in flux.transitions)
			this.transitions.push(d);
		this.options = b.extend({
			autoplay : true,
			transitions : this.transitions,
			delay : 4E3,
			pagination : true,
			controls : false,
			captions : false,
			width : null,
			height : null,
			onTransitionEnd : null
		}, e);
		this.height = this.options.height ? this.options.height : null;
		this.width = this.options.width ? this.options.width : null;
		var f = [];
		b(this.options.transitions).each(function(h, i) {
			var j = new flux.transitions[i](this), k = true;
			if (j.options.requires3d && !flux.browser.supports3d)
				k = false;
			if (j.options.compatibilityCheck)
				k = j.options.compatibilityCheck();
			k && f.push(i)
		});
		this.options.transitions = f;
		this.images = [];
		this.currentImageIndex = this.imageLoadedCount = 0;
		this.nextImageIndex = 1;
		this.playing = false;
		this.container = b('<div class="fluxslider"></div>').appendTo(
				this.element);
		this.surface = b(
				'<div class="surface" style="position: relative"></div>')
				.appendTo(this.container);
		this.container.bind("click", function(h) {
			if (b(h.target).hasClass("hasLink"))
				window.location = b(h.target).data("href")
		});
		this.imageContainer = b('<div class="images loading"></div>').css({
			position : "relative",
			overflow : "hidden",
			"min-height" : "100px"
		}).appendTo(this.surface);
		this.width && this.height && this.imageContainer.css({
			width : this.width + "px",
			height : this.height + "px"
		});
		this.image1 = b(
				'<div class="image1" style="height: 100%; width: 100%"></div>')
				.appendTo(this.imageContainer);
		this.image2 = b(
				'<div class="image2" style="height: 100%; width: 100%"></div>')
				.appendTo(this.imageContainer);
		b(this.image1).add(this.image2).css({
			position : "absolute",
			top : "0px",
			left : "0px"
		});
		this.element.find("img, a img").each(function(h, i) {
			var j = i.cloneNode(false), k = b(i).parent();
			k.is("a") && b(j).data("href", k.attr("href"));
			a.images.push(j);
			b(i).remove()
		});
		for (d = 0; d < this.images.length; d++) {
			var g = new Image;
			g.onload = function() {
				a.imageLoadedCount++;
				a.width = a.width ? a.width : this.width;
				a.height = a.height ? a.height : this.height;
				if (a.imageLoadedCount >= a.images.length) {
					a.finishedLoading();
					a.setupImages()
				}
			};
			g.src = this.images[d].src
		}
		this.element.bind("fluxTransitionEnd", function(h, i) {
			if (a.options.onTransitionEnd) {
				h.preventDefault();
				a.options.onTransitionEnd(i)
			}
		});
		this.options.autoplay && this.start();
		this.element.bind("swipeLeft", function() {
			a.next(null, {
				direction : "left"
			})
		}).bind("swipeRight", function() {
			a.prev(null, {
				direction : "right"
			})
		});
		setTimeout(function() {
			b(window).focus(function() {
				a.isPlaying() && a.next()
			})
		}, 100)
	};
	flux.slider.prototype = {
		constructor : flux.slider,
		playing : false,
		start : function() {
			var c = this;
			this.playing = true;
			this.interval = setInterval(function() {
				console.log("play");
				c.transition()
			}, this.options.delay)
		},
		stop : function() {
			this.playing = false;
			clearInterval(this.interval);
			this.interval = null
		},
		isPlaying : function() {
			return this.playing
		},
		next : function(c, e) {
			e = e || {};
			e.direction = "left";
			this.showImage(this.currentImageIndex + 1, c, e)
		},
		prev : function(c, e) {
			e = e || {};
			e.direction = "right";
			this.showImage(this.currentImageIndex - 1, c, e)
		},
		showImage : function(c, e, a) {
			this.setNextIndex(c);
			this.setupImages();
			this.transition(e, a)
		},
		finishedLoading : function() {
			var c = this;
			this.container.css({
				width : this.width + "px",
				height : this.height + "px"
			});
			this.imageContainer.removeClass("loading");
			if (this.options.pagination) {
				this.pagination = b('<ul class="pagination"></ul>').css({
					margin : "0px",
					padding : "0px",
					"text-align" : "center"
				});
				this.pagination.bind("click", function(a) {
					a.preventDefault();
					c.showImage(b(a.target).data("index"))
				});
				b(this.images).each(
						function(a) {
							var d = b(
									'<li data-index="' + a + '">' + (a + 1)
											+ "</li>").css({
								display : "inline-block",
								"margin-left" : "0.5em",
								cursor : "pointer"
							}).appendTo(c.pagination);
							a == 0
									&& d.css("margin-left", 0).addClass(
											"current")
						});
				this.container.append(this.pagination)
			}
			b(this.imageContainer).css({
				width : this.width + "px",
				height : this.height + "px"
			});
			b(this.image1).css({
				width : this.width + "px",
				height : this.height + "px"
			});
			b(this.image2).css({
				width : this.width + "px",
				height : this.height + "px"
			});
			this.container.css({
				width : this.width + "px",
				height : this.height
						+ (this.options.pagination ? this.pagination.height()
								: 0) + "px"
			});
			if (this.options.controls) {
				var e = {
					padding : "4px 10px 10px",
					"font-size" : "60px",
					"font-family" : "yekan, tahoma, arial, sans-serif",
					"line-height" : "1em",
					"font-weight" : "bold",
					color : "#FFF",
					"text-decoration" : "none",
					background : "rgba(0,0,0,0.5)",
					position : "absolute",
					"z-index" : 2E3
				};
				this.nextButton = b('<a href="#">\u00bb</a>').css(e).css3({
					"border-radius" : "4px"
				}).appendTo(this.surface).bind("click", function(a) {
					a.preventDefault();
					c.next()
				});
				this.prevButton = b('<a href="#">\u00ab</a>').css(e).css3({
					"border-radius" : "4px"
				}).appendTo(this.surface).bind("click", function(a) {
					a.preventDefault();
					c.prev()
				});
				e = (this.height - this.nextButton.height()) / 2;
				this.nextButton.css({
					top : e + "px",
					right : "10px"
				});
				this.prevButton.css({
					top : e + "px",
					left : "10px"
				})
			}
			if (this.options.captions)
				this.captionBar = b('<div class="caption"></div>').css({
					background : "rgba(0,0,0,0.6)",
					color : "#FFF",
					"font-size" : "16px",
					"font-family" : "yekan, tahoma, helvetica, arial, sans-serif",
					"text-decoration" : "none",
					"font-weight" : "bold",
					padding : "1.5em 1em",
					opacity : 0,
					position : "absolute",
					"z-index" : 110,
					width : "100%",
					bottom : 0
				}).css3({
					"transition-property" : "opacity",
					"transition-duration" : "800ms",
					"box-sizing" : "border-box"
				}).prependTo(this.surface);
			this.updateCaption()
		},
		setupImages : function() {
			var c = this.getImage(this.currentImageIndex), e = {
				"background-image" : 'url("' + c.src + '")',
				"z-index" : 101,
				cursor : "auto"
			};
			if (b(c).data("href")) {
				e.cursor = "pointer";
				this.image1.addClass("hasLink");
				this.image1.data("href", b(c).data("href"))
			} else {
				this.image1.removeClass("hasLink");
				this.image1.data("href", null)
			}
			this.image1.css(e).children().remove();
			this.image2
					.css(
							{
								"background-image" : 'url("'
										+ this.getImage(this.nextImageIndex).src
										+ '")',
								"z-index" : 100
							}).show();
			if (this.options.pagination && this.pagination) {
				this.pagination.find("li.current").removeClass("current");
				b(this.pagination.find("li")[this.currentImageIndex]).addClass(
						"current")
			}
		},
		transition : function(c, e) {
			if (c == undefined || !flux.transitions[c])
				c = this.options.transitions[Math.floor(Math.random()
						* this.options.transitions.length)];
			var a = null;
			try {
				a = new flux.transitions[c](this, b.extend(
						this.options[c] ? this.options[c] : {}, e))
			} catch (d) {
				a = new flux.transition(this, {
					fallback : true
				})
			}
			a.run();
			this.currentImageIndex = this.nextImageIndex;
			this.setNextIndex(this.currentImageIndex + 1);
			this.updateCaption()
		},
		updateCaption : function() {
			var c = b(this.getImage(this.currentImageIndex)).attr("title");
			if (this.options.captions && this.captionBar) {
				c !== "" && this.captionBar.html(c);
				this.captionBar.css("opacity", c === "" ? 0 : 1)
			}
		},
		getImage : function(c) {
			c %= this.images.length;
			return this.images[c]
		},
		setNextIndex : function(c) {
			if (c == undefined)
				c = this.currentImageIndex + 1;
			this.nextImageIndex = c;
			if (this.nextImageIndex > this.images.length - 1)
				this.nextImageIndex = 0;
			if (this.nextImageIndex < 0)
				this.nextImageIndex = this.images.length - 1
		},
		increment : function() {
			this.currentImageIndex++;
			if (this.currentImageIndex > this.images.length - 1)
				this.currentImageIndex = 0
		}
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.browser = {
		init : function() {
			if (flux.browser.supportsTransitions === undefined) {
				document.createElement("div");
				var c = [ "-webkit", "-moz", "-o", "-ms" ];
				flux.browser.supportsTransitions = window.Modernizr
						&& Modernizr.csstransitions !== undefined ? Modernizr.csstransitions
						: this.supportsCSSProperty("Transition");
				if (window.Modernizr && Modernizr.csstransforms3d !== undefined)
					flux.browser.supports3d = Modernizr.csstransforms3d;
				else {
					flux.browser.supports3d = this
							.supportsCSSProperty("Perspective");
					if (flux.browser.supports3d
							&& "webkitPerspective" in b("body").get(0).style) {
						var e = b('<div id="csstransform3d"></div>');
						c = b('<style media="(transform-3d), ('
								+ c.join("-transform-3d),(")
								+ '-transform-3d)">div#csstransform3d { position: absolute; left: 9px }</style>');
						b("body").append(e);
						b("head").append(c);
						flux.browser.supports3d = e.get(0).offsetLeft == 9;
						e.remove();
						c.remove()
					}
				}
			}
		},
		supportsCSSProperty : function(c) {
			for ( var e = document.createElement("div"), a = [ "Webkit", "Moz",
					"O", "Ms" ], d = false, f = 0; f < a.length; f++)
				if (a[f] + c in e.style)
					d = d || true;
			return d
		},
		translate : function(c, e, a) {
			c = c != undefined ? c : 0;
			e = e != undefined ? e : 0;
			a = a != undefined ? a : 0;
			return "translate" + (flux.browser.supports3d ? "3d(" : "(") + c
					+ "px," + e
					+ (flux.browser.supports3d ? "px," + a + "px)" : "px)")
		},
		rotateX : function(c) {
			return flux.browser.rotate("x", c)
		},
		rotateY : function(c) {
			return flux.browser.rotate("y", c)
		},
		rotateZ : function(c) {
			return flux.browser.rotate("z", c)
		},
		rotate : function(c, e) {
			if (!c in {
				x : "",
				y : "",
				z : ""
			})
				c = "z";
			e = e != undefined ? e : 0;
			return flux.browser.supports3d ? "rotate3d("
					+ (c == "x" ? "1" : "0") + ", " + (c == "y" ? "1" : "0")
					+ ", " + (c == "z" ? "1" : "0") + ", " + e + "deg)"
					: c == "z" ? "rotate(" + e + "deg)" : ""
		}
	};
	b(function() {
		flux.browser.init()
	})
})(window.jQuery || window.Zepto);
(function(b) {
	b.fn.css3 = function(c) {
		var e = {}, a = [ "webkit", "moz", "ms", "o" ], d;
		for (d in c) {
			for ( var f = 0; f < a.length; f++)
				e["-" + a[f] + "-" + d] = c[d];
			e[d] = c[d]
		}
		this.css(e);
		return this
	};
	b.fn.transitionEnd = function(c) {
		for ( var e = [ "webkitTransitionEnd", "transitionend",
				"oTransitionEnd" ], a = 0; a < e.length; a++)
			this.bind(e[a], function(d) {
				for ( var f = 0; f < e.length; f++)
					b(this).unbind(e[f]);
				c && c.call(this, d)
			});
		return this
	};
	flux.transition = function(c, e) {
		this.options = b.extend({
			requires3d : false,
			after : function() {
			}
		}, e);
		this.slider = c;
		if (this.options.requires3d && !flux.browser.supports3d
				|| !flux.browser.supportsTransitions
				|| this.options.fallback === true) {
			var a = this;
			this.options.after = undefined;
			this.options.setup = function() {
				a.fallbackSetup()
			};
			this.options.execute = function() {
				a.fallbackExecute()
			}
		}
	};
	flux.transition.prototype = {
		constructor : flux.transition,
		hasFinished : false,
		run : function() {
			var c = this;
			this.options.setup !== undefined && this.options.setup.call(this);
			this.slider.image1.css({
				"background-image" : "none"
			});
			this.slider.imageContainer.css("overflow",
					this.options.requires3d ? "visible" : "hidden");
			setTimeout(function() {
				c.options.execute !== undefined && c.options.execute.call(c)
			}, 5)
		},
		finished : function() {
			if (!this.hasFinished) {
				this.hasFinished = true;
				this.options.after && this.options.after.call(this);
				this.slider.imageContainer.css("overflow", "hidden");
				this.slider.setupImages();
				this.slider.element.trigger("fluxTransitionEnd", {
					currentImage : this.slider
							.getImage(this.slider.currentImageIndex)
				})
			}
		},
		fallbackSetup : function() {
		},
		fallbackExecute : function() {
			this.finished()
		}
	};
	flux.transitions = {};
	flux.transition_grid = function(c, e) {
		return new flux.transition(
				c,
				b
						.extend(
								{
									columns : 6,
									rows : 6,
									forceSquare : false,
									setup : function() {
										var a = this.slider.image1.width(), d = this.slider.image1
												.height(), f = Math.floor(a
												/ this.options.columns), g = Math
												.floor(d / this.options.rows);
										if (this.options.forceSquare) {
											g = f;
											this.options.rows = Math.floor(d
													/ g)
										}
										a = a - this.options.columns * f;
										var h = Math.ceil(a
												/ this.options.columns);
										d = d - this.options.rows * g;
										var i = Math
												.ceil(d / this.options.rows);
										this.slider.image1.height();
										for ( var j = 0, k = 0, q = document
												.createDocumentFragment(), m = 0; m < this.options.columns; m++) {
											var n = f;
											k = 0;
											if (a > 0) {
												var l = a >= h ? h : a;
												n += l;
												a -= l
											}
											for ( var o = 0; o < this.options.rows; o++) {
												var p = g;
												l = d;
												if (l > 0) {
													l = l >= i ? i : l;
													p += l
												}
												l = b(
														'<div class="tile tile-'
																+ m + "-" + o
																+ '"></div>')
														.css(
																{
																	width : n
																			+ "px",
																	height : p
																			+ "px",
																	position : "absolute",
																	top : k
																			+ "px",
																	left : j
																			+ "px"
																});
												this.options.renderTile.call(
														this, l, m, o, n, p, j,
														k);
												q.appendChild(l.get(0));
												k += p
											}
											j += n
										}
										this.slider.image1.get(0)
												.appendChild(q)
									},
									execute : function() {
										var a = this, d = this.slider.image1
												.height(), f = this.slider.image1
												.find("div.barcontainer");
										this.slider.image2.hide();
										f.last().transitionEnd(function() {
											a.slider.image2.show();
											a.finished()
										});
										f.css3({
											transform : flux.browser
													.rotateX(-90)
													+ " "
													+ flux.browser.translate(0,
															d / 2, d / 2)
										})
									},
									renderTile : function() {
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.bars = function(c, e) {
		return new flux.transition_grid(
				c,
				b
						.extend(
								{
									columns : 10,
									rows : 1,
									delayBetweenBars : 40,
									renderTile : function(a, d, f, g, h, i) {
										b(a)
												.css(
														{
															"background-image" : this.slider.image1
																	.css("background-image"),
															"background-position" : "-"
																	+ i
																	+ "px 0px"
														})
												.css3(
														{
															"transition-duration" : "400ms",
															"transition-timing-function" : "ease-in",
															"transition-property" : "all",
															"transition-delay" : d
																	* this.options.delayBetweenBars
																	+ "ms"
														})
									},
									execute : function() {
										var a = this, d = this.slider.image1
												.height(), f = this.slider.image1
												.find("div.tile");
										b(f[f.length - 1]).transitionEnd(
												function() {
													a.finished()
												});
										setTimeout(
												function() {
													f
															.css({
																opacity : "0.5"
															})
															.css3(
																	{
																		transform : flux.browser
																				.translate(
																						0,
																						d)
																	})
												}, 50)
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.bars3d = function(c, e) {
		return new flux.transition_grid(
				c,
				b
						.extend(
								{
									requires3d : true,
									columns : 7,
									rows : 1,
									delayBetweenBars : 150,
									perspective : 1E3,
									renderTile : function(a, d, f, g, h, i) {
										f = b(
												'<div class="bar-' + d
														+ '"></div>')
												.css(
														{
															width : g + "px",
															height : "100%",
															position : "absolute",
															top : "0px",
															left : "0px",
															"z-index" : 200,
															"background-image" : this.slider.image1
																	.css("background-image"),
															"background-position" : "-"
																	+ i
																	+ "px 0px",
															"background-repeat" : "no-repeat"
														})
												.css3(
														{
															"backface-visibility" : "hidden"
														});
										var j = b(f.get(0).cloneNode(false))
												.css(
														{
															"background-image" : this.slider.image2
																	.css("background-image")
														})
												.css3(
														{
															transform : flux.browser
																	.rotateX(90)
																	+ " "
																	+ flux.browser
																			.translate(
																					0,
																					-h / 2,
																					h / 2)
														}), k = b(
												'<div class="side bar-' + d
														+ '"></div>')
												.css({
													width : h + "px",
													height : h + "px",
													position : "absolute",
													top : "0px",
													left : "0px",
													background : "#222",
													"z-index" : 190
												})
												.css3(
														{
															transform : flux.browser
																	.rotateY(90)
																	+ " "
																	+ flux.browser
																			.translate(
																					h / 2,
																					0,
																					-h / 2)
																	+ " "
																	+ flux.browser
																			.rotateY(180),
															"backface-visibility" : "hidden"
														});
										h = b(k.get(0).cloneNode(false))
												.css3(
														{
															transform : flux.browser
																	.rotateY(90)
																	+ " "
																	+ flux.browser
																			.translate(
																					h / 2,
																					0,
																					g
																							- h
																							/ 2)
														});
										b(a)
												.css(
														{
															width : g + "px",
															height : "100%",
															position : "absolute",
															top : "0px",
															left : i + "px",
															"z-index" : d > this.options.columns / 2 ? 1E3 - d
																	: 1E3
														})
												.css3(
														{
															"transition-duration" : "800ms",
															"transition-timing-function" : "linear",
															"transition-property" : "all",
															"transition-delay" : d
																	* this.options.delayBetweenBars
																	+ "ms",
															"transform-style" : "preserve-3d"
														}).append(f).append(j)
												.append(k).append(h)
									},
									execute : function() {
										this.slider.image1
												.css3(
														{
															perspective : this.options.perspective,
															"perspective-origin" : "50% 50%"
														})
												.css(
														{
															"-moz-transform" : "perspective("
																	+ this.options.perspective
																	+ "px)",
															"-moz-perspective" : "none",
															"-moz-transform-style" : "preserve-3d"
														});
										var a = this, d = this.slider.image1
												.height(), f = this.slider.image1
												.find("div.tile");
										this.slider.image2.hide();
										f.last().transitionEnd(function() {
											a.slider.image1.css3({
												"transform-style" : "flat"
											});
											a.slider.image2.show();
											a.finished()
										});
										setTimeout(function() {
											f.css3({
												transform : flux.browser
														.rotateX(-90)
														+ " "
														+ flux.browser
																.translate(0,
																		d / 2,
																		d / 2)
											})
										}, 50)
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.blinds = function(c, e) {
		return new flux.transitions.bars(c, b.extend({
			execute : function() {
				var a = this;
				this.slider.image1.height();
				var d = this.slider.image1.find("div.tile");
				b(d[d.length - 1]).transitionEnd(function() {
					a.finished()
				});
				setTimeout(function() {
					d.css({
						opacity : "0.5"
					}).css3({
						transform : "scalex(0.0001)"
					})
				}, 50)
			}
		}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.blinds3d = function(c, e) {
		return new flux.transitions.tiles3d(c, b.extend({
			forceSquare : false,
			rows : 1,
			columns : 6
		}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.zip = function(c, e) {
		return new flux.transitions.bars(
				c,
				b
						.extend(
								{
									execute : function() {
										var a = this, d = this.slider.image1
												.height(), f = this.slider.image1
												.find("div.tile");
										b(f[f.length - 1]).transitionEnd(
												function() {
													a.finished()
												});
										setTimeout(
												function() {
													f
															.each(function(g, h) {
																b(h)
																		.css(
																				{
																					opacity : "0.3"
																				})
																		.css3(
																				{
																					transform : flux.browser
																							.translate(
																									0,
																									g % 2 ? "-"
																											+ 2
																											* d
																											: d)
																				})
															})
												}, 20)
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.blocks = function(c, e) {
		return new flux.transition_grid(c, b.extend({
			forceSquare : true,
			delayBetweenBars : 100,
			renderTile : function(a, d, f, g, h, i, j) {
				d = Math.floor(Math.random() * 10
						* this.options.delayBetweenBars);
				b(a).css(
						{
							"background-image" : this.slider.image1
									.css("background-image"),
							"background-position" : "-" + i + "px -" + j + "px"
						}).css3({
					"transition-duration" : "350ms",
					"transition-timing-function" : "ease-in",
					"transition-property" : "all",
					"transition-delay" : d + "ms"
				});
				if (this.maxDelay === undefined)
					this.maxDelay = 0;
				if (d > this.maxDelay) {
					this.maxDelay = d;
					this.maxDelayTile = a
				}
			},
			execute : function() {
				var a = this, d = this.slider.image1.find("div.tile");
				this.maxDelayTile.transitionEnd(function() {
					a.finished()
				});
				setTimeout(function() {
					d.each(function(f, g) {
						b(g).css({
							opacity : "0"
						}).css3({
							transform : "scale(0.8)"
						})
					})
				}, 50)
			}
		}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.blocks2 = function(c, e) {
		return new flux.transition_grid(c, b.extend({
			cols : 12,
			forceSquare : true,
			delayBetweenDiagnols : 150,
			renderTile : function(a, d, f, g, h, i, j) {
				b(a).css(
						{
							"background-image" : this.slider.image1
									.css("background-image"),
							"background-position" : "-" + i + "px -" + j + "px"
						}).css3(
						{
							"transition-duration" : "350ms",
							"transition-timing-function" : "ease-in",
							"transition-property" : "all",
							"transition-delay" : (d + f)
									* this.options.delayBetweenDiagnols + "ms",
							"backface-visibility" : "hidden"
						})
			},
			execute : function() {
				var a = this, d = this.slider.image1.find("div.tile");
				d.last().transitionEnd(function() {
					a.finished()
				});
				setTimeout(function() {
					d.each(function(f, g) {
						b(g).css({
							opacity : "0"
						}).css3({
							transform : "scale(0.8)"
						})
					})
				}, 50)
			}
		}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.concentric = function(c, e) {
		return new flux.transition(
				c,
				b
						.extend(
								{
									blockSize : 60,
									delay : 150,
									alternate : false,
									setup : function() {
										for ( var a = this.slider.image1
												.width(), d = this.slider.image1
												.height(), f = Math
												.ceil((Math.sqrt(a * a + d * d) - this.options.blockSize)
														/ 2
														/ this.options.blockSize) + 1, g = document
												.createDocumentFragment(), h = 0; h < f; h++) {
											var i = 2 * h
													* this.options.blockSize
													+ this.options.blockSize;
											i = b("<div></div>")
													.attr("class",
															"block block-" + h)
													.css(
															{
																width : i
																		+ "px",
																height : i
																		+ "px",
																position : "absolute",
																top : (d - i)
																		/ 2
																		+ "px",
																left : (a - i)
																		/ 2
																		+ "px",
																"z-index" : 100 + (f - h),
																"background-image" : this.slider.image1
																		.css("background-image"),
																"background-position" : "center center"
															})
													.css3(
															{
																"border-radius" : i
																		+ "px",
																"transition-duration" : "800ms",
																"transition-timing-function" : "linear",
																"transition-property" : "all",
																"transition-delay" : (f - h)
																		* this.options.delay
																		+ "ms"
															});
											g.appendChild(i.get(0))
										}
										this.slider.image1.get(0)
												.appendChild(g)
									},
									execute : function() {
										var a = this, d = this.slider.image1
												.find("div.block");
										b(d[0]).transitionEnd(function() {
											a.finished()
										});
										setTimeout(
												function() {
													d
															.each(function(f, g) {
																b(g)
																		.css(
																				{
																					opacity : "0"
																				})
																		.css3(
																				{
																					transform : flux.browser
																							.rotateZ((!a.options.alternate
																									|| f
																									% 2 ? ""
																									: "-")
																									+ "90")
																				})
															})
												}, 50)
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.warp = function(c, e) {
		return new flux.transitions.concentric(c, b.extend({
			delay : 30,
			alternate : true
		}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.cube = function(c, e) {
		return new flux.transition(c, b.extend({
			requires3d : true,
			barWidth : 100,
			direction : "left",
			perspective : 1E3,
			setup : function() {
				var a = this.slider.image1.width(), d = this.slider.image1
						.height();
				this.slider.image1.css3({
					perspective : this.options.perspective,
					"perspective-origin" : "50% 50%"
				});
				this.cubeContainer = b('<div class="cube"></div>').css({
					width : a + "px",
					height : d + "px",
					position : "relative"
				}).css3({
					"transition-duration" : "800ms",
					"transition-timing-function" : "linear",
					"transition-property" : "all",
					"transform-style" : "preserve-3d"
				});
				a = {
					height : "100%",
					width : "100%",
					position : "absolute",
					top : "0px",
					left : "0px"
				};
				this.cubeContainer.append(b('<div class="face current"></div>')
						.css(
								b.extend(a, {
									background : this.slider.image1
											.css("background-image")
								})).css3({
							"backface-visibility" : "hidden"
						}));
				this.cubeContainer.append(b('<div class="face next"></div>')
						.css(
								b.extend(a, {
									background : this.slider.image2
											.css("background-image")
								})).css3(
								{
									transform : this.options.transitionStrings
											.call(this, this.options.direction,
													"nextFace"),
									"backface-visibility" : "hidden"
								}));
				this.slider.image1.append(this.cubeContainer)
			},
			execute : function() {
				var a = this;
				this.slider.image1.width();
				this.slider.image1.height();
				this.slider.image2.hide();
				this.cubeContainer.transitionEnd(function() {
					a.slider.image2.show();
					a.finished()
				});
				setTimeout(function() {
					a.cubeContainer.css3({
						transform : a.options.transitionStrings.call(a,
								a.options.direction, "container")
					})
				}, 50)
			},
			transitionStrings : function(a, d) {
				var f = this.slider.image1.width(), g = this.slider.image1
						.height();
				f = {
					up : {
						nextFace : flux.browser.rotateX(-90) + " "
								+ flux.browser.translate(0, g / 2, g / 2),
						container : flux.browser.rotateX(90) + " "
								+ flux.browser.translate(0, -g / 2, g / 2)
					},
					down : {
						nextFace : flux.browser.rotateX(90) + " "
								+ flux.browser.translate(0, -g / 2, g / 2),
						container : flux.browser.rotateX(-90) + " "
								+ flux.browser.translate(0, g / 2, g / 2)
					},
					left : {
						nextFace : flux.browser.rotateY(90) + " "
								+ flux.browser.translate(f / 2, 0, f / 2),
						container : flux.browser.rotateY(-90) + " "
								+ flux.browser.translate(-f / 2, 0, f / 2)
					},
					right : {
						nextFace : flux.browser.rotateY(-90) + " "
								+ flux.browser.translate(-f / 2, 0, f / 2),
						container : flux.browser.rotateY(90) + " "
								+ flux.browser.translate(f / 2, 0, f / 2)
					}
				};
				return f[a] && f[a][d] ? f[a][d] : false
			}
		}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.tiles3d = function(c, e) {
		return new flux.transition_grid(c, b.extend({
			requires3d : true,
			forceSquare : true,
			columns : 5,
			perspective : 600,
			delayBetweenBarsX : 200,
			delayBetweenBarsY : 150,
			renderTile : function(a, d, f, g, h, i, j) {
				g = b("<div></div>")
						.css(
								{
									width : g + "px",
									height : h + "px",
									position : "absolute",
									top : "0px",
									left : "0px",
									"background-image" : this.slider.image1
											.css("background-image"),
									"background-position" : "-" + i + "px -"
											+ j + "px",
									"background-repeat" : "no-repeat",
									"-moz-transform" : "translateZ(1px)"
								}).css3({
							"backface-visibility" : "hidden"
						});
				h = b(g.get(0).cloneNode(false)).css(
						{
							"background-image" : this.slider.image2
									.css("background-image")
						}).css3({
					transform : flux.browser.rotateY(180),
					"backface-visibility" : "hidden"
				});
				b(a).css(
						{
							"z-index" : (d > this.options.columns / 2 ? 500 - d
									: 500)
									+ (f > this.options.rows / 2 ? 500 - f
											: 500)
						}).css3(
						{
							"transition-duration" : "800ms",
							"transition-timing-function" : "ease-out",
							"transition-property" : "all",
							"transition-delay" : d
									* this.options.delayBetweenBarsX + f
									* this.options.delayBetweenBarsY + "ms",
							"transform-style" : "preserve-3d"
						}).append(g).append(h)
			},
			execute : function() {
				this.slider.image1.css3({
					perspective : this.options.perspective,
					"perspective-origin" : "50% 50%"
				});
				var a = this, d = this.slider.image1.find("div.tile");
				this.slider.image2.hide();
				d.last().transitionEnd(function() {
					a.slider.image2.show();
					a.finished()
				});
				setTimeout(function() {
					d.css3({
						transform : flux.browser.rotateY(180)
					})
				}, 50)
			}
		}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.turn = function(c, e) {
		return new flux.transition(
				c,
				b
						.extend(
								{
									requires3d : true,
									perspective : 1300,
									direction : "left",
									setup : function() {
										var a = b('<div class="tab"></div>')
												.css(
														{
															width : "50%",
															height : "100%",
															position : "absolute",
															top : "0px",
															left : this.options.direction == "left" ? "50%"
																	: "0%",
															"z-index" : 101
														})
												.css3(
														{
															"transform-style" : "preserve-3d",
															"transition-duration" : "1000ms",
															"transition-timing-function" : "ease-out",
															"transition-property" : "all",
															"transform-origin" : this.options.direction == "left" ? "left center"
																	: "right center"
														});
										b("<div></div>")
												.appendTo(a)
												.css(
														{
															"background-image" : this.slider.image1
																	.css("background-image"),
															"background-position" : (this.options.direction == "left" ? "-"
																	+ this.slider.image1
																			.width()
																	/ 2
																	: 0)
																	+ "px 0",
															width : "100%",
															height : "100%",
															position : "absolute",
															top : "0",
															left : "0",
															"-moz-transform" : "translateZ(1px)"
														})
												.css3(
														{
															"backface-visibility" : "hidden"
														});
										b("<div></div>")
												.appendTo(a)
												.css(
														{
															"background-image" : this.slider.image2
																	.css("background-image"),
															"background-position" : (this.options.direction == "left" ? 0
																	: "-"
																			+ this.slider.image1
																					.width()
																			/ 2)
																	+ "px 0",
															width : "100%",
															height : "100%",
															position : "absolute",
															top : "0",
															left : "0"
														})
												.css3(
														{
															transform : flux.browser
																	.rotateY(180),
															"backface-visibility" : "hidden"
														});
										var d = b("<div></div>")
												.css(
														{
															position : "absolute",
															top : "0",
															left : this.options.direction == "left" ? "0"
																	: "50%",
															width : "50%",
															height : "100%",
															"background-image" : this.slider.image1
																	.css("background-image"),
															"background-position" : (this.options.direction == "left" ? 0
																	: "-"
																			+ this.slider.image1
																					.width()
																			/ 2)
																	+ "px 0",
															"z-index" : 100
														}), f = b(
												'<div class="overlay"></div>')
												.css(
														{
															position : "absolute",
															top : "0",
															left : this.options.direction == "left" ? "50%"
																	: "0",
															width : "50%",
															height : "100%",
															background : "#000",
															opacity : 1
														})
												.css3(
														{
															"transition-duration" : "800ms",
															"transition-timing-function" : "linear",
															"transition-property" : "opacity"
														});
										this.slider.image1
												.append(b("<div></div>")
														.css3({
															width : "100%",
															height : "100%"
														})
														.css3(
																{
																	perspective : this.options.perspective,
																	"perspective-origin" : "50% 50%"
																}).append(a)
														.append(d).append(f))
									},
									execute : function() {
										var a = this;
										this.slider.image1.find("div.tab")
												.first().transitionEnd(
														function() {
															a.finished()
														});
										setTimeout(
												function() {
													a.slider.image1
															.find("div.tab")
															.css3(
																	{
																		transform : flux.browser
																				.rotateY(a.options.direction == "left" ? -179
																						: 179)
																	});
													a.slider.image1.find(
															"div.overlay").css(
															{
																opacity : 0
															})
												}, 50)
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.slide = function(c, e) {
		return new flux.transition(
				c,
				b
						.extend(
								{
									direction : "left",
									setup : function() {
										var a = this.slider.image1.width(), d = this.slider.image1
												.height(), f = b(
												'<div class="current"></div>')
												.css(
														{
															height : d + "px",
															width : a + "px",
															position : "absolute",
															top : "0px",
															left : "0px",
															background : this.slider[this.options.direction == "left" ? "image1"
																	: "image2"]
																	.css("background-image")
														})
												.css3(
														{
															"backface-visibility" : "hidden"
														}), g = b(
												'<div class="next"></div>')
												.css(
														{
															height : d + "px",
															width : a + "px",
															position : "absolute",
															top : "0px",
															left : a + "px",
															background : this.slider[this.options.direction == "left" ? "image2"
																	: "image1"]
																	.css("background-image")
														})
												.css3(
														{
															"backface-visibility" : "hidden"
														});
										this.slideContainer = b(
												'<div class="slide"></div>')
												.css(
														{
															width : 2 * a
																	+ "px",
															height : d + "px",
															position : "relative",
															left : this.options.direction == "left" ? "0px"
																	: -a + "px",
															"z-index" : 101
														})
												.css3(
														{
															"transition-duration" : "600ms",
															"transition-timing-function" : "ease-in",
															"transition-property" : "all"
														});
										this.slideContainer.append(f).append(g);
										this.slider.image1
												.append(this.slideContainer)
									},
									execute : function() {
										var a = this, d = this.slider.image1
												.width();
										if (this.options.direction == "left")
											d = -d;
										this.slideContainer
												.transitionEnd(function() {
													a.finished()
												});
										setTimeout(function() {
											a.slideContainer.css3({
												transform : flux.browser
														.translate(d)
											})
										}, 50)
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.swipe = function(c, e) {
		return new flux.transition(
				c,
				b
						.extend(
								{
									setup : function() {
										this.slider.image1
												.append(b("<div></div>")
														.css(
																{
																	width : "100%",
																	height : "100%",
																	"background-image" : this.slider.image1
																			.css("background-image")
																})
														.css3(
																{
																	"transition-duration" : "1600ms",
																	"transition-timing-function" : "ease-in",
																	"transition-property" : "all",
																	"mask-image" : "-webkit-linear-gradient(left, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 48%, rgba(0,0,0,1) 52%, rgba(0,0,0,1) 100%)",
																	"mask-position" : "70%",
																	"mask-size" : "400%"
																}))
									},
									execute : function() {
										var a = this, d = this.slider.image1
												.find("div");
										b(d).transitionEnd(function() {
											a.finished()
										});
										setTimeout(function() {
											b(d).css3({
												"mask-position" : "30%"
											})
										}, 50)
									},
									compatibilityCheck : function() {
										return flux.browser
												.supportsCSSProperty("MaskImage")
									}
								}, e))
	}
})(window.jQuery || window.Zepto);
(function(b) {
	flux.transitions.dissolve = function(c, e) {
		return new flux.transition(c, b.extend({
			setup : function() {
				this.slider.image1.append(b('<div class="image"></div>').css(
						{
							width : "100%",
							height : "100%",
							"background-image" : this.slider.image1
									.css("background-image")
						}).css3({
					"transition-duration" : "600ms",
					"transition-timing-function" : "ease-in",
					"transition-property" : "opacity"
				}))
			},
			execute : function() {
				var a = this, d = this.slider.image1.find("div.image");
				b(d).transitionEnd(function() {
					a.finished()
				});
				setTimeout(function() {
					b(d).css({
						opacity : "0.0"
					})
				}, 50)
			}
		}, e))
	}
})(window.jQuery || window.Zepto);
