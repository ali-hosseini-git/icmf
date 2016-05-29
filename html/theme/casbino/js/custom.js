/* Count down */
$(document).on('change', '#byPassCountDown', function (){
	if($(this).val() == 'digicasbino'){
		$('#modalWindow').fadeOut('slow', function(){
			$('#modalMask').fadeOut('slow');
			enable_scroll();
		});
	}
});

/* Video Intro */
$(document).on('click', '#introPlay', function (е) {
	$("#introVideoBox").html('<video id="introVideo" width="100%" height="100%" autoplay controls><source src="home/1/movies/00.01.Welcome.webm" type="video/webm; codecs="vp8, vorbis"" /></video>');
	$("#introVideo").on("ended", function() {
		$('#introVideoBox').farajax('loader', '/pageLoader/v_load/thin-services');
	});
});

/* PFV */


/* Post search auto Complete */
$('#postSearchList').keyup(function() {
	var text = $(this).val();
	if(text.length >= 2){
		$('#postSearchResult').css('background', 'url(load.gif);');
		$('#postSearchResult').slideDown();
		$('#postSearchResult').farajax('loader', '/post/c_showTitleListObject/title=' + $('#postSearchList').val());
	}else{
		$('#postSearchResult').slideUp();
	}
});

/* Right side scroll panel and to side scroll panel */
$(window).scroll(function() {
	if ($(this).scrollTop() > 20) {
		$('#goTop').animate({ 'right': '20px' }, { queue:false, duration:500 } );
		$('.header').addClass('topBarFixed');
	}else{
		$('#goTop').animate({ 'right': '-60px' }, { queue:false, duration:500 } );
		$('.header').removeClass('topBarFixed');
	}
});

$(document).on('click', '#goTop', function() {
	$.scrollTo('#wrapper', {duration:2000});
});

/************************
 * Comment              *
 ************************/
$(document).on('click', '#openCommentBox', function(){
	$('#addCommentBox').toggle('slow', function(){
//		$('#addCommentBox').farajax('loader', '/comment/v_addObject');
//		$('#listCommentBox').farajax('loader', '/comment/c_listObject');
	});
});

/************************
 * Share                *
 ************************/
$(document).on('click', '#openShareBox', function(){
	$('#shareBox').toggle('slow', function(){
		startShare();
	});
});

/************************
 * Tabs codes           *
 ************************/
$(document).on('click', '#tRadio', function(){
	$('#tabContent1').farajax('loader', 'post/c_showListObject/contentType=voice');
	$('.subTab1').removeClass('subTabClick');
	$(this).addClass('subTabClick');
});

$(document).on('click', '#tCinema', function(){
	$('#tabContent1').farajax('loader', 'post/c_showListObject/contentType=video');
	$('.subTab1').removeClass('subTabClick');
	$(this).addClass('subTabClick');
});

$(document).on('click', '#tSeoBox', function(){
	$('#tabContent1').farajax('loader', 'post/c_listObject/contentType=video');
	$('.subTab1').removeClass('subTabClick');
	$(this).addClass('subTabClick');
});

$(document).on('click', '#tForum', function(){
	$('#tabContent2').farajax('loader', 'forum/c_listObject');
	$('.subTab2').removeClass('subTabClick');
	$(this).addClass('subTabClick');
});

$(document).on('click', '#tTopPost', function(){
	$('#tabContent2').farajax('loader', 'post/c_showListObject/sort=viewCount DESC');
	$('.subTab2').removeClass('subTabClick');
	$(this).addClass('subTabClick');
});

$(document).on('click', '#tComment', function(){
	$('#tabContent2').farajax('loader', 'comment/c_showListObjectSimple/op=post');
	$('.subTab2').removeClass('subTabClick');
	$(this).addClass('subTabClick');
});

/************************
 * Cooperation          *
 ************************/
$(document).on('click', '#cooperationWebProgramming', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationWebProgrammingConditions').fadeIn('fast');
		$('#cooperationWebProgrammingConditions #cooperationRegFormType').val('درخواست همکاری در برنامه نویسی وب');
		$.scrollTo('#cooperationWebProgrammingConditions #cooperationregForm', {duration:1000});
	});
});

$(document).on('click', '#cooperationContentWriting', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationContentWritingConditions').fadeIn('fast');
		$('#cooperationContentWritingConditions #cooperationRegFormType').val('درخواست همکاری در تولید محتوا');
		$.scrollTo('#cooperationContentWritingConditions #cooperationregForm', {duration:1000});
	});
});

$(document).on('click', '#cooperationSales', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationSalesConditions').fadeIn('fast');
		$('#cooperationSalesConditions #cooperationRegFormType').val('درخواست همکاری در فروش');
		$.scrollTo('#cooperationSalesConditions #cooperationregForm', {duration:1000});
	});
});

