define(['backbone', 'jQuery', 'underscore',
    'krpanojsf/views/lists/HotspotListItem'
], function (Backbone, $, _, HotspotListItem) {
    var HotspotList = Backbone.View.extend({
        events: {

        },
        tagName: 'table',
        initialize:function () {
            _.bindAll(this, "render", "add");
            this.collection.on("change", this.render);
            this.collection.on("add", this.add);
        },
        render:function() {
            var base = this;
            this.collection.each(function(Hotspot) {
                var view = new HotspotListItem({
                    model : Hotspot
                });
                base.$el.append(view.render().$el);
            });
            base.$('a').tooltip();
            return this;
        },
        add: function(model, collection) {
            var view = new HotspotListItem({model: model})
            this.$el.append(view.render().$el);
        }
    });
    return HotspotList;
});