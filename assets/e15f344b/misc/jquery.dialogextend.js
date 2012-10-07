/*!
 * jQuery DialogExtend 0.9.1
 *
 * Copyright (c) 2010 Shum Ting Hin
 *
 * Licensed under MIT
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Depends:
 *   jQuery 1.4
 *   jQuery UI Dialog 1.8.0
 *
 * History:
 *   0.9   / 2010-11-04 / hin / creation of plugin
 *   0.9.1 / 2010-11-16 / hin / fix bug of zero-config
 *
 */
(function($){

	//default settings
	var settings = {
		"maximize" : false,
		"minimize" : false,
		"dblclick" : false,
		"icons" : {
			"maximize" : "ui-icon-extlink",
			"minimize" : "ui-icon-minus",
			"restore" : "ui-icon-newwin"
		}
	};

	//plubic methods
	var methods = {

		"init" : function( options ){
			//validation
			if ( !$(this).dialog ) {
				$.error( "jQuery.dialogExtend Error : Only jQuery UI Dialog element is accepted" );
			}
			//maintain chainability
			return this.each(function(){
				//merge options with default settings
				var foo = settings.icons;
				if ( options ) { $.extend( foo, options.icons || {} ); }
				$.extend( settings, options || {} );
				settings.icons = foo;
				//initiate plugin
				$(this)
					.dialogExtend("_verifySettings")
					.dialogExtend("_loadCss")
					.dialogExtend("_loadButtons")
					//set default dialog state
					.data("dialog-state", "normal")
					//trigger custom event
					.trigger("load.dialogExtend");
			});
		},

		"maximize" : function(){
			var self = this;
			//start!
			$(self)
				//trigger custom event
				.trigger("beforeMaximize.dialogExtend")
				//remember original state
				.dialogExtend("_saveSnapshot")
				//mark new state
				.data("dialog-state", "maximized")
				//modify dialog button
				.dialogExtend("_toggleButtons")
				//fix dialog from scrolling
				.each(function(){
					$(this).dialog("widget").css("position", "fixed")
				 })
				//modify dialog with new config
				.dialog("option", {
					"resizable" : false,
					"draggable" : false,
					"height" : $(window).height()-11,
					"width" : $(window).width()-11,
					"position" : [1, 1]
				})
				//trigger custom event
				.trigger("maximize.dialogExtend");
			//maintain chainability
			return self;
		},

		"minimize" : function(){
			var self = this;
			var container = "#minimized-dialog-container";
			//create container for (multiple) minimized dialogs (when necessary)
			if ( !$(container).length ) {
				$("<div />")
					.attr("id", container.replace("#", ""))
					.css({ "left" : 1, "bottom" : 1, "position" : "fixed" })
					.appendTo("body");
			}
			//start!
			$(self)
				//trigger custom event
				.trigger("beforeMinimize.dialogExtend")
				//remember original state
				.dialogExtend("_saveSnapshot")
				//mark new state
				.data("dialog-state", "minimized")
				//modify dialog button
				.dialogExtend("_toggleButtons")
				//move dialog from body to container
				.each(function(){
					$(this)
						.dialog("widget")
						//float is essential for stacking
						.css({ "float" : "left", "margin" : 1, "position" : "static" })
						.appendTo(container);
				})
				//modify dialog with new config (must hide dialog content to make height workable)
				.dialog("option", {
					"resizable" : false,
					"draggable" : false,
					"height" : $(this).dialog("widget").find(".ui-dialog-titlebar").height()+15,
					"width" : 200
				})
				.hide()
				//trigger custom event
				.trigger("minimize.dialogExtend");
			//maintain chainability
			return self;
		},

		"restore" : function(){
			var self = this;
			var beforeState = $(self).data("dialog-state");
			//start!
			$(self)
				//trigger custom event
				.trigger("beforeRestore.dialogExtend")
				//mark new state
				.data("dialog-state", "normal")
				//restore dialog button
				.dialogExtend("_toggleButtons")
				//restore dialog according to previous state
				.each(function(){
					switch ( beforeState ) {
						case "maximized":
							$(self).dialogExtend("_restoreFromMaximized");
							break;
						case "minimized":
							$(self).dialogExtend("_restoreFromMinimized");
							break;
						default:
							$.error( "jQuery.dialogExtend Error : Cannot restore from unknown state <" + beforeState +">" );
					}
				})
				//trigger custom event
				.trigger("restore.dialogExtend");
			//maintain chainability
			return self;
		},

		"_loadButtons" : function(){
			var self = this;
			//start operation on titlebar
			var titlebar = $(self).dialog("widget").find(".ui-dialog-titlebar");
			$(titlebar)
				.append('<a class="ui-dialog-titlebar-maximize ui-corner-all" href="#"><span class="ui-icon '+settings.icons.maximize+'">maximize</span></a>')
				.append('<a class="ui-dialog-titlebar-minimize ui-corner-all" href="#"><span class="ui-icon '+settings.icons.minimize+'">minimize</span></a>')
				.append('<a class="ui-dialog-titlebar-restore ui-corner-all" href="#"><span class="ui-icon '+settings.icons.restore+'">restore</span></a>')
				//add effect to buttons
				.find(".ui-dialog-titlebar-maximize,.ui-dialog-titlebar-minimize,.ui-dialog-titlebar-restore")
					.attr("role", "button")
					.mouseover(function(){ $(this).addClass("ui-state-hover"); })
					.mouseout(function(){ $(this).removeClass("ui-state-hover"); })
					.focus(function(){ $(this).addClass("ui-state-focus"); })
					.blur(function(){ $(this).removeClass("ui-state-focus"); })
				.end()
				//default show buttons
				//set button positions
				//on-click-button
				.find(".ui-dialog-titlebar-maximize")
					.toggle(settings.maximize)
					.css({ "right" : settings.maximize ? "1.4em" : "-9999em" })
					.click(function(e){
						e.preventDefault();
						$(self).dialogExtend("maximize");
					})
				.end()
				.find(".ui-dialog-titlebar-minimize")
					.toggle(settings.minimize)
					.css({ "right" : settings.maximize ? "2.5em" : settings.minimize ? "1.4em" : "-9999em" })
					.click(function(e){
						e.preventDefault();
						$(self).dialogExtend("minimize");
					})
				.end()
				.find(".ui-dialog-titlebar-restore")
					.hide()
					.css({ "right" : "-9999em" })
					.click(function(e){
						e.preventDefault();
						$(self).dialogExtend("restore");
					})
				.end()
				//on-dblclick-titlebar : maximize/minimize/restore
				.dblclick(function(e){
					if ( settings.dblclick && settings.dblclick.length ) {
						$(self).dialogExtend( $(self).data("dialog-state") != "normal" ? "restore" : settings.dblclick );
					}
				})
				//avoid text-highlight when double-click
				.each(function(){
					$(this)
						//.attr("unselectable", "on")
						//.css("-moz-user-select", "none")
						//.css("-khtml-user-select", "none")
						.select(function(){ return false; });
				});
			//maintain chainability
			return self;
		},

		"_loadCss" : function(){
			var self = this;
			//append styles for this plugin to body
			var style = '';
			style += '<style type="text/css">';
			style += '.ui-dialog .ui-dialog-titlebar-maximize,';
			style += '.ui-dialog .ui-dialog-titlebar-minimize,';
			style += '.ui-dialog .ui-dialog-titlebar-restore { position: absolute; top: 50%; width: 19px; margin: -10px 0 0 0; padding: 1px; height: 18px; }';
			style += '.ui-dialog .ui-dialog-titlebar-maximize span,';
			style += '.ui-dialog .ui-dialog-titlebar-minimize span,';
			style += '.ui-dialog .ui-dialog-titlebar-restore span { display: block; margin: 1px; }';
			style += '.ui-dialog .ui-dialog-titlebar-maximize:hover,';
			style += '.ui-dialog .ui-dialog-titlebar-maximize:focus,';
			style += '.ui-dialog .ui-dialog-titlebar-minimize:hover,';
			style += '.ui-dialog .ui-dialog-titlebar-minimize:focus,';
			style += '.ui-dialog .ui-dialog-titlebar-restore:hover,';
			style += '.ui-dialog .ui-dialog-titlebar-restore:focus { padding: 0; }';
			style += '.ui-dialog .ui-dialog-titlebar ::selection { background-color: transparent; }';
			style += '</style>';
			$(style).appendTo("body");
			//maintain chainability
			return self;
		},

		"_loadSnapshot" : function(){
			var self = this;
			return {
				"config" : {
					"resizable" : $(self).data("original-config-resizable"),
					"draggable" : $(self).data("original-config-draggable")
				},
				"size" : {
					"height" : $(self).data("original-size-height"),
					"width"  : $(self).data("original-size-width")
				},
				"position" : {
					"mode" : $(self).data("original-position-mode"),
					"left" : $(self).data("original-position-left"),
					"top"  : $(self).data("original-position-top")
				}
			};
		},

		"_restoreFromMaximized" : function(){
			var self = this;
			var original = $(this).dialogExtend("_loadSnapshot");
			//restore dialog
			$(self)
				//free dialog from scrolling
				.each(function(){
					$(this).dialog("widget").css("position", original.position.mode);
				})
				//restore config & size & position
				.dialog("option", {
					"resizable" : original.config.resizable,
					"draggable" : original.config.draggable,
					"height" : original.size.height,
					"width" : original.size.width,
					"position" : [ original.position.left, original.position.top ]
				});
		},

		"_restoreFromMinimized" : function(){
			var self = this;
			var original = $(this).dialogExtend("_loadSnapshot");
			var container = "#minimized-dialog-container";
			//restore dialog
			$(self)
				//move dialog back from container to body
				.each(function(){
					$(this)
						.dialog("widget")
						.appendTo("body")
						.css({ "float" : "none", "margin" : 0, "position" : original.position.mode });
				})
				//restore config & size & position
				.dialog("option", {
					"resizable" : original.config.resizable,
					"draggable" : original.config.draggable,
					"height" : original.size.height,
					"width" : original.size.width,
					"position" : [ original.position.left, original.position.top ]
				})
				.show();
		},

		"_saveSnapshot" : function(){
			var self = this;
			//remember all configs under normal state
			if ( $(self).data("dialog-state") == "normal" ) {
				$(self)
					.data("original-config-resizable", $(self).dialog("option", "resizable"))
					.data("original-config-draggable", $(self).dialog("option", "draggable"))
					.data("original-size-height", $(self).dialog("widget").height())
					.data("original-size-width", $(self).dialog("option", "width"))
					.data("original-position-mode", $(self).dialog("widget").css("position"))
					.data("original-position-left", $(self).dialog("widget").offset().left)
					.data("original-position-top", $(self).dialog("widget").offset().top);
			}
			//maintain chainability
			return self;
		},

		"_toggleButtons" : function(){
			var self = this;
			//show or hide buttons & decide position
			$(self).dialog("widget")
				.find(".ui-dialog-titlebar-maximize")
					.toggle( $(self).data("dialog-state") != "maximized" && settings.maximize )
				.end()
				.find(".ui-dialog-titlebar-minimize")
					.toggle( $(self).data("dialog-state") != "minimized" && settings.minimize )
				.end()
				.find(".ui-dialog-titlebar-restore")
					.toggle( $(self).data("dialog-state") != "normal" && ( settings.maximize || settings.minimize ) )
					.css({ "right" : $(self).data("dialog-state") == "maximized" ? "1.4em" : $(self).data("dialog-state") == "minimized" ? !settings.maximize ? "1.4em" : "2.5em" : "-9999em" })
				.end();
			//maintain chainability
			return self;
		},

		"_verifySettings" : function(){
			var self = this;
			//check <dblclick> option
			if ( settings.dblclick && !( settings.dblclick == "maximize" || settings.dblclick == "minimize" ) ) {
				settings.dblclick = false;
			}
			//maintain chainability
			return self;
		}

	};

	//core method
	$.fn.dialogExtend = function( method ){
		//method calling logic
		if ( methods[method] ) {
			return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ) );
    } else if ( typeof method === "object" || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( "jQuery.dialogExtend Error : Method " + method + " does not exist" );
    }
	};

}(jQuery));