define(['backbone', 'underscore',
'text!krpanojsf/views/templates/form_hotspots.html'
], function(Backbone, _, html){
    var Hotspots = Backbone.View.extend({
        className: 'hotspots',
        template: html,
        events: {

        },
        initialize: function(){
            _.bindAll(this, 'render');
        },
        render: function(){
            this.$el.html(_.template(html, this.model.toJSON()));
            return this;
        }
    });
    return Hotspots;
});