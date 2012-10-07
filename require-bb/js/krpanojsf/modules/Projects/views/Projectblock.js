define(['backbone', 'underscore', 'text!krpanojsf/modules/Projects/templates/list.html'], function(Backbone, _, html) {
    var Projectblock = Backbone.View.extend({
        el: '<div class="project-wrapper block"></div>',
        events: {
          'click .remove': 'removeProject',
           'click .edit': 'editProject'
         /*  'mouseover': 'toggle_actions',
            'mouseout': 'toggle_actions'*/
        },
        initialize: function() {
            _.bindAll(this, "render", "removeProject");

        },
        render: function() {
            this.$el.html(_.template(html, this.model.toJSON()));
           // this.$('.actions').hide();
            return this;
        },
        removeProject: function(e){
            // $('#delete-confirmation').module();
            e.preventDefault();
            var confirmed = confirm('Are you sure you want to delete this project?');
            if(confirmed == true){

               var base = this;
                base.model.destroy({
                    success: function(){
                        base.remove();
                        base.unbind();
                    }
                });
            }
           
        },
        editProject: function(e){
            e.preventDefault();
            krApp.project = this.model;
            krApp.router.navigate("/project/id/"+krApp.project.get('id'), {trigger: true});
            return false;
        },
        toggle_actions: function(e){
            $(e.currentTarget).find('.actions').toggle();
        }
    });
    return Projectblock;
});