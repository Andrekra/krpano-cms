// Filename: router.js
"use strict";
define([
    'underscore',
    'backbone',
    'krpanojsf/models/Project',
    'krpanojsf/models/Location',
    'krpanojsf/views/LocationView',
    'krpanojsf/collections/LocationCollection',
    'krpanojsf/modules/ProjectView/views/ProjectUpdateView',
    'krpanojsf/modules/Projects/app',
    'krpanojsf/modules/Projects/collections/ProjectCollection',
    'krpanojsf/views/ProjectMenu',
    'krpanojsf/views/forms/DisplayForm',
    'krpanojsf/models/Display',
    'krpanojsf/views/forms/AutorotateForm',
    'krpanojsf/models/Autorotate',
    'krpanojsf/views/ProjectEditorView'
], function(_, Backbone, Project, Location, LocationView, LocationCollection, ProjectUpdateView, ProjectModule, ProjectCollection, ProjectMenu, Display, DisplayModel, Autorotate, AutorotateModel, ProjectEditorView){
    var AppRouter = Backbone.Router.extend({
        routes: {
            'location/id/*id' : 'openlocationbyid',
            // 'location/*loc' : 'openlocation',
            '': 'projectlist',
            'projects' : 'projectlist',
            'project/id/:id' : 'openProject',
           /* 'project/id/:id/display' : 'editDisplay',
            'project/id/:id/autorotate' : 'editAutorotate'*/
        },
        initialize: function(project) {
            //krApp.api.set('events[krpanojsf].onxmlcomplete', 'js(krApp.router.onxmlcomplete()))');
            //krApp.api.set('events[krpanojsf].onpreviewcomplete', 'js(krApp.api.trace("test2"))');

            //krApp.project = new Project(project);
            // krApp.locations = new LocationCollection(krApp.project.get('locations'));
           // krApp.projecteditor = new ProjectEditorView();
            console.log('init');
        },
        onxmlcomplete: function(){
//        //var scene_name = krApp.api.get('xml.scene');
            //this.navigate("/location/id/"+scene_name.substr(6), true);

        },
        home: function(){
            this.navigate("/location/id/"+krApp.project.get('default_location_id'), {trigger: true});
        },
        openProject: function(id){
            console.log('openproject');
/*            var project = new Project({id: id});
            project.fetch(
                {success: function(model, rawData){
                    krApp.project = model;
                    console.log(model);
                    krApp.projecteditor = new ProjectEditorView();
                    krApp.render();
                }
            });*/
        },
/*        openProjectById: function(id){

            //if(typeof krApp.projects.get(id) == "undefined"){
            var project = new Project({id: id});
            project.fetch(
                {success: function(model, rawData){
                    krApp.project = model;
                    krApp.projecteditor = new ProjectEditorView();
                    $('#container').html(krApp.projecteditor.render().$el);

                    var p = new ProjectUpdateView({model: model});
                    $('#content .left').html(p.render().$el);

                    var menu = new ProjectMenu();
                    $('#submenu').html(menu.render().$el);

                    //open default location
                    var defaultlocation = new Location({id: model.get('default_location_id')});
                    defaultlocation.fetch({
                        success: function(location, rawData){
                            var $wrapper = $('<div class="box"></div>');
                            var $header = $('<div class="box-header"><h1><span class="icon-picture"></span>  Panoramic Preview</h1></div>');
                            var $content = $('<div class="box-content"></div>');
                            var $pano = $('<div id="pano"></div>');
                            var $footer = $('<div class="box-footer">' +
                                '<a id="showlog" class="btn"><span class="icon-list"></span>toggle debug log</a>' +
                                '<a id="refresh" class="btn"><span class="icon-refresh"></span>reload panorama</a>' +
                                '</div>');
                            var $el = $('#content .right');
                            $el.empty();

                            $wrapper.append($header)
                                .append($content)
                                .append($footer);
                            $content.append($pano);
                            $el.append($wrapper);
                            var state = true;
                            $('#showlog').live('click', function(e){
                                e.preventDefault();
                                if(state){ state = false } else { state = true };
                                krApp.api.call('showlog('+state+')');
                            });
                            $('#refresh').live('click', function(e){
                                e.preventDefault();
                                krApp.api.call('showlog('+state+')');
                            });

                            //load krpano and trigger an event when it's done.
                            embedpano({swf:"js/vendors/krpano/krpano.swf", xml:"krpano.xml", target:"pano", wmode:"transparent", height: "400px"});
                            $(window).on('KRPANO_READY', function(event){
                                //remove the event
                                $(window).off('KRPANO_READY');
                                //attach hotspots and view (todo: preview and image)
                                krApp.location.render();
                                return false;
                            })
                        }
                    })
                }
                });
            // }
        },
        editDisplay:function(id){
            if(typeof krApp.project == "undefined" || krApp.project.get('id') != id){
               // krApp.project =
            }
            var displaymodel = new DisplayModel();
            displaymodel.urlRoot = '/api/projects/'+id+'/display';
            displaymodel.fetch({
                success: function(model, rawData){
                    var display = new Display({model: model});
                    $('#content .left').html(display.render().$el);
                    display.initForm();
                }
            });
        },
        editAutorotate:function(id){
            var autorotatemodel = new AutorotateModel();
            autorotatemodel.urlRoot = '/api/projects/'+id+'/autorotate';
            autorotatemodel.fetch({
                success: function(model, rawData){
                    var autorotate = new Autorotate({model: model});
                    $('#content .left').html(autorotate.render().$el);
                    autorotate.initForm();
                }
            });
        },
*/
        openlocationbyid: function(id){

            //fetch location model
            var location = new Location({id: id});
            location.fetch({
                success: function(model, rawData){
                    krApp.location = new LocationView({model: model});

                    if(typeof krApp.project == "undefined"){
                        krApp.project = new Project({id: location.get('project_id')});
                        krApp.project.fetch({
                            success: function(model, rawData){
                                var p = new ProjectUpdateView({model: krApp.project, current_location: krApp.location});
                                $('#content .left').html(p.render().$el);

                                var menu = new ProjectMenu();
                                $('#submenu').prepend(menu.render().$el);

                            }
                        })
                    } else {
                        var p = new ProjectUpdateView({model: krApp.project, current_location: krApp.location});
                        $('#content .left').html(p.render().$el);
                    }
                    var $wrapper = $('<div class="box"></div>');
                    var $header = $('<div class="box-header"><h1><span class="icon-picture"></span>  Panoramic Preview</h1></div>');
                    var $content = $('<div class="box-content"></div>');
                    var $pano = $('<div id="pano"></div>');
                    var $footer = $('<div class="box-footer">' +
                        '<a id="showlog" class="btn"><span class="icon-list"></span>toggle debug log</a>' +
                        '<a id="refresh" class="btn"><span class="icon-refresh"></span>reload panorama</a>' +
                        '</div>');
                    var $el = $('#content .right');
                    $el.empty();

                    $wrapper.append($header)
                        .append($content)
                        .append($footer);
                    $content.append($pano);
                    $el.append($wrapper);
                    var state = true;
                    $('#showlog').live('click', function(e){
                        e.preventDefault();
                        if(state){ state = false } else { state = true };
                        krApp.api.call('showlog('+state+')');
                    });
                    $('#refresh').live('click', function(e){
                        e.preventDefault();
                        krApp.api.call('showlog('+state+')');
                    });

                    //load krpano and trigger an event when it's done.
                    embedpano({swf:"js/vendors/krpano/krpano.swf", xml:"krpano.xml", target:"pano", wmode:"transparent", height: "400px"});
                    $(window).on('KRPANO_READY', function(event){
                        //remove the event
                        $(window).off('KRPANO_READY');
                        //attach hotspots and view (todo: preview and image)
                        //krApp.location.render();
                        return false;
                    })
                    //krApp.location.render();
                },
                error: function(response){
                    //console.log(response);
                }
            });


            /*   if(typeof location !== 'undefined'){
             krApp.location = new LocationView({model: locationModel});
             krApp.location.render();
             }*/

        },
        openlocation: function(loc, params){
            console.log('openlocation');
            //krApp.api.call('loadscene('+loc+')');
        },
        project: function(id){

        },
        projectlist: function(){

            krApp.views.projects = new ProjectModule();
            krApp.views.projects.render();


        }
    });


    return AppRouter;
});
