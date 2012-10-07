// Filename: krpanojsf/models/hotspots/HotspotBase.js
define([
  'backbone'
], function(Backbone){
    var HotspotBase = Backbone.Model.extend({
       defaults: {
           url: '%SWFPATH%/img/hotspot_location.png',
           name: 'test',//function(){ return krApp.utilities.getUniqueId('hotspot_')},
           keep: true,
           handcursor: true,
           enabled: true,
           selectable: true,
		   capture: true,
		   mousechildren: false,
           onclick: 'looktohotspot(get(name), get(view.fov));call(hotspot[get(name)].metadata.onclick)',
		   overscale: '1.1',
		   onover: 'copy(hotspot[get(name)].oldscale, scale); tween(scale, get(hotspot[get(name)].overscale), 0.7)',
		   onout: 'tween(scale, get(hotspot[get(name)].oldscale), 0.25)',
           metadata: {}
       },
       initialize: function(){
          throw('Can\'t instantiate model Hotspot directly');
       }
    });
    return HotspotBase;
});