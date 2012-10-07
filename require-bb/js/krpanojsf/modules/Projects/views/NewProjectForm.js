define(['backbone', 'underscore', 'text!krpanojsf/modules/Projects/templates/new.html','krpanojsf/models/Project'], function(Backbone, _, html, Project) {
    var NewProjectForm = Backbone.View.extend({
        id: 'info',
        className: 'box',

        input_name: false,
        input_description: false,

        events: {
          'click .add': 'newProject'
        },
        initialize: function() {
            _.bindAll(this, "render", "newProject");
            this.input_name = this.$('#project-name');
            this.input_name = this.$('#project-description');
        },
        render: function() {


            var $content = $('<div class="box-content"></div>');
            this.$el.append($content);

            var $header = $('<h1>Create a new project</h1>');
            $content.append($header);
            $content.html(_.template(html));

            return this;
        },
        newProject: function(){
            // $('#delete-confirmation').module();
          //  e.preventDefault();
            var base = this;
            var project = new Project({
                name: base.input_name.val(),
                description: base.input_description.val()
            });
            krApp.projects.add(project);

        }
    });
    return NewProjectForm;
});