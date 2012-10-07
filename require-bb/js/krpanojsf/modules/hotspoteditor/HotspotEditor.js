// Filename: router.js
define([
  'jquery',
  'underscore',
  'backbone',
  'krpanojsf/krpanojsf',
  'krpanojsf/models/hotspots/HotspotBase',
  'krpanojsf/models/hotspots/LocationHotspot',
  'krpanojsf/modules/HotspotEditor/views/HotspotEditorView'
], function($, _, Backbone, krpanojsf, HotspotBase, LocationHotspot, HotspotEditorView){
    //global events because limitation of Flash's ExternalInterface
    window.doubleclick = function(){
		krApp.HotspotEditor.handleDoubleclick();
	}
    window.focushotspot = function(name){
        var hotspot = krApp.hotspots.findHotspotByName(name);

        krApp.hotspots.setactive(hotspot);
        krApp.HotspotEditor.showform(hotspot);
    },

    HotspotEditor = {};

    var view = null;

    HotspotEditor.init = function(){
        HotspotEditor.enable();
    };

    HotspotEditor.toggle = function(){
        if(HotspotEditor.enabled || typeof HotspotEditor.enabled == "undefined"){
            HotspotEditor.disable();
        } else {
            HotspotEditor.enable();
        }
    };
    HotspotEditor.enable = function(){
        HotspotEditor.enabled = true;
        krpanojsf.trace('test');
        krpanojsf.set("events[krpanojsf].onclick", "js(doubleclick);trace(click)"); //Doubleclick event

        //adjust the hotspot that get newly made to have a focus action.
        HotspotBase.prototype.defaults.onclick = 'js(focushotspot(get(name))); trace(hotspot[get(name)].metadata.onclick)';
        krApp.hotspots.each(function(hotspot){
            hotspot.set({onclick: 'js(focushotspot(get(name))); trace(hotspot[get(name)].metadata.onclick)'});
            hotspot.set({old_enabled: hotspot.get('enabled')});
            hotspot.set({enabled: true});
        });
    }
    HotspotEditor.disable = function(){
        HotspotEditor.enabled = false;

        //hide form
        HotspotEditor.clearform();

        //remove doubleclick event
        krpanojsf.set("events[krpanojsf].onclick", "");

        //restore hotspot.onclick
        HotspotBase.prototype.defaults.onclick = '';
        krApp.hotspots.each(function(hotspot){
            hotspot.set({onclick: hotspot.get('metadata').onclick});
             hotspot.set({enabled: hotspot.get('old_enabled')});
        });

        //remove active color on hotspot
        krApp.hotspots.setinactive();
    }
    /* Todo: real doubleclick event through flash/js */
    HotspotEditor.handleDoubleclick = function(){
        if(typeof numclick == "undefined"){numclick = 0;}
		setTimeout("numclick = 0",400);
        numclick = numclick+1;
        if (numclick == 2){
            //eval(arg); //argument -> editor.createHotspot();
            krpanojsf.trace(numclick);
            HotspotEditor.create();
        }
	};
    HotspotEditor.create = function(){
        var hotspot = new LocationHotspot({width: 50, height:50});
        var name = hotspot.get('name');

        //add hotspot to krpano
        krpanojsf.call("addhotspot("+ name +")");
        krpanojsf.set("hotspot["+name+"].url", hotspot.get('url'));

        var mousex = krpanojsf.get("mouse.x");
        var mousey = krpanojsf.get("mouse.y");

        var spherical_coordinates = krpanojsf.get("screentosphere("+mousex+","+mousey+")"); //convert x/y in ath/atv
        var coordinates_array = spherical_coordinates.split(",");

        hotspot.set(
            {ath: Math.round(Number(coordinates_array[0]) * 100) / 100,
             atv: Math.round(Number(coordinates_array[1]) * 100) / 100
            }
        );

        krpanojsf.set("hotspot["+name+"].ath", hotspot.get('ath'));
        krpanojsf.set("hotspot["+name+"].atv", hotspot.get('atv'));
        krpanojsf.set("hotspot["+name+"].onclick", hotspot.get('onclick'));

        //add hotspot to collection
        krApp.hotspots.add(hotspot);
        krApp.hotspots.setactive(hotspot);

        //append to editor view
        HotspotEditor.showform(hotspot);
    }
    HotspotEditor.showform = function(hotspot){
        HotspotEditor.clearform();
        //show edit field
        view = new HotspotEditorView({model: hotspot});
        $('#hotspot').append(view.render().el);
    }
    HotspotEditor.clearform = function(){
        $('#hotspot').empty();
        //clear existing edit form
        if (view) view.close();
    }
    return HotspotEditor;
});