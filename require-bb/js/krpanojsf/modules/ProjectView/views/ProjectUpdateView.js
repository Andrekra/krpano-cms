define(
    ['backbone','jquery','underscore','text!krpanojsf/modules/ProjectView/templates/details.html'], function(Backbone,$,_, template){
        var ProjectDetails = Backbone.View.extend({

            id: "info",
            className: 'box',
            input_name: false,
            input_description: false,
            input_defaultlocation: false,

            events: {
                'click .saveproject': 'saveproject'
            },

            initialize:function(){
                _.bindAll(this, 'render', 'saveproject');
                this.model.on('change', this.render);
            },
            render:function(){
                $content = $('<div class="box-content"></div>');
                console.log(this.model.toJSON());
                var compiledTemplate = _.template(
                    template,
                    this.model.toJSON()
                );
                // Append our compiled template to this Views "el"
                $content.html( compiledTemplate );
                this.$el.html($content);
                return this;
            },

            saveproject: function(e){
                var base = this;
                e.preventDefault();

                this.model.set({
                    name: base.$('#project-name').val(),
                    description: base.$('#project-description').val(),
                    defaultlocation: base.$('#project-defaultlocation').val()
                });

                console.log(this.model);
                this.model.save();
                return false;
            }
        });
        return ProjectDetails;

    }
)