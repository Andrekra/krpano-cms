define(['backbone', 'underscore'], function(Backbone, _){
    var KrpanoAttributeForm = Backbone.View.extend({
        className: 'display',
        template: '<div>overwrite KrpanoAttributeform.template please</div>',
        events: {
            'slide .slider' : 'sliderHandler', //bind sliders
            'blur .amount' : 'inputHandler', //bind input[text] boxes
            'change .spinner' : 'inputHandler', //bind input[text] boxes
            'click input[type=radio]' : 'inputHandler', //bind input[text] boxes
            'click input[type=checkbox]' : 'checkboxHandler' //bind input[text] boxes
        },
        initialize: function(){
            _.bindAll(this, 'render', 'sliderHandler','update','initForm');
            this.model.on('change',this.update);
            this.bindevents();
        },
        bindevents: function(){

        },
        render: function(){
            this.$el.html(_.template(this.template, this.model.toJSON()));
            return this;
        },
        initForm: function(){
            this.$('.slider').slider();
            this.$( ".slider" ).each(function(index, slide){
                $slide = $(slide);
                $slide.slider( "option", "max", $slide.data('max') );
                $slide.slider( "option", "step", $slide.data('step') );
                $slide.slider( "option", "min", $slide.data('min') );
                $slide.slider( "option", "value", $slide.data('value') );
            });

            //initialize radiobuttons
            this.$('.radio').buttonset();

            //initialize tooltips
            this.$('label').popover();

            //intialize spinners
            //https://github.com/btburnett3/jquery.ui.spinner
            this.$('.spinner').spinner();
            this.$( ".spinner" ).each(function(index, spinner){
                $spinner = $(spinner);
                if($spinner.data('max')) $spinner.slider( "option", "max", $spinner.data('max') );
                if($spinner.data('step')) $spinner.slider( "option", "step", $spinner.data('step') );
                if($spinner.data('min')) $spinner.slider( "option", "min", $spinner.data('min') );
            });

        },
        sliderHandler: function(e){
            var slider = $(e.currentTarget);
            var property = slider.parents('.attribute').attr('id');
            var value = slider.slider('value');

            this.model.set(property, value);
        },
        beforeupdate: function(){

        },
        update: function(){
            var attributes = this.model.changedAttributes();
            for(var att in attributes){
                this.$('#' + att + ' .amount').val(this.model.get(att));
                this.$('#' + att + ' .slider').slider("value", this.model.get(att));
                krApp.api.set(this.className + '.' + att, this.model.get(att));
            }
            // this.updateKrpano(this.className, this.model.changedAttributes());
        },
        inputHandler: function(e){
            var input = $(e.currentTarget);
            var property = input.parents('div').attr('id');
            var value = input.val();

            this.model.set(property, value);
        },
        checkboxHandler: function(e){
            var input = $(e.currentTarget);
            var property = input.parents('div').attr('id');

            //convert true/false to on/off for flash10 property
            if(property == "flash10"){
                var value = input.is(":checked") ? "on" : "off";
            } else {
                var value = input.is(":checked");
            }
            this.model.set(property, value);
        }
    });
    return KrpanoAttributeForm;
});