// Filename: krpanojsf/models/hotspots/LocationHotspot.js
define(['krpanojsf/models/hotspots/HotspotBase'], function(HotspotBase){
    var LocationHotspot = HotspotBase.extend({
        initialize: function(){
            var defaults = {
				url: '%SWFPATH%/img/hotspot_location.png',
                type: 'location',
                metadata: {
                    location: 'scene_bw',
                    type: 'scene',
                    onclick: 'change_location()'
                }
            };
            this.set(defaults);
        }
    });
    //window.LocationHotspot = LocationHotspot;
    return LocationHotspot;
});