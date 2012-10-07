define(
    ['krpanojsf/models/BaseAttribute'], function(BaseAttribute){
        var View = BaseAttribute.extend({
            urlRoot: apiUrl + 'view/'
        });
        return View;

    }
)