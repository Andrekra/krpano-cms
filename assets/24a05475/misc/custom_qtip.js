	/* Places a tooltip on every attribute name within the tableinformation by reading out the description div */
	$('.tableinformation td.attribute > h5').each(function() {		
		$(this).qtip({
		   content: $(this).find('.tooltip_description').html(),
		   style: {
			  width: {min: 100, max: 400},
			  background:'#30273a',
			  border: {
				 width: 7,
				 radius: 5,
				 color: '#CCCCCC'
			  },
			tip: 'leftTop',
			  name: 'dark' // Inherit the rest of the attributes from the preset dark style
		   },
			position: {
			  corner: {
				 target: 'rightMiddle',
				 tooltip: 'leftTop'
			  },
			  adjust: { screen: true } 
		   },
		   show: { effect: { type: 'fade', length: 430 } },
		   hide: { effect: { type: 'fade', length: 430 } }
		});
	});
$(document).ready(function(){  
	$("ul.dashboard img[title]").each(function() {		
		$(this).qtip({		   
		   style: {			
			  height: '40px',
			  background:'#e8e8e8',
			  color: '#636363',
			  border: {
				 width: 1,
				 radius: 5,
				 color: '#CCCCCC'
			  },
			tip: 'leftMiddle',
			  name: 'dark' // Inherit the rest of the attributes from the preset dark style
		   },
			position: {
			  target: $('#tooltip_container'),
			  corner: {
				 target: 'rightMiddle',
				 tooltip: 'leftTop'
			  }
		   },
		   show: { effect: { type: 'fade', length: 430 } },
		   hide: { effect: { type: 'fade', length: 430 }}
		});
	});
});