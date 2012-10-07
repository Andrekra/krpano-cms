define(['backbone', 'underscore', 'krpanojsf/models/Project'], function(Backbone, _, Project) {
    var ProjectCollection = Backbone.Collection.extend({
        url: 'http://labs.panofy.com/api/projects',
        model: Project
    });
    return ProjectCollection;
});