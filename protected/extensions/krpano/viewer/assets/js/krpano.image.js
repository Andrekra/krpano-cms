
function Image(){
	
	return{
		urlprefix:"photo_",
		urlsuffix:"_%0v_%0h",
		attributes: {
			type:"sphere",
			tiled: true,
			baseindex:1,
			tilesize:512,
			tiledimagewidth:6000,
			tiledimageheight:3000,
			prealign: "",
			hfov:360,
			vfov:0,
			voffset:0,
			multires: true,
			multiresthreshold:0.025,
			progressive: true,
			frames:0,
			frame:1,
			/* qtvr */
			setview: false,
			/* level */
			levels:1,
			levelsteps:2,
			leveldetails:16,
			levelaspreview:"false",
			leveldownload:"auto",
			leveldecode:"auto",
		},

		Init: function(options){
			$.extend(this.attributes, options);
			
			this.urlsuffix = options.urlsuffix === undefined ? '_%0v_%0h': options.urlsuffix;
			this.urlprefix = options.urlprefix === undefined ? 'photo_': options.urlprefix;

		},
	};
}