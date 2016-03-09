/* Layout view */

'use strict';

module.exports = function (Module, App, Backbone) {

  var Layout = Backbone.Marionette.LayoutView.extend({

    template: require('../templates/layout.tpl'),

    regions: {
      bookRefs: '#book-refs'
    }

  });

  Module.Views = Module.Views || {};
  Module.Views.Layout = new Layout();

};
