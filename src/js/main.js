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
  BookRefs: '#search-book-refs',
  Content: '#citation-tool'
});


// Load Marionette modules.
App.module('BookIndex', require('./book-index'));
App.module('Citations', require('./citations'));

// Start the history listener.
App.on('start', function () {
  // expect DOM to be loaded at this point
  // Load generic modules.
  //require('./search-hints')(jQuery);
  require('./page-menu')(jQuery);

  Backbone.history.start({
    pushState: true,
    root: '/'
  });
});

// Start the application.
App.start();
