define(
    ['krpanojsf/models/BaseAttribute'], function(BaseAttribute){
        var Display = BaseAttribute.extend({
            urlRoot: function(){ return 'api/projects/'+krApp.project.get('id')+'/display'; },
            defaults: {
                currentfps: 30,
            }
        });
        return Display;

    }
)