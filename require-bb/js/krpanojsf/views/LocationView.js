// Filename: krpanojsf/models/hotspots/HotspotCollectionView.js
define([
  'backbone',
  'underscore',
  'krpanojsf/krpanojsf',
  'krpanojsf/collections/HotspotCollection',
  'krpanojsf/views/HotspotCollectionView'
], function(Backbone, _, krpanojsf, HotspotCollection, HotspotCollectionView){
   var LocationView = Backbone.View.extend({
       initialize: function(){
          _.bindAll(this, 'render', 'remove'); //make render accessible from the outside
          this.model.bind('change', this.render); //when a hotspot gets changed, rerender it
          this.model.bind('remove', this.remove) //when the hotspot gets deleted, remove it form krpano



          this.model.view = this;
       },
        render: function(){
            //load the location in krpano
            krApp.api.call('loadscene(scene_'+this.model.get('id')+')');

            //append hotspots to krpano
            krApp.views.hotspots.render();

            //
           var view = this.model.get('view');
           krApp.api.set('view', view);
        },
        remove: function(){

        }
    });
    return LocationView;
});