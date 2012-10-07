function View(){
	return { 
		attributes: {
			hlookat:0,
			vlookat:0,
			camroll:0,
			fov:90,			
			fovtype:'vfov',
			fovmin:1,
			fovmax:179,
			maxpixelzoom:0,
			limitfov: true,
			fisheye:0,
			fisheyefovlink:1.5,
			stereographic: false,
			pannini: false,
			architectural:0,
			limitview:"auto",
			hlookatmin:-180,
			hlookatmax:180,
			vlookatmin:-90,
			vlookatmax:90,
		},
        Init: function(options)
		{
		    $.extend(this.attributes, options);
		},
	}
}