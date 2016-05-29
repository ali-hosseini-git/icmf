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