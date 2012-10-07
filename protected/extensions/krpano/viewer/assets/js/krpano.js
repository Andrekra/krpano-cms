var Krpano = function(){
	var krpano = null;
	
	var getKrpanoObject = function(){
		return $('#krpanoSWFObject').get(0);//jquery version of document.getElementbyId;
	}
	
	return{
		/*public krpano methods*/
		Init: function(){
			krpano = getKrpanoObject(); 
			if(krpano != null){
				this.trace('Javascript->Krpano connection: succes!!');
				this.set("events.onclick", "js(krpano.doubleclick(editor.createHotspot()))",false); //Doubleclick event
				//this.set("plugin[].onclick", "js(krpano.doubleclick(editor.createHotspot()))"); //Doubleclick event
			}
			else{
				throw('krpano connection failed');
			}
		},
		/* Global krpano Methods */
		get: function(attribute){
			return krpano.get(attribute);
		},
		set: function(attribute, value, trace){
			krpano.set(attribute, value);
            if(attribute === "display.details" || attribute === "display.tessmode" || attribute === "display.flash10" || attribute === "view.hfov" || attribute === "view.vfov" || attribute === "view.voffset" || attribute === "display.showpolys")
            {
                this.trace("'updateobject()'");
                this.call("updateobject(true,true)");
            };
			if(trace || trace === undefined){this.trace("krpano.set("+attribute+","+value+")");};
		},
		call: function(actionstring){
			krpano.call(actionstring);
		},
		trace: function(totrace){
			this.call("trace(VisualEditor: "+totrace+")");
		},
		/* Doubleclick on Panorama Event */
		doubleclick: function(arg){
			setTimeout("numclick = 0",400);
			numclick = numclick + 1;
			if (numclick == 2){	
				eval(arg); //argument -> editor.createHotspot();
			}
		},
		/* Hotspot -shortcut- Methods */
		removehotspot: function(id){
			this.call("removehotspot(hotspot_"+id+")");
		},
		addhotspot: function(hotspot){
			this.trace("adding Hotspot: "+hotspot.id);
			this.call("addhotspot(hotspot_"+hotspot.id+")");
			this.updatehotspot(hotspot); //update the newly created hotspot with the attributes.
			this.set("hotspot[hotspot_10].onclick","js(editor.focusHotspot("+hotspot.id+"));"); //overwrite the onclick action for use in visual editor.

		},
		updatehotspot: function(hotspot){
			for(attri in hotspot.attributes) //loop all the attributes of the hotspot and apply it to
			{
                console.log(attri, hotspot.attributes[attri]);
                if(attri.toLowerCase() === "url"){
                     this.set("hotspot[hotspot_"+hotspot.id+"].url",editor.getThemeURL()+'hotspots/'+hotspot.attributes[attri])
                     console.log()
                }
				else {
                    this.set("hotspot[hotspot_"+hotspot.id+"]."+attri,hotspot.attributes[attri],false);
                }
			};
		},
		updatehotspotproperty: function(hotspotid, attribute, value,trace){
			this.set("hotspot[hotspot_"+hotspotid+"]."+attribute,value,trace);
		},
		updateattribute: function(attribute, value){
			this.set(attribute,value);
			if(attribute == "display.details" || attribute == "display.tessmode" || attribute == "image.hfov" || attribute == "image.vfov" || attribute == "image.voffset"){
				this.call("trace('updateobject()')");
				this.call("updateobject(true,true)");
			}
		},
		movetohotspot: function(ath,atv,fov){
			fov = fov === undefined ? 90 : fov; //if there is no fov, set it to 90;
			this.call("lookto("+ath+","+atv+","+fov+")"); //custom function to go to the hotspot without zooming in.
		},
		/* Plugin -shortcut- Methods */
		removeplugin: function(id){
			this.call("removehotspot(hotspot_"+id+")");
		},
		addplugin: function(id,attributes){
			this.trace("adding Plugin: "+id);
			this.call("addplugin(hotspot_"+id+")");
			this.updateplugin(id,attributes); //update the newly created hotspot with the attributes.
		},
		updateplugin: function(id,attributes){
			for(attri in attributes) //loop all the attributes of the hotspot and apply it to 
			{
				this.set("plugin[plugin_"+id+"]."+attri,attributes[attri]);
			};
		},

	};
};