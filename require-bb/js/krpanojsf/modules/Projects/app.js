define(['backbone', 'underscore',
        'krpanojsf/modules/Projects/views/ProjectList',
        'krpanojsf/modules/Projects/views/NewProjectForm',
        'krpanojsf/views/ProjectMenu',
        'krpanojsf/modules/Projects/collections/ProjectCollection'
    ], function(Backbone, _, ProjectList, NewProjectForm, ProjectMenu, ProjectCollection){

    var ProjectModule = Backbone.View.extend({
        el: $('#content'),
        initialize: function(){
            krApp.projects = false;
       },
        render: function(){
            var base = this;
            base.$('.left').empty();
            base.$('.right').empty();

            //new project form
            var form = new NewProjectForm();
            base.$('.left').append(form.render().$el);

            krApp.projects = new ProjectCollection();
            krApp.projects.fetch({
                    success: function(){
                        var list = new ProjectList({collection: krApp.projects});
                        base.$('.right').append(list.render().$el);
                    }
            });



            return base;
        }
   });
   return ProjectModule;
});