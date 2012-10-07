define(['backbone', 'underscore',
'krpanojsf/views/components/KrpanoAttributeForm',
'text!krpanojsf/views/templates/form_autorotate.html'
], function(Backbone, _, KrpanoAttributeForm, html){
    var Autorotate = KrpanoAttributeForm.extend({
        className: 'autorotate',
        template: html,

        sliderHandler: function(e){
            var slider = $(e.currentTarget);
            var property = slider.parents('.attribute').attr('id');
            var value = slider.slider('value');

            if(property == "tofov" && value == 0){
                value = "off"
            }
            this.model.set(property, value);
        }
    });
    return Autorotate;
});