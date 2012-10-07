function Memory(){
	return { 
		//attributes: attributes,
		attributes: {
			maxmem: 350,
		},		
		Init: function(options)
		{		
				$.extend(this.attributes, options);
		},
	}
};

