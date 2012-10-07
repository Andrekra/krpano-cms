function Location()
{	
       
	return {
		id: 0, 
		name: "locationname",
		
		attributes: {
            view: {},
            image: {},
            preview: {},
		},		
		hotspots: [],
		scenes: [],
		
		Init: function(locationid,options){
		  		  
			this.id = locationid;
			this.attributes = options; //options returns a image,view,preview, object
			//this.hotspots = hotspotsJSON;//get_current_location_hotspots_from_php(); //returns an array with all the hotspots of this location
		},
		setFocusedHotspot: function(hotspotid){
			for(var i = 0; i< this.hotspots.length; i++){ 
				krpano.set("hotspot[hotspot_"+this.hotspots[i].id+"].effect", this.hotspots[i].attributes.Effect,false);
			}
			krpano.set("hotspot[hotspot_"+hotspotid+"].effect", "glow(0xFF0000,1,5,5);",false);
		},
		addHotspots: function(){ //loop all hotspots and add them
			for(var i = 0; i< this.hotspots.length; i++){ 
				krpano.addhotspot(this.hotspots[i].id, this.hotspots[i].attributes);
			}
		},	
		addHotspot: function(hotspot){
            this.hotspots.push(hotspot);
			krpano.addhotspot(hotspot);
           
		},
        getDisplay: function(){
          return this.attributes.display;  
        },
		getHotspotById: function(hotspotid){ //get a hotspot based on hotspotid.			
			for(var i = 0; i < this.hotspots.length; i++){
				if(this.hotspots[i].id == hotspotid)
				{					
					return this.hotspots[i];
					break;
				}
			}
		},
		removeHotspot: function(hotspot){ //remove hotspot from array and krpano
			this.hotspots.splice(hotspot.index,1);	//remove the hotspot from the array
		},
        getObject: function()
        {          
           var hotspotObjectArray = []; var hotspotObject; var tmp_hotspot;
           for(var i = 0; i < this.hotspots.length; i++)
           {
              tmp_hotspot = this.getHotspotById(this.hotspots[i].id);
              hotspotObject = tmp_hotspot.getObject();
              hotspotObjectArray[i] = hotspotObject;              
           }
           alert(hotspotObjectArray)
           var locationObject = {
				    locationid: location.id,
                    name: location.name,
                    attributes: {
                        view: this.attributes.view.attributes,
                        image:this.attributes.image.attributes,
                        preview: this.attributes.preview.attributes,
                    },
                    hotspots: hotspotObjectArray                    
            }
            return locationObject;  
        },
	};
};
