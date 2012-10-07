function Display(){	
	return { 
		//attributes: attributes,
		attributes: {
			flash10: 'off',
			fps: 30,
			details: 16,
            sharpen: 12,
			tessmode:0,
			movequality: 'low',
			stillquality: 'low',
			movequality10: 'low',
			stillquality10: 'low',
			stilltime: 0.25,
			showpolys: false,
		},
		Init: function(options)
		{		
			$.extend(this.attributes, options);
		},
	}
};