function Control(){
	return {
		attributes:{
			usercontrol: "all",
			mousetype: "moveto",
			mouseaccelerate: 1,
			mousespeed: 10,
			mousefriction: 0.8,
			mousefovchange: 1,
			keybaccelerate: 0.5,
			keybspeed: 10,
			keybfriction: 0.9,
			keybfovchange: 0.75,
			keybinvert: 0,
			fovspeed: 3,
			fovfriction: 0.9,
			movetocursor: "none",
			cursorsize: 10,
			headswing: 0,
			keycodesleft: "37",
			keycodesright: "39",
			keycodesup: "38",
			keycodesdown: "40",
			keycodesin: "16,65,107",
			keycodesout: "17,89,90,109",
			zoomtocursor: false,
			zoomoutcursor: true,
			touchfriction: 0.87,
			trackpadzoom: false,
		},
		
		Init: function(options)
		{		
			$.extend(this.attributes, options);
		},
	}
};