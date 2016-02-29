/**
 * Main theme JS file driven by CommonJS and Browserify.
 */

'use strict';

var jQuery = require('jquery');
var underscore = require('underscore');
var Backbone = require('backbone');

// Side-shim jQuery and Underscore before requiring Marionette.
Backbone.$ = jQuery;
Backbone._ = underscore;
require('backbone.marionette');

// Create the application.
var App = new Backbone.Marionette.Application();

// Add regions.
App.addRegions({
  Content: '#citation-tool'
});

// Load modules.
require('./search-hints')(jQuery);
App.module('Citations', require('./citations'));

// Start the history listener.
App.on('start', function () {
  Backbone.history.start({
    pushState: true,
    root: '/understanding-mla-style/'
  });
});

// Start the application.
if (jQuery('#citation-tool')) {
  App.start();
}
