define([
  'jquery',
  'underscore',
  'backbone',
  'krpanojsf/models/projects'
], function($, _, Backbone, projectsModel){
  var projectsCollection = Backbone.Collection.extend({
    model: projectsModel,
    initialize: function(){

    }

  });

  return new projectsCollection;
});