$(document).on('click', '#cooperationWebDesigning', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationWebDesigningConditions').fadeIn('fast');
		$('#cooperationWebDesigningConditions #cooperationRegFormType').val('درخواست همکاری در طراحی وب');
		$.scrollTo('#cooperationWebDesigningConditions #cooperationregForm', {duration:1000});
	});
});

$(document).on('click', '#cooperationSEO', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationSEOConditions').fadeIn('fast');
		$('#cooperationSEOConditions #cooperationRegFormType').val('درخواست همکاری در سئو');
		$.scrollTo('#cooperationSEOConditions #cooperationregForm', {duration:1000});
	});
});

$(document).on('click', '#cooperationMobileProgramming', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationMobileProgrammingConditions').fadeIn('fast');
		$('#cooperationMobileProgrammingConditions #cooperationRegFormType').val('درخواست همکاری در برنامه نویسی موبایل');
		$.scrollTo('#cooperationMobileProgrammingConditions #cooperationregForm', {duration:1000});
	});
});

$(document).on('click', '#cooperationPublisher', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationPublisherConditions').fadeIn('fast');
		$('#cooperationPublisherConditions #cooperationRegFormType').val('درخواست همکاری در انتشار محتوا');
		$.scrollTo('#cooperationPublisherConditions #cooperationregForm', {duration:1000});
	});
	
});

$(document).on('click', '#cooperationTranslation', function(){
	$("[id$='Conditions']").fadeOut('fast', function(){
		$('#cooperationTranslationConditions').fadeIn('fast');
		$('#cooperationTranslationConditions #cooperationRegFormType').val('درخواست همکاری در ترجمه محتوا');
		$.scrollTo('#cooperationTranslationConditions #cooperationregForm', {duration:1000});
	});
	
});

/************************
 * Service Catalog      *
 ************************/
$(document).on('click', '#gotoScene1', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene1.jpg)');  
	$('#headline').html('آیا وبسایت دارید؟' );
	$('#buttonNav').html(	'<div class="row cell5">&nbsp;</div>' +
							'<div class="row cell45">' +
							'<button id="gotoScene2" class="x1_5 h80 cell90 centerObject">بله، وبسایت دارم</button>' +
							'</div>' +
							'<div class="row cell45">' +
							'<button id="gotoScene3" class="x1_5 h80 cell90 centerObject redFrame">خیر، وبسایت ندارم</button>' +
							'</div>' +
							'<div class="row cell5">&nbsp;</div>');
	$('#solutions').fadeOut('fast');
});

$(document).on('click', '#gotoScene2', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene2.jpg)');
	$('#headline').html('آیا مخاطب کافی دارید؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
							'<span id="gotoScene1" class="fa fa-reply fa-2x pointer"></span>' +
							'</div>' +
							'<div class="row cell45">' + 
							'<button id="gotoScene4" class="x1_5 h80 cell90 centerObject">بله، مشتری کافی دارم</button>' +
							'</div>' + 
							'<div class="row cell45">' +
							'<button id="gotoScene5" class="x1_5 h80 cell90 centerObject redFrame">خیر، مشتری کافی ندارم</button>' +
							'</div>' +
							'<div class="row cell5">&nbsp;</div>');
	$('#solutions').fadeOut('fast');
});

$(document).on('click', '#gotoScene3', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene3.jpg)');
	$('#headline').html('چگونه وب سایت داشته باشیم؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
			'<span id="gotoScene1" class="fa fa-reply fa-2x pointer"></span>' +
			'</div>' + 
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell5">&nbsp;</div>');
	//load website request
	$('#solutions').fadeIn('slow', function(){
		$('#solutions').farajax('loader', 'pageLoader/v_load/چگونه-وب-سایت-داشته-باشیم');
	});	
});

$(document).on('click', '#gotoScene4', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene4.jpg)');
	$('#headline').html('آیا فروش آنلاین مناسب دارید؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
							'<span id="gotoScene2" class="fa fa-reply fa-2x pointer"></span>' +
							'</div>' + 
							'<div class="row cell45">' + 
							'<button id="gotoScene6" class="x1_5 h80 cell90 centerObject">بله، فروش مناسب دارم</button>' +
							'</div>' +
							'<div class="row cell45">' +
							'<button id="gotoScene7" class="x1_5 h80 cell90 centerObject redFrame">خیر، فروش مناسب ندارم</button>' +
							'</div>' +
							'<div class="row cell5">&nbsp;</div>');
	$('#solutions').fadeOut('fast');
});

