define(['backbone', 'underscore', 'krpanojsf/models/Location'], function(Backbone, _, Location) {
    var LocationCollection = Backbone.Collection.extend({
        url: 'http://labs.panofy.com/api/locations',
        model: Location
    });
    return LocationCollection;
});