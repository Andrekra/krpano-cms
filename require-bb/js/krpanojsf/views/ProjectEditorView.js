define(['backbone', 'underscore',
    'krpanojsf/models/Project',
    'krpanojsf/views/components/PageView',
    'krpanojsf/views/ProjectMenu',
    'krpanojsf/views/forms/ProjectDetailsForm',
    'krpanojsf/models/Display', 'krpanojsf/views/forms/DisplayForm',
    'krpanojsf/models/Autorotate', 'krpanojsf/views/forms/AutorotateForm',
    'krpanojsf/collections/LocationCollection', 'krpanojsf/views/collections/LocationListView'
], function (Backbone, _, Project, PageView,
             ProjectMenu,
             ProjectDetailsForm,
             DisplayModel, DisplayForm,
             AutorotateModel, AutorotateForm,
             LocationCollection, LocationListView
    ) {
    "use strict";
    var ProjectEditorView = PageView.extend({
        panoramaLoaded: false,
        form: 'display',
        project: false,
        events:{

        },
        initialize:function () {
            _.bindAll(this, 'render','renderForm','panoramaReady','onRender');
            this.on('rendered', this.onRender); //once the DOM is ready, load the panorama. Triggered by PageView

            //can't create a new editor if there is not project defined
            if(typeof this.model == "undefined" || this.model == false){
                throw "no project defined";
            } else {
                this.project = this.model;
            }

        },
        /*
         * triggered by Pageview when krpano is done loading.
         */
        onRender: function(){
            //submenu
            var menu = new ProjectMenu({model: this.model});
            this.renderSubMenu(menu.render().$el);

            this.renderForm(this.form);
        },
        panoramaReady: function(){
            this.panoramaLoaded = true;
            this.renderForm(this.form);
        },
        /*
         * Once the panorama is ready, load the editform.
         */
        renderForm: function(form){
            var base = this;
            base.$('#sidebar').fadeOut('slow', function(){
                switch(form){
                    case "project":
                        var project = new ProjectDetailsForm({model: base.project});
                        base.$('#sidebar').html(project.render().$el);

                        base.$('#sidebar').fadeIn('slow', function(){
                            project.initForm();
                        });
                        var locations = new LocationCollection(base.project.get('locations'));
                        locations.url = '/api/projects/' + base.project.get('id') + '/locations';
                        var locationlist = new LocationListView({collection: locations});
                        base.renderContent(locationlist.render().$el);
                        break;
                    case "display":
                        if(base.panoramaLoaded){
                            var displaymodel = new DisplayModel();
                            displaymodel.urlRoot = '/api/projects/'+base.project.get('id')+'/display';
                            displaymodel.fetch({
                                success: function(model, rawData){
                                    var display = new DisplayForm({model: model});
                                    base.$('#sidebar').html(display.render().$el);

                                    base.$('#sidebar').fadeIn('slow', function(){
                                        display.initForm();
                                    });
                                }
                            });
                         } else {
                            //panorama not ready, load panorama first;
                            base.form = form;
                            base.renderPanorama();
                        }
                        break;
                    case "autorotate":
                        if(base.panoramaLoaded){
                            var autorotatemodel = new AutorotateModel();
                            autorotatemodel.urlRoot = '/api/projects/'+base.project.get('id')+'/autorotate';
                            autorotatemodel.fetch({
                                success: function(model, rawData){
                                    var autorotate = new AutorotateForm({model: model});
                                    base.$('#sidebar').html(autorotate.render().$el);
                                    base.$('#sidebar').fadeIn('slow', function(){
                                        autorotate.initForm();
                                    });
                                }
                            });
                            break;
                        } else {
                            //panorama not ready, load panorama first;
                            base.form = form;
                            base.renderPanorama();
                        }
                }

            });
        }
    });
    return ProjectEditorView;
});