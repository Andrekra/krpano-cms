function Network(){
	return{
		attributes: {
			downloadqueues: 4,
			decodequeues: 2,
			retrycount: 2,
			caching: true,
			cachesize: 7,
		},
		Init: function(options)
		{		
		    $.extend(this.attributes, options);
		},
	}
};