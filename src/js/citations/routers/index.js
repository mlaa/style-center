/* Citation router */

'use strict';

module.exports = function (Module, App, Backbone) {
  return Backbone.Marionette.AppRouter.extend({
    appRoutes: {
      'understanding-mla-style/': 'showCitationIntro'
    }
  });
};
