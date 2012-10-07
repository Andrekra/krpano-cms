define(['backbone','underscore', 'krpanojsf/modules/Projects/views/Projectblock'], function(Backbone, _, Projectblock){
    var ProjectList = Backbone.View.extend({
        _projectViews: [],
        className: 'projects box',

        initialize: function(){
            _.bindAll(this, "render", "add");
            this.collection.on("change", this.render);
            this.collection.on("add", this.add);

            var that = this;
            that._projectViews = [];
            this.collection.each(function(project) {
              that._projectViews.push(new Projectblock({
                model : project
              }));
            });
       },
       add: function(project){
            project.save();
            var projectview = new Projectblock({
                model:project
            });
            this._projectViews.push(projectview);
            this.$el.append(projectview.render().$el);
        },
        render: function(){
            var that = this;
            that.$el.empty();

            var $header = $('<div class="box-header"><h1><span class="icon-folder-open"></span> Projects</h1></div>');
            that.$el.append($header);

            var $content = $('<div class="box-content"></div>');
            that.$el.append($content);
             //list of projects
            _(that._projectViews).each(function(projectview) {
                $content.append(projectview.render().$el);
            });
            $content.append('<div class="clear"></div>');

            var $footer = $('<div class="box-footer">Select a project to edit or create a new project.</div>');
            that.$el.append($footer);

            that.$('.btn').tooltip();

            return that;
        }
    });
    return ProjectList;
});