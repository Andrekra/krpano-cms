// Filename: krApp.api/models/hotspots/HotspotCollectionView.js
define([
  'backbone',
  'underscore'
], function(Backbone, _){
   var HotspotView = Backbone.View.extend({
       name: null,
        el: '#hotspot',
        events: {
            "change .type": "update_type"
        },

       initialize: function(){
          _.bindAll(this, 'render', 'update_type', 'remove'); //make render accessible from the outside
          this.model.on('change', this.render); //when a hotspot gets changed, rerender it
          this.model.on('remove', this.remove) //when the hotspot gets deleted, remove it form krpano

           this.model.view = this;
       },
        render: function(){
            //if the krpano hotspot doesn't exist, create it.
            if(krApp.api.get('hotspot['+this.model.get('name')+'].name') === null){
                krApp.api.trace('adding new hotspot: ' + this.model.get('name'));
                krApp.api.call('addhotspot('+this.model.get('name')+');');

            }
            krApp.api.call("hotspot["+this.model.get('name')+"].loadstyle(hotspotstyle)");
            
            //update the properties
            krApp.api.set('hotspot['+this.model.get('name')+']', this.model.toJSON());


        },
        update_type: function(){
          //console.log('updating type')
           // this.model.get('url');
        },
        focus: function(){
            krApp.api.call('looktohotspot('+this.model.get('name') +',90)');
            krApp.api.set("hotspot["+this.model.get('name') +"].effect", "glow(0xFF0000,1,5,5);");
            krApp.api.set("hotspot["+this.model.get('name') +"].jsborder", "1px solid #FF0000;");
            this.model.set({active: true});
        },
        unfocus: function(){
            krApp.api.set("hotspot["+ this.model.get('name') + "].effect", '');
            krApp.api.set("hotspot["+ this.model.get('name') + "].jsborder", '');
            this.model.set({active: false});
        },
        remove: function(){
            krApp.api.call('removehotspot('+this.model.get('name')+')');
        }
    });
    return HotspotView;
});