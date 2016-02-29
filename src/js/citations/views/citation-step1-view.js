/* Intro view */

'use strict';

var template = require('../templates/citation-step-1.tpl');

module.exports = function (Module, App, Backbone) {

  var ItemView = Backbone.Marionette.ItemView.extend({
    getTemplate: template
  });

  Module.Views = Module.Views || {};

  Module.Views.Step1 = ItemView;

};
