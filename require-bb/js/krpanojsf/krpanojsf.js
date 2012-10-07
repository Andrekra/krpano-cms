'use strict';
define(
    ['underscore'],
	function(_){
		var KrpanoJSF = {};
        var _krpano = function(){
            return document.getElementById('krpanoSWFObject');
        };

        var blacklist = ['id'];
        var updatescreenlist = ['display.details', 'display.tessmode'];
		KrpanoJSF.set = function(property, value){
			if(typeof(value) === 'object'){
                for(var key in value){
                    if(_.include(blacklist, key) == false && key !== null){
                        KrpanoJSF.set(property+'.'+key, value[key]);
                    }
                }
			} else {
				_krpano().set(property, value);
                if(_.include(updatescreenlist, property)){
                    KrpanoJSF.call('updateobject(true,true);')
                }
			}
		};
		KrpanoJSF.get = function(property){
			return _krpano().get(property);
		};
		KrpanoJSF.trace = function(){
			_krpano().call('showlog()');
            _krpano().call('trace("' + _.values(arguments)  + '")');
		};
		KrpanoJSF.call = function(action){
		   _krpano().call(action);
		};
		
		return KrpanoJSF;
	}
);