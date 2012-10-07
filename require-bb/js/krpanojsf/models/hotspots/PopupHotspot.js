// Filename: krpanojsf/models/hotspots/PopupHotspot.js
define(['krpanojsf/models/hotspots/HotspotBase'], function(HotspotBase){
    var PopupHotspot = HotspotBase.extend({
        initialize: function(){
            var defaults = {
				url: '%SWFPATH%/img/hotspot_popup.png',
                type: 'popup',
                metadata: {
                    data: 'a Tastefull description',
                    onclick: 'open_popup()'
                }
            };
            this.set(defaults);
        }
    });
    return PopupHotspot;
});