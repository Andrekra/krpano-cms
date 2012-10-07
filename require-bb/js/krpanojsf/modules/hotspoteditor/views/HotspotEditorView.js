define([
  'jquery',
  'underscore',
  'backbone'
], function($, _, Backbone){

    var HotspotEditorView = Backbone.View.extend({
        template: _.template($("#hotspoteditor-template").html()),
        className: 'hotspoteditor',
        tag: 'div',

        events:{
          'click .save' : 'save',
          'click .delete' : 'delete',
          'click .preview' : 'preview'
        },
        initialize: function() {
            _.bindAll(this, 'render', 'remove','save');
            this.model.bind('change', this.render);
            this.model.bind('remove', this.remove);

            //define a different template per hotspot type
            switch(this.model.get('type')){
                case 'popup':
                    this.template =  _.template($("#hotspoteditor-template").html());
                    break;
                default:
                    this.template =  _.template($("#hotspoteditor-template").html());
                    break;
            }
        },

        render: function() {
            $(this.el).html(this.template(this.model.toJSON()));
            return this;
        },
        preview: function(){

        },
        close: function() {
	        $(this.el).unbind();
	        $(this.el).empty();
	    },
        save: function(){
            console.log('saving hotspot');
            this.model.set({
                metadata:{
                    description: this.$('.description').val()
                }
            })
            this.model.save();
        },
        delete: function(){
            this.model.destroy();
        },
        remove: function(){
            //removes the view
           this.close();
        }
    });
    return HotspotEditorView;
});