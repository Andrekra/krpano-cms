function Autorotate(){
	return{
		attributes: {
			enabled: false,
			waittime: 1,
			accel: 1,
			speed: 10,
			horizon: 0,
			tofov: 0,
		},
		Init: function(options)
		{
			 $.extend(this.attributes, options);
		},
	}
};