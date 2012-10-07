// Filename: krpanojsf/models/Location.js
define([
  'backbone',
    'krpanojsf/collections/HotspotCollection',
    'krpanojsf/views/HotspotCollectionView'
], function(Backbone, HotspotCollection, HotspotCollectionView){
    var Location = Backbone.Model.extend({
        urlRoot: apiUrl +'location/',

    });
    return Location;
});