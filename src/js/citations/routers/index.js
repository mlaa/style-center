/* Citation router */

'use strict';

module.exports = function (Module, App, Backbone) {
  return Backbone.Marionette.AppRouter.extend({
    appRoutes: {
      'whats-new/': 'showCitationForm',
      'works-cited-a-quick-guide-:type/': 'showCitationForm'
    }
  });
};
