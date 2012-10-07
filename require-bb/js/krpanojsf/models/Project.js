// Filename: krpanojsf/models/Location.js
define([
  'backbone',
    'krpanojsf/models/Autorotate',
    'krpanojsf/models/Control',
    'krpanojsf/models/Display',
    'krpanojsf/models/Memory',
    'krpanojsf/models/Network'
], function(Backbone, Autorotate, Control, Display, Memory, Network){
    var Project = Backbone.Model.extend({
        urlRoot: apiUrl +'projects/',
        defaults:{
          keywords: 'panorama',
          name: '',
          description: ''
        },
        initialize: function(){
            this.set(
                {
                    autorotate: new Autorotate(this.get('autorotate')),
                    control: new Control(this.get('control')),
                    display: new Display(this.get('display')),
                    memory: new Memory(this.get('memory')),
                    network: new Network(this.get('network'))
                }
            );
        },
/*        validate: function(attrs) {
            if(attrs.description == ""){
                alert('cant be empty');
            }
        }*/
    });

    return Project;
});