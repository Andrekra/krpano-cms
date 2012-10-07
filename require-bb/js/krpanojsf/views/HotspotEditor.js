define(['backbone', 'jQuery', 'underscore', 'krpanojsf/models/hotspots/LocationHotspot', 'krpanojsf/views/HotspotView', 'krpanojsf/views/forms/HotspotForm'], function (Backbone, $, _, LocationHotspot, HotspotView, HotspotForm) {
    "use strict"

    var HotspotEditor = Backbone.View.extend({
        initialize:function () {
            _.bindAll(this, "render", "doubleclickHandler", "_getCoordinates");
            $(window).on('KRPANO_DOUBLECLICK', this.doubleclickHandler);

            this.form = new HotspotForm({model: this.model});
        },
        render: function() {
            //bind double click event to _getCoordinates.
           krApp.api.set('events.onclick', 'js(krApp.events.onclick())')
        },
        _getCoordinates: function(){
            var hotspot = new LocationHotspot({width: 50, height:50, name: krApp.utilities.getUniqueId('h_')});

            var mousex = krApp.api.get("mouse.x");
            var mousey = krApp.api.get("mouse.y");

            //convert x/y to ath/atv
            var spherical_coordinates = krApp.api.get("screentosphere("+mousex+","+mousey+")"); //convert x/y in ath/atv
            if(spherical_coordinates){
                var coordinates_array = spherical_coordinates.split(",");

                hotspot.set({
                    ath: coordinates_array[0],
                    atv: coordinates_array[1],
                    location_id: krApp.models.location.get('id')

                });
                krApp.collections.hotspots.add(hotspot);
            } else {
                //try different tactic for ipad
                krApp.api.set('sphere_horizontal', null);
                krApp.api.set('sphere_vertical', null);

                var screentosphere_callback = function(){
                    var _ath = krApp.api.get('sphere_horizontal');
                    var _atv = krApp.api.get('sphere_vertical');

                    hotspot.set({
                        ath: _ath,
                        atv: _atv,
                        location_id: krApp.models.location.get('id')
                    });
                    krApp.collections.hotspots.add(hotspot);
                }
                krApp.api.set('screentosphere_callback', screentosphere_callback);
                krApp.api.call("screentosphere(mouse.x, mouse.y, sphere_horizontal, sphere_vertical); screentosphere_callback();"); //convert x/y in ath/atv
            }

            $('#sidebar').html(this.form.render().$el);
        },
        doubleclickHandler: function(){
            this._getCoordinates();
        }
    });

    return HotspotEditor;
});