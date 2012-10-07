define(['backbone', 'underscore', 'text!krpanojsf/views/templates/block_location_listitem.html'], function(Backbone, _, html) {
    var LocationListItemView = Backbone.View.extend({
        el: '<div class="project-wrapper block"></div>',
        events: {
          'click .remove': 'removeLocation',
           'click .edit': 'editLocation'
         /*  'mouseover': 'toggle_actions',
            'mouseout': 'toggle_actions'*/
        },
        initialize: function() {
            _.bindAll(this, "render", "removeLocation");

        },
        render: function() {
            this.$el.html(_.template(html, this.model.toJSON()));
           // this.$('.actions').hide();
            return this;
        },
        removeLocation: function(e){
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
        editLocation: function(e){
            e.preventDefault();
            krApp.location = this.model;
            krApp.router.navigate("/location/"+this.model.get('id'), {trigger: true});
            return false;
        },
        toggle_actions: function(e){
            $(e.currentTarget).find('.actions').toggle();
        }
    });
    return LocationListItemView;
});