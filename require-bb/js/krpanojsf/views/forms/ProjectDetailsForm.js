define(['backbone', 'underscore',
'krpanojsf/views/components/KrpanoAttributeForm',
'text!krpanojsf/views/templates/form_projectdetails.html'
], function(Backbone, _, KrpanoAttributeForm, html){
    var ProjectDetails = KrpanoAttributeForm.extend({
        className: 'projectdetails',
        template: html
    });
    return ProjectDetails;
});