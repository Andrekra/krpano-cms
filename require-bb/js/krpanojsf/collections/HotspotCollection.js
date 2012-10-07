// Filename: krpanojsf/models/hotspots/HotspotCollection.js
define([
  'backbone',
  'underscore',
  'krpanojsf/models/hotspots/LocationHotspot',
  'krpanojsf/models/hotspots/PopupHotspot'
], function(Backbone,_,LocationHotspot,PopupHotspot){
    var HotspotCollection = Backbone.Collection.extend({
        url: apiUrl + 'hotspots/',
        model: function(attr, options){
            switch(attr.type){
                case 'popup':
                    return new PopupHotspot(attr, options);
                    break;
                default:
                    return new LocationHotspot(attr, options);
                    break;
            }
        },
        save: function(){
            _.each(this.models, function(model){
                model.save();
            });
        },
        setactive: function(hotspot){
            this.setinactive();
            hotspot.view.focus();
        },
        setinactive: function(){
            var activespot = this._findActiveHotspot();
            if(typeof activespot != "undefined"){
                activespot.view.unfocus();
            }
        },
        _findActiveHotspot: function(){
            return this.find(function(hotspot){ return hotspot.get('active') == true});
        },
        findHotspotByName: function(name){
            return this.find(function(hotspot){ return hotspot.get('name') == name});
        }

        //url: "/hotspots" using HotspotCollection.fetch() triggers a REST call to /hotspots
    });
    return HotspotCollection;
});