define(['backbone', 'underscore',
'krpanojsf/views/components/KrpanoAttributeForm',
'text!krpanojsf/views/templates/form_view.html'
], function(Backbone, _, KrpanoAttributeForm, html){
    var View = KrpanoAttributeForm.extend({
        className: 'view',
        template: html
    });
    return View;
});