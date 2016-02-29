/* Intro view */

'use strict';

var introTemplate = require('../templates/citation-intro.tpl');

module.exports = function (Module, App, Backbone) {

  var ItemView = Backbone.Marionette.ItemView.extend({
    getTemplate: introTemplate
  });

  Module.Views = Module.Views || {};

  Module.Views.Intro = ItemView;

};
