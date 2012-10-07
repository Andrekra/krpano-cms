// Filename: app.js
define([
    'order!underscore',
    'order!backbone',
    'order!krpanojsf/krpanojsf',
    'order!krpanojsf/router', // Request router.js
    'order!krpanojsf/utilities'
], function(_, Backbone, krpanojsf, Router, utilities){
    var initialize = function(project){
        this.router = new Router(project);
        Backbone.history.start();

    }

    return {
        apiUrl: '/api/',
        initialize: initialize,
        utilities: utilities,
        api: krpanojsf,
        events: {
            onxmlcomplete: function(){
                console.log('krpano: onxmlcomplete');
                $(window).trigger('KRPANO_READY');
            },
            onpreviewcomplete: function(){
              $(window).trigger('krpano:onpreviewcomplete');
            },
            onstart: function(){
                console.log('krpano: onstart')
            },
            onclick: function(){
                $(window).trigger('KRPANO_CLICK');

                if(typeof window.numclick == "undefined"){window.numclick = 0;}
                setTimeout("window.numclick = 0",400);
                window.numclick = window.numclick+1;
                if (window.numclick == 2){
                    $(window).trigger('KRPANO_DOUBLECLICK');
                }
            }
        },
        classes: {
            Models: {},
            Views: {},
            Collections: {}
        },
        views: {
            projects: false
        },
        models: {},
        collections: {}

    };
});
