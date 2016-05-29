/* Post search auto Complete */
$('#postSearchList').keyup(function() {
	var text = $(this).val();
	if(text.length >= 2){
		$("#postSearchResult").css('background', 'url(load.gif);');
		$('#postSearchResult').slideDown();
		$('#postSearchResult').farajax('loader', '/post/c_showTitleListObject/title=' + $('#postSearchList').val());
	}else{
		$('#postSearchResult').slideUp();
	}
});

/* Right side scroll panel and to side scroll panel */
$(window).scroll(function() {
	if ($(this).scrollTop() > 600) {
		$('#goTop').animate({ "right": "20px" }, { queue:false, duration:500 } );
	}else{
		$('#goTop').animate({ "right": "-60px" }, { queue:false, duration:500 } );
	}
});

$(document).on('click', '#goTop', function() {
	$.scrollTo('header', {duration:3000});
});

/* Order window */
$(document).on('click', '#orderButton', function(){
	switch ($(this).attr('rel')){
		case 'order':
			$('#orderForm').farajax('loader', '/crm/v_addObject/order');
			break;
		case 'wordpress':
			$('#orderForm').farajax('loader', '/crm/v_addObject/wordpress');
			break;
		case 'webdesign':
			$('#orderForm').farajax('loader', '/crm/v_addObject/webdesign');
			break;
		case 'cooperation':
			$('#orderForm').farajax('loader', '/crm/v_addObject/cooperation');
			break;
		case 'analysis':
			$('#orderForm').farajax('loader', '/crm/v_addObject/analysis');
			break;
		case 'seoOrder':
			$('#orderForm').farajax('loader', '/crm/v_addObject/seoOrder');
			break;
		case 'full':
			$('#orderForm').farajax('loader', '/crm/v_addObject/full');
			break;
		default:
			$('#orderForm').farajax('loader', '/crm/v_addObject/unknown');
			break;
	}
//	$(this).fadeOut('slow');
	$('#orderWindow').fadeIn('slow');
	$('#orderWindowClose').fadeIn('slow');
	$('#orderWindow').animate({ height:'350px' }, { queue:false, duration:500 });
	$.scrollTo('#orderForm', {duration:3000});
});

$(document).on('click', '#orderWindowClose', function(){
//	$('#orderButton').fadeIn('slow');
	$('#orderWindow').fadeOut('slow');
	$('#orderWindow').animate({ height:'0px' }, { queue:false, duration:500 });
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
 * CRM                  *
 ************************/
$(document).on('click', '#taskInfoSelector', function(){
	$('#taskInfo').fadeIn();
	$('#clientInfo').fadeOut();
	$('#clientHistory').fadeOut();
});

$(document).on('click', '#clientInfoSelector', function(){
	$('#taskInfo').fadeOut();
	$('#clientInfo').fadeIn();
	$('#clientHistory').fadeOut();
});

$(document).on('click', '#clientHistorySelector', function(){
	$('#taskInfo').fadeOut();
	$('#clientInfo').fadeOut();
	$('#clientHistory').fadeIn();
});

$(document).on('click', '#commentSelector', function(){
	$('#attachBox').fadeOut();
	$('#commentBox').fadeIn();
	$('#historyBox').fadeOut();
});

$(document).on('click', '#attachSelector', function(){
	$('#attachBox').fadeIn();
	$('#commentBox').fadeOut();
	$('#historyBox').fadeOut();
});

$(document).on('click', '#historySelector', function(){
	$('#attachBox').fadeOut();
	$('#commentBox').fadeOut();
	$('#historyBox').fadeIn();
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

// Animation for nav
$('#plan').on({
    mouseenter: function () {
		$('#plan').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#plan').removeClass('animated pulse');
    }
});

$('#portfolio').on({
    mouseenter: function () {
		$('#portfolio').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#portfolio').removeClass('animated pulse');
    }
});

$('#theme').on({
    mouseenter: function () {
		$('#theme').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#theme').removeClass('animated pulse');
    }
});

$('#blog').on({
    mouseenter: function () {
		$('#blog').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#blog').removeClass('animated pulse');
    }
});

$('#about').on({
    mouseenter: function () {
		$('#about').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#about').removeClass('animated pulse');
    }
});

$('#contact').on({
    mouseenter: function () {
		$('#contact').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#contact').removeClass('animated pulse');
    }
});

// Website order
$(document).on('click', '#orderGotoLevel1', function(){
	$('#level2').fadeOut('slow', function(){
		$('#level1').fadeIn('slow');
	});
});

$(document).on('click', '#orderGotoLevel2', function(){
	$('#level1').fadeOut('slow', function(){
		$('#level2').fadeIn('slow');
	});
});

$(document).on('click', '#orderGotoLevel3', function(){
	$('#level2').fadeOut('slow', function(){
		$('#level3').fadeIn('slow');
	});
});

$(document).on('click', '#orderGotoLevel32', function(){
	$('#level3').fadeOut('slow', function(){
		$('#level2').fadeIn('slow');
	});
});

//Animation for nav
$('#bronze').on({
    mouseenter: function () {
		$('#bronze').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#bronze').removeClass('animated pulse');
    }
});

$('#silver').on({
    mouseenter: function () {
		$('#silver').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#silver').removeClass('animated pulse');
    }
});

$('#gold').on({
    mouseenter: function () {
		$('#gold').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#gold').removeClass('animated pulse');
    }
});

$('#diamond').on({
    mouseenter: function () {
		$('#diamond').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#diamond').removeClass('animated pulse');
    }
});

$('#shop').on({
    mouseenter: function () {
		$('#shop').addClass('animated pulse');
    },
    mouseleave: function () {
    	$('#shop').removeClass('animated pulse');
    }
});