// Filename: krApp.api/models/hotspots/HotspotCollectionView.js
define([
  'backbone',
  'underscore'
], function(Backbone, _){
   var View = Backbone.View.extend({
       initialize: function(){
          _.bindAll(this, 'render'); //make render accessible from the outside
          this.model.on('change', this.render); //when a hotspot gets changed, rerender it

           this.model.view = this;
       },
        render: function(){
            //update the properties
            krApp.api.set('view', this.model.toJSON());

            return this;
        }
    });
    return View;
});