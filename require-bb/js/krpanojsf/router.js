define(['backbone','underscore',
    'krpanojsf/models/Project', 'krpanojsf/views/ProjectEditorView',
    'krpanojsf/models/Location', 'krpanojsf/views/LocationEditorView'
],function(Backbone, _,
           Project, ProjectEditorView,
           Location, LocationEditorView
    ){
    "use strict"
    var AppRouter = Backbone.Router.extend({
        routes: {
            '': 'openProject',
            'project/:id/:attribute': 'openProject',
            'project/:id/': 'openProject',  //no attribute
            'project/:id': 'openProject', //without trailling slash
            'location/:id/:attribute': 'openLocation',
            'location/:id/': 'openLocation',  //no attribute
            'location/:id': 'openLocation', //without trailling slash
            'hotspot/:id/': 'openHotspot', //show hotspot edit form
            'hotspot/:id': 'openHotspot' //without trailing
        },
        initialize: function(){
            console.log('init router;')
            _.bindAll(this, '_loadProjectEditor');
        },
        openProject: function(id, attribute){
            //for testing purposes, set default id on 30
            if(typeof id == "undefined"){ id = 30 }
            var base = this;

            //if no attribute is defined, load default 1st tab
            if(typeof attribute == "undefined") {
                this.navigate("project/"+id+'/project', {trigger: true});
            }

            //fetch new project from server if chosen project mismatches the one in memory
            if(typeof krApp.views.project == "undefined" || krApp.models.project.get('id') != id){
                var project = new Project({id: id});
                project.fetch({
                    success: function(model, rawData){
                        //store project as current model
                        krApp.models.project = model;

                        //load the project editor and form
                        base._loadProjectEditor(id, attribute);
                    }
                });
            } else {
                //load the project editor and form
                base._loadProjectEditor(id, attribute);
            }
        },

        _loadProjectEditor: function(id, attribute){
            if(typeof krApp.views.project == "undefined" || krApp.views.project.model.get('id') != id){
                krApp.views.project = new ProjectEditorView({model: krApp.models.project});
                krApp.views.project.form = attribute;
                krApp.views.project.render();
            } else {
                //else just rerender the form
                krApp.views.project.form = attribute;
                krApp.views.project.panoramaReady();
            }
        },
        openLocation: function(id, attribute){
            //for testing purposes, set default id on 30
            if(typeof id == "undefined"){ id = 30 }
            var base = this;

            //if no attribute is defined, load default 1st tab
            if(typeof attribute == "undefined") {
                this.navigate("location/"+id+'/hotspots', {trigger: true});
            }

            //fetch new project from server if chosen project mismatches the one in memory
            if(typeof krApp.views.location == "undefined" || krApp.models.location.get('id') != id){
                var location = new Location({id: id});

                location.fetch({
                    success: function(model, rawData){
                        //store project as current model
                        krApp.models.location = model;

                        //load the project editor and form
                        base._loadLocationEditor(id, attribute);
                    }
                });
            } else {
                //load the project editor and form
                base._loadLocationEditor(id, attribute);
            }
        },

        _loadLocationEditor: function(id, attribute){
            if(typeof krApp.views.location == "undefined" || krApp.views.location.model.get('id') != id){
                krApp.views.location = new LocationEditorView({model: krApp.models.location});
                krApp.views.location.form = attribute;
                krApp.views.location.render();
            } else {
                //else just rerender the form
                krApp.views.location.form = attribute;
                krApp.views.location.panoramaReady();
            }
        },

        openHotspot: function(id){

        }
    });
    return AppRouter;
});