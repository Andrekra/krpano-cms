define(['backbone', 'underscore',
    'krpanojsf/models/Location',
    'krpanojsf/views/components/PageView',
    'krpanojsf/views/ProjectMenu',
    'krpanojsf/views/forms/HotspotForm',
    'krpanojsf/views/HotspotEditor',
    'krpanojsf/collections/HotspotCollection', 'krpanojsf/views/HotspotCollectionView', 'krpanojsf/views/lists/HotspotsList',
    'krpanojsf/models/View', 'krpanojsf/views/krpano/View', 'krpanojsf/views/forms/ViewForm'
], function (Backbone, _, Location, PageView,
             ProjectMenu,
             HotspotForm,
             HotspotEditor,
             HotspotCollection, HotspotCollectionView, HotspotsList,
             View, ViewProperty, ViewForm
    ) {
    "use strict";
    var LocationEditorView = PageView.extend({
        panoramaLoaded: false,
        form: '`hotspots',
        location: false,
        events:{

        },
        initialize:function () {
            _.bindAll(this, 'render','renderForm','panoramaReady','onRender','previewLoaded');
            this.on('rendered', this.onRender); //once the DOM is ready, load the panorama. Triggered by PageView

            //can't create a new editor if there is not project defined
            if(typeof this.model == "undefined" || this.model == false){
                throw "no location defined";
            }
        },
        /*
         * triggered by Pageview when krpano is done loading.
         */
        onRender: function(){
            //submenu
            //var menu = new ProjectMenu({model: this.model});
            //this.renderSubMenu(menu.render().$el);
            console.log('on render')
            this.renderForm(this.form);
        },
        panoramaReady: function(){
            krApp.api.call('load_panorama(scene_'+this.model.get('project_id') + '_' + this.model.get('id')+')');
        },
        previewLoaded: function(){
            this.panoramaLoaded = true;

            //fill the collection with the new hotspots
            krApp.collections.hotspots = new HotspotCollection(this.model.get('hotspots'));

            //HotspotCollectionView renders the hotspot to krpano as soon as it gets added.
            krApp.views.hotspots = new HotspotCollectionView({collection: krApp.collections.hotspots});
            krApp.views.hotspots.render();

            //add the view
            krApp.models.view = new View(this.model.get('view'));
            krApp.views.view = new ViewProperty({model: krApp.models.view});
            krApp.views.view.render();

            //show the user edit form
            this.renderForm(this.form);
        },
        /*
         * Once the panorama is ready, load the editform.
         */
        renderForm: function(form){
            var base = this;
            base.$('#sidebar').fadeOut('slow', function(){
                console.log(form);
                switch(form){

                    case "hotspots":
                        //make sure krpano is loaded first
                        try{
                            if(base.panoramaLoaded){
                                //communication with krpano. Doubleclick to add a hotspot.
                                var hotspot_editor = new HotspotEditor;
                                hotspot_editor.render();

                                //show a list of hotspots
                                var hotspots_list = new HotspotsList({collection: krApp.collections.hotspots});
                                base.renderSidebar(hotspots_list.render().$el);

                                //when a hotspot gets added, show the edit form
                                krApp.collections.hotspots.on('add', function(model, collection){
                                    var hotspot_form = new HotspotForm();
                                    hotspot_form.model = model;
                                    base.renderSidebar(hotspot_form.render().$el);
                                });
                                krApp.collections.hotspots.on('edit', function(model){
                                    console.log(model)
                                    console.log(model.toJSON())
                                        var hotspot_form = new HotspotForm({model: model});
                                        base.renderSidebar(hotspot_form.render().$el);
                                    });
                            } else {
                                //panorama not ready, load panorama first;
                                base.form = form;
                                base.renderPanorama();
                            }
                        } catch (e) { console.log(e)}

                        break;
                    case "view":
                        if(base.panoramaLoaded){
                            try{

                                var view_form = new ViewForm({model: krApp.models.view});

                                base.$('#sidebar').html(view_form.render().$el);
                                base.$('#sidebar').fadeIn('slow', function(){
                                    view_form.initForm();
                                });
                            } catch(e) { console.log(e)}
                        } else {
                            //panorama not ready, load panorama first;
                            base.form = form;
                            base.renderPanorama();
                        }
                        break;
                }

            });
        }
    });
    return LocationEditorView;
});