$(document).ready(function(){  
	//togglebutton to show and hide the left hand sidebar
    /*$("a#showHideNav").toggle(function(){
        $(".editor").hide('fast');
        //$('.viewer').animate({width:'910px'}, 500)
        $('.viewer').css('width', '910px');
    }, function(){
        $(".editor").show('fast');
        //$('.viewer').animate({width:'590px'}, 500)
         $('.viewer').css('width', '590px');
    });    */

	//Accordion menu
	$(function() {
		var icons = {
			header: "ui-icon-circle-arrow-e",
			headerSelected: "ui-icon-circle-arrow-s"
		};
		$(".accordion").accordion({
			collapsible: true,
			header: 'h3',
			navigation: true,
			autoHeight: false,
			icons: icons			
		});		
	});
	//tabs in sidebar
	$(function() {
		$(".tabs").tabs();
	});
});

/* globals */
var tour,krpano,editor;

function initKrpano(){
	//function fired from krpano after it's done loading. This way krpano.get/set/call will work.
	krpano = Krpano();
	krpano.Init();
    krpano.call("showlog()");
	/* Fill Tour Class */
	tour = Tour();
	tour.Init(projectid,{mode: "php"});

	/* wait for DOM ready to init all the sliders and such */
	$(document).ready(function(){  
		editor = new VisualEditor();
        editor.Init();
	});
}

//Save everything to the database using AJAX
function saveToDB(){
	var projectdata = new Object();
	projectdata.display_Details .amount = 16;
	var project_display = new Tour();
	
	var hotspotdata = {
		hotspotarray: [1,2,3,4]
	}
	var postData = {
		ajax: '1',
		project: project_display,
		hotspots: hotspotdata
	};	
	$.ajax({
		url: url_savetodb,
		type: 'POST',
		data: postData,
		dataType: 'json',
		success: function(data) {				
			if(data == 1)
			{
				$("#save_succes_message_box").css("display","inline");
				$("#save_error_message_box").css("display","none");
				$(".save_message").html("location succesfully saved");	
			}
			else
			{
				$("#save_succes_message_box").css("display","none");
				$("#save_error_message_box").css("display","inline");
				$(".save_message").html("problem occured while saving to database");
			}
		}
	}); 
}