$(document).on('click', '#gotoScene5', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene5.jpg)');
	$('#headline').html('چگونه مخاطب آنلاین بیشتری جذب کنیم؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
			'<span id="gotoScene2" class="fa fa-reply fa-2x pointer"></span>' +
			'</div>' + 
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell5">&nbsp;</div>');
	//load website request
	$('#solutions').fadeIn('slow', function(){
		$('#solutions').farajax('loader', 'pageLoader/v_load/چگونه-مخاطب-آنلاین-بیشتری-جذب-کنیم');
	});
});

$(document).on('click', '#gotoScene6', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene6.jpg)');
	$('#headline').html('آیا برند شناخته شده‌ای هستید؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
							'<span id="gotoScene4" class="fa fa-reply fa-2x pointer"></span>' +
							'</div>' + 
							'<div class="row cell45">' + 
							'<button id="gotoScene8" class="x1_5 h80 cell90 centerObject">بله، برند هستم</button>' +
							'</div>' +
							'<div class="row cell45">' +
							'<button id="gotoScene9" class="x1_5 h80 cell90 centerObject redFrame">خیر، برند نیستم</button>' +
							'</div>' +
							'<div class="row cell5">&nbsp;</div>');
	$('#solutions').fadeOut('fast');
});

$(document).on('click', '#gotoScene7', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene7.jpg)');
	$('#headline').html('چگونه فروش آنلاین خود را افزایش دهیم؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
			'<span id="gotoScene4" class="fa fa-reply fa-2x pointer"></span>' +
			'</div>' + 
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell5">&nbsp;</div>');
	//load website request
	$('#solutions').fadeIn('slow', function(){
		$('#solutions').farajax('loader', 'pageLoader/v_load/چگونه-فروش-آنلاین-خود-را-افزایش-دهیم');
	});	
});

$(document).on('click', '#gotoScene8', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene8.jpg)');
	$('#headline').html('آیا مدیریت کسب وکار مناسبی دارید؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
							'<span id="gotoScene6" class="fa fa-reply fa-2x pointer"></span>' +
							'</div>' + 
							'<div class="row cell45">' + 
							'<button id="gotoScene10" class="x1_5 h80 cell90 centerObject">بله، مدیریت خوبی دارم</button>' +
							'</div>' +
							'<div class="row cell45">' +
							'<button id="gotoScene11" class="x1_5 h80 cell90 centerObject redFrame">خیر، مدیر خوبی نیستم</button>' +
							'</div>' +
							'<div class="row cell5">&nbsp;</div>');
	$('#solutions').fadeOut('fast');
});

$(document).on('click', '#gotoScene9', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene9.jpg)');
	$('#headline').html('چگونه برند آنلاین شناخته شده‌‌ای شویم؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
			'<span id="gotoScene6" class="fa fa-reply fa-2x pointer"></span>' +
			'</div>' + 
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell5">&nbsp;</div>');
	//load website request
	$('#solutions').fadeIn('slow', function(){
		$('#solutions').farajax('loader', 'pageLoader/v_load/چگونه-برند-آنلاین-شناخته-شده‌‌ای-شویم');
	});
});

$(document).on('click', '#gotoScene10', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene10.jpg)');
	$('#headline').html('تبریک میگم شما کسب و کار آنلاین موفقی دارید');
	$('#buttonNav').html(	'<div class="row cell5">' +
			'<span id="gotoScene8" class="fa fa-reply fa-2x pointer"></span>' +
			'</div>' + 
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell45">&nbsp;</div>' +
			'<div class="row cell5">&nbsp;</div>');
	$('#solutions').fadeOut('fast');
});

$(document).on('click', '#gotoScene11', function(){
	$('#character').css('background-image', 'url(theme/casbino/img/character/scene11.jpg)');
	$('#headline').html('چگونه مدیریت کسب و کار آنلاین موفقی داشته باشیم؟');
	$('#buttonNav').html(	'<div class="row cell5">' +
							'<span id="gotoScene8" class="fa fa-reply fa-2x pointer"></span>' +
							'</div>' + 
							'<div class="row cell45">&nbsp;</div>' +
							'<div class="row cell45">&nbsp;</div>' +
							'<div class="row cell5">&nbsp;</div>');
	//load website request
	$('#solutions').fadeIn('slow', function(){
		$('#solutions').farajax('loader', 'pageLoader/v_load/چگونه-مدیریت-کسب-و-کار-آنلاین-موفقی-داشته-باشیم');
	});
});

/* Gift box */
$(document).on('click', '#giftBox', function(){
	$('#giftBox').farajax('loader', 'download/c_readDownloadDir');
})