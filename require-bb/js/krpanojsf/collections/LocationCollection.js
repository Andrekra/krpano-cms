// Filename: krpanojsf/collection/LocationCollection.js
define([
  'backbone',
  'underscore',
  'krpanojsf/models/Location'
], function(Backbone,_,Location){
    var LocationCollection = Backbone.Collection.extend({
        url: 'http://labs.panofy.com/api/locations/',
        model: Location,
        save: function(){
            _.each(this.models, function(model){
                model.save();
            });
        },
        _findActiveLocation: function(){
            return this.find(function(location){ return location.get('active') == true});
        },
        findByName: function(name){
            return this.find(function(location){ return location.get('name') == name});
        }

        //url: "/hotspots" using HotspotCollection.fetch() triggers a REST call to /hotspots
    });
    return LocationCollection;
});