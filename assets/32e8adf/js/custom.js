$(document).ready(function(){
	//resizeFrame();
	$(window).resize(function(){
		//resizeFrame();
	});	
});
function resizeFrame()
{
	var h = $(window).height();
	var w = $(window).width();
	var newContentHeight = parseInt(h) - $("#visual-editor-header").height() - $("#content_Header").height() - $("#content_Footer").height() - 20;
	
	$("#krpano").css('height', newContentHeight);	
	$("#wrapper").css('height', h);
	
	var navigationheight = $(window).height() - $("#visual-editor-header").height();
	$("#visual-editor-sidebar").css("height", navigationheight + "px");
	$("#visual-editor-sidebar-toggle a").css("height", navigationheight + "px");
}
$(document).ready(function(){



});