// hide boxes on full width page
$(document).ready(function(){
 jQuery('a[href*=#]').click(function() {
 if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
 && location.hostname == this.hostname) {
   var jQuerytarget = jQuery(this.hash);
   jQuerytarget = jQuerytarget.length && jQuerytarget
   || jQuery('[name=' + this.hash.slice(1) +']');
   if (jQuerytarget.length) {
  var targetOffset = jQuerytarget.offset().top;
  jQuery('html,body')
  .animate({scrollTop: targetOffset}, 1000);
    return false;
   }
 }
  });
$('.close').click(function() {
  $(this).parent('.box').fadeOut('slow');
});

});

//show and hide left menu
$(document).ready(function(){
$('.show_left_div').click(function() { 
  $(this).toggleClass("right_arrow").toggleClass("left_arrow");
  $(".hidden_left_div").animate({width: ['toggle', 'swing']}, 'medium');

	});

});

//show and hide right menu
$(document).ready(function(){
$('.show_right_div').click(function() {
  $(this).toggleClass("left_arrow").toggleClass("right_arrow");
  $(".hidden_right_div").animate({width: ['toggle', 'swing']}, 'medium');
	});

});

//show and hide top menu
$(document).ready(function () {
    $('#top_menu_button').click(function () {
	$(this).toggleClass("down_arrow").toggleClass("up_arrow");
	$('#top_menu_content').slideToggle('medium');
    });
});

//progress bar
$(document).ready(function () {
		$("#progressbar-min").progressbar({
			value: 12
		});
		$("#progressbar-med").progressbar({
			value: 44
		});
		$("#progressbar-max").progressbar({
			value: 88
		});
	});

//date picker
$(document).ready(function () {
		$("#checkin").datepicker({
			showOn: 'button',
			buttonImage: 'images/datepick.png',
			buttonImageOnly: true
		});
		$("#checkout").datepicker({
			showOn: 'button',
			buttonImage: 'images/datepick.png',
			buttonImageOnly: true
		});
		$("#appointments").datepicker();
	});

//slider range
$(document).ready(function () {
		$("#slider-range-min").slider({
			range: "min",
			value: 37,
			min: 1,
			max: 700,
			slide: function(event, ui) {
				$("#amount").val('$' + ui.value);
			}
		});
		$("#amount").val('$' + $("#slider-range-min").slider("value"));
	});

//vertical slider range
$(document).ready(function () {
		$("#slider-vertical").slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 85,
			slide: function(event, ui) {
				$("#amount1").val(ui.value);
			}
		});
		$("#amount1").val($("#slider-vertical").slider("value"));
	});

$(document).ready(function(){
		$(".column").sortable({
			connectWith: '.column'
		});

		$(".panel").addClass("ui-widget ui-widget-content ui-helper-clearfix")
			.find(".title")
				.prepend('<span class="ui-icon ui-icon-minusthick"></span>')
				.end()
			.find(".content");

		$(".title .ui-icon").click(function() {
			$(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
			$(this).parents(".panel:first").find(".title").toggleClass("corners");
			$(this).parents(".panel:first").find(".content").toggle();
		});

		$(".column").disableSelection();
	});

    $(function(){
    
        $('li').hover(function(){
            $(this).children('.imgtoolbox_bg').fadeTo("slow", 0.50);
			$(this).children('.imgtoolbox').fadeIn( 300 );}
                        
            , function(){
            $(this).children('.imgtoolbox_bg').fadeOut( 300 );
			$(this).children('.imgtoolbox').fadeOut( 300 );
		});
    
    });
		//checkall boxes
		$(document).ready(function()
		{
			$("#checkboxall").click(function()				
			{
				var checked_status = this.checked;
				$("input[@name=checkall]").each(function()
				{
					this.checked = checked_status;
				});
			});					
		});
		
$(document).ready(function(){
	$('#checkall').click(function () {
		$(this).parents('table:eq(0)').find(':checkbox').attr('checked', this.checked);
	});
});

//wysiwyg textarea
$(document).ready(function(){
  $('#wysiwyg').wysiwyg({
    controls: {
      strikeThrough : { visible : true },
      underline     : { visible : true },
      
      separator00 : { visible : true },
      
      justifyLeft   : { visible : true },
      justifyCenter : { visible : true },
      justifyRight  : { visible : true },
      justifyFull   : { visible : true },
      
      separator01 : { visible : true },
      
      indent  : { visible : true },
      outdent : { visible : true },
      
      separator02 : { visible : true },
      
      subscript   : { visible : true },
      superscript : { visible : true },
      
      separator03 : { visible : true },
      
      undo : { visible : true },
      redo : { visible : true },
      
      separator04 : { visible : true },
      
      insertOrderedList    : { visible : true },
      insertUnorderedList  : { visible : true },
      insertHorizontalRule : { visible : true },
      
      h4mozilla : { visible : true && $.browser.mozilla, className : 'h4', command : 'heading', arguments : ['h4'], tags : ['h4'], tooltip : "Header 4" },
      h5mozilla : { visible : true && $.browser.mozilla, className : 'h5', command : 'heading', arguments : ['h5'], tags : ['h5'], tooltip : "Header 5" },
      h6mozilla : { visible : true && $.browser.mozilla, className : 'h6', command : 'heading', arguments : ['h6'], tags : ['h6'], tooltip : "Header 6" },
      
      h4 : { visible : true && !( $.browser.mozilla ), className : 'h4', command : 'formatBlock', arguments : ['<H4>'], tags : ['h4'], tooltip : "Header 4" },
      h5 : { visible : true && !( $.browser.mozilla ), className : 'h5', command : 'formatBlock', arguments : ['<H5>'], tags : ['h5'], tooltip : "Header 5" },
      h6 : { visible : true && !( $.browser.mozilla ), className : 'h6', command : 'formatBlock', arguments : ['<H6>'], tags : ['h6'], tooltip : "Header 6" },
      
      separator07 : { visible : true },
      
      cut   : { visible : true },
      copy  : { visible : true },
      paste : { visible : true }
    }
  });

});