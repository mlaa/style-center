/* Citation router */

'use strict';

module.exports = function (Module, App, Backbone) {
  return Backbone.Marionette.AppRouter.extend({
    appRoutes: {
      '': 'showCitationIntro',
      'step-1': 'showCitationForm'
    }
  });
};
