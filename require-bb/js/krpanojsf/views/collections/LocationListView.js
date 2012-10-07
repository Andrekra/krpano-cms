define(['backbone','underscore', 'krpanojsf/views/collections/LocationListItemView'
], function(Backbne, _, Item)
{
    var LocationListView = Backbone.View.extend({
        _items: [],
        className: 'projects box',

        events: {
            'click #location-add': 'new_location'
        },
        initialize: function(){
            _.bindAll(this, "render", "add");
            this.collection.on("change", this.render);
            this.collection.on("add", this.add);

            var that = this;
            that._items = [];
            this.collection.each(function(location) {
                that._items.push(new Item({
                    model : location
                }));
            });
        },
        new_location: function(){
          console.log('new')
        },
        add: function(location){
            location.save();
            var locationview = new Item({
                model:project
            });
            this._items.push(locationview);
            this.$el.append(locationview.render().$el);
        },
        render: function(){
            var that = this;
            that.$el.empty();

            var $header = $('<div class="box-header"><h1><span class="icon-folder-open"></span> Locations</h1></div>');
            that.$el.append($header);

            var $content = $('<div class="box-content"></div>');
            that.$el.append($content);
            //add location button
            $content.prepend('<div id="location-add" class="project-wrapper block" style="width: 206px; height: 110px; cursor: pointer"></div>')
            //list of locations
            _(that._items).each(function(item_view) {
                $content.append(item_view.render().$el);
            });
            $content.append('<div class="clear"></div>');

            var $footer = $('<div class="box-footer">Select a panorama to edit it\'s settings and place hotspots.</div>');
            that.$el.append($footer);

            that.$('.btn').tooltip();

            return that;
        }
    });
    return LocationListView
})