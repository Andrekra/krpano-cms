// Filename: krpanojsf/models/hotspots/HotspotCollectionView.js
define([
  'backbone',
  'underscore',
  'krpanojsf/views/HotspotView',
], function(Backbone,_,HotspotView){   
    
    var HotspotCollectionView = Backbone.View.extend({
       initialize: function(){
            _.bindAll(this, "render", "add");
            this.collection.on("add", this.add);

            var that = this;
            this._hotspotViews = [];

            this.collection.each(function(hotspot) {
              that._hotspotViews.push(new HotspotView({
                model : hotspot
              }));
            });
       },
       add: function(hotspot){
            var hotspotview = new HotspotView({
                model:hotspot
            });
            this._hotspotViews.push(hotspotview);
            hotspotview.render();            
        },
       render: function(){		
         _(this._hotspotViews).each(function(hotspot) {
           hotspot.render();
        });
       }
    });
    return HotspotCollectionView;
});