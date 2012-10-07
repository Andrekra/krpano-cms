
function Plugin(){
	   return {	       
    	  attributes : {
        		name: 'pluginname',
        		url: '%swfpath%',
        		alturl: null,
        		keep: false,
        		devices: 'all',
        		visible: true,
        		enabled: true,
        		handcursor: true,
        		zorder: null,
        		style: null,
        		align: null,
        		edge: null,
        		x: null,
        		y: null,
        		rotate: 0,
        		width: null,
        		height: null,
        		scale: 1,
        		altscale: 1,
        		alpha: 1,
        		ox: null,
        		oy: null,
        		crop: null,
        		parent: null,
        		scalechildren: false,
        		jsborder: null
      	},
        Init: function(options)
		{
		    $.extend(this.attributes, options);
		},
    };
};