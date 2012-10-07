define(['backbone', 'underscore',
    'text!krpanojsf/views/templates/panoramaview.html'
], function (Backbone, _, html) {
    var PanoramaView = Backbone.View.extend({
        id: 'pano',
        events:{

        },
        initialize:function () {
            _.bindAll(this, 'render','onxmlcomplete','onpreviewcomplete');
            $(window).on('KRPANO_READY',this.onxmlcomplete)
            $(window).on('krpano:onpreviewcomplete',this.onpreviewcomplete)
        },
        render:function () {
            console.log('render krpano')
            this.$el.empty();

            var viewer = createPanoViewer({
                swf:"js/vendors/krpano/krpano.swf",
                xml:"krpano.xml",
                target:"pano",
                height: "400px"
            });
            viewer.addParam('wmode','transparent');
            viewer.embed();
            console.log('viewer')
            return this;
        },
        onxmlcomplete: function(){
            console.log('krpano ready')
            $(window).off('KRPANO_READY');
            this.trigger('KRPANO_READY');
        },
        onpreviewcomplete: function(){
           this.trigger('onpreviewcomplete');
        }
    });
    return PanoramaView;
});