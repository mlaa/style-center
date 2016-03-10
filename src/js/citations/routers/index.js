/* Citation router */

'use strict';

module.exports = function (Module, App, Backbone) {
  return Backbone.Marionette.AppRouter.extend({
    appRoutes: {
      'mla-style-at-a-glance/': 'showCitationForm',
      'mla-style-at-a-glance-:type/': 'showCitationForm'
    }
  });
};