var VisualEditor = function(){
	/* [Singleton] Class for handling all the visual stuff, like setting sliders */
	/* private vars */
	var defaultajaxoptions = {
			url: url_createhotspot,
			type: 'POST',				
			data: {},
			dataType: 'json',
			async: false,
			beforeSend: function(x) {
				if(x && x.overrideMimeType) {
					x.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(data){
				editor.displayMessage('Hotspot added to database', 'Succes');
				
			},
			error: function(){
				editor.displayMessage('Failed adding hotspot','Error');
			}
	};
	return{
		/* @public variables */
		
		/* @public methods */
		Init: function(){
            var display = displayJSON;//tour.attributes.display.attributes;
            var control = controlJSON;//tour.attributes.control.attributes;
            var network = networkJSON;//tour.attributes.network.attributes;
            var autorotate = autorotateJSON;//tour.attributes.autorotate.attributes;
            var memory = memoryJSON;//tour.attributes.memory.attributes;

            this.setupForm();

           
            /* Dropdown selectbox for hotspot type */
			/*$('#hotspot_type .amount').change(function() {
				editor.updateHotspotType($(this).val())        
			});	
            $('#hotspot_type_url,#hotspot_type_javascript,#hotspot_type_location,#hotspot_type_trigger,#hotspot_type_hint').change(function() {
                tour.selected_hotspot.Meta = $(this).val();
            });*/
            //metaData = $("#hotspot_Type_javascript").val();
            /* Certain conditions, show more input fields */
            /*$(function(){
        		var multires_mode = $('#image_multires .amount').attr('checked')? 'table-row' : 'none';
        		$('#image_multiresthreshold .amount').closest('tr').css('display',multires_mode);
        		$('#image_progressive .amount').closest('tr').css('display',multires_mode);
        		
        		var tiled_mode = $('#image_tiled .amount').attr('checked')? 'table-row' : 'none';
        		$('#image_tiledimageheight .amount').closest('tr').css('display',tiled_mode);
        		$('#image_tiledimagewidth .amount').closest('tr').css('display',tiled_mode);
        		$('#image_tilesize .amount').closest('tr').css('display',tiled_mode);
        		$('#image_baseindex .amount').closest('tr').css('display',tiled_mode);
        		
        		var level_mode = $('#image_level .amount') > 1 ? 'table-row' : 'none';
        		$('#image_levelsteps .amount').closest('tr').css('display',level_mode);
        		$('#image_levelaspreview .amount').closest('tr').css('display',level_mode);
        
        		var preview_mode = $('#preview_type .amount ').val() == "CUBESTRIP" ? 'table-row' : 'none';
        		$('#preview_striporder .amount').closest('tr').css('display',preview_mode);
                
        	});*/
    /*
            $('#display_movequality .amount').change(function(){
               var display = tour.attributes.display;
                display.attributes.Movequality = $(this).val();
                krpano.set("display.movequality",$(this).val())
            });		
            $('#display_stillquality .amount').change(function(){
               var display = tour.attributes.display;
                display.attributes.Stillquality = $(this).val();
                krpano.set("display.stillquality",$(this).val())
            }); */
			/* Toggle Advanced mode if checked */
			/*$('#hotspot_showadvanced .amount').click(function() {
				editor.toggleAdvanced();			
			});*/
			//this.toggleAdvanced();
			
			/* Bind inputs and sliders with functions */
			//this.setupHotspotForm();

			//this.setupLocationForm();
		},
        setupForm: function(){
            /*
            * SPINNER
             */
            $("input.spinner").spinner();
            $("input.spinner").change(function(){
                var parent = $(this).parents('tr').attr('id');
                var properties = parent.split('_');
                var value = $(this).val();

                editor.updateProperty(properties[0], properties[1], value);
            });
            /*
            * SLIDER
             */
            $(".slider" ).bind( "slidecreate", function(event, ui) {
                var obj = $(this);

                obj.slider("option","max",obj.data('max'));
                obj.slider("option","min",obj.data('min'));
                obj.slider("option","step",obj.data('step'));
                obj.slider("option","value", obj.data('value'));
            });
            $(".slider").slider();
            $('.slider').bind("slide", function(event, ui){
                var value = ui.value;
                var parent = $(this).parents('tr').attr("id");
                var properties = parent.split('_');

                editor.updateProperty(properties[0], properties[1], value);
                $('#'+parent+' .amount').val(value);
            });
            /*
            * CHECKBOX
             */
            $('.amount[type=checkbox]').click(function(){
                var parent = $(this).parents('tr').attr("id");

                if(parent === 'display_flash10') { console.log($(this).is(':checked')); var value = $(this).is(':checked') ? 'on' : 'off'; }
                else { var value = $(this).is(':checked');}

                var properties = parent.split('_');
                console.log(properties, value);
                editor.updateProperty(properties[0], properties[1], value);
                //$('#'+parent+' .amount').val(value);
            });
            /*
            * TEXTFIELD
             */
            $('.amount[type=text]').change(function(){
                parent = $(this).parents('tr').attr("id");
                value = $(this).val();
                properties = parent.split('_');

                //$('#'+parent+' .amount').val(value);
                if($('#'+parent+' .slider').length){
                    var max = $('#'+parent+' .slider').slider( "option" , "max");
                    var min = $('#'+parent+' .slider').slider( "option" , "min");

                    if(value >= max) value = max;
                    if(value <= min) value = min;
                    $(this).val(value);
                    $('#'+parent+' .slider').slider( "value" , value);
                }

                editor.updateProperty(properties[0], properties[1], value);

            });
            /*
            * OPTIONS
             */
            $('span.option').click(function(){
                $(this).parent().children('span').removeClass('current');
                $(this).addClass('current');
                parent = $(this).parents('tr').attr('id');
                properties = parent.split('_');
                value = $(this).text();

                editor.updateProperty(properties[0], properties[1], value);
           });
            /*
            * COLORBOX
             */
            $('.amount[type=color]').ColorPicker({
                onSubmit: function(hsb, hex, rgb, el) {
                    $(el).val(hex);
                    $(el).css('background-color', '#'+hex);

                    parent = $(this).parents('tr').attr("id");
                    properties = parent.split('_');
                    editor.updateProperty(properties[0], properties[1], hex);

                    $(el).ColorPickerHide();
                },
                onBeforeShow: function () {
                    $(this).ColorPickerSetColor(this.value);
                }
            })
            .bind('keyup', function(){
                $(this).ColorPickerSetColor(this.value);
            });

        },
		setupProjectForm_k: function(){
			/*var inputid, value, step, max;
			$.each(tour.attributes, function(node_name, node_object) {
				$.each(node_object.attributes, function(attribute_name, attribute_value) {
					//krpano.trace(node_name+"."+attribute_name+"="+attribute_value);
					
					inputid = '#'+ node_name+'_'+attribute_name.toLowerCase();
					 //attribute is a checkbox
					 if($(inputid+' .amount:checkbox').length){ 
						$(inputid).click(function(){
							//get values
							value = $(this).attr('checked');
							
							//update krpano
							krpano.set(node_name+'.'+attribute_name, value);
							tour.attributes[node_name].attributes[attribute_name] = value;
						});	
					}
					//attribute is a slider
					if($(inputid+' .slider').length) 
					{
						$(inputid+' .slider').bind("slide", function(event, ui) {
							value = ui.value;
							
							//if it's a truthy falsy slider. iow 0 - 1 switch
							step = $(this).slider( "option", "step" );
							max = $(this).slider( "option", "max" );						
							if(step===1 && max===1){value = ui.value === 1 ? "true" : "false";}
							//attribute: flash10 uses on/off instead of true/false;
	                        if(attribute_name=== "Flash10"){value = ui.value === 1 ? "on" : "off";}
							
							//set krpano value
							krpano.set(node_name+'.'+attribute_name, value);
							//for some special attributes, it is required to update the internal panorama object.
							if(		attribute_name === "details"
								||	attribute_name === "tessmode"
                                ||  attribute_name === "flash10"
								||	attribute_name === "hfov"
								||	attribute_name === "vfov"
								||	attribute_name === "voffset"
								||	attribute_name === "showpolys"
							){
								krpano.trace("'updateobject()'");
								krpano.call("updateobject(true,true)");
							};
							//update input box
							$('#' + $(this).attr('id').replace(' .slider',' .amount')).val(value);
							
							//update the class object
							tour.attributes[node_name].attributes[attribute_name] = ui.value;								
						});		
					}
					//attributes is a input box
					if($(inputid+' .amount:text').length){							
						$(inputid+' .amount').change(function() {	
							value = $(this).val();
							
							//set krpano value
							krpano.set(node_name+'.'+attribute_name, value);
							//set slider
							if($('#' + $(this).attr('id').replace(' .amount',' .slider')).length)
							{
								$('#' + $(this).attr('id').replace(' .amount',' .slider')).slider("value",value);
							}
							krpano.set(node_name+'.'+attribute_name, value);
                            tour.attributes[node_name].attributes[attribute_name] = value;
						});
					}
					if($('select'+inputid+' .amount').length){
                       $(inputid+' .amount').change(function() {	
                            value = $(this).val();
                            krpano.set(node_name+'.'+attribute_name, value);
                            tour.attributes[node_name].attributes[attribute_name] = value;
                        });
					}
				
				});
			}); */
		},
        updateProperty: function(attribute, property, value){
             //console.log(attribute, property, value);
             krpano.set(attribute + '.' + property, value);

            if(tour.attributes[attribute] !== undefined){
                tour.attributes[attribute].attributes[property] = value;
             } else if (tour.current_location.attributes[attribute] !== undefined){
                 tour.current_location.attributes[attribute].attributes[property] = value;
             } else {
                krpano.trace(attribute + '.' + property + '=' + value + " is not yet supported");
            }
        },
        setupLocationForm: function()
        {
            /*var inputid, value, step, max;
			$.each(tour.current_location.attributes, function(node_name, node_object) {
				$.each(node_object.attributes, function(attribute_name, attribute_value) {
				    
                    inputid = '#'+ node_name+'_'+attribute_name.toLowerCase();
                    console.log(inputid);
                    if($(inputid+' .amount:checkbox').length){ 
                        $(inputid).click(function(){
                        	value = $(this).attr('checked');
                        	krpano.set(node_name+'.'+attribute_name, value);
                            tour.current_location.attributes[node_name].attributes[attribute_name] = value;
                        });	
                    }
                    //attribute is a slider
					if($(inputid+' .slider').length) 
					{
						$(inputid+' .slider').bind("slide", function(event, ui) {
							value = ui.value;
							console.log(ui.value);
							//if it's a truthy falsy slider. iow 0 - 1 switch
							step = $(this).slider( "option", "step" );
							max = $(this).slider( "option", "max" );						
							if(step===1 && max===1){value = ui.value === 1 ? "true" : "false";}
       
							krpano.set(node_name+'.'+attribute_name, value);
							//update input box
							$('#' + $(this).attr('id').replace(' .slider',' .amount')).val(value);
							
      	                     if(attribute_name === "Maxpixelzoom"){
								$('#view_Fovmin .slider').slider("value",krpano.get("view.fovmin"));
                                $('#view_Fovmin .amount').val(krpano.get("view.fovmin"));
                                
                                $('#view_Fov .slider').slider("value",krpano.get("view.fovmin"));
                                $('#view_Fov .amount').val(krpano.get("view.fovmin"));
                                krpano.set("view.fov",krpano.get("view.fovmin"));
							};
							//update the class object
							tour.current_location.attributes[node_name].attributes[attribute_name] = ui.value;								
						});		
					}
					//attributes is a input box
					if($(inputid+' .amount:text').length){							
						$(inputid+' .amount').change(function() {	
							value = $(this).val();
							
							//set krpano value
							krpano.set(node_name+'.'+attribute_name, value);
							//set slider
							if($('#' + $(this).attr('id').replace(' .amount',' .slider')).length)
							{
								$('#' + $(this).attr('id').replace(' .amount',' .slider')).slider("value",value);
							}

							krpano.set(node_name+'.'+attribute_name, value);
                            tour.current_location.attributes[node_name].attributes[attribute_name] = value;
						});
					}
					if($('select'+inputid+' .amount').length){
                       $(inputid+' .amount').change(function() {	
                            value = $(this).val();
                            krpano.set(node_name+'.'+attribute_name, value);
                            tour.current_location.attributes[node_name].attributes[attribute_name] = value;
                        });
					}
                });
            });*/
        },
		setupHotspotForm: function()
		{			
			var dummyspot = new Hotspot();
			var inputid;
			var value;
			
			$.each(dummyspot.attributes, function(attri, value) {				
				 inputid = '#hotspot_' + attri + ' .amount';
				 //attribute is a checkbox
				 if($(inputid+':checkbox').length){ 
					$(inputid).click(function(){
						//get values
						var hotspotid = tour.selected_hotspot.id;
						value = $(this).attr('checked');
						
						//update krpano
						krpano.updatehotspotproperty(hotspotid, attri, value);
						
						//update hotspot Object
						var hotspot = tour.current_location.getHotspotById(hotspotid);
						hotspot.attributes[attri] = value;
					});	
				}
				//attribute is a slider
				if($('#hotspot_'+attri+' .slider').length) 
				{
					$('#hotspot_'+attri+' .slider').bind("slide", function(event, ui) {
						var sliderid = $(this).attr('id');
						var amountid = "#" + sliderid.replace(/ .slider/, "") + " .amount"; 
						var hotspotid = tour.selected_hotspot.id;
						$(amountid).val(ui.value);
						krpano.updatehotspotproperty(hotspotid, attri, ui.value,false);
						//update hotspot Object
						var hotspot = tour.current_location.getHotspotById(hotspotid);
						hotspot.attributes[attri] = ui.value;								
						
						if(attri === "Atv" || attri === "Ath"){
							krpano.set("hotspot[tiny_bar]."+attri, ui.value,false);
						};
					});		
				}
				//attributes is a input box
				if($(inputid+':text').length){							
					$(inputid).change(function() {	
						var hotspotid = tour.selected_hotspot.id;
						value = $(this).val();
						krpano.updatehotspotproperty(hotspotid, attri, value);	
						
						//update hotspot Object
						var hotspot = tour.current_location.getHotspotById(hotspotid);
						hotspot.attributes[attri] = value;
						
						if(attri === "Atv" || attri === "Ath"){
							krpano.set("hotspot[tiny_bar]."+attri, ui.value,false);
						};
					});
				}
                if($('select'+inputid+' .amount').length){
                       $(inputid+' .amount').change(function() {	
                            value = $(this).val();
                            krpano.set(node_name+'.'+attribute_name, value);
                        });
					}
			}); //end each			
		},
		saveHotspot: function(hotspotid){
			var hotspotid = !hotspotid ? tour.selected_hotspot.id : hotspotid;
			var hotspot = tour.current_location.getHotspotById(hotspotid);
			var postData = {
				Hotspotid: hotspotid,
				Type: hotspot.Type,
				Meta: hotspot.Meta,
				Locationid: hotspot.LocationId,				
				Attributes: hotspot.attributes
			}
			$.ajax({
				url: url_updatehotspot,
				type: 'POST',
				data: postData,
				dataType: 'html',
				success: function(data) {				
					editor.displayMessage('Hotspot'+hotspotid+' added to database', 'Succes');
				}
			}); 	
		},
		saveAllHotspots: function(){
			var location = tour.getCurrentLocation();			
			for(var i = 0; i < location.hotspots.length; i++)
			{
				krpano.trace(location.hotspots[i].id);
				this.saveHotspot(location.hotspots[i].id);
			};			
		},
		saveLocation: function(){
			//todo, save to db
			var location = tour.getCurrentLocation();	
 
            var hotspots = [];
            var hotspot = {}; var tmp_hotspot;
            for(var i = 0; i < location.hotspots.length; i++)
			{
                tmp_hotspot = location.getHotspotById(location.hotspots[i].id);
                hotspot = {
                    id: tmp_hotspot.id,
		            LocationId: tmp_hotspot.LocationId, 	
	           	    Type: tmp_hotspot.Type, 
	               	Meta: tmp_hotspot.Meta, 
                    attributes: tmp_hotspot.attributes,
                }
                hotspots[i] = hotspot;                
			};
           	var postData = {
				location : {
				    locationid: location.id,
                    name: location.name,
                    attributes: {
                        view: location.attributes.view.attributes,
                        image:location.attributes.image.attributes,
                        preview: location.attributes.preview.attributes,
                    },
                    hotspots: hotspots
                    
                }
                
			}
			$.ajax({
				url: url_savetodb,
				type: 'POST',
				data: postData,
				dataType: 'html',
				success: function(data) {				
					editor.displayMessage(data);
				}
			}); 	
		},
		setMoveSliders: function(ath,atv){			
			var location = tour.getCurrentLocation();
			var hotspotid = tour.selected_hotspot.id;			
			var hotspot = location.getHotspotById(hotspotid);	
			
			//update hotspot object
			hotspot.attributes.Ath = Math.round(Number(ath) * 100) / 100;
			hotspot.attributes.Atv = Math.round(Number(atv) * 100) / 100;
			
			//update sliders
			$("#hotspot_Atv .amount").val(hotspot.attributes.Atv);
			$("#hotspot_Atv .slider" ).slider("value", hotspot.attributes.Atv);
			$("#hotspot_Ath .amount").val(hotspot.attributes.Ath);
			$("#hotspot_Ath .slider" ).slider("value", hotspot.attributes.Ath);
		},
		toggleAdvanced: function(){
		/* Show/Hide Advanced options. Todo: Smarter selecting, maybe using data node */
			var advanced_mode = $('#hotspot_Showadvanced .amount').attr('checked')? 'table-row' : 'none';
			
            /* hotspot attributes */
            $('#hotspot_Capture .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Children .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Preload .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Blendmode .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Style .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Ox .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Oy .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Inverserotation .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Flying .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Smoothing .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Accuracy .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Usecontentsize .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Scale9grid .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Crop .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Onovercrop .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Ondowncrop .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Scalechildren .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Mask .amount').closest('tr').css('display',advanced_mode);
			$('#hotspot_Effect .amount').closest('tr').css('display',advanced_mode);
            
            /* Location attributes */
            $('#display_Tessmode .amount').closest('tr').css('display',advanced_mode);
    		$('#display_Shoiwpolys .amount').closest('tr').css('display',advanced_mode);
    		$('#display_Stilltime .amount').closest('tr').css('display',advanced_mode);
    		$('#network_Retrycount .amount').closest('tr').css('display',advanced_mode);
    		$('#network_Caching .amount').closest('tr').css('display',advanced_mode);
    		$('#network_Cachesize .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Usercontrol .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keybaccelerate .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keybspeed .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keybfriction .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keybfovchange .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keybinvert .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Movetocursor .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Cursorsize .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Headswing .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keycodesleft .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keycodesright .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keycodesup .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keycodesdown .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keycodesin .amount').closest('tr').css('display',advanced_mode);
    		$('#control_Keycodesout .amount').closest('tr').css('display',advanced_mode);
    		$('#autorotate_Accel .amount').closest('tr').css('display',advanced_mode);
    		$('#autorotate_Horizon .amount').closest('tr').css('display',advanced_mode);
    		$('#autorotate_Tofov .amount').closest('tr').css('display',advanced_mode);
            
            /* tour advanced attributes */
            $('#display_Tessmode .amount').closest('tr').css('display',advanced_mode);
			$('#display_Shoiwpolys .amount').closest('tr').css('display',advanced_mode);
			$('#display_Stilltime .amount').closest('tr').css('display',advanced_mode);
			$('#network_Retrycount .amount').closest('tr').css('display',advanced_mode);
			$('#network_Caching .amount').closest('tr').css('display',advanced_mode);
			$('#network_Cachesize .amount').closest('tr').css('display',advanced_mode);
			$('#control_Usercontrol .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keybaccelerate .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keybspeed .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keybfriction .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keybfovchange .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keybinvert .amount').closest('tr').css('display',advanced_mode);
			$('#control_Movetocursor .amount').closest('tr').css('display',advanced_mode);
			$('#control_Cursorsize .amount').closest('tr').css('display',advanced_mode);
			$('#control_Headswing .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keycodesleft .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keycodesright .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keycodesup .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keycodesdown .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keycodesin .amount').closest('tr').css('display',advanced_mode);
			$('#control_Keycodesout .amount').closest('tr').css('display',advanced_mode);
			$('#autorotate_Accel .amount').closest('tr').css('display',advanced_mode);
			$('#autorotate_Horizon .amount').closest('tr').css('display',advanced_mode);
			$('#autorotate_Tofov .amount').closest('tr').css('display',advanced_mode);
            
            
		},
		/* color the selected hotspot red and fill the inputfields with hotspot information */
		focusHotspot: function(hotspotid){
			//get the current location and the selected hotspot.
			var location = tour.current_location;
			var hotspot = location.getHotspotById(hotspotid);			
			//store selected hotspot
			tour.selected_hotspot = hotspot;
			//color the selected hotspot red - uncolor the rest
			location.setFocusedHotspot(hotspot.id);
			
			//get the coordinates of the hotspot			
			var atv = krpano.get("hotspot[hotspot_"+hotspot.id+"].atv");
			var ath = krpano.get("hotspot[hotspot_"+hotspot.id+"].ath");
			
			//move to the hotspot
			krpano.movetohotspot(ath,atv,90);	
			
			//show and place the tiny edit bar above the hotspot
			krpano.set("hotspot[tiny_bar].atv", atv,false);
			krpano.set("hotspot[tiny_bar].ath", ath,false);
			krpano.set("hotspot[tiny_bar].visible", true,false);
			krpano.set("plugin[tiny_bar_move].ondown","set(dragging,true); draghotspot(hotspot_"+hotspot.id+");",false);
			
			//update all the inputboxes,sliders etc
			this.showHotspotInformation(hotspot);
			
			//Select the hotspot tab in visual-accordionmenu
			$('#visual-editor-tabs').tabs('select', 3); 
		},
		showHotspotInformation: function(hotspot){
			for(attri in hotspot.attributes)
			{
				if($('#hotspot_'+attri+' .slider').length){ //if a slider exists of this property				
					$('#hotspot_'+attri+' .slider').slider("value",hotspot.attributes[attri]);									
				}
				if($('#hotspot_'+attri+' .amount:checkbox').length){ //if it is a checkbox
					$('#hotspot_'+attri+' .amount').attr('checked', StrToBoolean(hotspot.attributes[attri]));				
				}
				else{ //if it's a inputbox				
					$('#hotspot_'+attri+' .amount').val(hotspot.attributes[attri]);	//normal value
				}
			}
            $('#hotspot_Type .amount').val(hotspot.Type);
            $('#hotspot_Type_'+hotspot.Type.toLowerCase()).val(hotspot.Meta);
            this.updateHotspotType(hotspot.Type);
		},
        updateHotspotType: function(type){
            var type_array = new Array("location","javascript","trigger","hint","url");
                
            tour.selected_hotspot.Type = type;                
			krpano.call("changeurl(hotspot_"+tour.selected_hotspot.id+",hotspot_"+tour.selected_hotspot.Type+".png)");              				
			
            //show the correct input field
            for(var i = 0; i < type_array.length; i++){
				if(type_array[i] === tour.selected_hotspot.Type){
					$('#hotspot_Type_'+type_array[i]).closest('tr').css('display','table-row');                       
				}else{
					$('#hotspot_Type_'+type_array[i]).closest('tr').css('display','none');
				}
			}
        },
		updateHotspot: function(){
			var type =  $('#hotspot_Type .amount').val(); //the value of the type dropbox
			var metainfoid = "#hotspot_Type_" + type; //the value of the type content

			var postData = { 
				HotspotId: $('#hotspot_HotspotId .amount').val(),
				Name: $("#hotspot_Name .amount").text(),
				Type: $('#hotspot_Type .amount').val(),
				Meta: $(metainfoid).val(),
				Atv: $('#hotspot_Atv .amount').val(),
				Ath: $('#hotspot_Ath .amount').val(),
				Keep: $('#hotspot_Keep .amount').attr('checked'),
				Devices: $('#hotspot_Devices .amount').val(),
				Visible: $('#hotspot_Visible .amount').attr('checked'),
				Enabled: $('#hotspot_Enabled .amount').attr('checked'),
				Handcursor:  $('#hotspot_Handcursor .amount').attr('checked'),
				Zorder: $('#hotspot_Zorder .amount').val(),
				Capture: $('#hotspot_Capture .amount').attr('checked'),
				Preload: $('#hotspot_Preload .amount').attr('checked'),
				Children: $('#hotspot_Children .amount').attr('checked'),
				Blendmode: $('#hotspot_Blendmode .amount').val(),
				Style: $('#hotspot_Style .amount').val(),
				Edge: $('#hotspot_Edge .amount').val(),
				Ox: $('#hotspot_Ox .amount').val(),
				Oy: $('#hotspot_Oy .amount').val(),
				Zoom: $('#hotspot_Zoom .amount').attr('checked'),
				Distorted: StrToBoolean($('#hotspot_Distorted .amount').attr('checked')),
				Rx: $('#hotspot_Rx .amount').val(),
				Ry: $('#hotspot_Ry .amount').val(),
				Rz: $('#hotspot_Rz .amount').val(),
				Inverserotation: $('#hotspot_Inverserotation .amount').attr('checked'),
				Flying: $('#hotspot_Flying .amount').val(),
				Width: $('#hotspot_Width .amount').val(),
				Height: $('#hotspot_Height .amount').val(),
				Scale: $('#hotspot_Scale .amount').val(),
				Altscale: $('#hotspot_Altscale .amount').val(),
				Rotate: $('#hotspot_Rotate .amount').val(),
				Smoothing: $('#hotspot_Smoothing .amount').attr('checked'),
				Accuracy: $('#hotspot_Accuracy .amount').val(),
				Alpha: $('#hotspot_Alpha .amount').val(),
				Usecontentsize: $('#hotspot_Usecontentsize .amount').attr('checked'),
				Scalechildren: $('#hotspot_Scalechildren .amount').attr('checked'),
				Scale9grid: $('#hotspot_Scale9grid .amount').val(),
				Mask: $('#hotspot_Mask .amount').val(),
				Effect: $('#hotspot_Effect .amount').val(),
				Onhover: $('#hotspot_Onhover .amount').val(),				
				Onover: $('#hotspot_Onover .amount').val(),
				Onout: $('#hotspot_Onout .amount').val(),
				Onclick: $('#hotspot_Onclick .amount').val(),
				Ondown: $('#hotspot_Ondown .amount').val(),				
				Onup: $('#hotspot_Onup .amount').val(),			
				Onloaded: $('#hotspot_Onloaded .amount').val(),			
				Altonloaded: $('#hotspot_Altonloaded .amount').val(),	
				Effects: $('#hotspot_Effects .amount').val(),
				ajax: '1'		
			};	
			$.ajax({
				url: url_updatehotspot,
				type: 'POST',
				data: postData,
				dataType: 'html',
				success: function(data) {				
					editor.displayMessage('Hotspot' + HotspotId +' added to database', 'Succes');
				}
			}); 	
		},
		/* Gets the coordinates of the mouse during doubleclick event, add the newly created hotspot to db and place on krpano */
		createHotspot: function(){
            console.log('doubleclick');
			//get the spherical coordinates of the place where the user clicked.
			var mousex = krpano.get("mouse.x");
			var mousey = krpano.get("mouse.y");
			var spherical_coordinates = krpano.get("screentosphere("+mousex+","+mousey+")"); //convert x/y in ath/atv
			var coordinates_array = spherical_coordinates.split(","); 
			
			var Ath = Math.round(Number(coordinates_array[0]) * 100) / 100; //round up to 2 decimals after ,
			var Atv = Math.round(Number(coordinates_array[1]) * 100) / 100;
			
			//Ajax options
			defaultajaxoptions.data = {
				ajax: '1',
				Atv: Atv,
				Ath: Ath
			};		
			defaultajaxoptions.dataType ='json';
			defaultajaxoptions.url = url_createhotspot;
			defaultajaxoptions.success = function(data){
				editor.displayMessage('Hotspot added to database', 'Succes');
				editor.placeHotspot(data);
				//$("#hotspot_overview > tbody").append("<tr id='hotspot_"+hotspot.HotspotId+"_row'><td>"+hotspot.HotspotId+"</td><td>"+hotspot.Type+"</td><td>"+hotspot.Name+"</td><td>todo: delete link after new add - use refresh to see link for now.</td></tr>");

			};
			//Ajax execution
			$.ajax(defaultajaxoptions);
			
		},
		removeHotspot: function()
		{			
			var location = tour.current_location;
			var hotspot = tour.selected_hotspot;
			
			//Ajax options
			defaultajaxoptions.data = {
				ajax: '1',
				hotspotid: hotspot.id
			};	
			defaultajaxoptions.dataType ='html';
			defaultajaxoptions.url = url_deletehotspot;
			defaultajaxoptions.success = function(data){
				editor.displayMessage('Hotspot removed from database', 'Succes');
				
				location.removeHotspot(hotspot); //remove from object	
				krpano.set("hotspot[tiny_bar].visible", false);				
				krpano.removehotspot(hotspot.id); //remove from view
				this.hotspots.splice(hotspot.index,1);	//remove the hotspot from the array			
				tour.selected_hotspot = null; //clear current hotspot
				$('#visual-editor-tabs').tabs('select', 1); 
			};
			//Ajax execution
			$.ajax(defaultajaxoptions);
		},
		/* Ajax message */
		displayMessage: function(message, type) {
			$('#visual_message').html(type+": "+message);			
		},
		/* Put the hotspot in the location and krpano */
		placeHotspot: function(hotspotdata) {
			var location = tour.getCurrentLocation();
			var hotspot = new Hotspot();
			hotspot.Init(hotspotdata.HotspotId,undefined, hotspotdata);			
			
			location.addHotspot(hotspot); //add Hotspot to location array			
			this.focusHotspot(hotspot.id); //color the hotspot and focus the screen
		},
        saveProject: function(){
           	var postData = {
				project : tour.getObject(),   
			}
			$.ajax({
				url: url_savetodb,
				type: 'POST',
				data: postData,
				dataType: 'html',
				success: function(data) {				
					editor.displayMessage(data);
				}
			}); 
        },
	};
}