define(['backbone', 'jQuery', 'underscore',
    'text!krpanojsf/views/templates/list_hotspot.html'], function (Backbone, $, _, html) {
    var HotspotListItem = Backbone.View.extend({
        events: {
            'click .edit': 'editHotspot',
            'click .remove': 'removeHotspot',
            'click .view': 'viewHotspot',
            'change #type select': 'switchType'
            //'click .back': 'back'
        },
        tagName: 'tr',
        initialize:function () {
            _.bindAll(this, "render", "removeView",'editHotspot', 'removeHotspot','viewHotspot');
            this.model.on("change", this.render)
            this.model.on("remove", this.removeView)

            var base =this;
            $('#type select').live('change', function(e){
               base.switchType(e);
            });

        },
        render:function () {
            this.$el.append(_.template(html, this.model.toJSON()));
            return this;
        },
        removeView:function(){
            this.$el.empty();
        },
        editHotspot: function(e){
            e.preventDefault();
            this.model.trigger('edit', this.model); //bineded in locationeditorview, triggers rendering of hotspotform
        },
        viewHotspot: function(e){
            e.preventDefault();
            krApp.api.call('looktohotspot('+ this.model.get('name')+', 60)');
        },
        removeHotspot: function(e){
            e.preventDefault();
            this.model.destroy();
        },
        back: function(e){
            e.preventDefault();
        },
        switchType: function(e){
            var id = '#' + $(e.currentTarget).attr('id');
            hotspot_type = $(id + ' option:selected').text();
            switch(hotspot_type){
                default:
                    console.log(hotspot_type)
            }
        }
    });
    return HotspotListItem;
});