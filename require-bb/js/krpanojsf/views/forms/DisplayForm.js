define(['backbone', 'underscore',
'krpanojsf/views/components/KrpanoAttributeForm',
'text!krpanojsf/views/templates/form_display.html'
], function(Backbone, _, KrpanoAttributeForm, html){
    var Display = KrpanoAttributeForm.extend({
        className: 'display',
        template: html
    });
    return Display;
});