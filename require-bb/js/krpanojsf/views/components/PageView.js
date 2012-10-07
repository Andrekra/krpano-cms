define(['backbone', 'underscore',
    'krpanojsf/views/PanoramaView',
    'text!krpanojsf/views/templates/page.html'
], function (Backbone, _, PanoramaView, pageTemplate) {
    var PageView = Backbone.View.extend({
        el: $('#container'),
        events:{

        },
        initialize:function () {
            _.bindAll(this, 'render','renderContent','renderSidebar','renderSubMenu','panoramaReady','previewLoaded');
            this.model.on('change', this.render, this);
        },
        render:function () {
            this.$el.html(_.template(pageTemplate, {}));

            //done rendering
            this.trigger('rendered');
            return this;
        },
        renderPanorama: function(){
            this.$('#page').append('<div id="pano"></div>');

            //render krpano
            var panoramaview = new PanoramaView();
            panoramaview.render().$el;
            panoramaview.on('KRPANO_READY', this.panoramaReady)
            panoramaview.on('onpreviewcomplete', this.previewLoaded)
        },
        panoramaReady: function(){

            //empty, filled by child.
        },
        previewLoaded: function(){

        },
        renderSubMenu: function(html){
            this.$('#submenu').html(html);
            return this;
        },
        renderContent: function(html){
            this.$('#page').html(html);
            return this;
        },
        renderSidebar: function(html){
            this.$('#sidebar').html(html);
            this.$('#sidebar').fadeIn('slow', function(){
               //location.initForm();
           });
            return this;
        }
    });
    return PageView;
});