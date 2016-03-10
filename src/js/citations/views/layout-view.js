/* Layout view */

'use strict';

module.exports = function (Module, App, Backbone) {

  var layoutTemplate = require('../templates/citation-layout.tpl');

  var Layout = Backbone.Marionette.LayoutView.extend({

    template: layoutTemplate,
    className: 'citation-template',

    regions: {
      output: '#citation-output',
      form: '#citation-form'
    }

  });

  Module.Views = Module.Views || {};
  Module.Views.Layout = new Layout();

};
