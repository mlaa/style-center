/* Citation controller */

'use strict';

module.exports = function (Module, App, Backbone) {

  var citationData = require('../../data/citations.json');

  var showCitationForm = function (citationType) {

    citationType = citationType || 'empty';

    App.Content.show(Module.Views.Layout, {
      forceShow: true,
      preventDestroy: true
    });

    Module.Views.Layout.showChildView('form', new Module.Views.Citation.CollectionView({
      collection: new Module.Models.Citation.Collection(citationData[citationType])
    }));

  };

  return Backbone.Marionette.Controller.extend({
    showCitationForm: showCitationForm
  });

};
