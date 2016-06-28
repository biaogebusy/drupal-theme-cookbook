require('bootstrap/js/transition');
require('bootstrap/js/tab');
require('bootstrap/js/modal');
require('bootstrap/js/dropdown');
require('bootstrap/js/collapse');

var wenui = require('./modules/wenui');
wenui.jQueryBrowser();

var theme = require('./modules/theme');

//var screenfull = require('screenfull');

(function ($) {
	Drupal.behaviors.theme = {
	  attach: function (context, settings) {

	  	// Init
	  	theme.init(settings, $)

	    // fixedNavto
	    // theme.fixedNavto(".nav", $);

	  },
	}

})(jQuery);