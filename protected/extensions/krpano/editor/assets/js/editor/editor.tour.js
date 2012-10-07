/* The tour Class */
var Tour = function(){	
	/* @private variables */
	var plugins = []; //Array with all the global plugins
	var locations = []; //Array with all the locations

	return {
	/* @public variables */
		id: 0,
		name: "Tour Name",
		description: "",
		theme: null,
		
        attributes: {
			display: {},
			network: {},
			memory: {},
            control: {},
			autorotate: {}
		},
		
		selected_hotspot: null,
		current_location: null,
	/* constructor */
		Init : function(projectid){
			//Initiate krpano connection            
        	this.id = projectJSON.ProjectId;
			this.name = projectJSON.Name;

            var display = new Display();
                display.Init(displayJSON);
            var network = new Network();
                network.Init(networkJSON);
            var autorotate = new Autorotate();
                autorotate.Init(autorotateJSON);
            var memory = new Memory();
                memory.Init(memoryJSON);
            var control = new Control();
                control.Init(controlJSON);
            this.theme = new Theme();
            this.theme.Init(themeJSON);
            
            this.attributes = {display: display, network: network, autorotate: autorotate, memory: memory, control: control};

            //this location
            var view = new View();
               view.Init(viewJSON);
            var preview = new Preview()
                preview.Init(previewJSON);
            var image = new Image()
                image.Init(imageJSON);

            var currentLocation = new Location()
                currentLocation.Init(
                    current_locationJSON.LocationId,
                    {
                        view: view,
                        image: image,
                        preview: preview
                    }
                );
            console.log(currentLocation);
            this.current_location = currentLocation;
            //this.current_location.addHotspots(); //add hotspots to krpano.
		},
	/* @public methods */
		//adds Location Object to Array
		addLocation: function(location){
			locations.push(location);
		},
		//gets a location based on locationid. Returns Location Object
		//todo: DictonaryClass key-value, instead of annoying for loop.
		getLocation: function(id){			
			for(var i=0;i < locations.length; i++)
			{				
				if(id == locations[i].id){	return locations[i];}
			}
			return null;
		},
        find: function(){
            
        },
		getCurrentLocation: function()
		{			
			return this.current_location;
		},
		//adds Plugin Object to Array
		addPlugin: function(plugin){
			plugins.push(plugin);
		},
        getObject: function()
        {
			 var projectObject = {    
                    projectid: this.id,
                    name: this.name,
                    description: this.description,
                    attributes: {
                        display: this.attributes.display.attributes,
                        control: this.attributes.control.attributes,
            			network: this.attributes.network.attributes,
            			memory: this.attributes.memory.attributes,
            			autorotate: this.attributes.autorotate.attributes,
                    },
                    plugins: this.plugins,
                    theme: this.theme.attributes,
                    location: this.current_location.getObject(),                    
            };
            return projectObject;           
        },
	};
};
