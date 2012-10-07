// Author: Thomas Davis <thomasalwyndavis@gmail.com>
// Filename: main.js

// Require.js allows us to configure shortcut alias
// Their usage will become more apparent futher along in the tutorial.
require.config({
  paths: {
/*
    jquery: 'vendors/jquery/jquery-min',*/
    jQuery: 'krpanojsf/libs/jquery',
    order: 'vendors/require/order',
    underscore: 'krpanojsf/libs/underscore',
    backbone: 'krpanojsf/libs/backbone',


    text: 'vendors/require/text',
    templates: '../templates'
  }
});

/*
require(['krpanojsf/app','order!jQuery','order!underscore','order!backbone'], function(App,jQuery, underscore, Backbone){

});
*/
