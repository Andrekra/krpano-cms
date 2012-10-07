define(['backbone', 'underscore', 'text!krpanojsf/views/templates/projectmenu.html'], function(Backbone, _, html) {
    var ProjectMenu = Backbone.View.extend({
        className: "menu",
        events: {
          'click #editdisplay': 'editdisplay',
          'click #editautorotate': 'editautorotate'
        },
        initialize: function(){
           // this.template = _.template(html, {});
        },
        render: function(){
            this.$el.html(_.template(html));
            return this;
        },
        show_hotspot_editor: function(){

        },
        editdisplay: function(e){
            e.preventDefault();
            krApp.router.navigate('project/'+this.model.get('id')+'/display', {trigger: true})
        },
        editautorotate: function(e){
            e.preventDefault();
            krApp.router.navigate('project/'+this.model.get('id')+'/autorotate', {trigger: true})
        },
        locationlist: function(e){
            e.preventDefault();
            krApp.router.navigate('project/'+this.model.get('id')+'/locations', {trigger: true})
        }
    });
    window.ProjectMenu = ProjectMenu;
    return ProjectMenu;
})