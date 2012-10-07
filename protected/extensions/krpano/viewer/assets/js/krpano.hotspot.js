function Hotspot(){
	return{
		id: 0,
		index: 0, //place in the array
		locationid:37, 	 //show on these location(s);
		type:'location', //type of hotspot. defines the onclick/onhover and url of the hotspot
		meta:40,
		
		attributes: {					
			name:'hot_',
			ath:0,
			atv:0,
			url:'hotspot_location.png',			
			alturl:'%swfpath%hotspot_location_alt.png',
			keep:true,
			devices:'all',
			visible:true,
			enabled:true,
			zorder:0,
			capture:true,
			children:true,
			preload:false,
			blendmode:'normal',
			style: '',
			edge:'center',
			ox:0,
			oy:0,
			zoom:true,
			distorted:false,
			rx:0,
			ry:0,
			rz:0,
			inverserotation:true,
			flying:0,
			width:72,
			height:72,
			scale:1,
			altscale:1,
			scale9grid: '',
			scalechildren: false,
			rotate:0,
			smoothing:true,
			accuracy:0,
			alpha:1,
			usecontentsize:false,	
			crop:0,
			mask: '',
			onovercrop:0,
			ondowncrop:0,
			effect: '',
			handcursor:true, 
			onup: '',
			ondown: '',
			onout: '',
			onover: '',
			onclick: '',
			onhover: '',
			onloaded: '',
			altonloaded: '',			
		},
		Init: function(hotspotid,index,options){
			this.id = hotspotid;
			this.index = index === undefined ? (tour.current_location.hotspots.length+1) : index; //if no index is supplied, use hotspots length 
			this.locationid = options.locationid === undefined ?  tour.current_location.id : options.locationid;

			 $.extend(this.attributes, options);
		},
        lookat: function(){

        },
	};
};